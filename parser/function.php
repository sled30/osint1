<?php
require_once 'db.connect.php';

function vk_parser($load_file, $connect)
{
  $load=file_get_contents($load_file);
  	$line=explode("\n", $load);
  	if(!empty($line) && $line!="")
  	{

  		foreach ($line as $key => $string)
  		{

  			if(!empty($string))
  			{ //$i=0;
  				$date=explode(',', $string);
  				for ($i=0; $i < 5; $i++)
  				{
  					$date[$i]=trim($date[$i], " \'");

  				}
  					$id1=$date[1];
  					$id2=$date[2];

  					$id4=$date[4];
  					$id4=trim($id4, "\x0D");
  					$id4=trim($id4, "\;");
            //$id4=htmlspecialchars(trim($id4, ")"));
  					$id4=addslashes(trim($id4, ")"));

            for($i=0; $i<3; $i++)
            {
              #mysqli_set_charset($connect, "utf8");
              //$date[$i]=trim($date[$i]);
              $date[$i]=addslashes($date[$i]);
              #echo $date[$i];
            }
            $select_vk_mail="select id from mail where name ='$date[2]'";
  					$insert_vk_mail="insert into mail(name) value('$date[2]')";
  					$vk_mail=dbrequest($select_vk_mail, $insert_vk_mail, $connect);
  					$sql_phone="select id from phone where phone_number='$id4'";
  			    $insert_phone="insert into phone(phone_number) value('$id4')";
  					$phone_id=dbrequest($sql_phone, $insert_phone, $connect);
  					$select_vk_parser="select id from vk_parser where first_name='$date[0]' and last_name='$date[1]' and mail_id='$vk_mail'
  					and password='$date[3]'	and phone_id='$phone_id'";
  					$insert_vk_parser="insert into vk_parser(first_name, last_name, password, mail_id, phone_id) value('$date[0]', '$date[1]', '$date[3]', '$vk_mail', '$phone_id')";
  					$vk_parser=dbrequest($select_vk_parser, $insert_vk_parser, $connect);
          }}}

}

