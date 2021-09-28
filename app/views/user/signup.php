<?php 
// require '../scripts/php/funcs.php';

// if (isset($_POST['signup'])){
//     $error = signup($_POST);
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
            <h2>Sign Up</h2>
            <div class="auth-container">
                <div class="form">
                    <form action="<?= BASEURL ?>/user/signup" method="post">
                        <input class="input-field" type="text" placeholder="Username" name="username">
                        <input class="input-field" type="email" placeholder="Email" name="email">
                        <input class="input-field" type="password" placeholder="Password" name="password">
                        <input class="input-field" type="password" placeholder="Confirm Password" name="confirm-password">
                        <input type="submit" name="signup" value="Sign Up">
                    </form>
                    <?php if (isset($data['error'])) : ?>
                    <?php if ($data['error'] == 0) : ?>
                        <p class="error" style="">Something wrong</p>
                    <?php endif; ?>
                    <?php if ($data['error'] == -1) :?>
                        <p class="error" style="">Field cannot empty!!</p>
                    <?php endif; ?>    
                    <?php if ($data['error'] == -2) : ?>
                        <p class="error" style="">Password doesn't match</p>
                    <?php endif; ?>
                    <?php if ($data['error'] == -3) : ?>
                        <p class="error" style="">Username is already exists</p>
                    <?php endif; ?>
                    <?php if ($data['error'] > 0) : ?>
                        <p class="error" style="color:green;">Sign up is successfully</p>
                    <?php endif; ?>
                <?php endif; ?>
                    
                </div>
                <p class="other">Already have an account? <a href="<?= BASEURL ?>/user/signin">Sign In</a></p>
            </div>
        </div>
    </main>
</body>
</html>