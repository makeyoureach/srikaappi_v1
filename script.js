
    $(document).ready(function(){
       
      var billtable='';
      var itemsname=new Array();
      var itemsAmount=new Array();
      var itemsQuantity=new Array();
      var itemsFrom=new Array();
      var totalamount=0;
      var id=0;
      var index=0;

      $("#print_bill").click(function(){
        
        $.ajax({
          url:"ajax_content.php",
          type:"post",
          data:{
            itemsname:itemsname,
            itemsQuantity:itemsQuantity,
            itemsAmount:itemsAmount,
            itemsFrom:itemsFrom
          },
          dataType:"JSON",
          success:function(res){
            if(res){
              // window.location.href='billpdf.php';
            }else{
              // alert("Failed Try Again");
            }
          }
        });

        $.ajax({
          url:"ajax_billnumber.php",
          type:"post",
          data:{
          },
          dataType:"JSON",
          success:function(res){
            if(res){

              $("#new_bill").trigger("click");
              var billno=res+1;
              var now = new Date(Date.now());
        var AMPM = now.getHours() >= 12 ? 'PM' : 'AM';
        var hours = now.getHours();
        var min =now.getMinutes();
        if(now.getHours()<=9){
           hours='0'+now.getHours();
        }
        if(now.getMinutes()<=9){
          min='0'+now.getMinutes();
       }

        var formatted = hours + ":" + min + " " + AMPM;

        var doc =new jsPDF('p', 'mm', [85,(85+(itemsname.length*8))]);
        doc.setFontType("bold");
        doc.setFontSize(12);
        doc.text(2,8,'***********************************************************');
        doc.text(32,15,'SRI KAAPPI');
        doc.setFontType("normal");
        doc.setFontSize(10);
        doc.text(18,21,'THE ROYAL TASTE OF KOVAI');
        doc.setFontSize(9);
        doc.text(2,28,'307, KAMARAJAR ROAD, RAMANUJA NAGAR CBE-15');
        doc.setFontSize(9);
        doc.text(37,35,'CASH BILL');
        doc.text(8,40,'Bill no: '+billno+'                                     Date: '+new Date().toISOString().slice(0, 10));
        doc.text(55,45,'Time: '+formatted);
        doc.text(2,50,'----------------------------------------------------------------------------');
      
        var col = ["Items","Qnt","Amt"];
        var rows = [];
        var total=0;
        for(var i=0;i<itemsAmount.length;i++){
          total=parseInt(total)+parseInt(itemsAmount[i]);
        }
        for(var i=0;i<itemsAmount.length;i++){
          var temp=[itemsname[i],itemsQuantity[i],itemsAmount[i]];
          rows.push(temp);
        }
        doc.autoTable(col, rows,{startY: 53, theme: 'plain',
        columnStyles: {
            0: {
                cellWidth: 40,
            },
            1: {
                cellWidth: 10,
            },
            2: {
                cellWidth: 20,
            }
        },
        styles: {
            minCellHeight: 5
        } } );

        doc.setFontType("bold");
        doc.setFontSize(10);
        var totalline=0;
        if(itemsname.length<=10){
          totalline=65+(itemsname.length*8);
          doc.text(8,totalline,'Tot items: '+itemsname.length+'                        Tot Amt: '+total);
          doc.setFontType("normal");
          doc.text(2,70+(itemsname.length*8),'---------------------------------------------------------------------');
          doc.text(10,74+(itemsname.length*8),'Your satisfaction is our greatest concern');
          doc.text(2,78+(itemsname.length*8),'***********************************************************');
        }else{
          totalline=62+(itemsname.length*8);
          doc.text(8,totalline,'Tot items: 20                      Tot Amt: 500');
          doc.setFontType("normal");
          doc.text(2,68+(itemsname.length*8),'---------------------------------------------------------------------');
          doc.text(10,72+(itemsname.length*8),'Your satisfaction is our greatest concern');
          doc.text(2,76+(itemsname.length*8),'***********************************************************');
        }
        

        // doc.text(2,62+(itemsname.length*8),'----------------------------------------------------------------------------');

        

        // doc.autoTable(col1, rows1, { startY: 60 });
        doc.save('bill'+billno+'.pdf');
        doc.autoPrint();
        window.open(doc.output('bloburl'), '_blank');
            }else{
              // alert("Failed Try Again");
            }
          }
        });

        // var now = new Date(Date.now());
        // var AMPM = now.getHours() >= 12 ? 'PM' : 'AM';
        // var formatted = now.getHours() + ":" + now.getMinutes() + " " + AMPM;

        // var doc =new jsPDF('p', 'mm', [85,(85+(itemsname.length*8))]);
        // doc.setFontType("bold");
        // doc.setFontSize(12);
        // doc.text(32,15,'SRI KAAPPI');
        // doc.setFontType("normal");
        // doc.setFontSize(10);
        // doc.text(18,21,'THE ROYAL TASTE OF KOVAI');
        // doc.setFontSize(9);
        // doc.text(3,28,'118 RAJA STREET, KK PLAK, COIMBATORE 641001');
        // doc.setFontSize(9);
        // doc.text(37,35,'CASH BILL');
        // doc.text(8,40,'Bill no: 20                                      Date: '+new Date().toISOString().slice(0, 10));
        // doc.text(55,45,'Time: '+formatted);
        // doc.text(2,50,'----------------------------------------------------------------------------');
      
        // var col = ["Items","Qnt","Amt"];
        // var rows = [];
        
        // for(var i=0;i<itemsAmount.length;i++){
        //   var temp=[itemsname[i],itemsQuantity[i],itemsAmount[i]];
        //   rows.push(temp);
        // }
        // doc.autoTable(col, rows,{startY: 53, theme: 'plain',
        // columnStyles: {
        //     0: {
        //         cellWidth: 40,
        //     },
        //     1: {
        //         cellWidth: 10,
        //     },
        //     2: {
        //         cellWidth: 20,
        //     }
        // },
        // styles: {
        //     minCellHeight: 5
        // } } );

        // doc.setFontType("bold");
        // doc.setFontSize(10);
        // var totalline=0;
        // if(itemsname.length<=10){
        //   totalline=65+(itemsname.length*8);
        //   doc.text(8,totalline,'Tot items: 20                      Tot Amt: 500');
        //   doc.setFontType("normal");
        //   doc.text(2,70+(itemsname.length*8),'---------------------------------------------------------------------');
        //   doc.text(10,74+(itemsname.length*8),'Your satisfaction is our greatest concern');
        //   doc.text(2,78+(itemsname.length*8),'***********************************************************');
        // }else{
        //   totalline=62+(itemsname.length*8);
        //   doc.text(8,totalline,'Tot items: 20                      Tot Amt: 500');
        //   doc.setFontType("normal");
        //   doc.text(2,68+(itemsname.length*8),'---------------------------------------------------------------------');
        //   doc.text(10,72+(itemsname.length*8),'Your satisfaction is our greatest concern');
        //   doc.text(2,76+(itemsname.length*8),'***********************************************************');
        // }
        

        // // doc.text(2,62+(itemsname.length*8),'----------------------------------------------------------------------------');

        

        // // doc.autoTable(col1, rows1, { startY: 60 });
        // doc.save('Test.pdf');
      
        // doc.save('Generated.pdf');
        // doc.autoPrint();
        // window.open(doc.output('bloburl'), '_blank');

    });
      

      //view table calculation
      
      

      // $("body").on("click",".viewdb",function(event){

      //   var id=$(this).attr('id');
      //   var value=$(this).attr('value');
        
      //   console.log(id,value);
      //   if(itemsQuantity[id-1]>1){
      //      itemsQuantity[id-1]=itemsQuantity[id-1]-1;
      //      subIconTrigger(id-1);
      //   }else{
      //      itemsAmount.splice(id-1,1);
      //      itemsname.splice(id-1,1);
      //      itemsQuantity.splice(id-1,1);
      //      index=index-1;
      //   }
      //   billTableCreation();
      //   totalAmountCalculation();
      // });


      //beverages updation

      $("body").on("click",".updatebutton",function(event){

        var updateid=$(this).attr('id');
        if($(this).text()=='Edit'){

          $('#cname'+updateid).css('display','none');
          $('#ctname'+updateid).css('display','none');
          $('#camount'+updateid).css('display','none');
          $('#uname'+updateid).css('display','block');
          $('#utname'+updateid).css('display','block');
          $('#uamount'+updateid).css('display','block');
          $(this).text('Save');
          $('#uname'+updateid).addClass('update-value');
          $('#uamount'+updateid).addClass('update-value');

        }else if($(this).text()=='Save'){

          
          var updatename=$('#uname'+updateid).val();
          var updateamount=$('#uamount'+updateid).val();
          var updatetamilname=$('#utname'+updateid).val();
          // console.log(updatename,updateamount,updatetamilname);
          $.ajax({
            url:"ajax_update.php",
            type:"post",
            // headers: {"Accepts": " application/json; text/plain; charset=utf-8"},
            data:{
              updateid:updateid,
              updatename:updatename,
              updateamount:updateamount,
              updatefor:'beverages',
              updatetamilname:updatetamilname
            },
            // dataType:"JSON",
            success:function(res){
              if(res){

                $('#cname'+updateid).css('display','block');
                $('#ctname'+updateid).css('display','block');
                $('#camount'+updateid).css('display','block');
                $('#uname'+updateid).css('display','none');
                $('#utname'+updateid).css('display','none');
                $('#uamount'+updateid).css('display','none');

                $("#cname"+updateid).html(updatename);
                $("#ctname"+updateid).html(updatetamilname);
                $("#camount"+updateid).html(updateamount);
              }else{
                alert("Failed Try Again");
              }
            }
          });
          $(this).text('Edit');
        }
          
      });

      //non-beverages updation

      $("body").on("click",".updatebutton1",function(event){

        var updateid=$(this).attr('id');
        if($(this).text()=='Edit'){

          $('#c1name'+updateid).css('display','none');
          $('#c1tname'+updateid).css('display','none');
          $('#c1amount'+updateid).css('display','none');
          $('#u1name'+updateid).css('display','block');
          $('#u1tname'+updateid).css('display','block');
          $('#u1amount'+updateid).css('display','block');
          $(this).text('Save');
          $('#u1name'+updateid).addClass('update-value');
          $('#u1amount'+updateid).addClass('update-value');

        }else if($(this).text()=='Save'){

          
          var updatename=$('#u1name'+updateid).val();
          var updateamount=$('#u1amount'+updateid).val();
          var updatetamilname=$('#u1tname'+updateid).val();
          // console.log(updatename,updateamount,updatetamilname);
          $.ajax({
            url:"ajax_update.php",
            type:"post",
            // headers: {"Accepts": " application/json; text/plain; charset=utf-8"},
            data:{
              updateid:updateid,
              updatename:updatename,
              updateamount:updateamount,
              updatefor:'nonbeverages',
              updatetamilname:updatetamilname
            },
            // dataType:"JSON",
            success:function(res){
              if(res){

                $('#c1name'+updateid).css('display','block');
                $('#c1tname'+updateid).css('display','block');
                $('#c1amount'+updateid).css('display','block');
                $('#u1name'+updateid).css('display','none');
                $('#u1tname'+updateid).css('display','none');
                $('#u1amount'+updateid).css('display','none');

                $("#c1name"+updateid).html(updatename);
                $("#c1tname"+updateid).html(updatetamilname);
                $("#c1amount"+updateid).html(updateamount);
              }else{
                alert("Failed Try Again");
              }
            }
          });
          $(this).text('Edit');
        }
          
      });

      //bites updation

      $("body").on("click",".updatebutton2",function(event){

        var updateid=$(this).attr('id');
        if($(this).text()=='Edit'){

          $('#c2name'+updateid).css('display','none');
          $('#c2tname'+updateid).css('display','none');
          $('#c2amount'+updateid).css('display','none');
          $('#u2name'+updateid).css('display','block');
          $('#u2tname'+updateid).css('display','block');
          $('#u2amount'+updateid).css('display','block');
          $(this).text('Save');
          $('#u2name'+updateid).addClass('update-value');
          $('#u2amount'+updateid).addClass('update-value');

        }else if($(this).text()=='Save'){

          
          var updatename=$('#u2name'+updateid).val();
          var updateamount=$('#u2amount'+updateid).val();
          var updatetamilname=$('#u2tname'+updateid).val();
          // console.log(updatename,updateamount,updatetamilname);
          $.ajax({
            url:"ajax_update.php",
            type:"post",
            // headers: {"Accepts": " application/json; text/plain; charset=utf-8"},
            data:{
              updateid:updateid,
              updatename:updatename,
              updateamount:updateamount,
              updatefor:'bites',
              updatetamilname:updatetamilname
            },
            // dataType:"JSON",
            success:function(res){
              if(res){

                $('#c2name'+updateid).css('display','block');
                $('#c2tname'+updateid).css('display','block');
                $('#c2amount'+updateid).css('display','block');
                $('#u2name'+updateid).css('display','none');
                $('#u2tname'+updateid).css('display','none');
                $('#u2amount'+updateid).css('display','none');

                $("#c2name"+updateid).html(updatename);
                $("#c2tname"+updateid).html(updatetamilname);
                $("#c2amount"+updateid).html(updateamount);
              }else{
                alert("Failed Try Again");
              }
            }
          });
          $(this).text('Edit');
        }
          
      });

      //juices updation

      $("body").on("click",".updatebutton3",function(event){

        var updateid=$(this).attr('id');
        if($(this).text()=='Edit'){

          $('#c3name'+updateid).css('display','none');
          $('#c3tname'+updateid).css('display','none');
          $('#c3amount'+updateid).css('display','none');
          $('#u3name'+updateid).css('display','block');
          $('#u3tname'+updateid).css('display','block');
          $('#u3amount'+updateid).css('display','block');
          $(this).text('Save');
          $('#u3name'+updateid).addClass('update-value');
          $('#u3amount'+updateid).addClass('update-value');

        }else if($(this).text()=='Save'){

          
          var updatename=$('#u3name'+updateid).val();
          var updateamount=$('#u3amount'+updateid).val();
          var updatetamilname=$('#u3tname'+updateid).val();
          // console.log(updatename,updateamount,updatetamilname);
          $.ajax({
            url:"ajax_update.php",
            type:"post",
            // headers: {"Accepts": " application/json; text/plain; charset=utf-8"},
            data:{
              updateid:updateid,
              updatename:updatename,
              updateamount:updateamount,
              updatefor:'juices',
              updatetamilname:updatetamilname
            },
            // dataType:"JSON",
            success:function(res){
              if(res){

                $('#c3name'+updateid).css('display','block');
                $('#c3tname'+updateid).css('display','block');
                $('#c3amount'+updateid).css('display','block');
                $('#u3name'+updateid).css('display','none');
                $('#u3tname'+updateid).css('display','none');
                $('#u3amount'+updateid).css('display','none');

                $("#c3name"+updateid).html(updatename);
                $("#c3tname"+updateid).html(updatetamilname);
                $("#c3amount"+updateid).html(updateamount);
              }else{
                alert("Failed Try Again");
              }
            }
          });
          $(this).text('Edit');
        }
          
      });

      //parcel updation

      $("body").on("click",".updatebutton4",function(event){

        var updateid=$(this).attr('id');
        if($(this).text()=='Edit'){

          $('#c4name'+updateid).css('display','none');
          $('#c4tname'+updateid).css('display','none');
          $('#c4amount'+updateid).css('display','none');
          $('#u4name'+updateid).css('display','block');
          $('#u4tname'+updateid).css('display','block');
          $('#u4amount'+updateid).css('display','block');
          $(this).text('Save');
          $('#u4name'+updateid).addClass('update-value');
          $('#u4amount'+updateid).addClass('update-value');

        }else if($(this).text()=='Save'){

          
          var updatename=$('#u4name'+updateid).val();
          var updateamount=$('#u4amount'+updateid).val();
          var updatetamilname=$('#u4tname'+updateid).val();
          // console.log(updatename,updateamount,updatetamilname);
          $.ajax({
            url:"ajax_update.php",
            type:"post",
            // headers: {"Accepts": " application/json; text/plain; charset=utf-8"},
            data:{
              updateid:updateid,
              updatename:updatename,
              updateamount:updateamount,
              updatefor:'parcel',
              updatetamilname:updatetamilname
            },
            // dataType:"JSON",
            success:function(res){
              if(res){

                $('#c4name'+updateid).css('display','block');
                $('#c4tname'+updateid).css('display','block');
                $('#c4amount'+updateid).css('display','block');
                $('#u4name'+updateid).css('display','none');
                $('#u4tname'+updateid).css('display','none');
                $('#u4amount'+updateid).css('display','none');

                $("#c4name"+updateid).html(updatename);
                $("#c4tname"+updateid).html(updatetamilname);
                $("#c4amount"+updateid).html(updateamount);
              }else{
                alert("Failed Try Again");
              }
            }
          });
          $(this).text('Edit');
        }
          
      });



      
      
         //// Pic Calculation //////
      function totalAmountCalculation(){
        totalamount=0;
          for(var i=0;i<index;i++){
             totalamount+=parseInt(itemsAmount[i]);
          }
         $("#amount").html(totalamount);
 
       }

      function billTableCreation(){
        billtable='';
        for(var i=0;i<index;i++){
            billtable+="<tr>";
            billtable+="<th scope='row'>"+(i+1)+"</th>";
            billtable+="<td>"+itemsname[i]+"</td>";
            billtable+="<td>";
            billtable+="<div class='qty_direction'><a class='btn-plus-icon sub_qty'>";
            billtable+="<div>";
            billtable+="<input type='hidden' id='uid' value='"+(i+1)+"'/>";
            billtable+="<input type='hidden' id='uqty' value='"+itemsAmount[i]+"'/>";
            billtable+="<input type='hidden' class='totalamount' id='totalamount' value='"+totalamount+"'/>";
            billtable+="<img src='photos/sub.png' width='25' id='plus-icon'/>";
            billtable+="</div>";
            billtable+="</a> <p id='qty'>"+itemsQuantity[i]+"</p>";
            billtable+="<a class='btn-sub-icon plus_qty'>";
            billtable+="<div>";
            billtable+="<input type='hidden' id='sid' value='"+(i+1)+"'/>";
            billtable+="<input type='hidden' id='sqty' value='"+itemsQuantity[i]+"'/>";
            billtable+="<img src='photos/plus.png' width='25' id='sub-icon'/>";
            billtable+="</div>";
            billtable+="</a></div></td>";
            billtable+="<td>"+itemsAmount[i]+"</td>";
            billtable+="</tr>";
        }

        $("#display").html('');
        $("#display").html(billtable);

      }
      $("body").on("click",".card_image",function(event){
        
        var name=$(this).closest("div").find("input[id='beveragesName']").val();
        var amt=$(this).closest("div").find("input[id='beverageAmount']").val();
        var itemfrom=$(this).closest("div").find("input[id='selectfrom']").val();

        // console.log(itemfrom);
        id++;
        
        var qty=1;
        var repeat=-1;
        for(var i=0;i<index;i++){
          if(name==itemsname[i]){
             itemsQuantity[i]=itemsQuantity[i]+1;
             repeat=i;
            //  console.log("for loop "+itemsQuantity[i])
          }
        }
        
        if(repeat==-1){
          itemsname[index]=name;
          itemsAmount[index]=amt;
          itemsQuantity[index]=qty;
          itemsFrom[index]=itemfrom;
          // console.log("repeat "+itemsQuantity[index])
          index++;
        }else{
          plusIconTrigger(repeat);
        }
        // console.log(itemsname);
        
        billTableCreation();
        totalAmountCalculation();
      });

      //// Plus icon Calculation //////
      function plusIconTrigger(id){
           
          if(itemsQuantity[id]==2){
            itemsAmount[id]=(itemsAmount[id]*2);
          }else{
            itemsAmount[id]=itemsAmount[id]+(itemsAmount[id]/(itemsQuantity[id]-1));
          }
      }
      $("body").on("click",".plus_qty",function(event){
        var id=$(this).closest("div").find("input:eq(0)").val();
        var qty=$(this).closest("div").find("input:eq(1)").val();
        itemsQuantity[id-1]=itemsQuantity[id-1]+1;
        plusIconTrigger(id-1);
        billTableCreation();
        totalAmountCalculation();
      });

       //// Sub icon Calculation //////
       function subIconTrigger(id){
          itemsAmount[id]=itemsAmount[id]-(itemsAmount[id]/(itemsQuantity[id]+1));
       }
       $("body").on("click",".sub_qty",function(event){

        var id=$(this).closest("div").find("input:eq(0)").val();
        var qty=$(this).closest("div").find("input:eq(1)").val();
        
        if(itemsQuantity[id-1]>1){
           itemsQuantity[id-1]=itemsQuantity[id-1]-1;
           subIconTrigger(id-1);
        }else{
           itemsAmount.splice(id-1,1);
           itemsname.splice(id-1,1);
           itemsQuantity.splice(id-1,1);
           index=index-1;
        }
        billTableCreation();
        totalAmountCalculation();
      });
        
      //// recepit bill //////

    //   $("#print_bill").click(function(){
        
    //     // console.log("bill");
        
    //     $.ajax({
    //       url:"ajax_content.php",
    //       type:"post",
    //       data:{
    //         itemsname:itemsname,
    //         itemsQuantity:itemsQuantity,
    //         itemsAmount:itemsAmount,
    //         itemsFrom:itemsFrom
    //       },
    //       dataType:"JSON",
    //       success:function(res){
    //         if(res){
    //           window.location.href='billpdf.php';
    //         }else{
    //           alert("Failed Try Again");
    //         }
    //       }
    //     });

    //     // $.ajax({
    //     //   url:"billpdf.php",
    //     //   type:"post",
    //     //   data:{
    //     //     itemsname:itemsname,
    //     //     itemsQuantity:itemsQuantity,
    //     //     itemsAmount:itemsAmount
    //     //   },
    //     //   success:function(res){
    //     //     if(res){
    //     //       window.print(res.pdf);
    //     //     }else{
    //     //       alert("Failed Try Again");
    //     //     }
    //     //   }
    //     // });
    //     // window.location.href='billpdf.php';
        
    //     // $.ajax({
    //     //   url:"ajax_recepit.php",
    //     //   type:"post",
    //     //   success:function(res){
    //     //     if(res){
    //     //       $("#cur_bill").html(res);
    //     //       // window.location.href='recepit.php';
              
    //     //     }else{
    //     //       // $("#print_bill").click(function(){
    //     //       //   $("#staticBackdrop").modal();
    //     //       // });
    //     //     }
    //     //   }
    //     // });

    //  });

         //// new-bill //////

      $("#new_bill").click(function(){
            $("#display").html('');
            itemsname=new Array();
            itemsAmount=new Array();
            itemsQuantity=new Array();
            index=0;
            totalAmountCalculation();
       });

         //// beverages //////
         
      $("#beverages").click(function(){

        $('#container-control1').addClass('card-container');

        $('#container-control2').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control2').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control4').addClass('view-content');
        $('#container-control5').addClass('view-content');

       });

         //// beverages-without //////
         
      $("#beverages-without").click(function(){

        $('#container-control2').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control4').addClass('view-content');
        $('#container-control5').addClass('view-content');
       });

         //// bites //////
         
       $("#bites").click(function(){

        $('#container-control3').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control2').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control2').addClass('view-content');
        $('#container-control4').addClass('view-content');
        $('#container-control5').addClass('view-content');
       });

         //// juices //////

       $("#juices").click(function(){

        $('#container-control4').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control2').removeClass('card-container');
        $('#container-control5').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control2').addClass('view-content');
        $('#container-control5').addClass('view-content');
        
       });

       //// parcel //////

       $("#parcel").click(function(){

        $('#container-control5').addClass('card-container');

        $('#container-control1').removeClass('card-container');
        $('#container-control3').removeClass('card-container');
        $('#container-control2').removeClass('card-container');
        $('#container-control4').removeClass('card-container');
        
        $('#container-control1').addClass('view-content');
        $('#container-control3').addClass('view-content');
        $('#container-control2').addClass('view-content');
        $('#container-control4').addClass('view-content');
       });

     //// beverages button //////
         
     $("#beverages").click(function(){

      $('#beverages').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages-without').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');

     });
     
     //// beverages - without  button //////

     $("#beverages-without").click(function(){

      $('#beverages-without').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');

     });
     
     //// bites button //////

     $("#bites").click(function(){

      $('#bites').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#beverages-without').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');

     });
     
     //// juices button //////

     $("#juices").click(function(){

      $('#juices').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#beverages-without').removeClass('side-button-active');
      $('#parcel').removeClass('side-button-active');
     });

    //// parcel button //////

    $("#parcel").click(function(){

      $('#parcel').addClass('side-button-active');
      $('#beverages').removeClass('b1');
      $('#beverages').removeClass('side-button-active');
      $('#bites').removeClass('side-button-active');
      $('#beverages-without').removeClass('side-button-active');
      $('#juices').removeClass('side-button-active');
     });
    
    
  });
      