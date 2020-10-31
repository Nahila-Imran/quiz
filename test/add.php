<?php
    include("header.php");
    include("config.php");
?>
<?php
    if(isset($_POST["submit"]))
    {
        $ques_nos = $_POST['question_number'];
        $ques_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];

        $choice = array();
        $choice[1] = $_POST['choice1'];
        $choice[2] = $_POST['choice2'];
        $choice[3] = $_POST['choice3'];
        $choice[4] = $_POST['choice4'];

        $sql1 = "INSERT INTO questions (`question_number`, `question_text`) VALUES ('".$ques_nos."', '".$ques_text."')";
        $result1 = $conn->query($sql1);
        if($result1)
        {
            foreach($choice as $option => $value)
            {
                if($value != "")
                {
                    if($correct_choice == $option)
                    {
                        $is_correct = 1;
                    }else{
                        $is_correct = 0;
                    }
                $sql2 = "INSERT INTO choice (`question_number`, `is_correct`, `choice`) 
                        VALUES ('".$ques_nos."', '".$is_correct."','".$value."')";
                $result2 = $conn->query($sql2);
                if($result2)
                {
                    continue;
                }else{
                    echo '<script>alert("2..Products not Added in DataBase !!!")</script>';
                    header("Location: add.php"); 
                }
            }
        }
        echo '<script>alert("Question has been Added Successfully !!!")</script>'; 
        header("Location: add.php");       
    }
}
    $sql =  "SELECT * FROM questions";
    $result = $conn->query($sql);
    $total = $result->num_rows;
    $next = $total + 1;
?>
<main>
    <div class="container">
        <h2>Add Question</h2>

        <form method="POST" action="add.php">
            <p>
                <label>Question Number :</label>
                <input type="number" name="question_number" value="<?php echo $next; ?>">
            </p>
            <p>
                <label>Question Text :</label>
                <input type="text" name="question_text">
            </p>
            <p>
                <label>Choice 1:</label>
                <input type="text" name="choice1">
            </p>
            <p>
                <label>Choice 2:</label>
                <input type="text" name="choice2">
            </p>
            <p>
                <label>Choice 3:</label>
                <input type="text" name="choice3">
            </p>
            <p>
                <label>Choice 4:</label>
                <input type="text" name="choice4">
            </p>
            <p>
                <label>Correct Option Number</label>
                <input type="number" name="correct_choice">
            </p>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
</main>  
<?php include("footer.php"); ?>  


