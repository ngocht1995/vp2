<?php
$handle = fopen("tbl_miengiamhocphiview.php","r");
$contents = '';
while (!feof($handle)) {
    $str = fread($handle, 8192);
    $str = str_replace('src="../../../','src="http://10.1.0.170/htsvtt/images/img_logo.png',$str);
    $contents .= $str;
}  
 
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=WeeklyBulletin.doc"); 
//echo $contents;
?>
<?php echo $_REQUEST['datatodisplay']; ?>