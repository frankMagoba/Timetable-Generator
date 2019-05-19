<?php
require 'header.php';

        ?>
<!DOCTYPE html>
<html>
    <head>
        
        <style>
            .details{
           
		#results { float:right; margin:20px;  border:1px solid;}
            }
        </style>
        <title>View Teacher</title>
    </head>
    <body >  
        <div style="height: 20px;"></div>
<div class=" row">
                <div class=" col-lg-2"></div>
                    <div class=" col-lg-8">
                        <table data-toggle="table" id="userTable" class="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" >
                                    
                            <thead>
                                    <tr role="row" >
                                        <th>Teacher ID</th>
                                        <th>Teacher Name</th>
                                        <th>Department</th>
                                        <th>Phone</th>
                                        <th>Subject 1</th>
                                        <th>Subject 2</th>
                                        
                                    </tr>
                            </thead>
                            <tbody>    
                                <?php 
                                
                                $res = $db->querydb("SELECT * FROM ttgs.teacher order by id DESC;");
                                while ($myrow = $res->fetch_assoc()){
                                    $sbj1=$myrow['subject1'];
                                    $sbj2=$myrow['subject2'];
                                ?>
                                   <tr> 
                                       <?php $res1 = $db->querydb("SELECT sname FROM ttgs.subjects where id='$sbj1';");
                                             $res2 = $db->querydb("SELECT sname FROM ttgs.subjects where id='$sbj2';");
                                                $myrow1 = $res1->fetch_assoc();
                                                $myrow2 = $res2->fetch_assoc();
                                                ?>
                                       
                                        <td><?php echo $myrow['id'];?></td>
                                        <td><?php echo $myrow['tname'];?></td>
                                        <td><?php echo $myrow['department'];?></td>
                                        <td><?php echo $myrow['phone'];?></td>
                                        <td><?php echo $myrow1['sname'];?></td>
                                        <td><?php echo $myrow2['sname'];?></td>
                                        
                                   </tr>
                                <?php }?>
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