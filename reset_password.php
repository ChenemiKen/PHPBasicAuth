<?php
     if(isset($_POST['submit'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];

        $username = $_SESSION['username'];

        $db = file_get_contents('database.json');
        $db_data = json_decode($db, true);

        // check user password
        if($db_data[$username]['password']=== $oldpassword){
            $db_data[$username]['password'] = $new_password;
            $response = $username.'Your password was reset successfully';
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
        if(session_id() == '' || !isset($_SESSION)) {
            // session isn't started
    ?>
            You are not logged in.
            <li><a href="login.php">Login</a></li>
    <?php  
        }else{
    ?>
            <li><a href="logout.php">Logout</a></li>

            <form action="" method='post'>
                <input type="password" name='old_password' placeholder='Old Password'>
                <input type="password" name='new_password' placeholder='New Password'>
                <button type='submit' name='submit'>Reset Password</button>
            </form>
    <?php
        }
    ?>
    
</body>
</html>