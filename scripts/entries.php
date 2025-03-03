<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./view.css">
    <title>View Entries</title>
    <link rel="shortcut icon" href="./image/61ff28cd-11a4-4980-a674-9b5e900d2e87_200x200.jpg" type="image/x-icon">
</head>

<body oncontextmenu="return false">

    <div class="myNav bg-dark">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <hr>
            <a href="#" class="active"><img src="./image/icons8-single-choice-100.jpg" width="30px" alt="">View All Records</a>
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


    <div class="section">
        <div class="subSection">
            <div class="first mx-auto">
                <?php echo "'".$_SESSION['name']."' - "; ?> Your written diaries. </h1>
            </div>
            <div class="second">
                <a href="./writing.php"><button id="butn1" type="button" class="btn-lg btn-primary">Write new Diary</button></a>
            </div>
        </div>
    </div>

    <div class="container my-3">
    <div class="table-responsive">
    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col" id="opt">Option</th>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
    </tr>
  </thead>
  <tbody>
                        <?php

include "db_conn.php";

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
      $private_secret_key = '1f4276388ad3214c873428dbef42243f' ;

$selectquery = " select * from input where user_id = '".$_SESSION['id']."'";

$query = mysqli_query($conn , $selectquery);

$nums = mysqli_num_rows($query);

while($res = mysqli_fetch_array($query)){
    $title=decrypt($res['title'],$private_secret_key);
    $text=decrypt($res['text'],$private_secret_key);
    $date=$res['date'];
    ?>

            <tr>
            <td><a href="show.php?text=<?php echo $text?>&title=<?php echo $title?>&date=<?php echo $date?>"><button class="btn btn-primary">Read</button></a></td>
            <td><?php echo $res['date']; ?></td>
            <td><?php echo decrypt($res['title'],$private_secret_key); ?></td>
            <td style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;"><?php echo decrypt($res['text'],$private_secret_key); ?></td>
            </tr>
<?php
}
?>

                        
                    </tbody>
                </table>
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
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>

    $(document).ready( function () {
    $('#myTable').DataTable();
} );

        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>
</body>

</html>

<?php 
}else{
     header("Location: home.php");
     exit();
}
 ?>