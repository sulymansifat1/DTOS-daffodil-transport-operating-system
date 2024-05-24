<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


if(isset($_POST['get_general'])){
    $q = "SELECT * FROM `title` WHERE `sr_no`=?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);

    echo $json_data;
} 

if(isset($_POST['upd_general'])){
    $frm_data = filteration($_POST);
    $q = "UPDATE `title` SET  `heading_title`=? WHERE `sr_no`=?";
    $values = [$frm_data['heading_title'], 1];
    $res = update($q, $values, 'si');
    echo $res;
}


if(isset($_POST['get_contact'])){
    $q = "SELECT * FROM `contact` WHERE `sr_no`=?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);

    echo $json_data;
} 

if(isset($_POST['upd_contact'])){
    $frm_data = filteration($_POST);
    $q = "UPDATE `contact` SET  `con_add`=?,  `con_pn`=?,  `con_email`=? WHERE `sr_no`=?";
    $values = [$frm_data['con_add'],$frm_data['con_pn'], $frm_data['con_email'], 1];
    $res = update($q, $values, 'sssi');
    echo $res;
}
if(isset($_POST['toggle1'])){
    $frm_data = ($_POST['toggle1']) ? 0 : 1;

    $q = "UPDATE `title` SET  `shutdown`=? WHERE `sr_no`=?";
    $values = [$frm_data, 1];
    $res = update($q, $values, 'ii');
    echo $res;
}


?>