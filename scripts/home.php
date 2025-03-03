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
  <link rel="stylesheet" href="newstyle.css">
  <title>Welcome to onlineDiary</title>
  <link rel="shortcut icon" href="./image/61ff28cd-11a4-4980-a674-9b5e900d2e87_200x200.jpg" type="image/x-icon">
</head>

<body oncontextmenu="return false">
  <div class="heading">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><img src="./image/61ff28cd-11a4-4980-a674-9b5e900d2e87_200x200.jpg" width="120px"
          alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">



        </ul>
        <form class="form-inline my-2 my-lg-0" action="./logout.php">
          <button class="btn btn-outline-success my-2 mx-3 my-sm-0">Logout</button>
        </form>
      </div>
    </nav>
    <nav class="navbar navbar-light bg-light">
    <h3 class="ml-auto">View Records</h3>
  <a class="navbar-brand ml-3" href="./entries.php"><button id="entry" title="View Entries"><img src="./image/icons8-single-choice-100.jpg" width="40px" alt=""></button></a>
</nav>

  <div class="container" id="first">
    <div class="container" id="second">
      <div class="intro">
        <img src="./image/icons8-user-male-500.jpg" width="100px" alt="">
        <h1>Heyy <?php echo $_SESSION['name'].", "; ?>start writing your diary. </h1>
      </div>
      <a href="./writing.php"><button id="butn1" type="button" class="btn-lg btn-light my-3"><b>Write your Diary</b></button></a>
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

</body>

</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>