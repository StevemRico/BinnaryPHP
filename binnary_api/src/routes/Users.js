const express = require('express');
const User = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

User.get('/Users/Header', (req, res) => {
    jwt.verify(req.token, 'secretkey', (err, authdata) => {
        if(authdata){
            res.json({authdata});
        }else{
            res.json({user: 'No existe session alguna'});
        }
    });
});

module.exports = User;