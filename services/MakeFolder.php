<?php

require_once 'setting.php';

if (isset($_POST['folder'])) {
    $folder = $_POST['folder'];
    if (!file_exists($current_dir . '/' . $folder)) {
        mkdir($current_dir . '/' . $folder);
    } else {
        echo "Folder already exists";
    }
}