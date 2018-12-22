
<?php
include  'header.php';
	$data = $_POST;
	function captcha_show(){
		$questions = array(
			1 => '1 + 1',
			2 => '1 + 0'
		);
		$num = mt_rand( 1, count($questions) );
		$_SESSION['captcha'] = $num;
		echo $questions[$num];
	}
	//если кликнули на button
	if ( isset($data['do_signup']) )
	{
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}
        if ( strlen (trim($data['login'])) <4 )
        {
            $errors[] = 'Логин должен быть длинее 4 символов';
        }
        if ( strlen (trim($data['login'])) >10 )
        {
            $errors[] = 'Логин должен быть менее  10 символов';
        }
		if ( trim($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}

		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}
        if ( strlen($data['password']) <4  )
        {
            $errors[] = 'Пароль должен быть длинее 4 символов';
        }
		if ( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Повторный пароль введен не верно!';
		}

		//проверка на существование одинакового логина
		if ( R::count('users', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}
    
    //проверка на существование одинакового email
		if ( R::count('users', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'Пользователь с таким Email уже существует!';
		}
		//проверка капчи
		$answers = array(
			1 => '2',
			2 => '1'
		);
		if ( $_SESSION['captcha'] != array_search( mb_strtolower($_POST['captcha']), $answers ) )
		{
			$errors[] = 'Ответ на вопрос указан не верно!';
		}
		if ( empty($errors) )
		{
            //ошибок нет,  регистрируем
			$user = R::dispense('users');
            $user->name = $data['name'];
            $user->lname = $data['lname'];
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); //пароль нельзя хранить в открытом виде, мы его шифруем при помощи функции password_hash для php > 5.6
			R::store($user);
            header('Location: /khalanchuk/');
		}else
		{
			echo '<div class="alert alert-danger" role="alert">'  .array_shift($errors).  '</div>';
		}
	}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-3">
            <form action="signup.php" method="POST">
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo @$data['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Фамилия:</label>
                        <input type="text" class="form-control" name="lname" value="<?php echo @$data['lname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ваш Email: </label>
                        <input type="email"  name="email" value="<?php echo @$data['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com">
                    </div>
                    <label>Логин для входа на сайт: </label>
                    <input type="text" class="form-control" name="login" value="<?php echo @$data['login']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль:</label>
                    <input type="password" name="password" value="<?php echo @$data['password']; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Повторите пароль:</label>
                    <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <label for="Captcha">Введите результат  <?php captcha_show(); ?> = </label>
                <div class="form-group">
                    <input type="text" class="form-control" name="captcha" >
                </div>
                <button type="submit" name="do_signup" class="btn btn-primary"  data-toggle="modal">Регистрация</button>

            </form>
        </div>
</div >


