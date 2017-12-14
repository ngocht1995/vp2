
<?php
$conn = ew_Connect();
$sSqlWrk = "Select * From `t_manager_services`";
$sWhereWrk = "`active_ser` = 1 order by `oder` asc ";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
//echo $sSqlWrk;
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);

date_default_timezone_set('UTC');
function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
        
 function cmp($a, $b)
{
    global $array;
    return strcmp($a, $b);
}
use \Httpful\Request;
if ($msv <> "" || $msv <>null )
{   
                 
          $conn = ew_Connect();
    // xac dinh tham do hay 
    $today = date("Y-m-d H:i:s");    
    $sSqlWrk = "Select * From `t_setting` Where (set_id=2) And (set_active=1) And (t_setting.set_date_start<='$today') And (t_setting.set_date_end>='$today')";   
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    if ($rowswrk){
        $thamdo=true;
        $trangthai_thamdo = $arwrk[0]['set_status'];
        $GLOBALS['content_ax'] = $arwrk[0]['set_description'];
        $uri = "http://thamdo.hpu.edu.vn/api/v1/thamdo/".$msv."";
        $response = Request::get($uri)->send();
        $array= $response->body;
        $monhocthamdo=objectToArray($array) ;
        //echo '<pre>'; print_r($monhocthamdo);echo '</pre>';
            $_SESSION['monhocthamdo'] = $monhocthamdo;
    } else 
    {
        $thamdo=false;
        $trangthai_thamdo = '';
        $content_ax ='';
      }        
             
} 
// add thong tin tham do   


?>
<div class="dropmenu1">
 <div class="dropdown"  style="position: relative;left:70px;top:120px">
  <button id="drbtn" class="dropbtn" onclick="opendr()"  style="background-color:#0a73e0 "><i class="fa fa-user" style="font-size: 30px"></i><br>Cá nhân sinh viên</button>
  <div id="drcontent" class="dropdown-content" style="background-color: #0a73e0">
    
                  <?php
                    for ($i=0;$i<=$rowswrk;$i++)
                    {  
                  if(
                     ($arwrk[$i]['code_ser'] == 'ThongTinSinhVien')
                    ||($arwrk[$i]['code_ser'] == 'HocBongSinhVien')
                    ||($arwrk[$i]['code_ser'] == 'GiayToDaNop') 
                          )  
                  {
                 ?>   
                <a href="#" id="atracuu<?php echo $arwrk[$i]['services_id']; ?>"><?php echo $arwrk[$i]['name_ser'] ?></a>

             <script type="text/javascript">
              var ext=document.getElementById("drcontent");
              var toggle=true;
             function opendr(){        
              if(toggle) {ext.style.display="block";ext2.style.display="none";toggle2=true;ext3.style.display="none";toggle3=true;ext4.style.display="none";toggle4=true}
              else {ext.style.display="none";}
              toggle=!toggle;
             }
          $(document).ready(function(){
               $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                 $("#htht").html('<div class="gif" ><img  src="../images/common/loading.gif" class="loading-gif"><br>Đang bắt thông tin</div>');
                 $.ajax({
                      type: "POST",
                      data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                      url: "msvajax.php",
                      success: function(msg){
                          if (msg != ''){
                             $("#htht").html(msg).show();
                             ext.style.display="none";
                          }
                          else{
                              $("#htht").html('<em>No item result</em>');
                              ext.style.display="none";
                          }
                      }
                  }) 
              });
            });
          </script> 
  <?php } }?> 
  </div>
</div>  
</div>
<div class="dropmenu2">
<div class="dropdown"  style="position: relative;left:70px;top:120px">
  <button class="dropbtn" id="drbtn2" onclick="opendr2()" style="background-color: #66b84c"><i class="fa fa-credit-card" style="font-size: 30px"></i><br>Tài chính sinh viên</button>
  <div id="drcontent2" class="dropdown-content" style="background-color: #66b84c">            
                <?php
                    for ($i=0;$i<=$rowswrk;$i++)
                    {  
                  if(
                     ($arwrk[$i]['code_ser'] == 'CacKhoanDaChi')
                   ||($arwrk[$i]['code_ser'] == 'MienGiamHP')
                   ||($arwrk[$i]['code_ser'] == 'NoTienKSSV')       
                   ||($arwrk[$i]['code_ser'] == 'CacKhoanDaNop') 
                   ||($arwrk[$i]['code_ser'] == 'CacKhoanThieu')
                   ||($arwrk[$i]['code_ser'] == 'CacKhoanThieu-HKPhu')
                   ||($arwrk[$i]['code_ser'] == 'SuDungDienNuocKSSVTheoSinhVien')        
                          )  
                  {
                 ?>            
   <a  id="atracuu<?php echo $arwrk[$i]['services_id']; ?>" ><?php echo $arwrk[$i]['name_ser'] ?></a>

                 <script type="text/javascript">
                   var ext2=document.getElementById("drcontent2");
              var toggle2=true;
             function opendr2(){        
              if(toggle2) {ext2.style.display="block";ext.style.display="none";toggle=true;ext3.style.display="none";toggle3=true;ext4.style.display="none";toggle4=true}
              else {ext2.style.display="none";}
              toggle2=!toggle2;
             }
                $(document).ready(function(){
                     $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                       $("#htht").html('<div class="gif"><img  src="../images/common/loading2.gif" class="loading-gif"><br>Đang tính tiền </div>');
                       $.ajax({
                            type: "POST",
                            data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                            url: "msvajax.php",
                            success: function(msg){
                                if (msg != ''){
                                   $("#htht").html(msg).show();
                                   
                                   ext2.style.display="none";
                                }
                                else{
                                    $("#htht").html('<em>No item result</em>');
                                    ex2t.style.display="none";
                                }
                            }
                        });
                    });
                  });
                </script> 

    <?php } }?> 
  </div>
