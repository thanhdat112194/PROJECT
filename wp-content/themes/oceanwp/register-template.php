<?php
/*
 Template Name: register-Template
*/ 
 get_header();
?>
 
<div class="a"
style="
background-img:url(Photo by Sound On from Pexels);
margin:0 auto;
padding: 10px;
background-repeat: no-repeat, repeat;
"
>
<div class="container" style="
    width:40%;
    font-family: Helvetica, Arial, sans-serif; 
    font-size:20px;
    padding-bottom:20px;    
   
    "

>
    <form method="post">
        <div class="form-group">
        <label for="fullName">Họ và tên</label>
        <input type="text" class="form-control" name="fullName" id="fullName">
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
        <label for="comment">Comment</label>
        <input type="text" class="form-control" name="comment" id="comment">
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
    $mail = $_POST['email'];
    $number = $_POST['phoneNumber'];
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
            'email'=>$mail,
            'phoneNumber'=>$number,
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

<?php get_footer();?>