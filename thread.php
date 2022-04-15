<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="threadop.css" />
    <link rel="stylesheet" href="extra.css" />
    <title>iDiscuss</title>
</head>

<body>
    <?php require 'connect.php'?>
    <div class="main">
        <div class="wnav">
            <div class="navbar">
                <div class="navl">
                    <h3><a href="categories.php">iDiscuss</a></h3>
                </div>
                <div class="navm">
                    <a href="">Home</a>
                    <a href="">About</a>
                    <div class="navdrop">
                        <a href="">Categories</a><i class="fa-solid fa-caret-down"></i>
                    </div>
                </div>
                <div class="navr">
                    <form action="">
                        <div class="searchbox">
                            <input type="text" placeholder="Search.." name="search" id="search" />
                            <i class="fa-solid fa-magnifying-glass" id="searchicon"></i>
                        </div>
                    </form>
                    <div class="loginanimate">
                        <a href="">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <p>Login</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
$success = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $thread_id = $_GET['threadid'];
    $comment_desc = $_POST['comment_desc'];
    $sql = "INSERT INTO `comments` (`comment_id`, `comment_desc`, `thread_id`, `comment_date`) VALUES (NULL, '$comment_desc', '$thread_id', current_timestamp())";
    $result = mysqli_query($con, $sql);
    $success = true;
    if ($success) {
        echo "<div class='alertsuccess' id='alertsuccess'>
            <p>Your comment has been successfully added</p>
            <i class='fa-solid fa-xmark icon' onclick='closealert()'></i>
        </div>";
    }
}
?>

    <div class="fullthread">
        <div class="lefttags">
            <h4> Tags : </h4>
            <div class="tagbottom">
                <a href=''></h6>programming</h6></a>
                <a href=''></h6>web development</h6></a>
                <a href=''></h6>css selectors</h6></a>
                <a href=''></h6>algorithm</h6></a>
                <a href=''></h6>data structure</h6></a>
                <a href=''></h6>style</h6></a>
                <a href=''></h6>php</h6></a>
                <a href=''></h6>ruby</h6></a>
            </div>
        </div>
        <div class="midques">
            <div class='userheadrelate'>
                <div class="leftuser">
                    <i class='far fa-user'></i>
                    <p class='userhcomment'>domnic123</p>
                </div>
                <?php require 'timeago.php';
$thread_id = $_GET['threadid'];
$sql = "SELECT * FROM threads where thread_id = $thread_id";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $thread_time = $row['time_stamp'];
}
$_SESSION['threadtimeago'] = $thread_time_ago;
?>
                <p class='timehcomment'>Posted 5 min ago</p>
            </div>
            <div class='que'>
                <?php
$thread_id = $_GET['threadid'];
$sql = "SELECT * FROM threads where thread_id = $thread_id";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $thread_id = $row['thread_id'];
    $thread_desc = $row['thread_desc'];
    $thread_title = $row['thread_title'];
    $thread_time = $row['time_stamp'];
    echo "<h1>$thread_title</h1>
    <button class='askbutton'>Ask Question</button>
        <div class='threaddesc'>
            <i class='fa-solid fa-bookmark'>
            <p>Bookmark this question</p></i>
            <p class='quedesc'>$thread_desc</p>";
}?>
                <a class='sharelink'><button onclick="share()">share</button></a>
                <div class='smainmodule'>
                    <div class='sharemodule' id='sharemodule'>
                        <div class='sharebox'>
                            <h4>Share this link</h4>
                            <i class='fa-solid fa-xmark'
                                onclick="document.getElementById('sharemodule').style.cssText = 'visibility:hidden; opacity:0'"></i>
                            <div class='inputcopy'>
                                <a class='shareinput' id='shareinput' onclick=shareinput()></a>
                                <button onclick='share(); copy()'>Copy link</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="commenthead">
            <?php
$thread_id = $_GET['threadid'];
$sql = "SELECT * FROM comments where thread_id = $thread_id";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
    echo "<h3>1 Comment : </h3>";
} elseif ($num > 1) {
    echo "<h3>$num Comments : </h3>";
}
?>
        </div>

        <?php
$thread_id = $_GET['threadid'];
$sql = "SELECT * FROM comments where thread_id = $thread_id";
$result = mysqli_query($con, $sql);
$comment = false;
while ($row = mysqli_fetch_assoc($result)) {
    $comment = true;
    $comment_id = $row['comment_id'];
    $comment_desc = $row['comment_desc'];

    echo "<div class='userrelate'>
        <p class='usercomment'>domnic123</p>
        <p class='timecomment'>Posted 5 min ago</p>
    </div>
    <div class='comment'>
                <div class='usericon'>
                    <i class='far fa-user'></i>
                </div>
                <div class='maincomment'>
                    <p>$comment_desc sd; lfkjlsdj flksdj;jf ps flksj fosjodj ps jdflkjse iosj oiej sdaklfj oj os of jsofsjlk sdj flksdj;jf ps flksj fosjodj ps jdflkjse iosj oiej sdaklfj oj os of jsofsjlk sdj flksdj;jf ps flksj fosjodj ps jdflkjse iosj oiej sdaklfj oj os of jsofsjlk jdl</p>
                </div>
            </div>";
}
if (!$comment) {
    echo "<div class='notcomment'>
                <h2>No comment found !</h2>
                <p>Be the first person to post a comment <i class='fa-solid fa-arrow-down'></i></p>
            </div>";}
?>

        <div class='commentform'>
            <form action='<?php $_SERVER["REQUEST_URI"]?>' method='POST' id='commentform'>
                <p>Type your Comment</p>
                <textarea name='comment_desc' id=''></textarea>
                <button type='submit'>Post Comment</button>
            </form>
        </div>

    </div>
    <!-- right side which contains some other thread -->
    <div class="rightthread">
        <h4>Others : </h4>
        <div class="queans">
            <?php
$thread_id = $_GET['threadid'];
$catid = $_GET['catid'];
$sql = "SELECT * FROM threads WHERE thread_cat_id = $catid ORDER BY RAND() LIMIT 10";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo 'error due to ' . mysqli_error($con);
}
while ($row = mysqli_fetch_assoc($result)) {
    $thread_id = $row['thread_id'];
    $thread_title = $row['thread_title'];
    $thread_desc = $row['thread_desc'];
    echo "<a href='thread.php?threadid=$thread_id&catid=$catid'><p><i class='fa-solid fa-caret-right'></i>&nbsp;$thread_title</p></a>";
}
?>
        </div>
    </div>
    </div>
    <script>
    //for share link modal
    function share() {
        document.getElementById('sharemodule').style.visibility = 'visible';
        document.getElementById('sharemodule').style.opacity = '1';
    }

    //for closing sharemodule if we click outsite of it
    document.addEventListener('mouseup', function(e) {
        var sharemodule = document.getElementById('sharemodule');
        if (!sharemodule.contains(e.target)) {
            sharemodule.style.cssText = "visibility:hidden; opacity:0";
        }
    });

    //for closing alert
    function closealert() {
        document.getElementById('alertsuccess').style.display = 'none';
    }

    //for getting share link
    const URL = window.location.href;
    const link = document.getElementById('shareinput');
    link.textContent = URL;
    link.href = URL;
    </script>

</body>

</html>