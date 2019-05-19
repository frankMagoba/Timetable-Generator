
<?php

require 'header.php';
include_once "DatabaseConnection.php";
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
//draws the timetables
$db = new DatabaseConnection();



$res = $db->querydb("SELECT COUNT(DISTINCT gname) AS groups FROM ttgs.`group`;");
$row = $res->fetch_assoc();
for ($groups = 1; $groups <= $row['groups']; $groups ++) {//produces arrays for form 1-4
    for ($Days = 1; $Days <= 5; $Days ++) {
        for ($i = 0; $i <= 12; $i++) {//generates non-repeated random numbers
            ${'f' . $groups . 'subjects' . $Days}[$i] = rand(1, 13);
            for ($j = 0; $j < $i; $j++) {
                while (${'f' . $groups . 'subjects' . $Days}[$j] == ${'f' . $groups . 'subjects' . $Days}[$i]) {
                    ${'f' . $groups . 'subjects' . $Days}[$i] = rand(1, 13);
                    $j = 0;
                }
            }
        }
    }
}

for ($groups = 1; $groups <= $row['groups']; $groups ++) {//Insert teachers into their slots
    for ($Days = 1; $Days <= 5; $Days ++) {
        for ($i = 0; $i <= 12; $i++) {//generates non-repeated random numbers
            $cname = convertClassName($groups);
            $subj_id = ${'f' . $groups . 'subjects' . $Days}[$i];
            $res = $db->querydb("SELECT tid FROM ttgs.`group` where subjects='$subj_id' and gname='$cname';");
            $myrow = $res->fetch_assoc();
            ${'f' . $groups . 'teacher' . $Days}[$i] = $myrow['tid'];
        }
    }
}


//check if teacher is free
/* for($Days = 1; $Days <=5 ; $Days ++){  
  for ($i=0; $i<=12; $i++) {
  for ($groups = 1; $groups <= 4; $groups ++) {
  for ($j=1; $j<$i; $j++) {
  while (${'f'.$j.'teacher'.$Days}[$i] == ${'f'.$groups.'teacher'.$Days}[$i]){//if teacher occupied
  ${'f'.$groups.'subjects'.$Days}[$i] = rand(1,13); //change subject
  //---Chnge teacher---
  $subj_id=${'f'.$groups.'subjects'.$Days}[$i];
  $res = $db->querydb("SELECT tid FROM ttgs.`group` where subjects='$subj_id';");
  $myrow = $res->fetch_assoc();
  ${'f'.$groups.'teacher'.$Days}[$i]=$myrow['tid'];
  $j = 1;
  }
  }
  }

  }
  }
 */
