const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: 'binnary',
    multipleStatements: true
});

connection.connect(err => {
    if (err) {
        console.error(err);
        return;
    } else {
        console.log('Database is Online!!!');
    }
});

module.exports = connection;