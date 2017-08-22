

   <script type="text/javascript">
     $('#transportation').on('change',function(){
    if( $(this).val()==="1"){
    $("#stopeages").show()
    }
    else{
    $("#stopeages").hide()
    }
});
   </script>

   
   <script type="text/javascript">
     
    if( $('#transportation').val()==="1"){
    $("#stopeages").show()
    }
    else{
    $("#stopeages").hide()
    };

 
   </script>

   <script type="text/javascript">
   if($('#religion').val() == ''){ //'.val()'
           $('#religionh').hide();
       }

     $('#religion').on('change',function(){
    if( $(this).val()==="other"){
    $("#religionh").show()
    }
    else{
    $("#religionh").hide()
    }
});
   </script>

   