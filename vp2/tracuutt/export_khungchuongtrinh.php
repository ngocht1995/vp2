<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Văn phòng hỗ trợ sinh viên - Khung chương trình</title>
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
                                  
                                   // $('.display ').css('font-size', "12px");
                                  
                            } );
     </script>
   <?php $result = $_SESSION['result'] ; ?> 
  
<form id="form1" action="exporttoexcel.php" method="post" onsubmit='
     $("#datatodisplay1").val($("<div>").append( $("#ReportTable1").eq(0).clone() ).html());'>
    <a href="../tracuutt/"  style="position:fixed ;top:5px;"> Trở lại trang chủ</a>
      <div id="ReportTable1">  
          <?php require_once  "../tracuutt/hearder_service.php" ?>
 <?php $result = $_SESSION['result'] ; ?>     
           <table cellpadding="1" cellspacing="0" border="1" width="57%">
            
                    <tr>           
                            <td align="center">STT</td>
                            <td align="center" >Mã môn Học</td>
                            <td class="center">Tên môn học</td>
                            <td align="center">Khối lượng</td>
                            <td align="center" >Đơn vị</th>
                            <td align="center">Loại môn</td>
                            <td align="center"> Tính điểm TB </td>

                    </tr>
        
                    <?php for($i =0; $i<Count($result); $i++)
                    {
                    ?>
                     <tr class="gradeX">
                                    <td align="center"><?php echo $i+1; ?></td>
                                    <td align="center"><?php echo $result[$i]['MaMonHoc']; ?></td>
                                    <td ><?php echo $result[$i]['TenMonHoc']; ?></td>  
                                    <td align="center"><?php echo $result[$i]['TongSo']; ?></td>
                                    <td align="center"><?php echo $result[$i]['DonVi']; ?></td>
                                    <td align="center">
                                        <?php if ($result[$i]['BatBuoc']=='true')
                                              echo "Bắt buộc"; else  echo "Không bắt buộc";
                                        ?>
                                    
                                    </td> 
                                    <td align="center">
                                        <?php if ($result[$i]['ThamGiaTinhDiemTrungBinh'] =="true")
                                            echo "x"; 
                                        ?>
                                    </td>    
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
     <?php include "../tracuutt/hearder_service_pdf.php" ?>      
 <?php $result = $_SESSION['result'] ; ?>     
         <table cellpadding="1" width="70%" cellspacing="0" border="1"  style="position: absolute;left:-999999;margin-top: 10px;">
            
                    <tr>  
                            <td width="30px;" align="center">STT</td>
                            <td width="70px;" align="center" >Mã môn Học</td>
                            <td width="270px;" class="center">Tên môn học</td>
                            <td width="70px;" align="center">Khối lượng</td>
                            <td width="70px;" align="center" >Đơn vị</th>
                            <td width="100px;" align="center">Loại môn</td>
                            <td width="70px;" align="center"> Tính điểm TB </td>
                    </tr>
            <tbody>
                    <?php for($i =0; $i<Count($result); $i++)
                    {
                    ?>
                    <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td align="center"><?php echo $result[$i]['MaMonHoc']; ?></td>
                                    <td align="justify"><?php echo $result[$i]['TenMonHoc']; ?></td>  
                                    <td><?php echo $result[$i]['TongSo']; ?></td>
                                    <td ><?php echo $result[$i]['DonVi']; ?></td>
                                    <td align="justify">
                                        <?php if ($result[$i]['BatBuoc']=='true')
                                              echo "Bắt buộc"; else  echo "Không bắt buộc";
                                        ?>
                                    
                                    </td> 
                                    <td >
                                        <?php if ($result[$i]['ThamGiaTinhDiemTrungBinh'] =="true")
                                            echo "x"; 
                                        ?>
                                    </td>    
                            </tr>
                   <?php } ?>
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