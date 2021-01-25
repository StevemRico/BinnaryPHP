const { json } = require('body-parser');
const express = require('express');
const Messages = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

Messages.get('/Messages', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql = `SELECT * FROM chat
                     INNER JOIN message
                     ON chat.id_chat = message.id_chat
                     WHERE id_user = ${authdata.row[0].id_user}
                     GROUP BY chat.id_chat`;
        connection.query(sql, (err, row) => {
            if(err){
                console.log(err);
            }else{
                res.json(row);
            }
        });
    });
});

Messages.post('/Messages', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const Message = {
            message: req.body.message,
            id_receiver: req.body.receiver
        }
        
    });
});

Messages.delete('/Messages/:id', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql = ` UPDATE message set message_status = '0' WHERE id_emmiter = ${authdata.row[0].id_user}`;
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