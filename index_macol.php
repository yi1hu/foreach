<?php
// 连接数据库
$link = mysqli_connect('localhost','root','123456','itc') or die('mysql connect is lost');
mysqli_query($link,'set names utf8');

$dir_r="E:/logg/excas02";
//$dir_r="E:/iis";

foreach(glob($dir_r."/*.log" ) as $file ) {
    $log = new SplFileObject($file);
//    echo "<br>".$file; //  文件路径
    foreach($log as $line){
        //这里操作每一行
        $mess = explode(' ',$line);
        $ou = substr($mess[9],0,10);  // 检测是否是 MacOutlook
        $uname =$mess[7];
        if($ou == "MacOutlook" && $uname!='-'){
            echo "<br>".$ou_mess = $mess[9];
            echo "<br>".$uip = $mess[8];
            echo "<br>".$uname =$mess[7];
            echo "<br>".$u_date = $mess[0]." ".$mess[1];
            echo "<br>".$udir = $file;
            echo "<br>============================<br>";
//            $rel = insert($u_date,$uname,$uip,$ou_mess);
//            if($rel ==1 ){
//                echo "1";
//            }
        }
    }
}


function insert($u_date,$uname,$uip,$ou_mess) {
    global $link;
    mysqli_query($link,"select * from macoutlook where uname='$uname'");
    $num = mysqli_affected_rows($link);
    if($num==0) {  // 不存在
        $rel = mysqli_query($link,"insert into macoutlook(uname,uip,mess,udate) VALUES ('$uname','$uip','$ou_mess','$u_date')");
        if($rel){
            return 1;
        }
    }
}
