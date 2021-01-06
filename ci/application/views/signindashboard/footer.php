<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"  crossorigin="anonymous"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
  <script type="text/javascript">
  $( document ).ready(function() {
   $(document).on("click",'.addFile',function(){


    $("#fileUploadModal").modal('show');

   });


   $("#fileUploadForm").validate({
    rules: { 
      uploadFile: {
        required: true,       
        accept: "txt,doc,docx,pdf,png,jpeg,jpg,gif",
        maxsize: 250000,
      },     
    },
    messages: {     
      uploadFile: {
        required: "Please select a file",
        accept: "Only accept files with txt,doc,docx,pdf,png,jpeg,jpg,gif",
        maxsize:"File size should be less than or equal to 2 MB"
      },
     
    },
 });

});

  </script>
  <style>
  .addFile{
    margin-left: 10px;
  }
  </style>
  </body>
  </html>