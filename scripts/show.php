
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./showing.css">
    <title>View Entries</title>
    <link rel="shortcut icon" href="./image/61ff28cd-11a4-4980-a674-9b5e900d2e87_200x200.jpg" type="image/x-icon">
</head>

<body oncontextmenu="return false">

    <div class="myNav bg-dark">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <hr>
            <a href="./entries.php" class="active"><img src="./image/icons8-single-choice-100.jpg" width="30px" alt="">View All Records</a>
            <hr>
            <a href="./writing.php"><img src="./image/icons8-add-new-96.jpg" width="30px" alt="">New Entry</a>
            <hr>
            <a href="./home.php"><img src="./image/icons8-home-512.jpg" width="30px" alt="">Home</a>
            <hr>
            <a href="./logout.php"><img src="./image/logout.jpg" width="30px" alt="">logout</a>
            <hr>
        </div>
        <span style="font-size:30px;cursor:pointer" class="mx-3" onclick="openNav()">&#9776;</span>
        <img src="./image/61ff28cd-11a4-4980-a674-9b5e900d2e87_200x200.jpg" width="120px" alt="">
    </div>


    <?php
    include "db_conn.php"; 
      ?>

<div class="date">
    <p>Written on: <?php echo $_GET['date']; ?></p>
    </div>

    <div class="container">
    <div class="content">
    
    <div class="title">
    <p>Title:<?php echo $_GET['title']; ?></p>
    </div>
    <div class="text">
    <p><?php echo $_GET['text']; ?></p>
    </div>
    </div>
    </div>


                        
                


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script>
    function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>
</body>

</html>

