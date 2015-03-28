<html>
<body  background="pics/cloud.jpg">
<center>
<IMG SRC="pics/UVU_Wolverine.jpeg" ALT="Utah Valley University" height="211" width="299">

<p>
<p>
<TABLE align="center" bgcolor="#E6D15B" border="3"  BORDERCOLOR="#E6D15B">
<TR><TD align="center" style="font-size: 24px"><font color="#003F47">Welcome to the UVU Network Services Portal</font>
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
		if (($_POST["username"]) == "guest") {
			echo 'Thank you for logging in.';
			header("Location: actions-guest.php");
			}
		if (($_POST["username"]) == "admin") {
			echo 'Thank you for logging in.';
			header("Location: actions-admin.php");
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
<TABLE bgcolor="#FFFFFF" border="2" BORDERCOLOR="#003F47">
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

