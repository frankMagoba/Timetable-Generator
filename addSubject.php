<?php 
  require 'header.php';

    if(isset($_POST['subj_id'])&&isset($_POST['subj_name'])){
                $subj_id=$_POST['subj_id'];
                $subj_name=$_POST['subj_name'];
                
                $query="INSERT INTO ttgs.subjects(id,sname) VALUES('$subj_id','$subj_name');";
                $stmt = $conn->prepare($query);
                if ( $stmt->execute() ) {
                    $_SESSION['message']='Subject Added Successfully!';
                } else {
                    $_SESSION['message1']='Subject with id '.$subj_id.' Exists!!';
                }
    }
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
    }
?>

<!DOCTYP HTML >
<html>
    <head>
        <title>Add Subject</title>
         
    </head>
    
    <body>
        <div class="row">
        <div class="col-lg-2"></div>
    <div class="col-sm-8"> <label style="margin-left: 100px; font-size: 40px;">Add Subject</label>
          <div class=" divider"></div>
          <form action="addSubject.php" method="post">
                <div style="padding-left:80px; padding-top: 40px">
                    <?php 
                
                if(!empty($_SESSION['message'])){?>
                         <div class="alert alert-success"><?php echo $_SESSION['message'];?></div>
                         <script>setTimeout(function() {
                   
                  location.href="addSubject.php";
                }, 2000);</script>
                <?php $_SESSION['message']=''; };?>
                <?php if(!empty($_SESSION['message1'])){?>
                         <div class="alert alert-danger"><?php echo $_SESSION['message1'];?></div>
                         <script>setTimeout(function() {
                   
                  location.href="addSubject.php";
                }, 2000);</script>
                <?php $_SESSION['message1']=''; };?>        
                         <strong class="details col-lg-3">Subject ID:</strong><input required="" autofocus   type="number" class=" form-control col-lg-9" id="subj_id" name="subj_id" placeholder="ID of Subject eg 101 for English" style="width: 240px; "><br><br><br>
                         <strong class="details col-lg-3">Subject Name:</strong><input required="" autocomplete   type="text" class=" form-control col-lg-9" id="subj_name" name="subj_name" placeholder="Name of Subject eg English" style="width: 240px; "><br><br><br>
                    
                    <br>
                   
                    <div class=" col-lg-8">
                        <button type="submit" class="btn btn-primary" style=" border-bottom: 2px solid #5bc0de;float: right;">Add Subject</button>
                    </div>


                </div>
                      
        </form>
   
      </div>
    </div>
        <div style="height: 20px;"></div>
        <div class=" row">
                <div class=" col-lg-2"></div>
                    <div class=" col-lg-8">
                        <table data-toggle="table" id="userTable" class="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" style=" text-align: center;">
                                <thead>
                                    <tr role="row" >
                                        <th style="text-align: center;">Subject ID</th>
                                        <th style="text-align: center;">Subject Name</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $res = $db->querydb("SELECT * FROM ttgs.subjects;");
                                while ($myrow = $res->fetch_assoc()){
                                ?>
                                    <tr> 
                                        <td><?php echo $myrow['scode'];?></td>
                                        <td><?php echo $myrow['sname'];?></td>
                                        <td> <a href="addSubject.php?id=<?php echo $myrow['id'];?>" title='Edit Subject'>Edit</a></td>
                                   </tr>
                                <?php }?>
                                </tbody>
                        </table>
                </div>
    
        </div>
        <script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            responsive: true
        });
    });
    </script>
    </body>
   
</html>