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
<div id="header"> <span><img src="../images/img_logo.png" height="68px"/></span>
          <ul class="logo">
            <li >Văn phòng</li>
            <li class="last">Hỗ trợ sinh viên</li>
          </ul>
        <ul class="search">
          <form action="" method="get">
            <li>
                <input name="txtSearch" class="search" type="text" />
              </li>
          </form>
        </ul>
		
      </div>
      <!-- End header -->
          <div class="quancaoleft"><a href="#"><img src="../images/quangcao.gif" /></a></div>  
        <!-- End left -->
		<hr />
        <div class="clr"></div>
		
      <div id="center">
            <div class="top">
                <h1>Chất lượng đào tạo là sự sống còn của nhà trường!</h1>
                <ul>
                <li><a href="#">Đăng nhập</a></li> | <li><a href="#">Đăng ký</a></li></ul>
            </div>
         <?php include ("../include/menu_navi.php");?>
          <samp><img  width="906px" src="../images/bgr_07.gif"  /></samp>
			<span class="span1">Cam kết giải đáp thắc mắc trong vòng <span class="style2">48h</span></span>
			<div class="clr"></div>
			<div id="noidung">
                            <div id="left">
                                <h1>MENU</h1>
                                <ul>
                                    <li class="fist"><a href="#">Mẫu đơn xác nhận</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Phụ huynh</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li ><a href="#">Khiếu lại</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>              
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li class="last"></li>
                                </ul>
                                <!-- end left -->
                            </div>
                             <!-- right -->
                             <div id="right">
                                
                                 <div id="content">
                                    <?php
                                        function divPage($total = 0,$currentPage = 0,$div = 5,$rows = 10){
                                            if(!$total || !$rows || !$div || $total<=$rows) return false;
                                            $nPage = floor($total/$rows) + (($total%$rows)?1:0);
                                            $nDiv = floor($nPage/$div) + (($nPage%$div)?1:0);
                                            $currentDiv = floor($currentPage/$div) ;
                                            $sPage = '';
                                            if($currentDiv) {
                                            $sPage .= '<li><a href="?p=0"><<</a></li> ';
                                            $sPage .= '<li><a href="?p='.($currentDiv*$div - 1).'"><</a></li> ';
                                            }
                                            $count =($nPage<=($currentDiv+1)*$div)?($nPage-$currentDiv*$div):$div;
                                            for($i=0;$i<$count;$i++){
                                            $page = ($currentDiv*$div + $i);
                                            $sPage .= '<li><a href="?p='.($currentDiv*$div + $i ).'" '.(($page==$currentPage)?'class="current"':'').'>'.($page+1).'</a></li> ';
                                            }
                                            if($currentDiv < $nDiv - 1){

                                            $sPage .= '<li><a href="?p='.(($currentDiv+1)*$div + 1 ).'">></a></li> ';
                                            $sPage .= '<li><a href="?p='.(($nDiv-1)*$div + 1 ).'">>></a></li>';
                                            }

                                            return $sPage;
                                        }
                                        
                                        $conn = ew_Connect();
                                        
                                        $p = $_GET['p'];// currentPage
                                        $rows = 5; // số record trên mỗi trang
                                        $div = 5; // số trang trên 1 phân đoạn

                                        $sql = "SELECT COUNT(*) AS total FROM `t_question` ORDER By Datetime_h  DESC ";
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
                                        $sql = "SELECT * FROM `t_question` ORDER BY Datetime_h DESC LIMIT  $start,$rows";
                                        echo $sql;
                                        $rswrk = $conn->Execute($sql);
                                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                        if ($rswrk) $rswrk->Close();
                                        $rowswrk = count($arwrk);
                                        // hiển thị dữ liệu
                                       //echo $rowswrk;
                                    ?>
                                    <table  cellpadding="0" cellspacing="0" border="0" width="630px" class="trangchu">
						<tr><td width="350px" class="TrangchuHeader" align="center" >CÂU HỎI TRONG NGÀY</td><td  width="270px" class="TrangchuHeader" align="center">THÔNG BÁO</td></tr>
						<tr><td colspan="2" height="10px"></td></tr>
						<tr>
							<td align="left"  width="350px" class="trangchu" >
							<ul class="trangchu">
                                                            <?php
                                                               for($i=0;$i<$rowswrk;$i++)
                                                               {
                                                               
                                                                $num = $arwrk[$i]['s_number'];
                                                                $ID =$arwrk[$i]['question_id'];
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

                                                            ?>
								<li><?php echo $content; ?></li>
                                                                <p class="trang"><?php echo $hour. "h" . $min . " ".  $date . "/" .$moth . "/".$year ; ?>&nbsp;<a href="#">Xem tiếp</a></p>
                                                                
							<?php 
                                                            }
                                                        ?>	
							</ul>
							
							<ul class="trang">
                                                            <?php // in phân trang
                                                              echo divPage($total,$p,$div,$rows);
                                                              //echo "o";
                                                            ?>
							</ul>
						
							</td>
							<td valign="top" width="280px">
    <script type="text/javascript">
            marqueeInit({
            uniqueid: 'mycrawler',
            style: {
            'padding': '5px',
            'width': '834px',
            'height': '195px',
            'background': 'lightyellow',
            'border': '1px solid #CC3300'
            },
            inc: 1, //speed - pixel increment for each iteration of this marquee's movement
            mouse: 'pause', //mouseover behavior ('pause' 'cursor driven' or false)
            addDelay: 20
            });
    </script>
    <div class="marquee" id="mycrawler">
<div class="image-box"><div class="image-image"><img src="test-image-1.jpg" /></div><div class="image-text">Image 1 Text</div></div><div class="image-box"><div class="image-image"><img src="test-image-2.jpg" /></div><div class="image-text">Image 2 Text</div></div><div class="image-box"><div class="image-image"><img src="test-image-3.jpg" /></div><div class="image-text">Image 3 Text</div></div>
</div>
							<table cellpadding="0" cellspacing="0" width="280px"  class="lichhoc">
								<tr><td height="30px" valign="middle"><a href="#">Lịch học tháng 12 năm 2012 quản trị mạng</a></td></tr>
								<tr><td height="30px" valign="middle"><a href="#">Lịch học tháng 12 năm 2012</a></td></tr>	
								<tr><td height="30px" valign="middle"><a href="#">Lịch học tháng 12 năm 2012</a></td></tr>
								<tr><td height="30px" valign="middle"><a href="#">Lịch học tháng 12 năm 2012</a></td></tr>
							</table>
							</td>
						</tr>
						
					</table>
                                      <!-- end content --> 
                                 </div>
                               
                             
<?php include ("../include/footer.php");?>