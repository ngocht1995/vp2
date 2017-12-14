<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userlevelsinfo.php" ?>
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
$userlevels_list = new cuserlevels_list();
$Page =& $userlevels_list;

// Page init processing
$userlevels_list->Page_Init();

// Page main processing
$userlevels_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($userlevels->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var userlevels_list = new ew_Page("userlevels_list");

// page properties
userlevels_list.PageID = "list"; // page ID
var EW_PAGE_ID = userlevels_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevels_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevels_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevels_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevels_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

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
<?php if ($userlevels->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($userlevels->Export == "" && $userlevels->SelectLimit);
	if (!$bSelectLimit)
		$rs = $userlevels_list->LoadRecordset();
	$userlevels_list->lTotalRecs = ($bSelectLimit) ? $userlevels->SelectRecordCount() : $rs->RecordCount();
	$userlevels_list->lStartRec = 1;
	if ($userlevels_list->lDisplayRecs <= 0) // Display all records
		$userlevels_list->lDisplayRecs = $userlevels_list->lTotalRecs;
	if (!($userlevels->ExportAll && $userlevels->Export <> ""))
		$userlevels_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $userlevels_list->LoadRecordset($userlevels_list->lStartRec-1, $userlevels_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý nhóm người dùng</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $userlevels_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($userlevels->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($userlevels->CurrentAction <> "gridadd" && $userlevels->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevels_list->Pager)) $userlevels_list->Pager = new cNumericPager($userlevels_list->lStartRec, $userlevels_list->lDisplayRecs, $userlevels_list->lTotalRecs, $userlevels_list->lRecRange) ?>
<?php if ($userlevels_list->Pager->RecordCount > 0) { ?>
	<?php if ($userlevels_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevels_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $userlevels_list->Pager->FromIndex ?> đến <?php echo $userlevels_list->Pager->ToIndex ?> của <?php echo $userlevels_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevels_list->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $userlevels->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($userlevels_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuserlevelslist)) alert('Không có bản ghi nào được chọn'); else if (ew_Confirm('<?php echo $userlevels_list->sDeleteConfirmMsg ?>')) {document.fuserlevelslist.action='userlevelsdelete.php';document.fuserlevelslist.encoding='application/x-www-form-urlencoded';document.fuserlevelslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fuserlevelslist" id="fuserlevelslist" class="ewForm" action="" method="post">
<?php if ($userlevels_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$userlevels_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$userlevels_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$userlevels_list->lOptionCnt++; // edit
}
	$userlevels_list->lOptionCnt++; // Permission
if ($Security->CanDelete()) {
	$userlevels_list->lOptionCnt++; // Multi-select
}
	$userlevels_list->lOptionCnt += count($userlevels_list->ListOptions->Items); // Custom list options
?>
<?php echo $userlevels->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($userlevels->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="userlevels_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($userlevels_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($userlevels->UserLevelName->Visible) { // UserLevelName ?>
	<?php if ($userlevels->SortUrl($userlevels->UserLevelName) == "") { ?>
		<td>Tên cấp bậc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userlevels->SortUrl($userlevels->UserLevelName) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên cấp bậc</td><td style="width: 10px;"><?php if ($userlevels->UserLevelName->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userlevels->UserLevelName->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($userlevels->ExportAll && $userlevels->Export <> "") {
	$userlevels_list->lStopRec = $userlevels_list->lTotalRecs;
} else {
	$userlevels_list->lStopRec = $userlevels_list->lStartRec + $userlevels_list->lDisplayRecs - 1; // Set the last record to display
}
$userlevels_list->lRecCount = $userlevels_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$userlevels->SelectLimit && $userlevels_list->lStartRec > 1)
		$rs->Move($userlevels_list->lStartRec - 1);
}
$userlevels_list->lRowCnt = 0;
while (($userlevels->CurrentAction == "gridadd" || !$rs->EOF) &&
	$userlevels_list->lRecCount < $userlevels_list->lStopRec) {
	$userlevels_list->lRecCount++;
	if (intval($userlevels_list->lRecCount) >= intval($userlevels_list->lStartRec)) {
		$userlevels_list->lRowCnt++;

	// Init row class and style
	$userlevels->CssClass = "";
	$userlevels->CssStyle = "";
	$userlevels->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($userlevels->CurrentAction == "gridadd") {
		$userlevels_list->LoadDefaultValues(); // Load default values
	} else {
		$userlevels_list->LoadRowValues($rs); // Load row values
	}
	$userlevels->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$userlevels_list->RenderRow();
?>
	<tr<?php echo $userlevels->RowAttributes() ?>>
<?php if ($userlevels->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($userlevels->UserLevelID->CurrentValue <= 0) { ?>-<?php } else { ?>
<a href="<?php echo $userlevels->ViewUrl() ?>">Xem</a>
<?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($userlevels->UserLevelID->CurrentValue <= 0) { ?>-<?php } else { ?>
<a href="<?php echo $userlevels->EditUrl() ?>">Sửa</a>
<?php } ?></span></td>
<?php } ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($userlevels->UserLevelID->CurrentValue < 0) { ?>-<?php } else { ?>
<a href="userpriv.php?UserLevelID=<?php echo $userlevels->UserLevelID->CurrentValue ?>">Phân quyền</a>
<?php } ?></span></td>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($userlevels->UserLevelID->CurrentValue <= 0) { ?>-<?php } else { ?>
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($userlevels->UserLevelID->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
<?php } ?></span></td>
<?php } ?>
<?php

// Custom list options
foreach ($userlevels_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($userlevels->UserLevelName->Visible) { // UserLevelName ?>
		<td<?php echo $userlevels->UserLevelName->CellAttributes() ?>>
<div<?php echo $userlevels->UserLevelName->ViewAttributes() ?>><?php echo $userlevels->UserLevelName->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($userlevels->CurrentAction <> "gridadd")
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
<?php if ($userlevels_list->lTotalRecs > 0) { ?>
<?php if ($userlevels->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($userlevels->CurrentAction <> "gridadd" && $userlevels->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevels_list->Pager)) $userlevels_list->Pager = new cNumericPager($userlevels_list->lStartRec, $userlevels_list->lDisplayRecs, $userlevels_list->lTotalRecs, $userlevels_list->lRecRange) ?>
<?php if ($userlevels_list->Pager->RecordCount > 0) { ?>
	<?php if ($userlevels_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevels_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevels_list->PageUrl() ?>start=<?php echo $userlevels_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $userlevels_list->Pager->FromIndex ?> đến <?php echo $userlevels_list->Pager->ToIndex ?> của <?php echo $userlevels_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevels_list->sSrchWhere == "0=101") { ?>
	Hãy chọn từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($userlevels_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $userlevels->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($userlevels_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuserlevelslist)) alert('Không có bản ghi nào được chọn'); else if (ew_Confirm('<?php echo $userlevels_list->sDeleteConfirmMsg ?>')) {document.fuserlevelslist.action='userlevelsdelete.php';document.fuserlevelslist.encoding='application/x-www-form-urlencoded';document.fuserlevelslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($userlevels->Export == "" && $userlevels->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(userlevels_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($userlevels->Export == "") { ?>
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
class cuserlevels_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'userlevels';

	// Page Object Name
	var $PageObjName = 'userlevels_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevels;
		if ($userlevels->UseTokenInUrl) $PageUrl .= "t=" . $userlevels->TableVar . "&"; // add page token
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
		global $objForm, $userlevels;
		if ($userlevels->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($userlevels->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevels->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuserlevels_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevels"] = new cuserlevels();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevels', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $userlevels;
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
		if (!$Security->CanAdmin()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$userlevels->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $userlevels->Export; // Get export parameter, used in header
	$gsExportFile = $userlevels->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $userlevels;
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

			// Handle reset command
			$this->ResetCmd();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($userlevels->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $userlevels->getRecordsPerPage(); // Restore from Session
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
		$userlevels->setSessionWhere($sFilter);
		$userlevels->CurrentFilter = "";
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $userlevels;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$userlevels->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$userlevels->CurrentOrderType = @$_GET["ordertype"];
			$userlevels->UpdateSort($userlevels->UserLevelName); // Field 
			$userlevels->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $userlevels;
		$sOrderBy = $userlevels->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($userlevels->SqlOrderBy() <> "") {
				$sOrderBy = $userlevels->SqlOrderBy();
				$userlevels->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $userlevels;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$userlevels->setSessionOrderBy($sOrderBy);
				$userlevels->UserLevelName->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$userlevels->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $userlevels;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$userlevels->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$userlevels->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $userlevels->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$userlevels->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$userlevels->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$userlevels->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevels;

		// Call Recordset Selecting event
		$userlevels->Recordset_Selecting($userlevels->CurrentFilter);

		// Load list page SQL
		$sSql = $userlevels->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$userlevels->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevels;
		$sFilter = $userlevels->KeyFilter();

		// Call Row Selecting event
		$userlevels->Row_Selecting($sFilter);

		// Load sql based on filter
		$userlevels->CurrentFilter = $sFilter;
		$sSql = $userlevels->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$userlevels->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $userlevels;
		$userlevels->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		if (is_null($userlevels->UserLevelID->CurrentValue)) {
			$userlevels->UserLevelID->CurrentValue = 0;
		} else {
			$userlevels->UserLevelID->CurrentValue = intval($userlevels->UserLevelID->CurrentValue);
		}
		$userlevels->UserLevelName->setDbValue($rs->fields('UserLevelName'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $userlevels;

		// Call Row_Rendering event
		$userlevels->Row_Rendering();

		// Common render codes for all row types
		// UserLevelName

		$userlevels->UserLevelName->CellCssStyle = "";
		$userlevels->UserLevelName->CellCssClass = "";
		if ($userlevels->RowType == EW_ROWTYPE_VIEW) { // View row

			// UserLevelName
			$userlevels->UserLevelName->ViewValue = $userlevels->UserLevelName->CurrentValue;
			$userlevels->UserLevelName->CssStyle = "";
			$userlevels->UserLevelName->CssClass = "";
			$userlevels->UserLevelName->ViewCustomAttributes = "";

			// UserLevelName
			$userlevels->UserLevelName->HrefValue = "";
		}

		// Call Row Rendered event
		$userlevels->Row_Rendered();
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
