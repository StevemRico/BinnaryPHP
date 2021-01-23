const express = require('express');
const Messages = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

Messages.get('/Messages', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        const sql = `SELECT sala.id_sala,user.id_user,user.username,user.profile_image FROM sala
                     JOIN users USER
                     ON sala.id_emmiter != USER.id_user OR sala.id_receiver != USER.id_user
                     WHERE sala.id_emmiter != '${authdata.row[0].id_user}' or sala.id_receiver != '${authdata.row[0].id_user}'
                     GROUP BY sala.id_sala`;
        connection.query(sql, (err, row) => {
            if (err) {
                console.log(err);
            } else {
                if (row[0] === undefined) {
                    res.json({ message: [{ no: 'No tienes conversaciones aún' }] });
                } else {
                    const sql2 = `SELECT sala.id_sala,sala.id_emmiter,sala.id_receiver,mess.id_message,mess.message,mess.created_at,users.id_user,users.username,users.profile_image FROM sala
                                  LEFT JOIN message mess
                                  ON sala.id_sala = mess.id_sala
                                  INNER JOIN users
                                  ON sala.id_emmiter = users.id_user
                                  WHERE sala.id_emmiter = ${authdata.row[0].id_user} or sala.id_receiver = ${authdata.row[0].id_user}`;
                    connection.query(sql2, (err, row2) => {
                        if (err) {
                            console.log(err);
                        } else {
                            res.json({
                                'message': row2
                            });
                        }
                    });
                }
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
        const sql = `SELECT * FROM sala where id_emmiter = '${authdata.row[0].id_user}' and id_receiver = '${Message.id_receiver}' or id_receiver = '${authdata.row[0].id_user}' and id_emmiter = '${Message.id_receiver}'`;
        connection.query(sql, (err, sala) => {
            if (err) {
                console.log(err);
            } else {
                if (sala[0] === undefined) {
                    const sql2 = `INSERT INTO sala (id_emmiter,id_receiver) values ('${authdata.row[0].id_user}','${Message.id_receiver}')`;
                    connection.query(sql2, (err, salaI) => {
                        if (err) {
                            console.log(err);
                        } else {
                            const sql4 = `SELECT * FROM sala where id_emmiter = '${authdata.row[0].id_user}' or id_receiver = '${authdata.row[0].id_user}'`;
                            connection.query(sql4, (err, row) => {
                                if (err) {
                                    console.log(err);
                                } else {
                                    const sql3 = `INSERT INTO message
                                          (message,message_status,id_sala)
                                          values
                                          ('${Message.message}','1',${row[0].id_sala})`;
                                    connection.query(sql3, (err, mess, fields) => {
                                        if (err) {
                                            console.log(err);
                                        } else {
                                            res.json('Mensaje enviado');
                                        }
                                    });
                                }
                            });
                        }
                    });
                } else {
                    const sql3 = `INSERT INTO message
                     (message,message_status,id_sala)
                     values
                     ('${Message.message}','1',${sala[0].id_sala})`;
                    connection.query(sql3, (err, mess, fields) => {
                        if (err) {
                            console.log(err);
                        } else {
                            res.json('Mensaje enviado');
                        }
                    });
                }
            }
        });
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