<?php
require 'header.php';

        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Class</title>
    </head>
    <body >  
        <div style="height: 20px;"></div>
<div class=" row">
                <div class=" col-lg-1"></div>
                    <div class=" col-lg-10">
                        <table data-toggle="table" id="userTable" class="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" >
                                    
                            <thead>
                                    <tr role="row" >
                                        <th>Class Name</th>
                                            <?php 
                                            $res = $db->querydb("SELECT * FROM ttgs.subjects order by id ASC;");
                                            while ($myrow = $res->fetch_assoc()){
                                                echo '<th>'.$myrow['sname'].'</th>';
                                            }  
                                            ?>
                                    </tr>
                            </thead>
                            <tbody>    
                               <?php
                               $res = $db->querydb("SELECT cname FROM ttgs.classnames");
                               while ($row = $res->fetch_assoc()){
                                   $cname=$row['cname'];
                                   ?>
                                <tr>
                                    <td><?php echo $row['cname'];?></td>
                                    <?php
                                   
                                            $res2 = $db->querydb("SELECT tid,subjects FROM ttgs.`group` WHERE gname='$cname'  order by subjects ASC;");
                                            while ($myrow = $res2->fetch_assoc()){?>
                                    <td style="font-size: 11px;"><?php echo convertTeacherName($myrow['tid'])?></td>
                                    <?php
                                            } ?>
                                </tr> <?php
                               } 
                                    function convertTeacherName($tid){
                                    $db= new DatabaseConnection(); 
                                    $res = $db->querydb("SELECT tname FROM ttgs.teacher where id='$tid';");
                                    $myrow = $res->fetch_assoc();
                                    return $myrow['tname'];
                                }        ?>
                            </tbody>    
                        </table>
                </div>
    
        </div>
	
	<!-- Configure a few settings and attach camera -->
	<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            responsive: true
        });
    });
    </script>
    </body>
</html>