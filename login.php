<?php 
	require 'db.php';
include  'header.php';
	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if ( $user )
		{
			//логин существует
			if ( password_verify($data['password'], $user->password) )
			{
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user;
                header('Location: profile.php');
			}else
			{
				$errors[] = 'Неверно введен пароль!';
			}
		}else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		if ( ! empty($errors) )
		{
			//выводим ошибки авторизации
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}
	}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-3">
<form action="login.php" method="POST">
    <div class="form-group">
    <label>Логин: </label>
    <input type="text" class="form-control" name="login" value="<?php echo @$data['login']; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль:</label>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" name="do_login" class="btn btn-primary button1">Войти</button>
</form>
    </div></div></div>