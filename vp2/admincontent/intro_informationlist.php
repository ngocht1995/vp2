<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_informationinfo.php" ?>
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
$intro_information_list = new cintro_information_list();
$Page =& $intro_information_list;

// Page init processing
$intro_information_list->Page_Init();

// Page main processing
$intro_information_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($intro_information->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var intro_information_list = new ew_Page("intro_information_list");

// page properties
intro_information_list.PageID = "list"; // page ID
var EW_PAGE_ID = intro_information_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
intro_information_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_information_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_information_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_information_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($intro_information->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($intro_information->Export == "" && $intro_information->SelectLimit);
	if (!$bSelectLimit)
		$rs = $intro_information_list->LoadRecordset();
	$intro_information_list->lTotalRecs = ($bSelectLimit) ? $intro_information->SelectRecordCount() : $rs->RecordCount();
	$intro_information_list->lStartRec = 1;
	if ($intro_information_list->lDisplayRecs <= 0) // Display all records
		$intro_information_list->lDisplayRecs = $intro_information_list->lTotalRecs;
	if (!($intro_information->ExportAll && $intro_information->Export <> ""))
		$intro_information_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $intro_information_list->LoadRecordset($intro_information_list->lStartRec-1, $intro_information_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">CUSTOM VIEW: Thong Tin Canhan
</span></p>
<?php $intro_information_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($intro_information->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($intro_information->CurrentAction <> "gridadd" && $intro_information->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_information_list->Pager)) $intro_information_list->Pager = new cNumericPager($intro_information_list->lStartRec, $intro_information_list->lDisplayRecs, $intro_information_list->lTotalRecs, $intro_information_list->lRecRange) ?>
<?php if ($intro_information_list->Pager->RecordCount > 0) { ?>
	<?php if ($intro_information_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_information_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $intro_information_list->Pager->FromIndex ?> to <?php echo $intro_information_list->Pager->ToIndex ?> of <?php echo $intro_information_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_information_list->sSrchWhere == "0=101") { ?>
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
<?php if ($intro_information_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="intro_information">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($intro_information_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($intro_information_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($intro_information_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($intro_information->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fintro_informationlist" id="fintro_informationlist" class="ewForm" action="" method="post">
<?php if ($intro_information_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$intro_information_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$intro_information_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$intro_information_list->lOptionCnt++; // edit
}
	$intro_information_list->lOptionCnt += count($intro_information_list->ListOptions->Items); // Custom list options
?>
<?php echo $intro_information->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($intro_information->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php

// Custom list options
foreach ($intro_information_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
	</tr>
</thead>
<?php
if ($intro_information->ExportAll && $intro_information->Export <> "") {
	$intro_information_list->lStopRec = $intro_information_list->lTotalRecs;
} else {
	$intro_information_list->lStopRec = $intro_information_list->lStartRec + $intro_information_list->lDisplayRecs - 1; // Set the last record to display
}
$intro_information_list->lRecCount = $intro_information_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$intro_information->SelectLimit && $intro_information_list->lStartRec > 1)
		$rs->Move($intro_information_list->lStartRec - 1);
}
$intro_information_list->lRowCnt = 0;
while (($intro_information->CurrentAction == "gridadd" || !$rs->EOF) &&
	$intro_information_list->lRecCount < $intro_information_list->lStopRec) {
	$intro_information_list->lRecCount++;
	if (intval($intro_information_list->lRecCount) >= intval($intro_information_list->lStartRec)) {
		$intro_information_list->lRowCnt++;

	// Init row class and style
	$intro_information->CssClass = "";
	$intro_information->CssStyle = "";
	$intro_information->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($intro_information->CurrentAction == "gridadd") {
		$intro_information_list->LoadDefaultValues(); // Load default values
	} else {
		$intro_information_list->LoadRowValues($rs); // Load row values
	}
	$intro_information->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$intro_information_list->RenderRow();
?>
	<tr<?php echo $intro_information->RowAttributes() ?>>
<?php if ($intro_information->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($intro_information_list->ShowOptionLink()) { ?>
<a href="<?php echo $intro_information->ViewUrl() ?>">View</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($intro_information_list->ShowOptionLink()) { ?>
<a href="<?php echo $intro_information->EditUrl() ?>">Edit</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php

// Custom list options
foreach ($intro_information_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	</tr>
<?php
	}
	if ($intro_information->CurrentAction <> "gridadd")
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
<?php if ($intro_information_list->lTotalRecs > 0) { ?>
<?php if ($intro_information->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($intro_information->CurrentAction <> "gridadd" && $intro_information->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_information_list->Pager)) $intro_information_list->Pager = new cNumericPager($intro_information_list->lStartRec, $intro_information_list->lDisplayRecs, $intro_information_list->lTotalRecs, $intro_information_list->lRecRange) ?>
<?php if ($intro_information_list->Pager->RecordCount > 0) { ?>
	<?php if ($intro_information_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_information_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_information_list->PageUrl() ?>start=<?php echo $intro_information_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $intro_information_list->Pager->FromIndex ?> to <?php echo $intro_information_list->Pager->ToIndex ?> of <?php echo $intro_information_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_information_list->sSrchWhere == "0=101") { ?>
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
<?php if ($intro_information_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="intro_information">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($intro_information_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($intro_information_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($intro_information_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($intro_information->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($intro_information_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($intro_information->Export == "" && $intro_information->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(intro_information_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($intro_information->Export == "") { ?>
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
class cintro_information_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'intro_information';

	// Page Object Name
	var $PageObjName = 'intro_information_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_information;
		if ($intro_information->UseTokenInUrl) $PageUrl .= "t=" . $intro_information->TableVar . "&"; // add page token
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
		global $objForm, $intro_information;
		if ($intro_information->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_information->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_information->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_information_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_information"] = new cintro_information();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_information', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_information;
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
	$intro_information->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $intro_information->Export; // Get export parameter, used in header
	$gsExportFile = $intro_information->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $intro_information;
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
		if ($intro_information->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $intro_information->getRecordsPerPage(); // Restore from Session
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
		$intro_information->setSessionWhere($sFilter);
		$intro_information->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $intro_information;
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
			$intro_information->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$intro_information->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $intro_information;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$intro_information->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$intro_information->CurrentOrderType = @$_GET["ordertype"];
			$intro_information->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $intro_information;
		$sOrderBy = $intro_information->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($intro_information->SqlOrderBy() <> "") {
				$sOrderBy = $intro_information->SqlOrderBy();
				$intro_information->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $intro_information;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$intro_information->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->lStartRec = 1;
			$intro_information->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $intro_information;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$intro_information->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$intro_information->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $intro_information->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$intro_information->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$intro_information->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$intro_information->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $intro_information;

		// Call Recordset Selecting event
		$intro_information->Recordset_Selecting($intro_information->CurrentFilter);

		// Load list page SQL
		$sSql = $intro_information->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$intro_information->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_information;
		$sFilter = $intro_information->KeyFilter();

		// Call Row Selecting event
		$intro_information->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_information->CurrentFilter = $sFilter;
		$sSql = $intro_information->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_information->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_information;
		$intro_information->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$intro_information->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$intro_information->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_information;

		// Call Row_Rendering event
		$intro_information->Row_Rendering();

		// Common render codes for all row types
		if ($intro_information->RowType == EW_ROWTYPE_VIEW) { // View row
		}

		// Call Row Rendered event
		$intro_information->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $intro_information;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($intro_information->nguoidung_id->CurrentValue);
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
