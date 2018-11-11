<?php
set_time_limit(0);
require_once '../config/db.connect.php';

$list_directori=scandir('/var/www/html/upload',SCANDIR_SORT_NONE);
$count_scan_file=1;
foreach ($list_directori as $key)
{
  if(!is_dir($key))
  {
    $sql_find_file="select id from loadd_file where name='$key'";
    $db_find_file=mysqli_query($connect, $sql_find_file);
    $array_find_file=mysqli_fetch_assoc($db_find_file);

    if(!isset($array_find_file['id']))
       {
         echo $count_scan_file . "   ";
         if(($count_scan_file % 2)== 0)
            {
              $stream=1;
            }
            else $stream=2;
            echo $stream ."\n";
        $sql_insert_file="insert into loadd_file (name, load_info, stream) value('$key', 1, '$stream')";
        mysqli_query($connect, $sql_insert_file);
        rename('/var/www/html/upload/'.$key, '/var/www/html/upload/in/'.$key);
        $count_scan_file++;
       }

  }
  // code...
}
/*
$readfile=fopen("1.csv", "r");
$count=0;
while (!feof($readfile))
 {
$date=fgetcsv($readfile, 0, ",");

/*блок сохранения машины*//*
if(!isset($date[3]))
{
  $date[3]='';
}
if(!isset($date[1]))
        {
        $date[1]='';
        }
/*блок сохранения машины*//*
for($i=0; $i<14; $i++)
        {
         $date[$i]=trim($date[$i]);
         $date[$i]=mysqli_real_escape_string($connect, $date[$i]);
        // echo $date[$i];
         }
$sql_select_avto_name="select id from avito_name_avto where model='$date[0]'
and year_of_manufacture='$date[1]' and version='$date[3]' and type='$date[4]' and actuator='$date[5]'
and body_type='$date[6]' and rudder='$date[7]'";
$db_select_avto=mysqli_query($connect, $sql_select_avto_name);
$select_avto=mysqli_fetch_assoc($db_select_avto);
$id_avto_avito=$select_avto['id'];
if(!$id_avto_avito)
  {
    $sql_insert_avto_name="insert into avito_name_avto (model, year_of_manufacture, version, type, actuator, body_type, rudder)
    value('$date[0]', '$date[1]', '$date[3]', '$date[4]', '$date[5]', '$date[6]', '$date[7]')";
    mysqli_query($connect, $sql_insert_avto_name);
    $id_avto_avito=mysqli_insert_id($connect);
  }
/*данные машины сохранил конец блока*/
/*блок сохранения телефона*//*
$sql_select_avito_phone="select id from phone where phone_number='$date[13]'";
$db_select_avito_phone=mysqli_query($connect, $sql_select_avito_phone);
$select_avito_phone=mysqli_fetch_assoc($db_select_avito_phone);
$id_phone=$select_avito_phone['id'];
  if(!$id_phone)
    {
      $sql_insert_avito_phone="insert into phone(phone_number) value('$date[13]')";
      mysqli_query($connect, $sql_insert_avito_phone);
      $id_phone=mysqli_insert_id($connect);
    }
/*телефон сохранил конец блока*/
/*блок сохранение города*//*
$sql_select_sity="select id from avito_sity where sity_name='$date[12]'";
$db_select_sity=mysqli_query($connect, $sql_select_sity);
$select_sity=mysqli_fetch_assoc($db_select_sity);
$id_sity=$select_sity['id'];
if(!$id_sity)
  {
    $sql_insert_avito_sity="insert into avito_sity (sity_name)  value ('$date[12]')";
    mysqli_query($connect, $sql_insert_avito_sity);
    $id_sity=mysqli_insert_id($connect);
  }
/*город сохранил конец блока*/
/*блок сохранения продавца*//*
$sql_select_avtor="select id from avito_avtor_name where name='$date[11]'";
$db_select_avtor=mysqli_query($connect, $sql_select_avtor);
$select_avtor=mysqli_fetch_assoc($db_select_avtor);
$id_avtor=$select_avtor['id'];
  if(!$id_avtor)
    {
      $sql_insert_avito_avtor="insert into avito_avtor_name(name) value('$date[11]')";
      mysqli_query($connect, $sql_insert_avito_avtor);
      $id_avtor=mysqli_insert_id($connect);
    }
/*продавца сохранил конец блока*/

/*сохранение основного блока*//*
$sqladdavito="insert into avito_avto value('', '$id_avto_avito', '$date[2]',
 '$date[8]', '$date[9]', '$date[10]', '$id_avtor', '$id_sity', '$id_phone', '$date[14]')";
 mysqli_query($connect, $sqladdavito);
/*конец основного блока*//*
$count++;
echo $count;
echo "\n";
  }
fclose($readfile);*/
 ?>
