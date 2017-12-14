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


<div>
           <div > 
             <i class="fa fa-book" style="font-size: 50px"> </i>
        <h2>Thư viện</h2>
        <p class="sub-title"><b>Thông tin sách mượn tại thư viện</b></p>    
                        <input  class="required" id="txtmsv" name="txtmsv" type="text"  placeholder="Mã sinh viên" maxlength="12" />       
            <span id="msgbox" style="display:none"></span>   
                <?php
                    for ($i=0;$i<=$rowswrk;$i++)
                    {  
                  if(
                     ($arwrk[$i]['code_ser'] == 'BanDocQuaHan')
                 
                          )  
                  {
                 ?>            
               <button id="atracuu<?php echo $arwrk[$i]['services_id']; ?>">Kiểm tra </button>
                  <br><br>
             <script type="text/javascript">
$(document).ready(function(){
     $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
       $("#htht").html('<div style="margin:0 auto"><img  src="../images/common/loading5.gif" class="loading-gif" style="width:360;height:250;"></div><h2>Đang tra cứu</h2>' );
       $.ajax({
            type: "POST",
            data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
            url: "msvajax.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script> 
                   
   <?php } }?>              
    <!-- end menu body--> 
      
<!-- END divMenu--></div>    
       
        