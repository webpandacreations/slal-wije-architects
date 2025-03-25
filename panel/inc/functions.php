<?php

function user_logged_in() {
    if( isset($_SESSION['is_logged_in']) && isset($_SESSION['user_id']) )
        return true;
    return false;
}

function get_client_ip() {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } else if(filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    if( $ip == '::1' ) {
        return '127.0.0.1';
    }
    return  $ip;
}

function upload_file($file,$name) {
    $target_dir     = "upload/";
    $target_file    = $target_dir . basename($file["name"]);
    $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check          = getimagesize($file["tmp_name"]);
    if($check == false) {
        return false;
    }
    if (move_uploaded_file($file["tmp_name"], 'upload/' . get_client_ip() . '-' . $name . '.' . $imageFileType)) {
        return get_client_ip() . '-' . $name . '.' . $imageFileType;
    } else {
        return false;
    }
}

?>