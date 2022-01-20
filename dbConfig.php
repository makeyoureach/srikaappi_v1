<?php  
// Database configuration  

$con=mysqli_connect('awssrikaappi.cfzmdoatedql.us-east-1.rds.amazonaws.com','admin','srikaappi','srikaappi');
if(!$con){
    die("Connection error ".mysqli_connect_error());
}

// $beveragesName=array('Butter Cookies','Onion Samosa','Methu Vadai','Paruppu Vadai','Masala Bonda','Bajji','Spinach Vadai','Vazhaipoo Vadai','Pazham Pori','Suyyam','Coconut Ball','Kara Kozhukattai','Thattu Vadai','Kappa Bonda','Pakkoda','Kappa Fry','Finger Millet Sprouted','Bajra Sprouted','Peanut','Channa','Channa Sprouted','Green Gram Sprouted','Navadhaniya Sundal','Maothagam','Banana Leaf Adai','Paal Kozhukattai','Milk Kova','Sambar Vadai','Curd Vadai','Rasa Vadai','Kara Paniyaram','Sweet Paniyaram','Fore Milk');
// $beveragesAmount=array(5,10,8,8,8,8,10,10,10,10,12,12,10,10,15,15,15,15,15,15,20,20,20,15,20,20,20,20,20,20,25,30,30);
// $tamilName=array('பிஸ்கட்','ஆனியன் சமோசா','உளுந்து வடை','பருப்பு வடை','உருளைக்கிழங்கு போண்டா','பஜ்ஜி','கீரை வடை','வாழைப்பூ வடை','பழம் பொரி','சுய்யம்','தேங்காய் உருண்டை','காரக் கொழுக்கட்டை','தட்டு வடை','கப்ப போண்டா','பக்கோடா','கப்பக்கிழங்கு ஃப்ரை','முளைக்கட்டிய ராகி','முளைக்கட்டிய கம்பு','நிலக்கடலை','சுண்டல்','முளைகட்டிய சுண்டல்','முளைகட்டிய பச்சை   பயறு','இனிப்பு கொழுக்கட்டை','இலை அடை','பால் கொழுக்கட்டை','பால் கோவா','சாம்பார் வடை','சாம்பார் வடை','தயிர் வடை','ரசவடை','காரப்பணியாரம்','இனிப்புப் பணியாரம்','சீம்பால்');

// $beveragesName=array('Filter Coffee','Tea','Ginger Tea','Sukku Coffee','Sukku Tea','Boost','Horlicks','Milk','Honey Milk','Ginger Milk','Sukku Milk','Gulkand Milk','Kova Milk','Palm candy Milk');
// $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','பூஸ்ட்','ஹார்லிக்ஸ்','பால்','தேன் பால்','இஞ்சிப் பால்','சுக்குப் பால்','குல்கந்துப் பால்','பால்கோவா பால்','பனங்கற்கண்டுப்
// பால்');
// $beveragesAmount=array(20,10,15,25,20,20,20,15,20,20,20,25,30,30);

// $beveragesName=array('Filter Coffee','Tea','Ginger Tea','Sukku Coffee','Sukku Tea','Honey Lemon Tea','Ginger Lemon Tea','Green Tea');
// $beveragesAmount=array(15,10,15,25,20,20,20,20);
// $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','ஹனி லெமன் டீ','இஞ்சி லெமன் டீ','கிரீன் டீ');
           
// $beveragesName=array('Ice Apple Milk','Avil Milk','Red Guava','Italian Grape','ABC Juice','Dates Milk','Rose Milk','Lassi');
// $beveragesAmount=array(40,40,40,40,40,40,35,30);
// $img=1;
// $tamilName=array('நுங்குப் பால்','அவுல் பால்','சிவப்பு கொய்யா','இத்தாலிய திராட்சை','Abc ஜூஸ்','பேரீச்சைப் பால்','ரோஸ் மில்க்','லெஸி');
                            
// $beveragesName=array('Filter Coffee','Tea','Ginger Tea','Sukku Coffee','Sukku Tea','Milk','Honey Milk','Ginger Milk','Sukku Milk','Gulkand Milk','Kova Milk','Palam Candy Milk','Honey Lemon Tea','Ginger Lemon Tea','Green Tea','Kappa Fry','Green Gram Sprouted','Channa Sprouted','Peanet','Channa','Finger Millet Sprouted','Bajra Sprouted','Navadhaniya Sundal','Sambar Vadai','Curd Vadi','Rasa Vadi','Coconut Sprouted','Kara Paniyaram','Sweet Paniyaram','Fore Milk');
// $beveragesAmount=array(25,15,20,30,25,15,25,25,25,30,35,35,25,25,20,20,25,25,20,20,20,20,25,25,25,25,50,30,35,35);
// $img=1;
// $tamilName=array('ஃபில்டர் காபி','டீ','இஞ்சி டீ','சுக்கு காபி','சுக்கு டீ','பால்','தேன் பால்','இஞ்சிப் பால்','சுக்குப் பால்','குல்கந்துப் பால்','பால்கோவா பால்','பனங்கற்கண்டுப் பால்','ஹனி லெமன் டீ','இஞ்சி லெமன் டீ','கிரீன் டீ','கப்ப ஃப்ரை','முளைக்கட்டிய பச்சை பயறு','முளைகட்டிய சுண்டல்','நிலக்கடலை','சுண்டல்','முளைக்கட்டிய ராகி','முளைக்கட்டிய கம்பு','நவதானிய சுண்டல்','சாம்பார் வடை','தயிர் வடை','ரச வடை','தேங்காய் சீம்பு','காரப்பணியாரம்','இனிப்புப் பணியாரம்','சீம்பால்');
                            

// for($i=0;$i<30;$i++){

//     $setimages=($i+1).'.jpg';
//     $sql="INSERT into beverages_1(itemsname, amount, buyquantity, sellquantity, totalamount, image, tamilname) values ('$beveragesName[$i]',$beveragesAmount[$i],0,0,0,'$setimages', '$tamilName[$i]')";

//     if (mysqli_query($con, $sql)) {

//     } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($con);
//     }
// }

?>