<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_subjectinfo.php" ?>
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
$intro_subject_view = new cintro_subject_view();
$Page =& $intro_subject_view;

// Page init processing
$intro_subject_view->Page_Init();

// Page main processing
$intro_subject_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($intro_subject->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var intro_subject_view = new ew_Page("intro_subject_view");

// page properties
intro_subject_view.PageID = "view"; // page ID
var EW_PAGE_ID = intro_subject_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
intro_subject_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_subject_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_subject_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_subject_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: Tmdt Intro Subject
<br><br>
<?php if ($intro_subject->Export == "") { ?>
<a href="intro_subjectlist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $intro_subject->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $intro_subject->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $intro_subject->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $intro_subject_view->ShowMessage() ?>
<p>
<?php if ($intro_subject->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_subject_view->Pager)) $intro_subject_view->Pager = new cNumericPager($intro_subject_view->lStartRec, $intro_subject_view->lDisplayRecs, $intro_subject_view->lTotalRecs, $intro_subject_view->lRecRange) ?>
<?php if ($intro_subject_view->Pager->RecordCount > 0) { ?>
	<?php if ($intro_subject_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_subject_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_subject_view->sSrchWhere == "0=101") { ?>
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
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($intro_subject->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
	<tr<?php echo $intro_subject->chuyenmuc_id->RowAttributes ?>>
		<td class="ewTableHeader">Chuyenmuc Id</td>
		<td<?php echo $intro_subject->chuyenmuc_id->CellAttributes() ?>>
<div<?php echo $intro_subject->chuyenmuc_id->ViewAttributes() ?>><?php echo $intro_subject->chuyenmuc_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<tr<?php echo $intro_subject->ten_chuyenmuc->RowAttributes ?>>
		<td class="ewTableHeader">Ten Chuyenmuc</td>
		<td<?php echo $intro_subject->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $intro_subject->ten_chuyenmuc->ViewAttributes() ?>><?php echo $intro_subject->ten_chuyenmuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->chuyenmuc_belongto->Visible) { // chuyenmuc_belongto ?>
	<tr<?php echo $intro_subject->chuyenmuc_belongto->RowAttributes ?>>
		<td class="ewTableHeader">Chuyenmuc Belongto</td>
		<td<?php echo $intro_subject->chuyenmuc_belongto->CellAttributes() ?>>
<div<?php echo $intro_subject->chuyenmuc_belongto->ViewAttributes() ?>><?php echo $intro_subject->chuyenmuc_belongto->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $intro_subject->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thutu Sapxep</td>
		<td<?php echo $intro_subject->thutu_sapxep->CellAttributes() ?>>
<div<?php echo $intro_subject->thutu_sapxep->ViewAttributes() ?>><?php echo $intro_subject->thutu_sapxep->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $intro_subject->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trang Thai</td>
		<td<?php echo $intro_subject->trang_thai->CellAttributes() ?>>
<div<?php echo $intro_subject->trang_thai->ViewAttributes() ?>><?php echo $intro_subject->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->thoigian_them->Visible) { // thoigian_them ?>
	<tr<?php echo $intro_subject->thoigian_them->RowAttributes ?>>
		<td class="ewTableHeader">Thoigian Them</td>
		<td<?php echo $intro_subject->thoigian_them->CellAttributes() ?>>
<div<?php echo $intro_subject->thoigian_them->ViewAttributes() ?>><?php echo $intro_subject->thoigian_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->thoigian_sua->Visible) { // thoigian_sua ?>
	<tr<?php echo $intro_subject->thoigian_sua->RowAttributes ?>>
		<td class="ewTableHeader">Thoigian Sua</td>
		<td<?php echo $intro_subject->thoigian_sua->CellAttributes() ?>>
<div<?php echo $intro_subject->thoigian_sua->ViewAttributes() ?>><?php echo $intro_subject->thoigian_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->nguoi_them->Visible) { // nguoi_them ?>
	<tr<?php echo $intro_subject->nguoi_them->RowAttributes ?>>
		<td class="ewTableHeader">Nguoi Them</td>
		<td<?php echo $intro_subject->nguoi_them->CellAttributes() ?>>
<div<?php echo $intro_subject->nguoi_them->ViewAttributes() ?>><?php echo $intro_subject->nguoi_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_subject->nguoi_sua->Visible) { // nguoi_sua ?>
	<tr<?php echo $intro_subject->nguoi_sua->RowAttributes ?>>
		<td class="ewTableHeader">Nguoi Sua</td>
		<td<?php echo $intro_subject->nguoi_sua->CellAttributes() ?>>
<div<?php echo $intro_subject->nguoi_sua->ViewAttributes() ?>><?php echo $intro_subject->nguoi_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($intro_subject->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_subject_view->Pager)) $intro_subject_view->Pager = new cNumericPager($intro_subject_view->lStartRec, $intro_subject_view->lDisplayRecs, $intro_subject_view->lTotalRecs, $intro_subject_view->lRecRange) ?>
<?php if ($intro_subject_view->Pager->RecordCount > 0) { ?>
	<?php if ($intro_subject_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_subject_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_subject_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_subject_view->PageUrl() ?>start=<?php echo $intro_subject_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_subject_view->sSrchWhere == "0=101") { ?>
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
<p>
<?php if ($intro_subject->Export == "") { ?>
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
class cintro_subject_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'intro_subject';

	// Page Object Name
	var $PageObjName = 'intro_subject_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_subject;
		if ($intro_subject->UseTokenInUrl) $PageUrl .= "t=" . $intro_subject->TableVar . "&"; // add page token
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
		global $objForm, $intro_subject;
		if ($intro_subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_subject_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_subject"] = new cintro_subject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_subject;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("subject");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("intro_subjectlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

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
		global $intro_subject;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["chuyenmuc_id"] <> "") {
				$intro_subject->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$intro_subject->CurrentAction = "I"; // Display form
			switch ($intro_subject->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("intro_subjectlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($intro_subject->chuyenmuc_id->CurrentValue) == strval($rs->fields('chuyenmuc_id'))) {
								$intro_subject->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$sReturnUrl = "intro_subjectlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "intro_subjectlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$intro_subject->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $intro_subject;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$intro_subject->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$intro_subject->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $intro_subject->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$intro_subject->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$intro_subject->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$intro_subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $intro_subject;

		// Call Recordset Selecting event
		$intro_subject->Recordset_Selecting($intro_subject->CurrentFilter);

		// Load list page SQL
		$sSql = $intro_subject->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$intro_subject->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_subject;
		$sFilter = $intro_subject->KeyFilter();

		// Call Row Selecting event
		$intro_subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_subject->CurrentFilter = $sFilter;
		$sSql = $intro_subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_subject;
		$intro_subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$intro_subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$intro_subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$intro_subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$intro_subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$intro_subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_subject;

		// Call Row_Rendering event
		$intro_subject->Row_Rendering();

		// Common render codes for all row types
		// chuyenmuc_id

		$intro_subject->chuyenmuc_id->CellCssStyle = "";
		$intro_subject->chuyenmuc_id->CellCssClass = "";

		// ten_chuyenmuc
		$intro_subject->ten_chuyenmuc->CellCssStyle = "";
		$intro_subject->ten_chuyenmuc->CellCssClass = "";

		// chuyenmuc_belongto
		$intro_subject->chuyenmuc_belongto->CellCssStyle = "";
		$intro_subject->chuyenmuc_belongto->CellCssClass = "";

		// thutu_sapxep
		$intro_subject->thutu_sapxep->CellCssStyle = "";
		$intro_subject->thutu_sapxep->CellCssClass = "";

		// trang_thai
		$intro_subject->trang_thai->CellCssStyle = "";
		$intro_subject->trang_thai->CellCssClass = "";

		// thoigian_them
		$intro_subject->thoigian_them->CellCssStyle = "";
		$intro_subject->thoigian_them->CellCssClass = "";

		// thoigian_sua
		$intro_subject->thoigian_sua->CellCssStyle = "";
		$intro_subject->thoigian_sua->CellCssClass = "";

		// nguoi_them
		$intro_subject->nguoi_them->CellCssStyle = "";
		$intro_subject->nguoi_them->CellCssClass = "";

		// nguoi_sua
		$intro_subject->nguoi_sua->CellCssStyle = "";
		$intro_subject->nguoi_sua->CellCssClass = "";
		if ($intro_subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// chuyenmuc_id
			$intro_subject->chuyenmuc_id->ViewValue = $intro_subject->chuyenmuc_id->CurrentValue;
			$intro_subject->chuyenmuc_id->CssStyle = "";
			$intro_subject->chuyenmuc_id->CssClass = "";
			$intro_subject->chuyenmuc_id->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->ViewValue = $intro_subject->ten_chuyenmuc->CurrentValue;
			$intro_subject->ten_chuyenmuc->CssStyle = "";
			$intro_subject->ten_chuyenmuc->CssClass = "";
			$intro_subject->ten_chuyenmuc->ViewCustomAttributes = "";

			// chuyenmuc_belongto
			$intro_subject->chuyenmuc_belongto->ViewValue = $intro_subject->chuyenmuc_belongto->CurrentValue;
			$intro_subject->chuyenmuc_belongto->CssStyle = "";
			$intro_subject->chuyenmuc_belongto->CssClass = "";
			$intro_subject->chuyenmuc_belongto->ViewCustomAttributes = "";

			// thutu_sapxep
			$intro_subject->thutu_sapxep->ViewValue = $intro_subject->thutu_sapxep->CurrentValue;
			$intro_subject->thutu_sapxep->CssStyle = "";
			$intro_subject->thutu_sapxep->CssClass = "";
			$intro_subject->thutu_sapxep->ViewCustomAttributes = "";

			// trang_thai
			$intro_subject->trang_thai->ViewValue = $intro_subject->trang_thai->CurrentValue;
			$intro_subject->trang_thai->CssStyle = "";
			$intro_subject->trang_thai->CssClass = "";
			$intro_subject->trang_thai->ViewCustomAttributes = "";

			// thoigian_them
			$intro_subject->thoigian_them->ViewValue = $intro_subject->thoigian_them->CurrentValue;
			$intro_subject->thoigian_them->ViewValue = ew_FormatDateTime($intro_subject->thoigian_them->ViewValue, 7);
			$intro_subject->thoigian_them->CssStyle = "";
			$intro_subject->thoigian_them->CssClass = "";
			$intro_subject->thoigian_them->ViewCustomAttributes = "";

			// thoigian_sua
			$intro_subject->thoigian_sua->ViewValue = $intro_subject->thoigian_sua->CurrentValue;
			$intro_subject->thoigian_sua->ViewValue = ew_FormatDateTime($intro_subject->thoigian_sua->ViewValue, 7);
			$intro_subject->thoigian_sua->CssStyle = "";
			$intro_subject->thoigian_sua->CssClass = "";
			$intro_subject->thoigian_sua->ViewCustomAttributes = "";

			// nguoi_them
			$intro_subject->nguoi_them->ViewValue = $intro_subject->nguoi_them->CurrentValue;
			$intro_subject->nguoi_them->CssStyle = "";
			$intro_subject->nguoi_them->CssClass = "";
			$intro_subject->nguoi_them->ViewCustomAttributes = "";

			// nguoi_sua
			$intro_subject->nguoi_sua->ViewValue = $intro_subject->nguoi_sua->CurrentValue;
			$intro_subject->nguoi_sua->CssStyle = "";
			$intro_subject->nguoi_sua->CssClass = "";
			$intro_subject->nguoi_sua->ViewCustomAttributes = "";

			// chuyenmuc_id
			$intro_subject->chuyenmuc_id->HrefValue = "";

			// ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->HrefValue = "";

			// chuyenmuc_belongto
			$intro_subject->chuyenmuc_belongto->HrefValue = "";

			// thutu_sapxep
			$intro_subject->thutu_sapxep->HrefValue = "";

			// trang_thai
			$intro_subject->trang_thai->HrefValue = "";

			// thoigian_them
			$intro_subject->thoigian_them->HrefValue = "";

			// thoigian_sua
			$intro_subject->thoigian_sua->HrefValue = "";

			// nguoi_them
			$intro_subject->nguoi_them->HrefValue = "";

			// nguoi_sua
			$intro_subject->nguoi_sua->HrefValue = "";
		}

		// Call Row Rendered event
		$intro_subject->Row_Rendered();
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
