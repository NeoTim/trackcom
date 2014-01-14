const io = require('socket.io').listen(3000);
const redis = require('redis');
const redisClient = redis.createClient();
redisClient.subscribe('entries.update');
redisClient.subscribe('entries.delete');
redisClient.subscribe('entries.store');
redisClient.on('message', function(channel, message) {
io.sockets.emit(channel, message);
});
