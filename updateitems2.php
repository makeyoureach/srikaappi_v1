<?php
    session_start();
    if(isset($_SESSION['uname'])){
        if($_SESSION['uname']=='admin'){

        }else{
            echo "<script>location.href='shop1.php'</script>";
        }
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
    <script src='script2.js'></script>     
    
<title>Sri Kaappi</title>

</head>
<body>
    <section class="main-container">
            <!-- Navigation Bar -->
            <nav class="navbar navbar_custom shadow-lg">
            <a class="navbar-brand" href="#">
          <img src="./photos/logopng.png" width="40" class="d-inline-block align-top logo" alt="" />
            <h3>SRI KAAPPI</h3><h5 style="margin-left: 10px;">Branch 2</h5>
            </a>
                
            <div class="btn-group dropleft">
            <button type="button" style="text-transform: capitalize;" class="btn btn-secondary btn-sm dropdown-toggle more-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
                echo $_SESSION['uname'];
                 ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" onclick="window.location.href='shop2.php'">Branch 2</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='bitesrecords2.php'">Bites Page</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='view2.php'">Sales Report</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='receiptreport2.php'">Receipt History</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='logout.php'">Log Out</button>
            </div>
            </div>
               
            </div>
        </nav>
        
        <!-- Bootstrap Container 
        <div class='item-types '>
             <a id='beverages' class="types-btn side-button-active"><img src='photos/herbal-tea.png' width="40" /><p>Milk</p></a>
            <a id='beverages-without' class="types-btn"><img src='photos/green-tea.png' width="40" /><p>Non-milk</p></a>
            <a id='bites' class="types-btn"><img src='photos/donut.png' width="40" /><p>Bites</p></a>
            <a id='juices' class="types-btn"><img src='photos/orange-juice.png' width="40" /><p>Juices</p></a>
            <a id='parcel' class="types-btn"><img src='photos/coffee.png' width="40" /><p>Parcel</p></a>
        </div> -->

        <section class="container-fluid container-fixed">
            <div class="row">
            
            <div class="col-md-1 col-lg-1 side-bar">
                <div class='sidebar-buttons'>
                <a id='beverages' class="side-btn side-button-active"><img id='side-img' src='photos/herbal-tea.png' width="40" /><p class="side-name">Beverages</p></a>
                <a id='beverages-without' class="side-btn"><img id='side-img' src='photos/green-tea.png' width="40" /><p class="side-name">Non-milk</p></a>
                <a id='bites' class="side-btn"><img id='side-img' src='photos/donut.png' width="40" /><p class="side-name">Bites</p></a>
                <a id='juices' class="side-btn"><img id='side-img' src='photos/orange-juice.png' width="40" /><p class="side-name">Juices</p></a>
                <a id='parcel' class="side-btn"><img id='side-img' src='photos/coffee.png' width="40" /><p class="side-name">Parcel</p></a>
        
                </div>
            </div>
                <div class="col-md-11 col-lg-11 center-content">
                   
                 <!-- Beverages -->
                 
                <div class="card-container" id='container-control1'>
                    <div style="margin-bottom: 10px;"><h4>Beverages Updation</h4></div>
                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood;">
                        <tr>
                        <th scope='col'>S.no</th>
                        <th scope='col'>Items Name</th>
                        <th scope='col'>Tamil Name</th>
                        <th scope='col'>Amount</th>
                        <th scope='col'>Update</th>
                        </tr>
                    </thead>
                    <tbody id='update_table'>
                        <?php

                            require_once "dbConfig.php";
                            if(!$con){
                                die("Connection error ".mysqli_connect_error());
                            }
                            
                            $beveragesName=array();
                            $beveragesAmount=array();
                            $tamilname=array();
                            $c=0;

                            $sql="select * from beverages_1";
                            $res=$con->query($sql);
                            while($row=$res->fetch_assoc()){

                                $beveragesName[$c]=$row["itemsname"];
                                $beveragesAmount[$c]=$row["amount"];
                                $tamilname[$c]=$row["tamilname"];
                                $c++;
                            }

                            for($c = 0; $c < count($beveragesName); $c++)
                            {
                                echo "<tr style='white-space: nowrap;'>
                                    <th scope='row' style='width:10px;'>".($c+1)."</th>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='cname".$c."' style='display:block;'>".$beveragesName[$c]."</p><input id='uname".$c."' class='form-control' value='".$beveragesName[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='ctname".$c."' style='display:block;'>".$tamilname[$c]."</p><input id='utname".$c."' class='form-control' value='".$tamilname[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:100px'><div style='display:flex; justify-content:center; align-item:center;'><p id='camount".$c."' style='display:block;'>".$beveragesAmount[$c]."</p><input type='number' class='form-control' id='uamount".$c."' value=".$beveragesAmount[$c]." style='display:none;width:100px;' /></div></td>
                                    <td style='width:40px'><button style='cursor: pointer;' id='".$c."' class='updatebutton btn btn-info'>Edit</button></td>
                                    </tr>";
                            }
                            
                        ?>
                    </tbody>
                    </table>

                    </div>
                
                </div>
                   
                    <!--Beverages without milk-->

                <div class="view-content without-beverage" id='container-control2'>
                    
                <div style="margin-bottom: 10px;"><h4>Non-Beverages Updation</h4></div>
                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood;">
                        <tr>
                        <th scope='col'>S.no</th>
                        <th scope='col'>Items Name</th>
                        <th scope='col'>Tamil Name</th>
                        <th scope='col'>Amount</th>
                        <th scope='col'>Update</th>
                        </tr>
                    </thead>
                    <tbody id='update_table'>
                        <?php

                            require_once "dbConfig.php";
                            if(!$con){
                                die("Connection error ".mysqli_connect_error());
                            }
                            
                            $beveragesName=array();
                            $beveragesAmount=array();
                            $tamilname=array();
                            $c=0;

                            $sql="select * from nonbeverages_1";
                            $res=$con->query($sql);
                            while($row=$res->fetch_assoc()){

                                $beveragesName[$c]=$row["itemsname"];
                                $beveragesAmount[$c]=$row["amount"];
                                $tamilname[$c]=$row["tamilname"];
                                $c++;
                            }

                            for($c = 0; $c < count($beveragesName); $c++)
                            {
                                echo "<tr style='white-space: nowrap;'>
                                    <th scope='row' style='width:10px;'>".($c+1)."</th>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c1name".$c."' style='display:block;'>".$beveragesName[$c]."</p><input id='u1name".$c."' class='form-control' value='".$beveragesName[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c1tname".$c."' style='display:block;'>".$tamilname[$c]."</p><input id='u1tname".$c."' class='form-control' value='".$tamilname[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:100px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c1amount".$c."' style='display:block;'>".$beveragesAmount[$c]."</p><input type='number' class='form-control' id='u1amount".$c."' value=".$beveragesAmount[$c]." style='display:none;width:100px;' /></div></td>
                                    <td style='width:40px'><button style='cursor: pointer;' id='".$c."' class='updatebutton1 btn btn-info'>Edit</button></td>
                                    </tr>";
                            }
                            
                        ?>
                    </tbody>
                    </table>

                    </div>
                </div>

                    <!-- Bites -->

                <div class="view-content bites" id='container-control3'>
                    
                <div style="margin-bottom: 10px;"><h4>Bites Updation</h4></div>
                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood;">
                        <tr>
                        <th scope='col'>S.no</th>
                        <th scope='col'>Items Name</th>
                        <th scope='col'>Tamil Name</th>
                        <th scope='col'>Amount</th>
                        <th scope='col'>Update</th>
                        </tr>
                    </thead>
                    <tbody id='update_table'>
                        <?php

                            require_once "dbConfig.php";
                            if(!$con){
                                die("Connection error ".mysqli_connect_error());
                            }
                            
                            $beveragesName=array();
                            $beveragesAmount=array();
                            $tamilname=array();
                            $c=0;

                            $sql="select * from bites_1";
                            $res=$con->query($sql);
                            while($row=$res->fetch_assoc()){

                                $beveragesName[$c]=$row["itemsname"];
                                $beveragesAmount[$c]=$row["amount"];
                                $tamilname[$c]=$row["tamilname"];
                                $c++;
                            }

                            for($c = 0; $c < count($beveragesName); $c++)
                            {
                                echo "<tr style='white-space: nowrap;'>
                                    <th scope='row' style='width:10px;'>".($c+1)."</th>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c2name".$c."' style='display:block;'>".$beveragesName[$c]."</p><input id='u2name".$c."' class='form-control' value='".$beveragesName[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c2tname".$c."' style='display:block;'>".$tamilname[$c]."</p><input id='u2tname".$c."' class='form-control' value='".$tamilname[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:100px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c2amount".$c."' style='display:block;'>".$beveragesAmount[$c]."</p><input type='number' class='form-control' id='u2amount".$c."' value=".$beveragesAmount[$c]." style='display:none;width:100px;' /></div></td>
                                    <td style='width:40px'><button style='cursor: pointer;' id='".$c."' class='updatebutton2 btn btn-info'>Edit</button></td>
                                    </tr>";
                            }
                            
                        ?>
                    </tbody>
                    </table>

                    </div>
                </div>

                <!-- Juice -->

                <div class="view-content juice" id='container-control4'>
                    
                <div style="margin-bottom: 10px;"><h4>Juice Updation</h4></div>
                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood;">
                        <tr>
                        <th scope='col'>S.no</th>
                        <th scope='col'>Items Name</th>
                        <th scope='col'>Tamil Name</th>
                        <th scope='col'>Amount</th>
                        <th scope='col'>Update</th>
                        </tr>
                    </thead>
                    <tbody id='update_table'>
                        <?php

                            require_once "dbConfig.php";
                            if(!$con){
                                die("Connection error ".mysqli_connect_error());
                            }
                            
                            $beveragesName=array();
                            $beveragesAmount=array();
                            $tamilname=array();
                            $c=0;

                            $sql="select * from juices_1";
                            $res=$con->query($sql);
                            while($row=$res->fetch_assoc()){

                                $beveragesName[$c]=$row["itemsname"];
                                $beveragesAmount[$c]=$row["amount"];
                                $tamilname[$c]=$row["tamilname"];
                                $c++;
                            }

                            for($c = 0; $c < count($beveragesName); $c++)
                            {
                                echo "<tr style='white-space: nowrap;'>
                                    <th scope='row' style='width:10px;'>".($c+1)."</th>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c3name".$c."' style='display:block;'>".$beveragesName[$c]."</p><input id='u3name".$c."' class='form-control' value='".$beveragesName[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c3tname".$c."' style='display:block;'>".$tamilname[$c]."</p><input id='u3tname".$c."' class='form-control' value='".$tamilname[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:100px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c3amount".$c."' style='display:block;'>".$beveragesAmount[$c]."</p><input type='number' class='form-control' id='u3amount".$c."' value=".$beveragesAmount[$c]." style='display:none;width:100px;' /></div></td>
                                    <td style='width:40px'><button style='cursor: pointer;' id='".$c."' class='updatebutton3 btn btn-info'>Edit</button></td>
                                    </tr>";
                            }
                            
                        ?>
                    </tbody>
                    </table>

                    </div>
                </div>
                
                 <!-- Parcel -->

                <div class="view-content parcel" id='container-control5'>
                    
                <div style="margin-bottom: 10px;"><h4>Parcel Updation</h4></div>
                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood;">
                        <tr>
                        <th scope='col'>S.no</th>
                        <th scope='col'>Items Name</th>
                        <th scope='col'>Tamil Name</th>
                        <th scope='col'>Amount</th>
                        <th scope='col'>Update</th>
                        </tr>
                    </thead>
                    <tbody id='update_table'>
                        <?php

                            require_once "dbConfig.php";
                            if(!$con){
                                die("Connection error ".mysqli_connect_error());
                            }
                            
                            $beveragesName=array();
                            $beveragesAmount=array();
                            $tamilname=array();
                            $c=0;

                            $sql="select * from parcel_1";
                            $res=$con->query($sql);
                            while($row=$res->fetch_assoc()){

                                $beveragesName[$c]=$row["itemsname"];
                                $beveragesAmount[$c]=$row["amount"];
                                $tamilname[$c]=$row["tamilname"];
                                $c++;
                            }

                            for($c = 0; $c < count($beveragesName); $c++)
                            {
                                echo "<tr style='white-space: nowrap;'>
                                    <th scope='row' style='width:10px;'>".($c+1)."</th>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c4name".$c."' style='display:block;'>".$beveragesName[$c]."</p><input id='u4name".$c."' class='form-control' value='".$beveragesName[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c4tname".$c."' style='display:block;'>".$tamilname[$c]."</p><input id='u4tname".$c."' class='form-control' value='".$tamilname[$c]."' style='display:none;width:150px' /></div></td>
                                    <td style='width:100px'><div style='display:flex; justify-content:center; align-item:center;'><p id='c4amount".$c."' style='display:block;'>".$beveragesAmount[$c]."</p><input type='number' class='form-control' id='u4amount".$c."' value=".$beveragesAmount[$c]." style='display:none;width:100px;' /></div></td>
                                    <td style='width:40px'><button style='cursor: pointer;' id='".$c."' class='updatebutton4 btn btn-info'>Edit</button></td>
                                    </tr>";
                            }
                            
                        ?>
                    </tbody>
                    </table>

                    </div>

                </div>

            <!-- Modal -->
            <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" #modal-custom>
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">No any item selected</h5>
                </div>
                </div>
            </div>
            </div> -->
                
        </section>
        
    </section>
</body>

</html>