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
            <!-- <div id="iderror"><?php print_r($MSG);?></div> -->
            <select name="metting-date" id="metting-date">        
                <?php

              global $wpdb;
              $data = $wpdb->get_results("Select appointment.meetingdate from appointment");
              $a =count($data);
              $result = $wpdb->get_results("Select*from setAppointment where id>=3 || $a<0");
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
if(isset($_POST["BTNsubmit"])){
global $wpdb;
$meetingdate = $_POST['metting-date'];
print_r($meetingdate);
$datecheck = $wpdb->get_results("Select*from appointment where meetingdate='$meetingdate'");
// if(count()) 
// $sq = mysql_num_rows($datecheck);
// if($sq>0){
//     $msg ="This user have it date";
//     print_r($msg);
// }
if(count($datecheck)>0){
    print_r("data exits");
    // header('Location: http://localhost/Royalfashion/wordpress/ho-so-ung-tuyen/');
    $MSG ="This date was taken";
    die();
    
}else{
    print_r("omg");
    header('Location: http://localhost/Royalfashion/wordpress/dangkythanhcong/');
    $filename = $_FILES['file2']['name'];
    $fileExt = explode('.',$filename);
    $fileActual = strtolower(end($fileExt));
    $fileError = $_FILES["file2"]["error"];
    // echo $fileActual;
    $allowed = array("jpg","jpeg","png","pdf");
        if(in_array($fileActual,$allowed)){
            if($fileError === 0){
                print_r($_FILES["file2"]);
                // $fileNameNew = uniqid('',true).".".$fileActual;
                $des = "upload/".basename($filename);
                move_uploaded_file($_FILES['file2']["tmp_name"],$des);
                // echo "done";
                // echo $fileNameNew;
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
    print_r($file);
    print_r($comment);
    
       
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
    //  header('Location: http://localhost/Royalfashion/wordpress/dangkythanhcong/');
 }
 else{
     echo   "<script>alert('Bạn chưa đăng ký thành công')</script>";
 }
            }else {
                echo "You can't upload the file";
            }
        }else{
            echo "Your file not allowed";
        }
}
}


?>
<?php

// appointment.meetingdate, appointment.meetingtime
// ini_set('display_errors',1);
// global $wpdb;
// $resulta = $wpdb->get_results("Select*from appointment");
  

// if(isset($_POST["BTNsubmit"])){
//     // global $wpdb;
//     // $resulta = $wpdb->get_results("Select appointment.meetingdate, appointment.meetingtime From appointment ");
//     // echo $resulta->meetingdate;
//     $filename = $_FILES['file2']['name'];
//     $fileExt = explode('.',$filename);
//     $fileActual = strtolower(end($fileExt));
//     $fileError = $_FILES["file2"]["error"];
//     // echo $fileActual;
//     $allowed = array("jpg","jpeg","png","pdf");
//         if(in_array($fileActual,$allowed)){
//             if($fileError === 0){
//                 print_r($_FILES["file2"]);
//                 // $fileNameNew = uniqid('',true).".".$fileActual;
//                 $des = "upload/".basename($filename);
//                 move_uploaded_file($_FILES['file2']["tmp_name"],$des);
//                 // echo "done";
//                 // echo $fileNameNew;
//                 $name = $_POST['fullName'];
//     $age = $_POST['age'];
//     $mail = $_POST['email'];
//     $number = $_POST['phoneNumber'];
//     $meetingdate = $_POST['metting-date'];
//     $timemeeting = $_POST['metting-time'];
//     $file = $_FILES['file2'];
//     $comment = $_POST['comment'];
//     // print_r($name);
//     // print_r($mail);
//     // print_r($age);
//     // print_r($number);
//     // print_r($timemeeting);
//     // print_r($meetingdate);
//     print_r($file);
//     print_r($comment);
    
       
// // print_r($name);
//         $sql = $wpdb->insert('appointment', 
//         array(
//             'fullName'=>$name,
//             'age'=>$age,
//             'email'=>$mail,
//             'phoneNumber'=>$number,
//             'meetingdate'=>$meetingdate,
//             'meetingtime'=>$timemeeting,
//             'file'=> $file,
//             'comment'=>$comment
//         )); 
//  if($sql==1 || !empty($_FILES["files2"]["name"])){
//      echo "<script>alert('Bạn đã đăng ký thành công')</script>";
//     //  header('Location: http://localhost/Royalfashion/wordpress/dangkythanhcong/');
//  }
//  else{
//      echo   "<script>alert('Bạn chưa đăng ký thành công')</script>";
//  }
//             }else {
//                 echo "You can't upload the file";
//             }
//         }else{
//             echo "Your file not allowed";
//         }
// }


// // error_reporting(E_ALL);
// // if(isset($_POST['BTNsubmit'])){
// //     if(!in_array($fileActual,$allowed)){
// //     if(!isset($_FILES['file2'])){
// //         if($_FILES['file2']['error']>0)
// //             {
// //                 echo "<script>alert('file của bạn bị lỗi rồi!!!')</script>";
// //             }else{
// //                 $des= "upload/";
// //                 // move_uploaded_file($_FILES['file2']['tmp_name'],$des.basename($_FILES['file2']['name']));
               
// //                 move_uploaded_file($_FILES["file2"]["tmp_name"],"upload/".$filename);
// //                 echo "Your file already uploaded";
            

    
//             // }
// // }
// // }
// // }
?>
<?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile; // End of the loop.
        ?>
<?php get_footer();?>