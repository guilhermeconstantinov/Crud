<?php
require_once '../class/AutoLoad.php';
session_start();
$user = new User();

if (isset($_POST['submit-update'])) {
    $user->readLogin();
     $user->update($_POST['login-name'], $_POST['login-email'], $_POST['login-password'], $_POST['login-confirm']);
     header('location: ../dashboard.php?r=perfil');
}

if (isset($_POST['submit-login'])){
    $user->setEmail($_POST['login-email']);
    $user->setPassword($_POST['login-password']);
    $user->login('../dashboard.php','../index.php');
}

if(isset($_POST['submit-register'])){
    $user->setName($_POST['register-name']);
    $user->setEmail($_POST['register-email']);
    $user->setPassword($_POST['register-password']);
    $user->create();
}