<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
<?php include "../admincontent/lib/nusoap.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
        $conn = ew_Connect();
        $msv= '1354020033';
        $array_giatien= Get_arrayservice($msv,'GiaDienNuocKSSV');
        $array_giatien = $array_giatien['GiaDienNuocKSSVResult']['diffgram']['DocumentElement']['GiaDienNuocKSSV']; // mang tien tinh theo thoi gian
        //  echo '<h2>Fault</h2><pre>'; print_r($array_giatien);echo '</pre>';
        $result= Get_arrayservice($msv,'SuDungDienNuocKSSV');
        $result = $result['SuDungDienNuocKSSVResult']['diffgram']['DocumentElement']['SuDungDienNuocKSSV'];
        mysql_query('DELETE FROM tbl_sddiennuockssv'); 
        mysql_query('ALTER TABLE tbl_sddiennuockssv AUTO_INCREMENT = 1'); 
        for ($i =0; $i < count ($result); $i++)
        {
        mysql_query("INSERT INTO tbl_sddiennuockssv (NamHoc, MaPhong, MaSinhVien, TrangThai, NgayVao, NgayRa, chiSoDienKhiVao, chiSoNuocLanhKhiVao, chiSoNuocNongKhiVao, chiSoDienKhiRa, chiSoNuocLanhKhiRa, chiSoNuocNongKhiRa) 
                    VALUES ('".$result[$i]['NamHoc']."','".$result[$i]['MaPhong']."', '".$result[$i]['MaSinhVien']."','".$result[$i]['TrangThai']."','".$result[$i]['NgayVao']."','".$result[$i]['NgayRa']."','".$result[$i]['chiSoDienKhiVao']."','".$result[$i]['chiSoNuocLanhKhiVao']."','".$result[$i]['chiSoNuocNongKhiVao']."','".$result[$i]['chiSoDienKhiRa']."','".$result[$i]['chiSoNuocLanhKhiRa']."','".$result[$i]['chiSoNuocNongKhiRa']."')");
        }
        // thiet lap thoi dien sinh vien ra phong hoac chuyen phong    
        $query_msv ="SELECT * FROM tbl_sddiennuockssv WHERE MaSinhVien='".$msv."' GROUP BY MaPhong ORDER BY NgayRa ASC";
        $rs = $conn->Execute($query_msv);
        $ar = ($rs) ? $rs->GetRows() : array(); // mag thiet lap thoi dien sinh vien ra phong hoac chuyen phong  
        for ($k=0 ;$k< 1; $k++) 
        {
                    $array = array(); //mang moc thoi gian co su dinh chuyen
                    $array_msvtt= array();
                    $array_ngayvao = array();
                    $array_ngayra = array();
                    $sSqlWrk = "SELECT * FROM tbl_sddiennuockssv WHERE MaPhong = '".$ar[$k]['MaPhong']."' ORDER BY NgayVao ";
                    $rswrk = $conn->Execute($sSqlWrk);
                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                    $rowswrk = count($arwrk);
                    if ($rswrk) $rswrk->Close(); 
                    $thoigian_ketthuc = date ( 'Y-m-j' ,strtotime ($ar[$k]['NgayRa']));
                    for($i=0;$i<count($arwrk);$i++)
                    {

                        $thoigian_vao = date ( 'Y-m-j' ,strtotime ($arwrk[$i]['NgayVao']));
                        $thoigian_ra =  date ( 'Y-m-j' ,strtotime ($arwrk[$i]['NgayRa']));
                        if(in_array($thoigian_vao,$array)== FALSE)
                        {
                            array_unshift($array,$thoigian_vao);

                        }
                        if((in_array($thoigian_ra,$array)== FALSE) && ($thoigian_ra <= $thoigian_ketthuc))
                        {
                            array_unshift($array,$thoigian_ra);

                        }
                        if((in_array($thoigian_ra,$array_ngayra)== FALSE) && ($thoigian_ra <= $thoigian_ketthuc))
                        {
                            array_unshift($array_ngayra,$thoigian_ra);

                        }
                        if((in_array($thoigian_vao,$array_ngayvao)== FALSE))
                        {
                            array_unshift($array_ngayvao,$thoigian_vao);

                        }
                        
                       
                    }
                    function cmp($a, $b) {
                        if ($a == $b) {
                            return 0;
                        }
                        return ($a < $b) ? -1 : 1;
                    }
                usort($array, 'cmp'); // sap xep cac phan tu mang
                usort($array_ngayvao, 'cmp'); // sap xep cac phan tu mang ngay vao
                usort($array_ngayra, 'cmp'); // sap xep cac phan tu mang ngay ra
                array_unique ($array); // loai bo cac phan tu trung lap mang
                array_unique ($array_ngayvao); // loai bo cac phan tu trung lap mang ngay vao
                array_unique ($array_ngayra); // loai bo cac phan tu trung lap mang ngay ra
             echo "moc thoi gian:"; print_r($array);     echo "<br/>";
             echo "thoi gian ngay ra:";   print_r($array_ngayra);echo "<br/>";
             echo "thoi gian ngay vao:";   print_r($array_ngayvao);echo "<br/>";
//                $max =count($array); 
//                if(($max%2 <> 0))  {  array_pop($array);   }  // laoi bo phan tu tren cung neu mang la le  
                for ($j=1; $j< count($array);$j++)  
                    {
                      
                       $sudung_dien =0;
                       $sudung_nuoclanh=0;
                       $sudung_nuocnong=0;
                        $sSql = "SELECT * FROM tbl_sddiennuockssv WHERE (tbl_sddiennuockssv.ngayvao <= '".$array[$j]."' AND tbl_sddiennuockssv.NgayRa >= '".$array[$j]."')";   
                        $rsw = $conn->Execute($sSql);
                        echo "<br/>";
                        echo $sSql;
                        echo "<br/>";
                        $arw = ($rsw) ? $rsw->GetRows() : array();
                        $so_nguoi= count($arw);
                           echo $so_nguoi;
                            echo "<br/>";
                       // check nmgay vao = ngay ra
                        if((in_array($array[$j],$array_ngayvao)== TRUE) && ($so_nguoi >0))
                            {
                            $Sql = "SELECT * FROM tbl_sddiennuockssv WHERE (tbl_sddiennuockssv.NgayVao = '".$array[$j]."')";   
                            $asw = $conn->Execute($Sql);
                            $arw = ($asw) ? $asw->GetRows() : array();
                          echo  $sudung_dien =$arw[0]['chiSoDienKhiRa'] - $arw[0]['chiSoDienKhiVao'];echo "</br>";
                          echo  $sudung_nuoclanh=$arw[0]['chiSoNuocLanhKhiRa'] - $arw[0]['chiSoNuocLanhKhiVao'];echo "</br>";
                          echo  $sudung_nuocnong=$arw[0]['chiSoNuocNongKhiRa'] - $arw[0]['chiSoNuocNongKhiVao'];echo "</br>";
                          echo  $sudung_dien =round((int)$sudung_dien/(int)($so_nguoi-1),2);echo "</br>";
                          echo  $sudung_nuoclanh =round($sudung_nuoclanh/($so_nguoi-1),2);echo "</br>";
                          echo  $sudung_nuocnong =round($sudung_nuocnong/($so_nguoi-1),2);echo "</br>";
                            
                            }
                       if((in_array($array[$j],$array_ngayra)== TRUE) && ($so_nguoi >0))
                            {
                          //mysql_query("DELETE FROM tbl_sddiennuockssv Where tbl_sddiennuockssv.NgayRa = '".$array[$j]."'"); 
                            $Sql = "SELECT * FROM tbl_sddiennuockssv WHERE (tbl_sddiennuockssv.NgayRa = '".$array[$j]."')";   
                            $asw = $conn->Execute($Sql);
                            $arw = ($asw) ? $asw->GetRows() : array();
                         echo   $sudung_dien =$arw[0]['chiSoDienKhiRa'] - $arw[0]['chiSoDienKhiVao'];echo "</br>";
                         echo   $sudung_nuoclanh=$arw[0]['chiSoNuocLanhKhiRa'] - $arw[0]['chiSoNuocLanhKhiVao'];echo "</br>";
                         echo   $sudung_nuocnong=$arw[0]['chiSoNuocNongKhiRa'] - $arw[0]['chiSoNuocNongKhiVao'];;echo "</br>";
                         echo   $sudung_dien =round((int)$sudung_dien/(int)($so_nguoi),2);echo "</br>";
                         echo   $sudung_nuoclanh =round($sudung_nuoclanh/($so_nguoi),2);echo "</br>";
                         echo   $sudung_nuocnong =round($sudung_nuocnong/($so_nguoi),2);echo "</br>";
                            }
                      echo "</br>";
                      //xác định gia cua tung thoi diem 
                       for ($x=0;$x<count($array_giatien);$x++)
                       {
                           $apDungTuNgay = date ( 'Y-m-j' ,strtotime ($array_giatien[$x]['apDungTuNgay']));
                           if ($apDungTuNgay <= $array[$j])
                           {
                             $giatien_dien= $array_giatien[$x]['giaDien'];echo "</br>";
                              $giatien_nuoclanh= $array_giatien[$x]['giaNuocLanh'];
                              $giatien_nuocnong= $array_giatien[$x]['giaNuocNong'];
                               $ngay_apdung = $array_giatien[$x]['apDungTuNgay'];
                               break;
                           }
                       }
                       echo $ngay_apdung;echo "<br/>";
                       echo $giatien_dien;echo "<br/>";
                       echo $giatien_nuoclanh;echo "<br/>";
                       echo $giatien_nuocnong;echo "<br/>";
                   
                    }
//                    echo "<br/>";

        }
 ?>
