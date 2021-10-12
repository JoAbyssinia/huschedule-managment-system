
 $('#reportbtn').attr('disabled','disabled');


 $("#filter").change(function () {
   console.log($('#filter').val());
   console.log($('#modality').val());

   if ($('#filter').val()=='select' ||  $('#modality').val()=='select')
   {
      $('#reportbtn').attr('disabled','disabled');     
   } else{
      $('#reportbtn').removeAttr('disabled');
   }
   

 });

 $("#modality").change(function () {
   console.log($('#modality').val());
   if ($('#filter').val()=='select' || $('#modality').val()=='select')
   {
      $('#reportbtn').attr('disabled','disabled');     
   } else{
      $('#reportbtn').removeAttr('disabled');
   }
});

