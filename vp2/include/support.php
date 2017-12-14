<?php
$sSqlWrk1 = "Select ho_ten,dien_thoai,email,nick_yahoo,nick_skype from help_manager  limit 2";
$rswrk1 = $conn->Execute($sSqlWrk1);
$arwrk1 = ($rswrk1) ? $rswrk1->GetRows() : array();
if ($rswrk1) $rswrk1->Close();
?>
<table>
    <tr><td width="350px" class="TrangchuHeader" align="center" ><h2 class="h2tieude"><a href="../notice_message/detail_support.php">THÔNG TIN HỖ TRỢ </a></h2></td><td  width="350px" class="TrangchuThongBao" align="center"><h2 class="h2tieudecol1"><a id="example5" href="../images/common/img_quytrinh.jpg" title="Quy trình công việc văn phòng hỗ trợ trực tuyến" style="color:white">QUY TRÌNH THỰC HIỆN</a></h2></td></tr>
    <tr>
        <td style="width: 350px;">
    <table >
         <?php if ($arwrk1[0][3] <> "") { ?>
        <tr> 	
            <td class="supporttd1">
                <a href="ymsgr:sendIM?<?php echo $arwrk1[0][3];?>"><img src="../images/common/img_iconyahoo.gif" alt="Yahoo Messenger Icons" width=30 HEIGHT=30 border="0" border="0" /></a>
            </td>
            <td class="supporttd2"><a class="asupport" href="ymsgr:sendIM?<?php echo $arwrk1[0][3];?>"><?php echo $arwrk1[0]['nick_yahoo'] ?></a></td>
        </tr>
          <?php } ?>

        <?php if ($arwrk1[0][4] <> "") { ?>
        <tr>
            <td class="supporttd1"> 
             <a href="skype:<?php echo $arwrk1[0][4];?>?call" onclick="return skypeCheck();"><img src="../images/common/img_iconskype.gif" style="border: none;" WIDTH=30 HEIGHT=30  alt="Skype Me™!" /></a>
            </td>
            <td class="supporttd2"><a class="asupport" href="skype:<?php echo $arwrk1[0][4];?>?call" onclick="return skypeCheck();"><?php echo $arwrk1[0]['nick_skype'] ?></a></td>
        </tr>
          <?php } ?>
          <?php if ($arwrk1[0]['dien_thoai'] <> "") { ?>
        <tr>
            <td class="supporttd1"><a href="#"><img class="skpye" src="../images/common/img_icontel.gif" style="margin-left: 3px;"  WIDTH=30 HEIGHT=30 border="0"></a></td>
            <td class="supporttd2"><a class="asupport" href="#"><?php echo $arwrk1[0]['dien_thoai'] ?></a></td>
        </tr>
          <?php } ?>
          <?php if ($arwrk1[0]['email'] <> "") { ?>
        <tr>
            <td class="supporttd1"><a href="#"><img class="skpye" src="../images/common/img_mail.jpg" style="margin-left: 3px;"  WIDTH=30 HEIGHT=30 border="0"></a></td>
            <td class="supporttd2"><a class="asupport" href="#"><?php echo $arwrk1[0]['email'] ?></a></td>
        </tr>
          <?php } ?>
        
        <?php if ($arwrk1[0]['email'] <> "") { ?>
        <tr>
            <td class="supporttd1"><a target="_blank" href="http://www.facebook.com/hpu.edu.vn"><img class="skpye" src="../images/common/support.gif" style="margin-left: 3px;"  WIDTH=30 HEIGHT=30 border="0"></a></td>
            <td class="supporttd2"><a class="asupport" target="_blank" href="http://www.facebook.com/groups/SinhVienHPU/?ref=ts&fref=ts"><?php echo 'http://www.facebook.com/groups/SinhVienHPU'  ?></a></td>
        </tr>
          <?php } ?>

    </table>


            
        </td>
        <td>     
      <a id="example5" href="../images/common/img_quytrinh.jpg" title="Quy trình công việc văn phòng hỗ trợ trực tuyến"><img alt="example4" src="../images/common/img_quytrinh.jpg" style="width: 350px;" /></a> </td>
    </tr>
</table>


