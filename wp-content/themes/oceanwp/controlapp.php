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
        header('Location: http://localhost/Royalfashion/wordpress/quan-ly-phong-van/');
    }
   }
   else{
    echo "<script>alert('Bạn chưa chọn thời gian')</script>";
    
}
   
}
?>
<?php 
    if(isset($_POST['delete_date'])) {
        global $wpdb;
       $results = $db->id;
        $sql = $wpdb->delete('setAppointment',
        array(
            'id'=>$results ));
        if($sql==1){
            echo "<script>alert('Bạn đã xóa thành công ')</script>";
            header('Location: http://localhost/Royalfashion/wordpress/quan-ly-phong-van/');
        }
    }

?>

