$(document).ready(function () {
   

   const draggables = document.querySelectorAll('.draggable');
   const containers = document.querySelectorAll('.containerdd');
   const containersrow = document.querySelectorAll('.containerrow');

  
   draggables.forEach(draggable =>{
      draggable.addEventListener('dragstart',()=>{
         console.log('drag start');
         draggable.classList.add('dragging');
         console.log(draggable.querySelector('.id').value);
         console.log(draggable.querySelector('.section').value);
         console.log(draggable.querySelector('.course').value);
         console.log(draggable.querySelector('.instructor').value);
      })

      draggable.addEventListener('dragend',()=>{
         draggable.classList.remove('dragging')
         
      })
   });

   containersrow.forEach(container=>{
      container.addEventListener('dragover',e =>{
         e.preventDefault()
         const draggable = document.querySelector('.dragging');
         container.appendChild(draggable);

         console.log(container.querySelector('.department').value);
         console.log(container.querySelector('.time').value);
         console.log(container.querySelector('.time_id').value);
         console.log(container.querySelector('.date').value);
         console.log(container.querySelector('.batch').value);
         console.log("section "+container.querySelector('.section').value);

         console.log(draggable.querySelector('.id').value);
         console.log("section "+draggable.querySelector('.section').value);
         console.log(draggable.querySelector('.course').value);
         console.log(draggable.querySelector('.instructor').value);

         var datev = container.querySelector('.date').value;
         var time_id_v = container.querySelector('.time_id').value;
         var timev = container.querySelector('.time').value;
         var secv = container.querySelector('.section').value;
         var inst = draggable.querySelector('.instructor').value;

         console.log(datev.trim()+timev.trim()+secv.trim());   

            if (parseInt(container.querySelector('.section').value) == parseInt(draggable.querySelector('.section').value)) {

               var check = insttimeanddatechecker(time_id_v,datev,inst);

               if (check==0) {
                  document.getElementById(datev.trim()+timev.trim()+secv.trim()).style.backgroundColor = '#009c1732' ;
               }else{
                  document.getElementById(datev.trim()+timev.trim()+secv.trim()).style.backgroundColor = '' ;
               }
            }else{
               console.log("not same");
            }
      })
   });
  

   function insttimeanddatechecker(time,date,inte) {
    
     
      var formData = {
         time: time.toString(),
         date: date.toString(),
         inte: inte.toString(),
         };
      
         $.ajax({
            type:'GET',
            url: 'instimechecker',
            data: formData,
            dataType:'json',
            success:function(data) {
               return data;
            },
            error:function(data){
               console.log('fiald');
            }
         });

   }

   $(window).mousemove(function (e) {
      var x = $(window).innerHeight() - 50,
          y = $(window).scrollTop() + 50;


          console.log(x);
      // if ($('.dd-dragel').offset().top > x) {
      //     //Down
      //     $('html, body').animate({
      //         scrollTop: 300 // adjust number of px to scroll down
      //     }, 600);
      // }
      // if ($('.dd-dragel').offset().top < y) {
      //     //Up
      //     $('html, body').animate({
      //         scrollTop: 0
      //     }, 600);
      // } else {
      //     $('html, body').animate({
  
      //     });
      // }
  });

})