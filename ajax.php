<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
    $login = $crud->login();
    if($login)
        echo $login;
}


if($action == 'login2'){
    $login2 = $crud->login2();
    if($login2)
        echo $login;
}

if($action == 'logout'){
    $logout = $crud->logout();
    if($logout)
        echo $logout;
}

if($action == 'logout2'){
    $logout = $crud->logout2();
    if($logout)
        echo $logout;
}

if($action == 'save_user'){
    $save = $crud->save_user();
    if($save)
        echo $save;
}

if($action == 'delete_user'){
    $save = $crud->delete_user();
    if($save)
        echo $save;
}

if($action == 'signup'){
    $save = $crud->signup();
    if($save) {
        // If signup is successful, automatically log in the new user
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = $crud->loginWithCredentials($username, $password);
        echo $login;
    }
}

if($action == 'update_account'){
    $save = $crud->update_account();
    if($save)
        echo $save;
}

if($action == "save_settings"){
    $save = $crud->save_settings();
    if($save)
        echo $save;
}

if($action == "save_category"){
    $save = $crud->save_category();
    if($save)
        echo $save;
}

if($action == "delete_category"){
    $delete = $crud->delete_category();
    if($delete)
        echo $delete;
}

if($action == "save_house"){
    $save = $crud->save_house();
    if($save)
        echo $save;
}

if($action == "delete_house"){
    $save = $crud->delete_house();
    if($save)
        echo $save;
}

if($action == "save_tenant"){
    $save = $crud->save_tenant();
    if($save)
        echo $save;
}

if($action == "delete_tenant"){
    $save = $crud->delete_tenant();
    if($save)
        echo $save;
}

if($action == "get_tdetails"){
    $get = $crud->get_tdetails();
    if($get)
        echo $get;
}

if($action == "save_payment"){
    $save = $crud->save_payment();
    if($save)
        echo $save;
}

if($action == "delete_payment"){
    $save = $crud->delete_payment();
    if($save)
        echo $save;
}

/* --- New Actions for the Added Pages --- */

// Tuition Management
if($action == "save_tuition"){
    $save = $crud->save_tuition();
    if($save)
        echo $save;
}

if($action == "delete_tuition"){
    $delete = $crud->delete_tuition();
    if($delete)
        echo $delete;
}

// Rickshaw Fare Management
if($action == "save_rickshaw_fare"){
    $save = $crud->save_rickshaw_fare();
    if($save)
        echo $save;
}

if($action == "delete_rickshaw_fare"){
    $delete = $crud->delete_rickshaw_fare();
    if($delete)
        echo $delete;
}

// Lost and Found Management
if($action == "save_lost_found"){
    $save = $crud->save_lost_found();
    if($save)
        echo $save;
}

if($action == "delete_lost_found"){
    $delete = $crud->delete_lost_found();
    if($delete)
        echo $delete;
}

// Mess Management
if($action == "save_mess"){
    $save = $crud->save_mess();
    if($save)
        echo $save;
}

if($action == "delete_mess"){
    $delete = $crud->delete_mess();
    if($delete)
        echo $delete;
}

ob_end_flush();
?>
