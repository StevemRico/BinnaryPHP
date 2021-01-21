const express = require('express');
const Messages = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

Messages.get('/Messages', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql =  `SELECT * FROM message WHERE id_emmiter = '${authdata.row[0].ID_USER}' or id_receiver = '${authdata.row[0].ID_USER}' and message_status = '1'` ;
        connection.query(sql, (err, row) => {
            if (err) {
                console.log(err);
            } else {
                res.json(row);
            }
        });
    });
});

Messages.post('/Messages/:id', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const Message = {
            Message: req.body.Message,
            id_receiver : req.body.Receiver
        }
        const sql = `INSERT INTO message
                    (id_emmiter,id_receiver,message)
                    values
                    ('${authdata.row[0].id_user}','${Message.id_receiver}','${Message.Message}')` ;
        connection.query(sql, (err, row, fields) => {
            if (err) {
                console.log(err);
            } else {
                res.json('Mensaje enviado');
            }

        });
    });
});

Messages.delete('/Messages/:id', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql = ` UPDATE message set message_status = '0' WHERE id_emmiter = ${authdata.row[0].id_user}` ;
        connection.query(sql, (err, row) => {
            if (err) {
                console.log(err);
            } else {
                res.json(row);
            }
        });
    });
});

module.exports = Messages;