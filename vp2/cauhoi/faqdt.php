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
<?php $style_code="faq" ?>
<?php include ("../include/header.php");?>
<div id="mainWap">
      <?php include ("../include/top_header.php");?>	
      <div id="center">
		
<?php include ("../include/menu_navi.php");?>
			<div id="noidung">
			 <div id="left">
			 	<h1>DANH MỤC FAQ</h1>
				<ul>
                                     
                                     <?php 
                                                             $conn = ew_Connect();
                                   
                                                              $sSqlWrk = "Select * From `t_cat_question` Order by position";
                                                                // echo $sSqlWrk;
                                                            $rswrk = $conn->Execute($sSqlWrk);
                                                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                            if ($rswrk) $rswrk->Close();
                                                            $rowswrk = count($arwrk);
                                                            //echo $rowswrk;
                                                            //echo $arwrk[0]['name'];
                                                            if($rowswrk <>0)
                                                            { 
                                                                for($i =0; $i < $rowswrk;$i++)
                                                                {
                                                            ?>
                                    <li><a href="faqcat.php?idcag=<?php echo $arwrk[$i]['cat_question_id'];?>"><?php echo $arwrk[$i]['name']; ?></a></li>
								
								
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                    <li class="last"></li>
			   </ul>
		</div>
			 <div id="right">
			   <div id="content">
				<table  cellpadding="0" cellspacing="0" border="0" width="700px"   class="trangchu">
                                    <?php 
                                    $cat_idQuestion ="";
                                      $conn = ew_Connect();
                                      // Xem lai ham KillChars  KillChars(htmlspecialchars($_GET["idcag"],ENT_QUOTES))
                                       $sSqlWrk = "Select * From `t_question` Where question_id = " .KillChars(htmlspecialchars($_GET["id"],ENT_QUOTES));
                                        //echo $sSqlWrk;
                                    $rswrk = $conn->Execute($sSqlWrk);
                                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                    if ($rswrk) $rswrk->Close();
                                    $rowswrk = count($arwrk);
                                    if($rowswrk >0)
                                    {
                                        $cat_idQuestion =$arwrk[0]['cat_question_id'];
                                     
                                        
                                    }
                                    ?>
                                    <tr><td width="700px" class="TrangchuHeader" align="center" ><?php if($rowAns>0){ echo "<h2 class=\"h2tieude\">".$arAns[0]["name"]."</h2>";}else{ ?> <h2 class="h2tieude">CHI TIẾT THÔNG TIN </h2><?php } ?></td>
						<tr>
                                                    <td align="left"  width="700px" class="trangchu" >
							 <h3 class="tieudethongbao">
                                                             <?php 
                                                           
                                   
                                                             
                                                            //echo $rowswrk;
                                                            //echo $arwrk[0]['name'];
                                                            if($rowswrk <>0)
                                                            { 
                                                                
                                                            $datetime  = new DateTime($arwrk[0]['datetime_h']);
                                                            //  $moth =  date ( " m ", $datetime );
                                                            $moth =  $datetime->format ( "m");
                                                            //$date = date ( " d ", $datetime ); 
                                                            $date = $datetime->format ( "d");
                                                            //$year =  date( " Y ", $datetime ); 
                                                            $year =  $datetime->format ( "Y");
                                                            $hour =  $datetime->format ( "H"); 
                                                            $min =$datetime->format ( "i");
                                                            $sSqlAnser = "Select * From `t_answer` where question_id  = '". $arwrk[0]['question_id'] ."' And s_faq";
                                                            //echo $sSqlAnser;
                                                            $rsAns = $conn->Execute($sSqlAnser);
                                                            //echo $rsAns ;
                                                            $arAns = ($rsAns) ? $rsAns->GetRows() : array();
                                                            if ($rsAns) $rsAns->Close();
                                                            $rowAns = count($arAns);
                                                            $anser ="";
                                                            
                                                                if($arwrk[0]['s_number']>=1) 
                                                                {
                                                                 $anser=  $arAns[0]['answer'];
                                                                // echo "ok";
                                                                }
                                                                if(($arwrk[0]['s_number']>=2) and($rowAns >=2))  
                                                                {
                                                                      $anser =  $arAns[1]['answer'];
                                                                // echo "ok";
                                                                 }
                                                                        if(($arwrk[0]['s_number']>=3) and($rowAns >=3))  
                                                        {
                                                            $anser=  $arAns[2]['answer'];
                                                            //echo "ok";
                                                        }
                                                            ?>
								<?php 
                                                                
                                                                $num = $arwrk[0]['s_number'];
                                                                //echo  $num;
                                                            switch ($num) {
                                                            case 0:
                                                            echo  $arwrk[0]['content'];
                                                            break;
                                                            case 1:
                                                            echo  $arwrk[0]['content'];
                                                            break;
                                                             case 2:
                                                            echo  $arwrk[0]['content1'];
                                                            break;
                                                             case 3:
                                                            echo  $arwrk[0]['content2'];
                                                            break;
                                                                  }
                                                                    ?>
                                                              
                                                                   <?php echo "(".$hour. "h" . $min . " ".  $date . "/" .$moth . "/".$year. ")"; ?></h3>
								
                                                           <div  class="noidung_baiviet" style="color: black"><?php  echo $anser;?></div>
                                                                <?php
                                                                
                                                               
                                                                }
                                                                else{
                                                            ?>
                                                            <ul class="FAQ">
                                                                <li>Chưa có danh mục nào!</li>
                                                            </ul>
                                                                <?php
                                                                
                                                                }?>
							
							</td>
							
						</tr>

					</table>
					<?php
                                                $sSqlWrk1 = "Select  *  From `t_question` Where status_faq = 1 AND s_public = 1 AND cat_question_id =  " . $cat_idQuestion . " AND question_id <> " . KillChars(htmlspecialchars($_GET["id"],ENT_QUOTES)).  " Order by datetime_h DESC LIMIT 5 ";
                                                              // echo $sSqlWrk1;
                                                            $rswrk1 = $conn->Execute($sSqlWrk1);
                                                            $arwrk1 = ($rswrk1) ? $rswrk1->GetRows() : array();
                                                            if ($rswrk1) $rswrk1->Close();
                                                            $rowswrk1 = count($arwrk1);
                                                           // echo $rowswrk1;
                                                                                                    //echo $arwrk[0]['name'];
                                        if ($rowswrk1 >0)
                                        {
                                        ?>
                               <div class="cactinlienquan">
                                            <h2 class="cactinkhac"> Câu hỏi cùng chủ đề</h2>
                                            <?php
                                            for ($j=0; $j< $rowswrk1; $j++ )
                                            { 
                                            $url ="faqdt.php?id=". $arwrk1[$j]["question_id"]; 
                                            $num = $arwrk1[j]["s_number"];
                                            $ID =$arwrk1[j]["question_id"];
                                            echo $ID;
                                            $datetime  = new DateTime($arwrk1[$j]["datetime_h"]);
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
                                            $content = $arwrk1[$j]["content"];
                                            break;
                                            case 1:
                                            $content = $arwrk1[$j]["content"];
                                            break;
                                            case 2:
                                            $content = $arwrk1[$j]["content1"];
                                            break;
                                                case 3:
                                            $content =$arwrk1[$j]["content2"] ;
                                            break;
                                            }
                                        $content1 = $content ; 
                                                    if(strlen($content)>100)
                                                    $content = ew_TruncateMemo($content,100,true)."...";   
                                            ?>
                                            <p class="phead_thongbao"> <a Title="<?php echo $content1;  ?>" class="ahead_thongbao" href="<?php echo $url ?>"> <?php echo $content; ?> <span id="spanthoigian1" style="color:#14393a;font-weight: bold;font-size: 12px">(<?php echo $hour. "h" . $min . " ".  $date . "/" .$moth . "/".$year ; ?>)</span></a> </p>
                                            <?php }
                                            
                                            ?>
                                        <?php 

                                        }
                                       ?>
                                        </div>
				</div>
<div class="clr"></div>	
 <?php include ("../include/footer.php");?>

