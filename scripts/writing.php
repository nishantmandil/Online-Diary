<?php

session_start();

include 'db_conn.php';

if(isset($_POST['submit'])){

    function encrypt($message, $encryption_key){
        $key = hex2bin($encryption_key);
        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = openssl_random_pseudo_bytes($nonceSize);
        $ciphertext = openssl_encrypt(
          $message, 
          'aes-256-ctr', 
          $key,
          OPENSSL_RAW_DATA,
          $nonce
        );
        return base64_encode($nonce.$ciphertext);
      }
      function decrypt($message,$encryption_key){
        $key = hex2bin($encryption_key);
        $message = base64_decode($message);
        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');
        $plaintext= openssl_decrypt(
          $ciphertext, 
          'aes-256-ctr', 
          $key,
          OPENSSL_RAW_DATA,
          $nonce
        );
        return $plaintext;
      }

    $title = $_POST['title'];
    $text = $_POST['text'];
    $private_secret_key = '1f4276388ad3214c873428dbef42243f' ;
    $encrypted1 = encrypt($title,$private_secret_key);
    $encrypted2 = encrypt($text,$private_secret_key);
    date_default_timezone_set("Asia/Kolkata");
    $date=date("Y/m/d h:i:sa");

    $query = "insert into input(title,text,user_id,date) values('$encrypted1','$encrypted2','".$_SESSION['id']."','$date')";

    $result = mysqli_query($conn,$query);

    if($result)
    {
        ?>
        <script>
    alert("data inserted properly");
</script>
<?php
    }else{
        ?>
<script>
    alert("data not inserted");
</script>
<?php
    }

}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./morestyle.css">
    <title>Write your Diary</title>
    <link rel="shortcut icon" href="./image/61ff28cd-11a4-4980-a674-9b5e900d2e87_200x200.jpg" type="image/x-icon">
</head>

<body oncontextmenu="return false">

    <div class="loader_bg">
        <div class="loader"></div>
    </div>
    <div class="myNav bg-dark">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <hr>
            <a href="#" class="active"><img src="./image/icons8-add-new-96.jpg" width="30px" alt="">New Entry</a>
            <hr>
            <a href="./entries.php"><img src="./image/icons8-single-choice-100.jpg" width="30px" alt="">View All Records</a>
            <hr>
            <a href="./home.php"><img src="./image/icons8-home-512.jpg" width="30px" alt="">Home</a>
            <hr>
            <a href="./logout.php"><img src="./image/logout.jpg" width="30px" alt="">logout</a>
            <hr>
        </div>
        <span style="font-size:30px;cursor:pointer" class="mx-3" onclick="openNav()">&#9776;</span>
        <img src="./image/61ff28cd-11a4-4980-a674-9b5e900d2e87_200x200.jpg" width="120px" alt="">
    </div>

    <div class="myContainer">
        <div class="dateShow">
            <div class="date">
                <img src="./image/icons8-calendar-96.jpg" width="30px" alt="">
                <span id="date"></span>
            </div>
        </div>
        <div class="container">
            <form action="" method="POST">

                <div class="heading">
                    <div class="title">
                        <label for="title">Title:</label>
                        <input type="text" name="title" require>
                    </div>

                    <div class="setting mx-auto">
                        <button class="btn" id="buttn"><img src="./image/gear-option.jpg" width="40px" alt=""></button>
                        <div class="secondSection1 show">
                            <div class="btn-group" id="selector">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Change Theme
                                </button>
                                <div class="dropdown-menu bg-dark">
                                    <button class="color mx-2" id="btn1" onclick="click" type="button"><img
                                            src="./image/background.jpg" width="50px" alt=""></button>
                                    <button onclick="click" class="color mx-2" id="btn2" type="button"><img
                                            src="./image/sumner-mahaffey-7Y0NshQLohk-unsplash.jpg" width="50px"
                                            alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="secondSection2 show">
                            <div class="dropdown mr-1">
                                <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    data-offset="10,20">
                                    Font Size
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" onclick="increaseFontSizeSmall()">small</a>
                                    <a class="dropdown-item" onclick="increaseFontSizeMedium()">medium</a>
                                    <a class="dropdown-item" onclick="increaseFontSizeLarge()">large</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="submit" name="submit" class="mr-2 bg-success" id="buttn2" value="SAVE">
                </div>

                <textarea id="entry" name="text" rows="25" required="" class="form-control text-black my-1"
                    wrap="soft"></textarea>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        setTimeout(function(){
            $('.loader_bg').fadeToggle();
        },1500);
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        function formatAMPM() {

            var d = new Date(),
                months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            return days[d.getDay()] + '. ' + months[d.getMonth()] + '/' + d.getDate() + '/' + d.getFullYear();
        }
        document.getElementById("date").innerHTML = formatAMPM();


        $(".setting").mouseover(function () {
            $(".show").css("display", "block");
        });
        $(".setting").mouseout(function () {
            $(".show").css("display", "none");
        });

        function increaseFontSizeSmall() {
            document.getElementById('entry').style.fontSize = "10px";
        }
        function increaseFontSizeMedium() {
            document.getElementById('entry').style.fontSize = "25px";
        }
        function increaseFontSizeLarge() {
            document.getElementById('entry').style.fontSize = "40px";
        }

        var button = document.getElementById("btn1");
        var body = document.getElementsByClassName("myContainer");

        button.addEventListener("click", function () {
            body[0].style.background = "url('./image/background.jpg')";
        })


        var button = document.getElementById("btn2");
        var body = document.getElementsByClassName("myContainer");

        button.addEventListener("click", function () {
            body[0].style.background = "url('./image/sumner-mahaffey-7Y0NshQLohk-unsplash.jpg') no-repeat center center fixed";
            body[0].style.backgroundSize = "cover";
        });



    </script>
</body>

</html>