for ($groups = 1; $groups <= $row['groups']; $groups ++) {//produces arrays for form 1-4
    $res = $db->querydb("SELECT * FROM ttgs.time_slots;");
    echo 'Form' . convertClassName($groups) . ' Timetable <br/><table class="table table-hover " style=" text-align: center;">';
    echo ' <thead>';
    echo '<tr role="row">';

    echo '<th>Days\Hours</th>';
    while ($myrow = $res->fetch_assoc()) {
        echo '<th>' . $myrow["slots"] . '</th>';
    }
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
    for ($Days = 1; $Days <= 5; $Days ++) {
        echo '<tr role="row" class="odd">';
        switch ($Days) {
            case 1:
                echo '<td>Mon</td>';
                break;
            case 2:
                echo '<td>Tue</td>';
                break;
            case 3:
                echo '<td>Wed</td>';
                break;
            case 4:
                echo '<td>Thu</td>';
                break;
            case 5:
                echo '<td>Fri</td>';
                break;
        }
        for ($TimeSlot = 0; $TimeSlot < 13; $TimeSlot++) {
            ${'f' . $groups . 'subjects' . $Days}[3] = 'Long Break';
            ${'f' . $groups . 'subjects' . $Days}[6] = 'Short Break';
            ${'f' . $groups . 'subjects' . $Days}[9] = 'Lunch';

            if ($TimeSlot == 3 || $TimeSlot == 6 || $TimeSlot == 9) {
                echo '<th>' . ${'f' . $groups . 'subjects' . $Days}[$TimeSlot] . '</th>';
            } else {
                $dayname = convertTosubjectName(${'f' . $groups . 'subjects' . $Days}[$TimeSlot]);
                echo '<td>' . $dayname . ' ' . ${'f' . $groups . 'teacher' . $Days}[$TimeSlot] . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table><br/><br/>';
}

function convertTosubjectName($sbj_id) {
    $db = new DatabaseConnection();
    $res = $db->querydb("SELECT sname FROM ttgs.subjects where id='$sbj_id';");
    $myrow = $res->fetch_assoc();
    return $myrow['sname'];
}

function convertClassName($class_id) {
    $db = new DatabaseConnection();
    $res = $db->querydb("SELECT cname FROM ttgs.classnames where id='$class_id';");
    $myrow = $res->fetch_assoc();
    return $myrow['cname'];
}

/*   function getRemaining_lessons_per_week($subj_id){//checks if the lesson is still available in the current week
  $sesid="_".$subj_id;

  if($_SESSION[$sesid]<=0){
  return FALSE;
  }
  else{
  $_SESSION[$sesid]=$_SESSION[$sesid]-1;
  return TRUE;
  }

  } */

/*   function setRemainingLessons($subj_id){
  $db= new DatabaseConnection();
  switch ($subj_id){
  case 1:
  if(!isset($_SESSION['_1'])||empty($_SESSION['_1'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$ subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_1']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_1']=$_SESSION['_1'];
  }
  break;
  case 2:
  if(!isset($_SESSION['_2'])||empty($_SESSION['_2'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$ subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_2']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_2']=$_SESSION['_2'];
  }
  break;
  case 3:
  if(!isset($_SESSION['_3'])||empty($_SESSION['_3'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$ subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_3']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_3']=$_SESSION['_3'];
  }
  break;
  case 4:
  if(!isset($_SESSION['_4'])||empty($_SESSION['_4'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$ subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_4']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_4']=$_SESSION['_4'];
  }
  break;
  case 5:
  if(!isset($_SESSION['_5'])||empty($_SESSION['_5'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$ subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_5']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_5']=$_SESSION['_5'];
  }
  break;
  case 6:
  if(!isset($_SESSION['_6'])||empty($_SESSION['_6'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$ subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_6']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_6']=$_SESSION['_6'];
  }
  break;
  case 7:
  if(!isset($_SESSION['_7'])||empty($_SESSION['_7'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_7']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_7']=$_SESSION['_7'];
  }
  break;
  case 8:
  if(!isset($_SESSION['_8'])||empty($_SESSION['_8'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_8']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_8']=$_SESSION['_8'];
  }
  break;
  case 9:
  if(!isset($_SESSION['_9'])||empty($_SESSION['_9'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_9']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_9']=$_SESSION['_9'];
  }
  break;
  case 10:
  if(!isset($_SESSION['_10'])||empty($_SESSION['_10'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_10']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_10']=$_SESSION['_10'];
  }
  break;
  case 11:
  if(!isset($_SESSION['_11'])||empty($_SESSION['_11'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_11']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_11']=$_SESSION['_11'];
  }
  break;
  case 12:
  if(!isset($_SESSION['_12'])||empty($_SESSION['_12'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_12']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_12']=$_SESSION['_12'];
  }
  break;
  case 13:
  if(!isset($_SESSION['_13'])||empty($_SESSION['_13'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_13']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_13']=$_SESSION['_13'];
  }
  break;
  case 14:
  if(!isset($_SESSION['_14'])||empty($_SESSION['_14'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_14']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_14']=$_SESSION['_14'];
  }
  break;
  case 15:
  if(!isset($_SESSION['_15'])||empty($_SESSION['_15'])){
  $res1 = $db->querydb("SELECT subject_lessons_per_week FROM ttgs.subject_lessons_per_week where subj_id='$subj_id';");
  $myrow = $res1->fetch_assoc();
  $_SESSION['_15']=$myrow['subject_lessons_per_week'];//set lessons remaining
  }else{
  $_SESSION['_15']=$_SESSION['_15'];
  }
  break;
  }

  } */
?>
