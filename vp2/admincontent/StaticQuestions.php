<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_questioninfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>

<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script type="text/javascript">
    function RemoveBad(strTemp) { 
        strTemp = strTemp.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g,""); 
        return strTemp;
    } 
    function validate(){
     
        var date_q=   RemoveBad(document.myForm.x_datetime_h.value);
        var date_a=   RemoveBad(document.myForm.y_datetime_h.value);
      
        if((date_q=="") || (!ew_CheckEuroDate(date_q))){
            msg = "Ngày tháng không đúng định dạng: 'dd/mm/yyyy'";
            alert(msg);
            document.myForm.x_datetime_h.focus();
            return false;
        }
        
        if((date_a=="")|| (!ew_CheckEuroDate(date_a))){
            msg = "Ngày hỏi không đúng định dạng: 'dd/mm/yyyy'";
            alert(msg);
            document.myForm.y_datetime_h.focus();
            return false;

        }
        return true;
    }
</script>

<script language="javascript">
        function printform(divid) {
        var printContent = document.getElementById(divid);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();
        var printWindow = window.open(windowUrl, windowName, 'left=0;top=0,width=0,height=0,toolbar=0,scrollbars=1,status=0,location=0');

        printWindow.document.write(printContent.innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        }
   </script>
<?php include "header.php" ?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
    <tr>
        <td height="10" width="46%" background="images/bg-line.gif" valign="top">
            <b><font face="Verdana" size="2" color="#336699">
                &nbsp;&nbsp;&nbsp;Thống kê hỏi đáp</font></b></td>
        <td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
            &nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" height="5"></td>
    </tr>
</table>

<?php


$dateStart = KillChars(htmlspecialchars($_GET['x_datetime_h']), ENT_QUOTES); // date-question;
$dateEnd = KillChars(htmlspecialchars($_GET['y_datetime_h']), ENT_QUOTES); // date-answer;
$submit = KillChars(htmlspecialchars($_GET['Submit']), ENT_QUOTES); // submit
$err = "";
if ($dateStart != "" && !ew_CheckEuroDate($dateStart)) {
    $err = "Định dạng ngày hỏi không đúng - dd/mm/yyyy";
}
if ($dateEnd != "" && !ew_CheckEuroDate($dateEnd)) {
    $err = $err . " <br /> Định dạng ngày hỏi không đúng - dd/mm/yyyy";
}
?>
   <form method="Get" name="myForm" action="StaticQuestions.php"  onsubmit="return(validate());">
<table class="ewBasicSearch">
    <tr>
        <td><span class="phpmaker">Thống kê từ ngày: </span></td>
        <td>	
            
                <table cellspacing="0" class="ewItemTable"><tr>
                        <td><span class="phpmaker">
                                <input type="text" name="x_datetime_h" id="x_datetime_h" value="<?php echo $dateStart; ?>">&nbsp;<img src="images/calendar.png" id="cal_x_c_read_time" name="cal_x_c_read_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
                                <script type="text/javascript">
                                    Calendar.setup({
                                        inputField : "x_datetime_h", // ID of the input field
                                        ifFormat : "%d/%m/%Y", // the date format
                                        button : "cal_x_c_read_time" // ID of the button
                                    });
                                </script>
                            </span></td>
                        <td><span class="ewSearchOpr" id="btw1_datetime_h" name="btw1_datetime_h">&nbsp;đến ngày: &nbsp;</span></td>
                        <td><span class="phpmaker" id="btw1_datetime_h" name="btw1_datetime_h">
                                <input type="text" name="y_datetime_h" id="y_datetime_h" value="<?php echo $dateEnd; ?>">&nbsp;<img src="images/calendar.png" id="cal_y_c_read_time" name="cal_y_c_read_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
                                <script type="text/javascript">
                                    Calendar.setup({
                                        inputField : "y_datetime_h", // ID of the input field
                                        ifFormat : "%d/%m/%Y", // the date format
                                        button : "cal_y_c_read_time" // ID of the button
                                    });
                                </script>
                            </span></td>
                            <td><span class="phpmaker" >&nbsp;&nbsp;<input type="submit" name="Submit" id="Submit" value="Thống kê"/>&nbsp;&nbsp;<input type="button" name="In" onclick="printform('thongke');" id="In" value="In ấn"/></td>
                    </tr>
                    <?php
                    if ($err != "") {
                        ?>
                        <tr><td><span class="phpmaker" ><?php echo $err; ?></span></td></tr>
                    <?php } ?>
                </table>
           
        </td>
    </tr>

</table>
<div class="ewGridMiddlePanel" id="thongke">
    <table cellspacing="0"  class="ewTable">

        <?php
        $rowswrk = 0;
            if ($submit == "Thống kê") {
            $conn = ew_Connect();
            //Tong so cau  hoi
            $sql = "SELECT COUNT(question_id) AS numbers FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y')  AND IDcard !='IDCard' ";
            // echo $sql; 
            $rswrk = $conn->Execute($sql);
            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
            if ($rswrk)
                $rswrk->Close();
            $rowswrk = count($arwrk);
            ?>
            <?php if ($rowswrk > 0) { ?>
                <tr><td style="height: 5px; padding: 5px; font-size:14;border:0;">Thống kê câu hỏi từ <?php echo $dateStart; ?> đến  <?php echo $dateEnd; ?></td></tr>
                <tr><td style="border:0;padding: 5px;"> - Tổng số câu hỏi là: <?php echo $arwrk[0][numbers]; ?></td></tr>
                
                    <?php
        
            //Tong so lan hoi
            $sqllh = "SELECT * FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y') AND IDcard !='IDCard'";
            //echo $sql; 
            $rswrklh = $conn->Execute($sqllh);
            $arwrklh = ($rswrklh) ? $rswrklh->GetRows() : array();
            if ($rswrklh)
                $rswrklh->Close();
            $rowswrklh = count($arwrklh);
            $sum=0;
            for($i=0;$i<$rowswrklh;$i++){
                $sum = $sum+$arwrklh[$i]["s_number"];
            }
           
            ?> 
            <tr><td style="border:0;padding: 5px;"> - Tổng số lần hỏi là: <?php echo $sum; ?></td></tr>       
            <tr><td style="border:0;padding: 5px;"> - Chi tiết người trả lời:</td></tr>    
                <?php    
                  //So lan tra loi tung nguoi 
            $sqluser = " SELECT user_update,COUNT(answer_id) AS numbers  FROM t_answer WHERE question_id IN (SELECT question_id  FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" .$dateStart."', '%d/%m/%Y') AND STR_TO_DATE('".$dateEnd."', '%d/%m/%Y') AND IDcard !='IDCard') GROUP BY user_update ORDER BY numbers  DESC";
            //echo $sqluser; 

            $rswrkuser = $conn->Execute($sqluser);
            $arwrkuser = ($rswrkuser) ? $rswrkuser->GetRows() : array();
            if ($rswrkuser)
                $rswrkuser->Close();
            $rowswrkuser = count($arwrkuser);
            
            for($i=0;$i<$rowswrkuser;$i++){
               
            ?> 
            
                 <tr><td style="border:0;padding:5px 5px 5px 15px;"> + Tài khoản <b><i><?php if($arwrkuser[$i]["user_update"]==""){echo "chưa xác định";}else{ echo $arwrkuser[$i]["user_update"];} ?></i></b> trả lời được: <?php echo $arwrkuser[$i]["numbers"]; ?></td></tr>           

            <?php }?>
                
                <?php
                //Tong So cau hoi chua phan phoi
                $sql1 = $sql . " AND datetime_update <>''";
                $rswrk = $conn->Execute($sql1);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                //echo $sql1;
                if ($rswrk)
                    $rswrk->Close();
                $rowswrk = count($arwrk);
                ?>
                
                <tr><td style="border:0;padding: 5px;"> - Tổng số câu hỏi phản hồi là: <?php echo $arwrk[0][numbers]; ?> </td></tr>

                <?php
                $sql2 = $sql . " AND active = 0 ";
                //echo $sql2;
                $rswrk = $conn->Execute($sql2);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk)
                    $rswrk->Close();
                $rowswrk = count($arwrk);
                ?>
                <tr><td style="border:0;padding: 5px;"> - Số câu hỏi chưa trả lời là: <?php echo $arwrk[0][numbers]; ?> </td></tr>

                <?php
                $sql21 = $sql2 . " AND s_number = 1";
                //echo $sql2;
                $rswrk = $conn->Execute($sql21);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk)
                    $rswrk->Close();
                $rowswrk = count($arwrk);
                ?>
                <tr><td style="border:0;padding:5px 5px 5px 15px;"> + Số câu hỏi chưa trả lời lần 1 là: <?php echo $arwrk[0][numbers]; ?> </td></tr>
                <?php
                $sql22 = $sql2 . " AND s_number = 2";
                //echo $sql2;
                $rswrk = $conn->Execute($sql22);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk)
                    $rswrk->Close();
                $rowswrk = count($arwrk);
                ?>
                <tr><td style="border:0;padding:5px 5px 5px 15px;"> + Số câu hỏi chưa trả lời lần 2 là: <?php echo $arwrk[0][numbers]; ?> </td></tr>
                <?php
                $sql23 = $sql2 . " AND s_number = 3";
                //echo $sql2;
                $rswrk = $conn->Execute($sql23);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk)
                    $rswrk->Close();
                $rowswrk = count($arwrk);
                ?>
                <tr><td style="border:0;padding:5px 5px 5px 15px;"> + Số câu hỏi chưa trả lời lần 3 là: <?php echo $arwrk[0][numbers]; ?> </td></tr>


                <?php
                $sql3 = $sql . " AND STR_TO_DATE( DATE_FORMAT(datetime_kq,'%d/%m/%Y'),'%d/%m/%Y') > STR_TO_DATE( DATE_FORMAT(datetime_hen,'%d/%m/%Y'),'%d/%m/%Y') ";
                //echo $sql2;
                $rswrk = $conn->Execute($sql3);
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                if ($rswrk)
                    $rswrk->Close();
                $rowswrk = count($arwrk);
                ?>
                <tr><td style="border:0;padding: 5px;"> - Số câu hỏi quá hạn là: <?php echo $arwrk[0][numbers]; ?> </td></tr>
                <tr><td style="border:0;padding: 5px;"> - Số câu hỏi chi tiết theo từng tháng là:</td></tr>
                <?php

