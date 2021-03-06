<?php  include "../include/header.php" ?>

<?php include "../include/top_header.php";?>
 
;
}
ul.dropdown-menu {
    min-width: 195px;
}
.profile_details ul li ul.dropdown-menu.drp-mnu {
    min-width: 160px;
    left:-90%;

}
.popular-follo-right h4 {
    font-size: 1em;
}
.popular-follo-right h5 {
    font-size: 0.85em;
}
.popular-follo-right {
    padding: 1.45em 1em;
}
.popular-bran-left h3 {
    font-size: 1em;
}
.page-container.sidebar-collapsed .sidebar-menu {
    width: 130px;
}
.market-update-block h3 {
    font-size: 1.7em;
}
.forgot a {
    font-size: 0.65em;
}
.inbox-details-body input[type="text"] {   
    font-size: 0.8em;
    height: 33px;
}
.forgot a {
    font-size: 0.6em;
}
.b_label, .bar_label_min, .bar_label_max, .b_tooltip span {
    font-size: 11px;
}
.b_tooltip {
    padding: 4px 7px 7px 7px;
}
ul{
    font-size:8px;
}

}


                                                                                                                                                                                                            ult';

    // Page Name
    function PageName() {
        return ew_CurrentPage();
    }

    // Page Url
    function PageUrl() {
        $PageUrl = ew_CurrentPage() . "?";
        return $PageUrl;
    }

    // Message
    function getMessage() {
        return @$_SESSION[EW_SESSION_MESSAGE];
    }

    function setMessage($v) {
        if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
            $_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
        } else {
            $_SESSION[EW_SESSION_MESSAGE] = $v;
        }
    }

    // Show Message
    function ShowMessage() {
        if ($this->getMessage() <> "") { // Message in Session, display
            echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
            $_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
        }
    }

    // Validate Page request
    function IsPageRequest() {
        return TRUE;
    }

    //
    //  Class initialize
    //  - init objects
    //  - open connection
    //
    function cdefault() {
        global $conn;

        // Initialize user table object
        $GLOBALS["user"] = new cuser;

        // Intialize page id (for backward compatibility)
        if (!defined("EW_PAGE_ID"))
            define("EW_PAGE_ID", 'default', TRUE);

        // Open connection to the database
        $conn = ew_Connect();
    }

    //
    //  Page_Init
    //
    function Page_Init() {
        global $gsExport, $gsExportFile, $user;
        global $Security;
        $Security = new cAdvancedSecurity();

        // Global page loading event (in userfn6.php)
        Page_Loading();

        // Page load event, used in current page
        $this->Page_Load();
    }

    //
    //  Page_Terminate
    //  - called when exit page
    //  - if URL specified, redirect to the URL
    //
    function Page_Terminate($url = "") {
        global $conn;

        // Page unload event, used in current page
        $this->Page_Unload();

        // Global page unloaded event (in userfn*.php)
        Page_Unloaded();

        // Close Connection
        $conn->Close();

        // Go to URL if specified
        if ($url <> "") {
            ob_end_clean();
            header("Location: $url");
        }
        exit();
    }

    // Page main processing
    function Page_Main() {

    }

    // Page Load event
    function Page_Load() {

        //echo "Page Load";
        
        
        $now = time();
        if (!isset($_SESSION["Dem"]) ){

            $_SESSION["Dem"] = 0;
            $_SESSION['expire'] = time() +30 ;
        // echo "Count :" . $_COOKIE["count"] . "!<br>";
        }
        else
        {

          //echo "Nows count:" . $_SESSION["Dem"];
        }
         //   echo "time" .$_SESSION['expire'] . "<br>";
           // echo "Now". $now;

        if($now > $_SESSION['expire'])
        {
            unset($_SESSION["Dem"]);
            //echo "Your session has expire ";
/*--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/
h4, h5, h6,
h1, h2, h3 {margin: 0;}
ul, ol {margin: 0;}
p {margin: 0;}
html, body{
  font-family: 'Work Sans', sans-serif;
   font-size: 100%;
}
a {
  text-decoration: none;
}
a:hover {
  transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
  text-decoration:none;
}
.gif{
  text-align: center;
}
.loading-gif{
  border-radius: 25px;
}
.error{
  text-align: center;
}
.error_picture{
  border-radius: 25px;
}
.export{
  display:none;
}
.notice_picture{
  padding-left: 300px;
}

.fixed{
	position: fixed;
    top: 0;
    left:65px;
	 width:87%;
    margin: 0 auto;
	z-index: 1;
	background:#fff;
}
/*--header main start here--*/
.page-container {
  min-width: 1260px;
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  margin: 0px auto;
  background-color: #2db0e2
}
.left-content {
    float: right;
        width: 86.5%;
}
.page-container.sidebar-collapsed {
  transition: all 100ms linear;
  transition-delay: 300ms;

}
.page-container.sidebar-collapsed .left-content {
   float: right;
   width: 96%;
}
.page-container.sidebar-collapsed-back {
    transition: all 100ms linear;
}
.page-container.sidebar-collapsed-back .left-content {
  transition: all 100ms linear;
  -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    transition: all 0.3s ease;
	float: right;
    width:86%;
}
.page-container.sidebar-collapsed .sidebar-menu {
  width: 65px;
  transition: all 100ms ease-in-out;
  transition-delay: 300ms;
}

.page-container.sidebar-collapsed-back .sidebar-menu {
  width: 230px;
  transition: all 100ms ease-in-out;
}

.page-container.sidebar-collapsed .sidebar-icon {
   transition: all 300ms ease-in-out;
	   color: #fff;
    background:#68AE00;

}
.page-container.sidebar-collapsed .logo {
  box-sizing: border-box;
  transition: all 100ms ease-in-out;
  transition-delay: 300ms;
      left: 18px;
    
}
.page-container.sidebar-collapsed-back .logo {
  width: 100%;
  height:60px;
  box-sizing: border-box;
  transition: all 100ms ease-in-out;
}

.page-container.sidebar-collapsed #logo {
    opacity: 0;
    transition: all 200ms ease-in-out;
    display: none;
}
.page-container.sidebar-collapsed .down {
    display: none;
}
.page-container.sidebar-collapsed-back #logo {
  opacity: 1;
  transition: all 200ms ease-in-out;
  transition-delay: 300ms;
}

