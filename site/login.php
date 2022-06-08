<?php

// validate login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user = validateLogin($username, $password)) {
        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['role'] = $user['role'];
        $_SESSION['error'] = false;
    }
    else {
        $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
        $page = 'home';
        
    }

   
}


?>

<div class="container">
    <form action="" method="POST" class="form-signin flex mx-auto">
        <input type="hidden" name="login" value="true">
        <h2 class="form-signin-heading <?= $_SESSION['error'] ? "error": "" ?>"><?= $_SESSION['error'] ? $_SESSION['error'] : "Đăng nhập tài khoản" ?></h2>
        <label for="inputUser" class="sr-only">Username</label>
        <input type="text" id="inputUser" name="username" class="form-control-login" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control-login" placeholder="Password" required>

        <button class="btn  btn--primary-o login-btn" type="submit">Đăng nhập</button>
        <div class="wrapper flex">
            <div class="forgot">
                <a href="#">Quên mật khẩu?</a>
            </div>
            <label class="form-check flex">
                <input type="checkbox" value="remember-me" class="remember-me"> Ghi nhớ đăng nhập
            </label>
        </div>
    </form>
</div>