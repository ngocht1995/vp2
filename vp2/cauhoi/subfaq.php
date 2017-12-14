<style type="text/css">
    html,body{
        background-image: url("../images/background7.jpg")
    }
</style>
<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>

<?php include "../admincontent/t_questioninfo.php" ?>

<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>



<?php $style_code="faq" ?>


<?php include ("../include/header.php");?>
<div id="mainWap">
<?php// include ("../include/top_header.php");?>
      <div id="center">
		  
<?php// include ("../include/menu_navi.php");?>
		  	
			<div id="noidung">
			 <div id="left">
			 	<h1 style="text-align: center">DANH MỤC FAQ</h1>
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
                                    <a href="faqcat.php?idcag=<?php echo $arwrk[$i]['cat_question_id'];?>">+<?php echo $arwrk[$i]['name']; ?>+</a>
								
								
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                            
                                       
			   </ul>
		</div>
			 <div id="right">
                             <h1 class="h2tieude" style="text-align: center" >CÂU HỎI FAQ</h1>
			   <div id="content">
                                
				<table  cellpadding="0" cellspacing="0" border="0"  class="trangchu" style="margin: auto 0;">
				<tr><td height="10px"></td></tr>		
                                    <tr>
							<td align="left"   >
                                                        <ul class="Questionslist">
                                                            <?php
                                        //phan trang
                                        include 'pagding.php';
                                        
                                        $conn = ew_Connect();
                                        
                                       $p = KillChars(htmlspecialchars($_GET['p']),ENT_QUOTES);// currentPage
                                        $rows = 10; // số record trên mỗi trang
                                        $div = 12; // số trang trên 1 phân đoạn
                                         $sql = "SELECT COUNT(*) AS total FROM `t_question` WHERE status_faq = 1 AND s_public = 1 ORDER By Datetime_h  DESC ";
                                       
                                // $sql = "Select * From `t_cat_question`";
                                                        // echo $sSqlWrk;
                                                    $rswrk = $conn->Execute($sql);
                                                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                    if ($rswrk) $rswrk->Close();
                                                    $rowswrk = count($arwrk);
                                                    $total = $arwrk[0][0];        
                                                    $start =  $p*$rows;
                                    $sql = "SELECT * FROM `t_question` WHERE status_faq = 1 AND s_public = 1 ORDER By Datetime_h  DESC LIMIT  $start,$rows";
                                    //echo $sql;
                                    $rswrk = $conn->Execute($sql);
                                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                    if ($rswrk) $rswrk->Close();
                                    $rowswrk = count($arwrk);
                                     for($i=0;$i<$rowswrk;$i++)
                                {


                                $num = $arwrk[$i]['s_number'];
                                $ID =$arwrk[$i]['question_id'];
                                $IDCard =$arwrk[$i]['IDcard'];
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
                                //  echo  date_format( $datetime, 'Y-m-d H:i:s');
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
                                $content1 = $content ; 
                            if(strlen($content)>125)
                            $content = ew_TruncateMemo($content,125,true)."...";
                    
                 
?>    

                                                            <li><a  title="<?php echo $content1;?>" href="faqdt.php?id=<?php echo $ID; ?>"><?php echo $content ?> &nbsp; <span style="font-style: italic;color:#fc9603;  ">(<?php echo $hour. "h" . $min . " ".  $date . "/" .$moth . "/".$year ; ?>)</span></a></li></a></li>
                                                            
                                         		
<?php }?>
	
                                                        </ul>
							
                                                           <ul class="trang">
                                                            <?php // in phân trang
                                                              echo divPage($total,$p,$div,$rows);
                                                              //echo "o";
                                                            ?>
							</ul>

                                                      
							
							</td>
							
						</tr>
						
					</table>
					
				</div>
<div class="clr"></div>	
 <?php //include ("../include/footer.php");?>



