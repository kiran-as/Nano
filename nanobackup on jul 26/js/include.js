// JavaScript Document
function alternatecolor(id){
 if(document.getElementsByTagName){
   var table = document.getElementById(id);
   var rows = table.getElementsByTagName("tr");
   for(i = 1; i < rows.length; i++){
     if(i % 2 == 0){
       rows[i].className = "alternaterowcolor1";
     }else{
       rows[i].className = "alternaterowcolor";
     }
   }
 }
}