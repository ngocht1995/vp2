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
<?php 

session_start();
 //echo $_SESSION['role'] . $_SESSION['msv'] . $_SESSION['hovaten'];
function random_string($str, $length, $ranges = array('0-9','a-z','A-Z'))
  {
    // ham sinh ma
    $string="";
    foreach ($ranges as $r) $s .= implode(range(array_shift($r = explode('-', $r)), $r[1]));
    while (strlen($s) < $length) $s .= $s;
    $string = $str.substr(date("A"),0,1).substr(str_shuffle($s), 0, $length);
    return  $string;
  }
 $_SESSION['ID']= "";
 $_SESSION['number'] =-1;
$errors = '';
$MaSV = '';
$Hoten = '';
$DienThoai = '';
$Email= '';
$Noidung = '';
$_SESSION['time'] ="";
if(isset($_POST['submit']))
{
	   
	$MaSV = ew_HtmlEncode($_POST['txtMaSV']);
        $MaSV = KillChars($MaSV);
	$Hoten = ew_HtmlEncode($_POST['txtTen']);
        $Hoten = KillChars($Hoten);
        $DienThoai =ew_HtmlEncode($_POST['txtSoDienThoai']);
        $DienThoai = KillChars($DienThoai);
	$Email =ew_HtmlEncode($_POST['txtEmail']);
        $DienThoai = KillChars($DienThoai);
        $Noidung = ew_HtmlEncode($_POST['txtnoidung']);
        $Noidung = KillChars($Noidung);
	///------------Do Validations-------------
	
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "Mã xác nhận không đúng!";
	}
	if(empty($errors))
	{	
               $conn = ew_Connect();
                $f=1;
               // Sinh ma mac dinh la Trang thang dau O
               if($_SESSION['role'] == 1){
                $_SESSION['ID']= random_string("S",4,array('0-9'));
               }else
                   $_SESSION['ID']= random_string("O",4,array('0-9'));
                $sSqlWrk = "Select IDcard From `t_question` where IDcard = '".$_SESSION['ID'] ."'";
                //echo $sSqlWrk;
                while($f==1){
                
                $rswrk = $conn->Execute($sSqlWrk);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk) $rswrk->Close();
                $rowswrk = count($arwrk);
                //echo  ($rswrk);
               if($rowswrk <>0)
               {
                    if($_SESSION['role'] == 1){
                         $_SESSION['ID']= random_string("S",4,array('0-9'));
                     }else
                      $_SESSION['ID']= random_string("O",4,array('0-9'));
                    
               }
               else
               {
                   $f=0;
                   
               }
             }
            $date = date_create(date("Y-m-d H:i:s"));
//echo  "<br \>" . date_format($date, 'Y-m-d H:i:s') ;
date_add($date, date_interval_create_from_date_string('2 days'));
//echo " <br \>" . date_format($date, 'Y-m-d H:i:s');
              $sql= "INSERT INTO t_question(`IDcard`,`datetime_h`,`datetime_hen`,`msv_id`,`email`,`user_name`,`tel`,`content`,`description`,`s_number`)  VALUES ('" .$_SESSION['ID']."','". date("Y-m-d H:i:s")."','". date_format($date, 'Y-m-d H:i:s')."','".  $MaSV . "','".  $Email ."','".  $Hoten ."','".  $DienThoai ."','". $Noidung."','".  $Noidung ."',1)";
             //echo $sql;
              
        if (!mysql_query($sql))
        {
        die('Error: ' . mysql_error());
        }
      else
      {
        $from_name = "HPU Suportonline!";
        $from_email = "hpu@hpu.edu.vn";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From: $from_name <$from_email>";
        if($Email<> ""){
        $header .= "Cc:". $Email ."\r\n";
        $headers .= 'Bcc:'. $Email . "\r\n";
        }
        $body = "Có một người <b><i>" . $Hoten . "</i></b> vừa gửi câu hỏi trên hệ thống <br /> Mã câu hỏi là: <b>".  $_SESSION['ID'] ."</b><br \>";
        $body .= "<b>Nội dung câu hỏi là:</b> <br \>";
        $body .=  $Noidung;
        $subject = "HPU Suportonline!";
        $to = "hpu@hpu.edu.vn";
         if($Email<> "")
            $to .=", ".$Email;

        if (mail($to, $subject, $body, $headers)) {
       // echo "success!";
        } else {
       // echo "fail…";
        }
        mysql_close($conn);
          
            //echo $f;
            //echo $_SESSION['ID'];
        $MaSV = '';
        $Hoten = '';
        $DienThoai = '';
        $Email= '';
        $Noidung = '';
       
	header('Location: display.php');
      }
}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>


  
<?php $style_code="datcauhoi" ?>
 <?php include "../include/header.php" ?>

    <div id="mainWap">
