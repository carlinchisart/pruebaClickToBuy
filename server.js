var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

server.listen(6001);


io.on('connection', function(socket) {
    socket.on('order', function(message) {
        io.emit('order', message);
    });
});
