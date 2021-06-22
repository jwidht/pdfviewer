
<form id="myForm" action="upload.php" method="post" enctype="multipart/form-data">

<div class="input-group mb-3">
  <div class="custom-file">

    <input type="file" class="custom-file-input" name="inputGroupFile02" id="inputGroupFile02">
    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
  </div>
  <div class="input-group-append">
    <span class="input-group-text" id="" style="cursor: pointer;">Upload</span>
  </div>
</div>

</form>


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(".input-group-text").on("click", function() {
    $('form#myForm').submit();
});

</script>


<?php



?>