<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UserAdmininfo.php" ?>
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
$UserAdmin_list = new cUserAdmin_list();
$Page =& $UserAdmin_list;

// Page init processing
$UserAdmin_list->Page_Init();

// Page main processing
$UserAdmin_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($UserAdmin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var UserAdmin_list = new ew_Page("UserAdmin_list");

// page properties
UserAdmin_list.PageID = "list"; // page ID
var EW_PAGE_ID = UserAdmin_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
UserAdmin_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UserAdmin_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UserAdmin_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UserAdmin_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<?php if ($UserAdmin->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($UserAdmin->Export == "" && $UserAdmin->SelectLimit);
	if (!$bSelectLimit)
		$rs = $UserAdmin_list->LoadRecordset();
	$UserAdmin_list->lTotalRecs = ($bSelectLimit) ? $UserAdmin->SelectRecordCount() : $rs->RecordCount();
	$UserAdmin_list->lStartRec = 1;
	if ($UserAdmin_list->lDisplayRecs <= 0) // Display all records
		$UserAdmin_list->lDisplayRecs = $UserAdmin_list->lTotalRecs;
	if (!($UserAdmin->ExportAll && $UserAdmin->Export <> ""))
		$UserAdmin_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $UserAdmin_list->LoadRecordset($UserAdmin_list->lStartRec-1, $UserAdmin_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">CUSTOM VIEW: User Admin
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($UserAdmin->Export == "" && $UserAdmin->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(UserAdmin_list);" style="text-decoration: none;"><img id="UserAdmin_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="UserAdmin_list_SearchPanel">
<form name="fUserAdminlistsrch" id="fUserAdminlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="UserAdmin">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($UserAdmin->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<a href="<?php echo $UserAdmin_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($UserAdmin->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Exact phrase</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($UserAdmin->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>All words</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($UserAdmin->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Any word</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $UserAdmin_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($UserAdmin->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($UserAdmin->CurrentAction <> "gridadd" && $UserAdmin->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UserAdmin_list->Pager)) $UserAdmin_list->Pager = new cNumericPager($UserAdmin_list->lStartRec, $UserAdmin_list->lDisplayRecs, $UserAdmin_list->lTotalRecs, $UserAdmin_list->lRecRange) ?>
<?php if ($UserAdmin_list->Pager->RecordCount > 0) { ?>
	<?php if ($UserAdmin_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UserAdmin_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $UserAdmin_list->Pager->FromIndex ?> to <?php echo $UserAdmin_list->Pager->ToIndex ?> of <?php echo $UserAdmin_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UserAdmin_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $UserAdmin->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($UserAdmin_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUserAdminlist)) alert('No records selected'); else {document.fUserAdminlist.action='UserAdmindelete.php';document.fUserAdminlist.encoding='application/x-www-form-urlencoded';document.fUserAdminlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fUserAdminlist" id="fUserAdminlist" class="ewForm" action="" method="post">
<?php if ($UserAdmin_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$UserAdmin_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$UserAdmin_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$UserAdmin_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$UserAdmin_list->lOptionCnt++; // Multi-select
}
	$UserAdmin_list->lOptionCnt += count($UserAdmin_list->ListOptions->Items); // Custom list options
?>
<?php echo $UserAdmin->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($UserAdmin->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="UserAdmin_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($UserAdmin_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($UserAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
	<?php if ($UserAdmin->SortUrl($UserAdmin->nguoidung_option) == "") { ?>
		<td>Nguoidung Option</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UserAdmin->SortUrl($UserAdmin->nguoidung_option) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Nguoidung Option</td><td style="width: 10px;"><?php if ($UserAdmin->nguoidung_option->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UserAdmin->nguoidung_option->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UserAdmin->tendangnhap->Visible) { // tendangnhap ?>
	<?php if ($UserAdmin->SortUrl($UserAdmin->tendangnhap) == "") { ?>
		<td>Tendangnhap</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UserAdmin->SortUrl($UserAdmin->tendangnhap) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tendangnhap&nbsp;(*)</td><td style="width: 10px;"><?php if ($UserAdmin->tendangnhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UserAdmin->tendangnhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UserAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<?php if ($UserAdmin->SortUrl($UserAdmin->truycap_gannhat) == "") { ?>
		<td>Truycap Gannhat</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UserAdmin->SortUrl($UserAdmin->truycap_gannhat) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Truycap Gannhat</td><td style="width: 10px;"><?php if ($UserAdmin->truycap_gannhat->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UserAdmin->truycap_gannhat->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UserAdmin->UserLevelID->Visible) { // UserLevelID ?>
	<?php if ($UserAdmin->SortUrl($UserAdmin->UserLevelID) == "") { ?>
		<td>User Level ID</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UserAdmin->SortUrl($UserAdmin->UserLevelID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>User Level ID</td><td style="width: 10px;"><?php if ($UserAdmin->UserLevelID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UserAdmin->UserLevelID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($UserAdmin->ExportAll && $UserAdmin->Export <> "") {
	$UserAdmin_list->lStopRec = $UserAdmin_list->lTotalRecs;
} else {
	$UserAdmin_list->lStopRec = $UserAdmin_list->lStartRec + $UserAdmin_list->lDisplayRecs - 1; // Set the last record to display
}
$UserAdmin_list->lRecCount = $UserAdmin_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$UserAdmin->SelectLimit && $UserAdmin_list->lStartRec > 1)
		$rs->Move($UserAdmin_list->lStartRec - 1);
}
$UserAdmin_list->lRowCnt = 0;
while (($UserAdmin->CurrentAction == "gridadd" || !$rs->EOF) &&
	$UserAdmin_list->lRecCount < $UserAdmin_list->lStopRec) {
	$UserAdmin_list->lRecCount++;
	if (intval($UserAdmin_list->lRecCount) >= intval($UserAdmin_list->lStartRec)) {
		$UserAdmin_list->lRowCnt++;

	// Init row class and style
	$UserAdmin->CssClass = "";
	$UserAdmin->CssStyle = "";
	$UserAdmin->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($UserAdmin->CurrentAction == "gridadd") {
		$UserAdmin_list->LoadDefaultValues(); // Load default values
	} else {
		$UserAdmin_list->LoadRowValues($rs); // Load row values
	}
	$UserAdmin->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$UserAdmin_list->RenderRow();
?>
	<tr<?php echo $UserAdmin->RowAttributes() ?>>
<?php if ($UserAdmin->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $UserAdmin->ViewUrl() ?>">View</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $UserAdmin->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($UserAdmin->nguoidung_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($UserAdmin_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($UserAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
		<td<?php echo $UserAdmin->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UserAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UserAdmin->nguoidung_option->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UserAdmin->tendangnhap->Visible) { // tendangnhap ?>
		<td<?php echo $UserAdmin->tendangnhap->CellAttributes() ?>>
<div<?php echo $UserAdmin->tendangnhap->ViewAttributes() ?>><?php echo $UserAdmin->tendangnhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UserAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
		<td<?php echo $UserAdmin->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UserAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UserAdmin->truycap_gannhat->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UserAdmin->UserLevelID->Visible) { // UserLevelID ?>
		<td<?php echo $UserAdmin->UserLevelID->CellAttributes() ?>>
<div<?php echo $UserAdmin->UserLevelID->ViewAttributes() ?>><?php echo $UserAdmin->UserLevelID->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($UserAdmin->CurrentAction <> "gridadd")
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
<?php if ($UserAdmin_list->lTotalRecs > 0) { ?>
<?php if ($UserAdmin->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($UserAdmin->CurrentAction <> "gridadd" && $UserAdmin->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UserAdmin_list->Pager)) $UserAdmin_list->Pager = new cNumericPager($UserAdmin_list->lStartRec, $UserAdmin_list->lDisplayRecs, $UserAdmin_list->lTotalRecs, $UserAdmin_list->lRecRange) ?>
<?php if ($UserAdmin_list->Pager->RecordCount > 0) { ?>
	<?php if ($UserAdmin_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UserAdmin_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_list->PageUrl() ?>start=<?php echo $UserAdmin_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $UserAdmin_list->Pager->FromIndex ?> to <?php echo $UserAdmin_list->Pager->ToIndex ?> of <?php echo $UserAdmin_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UserAdmin_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($UserAdmin_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $UserAdmin->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($UserAdmin_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUserAdminlist)) alert('No records selected'); else {document.fUserAdminlist.action='UserAdmindelete.php';document.fUserAdminlist.encoding='application/x-www-form-urlencoded';document.fUserAdminlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($UserAdmin->Export == "" && $UserAdmin->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(UserAdmin_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($UserAdmin->Export == "") { ?>
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
class cUserAdmin_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'UserAdmin';

	// Page Object Name
	var $PageObjName = 'UserAdmin_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UserAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UserAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UserAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUserAdmin_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["UserAdmin"] = new cUserAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UserAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserAdmin;
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
	$UserAdmin->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $UserAdmin->Export; // Get export parameter, used in header
	$gsExportFile = $UserAdmin->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $UserAdmin;
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

			// Handle reset command
			$this->ResetCmd();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($UserAdmin->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $UserAdmin->getRecordsPerPage(); // Restore from Session
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
		$UserAdmin->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$UserAdmin->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$UserAdmin->setStartRecordNumber($this->lStartRec);
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
		$UserAdmin->setSessionWhere($sFilter);
		$UserAdmin->CurrentFilter = "";
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $UserAdmin;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $UserAdmin->tendangnhap->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UserAdmin->mat_khau->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $UserAdmin;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = ew_StripSlashes(@$_GET[EW_TABLE_BASIC_SEARCH]);
		$sSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
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
			$UserAdmin->setBasicSearchKeyword($sSearchKeyword);
			$UserAdmin->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $UserAdmin;
		$this->sSrchWhere = "";
		$UserAdmin->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $UserAdmin;
		$UserAdmin->setBasicSearchKeyword("");
		$UserAdmin->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $UserAdmin;
		$this->sSrchWhere = $UserAdmin->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $UserAdmin;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$UserAdmin->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$UserAdmin->CurrentOrderType = @$_GET["ordertype"];
			$UserAdmin->UpdateSort($UserAdmin->nguoidung_option); // Field 
			$UserAdmin->UpdateSort($UserAdmin->tendangnhap); // Field 
			$UserAdmin->UpdateSort($UserAdmin->truycap_gannhat); // Field 
			$UserAdmin->UpdateSort($UserAdmin->UserLevelID); // Field 
			$UserAdmin->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $UserAdmin;
		$sOrderBy = $UserAdmin->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($UserAdmin->SqlOrderBy() <> "") {
				$sOrderBy = $UserAdmin->SqlOrderBy();
				$UserAdmin->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $UserAdmin;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$UserAdmin->setSessionOrderBy($sOrderBy);
				$UserAdmin->nguoidung_option->setSort("");
				$UserAdmin->tendangnhap->setSort("");
				$UserAdmin->truycap_gannhat->setSort("");
				$UserAdmin->UserLevelID->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$UserAdmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $UserAdmin;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$UserAdmin->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$UserAdmin->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $UserAdmin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$UserAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$UserAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$UserAdmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UserAdmin;

		// Call Recordset Selecting event
		$UserAdmin->Recordset_Selecting($UserAdmin->CurrentFilter);

		// Load list page SQL
		$sSql = $UserAdmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UserAdmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UserAdmin;
		$sFilter = $UserAdmin->KeyFilter();

		// Call Row Selecting event
		$UserAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UserAdmin->CurrentFilter = $sFilter;
		$sSql = $UserAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UserAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UserAdmin;
		$UserAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UserAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UserAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UserAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UserAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UserAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UserAdmin;

		// Call Row_Rendering event
		$UserAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UserAdmin->nguoidung_option->CellCssStyle = "";
		$UserAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UserAdmin->tendangnhap->CellCssStyle = "";
		$UserAdmin->tendangnhap->CellCssClass = "";

		// truycap_gannhat
		$UserAdmin->truycap_gannhat->CellCssStyle = "";
		$UserAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UserAdmin->UserLevelID->CellCssStyle = "";
		$UserAdmin->UserLevelID->CellCssClass = "";
		if ($UserAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UserAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UserAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UserAdmin->nguoidung_option->ViewValue = "Quan tri he thong";
						break;
					case "1":
						$UserAdmin->nguoidung_option->ViewValue = "Thanh vien dang ky";
						break;
					default:
						$UserAdmin->nguoidung_option->ViewValue = $UserAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UserAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UserAdmin->nguoidung_option->CssStyle = "";
			$UserAdmin->nguoidung_option->CssClass = "";
			$UserAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UserAdmin->tendangnhap->ViewValue = $UserAdmin->tendangnhap->CurrentValue;
			$UserAdmin->tendangnhap->CssStyle = "";
			$UserAdmin->tendangnhap->CssClass = "";
			$UserAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->ViewValue = $UserAdmin->truycap_gannhat->CurrentValue;
			$UserAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UserAdmin->truycap_gannhat->ViewValue, 11);
			$UserAdmin->truycap_gannhat->CssStyle = "";
			$UserAdmin->truycap_gannhat->CssClass = "";
			$UserAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UserAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UserAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UserAdmin->UserLevelID->ViewValue = $UserAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UserAdmin->UserLevelID->ViewValue = NULL;
			}
			$UserAdmin->UserLevelID->CssStyle = "";
			$UserAdmin->UserLevelID->CssClass = "";
			$UserAdmin->UserLevelID->ViewCustomAttributes = "";

			// nguoidung_option
			$UserAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UserAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UserAdmin->UserLevelID->HrefValue = "";
		}

		// Call Row Rendered event
		$UserAdmin->Row_Rendered();
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
