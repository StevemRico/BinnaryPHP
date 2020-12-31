const express = require('express');
const verifyToken = require('./configurations/verifyToken');
const bodyParser = require('body-parser');
const { path } = require('./configurations/uploadImage');
const app = express();

// Settings
app.set('port', process.env.PORT || 3030);

// Middlewares
//app.use(express.json());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));
app.use(bodyParser.raw());
app.use(bodyParser.text());
app.use(express.static(path.join(__dirname, '../img')));

// Routes
app.use('/',require('./routes/LoginRegister'));
app.use('/',verifyToken,require('./routes/Users'));
app.use('/',verifyToken,require('./routes/Publications'));

// Starting the server
app.listen(app.get('port'), () => { console.log(`Server on port ${app.get('port')}`); });