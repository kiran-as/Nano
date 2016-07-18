<?php
include('../../application/conn.php');
error_reporting(-1);
$table="<select name='searchparam' id='searchparam'>
            <option value='abc'>Abc</option>
            </select>
     </td>
     <td><select name='searchparam' id='searchparam'>
            <option value='AND'>AND</option>
            <option value='OR'>OR</option>
            </select>
     </td>
          </tr>
        <tr>
             <td  id='concatsearch'></td>
        </tr>
    <tr>";
 echo $table;
?>
	