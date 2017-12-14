<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Văn phòng hỗ trợ sinh viên - Giấy tờ sinh viên đã nộp</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="../images/common/img_logo.png">
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/localization/messages_vi.js"></script> 
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
    
   </head>
    <body>
  <a href="../tracuutt/"  style="position:fixed ;top:5px;"> Trở lại trang chủ</a>
<div id="idthongtin">
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
     <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                    $("#allan_length").empty();
                                    $(".dataTables_filter").empty();
                                    $(".dataTables_info").empty();
                               
                                  
                            } );
     </script>
   <?php $result = $_SESSION['result'] ; ?> 
  
<form id="form1" action="exporttoexcel.php" method="post" onsubmit='
     $("#datatodisplay1").val($("<div>").append( $("#ReportTable1").eq(0).clone() ).html());'>
      <div id="ReportTable1">  
          <center>
              <table style="width:740px" cellpadding="0" cellspacing="0" border="0">
              <tr>

                  <td colspan="3" style="vertical-align: top;vertical-align: central;">  
                       <img src="img_logo.png" height="78px" style="float:left">
                       <center>
                         BỘ GIÁO DỤC ĐÀO TẠO </br>
                         TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG   
                        </center>
                   </td>
                  <td colspan="4" style="vertical-align: top;vertical-align: central;">
                      <center>
                       Cộng hòa xã hội chủ nghĩa Việt Nam</br>
                       Độc lập - Tự do - Hạnh phúc
                     </center>
                  </td> 
                  
              </tr>   
          </table>  
           <span style="text-decoration: underline;font-size:24px;padding-bottom: 10px;" ><b><?php echo $_SESSION['header_title']; ?></b></span>     
<?php  $result = $_SESSION['arraythongtin']; ?>     
           <table >
               <tr>
                   <td colspan="3" width="370px;">
                       <ul>
                          <li>Họ và tên: &nbsp;<?php echo $result['HoTen']; ?></li>
                          <li>Lớp: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['MaLop']; ?></li>
                          <li>Khóa học: &nbsp;<?php echo $result['TenKhoaHoc']; ?></li>
                       </ul>
                      
                   </td>
                    
                   <td colspan="3" width="370px;" >
                        <ul >
                          <li>Tình trạng: &nbsp;&nbsp;<?php echo $result['TinhTrang']; ?></li>
                          <li>Ngành học: &nbsp;<?php echo $result['TenNganh']; ?></li>
                          <li>Hệ đào tạo: &nbsp;<?php echo $result['TenHeDaoTao']; ?></li>
  
                       </ul>  
                   </td>
               </tr>       
                            
                           
           </table>
 <?php $result = $_SESSION['result'] ; ?>     
           <table cellpadding="1" cellspacing="0" border="1" >
            
                    <tr> 
                            <td  align="center" >STT</td>
                            <td  align="center" >Mã giấy tờ</td>
                            <td  align="center">Tên giấy tờ</td>
                            <td  align="center">Bản</td>
                            <td  align="center">Ngày thu</td>
                    </tr>
        
                    <?php for($i =0; $i<Count($result); $i++)
                    {
                    ?>
                
                             <tr class="gradeX">
                                    <td align="center"><?php echo $i; ?></td>
                                    <td class="center"><?php echo $result[$i]['MaGiayTo']; ?></td>
                                    <td class="center"><?php echo $result[$i]['TenGiayTo']; ?></td>
                                    <td class="center"><?php echo $result[$i]['Ban']; ?></td>
                                    <td class="center"><?php echo $result[$i]['TrangThai']; ?></td>
                            </tr>
                  
                   <?php } ?>        
   </table>
           <table >
               <tr>
                   <td colspan="3"  width="365px;">   </td>  
                   <td colspan="3" width="360px;" style="text-align: right">
                       <b >VĂN PHÒNG HỖ TRỢ SINH VIÊN</b>
                   </td>
               </tr>       
                                          
           </table>
              </center>
                     
      </div> 
    <div style="padding: 10px 0px 10px 0px">
    <center>
        <input type="hidden" id="datatodisplay1" name="datatodisplay1">
        <input id="export_excel" type="submit" value="Export to Excel">
        <input id="export_excel" onclick="printform('ReportTable1')" type="button" value="In ấn">
        <input id="export_pdf" type="button" value="Export to PDF">
     </center>
    </div>         
