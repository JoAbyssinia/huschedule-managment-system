
$("#modality").change(function () {
   console.log($('#modality').val());
  
   if ( $('#modality').val()==2)
   {
      $('.time').attr('disabled','disabled');  
     
      $(".time").prop("checked", false);

   } else{
      $('.time').removeAttr('disabled');
   }
});
  

