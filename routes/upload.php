#!/usr/bin/env php

<?php

$uploadDir = __DIR__ . '/uploads';
 
$fileTypes = array(
    'jpg' => 'image/jpeg',
    'png' => 'image/png',
);
 
$err = array();
 
if (isset($_POST['upload']) && !empty($_FILES)) {
    if($_FILES['files']['error'] > 0) {
        $err[] = $errUpload[$_FILES['files']['error']];
    }
            
    if(!in_array($_FILES['files']['type'], $fileTypes)) {
        $err[] = 'Данный тип файла <b>'. $_FILES['files']['type'] .'</b> не подходит для загрузки!';
    }
    
    if(empty($err)) {
        $type = pathinfo($_FILES['files']['name']);
        $name = $uploadDir .'/'. uniqid('files_') .'.'. $type['extension'];
        move_uploaded_file($_FILES['files']['tmp_name'],$name);
        echo "Успешно загружено";
    } else {
        echo implode('<br>', $err);
    }
 
}