<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "footerinfo.php" ?>
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
$footer_list = new cfooter_list();
$Page =& $footer_list;

// Page init processing
$footer_list->Page_Init();

// Page main processing
$footer_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($footer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var footer_list = new ew_Page("footer_list");

// page properties
footer_list.PageID = "list"; // page ID
var EW_PAGE_ID = footer_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
footer_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
footer_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
footer_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($footer->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($footer->Export == "" && $footer->SelectLimit);
	if (!$bSelectLimit)
		$rs = $footer_list->LoadRecordset();
	$footer_list->lTotalRecs = ($bSelectLimit) ? $footer->SelectRecordCount() : $rs->RecordCount();
	$footer_list->lStartRec = 1;
	if ($footer_list->lDisplayRecs <= 0) // Display all records
		$footer_list->lDisplayRecs = $footer_list->lTotalRecs;
	if (!($footer->ExportAll && $footer->Export <> ""))
		$footer_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $footer_list->LoadRecordset($footer_list->lStartRec-1, $footer_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">TABLE: Footer
</span></p>
<?php $footer_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<form name="ffooterlist" id="ffooterlist" class="ewForm" action="" method="post">
<?php if ($footer_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$footer_list->lOptionCnt = 0;
	$footer_list->lOptionCnt++; // view
	$footer_list->lOptionCnt++; // edit
	$footer_list->lOptionCnt += count($footer_list->ListOptions->Items); // Custom list options
?>
<?php echo $footer->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($footer->footer_id->Visible) { // footer_id ?>
	<?php if ($footer->SortUrl($footer->footer_id) == "") { ?>
		<td style="white-space: nowrap;">Footer Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $footer->SortUrl($footer->footer_id) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Footer Id</td><td style="width: 10px;"><?php if ($footer->footer_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($footer->footer_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($footer->noi_dung->Visible) { // noi_dung ?>
	<?php if ($footer->SortUrl($footer->noi_dung) == "") { ?>
		<td style="white-space: nowrap;">Noi Dung</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $footer->SortUrl($footer->noi_dung) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Noi Dung</td><td style="width: 10px;"><?php if ($footer->noi_dung->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($footer->noi_dung->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($footer->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<?php

// Custom list options
foreach ($footer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
	</tr>
</thead>
<?php
if ($footer->ExportAll && $footer->Export <> "") {
	$footer_list->lStopRec = $footer_list->lTotalRecs;
} else {
	$footer_list->lStopRec = $footer_list->lStartRec + $footer_list->lDisplayRecs - 1; // Set the last record to display
}
$footer_list->lRecCount = $footer_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$footer->SelectLimit && $footer_list->lStartRec > 1)
		$rs->Move($footer_list->lStartRec - 1);
}
$footer_list->lRowCnt = 0;
while (($footer->CurrentAction == "gridadd" || !$rs->EOF) &&
	$footer_list->lRecCount < $footer_list->lStopRec) {
	$footer_list->lRecCount++;
	if (intval($footer_list->lRecCount) >= intval($footer_list->lStartRec)) {
		$footer_list->lRowCnt++;

	// Init row class and style
	$footer->CssClass = "";
	$footer->CssStyle = "";
	$footer->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($footer->CurrentAction == "gridadd") {
		$footer_list->LoadDefaultValues(); // Load default values
	} else {
		$footer_list->LoadRowValues($rs); // Load row values
	}
	$footer->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$footer_list->RenderRow();
?>
	<tr<?php echo $footer->RowAttributes() ?>>
	<?php if ($footer->footer_id->Visible) { // footer_id ?>
		<td<?php echo $footer->footer_id->CellAttributes() ?>>
<div<?php echo $footer->footer_id->ViewAttributes() ?>><?php echo $footer->footer_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($footer->noi_dung->Visible) { // noi_dung ?>
		<td<?php echo $footer->noi_dung->CellAttributes() ?>>
<div<?php echo $footer->noi_dung->ViewAttributes() ?>><?php echo $footer->noi_dung->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php if ($footer->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $footer->ViewUrl() ?>">View</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $footer->EditUrl() ?>">Edit</a>
</span></td>
<?php

// Custom list options
foreach ($footer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	</tr>
<?php
	}
	if ($footer->CurrentAction <> "gridadd")
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
<?php if ($footer->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($footer->CurrentAction <> "gridadd" && $footer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($footer_list->Pager)) $footer_list->Pager = new cPrevNextPager($footer_list->lStartRec, $footer_list->lDisplayRecs, $footer_list->lTotalRecs) ?>
<?php if ($footer_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Page&nbsp;</span></td>
<!--first page button-->
	<?php if ($footer_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $footer_list->PageUrl() ?>start=<?php echo $footer_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($footer_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $footer_list->PageUrl() ?>start=<?php echo $footer_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $footer_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($footer_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $footer_list->PageUrl() ?>start=<?php echo $footer_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($footer_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $footer_list->PageUrl() ?>start=<?php echo $footer_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;of <?php echo $footer_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker">Records <?php echo $footer_list->Pager->FromIndex ?> to <?php echo $footer_list->Pager->ToIndex ?> of <?php echo $footer_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($footer_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Please enter search criteria</span>
	<?php } else { ?>
	<span class="phpmaker">Không có dữ liệu</span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($footer_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $footer->AddUrl() ?>">Add</a>&nbsp;&nbsp;
</span>
<?php //} ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($footer->Export == "" && $footer->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(footer_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($footer->Export == "") { ?>
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
class cfooter_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'footer';

	// Page Object Name
	var $PageObjName = 'footer_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $footer;
		if ($footer->UseTokenInUrl) $PageUrl .= "t=" . $footer->TableVar . "&"; // add page token
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
		global $objForm, $footer;
		if ($footer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($footer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($footer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cfooter_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["footer"] = new cfooter();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'footer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $footer;
	$footer->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $footer->Export; // Get export parameter, used in header
	$gsExportFile = $footer->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $footer;
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

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($footer->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $footer->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$footer->setSessionWhere($sFilter);
		$footer->CurrentFilter = "";
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $footer;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$footer->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$footer->CurrentOrderType = @$_GET["ordertype"];
			$footer->UpdateSort($footer->footer_id); // Field 
			$footer->UpdateSort($footer->noi_dung); // Field 
			$footer->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $footer;
		$sOrderBy = $footer->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($footer->SqlOrderBy() <> "") {
				$sOrderBy = $footer->SqlOrderBy();
				$footer->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $footer;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$footer->setSessionOrderBy($sOrderBy);
				$footer->footer_id->setSort("");
				$footer->noi_dung->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$footer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $footer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$footer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$footer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $footer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$footer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$footer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$footer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $footer;

		// Call Recordset Selecting event
		$footer->Recordset_Selecting($footer->CurrentFilter);

		// Load list page SQL
		$sSql = $footer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$footer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $footer;
		$sFilter = $footer->KeyFilter();

		// Call Row Selecting event
		$footer->Row_Selecting($sFilter);

		// Load sql based on filter
		$footer->CurrentFilter = $sFilter;
		$sSql = $footer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$footer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $footer;
		$footer->footer_id->setDbValue($rs->fields('footer_id'));
		$footer->noi_dung->setDbValue($rs->fields('noi_dung'));
		$footer->f_value->setDbValue($rs->fields('f_value'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $footer;

		// Call Row_Rendering event
		$footer->Row_Rendering();

		// Common render codes for all row types
		// footer_id

		$footer->footer_id->CellCssStyle = "white-space: nowrap;";
		$footer->footer_id->CellCssClass = "";

		// noi_dung
		$footer->noi_dung->CellCssStyle = "white-space: nowrap;";
		$footer->noi_dung->CellCssClass = "";
		if ($footer->RowType == EW_ROWTYPE_VIEW) { // View row

			// footer_id
			$footer->footer_id->ViewValue = $footer->footer_id->CurrentValue;
			$footer->footer_id->CssStyle = "";
			$footer->footer_id->CssClass = "";
			$footer->footer_id->ViewCustomAttributes = "";

			// noi_dung
			$footer->noi_dung->ViewValue = $footer->noi_dung->CurrentValue;
			$footer->noi_dung->CssStyle = "";
			$footer->noi_dung->CssClass = "";
			$footer->noi_dung->ViewCustomAttributes = "";

			// footer_id
			$footer->footer_id->HrefValue = "";

			// noi_dung
			$footer->noi_dung->HrefValue = "";
		}

		// Call Row Rendered event
		$footer->Row_Rendered();
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
