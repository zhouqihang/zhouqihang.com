/**
 * Created by baidu on 2018/1/10.
 */
const HOST = 'https://api.github.com';
const ISSUES_URL = `${HOST}/repos/zhouqihang/zhouqihang.com/issues`;
const LABELS_URL = `${HOST}/repos/zhouqihang/zhouqihang.com/labels`;

// 每6小时更新一次label
const LABELS_UPDATE_INTERVAL = 1000 * 60 * 60 * 6;
// 每1.5分钟更新一次issues，每次默认更新30条
const ISSUES_UPDATE_INTERVAL = 1000 * 60 * 1.5;
const TIMEOUT_INTERVAL = 1000 * 60 * 30;

const MYSQL_HOST = '127.0.0.1';
const MYSQL_USER = 'homestead';
const MYSQL_PWD = 'secret';
const MYSQL_DB = 'com_zhouqihang';

exports = module.exports = {};
exports.host = HOST;
exports.issues_url = ISSUES_URL;
exports.labels_url = LABELS_URL;
exports.label_update_interval = LABELS_UPDATE_INTERVAL;
exports.issues_update_interval = ISSUES_UPDATE_INTERVAL;
exports.timeout_interval = TIMEOUT_INTERVAL;
exports.mysql_host = MYSQL_HOST;
exports.mysql_user = MYSQL_USER;
exports.mysql_pwd = MYSQL_PWD;
exports.mysql_db = MYSQL_DB;