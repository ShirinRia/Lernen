<?php

include_once 'includes/session.php';
    $conn = new mysqli('localhost', 'root', '', 'learnen_two');
    $crs_id=$_SESSION['sec'];
    $usr_id=$_SESSION['userid'];
    if (isset($_POST['save'])) {
        $uID = $conn->real_escape_string($_POST['uID']);
        $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
        
        $ratedIndex++;

        if (!$uID) {
           // $sql=$conn->query("DELETE FROM `stars` WHERE user=0");
            //$dlt = $sql->fetch_assoc();
            $conn->query("INSERT INTO stars (rateIndex,user,crs_id) VALUES ('$ratedIndex','$usr_id','$crs_id')");
            $sql = $conn->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
            $uData = $sql->fetch_assoc();
            $uID = $uData['id'];
        } else{
            $sql= $conn->query("SELECT * FROM stars WHERE user='$usr_id' AND crs_id='$crs_id'");
            $Data = $sql->fetch_assoc();
            $useR = $sql->num_rows;
            if($useR==0){
                $conn->query("INSERT INTO stars (rateIndex,user,crs_id) VALUES ('$ratedIndex','$usr_id','$crs_id')"); 
            }
            else
            $conn->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE user='$usr_id' AND crs_id='$crs_id'");
        }
        exit(json_encode(array('id' => $uID)));
    }

    $sql = $conn->query("SELECT id FROM stars WHERE crs_id='$crs_id'");
    $numR = $sql->num_rows;

    $sql = $conn->query("SELECT SUM(rateIndex) AS total FROM stars WHERE crs_id='$crs_id'");
    $rData = $sql->fetch_array();
    $total = $rData['total'];

    $avg = $total / ($numR-1);
    $_SESSION['ratng']=$avg;
    $conn->query("UPDATE course SET rating='$avg' WHERE c_id='$crs_id'");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rating System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <div align="center" >
        <i class="fa fa-star fa-2x" data-index="0"></i>
        <i class="fa fa-star fa-2x" data-index="1"></i>
        <i class="fa fa-star fa-2x" data-index="2"></i>
        <i class="fa fa-star fa-2x" data-index="3"></i>
        <i class="fa fa-star fa-2x" data-index="4"></i>
        <br><br>
        <?php echo round($avg,2) ?>
    </div>

   
    <script>
        var ratedIndex = -1, uID = 0;

        $(document).ready(function () {
            resetStarColors();

            if (localStorage.getItem('ratedIndex') != null) {
                setStars(parseInt(localStorage.getItem('ratedIndex')));
                uID = localStorage.getItem('uID');
            }

            $('.fa-star').on('click', function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
               saveToTheDB();
            });

            $('.fa-star').mouseover(function () {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function () {
                resetStarColors();

                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });

        function saveToTheDB() {
            $.ajax({
               url: "star.php",
               method: "POST",
               dataType: 'json',
               data: {
                   save: 1,
                   uID: uID,
                   ratedIndex: ratedIndex
               }, success: function (r) {
                    uID = r.id;
                    localStorage.setItem('uID', uID);
               }
            });
        }

        function setStars(max) {
            for (var i=0; i <= max; i++)
                $('.fa-star:eq('+i+')').css('color', 'green');
        }

        function resetStarColors() {
            $('.fa-star').css('color', 'gray');
        }
    </script>
</body>
</html>