<html>
<body  background="pics/cloud.jpg">
<center>
<IMG SRC="pics/asu.jpg" ALT="Arizona State University" >

<p>
<p>
<TABLE align="center" bgcolor="#990033" border="3"  BORDERCOLOR="#990033">
<TR><TD align="center" style="font-size: 24px"><font color="#FFB310">Welcome to the ASU Cloud Services Portal</font>
</table>
<p>

<?php
// define variables and set to empty values
$computer_type = $computer_vcpu = $computer_hostname = $computer_user = $computer_password = $computer_time = "";
$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST["username"]))
		{$Err = "ERROR: A username is required";}
	else
		$username = test_input($_POST["username"]);
	
	if(empty($_POST["password"]))
		{$Err = "ERROR: A password is required";}
	else
		$password = test_input($_POST["password"]);


	if ($Err == "") {
		if (($_POST["username"]) == "engineer") {
			echo 'Thank you for logging in.';
			header("Location: actions-eng.php");
			}
		if (($_POST["username"]) == "nurse") {
			echo 'Thank you for logging in.';
			header("Location: actions-nurse.php");
			}
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
<TR><TH>Please login
<TD><font color="#990033">

<?php
	if ($Err != "")
                echo $Err;
?>
</font>


<TR><TD>User Name:
<TD><input type="text" name="username" size="20" value="<?php echo htmlspecialchars($_POST['username']); ?>">

<TR><TD>Password:
<TD><input type="password" name="password"size="20" value="<?php echo htmlspecialchars($_POST['password']); ?>">

</table>

<input type="submit" value="Submit Information" />
</form>

