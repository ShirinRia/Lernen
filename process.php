<?php 
//require_once 'db/conn.php';
include 'db.php'; 
?>
<?php session_start(); ?>
<?php 
$uid=$_SESSION['userid'];
$cid=$_SESSION['qid'];

$qslvl=$_GET['b'];;
	//For first question, score will not be there.
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
 if($_POST){
	//We need total question in process file too
 	$query = "SELECT * FROM questions WHERE crs_id=$cid AND level='$qslvl'";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
	
	//We need to capture the question number from where form was submitted
 	$number = $_POST['number'];
	
	//Here we are storing the selected option by user
 	$selected_choice = $_POST['choice'];

	
		$query = "INSERT INTO summry (";
		$query .= "usrid, q_num, ansr)";
		$query .= "VALUES (";
		$query .= " '{$uid}','{$number}','{$selected_choice}' ";
		$query .= ")";
		$resut = mysqli_query($connection,$query);


	//What will be the next question number
 	$next = $number+1;
	
	//Determine the correct choice for current question
 	$query = "SELECT * FROM options WHERE question_number = $number AND crs_id=$cid AND is_correct = 1 AND level='$qslvl'";
 	 $result = mysqli_query($connection,$query);
 	 $row = mysqli_fetch_assoc($result);

 	 $correct_choice = $row['id'];
	
	//Increase the score if selected cohice is correct
 	 if($selected_choice == $correct_choice){
 	 	$_SESSION['score']++;
 	 }
		//Redirect to next question or final score page. 
 	 if($number == $total_questions){
 	 	header("LOCATION: final.php?b=$qslvl");
 	 }else{
 	 	header("LOCATION: question.php?b=$qslvl&n=". $next);
 	 }

 }



?>