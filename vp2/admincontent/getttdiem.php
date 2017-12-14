<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php 

 // print_r($_SESSION['mongcaithien']);
    if ($_POST['data'] <> null)
        
    {
                $x =$_POST['data'];
                $diemthi ="";
                $hocky="";
                $namhoc="";
                $mon_caithien =$_SESSION['mongcaithien'];
                for ($i=0;$i<count($mon_caithien);$i++)
                {
                 //echo $mon_caithien[$i]['MaMonHoc'] ;
                if(trim($mon_caithien[$i]['TenMonHoc']) == trim($x))  
                {   
                 $mamon =$mon_caithien[$i]['MaMonHoc'];
                 $diem =$mon_caithien[$i]['dieml1'];
                 $hocky =$mon_caithien[$i]['HocKy'];
                 $namhoc =$mon_caithien[$i]['NamHoc'];
                  $st=1;
                }
                if ($st == '1')   break;
           
                }
             
    }     

  ?>
                 <input style="background: #bababa" onclick="thongbao_tt('mã môn')" readonly="true"  type="text" name="x_ma_mon" id="x_ma_mon" size="20" maxlength="100" value="<?php echo $mamon  ?>" >
                 <b>Học kỳ</b>
                 <input style="background: #bababa" onclick="thongbao_tt('học kỳ')" readonly="true"  type="text" name="x_hoc_ky" id="x_hoc_ky" size="5" maxlength="100" value="<?php echo $hocky  ?>" >
                <b>Năm học</b>
                 <input style="background: #bababa" onclick="thongbao_tt('năm học')" readonly="true" type="text" name="x_nam_hoc1" id="x_nam_hoc1" size="20" maxlength="100" value="<?php echo $namhoc  ?>" >
                <b>Điểm</b>
                <input style="background: #bababa" onclick="thongbao_tt('điểm')" readonly="true" type="text" name="x_diem" id="x_diem" size="5" maxlength="3" value="<?php echo $diem ?>" >
                <i>(* điểm được tính theo thang điểm 10)</i> 
	        <br/>
	         <input style="background: #bababa" onclick="thongbao_tt('môn cải thiện')" type="text" name="x_monthi_lan2" id="x_monthi_lan2" size="70" maxlength="200" value="<?php echo trim($x) ?>">

