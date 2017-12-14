<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_setting_aws_quesinfo.php" ?>
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
$t_setting_aws_ques_view = new ct_setting_aws_ques_view();
$Page =& $t_setting_aws_ques_view;

// Page init processing
$t_setting_aws_ques_view->Page_Init();

// Page main processing
$t_setting_aws_ques_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_setting_aws_ques->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_aws_ques_view = new ew_Page("t_setting_aws_ques_view");

// page properties
t_setting_aws_ques_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_setting_aws_ques_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_setting_aws_ques_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_aws_ques_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_aws_ques_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_aws_ques_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: T Setting Aws Ques
<?php if ($t_setting_aws_ques->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>export=print&id=<?php echo ew_HtmlEncode($t_setting_aws_ques->id->CurrentValue) ?>">Printer Friendly</a>
&nbsp;&nbsp;<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>export=excel&id=<?php echo ew_HtmlEncode($t_setting_aws_ques->id->CurrentValue) ?>">Export to Excel</a>
&nbsp;&nbsp;<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>export=word&id=<?php echo ew_HtmlEncode($t_setting_aws_ques->id->CurrentValue) ?>">Export to Word</a>
<?php } ?>
<br><br>
<?php if ($t_setting_aws_ques->Export == "") { ?>
<a href="t_setting_aws_queslist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting_aws_ques->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_setting_aws_ques->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting_aws_ques->CopyUrl() ?>">Copy</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $t_setting_aws_ques->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $t_setting_aws_ques_view->ShowMessage() ?>
<p>
<?php if ($t_setting_aws_ques->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_aws_ques_view->Pager)) $t_setting_aws_ques_view->Pager = new cNumericPager($t_setting_aws_ques_view->lStartRec, $t_setting_aws_ques_view->lDisplayRecs, $t_setting_aws_ques_view->lTotalRecs, $t_setting_aws_ques_view->lRecRange) ?>
<?php if ($t_setting_aws_ques_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_aws_ques_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_aws_ques_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_aws_ques_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_setting_aws_ques->id->Visible) { // id ?>
	<tr<?php echo $t_setting_aws_ques->id->RowAttributes ?>>
		<td class="ewTableHeader">Id</td>
		<td<?php echo $t_setting_aws_ques->id->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->id->ViewAttributes() ?>><?php echo $t_setting_aws_ques->id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting_aws_ques->year->Visible) { // year ?>
	<tr<?php echo $t_setting_aws_ques->year->RowAttributes ?>>
		<td class="ewTableHeader">Year</td>
		<td<?php echo $t_setting_aws_ques->year->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->year->ViewAttributes() ?>><?php echo $t_setting_aws_ques->year->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting_aws_ques->type_setting->Visible) { // type_setting ?>
	<tr<?php echo $t_setting_aws_ques->type_setting->RowAttributes ?>>
		<td class="ewTableHeader">Type Setting</td>
		<td<?php echo $t_setting_aws_ques->type_setting->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->type_setting->ViewAttributes() ?>><?php echo $t_setting_aws_ques->type_setting->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting_aws_ques->datetime->Visible) { // datetime ?>
	<tr<?php echo $t_setting_aws_ques->datetime->RowAttributes ?>>
		<td class="ewTableHeader">Datetime</td>
		<td<?php echo $t_setting_aws_ques->datetime->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->datetime->ViewAttributes() ?>><?php echo $t_setting_aws_ques->datetime->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting_aws_ques->active->Visible) { // active ?>
	<tr<?php echo $t_setting_aws_ques->active->RowAttributes ?>>
		<td class="ewTableHeader">Active</td>
		<td<?php echo $t_setting_aws_ques->active->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->active->ViewAttributes() ?>><?php echo $t_setting_aws_ques->active->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_setting_aws_ques->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_aws_ques_view->Pager)) $t_setting_aws_ques_view->Pager = new cNumericPager($t_setting_aws_ques_view->lStartRec, $t_setting_aws_ques_view->lDisplayRecs, $t_setting_aws_ques_view->lTotalRecs, $t_setting_aws_ques_view->lRecRange) ?>
