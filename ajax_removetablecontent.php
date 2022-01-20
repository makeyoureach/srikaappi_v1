
<?php

require_once "dbConfig.php";
$output='';
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }
        
        $type=$_POST['type'];
        $beveragesName=array();
        $beveragesAmount=array();
        $tamilName=array();
        $image=array();
        $c=0;

        $sql="select * from $type";
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
            $output.= "<tr>
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
        echo $output;
?>