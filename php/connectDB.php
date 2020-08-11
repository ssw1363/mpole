<?php
function isConnectDb($db)
{
  $db['host'] = '127.0.0.1';
  $db['user'] = 'root';
  $db['pass'] = '123456';
  $db['name'] = 'tutorial_php';
  
  // $db['host'] = 'localhost';
  // $db['user'] = 'mpolesystem';
  // $db['pass'] = '7842mpole7842';
  // $db['name'] = 'mpolesystem';
  // $db['port'] = '';
  
    $conn = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['name']);
    mysqli_set_charset($conn, "utf8");  // DB설정이 잘못되어 euc-kr 로 되어 있으면 문제가 됨
    if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
       exit;
    } else {
      return $conn;   
    }
}
?>