<?php include ("../include/top_header.php");?>	
      <div id="center">
         <?php include ("../include/menu_navi.php");?>
			<div id="noidung">
                          <div id="left">
                             <img src='../images/pic1.gif' alt="Đại Học Dân Lập Hỉa Phòng">
		          </div>
                             <!-- right -->
                             <div id="right">
                                 <h2 class="h2tieude" style="margin-left:3px;" >HỆ THỐNG ĐẶT CÂU HỎI</h2>
                                 <div id="content">
                                     <form method="Post" name="myForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  onsubmit="return(validate());" >
                                         <table  cellpadding="0" cellspacing="0" border="0" width="700px" class="cauhoi" >						
                                             <tr><td align ="center">
                                         <table  cellpadding="0" cellspacing="0" border="0" width="500px" >
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
                                                    <td align="left"><input type="text" placeholder="Điện thoại"  name="txtSoDienThoai" value='<?php echo $DienThoai ?>' /><span style=" color:#FF0000" >(*)</sp</td>
                                                </tr>
                                                 <tr>
                                                    <td align="left"  >Email:</td>
                                                    <td align="left"><input type="text" placeholder="Địa chỉ Email"  name="txtEmail" value='<?php echo $Email ?>' /></td>
                                                </tr>
                                                <tr>
                                                    <td align="left"  valign="top">Nội dung:</td>
                                                    <td align="left"><textarea name="txtnoidung"  placeholder="Nội dung câu hỏi"   rows="10" cols="50"><?php echo $Noidung ?></textarea><span style=" color:#FF0000" >(*)</span></td> 
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td valign="middle" ><img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' > <br> Nhấn vào <a href='javascript: refreshCaptcha();'>đây</a> để lấy mã </td>
                                                </tr>
                                                  <?php
                                                  if(!empty($errors)){
                                                 ?>
                                                  <tr>
                                                    <td colspan="2" align="center">
                                                   <?php
                                                    echo "<span>".($errors)."</span>";
                                                  ?>
                                                    </td>
                                                  </tr>
                                                  
                                                   <?php
                                                     }
                                                ?>      
						<tr>
						<tr>
                                                    <td align="center" valign="bottom"></td>
                                                    <td style="padding:0 0 0 0px;" align="left">Nhập mã xác nhận<br /><input type="text"  id="6_letters_code" name="6_letters_code" type="text"/> <input name="submit" type="submit" id="btnGui" value="Gửi câu hỏi" /></td></tr>
					</table>
                                                     </td></tr>
                                             </table>
					</form>
                                      <!-- end content --> 
                                 </div>
                               
<?php include ("../include/footer.php");?>
<script language="JavaScript">
function validate()
{
    var errors = [];
  
    
 if( document.myForm.txtMaSV.value == "" && document.myForm.txtTen.value == ""  )
   {
     errors[errors.length]="Xin nhập mã sinh viên hoặc họ tên!" ;
     document.myForm.txtMaSV.focus() ;
     
   }
  
   
   if( document.myForm.txtSoDienThoai.value == "" )
   {
     errors[errors.length]= "Xin nhập số điện thoại!" ;
     document.myForm.txtSoDienThoai.focus() ;
     
   }
   else
       {
           var regexp_phone=/^\d{10,11}/;
               
         if(document.myForm.txtSoDienThoai.value.match(regexp_phone) == null) 
      
          errors[errors.length]= "Điện thoại không đúng!" ;
         
       
	 
      }// if
      
      var mail = document.myForm.txtEmail.value ;
      if(mail !=="")
          {
              var regexp_phone=/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
              if(mail.match(regexp_phone)== null)
                  {
                      
                     errors[errors.length]= "Địa chỉ mail khôn đúng!" ;
                   
                  }
          }
  
  if( document.myForm.txtnoidung.value == ""   )
   {
     errors[errors.length]="Xin nhập nội dung câu hỏi!" ;
     document.myForm.txtnoidung.focus() ;
     
   }else if((document.myForm.txtnoidung.value).length <=10)
       {
     errors[errors.length]="Nội dung câu hỏi quá ngắn!" ;
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