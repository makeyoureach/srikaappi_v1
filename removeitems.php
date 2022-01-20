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
            <h3>SRI KAAPPI</h3><h5 style="margin-left: 10px;">Shop 1</h5>
            </a>
            <div>
            <div class="btn-group dropleft">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle more-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" onclick="window.location.href='home.php'">Home</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='additems.php'">Add items</button>
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
            
            <!-- <div class="col-md-1 col-lg-1 side-bar">
                <div class='sidebar-buttons'>
                <a id='beverages' class="side-btn side-button-active"><img id='side-img' src='photos/herbal-tea.png' width="40" /><p class="side-name">Beverages</p></a>
                <a id='beverages-without' class="side-btn nonbeveragesviewtable"><img id='side-img' src='photos/green-tea.png' width="40" /><p class="side-name">Non-milk</p></a>
                <a id='bites' class="side-btn bitesviewtable"><img id='side-img' src='photos/donut.png' width="40" /><p class="side-name">Bites</p></a>
                <a id='juices' class="side-btn juicesviewtable"><img id='side-img' src='photos/orange-juice.png' width="40" /><p class="side-name">Juices</p></a>
                <a id='parcel' class="side-btn parcelviewtable"><img id='side-img' src='photos/coffee.png' width="40" /><p class="side-name">Parcel</p></a>
        
                </div>
                    </div> -->
                        <div class="col center-content">
                        
                        <!-- Beverages -->

                        <div class="card-container " id='container-control1' >
                            <div style="display: flex; white-space: nowrap; flex-direction: column; width: 100%;">

                            <h4>Remove Items</h4>

                            <div style="width: 100%;">

                                <div style="display: flex; justify-content: end; align-items: center; margin-right: 1px;">
                                    <div style="margin-right: 20px; color: green;">
                                        <h5>
                                        Item Type
                                        </h5>
                                    </div>
                                    <div>
                                    <select style="width: 200px;" style="overflow: auto;" id='removeselectitem' onchange="removeSlots()">
                                        <option class='adddb' id='beverages' value="beverages">Beverages</option>
                                        <option class='adddb' id='nonbeverages' value="nonbeverages">Non Beverages</option>
                                        <option class='adddb' id='bites' value="bites">Bites</option>
                                        <option class='adddb' id='juices' value="juices">Juices</option>
                                        <option class='adddb' id='parcel' value="parcel">Parcel</option>
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Tamil Name</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody id='removeitemstable'>
                                            <?php

                                                require_once "dbConfig.php";
                                                
                                                if(!$con){
                                                    die("Connection error ".mysqli_connect_error());
                                                }
                                                
                                                $beveragesName=array();
                                                $beveragesAmount=array();
                                                $tamilName=array();
                                                $image=array();
                                                $c=0;

                                                $sql="select * from beverages";
                                                $res=$con->query($sql);
                                                while($row=$res->fetch_assoc()){

                                                    $beveragesName[$c]=$row["itemsname"];
                                                    $tamilName[$c]=$row["tamilname"];
                                                    $c++;
                                                }

                                                $img=1;
                                                // $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','பால்','தேன் பால்','இஞ்சிப் பால்','சுக்குப் பால்','குல்கந்துப் பால்','பால்கோவா பால்','பனங்கற்கண்டுப் பால்','ஹனி லெமன் டீ','இஞ்சி லெமன் டீ','கிரீன் டீ','கப்ப ஃப்ரை','முளைக்கட்டிய பச்சை பயறு','முளைகட்டிய சுண்டல்','நிலக்கடலை','சுண்டல்','முளைக்கட்டிய ராகி','முளைக்கட்டிய கம்பு','நவதானிய சுண்டல்','சாம்பார் வடை','தயிர் வடை','ரச வடை','தேங்காய் சீம்பு','காரப்பணியாரம்','இனிப்புப் பணியாரம்','சீம்பால்');
                                                $index=1;
                                                for($c = 0; $c < count($beveragesName); $c++)
                                                {
                                                    echo "<tr>
                                                            <td>
                                                               ".$beveragesName[$c]."
                                                            </td>
                                                            <td>
                                                               ".$tamilName[$c]."
                                                            </td>
                                                            <td>
                                                               <button id=$c class='removeselecteditems btn btn-success' >Remove</button>
                                                            </td>
                                                        </tr>";
                                                $index++;
                                                $img++;
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
    
    function removeSlots(){
        $('#removeitemstable').html('<tr><td colspan="3">Loading response....</td></tr>');
        var type=$('#removeselectitem').val();
        $.ajax({
                url:"ajax_removetablecontent.php",
                type:"post",
                // dataType:"JSON",
                data:{
                    type:type
                },
                success:function(res){
                if(res){
                    // $('#removeitemstable').html(res);
                    $('#removeitemstable').html(res);
                }else{
                    alert("Failed Try Again");
                }
                }
        });
    }
    
    $(document).ready(function(){
  
        $("body").on("click",".removeselecteditems",function(event){

            var id=$(this).attr('id');
            
            var type=$('#removeselectitem').val();

            $(this).text('Processed');

            console.log(id,type);
            $.ajax({
                url:"ajax_removeitems.php",
                type:"post",
                data:{
                    id: parseInt(id)+1,
                    type:type
                },
                // dataType:"JSON",
                success:function(res){
                if(res){
                    // $('#removeitemstable').html(res);
                    location.reload();
                }else{
                    alert("Failed Try Again");
                }
                }
            });
            
            });
    });
</script>
</html>