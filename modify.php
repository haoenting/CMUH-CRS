<?php
//basic_information
error_reporting(E_ERROR | E_PARSE);
$uid = 
  require_once('conn.php');
  $sql1 = "SELECT *
  from `basic_information` WHERE (Chart = '$uChart')";
  $result1 = mysqli_query($link,$sql1);


?>
<?php $userId=100; ?>

<script>
    var userId;
    userId=document.getElementByIdx_x_x_x("userId").value;
    alert (userId);
</script>


<input type="text" name="userId" id="userId" value="<?php echo $userId; ?>">