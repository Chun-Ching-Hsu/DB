<!-- 之後可能會用到吧 -->

<?php
    $hostname="localhost";
    $username="root";
    $password="123456789";
    $database="job";
    $link = mysqli_connect($hostname,$username,$password);
    // mysqli_query($link,"SET NAMES 'UTF8'");
    // mysqli_select_db($link,$database) or die ("無法選擇資料庫");
    if($link){
        mysqli_query($link, "SET NAMES utf8");
    }
    else{
        echo '無法連線mysql資料庫 :<br/>' . mysqli_connect_error();
    }
?>