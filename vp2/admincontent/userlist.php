<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
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
$user_list = new cuser_list();
$Page =& $user_list;

// Page init processing
$user_list->Page_Init();

// Page main processing
$user_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($user->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var user_list = new ew_Page("user_list");

// page properties
user_list.PageID = "list"; // page ID
var EW_PAGE_ID = user_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
user_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($user->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($user->Export == "" && $user->SelectLimit);
	if (!$bSelectLimit)
		$rs = $user_list->LoadRecordset();
	$user_list->lTotalRecs = ($bSelectLimit) ? $user->SelectRecordCount() : $rs->RecordCount();
	$user_list->lStartRec = 1;
	if ($user_list->lDisplayRecs <= 0) // Display all records
		$user_list->lDisplayRecs = $user_list->lTotalRecs;
	if (!($user->ExportAll && $user->Export <> ""))
		$user_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $user_list->LoadRecordset($user_list->lStartRec-1, $user_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">TABLE: Tmdt User
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($user->Export == "" && $user->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(user_list);" style="text-decoration: none;"><img id="user_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="user_list_SearchPanel">
<form name="fuserlistsrch" id="fuserlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="user">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<a href="<?php echo $user_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
			<a href="usersrch.php">Advanced Search</a>&nbsp;
		</span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $user_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($user->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($user->CurrentAction <> "gridadd" && $user->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_list->Pager)) $user_list->Pager = new cNumericPager($user_list->lStartRec, $user_list->lDisplayRecs, $user_list->lTotalRecs, $user_list->lRecRange) ?>
<?php if ($user_list->Pager->RecordCount > 0) { ?>
	<?php if ($user_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $user_list->Pager->FromIndex ?> to <?php echo $user_list->Pager->ToIndex ?> of <?php echo $user_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
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
<a href="<?php echo $user->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($user_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuserlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $user_list->sDeleteConfirmMsg ?>')) {document.fuserlist.action='userdelete.php';document.fuserlist.encoding='application/x-www-form-urlencoded';document.fuserlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fuserlist" id="fuserlist" class="ewForm" action="" method="post">
<?php if ($user_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$user_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$user_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$user_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$user_list->lOptionCnt++; // Multi-select
}
	$user_list->lOptionCnt += count($user_list->ListOptions->Items); // Custom list options
?>
<?php echo $user->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($user->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="user_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($user_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
	</tr>
</thead>
<?php
if ($user->ExportAll && $user->Export <> "") {
	$user_list->lStopRec = $user_list->lTotalRecs;
} else {
	$user_list->lStopRec = $user_list->lStartRec + $user_list->lDisplayRecs - 1; // Set the last record to display
}
$user_list->lRecCount = $user_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$user->SelectLimit && $user_list->lStartRec > 1)
		$rs->Move($user_list->lStartRec - 1);
}
$user_list->lRowCnt = 0;
while (($user->CurrentAction == "gridadd" || !$rs->EOF) &&
	$user_list->lRecCount < $user_list->lStopRec) {
	$user_list->lRecCount++;
	if (intval($user_list->lRecCount) >= intval($user_list->lStartRec)) {
		$user_list->lRowCnt++;

	// Init row class and style
	$user->CssClass = "";
	$user->CssStyle = "";
	$user->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($user->CurrentAction == "gridadd") {
		$user_list->LoadDefaultValues(); // Load default values
	} else {
		$user_list->LoadRowValues($rs); // Load row values
	}
	$user->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$user_list->RenderRow();
?>
	<tr<?php echo $user->RowAttributes() ?>>
<?php if ($user->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($user_list->ShowOptionLink()) { ?>
<a href="<?php echo $user->ViewUrl() ?>">View</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($user_list->ShowOptionLink()) { ?>
<a href="<?php echo $user->EditUrl() ?>">Edit</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($user->nguoidung_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($user_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	</tr>
<?php
	}
	if ($user->CurrentAction <> "gridadd")
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
<?php if ($user_list->lTotalRecs > 0) { ?>
<?php if ($user->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($user->CurrentAction <> "gridadd" && $user->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_list->Pager)) $user_list->Pager = new cNumericPager($user_list->lStartRec, $user_list->lDisplayRecs, $user_list->lTotalRecs, $user_list->lRecRange) ?>
<?php if ($user_list->Pager->RecordCount > 0) { ?>
	<?php if ($user_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_list->PageUrl() ?>start=<?php echo $user_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $user_list->Pager->FromIndex ?> to <?php echo $user_list->Pager->ToIndex ?> of <?php echo $user_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
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
<?php //if ($user_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $user->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($user_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuserlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $user_list->sDeleteConfirmMsg ?>')) {document.fuserlist.action='userdelete.php';document.fuserlist.encoding='application/x-www-form-urlencoded';document.fuserlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($user->Export == "" && $user->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(user_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($user->Export == "") { ?>
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
class cuser_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'user';

	// Page Object Name
	var $PageObjName = 'user_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user;
		if ($user->UseTokenInUrl) $PageUrl .= "t=" . $user->TableVar . "&"; // add page token
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
		global $objForm, $user;
		if ($user->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user;
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
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate();
		}
	$user->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $user->Export; // Get export parameter, used in header
	$gsExportFile = $user->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $user;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
		$this->sDeleteConfirmMsg = "Do you want to delete the selected records?"; // Delete confirm message

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Get search criteria for advanced search
			$this->LoadSearchValues(); // Get search values
			if ($this->ValidateSearch()) {
				$sSrchAdvanced = $this->AdvancedSearchWhere();
			} else {
				$this->setMessage($gsSearchError);
			}

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($user->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $user->getRecordsPerPage(); // Restore from Session
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
		$user->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$user->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$user->setStartRecordNumber($this->lStartRec);
		} else {
			$this->RestoreSearchParms();
		}

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
		$user->setSessionWhere($sFilter);
		$user->CurrentFilter = "";
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $user;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $user->nguoidung_id, FALSE); // Field nguoidung_id
		$this->BuildSearchSql($sWhere, $user->nguoidung_option, FALSE); // Field nguoidung_option
		$this->BuildSearchSql($sWhere, $user->tendangnhap, FALSE); // Field tendangnhap
		$this->BuildSearchSql($sWhere, $user->quocgia_id, FALSE); // Field quocgia_id
		$this->BuildSearchSql($sWhere, $user->gioi_tinh, FALSE); // Field gioi_tinh
		$this->BuildSearchSql($sWhere, $user->hoten_nguoilienhe, FALSE); // Field hoten_nguoilienhe
		$this->BuildSearchSql($sWhere, $user->ten_nguoilienhe, FALSE); // Field ten_nguoilienhe
		$this->BuildSearchSql($sWhere, $user->mat_khau, FALSE); // Field mat_khau
		$this->BuildSearchSql($sWhere, $user->ten_congty, FALSE); // Field ten_congty
		$this->BuildSearchSql($sWhere, $user->ten_viettat, FALSE); // Field ten_viettat
		$this->BuildSearchSql($sWhere, $user->website, FALSE); // Field website
		$this->BuildSearchSql($sWhere, $user->chuc_nang, FALSE); // Field chuc_nang
		$this->BuildSearchSql($sWhere, $user->loaikinhdoanh_id, FALSE); // Field loaikinhdoanh_id
		$this->BuildSearchSql($sWhere, $user->loaicongty_id, FALSE); // Field loaicongty_id
		$this->BuildSearchSql($sWhere, $user->so_congnhan, FALSE); // Field so_congnhan
		$this->BuildSearchSql($sWhere, $user->nam_thanhlap, FALSE); // Field nam_thanhlap
		$this->BuildSearchSql($sWhere, $user->kim_ngach, FALSE); // Field kim_ngach
		$this->BuildSearchSql($sWhere, $user->cung_cap, FALSE); // Field cung_cap
		$this->BuildSearchSql($sWhere, $user->chung_chi, FALSE); // Field chung_chi
		$this->BuildSearchSql($sWhere, $user->so_dkkd, FALSE); // Field so_dkkd
		$this->BuildSearchSql($sWhere, $user->ngay_thamgia, FALSE); // Field ngay_thamgia
		$this->BuildSearchSql($sWhere, $user->ma_quocgia_dthoai, FALSE); // Field ma_quocgia_dthoai
		$this->BuildSearchSql($sWhere, $user->ma_vung_dthoai, FALSE); // Field ma_vung_dthoai
		$this->BuildSearchSql($sWhere, $user->so_dienthoai, FALSE); // Field so_dienthoai
		$this->BuildSearchSql($sWhere, $user->ma_quocgia_fax, FALSE); // Field ma_quocgia_fax
		$this->BuildSearchSql($sWhere, $user->ma_vung_fax, FALSE); // Field ma_vung_fax
		$this->BuildSearchSql($sWhere, $user->so_fax, FALSE); // Field so_fax
		$this->BuildSearchSql($sWhere, $user->dia_chi, FALSE); // Field dia_chi
		$this->BuildSearchSql($sWhere, $user->tinh_thanh, FALSE); // Field tinh_thanh
		$this->BuildSearchSql($sWhere, $user->quan_huyen, FALSE); // Field quan_huyen
		$this->BuildSearchSql($sWhere, $user->gioi_thieu, FALSE); // Field gioi_thieu
		$this->BuildSearchSql($sWhere, $user->nick_yahoo, FALSE); // Field nick_yahoo
		$this->BuildSearchSql($sWhere, $user->nick_skype, FALSE); // Field nick_skype
		$this->BuildSearchSql($sWhere, $user->truycap_gannhat, FALSE); // Field truycap_gannhat
		$this->BuildSearchSql($sWhere, $user->kieu_giaodien, FALSE); // Field kieu_giaodien
		$this->BuildSearchSql($sWhere, $user->UserLevelID, FALSE); // Field UserLevelID
		$this->BuildSearchSql($sWhere, $user->nganhnghe_lienquan, TRUE); // Field nganhnghe_lienquan
		$this->BuildSearchSql($sWhere, $user->thitruong_lienquan, TRUE); // Field thitruong_lienquan

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($user->nguoidung_id); // Field nguoidung_id
			$this->SetSearchParm($user->nguoidung_option); // Field nguoidung_option
			$this->SetSearchParm($user->tendangnhap); // Field tendangnhap
			$this->SetSearchParm($user->quocgia_id); // Field quocgia_id
			$this->SetSearchParm($user->gioi_tinh); // Field gioi_tinh
			$this->SetSearchParm($user->hoten_nguoilienhe); // Field hoten_nguoilienhe
			$this->SetSearchParm($user->ten_nguoilienhe); // Field ten_nguoilienhe
			$this->SetSearchParm($user->mat_khau); // Field mat_khau
			$this->SetSearchParm($user->ten_congty); // Field ten_congty
			$this->SetSearchParm($user->ten_viettat); // Field ten_viettat
			$this->SetSearchParm($user->website); // Field website
			$this->SetSearchParm($user->chuc_nang); // Field chuc_nang
			$this->SetSearchParm($user->loaikinhdoanh_id); // Field loaikinhdoanh_id
			$this->SetSearchParm($user->loaicongty_id); // Field loaicongty_id
			$this->SetSearchParm($user->so_congnhan); // Field so_congnhan
			$this->SetSearchParm($user->nam_thanhlap); // Field nam_thanhlap
			$this->SetSearchParm($user->kim_ngach); // Field kim_ngach
			$this->SetSearchParm($user->cung_cap); // Field cung_cap
			$this->SetSearchParm($user->chung_chi); // Field chung_chi
			$this->SetSearchParm($user->so_dkkd); // Field so_dkkd
			$this->SetSearchParm($user->ngay_thamgia); // Field ngay_thamgia
			$this->SetSearchParm($user->ma_quocgia_dthoai); // Field ma_quocgia_dthoai
			$this->SetSearchParm($user->ma_vung_dthoai); // Field ma_vung_dthoai
			$this->SetSearchParm($user->so_dienthoai); // Field so_dienthoai
			$this->SetSearchParm($user->ma_quocgia_fax); // Field ma_quocgia_fax
			$this->SetSearchParm($user->ma_vung_fax); // Field ma_vung_fax
			$this->SetSearchParm($user->so_fax); // Field so_fax
			$this->SetSearchParm($user->dia_chi); // Field dia_chi
			$this->SetSearchParm($user->tinh_thanh); // Field tinh_thanh
			$this->SetSearchParm($user->quan_huyen); // Field quan_huyen
			$this->SetSearchParm($user->gioi_thieu); // Field gioi_thieu
			$this->SetSearchParm($user->nick_yahoo); // Field nick_yahoo
			$this->SetSearchParm($user->nick_skype); // Field nick_skype
			$this->SetSearchParm($user->truycap_gannhat); // Field truycap_gannhat
			$this->SetSearchParm($user->kieu_giaodien); // Field kieu_giaodien
			$this->SetSearchParm($user->UserLevelID); // Field UserLevelID
			$this->SetSearchParm($user->nganhnghe_lienquan); // Field nganhnghe_lienquan
			$this->SetSearchParm($user->thitruong_lienquan); // Field thitruong_lienquan
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
		global $user;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$user->setAdvancedSearch("x_$FldParm", $FldVal);
		$user->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$user->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$user->setAdvancedSearch("y_$FldParm", $FldVal2);
		$user->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $user;
		$this->sSrchWhere = "";
		$user->setSearchWhere($this->sSrchWhere);

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $user;
		$user->setAdvancedSearch("x_nguoidung_id", "");
		$user->setAdvancedSearch("x_nguoidung_option", "");
		$user->setAdvancedSearch("x_tendangnhap", "");
		$user->setAdvancedSearch("x_quocgia_id", "");
		$user->setAdvancedSearch("x_gioi_tinh", "");
		$user->setAdvancedSearch("x_hoten_nguoilienhe", "");
		$user->setAdvancedSearch("x_ten_nguoilienhe", "");
		$user->setAdvancedSearch("x_mat_khau", "");
		$user->setAdvancedSearch("x_ten_congty", "");
		$user->setAdvancedSearch("x_ten_viettat", "");
		$user->setAdvancedSearch("x_website", "");
		$user->setAdvancedSearch("x_chuc_nang", "");
		$user->setAdvancedSearch("x_loaikinhdoanh_id", "");
		$user->setAdvancedSearch("x_loaicongty_id", "");
		$user->setAdvancedSearch("x_so_congnhan", "");
		$user->setAdvancedSearch("x_nam_thanhlap", "");
		$user->setAdvancedSearch("x_kim_ngach", "");
		$user->setAdvancedSearch("x_cung_cap", "");
		$user->setAdvancedSearch("x_chung_chi", "");
		$user->setAdvancedSearch("x_so_dkkd", "");
		$user->setAdvancedSearch("x_ngay_thamgia", "");
		$user->setAdvancedSearch("x_ma_quocgia_dthoai", "");
		$user->setAdvancedSearch("x_ma_vung_dthoai", "");
		$user->setAdvancedSearch("x_so_dienthoai", "");
		$user->setAdvancedSearch("x_ma_quocgia_fax", "");
		$user->setAdvancedSearch("x_ma_vung_fax", "");
		$user->setAdvancedSearch("x_so_fax", "");
		$user->setAdvancedSearch("x_dia_chi", "");
		$user->setAdvancedSearch("x_tinh_thanh", "");
		$user->setAdvancedSearch("x_quan_huyen", "");
		$user->setAdvancedSearch("x_gioi_thieu", "");
		$user->setAdvancedSearch("x_nick_yahoo", "");
		$user->setAdvancedSearch("x_nick_skype", "");
		$user->setAdvancedSearch("x_truycap_gannhat", "");
		$user->setAdvancedSearch("x_kieu_giaodien", "");
		$user->setAdvancedSearch("x_UserLevelID", "");
		$user->setAdvancedSearch("x_nganhnghe_lienquan", "");
		$user->setAdvancedSearch("x_thitruong_lienquan", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $user;
		$this->sSrchWhere = $user->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $user;
		 $user->nguoidung_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nguoidung_id");
		 $user->nguoidung_option->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nguoidung_option");
		 $user->tendangnhap->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_tendangnhap");
		 $user->quocgia_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_quocgia_id");
		 $user->gioi_tinh->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_gioi_tinh");
		 $user->hoten_nguoilienhe->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_hoten_nguoilienhe");
		 $user->ten_nguoilienhe->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ten_nguoilienhe");
		 $user->mat_khau->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_mat_khau");
		 $user->ten_congty->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ten_congty");
		 $user->ten_viettat->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ten_viettat");
		 $user->website->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_website");
		 $user->chuc_nang->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_chuc_nang");
		 $user->loaikinhdoanh_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_loaikinhdoanh_id");
		 $user->loaicongty_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_loaicongty_id");
		 $user->so_congnhan->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_congnhan");
		 $user->nam_thanhlap->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nam_thanhlap");
		 $user->kim_ngach->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_kim_ngach");
		 $user->cung_cap->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_cung_cap");
		 $user->chung_chi->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_chung_chi");
		 $user->so_dkkd->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_dkkd");
		 $user->ngay_thamgia->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ngay_thamgia");
		 $user->ma_quocgia_dthoai->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_quocgia_dthoai");
		 $user->ma_vung_dthoai->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_vung_dthoai");
		 $user->so_dienthoai->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_dienthoai");
		 $user->ma_quocgia_fax->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_quocgia_fax");
		 $user->ma_vung_fax->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_vung_fax");
		 $user->so_fax->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_fax");
		 $user->dia_chi->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_dia_chi");
		 $user->tinh_thanh->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_tinh_thanh");
		 $user->quan_huyen->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_quan_huyen");
		 $user->gioi_thieu->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_gioi_thieu");
		 $user->nick_yahoo->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nick_yahoo");
		 $user->nick_skype->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nick_skype");
		 $user->truycap_gannhat->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_truycap_gannhat");
		 $user->kieu_giaodien->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_kieu_giaodien");
		 $user->UserLevelID->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_UserLevelID");
		 $user->nganhnghe_lienquan->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nganhnghe_lienquan");
		 $user->thitruong_lienquan->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_thitruong_lienquan");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $user;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$user->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$user->CurrentOrderType = @$_GET["ordertype"];
			$user->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $user;
		$sOrderBy = $user->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($user->SqlOrderBy() <> "") {
				$sOrderBy = $user->SqlOrderBy();
				$user->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $user;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$user->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->lStartRec = 1;
			$user->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $user;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$user->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$user->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $user->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$user->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$user->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$user->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $user;

		// Load search values
		// nguoidung_id

		$user->nguoidung_id->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_id"];
		$user->nguoidung_id->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_id"];

		// nguoidung_option
		$user->nguoidung_option->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_option"];
		$user->nguoidung_option->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_option"];

		// tendangnhap
		$user->tendangnhap->AdvancedSearch->SearchValue = @$_GET["x_tendangnhap"];
		$user->tendangnhap->AdvancedSearch->SearchOperator = @$_GET["z_tendangnhap"];

		// quocgia_id
		$user->quocgia_id->AdvancedSearch->SearchValue = @$_GET["x_quocgia_id"];
		$user->quocgia_id->AdvancedSearch->SearchOperator = @$_GET["z_quocgia_id"];

		// gioi_tinh
		$user->gioi_tinh->AdvancedSearch->SearchValue = @$_GET["x_gioi_tinh"];
		$user->gioi_tinh->AdvancedSearch->SearchOperator = @$_GET["z_gioi_tinh"];

		// hoten_nguoilienhe
		$user->hoten_nguoilienhe->AdvancedSearch->SearchValue = @$_GET["x_hoten_nguoilienhe"];
		$user->hoten_nguoilienhe->AdvancedSearch->SearchOperator = @$_GET["z_hoten_nguoilienhe"];

		// ten_nguoilienhe
		$user->ten_nguoilienhe->AdvancedSearch->SearchValue = @$_GET["x_ten_nguoilienhe"];
		$user->ten_nguoilienhe->AdvancedSearch->SearchOperator = @$_GET["z_ten_nguoilienhe"];

		// mat_khau
		$user->mat_khau->AdvancedSearch->SearchValue = @$_GET["x_mat_khau"];
		$user->mat_khau->AdvancedSearch->SearchOperator = @$_GET["z_mat_khau"];

		// ten_congty
		$user->ten_congty->AdvancedSearch->SearchValue = @$_GET["x_ten_congty"];
		$user->ten_congty->AdvancedSearch->SearchOperator = @$_GET["z_ten_congty"];

		// ten_viettat
		$user->ten_viettat->AdvancedSearch->SearchValue = @$_GET["x_ten_viettat"];
		$user->ten_viettat->AdvancedSearch->SearchOperator = @$_GET["z_ten_viettat"];

		// website
		$user->website->AdvancedSearch->SearchValue = @$_GET["x_website"];
		$user->website->AdvancedSearch->SearchOperator = @$_GET["z_website"];

		// chuc_nang
		$user->chuc_nang->AdvancedSearch->SearchValue = @$_GET["x_chuc_nang"];
		$user->chuc_nang->AdvancedSearch->SearchOperator = @$_GET["z_chuc_nang"];

		// loaikinhdoanh_id
		$user->loaikinhdoanh_id->AdvancedSearch->SearchValue = @$_GET["x_loaikinhdoanh_id"];
		$user->loaikinhdoanh_id->AdvancedSearch->SearchOperator = @$_GET["z_loaikinhdoanh_id"];

		// loaicongty_id
		$user->loaicongty_id->AdvancedSearch->SearchValue = @$_GET["x_loaicongty_id"];
		$user->loaicongty_id->AdvancedSearch->SearchOperator = @$_GET["z_loaicongty_id"];

		// so_congnhan
		$user->so_congnhan->AdvancedSearch->SearchValue = @$_GET["x_so_congnhan"];
		$user->so_congnhan->AdvancedSearch->SearchOperator = @$_GET["z_so_congnhan"];

		// nam_thanhlap
		$user->nam_thanhlap->AdvancedSearch->SearchValue = @$_GET["x_nam_thanhlap"];
		$user->nam_thanhlap->AdvancedSearch->SearchOperator = @$_GET["z_nam_thanhlap"];

		// kim_ngach
		$user->kim_ngach->AdvancedSearch->SearchValue = @$_GET["x_kim_ngach"];
		$user->kim_ngach->AdvancedSearch->SearchOperator = @$_GET["z_kim_ngach"];

		// cung_cap
		$user->cung_cap->AdvancedSearch->SearchValue = @$_GET["x_cung_cap"];
		$user->cung_cap->AdvancedSearch->SearchOperator = @$_GET["z_cung_cap"];

		// chung_chi
		$user->chung_chi->AdvancedSearch->SearchValue = @$_GET["x_chung_chi"];
		$user->chung_chi->AdvancedSearch->SearchOperator = @$_GET["z_chung_chi"];

		// so_dkkd
		$user->so_dkkd->AdvancedSearch->SearchValue = @$_GET["x_so_dkkd"];
		$user->so_dkkd->AdvancedSearch->SearchOperator = @$_GET["z_so_dkkd"];

		// ngay_thamgia
		$user->ngay_thamgia->AdvancedSearch->SearchValue = @$_GET["x_ngay_thamgia"];
		$user->ngay_thamgia->AdvancedSearch->SearchOperator = @$_GET["z_ngay_thamgia"];

		// ma_quocgia_dthoai
		$user->ma_quocgia_dthoai->AdvancedSearch->SearchValue = @$_GET["x_ma_quocgia_dthoai"];
		$user->ma_quocgia_dthoai->AdvancedSearch->SearchOperator = @$_GET["z_ma_quocgia_dthoai"];

		// ma_vung_dthoai
		$user->ma_vung_dthoai->AdvancedSearch->SearchValue = @$_GET["x_ma_vung_dthoai"];
		$user->ma_vung_dthoai->AdvancedSearch->SearchOperator = @$_GET["z_ma_vung_dthoai"];

		// so_dienthoai
		$user->so_dienthoai->AdvancedSearch->SearchValue = @$_GET["x_so_dienthoai"];
		$user->so_dienthoai->AdvancedSearch->SearchOperator = @$_GET["z_so_dienthoai"];

		// ma_quocgia_fax
		$user->ma_quocgia_fax->AdvancedSearch->SearchValue = @$_GET["x_ma_quocgia_fax"];
		$user->ma_quocgia_fax->AdvancedSearch->SearchOperator = @$_GET["z_ma_quocgia_fax"];

		// ma_vung_fax
		$user->ma_vung_fax->AdvancedSearch->SearchValue = @$_GET["x_ma_vung_fax"];
		$user->ma_vung_fax->AdvancedSearch->SearchOperator = @$_GET["z_ma_vung_fax"];

		// so_fax
		$user->so_fax->AdvancedSearch->SearchValue = @$_GET["x_so_fax"];
		$user->so_fax->AdvancedSearch->SearchOperator = @$_GET["z_so_fax"];

		// dia_chi
		$user->dia_chi->AdvancedSearch->SearchValue = @$_GET["x_dia_chi"];
		$user->dia_chi->AdvancedSearch->SearchOperator = @$_GET["z_dia_chi"];

		// tinh_thanh
		$user->tinh_thanh->AdvancedSearch->SearchValue = @$_GET["x_tinh_thanh"];
		$user->tinh_thanh->AdvancedSearch->SearchOperator = @$_GET["z_tinh_thanh"];

		// quan_huyen
		$user->quan_huyen->AdvancedSearch->SearchValue = @$_GET["x_quan_huyen"];
		$user->quan_huyen->AdvancedSearch->SearchOperator = @$_GET["z_quan_huyen"];

		// gioi_thieu
		$user->gioi_thieu->AdvancedSearch->SearchValue = @$_GET["x_gioi_thieu"];
		$user->gioi_thieu->AdvancedSearch->SearchOperator = @$_GET["z_gioi_thieu"];

		// nick_yahoo
		$user->nick_yahoo->AdvancedSearch->SearchValue = @$_GET["x_nick_yahoo"];
		$user->nick_yahoo->AdvancedSearch->SearchOperator = @$_GET["z_nick_yahoo"];

		// nick_skype
		$user->nick_skype->AdvancedSearch->SearchValue = @$_GET["x_nick_skype"];
		$user->nick_skype->AdvancedSearch->SearchOperator = @$_GET["z_nick_skype"];

		// truycap_gannhat
		$user->truycap_gannhat->AdvancedSearch->SearchValue = @$_GET["x_truycap_gannhat"];
		$user->truycap_gannhat->AdvancedSearch->SearchOperator = @$_GET["z_truycap_gannhat"];

		// kieu_giaodien
		$user->kieu_giaodien->AdvancedSearch->SearchValue = @$_GET["x_kieu_giaodien"];
		$user->kieu_giaodien->AdvancedSearch->SearchOperator = @$_GET["z_kieu_giaodien"];

		// UserLevelID
		$user->UserLevelID->AdvancedSearch->SearchValue = @$_GET["x_UserLevelID"];
		$user->UserLevelID->AdvancedSearch->SearchOperator = @$_GET["z_UserLevelID"];

		// nganhnghe_lienquan
		$user->nganhnghe_lienquan->AdvancedSearch->SearchValue = @$_GET["x_nganhnghe_lienquan"];
		$user->nganhnghe_lienquan->AdvancedSearch->SearchOperator = @$_GET["z_nganhnghe_lienquan"];

		// thitruong_lienquan
		$user->thitruong_lienquan->AdvancedSearch->SearchValue = @$_GET["x_thitruong_lienquan"];
		$user->thitruong_lienquan->AdvancedSearch->SearchOperator = @$_GET["z_thitruong_lienquan"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user;

		// Call Recordset Selecting event
		$user->Recordset_Selecting($user->CurrentFilter);

		// Load list page SQL
		$sSql = $user->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user;
		$sFilter = $user->KeyFilter();

		// Call Row Selecting event
		$user->Row_Selecting($sFilter);

		// Load sql based on filter
		$user->CurrentFilter = $sFilter;
		$sSql = $user->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user;
		$user->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$user->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$user->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$user->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$user->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));

		$user->mat_khau->setDbValue($rs->fields('mat_khau'));
		$user->ten_congty->setDbValue($rs->fields('ten_congty'));
		$user->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$user->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$user->website->setDbValue($rs->fields('website'));
		$user->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$user->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$user->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$user->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$user->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$user->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$user->cung_cap->setDbValue($rs->fields('cung_cap'));
		$user->chung_chi->setDbValue($rs->fields('chung_chi'));
		$user->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$user->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$user->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$user->so_fax->setDbValue($rs->fields('so_fax'));
		$user->dia_chi->setDbValue($rs->fields('dia_chi'));
		$user->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$user->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$user->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$user->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$user->nick_skype->setDbValue($rs->fields('nick_skype'));
		$user->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$user->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$user->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$user->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$user->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user;

		// Call Row_Rendering event
		$user->Row_Rendering();

		// Common render codes for all row types
		if ($user->RowType == EW_ROWTYPE_VIEW) { // View row

			// quocgia_id
			if (strval($user->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($user->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$user->quocgia_id->ViewValue = $user->quocgia_id->CurrentValue;
				}
			} else {
				$user->quocgia_id->ViewValue = NULL;
			}
			$user->quocgia_id->CssStyle = "";
			$user->quocgia_id->CssClass = "";
			$user->quocgia_id->ViewCustomAttributes = "";
		}

		// Call Row Rendered event
		$user->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $user;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;

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
		global $user;
		$user->nguoidung_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nguoidung_id");
		$user->nguoidung_option->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nguoidung_option");
		$user->tendangnhap->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_tendangnhap");
		$user->quocgia_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_quocgia_id");
		$user->gioi_tinh->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_gioi_tinh");
		$user->hoten_nguoilienhe->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_hoten_nguoilienhe");
		$user->ten_nguoilienhe->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ten_nguoilienhe");
		$user->mat_khau->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_mat_khau");
		$user->ten_congty->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ten_congty");
		$user->ten_viettat->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ten_viettat");
		$user->website->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_website");
		$user->chuc_nang->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_chuc_nang");
		$user->loaikinhdoanh_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_loaikinhdoanh_id");
		$user->loaicongty_id->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_loaicongty_id");
		$user->so_congnhan->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_congnhan");
		$user->nam_thanhlap->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nam_thanhlap");
		$user->kim_ngach->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_kim_ngach");
		$user->cung_cap->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_cung_cap");
		$user->chung_chi->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_chung_chi");
		$user->so_dkkd->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_dkkd");
		$user->ngay_thamgia->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ngay_thamgia");
		$user->ma_quocgia_dthoai->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_quocgia_dthoai");
		$user->ma_vung_dthoai->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_vung_dthoai");
		$user->so_dienthoai->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_dienthoai");
		$user->ma_quocgia_fax->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_quocgia_fax");
		$user->ma_vung_fax->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_ma_vung_fax");
		$user->so_fax->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_so_fax");
		$user->dia_chi->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_dia_chi");
		$user->tinh_thanh->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_tinh_thanh");
		$user->quan_huyen->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_quan_huyen");
		$user->gioi_thieu->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_gioi_thieu");
		$user->nick_yahoo->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nick_yahoo");
		$user->nick_skype->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nick_skype");
		$user->truycap_gannhat->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_truycap_gannhat");
		$user->kieu_giaodien->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_kieu_giaodien");
		$user->UserLevelID->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_UserLevelID");
		$user->nganhnghe_lienquan->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_nganhnghe_lienquan");
		$user->thitruong_lienquan->AdvancedSearch->SearchValue = $user->getAdvancedSearch("x_thitruong_lienquan");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $user;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($user->nguoidung_id->CurrentValue);
			}
		}
		return TRUE;
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
