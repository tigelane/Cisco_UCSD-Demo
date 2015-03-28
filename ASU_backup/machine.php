<center>
<h1>
You have selected:
</h1>
<h2>

Computer Type: <?php echo htmlspecialchars($_POST['computer_type']); ?>
<p>
Amount of Memory:  <?php echo (int)$_POST['computer_mem']; ?>
<p>
Size of Hard Drive:  <?php echo (int)$_POST['computer_disk']; ?>
<p>
VCPU:  <?php echo (int)$_POST['vcpu']; ?>
<p>
Server Name:  <?php echo htmlspecialchars($_POST['computer_hostname']); ?>
<p>
User Name:  <?php echo htmlspecialchars($_POST['computer_user']); ?>
<p>
User Password:  <?php echo htmlspecialchars($_POST['computer_password']); ?>
</h2>
</center>
