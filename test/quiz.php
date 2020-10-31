<?php 
    include("header.php");
    include("config.php");

    $sql =  "SELECT * FROM questions";
    $result = $conn->query($sql);
    $total_question = $result->num_rows;
?>

<main>
    <div class="container">
        <h2> Test your knowledge!!!</h2>
        <p>This test comprises multiple choice based questions.</p>
        <ul>
            <li><strong>Number of Questions :</strong><?php echo $total_question; ?></li>
            <li><strong>Type : </strong>Multiple Choice Questions</li>
            <li><strong>Estimated Time : </strong><?php echo $total_question*2; ?> minutes</li>
        </ul>  
        <a href="question.php?n=1" class="start">Start Quiz</a>
    </div>
</main> 
<?php include("footer.php"); ?>  

