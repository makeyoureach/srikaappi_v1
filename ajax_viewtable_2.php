<?php

                       require_once "dbConfig.php";
                       if(!$con){
                           die("Connection error ".mysqli_connect_error());
                       }
                       $viewid=$_POST['id'];
                       $itemcontent=$_POST['itemcontent'];
                       $itemsName=array();
                       $itemsQuantity=array();
                       $itemsAmount=array();
                       $itemsFrom=array();
                       
                       $beveragesName=array();
                       $beveragesAmount=array();
                       $c=0;
                        
                       
                       if($itemcontent=='beverages'){
                          $sql="select * from beverages";
                       }
                       else if($itemcontent=='nonbeverages'){
                          $sql="select * from nonbeverages";
                       }
                       else if($itemcontent=='bites'){
                        $sql="select * from bites";
                        }
                        else if($itemcontent=='juices'){
                            $sql="select * from juices";
                        }
                        else if($itemcontent=='parcel'){
                            $sql="select * from parcel";
                        }

                       $res=$con->query($sql);
                       while($row=$res->fetch_assoc()){

                           $beveragesName[$c]=$row["itemsname"];
                           $beveragesAmount[$c]=$row["amount"];
                           $c++;
                       }

                       $c=0;
                       $date = date('Y-m-'.$viewid);
                       print_r($date." ssss");
                    //    $cal= (int)(date('d')-(int)(date('d')-$viewid));
                    // //    print_r(date('d')+'--');
                    // //    print_r((date('d')-$viewid));
                    // //    print_r('sss'+$cal);
                    //    $dateCrt = date('Y-m-d', strtotime("-$cal day"));
                    //    print_r($dateCrt);
                       $sql="SELECT  * from sale_items where itemsfrom='$itemcontent' and billdate='$date'";
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
                       print_r($itemsName);
                       $displayItemsName=array();
                       $displayQuantity=array();
                       $displayAmount=array();

                       $sql="Truncate table currentmonthsales";
                       $res=$con->query($sql);

                       for($c = 0; $c < count($beveragesName); $c++){

                           $qty=0;
                           $amt=0;

                           for($k = 0; $k < count($itemsName); $k++){
                               
                               
                               if($beveragesName[$c]==$itemsName[$k] || ($beveragesName[$c].'(p)')==$itemsName[$k]){
                                      $qty=(int)$qty+(int)($itemsQuantity[$k]);
                                      $amt=(int)$amt+(int)$itemsAmount[$k];
                               }
                           }
                           $displayItemsName[$c]=$beveragesName[$c];
                           $displayQuantity[$c]=$qty;
                           $displayAmount[$c]=$amt;
                       }
                       for($c = 0; $c < count($displayItemsName); $c++){

                            $sql="Insert into currentmonthsales (items,quantity,amount) values('$displayItemsName[$c]','$displayQuantity[$c]','$displayAmount[$c]')";
                            $result = mysqli_query($con, $sql);
                       }

                       $displayItemsName=array();
                       $displayQuantity=array();
                       $displayAmount=array();
                       $c=0;
                       $sql="select * from currentmonthsales where quantity > 0 order by amount DESC;";
                       $res=$con->query($sql);
                       while($row=$res->fetch_assoc()){
                           
                           if($itemcontent=='parcel'){
                            $displayItemsName[$c]=$row["items"].'(p)';
                           }else{
                            $displayItemsName[$c]=$row["items"];
                           }
                           
                           $displayQuantity[$c]=$row["quantity"];
                           $displayAmount[$c]=$row["amount"];
                           $c++;
                       }
                       $output='';
                       $count=0;
                       for($c = 0; $c < count($displayItemsName); $c++)
                       {
                           $output.= "<tr style='white-space: nowrap;'>
                               <th scope='row' style='width:10px;'>".($c+1)."</th>
                               <td style='width:100px'><p id='vname".$c."' style='display:block;'>".$displayItemsName[$c]."</p></td>
                               <td style='width:50px'><p id='vname".$c."' style='display:block;'>".$displayQuantity[$c]."</p></td>
                               <td style='width:50px'><p id='vname".$c."' style='display:block;'>".$displayAmount[$c]."</p></td>
                               </tr>";
                            $count=1;
                       }
                        if($count==0){
                            $output='<tr><td colspan="4">No Records Found</td></tr>';
                        }
                       echo $output;
                   ?>