//ham tru kieu date y-m-d tra ve so ngay
                function dateDiff($start, $end) {
                    $start_ts = strtotime($start);
                    $end_ts = strtotime($end);
                    $diff = $end_ts - $start_ts;
                    return round($diff / 86400);
                }

                $dateStart;
                $start = $dateStart;
                $end = $dateEnd;
                
                $dt = date_create_from_format('d/m/Y', $start);
                $start = $dt->format('Y-m-d');
                $endnew = date_create_from_format('d/m/Y', $end);
                $end1 = $endnew->format('Y-m-d');
                
                
                
                $i = dateDiff($start, $end1);
                $td0="";
                $td1 = "";
                $td2 = "";
                $td3 = "";
                $td4 = "";
                $td5= "";
                $td6 = "";
                $arrStart=array();
                $arrEnd=array();
                $j=0;
                while ($i > 0) {
                    
                    $startMonth = $dt->format('Y-m-d');
                   // echo $startMonth;
                    $dt1=$dt;
                    
                    $dt1->modify('last day of this month');

                    $dateStart = date('d/m/Y',strtotime($startMonth));
                    //echo $dateStart;
                   
                    
                    $endMonth = $dt1->format('Y-m-d');
                     $dateEnd = date('d/m/Y',strtotime($endMonth));
                    // cong them 1 thang
                    //$dt->modify('+1 month');
                    //ngay dau tien cua thang tiep theo
                    
                    $i = dateDiff($endMonth, $end1);
                    if ($i <= 0) {
                        
                         $endMonth = $end1;
                         $dateEnd=$end;
                        
                    }
                    //Tinh thang
                    $arrStart[$j]=$dateStart;
                    $arrEnd[$j]=$dateEnd;
                    
                    $td0 = $td0 . "<td  style='border: 1px solid; border-color: #BFD3EE;' align = 'center'><b>" .date("m", strtotime($endMonth))."/".date("Y", strtotime($endMonth)) ."</b><br/><span style='font-size: 9px;' ><i>" . "(" . $dateStart . "-" . $dateEnd . ")</i></span></td>";
                   
                    
                    //Tong so cau hoi theo thang
                     $sqlTong = "SELECT COUNT(question_id) AS numbers FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y') ";
                    $rswrkTong = $conn->Execute($sqlTong);
                    $arwrkTong = ($rswrkTong) ? $rswrkTong->GetRows() : array();
                    if ($rswrkTong)
                        $rswrkTong->Close();
                    $rowswrkTong = count($arwrkTong);
                     $td1 = $td1 . "<td  style='border: 1px solid; border-color: #BFD3EE;' align = 'center'>" . $arwrkTong[0][numbers] . "</td>";
                    
                     //So lan hoi theo thang
                     
                     
                     
                      //Tong so lan hoi
            $sqllht = "SELECT * FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y') AND IDcard !='IDCard'";
            //echo $sql; 

            $rswrklht = $conn->Execute($sqllht);
            $arwrklht = ($rswrklht) ? $rswrklht->GetRows() : array();
            if ($rswrklht)
                $rswrklht->Close();
            $rowswrklht = count($arwrklht);
            $sumt=0;
            for($it=0;$it<$rowswrklh;$it++){
                $sumt = $sumt+$arwrklht[$it]["s_number"];
            }
              $td2 = $td2 . "<td  style='border: 1px solid; border-color: #BFD3EE;' align = 'center'>" . $sumt . "</td>";       
                     
                    //So cau hoi ket thuc lan 1
                     $sqlkt1 = "SELECT COUNT(question_id) AS numbers FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y') ";
                      $sqlkt1=$sqlkt1  ." AND s_number = 1";
                    $rswrkkt1 = $conn->Execute($sqlkt1);
                    $arwrkkt1 = ($rswrkkt1) ? $rswrkkt1->GetRows() : array();
                    if ($rswrkkt1)
                        $rswrkkt1->Close();
                    $rowswrkkt1 = count($arwrkkt1);
                      $td3 = $td3 . "<td  style='border: 1px solid; border-color: #BFD3EE;' align = 'center'>" . $arwrkkt1[0][numbers] . "</td>";
                     
                      //So cau hoi ket thuc lan 2
                     $sqlkt1 = "SELECT COUNT(question_id) AS numbers FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y') ";
                      $sqlkt1=$sqlkt1  ." AND s_number = 2";
                    $rswrkkt1 = $conn->Execute($sqlkt1);
                    $arwrkkt1 = ($rswrkkt1) ? $rswrkkt1->GetRows() : array();
                    if ($rswrkkt1)
                        $rswrkkt1->Close();
                    $rowswrkkt1 = count($arwrkkt1);
                      $td4 = $td4 . "<td  style='border: 1px solid; border-color: #BFD3EE;' align = 'center'>" . $arwrkkt1[0][numbers] . "</td>";
                      
                       //So cau hoi ket thuc lan 3
                     $sqlkt1 = "SELECT COUNT(question_id) AS numbers FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y') ";
                      $sqlkt1=$sqlkt1  ." AND s_number = 3";
                    $rswrkkt1 = $conn->Execute($sqlkt1);
                    $arwrkkt1 = ($rswrkkt1) ? $rswrkkt1->GetRows() : array();
                    if ($rswrkkt1)
                        $rswrkkt1->Close();
                    $rowswrkkt1 = count($arwrkkt1);
                      $td5 = $td5 . "<td  style='border: 1px solid; border-color: #BFD3EE;' align = 'center'>" . $arwrkkt1[0][numbers] . "</td>";
                      
                      
                    //so cau hoi qua han
                    $sqlqh = "SELECT COUNT(question_id) AS numbers FROM t_question WHERE STR_TO_DATE( DATE_FORMAT(datetime_h,'%d/%m/%Y'),'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $dateStart . "', '%d/%m/%Y') AND STR_TO_DATE('" . $dateEnd . "', '%d/%m/%Y')  AND STR_TO_DATE( DATE_FORMAT(datetime_kq,'%d/%m/%Y'),'%d/%m/%Y') > STR_TO_DATE( DATE_FORMAT(datetime_hen,'%d/%m/%Y'),'%d/%m/%Y') ";
                    $rswrkqh = $conn->Execute($sqlqh);
                    $arwrkqh = ($rswrkqh) ? $rswrkqh->GetRows() : array();
                    if ($rswrkqh)
                        $rswrkqh->Close();
                    $rowswrkqh = count($arwrkqh);
                    
                    $td6 = $td6 . "<td  style='border: 1px solid; border-color: #BFD3EE;' align = 'center'>" . $arwrkqh[0][numbers] . "</td>";
                    $dt->modify('first day of next month');
                    $j=$j+1;
                }
                
                ?>
                
                <tr><td style="border:0;padding: 5px;"> 
                        <table cellspacing="0"    style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana;">
                            
                            <tr style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana; background: #90C0BE;">

                                <td align = 'center' style="border: 1px solid; border-color: #BFD3EE;">Tháng</td>
                                <?php echo $td0; ?>
                            </tr>
                            <tr style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana; background: #80D0CD;">

                                <td align = 'center' style="border: 1px solid; border-color: #BFD3EE;">Tổng số:</td>
                                <?php echo $td1; ?>
                            </tr>
                            <tr style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana; background: #80D0CD;">

                                <td align = 'center' style="border: 1px solid; border-color: #BFD3EE;">Lần hỏi:</td>
                                <?php echo $td2; ?>
                            </tr>
                            <tr style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana; background: #BFE7E5;">

                                <td align = 'center' style="border: 1px solid; border-color: #BFD3EE;">Kết thúc lần 1:</td>
                                <?php echo $td3; ?>
                            </tr>
                            <tr style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana; background: #BFE7E5;">

                                <td align = 'center' style="border: 1px solid; border-color: #BFD3EE;">Kết thúc lần 2:</td>
                                <?php echo $td4; ?>
                            </tr>
                            <tr style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana; background: #BFE7E5;">

                                <td align = 'center' style="border: 1px solid; border-color: #BFD3EE;">Kết thúc lần 3:</td>
                                <?php echo $td5; ?>
                            </tr>
                            <tr style="border: 1px solid; border-color: #BFD3EE; font-size: 11px; font-family: sans-serif, Arial, Verdana; background: #FFFA51;">
                                <td align = 'center'  style="border: 1px solid; border-color: #BFD3EE;">Quá hạn:</td>
                                <?php echo $td6; ?>   
                            </tr>
                        </table>
                    </td></tr>
                
            <?php
            }
        }
        ?>
    </table>
</div>
 </form>
<?php include "footer.php" ?>