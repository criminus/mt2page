<?php
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SERVERNAME; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="text-center bg-dark">
    <div class="container">
        <form class="bg-light p-5 shadow rounded form-signin" role="form" action="index.php" method="post">
            <?php welcomeMessage(); ?>
            <div class="form-group">
                <label for="username"><?php echo $form_account; ?></label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email"><?php echo $form_email; ?></label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="social_id"><?php echo $form_delete; ?></label>
                <input type="text" name="social_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="password"><?php echo $form_pwd; ?></label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="repassword"><?php echo $form_repwd; ?></label>
                <input type="password" name="repassword" class="form-control">
            </div>
            <input class="btd btn-primary" type="submit" name="submit" value="<?php echo $reg; ?>">
            <br />
            <br />
            <?php formProcess(); ?>
        </form>
    </div>
    <br />
    <div class="container">
        <p class="bg-light p-5 shadow rounded">Copyright (c) Hunger 2022</p>
    </div>
</body>
</html>