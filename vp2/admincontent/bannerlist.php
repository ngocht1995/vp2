<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "bannerinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$banner_list = new cbanner_list();
$Page =& $banner_list;

// Page init processing
$banner_list->Page_Init();

// Page main processing
$banner_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($banner->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var banner_list = new ew_Page("banner_list");

// page properties
banner_list.PageID = "list"; // page ID
var EW_PAGE_ID = banner_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
banner_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
banner_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
banner_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
banner_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<?php if ($banner->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($banner->Export == "" && $banner->SelectLimit);
	if (!$bSelectLimit)
		$rs = $banner_list->LoadRecordset();
	$banner_list->lTotalRecs = ($bSelectLimit) ? $banner->SelectRecordCount() : $rs->RecordCount();
	$banner_list->lStartRec = 1;
	if ($banner_list->lDisplayRecs <= 0) // Display all records
		$banner_list->lDisplayRecs = $banner_list->lTotalRecs;
	if (!($banner->ExportAll && $banner->Export <> ""))
		$banner_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $banner_list->LoadRecordset($banner_list->lStartRec-1, $banner_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">TABLE: Banner
</span></p>
<?php $banner_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($banner->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($banner->CurrentAction <> "gridadd" && $banner->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($banner_list->Pager)) $banner_list->Pager = new cNumericPager($banner_list->lStartRec, $banner_list->lDisplayRecs, $banner_list->lTotalRecs, $banner_list->lRecRange) ?>
<?php if ($banner_list->Pager->RecordCount > 0) { ?>
	<?php if ($banner_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($banner_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $banner_list->Pager->FromIndex ?> to <?php echo $banner_list->Pager->ToIndex ?> of <?php echo $banner_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($banner_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($banner_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="banner">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($banner_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($banner_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($banner_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($banner->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $banner->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($banner_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fbannerlist)) alert('No records selected'); else {document.fbannerlist.action='bannerdelete.php';document.fbannerlist.encoding='application/x-www-form-urlencoded';document.fbannerlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fbannerlist" id="fbannerlist" class="ewForm" action="" method="post">
<?php if ($banner_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$banner_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$banner_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$banner_list->lOptionCnt++; // Multi-select
}
	$banner_list->lOptionCnt += count($banner_list->ListOptions->Items); // Custom list options
?>
<?php echo $banner->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($banner->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="banner_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($banner_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($banner->banner_pic->Visible) { // banner_pic ?>
	<?php if ($banner->SortUrl($banner->banner_pic) == "") { ?>
		<td>Banner Pic</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $banner->SortUrl($banner->banner_pic) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Banner Pic</td><td style="width: 10px;"><?php if ($banner->banner_pic->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($banner->banner_pic->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($banner->banner_url->Visible) { // banner_url ?>
	<?php if ($banner->SortUrl($banner->banner_url) == "") { ?>
		<td>Banner Url</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $banner->SortUrl($banner->banner_url) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Banner Url</td><td style="width: 10px;"><?php if ($banner->banner_url->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($banner->banner_url->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($banner->banner_type->Visible) { // banner_type ?>
	<?php if ($banner->SortUrl($banner->banner_type) == "") { ?>
		<td>Banner Type</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $banner->SortUrl($banner->banner_type) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Banner Type</td><td style="width: 10px;"><?php if ($banner->banner_type->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($banner->banner_type->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($banner->ExportAll && $banner->Export <> "") {
	$banner_list->lStopRec = $banner_list->lTotalRecs;
} else {
	$banner_list->lStopRec = $banner_list->lStartRec + $banner_list->lDisplayRecs - 1; // Set the last record to display
}
$banner_list->lRecCount = $banner_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$banner->SelectLimit && $banner_list->lStartRec > 1)
		$rs->Move($banner_list->lStartRec - 1);
}
$banner_list->lRowCnt = 0;
while (($banner->CurrentAction == "gridadd" || !$rs->EOF) &&
	$banner_list->lRecCount < $banner_list->lStopRec) {
	$banner_list->lRecCount++;
	if (intval($banner_list->lRecCount) >= intval($banner_list->lStartRec)) {
		$banner_list->lRowCnt++;

	// Init row class and style
	$banner->CssClass = "";
	$banner->CssStyle = "";
	$banner->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($banner->CurrentAction == "gridadd") {
		$banner_list->LoadDefaultValues(); // Load default values
	} else {
		$banner_list->LoadRowValues($rs); // Load row values
	}
	$banner->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$banner_list->RenderRow();
?>
	<tr<?php echo $banner->RowAttributes() ?>>
<?php if ($banner->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $banner->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($banner->banner_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($banner_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($banner->banner_pic->Visible) { // banner_pic ?>
		<td<?php echo $banner->banner_pic->CellAttributes() ?>>
<?php if ($banner->banner_pic->HrefValue <> "") { ?>
<?php if (!is_null($banner->banner_pic->Upload->DbValue)) { ?>
<a href="<?php echo $banner->banner_pic->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $banner->banner_pic->Upload->DbValue ?>" border=0<?php echo $banner->banner_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($banner->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($banner->banner_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $banner->banner_pic->Upload->DbValue ?>" border=0<?php echo $banner->banner_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($banner->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($banner->banner_url->Visible) { // banner_url ?>
		<td<?php echo $banner->banner_url->CellAttributes() ?>>
<div<?php echo $banner->banner_url->ViewAttributes() ?>><?php echo $banner->banner_url->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($banner->banner_type->Visible) { // banner_type ?>
		<td<?php echo $banner->banner_type->CellAttributes() ?>>
<div<?php echo $banner->banner_type->ViewAttributes() ?>><?php echo $banner->banner_type->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($banner->CurrentAction <> "gridadd")
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
<?php if ($banner_list->lTotalRecs > 0) { ?>
<?php if ($banner->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($banner->CurrentAction <> "gridadd" && $banner->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($banner_list->Pager)) $banner_list->Pager = new cNumericPager($banner_list->lStartRec, $banner_list->lDisplayRecs, $banner_list->lTotalRecs, $banner_list->lRecRange) ?>
<?php if ($banner_list->Pager->RecordCount > 0) { ?>
	<?php if ($banner_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($banner_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $banner_list->PageUrl() ?>start=<?php echo $banner_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($banner_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $banner_list->Pager->FromIndex ?> to <?php echo $banner_list->Pager->ToIndex ?> of <?php echo $banner_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($banner_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($banner_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="banner">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($banner_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($banner_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($banner_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($banner->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($banner_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $banner->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($banner_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fbannerlist)) alert('No records selected'); else {document.fbannerlist.action='bannerdelete.php';document.fbannerlist.encoding='application/x-www-form-urlencoded';document.fbannerlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($banner->Export == "" && $banner->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(banner_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($banner->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cbanner_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'banner';

	// Page Object Name
	var $PageObjName = 'banner_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $banner;
		if ($banner->UseTokenInUrl) $PageUrl .= "t=" . $banner->TableVar . "&"; // add page token
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
		global $objForm, $banner;
		if ($banner->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($banner->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($banner->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cbanner_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["banner"] = new cbanner();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'banner', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $banner;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$banner->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $banner->Export; // Get export parameter, used in header
	$gsExportFile = $banner->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $banner;
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

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($banner->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $banner->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if (!$Security->CanList()) {
			$sFilter = "(0=1)"; // Filter all records
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$banner->setSessionWhere($sFilter);
		$banner->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $banner;
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
			$banner->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$banner->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $banner;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$banner->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$banner->CurrentOrderType = @$_GET["ordertype"];
			$banner->UpdateSort($banner->banner_pic); // Field 
			$banner->UpdateSort($banner->banner_url); // Field 
			$banner->UpdateSort($banner->banner_type); // Field 
			$banner->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $banner;
		$sOrderBy = $banner->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($banner->SqlOrderBy() <> "") {
				$sOrderBy = $banner->SqlOrderBy();
				$banner->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $banner;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$banner->setSessionOrderBy($sOrderBy);
				$banner->banner_pic->setSort("");
				$banner->banner_url->setSort("");
				$banner->banner_type->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$banner->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $banner;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$banner->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$banner->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $banner->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$banner->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$banner->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$banner->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $banner;

		// Call Recordset Selecting event
		$banner->Recordset_Selecting($banner->CurrentFilter);

		// Load list page SQL
		$sSql = $banner->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$banner->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $banner;
		$sFilter = $banner->KeyFilter();

		// Call Row Selecting event
		$banner->Row_Selecting($sFilter);

		// Load sql based on filter
		$banner->CurrentFilter = $sFilter;
		$sSql = $banner->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$banner->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $banner;
		$banner->banner_id->setDbValue($rs->fields('banner_id'));
		$banner->banner_pic->Upload->DbValue = $rs->fields('banner_pic');
		$banner->banner_url->setDbValue($rs->fields('banner_url'));
		$banner->banner_type->setDbValue($rs->fields('banner_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $banner;

		// Call Row_Rendering event
		$banner->Row_Rendering();

		// Common render codes for all row types
		// banner_pic

		$banner->banner_pic->CellCssStyle = "";
		$banner->banner_pic->CellCssClass = "";

		// banner_url
		$banner->banner_url->CellCssStyle = "";
		$banner->banner_url->CellCssClass = "";

		// banner_type
		$banner->banner_type->CellCssStyle = "";
		$banner->banner_type->CellCssClass = "";
		if ($banner->RowType == EW_ROWTYPE_VIEW) { // View row

			// banner_pic
			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->ViewValue = $banner->banner_pic->Upload->DbValue;
				$banner->banner_pic->ImageAlt = "";
			} else {
				$banner->banner_pic->ViewValue = "";
			}
			$banner->banner_pic->CssStyle = "";
			$banner->banner_pic->CssClass = "";
			$banner->banner_pic->ViewCustomAttributes = "";

			// banner_url
			$banner->banner_url->ViewValue = $banner->banner_url->CurrentValue;
			$banner->banner_url->CssStyle = "";
			$banner->banner_url->CssClass = "";
			$banner->banner_url->ViewCustomAttributes = "";

			// banner_type
			if (strval($banner->banner_type->CurrentValue) <> "") {
				switch ($banner->banner_type->CurrentValue) {
					case "0":
						$banner->banner_type->ViewValue = "Image";
						break;
					case "1":
						$banner->banner_type->ViewValue = "Flash";
						break;
					default:
						$banner->banner_type->ViewValue = $banner->banner_type->CurrentValue;
				}
			} else {
				$banner->banner_type->ViewValue = NULL;
			}
			$banner->banner_type->CssStyle = "";
			$banner->banner_type->CssClass = "";
			$banner->banner_type->ViewCustomAttributes = "";

			// banner_pic
			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($banner->banner_pic->ViewValue)) ? $banner->banner_pic->ViewValue : $banner->banner_pic->CurrentValue);
				if ($banner->Export <> "") $banner->banner_pic->HrefValue = ew_ConvertFullUrl($banner->banner_pic->HrefValue);
			} else {
				$banner->banner_pic->HrefValue = "";
			}

			// banner_url
			$banner->banner_url->HrefValue = "";

			// banner_type
			$banner->banner_type->HrefValue = "";
		}

		// Call Row Rendered event
		$banner->Row_Rendered();
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
