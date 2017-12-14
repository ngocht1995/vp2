<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php include "securimage.php" ?>
<?php
require_once './export_php2world/PHPWord.php';
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('./export_php2world/template_don/Donthidiemcao.docx');
$document->setValue('Value1', 'Sun'); //ho ten sinh vien
$document->setValue('Value2', '11313'); // ma sinh vien
$document->setValue('Value3', 'Sun'); //ho ten sinh vien
$document->setValue('Value4', '11313'); // ma sinh vien
$document->setValue('Value5', 'Sun'); //ho ten sinh vien
$document->setValue('Value6', '11313'); // ma sinh vien
$document->setValue('Value7', 'Sun'); //ho ten sinh vien
$document->setValue('Value8', '11313'); // ma sinh vien
$document->setValue('Value9', 'Sun'); //ho ten sinh vien
$document->setValue('Value10', '11313'); // ma sinh vien
if (!is_dir("../upload/users/".CurrentUserID()."")){ mkdir("../upload/users/".CurrentUserID()."");}
if (!is_dir("../upload/users/".CurrentUserID()."/dontu")){ mkdir("../upload/users/".CurrentUserID()."/dontu");}
$filename= "../upload/users/".CurrentUserID()."/dontu/".CurrentUserID()."_Doncaithiendiem_MSV".$_SESSION['arraythongtin']['MaSinhVien'].".docx";
$document->save($filename);
?>
<a href="../admincontent/a1.docx">Download</a>