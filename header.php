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

        /* fonts */
        @import url("https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap");

        /* base layout */
        html {
            font-size: 62.5%;
            scroll-behavior: smooth;
        }

        .section-navbar {
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.5) 0px 6px 24px 0px, rgb(0 0 0 / 0%) 0px 0px 0px;
        }

        .container {
            max-width: 142rem;
            margin: 0 auto;
            padding: 9.6rem 2.4rem;
        }

        .section-navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 0;
        }

        .section-navbar .container ul {
            display: flex;
            gap: 3.2rem;
            flex-wrap: wrap;
        }

        & li a {
            color: #000a19;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 1.6rem;
            display: inline-block;
            position: relative;

            &::after {
                content: "";
                position: absolute;
                bottom: -0.3em;
                left: 0;
                width: 0;
                border-bottom: 0.2em solid #0062ff;
                transition: all 0.3s linear;
            }
        }

        & li a:hover:after {
            width: 100%;
            color: #0062ff;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }
    </style>
</head>

<body>
    <header class="section-navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php">
                    <img src="./imgaes/download.png" alt="news logo" width="35%" height="auto">
                </a>


            </div>
            <nav class="navbar">
                <ul>
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="articles.php">Article</a></li>


                    <?php
                    session_start();
                    if (empty($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='user_signup.php'>Signup👤</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout➡️</a></li>";
                    }
                    ?>
                    <li class="nav-item" id="menuBtn"><button class="nav-link menu"><ion-icon name="filter-sharp" class="menu-btn-nav"></ion-icon></button></li>

                </ul>
            </nav>
        </div>
    </header>
    <div class="main-head-navbar-div">
        <section id="resNavLinksRes" class="itemsList">
            <ul class="main-home-nav-link">
                <li><a href="index.php" class="nav-link-btn">Home</a></li>
                <hr>
                <li><a href="news.php" class="nav-link-btn">News</a></li>
                <hr>
                <li><a href="articles.php" class="nav-link-btn">Article</a></li>
                <hr>
                <?php

                if (empty($_SESSION['username'])) {
                    echo "<li class='nav-item'><a class='nav-link-btn' href='user_signup.php'>Signup</a></li><hr>";
                    echo "<li class='nav-item'><a class='nav-link-btn' href='user_login.php'>Login</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link-btn' href='logout.php'>Logout➡️</a></li>";
                }
                ?>

                <li><button class="nav-link-btn crossBtn crossIcon"><ion-icon name="close-sharp"></ion-icon></button></li>
            </ul>
        </section>
    </div>
    <script>
        let menuItems = document.querySelector('.itemsList');

        let menuBtn = document.querySelector(".menu").addEventListener("click", () => {
            menuItems.classList.add("menuShow");

        })

        let closeBtn = document.querySelector(".crossBtn").addEventListener("click", () => {
            menuItems.classList.remove("menuShow");
        })
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>