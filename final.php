<?php 

session_start();
require_once 'db/conn.php';

$cid=$_SESSION['qid'];
$res = $crud->ques($cid);
//$ans = $crud->crct();
//$_SESSION['ansr'] = $ans['coption'];
?>

<html>
<head>
	<title>PHP Quizer</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<header>
		<div class="container">
			<p>PHP Quizer</p>
		</div>
	</header>

	<main>
			<div class="container">
				<h2>Your Result</h2>
				<p>Congratulation You have completed this test succesfully.</p>
				<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>  </p>
				<?php unset($_SESSION['score']); ?>
				
			

			<table class="table table-bordered">
  <tbody>
  <?php while($r = $res->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
      
      <td><?php echo $r['question_text'] ?></td>
	  <?php $usans = $crud->usransr($r['question_number']);?>
      <td>Your Answer :<?php echo $usans['coption'];  ?><br>
	  <?php $ans = $crud->crct($cid,$r['question_number']);?>
	Correct Answer: <?php echo $ans['coption'];  ?></td>
    </tr>
	   
    <?php }?>
  </tbody>
</table>
</div>
	</main>
	<?php $usdlt = $crud->usrdlt();?>

	<footer>
			<div class="container">
				Copyright &copy; Lernen
			</div>


	</footer>








</body>
</html>