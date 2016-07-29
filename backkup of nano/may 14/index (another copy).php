<?php

$html = "<div class='container mar-t30'>
    <p class='font16-sm brd-btm'>Personal Information</p>
    <div class='row'>
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Name :</span> Kiran Kumar</label>
      </div>
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Email :</span> email@example.com</label>
      </div> 
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Phone Number :</span> 124563987</label>
      </div> 
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Address :</span> 
No.335, Corner Shop, Rajajinagar 1st N Block, Rajajinagar, Opposite Sagar Fast Food, Bangalore - 560010</label>
      </div>                 
    </div> 
    <p class='font16-sm brd-btm'>Profile Summary</p>
    <p>04+ years of experience as Web/Graphic Designer with a passion for designing beautiful and functional user experiences. A perfectionist and minimalist who follows the best practices & trends in the field. Designing and planning of corporate websites, web applications, mobile applications (iPhone/iPad), Branding(Logos), Cartoon and Characters. Expertise and efficient in web designing using Photoshop, Illustrator, Flash, Dreamweaver and front-end technologies using HTML5, XHTML, CSS3, Javascript and jQuery. Excellent working knowledge of semantic and accessible coding standards along with great attention to details and page optimization. </p>   
    <p class='font16-sm brd-btm pad-t10'>Technical Skills</p>
<ul class='content-list'>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
</ul>                             
<p class='font16-sm brd-btm pad-t10'>Employment Details</p>
   <table class='table table-bordered'>
      <thead>
          <tr>
              <th>Degree</th>
              <th>Discipline</th>
              <th>University</th>
              <th>Year Of Passing</th>
              <th>Aggregate</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>PG Diploma</td>
              <td>Embedded Systems</td>
              <td>RV_VLSI Deisgn Center</td>
              <td>2010</td>
              <td>50%</td>                            
          </tr>
          <tr>
              <td>PG Diploma</td>
              <td>Embedded Systems</td>
              <td>RV_VLSI Deisgn Center</td>
              <td>2010</td>
              <td>50%</td>                            
          </tr>
          <tr>
              <td>PG Diploma</td>
              <td>Embedded Systems</td>
              <td>RV_VLSI Deisgn Center</td>
              <td>2010</td>
              <td>50%</td>                            
          </tr>                    
      </tbody>
       
   </table>  
    <p class='font16-sm brd-btm pad-t10'>Technical Skills</p>
<ul class='content-list'>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
</ul>     
    </div>";
$table="<table><tr><td>KIRAN</td></tr></table>";
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<b>$html</b>";
echo "</body>";
echo "</html>";
?>