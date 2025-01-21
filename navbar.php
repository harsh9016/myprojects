<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    .navbar {
      background-color: rgb(237, 36, 36);
      width: 100%;
      border-bottom: 1px solid white;
      position: relative;
      z-index: 10;
    }

    .nav-link-btn {
      text-decoration: none;
      color: white;
      font-family: Arial, Helvetica, sans-serif;
      font-size: large;
      padding: 10px;
      transition: 0.7s;

      &:hover {
        background-color: rgb(247, 124, 124);

      }
    }

    .link-btn-nav {
      display: flex;
      align-items: center;
      padding: 15px;
      gap: 20px;
      list-style: none;
    }

    .main-nav-div {
      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    .heading-text {
      font-family: cambeia, sans-serif;
      font-size: 1.5rem;
      color: white;
    }

    .hideBar {
      display: none;
    }

    .resNavLinks {
      background-color: rgb(152, 53, 53);
      padding: 10px 10px;
      transition: 1s;
      position: absolute;
      width: 100%;
      top: -200vw;
    }

    .showNav {
      top: 10px !important;
    }

    .resNavLinks ul li {
      margin-bottom: 10px;
      padding-bottom: 16px;
      border-bottom: 2px solid rgba(128, 128, 128, 0.31);
    }

    .iconsHideShow {
      background-color: transparent;
      border: none;
      color: white;
      font-size: 30px;
    }

    /* navbar responsive */
    @media (max-width: 750px) {
      .hideBar {
        display: block;
      }

      .main-nav-div {
        padding: 10px 10px;
      }

      .main-nav-div ul {
        display: none !important;
      }
    }

    /* end */
  </style>
</head>

<body>
  <nav class="navbar">
    <div class="main-nav-div">
      <h1 class="heading-text">NewsPortal</h1>
      <ul
        style="
            display: flex;
            list-style: none;
            gap: 20px;
            align-items: center;
          "
        class="hideUl">
        <li><a href="dashboard.php" class="nav-link-btn">Dashboard</a></li>
        <li><a href="article.php" class="nav-link-btn">Articles</a></li>
        <li><a href="News.php" class="nav-link-btn">News</a></li>
        <li><a href="feedback.php" class="nav-link-btn">Feedback</a></li>
      </ul>
      <ul class="link-btn-nav">

        <li ><a href="logout.php" class="nav-link-btn" >Logout</a></li>
      </ul>
      <button class="hideBar iconsHideShow">
        <ion-icon name="menu-outline"></ion-icon>
      </button>
    </div>
  </nav>
  <!-- responsive nav links -->
  <section class="resNavLinks">
    <ul>
      <li><a href="dashboard.php" class="nav-link-btn">Dashboard</a></li>
      <li><a href="article.php" class="nav-link-btn">Articles</a></li>
      <li><a href="News.php" class="nav-link-btn">News</a></li>
      <li><a href="feedback.php" class="nav-link-btn">Feedback</a></li>

      <li><a href="" class="nav-link-btn">Logout<ion-icon name="log-out-outline"></ion-icon></a></li>
      <button class="hideNavBar iconsHideShow">
        <ion-icon name="close-circle"></ion-icon>
      </button>
    </ul>
  </section>

  <script>
    let btnShow = document.querySelector(".hideBar");
    let navbar = document.querySelector(".resNavLinks");
    let btnHide = document.querySelector(".hideNavBar");
    btnShow.addEventListener("click", function() {
      navbar.classList.add("showNav");
    });
    btnHide.addEventListener("click", function() {
      navbar.classList.remove("showNav");
    });
  </script>
  <script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>