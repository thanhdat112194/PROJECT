<?php


/*Template Name:Display appointment */
get_header();
?>
<!-- QUAN-LY-PHONG VAN -->

<div class="container" style="
text-align: center;
padding-bottom: 20px;
border: 2px solid black;"    >
    <!-- show edit time appointment -->
    <div class="form-group">
        <form action="" method="POST">
        <h1 style="font-size:30px;">Tạo ngày phỏng vấn</h1>
        <br>
        <input type="date" name="meeting-time" class="form-control" id="meeting-time"
        min="2019-07-01" max="2019-07-30">
        <br>
        <input type="submit" name="submit">
        </form>    
    </div>
    <div class="content-area" style="font-size :15px;
     margin: 30px; 
     text-align:center;
     
     ">
     <h1>Ngày phỏng vấn đã được tạo:</h1>
     <form action="" method="POST">
        <table>
            <tr>
                <th>STT</th>
                <th>NGày phỏng vấn</th>
                <th>edit</th>
            </tr>
            <?php
                global $wpdb;
                $count=1;
                $result = $wpdb->get_results("Select*from setAppointment where id >=3");
                foreach($result as $db){?>
            <tr>    
                    <td><?php echo $count;?></td> 
                    <td><?php echo $db->date;?></td>
                    <td>
                    
<!--                     
                    <input type="submit" name="delete_date" 
                    value="<?php echo $db->id?>">DELETE</input> -->
                    <button type="submit" name ="delete_date"
                    value ="<?php  echo $db->id?>">Delete</button>
                    
                    </td>
            </tr>
            <?php $count++;
        
        }?>
        </table>
        </form>
    </div>
</div>
<div class="container">
    <!-- show time meeting appoinment -->
    <h1 style="text-align: center;">Lịch hẹn phỏng vấn</h1>
        <div class="content-area ">

            <table boder="1">
                <tr>
                    <th>Id</th>
                    <th>Họ và tên</th>
                    <th>Tuổi</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>NGày cuộc hẹn</th>
                    <th>Thời gian cuộc hẹn</th>
                    <th>CV (Hồ sơ đính kèm)</th>
                    <th>Comment</th>
                </tr>
                <?php 

                    global $wpdb;
                    $count=1;
                    $result = $wpdb->get_results("Select*from appointment");
                    foreach ($result as $print){ ?>

                    <tr>
                        <td><?php  echo $count;?></td>
                        <td><?php  echo $print->fullName;?></td>

                        <td><?php  echo $print->age;?></td>

                        <td><?php  echo $print->email;?></td>

                        <td><?php  echo $print->phoneNumber;?></td>
                        <td><?php  echo $print->meetingdate;?></td>
                        <td><?php  echo $print->meetingtime;?></td>

                        <td><a href="download.php?id=<?php echo $print->file?>" ><?php  echo $print->file?></a></td>
                        	

                        <td><?php  echo $print->comment;?></td>
                        <!--  -->
                      
                    </tr>
                  <?php  
                    $count++;
                } ?>


            </table>
        </div>
        
</div>

<?php include 'controlapp.php';?>


<?php


get_footer();?>
<!-- 

                       