<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="" />
</head>

<body>
    <div class="box">


        <form action="signup.php" method="post">
            <h2>Sign Up</h2>
            <div class="inputbox">
                <input type="text" class="form-control" name="username" />
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="text" class="form-control" name="email" />
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="password" class="form-control" name="password" />
                <span>Password</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="password" class="form-control" name="con_pass" />
                <span>Comfirm Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forgot password?</a>
                <a href="http://127.0.0.1:5500/login.html">Sign In</a>
            </div>
            <input type="submit" name="submit" value="Sign Up" />
        </form>
        <?php

        if (isset($_POST["submit"])) {/*works only if someone clicks submit button*/
            $fullname = $_POST["username"];
            $email = $_POST['email'];
            $password = md5(md5($_POST['password'])); //encrypting the passs
            $cpass = $_POST["con_pass"];
            $error == array();
            if (empty($fullname) or empty($email) or empty($password) or  empty($cpass)) {
                array_push($error, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Enter a valid Email");
            }
            if (strlen($password) < 8) {
                array_push($error, "Password needs to contain atleast 8 characters");
            }
            if ($password !== $$cpass) {
                array_push($error, "Password does not match");
            }
            if (count($error) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                //add data to db
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>