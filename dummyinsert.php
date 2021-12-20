<?php
  
  $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','பூஸ்ட்','ஹார்லிக்ஸ்','பால்','தேன் பால்','இஞ்சிப் பால்','சுக்குப் பால்','குல்கந்துப் பால்','பால்கோவா பால்','பனங்கற்கண்டுப்
                            பால்');                        
  $con=mysqli_connect('34.93.221.231','root','root123','srikaappi');
        if(!$con){
            die("Connection error ".mysqli_connect_error());
        }

    for($i=0;$i<count($tamilName);$i++){
        //  echo $i;
        
         $sql="UPDATE beverages SET tamilname='$tamilName[$i]' WHERE id=($i+1)";
        $result = mysqli_query($con, $sql);

   }

?>