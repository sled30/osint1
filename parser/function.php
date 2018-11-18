<?php
require_once '../config/db.connect.php';
function loadavito_avto($load_file, $connect)
{

  $readfile=fopen($load_file, "r");
  $count=0;
  while(!feof($readfile))
  {
    #exit;
    $date=fgetcsv($readfile, 0, ",");
        /*блок сохранения машины*/
        #exit;
        print_r($date);

    if(!isset($date[3]))
    {
      $date[3]='';
    }
    if(!isset($date[1]))
    {
      $date[1]='';
    }
    /*блок сохранения машины*/
    for($i=0; $i<14; $i++)
    {
      $date[$i]=trim($date[$i]);
      $date[$i]=mysqli_real_escape_string($connect, $date[$i]);
      echo $date[$i];
    }
    ##########################   ахтунг переработать таблицы  #################
  /*  ------------------version=dict_version_avto_id
    --------------------type=dict_type_dvs_id
    --------------------actuator=dict_actuator_id
    --------------------body_type=dict_body_type_id
    rudder=dict_rudder_id
*/
    $sql_version="select id from dict_version_avto where name='$date[3]'";
    $db_version=mysqli_query($connect, $sql_version);
    $id_version_avto=mysqli_fetch_assoc($db_version);
    $version_avto=$id_version_avto['id'];
    if(!$version_avto)
    {
      $sql_insert_version="insert into dict_version_avto(name) value('$date[3]')";
      mysqli_query($connect, $sql_insert_version);
      $version_avto=mysqli_insert_id($connect);
    }
    $sql_type_avto="select id dict_type_dvs_id where name='$date[4]'";
    $db_type_avto=mysqli_query($connect, $sql_type_avto);
    $id_type_avto=mysqli_fetch_assoc($db_type_avto);
    $type_dvs=$id_type_avto['id'];
    if(!$type_dvs)
    {
      $sql_insert_type_dvs="insert into dict_dvs(name) value('$date[3]')";
      mysqli_query($connect, $sql_insert_type_dvs);
      $type_dvs=mysqli_insert_id($connect);
    }
    $sql_actuator="select id from dict_actuator where name='$date[5]'";
    $db_actuator_avto=mysqli_query($connect, $sql_actuator);
    $id_actuator_avto=mysqli_fetch_assoc($db_actuator_avto);
    $id_actuator=$id_actuator_avto['id'];
    if(!$id_actuator)
    {
      $sql_insert_actuator_avto="insert into dict_actuator where name='$date[5]'";
      mysqli_query($connect, $sql_insert_actuator_avto);
      $id_actuator=mysqli_insert_id($connect);
    }
    $sql_body_type="select id from dict_body_type where name='$date[6]'";
    $db_body_type_avto=mysqli_query($connect, $sql_body_type);
    $body_type_avto=mysqli_fetch_assoc($db_body_type_avto);
    $id_body_type_avto=$body_type_avto['id'];
    if(!$id_body_type_avto)
    {
      $sql_insert_body_type="insert into dict_body_type(name) value($date[6])";
      mysqli_query($connect, $sql_insert_body_type);
      $id_body_type_avto=mysqli_insert_id($connect);
    }
    $sql_rudder_avto="select id from dict_rudder where name='$date[7]'";
    $db_rudder_avto=mysqli_query($connect, $sql_rudder_avto);
    $rudder_avto=mysqli_fetch_assoc($db_rudder_avto);
    $id_rudder_avto=$rudder_avto['id'];
    if(!$id_rudder_avto)
    {
      $sql_insert_rudder_avto="insert into dict_rudder(name) value('$date[7]')";
      mysqli_query($nnect, $sql_insert_rudder_avto);
      $id_rudder_avto=mysqli_insert_id($connect);
    }
    $sql_select_avto_name="select id from avito_name_avto where model='$date[0]'
    and year_of_manufacture='$date[1]' and dict_version_avto_id='$version_avto'
    and dict_type_dvs_id='$type_dvs' and dict_actuator_id='$id_actuator'
    and dict_body_type_id='$id_body_type_avto' and dict_rudder_id='$id_rudder_avto'";
    $db_select_avto=mysqli_query($connect, $sql_select_avto_name);
    $select_avto=mysqli_fetch_assoc($db_select_avto);
    $id_avto_avito=$select_avto['id'];
    if(!$id_avto_avito)
    {
      $sql_insert_avto_name="insert into avito_name_avto (model, year_of_manufacture, dict_version_avto_id, dict_type_dvs_id,
      dict_actuator_id, dict_body_type_id, dict_rudder_id)
      value('$date[0]', '$date[1]', '$version_avto', '$type_dvs', '$id_actuator', '$id_body_type_avto', '$id_rudder_avto')";
      mysqli_query($connect, $sql_insert_avto_name);
      $id_avto_avito=mysqli_insert_id($connect);
    }
    /*данные машины сохранил конец блока*/
    /*блок сохранения телефона*/
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
    /*блок сохранение города*/
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
    /*блок сохранения продавца*/
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

    /*сохранение основного блока*/
    $sqladdavito="insert into avito_avto value('', '$id_avto_avito', '$date[2]',
    '$date[8]', '$date[9]', '$date[10]', '$id_avtor', '$id_sity', '$id_phone', '$date[14]')";
    mysqli_query($connect, $sqladdavito);
    /*конец основного блока*/
    $count++;
    echo $count;
    echo "\n";
  }
}
 ?>
