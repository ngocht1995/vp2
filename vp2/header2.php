
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
									 <a href="index.php"> <h1>HPU</h1>  </a> 								
							</div>
						
							<div class="search-box">
								
									<input onkeypress="searchKeyPress(event);" class="required" id="txthoten" name="txthoten" type="text"  placeholder="Tên sinh viên" maxlength="30" />       
									<img id="bnttracuu" src="images/icon-search.png" style="width:25px;height:25px" />   									 			
							
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 

             </div>
             <script type="text/javascript">
                                    $(document).ready(function(){

                                         $("#bnttracuu").click(function () {

                                            document.getElementById("header").style.display="none";
                                            document.getElementById("table_menu").style.display="block";
                                            document.getElementById("table_menu2").style.display="none";
                                            document.getElementById("table_thongbao").style.display="none";
                                            $("#htht2").html('<div class="gif"><img  src="../images/common/loading.gif" class="loading-gif"><br>Đang tính tiền </div>');   

                                              $.ajax({
                                                type: "POST",
                                                data: "msv_fullname=" + $("#txthoten").val(),
                                                url: "tracuutt/secure_fullname.php",
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
					
						
                                 
                                       <div class="header-right">
                                    <div class="notification_btn">
                                    <ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn"  >
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa fa-btc"></i><span class="badge">7</span></a>
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
                        document.getElementById("table_thongbao").style.display="none";
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
                        $(document).ready(function(){
                            $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                            document.getElementById("header").style.display="none";
                            document.getElementById("table_menu2").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                        document.getElementById("table_thongbao").style.display="none";
                                $("#htht2").html('<div class="gif"><img  src="../images/common/loading4.gif" class="loading-gif"><br>Đang kiểm tra </div>');
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
                                $("#htht2").html('<div class="gif"><img  src="../images/common/loading6.gif" class="loading-gif" style="width:300px;height:200px;"><br>Đang kiểm tra </div>');
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
            </div>

           
            </div>

							   <div id="htht"></div>
							<div id="default_profile" class="profile_details">    
                                    <ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/user.png" alt="" style="width:50px;heigh:50px;"> </span> 
												<div class="user-name">
													<p>Họ tên</p>
													<span style="font-size:9px">Mã sinh viên</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu" style="float: left">
											<li> Chưa có thông tin, vui lòng nhập mã sinh viên! </li> 
											
										</ul>
									</li>
								</ul>
                            </div>
							<div class="clearfix"> </div>				
						</div></div>
				     <div class="clearfix"> </div>	
				</div>
