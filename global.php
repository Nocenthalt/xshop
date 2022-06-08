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


function input_clean($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

function validateLogin($username, $password)
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
