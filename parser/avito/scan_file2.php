<?php
set_time_limit(0);
require_once '../config/db.connect.php';

$list_directori=scandir('/home/sled/avito/upload',SCANDIR_SORT_NONE);
$count_scan_file=1;
foreach ($list_directori as $key)
{
  $file="/home/sled/avito/upload/$key";
#  echo $file . "\n";
  if(is_file($file))
  {
       {
    #     echo $count_scan_file . "   ";
         if(($count_scan_file % 2)== 0)
            {
              $stream=1;
            }
            else $stream=2;
            echo $stream ."\n";
        $sql_insert_file="insert into loadd_file (name, stream, dict_load_file_id, source_id) value('$key', '$stream', 1, 2)";
    #    echo $sql_insert_file;
        mysqli_query($connect, $sql_insert_file);
        rename("/home/sled/avito/upload/$key", "/home/sled/avito/upload/in/$key");
        $count_scan_file++;
       }

  }
  // code...
}

 ?>
