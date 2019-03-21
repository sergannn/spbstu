
<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 19.03.2019
 * Time: 21:33
 */
echo 123;


include "head.html";
require_once "connectDB.php";
?>
<div class="body content">
    <div class="welcome">
        <?php
 $u=  $_REQUEST['u'];
        echo $sql = "SELECT * FROM users where username=\"$u\"";
        //$result = mysqli_result object
        $result =   $mysqli->query( $sql );
        ?>
        <div id='registered'>

            <?php
            //returns associative array of fetched row
            while( $row = $result->fetch_assoc() ){
$content='
                <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../'.$row['avatar'].'" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">'.$row['username'].'</h5>
    <p class="card-text">'.$row['email'].'</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>';
            }
            echo $content;
            ?>
        </div>
    </div>
</div>


