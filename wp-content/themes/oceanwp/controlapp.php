<?php

if(isset($_POST['submit'] )){
   if(!empty($_POST['meeting-time'])){
    $time= $_POST['meeting-time'];
    global $wpdb;
    
    $sql = $wpdb->insert('setAppointment',
    array(
        'time'=>$time
    ));
    if($sql==1 ){
        echo "<script>alert('Bạn đã tạo thành công')</script>";
    }
   }
   else{
    echo "<script>alert('Bạn chưa chọn thời gian')</script>";
}
   

   
}


?>