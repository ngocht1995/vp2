          <script type="text/javascript">
	
	$(document).ready( function() {
	
		// When site loaded, load the Popupbox First
	
	
		$('#popupBoxClose').click( function() {			
			unloadPopupBox();
		});
                
                $('#popupClose').click( function() {			
			unloadPopupBox();
		});
                
               function unloadPopupBox() {	// TO Unload the Popupbox
			$('#popup_box').fadeOut("slow");
			$("#container").css({ // this is just for style		
				"opacity": "1"  
			}); 
                        $("#container").hide();
		}	
		
		
		/**********************************************************/
		
	});
</script>
   <div id="popup_box13">	<!-- OUR PopupBox DIV-->
    <h1 class="h1abc">Nhằm giúp nhà trường không ngừng nâng cao chất lượng dạy và học ! </h1>
    <dl class="dlabc">
        <dt>* Đề nghị bạn cho ý kiến phản hồi:</dt>
            <dd style="paddingt:5px 5px 5px 20px">- Về môn học</dd>
          <dt> Trong học kỳ I năm học 2013 - 2014 </dt>
        </dl> 
	
        <center> 
             <a id="agree"  target="_blank" href="http://thamdo.hpu.edu.vn" title="Văn phòng hỗ trợ trực tuyến" ><img id="adongy" src="../images/common/img_dongy.jpg"></a>
        </center>
</div>