<?php
    session_start();

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
        <section>
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
            <button class="dropdown-item" type="button" onclick="window.location.href='shop1.php'">Shop 1</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='view1.php'">Sales Report</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='updateitems1.php'">Updation</button>
                <button class="dropdown-item" type="button" onclick="window.location.href='logout.php'">Log Out</button>
            </div>
            </div>
               
            </div>
        </nav>
            <div class="container-fluid report-container">
                <div class="row">
                    <div class="col recepit-heading">
                        <p class='sub-headings'>Bites Records</p>
                        
                        <div class="table-responsive-md">
                    <table class="table recepit-table">
                        <thead class="receipt_thead1">
                            <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Bites Name</th>
                            <th scope="col">Buying Quantity</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Selling Quantity</th>
                            <th scope="col">Total Selling Amount</th>
                            </tr>
                        </thead>
                            <tbody id='receipttable'>
                                <?php
                                    $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
                                    if(!$con){
                                        die("Connection error ".mysqli_connect_error());
                                    }
                                    $sql="select * from bites order by itemsname";
                                    $res=$con->query($sql);
                                    $count=1;
                                    while($row=$res->fetch_assoc()){
                                        echo "<tr>
                                        <td>{$count}</td>
                                        <td>{$row["itemsname"]}</td>
                                        <td style='width:150px'><div style='display:flex; justify-content:center; align-item:center;'><p id='bamt".$count."' style='display:block;'>".$row["buyquantity"]."</p><input type='number' id='ubamt".$count."' class='form-control' value='".$row["buyquantity"]."' style='display:none;width:150px' /></div></td>
                                        <td><button class='bitesbutton' id=$count>Edit</button></td>
                                        <td>{$row["sellquantity"]}</td>
                                        <td>{$row["amount"]}</td>
                                        </tr>";
                                        $count++;
                                    }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script>

        $("body").on("click",".bitesbutton",function(event){

            var bitesid=$(this).attr('id');
            if($(this).text()=='Edit'){
              console.log('#bamount'+bitesid);
            $('#ubamt'+bitesid).css('display','block');
            $('#bamt'+bitesid).css('display','none');
            $(this).text('Save');

            }else if($(this).text()=='Save'){

            
            var updateamount=$('#ubamt'+bitesid).val();

            console.log(updateamount);
            $.ajax({
                url:"ajax_bitesrecords.php",
                type:"post",
                data:{
                bitesid:bitesid,
                updateamount:updateamount,
                },
                success:function(res){
                if(res){

                    $('#ubamt'+bitesid).css('display','none');
                    $('#bamt'+bitesid).css('display','block');
                    
                    $('#ubamt'+bitesid).html(updateamount);

                }else{
                    alert("Failed Try Again");
                }
                }
            });
            $(this).text('Edit');
            }
            
        });

    </script>
</html>