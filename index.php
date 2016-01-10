<!DOCTYPE html>
<html>
<head>
	<title>Rename file </title>
</head>
<body>
<?php

function rename_file($file){
    $new_name = str_ireplace('101554_', '', $file);

    if($file != '.' && $file != '..'){
        if(rename ( Path . $file, Path . $new_name)){
            return $new_name;
        } else {
            return 'Problem To Rename File: ' . $file;
        }
    }
    return $new_name;
}
?>

<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>Real Name</th>
    <th>New Name</th>
  </tr>
<?php
    define('Path', 'F:/Tutorials/Node/' );
    $dir = 'F:/Tutorials/Node/';
    $files = scandir($dir);
    arsort($files);
    foreach ($files as $file) {
        ?>
              <tr>
                <td align="left"><?php print $file;  ?></td>
                <td align="left"><?php print rename_file($file) ?></td>
              </tr>
    <?php }
?>
</table>
</body>
</html>