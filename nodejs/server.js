const io = require('socket.io').listen(3000);
const redis = require('redis');
const redisClient = redis.createClient();
redisClient.subscribe('orders.update');
redisClient.subscribe('orders.store');
redisClient.subscribe('methods.update');
redisClient.subscribe('drivers.update');
redisClient.subscribe('entries.update');
redisClient.subscribe('entries.all');
redisClient.subscribe('entries.status');
redisClient.subscribe('entries.delete');
redisClient.subscribe('entries.store');
redisClient.subscribe('groups.update');
redisClient.subscribe('groups.store');
redisClient.subscribe('batches.store');
redisClient.subscribe('batches.update');
redisClient.on('message', function(channel, message) {
	
	io.sockets.emit(channel, message);
});
