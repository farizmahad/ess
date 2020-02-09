<!DOCTYPE html>
<html>
<head>
  <title>Upload Multiple Images in Codeigniter Using Ajax</title>
</head>
<!-- Latest compiled and minified CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

<style type="text/css">
.thumb{
  margin: 24px 5px 20px 0;
  width: 150px;
  float: left;
}
#blah {
  border: 2px solid;
  display: block;
  background-color: white;
  border-radius: 5px;
}
</style>
<body>
  
 <div  class="container">
  <div id="divMsg" class="alert alert-success" style="display: none">
   <span id="msg"></span>
  </div>
  <br><br>
   <div class="row" id="blah">
    <form method="post" id="upload_form" enctype="multipart/form-data">  
    <div class="form-control col-md-12">  
      <input type="file" id="image_file"  class="metode"  multiple>
      <input type="text" name="asu" value="1">
      <br>

      <div id="uploadPreview">
        
      </div>
   </div></br></br><br>
   <div class="form-group col-md-6">
     <button type="submit">Submit</button>
   </div>
  </form>
   </div>
 </div> 
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
  $(document).ready(function(){

$('.metode').on('change', function() {
   
var F = this.files;

   if (F && F[0]) {

    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
    }
}


})
});


  function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();
 
  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result; // url.createObjectURL(file);
    image.onload = function() {
      var w = this.width,
          h = this.height,
          t = file.type, // ext only: // file.type.split('/')[1],
          n = file.name,
          s = ~~(file.size/10000) +'KB';
      $('#uploadPreview').append('<img src="' + this.src + '" class="thumb">');
    };
 
    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };      
  };
 
}
</script>
<script>
  
$(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  

           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else 
           {  
              var form_data = new FormData();
              var F = document.getElementById('image_file').files;
              

              var ins = document.getElementById('image_file').files.length;
            
      
              for (var x = 0; x < ins; x++) {

                  form_data.append("files[]", document.getElementById('image_file').files[x]);
              }

               
                $.ajax({  
                     url:"<?php echo base_url(); ?>Ajax/multipleImageStore",   
                     method:"POST",  
                     data:form_data,  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     dataType: "json",
                     success:function(res)  
                     {  
                        console.log(res.success);
                        if(res.success == true){
                         $('#image_file').val('');
                         $('#uploadPreview').html('');   
                         $('#msg').html(res.msg);   
                         $('#divMsg').show();   
                        }
                        else if(res.success == false){
                          $('#msg').html(res.msg); 
                          $('#divMsg').show(); 
                        }
                        setTimeout(function(){
                         $('#msg').html('');
                         $('#divMsg').hide(); 
                        }, 3000);
                     }  
                });  
           }  
      });  
 }); 

</script>
</html>

