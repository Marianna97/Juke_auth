<?php
	require "db.php";
	$data =$_POST;
	if (isset($data['do_signup']) )
	{	$errors = array();
		if ( $data['password_2'] != $data['password'] ){  $errors[] = "<script>alert(\"Пароли не совпадают!\");</script>"; }
		if (R::count('users', "login = ?", array($data['login'])) > 0 )	{	$errors[] = "<script>alert(\"Данный логин занят!\");</script>";
           }
if ( empty($errors) ){
$user = R::dispense('users');
$user->login = $data['login'];
$user->password = password_hash($data['password'],PASSWORD_DEFAULT);
R::store($user);header('Location: indexm.php');}
else{	echo array_shift($errors);}}
?><!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/bug-icon.svg" type="image/x-icon">
  <meta name="description" content="">
  <title>SignUp</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mo/css/additional.css" type="text/css">
</head>
<body>
  <section class="menu cid-qSiY5BLV3M" once="menu" id="menu1-e">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <img src="assets/images/bug-icon.svg" title="" style="height: 4.7rem;">
                </span>
                <span class="navbar-caption-wrap navbar-caption text-white display-4">JUKE</span>
            </div>
        </div>
    </nav>
</section>

<section class="mbr-section form1 cid-qUy0IGrumE" id="form1-p">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <br>
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Регистрация нового пользователя</h2>
                <br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <form class="mbr-form" action="indexm.php" method="post" ><input type="hidden" >
                    <div class="row row-sm-offset">
                        <div class="col-md-4 multi-horizontal" >
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-5" ">Логин:</label>
                                <input type="text" class="form-control" name="login" required="" value="<?php echo $data['login']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 multi-horizontal" >
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-5" >Пароль:</label>
                                <input type="password" class="form-control" name="password"  required="" value="<?php echo $data['password']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 multi-horizontal" >
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-5" >Повторите пароль:</label>
                                <input type="password" class="form-control" name="password_2" required="" value="<?php echo $data['password_2']; ?>" >
                            </div>
                        </div>
                    </div>

                    <span class="input-group-btn"><button type="submit" name="do_signup" class="btn btn-form btn-primary display-4">Зарегистрировать</button></span>
                </form>
                <br>
            </div>
        </div>
    </div>
</section>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/mbr-tabs/mbr-tabs.js"></script>
  <script src="assets/theme/js/script.js"></script>

</body>
</html>