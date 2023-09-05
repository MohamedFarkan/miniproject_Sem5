<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div id="loginGroup" class="col-lg-6">
        <div class="container">
            <?php
            if (isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                require_once "data.php";
                $sql = "SELECT * FROM user_details WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {

                    if (password_verify($password, $user["password"])) {
                        header("Location: /portfolio/home.html");
                        die();
                    } else {
                        echo "<div class='alert alert-danger'>Wrong password😥</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>User does not exist☹️</div>";
                }
            }

            ?>
            <form action="log.php" class="row g-10" method="post">
                <div class="col-lg-12">
                    <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                </div>
                <div class="form-btn">
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>