<?php
function get_header()
{
    $path_header = "inc/header.php";
    if (file_exists($path_header)) {
        require $path_header;
    } else {
        echo 'không tồn tại trang ngày';
    }
}

function get_footer()
{
    $path_footer = "inc/footer.php";
    if (file_exists($path_footer)) {
        require $path_footer;
    } else {
        echo 'không tồn tại trang ngày';
    }
}

// 
function input_clean($data)
{
    if (is_array($data)) {
        $data = array_map('input_clean', $data);
    } else {
        $data = trim($data);
        $data = stripslashes($data);
    }

    return $data;
}

// validate đăng nhập
function validate_login($username, $password)
{
    $username = input_clean($username);
    $password = input_clean($password);
    $user = pdo_execute('SELECT * FROM users WHERE username = ?', [$username]);

    if (!$user) {
        return false;
    } else if (password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}

// validate đăng ký
function validate_register($data)
{
    $data = input_clean($data);
    $data['name'] = input_clean($data['name']);
    $data['username'] = input_clean($data['username']);
    $data['email'] = input_clean($data['email']);
    $data['birthdate'] = input_clean($data['birthdate']);
    $data['password'] = input_clean($data['password']);
    $data['confirm-password'] = input_clean($data['confirm-password']);

    $errors = [];

    if (empty($data['name'])) {
        $errors['name'] = 'Họ và tên không được để trống';
    } else if (!preg_match('/^[a-zA-Z ]+$/', $data['name'])) {
        $errors['name'] = 'Họ và tên không hợp lệ';
    }

    if (empty($data['username'])) {
        $errors['username'] = 'Tên đăng nhập không được để trống';
    } else if (pdo_execute('SELECT * FROM users WHERE username = ?', [$data['username']])) {
        $errors['username'] = 'Tên đăng nhập đã tồn tại';
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $data['username'])) {
        $errors['username'] = 'Tên đăng nhập không hợp lệ';
    }

    if ($data['email']) {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email không hợp lệ';
        } else if (pdo_execute('SELECT * FROM users WHERE email = ?', [$data['email']])) {
            $errors['email'] = 'Email đã tồn tại';
        }
    }

    if (empty($data['birthdate'])) {
        $errors['birthdate'] = 'Ngày sinh không được để trống';
        // only allow birthdate from range 1900-2020
    } else if (strtotime($data['birthdate']) < strtotime('1900-01-01') || strtotime($data['birthdate']) > strtotime('2020-01-01')) {
        $errors['birthdate'] = 'Ngày sinh không hợp lệ';
    }

    if (empty($data['password'])) {
        $errors['password'] = 'Mật khẩu không được để trống';
    } else if (strlen($data['password']) < 6) {
        $errors['password'] = 'Mật khẩu phải có ít nhất 6 ký tự';
    } else if ($data['password'] != $data['confirm-password']) {
        $errors['confirm-password'] = 'Mật khẩu không khớp';
    }


    if ($errors) {
        return $errors;
    } else {
        return false;
    }
}


function redirect($page)
{
    header("Location: index.php?page=$page");
    exit();
}
