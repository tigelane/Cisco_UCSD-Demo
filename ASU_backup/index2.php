<body background="pics/asu_background.jpg">


<form action="machine.php" method="post">
<p>
What type of computer would you like to build?
<select name="computer_type">
  <option value="">Select...</option>
  <option value="windows">Windows</option>
  <option value="linux">Linux (Ubuntu)</option>
</select>
</p>
<p>
How much memory do you need?
<select name="computer_mem">
	<option value="1">1 Gigabyte</option>
	<option value="2">2 Gigabytes</option>
	<option value="4">4 Gigabytes</option>
</select>
</p>
<p>
How much disk space do you need?
<select name="computer_disk">
        <option value="10">10 Gigabyte</option>
        <option value="20">20 Gigabytes</option>
        <option value="40">40 Gigabytes</option>
</select>
</p>

 <p><input type="submit" /></p>
</form>


<?php
/**
 *
 * @create a dropdown select
 *
 * @param string $name
 *
 * @param array $options
 *
 * @param string $selected (optional)
 *
 * @return string
 *
 */
function dropdown( $name, array $options, $selected=null )
{
    /*** begin the select ***/
    $dropdown = '<select name="'.$name.'" id="'.$name.'">'."\n";

    $selected = $selected;
    /*** loop over the options ***/
    foreach( $options as $key=>$option )
    {
        /*** assign a selected value ***/
        $select = $selected==$key ? ' selected' : null;

        /*** add each option to the dropdown ***/
        $dropdown .= '<option value="'.$key.'"'.$select.'>'.$option.'</option>'."\n";
    }

    /*** close the select ***/
    $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
}
?>

<form>

<?php
$name = 'my_dropdown';
$options = array( 'dingo', 'wombat', 'kangaroo' );
$selected = 1;

echo dropdown( $name, $options, $selected );

?>
</form>


