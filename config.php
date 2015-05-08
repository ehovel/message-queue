<?php


/*
return array(
	'driver' => 'RedisQueue',
	'driverInfo' => array(
			'host' => '127.0.0.1',
			'port' => 6379
	)	
);
*/

/*
return array(
	'driver' => 'MongodbQueue',
	'driverInfo' => array(
			'server' => "mongodb://127.0.0.1:27017",
			'server_options' => array()
	)
);*/

return array(
		'driver' => 'MemcachedQueue',
		'driverInfo' => array(
				'host' => "127.0.0.1",
				'post' => 11211
		)
);