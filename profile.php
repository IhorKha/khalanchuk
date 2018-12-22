<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
require 'db.php';
include  'header.php';
?>
<div class="container">
    <div class="row ">
         Привет, <?php  print_r($_SESSION['logged_user']->name);?> <?php  print_r($_SESSION['logged_user']->lname );?>
    </div>
    <div class="row">
        Твой логин - <?php print_r($_SESSION['logged_user']->login);?>
    </div>
    <div class="row">
        Твой email - <?php print_r($_SESSION['logged_user']->email);?>
    </div>
</div>
