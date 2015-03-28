<html>
<body background="pics/cloud_black.jpg" bgcolor="#000000">
<center>
<IMG SRC="pics/mystery_guest.jpg" ALT="Mystery Guest" >

<p>
<p>
<TABLE align="center" bgcolor="#E6D15B" border="3"  BORDERCOLOR="#E6D15B">
<TR><TD align="center" style="font-size: 24px"><font color="#003F47">UVU Network Services Portal</font>
</table>
<p>

<TABLE align="center" bgcolor="#FFFFFF" border="1">
<TR><TH>Logged in as:
<TH><font color="#003F47">Guest</font>
</table>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
</form>

<TABLE  width = 700 align="center" bgcolor="#FFFFFF" border="2" BORDERCOLOR="#003F47">

<TR>
<TH></TH>
<TH scope="col" abbr="Action" align="center"><font color="#003F47">Please select an action</font></TH>
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