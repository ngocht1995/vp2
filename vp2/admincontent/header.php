<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>VĂN PHÒNG HỖ TRỢ SINH VIÊN</title>
<link rel="stylesheet" type="text/css" href="styles/container.css">
<link rel="stylesheet" type="text/css" href="styles/dongthap.css">
<link rel="icon" type="text/css" href="../images/common/img_logo.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="generator" content="PHPMaker v6.1.0.0">

</head>
<body class="yui-skin-sam">
 <div>
<script type="text/javascript" src="../js/utilities.js"></script>
<script type="text/javascript" src="../js/container-min.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="styles/jquery-ui.css" type="text/css" />
    <script language="javascript">
        function printform(divid) {
        var printContent = document.getElementById(divid);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();
        var printWindow = window.open(windowUrl, windowName, 'left=0;top=0,width=0,height=0,toolbar=0,scrollbars=1,status=0,location=0');

        printWindow.document.write(printContent.innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        }
   </script>

       
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
<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering

$sessionid=session_id();

//echo $sessionid;
//include "../include/call_email.php"
?>
<div class="ewLayout">
		
	<!-- header (begin) --><!-- *** Note: Only licensed users are allowed to change the logo *** -->
	<!-- header (end) -->
	<!-- content (begin) -->   
  <div>
      <table cellspacing="0" class="ewContentTable" style="padding-left: 10px;" >
<tr>
	    <td class="ewContentColumn" >
			<!-- right column (begin) -->
				<p class="phpmaker"><b></b></p>
