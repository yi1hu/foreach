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
            }
        }
    }
}

