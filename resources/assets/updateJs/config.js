/**
 * Created by baidu on 2018/1/10.
 */
const HOST = 'https://api.github.com';
const ISSUES_URL = `${HOST}/repos/ant-design/ant-design/issues`;
const LABELS_URL = `${HOST}/repos/ant-design/ant-design/labels`;

// 每6小时更新一次label
const LABELS_UPDATE_INTERVAL = 1000 * 60 * 60 * 6;
// 每1.5分钟更新一次issues，每次默认更新30条
const ISSUES_UPDATE_INTERVAL = 1000 * 60 * 1.5;
const TIMEOUT_INTERVAL = 1000 * 60 * 30;

exports = module.exports = {};
exports.host = HOST;
exports.issues_url = ISSUES_URL;
exports.labels_url = LABELS_URL;
exports.label_update_interval = LABELS_UPDATE_INTERVAL;
exports.issues_update_interval = ISSUES_UPDATE_INTERVAL;
exports.timeout_interval = TIMEOUT_INTERVAL;