/**
 * Created by baidu on 2018/1/10.
 */
const axios = require('axios');
const moment = require('moment');
const marked = require('marked');
const { Base64 } = require('js-base64');
const { issues_url, issues_update_interval, timeout_interval } = require('./config.js');
const { query } = require('./mysql');

// 当前查找第一页
let page = 1;
let interval = issues_update_interval;
let menus = [];

function getInsertQueryString(arr) {
    if (arr.length === 0) {
        return null;
    }
    const resArray = arr.map(item => `("${item.title}", ${item.label_id}, ${item.id}, "${item.body}", "${item.created_at}", "${item.updated_at}")`);
    return 'INSERT INTO articles (title, menu_id, issue_id, content, created_at, updated_at) VALUES ' + resArray.join(',')
}

function getUpdateQueryString(arr) {
    if (arr.length === 0) {
        return null;
    }
    let str = 'UPDATE articles SET ';
    let fields = {
        title: 'title = CASE issue_id ',
        menu_id: 'menu_id = CASE issue_id ',
        content: 'content = CASE issue_id ',
        updated_at: 'updated_at = CASE issue_id '
    };
    let issues_id = [];
    arr.forEach(item => {
        fields.title += `WHEN ${item.id} THEN "${item.title}" `;
        fields.menu_id += `WHEN ${item.id} THEN ${item.label_id} `;
        fields.content += `WHEN ${item.id} THEN "${item.body}" `;
        fields.updated_at += `WHEN ${item.id} THEN "${item.updated_at}" `;
        issues_id.push(item.id);
    });
    for (let k in fields) {
        fields[k] += 'END ';
    }
    str = str
        + fields.title
        + ','
        + fields.menu_id
        + ','
        + fields.content
        + ','
        + fields.updated_at
        + 'WHERE issue_id IN ('
        + issues_id.join(',')
        + ')';
    return str;
}

function updateMenus(needUpdate = []) {
    if (needUpdate.length === 0) {
        return false;
    }
    let tempObj = {};
    let str = 'INSERT INTO menus (title, label_id, created_at, updated_at) VALUES ';
    let insertStr = [];
    needUpdate.forEach(item => {
        if (tempObj[item.id]) {
            return;
        }
        tempObj[item.id] = item.name;
        const time = moment().format('YYYY-MM-DD HH:mm:ss');
        insertStr.push(`("${item.name}", "${item.id}", "${time}", "${time}")`);
    });
    str = str + insertStr.join(',');
    query(str)
        .then(res => {
            needUpdate.forEach(item => {
                menus.push(item.id);
            })
        })
        .catch((query, mysqlError) => {
            console.log('****************************');
            console.log('更新menus失败');
            console.log(query);
            console.log(mysqlError);
            console.log('****************************');
        })
}

function main() {
    axios.get(`${issues_url}?page=${page}`)
        // 1.查找30条数据
        .then(({data}) => {
            if (data.length === 0) {
                page = 1;
                return ;
            }
            let needInsertMenus = [];
            data = data.filter(item => item.author_association === 'OWNER')
                .data.map(item => {
                item.title = Base64.encode(item.title);
                item.created_at = moment(item.created_at).format('YYYY-MM-DD HH:mm:ss');
                item.updated_at = moment(item.updated_at).format('YYYY-MM-DD HH:mm:ss');
                item.body = Base64.encode(marked(item.body));
                item.label_id = item.labels[0] ? item.labels[0].id : 0;
                if (item.label_id && !menus.includes(item.label_id)) {
                    needInsertMenus.push(item.labels[0]);
                }
                return item;
            });
            updateMenus(needInsertMenus);
            let selectedIds = data.map(i => i.id).join(',');
            // 2.去数据库查找30条数据的更新时间
            query(`SELECT issue_id,updated_at FROM articles WHERE issue_id IN (${selectedIds})`)
            // 转换数组为对象，提高对比效率
                .then(res => {
                    let resObj = {};
                    res.forEach(item => {
                        resObj[item.issue_id] = moment(item.updated_at).format('YYYY-MM-DD HH:mm:ss');
                    });
                    return resObj;
                })
                // 3.比对更新时间，查找需要新增和更新的数据
                .then(res => {
                    let updateArray = [];
                    let insertArray = [];
                    data.forEach(item => {
                        if (res[item.id]) {
                            if (res[item.id] !== item.updated_at) {
                                updateArray.push(item);
                            }
                        }
                        else {
                            insertArray.push(item);
                        }
                    });
                    return {
                        update: updateArray,
                        insert: insertArray
                    }
                })
                // 4.执行新增或更新操作
                // TODO 根据labels的数量删除失效issues
                .then(({update, insert}) => {
                    const insertQuery = getInsertQueryString(insert);
                    const updateQuery = getUpdateQueryString(update);
                    if (insertQuery) {
                        query(getInsertQueryString(insert))
                            .then(res => {
                                //
                            })
                            .catch((query, err) => {
                                console.log('****************************');
                                console.log('insert error');
                                console.log(query);
                                console.log(err);
                                console.log('****************************');
                            });
                    }
                    if (updateQuery) {
                        query(getUpdateQueryString(update))
                            .then(res => {
                                //
                            })
                            .catch((query, err) => {
                                console.log('****************************');
                                console.log('update error');
                                console.log(query);
                                console.log(err);
                                console.log('****************************');
                            });
                    }
                    page++;
                    interval = issues_update_interval
                })
                .catch((query, mysqlError) => {
                    console.log('****************************');
                    console.log('数据库查询出错');
                    console.log(query);
                    console.log(mysqlError);
                    console.log('****************************');
                });
        })
        .catch(err => {
            // 数据请求失败，可能是接口请求数量达到最大值，休息30分钟后重试
            console.log('****************************');
            console.log('请求数量超出限制');
            console.log('****************************');
            interval = timeout_interval;
        });
}

function getMenus() {
    return query('SELECT label_id FROM menus');
}

// 获取menus
getMenus()
    .then(res => {
        menus = res.map(item => item.label_id);
        main();
    })
    .catch((query, mysqlError) => {
        console.log('****************************');
        console.log('menus error');
        console.log(query);
        console.log(mysqlError);
        console.log('****************************');
    });

setInterval(main, interval);