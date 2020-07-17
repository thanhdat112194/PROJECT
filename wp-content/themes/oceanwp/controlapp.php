<?php
// control appControl-template
if(isset($_POST['submit'] )){
   if(!empty($_POST['meeting-time'])){
    $date= $_POST['meeting-time'];
    global $wpdb;
    
    $sql = $wpdb->insert('setAppointment',
    array(
        'date'=>$date
    ));
    if($sql==1 ){
        echo "<script>alert('Bạn đã tạo thành công')</script>";
    }
   }
   else{
    echo "<script>alert('Bạn chưa chọn thời gian')</script>";
}
   

   
}
// <div class="form-group">
// <label for="meeting-time">Chọn thời gian cuộc hẹn</label>

// <select name="" id="">
//     <?php
  
//     while( $result= $wpdb->get_results("Select*from setAppointment")){
//             echo "<option value='$result->time'></option>";
//         }
//         ?>


?>