<?php
include('../../application/conn.php');
error_reporting(-1);
$table="<td><select name='searchparamoption[]' id='searchparamoption[]'>
            <option value='AND'>AND</option>
            <option value='OR'>OR</option>
            </select>
     </td>
     <td>
<select name='searchparam[]' id='searchparam[]'>
            option value='sslc_percentage > '>SSLC</option>
        <option value='puc_percentage > '>PUC</option>
        <option value='deg_percentage >'>DEG</option>
            </select>             <input type='text' name='idsearchval[]' id='idsearchval[]'>
</td>
    ";
 echo $table;
?>
	