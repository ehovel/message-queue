<?php
$bindingkey='key2';
//连接RabbitMQ
$conn_args = array( 'host'=>'127.0.0.1' , 'port'=> '5672', 'login'=>'guest' , 'password'=> 'guest');
$conn = new AMQPConnection($conn_args);
$conn->connect();
//设置queue名称，使用exchange，绑定routingkey
$channel = new AMQPChannel($conn);
$q = new AMQPQueue($channel);
$q->setName('queue2');
$q->setFlags(AMQP_DURABLE);
$q->declare();
$q->bind('exchange',$bindingkey);
//消息获取
$messages = $q->get(AMQP_AUTOACK) ;
if ($messages){
var_dump(json_decode($messages->getBody(), true ));
}
$conn->disconnect();
