<html>
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
<!-- Custom Theme files -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--Respondsive!-->
<link href="../tracuutt/media/css/Respondsive.css" rel="stylesheet" type="text/css" media="all"/>

<!--js-->
<script src="../js/jquery-2.1.1.min.js"></script> 
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js2/highcharts.js"></script>
<script src="../js2/exporting.js"></script>
<!--icons-css-->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<link href="../css/icofont.css" rel="stylesheet"> 
<header>
<?php include "../include/header.php" ?>
</header>
 <?php include ("ttsv_navi.php") ?>
<body>
  <?php $style_code="tracuu" ?>
  <?php //include ("../include/top_header.php");?>
  
<?php //include ("../include/menu_navi.php");?>


<div id="content" >
      <script type="text/javascript">
		$(document).ready(function(){
			$("#contact").validate({
				errorElement: "span", //Thành phần HTML hiện thông báo lỗi
				//Sử dụng tùy chọn rules cho những validate không hỗ trợ bởi class name
				rules: {
					cpassword: {
						equalTo: "#password" //So sánh với trường cpassword với thành trường có id là password
					},
					min_field: { min: 5 }, //Giá trị tối thiểu
					max_field: { max : 10 }, //Giá trị tối đa
					range_field: { range: [4,10] }, //Giá trị trong khoảng từ 4 - 10
					rangelength_field: { rangelength: [4,10] } //Chiều dài chuỗi trong khoảng từ 4 - 10 ký tự
				}
			});
		});
	</script>  
      <script>
    function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            document.getElementById('bnttracuu').click();
        }
    }
   
    function searchKeyPressFullName(e)
    {
        // look for window.event in case event isn't passed in
  
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            
            document.getElementById('bnttracuu_tensinhvien').click();
           
        }
    }

    </script>   
    
  
    <style>
        div#divhoten {display: none}
        #idxacdinhhoten:hover{color:navy;text-decoration: underline;cursor: pointer}    
    </style>



      <div class="icon-bar">
  <a class="active" href="http://vp1.hpu.edu.vn"><i class="fa fa-home"></i></a> 
  <a href="http://vp1.hpu.edu.vn/tracuutt"><i class="fa fa-search"></i></a> 
  <a href="http://vp1.hpu.edu.vn/notice_message/ds_notice.php"><i class="fa fa-bell-o"></i></a> 
  <a href="http://hpu.edu.vn/thoikhoabieu/"><i class="fa fa-calendar-check-o"></i></a>
  <a href="http://vp.hpu.edu.vn/Cauhoi/cauhoi.php"><i class="fa fa-headphones"></i></a> 
  <a href="http://dieukien.hpu.edu.vn/"><i class="fa fa-tree"></i></a>

</div>                    
    <div class="title" align="left">
        <i class="fa fa-search" style="font-size: 50px"> </i>
        <h1>Tra cứu</h1>
        <p class="sub-title"><b>Thông tin sinh viên</b></p>    
            
        </div>

 

  
      <form class="form-wrapper">
            <input onkeypress="searchKeyPress(event);" class="required" id="txtmsv" name="txtmsv" type="text"  placeholder="Mã sinh viên" maxlength="12" />       
             <img id="bnttracuu" src="../images/icon-search.png" />   
                   <a id="idxacdinhhoten" class="labeltimkiem"> Tìm kiếm theo tên </a> 
            <span id="msgbox" style="display:none"></span>

<br> <br> <br>  
            <div id="divhoten">    
            <input onkeypress="searchKeyPressFullName(event);" class="required" id="txthoten" name="txthoten" type="text" placeholder="Họ tên sinh viên" />
            <img id="bnttracuu_tensinhvien" src="../images/icon-search.png"   /> 
          </div>
    </form>
        
 



                         <script>
                        $("#idxacdinhhoten").click(function () {
                        $("#divhoten").toggle();
                        });
                        </script>
						
                                    <script type="text/javascript">
                                    $(document).ready(function(){
                                         $("#bnttracuu").click(function () {
                                            $("#divhoten").hide();
                                            $("#htht").html('<div class="gif" ><img  src="../images/common/loading.gif" class="loading-gif"><br>Đang bắt thông tin</div>');
                                            $.ajax({
                                                type: "POST",
                                                data: "msv=" + $("#txtmsv").val(),
                                                url: "secure.php",
                                                success: function(msg){
                                                    if (msg != ''){
                                                       $("#htht").html(msg).show();
                                                    }
                                                    else{
                                                        $("#htht").html('<em>No item result</em>');
                                                    }
                                                }
                                            });
                                        });
                                      });
                                    </script>
<script type="text/javascript">
$(document).ready(function(){
       
     $("#bnttracuu_tensinhvien").click(function () {
        $("#htht").html('<div class="gif" ><img  src="../images/common/loading.gif" class="loading-gif"><br>Đang bắt thông tin</div>');
        strVal=  $("#txthoten").val();;
        var outString = strVal.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]insert/gi, '');       
        $.ajax({
            type: "POST",
            data: "msv_fullname=" + outString,
            url: "secure_fullname.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script>	
						
        <div style="clear: both"></div>
        <div id="htht" ></div>
                           </div>       					
				
<div class="clr"></div>	
</body>	
 <?php //include ("../include/footer.php");?>

        
</html>