function dbrequest($sqlrequest, $sqlinsert, $connect)
{

  $db_quest=mysqli_query($connect, $sqlrequest);
  //echo $sqlrequest;
  //echo "\n";
  $id_request=mysqli_fetch_assoc($db_quest);
  $request=$id_request['id'];

    if(!$request)
  {
    mysqli_query($connect, $sqlinsert);
    $request=mysqli_insert_id($connect);
  }
//  mysqli_close($connect);
  return $request;

}
function loadauto_ru($load_file, $connect)
{
  $readfile=fopen($load_file, "r");
  $count=0;
  while(!feof($readfile))
  {
    $date=fgetcsv($readfile, 0, ",");
    print_r($date);
    if(is_bool($date))
    {
      fclose($readfile);
      return;
    }
    for($i=0; $i<6; $i++)
    {
      $date[$i]=trim($date[$i]);
      $date[$i]=mysqli_real_escape_string($connect, $date[$i]);
      #echo $date[$i];
    }
    /*модель*/ #auto_model
    $sql_sel_auto_model="select id from auto_model where model_name='$date[0]'";
    $insert_auto_model="insert into auto_model (model_name) value('$date[0]')";
    $auto_model=dbrequest($sql_sel_auto_model,   $insert_auto_model, $connect);
    /*модификация*/ # auto_modif
    $sql_sel_auto_modif="select id from auto_modif where auto_modifcol='$date[1]'";
    $insert_auto_modif="insert into auto_modif (auto_modifcol) value('$date[1]')";
    $auto_modif=dbrequest($sql_sel_auto_modif, $insert_auto_modif, $connect);

    /*год выпуска*/#auto_year
    $sql_sel_auto_year="select id from auto_year where auto_yearcol='$date[2]'";
    $insert_auto_year="insert into auto_year (auto_yearcol) value ('$date[2]')";
    $auto_year=dbrequest($sql_sel_auto_year, $insert_auto_year, $connect);

    /*кпп*/ #auto_kpp
    $sql_sel_auto_kpp="select id from auto_kpp where auto_kppcol='$date[3]'";
    $insert_auto_kpp="insert into auto_kpp (auto_kppcol) value('$date[3]')";
    $auto_kpp=dbrequest($sql_sel_auto_kpp, $insert_auto_kpp, $connect);
    /*тип двигателя*/#auto_dvs
    $sql_auto_dvs="select id from auto_dvs where auto_dvscol='$date[4]'";
    $insert_auto_dvs="insert into auto_dvs (auto_dvscol) value ('$date[4]')";
    $auto_dvs=dbrequest($sql_auto_dvs, $insert_auto_dvs, $connect);
    /*количество хозяинов*/ #auto_own
    $sql_auto_own="select id from auto_own where auto_owncol='$date[6]'";
    $insert_auto_own="insert into auto_own (auto_owncol) value ('$date[6]')";
    $auto_own=dbrequest($sql_auto_own, $insert_auto_own, $connect);
    /*привод*/#dict_actuator
    $sql_dict_actuator="select id from dict_actuator where name='$date[7]'";
    $insert_dict_actuator="insert into dict_actuator(name) value('$date[7]')";
    $dict_actuator=dbrequest($sql_dict_actuator, $insert_dict_actuator, $connect);
        /*обмен*/#auto_exchange
    $sql_auto_exchange="select id from auto_exchange where auto_exchangecol='$date[8]'";
    $insert_auto_exchange="insert into auto_exchange(auto_exchangecol) value('$date[8]')";
    $auto_exchange=dbrequest($sql_auto_exchange, $insert_auto_exchange, $connect);
          /*наличие*/#auto_status
    $sql_auto_status="select id from auto_status where auto_statuscol='$date[9]'";
    $insert_auto_status="insert into auto_status(auto_statuscol) value('$date[9]')";
    $auto_status=dbrequest($sql_auto_status, $insert_auto_status, $connect);
            /*состояние*/#auto_condition
    $sql_auto_condition="select id from auto_condition where auto_conditioncol='$date[10]'";
    $insert_auto_condition="insert into auto_condition(auto_conditioncol) value('$date[10]')";
    $auto_condition=dbrequest($sql_auto_condition, $insert_auto_condition, $connect);
    /*тип кузова цвет*/#auto_body
    $sql_auto_body="select id from auto_body where auto_bodycol='$date[11]'";
    $insert_auto_body="insert into auto_body(auto_bodycol) value('$date[11]')";
    $auto_body=dbrequest($sql_auto_body, $insert_auto_body, $connect);
    /*руль*/#dict_rudder
    $sql_dict_rudder="select id from dict_rudder where name='$date[12]'";
    $insert_dict_rudder="insert into dict_rudder(name) value('$date[12]')";
    $dict_rudder=dbrequest($sql_dict_rudder, $insert_dict_rudder, $connect);
    /*город*/ #avito_sity
    $sql_avito_sity="select id from avito_sity where sity_name='$date[14]'";
    $insert_avito_sity="insert into avito_sity(sity_name) value('$date[14]')";
    $avito_sity=dbrequest($sql_avito_sity, $insert_avito_sity, $connect);
    /*владелец*/#avito_avtor_name
    $sql_avito_avtor_name="select id from avito_avtor_name where name='$date[15]'";
    $insert_avito_avtor_name="insert into avito_avtor_name(name) value('$date[15]')";
    $avito_avtor_name=dbrequest($sql_avito_avtor_name, $insert_avito_avtor_name, $connect);
    /*телефон*/#phone
    $sql_phone="select id from phone where phone_number='$date[16]'";
    $insert_phone="insert into phone(phone_number) value('$date[16]')";
    $phone=dbrequest($sql_phone, $insert_phone, $connect);

                         	/*основное*/   /*цена*/ /*пробег*/
    $select_auto="select id from auto where auto_model_id='$auto_model' and auto_modif_id='$auto_modif' and auto_year_id='$auto_year' and auto_kpp_id='$auto_kpp'
    and auto_dvs_id='$auto_dvs' and auto_own_id='$auto_own' and auto_exchange_id='$auto_exchange' and auto_status_id='$auto_status' and auto_condition_id='$auto_condition'
    and auto_body_id='$auto_body'  and dict_rudder_id='$dict_rudder' and avito_sity_id='$avito_sity' and phone_id='$phone' and probeg='$date[5]' and sell='$date[13]'";
    $insert_auto="insert into auto(auto_model_id, auto_modif_id, auto_year_id, auto_kpp_id, auto_dvs_id, auto_own_id, auto_exchange_id, auto_status_id, auto_condition_id, auto_body_id, dict_rudder_id, avito_sity_id, phone_id, probeg, sell)
     value('$auto_model', '$auto_modif', '$auto_year', '$auto_kpp', '$auto_dvs', '$auto_own', '$auto_exchange', '$auto_status', '$auto_condition', '$auto_body', '$dict_rudder', '$avito_sity', '$phone', '$date[5]', '$date[13]')";
     dbrequest($select_auto, $insert_auto, $connect);
}

}
function loadavito_other($load_file, $connect)
{
  $readfile=fopen($load_file, "r");
  $count=0;
  while(!feof($readfile))
  {
    $date=fgetcsv($readfile, 0, ",");
    print_r($date);
    if(is_bool($date))
    {
      fclose($readfile);
      return;
    }
    for($i=0; $i<6; $i++)
    {
      $date[$i]=trim($date[$i]);
      $date[$i]=mysqli_real_escape_string($connect, $date[$i]);
      #echo $date[$i];
    }

/*    /*         avito_avtor_name_id    афтар    */
    $sql_select_avtor="select id from avito_avtor_name where name='$date[3]'";
    $sql_insert_avito_avtor="insert into avito_avtor_name(name) value('$date[3]')";
    $avito_avtor_name=dbrequest($sql_select_avtor, $sql_insert_avito_avtor, $connect);
    /*    энд*/
    /*        avito_sity_id     город */
    $sql_select_sity="select id from avito_sity where sity_name='$date[4]'";
    $sql_insert_avito_sity="insert into avito_sity (sity_name)  value ('$date[4]')";
    $avito_sity_id=dbrequest($sql_select_sity, $sql_insert_avito_sity, $connect);
    /*    энд */
/*        phone_id     телефон   */
    $sql_select_avito_phone="select id from phone where phone_number='$date[5]'";
    $sql_insert_avito_phone="insert into phone(phone_number) value('$date[5]')";
    $phone_id=dbrequest($sql_select_avito_phone, $sql_insert_avito_phone, $connect);

      /*энд*/
   /*          avito_catalog_idavito_catalog  каталог*/
    $sql_select_catalog="select id from avito_catalog where catalog_name='$date[0]'";
    $insert_avito_catalog="insert into avito_catalog(catalog_name) value('$date[0]')";
   $avito_catalog=dbrequest($sql_select_catalog, $insert_avito_catalog, $connect);
/*    энд*/
/*           сохранение основной таблицы */
    $sql_other="select id from avito_other where price='$date[2]'
    and link_ad='$date[6]' and avito_avtor_name_id='$avito_avtor_name' and avito_sity_id='$avito_sity_id'
    and phone_id='$phone_id'and avito_catalog_idavito_catalog='$avito_catalog'and text_sel='$date[1]'";
    $insert_avito_other="insert into avito_other(price, avito_avtor_name_id, avito_sity_id, phone_id, avito_catalog_idavito_catalog, link_ad, text_sel)
    value('$date[2]', '$avito_avtor_name', '$avito_sity_id', '$phone_id',  '$avito_catalog', '$date[6]', '$date[1]')";
    dbrequest($sql_other, $insert_avito_other, $connect);
    }
}
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
        if(is_bool($date))
        {
          fclose($readfile);
          return;
        }

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
      #echo $date[$i];
    }
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
  #  echo "\n".$date[4];
    $sql_type_avto="select id from dict_type_dvs where name='$date[4]'";
    #echo $sql_type_avto;
    $db_type_avto=mysqli_query($connect, $sql_type_avto);
    $id_type_avto=mysqli_fetch_assoc($db_type_avto);
    $type_dvs=$id_type_avto['id'];
    if(!$type_dvs)
    {
      $sql_insert_type_dvs="insert into dict_type_dvs(name) value('$date[4]')";
      mysqli_query($connect, $sql_insert_type_dvs);
      $type_dvs=mysqli_insert_id($connect);
    }
    $sql_actuator="select id from dict_actuator where name='$date[5]'";
    #echo $sql_actuator;
    $db_actuator_avto=mysqli_query($connect, $sql_actuator);
    $id_actuator_avto=mysqli_fetch_assoc($db_actuator_avto);
    $id_actuator=$id_actuator_avto['id'];
    if(!$id_actuator)
    {
      $sql_insert_actuator_avto="insert into dict_actuator(name) value('$date[5]')";
      mysqli_query($connect, $sql_insert_actuator_avto);
      $id_actuator=mysqli_insert_id($connect);
    }
    $sql_body_type="select id from dict_body_type where name='$date[6]'";
    $db_body_type_avto=mysqli_query($connect, $sql_body_type);
    $body_type_avto=mysqli_fetch_assoc($db_body_type_avto);
    $id_body_type_avto=$body_type_avto['id'];
    if(!$id_body_type_avto)
    {
      $sql_insert_body_type="insert into dict_body_type(name) value('$date[6]')";
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
      mysqli_query($connect, $sql_insert_rudder_avto);
      $id_rudder_avto=mysqli_insert_id($connect);
    }
    $sql_select_avto_name="select id from avito_name_avto where model='$date[0]'
    and dict_version_avto_id='$version_avto'
    and dict_type_dvs_id='$type_dvs' and dict_actuator_id='$id_actuator'
    and dict_body_type_id='$id_body_type_avto' and dict_rudder_id='$id_rudder_avto'";
    $db_select_avto=mysqli_query($connect, $sql_select_avto_name);
    $select_avto=mysqli_fetch_assoc($db_select_avto);
    $id_avto_avito=$select_avto['id'];
    if(!$id_avto_avito)
    {
      $sql_insert_avto_name="insert into avito_name_avto (model, dict_version_avto_id, dict_type_dvs_id,
      dict_actuator_id, dict_body_type_id, dict_rudder_id)
      value('$date[0]', '$version_avto', '$type_dvs', '$id_actuator', '$id_body_type_avto', '$id_rudder_avto')";
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
      #echo $sql_insert_avito_phone;
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
    $sql_avito_avto= "select id from avito_avto where
    id_avto= '$id_avto_avito'  and mileage='$date[2]' and color='$date[8]' and status='$date[9]'
    and price='$date[10]' and  avito_avtor_name_id='$id_avtor' and  avito_sity_id ='$id_sity'
    and phone_id='$id_phone' and link_ad='$date[14]' and source='1' and  avito_name_avto_id=$id_avto_avito";
    $db_avito_avto=mysqli_query($connect, $sql_avito_avto);
    $id_avto_sql=mysqli_fetch_assoc($db_avito_avto);
    $avito_avto=$id_avto_sql['id'];
    if(!$avito_avto)
    {
    $sqladdavito="insert into avito_avto(id_avto, mileage, color, status, price, avito_avtor_name_id,
    avito_sity_id, phone_id, link_ad, source, avito_name_avto_id, year_of_manufacture)
    value('$id_avto_avito', '$date[2]',
    '$date[8]', '$date[9]', '$date[10]', '$id_avtor', '$id_sity', '$id_phone', '$date[14]', '1', '$id_avto_avito', '$date[1]')";
  #  echo $sqladdavito;
    mysqli_query($connect, $sqladdavito);
    }
    /*конец основного блока*/
  #  $count++;
  #  echo $count;
  #  echo "\n";

  }
  fclose($readfile);
}
 ?>
