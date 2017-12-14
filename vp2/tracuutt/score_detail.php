<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
	 <style type="text/css" title="currentStyle">
                            @import "tracuutt/media/css/demo_page.css";
                            @import "tracuutt/media/css/demo_table.css";
                    </style>
                    <script type="text/javascript"  src="tracuutt/media/js/jquery.js" ></script>
                    <script type="text/javascript"  src="tracuutt/media/js/jquery.dataTables.js"/></script>
                    <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                    $('.dataTable').dataTable();
                                    
                            } );
                    </script>

<?php
 $result = $_SESSION['result_core'] ;
if ($_POST["data"] == "0")
  {
?>
  <div id="abc" class="tbl_bangdiem"> 
            <form target="_blank" action="export_bangdiem.php?data=1" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html());'>
            
      <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th class="sotien">Môn học</th>
                                    <th class="namhoc">ĐQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Tổng I </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Tổng II </th>
                                    <th class="phieuhuy"> KQ </th>
                            
                            </tr>
                    </thead>
                    <tbody>
                    <?php 
                  if ($result['TenMocHoc'] <> null)
                         { 
                   ?>   
                        <tr class="gradeX">
                              <?php 
                                if ( ($result['DiemTH1'] < 5) && ($result['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "x_x";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
                 
<td style="" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </td>
<td class="center"><?php echo $result[$i]['DQT']; ?></td>
<td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
<td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
<td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
<td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
<td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                          
                            </tr>
                    <?PHP } ELSE { ?>
                         <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "x_x";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
                             
        <td  style="" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </td>
        <td class="center"><?php echo $result[$i]['DQT']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
        <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                    
                            </tr>
                    <?PHP } ?>
                       
                            <?php } ?>
                    </tbody>
                    </table>
        <div style="padding:30px 0px 10px 0px;" class="export">
              
             <input type="hidden" id="datatodisplay" name="datatodisplay">
             <input id="export_excel" type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
              
                </div>
            </form>
</div>
 <div style="clear:both">
</div>

<?php } ?>
  </div>



                    
     
<?php
 $result = $_SESSION['result_core'] ;
if ($_POST["data"] == "1")
  {
?>
 <div id="abc" class="tbl_bangdiem">   
            <form target="_blank" action="export_bangdiem.php?data=1" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
  <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="tbl_bangdiem_chitiet">
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                           
                            <tr > 
                                    <th class="sotien">Tên môn học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sophieu">Năm học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">ĐQT</th>
                                    <th class="hocky">Điểm thi</th>
                                    <th class="phieuhuy"> TổngI </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> TổngII </th>
                                    <th class="phieuhuy"> KQ </th>  
                            </tr>
                    </thead>
                    <tbody>
                          
                        <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "x_x";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
    <td  title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </td>                        
    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
    <td class="center" style="width:10%"><?php echo $result[$i]['NamHoc']; ?></td>
    <td class="center"><?php echo $result[$i]['KL']; ?></td>
    <td class="center"><?php echo $result[$i]['DQT']; ?></td>
    <td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
    <td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
    <td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
    <td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td>                                    
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                </div>
               
         <div style="padding:30px 0px 10px 0px;" class="export"> 
     <input type="hidden" id="datatodisplay" name="datatodisplay">
        <input id="export_excel" type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
              
       </div>
                
  
            </form>
 <div style="clear:both"></div>
<?php } ?>
  </div>
 <!--- thang điểm so -->
 
  <?php

if ($_POST["data"] == "2")
  {
?>
  <div id="abc" class="tbl_bangdiem"> <br>
 <table class="display table">
    <tr>
        <td colspan="4" style="text-align: center">
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM SỐ';
                    $_SESSION['title']  ='BangDiemtheothangdiemso';
            ?>
        </td>
    </tr>
   
    
</table>
 
            <form target="_blank" action="export_bangdiem.php?data=2" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
       <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th class="sotien">Tên môn học</th>                         
                                    <th class="namhoc">ĐQT</th>
                                    <th class="hocky">Điểm Thi</th>
                                    <th class="phieuhuy"> Tổng I </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Tổng II </th>
                                    <th class="phieuhuy"> KQ </th>
                                    
                            </tr>
                    </thead>
                    <tbody>
                          
                        <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }
                                
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
                            ?>
                             
    
    <td style="" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?></td>
    <td class="center"><?php echo $DQT; ?></td>
    <td class="center"><?php echo $diemthi1; ?></td>
    <td class="center"><?php echo $diemTH1; ?></td>
    <td class="center"><?php echo $DiemThi2; ?></td>
    <td class="center"><?php echo $DiemTH2; ?></td>  
    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
    
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                </div>
     <div style="padding:30px 0px 10px 0px;" class="export"> 
     <input type="hidden" id="datatodisplay" name="datatodisplay">
        <input id="export_excel" type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
              
       </div>
                
                
            </form>
 <div style="clear:both"></div>
</div>
<?php } ?>
<!--- thang điểm chu -->
 
 <?php

if ($_POST["data"] == "3")
  {
?>
<div id="abc" class="tbl_bangdiem"> 


    <br>
 <table class="display table" >
    <tr>
        <td colspan="4" style="text-align: center">
             <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM CHỮ';
                    $_SESSION['title']  ='BangDiemtheothangdiemchu';
             ?>
        </td>
    </tr>
    
    
</table>
            <form target="_blank" action="export_bangdiem.php?data=3" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                 <div id="ReportTable" >
       <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">ĐQT</th>
                                    <th class="hocky">Điểm Thi</th>
                                    <th class="phieuhuy"> TổngI </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> TổngII </th>   
                                 <th class="phieuhuy"> KQ </th>                                                          
                            </tr>
                    </thead>
                    <tbody>
                          
                        <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "x_x";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }
                                
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
                    
                            ?>
                             
       
        <td style="" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </a></td>
        <td class="center"><?php echo $result[$i]['KL']; ?></td>
        <td class="center"><?php echo $DQT; ?></td>
        <td class="center"><?php echo $diemthi1; ?></td>
        <td class="center"><?php echo $diemTH1; ?></td>
        <td class="center"><?php echo $DiemThi2; ?></td>
        <td class="center"><?php echo $DiemTH2; ?></td>  
        <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                            </tr>
                            <?php } ?>
                    </tbody>
        </table>
                 <div style="padding:30px 0px 10px 0px;" class="export"> 
     <input type="hidden" id="datatodisplay" name="datatodisplay">
        <input id="export_excel" type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
              
       </div>  
            </form>
            </div>
 <div style="clear:both"></div>
<?php } ?>    
     
 
 