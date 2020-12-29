const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'red',
    multipleStatements: true
});

connection.connect(e => {
    if (e) {
        console.error(e);
        return;
    } else {
        console.log('Database is Online!!!');
    }
});

module.exports = connection;