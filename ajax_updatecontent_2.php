<?php

    $output='';
    $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    
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
    
    
    // $beveragesName=array('Filter Coffee','Tea','Ginger Tea','Sukku Coffee','Sukku Tea','Boost','Horlicks','Milk','Honey Milk','Ginger Milk','Sukku Milk','Gulkand Milk','Kova Milk','Palm candy Milk');
    // $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','பூஸ்ட்','ஹார்லிக்ஸ்','பால்','தேன் பால்','இஞ்சிப் பால்','சுக்குப் பால்','குல்கந்துப் பால்','பால்கோவா பால்','பனங்கற்கண்டுப்
    // பால்');
    // $beveragesAmount=array(20,10,15,25,20,20,20,15,20,20,20,25,30,30);
    // $img=1;
    // $index=1;
    for($c = 0; $c < count($beveragesName); $c++)
    {
        $output.= "<tr>
        <th scope='row'>".($c+1)."</th>
        <td><div style='display:flex; justify-content:center; align-item:center;'><p id='cname".$c."' style='display:block;'>".$beveragesName[$c]."</p><input id='uname".$c."' class='form-control' value='".$beveragesName[$c]."' style='display:none;width:200px' /></div></td>
        <td><div style='display:flex; justify-content:center; align-item:center;'><p id='camount".$c."' style='display:block;'>".$beveragesAmount[$c]."</p><input type='number' class='form-control' id='uamount".$c."' value=".$beveragesAmount[$c]." style='display:none;width:100px;' /></div></td>
        <td><button style='cursor: pointer;' id='".$c."' class='updatebutton btn btn-info'>Edit</button></td>
      </tr>";
    }

    echo $output;
?>