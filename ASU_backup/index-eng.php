<html>
<center>
<body background="pics/asu_background.jpg">
<h3>

<form action="machine.php" method="post">
<fieldset>
<legend>Server Information Required</legend>
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
<p>
Server Name:<input type="text" name="computer_hostname" size="20">
<p>
System Username: <input type="text" name="computer_user" size="20">
<p>
Password: <input type="password" name="computer_password"size="20">

 <p><input type="submit" /></p>

</fieldset>
</form>

</center>

<hr>
<form action="machine.php" method="post">
<br>
<TABLE bgcolor="#FFFFFF" border="2">
<TR><TH>Server Information Required

<TR><TD>What type of computer would you like to build?
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


</TABLE>


<hr>


<FORM METHOD="POST" ACTION="http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi">
<TABLE BORDER="1">
  <TR>
    <TD>Your name</TD>
    <TD>
      <INPUT TYPE="TEXT" NAME="name" SIZE="20">
    </TD>
  </TR>
  <TR>
    <TD>Your E-mail address</TD>
    <TD><INPUT TYPE="TEXT" NAME="email" SIZE="25"></TD>
  </TR>
</TABLE>
<P><INPUT TYPE="SUBMIT" VALUE="Submit" NAME="B1"></P>
</FORM>


<hr>

