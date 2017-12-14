<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "file_attachinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "advertising_infoinfo.php" ?>
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
$file_attach_list = new cfile_attach_list();
$Page =& $file_attach_list;

// Page init processing
$file_attach_list->Page_Init();

// Page main processing
$file_attach_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($file_attach->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var file_attach_list = new ew_Page("file_attach_list");

// page properties
file_attach_list.PageID = "list"; // page ID
var EW_PAGE_ID = file_attach_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
file_attach_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
file_attach_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
file_attach_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
file_attach_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($file_attach->Export == "") { ?>
<?php
$gsMasterReturnUrl = "advertising_infolist.php";
if ($file_attach_list->sDbMasterFilter <> "" && $file_attach->getCurrentMasterTable() == "advertising_info") {
	if ($file_attach_list->bMasterRecordExists) {
		if ($file_attach->getCurrentMasterTable() == $file_attach->TableVar) $gsMasterReturnUrl .= "?" . EW_TABLE_SHOW_MASTER . "=";
?>
<?php include "advertising_infomaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = ($file_attach->Export == "" && $file_attach->SelectLimit);
	if (!$bSelectLimit)
		$rs = $file_attach_list->LoadRecordset();
	$file_attach_list->lTotalRecs = ($bSelectLimit) ? $file_attach->SelectRecordCount() : $rs->RecordCount();
	$file_attach_list->lStartRec = 1;
	if ($file_attach_list->lDisplayRecs <= 0) // Display all records
		$file_attach_list->lDisplayRecs = $file_attach_list->lTotalRecs;
	if (!($file_attach->ExportAll && $file_attach->Export <> ""))
		$file_attach_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $file_attach_list->LoadRecordset($file_attach_list->lStartRec-1, $file_attach_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" >
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách file đính kèm</font></b></td>
								<td height="20" width="54%" >
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $file_attach_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($file_attach->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($file_attach->CurrentAction <> "gridadd" && $file_attach->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($file_attach_list->Pager)) $file_attach_list->Pager = new cNumericPager($file_attach_list->lStartRec, $file_attach_list->lDisplayRecs, $file_attach_list->lTotalRecs, $file_attach_list->lRecRange) ?>
<?php if ($file_attach_list->Pager->RecordCount > 0) { ?>
	<?php if ($file_attach_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($file_attach_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	File <?php echo $file_attach_list->Pager->FromIndex ?> đến <?php echo $file_attach_list->Pager->ToIndex ?> của <?php echo $file_attach_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($file_attach_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Chưa có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($file_attach_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="file_attach">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($file_attach_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($file_attach_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($file_attach_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($file_attach->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $file_attach->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($file_attach_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ffile_attachlist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $file_attach_list->sDeleteConfirmMsg ?>')) {document.ffile_attachlist.action='file_attachdelete.php';document.ffile_attachlist.encoding='application/x-www-form-urlencoded';document.ffile_attachlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ffile_attachlist" id="ffile_attachlist" class="ewForm" action="" method="post">
<?php if ($file_attach_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$file_attach_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$file_attach_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$file_attach_list->lOptionCnt++; // Multi-select
}
	$file_attach_list->lOptionCnt += count($file_attach_list->ListOptions->Items); // Custom list options
?>
<?php echo $file_attach->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($file_attach->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width:30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;width:30px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="file_attach_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($file_attach_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($file_attach->file_name->Visible) { // file_name ?>
	<?php if ($file_attach->SortUrl($file_attach->file_name) == "") { ?>
		<td>File Name</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $file_attach->SortUrl($file_attach->file_name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên file</td><td style="width: 10px;"><?php if ($file_attach->file_name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($file_attach->file_name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($file_attach->file_desc->Visible) { // file_desc ?>
	<?php if ($file_attach->SortUrl($file_attach->file_desc) == "") { ?>
		<td>File Desc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $file_attach->SortUrl($file_attach->file_desc) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Chú thích</td><td style="width: 10px;"><?php if ($file_attach->file_desc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($file_attach->file_desc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($file_attach->ExportAll && $file_attach->Export <> "") {
	$file_attach_list->lStopRec = $file_attach_list->lTotalRecs;
} else {
	$file_attach_list->lStopRec = $file_attach_list->lStartRec + $file_attach_list->lDisplayRecs - 1; // Set the last record to display
}
$file_attach_list->lRecCount = $file_attach_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$file_attach->SelectLimit && $file_attach_list->lStartRec > 1)
		$rs->Move($file_attach_list->lStartRec - 1);
}
$file_attach_list->lRowCnt = 0;
while (($file_attach->CurrentAction == "gridadd" || !$rs->EOF) &&
	$file_attach_list->lRecCount < $file_attach_list->lStopRec) {
	$file_attach_list->lRecCount++;
	if (intval($file_attach_list->lRecCount) >= intval($file_attach_list->lStartRec)) {
		$file_attach_list->lRowCnt++;

	// Init row class and style
	$file_attach->CssClass = "";
	$file_attach->CssStyle = "";
	$file_attach->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($file_attach->CurrentAction == "gridadd") {
		$file_attach_list->LoadDefaultValues(); // Load default values
	} else {
		$file_attach_list->LoadRowValues($rs); // Load row values
	}
	$file_attach->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$file_attach_list->RenderRow();
?>
	<tr<?php echo $file_attach->RowAttributes() ?>>
<?php if ($file_attach->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $file_attach->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($file_attach->file_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($file_attach_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($file_attach->file_name->Visible) { // file_name ?>
		<td<?php echo $file_attach->file_name->CellAttributes() ?>>
<div<?php echo $file_attach->file_name->ViewAttributes() ?>><?php echo $file_attach->file_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($file_attach->file_desc->Visible) { // file_desc ?>
		<td<?php echo $file_attach->file_desc->CellAttributes() ?>>
<div<?php echo $file_attach->file_desc->ViewAttributes() ?>><?php echo $file_attach->file_desc->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($file_attach->CurrentAction <> "gridadd")
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
<?php if ($file_attach_list->lTotalRecs > 0) { ?>
<?php if ($file_attach->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($file_attach->CurrentAction <> "gridadd" && $file_attach->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($file_attach_list->Pager)) $file_attach_list->Pager = new cNumericPager($file_attach_list->lStartRec, $file_attach_list->lDisplayRecs, $file_attach_list->lTotalRecs, $file_attach_list->lRecRange) ?>
<?php if ($file_attach_list->Pager->RecordCount > 0) { ?>
	<?php if ($file_attach_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($file_attach_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $file_attach_list->PageUrl() ?>start=<?php echo $file_attach_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	File <?php echo $file_attach_list->Pager->FromIndex ?> đến <?php echo $file_attach_list->Pager->ToIndex ?> của <?php echo $file_attach_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($file_attach_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Chưa có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($file_attach_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="file_attach">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($file_attach_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($file_attach_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($file_attach_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($file_attach->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($file_attach_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $file_attach->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($file_attach_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ffile_attachlist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $file_attach_list->sDeleteConfirmMsg ?>')) {document.ffile_attachlist.action='file_attachdelete.php';document.ffile_attachlist.encoding='application/x-www-form-urlencoded';document.ffile_attachlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($file_attach->Export == "" && $file_attach->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(file_attach_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($file_attach->Export == "") { ?>
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
class cfile_attach_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'file_attach';

	// Page Object Name
	var $PageObjName = 'file_attach_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $file_attach;
		if ($file_attach->UseTokenInUrl) $PageUrl .= "t=" . $file_attach->TableVar . "&"; // add page token
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
		global $objForm, $file_attach;
		if ($file_attach->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($file_attach->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($file_attach->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cfile_attach_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["file_attach"] = new cfile_attach();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['advertising_info'] = new cadvertising_info();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'file_attach', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $file_attach;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("advertising_info");
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
	$file_attach->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $file_attach->Export; // Get export parameter, used in header
	$gsExportFile = $file_attach->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $file_attach;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
                $this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn không?"; // Delete confirm message

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Set up master detail parameters
			$this->SetUpMasterDetail();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($file_attach->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $file_attach->getRecordsPerPage(); // Restore from Session
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

		// Restore master/detail filter
		$this->sDbMasterFilter = $file_attach->getMasterFilter(); // Restore master filter
		$this->sDbDetailFilter = $file_attach->getDetailFilter(); // Restore detail filter
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Load master record
		if ($file_attach->getMasterFilter() <> "" && $file_attach->getCurrentMasterTable() == "advertising_info") {
			global $advertising_info;
			$rsmaster = $advertising_info->LoadRs($this->sDbMasterFilter);
			$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->bMasterRecordExists) {
				$file_attach->setMasterFilter(""); // Clear master filter
				$file_attach->setDetailFilter(""); // Clear detail filter
				$this->setMessage("Không có dữ liệu"); // Set no record found
				$this->Page_Terminate($file_attach->getReturnUrl()); // Return to caller
			} else {
				$advertising_info->LoadListRowValues($rsmaster);
				$advertising_info->RowType = EW_ROWTYPE_MASTER; // Master row
				$advertising_info->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in Session
		$file_attach->setSessionWhere($sFilter);
		$file_attach->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $file_attach;
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
			$file_attach->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$file_attach->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $file_attach;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$file_attach->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$file_attach->CurrentOrderType = @$_GET["ordertype"];
			$file_attach->UpdateSort($file_attach->file_name); // Field 
			$file_attach->UpdateSort($file_attach->file_desc); // Field 
			$file_attach->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $file_attach;
		$sOrderBy = $file_attach->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($file_attach->SqlOrderBy() <> "") {
				$sOrderBy = $file_attach->SqlOrderBy();
				$file_attach->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $file_attach;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$file_attach->getCurrentMasterTable = ""; // Clear master table
				$file_attach->setMasterFilter(""); // Clear master filter
				$this->sDbMasterFilter = "";
				$file_attach->setDetailFilter(""); // Clear detail filter
				$this->sDbDetailFilter = "";
				$file_attach->baiviet_id->setSessionValue("");
			}

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$file_attach->setSessionOrderBy($sOrderBy);
				$file_attach->file_name->setSort("");
				$file_attach->file_desc->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$file_attach->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $file_attach;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$file_attach->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$file_attach->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $file_attach->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$file_attach->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$file_attach->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$file_attach->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $file_attach;

		// Call Recordset Selecting event
		$file_attach->Recordset_Selecting($file_attach->CurrentFilter);

		// Load list page SQL
		$sSql = $file_attach->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$file_attach->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $file_attach;
		$sFilter = $file_attach->KeyFilter();

		// Call Row Selecting event
		$file_attach->Row_Selecting($sFilter);

		// Load sql based on filter
		$file_attach->CurrentFilter = $sFilter;
		$sSql = $file_attach->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$file_attach->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $file_attach;
		$file_attach->file_id->setDbValue($rs->fields('file_id'));
		$file_attach->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$file_attach->file_name->setDbValue($rs->fields('file_name'));
		$file_attach->file_fullname->Upload->DbValue = $rs->fields('file_fullname');
		$file_attach->file_desc->setDbValue($rs->fields('file_desc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $file_attach;

		// Call Row_Rendering event
		$file_attach->Row_Rendering();

		// Common render codes for all row types
		// file_name

		$file_attach->file_name->CellCssStyle = "";
		$file_attach->file_name->CellCssClass = "";

		// file_desc
		$file_attach->file_desc->CellCssStyle = "";
		$file_attach->file_desc->CellCssClass = "";
		if ($file_attach->RowType == EW_ROWTYPE_VIEW) { // View row

			// file_name
			$file_attach->file_name->ViewValue = $file_attach->file_name->CurrentValue;
			$file_attach->file_name->CssStyle = "";
			$file_attach->file_name->CssClass = "";
			$file_attach->file_name->ViewCustomAttributes = "";

			// file_desc
			$file_attach->file_desc->ViewValue = $file_attach->file_desc->CurrentValue;
			$file_attach->file_desc->CssStyle = "";
			$file_attach->file_desc->CssClass = "";
			$file_attach->file_desc->ViewCustomAttributes = "";

			// file_name
			$file_attach->file_name->HrefValue = "";

			// file_desc
			$file_attach->file_desc->HrefValue = "";
		}

		// Call Row Rendered event
		$file_attach->Row_Rendered();
	}

	// Set up Master Detail based on querystring parameter
	function SetUpMasterDetail() {
		global $file_attach;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[EW_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = "";
				$this->sDbDetailFilter = "";
			}
			if ($sMasterTblVar == "advertising_info") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = $file_attach->SqlMasterFilter_advertising_info();
				$this->sDbDetailFilter = $file_attach->SqlDetailFilter_advertising_info();
				if (@$_GET["baiviet_id"] <> "") {
					$GLOBALS["advertising_info"]->baiviet_id->setQueryStringValue($_GET["baiviet_id"]);
					$file_attach->baiviet_id->setQueryStringValue($GLOBALS["advertising_info"]->baiviet_id->QueryStringValue);
					$file_attach->baiviet_id->setSessionValue($file_attach->baiviet_id->QueryStringValue);
					if (!is_numeric($GLOBALS["advertising_info"]->baiviet_id->QueryStringValue)) $bValidMaster = FALSE;
					$this->sDbMasterFilter = str_replace("@baiviet_id@", ew_AdjustSql($GLOBALS["advertising_info"]->baiviet_id->QueryStringValue), $this->sDbMasterFilter);
					$this->sDbDetailFilter = str_replace("@baiviet_id@", ew_AdjustSql($GLOBALS["advertising_info"]->baiviet_id->QueryStringValue), $this->sDbDetailFilter);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$file_attach->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->lStartRec = 1;
			$file_attach->setStartRecordNumber($this->lStartRec);
			$file_attach->setMasterFilter($this->sDbMasterFilter); // Set up master filter
			$file_attach->setDetailFilter($this->sDbDetailFilter); // Set up detail filter

			// Clear previous master session values
			if ($sMasterTblVar <> "advertising_info") {
				if ($file_attach->baiviet_id->QueryStringValue == "") $file_attach->baiviet_id->setSessionValue("");
			}
		} else {
			$this->sDbMasterFilter = $file_attach->getMasterFilter(); //  Restore master filter
			$this->sDbDetailFilter = $file_attach->getDetailFilter(); // Restore detail filter
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
