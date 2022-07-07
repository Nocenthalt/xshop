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

// xóa mọi ký tự không hợp lệ
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

    if ($data['birthdate']) {
        // get this today date minus two years
        $maximum = date('Y-m-d', strtotime('-2 years'));

        if (strtotime($data['birthdate']) < strtotime('1900-01-01') || strtotime($data['birthdate']) > strtotime($maximum)) {
            $errors['birthdate'] = 'Ngày sinh không hợp lệ';
        }
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

// validate đăng nhập
function validate_profile($data)
{
    $data = input_clean($data);
    $errors = [];

    if (empty($data['name'])) {
        $errors['name'] = 'Họ và tên không được để trống';
    } else if (!preg_match('/^[a-zA-Z ]+$/', $data['name'])) {
        $errors['name'] = 'Họ và tên không hợp lệ';
    }

    if ($data['birthdate']) {
        if (strtotime($data['birthdate']) < strtotime('1900-01-01') || strtotime($data['birthdate']) > strtotime('2020-01-01')) {
            $errors['birthdate'] = 'Ngày sinh không hợp lệ';
        }
    }
    // phone number
    if ($data['phone']) {
        if (!preg_match('/^(\+84|0)\d{9,11}$/', $data['phone'])) {
            $errors['phone'] = 'Số điện thoại không hợp lệ';
        }
    }
    // email
    if (empty($data['email'])) {
        $errors['email'] = 'Email không được để trống';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email không hợp lệ';
    }


    if ($errors) {
        return $errors;
    } else {
        return false;
    }
}

// validate sản phẩm
function validate_product($data)
{
    $data = input_clean($data);
    $errors = [];

    if (empty($data['name'])) {
        $errors['name'] = 'Tên sản phẩm không được để trống';
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $data['name'])) {
        $errors['name'] = 'Tên sản phẩm không hợp lệ';
    }
    if (empty($data['price'])) {
        $errors['price'] = 'Giá sản phẩm không được để trống';
    } else if (!preg_match('/^\d.+$/', $data['price'])) {
        $errors['price'] = 'Giá sản phẩm không hợp lệ';
    }
    if (empty($data['description'])) {
        $errors['description'] = 'Mô tả sản phẩm không được để trống';
    }
    if (empty($data['category'])) {
        $errors['category'] = 'Danh mục sản phẩm không được để trống';
    }

    if ($errors) {
        return $errors;
    } else {
        return false;
    }
}

// validate danh mục
function validate_category($data)
{
    $data = input_clean($data);
    $errors = [];

    if (empty($data['name'])) {
        $errors['name'] = 'Tên danh mục không được để trống';
    } else if (!preg_match('/^[a-zA-Z0-9_\s]+$/', $data['name'])) {
        $errors['name'] = 'Tên danh mục không hợp lệ';
    }

    if ($errors) {
        return $errors;
    } else {
        return false;
    }
}

// chuyển trang
function redirect($page)
{
    $sec = 1;
    header("Refresh: $sec; url=index.php?page=$page");
    exit();
}

// báo lỗi
function alert($message)
{
    echo "<script>alert('$message');</script>";
}

// rút gọn số
function number_shorten($number)
{
    if ($number >= 1000000) {
        return round($number / 1000000, 1) . ' m';
    } else if ($number >= 1000) {
        return round($number / 1000, 1) . ' k';
    } else {
        return $number;
    }
}

function pagination($pageno, $search = null, $total_items = [])
{
    // Tìm kiếm tên sản phẩm
    if ($search) {
        $total_items =  array_filter($total_items, function ($prod) use ($search) {
            $clean_target = strtolower($prod['name']);
            $clean_search = trim(strtolower($search));

            return strpos($clean_target, $clean_search) !== false;
        });
    }

    // Phân trang
    $prods_per_page = 12; // số sản phẩm trên một trang
    $total_prods = count($total_items); // tổng số sản phẩm
    $offset = ($pageno - 1) * $prods_per_page; // vị trí bắt đầu lấy sản phẩm
    $total_pages = ceil($total_prods / $prods_per_page); // tổng số trang
    $filtered_items = array_slice($total_items, $offset, $prods_per_page); // sản phẩm hiển thị trên một trang
    return [$pageno, $total_pages, $filtered_items];
}

// function cho item. Items phải là array 2D

// lọc item
function item_filter($items, $filterBy, $value)
{
    $result = array_filter($items, function ($item) use ($filterBy, $value) {
        return ($item[$filterBy] == $value);
    });
    return $result;
}

//sắp xếp item,
function item_sort($items, $sortBy, $order = 0)
{
    if (!$sortBy) return $items;
    $col = array_column($items, $sortBy);
    array_multisort($col, ($order ? SORT_DESC : SORT_ASC), $items);
    return $items;
}

// cắt số lượng item
function item_truncate($items, $no_items)
{
    return array_slice($items, 0, $no_items ?? count($items));
}
