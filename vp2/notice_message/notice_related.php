<?php
    $sSql_related = "SELECT  * FROM `intro_article` WHERE (intro_article.trang_thai = 1) AND (chuyenmuc_id = " . $categories_id.") AND (baiviet_id <> ".$noitce_id.") LIMIT 10";   
    $rswrk_related = $conn->Execute($sSql_related);
    $arwrk_related = ($rswrk_related) ? $rswrk_related->GetRows() : array();
    if ($rswrk_related) $rswrk_related->Close();
    $rowswrk = count($arwrk_related);
    if ($rowswrk >0)
    {
?>
<h2 class="cactinkhac"> Tin liên quan</h2>
    <?php
    for ($j =0; $j< $rowswrk; $j++ )
    { 
    $url ="../notice_message/newsdetail-".$categories_id."-".$belongto."-".$arwrk_related[$j]['baiviet_id']."-".changeTitle($arwrk_related[$j]['tieude_baiviet']).".html"; 
    ?>
<p class="phead_thongbao"> <a Title="Văn phòng hỗ trợ sinh viên - Support Online" class="ahead_thongbao" href="<?php echo $url ?>"> <?php echo $arwrk_related[$j]['tieude_baiviet'] ?> <span id="spanthoigian1" style="color:#14393a;font-weight: bold;font-size: 11px">( Từ: <?php echo date_format(date_create($arwrk_related[$j]['begin_date']), 'd/m/Y') ?> Đến:<?php echo date_format(date_create($arwrk_related[$j]['end_date']), 'd/m/Y') ?>)</span></a> </p>
  <?php }?>
<?php }?>