.page-container.sidebar-collapsed #menu span {
  opacity: 0;
  transition: all 50ms linear;
  
}

.page-container.sidebar-collapsed-back #menu span {
  opacity: 1;
  transition: all 200ms linear;
  transition-delay: 300ms;
}
.sidebar-menu {
  position: absolute;
  float: left;
  width: 220px;

  top: 0px;
  left:0px;
  bottom: 0;
  background-color:#202121;
  color: #aaabae;
  z-index: 999;
}
#menu {
  list-style: none;
  margin: 0;
  padding: 0;
  margin-bottom: 20px;
}
#menu li {
  position: relative;
  margin: 0;
  font-size: 12px;
  padding: 0;
}
#menu li ul {
  opacity: 0;
  height: 0px;
}
#menu li a {
    position: relative;
    display: block;
    padding: 13px 20px;
    color: #FFFFFF;
    white-space: nowrap;
    z-index: 2;
    font-size: 1.12em;
        text-align: center;
    font-family: 'Carrois Gothic', sans-serif;
}
#menu li a:hover {
  color:#fdbb30;
  transition: color 250ms ease-in-out, background-color 250ms ease-in-out;
}
#menu li.active > a {
  background-color: #2b303a;
  color: #ffffff;
}
#menu ul li { background-color:#202121; }
#menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
#menu li ul {
  position: absolute;
  visibility: hidden;
  left: 100%;
  top: 20px;
  background-color: #2b303a;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
  opacity: 0;
  transition: opacity 0.1s linear;
  border-top: 1px solid rgba(69, 74, 84, 0.7);
}
#menu li:hover > ul {
  visibility: visible;
  opacity: 1;
}
#menu li li ul {
  right: 100%;
  visibility: hidden;
  top: -1px;
  opacity: 0;
  transition: opacity 0.1s linear;
}
#menu li li:hover ul {
  visibility: visible;
  opacity: 1;
}
#menu .fa {
    margin-bottom: 10px;
    font-size: 1.5em;
    display: block;
}
.menu {
    padding:4.2em 0em 0em 0em;
}
/*----*/
.page-container.sidebar-collapsed .left-content .fixed {
    width: 93%;
    left:80px;
}
/*----*/
.logo {
  width:22%;
  box-sizing: border-box;
  position: absolute;
   top: 20px;
   left: 170px;
}
.sidebar-icon {
    position: relative;
    float: left;
    text-align: center;
    line-height: 1;
    font-size: 18px;
    padding: 6px 8px;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius:3px;
    -o-border-radius:3px;
    color: #FFF;
    background-clip: padding-box;
    background:#68AE00;
}
.sidebar-icon:hover{
	 color: #FFF;
}
.fa-html5 {
  color: #fff;
  margin-left: 50px;
}
/*--nav strip start here--*/
.header-main {
    background:#fff;
    padding: 1em 2em;
    box-shadow: 0 1px 3px rgba(0,0,0,0.15);
}
.header-right {
    float: right;
    width: 50%;
}
.header-left {
    float: left;
    width: 45%;
}
.logo-name {
    float: left;
    width: 30%;
    margin: 0% 3% 0% 2%;
}
.logo-name h1 {
    font-size: 2.5em;
    color: #FC8213;
    margin: 0em;
    font-weight: 700;
    text-decoration: none;
}
.logo-name  h1 a{
	 color: #910048;
}
.logo-name a {
    display:inline-block;
}
.nav > li > a:hover, .nav > li > a:focus {
    background: none !important;
}
span.logo-clr{
	color:#fdbb30;
}
.page-container.sidebar-collapsed-back #menu span.fa.fa-angle-right{
	position: absolute;
    top: 0px;
    right: 20px;
}
/*start search*/
.search-box {
    float: left;
    width:40%;
    margin-top: 0.5em;
	position: relative;
    z-index: 0;
    display: inline-block;
    border:2px solid rgb(197, 197, 197);
}
.search-box input[type="text"] {
    outline: none;
    background: #fff;
    width: 86%;
    margin: 0;
    z-index: 10;
    font-size: 0.9em;
    color: #7A7B78;
    padding: 0.5em 0.5em;
    border: none;
    -webkit-appearance: none;
    display: inline-block;
}
.search-box input[type="submit"] {
    background: url(../images/search.png)no-repeat;
    width: 20px;
    height: 20px;
    display: inline-block;
   vertical-align: text-top;
    border: none;
    outline: none;
}
::-webkit-input-placeholder{
   color:#7A7B78 !important;
}
/*--//search-ends --*/
/*--- Progress Bar ----*/
.meter {
	position: relative;
}
.meter > span {
	display: block;
	height: 100%;
	   
	position: relative;
	overflow: hidden;
}
.meter > span:after, .animate > span > span {
	content: "";
	position: absolute;
	top: 0; left: 0; bottom: 0; right: 0;
	
	overflow: hidden;
}

