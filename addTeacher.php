<?php
require 'header.php';

$res = $db->querydb("SELECT max(id) as no FROM ttgs.teacher;");
                                $myrow3 = $res->fetch_assoc();
                                $_SESSION['nextno']=$myrow3['no']/1+1;
    if(isset($_POST['depart'],$_POST['tid'],$_POST['tname'],$_POST['subj_1'],$_POST['subj_2'],$_POST['phone'])){
        $depart = $_POST['depart'];
        $tid=$_POST['tid'];
        $tname=$_POST['tname'];
        $subj_1=$_POST['subj_1'];
        $subj_2=$_POST['subj_2'];
        $phone=$_POST['phone'];
        $query="INSERT INTO ttgs.teacher(id,department,tname,subject1,subject2,phone) VALUES('$tid','$depart','$tname','$subj_1','$subj_2','$phone');";
                $stmt = $conn->prepare($query);
                if ( $stmt->execute() ) {
                    $_SESSION['message']= $_POST['tname'].' '.$_POST['tid'].' Registered succefully';
                } else {
                    $_SESSION['message1']='Teacher with id '.$tid.' Exists!!';
                }
        
        
        
    }
        ?>
<!DOCTYPE html>
<html>
    <head>
        
        <style>
            .details{
           
		#results { float:right; margin:20px;  border:1px solid;}
            }
        </style>
        <title>Add Teacher</title>
    </head>
    <body >  
<div class="container-fluid" >
<div class="row content row-horizon">
<div class="col-sm-2 sidenav panel">
         
</div>
      <div class="col-sm-8" > <label style=" font-size: 40px;margin-left: 270px;">Add Teacher </label>
          <div class=" divider"></div>
 
                
                <?php 
                
                if(!empty($_SESSION['message'])){?>
                         <div class="alert alert-success"><?php echo $_SESSION['message'];?></div>
                         <script>setTimeout(function() {
                   
                  location.href="addTeacher.php";
                }, 2000);</script>
                <?php $_SESSION['message']=''; };?>
                <?php if(!empty($_SESSION['message1'])){?>
                         <div class="alert alert-danger"><?php echo $_SESSION['message1'];?></div>
                         <script>setTimeout(function() {
                   
                  location.href="addTeacher.php";
                }, 2000);</script>
                <?php $_SESSION['message1']=''; };?>
          <form action="addTeacher.php" method="post">
              <div>
                  <label class="details col-lg-3">Teacher ID:</label><input value="<?php echo $_SESSION['nextno'];?>" required="" type="number" class=" form-control" name="tid" placeholder="Enter Teacher ID" style="width: 240px; " ><br>
                    <label class="details col-lg-3">Name:</label><input autofocus required="" type="text" class=" form-control" name="tname" placeholder="Enter Teacher name" style="width: 240px; "><br>
                    <label class="details col-lg-3">Department:</label><input required="" type="text" class=" form-control" name="depart" placeholder="Enter Department" style="width: 240px; " autofocus=""><br>
                    <label class="details col-lg-3">Phone:</label><input value="07"required="" type="tel" class=" form-control" name="phone" placeholder="Enter  mobile Number" style="width: 240px;"><br>
                    <label class="details col-lg-3">Subject 1:</label>
                    <select  required="" class=" form-control col-lg-9" name="subj_1" style="width: 240px; ">
                        <?php 
                                $res = $db->querydb("SELECT * FROM ttgs.subjects;");
                                while ($myrow = $res->fetch_assoc()){
                                ?>
                        <option value="<?php echo $myrow['id'];?>"><?php echo $myrow['sname'];?></option>
                                        
                                <?php }?>
                    </select><br><br><br>
                    <label class="details col-lg-3">Subject 2:</label>
                    <select  required="" class=" form-control col-lg-9" name="subj_2" style="width: 240px; ">
                        <?php 
                                $res = $db->querydb("SELECT * FROM ttgs.subjects;");
                                while ($myrow = $res->fetch_assoc()){
                                ?>
                        <option value="<?php echo $myrow['id'];?>"><?php echo $myrow['sname'];?></option>
                                        
                                <?php }?>
                    </select>
                    <div class=" col-lg-9">
                        <button type="submit" class="btn btn-primary " style=" border-bottom: 2px solid #5bc0de; float: right;">Submit</button> 
                    </div>
                </div>
              
          </form>
          
        </div>
      </div>
</div>
        <div style="height: 20px;"></div>
<div class=" row">
                <div class=" col-lg-2"></div>
                    <div class=" col-lg-8">
                        <table data-toggle="table" id="userTable" class="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" style=" text-align: center;">
                                    
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