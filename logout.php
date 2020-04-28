<?php 
    require_once('functions/config.php');
    if(isset($_COOKIE['username'])){
        unset($_COOKIE['username']);
        setcookie('username', '', time() - 84600);
    }
    session_destroy();
    session_start();
    set_message('<p class="text-success text-center">Shihemi së shpejti...</p>');
    redirect('login.php');
?>