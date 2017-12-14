<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_subjectinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "subjectinfo.php" ?>
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
$intro_subject_list = new cintro_subject_list();
$Page =& $intro_subject_list;

// Page init processing
$intro_subject_list->Page_Init();

// Page main processing
$intro_subject_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($intro_subject->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var intro_subject_list = new ew_Page("intro_subject_list");

// page properties
intro_subject_list.PageID = "list"; // page ID
var EW_PAGE_ID = intro_subject_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
intro_subject_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_subject_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_subject_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_subject_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($intro_subject->Export == "") { ?>
<?php
$gsMasterReturnUrl = "subjectlist.php";
if ($intro_subject_list->sDbMasterFilter <> "" && $intro_subject->getCurrentMasterTable() == "subject") {
	if ($intro_subject_list->bMasterRecordExists) {
		if ($intro_subject->getCurrentMasterTable() == $intro_subject->TableVar) $gsMasterReturnUrl .= "?" . EW_TABLE_SHOW_MASTER . "=";
?>
<?php include "subjectmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = ($intro_subject->Export == "" && $intro_subject->SelectLimit);
	if (!$bSelectLimit)
		$rs = $intro_subject_list->LoadRecordset();
	$intro_subject_list->lTotalRecs = ($bSelectLimit) ? $intro_subject->SelectRecordCount() : $rs->RecordCount();
	$intro_subject_list->lStartRec = 1;
	if ($intro_subject_list->lDisplayRecs <= 0) // Display all records
		$intro_subject_list->lDisplayRecs = $intro_subject_list->lTotalRecs;
	if (!($intro_subject->ExportAll && $intro_subject->Export <> ""))
		$intro_subject_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $intro_subject_list->LoadRecordset($intro_subject_list->lStartRec-1, $intro_subject_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Các chuyên mục con</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php $intro_subject_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($intro_subject->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($intro_subject->CurrentAction <> "gridadd" && $intro_subject->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_subject_list->Pager)) $intro_subject_list->Pager = new cNumericPager($intro_subject_list->lStartRec, $intro_subject_list->lDisplayRecs, $intro_subject_list->lTotalRecs, $intro_subject_list->lRecRange) ?>
<?php if ($intro_subject_list->Pager->RecordCount > 0) { ?>
	<?php if ($intro_subject_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_subject_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $intro_subject_list->Pager->FromIndex ?> đến <?php echo $intro_subject_list->Pager->ToIndex ?> của <?php echo $intro_subject_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_subject_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Chưa chọn menu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($intro_subject_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="intro_subject">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($intro_subject_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($intro_subject_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($intro_subject_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($intro_subject->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $intro_subject->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($intro_subject_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_subjectlist)) alert('Chưa chọn menu'); else {document.fintro_subjectlist.action='intro_subjectdelete.php';document.fintro_subjectlist.encoding='application/x-www-form-urlencoded';document.fintro_subjectlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_subjectlist)) alert('Chưa chọn menu'); else {document.fintro_subjectlist.action='intro_subjectupdate.php';document.fintro_subjectlist.encoding='application/x-www-form-urlencoded';document.fintro_subjectlist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fintro_subjectlist" id="fintro_subjectlist" class="ewForm" action="" method="post">
<?php if ($intro_subject_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$intro_subject_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$intro_subject_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$intro_subject_list->lOptionCnt++; // Multi-select
}
	$intro_subject_list->lOptionCnt += count($intro_subject_list->ListOptions->Items); // Custom list options
?>
<?php echo $intro_subject->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($intro_subject->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width:30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width:20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="intro_subject_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($intro_subject_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($intro_subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<?php if ($intro_subject->SortUrl($intro_subject->ten_chuyenmuc) == "") { ?>
		<td style="white-space: nowrap;">Ten Chuyenmuc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $intro_subject->SortUrl($intro_subject->ten_chuyenmuc) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tên chuyên mục con</td><td style="width: 10px;"><?php if ($intro_subject->ten_chuyenmuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($intro_subject->ten_chuyenmuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($intro_subject->trang_thai->Visible) { // trang_thai ?>
	<?php if ($intro_subject->SortUrl($intro_subject->trang_thai) == "") { ?>
		<td style="white-space: nowrap;">Trang Thai</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $intro_subject->SortUrl($intro_subject->trang_thai) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center>Trang thái</td><td style="width: 10px;"><?php if ($intro_subject->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($intro_subject->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($intro_subject->ExportAll && $intro_subject->Export <> "") {
	$intro_subject_list->lStopRec = $intro_subject_list->lTotalRecs;
} else {
	$intro_subject_list->lStopRec = $intro_subject_list->lStartRec + $intro_subject_list->lDisplayRecs - 1; // Set the last record to display
}
$intro_subject_list->lRecCount = $intro_subject_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$intro_subject->SelectLimit && $intro_subject_list->lStartRec > 1)
		$rs->Move($intro_subject_list->lStartRec - 1);
}
$intro_subject_list->lRowCnt = 0;
while (($intro_subject->CurrentAction == "gridadd" || !$rs->EOF) &&
	$intro_subject_list->lRecCount < $intro_subject_list->lStopRec) {
	$intro_subject_list->lRecCount++;
	if (intval($intro_subject_list->lRecCount) >= intval($intro_subject_list->lStartRec)) {
		$intro_subject_list->lRowCnt++;

	// Init row class and style
	$intro_subject->CssClass = "";
	$intro_subject->CssStyle = "";
	$intro_subject->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($intro_subject->CurrentAction == "gridadd") {
		$intro_subject_list->LoadDefaultValues(); // Load default values
	} else {
		$intro_subject_list->LoadRowValues($rs); // Load row values
	}
	$intro_subject->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$intro_subject_list->RenderRow();
?>
	<tr<?php echo $intro_subject->RowAttributes() ?>>
<?php if ($intro_subject->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $intro_subject->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($intro_subject->chuyenmuc_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($intro_subject_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($intro_subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
		<td<?php echo $intro_subject->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $intro_subject->ten_chuyenmuc->ViewAttributes() ?>><?php echo $intro_subject->ten_chuyenmuc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($intro_subject->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $intro_subject->trang_thai->CellAttributes() ?>>
<div<?php echo $intro_subject->trang_thai->ViewAttributes() ?>><?php echo $intro_subject->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($intro_subject->CurrentAction <> "gridadd")
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
<?php if ($intro_subject_list->lTotalRecs > 0) { ?>
<?php if ($intro_subject->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($intro_subject->CurrentAction <> "gridadd" && $intro_subject->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_subject_list->Pager)) $intro_subject_list->Pager = new cNumericPager($intro_subject_list->lStartRec, $intro_subject_list->lDisplayRecs, $intro_subject_list->lTotalRecs, $intro_subject_list->lRecRange) ?>
<?php if ($intro_subject_list->Pager->RecordCount > 0) { ?>
	<?php if ($intro_subject_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_subject_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_list->PageUrl() ?>start=<?php echo $intro_subject_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $intro_subject_list->Pager->FromIndex ?> đến <?php echo $intro_subject_list->Pager->ToIndex ?> của <?php echo $intro_subject_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_subject_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Chưa chọn menu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($intro_subject_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="intro_subject">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($intro_subject_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($intro_subject_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($intro_subject_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($intro_subject->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($intro_subject_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $intro_subject->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($intro_subject_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_subjectlist)) alert('Chưa chọn menu'); else {document.fintro_subjectlist.action='intro_subjectdelete.php';document.fintro_subjectlist.encoding='application/x-www-form-urlencoded';document.fintro_subjectlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_subjectlist)) alert('Chưa chọn menu'); else {document.fintro_subjectlist.action='intro_subjectupdate.php';document.fintro_subjectlist.encoding='application/x-www-form-urlencoded';document.fintro_subjectlist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($intro_subject->Export == "" && $intro_subject->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(intro_subject_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($intro_subject->Export == "") { ?>
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
class cintro_subject_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'intro_subject';

	// Page Object Name
	var $PageObjName = 'intro_subject_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_subject;
		if ($intro_subject->UseTokenInUrl) $PageUrl .= "t=" . $intro_subject->TableVar . "&"; // add page token
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
		global $objForm, $intro_subject;
		if ($intro_subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_subject_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_subject"] = new cintro_subject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['subject'] = new csubject();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_subject;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("subject");
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
	$intro_subject->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $intro_subject->Export; // Get export parameter, used in header
	$gsExportFile = $intro_subject->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $intro_subject;
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

			// Set up master detail parameters
			$this->SetUpMasterDetail();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($intro_subject->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $intro_subject->getRecordsPerPage(); // Restore from Session
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
		$this->sDbMasterFilter = $intro_subject->getMasterFilter(); // Restore master filter
		$this->sDbDetailFilter = $intro_subject->getDetailFilter(); // Restore detail filter
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Load master record
		if ($intro_subject->getMasterFilter() <> "" && $intro_subject->getCurrentMasterTable() == "subject") {
			global $subject;
			$rsmaster = $subject->LoadRs($this->sDbMasterFilter);
			$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->bMasterRecordExists) {
				$intro_subject->setMasterFilter(""); // Clear master filter
				$intro_subject->setDetailFilter(""); // Clear detail filter
				$this->setMessage("Chưa chọn menu"); // Set no record found
				$this->Page_Terminate($intro_subject->getReturnUrl()); // Return to caller
			} else {
				$subject->LoadListRowValues($rsmaster);
				$subject->RowType = EW_ROWTYPE_MASTER; // Master row
				$subject->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in Session
		$intro_subject->setSessionWhere($sFilter);
		$intro_subject->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $intro_subject;
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
			$intro_subject->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$intro_subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $intro_subject;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$intro_subject->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$intro_subject->CurrentOrderType = @$_GET["ordertype"];
			$intro_subject->UpdateSort($intro_subject->ten_chuyenmuc); // Field 
			$intro_subject->UpdateSort($intro_subject->trang_thai); // Field 
			$intro_subject->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $intro_subject;
		$sOrderBy = $intro_subject->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($intro_subject->SqlOrderBy() <> "") {
				$sOrderBy = $intro_subject->SqlOrderBy();
				$intro_subject->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $intro_subject;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$intro_subject->getCurrentMasterTable = ""; // Clear master table
				$intro_subject->setMasterFilter(""); // Clear master filter
				$this->sDbMasterFilter = "";
				$intro_subject->setDetailFilter(""); // Clear detail filter
				$this->sDbDetailFilter = "";
				$intro_subject->chuyenmuc_belongto->setSessionValue("");
			}

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$intro_subject->setSessionOrderBy($sOrderBy);
				$intro_subject->ten_chuyenmuc->setSort("");
				$intro_subject->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$intro_subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $intro_subject;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$intro_subject->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$intro_subject->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $intro_subject->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$intro_subject->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$intro_subject->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$intro_subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $intro_subject;

		// Call Recordset Selecting event
		$intro_subject->Recordset_Selecting($intro_subject->CurrentFilter);

		// Load list page SQL
		$sSql = $intro_subject->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$intro_subject->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_subject;
		$sFilter = $intro_subject->KeyFilter();

		// Call Row Selecting event
		$intro_subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_subject->CurrentFilter = $sFilter;
		$sSql = $intro_subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_subject;
		$intro_subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$intro_subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$intro_subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$intro_subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$intro_subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$intro_subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_subject;

		// Call Row_Rendering event
		$intro_subject->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$intro_subject->ten_chuyenmuc->CellCssStyle = "white-space: nowrap;";
		$intro_subject->ten_chuyenmuc->CellCssClass = "";

		// trang_thai
		$intro_subject->trang_thai->CellCssStyle = "white-space: nowrap;";
		$intro_subject->trang_thai->CellCssClass = "";
		if ($intro_subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->ViewValue = $intro_subject->ten_chuyenmuc->CurrentValue;
			$intro_subject->ten_chuyenmuc->CssStyle = "";
			$intro_subject->ten_chuyenmuc->CssClass = "";
			$intro_subject->ten_chuyenmuc->ViewCustomAttributes = "";

			// trang_thai
			if (strval($intro_subject->trang_thai->CurrentValue) <> "") {
				switch ($intro_subject->trang_thai->CurrentValue) {
					case "0":
						$intro_subject->trang_thai->ViewValue = "<font color=\"#FF0000\">Không xuất bản</font>";
						break;
					case "1":
						$intro_subject->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$intro_subject->trang_thai->ViewValue = $intro_subject->trang_thai->CurrentValue;
				}
			} else {
				$intro_subject->trang_thai->ViewValue = NULL;
			}
			$intro_subject->trang_thai->CssStyle = "";
			$intro_subject->trang_thai->CssClass = "";
			$intro_subject->trang_thai->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->HrefValue = "";

			// trang_thai
			$intro_subject->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$intro_subject->Row_Rendered();
	}

	// Set up Master Detail based on querystring parameter
	function SetUpMasterDetail() {
		global $intro_subject;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[EW_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = "";
				$this->sDbDetailFilter = "";
			}
			if ($sMasterTblVar == "subject") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = $intro_subject->SqlMasterFilter_subject();
				$this->sDbDetailFilter = $intro_subject->SqlDetailFilter_subject();
				if (@$_GET["chuyenmuc_id"] <> "") {
					$GLOBALS["subject"]->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);
					$intro_subject->chuyenmuc_belongto->setQueryStringValue($GLOBALS["subject"]->chuyenmuc_id->QueryStringValue);
					$intro_subject->chuyenmuc_belongto->setSessionValue($intro_subject->chuyenmuc_belongto->QueryStringValue);
					if (!is_numeric($GLOBALS["subject"]->chuyenmuc_id->QueryStringValue)) $bValidMaster = FALSE;
					$this->sDbMasterFilter = str_replace("@chuyenmuc_id@", ew_AdjustSql($GLOBALS["subject"]->chuyenmuc_id->QueryStringValue), $this->sDbMasterFilter);
					$this->sDbDetailFilter = str_replace("@chuyenmuc_belongto@", ew_AdjustSql($GLOBALS["subject"]->chuyenmuc_id->QueryStringValue), $this->sDbDetailFilter);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$intro_subject->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->lStartRec = 1;
			$intro_subject->setStartRecordNumber($this->lStartRec);
			$intro_subject->setMasterFilter($this->sDbMasterFilter); // Set up master filter
			$intro_subject->setDetailFilter($this->sDbDetailFilter); // Set up detail filter

			// Clear previous master session values
			if ($sMasterTblVar <> "subject") {
				if ($intro_subject->chuyenmuc_belongto->QueryStringValue == "") $intro_subject->chuyenmuc_belongto->setSessionValue("");
			}
		} else {
			$this->sDbMasterFilter = $intro_subject->getMasterFilter(); //  Restore master filter
			$this->sDbDetailFilter = $intro_subject->getDetailFilter(); // Restore detail filter
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
