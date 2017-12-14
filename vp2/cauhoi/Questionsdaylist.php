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
 <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
 <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
 <head><a href="http://vp1.hpu.edu.vn" style="color:black">
              <button type="button" class="btn btn-info">
        <<< Trở về trang chủ
    </button></a>
         </head>
<body style="background-image: url('../images/background7.jpg')">
    <div id="mainWap">
      <?php //include ("../include/top_header.php");?>        
      <div id="center">
         <?php// include ("../include/menu_navi.php");?>

            <div id="noidung">
                            
                             <!-- right -->
                             <div id="right">
                                 <h1 style="text-align: center">CÂU HỎI TRONG NGÀY</h1><br><br><br>
                                 <?php
                                                    include 'pagding.php';
                                        $conn = ew_Connect();
                                        
                                        $p = KillChars(htmlspecialchars($_GET['p']),ENT_QUOTES);// currentPage
                                        $rows = 10; // số record trên mỗi trang
                                        $div = 5; // số trang trên 1 phân đoạn

                                        $sql = "SELECT COUNT(*) AS total FROM `t_question` WHERE Status = 1 AND  IDcard <> 'FAQ'  AND s_public = 1 ORDER By Datetime_h  DESC ";
                                        // $sql = "Select * From `t_cat_question`";
                                                                // echo $sSqlWrk;
                                                            $rswrk = $conn->Execute($sql);
                                                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                            if ($rswrk) $rswrk->Close();
                                                            $rowswrk = count($arwrk);
                                                            $total = $arwrk[0][0];
                                        //fetch dữ liệu lấy giá trị của total, tổng số record với điều kiện là <dieu_kien>, ta được biến $total;

                                        //l  $start = $p*$rows;ấy dữ liệu cho trang $p ($page -1)  * 10 ;
                                       // $start = $p*$rows;
                                      
 
                                        $start =  $p*$rows;
                                        $sql = "SELECT * FROM `t_question` WHERE Status = 1 AND IDcard <> 'FAQ'   AND s_public = 1 ORDER BY Datetime_h DESC LIMIT  $start,$rows";
                                        //echo $sql;
                                        $rswrk = $conn->Execute($sql);
                                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                        if ($rswrk) $rswrk->Close();
                                        $rowswrk = count($arwrk);
                                        // hiển thị dữ liệu
                                       //echo $rowswrk;
                                    ?>  
                                 <div id="content">
                                     <style type="text/css">.cauhoi{margin:0 auto}</style>
                                     <table  cellpadding="0" cellspacing="0" border="0" class="cauhoi">
                                    <tr><td   align="left">
                                         
                                                            <?php
                                                               for($i=0;$i<$rowswrk;$i++)
                                                               {
                                                               
                                                                $num = $arwrk[$i]['s_number'];
                                                                $ID =$arwrk[$i]['question_id'];
                                                                $IDCard =$arwrk[$i]['IDcard'];
                                                                $datetime  = new Datetime($arwrk[$i]['datetime_h']);
                                                                //  $moth =  date ( " m ", $datetime );
                                                                $moth =  $datetime->format ( "m");
                                                                //$date = date ( " d ", $datetime ); 
                                                                $date = $datetime->format ( "d");
                                                                //$year =  date( " Y ", $datetime ); 
                                                                $year =  $datetime->format ( "Y");
                                                                $hour =  $datetime->format ( "H"); 
                                                                $min =$datetime->format ( "i");
                                                                $content = " ";
                                                              //  echo  date_format( $datetime, 'Y-m-d H:i:s');
                                                               // echo $datetime ;
                                                            switch ($num) {
                                                            case 0:
                                                            $content = $arwrk[$i]['content'];
                                                            break;
                                                            case 1:
                                                           $content = $arwrk[$i]['content'];
                                                            break;
                                                            case 2:
                                                           $content = $arwrk[$i]['content1'];
                                                            break;
                                                             case 3:
                                                          $content = $arwrk[$i]['content2'];
                                                            break;
                                                            }
                                                             $content1 = $content ; 
                                                            if(strlen($content)>250)
                                                            $content = ew_TruncateMemo($content,250,true)."...";
                                                            ?>
                                                                <a style="font-weight: bold" title="<?php echo $content1;?>" href="../cauhoi/Questionsday.php?ID=<?php echo $ID; ?>">-<?php echo $content; ?>&nbsp; <span style="font-style: italic;color:#fc9603;  "><?php //echo $hour. "h" . $min . " ".  $date . "/" .$moth . "/".$year ; ?></span></a><br><br>
                                                                
                            <?php 
                                                            }
                                                        ?>  
                            
                            
                                    </td></tr>
                                      <tr><td>
                                              
                            <ul class="trang" style="text-align: center">
                                                            <?php // in phân trang
                                                              echo divPage($total,$p,$div,$rows);
                                                              //echo "o";
                                                            ?>
                            </ul>
                                            
                                                 </td></tr>
                                 </table>
                                     
                                      <!-- end content --> 
                                 </div>
                               

<?php //include ("../include/footer.php");?>