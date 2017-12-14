<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "admincontent/ewcfg6.php" ?>
<?php include "admincontent/ewmysql6.php" ?>
<?php include "admincontent/phpfn6.php" ?>
<?php include "admincontent/userinfo.php" ?>
<?php include "admincontent/userfn6.php" ;
$conn = ew_Connect();
$sSqlWrk = "Select * From `t_manager_services`";
$sWhereWrk = "`active_ser` = 1 order by `oder` asc ";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
//echo $sSqlWrk;
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);

date_default_timezone_set('UTC');
function objectToArray($d) {
    if (is_object($d)) {
      // Gets the properties of the given object
      // with get_object_vars function
      $d = get_object_vars($d);
    }
 
    if (is_array($d)) {
      /*
      * Return array converted to object
      * Using __FUNCTION__ (Magic constant)
      * for recursive call
      */
      return array_map(__FUNCTION__, $d);
    }
    else {
      // Return array
      return $d;
    }
  }
        
 function cmp($a, $b)
{
    global $array;
    return strcmp($a, $b);
}
use \Httpful\Request;
// if ($msv <> "" || $msv <>null )
// {   
                 
//           $conn = ew_Connect();
//     // xac dinh tham do hay 
//     $today = date("Y-m-d H:i:s");    
//     $sSqlWrk = "Select * From `t_setting` Where (set_id=2) And (set_active=1) And (t_setting.set_date_start<='$today') And (t_setting.set_date_end>='$today')";   
//     $rswrk = $conn->Execute($sSqlWrk);
//     $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
//     if ($rswrk) $rswrk->Close();
//     $rowswrk = count($arwrk);
//     if ($rowswrk){
//         $thamdo=true;
//         $trangthai_thamdo = $arwrk[0]['set_status'];
//         $GLOBALS['content_ax'] = $arwrk[0]['set_description'];
//         $uri = "http://thamdo.hpu.edu.vn/api/v1/thamdo/".$msv."";
//         $response = Request::get($uri)->send();
//         $array= $response->body;
//         $monhocthamdo=objectToArray($array) ;
//         //echo '<pre>'; print_r($monhocthamdo);echo '</pre>';
//             $_SESSION['monhocthamdo'] = $monhocthamdo;
//     } else 
//     {
//         $thamdo=false;
//         $trangthai_thamdo = '';
//         $content_ax ='';
//       }        
             
