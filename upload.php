<?php

$url = "";
if (isset($_POST['update'])) {
    $file = $_FILES['avatar'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('jpg', 'jpeg', 'png', 'webp');
    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 2097152) {
                $file_name_new = $user["username"] . '.' . $file_ext;
                $file_destination = './db/user/' . $file_name_new;
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo '<script>alert("Upload thành công")</script>';
                } else {
                    echo '<script>alert("Upload thất bại")</script>';
                }
            } else {
                echo '<script>alert("Kích thước file quá lớn")</script>';
            }
        } else {
            echo '<script>alert("Có lỗi xảy ra")</script>';
        }
    } else {
        echo '<script>alert("Không đúng định dạng")</script>';
    }
    $url = $file_destination;
}
