<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_question_groupinfo.php" ?>
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
$t_question_group_view = new ct_question_group_view();
$Page =& $t_question_group_view;

// Page init processing
$t_question_group_view->Page_Init();

// Page main processing
$t_question_group_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_question_group->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_group_view = new ew_Page("t_question_group_view");

// page properties
t_question_group_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_question_group_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_question_group_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_group_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_group_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_group_view.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $t_question_group->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nhóm câu hỏi</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>
<br/>
<?php if ($t_question_group->Export == "") { ?>

<a href="<?php echo $t_question_group->AddUrl() ?>">Thêm</a>&nbsp;
<a href="<?php echo $t_question_group->EditUrl() ?>">Sửa</a>&nbsp;
<a href="<?php echo $t_question_group->CopyUrl() ?>">Sao chép</a>&nbsp;
<a href="<?php echo $t_question_group->DeleteUrl() ?>">Xóa</a>&nbsp;
<?php } ?>
</span></p>
<?php $t_question_group_view->ShowMessage() ?>
<p>
<?php if ($t_question_group->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_group_view->Pager)) $t_question_group_view->Pager = new cNumericPager($t_question_group_view->lStartRec, $t_question_group_view->lDisplayRecs, $t_question_group_view->lTotalRecs, $t_question_group_view->lRecRange) ?>
<?php if ($t_question_group_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_group_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_group_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_question_group_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có bản ghi được tìm thấy
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
<?php if ($t_question_group->ID->Visible) { // ID ?>
	<tr<?php echo $t_question_group->ID->RowAttributes ?>>
		<td class="ewTableHeader">Mã nhóm</td>
		<td<?php echo $t_question_group->ID->CellAttributes() ?>>
<div<?php echo $t_question_group->ID->ViewAttributes() ?>><?php echo $t_question_group->ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question_group->NAME->Visible) { // NAME ?>
	<tr<?php echo $t_question_group->NAME->RowAttributes ?>>
		<td class="ewTableHeader">Tên nhóm</td>
		<td<?php echo $t_question_group->NAME->CellAttributes() ?>>
<div<?php echo $t_question_group->NAME->ViewAttributes() ?>><?php echo $t_question_group->NAME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question_group->Description->Visible) { // Description ?>
	<tr<?php echo $t_question_group->Description->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả</td>
		<td<?php echo $t_question_group->Description->CellAttributes() ?>>
<div<?php echo $t_question_group->Description->ViewAttributes() ?>><?php echo $t_question_group->Description->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_question_group->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_group_view->Pager)) $t_question_group_view->Pager = new cNumericPager($t_question_group_view->lStartRec, $t_question_group_view->lDisplayRecs, $t_question_group_view->lTotalRecs, $t_question_group_view->lRecRange) ?>
<?php if ($t_question_group_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_group_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_group_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_view->PageUrl() ?>start=<?php echo $t_question_group_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_question_group_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_question_group->Export == "") { ?>
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
class ct_question_group_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_question_group';

	// Page Object Name
	var $PageObjName = 't_question_group_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question_group;
		if ($t_question_group->UseTokenInUrl) $PageUrl .= "t=" . $t_question_group->TableVar . "&"; // add page token
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
		global $objForm, $t_question_group;
		if ($t_question_group->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question_group->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question_group->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_group_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question_group"] = new ct_question_group();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question_group', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question_group;
	$t_question_group->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_question_group->Export; // Get export parameter, used in header
	$gsExportFile = $t_question_group->TableVar; // Get export file, used in header
	if (@$_GET["ID"] <> "") {
		if ($gsExportFile <> "") $gsExportFile .= "_";
		$gsExportFile .= ew_StripSlashes($_GET["ID"]);
	}
	if ($t_question_group->Export == "print" || $t_question_group->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_question_group->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_question_group->Export == "word") {
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
		global $t_question_group;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["ID"] <> "") {
				$t_question_group->ID->setQueryStringValue($_GET["ID"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_question_group->CurrentAction = "I"; // Display form
			switch ($t_question_group->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_question_grouplist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_question_group->ID->CurrentValue) == strval($rs->fields('ID'))) {
								$t_question_group->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_question_grouplist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if ($t_question_group->Export == "html" || $t_question_group->Export == "csv" ||
				$t_question_group->Export == "word" || $t_question_group->Export == "excel" ||
				$t_question_group->Export == "xml") {
				$this->ExportData();
				$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_question_grouplist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_question_group->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_question_group;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_question_group->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_question_group->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_question_group->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_question_group->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_question_group->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_question_group->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_question_group;

		// Call Recordset Selecting event
		$t_question_group->Recordset_Selecting($t_question_group->CurrentFilter);

		// Load list page SQL
		$sSql = $t_question_group->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_question_group->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question_group;
		$sFilter = $t_question_group->KeyFilter();

		// Call Row Selecting event
		$t_question_group->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question_group->CurrentFilter = $sFilter;
		$sSql = $t_question_group->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question_group->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question_group;
		$t_question_group->ID->setDbValue($rs->fields('ID'));
		$t_question_group->NAME->setDbValue($rs->fields('NAME'));
		$t_question_group->Description->setDbValue($rs->fields('Description'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question_group;

		// Call Row_Rendering event
		$t_question_group->Row_Rendering();

		// Common render codes for all row types
		// ID

		$t_question_group->ID->CellCssStyle = "";
		$t_question_group->ID->CellCssClass = "";

		// NAME
		$t_question_group->NAME->CellCssStyle = "";
		$t_question_group->NAME->CellCssClass = "";

		// Description
		$t_question_group->Description->CellCssStyle = "";
		$t_question_group->Description->CellCssClass = "";
		if ($t_question_group->RowType == EW_ROWTYPE_VIEW) { // View row

			// ID
			$t_question_group->ID->ViewValue = $t_question_group->ID->CurrentValue;
			$t_question_group->ID->CssStyle = "";
			$t_question_group->ID->CssClass = "";
			$t_question_group->ID->ViewCustomAttributes = "";

			// NAME
			$t_question_group->NAME->ViewValue = $t_question_group->NAME->CurrentValue;
			$t_question_group->NAME->CssStyle = "";
			$t_question_group->NAME->CssClass = "";
			$t_question_group->NAME->ViewCustomAttributes = "";

			// Description
			$t_question_group->Description->ViewValue = $t_question_group->Description->CurrentValue;
			$t_question_group->Description->CssStyle = "";
			$t_question_group->Description->CssClass = "";
			$t_question_group->Description->ViewCustomAttributes = "";

			// ID
			$t_question_group->ID->HrefValue = "";

			// NAME
			$t_question_group->NAME->HrefValue = "";

			// Description
			$t_question_group->Description->HrefValue = "";
		}

		// Call Row Rendered event
		$t_question_group->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_question_group;
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
		if ($t_question_group->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_question_group->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_question_group->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'ID', $t_question_group->Export);
				ew_ExportAddValue($sExportStr, 'NAME', $t_question_group->Export);
				ew_ExportAddValue($sExportStr, 'Description', $t_question_group->Export);
				echo ew_ExportLine($sExportStr, $t_question_group->Export);
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
				$t_question_group->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_question_group->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('ID', $t_question_group->ID->CurrentValue);
					$XmlDoc->AddField('NAME', $t_question_group->NAME->CurrentValue);
					$XmlDoc->AddField('Description', $t_question_group->Description->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_question_group->Export <> "csv") { // Vertical format
						echo ew_ExportField('ID', $t_question_group->ID->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						echo ew_ExportField('NAME', $t_question_group->NAME->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						echo ew_ExportField('Description', $t_question_group->Description->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_question_group->ID->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						ew_ExportAddValue($sExportStr, $t_question_group->NAME->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						ew_ExportAddValue($sExportStr, $t_question_group->Description->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						echo ew_ExportLine($sExportStr, $t_question_group->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_question_group->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_question_group->Export);
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
