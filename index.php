<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include "./utils/bootstrap.php";
    ?>
    <title>Mini Projet</title>
</head>

<body>
    <div class="container">
        <div>
            <h1>Gestionnaire de stage</h1>
            <h2>Login</h2>
            <form class="form" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        header('location: /auth/login.php?email=' . $email . '&password=' . $password);
    }
    ?>
</body>

</html>