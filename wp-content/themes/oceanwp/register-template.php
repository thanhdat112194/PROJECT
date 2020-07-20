<?php
/*
 Template Name: register-Template
*/ 
 get_header();
?>
<!-- TAO HO SO -->
<!--  -->
<div class="container" style="
margin:0 auto;
padding: 10px;
">
    <form method="post" enctype="multipart/form-data" >
        <div class="form-group" class="b">
            <label for="fullName">Họ và tên</label>
            <input type="text" class="form-control" name="fullName" id="fullName">
        </div>
        <div class="form-group">
            <label for="age">Tuổi</label>
            <input type="text" class="form-control" name="age" id="age">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Số điện thoại</label>
            <input type="text" class="form-control"  name="phoneNumber" id="phoneNumber">
        </div>
        <div class="form-group">
            <label for="metting-date">Chọn ngày phỏng vấn</label>
            <select name="metting-date" id="metting-date">        
                <?php
              global $wpdb;
              $result = $wpdb->get_results("Select*from setAppointment where id>=3");
                  foreach ($result as $db){
                     echo "<option value='$db->date'>$db->date</option>";
                  }
                 ?>
            </select>
        </div>
        <div class="form-group"  style="">
            <label for="metting-time">Chọn thời gian phỏng vấn</label><br>
            <select name="metting-time" id="metting-time">
                           <?php
                global $wpdb;
              $result = $wpdb->get_results("Select*from setAppointment where id=1 || id =2");
                  foreach ($result as $db){
                     echo "<option value='$db->time'>$db->time</option>";
                  }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="file2">Hồ sơ của bạn(Tệp đính kèm)</label><br>
            <input type="file" class="form-control"  name="file2" id="file2">
        </div>
        <div class="form-group">
        <label for="comment">Comment</label>
            <input type="text" class="form-control" style="height:60px; text-align:left;"  name="comment" id="comment">
        </div>
        <button type="submit" name="BTNsubmit" class="btn btn-success">Đặt lịch hẹn</button>
    </form>
</div>
            
<!-- </div> -->
<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
if(isset($_POST['BTNsubmit'])){
    if(isset($_FILES['file2'])){
        if($_FILES['file2']['error']>0)
            {
                echo "<script>alert('file của bạn bị lỗi rồi!!!')</script>";
            }else{
                move_uploaded_file($_FILES['file2']['tmp_name'],'/wordpress/wp-content/themes/ocenanwp/assets/img/'.basename($_FILES['file2']['name']));
            

    $name = $_POST['fullName'];
    $age = $_POST['age'];
    $mail = $_POST['email'];
    $number = $_POST['phoneNumber'];
    $meetingdate = $_POST['metting-date'];
    $timemeeting = $_POST['metting-time'];
    $file = $_FILES['file2'];
    $comment = $_POST['comment'];
    // print_r($name);
    // print_r($mail);
    // print_r($age);
    // print_r($number);
    // print_r($timemeeting);
    // print_r($meetingdate);
    // print_r($file);
    // print_r($comment);
        global $wpdb;
// print_r($name);
        $sql = $wpdb->insert('appointment', 
        array(
            'fullName'=>$name,
            'age'=>$age,
            'email'=>$mail,
            'phoneNumber'=>$number,
            'meetingdate'=>$meetingdate,
            'meetingtime'=>$timemeeting,
            'file'=> $file,
            'comment'=>$comment
        )); 
 if($sql==1 || !empty($_FILES["files2"]["name"])){
     echo "<script>alert('Bạn đã đăng ký thành công')</script>";
     header('Location: http://localhost/Royalfashion/wordpress/dangkythanhcong/');
 }
 else{
     echo   "<script>alert('Bạn chưa đăng ký thành công')</script>";
 }
}
}
}
?>
<?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile; // End of the loop.
        ?>
<?php get_footer();?>