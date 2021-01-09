const express = require('express');
const Publication = express.Router();
const jwt = require('jsonwebtoken');
const connection = require('../configurations/conection');
const { upload } = require('../configurations/uploadImage');

Publication.get('/Publications', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      connection.query('SELECT * FROM Publications WHERE publication_state = 1', (err, rows, fields) => {
          if (err) {
            throw err;
          } else {
            res.json({publications: rows});
          }
        });
    }
  });
  const sql = 'SELECT * FROM Publications WHERE publication_state = 1';
});

Publication.get('/Publications/:id', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const { id } = req.params;
      connection.query(`SELECT * FROM publications WHERE ID_PUBLICATION = ${id} and publication_state = 1`, (err, row) => {
        if (err) {
          throw err;
        } else {
          res.json(row);
        }
      });
    }
  });
});

Publication.post('/Publications', upload.single('file'), (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const file = req.file.path.split('\\')[3] + '/' + req.file.path.split('\\')[4] + '/' + req.file.path.split('\\')[5];
      console.log(req.file);
      const PublicationPost = {
        description: req.body.description,
        file: file
      }
      connection.query(`INSERT INTO Publications (PUBLICATION_USER_ID,Description,File,publication_state,CREATED_AT,UPDATED_AT) Values (${authdata.row[0].ID_USER},'${PublicationPost.description}','${PublicationPost.file}',1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())`,
        (err, row) => {
          if (err) {
            throw err;
          } else {
            res.json("Publicacion realizada con exito");
          }
        });
    }
  });
});

Publication.delete('/Publications/:id', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const { id } = req.params;
      connection.query(`
      UPDATE Publications 
        SET publication_state = '0', updated_at = CURRENT_TIMESTAMP()
      WHERE id_publication = ${id} and PUBLICATION_USER_ID = ${authdata.row[0].ID_USER}`, (err, rows, fields) => {
        if (err) {
          throw err;
        } else {
          res.json({
            messag: "Publicacion Delete",
            rows
          });
        }
      });
    }
  });
});

Publication.put('/Publications/:id', upload.single('file'), (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const file = req.file.path.split('\\')[3] + '/' + req.file.path.split('\\')[4] + '/' + req.file.path.split('\\')[5];
      const PublicacionPut = {
        description: req.body.description,
        file: file
      }
      const { id } = req.params;
      console.log(authdata.row[0].ID_USER);
      connection.query(`
        UPDATE Publications
          SET description = '${PublicacionPut.description}', file = '${PublicacionPut.file}'
        WHERE ID_PUBLICATION = ${id} and PUBLICATION_USER_ID = ${authdata.row[0].ID_USER}`, (err, row, fields) => {
        if (err) {
          throw err;
        } else {
          res.json('Publicacion Updated');
          console.log(row);
        }
      });
    }
  })
});

Publication.post('/Publication/Comment', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    const Comment = { text: req.body.text, id_publication : req.body.id_publication };
    if (err) {
      throw err;
    } else {
      connection.query(`INSERT INTO comments (COMMET_USER_ID,COMMENT_PUBLICATION_ID,TEXT,CREATED_AT) values ('${authdata.row[0].ID_USER}','${Comment.id_publication}','${Comment.text}',CURRENT_TIMESTAMP())`, (err, row) => {
        if (err) {
          throw err;
        } else {
          res.json({ message: "Comentario enviado" });
        }
      });
    }
  });
});

Publication.get('/Publication/Comment', (req,res) => {
  jwt.verify(req.token, 'secretkey', (err,authdata) => {
    const Comment = {id_publication: req.body.id_publication};
    if(err){
      throw err;
    }else{
      connection.query(`SELECT * FROM comments where COMMENT_PUBLICATION_ID = '${Comment.id_publication}'`, (err,row) => {
        if(err){
          throw err;
        }else{
          res.json(row);
        }
      });
    }
  });
});

Publication.post('/Publication/Like', (req,res) => {
  jwt.verify(req.token, 'secretkey', (err,authdata) => {
    if(err){
      throw err;
    }else{
      connection.query(`SELECT * FROM Likes WHERE ID_USER = '${authdata.row[0].ID_USER}'`, (err,row) => {
        if(row[0].ID_USER){
          res.json({message: "No se puede agregar doble like"});
        }else{
          connection.query(`INSERT INTO likes (ID_USER) values ('${authdata.row[0].ID_USER}')`, (err,row) => {
            if(err){
              throw err;
            }else{
              res.json({message: "Like añadido"});
            }
          });
        }
      });
    }
  });
});

Publication.delete('/Publication/Like', (req,res) => {
  jwt.verify(req.token, 'secretkey', (err,authdata) => {
    if(err){
      throw err;
    }else{
      connection.query(`DELETE FROM Likes WHERE ID_USER = '${authdata.row[0].ID_USER}'`, (err, row) => {
        if(err){
          throw err;
        }else{
          res.json({message: "Like eliminado"})
        }
      });
    }
  })
});

Publication.get('/Publication/Like', (req,res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if(err){
      throw err;
    }else{
      connection.query(`SELECT COUNT(ID_LIKE) FROM Likes`, (err,row) => {
        if(err){
          throw err;
        }else{
          res.json(row);
        }
      });
    }
  });
});

module.exports = Publication;