<?php
require_once 'setting.php';


if (isset($_POST['file'])) {
    $file = $_POST['file'];
    if (!file_exists($current_dir . '/' . $file)) {
        touch($current_dir . '/' . $file);
    } else {
        echo "file already exists";
    }
}