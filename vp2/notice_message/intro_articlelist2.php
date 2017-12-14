	<?php
// Define page object
$i=0;
$today = date ( 'd/m/Y' ,strtotime (ew_CurrentDateTime()));
$intro_article_list = new cintro_article_list();
$Page =& $intro_article_list;

// Page init processing
$intro_article_list->Page_Init();

// Page main processing
$intro_article_list->Page_Main();

?>

<?php if ($intro_article->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var intro_article_list = new ew_Page("intro_article_list");

// page properties
intro_article_list.PageID = "list"; // page ID
var EW_PAGE_ID = intro_article_list.PageID; // for backward compatibility

// extend page with validate function for search
intro_article_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_begin_date"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Begin Date");
	elm = fobj.elements["x" + infix + "_end_date"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - End Date");

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	for (var i=0;i<fobj.elements.length;i++) {
		var elem = fobj.elements[i];
		if (elem.name.substring(0,2) == "s_" || elem.name.substring(0,3) == "sv_")
			elem.value = "";
	}
	return true;
}

// extend page with Form_CustomValidate function
intro_article_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_article_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_article_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_article_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>

<?php } ?>
<?php if ($intro_article->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($intro_article->Export == "" && $intro_article->SelectLimit);
	if (!$bSelectLimit)
		$rs = $intro_article_list->LoadRecordset();
	$intro_article_list->lTotalRecs = ($bSelectLimit) ? $intro_article->SelectRecordCount() : $rs->RecordCount();
	$intro_article_list->lStartRec = 1;
	if ($intro_article_list->lDisplayRecs <= 0) // Display all records
		$intro_article_list->lDisplayRecs = $intro_article_list->lTotalRecs;
	if (!($intro_article->ExportAll && $intro_article->Export <> ""))
		$intro_article_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $intro_article_list->LoadRecordset($intro_article_list->lStartRec-1, $intro_article_list->lDisplayRecs);
?>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
 <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<head><a href="http://vp1.hpu.edu.vn">
              <button type="button" class="btn btn-info">
        <<< Trở về trang chủ
    </button></a>
         </head>
<body style="background-image: url('../images/background7.jpg')">
 <h1 style="text-align: center"> THÔNG BÁO </h1><br><br>

<?php if ($intro_article->Export == "" && $intro_article->CurrentAction == "") { ?>

<div id="intro_article_list_SearchPanel">
<form name="fintro_articlelistsrch" id="fintro_articlelistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return intro_article_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="intro_article">
<?php
if ($gsSearchError == "")
	$intro_article_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$intro_article->RowType = EW_ROWTYPE_SEARCH;

// Render row
$intro_article_list->RenderRow();
?>
<div id="divhoten" style="background: url('../images/img_bggd.jpg');margin-left: 3px">
    <center>
        <table class="ewBasicSearch">
            <tr>
                <td style="padding:3px"><span class="phpmaker" >
                        <?PHP
                          function strip_tags_attributes($sSource, $aAllowedTags = array(), $aDisabledAttributes = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavaible', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragdrop', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterupdate', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmoveout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'))
                                    {
                                        if (empty($aDisabledAttributes)) return strip_tags($sSource, implode('', $aAllowedTags));

                                        return preg_replace('/<(.*?)>/ie', "'<' . preg_replace(array('/javascript:[^\"\']*/i', '/(" . implode('|', $aDisabledAttributes) . ")[ \\t\\n]*=[ \\t\\n]*[\"\'][^\"\']*[\"\']/i', '/\s+/'), array('', '', ' '), stripslashes('\\1')) . '>'", strip_tags($sSource, implode('', $aAllowedTags)));
                                    }
                        
                        ?>
                            <input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="40" value="<?php echo strip_tags_attributes(ew_HtmlEncode($intro_article->getBasicSearchKeyword())) ?>">
                            <input type="Submit" name="Submit" id="Submit" value="Tìm kiếm (*)">&nbsp;
                            <a href="<?php echo $intro_article_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
                    </span></td>
            </tr>

        </table>
      </center>
</form>
</div>
</div>
<?php } ?>

<?php $intro_article_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($intro_article->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($intro_article->CurrentAction <> "gridadd" && $intro_article->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span style="text-align: center">
   
<?php if (!isset($intro_article_list->Pager)) $intro_article_list->Pager = new cNumericPager($intro_article_list->lStartRec, $intro_article_list->lDisplayRecs, $intro_article_list->lTotalRecs, $intro_article_list->lRecRange) ?>
<?php if ($intro_article_list->Pager->RecordCount > 0) { ?>
	
<?php } else { ?>	
	  <span style="color:red;text-align: center;padding: 10px 0px 10px 200px"> Không tồn tại thông báo trong chuyên mục !  </span>
<?php } ?>
       
</span>
		</td>

	</tr>
</table>
</form>
<?php } ?>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fintro_articlelist" id="fintro_articlelist" class="ewForm" action="" method="post">
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$intro_article_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$intro_article_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$intro_article_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$intro_article_list->lOptionCnt++; // copy
}
if ($Security->CanDelete()) {
	$intro_article_list->lOptionCnt++; // Multi-select
}
	$intro_article_list->lOptionCnt += count($intro_article_list->ListOptions->Items); // Custom list options
?>
<?php echo $intro_article->TableCustomInnerHtml ?>

