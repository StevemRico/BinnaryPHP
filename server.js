const express = require('express');
const app = express();


const http= require('http').createServer(app);

const io=require('socket.io')(http);
        io.on('connection',function (socket){
        console.log('User connected', socket.id)
        });

http.listen(3000,()=>{
    console.log('server started')
})

