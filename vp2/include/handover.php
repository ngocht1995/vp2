<div style="min-height:425px">
<h1 style="font-size: 14px;">CÔNG VIỆC TRIỂN KHAI</h1>
			
                                     
                                     <?php 
                                                            $sSqlWrk = "Select * From `tbl_bangiaocv` Where (trangthai=1) Order by thoigian_batdau DESC LIMIT 15";   
                                                            $rswrk = $conn->Execute($sSqlWrk);
                                                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                            if ($rswrk) $rswrk->Close();
                                                            $rowswrk = count($arwrk);
                                                            if($rowswrk <>0)
                                                            { 
                                                                for($i =0; $i < $rowswrk;$i++)
                                                                {
                                                            ?>
<p class="phead_thongbao1"> <a class="spancvtk" title="Văn phòng hỗ trợ trực tuyến - Support Online" href=""><?php echo $arwrk[$i]["tieude_congviec"] ?><span  style="color:#14393a;font-weight: bold;font-size: 11px">  (Từ: <?php echo date ( 'j-m-Y' ,strtotime ($arwrk[$i]["thoigian_batdau"])) ?> Đến:  <?php echo  date ( 'j-m-Y' ,strtotime ($arwrk[$i]["thoigian_ketthuc"])); ?>)</span><?php echo $img ?></a> <p>
                                                                <?php
                                                                }
                                                            }
                                                            ?>
</div>  
<?php
//Kiem tra nguoi dung
//$phienlamviec = session_id();
$phienlamviec = $_SERVER['REMOTE_ADDR'];
//Lay du lieu ve phien
$time = time(); // Lay thoi gian hien tai
$time_secs = 900;
$time_out = $time - $time_secs; // Lay thoi gian hien tai
@mysql_query("DELETE FROM count_visitors WHERE s_time < '$time_out' AND s_id <> 'begin' ");
$sSqlWrk = "SELECT * FROM count_visitors Where s_id = '" . $phienlamviec . "'";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
$count_user = count($arwrk);
$visitor = $arwrk[0][0];
if($count_user>0){
    @mysql_query("Update count_visitors set s_time= '$time' where s_id='".$phienlamviec."'");
   //echo "Update count_visitors set s_time= '$time' where s_id=".$phienlamviec;
}else{
    @mysql_query("INSERT INTO count_visitors (s_id, s_time) VALUES ('$phienlamviec', '$time')");
}
$count_user = @mysql_num_rows(@mysql_query("SELECT id FROM count_visitors"));
$user_online = $count_user;
list($page_visited) = @mysql_fetch_array(@mysql_query("SELECT MAX(id) FROM count_visitors"));
@mysql_query("Update count_visitors set visitors= '$page_visited' where s_id= 'begin'");
$page_visited =  @mysql_fetch_array(@mysql_query("SELECT visitors FROM count_visitors Where s_id = 'begin'"));
//echo $page_visited[visitors];
@mysql_query("DELETE FROM count_visitors WHERE s_time < '$time_out' AND s_id <> 'begin'"); // Delete tat ca nhung rows trong khoang thoi gian qui dinh san
?>
<div style="background:#ebebea ">
<p class="access">Số người online:<span><?php echo $user_online - 1 ?></span></p>
<p class="access">Lượt truy cập:<span><?php echo $page_visited[visitors] ?></span></p>
 </div>
                          