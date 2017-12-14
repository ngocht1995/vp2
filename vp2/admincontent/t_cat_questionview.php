<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_cat_questioninfo.php" ?>
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
$t_cat_question_view = new ct_cat_question_view();
$Page =& $t_cat_question_view;

// Page init processing
$t_cat_question_view->Page_Init();

// Page main processing
$t_cat_question_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_cat_question->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_cat_question_view = new ew_Page("t_cat_question_view");

// page properties
t_cat_question_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_cat_question_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_cat_question_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_cat_question_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_cat_question_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_cat_question_view.ValidateRequired = false; // no JavaScript validation
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

<p>
<?php if ($t_cat_question->Export == "") { ?><table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_cat_questionlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin </font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<a href="<?php echo $t_cat_question->AddUrl() ?>">Thêm</a>&nbsp;
<a href="<?php echo $t_cat_question->EditUrl() ?>">Sửa</a>&nbsp;
<a href="<?php echo $t_cat_question->CopyUrl() ?>">Sao chép</a>&nbsp;
<a onclick="return ew_Confirm('Do you want to delete this record?');" href="<?php echo $t_cat_question->DeleteUrl() ?>">Xóa</a>&nbsp;
<?php } ?>
</span></p>
<?php $t_cat_question_view->ShowMessage() ?>
<p>
<?php if ($t_cat_question->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_question_view->Pager)) $t_cat_question_view->Pager = new cNumericPager($t_cat_question_view->lStartRec, $t_cat_question_view->lDisplayRecs, $t_cat_question_view->lTotalRecs, $t_cat_question_view->lRecRange) ?>
<?php if ($t_cat_question_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_question_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->FirstButton->Start ?>"><b>Đâu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_question_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_cat_question_view->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
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
<?php if ($t_cat_question->cat_question_id->Visible) { // cat_question_id ?>
	<tr<?php echo $t_cat_question->cat_question_id->RowAttributes ?>>
		<td class="ewTableHeader">Mã danh mục</td>
		<td<?php echo $t_cat_question->cat_question_id->CellAttributes() ?>>
<div<?php echo $t_cat_question->cat_question_id->ViewAttributes() ?>><?php echo $t_cat_question->cat_question_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_cat_question->name->Visible) { // name ?>
	<tr<?php echo $t_cat_question->name->RowAttributes ?>>
		<td class="ewTableHeader">Tên danh mục</td>
		<td<?php echo $t_cat_question->name->CellAttributes() ?>>
<div<?php echo $t_cat_question->name->ViewAttributes() ?>><?php echo $t_cat_question->name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_cat_question->position->Visible) { // position ?>
<tr<?php echo $t_cat_question->position->RowAttributes ?>>
<td class="ewTableHeader">Vị trí</td>
<td<?php echo $t_cat_question->position->CellAttributes() ?>>
<div<?php echo $t_cat_question->position->ViewAttributes() ?>><?php echo $t_cat_question->position->ViewValue ?></div></td>
</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_cat_question->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_question_view->Pager)) $t_cat_question_view->Pager = new cNumericPager($t_cat_question_view->lStartRec, $t_cat_question_view->lDisplayRecs, $t_cat_question_view->lTotalRecs, $t_cat_question_view->lRecRange) ?>
<?php if ($t_cat_question_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_question_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_question_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_view->PageUrl() ?>start=<?php echo $t_cat_question_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_cat_question_view->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không tìm thấy bản ghi
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_cat_question->Export == "") { ?>
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
class ct_cat_question_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_cat_question';

	// Page Object Name
	var $PageObjName = 't_cat_question_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_cat_question;
		if ($t_cat_question->UseTokenInUrl) $PageUrl .= "t=" . $t_cat_question->TableVar . "&"; // add page token
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
		global $objForm, $t_cat_question;
		if ($t_cat_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_cat_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_cat_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_cat_question_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_question"] = new ct_cat_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_cat_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_cat_question;

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
		global $t_cat_question;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["cat_question_id"] <> "") {
				$t_cat_question->cat_question_id->setQueryStringValue($_GET["cat_question_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_cat_question->CurrentAction = "I"; // Display form
			switch ($t_cat_question->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_cat_questionlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_cat_question->cat_question_id->CurrentValue) == strval($rs->fields('cat_question_id'))) {
								$t_cat_question->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_cat_questionlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "t_cat_questionlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_cat_question->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_cat_question;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_cat_question->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_cat_question->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_cat_question->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_cat_question;

		// Call Recordset Selecting event
		$t_cat_question->Recordset_Selecting($t_cat_question->CurrentFilter);

		// Load list page SQL
		$sSql = $t_cat_question->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_cat_question->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_cat_question;
		$sFilter = $t_cat_question->KeyFilter();

		// Call Row Selecting event
		$t_cat_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_cat_question->CurrentFilter = $sFilter;
		$sSql = $t_cat_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_cat_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_cat_question;
		$t_cat_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_cat_question->name->setDbValue($rs->fields('name'));
                $t_cat_question->position->setDbValue($rs->fields('position'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_cat_question;

		// Call Row_Rendering event
		$t_cat_question->Row_Rendering();

		// Common render codes for all row types
		// cat_question_id

		$t_cat_question->cat_question_id->CellCssStyle = "";
		$t_cat_question->cat_question_id->CellCssClass = "";

		// name
		$t_cat_question->name->CellCssStyle = "";
		$t_cat_question->name->CellCssClass = "";
                
                // position
		$t_cat_question->position->CellCssStyle = "";
		$t_cat_question->position->CellCssClass = "";
		if ($t_cat_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// cat_question_id
			$t_cat_question->cat_question_id->ViewValue = $t_cat_question->cat_question_id->CurrentValue;
			$t_cat_question->cat_question_id->CssStyle = "";
			$t_cat_question->cat_question_id->CssClass = "";
			$t_cat_question->cat_question_id->ViewCustomAttributes = "";

			// name
			$t_cat_question->name->ViewValue = $t_cat_question->name->CurrentValue;
			$t_cat_question->name->CssStyle = "";
			$t_cat_question->name->CssClass = "";
			$t_cat_question->name->ViewCustomAttributes = "";
                        
                        // position
			$t_cat_question->position->ViewValue = $t_cat_question->position->CurrentValue;
			$t_cat_question->position->CssStyle = "";
			$t_cat_question->position->CssClass = "";
			$t_cat_question->position->ViewCustomAttributes = "";

			// cat_question_id
			$t_cat_question->cat_question_id->HrefValue = "";

			// name
			$t_cat_question->name->HrefValue = "";
                        
                        // position
			$t_cat_question->position->HrefValue = "";
		}

		// Call Row Rendered event
		$t_cat_question->Row_Rendered();
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
