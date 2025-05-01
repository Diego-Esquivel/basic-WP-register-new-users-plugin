<?php
require __DIR__ . '/wp-load.php';
require_once ABSPATH . WPINC . '/pluggable.php';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$email_confirm = filter_input(INPUT_POST, 'email_confirm');
$password = filter_input(INPUT_POST, 'password');
$password_confirm = filter_input(INPUT_POST, 'password_confirm');
//validate form data
if( $email == $email_confirm ){
if( $password == $password_confirm ){
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$u = mysqli_real_escape_string($conn, $email);
if(!mysqli_connect_error()){
if( $u != ''){
$sql_str = "SELECT * from wp_users where user_login='" . $u . "' order by ID asc limit 2";
$cur = mysqli_query($conn, $sql_str);
if(!$cur || mysqli_num_rows($cur) == 0){
$sql_str = "INSERT INTO wp_users (user_login, user_nicename, user_email, user_registered) values ('".$u."', '".$u."', '".$u."', NOW())";
mysqli_query($conn, $sql_str);
$sql_str = "SELECT ID FROM wp_users WHERE user_login='".$u."' ORDER BY ID ASC LIMIT 1";
$cur = mysqli_query($conn, $sql_str);
$new_user_id = mysqli_fetch_assoc($cur)["ID"];
mysqli_query($conn, "INSERT INTO wp_usermeta (user_id, meta_key, meta_value ) values ('".$new_user_id."', 'wp_capabilities', 'a:1:{s:6:\"author\";b:1;}')");
mysqli_query($conn, "INSERT INTO wp_usermeta (user_id, meta_key, meta_value ) values ('".$new_user_id."', 'nickname', '$u')");
wp_set_password($password, $new_user_id);
mysqli_close($conn);
header("Location: wp-login.php");
exit();
}
}
mysqli_close($conn);
}
}
}
header("Location: register_for_my_super_cool_blog.php");
?>
