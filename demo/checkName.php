<?php
    $name = $_GET['username'];
    if($name == 'mt'){
        echo '用户名已存在';
    }else{
        echo '✅';
    }