<?php
/*
 Template Name: register-Template
*/ 
 get_header();
?>

 
<div class="a"
style="
margin:0 auto;
padding: 10px;
background-repeat: no-repeat, repeat;
"
>
<div class="container" style="
     
   
    "

>
    <form method="post">
        
        <div class="form-group">
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
        <label for="meeting-time">Chọn thời gian cuộc hẹn</label>
        <input type="datetime-local" name="metting-time" class="form-control" id="metting-time"
        
        min="2019-07-01T13:00" max="2019-07-30T16:00"

        value="<?php
        
        
        
        ?>"
        
        >
        </div>
        <div class="form-group">
        <label for="file">Hồ sơ của bạn(Tệp đính kèm)</label><br>
        <input type="file" class="form-control"  name="file" id="file"
        
        accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
        >
        </div>
        
        <div class="form-group">
        <label for="comment">Comment</label>
        <input type="text" class="form-control" style="height:60px;
        text-align:left;

        " name="comment" id="comment">
        </div>
        <button type="submit" name="BTNsubmit" class="btn btn-success">Đặt lịch hẹn</button>
    </form>
</div>
    
</div>
<?php
if(isset($_POST['BTNsubmit'])){
    // print_r($_POST["BTNsubmit"]);
    // die;
    $name = $_POST['fullName'];
    $age = $_POST['age'];
    $mail = $_POST['email'];
    $number = $_POST['phoneNumber'];
    $timemeeting = $_POST['metting-time'];
    $file = $_POST['file'];
    $comment = $_POST['comment'];
    // print_r($name);
    // print_r($mail);
    // print_r($number);
    // print_r($comment);
        global $wpdb;
// print_r($name);
        $sql = $wpdb->insert('appointment', 
        array(
            'fullName'=>$name,
            'age'=>$age,
            'email'=>$mail,
            'phoneNumber'=>$number,
            'meetingtime'=>$timemeeting,
            'file'=> $file,
            'comment'=>$comment
        )); 
 if($sql==1){
     echo "<script>alert('Bạn đã đăng ký thành công')</script>";
     header('Location: http://localhost/Royalfashion/wordpress/dangkythanhcong/');
 }
 else{
     echo   "<script>alert('Bạn chưa đăng ký thành công')</script>";
 }

 
}
?>
<?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile; // End of the loop.
        ?>
<?php get_footer();?>