<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
$text="";
$text=$_GET['text'];
			$conn = ew_Connect();
			$sSqlWrk = " Select anh_logo,kieu_anh,lienket_id From advertising Where kieu_anh = 'swf' and lienket_id='".$text."'";
			$rswrk = $conn->Execute($sSqlWrk);
			
			if (!$rswrk->EOF){
				echo $rswrk->fields['anh_logo'];
						}
			exit();

?>
