<?php 	
function employabilityFactor($m_id){
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

 $rv_marks='';
 
 // 10th class
 $student_10th=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='5'");

if($student_10th[0]->e_agg_marks>=60 && count($student_10th)!=0){
$rv_marks+=5;
}

 
 // inter or 12th class
 $student_12th=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='4'");

if($student_12th[0]->e_agg_marks>60 && count($student_12th)!=0){
$rv_marks+=5;
}

 // For Deplamo
  $student_dep=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='3'");

if(count($student_dep)!=0){
$rv_marks+=25;
} 
 //  For graduation except  BE or B.tach
  $student_graduation=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='2' and (cor_id!=25 or cor_id!=26)");

if(count($student_graduation)!=0){
$rv_marks+=25;
}   
  //  For graduation ( BE or B.tach)
  $student_be=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='2' and (cor_id=25 or cor_id=26)");

if(count($student_be)!=0){

// b.tech in NIT,IIT AND ISSC
if($student_be[0]->insti_id=='1' || $student_be[0]->insti_id=='2' || $student_be[0]->insti_id=='3'){
if($student_be[0]->e_agg_marks<60){
$rv_marks+=45;
}else{
$rv_marks+=50;
}
}else{
// b.tech in all colleges
if($student_be[0]->e_agg_marks<60){
$rv_marks+=40;
}else{
$rv_marks+=45;
}
}   
  }
  
   //  For PG ( ME or METECH)
  $student_pg=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='1' ");

if(count($student_pg)!=0){

// b.tech in ME	,MTACH,MS
if($student_pg[0]->insti_id=='1' || $student_pg[0]->insti_id=='11' || $student_pg[0]->insti_id=='13'){
if($student_pg[0]->insti_id=='13' && $student_pg[0]->e_country!=99){
// ms in abroad
$rv_marks+=20;
}else{
$rv_marks+=15;
}
}else{
// PG IN OTHER BRANCHES

$rv_marks+=10;

}   
  }
 
  
  
return $rv_marks;
}	


?>