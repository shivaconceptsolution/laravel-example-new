<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
         jQuery(document).ready(function(){
            jQuery('#name').keyup(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/se') }}",
                  method: 'get',
                  data: {
                     name: jQuery('#name').val(),
                   
                  },
                  success: function(result){
                     $("#msg").html(result);
                  }});
               });
            });
</script>
</head>
<body>
    <input type="text" id="name"  placeholder="Enter name to search"   />
    <br>
   

    <div id="msg"></div>
</body>
</html>