<?php
if ($intro_article->ExportAll && $intro_article->Export <> "") {
	$intro_article_list->lStopRec = $intro_article_list->lTotalRecs;
} else {
	$intro_article_list->lStopRec = $intro_article_list->lStartRec + $intro_article_list->lDisplayRecs - 1; // Set the last record to display
}
$intro_article_list->lRecCount = $intro_article_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$intro_article->SelectLimit && $intro_article_list->lStartRec > 1)
		$rs->Move($intro_article_list->lStartRec - 1);
}
$intro_article_list->lRowCnt = 0;
while (($intro_article->CurrentAction == "gridadd" || !$rs->EOF) &&
	$intro_article_list->lRecCount < $intro_article_list->lStopRec) {
	$intro_article_list->lRecCount++;
	if (intval($intro_article_list->lRecCount) >= intval($intro_article_list->lStartRec)) {
		$intro_article_list->lRowCnt++;

	// Init row class and style
	$intro_article->CssClass = "";
	$intro_article->CssStyle = "";
	
	if ($intro_article->CurrentAction == "gridadd") {
		$intro_article_list->LoadDefaultValues(); // Load default values
	} else {
		$intro_article_list->LoadRowValues($rs); // Load row values
	}
	$intro_article->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$intro_article_list->RenderRow();
?>
   <?php
$sSqlWrk = "Select chuyenmuc_belongto From intro_subject Where chuyenmuc_id =".$intro_article->chuyenmuc_id->ListViewValue();
 // echo $sSqlWrk;
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);
$i= $i+1; 
$end_date = $intro_article->end_date->ListViewValue();
$begin_date = $intro_article->begin_date->ListViewValue();
$end_date_view = date ( 'd/m/Y' ,strtotime($end_date));
$begin_date_view  = date ( 'd/m/Y' ,strtotime($begin_date));
 if( (strtotime($end_date) >= strtotime($today)) && (strtotime($begin_date) < strtotime($today)))
          {
             if ($i < 6)
             {   
              $img ="<img src=\"../images/common/new.gif\" Title=\"Văn phòng hỗ trợ trực tuyến - Support Online\" alt=\"Văn phòng hỗ trợ trực tuyến - Support Online\">";
             } else 
             { 
               $img ="<img src=\"../images/common/icon-xac-thuc.jpg\" Title=\"Văn phòng hỗ trợ trực tuyến - Support Online\" alt=\"Văn phòng hỗ trợ trực tuyến - Support Online\">";
             }   
          }
          else
          {
              $img="";
          }    
$url ="../notice_message/newsdetail-".$intro_article->chuyenmuc_id->ListViewValue()."-".$arwrk[0]['chuyenmuc_belongto']."-".$intro_article->baiviet_id->ListViewValue()."-".changeTitle($intro_article->tieude_baiviet->ListViewValue()).".html"; 
//$url= "../notice_message/thongtin-".$intro_article->baiviet_id->ListViewValue();
?>
	<tr<?php echo $intro_article->RowAttributes() ?>>
            <td> 
                <p class="phead_thongbao"> <a title="Văn phòng hỗ trợ trực tuyến - Support Online" href="<?php echo $url  ?>" class="ahead_thongbao"  ><?php echo $intro_article->tieude_baiviet->ListViewValue() ?> </a><?php echo $img ?> </p>
            </td>
	</tr>
<?php
	}
	if ($intro_article->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
    
</tbody>
</table>
<?php } ?>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
</div>
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
<?php if ($intro_article->Export == "") { ?>
<div class="ewGridLowerPanel">
    <div class="divphantrang">
<?php if ($intro_article->CurrentAction <> "gridadd" && $intro_article->CurrentAction <> "gridedit") { ?>
            <form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
               
     <table border="0" cellspacing="0" cellpadding="0" class="ewPager" width="100%" style="float: right;margin: 10px 0px 10px 0px">
                <tr>
                    <td nowrap style="text-align: right">
                    <span class="phpmaker" style="color:#fc9603;"  >
            <?php if (!isset($intro_article_list->Pager)) $intro_article_list->Pager = new cNumericPager($intro_article_list->lStartRec, $intro_article_list->lDisplayRecs, $intro_article_list->lTotalRecs, $intro_article_list->lRecRange) ?>
            <?php if ($intro_article_list->Pager->RecordCount > 0) { ?>
                    <?php if ($intro_article_list->Pager->FirstButton->Enabled) { ?>
                    <a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
                    <?php } ?>
                    <?php if ($intro_article_list->Pager->PrevButton->Enabled) { ?>
                    <a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
                    <?php } ?>

                    <?php foreach ($intro_article_list->Pager->Items as $PagerItem) { ?>
                        <?php if ($PagerItem->Enabled) {?>
                            <?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
                        <?php } else { ?>
                        <a class="activephantrang" ><?php echo $PagerItem->Text ?></a>
                        <?php } ?>
                    <?php } ?>      


                    <?php if ($intro_article_list->Pager->NextButton->Enabled) { ?>
                    <a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
                    <?php } ?>
                    <?php if ($intro_article_list->Pager->LastButton->Enabled) { ?>
                    <a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
                    <?php } ?>
                    <?php if ($intro_article_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
                    Bản ghi: <?php echo $intro_article_list->Pager->FromIndex ?> từ <?php echo $intro_article_list->Pager->ToIndex ?> của <?php echo $intro_article_list->Pager->RecordCount ?>
            <?php } else { ?>	
                    
            <?php } ?>
            </span>
          </td>
        </tr>    
    </table>
                               
</div>	
</form>
<?php } ?>
<?php //if ($intro_article_list->lTotalRecs > 0) { ?>

<?php //} ?>
   </div>	
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($intro_article->Export == "" && $intro_article->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(intro_article_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($intro_article->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>

<?php

//
// Page Class
//
class cintro_article_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'intro_article';

	// Page Object Name
	var $PageObjName = 'intro_article_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_article;
		if ($intro_article->UseTokenInUrl) $PageUrl .= "t=" . $intro_article->TableVar . "&"; // add page token
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
		global $objForm, $intro_article;
		if ($intro_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_article_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_article"] = new cintro_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_article, $notice_id;
		global $Security; 
                require_once 'library/HTMLPurifier.auto.php';
                $purifier = new HTMLPurifier();
                $notice_id = $purifier->purify(@($_GET["categories_id"]));
                $noitce_id = KillChars(htmlspecialchars($notice_id,ENT_QUOTES));
                
		$Security = new cAdvancedSecurity();
		
	$intro_article->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $intro_article->Export; // Get export parameter, used in header
	$gsExportFile = $intro_article->TableVar; // Get export file, used in header
	if ($intro_article->Export == "print" || $intro_article->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($intro_article->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($intro_article->Export == "word") {
		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
	}

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
	var $lDisplayRecs; // Number of display records
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs;
	var $lRecRange;
	var $sSrchWhere;
	var $lRecCnt;
	var $lEditRowCnt;
	var $lRowCnt;
	var $lRowIndex;
	var $lOptionCnt;
	var $lRecPerRow;
	var $lColCnt;
	var $sDeleteConfirmMsg; // Delete confirm message
	var $sDbMasterFilter;
	var $sDbDetailFilter;
	var $bMasterRecordExists;	
	var $ListOptions;
	var $sMultiSelectKey;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsSearchError, $Security, $intro_article;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Get search criteria for advanced search
			$this->LoadSearchValues(); // Get search values
			if ($this->ValidateSearch()) {
				$sSrchAdvanced = $this->AdvancedSearchWhere();
			} else {
				$this->setMessage($gsSearchError);
			}

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($intro_article->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $intro_article->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchAdvanced)" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchBasic)" : $sSrchBasic;

		// Call Recordset_Searching event
		$intro_article->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$intro_article->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$intro_article->setStartRecordNumber($this->lStartRec);
		} else {
			$this->RestoreSearchParms();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList()) {
			$sFilter = "(1=1)"; // Filter all records
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$intro_article->setSessionWhere($sFilter);
		$intro_article->CurrentFilter = "";

		// Export data only
		if (in_array($intro_article->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $intro_article;
		$sWrk = @$_GET[EW_TABLE_REC_PER_PAGE];
		if ($sWrk <> "") {
			if (is_numeric($sWrk)) {
				$this->lDisplayRecs = intval($sWrk);
			} else {
				if (strtolower($sWrk) == "all") { // Display all records
					$this->lDisplayRecs = -1;
				} else {
					$this->lDisplayRecs = 20; // Non-numeric, load default
				}
			}
			$intro_article->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$intro_article->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $intro_article;
		$sWhere = "";
		
		$this->BuildSearchSql($sWhere, $intro_article->baiviet_id, FALSE); // Field baiviet_id
		$this->BuildSearchSql($sWhere, $intro_article->chuyenmuc_id, FALSE); // Field chuyenmuc_id
		$this->BuildSearchSql($sWhere, $intro_article->tieude_baiviet, FALSE); // Field tieude_baiviet
		$this->BuildSearchSql($sWhere, $intro_article->begin_date, FALSE); // Field begin_date
		$this->BuildSearchSql($sWhere, $intro_article->end_date, FALSE); // Field end_date
		$this->BuildSearchSql($sWhere, $intro_article->tukhoa_baiviet, FALSE); // Field tukhoa_baiviet
		$this->BuildSearchSql($sWhere, $intro_article->tomtat_baiviet, FALSE); // Field tomtat_baiviet
		$this->BuildSearchSql($sWhere, $intro_article->noidung_baiviet, FALSE); // Field noidung_baiviet
		$this->BuildSearchSql($sWhere, $intro_article->nguon_baiviet, FALSE); // Field nguon_baiviet
		$this->BuildSearchSql($sWhere, $intro_article->lienket_baiviet, FALSE); // Field lienket_baiviet
		$this->BuildSearchSql($sWhere, $intro_article->thoigian_them, FALSE); // Field thoigian_them
		$this->BuildSearchSql($sWhere, $intro_article->thoihan_sua, FALSE); // Field thoihan_sua
		$this->BuildSearchSql($sWhere, $intro_article->nguoi_them, FALSE); // Field nguoi_them
		$this->BuildSearchSql($sWhere, $intro_article->nguoi_sua, FALSE); // Field nguoi_sua
		$this->BuildSearchSql($sWhere, $intro_article->soluot_truynhap, FALSE); // Field soluot_truynhap
		$this->BuildSearchSql($sWhere, $intro_article->trang_thai, FALSE); // Field trang_thai
		$this->BuildSearchSql($sWhere, $intro_article->thutu_sapxep, FALSE); // Field thutu_sapxep

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($intro_article->baiviet_id); // Field baiviet_id
			$this->SetSearchParm($intro_article->chuyenmuc_id); // Field chuyenmuc_id
			$this->SetSearchParm($intro_article->tieude_baiviet); // Field tieude_baiviet
			$this->SetSearchParm($intro_article->begin_date); // Field begin_date
			$this->SetSearchParm($intro_article->end_date); // Field end_date
			$this->SetSearchParm($intro_article->tukhoa_baiviet); // Field tukhoa_baiviet
			$this->SetSearchParm($intro_article->tomtat_baiviet); // Field tomtat_baiviet
			$this->SetSearchParm($intro_article->noidung_baiviet); // Field noidung_baiviet
			$this->SetSearchParm($intro_article->nguon_baiviet); // Field nguon_baiviet
			$this->SetSearchParm($intro_article->lienket_baiviet); // Field lienket_baiviet
			$this->SetSearchParm($intro_article->thoigian_them); // Field thoigian_them
			$this->SetSearchParm($intro_article->thoihan_sua); // Field thoihan_sua
			$this->SetSearchParm($intro_article->nguoi_them); // Field nguoi_them
			$this->SetSearchParm($intro_article->nguoi_sua); // Field nguoi_sua
			$this->SetSearchParm($intro_article->soluot_truynhap); // Field soluot_truynhap
			$this->SetSearchParm($intro_article->trang_thai); // Field trang_thai
			$this->SetSearchParm($intro_article->thutu_sapxep); // Field thutu_sapxep
		}
		return $sWhere;
	}

	// Build search SQL
	function BuildSearchSql(&$Where, &$Fld, $MultiValue) {
		$FldParm = substr($Fld->FldVar, 2);		
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldOpr = $Fld->AdvancedSearch->SearchOperator; // @$_GET["z_$FldParm"]
		$FldCond = $Fld->AdvancedSearch->SearchCondition; // @$_GET["v_$FldParm"]
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldOpr2 = $Fld->AdvancedSearch->SearchOperator2; // @$_GET["w_$FldParm"]
		$sWrk = "";
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$FldOpr = strtoupper(trim($FldOpr));
		if ($FldOpr == "") $FldOpr = "=";
		$FldOpr2 = strtoupper(trim($FldOpr2));
		if ($FldOpr2 == "") $FldOpr2 = "=";
		if (EW_SEARCH_MULTI_VALUE_OPTION == 1 || $FldOpr <> "LIKE" ||
			($FldOpr2 <> "LIKE" && $FldVal2 <> ""))
			$MultiValue = FALSE;
		if ($MultiValue) {
			$sWrk1 = ($FldVal <> "") ? ew_GetMultiSearchSql($Fld, $FldVal) : ""; // Field value 1
			$sWrk2 = ($FldVal2 <> "") ? ew_GetMultiSearchSql($Fld, $FldVal2) : ""; // Field value 2
			$sWrk = $sWrk1; // Build final SQL
			if ($sWrk2 <> "")
				$sWrk = ($sWrk <> "") ? "($sWrk) $FldCond ($sWrk2)" : $sWrk2;
		} else {
			$FldVal = $this->ConvertSearchValue($Fld, $FldVal);
			$FldVal2 = $this->ConvertSearchValue($Fld, $FldVal2);
			$sWrk = ew_GetSearchSql($Fld, $FldVal, $FldOpr, $FldCond, $FldVal2, $FldOpr2);
		}
		if ($sWrk <> "") {
			if ($Where <> "") $Where .= " AND ";
			$Where .= "(" . $sWrk . ")";
		}
	}

	// Set search parameters
	function SetSearchParm(&$Fld) {
		global $intro_article;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$intro_article->setAdvancedSearch("x_$FldParm", $FldVal);
		$intro_article->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$intro_article->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$intro_article->setAdvancedSearch("y_$FldParm", $FldVal2);
		$intro_article->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Convert search value
	function ConvertSearchValue(&$Fld, $FldVal) {
		$Value = $FldVal;
		if ($Fld->FldDataType == EW_DATATYPE_BOOLEAN) {
			if ($FldVal <> "") $Value = ($FldVal == "1") ? $Fld->TrueValue : $Fld->FalseValue;
		} elseif ($Fld->FldDataType == EW_DATATYPE_DATE) {
			if ($FldVal <> "") $Value = ew_UnFormatDateTime($FldVal, $Fld->FldDateTimeFormat);
		}
		return $Value;
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $intro_article;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $intro_article->tieude_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $intro_article->tukhoa_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $intro_article->tomtat_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $intro_article->noidung_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $intro_article->nguon_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $intro_article->lienket_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

        
           
         function strip_tags_attributes($sSource, $aAllowedTags = array(), $aDisabledAttributes = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavaible', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragdrop', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterupdate', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmoveout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'))
                                    {
                                        if (empty($aDisabledAttributes)) return strip_tags($sSource, implode('', $aAllowedTags));

                                        return preg_replace('/<(.*?)>/ie', "'<' . preg_replace(array('/javascript:[^\"\']*/i', '/(" . implode('|', $aDisabledAttributes) . ")[ \\t\\n]*=[ \\t\\n]*[\"\'][^\"\']*[\"\']/i', '/\s+/'), array('', '', ' '), stripslashes('\\1')) . '>'", strip_tags($sSource, implode('', $aAllowedTags)));
                                    }
	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $intro_article;
                require_once 'library/HTMLPurifier.auto.php';
                $purifier = new HTMLPurifier();
                $clean_html = $purifier->purify(@$_GET[EW_TABLE_BASIC_SEARCH]);
		$sSearchKeyword = $clean_html;
		$sSearchType = $purifier->purify(@$_GET[EW_TABLE_BASIC_SEARCH_TYPE]);
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
		}
		if ($sSearchKeyword <> "") {
			$intro_article->setBasicSearchKeyword($sSearchKeyword);
			$intro_article->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $intro_article;
		$this->sSrchWhere = "";
		$intro_article->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $intro_article;
		$intro_article->setBasicSearchKeyword("");
		$intro_article->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $intro_article;
		$intro_article->setAdvancedSearch("x_baiviet_id", "");
		$intro_article->setAdvancedSearch("x_chuyenmuc_id", "");
		$intro_article->setAdvancedSearch("x_tieude_baiviet", "");
		$intro_article->setAdvancedSearch("x_begin_date", "");
		$intro_article->setAdvancedSearch("x_end_date", "");
		$intro_article->setAdvancedSearch("x_tukhoa_baiviet", "");
		$intro_article->setAdvancedSearch("x_tomtat_baiviet", "");
		$intro_article->setAdvancedSearch("x_noidung_baiviet", "");
		$intro_article->setAdvancedSearch("x_nguon_baiviet", "");
		$intro_article->setAdvancedSearch("x_lienket_baiviet", "");
		$intro_article->setAdvancedSearch("x_thoigian_them", "");
		$intro_article->setAdvancedSearch("x_thoihan_sua", "");
		$intro_article->setAdvancedSearch("x_nguoi_them", "");
		$intro_article->setAdvancedSearch("x_nguoi_sua", "");
		$intro_article->setAdvancedSearch("x_soluot_truynhap", "");
		$intro_article->setAdvancedSearch("x_trang_thai", "");
		$intro_article->setAdvancedSearch("x_thutu_sapxep", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $intro_article;
		$this->sSrchWhere = $intro_article->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $intro_article;
		 $intro_article->baiviet_id->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_baiviet_id");
		 $intro_article->chuyenmuc_id->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_chuyenmuc_id");
		 $intro_article->tieude_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_tieude_baiviet");
		 $intro_article->begin_date->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_begin_date");
		 $intro_article->end_date->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_end_date");
		 $intro_article->tukhoa_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_tukhoa_baiviet");
		 $intro_article->tomtat_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_tomtat_baiviet");
		 $intro_article->noidung_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_noidung_baiviet");
		 $intro_article->nguon_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_nguon_baiviet");
		 $intro_article->lienket_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_lienket_baiviet");
		 $intro_article->thoigian_them->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thoigian_them");
		 $intro_article->thoihan_sua->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thoihan_sua");
		 $intro_article->nguoi_them->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_nguoi_them");
		 $intro_article->nguoi_sua->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_nguoi_sua");
		 $intro_article->soluot_truynhap->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_soluot_truynhap");
		 $intro_article->trang_thai->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_trang_thai");
		 $intro_article->thutu_sapxep->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thutu_sapxep");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $intro_article;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$intro_article->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$intro_article->CurrentOrderType = @$_GET["ordertype"];
			$intro_article->UpdateSort($intro_article->baiviet_id); // Field 
			$intro_article->UpdateSort($intro_article->chuyenmuc_id); // Field 
			$intro_article->UpdateSort($intro_article->tieude_baiviet); // Field 
			$intro_article->UpdateSort($intro_article->begin_date); // Field 
			$intro_article->UpdateSort($intro_article->end_date); // Field 
			$intro_article->UpdateSort($intro_article->tukhoa_baiviet); // Field 
			$intro_article->UpdateSort($intro_article->trang_thai); // Field 
			$intro_article->UpdateSort($intro_article->thutu_sapxep); // Field 
			$intro_article->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $intro_article;
		$sOrderBy = $intro_article->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($intro_article->SqlOrderBy() <> "") {
				$sOrderBy = $intro_article->SqlOrderBy();
				$intro_article->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $intro_article;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$intro_article->setSessionOrderBy($sOrderBy);
				$intro_article->baiviet_id->setSort("");
				$intro_article->chuyenmuc_id->setSort("");
				$intro_article->tieude_baiviet->setSort("");
				$intro_article->begin_date->setSort("");
				$intro_article->end_date->setSort("");
				$intro_article->tukhoa_baiviet->setSort("");
				$intro_article->trang_thai->setSort("");
				$intro_article->thutu_sapxep->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$intro_article->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $intro_article;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$intro_article->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$intro_article->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $intro_article->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$intro_article->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$intro_article->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$intro_article->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $intro_article;

		// Load search values
		// baiviet_id

		$intro_article->baiviet_id->AdvancedSearch->SearchValue = @$_GET["x_baiviet_id"];
		$intro_article->baiviet_id->AdvancedSearch->SearchOperator = @$_GET["z_baiviet_id"];

		// chuyenmuc_id
		$intro_article->chuyenmuc_id->AdvancedSearch->SearchValue = @$_GET["x_chuyenmuc_id"];
		$intro_article->chuyenmuc_id->AdvancedSearch->SearchOperator = @$_GET["z_chuyenmuc_id"];

		// tieude_baiviet
		$intro_article->tieude_baiviet->AdvancedSearch->SearchValue = @$_GET["x_tieude_baiviet"];
		$intro_article->tieude_baiviet->AdvancedSearch->SearchOperator = @$_GET["z_tieude_baiviet"];

		// begin_date
		$intro_article->begin_date->AdvancedSearch->SearchValue = @$_GET["x_begin_date"];
		$intro_article->begin_date->AdvancedSearch->SearchOperator = @$_GET["z_begin_date"];

		// end_date
		$intro_article->end_date->AdvancedSearch->SearchValue = @$_GET["x_end_date"];
		$intro_article->end_date->AdvancedSearch->SearchOperator = @$_GET["z_end_date"];

		// tukhoa_baiviet
		$intro_article->tukhoa_baiviet->AdvancedSearch->SearchValue = @$_GET["x_tukhoa_baiviet"];
		$intro_article->tukhoa_baiviet->AdvancedSearch->SearchOperator = @$_GET["z_tukhoa_baiviet"];

		// tomtat_baiviet
		$intro_article->tomtat_baiviet->AdvancedSearch->SearchValue = @$_GET["x_tomtat_baiviet"];
		$intro_article->tomtat_baiviet->AdvancedSearch->SearchOperator = @$_GET["z_tomtat_baiviet"];

		// noidung_baiviet
		$intro_article->noidung_baiviet->AdvancedSearch->SearchValue = @$_GET["x_noidung_baiviet"];
		$intro_article->noidung_baiviet->AdvancedSearch->SearchOperator = @$_GET["z_noidung_baiviet"];

		// nguon_baiviet
		$intro_article->nguon_baiviet->AdvancedSearch->SearchValue = @$_GET["x_nguon_baiviet"];
		$intro_article->nguon_baiviet->AdvancedSearch->SearchOperator = @$_GET["z_nguon_baiviet"];

		// lienket_baiviet
		$intro_article->lienket_baiviet->AdvancedSearch->SearchValue = @$_GET["x_lienket_baiviet"];
		$intro_article->lienket_baiviet->AdvancedSearch->SearchOperator = @$_GET["z_lienket_baiviet"];

		// thoigian_them
		$intro_article->thoigian_them->AdvancedSearch->SearchValue = @$_GET["x_thoigian_them"];
		$intro_article->thoigian_them->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_them"];

		// thoihan_sua
		$intro_article->thoihan_sua->AdvancedSearch->SearchValue = @$_GET["x_thoihan_sua"];
		$intro_article->thoihan_sua->AdvancedSearch->SearchOperator = @$_GET["z_thoihan_sua"];

		// nguoi_them
		$intro_article->nguoi_them->AdvancedSearch->SearchValue = @$_GET["x_nguoi_them"];
		$intro_article->nguoi_them->AdvancedSearch->SearchOperator = @$_GET["z_nguoi_them"];

		// nguoi_sua
		$intro_article->nguoi_sua->AdvancedSearch->SearchValue = @$_GET["x_nguoi_sua"];
		$intro_article->nguoi_sua->AdvancedSearch->SearchOperator = @$_GET["z_nguoi_sua"];

		// soluot_truynhap
		$intro_article->soluot_truynhap->AdvancedSearch->SearchValue = @$_GET["x_soluot_truynhap"];
		$intro_article->soluot_truynhap->AdvancedSearch->SearchOperator = @$_GET["z_soluot_truynhap"];

		// trang_thai
		$intro_article->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$intro_article->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];

		// thutu_sapxep
		$intro_article->thutu_sapxep->AdvancedSearch->SearchValue = @$_GET["x_thutu_sapxep"];
		$intro_article->thutu_sapxep->AdvancedSearch->SearchOperator = @$_GET["z_thutu_sapxep"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $intro_article;

		// Call Recordset Selecting event
		$intro_article->Recordset_Selecting($intro_article->CurrentFilter);

		// Load list page SQL
		$sSql = $intro_article->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";
		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$intro_article->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_article;
		$sFilter = $intro_article->KeyFilter();

		// Call Row Selecting event
		$intro_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_article->CurrentFilter = $sFilter;
		$sSql = $intro_article->SQL();
             
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_article;
		$intro_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$intro_article->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$intro_article->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$intro_article->begin_date->setDbValue($rs->fields('begin_date'));
		$intro_article->end_date->setDbValue($rs->fields('end_date'));
		$intro_article->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$intro_article->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$intro_article->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$intro_article->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$intro_article->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$intro_article->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_article->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$intro_article->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_article->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$intro_article->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$intro_article->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_article->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$intro_article->anh_daidien->Upload->DbValue = $rs->fields('anh_daidien');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_article;

		// Call Row_Rendering event
		$intro_article->Row_Rendering();

		// Common render codes for all row types
		// baiviet_id

		$intro_article->baiviet_id->CellCssStyle = "";
		$intro_article->baiviet_id->CellCssClass = "";

		// chuyenmuc_id
		$intro_article->chuyenmuc_id->CellCssStyle = "";
		$intro_article->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$intro_article->tieude_baiviet->CellCssStyle = "";
		$intro_article->tieude_baiviet->CellCssClass = "";

		// begin_date
		$intro_article->begin_date->CellCssStyle = "";
		$intro_article->begin_date->CellCssClass = "";

		// end_date
		$intro_article->end_date->CellCssStyle = "";
		$intro_article->end_date->CellCssClass = "";

		// tukhoa_baiviet
		$intro_article->tukhoa_baiviet->CellCssStyle = "";
		$intro_article->tukhoa_baiviet->CellCssClass = "";

		// trang_thai
		$intro_article->trang_thai->CellCssStyle = "";
		$intro_article->trang_thai->CellCssClass = "";

		// thutu_sapxep
		$intro_article->thutu_sapxep->CellCssStyle = "";
		$intro_article->thutu_sapxep->CellCssClass = "";
		if ($intro_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// baiviet_id
			$intro_article->baiviet_id->ViewValue = $intro_article->baiviet_id->CurrentValue;
			$intro_article->baiviet_id->CssStyle = "";
			$intro_article->baiviet_id->CssClass = "";
			$intro_article->baiviet_id->ViewCustomAttributes = "";

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->ViewValue = $intro_article->chuyenmuc_id->CurrentValue;
			$intro_article->chuyenmuc_id->CssStyle = "";
			$intro_article->chuyenmuc_id->CssClass = "";
			$intro_article->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->ViewValue = $intro_article->tieude_baiviet->CurrentValue;
			$intro_article->tieude_baiviet->CssStyle = "";
			$intro_article->tieude_baiviet->CssClass = "";
			$intro_article->tieude_baiviet->ViewCustomAttributes = "";

			// begin_date
			$intro_article->begin_date->ViewValue = $intro_article->begin_date->CurrentValue;
			$intro_article->begin_date->ViewValue = $intro_article->begin_date->ViewValue;
			$intro_article->begin_date->CssStyle = "";
			$intro_article->begin_date->CssClass = "";
			$intro_article->begin_date->ViewCustomAttributes = "";

			// end_date
			$intro_article->end_date->ViewValue = $intro_article->end_date->CurrentValue;
			$intro_article->end_date->ViewValue = $intro_article->end_date->ViewValue;
			$intro_article->end_date->CssStyle = "";
			$intro_article->end_date->CssClass = "";
			$intro_article->end_date->ViewCustomAttributes = "";

			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->ViewValue = $intro_article->tukhoa_baiviet->CurrentValue;
			$intro_article->tukhoa_baiviet->CssStyle = "";
			$intro_article->tukhoa_baiviet->CssClass = "";
			$intro_article->tukhoa_baiviet->ViewCustomAttributes = "";

			// nguon_baiviet
			$intro_article->nguon_baiviet->ViewValue = $intro_article->nguon_baiviet->CurrentValue;
			$intro_article->nguon_baiviet->CssStyle = "";
			$intro_article->nguon_baiviet->CssClass = "";
			$intro_article->nguon_baiviet->ViewCustomAttributes = "";

			// lienket_baiviet
			$intro_article->lienket_baiviet->ViewValue = $intro_article->lienket_baiviet->CurrentValue;
			$intro_article->lienket_baiviet->CssStyle = "";
			$intro_article->lienket_baiviet->CssClass = "";
			$intro_article->lienket_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$intro_article->thoigian_them->ViewValue = $intro_article->thoigian_them->CurrentValue;
			$intro_article->thoigian_them->ViewValue = ew_FormatDateTime($intro_article->thoigian_them->ViewValue, 7);
			$intro_article->thoigian_them->CssStyle = "";
			$intro_article->thoigian_them->CssClass = "";
			$intro_article->thoigian_them->ViewCustomAttributes = "";

			// thoihan_sua
			$intro_article->thoihan_sua->ViewValue = $intro_article->thoihan_sua->CurrentValue;
			$intro_article->thoihan_sua->ViewValue = ew_FormatDateTime($intro_article->thoihan_sua->ViewValue, 7);
			$intro_article->thoihan_sua->CssStyle = "";
			$intro_article->thoihan_sua->CssClass = "";
			$intro_article->thoihan_sua->ViewCustomAttributes = "";

			// nguoi_them
			$intro_article->nguoi_them->ViewValue = $intro_article->nguoi_them->CurrentValue;
			$intro_article->nguoi_them->CssStyle = "";
			$intro_article->nguoi_them->CssClass = "";
			$intro_article->nguoi_them->ViewCustomAttributes = "";

			// nguoi_sua
			$intro_article->nguoi_sua->ViewValue = $intro_article->nguoi_sua->CurrentValue;
			$intro_article->nguoi_sua->CssStyle = "";
			$intro_article->nguoi_sua->CssClass = "";
			$intro_article->nguoi_sua->ViewCustomAttributes = "";

			// soluot_truynhap
			$intro_article->soluot_truynhap->ViewValue = $intro_article->soluot_truynhap->CurrentValue;
			$intro_article->soluot_truynhap->CssStyle = "";
			$intro_article->soluot_truynhap->CssClass = "";
			$intro_article->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			$intro_article->trang_thai->ViewValue = $intro_article->trang_thai->CurrentValue;
			$intro_article->trang_thai->CssStyle = "";
			$intro_article->trang_thai->CssClass = "";
			$intro_article->trang_thai->ViewCustomAttributes = "";

			// thutu_sapxep
			$intro_article->thutu_sapxep->ViewValue = $intro_article->thutu_sapxep->CurrentValue;
			$intro_article->thutu_sapxep->CssStyle = "";
			$intro_article->thutu_sapxep->CssClass = "";
			$intro_article->thutu_sapxep->ViewCustomAttributes = "";

			// baiviet_id
			$intro_article->baiviet_id->HrefValue = "";

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->HrefValue = "";

			// begin_date
			$intro_article->begin_date->HrefValue = "";

			// end_date
			$intro_article->end_date->HrefValue = "";

			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->HrefValue = "";

			// trang_thai
			$intro_article->trang_thai->HrefValue = "";

			// thutu_sapxep
			$intro_article->thutu_sapxep->HrefValue = "";
		} elseif ($intro_article->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// baiviet_id
			$intro_article->baiviet_id->EditCustomAttributes = "";
			$intro_article->baiviet_id->EditValue = ew_HtmlEncode($intro_article->baiviet_id->AdvancedSearch->SearchValue);

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->EditCustomAttributes = "";
			$intro_article->chuyenmuc_id->EditValue = ew_HtmlEncode($intro_article->chuyenmuc_id->AdvancedSearch->SearchValue);

			// tieude_baiviet
			$intro_article->tieude_baiviet->EditCustomAttributes = "";
			$intro_article->tieude_baiviet->EditValue = ew_HtmlEncode($intro_article->tieude_baiviet->AdvancedSearch->SearchValue);

			// begin_date
			$intro_article->begin_date->EditCustomAttributes = "";
			$intro_article->begin_date->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($intro_article->begin_date->AdvancedSearch->SearchValue, 7), 7));

			// end_date
			$intro_article->end_date->EditCustomAttributes = "";
			$intro_article->end_date->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($intro_article->end_date->AdvancedSearch->SearchValue, 7), 7));

			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->EditCustomAttributes = "";
			$intro_article->tukhoa_baiviet->EditValue = ew_HtmlEncode($intro_article->tukhoa_baiviet->AdvancedSearch->SearchValue);

			// trang_thai
			$intro_article->trang_thai->EditCustomAttributes = "";
			$intro_article->trang_thai->EditValue = ew_HtmlEncode($intro_article->trang_thai->AdvancedSearch->SearchValue);

			// thutu_sapxep
			$intro_article->thutu_sapxep->EditCustomAttributes = "";
			$intro_article->thutu_sapxep->EditValue = ew_HtmlEncode($intro_article->thutu_sapxep->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$intro_article->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $intro_article;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($intro_article->begin_date->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Begin Date";
		}
		if (!ew_CheckEuroDate($intro_article->end_date->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - End Date";
		}

		// Return validate result
		$ValidateSearch = ($gsSearchError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateSearch = $ValidateSearch && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $sFormCustomError;
		}
		return $ValidateSearch;
	}

	// Load advanced search
	function LoadAdvancedSearch() {
		global $intro_article;
		$intro_article->baiviet_id->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_baiviet_id");
		$intro_article->chuyenmuc_id->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_chuyenmuc_id");
		$intro_article->tieude_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_tieude_baiviet");
		$intro_article->begin_date->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_begin_date");
		$intro_article->end_date->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_end_date");
		$intro_article->tukhoa_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_tukhoa_baiviet");
		$intro_article->tomtat_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_tomtat_baiviet");
		$intro_article->noidung_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_noidung_baiviet");
		$intro_article->nguon_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_nguon_baiviet");
		$intro_article->lienket_baiviet->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_lienket_baiviet");
		$intro_article->thoigian_them->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thoigian_them");
		$intro_article->thoihan_sua->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thoihan_sua");
		$intro_article->nguoi_them->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_nguoi_them");
		$intro_article->nguoi_sua->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_nguoi_sua");
		$intro_article->soluot_truynhap->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_soluot_truynhap");
		$intro_article->trang_thai->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_trang_thai");
		$intro_article->thutu_sapxep->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thutu_sapxep");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $intro_article;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($intro_article->ExportAll) {
			$this->lStopRec = $this->lTotalRecs;
		} else { // Export 1 page only
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->lDisplayRecs < 0) {
				$this->lStopRec = $this->lTotalRecs;
			} else {
				$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
			}
		}
		if ($intro_article->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($intro_article->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $intro_article->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'baiviet_id', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'chuyenmuc_id', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'tieude_baiviet', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'begin_date', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'end_date', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'tukhoa_baiviet', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'nguon_baiviet', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'lienket_baiviet', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_them', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'thoihan_sua', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'nguoi_them', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'nguoi_sua', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'soluot_truynhap', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'trang_thai', $intro_article->Export);
				ew_ExportAddValue($sExportStr, 'thutu_sapxep', $intro_article->Export);
				echo ew_ExportLine($sExportStr, $intro_article->Export);
			}
		}

		// Move to first record
		$this->lRecCnt = $this->lStartRec - 1;
		if (!$rs->EOF) {
			$rs->MoveFirst();
			$rs->Move($this->lStartRec - 1);
		}
		while (!$rs->EOF && $this->lRecCnt < $this->lStopRec) {
			$this->lRecCnt++;
			if (intval($this->lRecCnt) >= intval($this->lStartRec)) {
				$this->LoadRowValues($rs);

				// Render row for display
				$intro_article->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($intro_article->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('baiviet_id', $intro_article->baiviet_id->CurrentValue);
					$XmlDoc->AddField('chuyenmuc_id', $intro_article->chuyenmuc_id->CurrentValue);
					$XmlDoc->AddField('tieude_baiviet', $intro_article->tieude_baiviet->CurrentValue);
					$XmlDoc->AddField('begin_date', $intro_article->begin_date->CurrentValue);
					$XmlDoc->AddField('end_date', $intro_article->end_date->CurrentValue);
					$XmlDoc->AddField('tukhoa_baiviet', $intro_article->tukhoa_baiviet->CurrentValue);
					$XmlDoc->AddField('nguon_baiviet', $intro_article->nguon_baiviet->CurrentValue);
					$XmlDoc->AddField('lienket_baiviet', $intro_article->lienket_baiviet->CurrentValue);
					$XmlDoc->AddField('thoigian_them', $intro_article->thoigian_them->CurrentValue);
					$XmlDoc->AddField('thoihan_sua', $intro_article->thoihan_sua->CurrentValue);
					$XmlDoc->AddField('nguoi_them', $intro_article->nguoi_them->CurrentValue);
					$XmlDoc->AddField('nguoi_sua', $intro_article->nguoi_sua->CurrentValue);
					$XmlDoc->AddField('soluot_truynhap', $intro_article->soluot_truynhap->CurrentValue);
					$XmlDoc->AddField('trang_thai', $intro_article->trang_thai->CurrentValue);
					$XmlDoc->AddField('thutu_sapxep', $intro_article->thutu_sapxep->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $intro_article->Export <> "csv") { // Vertical format
						echo ew_ExportField('baiviet_id', $intro_article->baiviet_id->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('chuyenmuc_id', $intro_article->chuyenmuc_id->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('tieude_baiviet', $intro_article->tieude_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('begin_date', $intro_article->begin_date->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('end_date', $intro_article->end_date->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('tukhoa_baiviet', $intro_article->tukhoa_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('nguon_baiviet', $intro_article->nguon_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('lienket_baiviet', $intro_article->lienket_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('thoigian_them', $intro_article->thoigian_them->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('thoihan_sua', $intro_article->thoihan_sua->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('nguoi_them', $intro_article->nguoi_them->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('nguoi_sua', $intro_article->nguoi_sua->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('soluot_truynhap', $intro_article->soluot_truynhap->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('trang_thai', $intro_article->trang_thai->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportField('thutu_sapxep', $intro_article->thutu_sapxep->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $intro_article->baiviet_id->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->chuyenmuc_id->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->tieude_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->begin_date->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->end_date->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->tukhoa_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->nguon_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->lienket_baiviet->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->thoigian_them->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->thoihan_sua->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->nguoi_them->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->nguoi_sua->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->soluot_truynhap->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->trang_thai->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						ew_ExportAddValue($sExportStr, $intro_article->thutu_sapxep->ExportValue($intro_article->Export, $intro_article->ExportOriginalValue), $intro_article->Export);
						echo ew_ExportLine($sExportStr, $intro_article->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($intro_article->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($intro_article->Export);
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
