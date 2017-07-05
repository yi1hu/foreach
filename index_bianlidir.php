<?php
$dir_r="E:/log/";
listDir($dir_r);
// 遍历 目录和目录下的文件
function listDir($dir){
    if ($dh = opendir($dir)){     //opendir()返回一个目录句柄,失败返回false
        while (($file = readdir($dh)) !== false){   //readdir()返回打开目录句柄中的一个条目
            $sub_dir = $dir.$file;//构建子目录路径
            if($file=="." || $file=="..") {
                continue;
            }else if(is_dir($sub_dir)){
                $sub_dir = $sub_dir."/";  // 给目录加一个 /
                listDir($sub_dir);
            }else{
                echo $sub_dir."<br>";   // 整个文件路径
//                echo $file."<br>";      // 文件名称
//                listMess($sub_dir);
            }
        }
    }
}
// 获取文件内容，并放入到数组中
function listMess($sub_dir){
    $myfile = fopen($sub_dir,"r") or die("fopen fail");
    $conn = array();
    $i = 0;   //  循环，把每一行的数据写入到 数组中
    while (!feof($myfile)) {
        $conn[$i] = fgets($myfile);
        $i++;
    }
    fclose($myfile);
    $conn = array_filter($conn);
    var_dump($conn);
//    VMess($conn,$sub_dir);
}
