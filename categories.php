<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="categorie.css" />
    <link rel="stylesheet" href="extra.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>iDiscuss</title>
</head>

<body>
    <?php require 'connect.php'?>
    <div class="main">
        <div class="wnav">
            <div class="navbar">
                <div class="navl">
                    <h3><a href="">iDiscuss</a></h3>
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
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="src2/ai.jpg" alt="" /></div>
                <div class="swiper-slide"><img src="src2/cyber.jpg" alt="" /></div>
                <div class="swiper-slide"><img src="src2/network.jpg" alt="" /></div>
                <div class="swiper-slide"><img src="src2/python.jpg" alt="" /></div>
                <div class="swiper-slide"><img src="src2/web.jpg" alt="" /></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="pagestart">
            <p class="p1">Find Your Queries based on</p>
            <p class="p2">Category</p>
            <div class="categories">
                <div class="cards">
                    <?php
$sql = "SELECT * FROM category";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo 'something went wrong due to' . mysqli_error($con);
}
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['category_id'];
    $catname = $row['category_name'];
    $cutdesc = $row['category_desc'];
    $catdesc = substr($cutdesc, 0, 107);

    echo "<div class='card1'>
    <div class='cardtop'>
        <img src='src/Python.jpg' />
    </div>
    <div class='cardbottom'>
        <h4><a href='threadlist.php?catid=$id' class='headlink'>$catname</a></h4>
        <p>
            $catdesc...
        </p>
        <a href='threadlist.php?catid=$id' class='buttonlink'>Explore</a>
    </div>
</div>";
}
?>
                </div>
            </div>
        </div>
    </div>
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    </script>
</body>

</html>