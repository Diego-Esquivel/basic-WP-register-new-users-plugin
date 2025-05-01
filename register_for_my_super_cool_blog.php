<?php
if(!isset( $email )) { $email = '';}
if(!isset( $email_confirm )) { $email_confirm = '';}
if(!isset( $password )) { $password = '';}
if(!isset( $password_confirm )) { $password_confirm = '';}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Super Cool Blog Registration</title>
<!-- todo <link rel="stylesheet" type="text/css" href="todo.css"/>-->
</head>

<body>
    <main>
        <h1>My Super Cool Blog Registration</h1>
        <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
<form action="my-super-cool-blog-registration.php" method="post">
<div id="data">
<label>E-Mail:</label>
<input type="text" name="email" value="<?php echo $email;?>"/>
<br/>
<label>Confirm E-Mail:</label>
<input type="text" name="email_confirm" value="<?php echo $email_confirm;?>"/>
<br/>
<label>Password:</label>
<input type="text" name="password" value="<?php echo $password;?>"/>
<br/>
<label>Confirm Password:</label>
<input type="text" name="password_confirm" value="<?php echo $password_confirm;?>"/>
<br/>
</div>
<div id="register_button">
<label>&nbsp;</label>
<input type="submit" value="Register">
<br/>
</div>
</form>
    </main>
</body>
</html>
