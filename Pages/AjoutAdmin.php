<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once "../Classes/Administrateur.php";
if (!Administrateur::isAdmin()) {
    Administrateur::logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include "../Components/bootstrap.php";
    ?>
</head>

<body>
    <?php
    include "../Components/navbar.php"; 
        ?>
    <div class="container mt-5">
        <form method="post">
            <div class="mt-4">
                <input type="email" class="form-control" placeholder="Email de l'admin" name="email" required>
            </div>
            <div class="mt-4">
                <input type="password" class="form-control" placeholder="Password de l'admin" name="password" required>
            </div>
            <button class="btn btn-success mt-4" type="submit" name="submit">Ajouter</button>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $res = Administrateur::addAdmin($email, $password);
        echo $res ? "<h1>Added Successfully</h1>" : "<h1>Cannot add admin</h1>";
    }
    ?>
</body>

</html>