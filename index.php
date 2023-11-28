<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Mini Projet</title>
</head>

<body>
    <?php
    include "./Components/navbar.php";
    ?>
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
                    <input type="password" class="form-control" name="password" >
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
    <?php
    include "connect/dbconfig.php";
    include "connect/connect.php";
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM administrateur WHERE login = :email AND mot_de_passe = :password ";
        $sth = $cnx->prepare($query);
        $sth->bindParam('email',$email);
        $sth->bindParam('password',$password);
        $sth->execute(); 
        $result = $sth->fetch(PDO::FETCH_ASSOC); 
        if($result) echo "LOGGED IN";
        else echo "NOT LOGGED IN" ; 
    }
    ?>
</body>

</html>