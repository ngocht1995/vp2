<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html  style="background-color:#2db0e2">
<head>
<title>VĂN PHÒNG HỖ TRỢ TRỰC TUYẾN ĐẠI HỌC DÂN LẬP HẢI PHÒNG</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Văn phòng hỗ trợ trực tuyến đại học dân lập Hải Phòng" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- Tạo hiệu ứng -->
<link href="css/animation.css" rel="stylesheet" type="text/css" >
 <!-- script cho điều hướng top -->
<script src="js/topnav.js"></script> 
<!--skycons-icons-->
<script src="js/skycons.js"></script>

<script src="js2/highcharts.js"></script>
<script src="js2/exporting.js"></script>

<?php include "admincontent/ewcfg6.php" ?>
<?php include "admincontent/ewmysql6.php" ?>
<?php include "admincontent/phpfn6.php" ?>
<?php include "admincontent/userinfo.php" ?>
<?php include "admincontent/userfn6.php" ?>
<?php include "notice_message/intro_articleinfo.php" ?>
<!--//skycons-icons-->
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
    //  Page_Terminates
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
</head>
<body > 
<div class="page-container sidebar-collapsed"> 
   <div class="left-content">
       <div class="mother-grid-inner" >
            <!--header start here-->
                <?php include("header2.php"); ?>
                <!--heder end here-->

                <!--inner block start here-->
            <div class="inner-block">
                <!--menu chính-->
                    <?php include("menu.php") ?>
                <!--menu chính end-->
 <div id="table_thongbao" class="col-md-8 mailbox-content  tab-content tab-content-in" style="border-radius:25px;display:none;top:15px">
                <img src="images/huongdan.png" class="notice_picture">
               <h1 style="text-align: center"> Bấm vào các biểu tượng trên cùng để sử dụng các chức năng  </h1>    
                           
</div>               
 <div id="table_menu" class="col-md-8 mailbox-content  tab-content tab-content-in" style="border-radius:25px;display:none;top:15px">
         <div id="htht2" >    </div>           
</div>
<div id="table_menu2" class="col-md-8 mailbox-content  tab-content tab-content-in" style="border-radius:25px;display:none;top:15px">
             <?php include ("notice_message/intro_articlelist.php");?>              
                           
</div>
        
        <!-- mother grid end here-->
          <!--slider menu-->
          <?php include("sidebar.php") ?>

            
    </div>
</div>
        </div>
    </div>
    
    <script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {offline_redirect:'http://vp.hpu.edu.vn/Cauhoi/cauhoi.php'};    
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var refferer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//hotro.hpu.edu.vn/index.php/vnm/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(department)/2?r='+refferer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
     
<!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
<script src="js/bootstrap.js"> </script>


</body>
</html>                     