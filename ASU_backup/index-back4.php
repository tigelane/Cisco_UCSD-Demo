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

<form action="machine.php" method="post">
<TABLE bgcolor="#FFFFFF" border="2">
<TR><TH>Server Information Required

<TR><TD>What operating system do you need?
<TD><select name="computer_type">
	<option value="">Select...</option>
	<option value="windows">Windows</option>
	<option value="linux">Linux (Ubuntu)</option>
</select>

<TR><TD>How much memory do you need?
<TD><select name="computer_mem">
	<option value="1">1 Gigabyte</option>
	<option value="2">2 Gigabytes</option>
	<option value="4">4 Gigabytes</option>
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
<TD><input type="radio" name="time" value="30">30 Days
<input type="radio" name="time" value="90">90 Days
<input type="radio" name="time" value="180">180 Days
<input type="radio" name="time" value="Indefinate">Indefinate


</table>

<input type="submit" value="Submit Information" />
</form>
