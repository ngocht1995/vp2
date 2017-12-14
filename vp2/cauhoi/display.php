<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
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



 <?php include "../include/header.php" ?>

    <div id="mainWap">
      <?php include ("../include/top_header.php");?>		
      <div id="center">
         <?php include ("../include/menu_navi.php");?>

			<div id="noidung">
                            <div id="left">
                                <h1>DANH MỤC FAQ</h1>
				<ul>
                                     
                                     <?php 
                                                             $conn = ew_Connect();
                                   
                                                              $sSqlWrk = "Select * From `t_cat_question` Order by position";
                                                                // echo $sSqlWrk;
                                                            $rswrk = $conn->Execute($sSqlWrk);
                                                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                            if ($rswrk) $rswrk->Close();
                                                            $rowswrk = count($arwrk);
                                                            //echo $rowswrk;
                                                            //echo $arwrk[0]['name'];
                                                            if($rowswrk <>0)
                                                            { 
                                                                for($i =0; $i < $rowswrk;$i++)
                                                                {
                                                            ?>
                                    <li><a href="faqcat.php?idcag=<?php echo $arwrk[$i]['cat_question_id'];?>"><?php echo $arwrk[$i]['name']; ?></a></li>
								
								
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                    <li class="last"></li>
			   </ul>
                                <!-- end left -->
                            </div>
                             <!-- right -->
                             <div id="right">
                                <ul class="dch"> <li class="maudon" >HỆ THỐNG ĐẶT CÂU HỎI</li></ul>
                                 <div id="content">
                                     <table  cellpadding="0" cellspacing="0" border="0" width="700px" class="cauhoi">
                                    <tr><td width="35%" class="cauhoiHeader" >Phản hồi</td><td  width="65%" class="cauhoiHeader">Đặt câu hỏi</td></tr>
                                    <tr><td  height="10px" colspan="2"></td></tr>
                                    <tr><td  colspan="2" align="center">
                                            <?php
                                          
                                                if($_SESSION['number'] ==-1)
                                                {
                                          
                                                if($_SESSION['ID'] <>"")
                                                {
                                                    $thoi_gian_het_han_session = (60*1); //=== 5 PHÚT
                                                    $now = strtotime(date("YmdHis"));
                                                    if($_SESSION['time'] =="")
                                                     $_SESSION['time'] = $now + $thoi_gian_het_han_session;
                                                 if (($now - $_SESSION['time']) >= $thoi_gian_het_han_session){
                                                    echo 'Hết thời hạn hiển thị!';
                                                    $_SESSION['ID'] = "";
                                                    
                                                }else{
                                                   
                                                    echo "Bạn đã gửi câu hỏi thành công! <br>";
                                                    echo "Mã câu hỏi của bạn là: <samp class='code' >". $_SESSION['ID'] ."</spam>";
                                                    echo "<br><br> Xin Các bạn hãy nhớ mã câu hỏi trên để tra cứu câu trả lời!";
                                                    echo "<br> Trong trường hợp bạn quên mã câu hỏi, nếu bạn nhập mail bạn có thể vào mail của bạn để kiểm tra!";
                                                    echo "<br> Bạn sẽ nhận được phản hổi muộn nhất sau <b> 2 ngày làm việc </b>";
                                                   
                                                }                                                
                                                }else{
                                                     echo 'Xin gửi câu hỏi để lấy mã câu hỏi!';
                                                }
                                                }
                                                else
                                                {
                                                    echo "<br> Bạn đã gửi câu hỏi thành công!";
                                                }
                                            ?>
                                            
                                    </td></tr>
                                 </table>
                                     
                                      <!-- end content --> 
                                 </div>
                               

<?php include ("../include/footer.php");?>