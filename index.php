<?php
include_once "scripts/main_scripts.php";
include_once "scripts/database_scripts.php";
include_once "scripts/profile_scripts.php";
include_once "scripts/goods_scripts.php";
session_start();


user_reg($connect);
user_login($connect);

ses_destroy();

buy_goods($connect);

include_once get_path_to_page();

?>