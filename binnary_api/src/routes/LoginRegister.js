const express = require('express');
const UsersLR = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');

UsersLR.post("/Login", (req, res) => {
    const userdata = {
        username: req.body.username,
        email: req.body.email,
        password: req.body.password
    }
    connection.query(`SELECT * FROM users where username = '${userdata.username}' and password = '${userdata.password}' LIMIT 1`,
        function (err, row, fields) {
            if (err) {
                console.log(err);
            } else {
                if (row[0] !== undefined) {
                    // jwt.sign({row}, 'secretkey', {expiresIn: '3600s'},(err, token) => {
                    jwt.sign({ row }, 'secretkey', (err, token) => {
                        if (err) {
                            throw err;
                        } else {
                            connection.query(`UPDATE users SET DATE_LOGIN = CURRENT_TIMESTAMP() where username = '${userdata.username}' and password = '${userdata.password}'`,
                                function (err, row, field) {
                                    if (err) {
                                        console.log(err);
                                    } else {
                                        res.json(token);
                                    }
                                })
                        }
                    });
                } else {
                    res.json("Usuario o contraseña son incorrectas");
                }
            }
        });
});

UsersLR.post("/Register", (req, res) => {
    const ProfileDefault = 'http://localhost:3030/img/ProfileDefault.png'

    const userdata = {
        username: req.body.username,
        email: req.body.email,
        password: req.body.password,
        phone: req.body.phone
    }

    connection.query(`SELECT USERNAME,EMAIL FROM users where username = '${userdata.username}' LIMIT 1`,
        function (err, rows, fields) {
            if (err) {
                console.log(err);
            } else {
                if (rows[0] !== undefined) {
                    if (rows[0].USERNAME === userdata.username) {
                        // res.sendStatus(400);
                        res.json({ message: "EL USERNAME YA ESTÁ EN USO" });
                    } else if (rows[0].EMAIL === userdata.email) {
                        // res.sendStatus(400);
                        res.json({ message: "El email ya se encuentra registrado" });
                    }

                } else {
                    const sql = `INSERT INTO users
                                 (Username,email,password,phone_number,profile_image,role,status,date_register)
                                  values 
                                ('${userdata.username}','${userdata.email}','${userdata.password}','${userdata.phone}','${ProfileDefault}','1','1',CURRENT_TIMESTAMP())`;
                    connection.query(sql,
                        function (err, rows, fields) {
                            if (err) {
                                console.log(err);
                            } else {
                                res.json("Usuario registrado");
                            }
                        });
                }
            }
        });
});

module.exports = UsersLR;