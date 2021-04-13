<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_details = [
                'username'=> $username,
                'email' => $email,
                'password' => $password
        ];

        $db = file_get_contents('database.json');
        $db_data = json_decode($db, true);
        $db_data[$username] = $user_details;
        file_put_contents('database.json', json_encode($db_data));
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
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
    <h4>Register</h4>
    <form action="" method='post'>
        <input type="text" name='username' placeholder='Username'>
        <input type="email" name="email" placeholder='Email Address'>
        <input type="password" name='password' placeholder='Password'>
        <button type='submit' name='submit'>Submit</button>
    </form>
</body>
</html>