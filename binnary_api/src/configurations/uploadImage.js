const path = require('path');
const fs = require('fs');
const multer = require('multer');
const storage = multer.diskStorage({
  destination: path.join(__dirname, '../public/img'),
    filename: function (req, file, cb) {
      cb(null, file.fieldname + '-' + Date.now() + '.' +file.mimetype.split('/')[1]);
    }
  });
   
const upload = multer({ storage: storage })


module.exports = {
    path,
    fs,
    multer,
    upload
};