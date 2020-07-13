<?php

/*Template Name:Display appointment */
get_header();
?>


<div class="container">

    <div>
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

                        <td><?php  echo $print->CV;?></td>
                        <td><?php  echo $print->comment;?></td>

                    </tr>
                  <?php  } ?>


            </table>
        </div>


    </div>




</div>
<?php get_footer();?>