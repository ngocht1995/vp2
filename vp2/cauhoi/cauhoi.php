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
<?php $style_code="datcauhoi" ?>


 
<?php $style_code="datcauhoi" ?>
 <?php include "../include/header.php" ?>
 <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
 <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>

    <div id="mainWap">
<?php //include ("../include/top_header.php");?>  
      <div id="center">
         <?php //include ("../include/menu_navi.php");?>
         <head><a href="http://vp1.hpu.edu.vn" style="color:black">
              <button type="button" class="btn btn-info">
        <<< Trở về trang chủ
    </button></a>
         </head>
          <body style="background-image: url('../images/background7.jpg')">

            <div id="noidung">
                <br><br>
                             <!-- right -->
                             <div id="right">
                                 <h1 class="h2tieude" style="text-align: center" >HỆ THỐNG ĐẶT CÂU HỎI</h1><br>
                                 <div id="content">
                                     
                                     <?php
                                     include ("/cauhoi/thietlap_trangthai_cauhoi.php");
                                        $cauhoiF = true;
                                        if($cauhoiF == true){
                                     ?>
                                     <form  method="Post" name="myForm" action="add.php"  onsubmit="return(validate());" >
                                         <table  cellpadding="0" cellspacing="0" border="0" width="700px" class="cauhoi" style="margin: 0 auto ">                      
                                             <tr><td align ="center">
                                         <table  cellpadding="0" cellspacing="0" border="0" width="500px" >
                                             <tr><td  height="15px" style="padding: 5px 0 0 0; " colspan="2">Trước khi đặt câu hỏi bạn hãy sử dụng chức năng <a href="Search.php">tìm kiếm</a> <span style=" color:#FF0000" >(*)</span></td></tr>
                                                <tr><td  height="10px" colspan="2"></td></tr>
                                                <tr>
                                                    <td align="left" >Mã sinh viên:</td>
                                                    <td align="left"><input type="text" placeholder="Mã sinh viên" name="txtMaSV" value='<?php echo $MaSV ?>' /></td>
                                                </tr>
                                               <tr>
                                                    <td align="left" >Họ tên:</td>
                                                    <td align="left"><input type="text" placeholder="Họ tên"   name="txtTen" value='<?php echo $Hoten ?>' /></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" >Điện thoại:</td>
                                                    <td align="left"><input type="text" placeholder="Điện thoại"  name="txtSoDienThoai" value='<?php echo $DienThoai ?>' /><span style=" color:#FF0000" >(*)</span></td>
                                                </tr>
                                                 <tr>
                                                    <td align="left"  >Email:</td>
                                                    <td align="left"><input type="text" placeholder="Địa chỉ Email"  name="txtEmail" value='<?php echo $Email ?>' /></td>
                                                </tr>
                                                <tr>
                                                    <td align="left"  valign="top">Nội dung:</td>
                                                    <td align="left"><textarea name="txtnoidung"  placeholder="Nội dung câu hỏi xin nhập tiếng việt có dấu!"   rows="10" cols="50"><?php echo $Noidung ?></textarea><span style=" color:#FF0000" >(*)</span></td> 
                                                </tr>
                                                
                        <tr>
                                                    <td align="center" valign="bottom"></td>
                                                    <td style="padding:0 0 0 0px;" align="left">
                                                        <p>
                                                          <label for="code">Nhập mã xác nhận = <span id="txtCaptchaDiv" style="color:#F00"></span>
                                                          <input type="hidden" id="txtCaptcha" /></label><br>
                                                          <input type="text" name="txtInput" id="txtInput" size="30" />
                                                        </p>
                                                        <input onclick = "this.style.visibility='hidden', loading.style.visibility='visible'" name="submit" type="submit" id="btnGui" value="Gửi câu hỏi" /> <img id="imgload" src="../images/common/ajax-loading.gif"></td></tr>
                                                      <style>
                                                            #imgload {
                                                                    display:none;
                                                            }
                                                    </style>
                                                <script type="text/javascript">
                                                      var count=0;
                                                        $("input[type='submit']").click(function() {
                                                        
                                                                         $( "#imgload" ).show();
                                                            
                                                            });
  
                                                </script>  
                    
                    </table>
                                                     </td></tr>
                                             </table>
                    </form>
                    

                                     <?php } else {?>
                                     <table  cellpadding="0" cellspacing="0" border="0" width="700px" class="cauhoi" >  
                                         <tr><td align ="center" style="padding: 10px;">
                                     <b><i>Chào các bạn!</i></b><br/>
                                      Hệ thống đặt câu hỏi ngừng phục vụ từ 14/02/2015 đến 25/02/2015<br/>
                                     <b><i>Chúc các bạn năm mới an khang thịnh vượng!</i></b>
                                     <?php }?> </td></tr>
                                         </table>

                                      <!-- end content --> 
                                 </div>
                    </body>           
  <script type="text/javascript">
    function checkform(theform){
        var why = "";
         
        if(theform.txtInput.value == ""){
            why += "- Security code should not be empty.\n";
        }
        if(theform.txtInput.value != ""){
            if(ValidCaptcha(theform.txtInput.value) == false){
                why += "- Security code did not match.\n";
            }
        }
        if(why != ""){
            alert(why);
            return false;
        }
    }
 