.animate > span:after {
	display: none;
}

@-webkit-keyframes move {
    0% {
       background-position: 0 0;
    }
    100% {
       background-position: 50px 50px;
    }
}

@-moz-keyframes move {
    0% {
       background-position: 0 0;
    }
    100% {
       background-position: 50px 50px;
    }
}

.red > span {
	background-color: #65CEA7;
}

.nostripes > span > span, .nostripes > span:after {
	-webkit-animation: none;
	-moz-animation: none;
	background-image: none;
}
/*--- User Panel---*/
.profile_details_left {
    float: left;
        width: 50%;
}
.dropdown-menu {
    box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
	-webkit-box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
	-moz-box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
    border-radius: 0;
}
li.dropdown.head-dpdn {
    display: inline-block;
    padding: 1em 0;    
	float: left;
}
li.dropdown.head-dpdn a.dropdown-toggle {
   margin: 1em 2em;
}
ul.dropdown-menu li {
    margin-left: 0;
    width: 100%;
    padding: 0;
	background: #fff;
}
.user-panel-top ul{
	padding-left:0;
}
.user-panel-top li{
	float:left;
	margin-left:15px;
	position:relative;
}
.user-panel-top li span.digit{
    font-size:11px;
    font-weight:bold;
	color:#FFF;
	background:#e64c65;
	line-height:20px;
	width:20px;
	height:20px;
	border-radius:2em;
	-webkit-border-radius:2em;
	-moz-border-radius:2em;
	-o-border-radius:2em;	
	text-align:center;
	display: inline-block;
	position: absolute;
	top: -3px;
	right: -10px;
}
.user-panel-top li:first-child{
	margin-left:0;
}
.sidebar .nav-second-level li a.active ,.sidebar ul li a.active{
    color: #F2B33F;
}
li.active a i, .act a i {
    color: #F2B33F;
}
.custom-nav > li.act > a, .custom-nav > li.act > a:hover, .custom-nav > li.act > a:focus {
    background-color: #353f4f;
    color:#8BC34A;
}
.user-panel-top li a{
	display: block;
	padding: 5px;
	text-decoration:none;
}
.header-right i.fa.fa-btc{
    color:#6F6F6F;
    font-size:30px;
}
i.fa.fa-line-chart{
    color:#6F6F6F;
    font-size:30px;
}
i.fa.fa-bed{
    color:#6F6F6F;
    font-size:30px;
}
.user-panel-top li a:hover{
	border-color:rgba(101, 124, 153, 0.93);
}
.user-panel-top li a i{
	width:24px;
	height:24px;
	display: block;
	text-align:center;
	line-height:25px;
}
.user-panel-top li a i span{
	font-size:15px;
	color:#FFF;
}
.user-panel-top li a.user{
	background:#667686;
}
.user-panel-top li span.green{
	background:#a88add;
}
.user-panel-top li span.red{
	background:#b8c9f1;
}
.user-panel-top li span.yellow{
	background:#bdc3c7;
}
/***** Messages *************/
.notification_header{
	background-color:#FAFAFA;
	padding: 10px 15px;
	border-bottom:1px solid rgba(0, 0, 0, 0.05);
	margin-bottom: 8px;
}
.notification_header h3{	
	color:#6A6A6A;
	font-size:12px;
	font-weight:600;
	margin:0;
}
.notification_bottom {
    background-color:rgba(93, 90, 88, 0.07);
    padding: 4px 0;
    text-align: center;
	margin-top: 5px;
}
.notification_bottom a {
    color: #6F6F6F;
	 font-size: 1em;
}
.notification_bottom a:hover {
    color:#6164C1;
}
.notification_bottom h3 a{	
	color: #717171;
	font-size:12px;
	border-radius:0;
	border:none;
	padding:0;
	text-align:center;
}
.notification_bottom h3 a:hover{	
	color:#4A4A4A;
	text-decoration:underline;
	background:none;
}
.user_img{
	float:left;
	width:19%;
}
.user_img img{
	max-width:100%;
	display:block;
	border-radius:2em;
	-webkit-border-radius:2em;
	-moz-border-radius:2em;
	-o-border-radius:2em;
}
.notification_desc{
	float:left;
	width:70%;
	margin-left:5%;
}
.notification_desc p{
	color:#757575;
	font-size:13px;
	padding:2px 0;
}
.wrapper-dropdown-2 .dropdown li a:hover .notification_desc p{
	color:#424242;
}
.notification_desc p span{
	color:#979797 !important;
	font-size:11px;
}
/*---bages---*/
.header-right span.badge {
    font-size: 10px;
    font-weight: bold;
    color: #FFF;
    background:#FC8213;
    line-height: 10px;
    width: 15px;
    height: 15px;
    border-radius: 2em;
    -webkit-border-radius: 2em;
    -moz-border-radius: 2em;
    -o-border-radius: 2em;
    text-align: center;
    display: inline-block;
    position: absolute;
        top: 20%;
    padding: 2px 0 0;
    left: 54%;
}
.header-right span.blue{
	background-color:#337AB7;
}
.header-right span.red{
	background-color:#ef553a;
}
.header-right span.blue1{
	background-color:#68AE00;
}
i.icon_1{
  float: left;
  color: #00aced;
  line-height: 2em;
  margin-right: 1em;
}
i.icon_2{
  float: left;
  color:#ef553a;
  line-height: 2em;
  margin-right: 1em;
  font-size: 20px;
}
i.icon_3{
  float: left;
  color:#9358ac;
  line-height: 2em;
  margin-right: 1em;
  font-size: 20px;
}
.avatar_left {
  float: left;
}
i.icon_4{
  width: 45px;
  height: 45px;
  background: #F44336;
  float: left;
  color: #fff;
  text-align: center;
  font-size: 1.5em;
  line-height: 44px;
  font-style: normal;
  margin-right: 1em;
}
i.icon_5{
  background-color: #3949ab;
}
i.icon_6{
  background-color: #03a9f4;
}
.blue-text {
  color: #2196F3 !important;
  float:right;
}
/*---//bages---*/
/*--Progress bars--*/
.progress {
    height: 10px;
    margin: 7px 0;
    overflow: hidden;
    background: #e1e1e1;
    z-index: 1;
    cursor: pointer;
}
.task-info .percentage{
	float:right;
	height:inherit;
	line-height:inherit;
}
.task-desc{
	font-size:12px;
}
.wrapper-dropdown-3 .dropdown li a:hover span.task-desc {
	color:#65cea7;
}
.progress .bar {
		z-index: 2;
		height:15px; 
		font-size: 12px;
		color: white;
		text-align: center;
		float:left;
		-webkit-box-sizing: content-box;
		-moz-box-sizing: content-box;
		-ms-box-sizing: content-box;
		box-sizing: content-box;
		-webkit-transition: width 0.6s ease;
		  -moz-transition: width 0.6s ease;
		  -o-transition: width 0.6s ease;
		  transition: width 0.6s ease;
	}
