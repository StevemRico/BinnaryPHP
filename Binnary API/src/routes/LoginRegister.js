const express = require('express');
const UsersLR = express.Router();
const jwt = require('jsonwebtoken');
const connection  = require('../configurations/conection');

UsersLR.post("/Login", (req,res) => {
    const userdata = {
        username: req.body.username,
        email: req.body.email,
        password: req.body.password
    }
    connection.query(`SELECT * FROM users where username = '${userdata.username}' and password = '${userdata.password}' LIMIT 1`,
        function (err, row, fields) {
            if(err){ 
                console.log(err); 
            }else{
                if(row[0] !== undefined){
                    // jwt.sign({row}, 'secretkey', {expiresIn: '3600s'},(err, token) => {
                    jwt.sign({row}, 'secretkey', (err, token) => {
                        if(err){
                            throw err;
                        }else{
                            connection.query(`UPDATE users SET TOKEN = '${token}', DATE_LOGIN = CURRENT_TIMESTAMP() where username = '${userdata.username}' and password = '${userdata.password}'`,
                            function(err,row,field){
                                if(err){
                                    console.log(err);
                                }else{
                                    res.json({ token: token });
                                }
                            })
                        }
                    });
                }else{
                    res.json("Usuario o contraseña son incorrectas");
                }
            }
        });
});

UsersLR.post("/Register", (req,res) => {
    
    const userdata = {
        username: req.body.username,
        email: req.body.email,
        password: req.body.password,
        first_name: req.body.first_name,
        lastname: req.body.lastname,
    }

    connection.query(`SELECT USERNAME,EMAIL FROM users where username = '${userdata.username}' LIMIT 1`,
    function (err,rows,fields){
        if(err){
            console.log(err);
        }else{
            if(rows[0] !== undefined){
                if(rows[0].USERNAME === userdata.username){
                    // res.sendStatus(400);
                    res.send({message: "EL USERNAME YA ESTÁ EN USO"});
                }else if(row[0].EMAIL === userdata.email){
                    // res.sendStatus(400);
                    res.send({message: "El email ya se encuentra registrado"});
                }

            }else{
                connection.query(`INSERT INTO users (Username,email,password,first_name,lastname,role,date_register) values ('${userdata.username}','${userdata.email}','${userdata.password}','${userdata.first_name}','${userdata.lastname}','1',CURRENT_TIMESTAMP())`,
                    function (err, rows, fields) {
                        if(err){ 
                            console.log(err); 
                        }else{
                            res.json("Usuario registrado");
                        }
                    });
            }
        }
    });
});

module.exports = UsersLR;