const express = require('express');
const User = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

User.get('/Users/Header', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql = `SELECT id_user,username,profile_image FROM users WHERE ID_USER = '${authdata.row[0].ID_USER}' and STATUS = '1'`;
        connection.query(sql, (err, row) => {
            if (err) {
                console.log(err);
            } else {
                res.json({user: row});
            }
        });
    });
});

User.post('/Messages/:id', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const Message = {
            Message: req.body.Message,
            id_receiver : req.body.Receiver
        }
        const sql = `INSERT INTO message
                    (id_emmiter,id_receiver,Message,created_at)
                    values
                    ('${authdata.row[0].ID_USER}','${Message.id_receiver}','${Message.Message}',CURRENT_TIMESTAMP())` ;
        connection.query(sql, (err, row, fields) => {
            if (err) {
                console.log(err);
            } else {
                res.json('Mensaje enviado');
            }

        });
    });
});

User.get('/Messages', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql =  `SELECT * FROM MESSAGE WHERE ID_EMMITER = '${authdata.row[0].ID_USER}' or ID_RECEIVER = '${authdata.row[0].ID_USER}' and STATUS = '1'` ;
        connection.query(sql, (err, row) => {
            if (err) {
                console.log(err);
            } else {
                res.json(row);
            }
        });
    });
});

User.delete('/Messages/:id', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql = `SELECT * FROM MESSAGE WHERE ID_EMMITER = '${authdata.row[0].ID_USER}' or ID_RECEIVER = '${authdata.row[0].ID_USER}'` ;
        connection.query(sql, (err, row) => {
            if (err) {
                console.log(err);
            } else {
                res.json(row);
            }
        });
    });
});

module.exports = User;