.progress-striped .yellow{
	background:#f0ad4e;
} 
.progress-striped .green{
	background:#5cb85c;
} 
.progress-striped .light-blue{
	background:#4F52BA;
} 
.progress-striped .red{
	background:#d9534f;
} 
.progress-striped .blue{
	background:#428bca;
} 
.progress-striped .orange {
	background:#e94e02;
}
.progress-striped .bar {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
  -moz-background-size: 40px 40px;
  -o-background-size: 40px 40px;
  background-size: 40px 40px;
}
.progress.active .bar {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
  -moz-animation: progress-bar-stripes 2s linear infinite;
  -ms-animation: progress-bar-stripes 2s linear infinite;
  -o-animation: progress-bar-stripes 2s linear infinite;
  animation: progress-bar-stripes 2s linear infinite;
}
@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-moz-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-ms-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-o-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
/*--Progress bars--*/
/********* profile details **********/
ul.dropdown-menu.drp-mnu i.fa {
    margin-right: 0.5em;
}
ul.dropdown-menu {
    padding: 0;
    min-width: 230px;
    top:101%;
}
.dropdown-menu > li > a {
    padding: 3px 15px;
	font-size: 1em;
}
.profile_details {
    float: right;
    z-index:1;
}
.profile_details_drop .fa.fa-angle-up{
	display:none;
}
.profile_details_drop.open .fa.fa-angle-up{
    display:block;
}
.profile_details_drop.open .fa.fa-angle-down{
	display:none;
}
.profile_details_drop a.dropdown-toggle {
    display:block;
	padding:0em 3em 0 1em;
}
.profile_img span.prfil-img{
	float:left;
}
.user-name{
	 float:left;
	 margin-top:7px;
	 margin-left:11px;
	 height:35px;
}
.profile_details ul li{
	list-style-type:none;
	position:relative;
}
.profile_details li a i.fa.lnr {
    position: absolute;
    top: 34%;
    right: 8%;
    color: #68AE00;
    font-size: 1.6em;
}
.profile_details ul li ul.dropdown-menu.drp-mnu {
    padding: 1em;
    min-width: 190px;
    top: 135%;
    left:10%;
    border-radius: 25px;
}
ul.dropdown-menu.drp-mnu li {
    list-style-type: none;
    padding: 3px 0;
}
.user-name p{
	font-size:10px;
	color:#FC8213;
	line-height:1em;
	font-weight:700;
}
.user-name span {
    font-size: .75em;
    font-style: italic;
    color: #424f63;
    font-weight: normal;
    margin-top: .3em;
}
.profile_details ul {
    padding: 0px;
}
/*--header strip end here-*/
/*inner-block--*/
.inner-block {
    padding: 6em 4em 4em 4em;
    width: 100%;
    background:#2db0e2;
    border-radius: 25px;
    height:1800px;
}
.market-update-block {
    padding: 2em 2em;
    background: #999;
}
.market-update-block h3 {
    color: #fff;
    font-size: 20px;
    font-family: 'Carrois Gothic', sans-serif;
}
.market-update-block h4 {
	font-size: 20px;
    color: #fff;
    margin: 0.3em 0em;
   font-family: 'Carrois Gothic', sans-serif;
}
.market-update-block p {
    color: #fff;
    font-size: 13px;
    line-height: 1.8em;
}
.market-update-block.clr-block-1 {
  width: 230px;
  height: 140px;
    background: #68ae00;
    margin-right: 0.8em;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
   border-radius: 25px;
}
.market-update-block.clr-block-2 {
  width: 230px;
  height: 140px;
    background:#FC8213;
    margin-right: 0.8em;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
  border-radius: 25px;
}
.market-update-block.clr-block-3 {
  width: 230px;
  height: 140px;
    background:#337AB7;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
   border-radius: 25px;
}
.market-update-block.clr-block-4 {
  width: 230px;
  height: 140px;
    background-color:#FF80AB;
    margin-right: 0.8em;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
   border-radius: 25px;
}

