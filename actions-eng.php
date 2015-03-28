<html>
<body background="pics/cloud_black.jpg" bgcolor="#000000">
<center>
<IMG SRC="pics/asu_eng.jpg" ALT="Ira A. Fulton shcool of engineering" >

<p>
<p>
<TABLE align="center" bgcolor="#990033" border="3"  BORDERCOLOR="#990033">
<TR><TD align="center" style="font-size: 24px"><font color="#FFB310">ASU Cloud Services Portal</font>
</table>
<p>

<TABLE align="center" bgcolor="#FFFFFF" border="1">
<TR><TH>Logged in as:
<TH><font color="#990033">engineer</font>
</table>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
</form>

<TABLE  width = 700 align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#990033">

<TR>
<TH></TH>
<TH scope="col" abbr="Action" align="center"><font color="#990033">Please select an action</font></TH>
<TR>
<TH scope="col" abbr="Catalog" align="center">Show all catalog items</TH>
<TH scope="col" abbr="Service" align="center">Show all service requests</TH>
<TH scope="col" abbr="New" align="center">Create a new server</TH>

<TR>
<TD align="center"><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit" name="catalog" value="Catalog">
</form>

<TD align="center"><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit" name="requests" value="Service Requests">
</form>

<TD align="center"><form action="http://phx2-lab-dcv-ucs-ubuntu12-04.cisco.com/index-eng.php"><input type="submit" value="Create Server">
</form>
</table>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["catalog"])) {
		$my_command = "/usr/bin/python actions.py Engineering GetCatalogs";
		$output = shell_exec($my_command);
		echo "<p>$output<p>";
		}

	if (isset($_POST["requests"])) {
		$my_command = "/usr/bin/python actions.py Engineering GetRequests";
		$output = shell_exec($my_command);
		echo "<p>$output<p>";
		}
	}
?>