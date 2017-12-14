<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$default = new cdefault();
$Page =& $default;

// Page init processing
$default->Page_Init();

// Page main processing
$default->Page_Main();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>VĂN PHÒNG HỖ TRỢ SINH VIÊN</title>
<link rel="stylesheet" type="text/css" href="styles/container.css">
<link rel="stylesheet" type="text/css" href="styles/dongthap.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="Text/Javascript" language="JavaScript">
<!--

if (window.top != window)
{
  window.top.location.href = document.location.href;
}

//-->
</script>
<?php if ($Security->IsLoggedIn()) { ?>
<?php if (CurrentUserLevel()==4 )
{
    Header ("Location: mess.php?mess=4");
    exit;
}   ?>
<?php if (CurrentUserLevel()==5 )
{
    Header ("Location: mess.php?mess=5");
    exit;
}   ?>
<frameset rows="106,*" framespacing="0" border="0">
   <frame src="top.php" id="header-frame" name="header-frame" frameborder="no" scrolling="no">
  <frameset cols="220, 10, *" framespacing="0" border="0" id="frame-body">
    <frame src="ew_menu.php" id="menu-frame" name="menu-frame" frameborder="no" scrolling="yes">
    <frame src="drag.php" id="drag-frame" name="drag-frame" frameborder="no" scrolling="no">
    <frame src="background.php" id="main-frame" name="main-frame" frameborder="no" scrolling="yes">
  </frameset>
</frameset>
<?php } else {
 Header ("Location: login.php");
    exit;
 } ?>
</head>
<body class="yui-skin-sam">
<script type="text/javascript" src="../js/utilities.js"></script>
<script type="text/javascript" src="../js/container-min.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
<!--
var EW_DATE_SEPARATOR = "/";
if (EW_DATE_SEPARATOR == "") EW_DATE_SEPARATOR = "/"; // Default date separator
var EW_UPLOAD_ALLOWED_FILE_EXT = "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip,swf"; // Allowed upload file extension
var EW_FIELD_SEP = ", "; // Default field separator

// Ajax settings
var EW_RECORD_DELIMITER = "\r";
var EW_FIELD_DELIMITER = "|";
var EW_LOOKUP_FILE_NAME = "ewlookup6.php"; // lookup file name

//var EW_ADD_OPTION_FILE_NAME = ""; // add option file name
var EW_BUTTON_SUBMIT_TEXT = "    Add    ";
var EW_BUTTON_CANCEL_TEXT = "  Cancel  ";

//-->
</script>
<script type="text/javascript" src="../js/skypeCheck.js"></script>
<script type="text/javascript" src="js/ewp6.js"></script>
<script type="text/javascript" src="js/userfn6.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js");
//-->

</script>
</html>



<?php

//
// Page Class
//
class cdefault {

	// Page ID
	var $PageID = 'default';

	// Page Object Name
	var $PageObjName = 'default';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show Message
	function ShowMessage() {
		if ($this->getMessage() <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate Page request
	function IsPageRequest() {
		return TRUE;
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cdefault() {
		global $conn;

		// Initialize user table object
		$GLOBALS["user"] = new cuser;

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'default', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user;
		global $Security;
		$Security = new cAdvancedSecurity();

		// Global page loading event (in userfn6.php)
		Page_Loading();

		// Page load event, used in current page
		$this->Page_Load();
	}

	//
	//  Page_Terminate
	//  - called when exit page
	//  - if URL specified, redirect to the URL
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page unload event, used in current page
		$this->Page_Unload();

		// Global page unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close Connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			ob_end_clean();
			header("Location: $url");
		}
		exit();
	}

	// Page main processing
	function Page_Main() {
		global $Security;
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		$Security->LoadUserLevel(); // load User Level
		
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}
}
?>

