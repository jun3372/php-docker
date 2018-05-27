<?php

$redis = new Redis();
$redis->connect('redis', 6379);

 $redis->set("test", "Redis tutorial");
 var_dump( $redis->get('test'));

 ?>
