<?php
    include("header.php");
    include("config.php");
    session_start();
?>
<?php
    if(!isset($_SESSION['marks']))
    {
        $_SESSION['marks'] = 0;
    }
    if($_POST){
        $sql =  "SELECT * FROM questions";
        $result = $conn->query($sql);
        $total_ques = $result->num_rows;

        $num = $_POST['number'];
        $choice1 = $_POST['choice'];
        $next = $num + 1;

        $sql1 =  "SELECT * FROM choice WHERE question_number = $num AND is_correct = 1";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();

        $choice2 = $row1['id'];
        if($choice1 == $choice2){
            $_SESSION['marks'] ++;
        }
        if($num == $total_ques){
            header("location: final.php");
        }else{
            header("location: question.php?n=".$next);
        }
    }
?>