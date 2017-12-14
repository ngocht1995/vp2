<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "terminfo.php" ?>
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
$term_list = new cterm_list();
$Page =& $term_list;

// Page init processing
$term_list->Page_Init();

// Page main processing
$term_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($term->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var term_list = new ew_Page("term_list");

// page properties
term_list.PageID = "list"; // page ID
var EW_PAGE_ID = term_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
term_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
term_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
term_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
term_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
			var inst;
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.focus();
		}
	}


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
<?php if ($term->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($term->Export == "" && $term->SelectLimit);
	if (!$bSelectLimit)
		$rs = $term_list->LoadRecordset();
	$term_list->lTotalRecs = ($bSelectLimit) ? $term->SelectRecordCount() : $rs->RecordCount();
	$term_list->lStartRec = 1;
	if ($term_list->lDisplayRecs <= 0) // Display all records
		$term_list->lDisplayRecs = $term_list->lTotalRecs;
	if (!($term->ExportAll && $term->Export <> ""))
		$term_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $term_list->LoadRecordset($term_list->lStartRec-1, $term_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý điều lệ sàn giao dịch"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $term_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<form name="ftermlist" id="ftermlist" class="ewForm" action="" method="post">
<?php if ($term_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$term_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$term_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$term_list->lOptionCnt++; // edit
}
	$term_list->lOptionCnt += count($term_list->ListOptions->Items); // Custom list options
?>
<?php echo $term->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($term->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width: 30px;">&nbsp;</td>
<?php } ?>
<?php

// Custom list options
foreach ($term_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($term->term_name->Visible) { // term_name ?>
	<?php if ($term->SortUrl($term->term_name) == "") { ?>
		<td>Tên điều lệ</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $term->SortUrl($term->term_name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên điều lệ</td><td style="width: 10px;"><?php if ($term->term_name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($term->term_name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	
<?php if ($term->term_content->Visible) { // term_content ?>
	<?php if ($term->SortUrl($term->term_content) == "") { ?>
		<td style="white-space: nowrap;">Nội dung điều lệ</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $term->SortUrl($term->term_content) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Nội dung điều lệ</td><td style="width: 10px;"><?php if ($term->term_content->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($term->term_content->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
</tr>
</thead>
<?php
if ($term->ExportAll && $term->Export <> "") {
	$term_list->lStopRec = $term_list->lTotalRecs;
} else {
	$term_list->lStopRec = $term_list->lStartRec + $term_list->lDisplayRecs - 1; // Set the last record to display
}
$term_list->lRecCount = $term_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$term->SelectLimit && $term_list->lStartRec > 1)
		$rs->Move($term_list->lStartRec - 1);
}
$term_list->lRowCnt = 0;
while (($term->CurrentAction == "gridadd" || !$rs->EOF) &&
	$term_list->lRecCount < $term_list->lStopRec) {
	$term_list->lRecCount++;
	if (intval($term_list->lRecCount) >= intval($term_list->lStartRec)) {
		$term_list->lRowCnt++;

	// Init row class and style
	$term->CssClass = "";
	$term->CssStyle = "";
	$term->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($term->CurrentAction == "gridadd") {
		$term_list->LoadDefaultValues(); // Load default values
	} else {
		$term_list->LoadRowValues($rs); // Load row values
	}
	$term->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$term_list->RenderRow();
?>
	<tr<?php echo $term->RowAttributes() ?>>
<?php if ($term->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $term->ViewUrl() ?>"><?php echo Lang_Text("Xem"); ?></a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $term->EditUrl() ?>"><?php echo Lang_Text("Sửa"); ?></a>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($term_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
        <?php if ($term->term_name->Visible) { // term_name ?>
		<td<?php echo $term->term_name->CellAttributes() ?>>
<div<?php echo $term->term_name->ViewAttributes() ?>><?php echo  Lang_Text($term->term_name->ListViewValue()) ?></div>
</td>
	<?php } ?>
	<?php if ($term->term_content->Visible) { // term_content ?>
		<td<?php echo $term->term_content->CellAttributes() ?>>
<div<?php echo $term->term_content->ViewAttributes() ?>><?php echo  ew_TruncateMemo(strip_tags($term->term_content->ViewValue,'<p>,<img>,<br>'),150) ?></div>
</td>
	<?php } ?>
</tr>
<?php
	}
	if ($term->CurrentAction <> "gridadd")
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
</td></tr></table>
<?php if ($term->Export == "" && $term->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(term_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($term->Export == "") { ?>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

//-->
</script>
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
class cterm_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'term';

	// Page Object Name
	var $PageObjName = 'term_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $term;
		if ($term->UseTokenInUrl) $PageUrl .= "t=" . $term->TableVar . "&"; // add page token
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
		global $objForm, $term;
		if ($term->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($term->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($term->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cterm_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["term"] = new cterm();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'term', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $term;
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
	$term->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $term->Export; // Get export parameter, used in header
	$gsExportFile = $term->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $term;
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
		if ($term->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $term->getRecordsPerPage(); // Restore from Session
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
		$term->setSessionWhere($sFilter);
		$term->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $term;
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
			$term->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$term->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $term;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$term->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$term->CurrentOrderType = @$_GET["ordertype"];
			$term->UpdateSort($term->term_content); // Field 
			$term->UpdateSort($term->term_name); // Field 
			$term->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $term;
		$sOrderBy = $term->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($term->SqlOrderBy() <> "") {
				$sOrderBy = $term->SqlOrderBy();
				$term->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $term;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$term->setSessionOrderBy($sOrderBy);
				$term->term_content->setSort("");
				$term->term_name->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$term->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $term;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$term->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$term->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $term->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$term->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$term->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$term->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $term;

		// Call Recordset Selecting event
		$term->Recordset_Selecting($term->CurrentFilter);

		// Load list page SQL
		$sSql = $term->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$term->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $term;
		$sFilter = $term->KeyFilter();

		// Call Row Selecting event
		$term->Row_Selecting($sFilter);

		// Load sql based on filter
		$term->CurrentFilter = $sFilter;
		$sSql = $term->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$term->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $term;
		$term->term_id->setDbValue($rs->fields('term_id'));
		$term->term_content->setDbValue($rs->fields('term_content'));
		$term->term_name->setDbValue($rs->fields('term_name'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $term;

		// Call Row_Rendering event
		$term->Row_Rendering();

		// Common render codes for all row types
		// term_content

		$term->term_content->CellCssStyle = "white-space: nowrap;";
		$term->term_content->CellCssClass = "";

		// term_name
		$term->term_name->CellCssStyle = "";
		$term->term_name->CellCssClass = "";
		if ($term->RowType == EW_ROWTYPE_VIEW) { // View row

			// term_content
			$term->term_content->ViewValue = $term->term_content->CurrentValue;
			$term->term_content->CssStyle = "";
			$term->term_content->CssClass = "";
			$term->term_content->ViewCustomAttributes = "";

			// term_name
			$term->term_name->ViewValue = $term->term_name->CurrentValue;
			$term->term_name->CssStyle = "";
			$term->term_name->CssClass = "";
			$term->term_name->ViewCustomAttributes = "";

			// term_content
			$term->term_content->HrefValue = "";

			// term_name
			$term->term_name->HrefValue = "";
		}

		// Call Row Rendered event
		$term->Row_Rendered();
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
