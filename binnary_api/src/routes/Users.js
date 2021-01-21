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

module.exports = User;