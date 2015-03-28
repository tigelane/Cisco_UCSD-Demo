<html>
<center>
<body background="pics/asu_background.jpg">

<TABLE align="center" bgcolor="#990033" border="0">
<TR><TD align="center"><font color="#FFB310" size="40">ASU Cloud Services</font>
<TR><TD align="right"><H2>Welcome to the  xxxxxxxxxxxx department
</table>
<p>

<TABLE align="center" bgcolor="#FFFFFF" border="1">
<TR><TH>Logged in as:<TH>
<TD>xxxxxxx
</table>

<?php
// define variables and set to empty values
$computer_type = $computer_vcpu = $computer_hostname = $computer_user = $computer_password = $computer_time = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST["computer_type"]))
		{$Err = "ERROR: An operating system is required";}
	else
		$computer_type = test_input($_POST["computer_type"]);
	
	if(empty($_POST["computer_vcpu"]))
		{$Err = "ERROR: Some CPU is required";}
	else
		$computer_vcpu = test_input($_POST["computer_vcpu"]);

	if(empty($_POST["computer_disk"]))
		{$Err = "ERROR: Your server needs disk space";}
	else
		$computer_hostname = test_input($_POST["computer_disk"]);

	if(empty($_POST["computer_user"]))
		{$Err = "ERROR: You need to have a username on the server";}
	else
		$computer_user = test_input($_POST["computer_user"]);
		
	if(empty($_POST["computer_password"]))
		{$Err = "ERROR: Your user needs a password";}
	else
		$computer_password = test_input($_POST["computer_password"]);
		
	if(empty($_POST["computer_time"]))
		{$Err = "ERROR: We need to know how long you need this server";}
	else
		$computer_time = test_input($_POST["computer_time"]);

}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<TABLE bgcolor="#FFFFFF" border="2">
<TR><TH>Server Information Required
<TD><font color="#990033">
<?php
if ($Err)
                echo $Err;
?>
</font>

<TR><TD>What operating system do you need?
<TD><select name="computer_type">
	<option value="">Select...</option>
		<option value="windows"<?php if ($_POST['computer_type']=='windows') echo 'selected="selected"';?>>Windows</option>
	<option value="linux">Linux (Ubuntu)</option>
</select>

<TR><TD>How much memory do you need?
<TD><select name="computer_mem">
	<option value="1"<?php if ($_POST['computer_mem']==1) echo 'selected="selected"';?>>1 Gigabyte</option>
	<option value="2"<?php if ($_POST['computer_mem']==2) echo 'selected="selected"';?>>2 Gigabytes</option>
	<option value="4"<?php if ($_POST['computer_mem']==4) echo 'selected="selected"';?>>4 Gigabytes</option>
</select>


<TR><TD>How much disk space do you need?
<TD><select name="computer_disk">
        <option value="10">10 Gigabyte</option>
        <option value="20">20 Gigabytes</option>
        <option value="40">40 Gigabytes</option>
</select>

<TR><TD>Number of virtual CPUs:
<TD><input type="radio" name="computer_vcpu" value="1">One
<input type="radio" name="vcpu" value="2">Two
<input type="radio" name="vcpu" value="4">Four


<TR><TD>

<TR><TD>Server Name:
<TD><input type="text" name="computer_hostname" size="20">

<TR><TD>System Username:
<TD><input type="text" name="computer_user" size="20">

<TR><TD>Password:
<TD><input type="password" name="computer_password"size="20">

<TR>

<TR><TH>Security Requirements
<TD><input type="checkbox" name="pci" value="pci">PCI
<input type="checkbox" name="hippa" value="hippa">HIPPA

<TR>
<TR><TH>Projected Server Longevity
<TD><input type="radio" name="computer_time" value="30">30 Days
<input type="radio" name="computer_time" value="90">90 Days
<input type="radio" name="computer_time" value="180">180 Days
<input type="radio" name="computer_time" value="0">Indefinate


</table>

<input type="submit" value="Submit Information" />
</form>

