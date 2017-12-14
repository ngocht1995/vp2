<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
<
	 <link type="text/css" rel="stylesheet" href="media_export/css/demo_page.css" />
                   <link type="text/css" rel="stylesheet" href="media_export/css/demo_table.css" />
                   <link type="text/css" rel="stylesheet" href="media_export/css/TableTools.css" />
	     <meta http-equiv="content-type" content="text/html; charset=utf-8">
		<script type="text/javascript" charset="utf-8" src="media_export/js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" src="media_export/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="media_export/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="media_export/js/TableTools.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready( function () {
				$('#allan').dataTable( {
					"sDom": 'T<"clear">lfrtip',
                                        "oTableTools": {
                                                    "sSwfPath": "media_export/swf/copy_csv_xls_pdf.swf"
                                            }
				} );
			} );
		</script>
<?php
 $result = $_SESSION['result_core'] ;
if ($_POST["data"] == "1")
  {
?>
  <div id="abc">                    

            <form target="_blank" action="export_bangdiem.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1"  class="display dataTable" id="allan" style="font-size:11px;">
                        <thead>
                            <tr>
                                <td colspan="11"> 
                                    <center>           
                                        <h2 style="font-weight: bold;color:black;font-size: 14px">BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM 10 </h2>
                                        <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM 10';
                                            $_SESSION['title']  ='BangDiemtheothangdiem10';
                                        ?>
                                      </center>

                                </td>
                                
                            </tr>
                            <tr > 
                                    <th class="sophieu">Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">DQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Điểm TH1 </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Điểm TH2 </th>
                                    <th class="phieuhuy"> KQ </th>
                                    <td class="center">Ghi chú</td>  
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
                            ?>
                             
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td style="width: 250px"><a style="cursor: pointer;text-decoration: underline" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </a></td>
                                    <td class="center"><?php echo $result[$i]['KL']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DQT']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
                                    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                                    <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
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
            <form target="_blank" action="export_bangdiem.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 10px;">
                    <thead>
                           <tr>
                                <td colspan="11"> 
                                   <center>           
                                        <h2 style="font-weight: bold;color:black;font-size: 14px">BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM SỐ </h2>
                                        <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM THEO THANG ĐIỂM SỐ';
                                            $_SESSION['title']  ='BangDiemtheothangdiemso';
                                        ?>
                                    </center>
                                  
                                </td>
                                
                            </tr>
                           
                            <tr> 
                                    <th class="sophieu" >Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">DQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Điểm TH1 </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Điểm TH2 </th>
                                    <th class="phieuhuy"> KQ </th>
                                    <td class="center">Ghi chú</td>  
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
                             
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td style="width: 250px"><a style="cursor: pointer;text-decoration: underline" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </a></td>
                                    <td class="center"><?php echo $result[$i]['KL']; ?></td>
                                    <td class="center"><?php echo $DQT; ?></td>
                                    <td class="center"><?php echo $diemthi1; ?></td>
                                    <td class="center"><?php echo $diemTH1; ?></td>
                                    <td class="center"><?php echo $DiemThi2; ?></td>
                                    <td class="center"><?php echo $DiemTH2; ?></td>  
                                    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                                    <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                </div>
            </form>
 <div style="clear:both"></div>
<?php } ?>

<!--- thang điểm chu -->
 
 <?php

if ($_POST["data"] == "3")
  {
?>

            <form target="_blank" action="export_bangdiem.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 10px;">
                    <thead>
                            <tr>
                                <td colspan="11">
                                <center>           
                                        <h2 style="font-weight: bold;color:black;font-size: 14px">BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM CHỮ </h2>
                                        <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM CHỮ';
                                                $_SESSION['title']  ='BangDiemtheothangdiemchu';
                                        ?>
                                </center>
                                    
                                </td>
                            </tr>
                            <tr> 
                                    <th class="sophieu" >Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">DQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Điểm TH1 </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Điểm TH2 </th>
                                    <th class="phieuhuy"> KQ </th>
                                    <td class="center">Ghi chú</td>  
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
                             
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td style="width: 250px"><a style="cursor: pointer;text-decoration: underline" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </a></td>
                                    <td class="center"><?php echo $result[$i]['KL']; ?></td>
                                    <td class="center"><?php echo $DQT; ?></td>
                                    <td class="center"><?php echo $diemthi1; ?></td>
                                    <td class="center"><?php echo $diemTH1; ?></td>
                                    <td class="center"><?php echo $DiemThi2; ?></td>
                                    <td class="center"><?php echo $DiemTH2; ?></td>  
                                    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                                    <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                </div>

            </form>
 <div style="clear:both">
<?php } ?>    
     
 
 