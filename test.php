<?php
  require_once('conn.php');
  $result = $link->query('select * from basic_information;');
  if (!$result) {
    die($link->error);
  }

  while ($row = $result->fetch_assoc()) {
    print_r($row);
  }
?>