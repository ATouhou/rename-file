<!DOCTYPE html>
<html>
<head>
	<title>Rename file </title>
</head>
<body>
<?php
function rename_file($replace_name, $new_name, $file){
    $new_name = str_ireplace($replace_name, $new_name, $file);
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
    define('Path', '/rename-file/files/' ); //change path with your own
    $dir = '/rename-file/files/'; //change path with your own
    $files = scandir($dir);
    arsort($files);
    foreach ($files as $file) {
				
			$new_name = md5_file(Path . $file);
            $path_info = pathinfo(Path . $file);
            $replace_name = $path_info['filename'];    
        ?>
          <tr>
                <td align="left"><?php print $file;  ?></td>             
               <td align="left"><?php print rename_file($replace_name , $new_name, $file) ?></td> 
              </tr>
    <?php }


?>
</table>
</body>
</html>