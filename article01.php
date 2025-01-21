<?php
include("header.php");
include("connection.php");

$id = $_GET['id'];
// echo $id;


// session_start();
if (empty($_SESSION['username'])) {
    echo "<script>alert('Please Login!')</script>";
    echo "<script>window.location.href='user_login.php'</script>";
}


if (isset($_POST['sub_feed'])) {
    if (empty($_SESSION['username'])) {
        echo "<script>alert('Please Login!');window.location.href = 'index.php';</script>";
        exit;
    }
    $feedback = $_POST['message'];
    $user_id = $_SESSION['username'];
    $sql = "INSERT INTO feedback(username,message)
    VALUES('$user_id','$feedback')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Your Feedback Added!')</script>";
    } else {
        echo "<script>alert('Your Feedback not Added!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .div-main {
            width: 65vw;
            padding: 10px 50px;
            background-color: rgb(216, 209, 209);
            padding-bottom: 30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .main-para {
            font-weight: 700;
            letter-spacing: 0.7px;
            font-size: 15px;
            line-height: 2;
        }

        .manage-btn {
            background-color: rgb(70, 70, 242);
            padding: 15px;
            color: white;
            border-radius: 5px;
            font-size: medium;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-decoration: none;
            font-family: urbaniest sans-serif;
            align-items: center;
            justify-content: center;
            border: 0px;
            text-align: center;
        }

        .div-class {
            display: flex;
            background-color: white;
            padding: 10px;
            margin-bottom: 15px;

        }

        .h1-div {
            font-size: 3rem;
            font-weight: 800;
        }


        .add-feedback-div {
            position: fixed;

            display: flex;
            top: -600vh;
            transition: 0.6s;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100vw;
        }

        .showMod {
            top: 600vh !important;
        }

        .model {
            width: 400px;
            background-color: white;
            height: 350px;

            /* box-shadow: 2px 4px 10px blue; */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 20px 20px;
            border-radius: 8px;
        }

        .model .cross {
            position: absolute;
            top: 0;
            right: 0;
        }

        .model #message {
            resize: none;
            margin-top: 10px;
        }

        .cross {
            border: 0px;
            background-color: transparent;
            padding: 10px;
        }

        .submit-btn {
            background-color: red;
            color: white;
            border: 0px;
            padding: 10px 168px;
            font-weight: 600;
            border-radius: 3px;

            &:hover {
                background-color: black;
            }
        }

        .close-btn {
            width: 30px;
            height: 30px;

            &:hover {
                color: red;
            }
        }

        .textareafeedback {
            width: 25vw;
            height: 30vh;
            padding: 5px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            letter-spacing: 1px;
            font-weight: 600;

            &:hover {
                background-color: rgb(64, 60, 60);
                color: white;
            }
        }

        .main-headin-news-div {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <br>
    <div class="add-feedback-div">
        <div class="model" id="model">
            <form method="post">
                <button class="cross hideMod"><ion-icon name="close-circle" class="close-btn"></ion-icon></button>
                <h1 style="text-decoration:underline double red">Feedback</h1>
                <textarea name="message" rows="" cols="" id="message" required class="textareafeedback"></textarea><br><br>
                <button name="sub_feed" class="submit-btn">Submit</button>
                <br>
            </form>
        </div>
    </div>
    <br>
    <main>
        <div class="main-headin-news-div">
            <?php
            $q = "select * from aricle where id = '$id'";
            $sql = mysqli_query($conn, $q);
            $row = mysqli_fetch_array($sql);
            echo '
<div class="div-main">
                <h1 class="h1-div">' . $row['title'] . '
                </h1>
                <img src="./imgaes/' . $row['image'] . '" alt="/" width="100%" ><br><br>
                <div class="div-class">
                       </div>

                <p class="main-para">
                    ' . $row['desciption'] . '
                </p><br><br>
                <a href="articles.php" class="manage-btn">Back</a>'
            ?>

            <button class="manage-btn showModel">ADD Feedback</button>
        </div>

        </div>
        </div>
    </main><br><br>

    <script>
        let butshow = document.querySelector(".showModel");
        let model = document.querySelector("#model");
        let hideMod = document.querySelector(".hideMod");
        butshow.addEventListener("click", function() {
            console.log("called")
            model.classList.add("showMod");
        })
        hideMod.addEventListener("click", function() {
            model.classList.remove("showMod");
        })
    </script>
</body>

</html>

<?php

include("footer.php");
?>