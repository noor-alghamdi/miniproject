<html>
<head>
    <title>mini Project</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <style>
 .box
 {
  width:100%;
  max-width: 650px;
  margin:0 auto;
 }
 </style>
</head>
<body>
 <div class="container box">
  <br />
  <br />
  <h3 align="center">mini Project</h3>
  <br />
  <div class="form-group">
   <select name="ecommerce" id="ecommerce" class="form-control input-lg">
    <option value="">Select ecommerce</option>
    <?php
    foreach($ecommerce as $row)
    {
     echo '<option value="'.$row->ecommerce_id.'">'.$row->ecommerce_name.'</option>';
    }
    ?>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="category" id="category" class="form-control input-lg">
    <option value="">Select category</option>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="item" id="item" class="form-control input-lg">
    <option value="">Select item</option>
   </select>
  </div>
 </div>
</body>
</html>
<script>
$(document).ready(function(){
 $('#ecommerce').change(function(){
  var ecommerce_id = $('#ecommerce').val();
  if(ecommerce_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>dynamic_dependent/fetch_category",
    method:"POST",
    data:{ecommerce_id:ecommerce_id},
    success:function(data)
    {
     $('#category').html(data);
     $('#item').html('<option value="">Select item</option>');
    }
   });
  }
  else
  {
   $('#category').html('<option value="">Select category</option>');
   $('#item').html('<option value="">Select item</option>');
  }
 });

 $('#category').change(function(){
  var category_id = $('#category').val();
  if(category_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>dynamic_dependent/fetch_item",
    method:"POST",
    data:{category_id:category_id},
    success:function(data)
    {
     $('#item').html(data);
    }
   });
  }
  else
  {
   $('#item').html('<option value="">Select item</option>');
  }
 });
 
});
</script>