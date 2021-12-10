<?php
function verify_user($user_data){
    if(!isset($user_data)){
        $fold_path = 'all/';
    } elseif(isset($user_data)){
        $fold_path = 'auth/';
    }
    return $fold_path;
}

function verify_path(){
    if($_SERVER['REQUEST_URI'] === '/'){
        $path_to_dir = '';
    } else {
        $path_to_dir = '../';
    }
    return $path_to_dir;
}

function get_path_to_page(){
    $folder = verify_user($_SESSION['user_data']);
    $dir = verify_path();
    $link = $_POST['link'];
    if(($link == '') || (!isset($link))){
        $path_to_page = $folder.'/home.php';
    } elseif((isset($link)) && ($link != 'exit')){
        $path_to_page = $dir.$folder.$link.".php";
    } elseif((isset($link)) && ($link !== 'exit')){
        $path_to_page = 'all/home.php';
    }
    return $path_to_page;
}



function ses_destroy(){
    if($_POST['link'] === 'exit'){
        $_SESSION = [];
        $_POST['link'] = null;
        unset($_COOKIE[session_name()]);
        session_destroy();
        header('Location: /');
    }
}

function mouth_ru($mouth){
    if($mouth === 'January') $mouth = 'Январь';
    elseif($mouth == 'February') $mouth = 'Февраль';
    elseif($mouth == 'March') $mouth = 'Март';
    elseif($mouth == 'April') $mouth = 'Апрель';
    elseif($mouth == 'May') $mouth = 'Май';
    elseif($mouth == 'June') $mouth = 'Июнь';
    elseif($mouth == 'July') $mouth = 'Июль';
    elseif($mouth == 'August') $mouth = 'Август';
    elseif($mouth == 'September') $mouth = 'Сентябрь';
    elseif($mouth == 'October') $mouth = 'Октябрь';
    elseif($mouth == 'November') $mouth = 'Ноябрь';
    elseif($mouth == 'December') $mouth = 'Декабрь';
    return $mouth;
}


function page_name(){
    $page_name = $_POST['link'];

    if(($page_name == '') || ($page_name == 'home')){
        $page_name = 'Главная страница';
    } elseif($page_name === 'info'){
        $page_name = 'Информация';
    } elseif($page_name === 'contacts'){
        $page_name = 'Контакты';
    } elseif($page_name === 'goods'){
        $page_name = 'Товары';
    } elseif($page_name === 'profile'){
        $page_name = 'Профиль пользователя';
    }

    return $page_name;
}
?>