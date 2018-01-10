/**
 * Created by baidu on 2018/1/10.
 */
const mysql = require('mysql');

const conn = mysql.createConnection({
    host: '127.0.0.1',
    user: 'homestead',
    password: 'secret',
    database: 'com_zhouqihang'
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