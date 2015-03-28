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
$err = "";

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

	if(empty($_POST["computer_hostname"]))
		{$Err = "ERROR: Your server needs a name";}
	else
		$computer_hostname = test_input($_POST["computer_hostname"]);

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

	if ($Err == "") {
		echo 'This was a clean run.  We need to create this server now!';
		exit;
		}
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
	if ($Err != "")
                echo $Err;
?>
</font>

<TR><TD>What operating system do you need?
<TD><select name="computer_type">
	<option value="">Select...</option>
	<option value="windows"<?php if ($_POST['computer_type']=='windows') echo 'selected="selected"';?>>Windows</option>
	<option value="linux"<?php if ($_POST['computer_type']=='linux') echo 'selected="selected"';?>>Linux (Ubuntu)</option>
</select>

<TR><TD>How much memory do you need?
<TD><select name="computer_mem">
	<option value="1"<?php if ($_POST['computer_mem']==1) echo 'selected="selected"';?>>1 Gigabyte</option>
	<option value="2"<?php if ($_POST['computer_mem']==2) echo 'selected="selected"';?>>2 Gigabytes</option>
	<option value="4"<?php if ($_POST['computer_mem']==4) echo 'selected="selected"';?>>4 Gigabytes</option>
</select>

<TR><TD>How much disk space do you need?
<TD><select name="computer_disk">
        <option value="10"<?php if ($_POST['computer_disk']==10) echo 'selected="selected"';?>>10 Gigabyte</option>
        <option value="20"<?php if ($_POST['computer_disk']==20) echo 'selected="selected"';?>>20 Gigabytes</option>
        <option value="40"<?php if ($_POST['computer_disk']==40) echo 'selected="selected"';?>>40 Gigabytes</option>
</select>

<TR><TD>Number of virtual CPUs:
<TD>
<input type="radio" name="computer_vcpu" value="1" <?php if ($_POST['computer_vcpu']==1) echo 'checked="checked"';?>>One
<input type="radio" name="computer_vcpu" value="2" <?php if ($_POST['computer_vcpu']==2) echo 'checked="checked"';?>>Two
<input type="radio" name="computer_vcpu" value="4" <?php if ($_POST['computer_vcpu']==4) echo 'checked="checked"';?>>Four


<TR><TD>

<TR><TD>Server Name:
<TD><input type="text" name="computer_hostname" size="20" value="<?php echo htmlspecialchars($_POST['computer_hostname']); ?>">

<TR><TD>System Username:
<TD><input type="text" name="computer_user" size="20" value="<?php echo htmlspecialchars($_POST['computer_user']); ?>">

<TR><TD>Password:
<TD><input type="password" name="computer_password"size="20" value="<?php echo htmlspecialchars($_POST['computer_password']); ?>">

<TR>

<TR><TH>Security Requirements
<TD><input type="checkbox" name="pci" value="1" <?php if ($_POST['pci']==1) echo 'checked="checked"';?>>PCI
<input type="checkbox" name="hippa" value="1" <?php if ($_POST['hippa']==1) echo 'checked="checked"';?>>HIPPA

<TR>
<TR><TH>Projected Server Longevity
<TD><input type="radio" name="computer_time" value="30" <?php if ($_POST['computer_time']==30) echo 'checked="checked"';?> >30 Days
<input type="radio" name="computer_time" value="90" <?php if ($_POST['computer_time']==90) echo 'checked="checked"';?> >90 Days
<input type="radio" name="computer_time" value="180" <?php if ($_POST['computer_time']==180) echo 'checked="checked"';?> >180 Days
<input type="radio" name="computer_time" value="1" <?php if ($_POST['computer_time']==1) echo 'checked="checked"';?> >Indefinate


</table>

<input type="submit" value="Submit Information" />
</form>



