<html>
<body background="pics/cloud_lblue.jpg"  bgcolor="#E6E6FA">
<center>
<IMG SRC="pics/asu_nurse.jpg" ALT="ASU College of Nursing" >

<p>
<p>
<TABLE align="center" bgcolor="#990033" border="3"  BORDERCOLOR="#990033">
<TR><TD align="center" style="font-size: 24px"><font color="#FFB310">ASU Cloud Services Portal</font>
</table>
<p>

<TABLE align="center" bgcolor="#FFFFFF" border="1">
<TR><TH>Logged in as:
<TH><font color="#990033">nurse</font>
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
		{$Err = "ERROR: You must select how powerfull you want the computer";}
	else
		$computer_vcpu = test_input($_POST["computer_vcpu"]);

	if(empty($_POST["computer_disk"]))
		{$Err = "ERROR: Your server needs hard drive space";}
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
				$hostname = $_POST["computer_hostname"];
		
		echo '<font color="#FFB310" style="font-size: 28px" ><p><p>';
		echo 'The system is starting to create your server.  Please standby<p>';
		
		$my_command = "/usr/bin/python create-vm.py ";
		$my_command .= $_POST["computer_type"] . " ";
		$my_command .= "engineer ";
		$my_command .= $_POST["computer_hostname"] . " ";
		$my_command .= $_POST["computer_vcpu"] . " ";
		$my_command .= $_POST["computer_mem"] . " ";
		$my_command .= "10 ";
		if ($_POST['pci']==1) {
			$my_command .= "1 ";
			}
		else {
			$my_command .= "0 ";
			}
		if ($_POST['hippa']==1) {
			$my_command .= "1 ";
			}
		else {
			$my_command .= "0 ";
			}
			
		$output = shell_exec($my_command);
		echo "<p>$output<p>";

		if(!$output){
			echo "<p>Python exec failed!";
			echo "<p>The following was executed with failure: $my_command";
            }
        else{
        	 // echo "<p>Successfully executed!";
        	}
        
        
        echo '</font>';
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
<TABLE bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033">
<TR><TH>Server Information Required
<TD><font color="#990033">

<?php
	if ($Err != "")
                echo $Err;
?>
</font>

<TR><TD>What operating system do you need?
<TD><select name="computer_type">
	<option value="windows"<?php if ($_POST['computer_type']=='windows') echo 'selected="selected"';?>>Windows</option>
</select>

<TR><TD>How much memory do you need?
<TD><select name="computer_mem">
	<option value="2"<?php if ($_POST['computer_mem']==2) echo 'selected="selected"';?>>Low</option>
	<option value="3"<?php if ($_POST['computer_mem']==3) echo 'selected="selected"';?>>Medium</option>
	<option value="4"<?php if ($_POST['computer_mem']==4) echo 'selected="selected"';?>>High</option>
</select>

<TR><TD>How much harddrive space do you need?
<TD><select name="computer_disk">
        <option value="10"<?php if ($_POST['computer_disk']==10) echo 'selected="selected"';?>>Simple Files</option>
        <option value="20"<?php if ($_POST['computer_disk']==20) echo 'selected="selected"';?>>Pictures and Videos</option>
        <option value="40"<?php if ($_POST['computer_disk']==40) echo 'selected="selected"';?>>Databases</option>
</select>

<TR><TD>How powerful do you need the computer to be:
<TD>
<input type="radio" name="computer_vcpu" value="1" <?php if ($_POST['computer_vcpu']==1) echo 'checked="checked"';?>>Low
<input type="radio" name="computer_vcpu" value="2" <?php if ($_POST['computer_vcpu']==2) echo 'checked="checked"';?>>High


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
<input type="checkbox" name="hippa" value="1" checked="checked">HIPPA

<TR>
<TR><TH>Projected Server Longevity
<TD><input type="radio" name="computer_time" value="30" <?php if ($_POST['computer_time']==30) echo 'checked="checked"';?> >30 Days
<input type="radio" name="computer_time" value="90" <?php if ($_POST['computer_time']==90) echo 'checked="checked"';?> >90 Days
<input type="radio" name="computer_time" value="180" <?php if ($_POST['computer_time']==180) echo 'checked="checked"';?> >180 Days
<input type="radio" name="computer_time" value="1" <?php if ($_POST['computer_time']==1) echo 'checked="checked"';?> >Indefinate


</table>

<input type="submit" value="Submit Information" />
</form>



