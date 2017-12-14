<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_questioninfo.php" ?>
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
$t_question_view = new ct_question_view();
$Page =& $t_question_view;

// Page init processing
$t_question_view->Page_Init();

// Page main processing
$t_question_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_question->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_view = new ew_Page("t_question_view");

// page properties
t_question_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_question_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_question_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: T Question
<br><br>
<?php if ($t_question->Export == "") { ?>
<a href="t_questionlist.php">Back to List</a>&nbsp;
<a href="<?php echo $t_question->AddUrl() ?>">Add</a>&nbsp;
<a href="<?php echo $t_question->EditUrl() ?>">Edit</a>&nbsp;
<a href="<?php echo $t_question->CopyUrl() ?>">Copy</a>&nbsp;
<a onclick="return ew_Confirm('Do you want to delete this record?');" href="<?php echo $t_question->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
</span></p>
<?php $t_question_view->ShowMessage() ?>
<p>
<?php if ($t_question->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_view->Pager)) $t_question_view->Pager = new cNumericPager($t_question_view->lStartRec, $t_question_view->lDisplayRecs, $t_question_view->lTotalRecs, $t_question_view->lRecRange) ?>
<?php if ($t_question_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_question_view->sSrchWhere == "0=101") { ?>
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
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_question->question_id->Visible) { // question_id ?>
	<tr<?php echo $t_question->question_id->RowAttributes ?>>
		<td class="ewTableHeader">ID</td>
		<td<?php echo $t_question->question_id->CellAttributes() ?>>
<div<?php echo $t_question->question_id->ViewAttributes() ?>><?php echo $t_question->question_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->cat_question_id->Visible) { // cat_question_id ?>
	<tr<?php echo $t_question->cat_question_id->RowAttributes ?>>
		<td class="ewTableHeader">Nhóm câu h?i</td>
		<td<?php echo $t_question->cat_question_id->CellAttributes() ?>>
<div<?php echo $t_question->cat_question_id->ViewAttributes() ?>><?php echo $t_question->cat_question_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->datetime_h->Visible) { // datetime_h ?>
	<tr<?php echo $t_question->datetime_h->RowAttributes ?>>
		<td class="ewTableHeader">Datetime H</td>
		<td<?php echo $t_question->datetime_h->CellAttributes() ?>>
<div<?php echo $t_question->datetime_h->ViewAttributes() ?>><?php echo $t_question->datetime_h->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->content->Visible) { // content ?>
	<tr<?php echo $t_question->content->RowAttributes ?>>
		<td class="ewTableHeader">Content</td>
		<td<?php echo $t_question->content->CellAttributes() ?>>
<div<?php echo $t_question->content->ViewAttributes() ?>><?php echo $t_question->content->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->status_faq->Visible) { // status_faq ?>
	<tr<?php echo $t_question->status_faq->RowAttributes ?>>
		<td class="ewTableHeader">Status Faq</td>
		<td<?php echo $t_question->status_faq->CellAttributes() ?>>
<div<?php echo $t_question->status_faq->ViewAttributes() ?>><?php echo $t_question->status_faq->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_public->Visible) { // s_public ?>
	<tr<?php echo $t_question->s_public->RowAttributes ?>>
		<td class="ewTableHeader">S Public</td>
		<td<?php echo $t_question->s_public->CellAttributes() ?>>
<div<?php echo $t_question->s_public->ViewAttributes() ?>><?php echo $t_question->s_public->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_question->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_view->Pager)) $t_question_view->Pager = new cNumericPager($t_question_view->lStartRec, $t_question_view->lDisplayRecs, $t_question_view->lTotalRecs, $t_question_view->lRecRange) ?>
<?php if ($t_question_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_question_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_question->Export == "") { ?>
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
class ct_question_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_question';

	// Page Object Name
	var $PageObjName = 't_question_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question;
		if ($t_question->UseTokenInUrl) $PageUrl .= "t=" . $t_question->TableVar . "&"; // add page token
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
		global $objForm, $t_question;
		if ($t_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question"] = new ct_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question;

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
		global $t_question;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["question_id"] <> "") {
				$t_question->question_id->setQueryStringValue($_GET["question_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_question->CurrentAction = "I"; // Display form
			switch ($t_question->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_questionlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_question->question_id->CurrentValue) == strval($rs->fields('question_id'))) {
								$t_question->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_questionlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "t_questionlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_question->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_question;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_question->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_question->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_question->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_question;

		// Call Recordset Selecting event
		$t_question->Recordset_Selecting($t_question->CurrentFilter);

		// Load list page SQL
		$sSql = $t_question->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_question->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question;
		$sFilter = $t_question->KeyFilter();

		// Call Row Selecting event
		$t_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question->CurrentFilter = $sFilter;
		$sSql = $t_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question;
		$t_question->question_id->setDbValue($rs->fields('question_id'));
		$t_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_question->IDcard->setDbValue($rs->fields('IDcard'));
		$t_question->datetime_h->setDbValue($rs->fields('datetime_h'));
		$t_question->msv_id->setDbValue($rs->fields('msv_id'));
		$t_question->zemail->setDbValue($rs->fields('email'));
		$t_question->user_name->setDbValue($rs->fields('user_name'));
		$t_question->tel->setDbValue($rs->fields('tel'));
		$t_question->content->setDbValue($rs->fields('content'));
		$t_question->content1->setDbValue($rs->fields('content1'));
		$t_question->content2->setDbValue($rs->fields('content2'));
		$t_question->description->setDbValue($rs->fields('description'));
		$t_question->status->setDbValue($rs->fields('status'));
		$t_question->active->setDbValue($rs->fields('active'));
		$t_question->s_level->setDbValue($rs->fields('s_level'));
		$t_question->s_Multi->setDbValue($rs->fields('s_Multi'));
		$t_question->s_ok->setDbValue($rs->fields('s_ok'));
		$t_question->s_number->setDbValue($rs->fields('s_number'));
		$t_question->s_finish->setDbValue($rs->fields('s_finish'));
		$t_question->status_faq->setDbValue($rs->fields('status_faq'));
		$t_question->s_public->setDbValue($rs->fields('s_public'));
		$t_question->datetime_hen->setDbValue($rs->fields('datetime_hen'));
		$t_question->datetime_kq->setDbValue($rs->fields('datetime_kq'));
		$t_question->reason->setDbValue($rs->fields('reason'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question;

		// Call Row_Rendering event
		$t_question->Row_Rendering();

		// Common render codes for all row types
		// question_id

		$t_question->question_id->CellCssStyle = "";
		$t_question->question_id->CellCssClass = "";

		// cat_question_id
		$t_question->cat_question_id->CellCssStyle = "";
		$t_question->cat_question_id->CellCssClass = "";

		// datetime_h
		$t_question->datetime_h->CellCssStyle = "";
		$t_question->datetime_h->CellCssClass = "";

		// content
		$t_question->content->CellCssStyle = "";
		$t_question->content->CellCssClass = "";

		// status_faq
		$t_question->status_faq->CellCssStyle = "";
		$t_question->status_faq->CellCssClass = "";

		// s_public
		$t_question->s_public->CellCssStyle = "";
		$t_question->s_public->CellCssClass = "";
		if ($t_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// question_id
			$t_question->question_id->ViewValue = $t_question->question_id->CurrentValue;
			$t_question->question_id->CssStyle = "";
			$t_question->question_id->CssClass = "";
			$t_question->question_id->ViewCustomAttributes = "";

			// cat_question_id
			if (strval($t_question->cat_question_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_question` WHERE `cat_question_id` = " . ew_AdjustSql($t_question->cat_question_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_question->cat_question_id->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_question->cat_question_id->ViewValue = $t_question->cat_question_id->CurrentValue;
				}
			} else {
				$t_question->cat_question_id->ViewValue = NULL;
			}
			$t_question->cat_question_id->CssStyle = "";
			$t_question->cat_question_id->CssClass = "";
			$t_question->cat_question_id->ViewCustomAttributes = "";

			// datetime_h
			$t_question->datetime_h->ViewValue = $t_question->datetime_h->CurrentValue;
			$t_question->datetime_h->ViewValue = ew_FormatDateTime($t_question->datetime_h->ViewValue, 7);
			$t_question->datetime_h->CssStyle = "";
			$t_question->datetime_h->CssClass = "";
			$t_question->datetime_h->ViewCustomAttributes = "";

			// user_name
			$t_question->user_name->ViewValue = $t_question->user_name->CurrentValue;
			$t_question->user_name->CssStyle = "";
			$t_question->user_name->CssClass = "";
			$t_question->user_name->ViewCustomAttributes = "";

			// content
			$t_question->content->ViewValue = $t_question->content->CurrentValue;
			$t_question->content->CssStyle = "";
			$t_question->content->CssClass = "";
			$t_question->content->ViewCustomAttributes = "";

			// status_faq
			if (strval($t_question->status_faq->CurrentValue) <> "") {
				switch ($t_question->status_faq->CurrentValue) {
					case "0":
						$t_question->status_faq->ViewValue = "Khôngi FAQ";
						break;
					case "1":
						$t_question->status_faq->ViewValue = " FAQ";
						break;
					default:
						$t_question->status_faq->ViewValue = $t_question->status_faq->CurrentValue;
				}
			} else {
				$t_question->status_faq->ViewValue = NULL;
			}
			$t_question->status_faq->CssStyle = "";
			$t_question->status_faq->CssClass = "";
			$t_question->status_faq->ViewCustomAttributes = "";

			// s_public
			if (strval($t_question->s_public->CurrentValue) <> "") {
				switch ($t_question->s_public->CurrentValue) {
					case "0":
						$t_question->s_public->ViewValue = "Không xu?t b?n";
						break;
					case "1":
						$t_question->s_public->ViewValue = "Xu?t b?n";
						break;
					default:
						$t_question->s_public->ViewValue = $t_question->s_public->CurrentValue;
				}
			} else {
				$t_question->s_public->ViewValue = NULL;
			}
			$t_question->s_public->CssStyle = "";
			$t_question->s_public->CssClass = "";
			$t_question->s_public->ViewCustomAttributes = "";

			// question_id
			$t_question->question_id->HrefValue = "";

			// cat_question_id
			$t_question->cat_question_id->HrefValue = "";

			// datetime_h
			$t_question->datetime_h->HrefValue = "";

			// content
			$t_question->content->HrefValue = "";

			// status_faq
			$t_question->status_faq->HrefValue = "";

			// s_public
			$t_question->s_public->HrefValue = "";
		}

		// Call Row Rendered event
		$t_question->Row_Rendered();
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
