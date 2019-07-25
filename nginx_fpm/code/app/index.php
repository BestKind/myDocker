<?php

$a = 'app';
echo $a . PHP_EOL;

$dbms='mysql';     //数据库类型
$host='10.10.10.1'; //数据库主机名
$dbName='test';    //使用的数据库
$user='app';      //数据库连接用户名
$pass='123456';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
//    echo "连接成功<br/>";
    /*你还可以进行一次搜索操作
    foreach ($dbh->query('SELECT * from FOO') as $row) {
        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    }
    */
    $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('10.10.10.4', 6379);
echo "Connection to server successfully" . PHP_EOL;
     //查看服务是否运行
echo "Server is running: " . $redis->ping() . PHP_EOL;

phpinfo();