<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login terlebih dahulu');
            document.location.href = 'login.php';
            </script>";
    exit;
}

require_once("config.php");
if (isset($_GET['targetID']) && isset($_GET['userID'])){
    $result = mysqli_query($db, "SELECT * FROM `user` ORDER BY us_id ASC;");
}else{
    $result = mysqli_query($db, "SELECT * FROM `user` where `us_id`<>".$_SESSION['us_id']." ORDER BY us_id ASC LIMIT 1;");
    $res = mysqli_fetch_assoc($result);
    header("Location: komunikasi.php?targetID=$res[us_id]&userID=".$_SESSION['us_id']."");
}

?>

<?php
include 'layout/header.php';
?>
      
    <div class="container-fluid container-komunikasi">
        <div class="friend-box-content">
            <div class="friend-box-content-1">
            <div class="friend-container">
                <div class="friend-list">
                    <?php
                        while ($res = mysqli_fetch_assoc($result)) {
                            if($res['us_id']!=$_GET['userID']){
                                echo "<div class='friend-box'>
                                        <a href=\"komunikasi.php?targetID=$res[us_id]&userID=".$_GET['userID']."\">
                                        <img src=\"img/user/$res[us_image].\">
                                        <h5>$res[us_username]</h5>
                                        <div class='overlay'>
                                        </div>
                                        </a>
                                    </div>";
                            }
                        }
                    ?>
                </div>
            </div>
            </div>
        </div>
        <div class="friend-box-content">
            <div class="friend-box-content-2">
            <div class="friend-name-container">
                <div class="friend-name">
                    <?php
                        $result = mysqli_query($db, "SELECT * FROM `user` WHERE us_id=".$_GET['targetID'].";");
                        $res = mysqli_fetch_assoc($result);
                        echo "<h1>Now Speaking to: ".$res['us_username']."</h1>";
                    ?>
                </div>
            </div>
            <div class="chat-container">
                <div id="chatScroll" class="chat-list">
                    <?php
                        $result = mysqli_query($db, "SELECT * FROM pesan WHERE (`p_us_2_id`=".$_GET['userID']." AND `p_us_1_id`=".$_GET['targetID'].") OR (`p_us_1_id`=".$_GET['userID']." AND `p_us_2_id`=".$_GET['targetID'].")");
                        while($res=mysqli_fetch_assoc($result)){
                            $resNama = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `user` WHERE `us_id`=$res[p_us_2_id] LIMIT 1;"));
                            echo "<div class=\"chat-box\">";
                            if($resNama['us_id']==$_SESSION['us_id']){
                                echo "<p style=\"font-weight: bold;\">Me";
                                echo"    </p>
                                <p>
                                    $res[p_isipesan]
                                </p>
                            </div>";
                            }else{
                                echo "<p style=\"text-align: right; font-weight: bold;\">$resNama[us_username]";
                                echo"    </p>
                                <p style=\"text-align: right;\">
                                    $res[p_isipesan]
                                </p>
                            </div>";
                            }
                            
                        }
                    ?>
                </div>
                <div class="message-box">
                    <form method="post" action="komunikasi-handler.php" id="sendMessageForm" class="message-form">
                        <input type="text" name="message" id="textInput" class="message-text" placeholder="Say Hi!">
                        <input type="hidden" name="targetID" value="<?php echo $_GET['targetID']; ?>">
                        <input type="hidden" name="userID" value="<?php echo $_GET['userID']; ?>">
                        <button type="submit" name="send" value="Send" class="message-submit">Send</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        let scrollingDiv = document.getElementById("chatScroll");
        scrollingDiv.scrollTop = scrollingDiv.scrollHeight;
    </script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
     <script src="script.js"></script>
  </body>
</html>