// } 
?>
<meta charset="utf8">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<script type="text/javascript" src="js/sidebar.js"></script>

 <div class="sidebar-menu" style="border-radius: 25px">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> </div>     
        <div class="menu">
          <ul id="menu" >         
            <li><a href="#"><i class="fa fa-user"></i><span>Cá nhân sinh viên</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                   <?php
                    for ($i=0;$i<=$rowswrk;$i++)
                    {  
                  if(
                     ($arwrk[$i]['code_ser'] == 'ThongTinSinhVien')
                    ||($arwrk[$i]['code_ser'] == 'HocBongSinhVien')
                    ||($arwrk[$i]['code_ser'] == 'GiayToDaNop') 
                          )  
                  {
                 ?>              
               <li><a id="atracuu<?php echo $arwrk[$i]['services_id']; ?>"><?php echo $arwrk[$i]['name_ser'] ?></li></a>
                <script type="text/javascript">
                  $(document).ready(function(){
                       $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                         $("#htht").html('<center style="margin-top:100px"><img  src="../images/common/ajax-loading.gif">...process...</center>');
                         $.ajax({
                              type: "POST",
                              data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                              url: "msvajax.php",
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
                   <?php }}?>        
                 </ul>
            </li>      
            <li><a href="#"><i class="fa fa-credit-card"></i><span>Tài chính sinh viên</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                <li id="" ><a>Khoản đã nộp</a></li>
                  <li id="" ><a>Khoản còn thiếu</a></li>
                  <li id="" ><a>Miễn giảm học phí</a></li>
                  <li id="" ><a>Khoản đã chi</a></li>
                  <li id="" ><a>Các khoản ở KSSV</a></li>
                 </ul>
            </li>
             <li><a href="#"><i class="fa fa-bar-chart"></i><span>Kết quả học tập</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                <li id="" ><a>Tiến trình môn học</a></li>
                  <li id="" ><a>Điểm môn học trong kì</a></li>
                  <li id="" ><a>Bảng điểm chi tiết</a></li>
                  <li id="" ><a>Bảng điểm toàn khóa</a></li>
                  <li id="" ><a>Khung chương trình</a></li>
                  <li id="" ><a>Môn học đã đăng kí</a></li>
                  <li id="" ><a>Môn thi chưa qua</a></li>
                  <li id="" ><a>Điểm rèn luyện</a></li>
                 </ul>
            </li>
            <li><a href="#"><i class="fa fa-building"></i><span>Khách sạn sinh viên</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                <li><a>Thông tin KSSV</a></li>
                <li><a >Tra cứu phòng</a></li>
                  <li><a>Tra cứu nội trú</a></li>
                 </ul>
            </li>      
             <li><a href="#"><i class="fa fa-comments"></i><span>Thời khóa biểu</span><span class="fa fa-angle-right" style="float: right"></span></a>
                   <ul id="menu-academico-sub" >
                    <li id="" ><a>Lịch thi học kì</a></li>
                      <li id="" ><a>Lịch trực nhật</a></li>
                      <li id="" ><a>Thời khóa biểu SV</a></li>
                      <li id="" ><a>Thời khóa biểu theo giai đoạn</a></li>
                     </ul>
                </li>
          </ul>
        </div>
   </div>
  <div class="clearfix"> </div>
</div>

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

  <?php $style_code="tracuu" ?>
 
 <div id="mainWap">

      <div id="center">
  

                        <div id="noidung" >
                  
       <div id="right">
         <div id="content" style="min-height:350px;">
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
    
   <?php
   
        $conn = ew_Connect();
    // xac dinh tham do hay 
    $today = date("Y-m-d H:i:s");    
    $sSqlWrk = "Select * From `t_setting` Where (set_id=2) And (set_active=1) And (t_setting.set_date_start<='$today') And (t_setting.set_date_end>='$today')";   
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    if ($rowswrk){
        $thamdo=true;
        $trangthai_thamdo = $arwrk[0]['set_status'];
       $GLOBALS['content_ax'] = $arwrk[0]['set_description'];
    } else 
    {
        $thamdo=false;
        $trangthai_thamdo = '';
        $content_ax ='';
      }  
   ?>
    <style>
        div#divhoten {display: none}
        #idxacdinhhoten:hover{color:navy;text-decoration: underline;cursor: pointer}
    </style>
        <table class="responstable">
            <tr>
                                                    <td class="TrangchuHeader" align="left" > 
                                                        <h2 class="h2tieudecol1">
                                                        Nhập mã sinh viên:
                                                        <input onkeypress="searchKeyPress(event);" class="required" id="txtmsv" name="txtmsv" type="text"  value="" maxlength="20" />
                                                        <input id="bnttracuu"  type="button" value="Tra cứu thông tin"   /> 
                                                        <span id="msgbox" style="display:none"></span>
                                                        <span id="idxacdinhhoten"> [* Tìm kiếm mã theo tên] </span>
                                                         </h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                  <td align="center"> 
                                                      <div id="divhoten">
                                                        <span >Nhập tên sinh viên:</span>
                                                        <input onkeypress="searchKeyPressFullName(event);" class="required" id="txthoten" name="txthoten" type="text"  value="" />
                                                        <input id="bnttracuu_tensinhvien"  type="button" value="Tra cứu"   /> 
                                                        <span id="msgbox"><i>(* Tên quy định là tiếng việt có dấu)</i></span>
                                                      </div>   
                                                    </td>   
                                                </tr> 
 <script>
$("#idxacdinhhoten").click(function () {
$("#divhoten").toggle();
});
</script>
            
<script type="text/javascript">
$(document).ready(function(){
     $("#bnttracuu").click(function () {
        $("#divhoten").hide();
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
            
  </table>
        <div style="clear: both"></div>
        <div id="htht" style="color: black"></div>
     </div>  

     <div class="clr"></div>  