<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Văn phòng hỗ trợ sinh viên - Hoạt động sinh viên trong khách sạn </title>
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
<div id="idthongtin">
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
     <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                    $("#allan_length").empty();
                                    $(".dataTables_filter").empty();
                                    $(".dataTables_info").empty();
                                    $(".noidung").css({ width: "240px" })
                                    
                                   // $('.display ').css('font-size', "12px");
                                  
                            } );
     </script>
   <?php $result = $_SESSION['result'] ; ?> 
 <a href="../tracuutt/"  style="position:fixed ;top:5px;"> Trở lại trang chủ</a>
<form id="form1" action="exporttoexcel.php" method="post" onsubmit='
     $("#datatodisplay1").val($("<div>").append( $("#ReportTable1").eq(0).clone() ).html());'>
      <div id="ReportTable1">  
          <?php include "../tracuutt/hearder_service.php" ?>
          <?php $result = $_SESSION['result'] ; ?>    
      
          <table cellpadding="1" cellspacing="0" border="1" width="740px;">
                 
                    <tr> 
                        <th class="center">Năm học</th>
                        <th class="center">Mã phòng</th>
                        <th class="center">Ngày vào</th>
                        <th class="center">Ngày ra</th>
                        <th class="center">Chỉ số điện khi vào</th>
                        <th class="center">Chỉ số nước lạnh khi vào</th>
                        <th class="center">Chỉ số nước nóng khi vào</th>
                        <th class="center">Chỉ số điện khi ra</th>
                        <th class="center">Chỉ số nước lạnh khi ra</th>
                        <th class="center">Chỉ số nước nóng khi ra</th>
                        <th class="center">Trạng thái</th>
                    </tr>
        
                    <?php 
               if ($result['MaSinhVien'] <> null)
                         { ?>
                              <tr align="gradeX">
                                    <td align="center"><?php echo $result['NamHoc']; ?></td>
                                    <td align="center"><?php echo $result['MaPhong']; ?></td>
                                    <td align="center"><?php echo $result['NgayVao']; ?></td>
                                    <td align="center"><?php echo $result['NgayRa']; ?></td>
                                    <td align="center"><?php echo $result['chiSoDienKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocLanhKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocNongKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoDienKhiRa']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocLanhKhiRa']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocNongKhiRa']; ?></td>
                                    <td align="center"><?php echo $result['TrangThai']; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                               <tr align="gradeX">
                                    <td align="center"><?php echo $result[$i]['NamHoc']; ?></td>
                                    <td align="center"><?php echo $result[$i]['MaPhong']; ?></td>
                                    <td align="center"><?php echo $result[$i]['NgayVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['NgayRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoDienKhiVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocLanhKhiVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocNongKhiVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoDienKhiRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocLanhKhiRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocNongKhiRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['TrangThai']; ?></td>
                                </tr>
                            <?php } 
                 } ?>
                    
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
     <div id="ReportTable2"  style="position: absolute;left: -9999;display: none;">  
     <?php include "../tracuutt/hearder_service_pdf.php" ?>   
       <?php $result = $_SESSION['result'] ; ?>    
                <div></div>         
  
 <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
            
                    <tr> 
                        <th class="center">Năm học</th>
                        <th class="center">Mã phòng</th>
                        <th class="center">Ngày vào</th>
                        <th class="center">Ngày ra</th>
                        <th class="center">Chỉ số điện khi vào</th>
                        <th class="center">Chỉ số nước lạnh khi vào</th>
                        <th class="center">Chỉ số nước nóng khi vào</th>
                        <th class="center">Chỉ số điện khi ra</th>
                        <th class="center">Chỉ số nước lạnh khi ra</th>
                        <th class="center">Chỉ số nước nóng khi ra</th>
                        <th class="center">Trạng thái</th>
                    </tr>
        
            <tbody>
              <?php 
               if ($result['MaSinhVien'] <> null)
                         { ?>
                              <tr align="gradeX">
                                    <td align="center"><?php echo $result['NamHoc']; ?></td>
                                    <td align="center"><?php echo $result['MaPhong']; ?></td>
                                    <td align="center"><?php echo $result['NgayVao']; ?></td>
                                    <td align="center"><?php echo $result['NgayRa']; ?></td>
                                    <td align="center"><?php echo $result['chiSoDienKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocLanhKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocNongKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoDienKhiRa']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocLanhKhiRa']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocNongKhiRa']; ?></td>
                                    <td align="center"><?php echo $result['TrangThai']; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                               <tr align="gradeX">
                                    <td align="center"><?php echo $result[$i]['NamHoc']; ?></td>
                                    <td align="center"><?php echo $result[$i]['MaPhong']; ?></td>
                                    <td align="center"><?php echo $result[$i]['NgayVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['NgayRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoDienKhiVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocLanhKhiVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocNongKhiVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoDienKhiRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocLanhKhiRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocNongKhiRa']; ?></td>
                                    <td align="center"><?php echo $result[$i]['TrangThai']; ?></td>
                                </tr>
                            <?php } 
                 } ?>
             </tbody>   
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