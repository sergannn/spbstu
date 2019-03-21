<?php
//session_start();
//require_once "connectDB.php";
?>
<div class="body content">
    <div class="welcome">
        <?php
     //   $mysqli = new mysqli("localhost", "root", "mypass123", "accounts_complete");
        $sql = "SELECT * FROM users";
        //$result = mysqli_result object
        $result =   $mysqli->query( $sql );
        ?>
        <div id='registered'>
            <span>All registered users:</span>
            <?php
            //returns associative array of fetched row
            while( $row = $result->fetch_assoc() ){
                echo "<div class='userlist'><span>".$row['username']."</span><br />";
                echo "<img src='".$row['avatar']."'></div>";
            }
            ?>
        </div>
    </div>
</div>