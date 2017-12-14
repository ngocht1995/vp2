<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "file_attach_articleinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "intro_articleinfo.php" ?>
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
$file_attach_article_view = new cfile_attach_article_view();
$Page =& $file_attach_article_view;

// Page init processing
$file_attach_article_view->Page_Init();

// Page main processing
$file_attach_article_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($file_attach_article->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var file_attach_article_view = new ew_Page("file_attach_article_view");

// page properties
file_attach_article_view.PageID = "view"; // page ID
var EW_PAGE_ID = file_attach_article_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
file_attach_article_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
file_attach_article_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
file_attach_article_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
file_attach_article_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: File Attach
<br><br>
<?php if ($file_attach_article->Export == "") { ?>
<a href="file_attach_articlelist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $file_attach_article->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $file_attach_article->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $file_attach_article->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $file_attach_article_view->ShowMessage() ?>
<p>
<?php if ($file_attach_article->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($file_attach_article_view->Pager)) $file_attach_article_view->Pager = new cNumericPager($file_attach_article_view->lStartRec, $file_attach_article_view->lDisplayRecs, $file_attach_article_view->lTotalRecs, $file_attach_article_view->lRecRange) ?>
<?php if ($file_attach_article_view->Pager->RecordCount > 0) { ?>
	<?php if ($file_attach_article_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_article_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($file_attach_article_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($file_attach_article_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_article_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($file_attach_article_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
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
<?php if ($file_attach_article->file_name->Visible) { // file_name ?>
	<tr<?php echo $file_attach_article->file_name->RowAttributes ?>>
		<td class="ewTableHeader">File Name</td>
		<td<?php echo $file_attach_article->file_name->CellAttributes() ?>>
<div<?php echo $file_attach_article->file_name->ViewAttributes() ?>><?php echo $file_attach_article->file_name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($file_attach_article->file_fullname->Visible) { // file_fullname ?>
	<tr<?php echo $file_attach_article->file_fullname->RowAttributes ?>>
		<td class="ewTableHeader">File Fullname</td>
		<td<?php echo $file_attach_article->file_fullname->CellAttributes() ?>>
<?php if ($file_attach_article->file_fullname->HrefValue <> "") { ?>
<?php if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) { ?>
<a href="<?php echo $file_attach_article->file_fullname->HrefValue ?>" target="_parent"><?php echo $file_attach_article->file_fullname->ViewValue ?></a>
<?php } elseif (!in_array($file_attach_article->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) { ?>
<?php echo $file_attach_article->file_fullname->ViewValue ?>
<?php } elseif (!in_array($file_attach_article->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($file_attach_article->file_desc->Visible) { // file_desc ?>
	<tr<?php echo $file_attach_article->file_desc->RowAttributes ?>>
		<td class="ewTableHeader">File Desc</td>
		<td<?php echo $file_attach_article->file_desc->CellAttributes() ?>>
<div<?php echo $file_attach_article->file_desc->ViewAttributes() ?>><?php echo $file_attach_article->file_desc->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($file_attach_article->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($file_attach_article_view->Pager)) $file_attach_article_view->Pager = new cNumericPager($file_attach_article_view->lStartRec, $file_attach_article_view->lDisplayRecs, $file_attach_article_view->lTotalRecs, $file_attach_article_view->lRecRange) ?>
<?php if ($file_attach_article_view->Pager->RecordCount > 0) { ?>
	<?php if ($file_attach_article_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_article_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($file_attach_article_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($file_attach_article_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($file_attach_article_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $file_attach_article_view->PageUrl() ?>start=<?php echo $file_attach_article_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($file_attach_article_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
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
<?php if ($file_attach_article->Export == "") { ?>
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
class cfile_attach_article_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'file_attach_article';

	// Page Object Name
	var $PageObjName = 'file_attach_article_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $file_attach_article;
		if ($file_attach_article->UseTokenInUrl) $PageUrl .= "t=" . $file_attach_article->TableVar . "&"; // add page token
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
		global $objForm, $file_attach_article;
		if ($file_attach_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($file_attach_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($file_attach_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cfile_attach_article_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["file_attach_article"] = new cfile_attach_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['intro_article'] = new cintro_article();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'file_attach_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $file_attach_article;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("intro_article");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("file_attach_articlelist.php");
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
		global $file_attach_article;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["file_id"] <> "") {
				$file_attach_article->file_id->setQueryStringValue($_GET["file_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$file_attach_article->CurrentAction = "I"; // Display form
			switch ($file_attach_article->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("file_attach_articlelist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($file_attach_article->file_id->CurrentValue) == strval($rs->fields('file_id'))) {
								$file_attach_article->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "file_attach_articlelist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "file_attach_articlelist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$file_attach_article->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $file_attach_article;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$file_attach_article->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$file_attach_article->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $file_attach_article->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$file_attach_article->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$file_attach_article->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$file_attach_article->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $file_attach_article;

		// Call Recordset Selecting event
		$file_attach_article->Recordset_Selecting($file_attach_article->CurrentFilter);

		// Load list page SQL
		$sSql = $file_attach_article->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$file_attach_article->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $file_attach_article;
		$sFilter = $file_attach_article->KeyFilter();

		// Call Row Selecting event
		$file_attach_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$file_attach_article->CurrentFilter = $sFilter;
		$sSql = $file_attach_article->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$file_attach_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $file_attach_article;
		$file_attach_article->file_id->setDbValue($rs->fields('file_id'));
		$file_attach_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$file_attach_article->file_name->setDbValue($rs->fields('file_name'));
		$file_attach_article->file_fullname->Upload->DbValue = $rs->fields('file_fullname');
		$file_attach_article->file_desc->setDbValue($rs->fields('file_desc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $file_attach_article;

		// Call Row_Rendering event
		$file_attach_article->Row_Rendering();

		// Common render codes for all row types
		// file_name

		$file_attach_article->file_name->CellCssStyle = "";
		$file_attach_article->file_name->CellCssClass = "";

		// file_fullname
		$file_attach_article->file_fullname->CellCssStyle = "";
		$file_attach_article->file_fullname->CellCssClass = "";

		// file_desc
		$file_attach_article->file_desc->CellCssStyle = "";
		$file_attach_article->file_desc->CellCssClass = "";
		if ($file_attach_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// file_name
			$file_attach_article->file_name->ViewValue = $file_attach_article->file_name->CurrentValue;
			$file_attach_article->file_name->CssStyle = "";
			$file_attach_article->file_name->CssClass = "";
			$file_attach_article->file_name->ViewCustomAttributes = "";

			// file_fullname
			if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) {
				$file_attach_article->file_fullname->ViewValue = $file_attach_article->file_fullname->Upload->DbValue;
			} else {
				$file_attach_article->file_fullname->ViewValue = "";
			}
			$file_attach_article->file_fullname->CssStyle = "";
			$file_attach_article->file_fullname->CssClass = "";
			$file_attach_article->file_fullname->ViewCustomAttributes = "";

			// file_desc
			$file_attach_article->file_desc->ViewValue = $file_attach_article->file_desc->CurrentValue;
			$file_attach_article->file_desc->CssStyle = "";
			$file_attach_article->file_desc->CssClass = "";
			$file_attach_article->file_desc->ViewCustomAttributes = "";

			// file_name
			$file_attach_article->file_name->HrefValue = "";

			// file_fullname
			if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) {
				$file_attach_article->file_fullname->HrefValue = ew_UploadPathEx(FALSE, "attach/") . ((!empty($file_attach_article->file_fullname->ViewValue)) ? $file_attach_article->file_fullname->ViewValue : $file_attach_article->file_fullname->CurrentValue);
				if ($file_attach_article->Export <> "") $file_attach_article->file_fullname->HrefValue = ew_ConvertFullUrl($file_attach_article->file_fullname->HrefValue);
			} else {
				$file_attach_article->file_fullname->HrefValue = "";
			}

			// file_desc
			$file_attach_article->file_desc->HrefValue = "";
		}

		// Call Row Rendered event
		$file_attach_article->Row_Rendered();
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
