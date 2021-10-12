
   state();
   statSelect();
   deleteAlldate();
   deleteAllCustomDate();

   $("#allrecourse").change(function () {
      state();
   }); 
   function state() {
     
      if ($('#allrecourse').is(":checked"))
      {
         $("#add-btn").attr("disabled", true);

         deleteAlldate();
         selectList(); 

      }else{
         $("#add-btn").attr("disabled", false);
      
      }    
   }

   $('#building').change(function () {
     statSelect();
   });

   function statSelect(){
      var bv = $('#building').val();
      if (bv !=0) {
         $('#save-btn').attr('disabled',false);
         $('#floor').attr('disabled',false);
         $('#room').attr('disabled',false); 
         fetchResoures(bv);
      }else{
         $('#save-btn').attr('disabled',true);
         $('#floor').attr('disabled',true);
         $('#room').attr('disabled',true);
        
      }
   }

   function fetchResoures(bv){
      $.ajax({
         type: 'GET', 
         url: 'getfoor/'+bv,
         dataType : 'json',
         success:function (data) {
            var rows = '';
            data.forEach(d => {
             rows +=' <option value="'+d.floor+'" selected> '+d.floor+ '</option> ';
            });
            $('#floor').html(rows);

            fetchrooms();
         },
         error:function (data) {
         }
      });
   }

   $('#floor').change(function () {
      fetchrooms();
   });

   function fetchrooms() {
      var DataP = {
            bid: jQuery('#building').val().toString(),
            floor: jQuery('#floor').val().toString(),
         };
        
      $.ajax({
         type: 'GET',
         url: 'getrooms',
         data: DataP,
         dataType : 'json',
         success:function (data) {
            var rows = '';
            data.forEach(d => {

             rows +=' <option value="'+d.id+'" selected> '+d.name+ '</option> ';
            });
            $('#room').html(rows);

         },
         error:function (data) {
            console.log(data);
         }
      
      });
      
   }


   $('#save-btn').click(function (e) {
   
      $('#save-btn').attr('disabled',true);
      $('#loadingsave').removeAttr('hidden');

      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
         }
     });
     e.preventDefault();
     var formData = {
            building: jQuery('#building').val().toString(),
            floor: jQuery('#floor').val().toString(),
            room: jQuery('#room').val().toString()
      };

      $.ajax({
         type:'GET',
         url: 'addcustom',
         data: formData,
         dataType:'json',
         success:function(data) {
            console.log(data);
              selectList ();      
              $('#loadingsave').attr('hidden','hidden'); 
             $('#customform').trigger("reset");
            $('#modal-default').modal('hide');
         },
         error:function(data){
            console.log('fiald');
         }
      });
   });

   function selectList() {
      $.ajax({
         type: 'GET',
         url: 'customSelectList',
         dataType : 'json',
         success:function (data) {
            $('#selected').empty();
            data.forEach(d =>{
               var res = '<div class="info-box bg-green">'+ 
               '<div class="info-box-content ">'+
               '<div class="col-12">Seleceted</div>'+
               '<div class="col-12"> <strong>Biulding :</strong>'+ d.name +'</div>'+ 
               '<div class="col-12"> <strong>Floor :</strong> '+d.floors+' </div>'+ 
               '<div class="col-12 "> <strong>Rooms :</strong> ' +d.rooms+'  </div>'+ 
             '</span~>'+
             '</div>'+
             '</div>';
             $('#selected').append(res); 
            })
         },
         error:function (data) {
         }
      });
   }

   function deleteAlldate() {
      $.ajax({
         type: 'GET',
         url: 'deletecustom',
         dataType : 'json',
         success:function (data) {
           
         },
         error:function (data) {
         }
      });
   }

   function deleteAllCustomDate() {
      $.ajax({
         type: 'GET',
         url: 'deleteDatecustom',
         dataType : 'json'
      });
   }

   $('#modalitiy').change(function () {
      console.log($('#modalitiy').val());
      if($('#modalitiy').val()!=1) {
          $('#addfd').attr('disabled','disabled');
      }else{
         $('#addfd').removeAttr('disabled');
      }
     
   });

   // off date
   $('#savebtnoffdate').click(function (e) {
      $('#savebtnoffdate').attr('disabled',true);
      $('#loadingsaveofd').removeAttr('hidden');

     
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
         }
      });
      e.preventDefault();

      var formData = {
         dep1: jQuery('#dep1').val().toString(),
         dep2: jQuery('#dep2').val().toString(),
         date2: jQuery('#date2').val().toString(),
         date1: jQuery('#date1').val().toString()
         };
      
         $.ajax({
            type:'GET',
            url: 'addcustomdate',
            data: formData,
            dataType:'json',
            success:function(data) {
               console.log(data);
            

               $('#loadingsaveofd').attr('hidden','hidden'); 
               $('#customdatefrom').trigger("reset");
               $('#modal-lg').modal('hide');

               selectOffDateList();
            },
            error:function(data){
               console.log('fiald');
            }
         });
   });

   $('#addfd').click(function (e) {
      console.log('yes am hire');
      $('#loadingsaveofd').attr('hidden','hidden'); 
      $('#customdatefrom').trigger("reset");
      $('#modal-lg').modal('hide');

      $(this).find('option:selected').remove();

   });


   $('#dep1').change(function () {
      $('#savebtnoffdate').attr('disabled',false); 
   });

   $('#dep2').change(function () {
      $('#savebtnoffdate').attr('disabled',false); 
   });


  

   var weekofdate = [['mo','Monday'],
                     ['tu','Tuesday'],
                     ['we','Wensday'],
                     ['th','Thuesday'],
                     ['fr','Friday']];


// group one 
   let ca = [];

   G1dates();
   G2dates(ca);

   function G1dates(){

      var rowsd='';
      
      weekofdate.forEach(date=>{

         rowsd+=' <option value="'+date[0]+'" > '+date[1]+ '</option> ';
      } );
      $('#date1').html(rowsd);
   }


   function G2dates(dt){
      var rowsd2='';
      console.log(dt=='');
      weekofdate.forEach(date=>{

         if (dt!='') {
            console.log(dt.find(f=>f == date[0]));
            if (dt.find(f=>f == date[0])) {
               rowsd2+=' <option value="'+date[0]+'" disabled > '+date[1]+ '</option> ';  
            }else{
               rowsd2+=' <option value="'+date[0]+'" > '+date[1]+ '</option> ';
            }
         }else{
          
            rowsd2+=' <option value="'+date[0]+'" > '+date[1]+ '</option> ';
         } 
      } );
      $('#date2').html(rowsd2);
   }



   $("#date1").change(function () {
     
      var dates = $("#date1").val().toString().split(',');

         dates.forEach(d=>{
         console.log(d);
      });

      G2dates(dates);
      
   });
   

   function selectOffDateList() {
      $.ajax({
         type: 'GET',
         url: 'listoffdates',
         dataType : 'json',
         success:function (data) {
            $('#offrow').empty();
            data.forEach(d =>{
               var res = '<div class="info-box bg-green">'+ 
               '<div class="info-box-content ">'+
               '<p>Seleceted</p>'+
               '<div class="col-12"> <strong>Dep :</strong>'+ d.dep +'</div>'+ 
               '<div class="col-12"> <strong>Off-date :</strong> '+d.offdate+' </div>'+ 
               
             '</span>'+
             '</div>'+
             '</div>';
             $('#offrow').append(res); 
            })
         },
         error:function (data) {
         }
      });
   }

   
