/**
 * Created by baidu on 2018/1/10.
 */
const mysql = require('mysql');
const { mysql_host, mysql_user, mysql_pwd, mysql_db } = require('./config');

const conn = mysql.createConnection({
    host: mysql_host,
    user: mysql_user,
    password: mysql_pwd,
    database: mysql_db
});

conn.connect();
conn.query('set names utf8');

function query(query) {
    return new Promise((resolve, reject) => {
        conn.query(query, null, (err, rows, fields) => {
            if (err) {
                reject(query, err);
            }
            else {
                resolve(rows);
            }
        });
    });
}

module.exports = {
    query
};