<?php if ($t_setting_aws_ques_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_aws_ques_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_aws_ques_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_view->PageUrl() ?>start=<?php echo $t_setting_aws_ques_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_aws_ques_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_setting_aws_ques->Export == "") { ?>
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
class ct_setting_aws_ques_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_setting_aws_ques';

	// Page Object Name
	var $PageObjName = 't_setting_aws_ques_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) $PageUrl .= "t=" . $t_setting_aws_ques->TableVar . "&"; // add page token
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
		global $objForm, $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting_aws_ques->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting_aws_ques->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_aws_ques_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting_aws_ques"] = new ct_setting_aws_ques();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting_aws_ques', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting_aws_ques;
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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_setting_aws_queslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$t_setting_aws_ques->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_setting_aws_ques->Export; // Get export parameter, used in header
	$gsExportFile = $t_setting_aws_ques->TableVar; // Get export file, used in header
	if (@$_GET["id"] <> "") {
		if ($gsExportFile <> "") $gsExportFile .= "_";
		$gsExportFile .= ew_StripSlashes($_GET["id"]);
	}
	if ($t_setting_aws_ques->Export == "print" || $t_setting_aws_ques->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_setting_aws_ques->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_setting_aws_ques->Export == "word") {
		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
	}

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
	var $lRecCnt;

	//
	// Page main processing
	//
	function Page_Main() {
		global $t_setting_aws_ques;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["id"] <> "") {
				$t_setting_aws_ques->id->setQueryStringValue($_GET["id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_setting_aws_ques->CurrentAction = "I"; // Display form
			switch ($t_setting_aws_ques->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_setting_aws_queslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_setting_aws_ques->id->CurrentValue) == strval($rs->fields('id'))) {
								$t_setting_aws_ques->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("No records found"); // Set no record message
						$sReturnUrl = "t_setting_aws_queslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if ($t_setting_aws_ques->Export == "html" || $t_setting_aws_ques->Export == "csv" ||
				$t_setting_aws_ques->Export == "word" || $t_setting_aws_ques->Export == "excel" ||
				$t_setting_aws_ques->Export == "xml") {
				$this->ExportData();
				$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_setting_aws_queslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_setting_aws_ques->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_setting_aws_ques;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_setting_aws_ques->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_setting_aws_ques;

		// Call Recordset Selecting event
		$t_setting_aws_ques->Recordset_Selecting($t_setting_aws_ques->CurrentFilter);

		// Load list page SQL
		$sSql = $t_setting_aws_ques->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_setting_aws_ques->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting_aws_ques;
		$sFilter = $t_setting_aws_ques->KeyFilter();

		// Call Row Selecting event
		$t_setting_aws_ques->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting_aws_ques->CurrentFilter = $sFilter;
		$sSql = $t_setting_aws_ques->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting_aws_ques->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting_aws_ques;
		$t_setting_aws_ques->id->setDbValue($rs->fields('id'));
		$t_setting_aws_ques->year->setDbValue($rs->fields('year'));
		$t_setting_aws_ques->type_setting->setDbValue($rs->fields('type_setting'));
		$t_setting_aws_ques->datetime->setDbValue($rs->fields('datetime'));
		$t_setting_aws_ques->active->setDbValue($rs->fields('active'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting_aws_ques;

		// Call Row_Rendering event
		$t_setting_aws_ques->Row_Rendering();

		// Common render codes for all row types
		// id

		$t_setting_aws_ques->id->CellCssStyle = "";
		$t_setting_aws_ques->id->CellCssClass = "";

		// year
		$t_setting_aws_ques->year->CellCssStyle = "";
		$t_setting_aws_ques->year->CellCssClass = "";

		// type_setting
		$t_setting_aws_ques->type_setting->CellCssStyle = "";
		$t_setting_aws_ques->type_setting->CellCssClass = "";

		// datetime
		$t_setting_aws_ques->datetime->CellCssStyle = "";
		$t_setting_aws_ques->datetime->CellCssClass = "";

		// active
		$t_setting_aws_ques->active->CellCssStyle = "";
		$t_setting_aws_ques->active->CellCssClass = "";
		if ($t_setting_aws_ques->RowType == EW_ROWTYPE_VIEW) { // View row

			// id
			$t_setting_aws_ques->id->ViewValue = $t_setting_aws_ques->id->CurrentValue;
			$t_setting_aws_ques->id->CssStyle = "";
			$t_setting_aws_ques->id->CssClass = "";
			$t_setting_aws_ques->id->ViewCustomAttributes = "";

			// year
			if (strval($t_setting_aws_ques->year->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->year->CurrentValue) {
					case "1":
						$t_setting_aws_ques->year->ViewValue = "2015";
						break;
					case "2":
						$t_setting_aws_ques->year->ViewValue = "2016";
						break;
					case "3":
						$t_setting_aws_ques->year->ViewValue = "2017";
						break;
					case "4":
						$t_setting_aws_ques->year->ViewValue = "2018";
						break;
					case "5":
						$t_setting_aws_ques->year->ViewValue = "2019";
						break;
					default:
						$t_setting_aws_ques->year->ViewValue = $t_setting_aws_ques->year->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->year->ViewValue = NULL;
			}
			$t_setting_aws_ques->year->CssStyle = "";
			$t_setting_aws_ques->year->CssClass = "";
			$t_setting_aws_ques->year->ViewCustomAttributes = "";

			// type_setting
			if (strval($t_setting_aws_ques->type_setting->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->type_setting->CurrentValue) {
					case "1":
						$t_setting_aws_ques->type_setting->ViewValue = "Thiet lap thoi gian khoa he thong dat cau hoi";
						break;
					case "2":
						$t_setting_aws_ques->type_setting->ViewValue = "Thiet lap thoi gian hen tra loi he thong";
						break;
					default:
						$t_setting_aws_ques->type_setting->ViewValue = $t_setting_aws_ques->type_setting->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->type_setting->ViewValue = NULL;
			}
			$t_setting_aws_ques->type_setting->CssStyle = "";
			$t_setting_aws_ques->type_setting->CssClass = "";
			$t_setting_aws_ques->type_setting->ViewCustomAttributes = "";

			// datetime
			$t_setting_aws_ques->datetime->ViewValue = $t_setting_aws_ques->datetime->CurrentValue;
			$t_setting_aws_ques->datetime->CssStyle = "";
			$t_setting_aws_ques->datetime->CssClass = "";
			$t_setting_aws_ques->datetime->ViewCustomAttributes = "";

			// active
			if (strval($t_setting_aws_ques->active->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->active->CurrentValue) {
					case "0":
						$t_setting_aws_ques->active->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_setting_aws_ques->active->ViewValue = "Kich hoat";
						break;
					default:
						$t_setting_aws_ques->active->ViewValue = $t_setting_aws_ques->active->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->active->ViewValue = NULL;
			}
			$t_setting_aws_ques->active->CssStyle = "";
			$t_setting_aws_ques->active->CssClass = "";
			$t_setting_aws_ques->active->ViewCustomAttributes = "";

			// id
			$t_setting_aws_ques->id->HrefValue = "";

			// year
			$t_setting_aws_ques->year->HrefValue = "";

			// type_setting
			$t_setting_aws_ques->type_setting->HrefValue = "";

			// datetime
			$t_setting_aws_ques->datetime->HrefValue = "";

			// active
			$t_setting_aws_ques->active->HrefValue = "";
		}

		// Call Row Rendered event
		$t_setting_aws_ques->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_setting_aws_ques;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "v";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->lDisplayRecs < 0) {
				$this->lStopRec = $this->lTotalRecs;
			} else {
				$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
			}
		if ($t_setting_aws_ques->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_setting_aws_ques->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_setting_aws_ques->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'id', $t_setting_aws_ques->Export);
				ew_ExportAddValue($sExportStr, 'year', $t_setting_aws_ques->Export);
				ew_ExportAddValue($sExportStr, 'type_setting', $t_setting_aws_ques->Export);
				ew_ExportAddValue($sExportStr, 'active', $t_setting_aws_ques->Export);
				echo ew_ExportLine($sExportStr, $t_setting_aws_ques->Export);
			}
		}

		// Move to first record
		$this->lRecCnt = $this->lStartRec - 1;
		if (!$rs->EOF) {
			$rs->MoveFirst();
			$rs->Move($this->lStartRec - 1);
		}
		while (!$rs->EOF && $this->lRecCnt < $this->lStopRec) {
			$this->lRecCnt++;
			if (intval($this->lRecCnt) >= intval($this->lStartRec)) {
				$this->LoadRowValues($rs);

				// Render row for display
				$t_setting_aws_ques->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_setting_aws_ques->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('id', $t_setting_aws_ques->id->CurrentValue);
					$XmlDoc->AddField('year', $t_setting_aws_ques->year->CurrentValue);
					$XmlDoc->AddField('type_setting', $t_setting_aws_ques->type_setting->CurrentValue);
					$XmlDoc->AddField('active', $t_setting_aws_ques->active->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_setting_aws_ques->Export <> "csv") { // Vertical format
						echo ew_ExportField('id', $t_setting_aws_ques->id->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportField('year', $t_setting_aws_ques->year->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportField('type_setting', $t_setting_aws_ques->type_setting->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportField('active', $t_setting_aws_ques->active->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->id->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->year->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->type_setting->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->active->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportLine($sExportStr, $t_setting_aws_ques->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_setting_aws_ques->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_setting_aws_ques->Export);
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
}
?>
