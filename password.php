<?php
    require_once("database.php");
    $logid = $_POST['id'];
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $newpassword = $_POST['new_password'];
    $query = 'SELECT * FROM `staff` WHERE `email`="'.$username.'" AND `password`="'.$password.'" AND `id`='.$logid;
    $result = mysqli_query($query,$con) or die ("Unable to verify user because " . mysqli_error($con));
    if(mysqli_num_rows($result)) {
        $update ='UPDATE `staff` SET `password`="'.$newpassword.'" WHERE `id`='.$logid;
        mysqli_query($update, $con) ? print('1') : print('0');
    } else {
        print('0');
    }
?>