.market-update-block.clr-block-5 {
    width: 230px;
     height: 140px;
    background-color: #69F0AE;
    margin-right: 0.8em;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
  border-radius: 25px;
}
.market-update-block.clr-block-6 {
  width: 230px;
  height: 140px;
    background-color: #795548;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
   border-radius: 25px;
}
.market-update-block.clr-block-7 {
  width: 230px;
  height: 140px;
    background-color:#BDBDBD;
    margin-right: 0.8em;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
   border-radius: 25px;
}
.market-update-block.clr-block-8 {
  width: 230px;
  height: 140px;
    background-color: #00796B;
    margin-right: 0.8em;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
  border-radius: 25px;
}
.market-update-block.clr-block-9 {
  width: 230px;
  height: 140px;
    background-color: #673AB7;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
   border-radius: 25px;
}

.market-update-block.clr-block-1:hover {
    background: #3C3C3C;
   transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;

}
.market-update-block.clr-block-2:hover {
    background: #3C3C3C;
   transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}
.market-update-block.clr-block-3:hover {
    background:#3C3C3C;
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}
.market-update-block.clr-block-4:hover {
    background: #3C3C3C;
   transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}
.market-update-block.clr-block-5:hover {
    background:#3C3C3C;
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}
.market-update-block.clr-block-6:hover {
    background:#3C3C3C;
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}
.market-update-block.clr-block-7:hover {
    background:#3C3C3C;
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}
.market-update-block.clr-block-8:hover {
    background:#3C3C3C;
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}
.market-update-block.clr-block-9:hover {
    background:#3C3C3C;
    transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
}


