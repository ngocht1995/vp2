<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
<?php include "intro_articleinfo.php" ?>
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
<?php include ("../include/header.php");?>
<div id="mainWap">
    <?php include ("../include/top_header.php");?>	
      <div id="center">
     <?php include ("../include/menu_navi.php");?>
		  
			<div class="clr"></div>
			<div id="noidung">
                            <style>
div.block_contenthotro
{
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px; 
    background:#e5eff8;
    padding: 10px;
    box-shadow: 5px 5px 5px #666;
    -moz-box-shadow: 5px 5px 5px #666;
    -webkit-box-shadow: 5px 5px 5px #666;
    margin: 20px 20px 10px 20px;
    
}
                                
  </style>
  <?php
$sSqlWrk1 = "Select ho_ten,dien_thoai,email,nick_yahoo,nick_skype from help_manager  limit 2";
$rswrk1 = $conn->Execute($sSqlWrk1);
$arwrk1 = ($rswrk1) ? $rswrk1->GetRows() : array();
if ($rswrk1) $rswrk1->Close();
?>
<h2 class="h2tieude" style="margin-left:3px;" >THÔNG TIN HỖ TRỢ</h2>
<div class="block_contenthotro clearfix">
    <table  style="background: url('../images/common/sologon.png') no-repeat;background-position:right 0px;width:650px;">
         <?php if ($arwrk1[0][3] <> "") { ?>
        <tr> 	
            <td class="supporttd1" width="30px;">
                <a href="ymsgr:sendIM?<?php echo $arwrk1[0][3];?>"><img src="../images/common/img_iconyahoo.gif" alt="Yahoo Messenger Icons" width=30 HEIGHT=30 border="0" border="0" /></a>
            </td>
            <td class="supporttd2"><a class="asupport" href="ymsgr:sendIM?<?php echo $arwrk1[0][3];?>"><?php echo $arwrk1[0]['nick_yahoo'] ?></a></td>
        </tr>
          <?php } ?>

        <?php if ($arwrk1[0][4] <> "") { ?>
        <tr>
            <td class="supporttd1"> 
             <a href="skype:<?php echo $arwrk1[0][4];?>?call" onclick="return skypeCheck();"><img src="../images/common/img_iconskype.gif" style="border: none;" WIDTH=30 HEIGHT=30  alt="Skype Me™!" /></a>
            </td>
            <td class="supporttd2"><a class="asupport" href="skype:<?php echo $arwrk1[0][4];?>?call" onclick="return skypeCheck();"><?php echo $arwrk1[0]['nick_skype'] ?></a></td>
        </tr>
          <?php } ?>
          <?php if ($arwrk1[0]['dien_thoai'] <> "") { ?>
        <tr>
            <td class="supporttd1"><a href="#"><img class="skpye" src="../images/common/img_icontel.gif" style="margin-left: 3px;"  WIDTH=30 HEIGHT=30 border="0"></a></td>
            <td class="supporttd2"><a class="asupport" href="#"><?php echo $arwrk1[0]['dien_thoai'] ?></a></td>
        </tr>
          <?php } ?>
          <?php if ($arwrk1[0]['email'] <> "") { ?>
        <tr>
            <td class="supporttd1"><a href="#"><img class="skpye" src="../images/common/img_mail.jpg" style="margin-left: 3px;"  WIDTH=30 HEIGHT=30 border="0"></a></td>
            <td class="supporttd2"><a class="asupport" href="#"><?php echo $arwrk1[0]['email'] ?></a></td>
        </tr>
          <?php } ?>
        
        <?php if ($arwrk1[0]['email'] <> "") { ?>
        <tr>
            <td class="supporttd1"><a target="_blank" href="http://www.facebook.com/hpu.edu.vn"><img class="skpye" src="../images/common/support.gif" style="margin-left: 3px;"  WIDTH=30 HEIGHT=30 border="0"></a></td>
            <td class="supporttd2"><a class="asupport" target="_blank" href="http://www.facebook.com/groups/SinhVienHPU/?ref=ts&fref=ts"><?php echo 'http://www.facebook.com/groups/SinhVienHPU'  ?></a></td>
        </tr>
          <?php } ?>

    </table>	
		        </div>
    </div>
<div class="clr"></div>	
 <?php include ("../include/footer.php");?>

