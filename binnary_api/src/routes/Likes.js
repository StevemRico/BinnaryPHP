const express = require('express');
const Likes = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

Likes.post('/Publication/Like', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const sql = `SELECT * FROM Likes WHERE ID_USER = '${authdata.row[0].ID_USER}'`;
      connection.query(sql, (err, row) => {
        if (row[0].ID_USER) {
          res.json({ message: "No se puede agregar doble like" });
        } else {
          const sql = `INSERT INTO likes (ID_USER) values ('${authdata.row[0].ID_USER}')`;
          connection.query(sql, (err, row) => {
            if (err) {
              throw err;
            } else {
              res.json({ message: "Like añadido" });
            }
          });
        }
      });
    }
  });
});

Likes.delete('/Publication/Like', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const sql = `DELETE FROM Likes WHERE ID_USER = '${authdata.row[0].ID_USER}'`;
      connection.query(sql, (err, row) => {
        if (err) {
          throw err;
        } else {
          res.json({ message: "Like eliminado" })
        }
      });
    }
  })
});

Likes.get('/Publication/Like', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const sql = `SELECT COUNT(ID_LIKE) FROM Likes`;
      connection.query(sql, (err, row) => {
        if (err) {
          throw err;
        } else {
          res.json(row);
        }
      });
    }
  });
});

module.exports = Likes;