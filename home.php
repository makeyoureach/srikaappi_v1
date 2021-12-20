<?php
    session_start();
    // $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    // if(!$con){
    //     die("Connection error ".mysqli_connect_error()); 
    // }
    // $sql = "TRUNCATE TABLE sri_beverages";
    // $result=mysqli_query($con,$sql);
    if(isset($_SESSION['uname'])){
        // echo "<a"
    }else{
        echo "<script>location.href='login.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="icon" href="./photos/logopng.png" type="image/jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="content.css">
    <link rel="stylesheet" href="cache.css">
    <link rel="stylesheet" href="newstyle.css">
    <link rel="stylesheet" href="adding.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src='script.js'></script>   
    <script src='jquery.min.js'></script>   
    
<title>Sri Kaappi</title>

</head>
<body>
    <section class="main-container">
            <!-- Navigation Bar -->
        <nav class="navbar navbar_custom shadow-lg">
            <a class="navbar-brand" href="#">
          <img src="./photos/logopng.png" width="40" class="d-inline-block align-top logo" alt="" />
            <h3>SRI KAAPPI</h3>
            </a>
            <div>
            <div class="btn-group dropleft">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle more-btn" onclick="window.location.href='logout.php'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Log Out
            </button>
            </div>
               
            </div>
        </nav>
        
        <section style="padding-top: 100px;">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
        <div class="col-sm-4 col-10" style="margin:10px;">
            <div class="card">
            <div class="card-body">
                <h3 class="card-title">Shop 1</h3>
                <p class="card-text">..</p>
                <a href="#" class="btn btn-info" id='home-shop1'>Go >></a>
            </div>
            </div>
        </div>
        <div class="col-sm-4 col-10" style="margin:10px;">
            <div class="card">
            <div class="card-body">
                <h3 class="card-title">Shop 2</h3>
                <p class="card-text">...</p>
                <a href="#" class="btn btn-info" id='home-shop2'>Go >></a>
            </div>
            </div>
        </div>
        </div>
        </section>
        
    </section>
</body>
<script>

    $("#home-shop1").click(function(){
        window.location.href='shop1.php';
    });

    $("#home-shop2").click(function(){
        window.location.href='shop2.php';
    });

</script>
</html>