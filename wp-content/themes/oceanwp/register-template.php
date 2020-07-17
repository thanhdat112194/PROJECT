<?php
/*
 Template Name: register-Template
*/ 
 get_header();
?>
<!-- TAO HO SO -->
 
<div class="a"
style="
margin:0 auto;
padding: 10px;
background-repeat: no-repeat, repeat;
"
>
<div class="container c" style="
     
   
    "

>
<!-- enctype="multipart/form-data" -->
    <form method="post" >
        
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
            <label for="metting-time">Chọn ngày phỏng vấn</label>
            <select name="metting-time" id="metting-time">
                           
                <?php
              global $wpdb;
              $result = $wpdb->get_results("Select*from setAppointment where id>=3");
                  foreach ($result as $db){
                     echo "<option value='$db->date'>$db->date</option>";
                  }
                 ?>
                
            </select>
            
        </div>
        <div class="form-group"  style="
     
        
        ">
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
            <!-- <?php
              global $wpdb;
              $result = $wpdb->get_results("Select*from setAppointment where id=1 || id =2");
                  foreach ($result as $db){
                     echo "<button value='$db->time'>$db->time</button>";
                  }
            // <button  type="button" class="btn btn-success" style="">aaa</button>
            // <button  type="button" class="btn btn-success" style="">aaa</button>
            ?> -->
            
        </div>
    <div class="form-group">
            <label for="file">Hồ sơ của bạn(Tệp đính kèm)</label><br>
            <input type="file" class="form-control"  name="file1" id="file">
        </div>
        
        <div class="form-group">
        <label for="comment">Comment</label>
        <input type="text" class="form-control" style="height:60px;
        text-align:left;" name="comment" id="comment">
        </div>
        <button type="submit" name="BTNsubmit" class="btn btn-success">Đặt lịch hẹn</button>
    </form>
</div>
    
</div>
<?php

 // if(empty($_FILES["file"]["name"])){
    //     $target_dir= "/assets/img/";
    //     $target_file = $target_dir.basename($_FILES["file"]["name"]);
    //     // $file_type=pathinto($target_file,PATHINFO_EXTENSION);//check real picture
    //     $allowTypes=array('jpg','png','pdf','jpeg','gif');
    //     if(in_array($allowTypes))
    //     {
    //         if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
    //         {
               
    //         }
    //         else {
    //             echo "The file must be picture";
    //         }
    //     }
    // } 
    // $target_dir= "assets/img/";
    // $target_file = $target_dir.basename($_FILES["file"]["name"]);
    // move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);


    
if(isset($_POST['BTNsubmit'])){
   
    
    $name = $_POST['fullName'];
    $age = $_POST['age'];
    $mail = $_POST['email'];
    $number = $_POST['phoneNumber'];
    $timemeeting = $_POST['metting-time'];
    $file = $_POST['file1'];

    $comment = $_POST['comment'];
    // print_r($name);
    // print_r($mail);
    // print_r($age);
    // print_r($number);
    // print_r($timemeeting);
    print_r($file);
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
 if($sql==1 || !empty($_FILES["files1"]["name"])){
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