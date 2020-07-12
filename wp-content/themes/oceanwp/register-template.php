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

<?php get_footer();?>