<?PHP
/*
		Afphrid 1.5


File:		library.php
Purpose:	Useful functions for afphrid
Dates:		C: 5/3/02		M: 5/3/02
Author:		Nicholas 'Aquarion' Avenell
Changes:

										*/
function html_heading($text, $size, $class){
	if ($class != ""){$class = " class=\"$class\"";}
	echo "<h".$size."$class>".$text."</h".$size.">";
}

function html_hidden($name, $value){
	echo "<input type=\"hidden\" name=\"$name\" value=\"$value\">\n\n";
}

function html_chkbox($name, $label, $checked){
	echo "<LABEL for=\"$name\">";
	echo "	<INPUT type=\"checkbox\" id=\"$name\" name=\"$name\"";
	if ($checked){
		echo " checked";
	}
	echo "> $label";
	echo "</LABEL>\n\n";
}

function html_lesshidden($name, $label, $default, $display){
	echo "<LABEL for=\"$name\">$label ";
	echo "	<INPUT type=\"hidden\" id=\"$name\" name=\"$name\" "
		."value=\"$default\">&nbsp;".$display;
	echo "</LABEL>\n\n";
}

function html_textbox($name, $label, $maxlength, $default){
	echo "<LABEL for=\"$name\">$label ";
	echo "	<INPUT type=\"text\" id=\"$name\" name=\"$name\" "
		."value=\"$default\" maxlength=\"$maxlength\">";
	echo "</LABEL>\n\n";
}

function html_password($name, $label){
	echo "<LABEL for=\"$name\">$label ";
	echo "	<INPUT type=\"password\" id=\"$name\" name=\"$name\" "
		."maxlength=\"255\">";
	echo "</LABEL>\n\n";
}

function html_textarea($name, $label, $rows, $cols, $default){
echo "<LABEL for=\"$name\">$label ";
	echo "	<textarea name=\"$name\" rows=\"$rows\" cols=\"$cols\">\n";
	echo $default;
	echo "</textarea>\n";
	echo "</LABEL>\n\n";
}

function html_form_start($name, $action){
echo "<FORM METHOD=POST ACTION=\"$action\">\n\n";

}

function html_buttons($buttons){
	foreach ($buttons as $button){
		echo "<INPUT name=\"". $button[1] ."\" TYPE=\""
			. $button[2] ."\" value=\"". $button[0] ."\">";
	}
}

function html_form_close(){
echo "</FORM>\n";
}

?>