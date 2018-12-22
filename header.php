<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="style.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php require_once 'db.php'; ?>
<header>
<div class="container ">
    <div class="row">
        <div class="col-md-1">
            <a href="#">   <img src="logo.png" alt="logo" rel="#" ></a>
        </div>
        <div class="col-md-7">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Статьи</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#">Контакты</a>
                </li>
            </ul>

         </div>

        <div class="col-md-4 log">
<?php
if ( isset ($_SESSION['logged_user']) ){  ?>

    Привет, <?php echo $_SESSION['logged_user']->name; ?>!
    <a href="profile.php">Личный кабинет</a> /
            <a href="logout.php">Выйти</a>
<?php   }
        else{  ?>
        <a href="login.php"> Вход  </a> /
        <a href="signup.php"> Регистрация </a>

            <?php   }?>
        </div>
    </div>
</div>
</header>

