<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php
$result =$_SESSION['title']."_MSV_".(string)$_SESSION['arraythongtin']['MaSinhVien'];
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename=' .$result. '.xls');
// Fix for crappy IE bug in download.
header("Pragma: ");
header("Cache-Control: ");
?>

<?php ?>

<?php echo $_REQUEST['datatodisplay1']; ?>

 