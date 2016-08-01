    <?
class inputFields
		{
		
		function textBox($name ,$values,$class,$style,$funtion)
					{
					return "<input type='text' name=$name value='".$values."' $style class='$class' onClick=$funtion>";
					}
		
		function textArea($name,$values,$class,$style)
					{
					return "<textarea name='$name' $style class='$class'>".$values."</textarea>" ;
		
					}
		function hiddenFeild($name,$values,$class)
					{
					return "<input type='hidden' name='$name' value='".$values."' class='$class'>" ;
		
					}
					
		function image($name,$values,$class,$style)
					{
					return "<input type ='file' name='$name' values ='$values' $style>";
					}
		
		
		function selectBox($name,$fields_array, $style, $sel_value, $class)			
					{
					
					$select="<select name='$name' style='$style'>";
					$select.="<option value='' >  Select  </option>";
					for($i=0;$i<count($fields_array);$i++)
							{
							//$selected='';
							
						//if($sel_value==$fields_array['values'][$i])
						//	$selected='Selected';
							
						$select.="<option value='".$i."'>".$fields_array[$i]."</option>";
							}
					$select.="</select>";
					
					return $select;
				  	}
		function password($name,$values,$class,$style)			
					{
					return "<input type='password' name='$name' value='$values' class='$class' $style>";
					}
		function radio($name,$values,$class,$function)			
					{
					return "<input type='radio' name='$name' value='$values' class='$class'>";
					}
					
		function radio_checked($name,$values,$class,$checked)			
					{
					return "<input type='radio' name='$name' value='$values' class='$class' $checked>";
					}			
					
		function submitButton($name,$values,$class,$style)			
					{
					return "<input type='submit'  name='$name' value='$values' class='$class' $style>";
					}
					
		function ResetButton($name,$values,$class,$style)			
					{
					return "<input type='reset' name='$name' value='$values' class='$class' $style>";
					}
					
		function ForgotPassword($name,$values,$class)			
					{
					return "<input type='reset' name='$name' value='$values' class='$class'>";
					}			
		function Button($name,$values,$class,$function)			
					{
					return "<input type='button' name='$name' value='$values' $function class='$class'>";
					}
					
		function CheckBox($name,$values,$class,$function)			
					{
					return "<input type='checkbox' name='$name' value='$values' $function class='$class'>";
					} 
					
		function formStart($name,$action,$submit)			
					{
					return "<form method='post' action='$action' $submit name='$name' enctype='multipart/form-data'>";
					}
		
		
		function formEnd()
					{
					return "</form>";
					}
					
					function SelectionBox($name,$result,$row,$value,$display,$class)			
					{
					
					$Select="<select name='$name' style='$style'>
					<option value=''>Select</option>";
					
				  foreach($result as $row)
							{
						$Select.="<option value=".$row->$value." >".$row->$display."</option>";
							}
					$Select.="</select>";
					
					return $Select;
					}
					
					
					
					
					function YearBox($name,$fields_array, $style, $sel_value, $class)			
					{
					
					$select="<select name='$name' style='$style'><option value='' >   Year  </option>";
					
					for($i=0;$i<count($fields_array);$i++)
							{
							$selected='';
							
						if($sel_value==$fields_array[$i])
							$selected='Selected';
							
						$select.="<option value='".$fields_array[$i]."' $selected>".$fields_array[$i]."</option>";
							}
					$select.="</select>";
					
					return $select;
					}
					
					
					
					
					function MonthBox($name,$fields_array, $style, $sel_value, $class)			
					{
					
					$select="<select name='$name' style='$style'><option value='' >Month</option>";
					
					for($i=0;$i<count($fields_array);$i++)
							{
							$selected='';
							
						if($sel_value==$fields_array[$i])
						$selected='Selected';
							
						$select.="<option value='".$fields_array[$i]."' $selected>".$fields_array[$i]."</option>";
							}
					$select.="</select>";
					
					return $select;
					}
					
					
				function MonthBox_interger($name,$fields_array, $style, $sel_value, $class)			
					{
					
					$select="<select name='$name' style='$style' class='$class'><option value='' >Month</option>";
					
					for($i=0;$i<count($fields_array);$i++)
							{
							$selected='';
							
						if($sel_value==($i+1))
						$selected='Selected';
							
						$select.="<option value='".($i+1)."' $selected>".$fields_array[$i]."</option>";
							}
					$select.="</select>";
					
					return $select;
					}	
					
					
					
					function DayBox($name,$fields_array, $style, $sel_value, $class)			
					{
					
					$select="<select name='$name' style='$style'><option value='' >Day</option>";
					
					for($i=0;$i<count($fields_array);$i++)
							{
							$selected='';
							
						if($sel_value==$fields_array[$i])
							$selected='Selected';
							
						$select.="<option value='".$fields_array[$i]."' $selected>".$fields_array[$i]."</option>";
							}
					$select.="</select>";
					
					return $select;
					}
					
					
					
		}

?>
