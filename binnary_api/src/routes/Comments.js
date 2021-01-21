const express = require('express');
const Comments = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

Comments.post('/Publication/Comment', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const Comment = {
        id_publication: req.body.id_publication,
        text: req.body.text
      };
      console.log(Comment);
      const sql = `INSERT INTO comments (id_user,id_publication,text) values ('${authdata.row[0].id_user}','${Comment.id_publication}','${Comment.text}')`;
      connection.query(sql, (err, row) => {
        if (err) {
          throw err;
        } else {
          res.json({ message: "Comentario enviado" });
        }
      });
    }
  });
});

Comments.get('/Publication/Comment', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    const Comment = { id_publication: req.body.id_publication };
    if (err) {
      throw err;
    } else {
      const sql = `SELECT Publi.id_publication,comm.id_comment,comm.id_user,comm.text,comm.created_at FROM comments comm
                    INNER JOIN publications Publi
                    ON comm.id_publication = Publi.id_publication
                    WHERE Publi.publication_state = 1 AND Publi.id_publication = ${Comment.id_publication};`;
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

module.exports = Comments;