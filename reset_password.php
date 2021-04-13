<?php
    session_start();
     if(isset($_POST['submit'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];

        $username = $_SESSION['username'];

        $db = file_get_contents('database.json');
        $db_data = json_decode($db, true);

        // check user password
        if($db_data[$username]['password']== $old_password){
            $db_data[$username]['password'] = $new_password;
            file_put_contents('database.json', json_encode($db_data));
            $response ='Hey '. $username.' Your password was reset successfully';
        }else{
            $response = 'Incorrect password';
        }
        echo($response);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>        
    <li><a href="index.php">Home</a></li>
    
    <h4>Reset Password</h4>
    <?php
        if(!isset($_SESSION['username'])) {
            // session isn't started
    ?>
            <p>You are not logged in. you need to login to reset password</p>
            <li><a href="login.php">Login</a></li>
    <?php  
        }else{
            echo ('Welcome '.$_SESSION['username'].' reset your password');
    ?> 
            <form action="" method='post'>
                <input type="password" name='old_password' placeholder='Old Password'>
                <input type="password" name='new_password' placeholder='New Password'>
                <button type='submit' name='submit'>Reset Password</button>
            </form>

            <li><a href="logout.php">Logout</a></li>
    <?php
        }
    ?>
    
</body>
</html>