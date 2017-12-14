
 <div class="sidebar-menu" style="border-radius: 25px">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Trang chủ</span></a></li>
		    	<li><a href="http://lib.hpu.edu.vn"><i class="fa fa-rss"></i><span>Đừng vào</span></a></li>
		        <li><a href="#"><i class="fa fa-calendar-check-o"></i><span>Đừng tra</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
		        	 	<li><a href="http://hpu.edu.vn/thoikhoabieu/Tkb_GiaoVien/DanhSachGiaoVien.html">Thời khóa biểu giáo viên</a></li>
		        	 	<li><a href="http://hpu.edu.vn/thoikhoabieu/Tkb_Lop/DanhSachLop.html">Thời khóa biểu lớp</a></li>
			            <li><a href="http://hpu.edu.vn/thoikhoabieu/Tkb_PhongHoc/DanhSachPhongHoc.html">Thời khóa biểu phòng học</a></li>
		             </ul>
		        </li>  
						<li><a href="#"><i class="fa fa-question" style="font-size: 30px"></i><span>Đừng hỏi</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
		        	 	<li id="sbtn_faq" ><a href="#">Câu hỏi thường gặp</a></li>
			            <li id="" ><a href="cauhoi/cauhoi.php">Đặt câu hỏi</a></li>
			            <li id="" ><a href="cauhoi/traloi.php">Câu hỏi đã trả lời</a></li>
		             </ul>
		        </li>    
		        <li id="sbtn_notice"><a href="#"><i class="fa fa-bell-o"></i><span>Đừng xem</span></a></li>
		        <li><a href="tracuutt/muonsachthuvien.php"><i class="fa fa-book"></i><span>Đừng mượn</span></a></li>
						<li><a href="http://dieukien.hpu.edu.vn"><i class="fa fa-tree"></i><span>Đừng leo</span></a></li>
		    		<li><a href="http://qlgd.hpu.edu.vn"><i class="fa fa-check-square-o"></i><span>Đừng check</span></a></li>
						<li><a href="http://tailieu.hpu.edu.vn"><i class="fa fa-database"></i><span>Đừng tìm</span></a></li>
						<li><a href="cauhoi/traloi.php"><i class="fa fa-search"></i><span>Đừng vào</span></a></li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
	
<script type="text/javascript">
	
var toggle = true;
  // function w3_close() {
		// 		$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
  //  				 $("#menu span").css({"position":"absolute"});
		// };

$(".sidebar-icon").click(function() {               
  if (toggle)
	{
		$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
	}
	else
	{
		$(".page-container").removeClass("sidebar-collapsed-back").addClass("sidebar-collapsed");	
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
toggle=!toggle;
});
</script>