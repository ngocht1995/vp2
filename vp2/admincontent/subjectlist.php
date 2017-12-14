<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "subjectinfo.php" ?>
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
$subject_list = new csubject_list();
$Page =& $subject_list;

// Page init processing
$subject_list->Page_Init();

// Page main processing
$subject_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($subject->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var subject_list = new ew_Page("subject_list");

// page properties
subject_list.PageID = "list"; // page ID
var EW_PAGE_ID = subject_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
subject_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
subject_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
subject_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
subject_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($subject->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($subject->Export == "" && $subject->SelectLimit);
	if (!$bSelectLimit)
		$rs = $subject_list->LoadRecordset();
	$subject_list->lTotalRecs = ($bSelectLimit) ? $subject->SelectRecordCount() : $rs->RecordCount();
	$subject_list->lStartRec = 1;
	if ($subject_list->lDisplayRecs <= 0) // Display all records
		$subject_list->lDisplayRecs = $subject_list->lTotalRecs;
	if (!($subject->ExportAll && $subject->Export <> ""))
		$subject_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $subject_list->LoadRecordset($subject_list->lStartRec-1, $subject_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý chuyên mục bài viết</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>


<?php $subject_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($subject->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($subject->CurrentAction <> "gridadd" && $subject->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($subject_list->Pager)) $subject_list->Pager = new cNumericPager($subject_list->lStartRec, $subject_list->lDisplayRecs, $subject_list->lTotalRecs, $subject_list->lRecRange) ?>
<?php if ($subject_list->Pager->RecordCount > 0) { ?>
	<?php if ($subject_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($subject_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $subject_list->Pager->FromIndex ?> đến <?php echo $subject_list->Pager->ToIndex ?> của <?php echo $subject_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($subject_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Chưa có
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($subject_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="subject">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($subject_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($subject_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($subject_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($subject->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $subject->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($subject_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubjectlist)) alert('Chưa chọn menu'); else {document.fsubjectlist.action='subjectdelete.php';document.fsubjectlist.encoding='application/x-www-form-urlencoded';document.fsubjectlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubjectlist)) alert('Chưa chọn menu'); else {document.fsubjectlist.action='subjectupdate.php';document.fsubjectlist.encoding='application/x-www-form-urlencoded';document.fsubjectlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fsubjectlist" id="fsubjectlist" class="ewForm" action="" method="post">
<?php if ($subject_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$subject_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$subject_list->lOptionCnt++; // edit
}
if ($Security->AllowList('subject')) {
	$subject_list->lOptionCnt++; // Detail
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$subject_list->lOptionCnt++; // Multi-select
}
	$subject_list->lOptionCnt += count($subject_list->ListOptions->Items); // Custom list options
?>
<?php echo $subject->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($subject->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->AllowList('subject')) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="subject_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($subject_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<?php if ($subject->SortUrl($subject->ten_chuyenmuc) == "") { ?>
		<td style="white-space: nowrap;">Ten Chuyenmuc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $subject->SortUrl($subject->ten_chuyenmuc) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tên chuyên mục</td><td style="width: 10px;"><?php if ($subject->ten_chuyenmuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($subject->ten_chuyenmuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>

 <?php if ($subject->show_news->Visible) { // ten_chuyenmuc ?>
	<?php if ($subject->SortUrl($subject->show_news) == "") { ?>
		<td style="white-space: nowrap;">Ten show_news</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $subject->SortUrl($subject->show_news) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Vị trí hiển thị</td><td style="width: 10px;"><?php if ($subject->show_news->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($subject->show_news->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>

<?php if ($subject->trang_thai->Visible) { // trang_thai ?>
	<?php if ($subject->SortUrl($subject->trang_thai) == "") { ?>
		<td style="white-space: nowrap;">Trang Thai</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $subject->SortUrl($subject->trang_thai) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Trạng thái</td><td style="width: 10px;"><?php if ($subject->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($subject->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($subject->ExportAll && $subject->Export <> "") {
	$subject_list->lStopRec = $subject_list->lTotalRecs;
} else {
	$subject_list->lStopRec = $subject_list->lStartRec + $subject_list->lDisplayRecs - 1; // Set the last record to display
}
$subject_list->lRecCount = $subject_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$subject->SelectLimit && $subject_list->lStartRec > 1)
		$rs->Move($subject_list->lStartRec - 1);
}
$subject_list->lRowCnt = 0;
while (($subject->CurrentAction == "gridadd" || !$rs->EOF) &&
	$subject_list->lRecCount < $subject_list->lStopRec) {
	$subject_list->lRecCount++;
	if (intval($subject_list->lRecCount) >= intval($subject_list->lStartRec)) {
		$subject_list->lRowCnt++;

	// Init row class and style
	$subject->CssClass = "";
	$subject->CssStyle = "";
	$subject->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($subject->CurrentAction == "gridadd") {
		$subject_list->LoadDefaultValues(); // Load default values
	} else {
		$subject_list->LoadRowValues($rs); // Load row values
	}
	$subject->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$subject_list->RenderRow();
?>
	<tr<?php echo $subject->RowAttributes() ?>>
<?php if ($subject->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $subject->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->AllowList('subject')) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="intro_subjectlist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=subject&chuyenmuc_id=<?php echo urlencode(strval($subject->chuyenmuc_id->CurrentValue)) ?>">Chuyên mục con</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($subject->chuyenmuc_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($subject_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
		<td<?php echo $subject->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $subject->ten_chuyenmuc->ViewAttributes() ?>><?php echo $subject->ten_chuyenmuc->ListViewValue() ?></div>
</td>
	<?php } ?>

       <?php if ($subject->show_news->Visible) { // ten_chuyenmuc ?>
		<td<?php echo $subject->show_news->CellAttributes() ?>>
<div<?php echo $subject->show_news->ViewAttributes() ?>><?php echo $subject->show_news->ListViewValue() ?></div>
</td>
	<?php } ?>

	<?php if ($subject->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $subject->trang_thai->CellAttributes() ?>>
<div<?php echo $subject->trang_thai->ViewAttributes() ?>><?php echo $subject->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($subject->CurrentAction <> "gridadd")
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
<?php if ($subject_list->lTotalRecs > 0) { ?>
<?php if ($subject->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($subject->CurrentAction <> "gridadd" && $subject->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($subject_list->Pager)) $subject_list->Pager = new cNumericPager($subject_list->lStartRec, $subject_list->lDisplayRecs, $subject_list->lTotalRecs, $subject_list->lRecRange) ?>
<?php if ($subject_list->Pager->RecordCount > 0) { ?>
	<?php if ($subject_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($subject_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $subject_list->PageUrl() ?>start=<?php echo $subject_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $subject_list->Pager->FromIndex ?> đến <?php echo $subject_list->Pager->ToIndex ?> của <?php echo $subject_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($subject_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Chưa có
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($subject_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="subject">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($subject_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($subject_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($subject_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($subject->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($subject_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $subject->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($subject_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubjectlist)) alert('Chưa chọn menu'); else {document.fsubjectlist.action='subjectdelete.php';document.fsubjectlist.encoding='application/x-www-form-urlencoded';document.fsubjectlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubjectlist)) alert('Chưa chọn menu'); else {document.fsubjectlist.action='subjectupdate.php';document.fsubjectlist.encoding='application/x-www-form-urlencoded';document.fsubjectlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($subject->Export == "" && $subject->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(subject_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($subject->Export == "") { ?>
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
class csubject_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'subject';

	// Page Object Name
	var $PageObjName = 'subject_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $subject;
		if ($subject->UseTokenInUrl) $PageUrl .= "t=" . $subject->TableVar . "&"; // add page token
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
		global $objForm, $subject;
		if ($subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function csubject_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["subject"] = new csubject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $subject;
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
	$subject->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $subject->Export; // Get export parameter, used in header
	$gsExportFile = $subject->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $subject;
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
		if ($subject->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $subject->getRecordsPerPage(); // Restore from Session
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
		$subject->setSessionWhere($sFilter);
		$subject->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $subject;
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
			$subject->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $subject;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$subject->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$subject->CurrentOrderType = @$_GET["ordertype"];
			$subject->UpdateSort($subject->ten_chuyenmuc); // Field
			$subject->UpdateSort($subject->trang_thai); // Field
			$subject->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $subject;
		$sOrderBy = $subject->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($subject->SqlOrderBy() <> "") {
				$sOrderBy = $subject->SqlOrderBy();
				$subject->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $subject;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$subject->setSessionOrderBy($sOrderBy);
				$subject->ten_chuyenmuc->setSort("");
				$subject->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $subject;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$subject->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$subject->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $subject->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$subject->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$subject->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $subject;

		// Call Recordset Selecting event
		$subject->Recordset_Selecting($subject->CurrentFilter);

		// Load list page SQL
		$sSql = $subject->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
                // echo $sSql;
		// Call Recordset Selected event
		$subject->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $subject;
		$sFilter = $subject->KeyFilter();

		// Call Row Selecting event
		$subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$subject->CurrentFilter = $sFilter;
		$sSql = $subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $subject;
		$subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
                $subject->show_news->setDbValue($rs->fields('show_news'));
		$subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $subject;

		// Call Row_Rendering event
		$subject->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$subject->ten_chuyenmuc->CellCssStyle = "white-space: nowrap;";
		$subject->ten_chuyenmuc->CellCssClass = "";

		// trang_thai
		$subject->trang_thai->CellCssStyle = "white-space: nowrap;";
		$subject->trang_thai->CellCssClass = "";
		if ($subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$subject->ten_chuyenmuc->ViewValue = $subject->ten_chuyenmuc->CurrentValue;
			$subject->ten_chuyenmuc->CssStyle = "";
			$subject->ten_chuyenmuc->CssClass = "";
			$subject->ten_chuyenmuc->ViewCustomAttributes = "";
                        
                       // show_news
			if (strval($subject->show_news->CurrentValue) <> "") {
				switch ($subject->show_news->CurrentValue) {
					case "0":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu trang tin";
						break;
					case "1":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối hiển thị trang tin";
						break;
                                        case "2":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện mặc định trên trang chủ tin";
						break;
                                        case "3":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối hiển thị trên STMĐT";
						break;
                                        case "4":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối hiển thị trên STMĐT và trên trang tin";
						break;
                                         case "5":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu hiển thị trang tin_liên hệ";
						break;
                                         case "6":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu hiển thị trang tin_phản hồi";
						break;
                                         case "7":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu hiển thị trang tin_liên kết";
						break;
					default:
						$subject->show_news->ViewValue = $subject->show_home->CurrentValue;

				}
			} else {
				$subject->show_news->ViewValue = NULL;
			}
			$subject->show_news->CssStyle = "";
			$subject->show_news->CssClass = "";
			$subject->show_news->ViewCustomAttributes = "";
                        
			// trang_thai
			if (strval($subject->trang_thai->CurrentValue) <> "") {
				switch ($subject->trang_thai->CurrentValue) {
					case "0":
						$subject->trang_thai->ViewValue = "<font color=\"#FF0000\">Không xuất bản</font>";
						break;
					case "1":
						$subject->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$subject->trang_thai->ViewValue = $subject->trang_thai->CurrentValue;
				}
			} else {
				$subject->trang_thai->ViewValue = NULL;
			}
			$subject->trang_thai->CssStyle = "";
			$subject->trang_thai->CssClass = "";
			$subject->trang_thai->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$subject->ten_chuyenmuc->HrefValue = "";

			// trang_thai
			$subject->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$subject->Row_Rendered();
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
