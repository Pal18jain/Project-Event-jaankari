<?php 

function get_product($con,$cat_id=''){
    $sql= "SELECT * FROM events where ";
    if($cat_id!='') {
        $sql.= " C_id= $cat_id ";
    }
    $res= mysqli_query($con,$sql);
    $data= array();
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;

    }
    return $data;
}
  ?>