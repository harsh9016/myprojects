<?php

include('connection.php');
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from user_regestration where username='$username' and password='$password'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $raw = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $raw['username'];

            echo "<script>alert('Login Successful!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {

            echo "<script>alert('Login Unsuccessful!')</script>";
        }
    } else {
        echo "<script>alert('Login Unsuccessful!')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "urbaniest", sans-serif;

        }

        body {
            background-color: #cfdbed;
            width: 100%;
            height: auto;
        }

        h1 {
            display: flex;
            justify-content: center;
            font-weight: 785;
            font-size: 2rem;
        }

        .main-section {
            border: 1px solid white;
            border-radius: 30px;
            width: 460px;
            height: 350px;
            margin: 9rem;
            padding: 3.5rem 2rem;
            background-color: white;

        }

        .form-design {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        main {
            display: grid;
            justify-content: center;
            text-align: center;
        }

        .sub-btn {
            background-color: rgb(253, 73, 73);
            color: white;
            padding: 6px 82px;
            font-size: large;
            font-weight: 600;
            text-decoration: none;
            border-radius: 10px;
        }

        label {
            font-size: large;
            height: 1rem;
            font-weight: 750;
            letter-spacing: 0.5px;

        }

        .text {
            font-size: large;
            border-radius: 7px;
            height: 30px;
            font-family: urbaniest sans-serif;
            padding-left: 10px;
        }

        .fora-para {
            color: rgb(253, 73, 73);
            font-weight: 540;
        }

        .new-acc-btn {
            text-decoration: none;
            color: rgb(253, 73, 73);
        }
    </style>
</head>

<body>
    <main>
        <section class="main-section">

            <h1>User Login</h1>
            <div class="form-design">
                <form method="post">


                    <input type="textbox" name="username" class="text" required placeholder="Username">
                    <br>
                    <br>

                    <input type="password" name="password" class="text" required placeholder="Password">
                    <br><br><br>
                    <button type="submit" class="sub-btn" name="submit">Submit</button><br><br>
                    <p class="fora-para">Not Registered? </p><a href="user_signup.php" class="new-acc-btn"> Create a New Account</a>
                </form>

            </div>

        </section>
    </main>
</body>

</html>