<?php

//WHEN YOU MAKE A NEW PAGE ADD IT TO CONFIG SO THE MAIN PAGE CAN CALL TO IT*****

function single_edit($tbl, $col, $id){
  $result = getSingle($tbl, $col, $id); // call to get single
    $getResult = mysqli_fetch_array($result);

    //echo mysqli_num_fields($result); this shows us that the object can pull out that data (helps us make it dynamic)

    //work with a loop and get the info to each structured feild
    for ($i=0; $i<mysqli_num_fields($result); $i++){  //middle sets the max value
      $datatype = mysqli_fetch_field_direct($result, $i);

      $feildname = $datatype -> name; // will reach inside and grab the info
      echo $feildname."<br>";
      $feildtype = $datatype -> type; //ask it for its type with the arrow
      echo $feildtype."<br>";
    }



}


 ?>
