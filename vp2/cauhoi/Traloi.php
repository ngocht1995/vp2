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
        
        
        $now = time();
        if (!isset($_SESSION["Dem"]) ){

            $_SESSION["Dem"] = 0;
            $_SESSION['expire'] = time() +30 ;
        // echo "Count :" . $_COOKIE["count"] . "!<br>";
        }
        else
        {

          //echo "Nows count:" . $_SESSION["Dem"];
        }
         //   echo "time" .$_SESSION['expire'] . "<br>";
           // echo "Now". $now;

        if($now > $_SESSION['expire'])
        {
            unset($_SESSION["Dem"]);
            //echo "Your session has expire ";
        }
        
    }

    // Page Unload event
    function Page_Unload() {

        //echo "Page Unload";
    }
}
?>


  
<?php $style_code="traloi" ?>
 <?php include "../include/header.php" ?>
 <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
 <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
 <head><a href="http://vp1.hpu.edu.vn">
              <button type="button" class="btn btn-info">
        <<< Trở về trang chủ
    </button></a>
         </head>
<body style="background-image: url('../images/background7.jpg')"">
    <div id="mainWap">
        <?php //include ("../include/top_header.php");?>  
        
      <div id="center">
         
         <?php //include ("../include/menu_navi.php");?>
         
            <div class="clr"></div>
            <div id="noidung">
                            
                             <!-- right -->
                             <div >
                               
                                 <div id="content">
                                     <?php  
                                     //KillChars(htmlspecialchars($_GET["idcag"],ENT_QUOTES))
                                      $IdCode = KillChars(htmlspecialchars($_GET['IDCard'],ENT_QUOTES));
                                    if(isset($_POST['btnGui'])or isset($_POST['btnOk']) or isset($_POST['submit']))
                                    $IdCode = ew_HtmlEncode($_POST['txtMaCauHoi']);
                                    $IdCode= KillChars(htmlspecialchars($IdCode,ENT_QUOTES));
                                    if(isset($_POST['btnOk'])){
                                        $conn = ew_Connect();
                                       $noidung= ew_HtmlEncode($_POST['txtnoidung']);
                                       $noidung = KillChars(htmlspecialchars($noidung,ENT_QUOTES));
                                       
                                       if($_POST['rdoOK']=="no")
                                       { 
                                            //echo "submit";
                                           if($noidung != "")
                                           {
                
                $description = "";
                //echo $sSqlWrk;
                $sSqlWrk12 = "Select * From `t_question` WHERE IDcard = '".  $_SESSION['ID'] ."' ORDER BY question_id DESC";
                $rswrk12 = $conn->Execute($sSqlWrk12);
                $arwrk12 = ($rswrk12) ? $rswrk12->GetRows() : array();
                if ($rswrk12) $rswrk12->Close();
                $rowswrk12 = count($arwrk12);
                //echo  ($rswrk);
                if($rowswrk12<>0){
                $description =$arwrk12[0]['description'] ;
                }
               // echo $discription . "mota";
                $description = $description ."\n". $noidung;

                                               
                                            $number =$_SESSION['number'] +1;
                                            switch ($number) {
                                            case 1:
                                            $sql= " UPDATE  t_question SET status=0,active=0,s_number=".$number .",content = '".$noidung ."',description = '".$description."' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                                            break;
                                            case 2:
                                            $sql= " UPDATE  t_question SET status=0,active=0,s_number=".$number .",content1 = '".$noidung. "',description = '".$description."' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                                            break;
                                            case 3:
                                             $sql= " UPDATE  t_question SET status=0,active=0,s_number=".$number .",content2 = '".$noidung. "',description = '".$description."' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                                            break;

                                              } 
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
                                           } else {
                                                    echo "<script >";
                                                    echo "alert('Xin nhập lý do hoặc hỏi lại!')";
                                                    echo "</script>";
                                               
                                           }
                                           
                                       }else{
                                            $sql= " UPDATE  t_question SET status=1,active=1,s_ok=1,s_finish = 1,datetime_kq = '".date("Y-m-d H:i:s") . "' WHERE IDcard = '".  $_SESSION['ID'] ."'";
                                              if (!mysql_query($sql))
                                                    {
                                                    die('Error: ' . mysql_error());
                                                    }
                                                else
                                                {

                                                 //   mysql_close($conn);

                                                        //echo $f;
                                                        //echo $_SESSION['ID'];

                                                   // $noidung = '';

                                                   // header('Location: display.php');
                                                }
                                       }
                                    }
                                ?>

                                    <form method="Post" name="myForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  >
                                        <style type="text/css">.cauhoi{margin:0 auto}</style>
                <table  cellpadding="0" cellspacing="0" border="0" width="630px" class="cauhoi">
                     <h1  style="text-align: center" >HỆ THỐNG TRẢ LỜI CÂU HỎI</h1><br><br><br>
                                    <tr><td  height="16px" colspan="2"></td></tr>
                                    <?php  
                                        if($_SESSION["Dem"] +2<=3){ 
                                     ?>
                                    <tr>
                                        <td style="padding-left: 55px;" align="right" ><span class="spantitle">  Mã câu hỏi:</span></td>
                                        <td><input type="text" autocomplete="off" name="txtMaCauHoi" maxlength="11" style="width:100px;" value='<?php echo $IdCode ?>'  /> <input name="btnGui" type="submit" id="btnGui" value="Tìm kiếm" /></td>
                                    </tr>
                                    <?php } else
                                    {
                                    ?>
                                    <tr>
                                        <td colspan="2" style="padding:20px 0 0 0px; color: red; " align="center">Bạn đã nhập sai mã 3 lần, Xin vui lòng chờ 30s sau!</td>
                                         
                                    </tr>
                                     <?php
                                    }
                                     $conn = ew_Connect();
                                   
                                     $sSqlWrk = "Select * From `t_question` where IDcard = '". $IdCode ."' ORDER BY question_id DESC";
                                     $rswrk = $conn->Execute($sSqlWrk);
                                     $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                     if ($rswrk) $rswrk->Close();
                                     $rowswrk = count($arwrk);
                                     //echo $rowswrk;;
                                     
                                      if(isset($_POST['btnGui'])){
                                        if($rowswrk==0)
                                        {
                                         
                                           $_SESSION["Dem"] =$_SESSION["Dem"]+1;
                                          // echo   $_SESSION["Dem"];
                                        }
                                          }
                                          
                                     if($rowswrk <>0)
                                     { 
                                        $_SESSION['ID']=$arwrk[0]['IDcard'];
                                        $_SESSION['number']=$arwrk[0]['s_number'];
                                        $sSqlAnser = "Select * From `t_answer` where question_id = '". $arwrk[0]['question_id'] ."'";
                                        //echo $sSqlAnser;
                                        $rsAns = $conn->Execute($sSqlAnser);
                                        //echo $rsAns ;
                                        $arAns = ($rsAns) ? $rsAns->GetRows() : array();
                                        if ($rsAns) $rsAns->Close();
                                        $rowAns = count($arAns);
                                        //echo $rowswrk;;
                                        // echo $arwrk[0]['s_number'];
                                    ?>
                                    
                                     <tr>
                                          <td colspan="2">
                                              <table cellpadding="0" cellspacing="0" border="0"    class="cauhoi">
                                                  <tr>
                                        <td style="padding:10px; height:15px;background:#c2c2c0; font-weight: bold; " width="595px" align="center">
                                          Câu hỏi
                                        </td>
                                         <td style="padding:10px;height:15px;background:#c2c2c0; font-weight: bold;" width="105px" align="center">
                                          Tình trạng
                                        </td>
                                        </tr>
                                         <tr>
                                             <td style="padding:10px 0 10px 5px;" align="left" width="595px"  > <b>
                                         <?php 
                                                echo $arwrk[0]['content']; 
                                            ?></b>
                                        </td>
                                         <td style="padding:10px 0 10 0; " align="center"  width="105px">
                                          <?php 
                                          if($arwrk[0]['s_number']==1) {
                                            switch ($arwrk[0]['status']) {
                                                case 0:
                                                      echo "Kiểm tra"; 
                                                      $_SESSION['ID']= $arwrk[0]['IDcard'] ;
                                                      echo "<br> <a href='Sua.php'>Sửa câu hỏi</a> ";  
                                                      break;
                                                case 1:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Đang chờ xử lý";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                  case 2:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Tiếp Nhận";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                 case 3:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Đã chuyển";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                            } 
                                            
                                            }
                                            else {
                                                  echo "Chưa thỏa mãn"; 
                                            }
                                            
                                               ?>
                                            
                                        </td>
                                    </tr>
                                     <?php if($arwrk[0]['s_number']==1 AND $arwrk[0]['status']==1 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
                                                <i>Nhà trường đã nhận được câu hỏi của bạn và đang trong quá trình kiểm tra; sau khi kiểm tra xong chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i><br/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                        <?php if($arwrk[0]['s_number']==1 AND $arwrk[0]['status']==2 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
                                                <i>Nhà trường đã tiếp nhận  câu hỏi của bạn và đang trong quá trình kiểm tra; sau khi kiểm tra xong chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i><br/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                         <?php if($arwrk[0]['s_number']==1 AND $arwrk[0]['status']==3 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
                                                <i>Nhà trường đã tiếp nhận  và chuyển câu hỏi của bạn đến đơn vị có thẩm quyền; sau khi có kết quả chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i><br/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php 
                                        if($rowAns >=1)
                                     {
                                    ?>
                                    
                                    <tr>
                                       <td colspan="2" width="100%">
                                        <div style="margin-bottom:0px;padding: 0 0 0 5px; text-align: left;">
                                        <b>Trả lời:</b> <input <?php  if($rowAns == 1){ echo  'value="Ẩn"' ; } else {  echo 'value="Bấm vào để xem"' ;}?>   style="width:120px;font-size:10px;margin:0px;padding:0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; this.value = 'Ẩn'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Bấm vào để xem'; }" type="button">
                                        </div>
                                        <div style="margin:0px; padding: 0px; border: 0px inset;">
                                     <div  id="traloi" <?php  if($rowAns == 1){ echo  'style="display: "' ; } else {  echo 'style="display: none"' ;}?>  >
                                        
                                            <?php
                                                if($arwrk[0]['s_number']>=1) 
                                                {
                                                    echo  $arAns[0]['answer'];
                                                   // echo "ok";
                                                }
                                            ?>
                                      
                                        </div>
                                        </div>
                                       
                                    </td>
                                   </tr>
                                   <?php 
                                     }
                                     //het lan 1;
                                   ?>
                                   
                                   <?php
                                            //bat dau lan 2
                                if($arwrk[0]['s_number']>=2){ ?>
                                 
                                         <tr>
                                        <td style="padding:10px; " align="left" width="595px" >
                                            <b>
                                         <?php 
                                                echo $arwrk[0]['content1']; 
                                          ?>
                                            </b>
                                        </td>
                                         <td style="padding:10px; " align="center"  width="105px">
                                          <?php 
                                          if($arwrk[0]['s_number']==2) {
                                            switch ($arwrk[0]['status']) {
                                                case 0:
                                                      echo "Kiểm tra"; 
                                                      $_SESSION['ID']= $arwrk[0]['IDcard'] ;
                                                      echo "<br> <a href='Sua.php'>Sửa câu hỏi</a> ";  
                                                      break;
                                                case 1:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Đang chờ xử lý";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                 case 2:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Tiếp Nhận";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                 case 3:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Đã chuyển";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                
                                            } 
                                            
                                            }
                                            else {
                                                  echo "Chưa thỏa mãn"; 
                                            }
                                            
                                               ?>
                                            
                                        </td>
                                    </tr>
                                    <?php if($arwrk[0]['s_number']==2 AND $arwrk[0]['status']==1 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
<i>Nhà trường đã nhận được câu hỏi của bạn và đang trong quá trình kiểm tra; sau khi kiểm tra xong chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i> <br/>                                       </tr>
                                    <?php }?>
                                         <?php if($arwrk[0]['s_number']==2 AND $arwrk[0]['status']==2 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
                                                <i>Nhà trường đã tiếp nhận  câu hỏi của bạn và đang trong quá trình kiểm tra; sau khi kiểm tra xong chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i><br/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                         <?php if($arwrk[0]['s_number']==2 AND $arwrk[0]['status']==3 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
                                                <i>Nhà trường đã tiếp nhận  và chuyển câu hỏi của bạn đến đơn vị có thẩm quyền; sau khi có kết quả chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i><br/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php 
                                   // echo $rowAns;
                                        if($rowAns >=2)
                                     {
                                    ?>
                                    <tr>
                                       <td colspan="2">
                                        <div>
                                        <div class="cauhoi" style="margin-bottom:0px;padding: 0 0 0 5px;">
                                       <b>Trả lời:</b> <input <?php  if($rowAns == 2){ echo  'value="Ẩn"' ; } else {  echo 'value="Bấm vào để xem"' ;}?>  style="width:120px;font-size:10px;margin:0px;padding:0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; this.value = 'Ẩn'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Bấm vào để xem'; }" type="button">
                                        </div>
                                        <div style="margin: 0px; padding: 0px; border: 0px inset;">
                                          <div  id="traloi" <?php if($rowAns == 2){ echo  'style="display: "' ; } else {  echo 'style="display: none"' ;}?>  >
                                        <div id="traloi" >
                                            <?php
                                                if(($arwrk[0]['s_number']>=2) and($rowAns >=2))  
                                                {
                                                    echo  $arAns[1]['answer'];
                                                   // echo "ok";
                                                }
                                            ?>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                    </td>
                                   </tr>
                                    
                                   <?php
                                   
                                   }
                                   ?>
                                   <?php 
                                     }
                                     //het lan 2
                                   ?>
                                   
                                   <?php
                                            //bat dau lan 3
                                if($arwrk[0]['s_number']>=3){ ?>
                                 
                                         <tr>
                                        <td style="padding:10px; " align="left" width="585px" >
                                            <b>
                                         <?php 
                                                echo $arwrk[0]['content2']; 
                                          ?>
                                            </b>
                                        </td>
                                         <td style="padding:10px; " align="center"  width="105px">
                                          <?php 
                                          if($arwrk[0]['s_number']=3) {
                                            switch ($arwrk[0]['status']) {
                                                case 0:
                                                      echo "Kiểm tra"; 
                                                      $_SESSION['ID']= $arwrk[0]['IDcard'] ;
                                                      echo "<br> <a href='Sua.php'>Sửa câu hỏi</a> ";  
                                                      break;
                                                case 1:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Đang chờ xử lý";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                 case 2:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Tiếp Nhận";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                 case 3:{
                                                    if($arwrk[0]['active']==0){
                                                        echo "Đã chuyển";
                                                        break;
                                                    }else
                                                    { 
                                                        if($arwrk[0]['s_finish']==0){
                                                         echo "xử lý xong";
                                                         break;
                                                         }else{
                                                            echo "Kết thúc";
                                                            break;
                                                         }
                                                        
                                                    }
                                                }
                                                
                                            } 
                                            
                                            }
                                            else {
                                                  echo "Chưa thỏa mãn"; 
                                            }
                                            
                                               ?>
                                            
                                        </td>
                                    </tr>
                                     <?php if($arwrk[0]['s_number']==3 AND $arwrk[0]['status']==1 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
<i>Nhà trường đã nhận được câu hỏi của bạn và đang trong quá trình kiểm tra; sau khi kiểm tra xong chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i>  <br/>                                       </tr>
                                    <?php }?>
                                         <?php if($arwrk[0]['s_number']==3 AND $arwrk[0]['status']==2 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
                                                <i>Nhà trường đã tiếp nhận  câu hỏi của bạn và đang trong quá trình kiểm tra; sau khi kiểm tra xong chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i><br/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                         <?php if($arwrk[0]['s_number']==3 AND $arwrk[0]['status']==3 AND $arwrk[0]['active']==0) {?>
                                        <tr>
                                            <td colspan="2" width="100%"> Chào bạn! <br />
                                                <i>Nhà trường đã tiếp nhận  và chuyển câu hỏi của bạn đến đơn vị có thẩm quyền; sau khi có kết quả chúng tôi sẽ có thông tin phản hồi lại bạn!</i><br/>
                                            <i>Chúc bạn vui vẻ và hạnh phúc!</i><br/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php 
                                   // echo $rowAns;
                                        if($rowAns >=3)
                                     {
                                    ?>
                                    <tr>
                                       <td colspan="2">
                                        <div>
                                        <div class="cauhoi" style="margin-bottom:0px;padding: 0 0 0 5px;">
                                        <b>Trả lời:</b> <input <?php  if($rowAns == 3){ echo  'value="Ẩn"' ; } else {  echo 'value="Bấm vào để xem"' ;}?>style="width:120px;font-size:10px;margin:0px;padding:0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; this.value = 'Ẩn'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Bấm vào để xem'; }" type="button">
                                        </div>
                                        <div style="margin: 0px; padding: 0px; border: 0px inset;">
                                       <div  id="traloi" <?php if($rowAns == 3){ echo  'style="display: "' ; } else {  echo 'style="display: none"' ;}?>  >
                                        <div  style="text-align: left;" id="traloi">
                                            <?php
                                                if(($arwrk[0]['s_number']>=3) and($rowAns >=3))  
                                                {
                                                    echo  $arAns[2]['answer'];
                                                    //echo "ok";
                                                }
                                            ?>
                                        </div>
                                        </div>
                                        </div>
                                       </div>
                                    </td>
                                   </tr>
                                      
                                   <?php
                                   
                                   }
                                   ?>
                                   
                                   <?php 
                                     }
                                     //het lan 3
                                   ?>
                                   
                                
                                   
                                              </table>
                                        </td>
                                    </tr>
                                    <?php
                                        
                                        if(($arwrk[0]['s_number']<3 )&&($arwrk[0]['active']==1)&&($arwrk[0]['s_finish']==0))
                                        {
                                    ?>
                                    
                                    <tr>
                                        <td colspan="2" style="padding:20px 0 0 0px; " align="center">
                                    
                                     <div style="margin:0px;padding:0 0 10px 0px;" >
                                         <spam style="color:white;" >Bạn có thỏa mãn với câu trả lời trên hay không?</spam>
                                        <div class="cauhoi" style="margin-bottom:0px;padding: 0 0 0 5px;">
                                            <center></center> Có thỏa mãn: <input type="radio" name="rdoOK" value="ok" checked onclick=" this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none';this.innerText = ''; btnOk.value = 'Kết thúc';  "   /> Không thỏa mãn: <input type="radio" name="rdoOK" value="no" onclick=" this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; btnOk.value = 'Gửi';  "  />
                                        </div>
                                     <div style="margin: 0px; padding: 0px; border: 0px inset;">
                                        <div style="display: none;">
                                        <div style="text-align: left;">
                                           Lý do(yêu cầu):<textarea name="txtnoidung" ><?php echo $Noidung ?></textarea>(*)
                                        </div>
                                        </div>
                                        </div>
                                     </div>
                                        </td>
                                         
                                    </tr>
                                    <tr><td colspan ="2" align="center">
                                             <input name="btnOk" type="submit" id="bntok" value="Kết thúc" />
                                        </td></tr>
                                    <?php 
                                        }
                                    ?>
                                     <?php
                                        // Truong hop hoi 3 lần rồi
                                        if(($arwrk[0]['s_number']==3 )&&($arwrk[0]['active']==1)&&($arwrk[0]['s_finish']==1))
                                        {
                                    ?>
                                    <tr>
                                        <td colspan="2" style="padding:20px 0px 10px 0px; color: red; " align="center">Bạn đã hỏi 3 lần rồi! Nếu bạn còn thắc mắc xin vui lòng đặt câu hỏi mới!</td>
                                         
                                    </tr>
                                    <?php }?>
                                    
                                    <?php
                                     }
                                     else
                                     {
                                        if($_SESSION["Dem"] +1<=3){
                                   ?>
                                      <tr>
                                        <td colspan="2" style="padding:20px 0 10px 0; color: red; " align="center">Dữ liệu không có. Xin vui lòng nhập lại mã câu hỏi!</td>
                                         
                                    </tr>
                                    <?php 
                                        }
                                     }
                                    ?>
                                   </table>
                                 <form>
                                     
                                      <!-- end content --> 
                                 </div>
                               
                             
<?php// include ("../include/footer.php");?>
