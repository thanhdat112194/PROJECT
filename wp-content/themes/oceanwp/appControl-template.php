<?php


/*Template Name:Display appointment */
get_header();
?>
<!-- QUAN-LY-PHONG VAN -->
<div class="CRappoint" style="
text-align: center;
padding-bottom: 20px;
border: 2px solid black;
font-size:40px;


" >
<div class="container" >
    <!-- show edit time appointment -->
    <div class="form-group">
    <form action="" method="POST">
        <label for="date" style="font-size:30px">Tạo Ngày phỏng vấn </label>
        <br>
        <input type="date" name="meeting-time" class="form-control" id="meeting-time"
        min="2019-07-01" max="2019-07-30">
        <br>
        <input type="submit" name="submit">
        </form>    
    </div>

</div>
</div>
<div class="container">
    <!-- show time meeting appoinment -->
        <div class="content-area">

            <table boder="1">
                <tr>
                    <th>Id</th>
                    <th>Họ và tên</th>
                    <th>Tuổi</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Thời gian cuộc hẹn</th>
                    <th>CV (Hồ sơ đính kèm)</th>
                    <th>Comment</th>
                </tr>
        <?php 

                    global $wpdb;
                    $result = $wpdb->get_results("Select*from appointment");
                    foreach ($result as $print){ ?>

                    <tr>
                        <td><?php  echo $print->id;?></td>
                        <td><?php  echo $print->fullName;?></td>

                        <td><?php  echo $print->age;?></td>

                        <td><?php  echo $print->email;?></td>

                        <td><?php  echo $print->phoneNumber;?></td>

                        <td><?php  echo $print->meetingtime;?></td>

                        <td><a href="download.php?id=<?php echo $print->file?>" ><?php  echo $print->file?></a></td>
                        	

                        <td><?php  echo $print->comment;?></td>
                        <!--  -->
                      
                    </tr>
                  <?php  } ?>


            </table>
        </div>
</div>

<?php include 'controlapp.php';?>


<?php


get_footer();?>
<!-- 
<td><?php echo "<a target='_blank'>$print->$file</a>";?></td>  -->
 <!-- <td><?php  
                        echo "<a target='_blank' href='download.php?id=<?php $print->file?>'>$print->file</a>";?>
                        
                        </td> -->
                        <!-- <a href="download.php?file=SampleFile.pdf" target="_new">Download File</a> -->
                       