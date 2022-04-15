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
    <link rel="stylesheet" href="threadlistop.css" />
    <link rel="stylesheet" href="extras.css" />
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

        <?php
$success = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catid = $_GET['catid'];
    $thread_title = $_POST['thread_title'];
    $thread_desc = $_POST['thread_desc'];
    $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `time_stamp`) VALUES (NULL, '$thread_title' , '$thread_desc' , '$catid', current_timestamp())";
    $result = mysqli_query($con, $sql);
    $success = true;
    if ($success) {
        echo "<div class='alertsuccess' id='alertsuccess'>
            <p>Your thread has been successfully added</p>
            <i class='fa-solid fa-xmark icon' onclick='closealert()'></i>
        </div>";
    }
}
?>
        <?php
if (isset($_GET['catid'])) {
    $catid = $_GET['catid'];
    $sql = "SELECT * FROM category where category_id = $catid";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo 'sql not running bcs' . mysqli_error($con);
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_desc'];
    }
    echo "<div class='pagestart'>
            <div class='mainbox'>
                <div class='welbox' id='welbox'>
                    <i class='fa-solid fa-xmark icon' onclick='closerule()'></i>
                    <h1>Welcome to $catname forums</h1>
                    <p class='info'>$catdesc</p>
                    <div class='rules'>
                        <span class='rulesbox'>
                            <h4>Rules&nbsp; </h4>
                            <i class='fa-solid fa-caret-down'></i>
                        </span>";
} else {
    echo "<div class='pagestart'>
            <div class='mainbox'>
                <div class='welbox' id='welbox'>
                    <i class='fa-solid fa-xmark icon' onclick='closerule()'></i>
                    <h1>Welcome to programming forum site</h1>
                    <p class='info'>Our forum site is based on all programming languages where you can ask
                    or find question related to your query. So feel free to interact with everyone and
                    gain some useful knowledge.</p>
                    <div class='rules'>
                        <span class='rulesbox'>
                            <h4>Rules&nbsp; </h4>
                            <i class='fa-solid fa-caret-down'></i>
                        </span>";

}
?>
        <p>1.&nbsp; No Spam / Advertising / Self-promote in the forums.<br>
            2. Do not post copyright-infringing material.<br>
            3. Do not post “offensive” posts, links or images.<br>
            4. Do not cross post questions.<br>
            5. Remain respectful of other members at all times.<br></p>
    </div>
    </div>
    <div class="tagdiv" id="tagdiv">
        <div class="tagleft">
            <h3>Search by tags : </h3>
        </div>
        <div class="tagright">
            <p><a href=''>programming</a></p>
            <p><a href=''>web development</a></p>
            <p><a href=''>css selectors</a></p>
            <p><a href=''>algorithm</a></p>
            <p><a href=''>data structure</a></p>
            <p><a href=''>style</a></p>
            <p><a href=''>php</a></p>
            <p><a href=''>ruby</a></p>
        </div>
    </div>
    <div class="threadcat" id='threads'>
        <div class="forumleft">
            <h4>Categories</h4>
            <div class="catlist">
                <?php
$sql = 'SELECT * from category';
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $catname = $row['category_name'];
    $catid = $row['category_id'];
    echo "<div class='catul'>
        <a href='threadlist.php?catid=$catid'><h6>$catname</h6></a>
    </div>";
}
?>
            </div>
        </div>
        <div class="mainright">
            <?php $catid = $_GET['catid'];
$sql = "SELECT * FROM threads WHERE thread_cat_id = $catid";
$result = mysqli_query($con, $sql);
$threads = false;
while ($row = mysqli_fetch_assoc($result)) {
    $threads = true;
    $thread_id = $row['thread_id'];
    $thread_title = $row['thread_title'];
    $thread_desc = $row['thread_desc'];

    echo "<div class='forumright'>
            <div class='queans'>
                <h4><a href='thread.php?threadid=$thread_id&catid=$catid'> $thread_title</a></h4>
                <p> $thread_desc..</p>
            </div>
        </div>";}

if (!$threads) {
    echo "<div class='nothread'>
                <h1>No threads found !</h1>
                <p>Be the first person to ask a question <i class='fa-solid fa-arrow-down'></i></p>
            </div>";
} else {
    echo "<p style='margin-left:5px' class='yourque'>Ask your question :</p>";
}
?>
            <div class='notform'>
                <form action='<?php $_SERVER["REQUEST_URI"]?>' method='POST'>
                    <p>Thread Title</p>
                    <input type='text' name='thread_title'>
                    <p>Thread Description</p>
                    <textarea name='thread_desc' name='thread_desc' id=''></textarea>
                    <button type='submit'>Post Question</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
    function closerule() {
        document.getElementById('welbox').style.transform = 'translateY(-330px)';
        document.getElementById('threads').style.transform = 'translateY(-350px)';
        document.getElementById('tagdiv').style.transform = 'translateY(-320px)';
        document.getElementById('threads').style.marginBottom = '-330px';
        document.getElementById('threads').style.marginTop = '40px';
    }
    </script>
    <script>
    function closealert() {
        document.getElementById('alertsuccess').style.display = 'none';
    }
    </script>
</body>

</html>