<?php
/**
* @author coco
* @date 2016-04-22 00:17:04
* @todo 
*/
//初始化host  port
$serv = new swoole_http_server("127.0.0.1", 9502);
//on 挂载+实现  
//加载响应 并实现响应处理函数
//将requset 独立开，接受请求 解析url 转到应用层
$serv->on('Request', function($request, $response) {
    var_dump($request->get);
    var_dump($request->post);
    var_dump($request->cookie);
    var_dump($request->files);
    var_dump($request->header);
    var_dump($request->server);

    $response->cookie("User", "Swoole");
    $response->header("X-Server", "Swoole");
    $response->end("<h1>Hello Swoole!</h1>");
});
//开启服务
$serv->start();