<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>schedule</title>
</head>
<body>
   
   <form action="{{ Route('generate') }}" method="get">
      <button>generate</button>
   </form>
      <table border="1">
      <thead>
         <tr>
            <td>Mon</td>
            <td>tu</td>
            <td>we</td>
            <td>th</td>
            <td>Fr</td>
            <td>Sat</td>
            <td>Sun</td>
         </tr>
      </thead>
      <tbody>
      <tr>
      @foreach($schedule as $value)
            <td>
             {{ print_r($value->section_id .' <br>'.$value->room_id.'<br>'.$value->time_table_id.'<br>'.$value->date ) }} 
            </td>
      @endforeach
          </tr>
      </tbody>
      </table>

         
      
  
</body>
</html>