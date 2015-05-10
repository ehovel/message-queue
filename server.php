<?php
$routingkey='key';
//设置你的连接
$conn_args = array('host' => 'localhost', 'port' => '5672', 'login' => 'guest', 'password' => 'guest');
$conn = new AMQPConnection($conn_args);
if ($conn->connect()) {
    echo "Established a connection to the broker \n";
}
else {
    echo "Cannot connect to the broker \n ";
}
//你的消息
$message = json_encode(array('Hello World3!','php3','c++3:'));
//创建channel
$channel = new AMQPChannel($conn);
//创建exchange
$ex = new AMQPExchange($channel);
$ex->setName('exchange');//创建名字
$ex->setType(AMQP_EX_TYPE_DIRECT);
$ex->setFlags(AMQP_DURABLE);
//$ex->setFlags(AMQP_AUTODELETE);
//echo "exchange status:".$ex->declare();
echo "exchange status:".$ex->declareExchange();
echo "\n";
for($i=0;$i<100;$i++){
        if($routingkey=='key2'){
                $routingkey='key';
        }else{
                $routingkey='key2';
        }
        $ex->publish($message,$routingkey);
}
