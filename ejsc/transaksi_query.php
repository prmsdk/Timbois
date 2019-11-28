<?php
include 'includes/config.php';

if(isset($_POST['bayar'])){
  $id_array = $_POST['id'];
  $name_array = $_POST['name'];
  $age_array = $_POST['age'];

  for ($i = 0; $i < count($id_array); $i++) {
  //count($id_array) --> if I input 4 fields, count($id_array) = 4)

    $id = mysql_real_escape_string($id_array[$i]);
    $name = mysql_real_escape_string($name_array[$i]);
    $age = mysql_real_escape_string($age_array[$i]);

    $query .= "UPDATE member SET name = '$name', age = '$age' WHERE id = '$id';";
  }
}
