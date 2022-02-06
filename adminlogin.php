<?php
     session_start();
     if(isset($_SESSION['uname'])){
         if($_SESSION['uname']=='admin'){
 
         }else{
             echo "<script>location.href='home.php'</script>";
         }
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
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle more-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" onclick="window.location.href='home.php'">Home</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='additems.php'">Add items</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='removeitems.php'">Remove items</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='logout.php'">Log Out</button>
            </div>
            </div>
               
            </div>
        </nav>
        

        <section class="container-fluid container-fixed">
            <div class="row">
            
                        <div class="col center-content">
                        

                        <div class="card-container " id='container-control1' >
                            <div style="display: flex; white-space: nowrap; flex-direction: column; width: 100%;">

                            <div style="margin-bottom: 10px;"><h4>Credential</h4></div>
                        <div class="table-responsive">

                        <table class='table'>
                        <thead  style="background-color: burlywood;">
                            <tr>
                            <th scope='col'>S.no</th>
                            <th scope='col'>Username</th>
                            <th scope='col'>Current Password</th>
                            <th scope='col'>Change Password</th>
                            </tr>
                        </thead>
                        <tbody id='update_table'>
                            <?php

                                require_once "dbConfig.php";
                                if(!$con){
                                    die("Connection error ".mysqli_connect_error());
                                }
                                
                                $username=array();
                                $password=array();
                                $c=0;

                                $sql="select * from login";
                                $res=$con->query($sql);
                                while($row=$res->fetch_assoc()){

                                    $username[$c]=$row["username"];
                                    $password[$c]=$row["password"];
                                    $c++;

                                }

                                for($c = 0; $c < count($username); $c++)
                                {
                                    echo "<tr style='white-space: nowrap;'>
                                        <th scope='row' style='width:10px;'>".($c+1)."</th>
                                        <td style='width:100px'><div style='display:flex; justify-content:center; align-item:center;'><p id='username".$c."' style='display:block;'>".$username[$c]."</p><input type='number' class='form-control' id='username".$c."' value=".$username[$c]." style='display:none;width:100px;' /></div></td>
                                        <td style='width:100px'><div style='display:flex; justify-content:center; align-item:center;'><p id='password".$c."' style='display:block;'>".$password[$c]."</p><input id='passwordupdate".$c."' class='form-control' value='".$password[$c]."' style='display:none;width:150px' /></div></td>
                                        <td style='width:40px'><button style='cursor: pointer;' id='".$c."' class='updatepasswordbtn btn btn-info'>Change</button></td>
                                        </tr>";
                                }
                                
                            ?>
                        </tbody>
                        </table>

                        </div>

                        </div>
                        
                        </div>
                </div>
            </div>
        </section>
        
    </section>
</body>


<script>

    $("body").on("click",".updatepasswordbtn",function(event){

    var updateid=$(this).attr('id');
    if($(this).text()=='Change'){

    // $('#b2name'+updateid).css('display','none');
    $('#password'+updateid).css('display','none');
    // $('#b2amount'+updateid).css('display','none');
    // $('#bu2name'+updateid).css('display','block');
    $('#passwordupdate'+updateid).css('display','block');
    // $('#bu2amount'+updateid).css('display','block');
    $(this).text('Processed');
    // $('#bu2name'+updateid).addClass('update-value');
    // $('#bu2amount'+updateid).addClass('update-value');

    }else if($(this).text()=='Processed'){

    var newpassword=$('#passwordupdate'+updateid).val();

    $.ajax({
        url:"ajax_admincredential.php",
        type:"post",
        data:{
            newpassword:newpassword,
            updateid:updateid
        },
        success:function(res){
        if(res){

            // $('#b2name'+updateid).css('display','block');
            $('#password'+updateid).css('display','block');
            // $('#b2amount'+updateid).css('display','block');
            // $('#bu2name'+updateid).css('display','none');
            $('#passwordupdate'+updateid).css('display','none');
            // $('#bu2amount'+updateid).css('display','none');

            // $("#b2name"+updateid).html(updatename);
            $("#password"+updateid).html(newpassword);
            // $("#b2amount"+updateid).html(updateamount);
        }else{
            alert("Failed Try Again");
        }
        }
    });
    $(this).text('Change');
    }
    
    });

</script>

</html>