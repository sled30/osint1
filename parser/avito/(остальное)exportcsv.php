<?php
require_once 'config/db.connect.php';
$readfile=fopen("2.csv", "r");
$count=0;
while ($count < 10)
{
  //Категория\подкатегория,Объявление,Цена,Владелец,Город,Номервладельца,Cсылка на объявление
  $date=fgetcsv($readfile, 0, ",");
  /*блок сохранения категории*/
  $sql_select_category="select id from avito_category where category_name='$date[0]'";
  $db_select_category=mysqli_query($connect, $sql_select_category);
  $select_category=mysqli_fetch_assoc($db_select_category);
  $id_category=$select_category['id'];
    if(!$id_category)
      {
        $sql_insert_category="insert into avito_category(category_name) value('$date[0]')";
        mysqli_query($connect, $sql_insert_category);
        $id_category=mysqli_insert_id($connect);
      }
  /*конец блока*/

  /*блок сохранения владельца*/
  $sql_select_avtor="select id from avito_avtor_name where name='$date[3]'";
  $db_selelect_avtor=mysqli_query($connect, $sql_select_avtor);
  $select_avtor=mysqli_fetch_assoc($db_selelect_avtor);
  $id_avtor=$select_avtor['id'];
      if(!id_avtor)
        {
          $sql_insert_avtor="insert into avito_avtor_name(name) value($date[3])";
          mysqli_query($connect, $sql_insert_avtor);
          $id_avtor=mysqli_insert_id($connect);
        }
  /*сохранил владельца конец блока*/
  /*сохранение города */
  $sql_select_sity="select id from avito_sity where sity_name='$date[4]'";
  $db_select_sity=mysqli_query($connect, $sql_select_sity);
  $select_sity=mysqli_fetch_assoc($db_select_sity);
  $id_sity=$select_sity['id'];
      if(!$id_sity)
        {
          $sql_insert_sity="insert into avito_sity(sity_name) value('$date[4]')";
          mysqli_query($connect, $sql_insert_sity);
          $id_sity=mysqli_insert_id($connect);
        }
  /*город сохранил конец блока*/
  /*блок сохранения телефона*/
  $sql_select_phone="select id from phone where phone_number='$date[5]'";
  $db_select_phone=mysqli_query($connect, $sql_select_phone);
  $select_phone=mysqli_fetc_assoc($db_select_phone);
  $id_phone=$select_phone['id'];
      if(!$id_phone)
        {
          $sql_insert_phone="insert into phone(phone_number) value($date[5])";
          mysqli_query($connect, $sql_insert_phone);
          $id_phone=mysqli_insert_id($connect);
        }
  /*телефон сохранил конец блока*/

  /*блок основных данных*/
  $sqladdavito="insert into avito_avto value('', '$id_category', '$date[1]', '$date[2]', '$id_avtor', '$id_sity',
  '$id_phone', '$date[6]')";
  echo $sqladdavito;
  $dbaddavito= mysqli_query($connect, $sqladdavito);
  /*сохранил основные данные*/

  $sqlphone="insert into phone (phone_number, source) value ($date[13], 2) ";
  $dbphone= mysqli_query($connect, $sqlphone);
  $idphone= mysqli_insert_id($connect);

  $count++;
}
  echo $count;
fclose($readfile);
 ?>