.market-update-right i.fa.fa-calendar-check-o{
    font-size: 3em;
    color:#68AE00;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}

.market-update-right i.fa.fa-calendar-check-o{
    font-size: 3em;
    color:#68AE00;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}
.market-update-right i.fa.fa-bell-o{
    font-size: 3em;
    color:#FF80AB;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}
.market-update-right i.fa.fa-database{
    font-size: 3em;
    color:#00796B;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}
.market-update-right i.fa.fa-rss{
    font-size: 3em;
    color:#673AB7;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}
.market-update-right i.fa.fa-check-square-o{
    font-size: 3em;
    color:#BDBDBD;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}
.market-update-right i.fa.fa-search {
     font-size: 3em;
    color:#FC8213;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}
.market-update-right i.fa.fa-tree {
    font-size: 3em;
   color: #795548;
   width: 80px;
   height: 80px;
   background: #fff;
   text-align: center;
   border-radius: 49px;
   -webkit-border-radius: 49px;
   -moz-border-radius:49px;
   -o-border-radius:49px;
   line-height: 1.7em;
}
.market-update-right i.fa.fa-book {
    font-size: 3em;
   color:#69F0AE;
   width: 80px;
   height: 80px;
   background: #fff;
   text-align: center;
   border-radius: 49px;
   -webkit-border-radius: 49px;
   -moz-border-radius:49px;
   -o-border-radius:49px;
   line-height: 1.7em;
}
.market-update-right i.fa.fa-headphones {
     font-size:3em;
    color:#337AB7;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius:49px;
    -o-border-radius:49px;
    line-height: 1.7em;
}
.market-update-left {
    padding: 0px;
}
/*--main page charts strat here--*/
/*--chart layer-1 left--*/

.glocy-chart {
   box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        padding: 2em 1em;
        background: #fff;
}
.prograc-blocks {
    padding:2.2em 2em;
    background: #fff;
    box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
}
canvas#bar {
    width: 584px !important;
    height: 300px !important;
}
h3.tlt {
    font-size: 1.3em;
    margin-bottom: 0.8em;
    font-weight: 700;
    color: #5F5D5D;
    text-transform: uppercase;
   font-family: 'Carrois Gothic', sans-serif;
}
/*--chart-layer1-right start--*/
.home-progres-main {
    padding-bottom: 9px;
    margin: 0px 0 20px;
}
.home-progres-main h3 {
	font-size: 1.3em;
    font-weight: 700;
    color: #5F5D5D;
    text-transform: uppercase;
    font-family: 'Carrois Gothic', sans-serif;
}
.home-progress {
    height: 21px;
    margin: 20px 0;
    overflow: hidden;
    background: #e1e1e1;
    z-index: 1;
    cursor: pointer;
        border-radius: 4px;
}
.progress-bar1 {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: center;
    background-color: #337ab7;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
    -webkit-transition: width .6s ease;
    -o-transition: width .6s ease;
    transition: width .6s ease;
}
/*--moveing effect prograce bars--*/
.bar_group__bar.thin::before{
  display: block;
  content: '';
  position: absolute;
  z-index: -1;
}

.bar_group__bar.thin::before {
  width: 100%;
  height: 5px;
  border-radius: 0px;
  background: #E4E4E4;
}

.bar_group__bar.thin {
  width: 0%;
  height: 5px;
  border-radius: 0px;
  background: #90B82D;
  margin-bottom: 10px;
  -webkit-transition: width 1s;
          transition: width 1s;
}
.b_label,.bar_label_min,.bar_label_max,.b_tooltip span {
	color: #999;
    font-size: 14px;
	margin: .5em 0;
}
.bar_group.group_ident-1 {
    padding-right: 0em;
	z-index: 0;
    position: relative;
}
.bar_label_max {
  position: absolute;
  right:0%;
}
.bar_label_min {
  position: absolute;
}
.b_tooltip {
	-webkit-transition: all 1s;
    transition: all 1s;
	position: relative;
	float: left;
	left: 100%;
	padding: 4px 10px 7px 10px;
	background-color:rgb(74, 74, 73);
	-webkit-transform: translateX(-50%) translateY(-30px);
    -ms-transform: translateX(-50%) translateY(-30px);
    transform: translateX(-50%) translateY(-30px);
	-o-transform: translateX(-50%) translateY(-30px);
	border-radius:0px;
	line-height: 11px;
}
.b_tooltip span {
	color: white;
}
.b_tooltip--tri {
  width: 0;
