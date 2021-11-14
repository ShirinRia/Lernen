<?php session_start(); ?>
<?php 
include 'db.php';
$crid = $_GET['sec'];
$lvl = $_GET['b'];
$_SESSION['qid']=$crid;
$_SESSION['qlvl']=$lvl;
$query = "SELECT * FROM questions WHERE crs_id= $crid AND level= '$lvl'";
$total_questions = mysqli_num_rows(mysqli_query($connection,$query));


?>
<html>
<head> 
	<title>Quizer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<header>
		<div class="container">
			
		</div>
	</header>

	<main>
			<div class="container">
				<h2>Test Yourself</h2>
				<p>
					This is a multiple choise quiz to test your  Knowledge.
				</p>
				<ul>
					<li><strong>Number of Questions:</strong><?php echo $total_questions; ?> </li>
					<li><strong>Type:</strong> Multiple Choise</li>
				<!--	<li><strong>Estimated Time:</strong> <?php echo $total_questions*1.5; ?></li>-->

				</ul>

				<a href="question.php?n=1&b=<?php echo $lvl;?>" class="start">Start Quize</a>

			</div>

	</main>


	<footer>
			<div class="container">
				Copyright &copy; Lernen
			</div>


	</footer>
