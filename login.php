<?php
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = file_get_contents('database.json');
        $db_data = json_decode($db, true);

        // check if user exists
        if(array_key_exists($username,$db_data)){
            // check user password
            if($db_data[$username]['password']=== $password){
                $_SESSION['username'] = $db_data[$username]['username'];
                $_SESSION['email'] = $db_data[$username]['email'];
                $response = '';
            }else{
                $response = 'Incorrect password';
            }
        }else{
            $response = 'User does not exist';
        }
        echo($response);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h4, initial-scale=1.0">
    <title>Auth:Login</title>
</head>
<body>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
    <h4>Login</h4>
    <?php
        if(!isset($_SESSION['username'])) {
            // session isn't started
    ?>
            <form action="" method='post'>
                <input type="text" name='username' placeholder='Username'>
                <input type="password" name='password' placeholder='Password'>
                <button type='submit' name='submit'>Login</button>
            </form>
    <?php  
        }else{
            echo ('Welcome '.$_SESSION['username']);
    ?>
            <p>You are logged in.. </p>
            <li><a href="reset_password.php">Reset Password</a></li>
            <li><a href="logout.php">Logout</a></li>
    <?php
        }
    ?>
</body>
</html>