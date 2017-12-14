<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Văn phòng hỗ trợ sinh viên - Các khoản sinh viên còn thiếu</title>
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

                     <?php  if ($result['maSinhVien'] <> null)
                         { ?>
                       <center> 
                          <span> Năm học: </span> <?php echo $result['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result['hocKy']; ?>
                       </center>
                      <?php } else { ?>
                      <center> 
                          <span> Năm học: </span> <?php echo $result[0]['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result[0]['hocKy']; ?>
                       </center> 
                       <?php } ?>
      
          <table cellpadding="1" cellspacing="0" border="1" width="740px;">
                 
                    <tr> 
                            <th class="noidung center">Tên khoản</th>
                            <th align="center">Số tiền quy định</th>
                            <th align="center">Số tiền thay đổi</th>
                            <th align="center">Số tiền miễn giảm</th>
                            <th align="center">Số tiền kỳ trước chuyển sang</th>
                            <th align="center">Số tiền đã thu</th>
                            <th align="center">Số tiền phải chi</th>
                            <th align="center">Số tiền đã chi</th>
                            <th align="center">Số tiền chuyển sang kỳ sau</th>
                            <th align="center">Thiếu</th>
                    </tr>
        
                    <?php 
               if ($result['maSinhVien'] <> null)
                         { ?>
                              <tr align="gradeX">
                                    <td><?php echo $result['Ten']; ?></td>
                                    <td align="center"><?php echo $result['soTienQuyDinh']; ?></td>
                                    <td align="center"><?php echo $result['SoTienThayDoi']; ?></td>
                                    <td align="center"><?php echo $result['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo $result['Thieu']; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                               <tr align="gradeX">
                                    <td><?php echo $result[$i]['Ten']; ?></td>
                                    <td align="center"><?php echo $result[$i]['soTienQuyDinh']; ?></td>
                                    <td><?php echo $result[$i]['SoTienThayDoi']; ?></td>
                                    <td><?php echo $result[$i]['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo $result[$i]['Thieu']; ?></td>
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
              <?php  if ($result['maSinhVien'] <> null)
                         { ?>
                       <center> 
                          <span> Năm học: </span> <?php echo $result['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result['hocKy']; ?>
                       </center>
                      <?php } else { ?>
                      <center> 
                          <span> Năm học: </span> <?php echo $result[0]['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result[0]['hocKy']; ?>
                       </center> 
               <?php } ?>
                <div></div>         
  
 <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
            
                    <tr> 
                            <th width="150px;" align="center">Tên khoản</th>
                            <th width="60px;"class="center">Số tiền quy định</th>
                            <th width="60px;"class="center">Số tiền thay đổi</th>
                            <th width="60px;"class="center">Số tiền miễn giảm</th>
                            <th width="70px;"class="center">Số tiền kỳ trước chuyển sang</th>
                            <th width="60px;"class="center">Số tiền đã thu</th>
                            <th width="60px;"class="center">Số tiền phải chi</th>
                            <th width="60px;"class="center">Số tiền đã chi</th>
                            <th width="60px;"class="center">Số tiền chuyển sang kỳ sau</th>
                            <th width="60px;"class="center">Thiếu</th>
                    </tr>
        
            <tbody>
             <?php 
               if ($result['maSinhVien'] <> null)
                         { ?>
                              <tr align="gradeX">
                                    <td><?php echo $result['Ten']; ?></td>
                                    <td align="center"><?php echo $result['soTienQuyDinh']; ?></td>
                                    <td align="center"><?php echo $result['SoTienThayDoi']; ?></td>
                                    <td align="center"><?php echo $result['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo $result['Thieu']; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                               <tr align="gradeX">
                                    <td><?php echo $result[$i]['Ten']; ?></td>
                                    <td align="center"><?php echo $result[$i]['soTienQuyDinh']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienThayDoi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo $result[$i]['Thieu']; ?></td>
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