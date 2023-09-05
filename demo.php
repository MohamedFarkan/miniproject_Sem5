<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Sign Up</title>
</head>

<body>
    <div id="loginGroup" class="col-sm-6">
        <h1 id="title">SIGN UP</h1>
        <?php
        if (isset($_POST["submit"])) //works only if someone clicks submit button
        {
            $fullname = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"]; //encrypting the passs
            $cpass = $_POST["con_pass"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            $errors = array();

            if (empty($fullname) and empty($email) and empty($password) and empty($cpass)) {
                array_push($errors, "Please fill the required fields");
            }
            if (empty($fullname) or empty($email) or empty($password) or  empty($cpass)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Enter a valid Email");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password needs to contain atleast 8 characters");
            }
            if ($password !== $cpass) {
                array_push($errors, "Password does not match");
            }
            require_once "data.php";
            $sql = "SELECT * FROM user_details WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                array_push($errors, "User already exists!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO user_details (username, email, password) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo '<script type="text/javascript">';
                    echo ' alert("Register Successful")';  //not showing an alert box.
                    echo '</script>';
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>
        <form action="demo.php" class="row g-10" method="post">
            <div class="col-lg-12">
                <label for="userName" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputName" name="username" placeholder="Enter Your Name">
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter Email">
            </div>
            <div class="col-12">
                <label for="inputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
            </div>
            <div class="col-12">
                <label for="inputPassword2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="con_pass" id="inputPassword2" placeholder="Confirm Password">
            </div>
            <div class="form-btn">
                <button type="submit" name="submit" class="btn btn-primary bg-primary" id="but">Sign in</button>
            </div>
            <div class="col-12">
                <a href="#">Already An User ?</a>
            </div>
            <div>

            </div>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>