</form>
     
 <form id="form2" action="exporttopdf.php" method="post" onsubmit='
     $("#datatodisplay2").val($("<div>").append( $("#ReportTable2").eq(0).clone() ).html());'>
     <div id="ReportTable2" style="display: none;position: absolute;left:-99999" >  
            <center>
         <table >
              <tr>
                  <td width="78px">  <img src="img_logo.png" height="78px"></td>
                    <td width="290px"style="text-align:center;">     
                      BỘ GIÁO DỤC ĐÀO TẠO </br>
                      TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG   
                   </td>
                  <td width="370px" style="text-align:center;v">
                      <center>
                       Cộng hòa xã hội chủ nghĩa Việt Nam</br>
                       Độc lập - Tự do - Hạnh phúc
                     </center>		       
              
                   </td>
              </tr>   
             <tr>
                 <td colspan="3" style="text-align:center"> <font size="18"><?php echo $_SESSION['header_title']; ?></font></td>
             </tr>
          </table>  
                <div></div>
          <?php  $result = $_SESSION['arraythongtin']; ?> 
          <table style="width:740px;padding-left: 10px;">
              
              <tr>
                  <td>   
                        <ul>
                          <li>Họ và tên: &nbsp;<?php echo $result['HoTen']; ?></li>
                          <li>Lớp: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['MaLop']; ?></li>
                          <li>Khóa học: &nbsp;<?php echo $result['TenKhoaHoc']; ?></li>
                       </ul> 
                   </td>
                    
                 <td width="370px;" >
                       <ul >
                          <li>Tình trạng: &nbsp;&nbsp;<?php echo $result['TinhTrang']; ?></li>
                          <li>Ngành học: &nbsp;<?php echo $result['TenNganh']; ?></li>
                          <li>Hệ đào tạo: &nbsp;<?php echo $result['TenHeDaoTao']; ?></li>
                       </ul>   
                   </td>
               </tr>       
                            
                           
           </table>
                <div></div>         
 <?php $result = $_SESSION['result'] ; ?>     
 <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="position: absolute;left:-999999;margin-top: 10px;">
            
                    <tr> 
                            <td  align="center" >STT</td>
                            <td  align="center" >Mã giấy tờ</td>
                            <td  align="center">Tên giấy tờ</td>
                            <td  align="center">Bản</td>
                            <td  align="center">Ngày thu</td>
                    </tr>
        
            <tbody>
                    <?php for($i =0; $i<Count($result); $i++)
                    {
                    ?>
                    <tr class="gradeX">
                            <td class="center"><?php echo $i; ?></td>
                            <td class="center"><?php echo $result[$i]['MaGiayTo']; ?></td>
                            <td class="center"><?php echo $result[$i]['TenGiayTo']; ?></td>
                            <td class="center"><?php echo $result[$i]['Ban']; ?></td>
                            <td class="center"><?php echo $result[$i]['TrangThai']; ?></td>
                    </tr>
                   <?php } ?>   
            </table>
           <center>  
               <table>
                     <tr>
                       <td style="text-align: right;padding-top: 10px;"><span><b ></b></span></td>
                   </tr>
                   <tr>
                       <td style="text-align: right;padding-top: 10px;"><span><b >VĂN PHÒNG HỖ TRỢ SINH VIÊN</b></span></td>
                   </tr>
                   
               </table> 
</div> 
     <input type="hidden" id="datatodisplay2" name="datatodisplay2">         
   </form>
                    
     </div>               

<script>
                    
$("#export_pdf").click(function()
{ 
  $("#ReportTable2").css({ display: "inline" });
  $("#form2").submit();
   $("#ReportTable2").css({ display: "none" });
});   
            </script>
            
            
	<div style="clear:both">

  </body>
</html>