//Generates the captcha function    
    var a = Math.ceil(Math.random() * 9)+ '';
    var b = Math.ceil(Math.random() * 9)+ '';       
    var c = Math.ceil(Math.random() * 9)+ '';  
    var d = Math.ceil(Math.random() * 9)+ '';  
    var e = Math.ceil(Math.random() * 9)+ '';  
      
    var code = a + b + c + d + e;
//        //alert(code);txtCaptchaDiv
    document.getElementById("txtCaptcha").value = code;
    document.getElementById("txtCaptchaDiv").innerHTML = code;  

// Validate the Entered input aganist the generated security code function   
function ValidCaptcha(){
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('txtInput').value);
    if (str1 == str2){
        return true;    
    }else{
        return false;
    }
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
    return string.split(' ').join('');
}
</script>
<script language="JavaScript">
function validate()
{
    var errors = [];
    var masv=   RemoveBad(document.myForm.txtMaSV.value);
    var ten=   RemoveBad(document.myForm.txtTen.value);
    var soDT=   RemoveBad(document.myForm.txtSoDienThoai.value);
    var mail = RemoveBad(document.myForm.txtEmail.value) ;
    var noidung = RemoveBad(document.myForm.txtnoidung.value);
     var capcha = RemoveBad(document.myForm.txtInput.value);
    
     
    
 if(  masv== "" && ten == ""  )
   {
     errors[errors.length]="Xin nhập mã sinh viên hoặc họ tên!" ;
     document.myForm.txtMaSV.focus() ;
     
   }
  
   
   if( soDT == "" )
   {
     errors[errors.length]= "Xin nhập số điện thoại!" ;
     document.myForm.txtSoDienThoai.focus() ;
     
   }
   else
       {
           var regexp_phone=/^\d{10,11}/;
               
         if(soDT.match(regexp_phone) == null) 
      
          errors[errors.length]= "Điện thoại không đúng!" ;
         
       
     
      }// if
      
      
      if(mail !=="")
          {
              var regexp_phone=/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
              if(mail.match(regexp_phone)== null)
                  {
                      
                     errors[errors.length]= "Địa chỉ mail khôn đúng!" ;
                   
                  }
          }
  
  if( noidung == ""   )
   {
     errors[errors.length]="Xin nhập nội dung câu hỏi!" ;
     document.myForm.txtnoidung.focus() ;
     
   }else if((noidung).length <=50)
       {
     errors[errors.length]="Nội dung câu hỏi quá ngắn!" ;
     document.myForm.txtnoidung.focus() ;
     
   }
   if( capcha == ""   )
   {
     errors[errors.length]="Xin nhập mã xác nhận!!" ;
    
     
   }else if(!ValidCaptcha())
       {
     errors[errors.length]="Mã xác nhận không đúng!" ;
     document.myForm.txtnoidung.focus() ;
     
   }
   if (errors.length > 0) {

  reportErrors(errors);
  return false;
 }
   return( true );
}
function reportErrors(errors){
 var msg = "Xin hãy nhập đủ thông tin...\n";
 for (var i = 0; i<errors.length; i++) {
 var numError = i + 1;
  msg += "\n" + numError + ". " + errors[i];
}
 alert(msg);
}
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>