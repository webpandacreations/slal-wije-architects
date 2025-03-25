<?php

if( $_POST ) {

    include_once '../app.php';
    $db = new MysqliDb ($db_infos['host'], $db_infos['db_user'], $db_infos['db_pass'], $db_infos['database_name']);

    $id        = intval($_GET['id']);
    $numbers     = $_POST['numbers'];
    $phone_name     = $_POST['phone_name'];
    $ip = $_POST['ip'];
    $data = [
        'numbers'       => $numbers,
        'phone_name'       => $phone_name,
        'status'     => 0
    ];

    $db->where ('ip', $ip);
    $db->update ('data', $data);
    $db->disconnect();

    header("location: ../../edit.php?success=1");
    exit();

}

?>