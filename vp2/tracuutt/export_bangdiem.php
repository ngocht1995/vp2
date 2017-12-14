<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Văn phòng hỗ trợ sinh viên - Bảng điểm</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="../images/common/img_logo.png">
    <script src="../js2/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript" src="../js2/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js2/localization/messages_vi.js"></script> 
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
                                
                                    $(".noidung").css({ width: "200px" })
                                  
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
           <table cellpadding="1" cellspacing="0" border="1" >
            
                    <tr>   
                            <td class="sophieu" align="center" >Năm học</td>
                            <td class="sophieu" align="center" >Học kỳ</td>
                            <td class="ngaythu" align="center">Mã môn học</td>
                            <td class="noidung" align="center">Tên môn học</td>
                            <td class="sotien" align="center" >KL</td>
                            <td class="sotien" align="center" >DQT</td>
                            <td class="namhoc" align="center">Điểm thi1</td>
                            <td class="hocky" align="center">Điểm TH1</td>
                            <td class="namhoc" align="center">Điểm thi2</td>
                            <td class="hocky" align="center">Điểm TH2</td>
                            <td class="hocky" align="center">KQ</td>
                            <td class="center">Ghi chú</td>  
                    </tr>
        
                    <?php for($i =0; $i<Count($result); $i++)
                    {
                         if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xxx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                              }
       $dqt = KillChars(htmlspecialchars($_GET['data'],ENT_QUOTES));
       switch ($dqt)
                        {
                        case 1:
                        //thiet lap thang diem 10
                             $DQT = $result[$i]['DQT'];
                             $diemthi1 = $result[$i]['DiemThi1'];
                             $diemTH1 = $result[$i]['DiemTH1'];
                             $DiemThi2= $result[$i]['DiemThi2'];
                             $DiemTH2 = $result[$i]['DiemTH2'];
                            break; 
                        case 2:
                                // thiet lap tren thang diem so
                                // Quy doi diem qua trinh 
                                    if ($result[$i]['DQT'] == null ) $DQT='';
                                    else 
                                    {
                                    $DQT =(double)$result[$i]['DQT'];
                                    $DQT =set_thangdiemso ($DQT);
                                    }
                                    // Diem thi 1
                                    if ($result[$i]['DiemThi1'] == null ) $diemthi1='';
                                    else 
                                    {
                                    $diemthi1 = (double)$result[$i]['DiemThi1'];
                                    $diemthi1 = set_thangdiemso ($diemthi1) ;
                                    }
                                    // Diem tong hop 1
                                    if ($result[$i]['DiemTH1'] == null ) $diemTH1='';
                                    else 
                                    {
                                    $diemTH1 = (double)$result[$i]['DiemTH1'];
                                    $diemTH1 = set_thangdiemso ($diemTH1) ;

                                    }
                                    // Diem thi 2
                                    if ($result[$i]['DiemThi2'] == null ) $DiemThi2='';
                                    else 
                                    {
                                    $DiemThi2 = (double)$result[$i]['DiemThi2'];
                                    $DiemThi2 = set_thangdiemso ($DiemThi2) ;
                                    }
                                    // Diem tong hop 2
                                    if ($result[$i]['DiemTH2'] == null ) $DiemTH2='';
                                    else 
                                    {
                                    $DiemTH2 = (double)$result[$i]['DiemTH2'];
                                    $DiemTH2 = set_thangdiemso ($DiemTH2) ;
                                    }
                                        break;       
                                //----------------------end-------------------------   
                         case 3:
                                    // thiey lap in an theo thang diem chu
                                // Quy doi diem qua trinh 
                                    if ($result[$i]['DQT'] == null ) $DQT='';
                                    else 
                                    {
                                    $DQT =(double)$result[$i]['DQT'];
                                    $DQT =set_thangdiemchu ($DQT);
                                    }
                                    // Diem thi 1
                                    if ($result[$i]['DiemThi1'] == null ) $diemthi1='';
                                    else 
                                    {
                                    $diemthi1 = (double)$result[$i]['DiemThi1'];
                                    $diemthi1 = set_thangdiemchu ($diemthi1) ;
                                    }
                                    // Diem tong hop 1
                                    if ($result[$i]['DiemTH1'] == null ) $diemTH1='';
                                    else 
                                    {
                                    $diemTH1 = (double)$result[$i]['DiemTH1'];
                                    $diemTH1 = set_thangdiemchu ($diemTH1) ;

                                    }
                                    // Diem thi 2
                                    if ($result[$i]['DiemThi2'] == null ) $DiemThi2='';
                                    else 
                                    {
                                    $DiemThi2 = (double)$result[$i]['DiemThi2'];
                                    $DiemThi2 = set_thangdiemchu ($DiemThi2) ;
                                    }
                                    // Diem tong hop 2
                                    if ($result[$i]['DiemTH2'] == null ) $DiemTH2='';
                                    else 
                                    {
                                    $DiemTH2 = (double)$result[$i]['DiemTH2'];
                                    $DiemTH2 = set_thangdiemchu ($DiemTH2) ;
                                    }
                            //-------------------------------------------------- end---------------------  
                            break;   
                        }
                                  
                    ?>
                    <tr class="gradeX">
                            <td align="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                            <td align="center"><?php echo $result[$i]['HocKy']; ?></td>
                            <td align="center"><?php echo $result[$i]['MaMonHoc']; ?></td>
                            <td><?php echo $result[$i]['TenMocHoc']; ?></td>
                            <td align="center"><?php echo $result[$i]['KL']; ?></td>
                            <td class="center"><?php echo $DQT; ?></td>
                            <td class="center"><?php echo $diemthi1; ?></td>
                            <td class="center"><?php echo $diemTH1; ?></td>
                            <td class="center"><?php echo $DiemThi2; ?></td>
                            <td class="center"><?php echo $DiemTH2; ?></td>  
                            <td class="center" style="background: <?php echo $style ?>" > <?php echo $kq ?></td>  
                            <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
                    </tr>
                   <?php } ?>        
   </table>
           <table >
               <tr>
                   <td colspan="3"  width="365px;">   </td>  
                   <td colspan="3" width="380px;" style="text-align: right">
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
 <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="position: absolute;left:-999999;margin-top: 10px;">
            
                    <tr> 
                            <td width="70px;"class="sophieu" align="center" >Năm học</td>
                            <td width="35px;"class="sophieu" align="center" >Học kỳ</td>
                            <td width="70px;"class="ngaythu" align="center">Mã môn học</td>
                            <td width="250px;"class="noidung" align="center">Tên môn học</td>
                            <td width="30px;"class="sotien" align="center" >KL</td>
                            <td width="30px;"class="sotien" align="center" >DQT</td>
                            <td width="30px;" lass="namhoc" align="center">Điểm thi 1</td>
                            <td width="30px;"class="hocky" align="center">Điểm TH 1</td>
                            <td width="30px;" lass="namhoc" align="center">Điểm thi 2</td>
                            <td width="30px;"class="hocky" align="center">Điểm TH 2</td>
                            <td width="30px;"class="sophieu" align="center" >KQ</td>
                            <td width="35px;"class="center">Ghi chú</td>  
                    </tr>
        
            <tbody>
                    <?php for($i =0; $i<Count($result); $i++)
                    {
                        
                         if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xxx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                    ?>
                    <tr class="gradeX">
                            <td align="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                            <td align="center"><?php echo $result[$i]['HocKy']; ?></td>
                            <td align="justify"><?php echo $result[$i]['MaMonHoc']; ?></td>
                            <td align="justify"><?php echo $result[$i]['TenMocHoc']; ?></td>
                            <td align="center"><?php echo $result[$i]['KL']; ?></td>
                            <td align="center"><?php echo $result[$i]['DQT']; ?></td>
                            <td align="center"><?php echo $result[$i]['DiemThi1']; ?></td>
                            <td align="center"><?php echo $result[$i]['DiemTH1']; ?></td>  
                            <td align="center"><?php echo $result[$i]['DiemThi2']; ?></td>
                            <td align="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
                            <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td>  
                            <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
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