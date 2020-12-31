const express = require('express');
const Publication = express.Router();
const jwt = require('jsonwebtoken');
const connection  = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

// GET PUBLICATIONS
Publication.get('/Publications', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if(err){
        res.sendStatus(403);
    }else{
      connection.query(
        'SELECT * FROM Publications WHERE publication_state = 1',(err, rows, fields) => {
          if(err) {
            console.log(err);
          } else {
            res.json(rows);
          }
      });
    }
  });
});

// GET Unique
Publication.get('/Publications/:id', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if(err){
        res.sendStatus(403);
    }else{
      const { id } = req.params;
      connection.query(`SELECT * FROM publications WHERE ID_PUBLICATION = ${id} and publication_state = 1`, (err, row) => {
        if (err) {
          console.log(err);
        } else {
          res.json(row);
        }
      });
    }
  });
});

// INSERT
Publication.post('/Publications', upload.single('file'), (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if(err){
        res.sendStatus(403);
    }else{
      const file = req.file.path.split('\\')[3] + '/' + req.file.path.split('\\')[4] + '/' + req.file.path.split('\\')[5];
      const PublicationPost = {
        description : req.body.description,
        file: file
      }
      connection.query(`INSERT INTO Publications (PUBLICATION_USER_ID,Description,File,publication_state,CREATED_AT,UPDATED_AT) Values ('${authdata.row[0].ID_USER}','${PublicationPost.description}','${PublicationPost.file}',1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())`,
      (err, row) => {
        if (err) {
          console.log(err);
        } else {
          res.json("Publicacion realizada con exito");
        }
      });
    }
  });
});

// DELETE 
Publication.delete('/Publications/:id', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if(err){
      res.sendStatus(403);
    }else{
      const { id } = req.params;
      connection.query(`
      UPDATE Publications 
        SET publication_state = '0', updated_at = CURRENT_TIMESTAMP()
      WHERE id_publication = ${id} and PUBLICATION_USER_ID = ${authdata.row[0].ID_USER}`, (err, rows, fields) => {
        if(err) {
          console.log(err);
        } else {
          res.json({messag: "Publicacion Delete",
                   rows});
        }
      });
    }
  });
});

// PUT
Publication.put('/Publications/:id', upload.single('file') ,(req, res) => {
  jwt.verify(req.token, 'secretkey', (err,authdata) => {
    if(err){
      console.log(err);
    }else{
      const file = req.file.path.split('\\')[3] + '/' + req.file.path.split('\\')[4] + '/' + req.file.path.split('\\')[5];
      const PublicacionPut = {
        description : req.body.description,
        file : file
      }
      const { id } = req.params;
      console.log(authdata.row[0].ID_USER);
      connection.query(`
        UPDATE Publications
          SET description = '${PublicacionPut.description}', file = '${PublicacionPut.file}'
        WHERE ID_PUBLICATION = ${id} and PUBLICATION_USER_ID = ${authdata.row[0].ID_USER}`, (err, row, fields) => {
        if(err) {
          console.log(err);
        } else {
          res.json('Publicacion Updated');
          console.log(row);
        }
      });
    }
  })
});

module.exports = Publication;