<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userlevelpermissionsinfo.php" ?>
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
$userlevelpermissions_list = new cuserlevelpermissions_list();
$Page =& $userlevelpermissions_list;

// Page init processing
$userlevelpermissions_list->Page_Init();

// Page main processing
$userlevelpermissions_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($userlevelpermissions->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var userlevelpermissions_list = new ew_Page("userlevelpermissions_list");

// page properties
userlevelpermissions_list.PageID = "list"; // page ID
var EW_PAGE_ID = userlevelpermissions_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevelpermissions_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevelpermissions_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevelpermissions_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevelpermissions_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($userlevelpermissions->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($userlevelpermissions->Export == "" && $userlevelpermissions->SelectLimit);
	if (!$bSelectLimit)
		$rs = $userlevelpermissions_list->LoadRecordset();
	$userlevelpermissions_list->lTotalRecs = ($bSelectLimit) ? $userlevelpermissions->SelectRecordCount() : $rs->RecordCount();
	$userlevelpermissions_list->lStartRec = 1;
	if ($userlevelpermissions_list->lDisplayRecs <= 0) // Display all records
		$userlevelpermissions_list->lDisplayRecs = $userlevelpermissions_list->lTotalRecs;
	if (!($userlevelpermissions->ExportAll && $userlevelpermissions->Export <> ""))
		$userlevelpermissions_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $userlevelpermissions_list->LoadRecordset($userlevelpermissions_list->lStartRec-1, $userlevelpermissions_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">TABLE: Userlevelpermissions
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($userlevelpermissions->Export == "" && $userlevelpermissions->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(userlevelpermissions_list);" style="text-decoration: none;"><img id="userlevelpermissions_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="userlevelpermissions_list_SearchPanel">
<form name="fuserlevelpermissionslistsrch" id="fuserlevelpermissionslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="userlevelpermissions">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($userlevelpermissions->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
			<a href="userlevelpermissionssrch.php">Advanced Search</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($userlevelpermissions->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Exact phrase</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($userlevelpermissions->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>All words</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($userlevelpermissions->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Any word</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $userlevelpermissions_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($userlevelpermissions->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($userlevelpermissions->CurrentAction <> "gridadd" && $userlevelpermissions->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevelpermissions_list->Pager)) $userlevelpermissions_list->Pager = new cNumericPager($userlevelpermissions_list->lStartRec, $userlevelpermissions_list->lDisplayRecs, $userlevelpermissions_list->lTotalRecs, $userlevelpermissions_list->lRecRange) ?>
<?php if ($userlevelpermissions_list->Pager->RecordCount > 0) { ?>
	<?php if ($userlevelpermissions_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevelpermissions_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $userlevelpermissions_list->Pager->FromIndex ?> to <?php echo $userlevelpermissions_list->Pager->ToIndex ?> of <?php echo $userlevelpermissions_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevelpermissions_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $userlevelpermissions->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($userlevelpermissions_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuserlevelpermissionslist)) alert('No records selected'); else if (ew_Confirm('<?php echo $userlevelpermissions_list->sDeleteConfirmMsg ?>')) {document.fuserlevelpermissionslist.action='userlevelpermissionsdelete.php';document.fuserlevelpermissionslist.encoding='application/x-www-form-urlencoded';document.fuserlevelpermissionslist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fuserlevelpermissionslist" id="fuserlevelpermissionslist" class="ewForm" action="" method="post">
<?php if ($userlevelpermissions_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$userlevelpermissions_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$userlevelpermissions_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$userlevelpermissions_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$userlevelpermissions_list->lOptionCnt++; // Multi-select
}
	$userlevelpermissions_list->lOptionCnt += count($userlevelpermissions_list->ListOptions->Items); // Custom list options
?>
<?php echo $userlevelpermissions->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($userlevelpermissions->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="userlevelpermissions_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($userlevelpermissions_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($userlevelpermissions->UserLevelID->Visible) { // UserLevelID ?>
	<?php if ($userlevelpermissions->SortUrl($userlevelpermissions->UserLevelID) == "") { ?>
		<td>User Level ID</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userlevelpermissions->SortUrl($userlevelpermissions->UserLevelID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>User Level ID</td><td style="width: 10px;"><?php if ($userlevelpermissions->UserLevelID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userlevelpermissions->UserLevelID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($userlevelpermissions->UserLevelTableName->Visible) { // UserLevelTableName ?>
	<?php if ($userlevelpermissions->SortUrl($userlevelpermissions->UserLevelTableName) == "") { ?>
		<td>User Level Table Name</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userlevelpermissions->SortUrl($userlevelpermissions->UserLevelTableName) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>User Level Table Name&nbsp;(*)</td><td style="width: 10px;"><?php if ($userlevelpermissions->UserLevelTableName->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userlevelpermissions->UserLevelTableName->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($userlevelpermissions->UserLevelPermission->Visible) { // UserLevelPermission ?>
	<?php if ($userlevelpermissions->SortUrl($userlevelpermissions->UserLevelPermission) == "") { ?>
		<td>User Level Permission</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userlevelpermissions->SortUrl($userlevelpermissions->UserLevelPermission) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>User Level Permission</td><td style="width: 10px;"><?php if ($userlevelpermissions->UserLevelPermission->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userlevelpermissions->UserLevelPermission->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($userlevelpermissions->ExportAll && $userlevelpermissions->Export <> "") {
	$userlevelpermissions_list->lStopRec = $userlevelpermissions_list->lTotalRecs;
} else {
	$userlevelpermissions_list->lStopRec = $userlevelpermissions_list->lStartRec + $userlevelpermissions_list->lDisplayRecs - 1; // Set the last record to display
}
$userlevelpermissions_list->lRecCount = $userlevelpermissions_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$userlevelpermissions->SelectLimit && $userlevelpermissions_list->lStartRec > 1)
		$rs->Move($userlevelpermissions_list->lStartRec - 1);
}
$userlevelpermissions_list->lRowCnt = 0;
while (($userlevelpermissions->CurrentAction == "gridadd" || !$rs->EOF) &&
	$userlevelpermissions_list->lRecCount < $userlevelpermissions_list->lStopRec) {
	$userlevelpermissions_list->lRecCount++;
	if (intval($userlevelpermissions_list->lRecCount) >= intval($userlevelpermissions_list->lStartRec)) {
		$userlevelpermissions_list->lRowCnt++;

	// Init row class and style
	$userlevelpermissions->CssClass = "";
	$userlevelpermissions->CssStyle = "";
	$userlevelpermissions->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($userlevelpermissions->CurrentAction == "gridadd") {
		$userlevelpermissions_list->LoadDefaultValues(); // Load default values
	} else {
		$userlevelpermissions_list->LoadRowValues($rs); // Load row values
	}
	$userlevelpermissions->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$userlevelpermissions_list->RenderRow();
?>
	<tr<?php echo $userlevelpermissions->RowAttributes() ?>>
<?php if ($userlevelpermissions->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $userlevelpermissions->ViewUrl() ?>">View</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $userlevelpermissions->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($userlevelpermissions->UserLevelID->CurrentValue . EW_COMPOSITE_KEY_SEPARATOR . $userlevelpermissions->UserLevelTableName->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($userlevelpermissions_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($userlevelpermissions->UserLevelID->Visible) { // UserLevelID ?>
		<td<?php echo $userlevelpermissions->UserLevelID->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelID->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userlevelpermissions->UserLevelTableName->Visible) { // UserLevelTableName ?>
		<td<?php echo $userlevelpermissions->UserLevelTableName->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelTableName->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelTableName->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userlevelpermissions->UserLevelPermission->Visible) { // UserLevelPermission ?>
		<td<?php echo $userlevelpermissions->UserLevelPermission->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelPermission->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelPermission->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($userlevelpermissions->CurrentAction <> "gridadd")
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
<?php if ($userlevelpermissions_list->lTotalRecs > 0) { ?>
<?php if ($userlevelpermissions->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($userlevelpermissions->CurrentAction <> "gridadd" && $userlevelpermissions->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevelpermissions_list->Pager)) $userlevelpermissions_list->Pager = new cNumericPager($userlevelpermissions_list->lStartRec, $userlevelpermissions_list->lDisplayRecs, $userlevelpermissions_list->lTotalRecs, $userlevelpermissions_list->lRecRange) ?>
<?php if ($userlevelpermissions_list->Pager->RecordCount > 0) { ?>
	<?php if ($userlevelpermissions_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevelpermissions_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_list->PageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $userlevelpermissions_list->Pager->FromIndex ?> to <?php echo $userlevelpermissions_list->Pager->ToIndex ?> of <?php echo $userlevelpermissions_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevelpermissions_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($userlevelpermissions_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $userlevelpermissions->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($userlevelpermissions_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuserlevelpermissionslist)) alert('No records selected'); else if (ew_Confirm('<?php echo $userlevelpermissions_list->sDeleteConfirmMsg ?>')) {document.fuserlevelpermissionslist.action='userlevelpermissionsdelete.php';document.fuserlevelpermissionslist.encoding='application/x-www-form-urlencoded';document.fuserlevelpermissionslist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($userlevelpermissions->Export == "" && $userlevelpermissions->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(userlevelpermissions_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($userlevelpermissions->Export == "") { ?>
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
class cuserlevelpermissions_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'userlevelpermissions';

	// Page Object Name
	var $PageObjName = 'userlevelpermissions_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevelpermissions;
		if ($userlevelpermissions->UseTokenInUrl) $PageUrl .= "t=" . $userlevelpermissions->TableVar . "&"; // add page token
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
		global $objForm, $userlevelpermissions;
		if ($userlevelpermissions->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($userlevelpermissions->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevelpermissions->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuserlevelpermissions_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevelpermissions"] = new cuserlevelpermissions();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevelpermissions', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $userlevelpermissions;
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
	$userlevelpermissions->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $userlevelpermissions->Export; // Get export parameter, used in header
	$gsExportFile = $userlevelpermissions->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $userlevelpermissions;
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

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($userlevelpermissions->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $userlevelpermissions->getRecordsPerPage(); // Restore from Session
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
		$userlevelpermissions->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$userlevelpermissions->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
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
		$userlevelpermissions->setSessionWhere($sFilter);
		$userlevelpermissions->CurrentFilter = "";
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $userlevelpermissions;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $userlevelpermissions->UserLevelID, FALSE); // Field UserLevelID
		$this->BuildSearchSql($sWhere, $userlevelpermissions->UserLevelTableName, FALSE); // Field UserLevelTableName
		$this->BuildSearchSql($sWhere, $userlevelpermissions->UserLevelPermission, FALSE); // Field UserLevelPermission

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($userlevelpermissions->UserLevelID); // Field UserLevelID
			$this->SetSearchParm($userlevelpermissions->UserLevelTableName); // Field UserLevelTableName
			$this->SetSearchParm($userlevelpermissions->UserLevelPermission); // Field UserLevelPermission
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
		global $userlevelpermissions;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$userlevelpermissions->setAdvancedSearch("x_$FldParm", $FldVal);
		$userlevelpermissions->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$userlevelpermissions->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$userlevelpermissions->setAdvancedSearch("y_$FldParm", $FldVal2);
		$userlevelpermissions->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $userlevelpermissions;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $userlevelpermissions->UserLevelTableName->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $userlevelpermissions;
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
			$userlevelpermissions->setBasicSearchKeyword($sSearchKeyword);
			$userlevelpermissions->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $userlevelpermissions;
		$this->sSrchWhere = "";
		$userlevelpermissions->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $userlevelpermissions;
		$userlevelpermissions->setBasicSearchKeyword("");
		$userlevelpermissions->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $userlevelpermissions;
		$userlevelpermissions->setAdvancedSearch("x_UserLevelID", "");
		$userlevelpermissions->setAdvancedSearch("x_UserLevelTableName", "");
		$userlevelpermissions->setAdvancedSearch("x_UserLevelPermission", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $userlevelpermissions;
		$this->sSrchWhere = $userlevelpermissions->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $userlevelpermissions;
		 $userlevelpermissions->UserLevelID->AdvancedSearch->SearchValue = $userlevelpermissions->getAdvancedSearch("x_UserLevelID");
		 $userlevelpermissions->UserLevelTableName->AdvancedSearch->SearchValue = $userlevelpermissions->getAdvancedSearch("x_UserLevelTableName");
		 $userlevelpermissions->UserLevelPermission->AdvancedSearch->SearchValue = $userlevelpermissions->getAdvancedSearch("x_UserLevelPermission");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $userlevelpermissions;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$userlevelpermissions->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$userlevelpermissions->CurrentOrderType = @$_GET["ordertype"];
			$userlevelpermissions->UpdateSort($userlevelpermissions->UserLevelID); // Field 
			$userlevelpermissions->UpdateSort($userlevelpermissions->UserLevelTableName); // Field 
			$userlevelpermissions->UpdateSort($userlevelpermissions->UserLevelPermission); // Field 
			$userlevelpermissions->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $userlevelpermissions;
		$sOrderBy = $userlevelpermissions->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($userlevelpermissions->SqlOrderBy() <> "") {
				$sOrderBy = $userlevelpermissions->SqlOrderBy();
				$userlevelpermissions->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $userlevelpermissions;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$userlevelpermissions->setSessionOrderBy($sOrderBy);
				$userlevelpermissions->UserLevelID->setSort("");
				$userlevelpermissions->UserLevelTableName->setSort("");
				$userlevelpermissions->UserLevelPermission->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $userlevelpermissions;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$userlevelpermissions->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$userlevelpermissions->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $userlevelpermissions->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $userlevelpermissions;

		// Load search values
		// UserLevelID

		$userlevelpermissions->UserLevelID->AdvancedSearch->SearchValue = @$_GET["x_UserLevelID"];
		$userlevelpermissions->UserLevelID->AdvancedSearch->SearchOperator = @$_GET["z_UserLevelID"];

		// UserLevelTableName
		$userlevelpermissions->UserLevelTableName->AdvancedSearch->SearchValue = @$_GET["x_UserLevelTableName"];
		$userlevelpermissions->UserLevelTableName->AdvancedSearch->SearchOperator = @$_GET["z_UserLevelTableName"];

		// UserLevelPermission
		$userlevelpermissions->UserLevelPermission->AdvancedSearch->SearchValue = @$_GET["x_UserLevelPermission"];
		$userlevelpermissions->UserLevelPermission->AdvancedSearch->SearchOperator = @$_GET["z_UserLevelPermission"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevelpermissions;

		// Call Recordset Selecting event
		$userlevelpermissions->Recordset_Selecting($userlevelpermissions->CurrentFilter);

		// Load list page SQL
		$sSql = $userlevelpermissions->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$userlevelpermissions->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevelpermissions;
		$sFilter = $userlevelpermissions->KeyFilter();

		// Call Row Selecting event
		$userlevelpermissions->Row_Selecting($sFilter);

		// Load sql based on filter
		$userlevelpermissions->CurrentFilter = $sFilter;
		$sSql = $userlevelpermissions->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$userlevelpermissions->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $userlevelpermissions;
		$userlevelpermissions->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$userlevelpermissions->UserLevelTableName->setDbValue($rs->fields('UserLevelTableName'));
		$userlevelpermissions->UserLevelPermission->setDbValue($rs->fields('UserLevelPermission'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $userlevelpermissions;

		// Call Row_Rendering event
		$userlevelpermissions->Row_Rendering();

		// Common render codes for all row types
		// UserLevelID

		$userlevelpermissions->UserLevelID->CellCssStyle = "";
		$userlevelpermissions->UserLevelID->CellCssClass = "";

		// UserLevelTableName
		$userlevelpermissions->UserLevelTableName->CellCssStyle = "";
		$userlevelpermissions->UserLevelTableName->CellCssClass = "";

		// UserLevelPermission
		$userlevelpermissions->UserLevelPermission->CellCssStyle = "";
		$userlevelpermissions->UserLevelPermission->CellCssClass = "";
		if ($userlevelpermissions->RowType == EW_ROWTYPE_VIEW) { // View row

			// UserLevelID
			if (strval($userlevelpermissions->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($userlevelpermissions->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$userlevelpermissions->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$userlevelpermissions->UserLevelID->ViewValue = $userlevelpermissions->UserLevelID->CurrentValue;
				}
			} else {
				$userlevelpermissions->UserLevelID->ViewValue = NULL;
			}
			$userlevelpermissions->UserLevelID->CssStyle = "";
			$userlevelpermissions->UserLevelID->CssClass = "";
			$userlevelpermissions->UserLevelID->ViewCustomAttributes = "";

			// UserLevelTableName
			$userlevelpermissions->UserLevelTableName->ViewValue = $userlevelpermissions->UserLevelTableName->CurrentValue;
			$userlevelpermissions->UserLevelTableName->CssStyle = "";
			$userlevelpermissions->UserLevelTableName->CssClass = "";
			$userlevelpermissions->UserLevelTableName->ViewCustomAttributes = "";

			// UserLevelPermission
			$userlevelpermissions->UserLevelPermission->ViewValue = $userlevelpermissions->UserLevelPermission->CurrentValue;
			$userlevelpermissions->UserLevelPermission->CssStyle = "";
			$userlevelpermissions->UserLevelPermission->CssClass = "";
			$userlevelpermissions->UserLevelPermission->ViewCustomAttributes = "";

			// UserLevelID
			$userlevelpermissions->UserLevelID->HrefValue = "";

			// UserLevelTableName
			$userlevelpermissions->UserLevelTableName->HrefValue = "";

			// UserLevelPermission
			$userlevelpermissions->UserLevelPermission->HrefValue = "";
		}

		// Call Row Rendered event
		$userlevelpermissions->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $userlevelpermissions;

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
		global $userlevelpermissions;
		$userlevelpermissions->UserLevelID->AdvancedSearch->SearchValue = $userlevelpermissions->getAdvancedSearch("x_UserLevelID");
		$userlevelpermissions->UserLevelTableName->AdvancedSearch->SearchValue = $userlevelpermissions->getAdvancedSearch("x_UserLevelTableName");
		$userlevelpermissions->UserLevelPermission->AdvancedSearch->SearchValue = $userlevelpermissions->getAdvancedSearch("x_UserLevelPermission");
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
