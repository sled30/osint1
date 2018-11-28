<?php
set_time_limit(0);
require_once '../config/db.connect.php';

$list_directori=scandir('/var/www/html/upload',SCANDIR_SORT_NONE);
$count_scan_file=1;
foreach ($list_directori as $key)
{
  $file="/var/www/html/upload/$key";
  #echo $file . "\n";
  if(is_file($file))
  {
    $sql_find_file="select id from loadd_file where name='$key'";
    $db_find_file=mysqli_query($connect, $sql_find_file);
    $array_find_file=mysqli_fetch_assoc($db_find_file);

    if(!isset($array_find_file['id']))
       {
         #echo $count_scan_file . "   ";
         if(($count_scan_file % 2)== 0)
            {
              $stream=1;
            }
            else $stream=2;
          #  echo $stream ."\n";
        $sql_insert_file="insert into loadd_file (name, stream, dict_load_file_id, source_id) value('$key', '$stream', 1, 1)";
        #echo $sql_insert_file;
        mysqli_query($connect, $sql_insert_file);
        rename("/var/www/html/upload/$key", "/var/www/html/upload/in/$key");
        $count_scan_file++;
       }

  }
  // code...
}

 ?>
