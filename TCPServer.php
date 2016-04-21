<?php
/**
* @author coco
* @date 2016-04-22 00:45:07
* @todo 
*/

$serv = new swoole_server("127.0.0.1", 9501);
$serv->set(array(
    'worker_num' => 8,   //工作进程数量
    'daemonize' => 0, //是否作为守护进程
));
$serv->on('connect', function ($serv, $fd){
    echo "Client:Connect.\n";
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, 'Swoole: '.$data);
    //$serv->close($fd);
});
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});
$serv->start();
