<?php
    require_once 'ApiClass.php';
    $api = new ApiClass();
    $server = $_SERVER['REQUEST_METHOD'] ;
    if ($server == 'POST')
    {
        echo $api->postData($_POST);
    }
    else if ($server == 'GET')
    {
        echo $api->getData($_GET);
    }

