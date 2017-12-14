<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "linkinfo.php" ?>
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
$link_list = new clink_list();
$Page =& $link_list;

// Page init processing
$link_list->Page_Init();

// Page main processing
$link_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($link->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var link_list = new ew_Page("link_list");

// page properties
link_list.PageID = "list"; // page ID
var EW_PAGE_ID = link_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
link_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
link_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
link_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
link_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($link->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($link->Export == "" && $link->SelectLimit);
	if (!$bSelectLimit)
		$rs = $link_list->LoadRecordset();
	$link_list->lTotalRecs = ($bSelectLimit) ? $link->SelectRecordCount() : $rs->RecordCount();
	$link_list->lStartRec = 1;
	if ($link_list->lDisplayRecs <= 0) // Display all records
		$link_list->lDisplayRecs = $link_list->lTotalRecs;
	if (!($link->ExportAll && $link->Export <> ""))
		$link_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $link_list->LoadRecordset($link_list->lStartRec-1, $link_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý liên kết Website</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php $link_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($link->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($link->CurrentAction <> "gridadd" && $link->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($link_list->Pager)) $link_list->Pager = new cNumericPager($link_list->lStartRec, $link_list->lDisplayRecs, $link_list->lTotalRecs, $link_list->lRecRange) ?>
<?php if ($link_list->Pager->RecordCount > 0) { ?>
	<?php if ($link_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($link_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi từ <?php echo $link_list->Pager->FromIndex ?> đến <?php echo $link_list->Pager->ToIndex ?> của <?php echo $link_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($link_list->sSrchWhere == "0=101") { ?>
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
<?php if ($link_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="link">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($link_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($link_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($link_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($link->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $link->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($link_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.flinklist)) alert('Chưa có bản ghi nào được chọn'); else if (ew_Confirm('Bạn có chắc chắn muốn xóa không')) {document.flinklist.action='linkdelete.php';document.flinklist.encoding='application/x-www-form-urlencoded';document.flinklist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.flinklist)) alert('Chưa có bản ghi nào được chọn'); else {document.flinklist.action='linkupdate.php';document.flinklist.encoding='application/x-www-form-urlencoded';document.flinklist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="flinklist" id="flinklist" class="ewForm" action="" method="post">
<?php if ($link_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$link_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$link_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$link_list->lOptionCnt++; // Multi-select
}
	$link_list->lOptionCnt += count($link_list->ListOptions->Items); // Custom list options
?>
<?php echo $link->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($link->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 30px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="link_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($link_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($link->link_name->Visible) { // link_name ?>
	<?php if ($link->SortUrl($link->link_name) == "") { ?>
		<td>Link Name</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $link->SortUrl($link->link_name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên liên kết</td><td style="width: 10px;"><?php if ($link->link_name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($link->link_name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($link->link_url->Visible) { // link_url ?>
	<?php if ($link->SortUrl($link->link_url) == "") { ?>
		<td>Link Url</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $link->SortUrl($link->link_url) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Đường dẫn liên kết</td><td style="width: 10px;"><?php if ($link->link_url->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($link->link_url->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($link->link_status->Visible) { // link_status ?>
	<?php if ($link->SortUrl($link->link_status) == "") { ?>
		<td>Link Status</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $link->SortUrl($link->link_status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($link->link_status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($link->link_status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($link->ExportAll && $link->Export <> "") {
	$link_list->lStopRec = $link_list->lTotalRecs;
} else {
	$link_list->lStopRec = $link_list->lStartRec + $link_list->lDisplayRecs - 1; // Set the last record to display
}
$link_list->lRecCount = $link_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$link->SelectLimit && $link_list->lStartRec > 1)
		$rs->Move($link_list->lStartRec - 1);
}
$link_list->lRowCnt = 0;
while (($link->CurrentAction == "gridadd" || !$rs->EOF) &&
	$link_list->lRecCount < $link_list->lStopRec) {
	$link_list->lRecCount++;
	if (intval($link_list->lRecCount) >= intval($link_list->lStartRec)) {
		$link_list->lRowCnt++;

	// Init row class and style
	$link->CssClass = "";
	$link->CssStyle = "";
	$link->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($link->CurrentAction == "gridadd") {
		$link_list->LoadDefaultValues(); // Load default values
	} else {
		$link_list->LoadRowValues($rs); // Load row values
	}
	$link->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$link_list->RenderRow();
?>
	<tr<?php echo $link->RowAttributes() ?>>
<?php if ($link->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $link->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($link->link_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($link_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($link->link_name->Visible) { // link_name ?>
		<td<?php echo $link->link_name->CellAttributes() ?>>
<div<?php echo $link->link_name->ViewAttributes() ?>><?php echo $link->link_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($link->link_url->Visible) { // link_url ?>
		<td<?php echo $link->link_url->CellAttributes() ?>>
<div<?php echo $link->link_url->ViewAttributes() ?>><?php echo $link->link_url->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($link->link_status->Visible) { // link_status ?>
		<td<?php echo $link->link_status->CellAttributes() ?>>
<div<?php echo $link->link_status->ViewAttributes() ?>><?php echo $link->link_status->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($link->CurrentAction <> "gridadd")
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
<?php if ($link_list->lTotalRecs > 0) { ?>
<?php if ($link->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($link->CurrentAction <> "gridadd" && $link->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($link_list->Pager)) $link_list->Pager = new cNumericPager($link_list->lStartRec, $link_list->lDisplayRecs, $link_list->lTotalRecs, $link_list->lRecRange) ?>
<?php if ($link_list->Pager->RecordCount > 0) { ?>
	<?php if ($link_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($link_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $link_list->PageUrl() ?>start=<?php echo $link_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($link_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi từ <?php echo $link_list->Pager->FromIndex ?> đến <?php echo $link_list->Pager->ToIndex ?> của <?php echo $link_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($link_list->sSrchWhere == "0=101") { ?>
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
<?php if ($link_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="link">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($link_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($link_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($link_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($link->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($link_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $link->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($link_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.flinklist)) alert('Chưa có bản ghi nào được chọn'); else if (ew_Confirm('Bạn có chắc chắn muốn xóa không'))  {document.flinklist.action='linkdelete.php';document.flinklist.encoding='application/x-www-form-urlencoded';document.flinklist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.flinklist)) alert('Chưa có bản ghi nào được chọn'); else {document.flinklist.action='linkupdate.php';document.flinklist.encoding='application/x-www-form-urlencoded';document.flinklist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($link->Export == "" && $link->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(link_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($link->Export == "") { ?>
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
class clink_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'link';

	// Page Object Name
	var $PageObjName = 'link_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $link;
		if ($link->UseTokenInUrl) $PageUrl .= "t=" . $link->TableVar . "&"; // add page token
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
		global $objForm, $link;
		if ($link->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($link->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($link->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function clink_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["link"] = new clink();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'link', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $link;
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
	$link->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $link->Export; // Get export parameter, used in header
	$gsExportFile = $link->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $link;
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
		if ($link->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $link->getRecordsPerPage(); // Restore from Session
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
		$link->setSessionWhere($sFilter);
		$link->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $link;
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
			$link->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$link->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $link;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$link->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$link->CurrentOrderType = @$_GET["ordertype"];
			$link->UpdateSort($link->link_name); // Field 
			$link->UpdateSort($link->link_url); // Field 
			$link->UpdateSort($link->link_status); // Field 
			$link->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $link;
		$sOrderBy = $link->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($link->SqlOrderBy() <> "") {
				$sOrderBy = $link->SqlOrderBy();
				$link->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $link;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$link->setSessionOrderBy($sOrderBy);
				$link->link_name->setSort("");
				$link->link_url->setSort("");
				$link->link_status->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$link->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $link;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$link->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$link->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $link->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$link->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$link->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$link->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $link;

		// Call Recordset Selecting event
		$link->Recordset_Selecting($link->CurrentFilter);

		// Load list page SQL
		$sSql = $link->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$link->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $link;
		$sFilter = $link->KeyFilter();

		// Call Row Selecting event
		$link->Row_Selecting($sFilter);

		// Load sql based on filter
		$link->CurrentFilter = $sFilter;
		$sSql = $link->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$link->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $link;
		$link->link_id->setDbValue($rs->fields('link_id'));
		$link->link_name->setDbValue($rs->fields('link_name'));
		$link->link_url->setDbValue($rs->fields('link_url'));
		$link->link_status->setDbValue($rs->fields('link_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $link;

		// Call Row_Rendering event
		$link->Row_Rendering();

		// Common render codes for all row types
		// link_name

		$link->link_name->CellCssStyle = "";
		$link->link_name->CellCssClass = "";

		// link_url
		$link->link_url->CellCssStyle = "";
		$link->link_url->CellCssClass = "";

		// link_status
		$link->link_status->CellCssStyle = "";
		$link->link_status->CellCssClass = "";
		if ($link->RowType == EW_ROWTYPE_VIEW) { // View row

			// link_name
			$link->link_name->ViewValue = $link->link_name->CurrentValue;
			$link->link_name->CssStyle = "";
			$link->link_name->CssClass = "";
			$link->link_name->ViewCustomAttributes = "";

			// link_url
			$link->link_url->ViewValue = $link->link_url->CurrentValue;
			$link->link_url->CssStyle = "";
			$link->link_url->CssClass = "";
			$link->link_url->ViewCustomAttributes = "";

			// link_status
			if (strval($link->link_status->CurrentValue) <> "") {
				switch ($link->link_status->CurrentValue) {
					case "0":
						$link->link_status->ViewValue = "Không hiển thị";
						break;
					case "1":
						$link->link_status->ViewValue = "Hiển thị";
						break;
					default:
						$link->link_status->ViewValue = $link->link_status->CurrentValue;
				}
			} else {
				$link->link_status->ViewValue = NULL;
			}
			$link->link_status->CssStyle = "";
			$link->link_status->CssClass = "";
			$link->link_status->ViewCustomAttributes = "";

			// link_name
			$link->link_name->HrefValue = "";

			// link_url
			$link->link_url->HrefValue = "";

			// link_status
			$link->link_status->HrefValue = "";
		}

		// Call Row Rendered event
		$link->Row_Rendered();
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
