
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



?>
<?php
function Page_Terminate($url = "") {
        global $conn;

        // Page unload event, used in current page
        $this->Page_Unload();

        // Global page unloaded event (in userfn*.php)
        Page_Unloaded();

        // Close Connection
        $conn->Close();

        // Go to URL if specified
        if ($url <> " ") {
            ob_end_clean();
            header("Location: $url");
        }
        exit();
	}	
?>
<script>
    function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            document.getElementById('bnttracuu').click();
        }
    }
	</script>
<div class="header-main" style="border-radius: 25px">
					<div class="header-left">
							<div class="logo-name">
									 <a id="btn_menu" href="#"> <h1>HPU</h1>  </a> 								
							</div>
						<script type="text/javascript">       
                $(document).ready(function(){
                     $("#btn_menu").click(function () {
                        document.getElementById("header").style.display="block";
                        document.getElementById("table_menu").style.display="none";
                        document.getElementById("table_menu2").style.display="none"; 
                        document.getElementById("table_menu3").style.display="none"; 
                        document.getElementById("table_menu4").style.display="none"; 
                         document.getElementById("table_thongbao").style.display="none"; 


                    });
                  });
                </script>
							<div class="search-box">
								
									<input onkeypress="searchKeyPress(event);" class="required" id="txtmsv" name="txtmsv" type="text"  placeholder="Mã sinh viên/Họ tên" maxlength="30" value="" />       
									<img id="bnttracuu" src="images/icon-search.png" alt="search-box" style="width:25px;height:25px" />   									 			
							
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
						
                                    <script type="text/javascript">
                                   var _0xf0c9=["\x76\x61\x6C","\x23\x74\x78\x74\x6D\x73\x76","\x63\x68\x61\x72\x41\x74","\x64\x69\x73\x70\x6C\x61\x79","\x73\x74\x79\x6C\x65","\x68\x65\x61\x64\x65\x72","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x6E\x6F\x6E\x65","\x74\x61\x62\x6C\x65\x5F\x6D\x65\x6E\x75","\x74\x61\x62\x6C\x65\x5F\x6D\x65\x6E\x75\x32","\x74\x61\x62\x6C\x65\x5F\x6D\x65\x6E\x75\x33","\x74\x61\x62\x6C\x65\x5F\x74\x68\x6F\x6E\x67\x62\x61\x6F","\x62\x6C\x6F\x63\x6B","\x50\x4F\x53\x54","\x6D\x73\x76\x3D","\x73\x65\x63\x75\x72\x65\x2E\x70\x68\x70","","\x73\x68\x6F\x77","\x68\x74\x6D\x6C","\x23\x68\x74\x68\x74","\x68\x69\x64\x65","\x23\x64\x65\x66\x61\x75\x6C\x74\x5F\x70\x72\x6F\x66\x69\x6C\x65","\x3C\x65\x6D\x3E\x4E\x6F\x20\x69\x74\x65\x6D\x20\x72\x65\x73\x75\x6C\x74\x3C\x2F\x65\x6D\x3E","\x61\x6A\x61\x78","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x67\x69\x66\x22\x3E\x3C\x69\x6D\x67\x20\x20\x73\x72\x63\x3D\x22\x2E\x2E\x2F\x69\x6D\x61\x67\x65\x73\x2F\x63\x6F\x6D\x6D\x6F\x6E\x2F\x6C\x6F\x61\x64\x69\x6E\x67\x37\x2E\x67\x69\x66\x22\x20\x63\x6C\x61\x73\x73\x3D\x22\x6C\x6F\x61\x64\x69\x6E\x67\x2D\x67\x69\x66\x22\x3E\x3C\x62\x72\x3E\u0110\x61\x6E\x67\x20\x74\xEC\x6D\x20\x6B\x69\u1EBF\x6D\x20\x3C\x2F\x64\x69\x76\x3E","\x23\x68\x74\x68\x74\x32","\x6D\x73\x76\x5F\x66\x75\x6C\x6C\x6E\x61\x6D\x65\x3D","\x74\x72\x61\x63\x75\x75\x74\x74\x2F\x73\x65\x63\x75\x72\x65\x5F\x66\x75\x6C\x6C\x6E\x61\x6D\x65\x2E\x70\x68\x70","\x63\x6C\x69\x63\x6B","\x23\x62\x6E\x74\x74\x72\x61\x63\x75\x75","\x72\x65\x61\x64\x79"];$(document)[_0xf0c9[30]](function(){$(_0xf0c9[29])[_0xf0c9[28]](function(){var _0x10a4x1=$(_0xf0c9[1])[_0xf0c9[0]]();var _0x10a4x2=_0x10a4x1[_0xf0c9[2]](0);if(!isNaN(_0x10a4x2)){document[_0xf0c9[6]](_0xf0c9[5])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];document[_0xf0c9[6]](_0xf0c9[8])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];document[_0xf0c9[6]](_0xf0c9[9])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];document[_0xf0c9[6]](_0xf0c9[10])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];document[_0xf0c9[6]](_0xf0c9[11])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[12];$[_0xf0c9[23]]({type:_0xf0c9[13],data:_0xf0c9[14]+ $(_0xf0c9[1])[_0xf0c9[0]](),url:_0xf0c9[15],success:function(_0x10a4x3){if(_0x10a4x3!= _0xf0c9[16]){$(_0xf0c9[19])[_0xf0c9[18]](_0x10a4x3)[_0xf0c9[17]]();$(_0xf0c9[21])[_0xf0c9[20]]()}else {$(_0xf0c9[19])[_0xf0c9[18]](_0xf0c9[22])}}})}else {$(_0xf0c9[25])[_0xf0c9[18]](_0xf0c9[24]);document[_0xf0c9[6]](_0xf0c9[5])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];document[_0xf0c9[6]](_0xf0c9[8])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[12];document[_0xf0c9[6]](_0xf0c9[9])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];document[_0xf0c9[6]](_0xf0c9[10])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];document[_0xf0c9[6]](_0xf0c9[11])[_0xf0c9[4]][_0xf0c9[3]]= _0xf0c9[7];$[_0xf0c9[23]]({type:_0xf0c9[13],data:_0xf0c9[26]+ $(_0xf0c9[1])[_0xf0c9[0]](),url:_0xf0c9[27],success:function(_0x10a4x3){if(_0x10a4x3!= _0xf0c9[16]){$(_0xf0c9[25])[_0xf0c9[18]](_0x10a4x3)[_0xf0c9[17]]()}else {$(_0xf0c9[25])[_0xf0c9[18]](_0xf0c9[22])}}})}})})
                                    </script>
                                    <div class="notification_btn">
                                    <ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn"  >
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa fa-btc"></i><span class="badge">5</span></a>
										<ul class="dropdown-menu" >
											<li>
												<div class="notification_header">
													<h3>Tài chính sinh viên</h3>
												</div>
                                            </li>
                                             <?php                                        
                                            for ($i=0;$i<=$rowswrk-1;$i++)
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
                                            
											<li><a href="#" id="atracuu<?php echo $arwrk[$i]['services_id']; ?>">
											   <div class="notification_desc">
												<p><?php echo $arwrk[$i]['name_ser']; ?></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>		     
                       <script type="text/javascript">       
                $(document).ready(function(){

                     $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                        document.getElementById("header").style.display="none";
                        document.getElementById("table_menu2").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                        document.getElementById("table_menu3").style.display="none";
                        document.getElementById("table_thongbao").style.display="none";
                        document.getElementById("table_menu4").style.display="none";
                       $("#htht2").html('<div class="gif"><img  src="../images/common/loading2.gif" class="loading-gif"><br>Đang tính tiền </div>');
                       $.ajax({
                            type: "POST",
                            data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                            url: "tracuutt/msvajax.php",
                            success: function(msg){
                                if (msg != ''){      
                                   $("#htht2").html(msg).show(); 

                                }
                                else{
                                    $("#htht2").html('<em>No item result</em>');
                                }
                            }
                        });
                    });
                  });
                </script>  
                 <?php } }?>   
                                    </ul>
                                    </li>         
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-line-chart"></i><span class="badge blue">8</span></a>
										<ul class="dropdown-menu" >
											<li >
												<div class="notification_header">
													<h3>Kết quả học tập</h3>
												</div>
											</li>
											<?php
                                                for ($i=0;$i<=$rowswrk-1;$i++)
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
                                            <li><a href="#" id="atracuu<?php echo $arwrk[$i]['services_id']; ?>">
											   <div class="notification_desc">
												<p><?php echo $arwrk[$i]['name_ser']; ?></p>
												</div>
											   <div class="clearfix"></div>	
                                            </a></li>	
                            <script type="text/javascript">
                        $(document).ready(function(){
                            $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                            document.getElementById("header").style.display="none";
                            document.getElementById("table_menu2").style.display="none";
                            document.getElementById("table_menu3").style.display="none";
                            document.getElementById("table_menu4").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                        document.getElementById("table_thongbao").style.display="none";
                  $("#htht2").html('<div class="gif"><img  src="../images/common/loading3.gif" class="loading-gif"><br>Đang kiểm tra điểm </div>'); 
                                $.ajax({
                                    type: "POST",
                                    data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                                    url: "tracuutt/msvajax.php",
                                    success: function(msg){
                                        if (msg != ''){
                                            $("#htht2").html(msg).show();
                                        }
                                        else{
                                            $("#htht2").html('<em>No item result</em>');
                              }
                          }
                      });
                  });
                });
              </script> 
              <?php } }?> 
										</ul>
									</li>	
									<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bed"></i><span class="badge blue">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>Khách sạn sinh viên</h3>
												</div>
                                            </li>
                                            <?php
                    for ($i=0;$i<=$rowswrk-1;$i++)
                    {  
                  if(
                     ($arwrk[$i]['code_ser'] == 'SinhvienKSSV') || 
                     ($arwrk[$i]['code_ser'] == 'KssvPhongTrong') ||
                     ($arwrk[$i]['code_ser'] == 'SoChoTrongKSSV')     
                     )  
                  {
                 ?>    
							<li><a href="#" id="atracuu<?php echo $arwrk[$i]['services_id']; ?>">
											   <div class="notification_desc">
												<p><?php echo $arwrk[$i]['name_ser']; ?></p>
												</div>
											   <div class="clearfix"></div>	
                                            </a></li>
                                            <script type="text/javascript">
                        
              </script> 
              <?php } }?> 
										</ul>
									</li>	
                                     <li class="dropdown head-dpdn">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-calendar"></i><span class="badge blue">3</span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>Thời khóa biểu sinh viên</h3>
                                                </div>
                                            </li>
                                            <?php
                                            for ($i=0;$i<=$rowswrk-1;$i++)
                                            {  
                                          if(
                                             ($arwrk[$i]['code_ser'] == 'TKB') ||      
                                             ($arwrk[$i]['code_ser'] == 'LichTrucNhat') ||
                                             ($arwrk[$i]['code_ser'] == 'LichThiHK')
                                             )  
                                          {
                                         ?>              
                        <li><a href="#" id="atracuu<?php echo $arwrk[$i]['services_id']; ?>">
                                               <div class="notification_desc">
                                                <p><?php echo $arwrk[$i]['name_ser']; ?></p>
                                                </div>
                                               <div class="clearfix"></div> 
                                            </a></li>
                                            <script type="text/javascript">
                        $(document).ready(function(){
                            $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                            document.getElementById("header").style.display="none";
                            document.getElementById("table_menu2").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                        document.getElementById("table_thongbao").style.display="none";
                        document.getElementById("table_menu3").style.display="none";
                        document.getElementById("table_menu4").style.display="none";
                                $("#htht2").html('<div class="gif"><img  src="../images/common/loading6.gif" class="loading-gif" style="width:300px;height:200px;"><br>Đang kiểm tra </div>');
                                $.ajax({
                                    type: "POST",
                                    data: "msv="+$("#txtmsv").val()+"&ser_code=" + '<?php echo $arwrk[$i]['services_id']; ?>',
                                    url: "tracuutt/msvajax.php",
                                    success: function(msg){
                                        if (msg != ''){
                                            $("#htht2").html(msg).show();
                                        }
                                        else{
                                            $("#htht2").html('<em>No item result</em>');
                              }
                          }
                      });
                  });
                });
              </script> 
              <?php } }?> 
                                        </ul>
                                    </li>   
            </div>

           
            </div>

							   <div id="htht"></div>
							<div id="default_profile" class="profile_details">    
                                    <ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="/images/user.png" alt="" style="width:50px;height:50px;"> </span> 
												<div class="user-name">
													<p>Họ tên</p>
													<span style="font-size:9px">Mã sinh viên</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> Chưa có thông tin, vui lòng nhập mã sinh viên! </li> 
											
										</ul>
									</li>
								</ul>
                            </div>
							<div class="clearfix"> </div>				
						</div></div>
				     <div class="clearfix"> </div>	
				</div>
