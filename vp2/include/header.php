<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta id="e_vb_meta_bburl" name="vb_meta_bburl" content="http://vp.hpu.edu.vn" />
<meta name="google-site-verification" content="xQVyOCGrMpj4oEeIrFzV4LmmviB-TVTRAaZdux4ZY5M" />
<meta name="keywords" content="Văn phòng hỗ trợ trực tuyến,Support Online, HPU, đại học dân lập Hải Phòng, sinh viên, 4rum, forum, HPU Online" />
<meta name="description" content="Văn phòng hỗ trợ trực tuyến" />
<meta property="og:site_name" content="HPU Support Online -Văn phòng hỗ trợ trực tuyến" />
<meta property="og:description" content="HPU Support Online -Văn phòng hỗ trợ trực tuyến" />
<meta property="og:url" content="http://vp.hpu.edu.vn" />
<meta property="og:type" content="website" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39001712-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    
    <title>Văn phòng hỗ trợ trực tuyến</title>
    <link href="../css/style.css" media="screen" rel="stylesheet"/>
    <link href="../css2/login.css" media="screen" rel="stylesheet"/>
    <script src="../js2/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
    <link rel="icon" type="text/css" href="../images/common/img_logo.png">
    <script type="text/javascript" src="../js2/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js2/localization/messages_vi.js"></script>
    <script type="text/javascript" src="../js2/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="../js2/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
   <link rel="stylesheet" type="text/css" href="../js2/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
   
<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/	
			$("a#example5").fancybox();

					$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

	});
	</script>

     <script type="text/javascript">
$(document).ready(function()
{        
    //for div
	 $("div.a1:odd").css("background-color", "#F1EDED");
	 $("div.a1:even").css("background-color", "#FFFFFF");
	//slides the element with class "menu_body" when paragraph with class "menu_head" is clicked 
	$("#firstpane p.menu_head").click(function()
    {
		$(this).css({backgroundImage:"url(../images/common/WebResource1.axd.gif)"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
      	});
	//slides the element with class "menu_body" when mouse is over the paragraph
	$("#secondpane p.menu_head").mouseover(function()
    {
	     $(this).css({backgroundImage:"url(../images/common/WebResource1.axd.gif)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
       	});
});
function RemoveBad(strTemp) { 
    strTemp = strTemp.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g,""); 
    return strTemp;
} 
</script>

</head>


    <body>   
        <script type="text/javascript">
            <!--
            var EW_DATE_SEPARATOR = "/";
            if (EW_DATE_SEPARATOR == "") EW_DATE_SEPARATOR = "/"; // Default date separator
            var EW_UPLOAD_ALLOWED_FILE_EXT = "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip"; // Allowed upload file extension
            var EW_FIELD_SEP = ", "; // Default field separator

            // Ajax settings
            var EW_RECORD_DELIMITER = "\r";
            var EW_FIELD_DELIMITER = "|";
            var EW_LOOKUP_FILE_NAME = "../include/ewlookup6.php"; // lookup file name

            //var EW_ADD_OPTION_FILE_NAME = ""; // add option file name
            var EW_BUTTON_SUBMIT_TEXT = "    Add    ";
            var EW_BUTTON_CANCEL_TEXT = "  Cancel  ";

            //-->
        </script>
        <script type="text/javascript" src="../admincontent/js/ewp6.js"></script>
        <?php
        session_start(); // Initialize session data
        ob_start(); // Turn on output buffering
        include "call_email.php"
                ?>

