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


  <?php 

session_start();




$noidung = '';

$_SESSION['time'] ="";
    
if(isset($_POST['submit']))
{
	 
      
	
        $noidung = ew_HtmlEncode($_POST['txtnoidung']);
        $noidung = KillChars($noidung);
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
              
                //echo $sSqlWrk;
               
                
                $rswrk = $conn->Execute($sSqlWrk);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk) $rswrk->Close();
                $rowswrk = count($arwrk);
                //echo  ($rswrk);
            
            // echo $_SESSION['number'];
          //    $sql= " UPDATE  t_question SET content = '".$noidung. "' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                switch ($_SESSION['number']) {
                    case 1:
                     $sql= " UPDATE  t_question SET content = '".$noidung. "' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                    break;
                    case 2:
                     $sql= " UPDATE  t_question SET content1 = '".$noidung. "' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                    break;
                    case 3:
                   $sql= " UPDATE  t_question SET content2 = '".$noidung. "' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                    break;

                } 

             //echo $sql;
              
        if (!mysql_query($sql))
        {
        die('Error: ' . mysql_error());
        }
      else
      {

        mysql_close($conn);
          
            //echo $f;
            //echo $_SESSION['ID'];
        
        $noidung = '';
       
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


 <?php include "../include/header.php" ?>

    <div id="mainWap">
        <?php include ("../include/top_header.php");?>		
      <div id="center">
         <?php include ("../include/menu_navi.php");?>

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
                                 <ul class="dch"> <li class="maudon" >HỆ THỐNG ĐẶT CÂU HỎI</li></ul>
                                 <div id="content">
                                     <form method="Post" name="myForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  onsubmit="return(validate());" >
						<table  cellpadding="0" cellspacing="0" border="0" width="700px" class="cauhoi">
                                                        <?php

                                            $conn = ew_Connect();

                                            $sSqlWrk = "Select * From `t_question` where IDcard = '".  $_SESSION['ID'] ."'";
                                            // echo $sSqlWrk;
                                            $rswrk = $conn->Execute($sSqlWrk);
                                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                            if ($rswrk) $rswrk->Close();
                                            $rowswrk = count($arwrk);
                                            
                                            //echo $rowswrk;;
                                            if($rowswrk <>0)
                                            { 
                                                $_SESSION['number'] = $number = $arwrk[0]['s_number'];
                                                //echo $_SESSION['number'];
                                                if(!isset($_POST['submit']))
                                                {
                                               switch ($number) {
                                                case 1:

                                                $noidung =  $arwrk[0]['content'];

                                                break;
                                                case 2:
                                                $noidung =  $arwrk[0]['content1'];
                                                break;
                                                case 3:
                                                $noidung =  $arwrk[0]['content2'];
                                                break;
                                                   
                                                } 
                                                }
                                               // echo $_SESSION['number'];
                                       
                                           ?>
                                                    <tr><td width="35%" class="cauhoiHeader" >Phản hồi</td><td  width="65%" class="cauhoiHeader">Đặt câu hỏi</td></tr>
						<tr><td  height="10px" colspan="2"></td></tr>
                                                
                                                <tr>
                                                    <td>Nội dung:</td>
                                                    <td> <textarea name="txtnoidung" ><?php echo $noidung ?></textarea>(*)</td> 
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
                                                    
                                                    <td align="center" valign="bottom"></td>
                                                    <td style="padding:0 0 0 0px;" align="left">Nhập mã xác nhận<br /><input type="text"  id="6_letters_code" name="6_letters_code" type="text"/> <input name="submit" type="submit" id="btnGui" value="Sửa câu hỏi" /></td></tr>
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                 <tr>
                                                    <td colspan="2" style="padding:10px;height:15px; font-weight: bold;" align="center">Nội dung không có!</td>
                                                    
                                                </tr>
                                                <?php
                                                    }
                                                ?>
					</table>
					</form>
                                     
                                      <!-- end content --> 
                                 </div>
                               
                             
<?php include ("../include/footer.php");?>
                                
  <script language="JavaScript">
function validate()
{
    var errors = [];
  
    
 
  if( document.myForm.txtnoidung.value == ""   )
   {
     errors[errors.length]="Xin nhập nội dung câu hỏi!" ;
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