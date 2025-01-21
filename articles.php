<?php
include("header.php");
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- <link rel="stylesheet" href="./css/style.css"> -->
	<style>
		html,
		body {
			overflow-x: hidden;
		}


		.section-article {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}

		.main-div-article {
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.articles {
			border: 3px solid white;
			border-radius: 2px;
			width: 350px;
			height: 500px;
			background-color: lightgray;
			margin: 20px 5px;
			padding: 10px;
			margin-left: 21.5px;
			justify-content: center;
		}

		.div-para {
			font-weight: 800;
			font-size: 25px;
			color: black;
			line-height: 30px;
			letter-spacing: 0.3px;
		}

		.div-paragraph {
			font-size: 15px;
			letter-spacing: 0.2px;
			margin-top: 5px;

		}

		.div-readmore-btn {
			background-color: rgb(167, 12, 12);
			padding: 5px;
			color: white;
			font-weight: 700;
			border-radius: 5px;
			font-size: medium;
		}

		.div-readmore-btn:hover {
			background-color: rgb(233, 95, 95);
			padding-right: 15px;
			transition: 0.9s;
		}

		.main-article {
			display: flex;
		}

		.more-article-btn {
			font-family: sans-serif;
			font-weight: 900;
			color: white;
			font-size: 1.5rem;
		}

		.more-article-:hover {
			background-color: rgba(251, 74, 74, 0.961);
		}

		.add-articles {
			border: 3px solid white;
			border-radius: 2px;
			width: 350px;
			height: 500px;
			background-color: rgba(165, 42, 42, 0.914);
			margin: 20px 5px;
			padding: 10px;
			margin-left: 21.5px;
			display: flex;
			text-align: center;
			align-items: center;
			justify-content: center;
		}

		.add-articles:hover {
			background-color: rgba(255, 0, 0, 0.648);
		}

		.heading-text {
			font-family: Verdana, Geneva, Tahoma, sans-serif;
			color: black;
			text-decoration: underline double red;
			font-size: 2.3rem;
			font-weight: 700;
			margin: 30px;

		}

		/* header style css */
		#resNavLinksRes {
			width: 234px;
			position: relative;
			background-color: rgb(247, 192, 192);
			padding: 20px 0px;
			border: 3px solid white;
			color: white;
			height: 42vh;
			z-index: 1;
			top: 0;
			left: 150vw;
			overflow-x: hidden;
			transition: all ease-in-out 0.3s;
			line-height: 2;
		}

		.main-home-nav-link {
			display: flex;
			width: 30vw;
			padding: 10px;
			flex-direction: column;
		}

		.main-head-navbar-div {
			position: absolute;
			z-index: 1;
			right: 0;
			height: 100vh;
			overflow-x: hidden;
		}

		.crossIcon {
			position: absolute;
			background-color: transparent;
			border: none;
			top: 10px;
			right: 30px;
			border: 2px solid white;
			border-radius: 50px;
			display: flex;
			align-items: center;
			padding: 8px;
		}

		#menuBtn {
			display: none;

		}

		.menuShow {
			left: 0 !important;
			z-index: 10;
		}

		@media (max-width:799px) {

			#menuBtn {
				display: block !important;
			}

			.navbar ul li {
				display: none !important;
			}

		}

		@media (min-width:799px) {
			#resNavLinksRes {
				display: none;
			}
		}

		.nav-link {
			background-color: transparent;
			border: 0px;
		}

		.menu-btn-nav {
			font-size: larger;
			width: 8vw;
			height: 5vh;
		}
		/* end */
	</style>
</head>

<body>


	<section class="section-article">
		<h1 class="heading-text">Article </span></h1>
		<div class="main-div-article"><br><br>

			<div class="main-article" style="width: 100%;display: flex;flex-wrap:wrap">

				<?php
				function formatTitle($title, $size)
				{
					$words = explode(' ', $title);

					if (count($words) > $size) {
						// Limit to the first 5 words and add "..."
						$formattedTitle = implode(' ', array_slice($words, 0, $size)) . '...';
					} else {
						$formattedTitle = $title;
					}

					return $formattedTitle;
				}

				$q = "select * from aricle";
				$sql = mysqli_query($conn, $q);
				while ($row = mysqli_fetch_assoc($sql)) {
					$editTitle = formatTitle($row['title'], 5);
					$editDescription = formatTitle($row['desciption'], 38);

					echo '<div class="articles">
                    <img src="./imgaes/' . $row['image'] . '" alt="/" style="width: 100%;height: 200px;flex-wrap:wrap;"><br><br>
                    <p class="div-para">
                        ' . $editTitle . '
                    </p>
                    <p class="div-paragraph">
                        ' . $editDescription . '
                    </p><br>
                    <a href="article01.php?id=' . $row['id'] . '" class="div-readmore-btn">Read More->></a>
                </div>';
				}
				echo ' <a href="add-article.php" class="more-article-btn">
                    <div class="add-articles">
                        ADD ARTICLE
                    </div>
                </a>    ';
				?>

			</div><br><br>

	</section>






</body>

</html>
<?php
include("footer.php")
?>