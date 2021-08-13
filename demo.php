<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
  
   <script type="text/javascript"> 

       $(function(){ 

         $("#getusers").on('click', function(){ 

         $.ajax({ 

           method: "GET", 
           
           url: "getrecords_ajax.php",

         }).done(function( data ) { 

           var result= $.parseJSON(data); 

           var string='<table width="100%"><tr> <th>#</th><th>Name</th> <th>Email</th><tr>';
    
          /* from result create a string of data and append to the div */
         
           $.each( result, function( key, value ) { 
             
             string += "<tr> <td>"+value['id'] + "</td><td>"+value['first_name']+' '+value['last_name']+'</td>  \
                       <td>'+value['email']+"</td> </tr>"; 
                 }); 

                string += '</table>'; 

             $("#records").html(string); 
          }); 
       }); 
   }); 
   </script>