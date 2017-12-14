 <style type="text/css">

div#divMenu ul#category
{
 	clear: both;
 	width:270px;
}


.menu_head {
   cursor: pointer;
   position: relative;
    font-weight:bold;
   /* background: #eef4d3 url(left.png) center right no-repeat;*/
    background: url('../images/common/WebResource1.axd.gif') no-repeat;
    padding-left:10px;
    font-size:100%;
    background-position:left 3px;
    color: #393738;
    
}
.menu_body {
	display:none;
	padding-left:15px;
}
.menu_body a{
  display:block;
  color:#006699;
  padding-left:17px;
  padding-bottom: 3px;
  background: url('../images/common/WebResource.axd.gif') no-repeat;
  text-decoration:none;
   color: #393738;
   cursor: pointer;
   
   
}
.menu_body a:hover{
  color: #000000;
  }
a.amenuheader {
	color:black;
}
div.divimg {
    background-image:url("../images/bgline_10.gif");
    background-repeat:repeat-x; 
    height:10px;
}
</style>
<link href="../css/font-awesome.css" rel="stylesheet"> 
<div style="clear: both"></div>

<div style="clear: both"></div>
 <div style="position: relative;top:150px;background-color:rgba(33, 33, 33, 0.75);font-size: 15px;height: 30px;text-align: center;border-radius: 15px;padding-top: 10px;width: 1100px">
<?php
$sSqlWrk = "Select * From intro_subject Where (chuyenmuc_belongto = 0) And (trang_thai=1)";
 // echo $sSqlWrk;
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);
?>

       
  <?php
    For ($i=0;$i < $rowswrk;$i++)
            {
            $title= $arwrk[$i]['ten_chuyenmuc'];
            $sSqlWrk = "SELECT * FROM intro_subject";
                $sWhereWrk = "trang_thai = 1 and chuyenmuc_belongto =" .$arwrk[$i]['chuyenmuc_id']. " order by thoigian_them,thoigian_sua ASC ";
                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                //echo $sSqlWrk;
                $rs = $conn->Execute($sSqlWrk);
                $ar = ($rs) ? $rs->GetRows() : array();
                if ($rs) $rs->Close();
                $rows = count($ar);
  
  ?>              
                <?php
                
                   if((KillChars(htmlspecialchars($_GET['belongto'],ENT_QUOTES)) <> null) && ($arwrk[$i]['chuyenmuc_id'] == KillChars(htmlspecialchars($_GET['belongto'],ENT_QUOTES))))
                   { $style_active="style=\"display: block;\"";  } else  { $style_active="";}
                ?>
                     
                   <?php
                    For ($j=0;$j < $rows;$j++)
                     {
                    $url1="../notice_message/ds_notice.php?categories_id=".$ar[$j]['chuyenmuc_id']."&belongto=".$ar[$j]['chuyenmuc_belongto'];
                    $title1= $ar[$j]['ten_chuyenmuc'];   
                     if((KillChars(htmlspecialchars($_GET['categories_id'],ENT_QUOTES)) <> null) && ($ar[$j]['chuyenmuc_id'] == KillChars(htmlspecialchars($_GET['categories_id'],ENT_QUOTES))))
                     { $style_activelevel="style=\"color: #fc9603;\"";  } else  { $style_activelevel="";}
                    ?>
                   
                       <a <?php echo $style_activelevel  ?> href="<?php echo $url1 ?>">&nbsp; -<?php echo $title1; ?>  &nbsp; &nbsp;    </a>   
                                         <?php } ?>
                 
                    <!-- end menu body-->  </div>

               <div class="divimg"></div> 
     <?php } ?>
    <!-- end code menu-->
					  
<!-- END divMenu-->
