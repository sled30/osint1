<?php
set_time_limit(0);
require_once '../db.connect.php';
#echo 1;
$list_directori=scandir('/home/sled/upload',SCANDIR_SORT_NONE);
$count_scan_file=1;
foreach ($list_directori as $key)
{
  $file="/home/sled/upload/$key";
  #echo $file . "\n";
  if(is_file($file))
  {
       {
        echo $count_scan_file . "   ";
         if(($count_scan_file % 2)== 0)
            {
              $stream=1;
            }
            else $stream=2;
            echo $stream ."\n";
        $sql_insert_file="insert into loadd_file (name, stream, dict_load_file_id, source_id) value('$key', '$stream', 1, 3)";
        echo $sql_insert_file;
        mysqli_query($connect, $sql_insert_file);
        rename("/home/sled/upload/$key", "/home/sled/upload/in/$key");
        $count_scan_file++;
       }

  }
  // code...
}

 ?>
