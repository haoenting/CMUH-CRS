
    <?php
    error_reporting(E_ERROR | E_PARSE);
    require_once('conn.php');

    $value = $POST['sorting'];
    $sql;
    if($value == 'Chart'){
      $sql = "SELECT Chart, ID, Name, Gender, Time
      from `basic_information`
      ORDER BY Chart ASC";
    }
    else if($value == 'ID'){
      $sql = "SELECT Chart, ID, Name, Gender, Time
      from `basic_information`
      ORDER BY ID ASC";
    }
    else if($value == 'Name'){
      $sql = "SELECT Chart, ID, Name, Gender, Time
      from `basic_information`
      ORDER BY Name ASC";
    }
    else{
      $sql = "SELECT Chart, ID, Name, Gender, Time
      from `basic_information`
      ORDER BY Time ASC";
    }
    
    
    $result = mysqli_query($link,$sql);
    echo "
      <table align='center' style='border:3px #cccccc solid; width:100%' cellpadding='10' border='1'>
        <tr>
          <th colspan='6'>查詢結果</th>
        </tr>";

      echo "
        <tr>
          <td  align='center'>No.</td>";
          while ($title = mysqli_fetch_field($result)) {
          echo "
          <td  align='center'> 
            $title->name 
          </td>";
          }
        echo "</tr>";
        
      $count = 1;
        while($row=mysqli_fetch_row($result)) {
        echo "
        <tr>
          <td  align='center'>$count</td>";
        $count++;

        for($j=0; $j<mysqli_num_fields($result); $j++) {
        echo "
          <td  align='center'>$row[$j]</td>";
        }
        echo "
        <tr>";
        }
    echo "</table>";

    mysqli_close($link);

    ?>
