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
      const sql = `SELECT Publi.id_publication,user.profile_image,USER.username,File FROM publications Publi
                   INNER JOIN users USER
                   ON Publi.id_user = user.id_user
                   WHERE Publi.publication_state = 1
                   ORDER BY id_publication desc`;
      connection.query(sql, (err, rows) => {
        if (err) {
          throw err;
        } else {
          res.json(rows);
        }
      });
    }
  });
});

Publication.get('/Publications/:id', (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const { id } = req.params;
      const sql = `SELECT Publi.id_publication,user.profile_image,USER.username,File FROM publications Publi
                   INNER JOIN users USER
                   ON Publi.id_user = user.id_user
                   WHERE Publi.id_publication = ${id} AND Publi.publication_state = 1`;
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

Publication.post('/Publications', upload.single('file'), (req, res) => {
  jwt.verify(req.token, 'secretkey', (err, authdata) => {
    if (err) {
      throw err;
    } else {
      const file = 'http://localhost:3030/' + req.file.path.split('\\')[6] + '/' + req.file.path.split('\\')[7];
      console.log(req.file);
      const PublicationPost = {
        description: req.body.description,
        file: file
      }

      const sql = `INSERT INTO Publications
                  (id_user,description,file,publication_state)
                   Values 
                  (${authdata.row[0].id_user},'${PublicationPost.description}',
                  '${PublicationPost.file}',1)`;
      connection.query(sql, (err, row) => {
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
      const sql = `UPDATE Publications 
                   SET publication_state = 0, updated_at = CURRENT_TIMESTAMP()
                   WHERE id_publication = ${id} and id_user = ${authdata.row[0].id_user}`;
      connection.query(sql, (err, rows, fields) => {
        if (err) {
          throw err;
        } else {
          res.json({
            message: "Publicacion Delete",
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
      const sql = `UPDATE Publications
                   SET description = '${PublicacionPut.description}', file = '${PublicacionPut.file}'
                   WHERE ID_PUBLICATION = ${id} and PUBLICATION_USER_ID = ${authdata.row[0].ID_USER}`;
      // console.log(authdata.row[0].ID_USER);
      connection.query(sql, (err, row, fields) => {
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

module.exports = Publication;