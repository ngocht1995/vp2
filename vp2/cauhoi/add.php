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

    <div id="mainWap">
<?php include ("../include/top_header.php");?>	
      <div id="center">
         <?php include ("../include/menu_navi.php");?>
          

			<div id="noidung">
                          <div id="left">
                             <img src='../images/pic1.gif' alt="Đại Học Dân Lập Hỉa Phòng">
		          </div>
                             <!-- right -->
                             <div id="right" style="color:black">
                                 <h2 class="h2tieude" style="margin-left:3px;" >HỆ THỐNG ĐẶT CÂU HỎI</h2>
                                 <div id="content">
                                    Hệ thống đang gửi thư xin vui lòng chờ!
                                      <!-- end content --> 
                                 </div>
  <?php

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
    if($_SESSION['htsv_status_UserID'] !="")
    {

        $Email= CurrentUserName(); 
        $MaSV=CurrentMSV();
        $Hoten=CurrentFullUserName();

    }
	   //KillChars(htmlspecialchars($_GET['p']),ENT_QUOTES)
	$MaSV = ew_HtmlEncode($_POST['txtMaSV']);
        $MaSV = KillChars(htmlspecialchars($MaSV),ENT_QUOTES);
	$Hoten = ew_HtmlEncode($_POST['txtTen']);
        $Hoten = KillChars(htmlspecialchars($Hoten),ENT_QUOTES);
        $DienThoai =KillChars(htmlspecialchars($_POST['txtSoDienThoai'],ENT_QUOTES));
	$Email =ew_HtmlEncode($_POST['txtEmail']);
        $Email=KillChars(htmlspecialchars($Email,ENT_QUOTES));
        $Noidung = ew_HtmlEncode($_POST['txtnoidung']);
       // $Noidung = KillChars(htmlspecialchars($Noidung,ENT_QUOTES));
	///------------Do Validations-------------
	
	
		 $conn = ew_Connect();
                $f=1;
               // Sinh ma mac dinh la Trang thang dau O
               if($_SESSION['role'] == 1){
                $_SESSION['ID']= random_string("S",8,array('0-9'));
               } 
               else
               {
                     $_SESSION['ID']= random_string("O",8,array('0-9'));
               }
                $sSqlWrk = "Select IDcard From `t_question` where IDcard = '".$_SESSION['ID'] ."'";
                $rswrk = $conn->Execute($sSqlWrk);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk) $rswrk->Close();
                $rowswrk = count($arwrk);
                //echo  ($rswrk);
               if($rowswrk <>0)
               {
                    if($_SESSION['role'] == 1)
                     {
                         $_SESSION['ID']= random_string("S",8,array('0-9'));
                     } 
                     else
                     {  
                         $_SESSION['ID']= random_string("O",8,array('0-9'));
                     }
                    
               }
               else
               {
                   $f=0;
                   
               }

           //hungdq tinh ngay hen voi
               $today = date ( 'd/m/Y' ,strtotime (ew_CurrentDateTime()));
                $sSqlWrk = "Select * From `t_setting_aws_ques` where  type_setting= 2 and Year = ".date("Y")."";
                $rswrk = $conn->Execute($sSqlWrk);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk) $rswrk->Close();
                $listdate = $arwrk[0]['datetime'];
               // $listdate ="12/03/2015,06/03/2015,09/03/2015,10/03/2015";
                $listdate_array= split(",",$listdate);
               // print_r($listdate_array);
                uasort($listdate_array, "my_sort");
                function my_sort($a,$b)
                {
                    $date1 = DateTime::createFromFormat('d/m/Y', $a);
                    $date2 = DateTime::createFromFormat('d/m/Y', $b);
                    return $date1 > $date2;
                }
                print_r($listdate_array);
                $today = ew_CurrentDateTime();
                global $t_today;
                $t_today= $today;
                function Search_listarray ($t_today,$array)
                {
                   $key_x = date ( 'Y-m-d H:i:s' ,strtotime ($t_today));
                   $new_date = strtotime ( '+1 day' , strtotime ( $key_x ) ) ;
                   $new_date  = date ('Y-m-d H:i:s' , $new_date );
                   $key = date ( 'd/m/Y' ,strtotime ($new_date));
                  if (in_array($key, $array))
                     {
                       $t_today = Search_listarray($new_date,$array);   
                     }  
                    else 
                      {
                        $t_today = $new_date;
                      }
                     return $t_today;
                } 
                 $one_day = Search_listarray($t_today,$listdate_array);
                 $two_day = Search_listarray($one_day,$listdate_array);
               
           //end    
         /*      
         $date = date_create(date("Y-m-d H:i:s"));
        //echo  "<br \>" . date_format($date, 'Y-m-d H:i:s') ;
		date_add($date, date_interval_create_from_date_string('2 days'));
		//echo " <br \>" . date_format($date, 'Y-m-d H:i:s');   
          */
        $sql= "INSERT INTO t_question(`IDcard`,`datetime_h`,`datetime_hen`,`msv_id`,`email`,`user_name`,`tel`,`content`,`description`,`s_number`)  VALUES ('" .$_SESSION['ID']."','". date("Y-m-d H:i:s")."','". $two_day."','".  $MaSV . "','".  $Email ."','".  $Hoten ."','".  $DienThoai ."','". $Noidung."','".  $Noidung ."',1)";
       
        if (!mysql_query($sql))
        {
        die('Error: ' . mysql_error());
        }
      else
      {   
    require_once('phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "hpu@hpu.edu.vn";
    $mail->Password = "hpuqtm786";
    $mail->SMTPSecure = "ssl";  
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
    $mail->setFrom(''.$Email.'', ''.$Hoten.'');
    $mail->AddAddress(''.$Email.'', ''.$Hoten.'');
    $mail->Subject  =  'HPU Suportonline';
    $mail->IsHTML(true);
        $body  = "Hệ thống HPU Suportonline xin thông báo <br/> <br/><br/>";
        $body .= "Bạn đã đặt câu hỏi trên hệ thống http://vp.hpu.edu.vn.   <br /> Mã câu hỏi là: <b>".  $_SESSION['ID'] ."</b><br \>";
        $body .= "Mã sinh viên: <b>".$MaSV."</b> <br/>";
        $body .= "Họ tên: <b>".$Hoten."</b><br/>";
        $body .= "<b>Nội dung câu hỏi:</b> <br \>";
        $body .=  $Noidung;
        $body .= "<br \> <i>(Bạn sẽ nhận được phản hổi muộn nhất sau 2 ngày làm việc - ".$two_day.")</i> <br \>";
        $mail->Body    = $body;	
	if($mail->Send())
	{
		echo "Message was Successfully Send :)";
	}
	else
	{
		echo "Mail Error - >".$mail->ErrorInfo;
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


?>                             
<?php include ("../include/footer.php");?>
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
     
   }else if((noidung).length <=10)
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