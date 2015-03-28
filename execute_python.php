<?php
if(isset($_POST['submit1'])) {
$hi = exec('acitoolkit/samples/aci-show-tenants.py > foo.txt 2>&1');
print "In submit 1";
echo "<pre>$hi</pre>";
$filedata = file_get_contents("./foo.txt");
echo "<pre>$filedata</pre>";
}
