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
 <?php $style_code="thongbao" ?>
<?php include ("../include/header.php");?>
<div id="mainWap">
    <?php //include ("../include/top_header.php");?>	
      <div id="center">
     <?php// include ("../include/menu_navi.php");?>
		  
			<div class="clr"></div>
			<div id="noidung">
			 <div id="left">
			  <?php //include ("../include/list_notice.php");?>	
		          </div>
			 <div id="right">
			  <div id="content" >
                            <?php 
                            $conn = ew_Connect();
                            $noitce_id = KillChars(htmlspecialchars($_GET["notice_id"],ENT_QUOTES));
                            $categories_id =  KillChars(htmlspecialchars($_GET["categories_id"],ENT_QUOTES));
                            $belongto = KillChars(htmlspecialchars($_GET["belongto"],ENT_QUOTES));
                            $sSqlWrk = "SELECT  * FROM `intro_article` WHERE  baiviet_id = " . $noitce_id ;
                            //echo $sSqlWrk;
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            $date_begin = date_create($arwrk[0]['begin_date']);
                            $date_end = date_create($arwrk[0]['end_date']);
                      
                            ?> 
                              <h2 class="h2tieudecol1"> THÔNG BÁO </h2>
                              <div class="div_trolai">
                                  <a href="#" onclick="window.history.back()"> <img src="../images/common/cmd_trove.gif" alt="Văn phòng hỗ trợ sinh viên - Support Online"> </a>
                              </div>
                              <h3 class="tieudethongbao"><?php echo $arwrk[0]['tieude_baiviet']?> </h3>	
                              <span id="spanthoigian_detail">Văn phòng hỗ trợ trực tuyến: <?php echo date_format($date_begin, 'd/m/Y') ?> - <?php echo date_format($date_end, 'd/m/Y') ?></span>
                              <div class="tomtat_baiviet" style="color: black;padding:10px 10px 10px 10px;">
                                  <?php echo  ($arwrk[0]['tomtat_baiviet' ]<> '') ? $arwrk[0]['tomtat_baiviet']: "";?>   
                              </div>
                              <div class="noidung_baiviet" style="color: black;padding:20px 10px 10px 10px">
                                 <?php echo  ($arwrk[0]['noidung_baiviet' ]<> '') ? $arwrk[0]['noidung_baiviet']: "";?>
                              </div>
                              <div class="lienket_baiviet">
                                  <a target="_blank" href="<?php echo $arwrk[0]['lienket_baiviet' ] ?>" title=" <?php $arwrk[0]['lienket_baiviet' ] ?>" >   <?php echo ($arwrk[0]['lienket_baiviet' ]<> '') ? '<b>Liên kết:</b>'.$arwrk[0]['lienket_baiviet']: "";?> </a>
                              </div>
                              <div class="nguon_baiviet">
                                 <?php echo ($arwrk[0]['nguon_baiviet' ]<> '') ? '<b>Nguồn bài viết:</b>'.$arwrk[0]['nguon_baiviet']: "";?>
                              </div>
                              <div class="file_dinhkem" >
                                  <?php 
                                    $Sql = "SELECT  * FROM `file_attach_article` WHERE  file_attach_article.baiviet_id = " . $noitce_id ;
                                   // echo $sSqlWrk;
                                    $rsw = $conn->Execute($Sql);
                                    $ar = ($rsw) ? $rsw->GetRows() : array();
                                    if ($rsw) $rsw->Close();
                                    $rows = count($ar);
                                    if ($rows > 0)
                                    {   
                                     ?>
                                  <dl>
                                    <dt>file đính kèm:</dt>
                                      <?php 
                                        for ($j=0;$j<$rows;$j++)
                                          {
                                       ?>
                                    <dd class="ddfiledinhkem"><a href="../admincontent/attach/<?php echo $ar[$j]['file_fullname'] ?>"> <?php echo $ar[$j]['file_name']?></a></dd>
                                       <?php }?>
                                  
                                  <?php  }?>
                                      </dl> 
                              </div>
                              <div class="cactinlienquan">
                                   <?php include ("notice_related.php");?>
                              </div>
		         </div>
<div class="clr"></div>	

