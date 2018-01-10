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

function getInsertQueryString(arr) {
    if (arr.length === 0) {
        return null;
    }
    const resArray = arr.map(item => `("${item.title}", ${item.labels[0] ? item.labels[0].id : 2}, ${item.id}, "${item.body}", "${item.created_at}", "${item.updated_at}")`);
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
        fields.menu_id += `WHEN ${item.id} THEN ${item.labels[0] ? item.labels[0].id : 0} `;
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

function main() {
    axios.get(`${issues_url}?page=${page}`)
    // 1.查找30条数据
        .then(({data}) => {
            if (data.length === 0) {
                page = 1;
                return ;
            }
            data = data.map(item => {
                item.title = Base64.encode(item.title);
                item.created_at = moment(item.created_at).format('YYYY-MM-DD HH:mm:ss');
                item.updated_at = moment(item.updated_at).format('YYYY-MM-DD HH:mm:ss');
                item.body = Base64.encode(marked(item.body));
                return item;
            });
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
                .then(({update, insert}) => {
                    // console.log('***************************************');
                    // console.log(getInsertQueryString(insert));
                    // console.log(getUpdateQueryString(update));
                    // console.log('***************************************');
                    const insertQuery = getInsertQueryString(insert);
                    const updateQuery = getUpdateQueryString(update);
                    if (insertQuery) {
                        query(getInsertQueryString(insert))
                            .then(res => {
                                console.log('insertOK', res);
                            })
                            .catch((query, err) => {
                                console.log('insertError', query);
                            });
                    }
                    if (updateQuery) {
                        query(getUpdateQueryString(update))
                            .then(res => {
                                console.log('updateOK', res);
                            })
                            .catch((query, err) => {
                                console.log('updateError', query);
                            });
                    }
                    page++;
                    interval = issues_update_interval
                })
                .catch((query, mysqlError) => {
                    console.log('数据库查询出错', query);
                });
        })
        .catch(err => {
            // 数据请求失败，可能是接口请求数量达到最大值，休息30分钟后重试
            console.log('请求数量超出限制');
            interval = timeout_interval;
        });
}

main();

setInterval(main, interval);