<?php 
// session_start();

// if (isset($_SESSION["signin"]))
// {
//     header("Location: ../index.php");
//     exit;
// }

// require '../scripts/php/funcs.php';

// if (isset($_POST["signin"]))
// {
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     require '../db/user_model.php';
//     $userModel = new UserModel();

//     $user = $userModel->getUserByUsername($username);

//     if ($user != null){ 
//         if ($password == $user["password"]){
//             $_SESSION["signin"] = true;
//             $_SESSION["user-id"] = $user['id'];
//             // createLoginLog($username);
            
//             header('Location: ../index.php');
//             exit;
//         }
//     }

//     $error = true;

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>

    <link href="<?= BASEURL ?>/public/css/style_auth.css" rel="stylesheet">

</head>
<body>
    <main>
        <div class="container">
            <h2>Welcome</h2>
            <div class="auth-container">
                <div class="form">
                    <form action="<?= BASEURL ?>/user/signin" method="post">
                        <input class="input-field" type="text" placeholder="Username" name="username">
                        <input class="input-field" type="password" placeholder="Password" name="password">
                        <input type="submit" name="signin" value="Sign In">
                    </form>
                    
                    <?php if (isset($data['error'])) : ?>
                    <p class="error" style="">Username or password incorrect</p>
                    <?php endif; ?>
                </div>
                <p class="other">Not have an account? <a href="<?= BASEURL ?>/user/signup">Sign Up</a></p>
            </div>
        </div>
    </main>
</body>
</html>