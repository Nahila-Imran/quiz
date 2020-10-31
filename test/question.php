<?php
    include("header.php");
    include("config.php");
    session_start();
?>
<?php 
    $num = $_GET['n'];

    $sql1 =  "SELECT * FROM questions WHERE question_number = $num";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $sql2 =  "SELECT * FROM choice WHERE question_number = $num";
    $result2 = $conn->query($sql2);
   // $row2 = $result2->fetch_assoc();

    $sql3 =  "SELECT * FROM questions";
    $result3 = $conn->query($sql3);
    $total_ques = $result3->num_rows;
?>
<main>
    <div class="container">
        <div class="current">Question <?php echo $num;?> of <?php echo $total_ques;?> </div>
            <p class="question"><?php echo $row1['question_text'];?></p>
            <form method="post" action="action.php">
                <ul class="choice">
                    <?php
                        while($row2 = $result2->fetch_assoc()) { ?>
                            <li><input type="radio" name="choice" value="<?php echo $row2['id'];?>"><?php echo $row2['choice'];?></p>
                    <?php    
                    }?>
                </ul>
            <input type="hidden" name="number" value="<?php echo $num;?>">    
            <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</main>
<?php include("footer.php"); ?>