</div>
</div>
<div class="dropmenu3">
 <div class="dropdown" style="position: relative;left:70px;top:120px">
  <button id="drbtn3" onclick="opendr3()" class="dropbtn" style="background-color: #efae38"><i class="fa fa-bar-chart" style="font-size: 30px"></i><br>Kết quả học tập</button>
  <div id="drcontent3" class="dropdown-content" style="background-color: #efae38">  
               
 <?php
                    for ($i=0;$i<=$rowswrk;$i++)
                    {  
                  if(
                     ($arwrk[$i]['code_ser'] == 'MonHocDangKy')       
                   ||($arwrk[$i]['code_ser'] == 'KhungChuongTrinh') 
                   ||($arwrk[$i]['code_ser'] == 'SinhvienDiemRenLuyen') 
                   ||($arwrk[$i]['code_ser'] == 'MonSinhVienNoMon')
                   ||($arwrk[$i]['code_ser'] == 'DiemMonHocTrongKy')
                   ||($arwrk[$i]['code_ser'] == 'XepHangNam') 
                   ||($arwrk[$i]['code_ser'] == 'BangDiemToanKhoa')     
                   ||($arwrk[$i]['code_ser'] == 'BangDiem')      
                     )  
                  {
                 ?>  
   <a id="atracuu<?php echo $arwrk[$i]['services_id']; ?>"><?php echo $arwrk[$i]['name_ser'] ?></a>
    
              <script type="text/javascript">
                 var ext3=document.getElementById("drcontent3");
              var toggle3=true;
             function opendr3(){        
              if(toggle3) {ext3.style.display="block";ext2.style.display="none";toggle2=true;ext.style.display="none";toggle=true;ext4.style.display="none";toggle4=true;}
              else{ext3.style.display="none"}
              toggle3=!toggle3;
             }
              $(document).ready(function(){
                   $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                     $("#htht").html('<div class="gif"><img  src="../images/common/loading3.gif" class="loading-gif"><br>Đang kiểm tra điểm </div>');
                     $.ajax({
                          type: "POST",
                          data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                          url: "msvajax.php",
                          success: function(msg){
                              if (msg != ''){
                                 $("#htht").html(msg).show();
                                 ext3.style.display="none";
                              }
                              else{
                                  $("#htht").html('<em>No item result</em>');
                                  ext3.style.display="none";
                              }
                          }
                      });
                  });
                });
              </script> 

 <?php } }?> 
  </div>
  </div>
  </div>        
  <div class="dropmenu4">
<div class="dropdown"  style="position: relative;left:70px;top:120px">
  <button id="drbtn4" onclick="opendr4()" class="dropbtn" style="background-color: #d5554c"><i class="fa fa-building-o" style="font-size: 30px"></i><br>Khách sạn sinh viên</button>
  <div id="drcontent4" class="dropdown-content" style="background-color: #d5554c">  
              <?php
                    for ($i=0;$i<=$rowswrk;$i++)
                    {  
                  if(
                     ($arwrk[$i]['code_ser'] == 'SinhvienKSSV') || 
                     ($arwrk[$i]['code_ser'] == 'KssvPhongTrong') ||
                     ($arwrk[$i]['code_ser'] == 'SoChoTrongKSSV')     
                     )  
                  {
                 ?>    

  <a id="atracuu<?php echo $arwrk[$i]['services_id']; ?>"><?php echo $arwrk[$i]['name_ser'] ?></a>

                 <script type="text/javascript">
                var ext4=document.getElementById("drcontent4");
              var toggle4=true;
             function opendr4(){        
              if(toggle4) {ext4.style.display="block";ext2.style.display="none";toggle2=true;ext3.style.display="none";toggle3=true;ext.style.display="none";toggle=true}
              else{ext4.style.display="none";}
              toggle4=!toggle4;
             }
               $(document).ready(function(){       
     $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
         <?php
               if(
                     ($arwrk[$i]['code_ser'] == 'KssvPhongTrong') ||
                     ($arwrk[$i]['code_ser'] == 'SoChoTrongKSSV')     
                  ) 
               {
         ?>
         if ($("#txtmsv").val()== '') {
           $("#txtmsv").val('nhập MSV');
             }
          <?php } ?>              
        $("#htht").html('<div class="gif"><img  src="../images/common/loading4.gif" class="loading-gif"><br>Đang tải</div>');
        $.ajax({
            type: "POST",
            data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
            url: "msvajax.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                   ext4.style.display="none";
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                    ext4.style.display="none";
                }
            }
        });
    });
  });
</script>                
    <?php } }?> 
  </div>  
    </div>   
    </div>                       
    <!-- end menu body-->      	          
     
        
