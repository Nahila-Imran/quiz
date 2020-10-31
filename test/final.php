<?php
    include("header.php");
    session_start();
?>
    <main>
        <div class="container">
        <h3>Scoreboard</h3>
        <p>You have completed this test successfully.</p>
        <p><strong>Score</strong> is <?php echo $_SESSION['marks']; ?>
        <?php unset($_SESSION['marks']); ?>
        </div>
    </main>
<?php include("footer.php"); ?>
