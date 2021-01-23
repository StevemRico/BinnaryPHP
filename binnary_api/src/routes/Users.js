const express = require('express');
const User = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

User.get('/Users/Header', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        if(authdata){
            console.log(authdata.row[0]);
            const sql = `SELECT id_user,username,profile_image FROM users WHERE ID_USER = '${authdata.row[0].id_user}'`;
            connection.query(sql, (err, row) => {
                if (err) {
                    console.log(err);
                } else {
                    res.json({user: row});
                }
            });

        }else{
            res.json({user: 'No existe session alguna'});
        }
    });
});

module.exports = User;