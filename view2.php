<?php
    session_start();
    
    if(isset($_SESSION['uname'])){
        if($_SESSION['uname']=='admin'){
           
        }else{
            echo "<script>location.href='shop2.php'</script>";
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
    <script src='script2.js'></script>   
    <script src='jquery.min.js'></script>   
    
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
                <button class="dropdown-item" type="button" onclick="window.location.href='updateitems1.php'">Updation</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='bitesrecords1.php'">Bites Page</button>
                
                <button class="dropdown-item" type="button" onclick="window.location.href='receiptreport1.php'">Receipt History</button>
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
                <a id='beverages-without' class="side-btn nonbeveragesviewtable"><img id='side-img' src='photos/green-tea.png' width="40" /><p class="side-name">Non-milk</p></a>
                <a id='bites' class="side-btn bitesviewtable"><img id='side-img' src='photos/donut.png' width="40" /><p class="side-name">Bites</p></a>
                <a id='juices' class="side-btn juicesviewtable"><img id='side-img' src='photos/orange-juice.png' width="40" /><p class="side-name">Juices</p></a>
                <a id='parcel' class="side-btn parcelviewtable"><img id='side-img' src='photos/coffee.png' width="40" /><p class="side-name">Parcel</p></a>
        
                </div>
                    </div>
                        <div class="col-md-11 center-content">
                        
                        <!-- Beverages -->
                        
                        <div class="card-container " id='container-control1' >
                            <div style="display: flex; white-space: nowrap; flex-direction: column; width: 100%;">

                            <h4>Sales Report</h4>

                            <div style="width: 100%;">

                            <div style="display: flex; justify-content: end; align-items: center; margin-right: 1px;">
                                <div style="margin-right: 20px; color: green;">
                                    <h5>
                                    <?php
                                    echo date("F");
                                    ?>
                                    </h5>
                                </div>
                                <div>
                                   <select style="width: 50px;" onchange="myViewTableFunction()" style="overflow: auto;" id='mySelect'>
                                       <option class='viewdb' value=<?php echo date("d");?> id='beverages'>
                                            <?php
                                                echo date("d");
                                            ?>
                                        </option>
                                       <?php
                                       $no=(int)date("d");
                                       $output='';
                                       echo $no; 
                                    //    $count=0;
                                         for($i=1;$i<$no;$i++){
                                             $output.="<option class='viewdb' id=$i value=$i>$i</option>";
                                            //  $count=1;
                                         }
                                         echo $output;
                                       ?>
                                   </select>
                                </div>
                            </div>

                            <div class="table-responsive">
               
               <table class='table'>
               <thead  style="background-color: burlywood; white-space: nowrap;">
                   <tr>
                   <th scope='col'>S.no</th>
                   <th scope='col'>Items name</th>
                   <th scope='col'>Number of sales</th>
                   <th scope='col'>Total amount</th>
                   </tr>
               </thead>
               <tbody id='viewtable1'>
                   <?php

                       require_once "dbConfig.php";
                       if(!$con){
                           die("Connection error ".mysqli_connect_error());
                       }
                       
                       $itemsName=array();
                       $itemsQuantity=array();
                       $itemsAmount=array();
                       $itemsFrom=array();
                       
                       $beveragesName=array();
                       $beveragesAmount=array();
                       $c=0;

                       $sql="select * from beverages_1";
                       $res=$con->query($sql);
                       while($row=$res->fetch_assoc()){

                           $beveragesName[$c]=$row["itemsname"];
                           $beveragesAmount[$c]=$row["amount"];
                           $c++;
                       }

                       $c=0;
                       $date = date('Y-m-d');
                       $sql="SELECT  * from sale_items_1 where itemsfrom='beverages' and billdate='$date'";
                       $res=$con->query($sql);
                       while($row=$res->fetch_assoc()){

                           $itemsName[$c]=$row["items"];
                           $itemsQuantity[$c]=$row["quantity"];
                           $itemsAmount[$c]=$row["amount"];
                           $itemsFrom[$c]=$row["itemsfrom"];
                           $c++;
                       }
                       $qty=0;
                       $amt=0;
                       $displayItemsName=array();
                       $displayQuantity=array();
                       $displayAmount=array();

                       $sql="Truncate table currentmonthsales_1";
                       $res=$con->query($sql);

                       for($c = 0; $c < count($beveragesName); $c++){

                           $qty=0;
                           $amt=0;

                           for($k = 0; $k < count($itemsName); $k++){

                               if($beveragesName[$c]==$itemsName[$k]){
                                      $qty=(int)$qty+(int)($itemsQuantity[$k]);
                                      $amt=(int)$amt+(int)$itemsAmount[$k];
                               }
                           }
                           $displayItemsName[$c]=$beveragesName[$c];
                           $displayQuantity[$c]=$qty;
                           $displayAmount[$c]=$amt;
                       }
                       for($c = 0; $c < count($displayItemsName); $c++){

                            $sql="Insert into currentmonthsales_1 (items,quantity,amount) values('$displayItemsName[$c]','$displayQuantity[$c]','$displayAmount[$c]')";
                            $result = mysqli_query($con, $sql);
                       }

                       $displayItemsName=array();
                       $displayQuantity=array();
                       $displayAmount=array();
                       $c=0;
                       $sql="select * from currentmonthsales_1 where quantity > 0 order by amount DESC;";
                       $res=$con->query($sql);
                       while($row=$res->fetch_assoc()){

                           $displayItemsName[$c]=$row["items"];
                           $displayQuantity[$c]=$row["quantity"];
                           $displayAmount[$c]=$row["amount"];
                           $c++;
                       }

                       for($c = 0; $c < count($displayItemsName); $c++)
                       {
                           echo "<tr style='white-space: nowrap;'>
                               <th scope='row' style='width:10px;'>".($c+1)."</th>
                               <td style='width:100px'><p id='vname".$c."' style='display:block;'>".$displayItemsName[$c]."</p></td>
                               <td style='width:50px'><p id='vname".$c."' style='display:block;'>".$displayQuantity[$c]."</p></td>
                               <td style='width:50px'><p id='vname".$c."' style='display:block;'>".$displayAmount[$c]."</p></td>
                               </tr>";
                       }
                       
                   ?>
               </tbody>
               </table>

               </div>
                            </div>
                        </div>
                        
                        </div>
                   
                <!--Beverages without milk-->

                <div class="view-content without-beverage" id='container-control2'>
                <div style="display: flex; white-space: nowrap; flex-direction: column; width: 100%;">
                    <h4>Sales Report</h4>

                    <div style="width: 100%;">

                    <div style="display: flex; justify-content: end; align-items: center; margin-right: 1px;">
                        <div style="margin-right: 20px; color: green;">
                            <h5>
                            <?php
                            echo date("F");
                            ?>
                            </h5>
                        </div>
                        <div>
                        <select style="width: 50px;" onchange="myViewTableNonBeverage()" id='mySelect2'>
                            <option class='viewdb' value=<?php echo date("d");?> id='nonbeverages'>
                                    <?php
                                        echo date("d");
                                    ?>
                                </option>
                            <?php
                            $no=(int)date("d");
                            $output='';
                            echo $no;
                            //    $count=0;
                                for($i=1;$i<$no;$i++){
                                    $output.="<option class='viewdb' id=$i.'nb' value=$i>$i</option>";
                                    //  $count=1;
                                }
                                echo $output;
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood; white-space: nowrap;">
                    <tr>
                    <th scope='col'>S.no</th>
                    <th scope='col'>Items name</th>
                    <th scope='col'>Number of sales</th>
                    <th scope='col'>Total amount</th>
                    </tr>
                    </thead>
                    <tbody id='viewtable2'>

                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                </div>

                <!-- Bites -->

                <div class="view-content bites" id='container-control3'>
                             <div style="display: flex; white-space: nowrap; flex-direction: column; width: 100%;">

                    <h4>Sales Report</h4>

                    <div style="width: 100%;">

                    <div style="display: flex; justify-content: end; align-items: center; margin-right: 1px;">
                        <div style="margin-right: 20px; color: green;">
                            <h5>
                            <?php
                            echo date("F");
                            ?>
                            </h5>
                        </div>
                        <div>
                        <select style="width: 50px;" onchange="myViewTableBites()" id='mySelect3'>
                            <option class='viewdb' value=<?php echo date("d");?> id='bites'>
                                    <?php
                                        echo date("d");
                                    ?>
                                </option>
                            <?php
                            $no=(int)date("d");
                            $output='';
                            echo $no;
                            //    $count=0;
                                for($i=1;$i<$no;$i++){
                                    $output.="<option class='viewdb' id=$i.'bites' value=$i>$i</option>";
                                    //  $count=1;
                                }
                                echo $output;
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood; white-space: nowrap;">
                    <tr>
                    <th scope='col'>S.no</th>
                    <th scope='col'>Items name</th>
                    <th scope='col'>Number of sales</th>
                    <th scope='col'>Total amount</th>
                    </tr>
                    </thead>
                    <tbody id='viewtable3'>

                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>          
                </div>

                <!-- Juice -->

                <div class="view-content juice" id='container-control4'>
                    <div style="display: flex; white-space: nowrap; flex-direction: column; width: 100%;">

                    <h4>Sales Report</h4>

                    <div style="width: 100%;">

                    <div style="display: flex; justify-content: end; align-items: center; margin-right: 1px;">
                        <div style="margin-right: 20px; color: green;">
                            <h5>
                            <?php
                            echo date("F");
                            ?>
                            </h5>
                        </div>
                        <div>
                        <select style="width: 50px;" onchange="myViewTableJuice()" id='mySelect4'>
                            <option class='viewdb' value=<?php echo date("d");?> id='juice'>
                                    <?php
                                        echo date("d");
                                    ?>
                                </option>
                            <?php
                            $no=(int)date("d");
                            $output='';
                            echo $no;
                            //    $count=0;
                                for($i=1;$i<$no;$i++){
                                    $output.="<option class='viewdb' id=$i.'juice' value=$i>$i</option>";
                                    //  $count=1;
                                }
                                echo $output;
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood; white-space: nowrap;">
                    <tr>
                    <th scope='col'>S.no</th>
                    <th scope='col'>Items name</th>
                    <th scope='col'>Number of sales</th>
                    <th scope='col'>Total amount</th>
                    </tr>
                    </thead>
                    <tbody id='viewtable4'>

                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    
                </div>
                
                 <!-- Parcel -->

                <div class="view-content parcel" id='container-control5'>
                    
                    <div style="display: flex; white-space: nowrap; flex-direction: column; width: 100%;">

                    <h4>Sales Report</h4>

                    <div style="width: 100%;">

                    <div style="display: flex; justify-content: end; align-items: center; margin-right: 1px;">
                        <div style="margin-right: 20px; color: green;">
                            <h5>
                            <?php
                            echo date("F");
                            ?>
                            </h5>
                        </div>
                        <div>
                        <select style="width: 50px;" onchange="myViewTableParcel()" id='mySelect5'>
                            <option class='viewdb' value=<?php echo date("d");?> id='beverages'>
                                    <?php
                                        echo date("d");
                                    ?>
                                </option>
                            <?php
                            $no=(int)date("d");
                            $output='';
                            echo $no;
                            //    $count=0;
                                for($i=1;$i<$no;$i++){
                                    $output.="<option class='viewdb' id=$i.'parcel' value=$i>$i</option>";
                                    //  $count=1;
                                }
                                echo $output;
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="table-responsive">

                    <table class='table'>
                    <thead  style="background-color: burlywood; white-space: nowrap;">
                    <tr>
                    <th scope='col'>S.no</th>
                    <th scope='col'>Items name</th>
                    <th scope='col'>Number of sales</th>
                    <th scope='col'>Total amount</th>
                    </tr>
                    </thead>
                    <tbody id='viewtable5'>

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

    function myViewTableFunction(){

        var id = document.getElementById("mySelect").value;
        $('#viewtable1').html('<tr><td colspan="4">Loading...</td></tr>')
        console.log(id);
        $('#viewtable1').html('<tr><td colspan="4">Loading...</td></tr>')
        $.ajax({
            url:"ajax_viewtable.php",
            type:"post",
            // headers: {"Accepts": " application/json; text/plain; charset=utf-8"},
            data:{
                id:id,
                itemcontent:'beverages'
            },
            // dataType:"JSON",
            success:function(res){
              if(res){
                $('#viewtable1').html(res);
              }else{
                alert("Failed Try Again");
              }
            }
        });

    }
    
    // non beverages view table

    function myViewTableNonBeverage(){

        var id = document.getElementById("mySelect2").value;
        
        console.log(id);
        $('#viewtable2').html('<tr><td colspan="4">Loading...</td></tr>')
        $.ajax({
            url:"ajax_viewtable.php",
            type:"post",
            data:{
                id:id,
                itemcontent:'nonbeverages'
            },
            // dataType:"JSON",
            success:function(res){
              if(res){
                $('#viewtable2').html(res);
              }else{
                alert("Failed Try Again");
              }
            }
        });
    }
    $('.nonbeveragesviewtable').click(function(){
        console.log('nonbeverages');
        myViewTableNonBeverage();

    });

    // bites view table

    function myViewTableBites(){

    var id = document.getElementById("mySelect3").value;

    console.log(id);
    $('#viewtable3').html('<tr><td colspan="4">Loading...</td></tr>')
    $.ajax({
        url:"ajax_viewtable.php",
        type:"post",
        data:{
            id:id,
            itemcontent:'bites'
        },
        // dataType:"JSON",
        success:function(res){
        if(res){
            $('#viewtable3').html(res);
        }else{
            alert("Failed Try Again");
        }
        }
    });
    }
    $('.bitesviewtable').click(function(){
    // console.log('nonbeverages');
    myViewTableBites();

    }); 

    // juices view table

    function myViewTableJuices(){

    var id = document.getElementById("mySelect4").value;

    console.log(id);
    $('#viewtable4').html('<tr><td colspan="4">Loading...</td></tr>')
    $.ajax({
        url:"ajax_viewtable.php",
        type:"post",
        data:{
            id:id,
            itemcontent:'juices'
        },
        // dataType:"JSON",
        success:function(res){
        if(res){
            $('#viewtable4').html(res);
        }else{
            alert("Failed Try Again");
        }
        }
    });
    }
    $('.juicesviewtable').click(function(){
    console.log('nonbeverages');
    myViewTableJuices();

    }); 

    // parcel view table

    function myViewTableParcel(){

    var id = document.getElementById("mySelect5").value;

    console.log(id);
    $('#viewtable5').html('<tr><td colspan="4">Loading...</td></tr>')
    $.ajax({
        url:"ajax_viewtable.php",
        type:"post",
        data:{
            id:id,
            itemcontent:'parcel'
        },
        // dataType:"JSON",
        success:function(res){
        if(res){
            $('#viewtable5').html(res);
        }else{
            alert("Failed Try Again");
        }
        }
    });
    }
    $('.parcelviewtable').click(function(){
    console.log('nonbeverages');
    myViewTableParcel();

    }); 

</script>
</html>