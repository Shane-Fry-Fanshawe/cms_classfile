<?php

//WHEN YOU MAKE A NEW PAGE ADD IT TO CONFIG SO THE MAIN PAGE CAN CALL TO IT*****

function single_edit($tbl, $col, $id){
  $result = getSingle($tbl, $col, $id); // call to get single
    $getResult = mysqli_fetch_array($result);

    //echo mysqli_num_fields($result); this shows us that the object can pull out that data (helps us make it dynamic)


    //Start of form tag to it doesnt get put in loop
    echo "<form action=\"phpscripts/editall.php\" method=\"post\">";

    echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
    echo "<input hidden name=\"col\" value=\"{$col}\">";
    echo "<input hidden name=\"id\" value=\"{$id}\">";


    //work with a loop and get the info to each structured feild
    for ($i=0; $i<mysqli_num_fields($result); $i++){  //middle sets the max value
      $datatype = mysqli_fetch_field_direct($result, $i);

      $feildname = $datatype -> name; // will reach inside and grab the info
    //  echo $feildname."<br>";
      $feildtype = $datatype -> type; //ask it for its type with the arrow
    //  echo $feildtype."<br>";


    //Check to make sure it deosnt overwrite another movie? and add text feilds
    if($feildname != $col){
      echo "<label>{$feildname}</label><br>";
      if($feildtype != "252"){
        echo "<input type=\"text\" name=\"{$feildname}\" value=\"{$getResult[$i]}\"<br><br> ";
      }else{
        echo "<textarea name=\"{$feildname}\"> {$getResult[$i]} </textarea><br><br> ";

      }
    }

    }
    //submit button
    echo "<input type=\"submit\" name=\"submit\" value=\"Save Content\">";
    echo "</form>";

}


 ?>
