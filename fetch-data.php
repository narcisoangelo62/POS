<?php 
    $query ="SELECT Room_Number FROM room order by Room_Number asc";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>