<?php
set_time_limit(0);
#$stream=1;
require_once 'db.connect.php';
require_once 'function.php';
$load_dir="/home/sled/vk/in/";
$stream=2;
#echo 1;
$sql_get_file="select id, name from loadd_file where dict_load_file_id=1 and source_id='4' and stream='$stream'";
$db_get_file=mysqli_query($connect, $sql_get_file);
//var_dump($db_get_file);
while($array_get_file=mysqli_fetch_assoc($db_get_file))
{

  $load_file=$load_dir.$array_get_file['name'];
  if(is_readable($load_file))
  {
    vk_parser($load_file, $connect);
     $sql_file_id=$array_get_file['id'];
     $sql_update_status="update loadd_file set dict_load_file_id=3 where id='$sql_file_id'";
    mysqli_query($connect, $sql_update_status);
     $rename_load="/home/sled/vk/load/";
     echo $load_file ."\n";
   #  echo $rename_load.$array_get_file['name'];
   #  echo "\n";
   rename($load_file, $rename_load.$array_get_file['name']);
  // mysqli_close($connect);

}
  else
  {
    echo "невозможно прочитать чайл " .$load_file."\n";

}
}
 //mysqli_close($connect);
 ?>
