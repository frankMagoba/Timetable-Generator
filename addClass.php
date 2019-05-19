<?php 
require 'header.php';   
    if(isset($_POST['gname'])){
        $gname=$_POST['gname'];
        $subj1=isset($_POST[$_SESSION['name'][0]])? $_POST[$_SESSION['name'][0]] : "00";       $teacher1=isset($_POST[$_SESSION['name1'][0]])? $_POST[$_SESSION['name1'][0]] : "00";
        $subj2=isset($_POST[$_SESSION['name'][1]])? $_POST[$_SESSION['name'][1]] : "00";       $teacher2=isset($_POST[$_SESSION['name1'][1]])? $_POST[$_SESSION['name1'][1]] : "00";
        $subj3=isset($_POST[$_SESSION['name'][2]])? $_POST[$_SESSION['name'][2]] : "00";       $teacher3=isset($_POST[$_SESSION['name1'][2]])? $_POST[$_SESSION['name1'][2]] : "00";
        $subj4=isset($_POST[$_SESSION['name'][3]])? $_POST[$_SESSION['name'][3]] : "00";       $teacher4=isset($_POST[$_SESSION['name1'][3]])? $_POST[$_SESSION['name1'][3]] : "00";
        $subj5=isset($_POST[$_SESSION['name'][4]])? $_POST[$_SESSION['name'][4]] : "00";       $teacher5=isset($_POST[$_SESSION['name1'][4]])? $_POST[$_SESSION['name1'][4]] : "00";
        $subj6=isset($_POST[$_SESSION['name'][5]])? $_POST[$_SESSION['name'][5]] : "00";       $teacher6=isset($_POST[$_SESSION['name1'][5]])? $_POST[$_SESSION['name1'][5]] : "00";
        $subj7=isset($_POST[$_SESSION['name'][6]])? $_POST[$_SESSION['name'][6]] : "00";       $teacher7=isset($_POST[$_SESSION['name1'][6]])? $_POST[$_SESSION['name1'][6]] : "00";
        $subj8=isset($_POST[$_SESSION['name'][7]])? $_POST[$_SESSION['name'][7]] : "00";       $teacher8=isset($_POST[$_SESSION['name1'][7]])? $_POST[$_SESSION['name1'][7]] : "00";
        $subj9=isset($_POST[$_SESSION['name'][8]])? $_POST[$_SESSION['name'][8]] : "00";       $teacher9=isset($_POST[$_SESSION['name1'][8]])? $_POST[$_SESSION['name1'][8]] : "00";
        $subj10=isset($_POST[$_SESSION['name'][9]])? $_POST[$_SESSION['name'][9]] : "00";      $teacher10=isset($_POST[$_SESSION['name1'][9]])? $_POST[$_SESSION['name1'][9]] : "00";
        $subj11=isset($_POST[$_SESSION['name'][10]])? $_POST[$_SESSION['name'][10]] : "00";    $teacher11=isset($_POST[$_SESSION['name1'][10]])? $_POST[$_SESSION['name1'][10]] : "00";
        $subj12=isset($_POST[$_SESSION['name'][11]])? $_POST[$_SESSION['name'][11]] : "00";    $teacher12=isset($_POST[$_SESSION['name1'][11]])? $_POST[$_SESSION['name1'][11]] : "00";
        $subj13=isset($_POST[$_SESSION['name'][12]])? $_POST[$_SESSION['name'][12]] : "00";    $teacher13=isset($_POST[$_SESSION['name1'][12]])? $_POST[$_SESSION['name1'][12]] : "00";
        
    $res = $db->querydb("SELECT * FROM ttgs.`group` where gname='$gname';");
    $myrow = $res->fetch_assoc();
    if(count($myrow)==0){
      for($i=1;$i<=13;$i++){
          $subjx=${'subj'.$i};
          $teacherx=${'teacher'.$i};
          
          $query="INSERT INTO ttgs.`group`(gname,subjects,tid) VALUES('$gname','$subjx','$teacherx');";
                $stmt = $conn->prepare($query);
                if ( $stmt->execute() ) {
                    $_SESSION['message']= $_POST['gname'].' Added succefully';
                } 
      }
    }
     else {
                    $_SESSION['message1']='Class Exists!!';
                }
        unset($_SESSION['name']);
        unset($_SESSION['name1']);
        
    }
?>

<!DOCTYP HTML >
<html>
    <head>
        <title>Add Class</title>
         <style>
            .details{

               
            }
        </style>
    </head>
    
    <body>
        <div class="row">
        <div class="col-lg-3"></div>
    <div class="col-sm-6"> <label style="margin-left: 100px; font-size: 40px;">Add Class</label>
          <div class=" divider"></div>
          <form action="addClass.php" method="post">
                <div style="padding-left:80px; padding-top: 40px">
                    <?php 
                
                if(!empty($_SESSION['message'])){?>
                         <div class="alert alert-success"><?php echo $_SESSION['message'];?></div>
                         <script>setTimeout(function() {
                   
                  location.href="addClass.php";
                }, 2000);</script>
                <?php $_SESSION['message']=''; };?>
                <?php if(!empty($_SESSION['message1'])){?>
                         <div class="alert alert-danger"><?php echo $_SESSION['message1'];?></div>
                         <script>setTimeout(function() {
                   
                  location.href="addClass.php";
                }, 2000);</script>
                <?php $_SESSION['message1']=''; };?>
                         <strong class="details col-lg-3">Class Name:</strong><input autofocus required   type="text" class=" form-control col-lg-9" id="rfid" name="gname" placeholder="Name of Class eg Form1" style="width: 240px; "><br><br><br>
                    <br><br><br>
                    
                    <div id="subjects" >
                        <strong class="details col-lg-12">Teacher for subjects</strong>
                        <!-- select all subjects from the db -->
                        <table class="table table-hover">
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Teacher Name</th>
                            </tr>
                            <?php 
                                $res = $db->querydb("SELECT * FROM ttgs.subjects;");
                                while ($myrow = $res->fetch_assoc()){
                                    $subj1=$myrow['id'];
                                ?>
                                   <tr> 
                                        <td><?php echo $myrow['scode'];?></td>
                                        <td><?php echo $myrow['sname'];?></td>
                                        <td>
                                            <input type="hidden" name="<?php echo $myrow['sname'].$subj1;?>" value="<?php echo $subj1;?>"/>    <!-- Cary Subject Id . name will be eg eng2 -->
                                            <?php $_SESSION['name'][]=$myrow['sname'].$subj1;
                                                  $_SESSION['name1'][]=$myrow['sname'];
                                                  
                                            ?>
                                            <select  class=" form-control col-lg-9" name="<?php echo $myrow['sname'];?>" style="width: 240px; ">
                                                 <?php 
                                                    $res1= $db->querydb("SELECT tname,id FROM ttgs.teacher where subject1='$subj1' or subject2='$subj1';");
                                                    while ($myrow1 = $res1->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $myrow1['id'];?>"><?php echo $myrow1['tname'];?></option>
                                        
                                                <?php }?>
                    
                                            </select>
                                        </td>
                                   </tr>
                                <?php }?>
                        </table>
                    </div>
                    <div class=" col-lg-8">
                        <button type="submit" class="btn btn-primary" style=" border-bottom: 2px solid #5bc0de;float: right;">Submit</button>
                    </div>


                </div>
                      
        </form>
   
      </div> 
        <div class="col-lg-3"></div>
        </div>
        <script>
            $(function()
            {
                var e=$.Event('keyup'); e.keyCode = 65;
                $('input').trigger(e);
            });
        </script>
    </body>
   
</html>