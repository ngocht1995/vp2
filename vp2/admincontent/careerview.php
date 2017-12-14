<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "careerinfo.php" ?>
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
$career_view = new ccareer_view();
$Page =& $career_view;

// Page init processing
$career_view->Page_Init();

// Page main processing
$career_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($career->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var career_view = new ew_Page("career_view");

// page properties
career_view.PageID = "view"; // page ID
var EW_PAGE_ID = career_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
career_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
career_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
career_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: Tmdt Career
<br><br>
<?php if ($career->Export == "") { ?>
<a href="careerlist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $career->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $career->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $career->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $career_view->ShowMessage() ?>
<p>
<?php if ($career->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($career_view->Pager)) $career_view->Pager = new cNumericPager($career_view->lStartRec, $career_view->lDisplayRecs, $career_view->lTotalRecs, $career_view->lRecRange) ?>
<?php if ($career_view->Pager->RecordCount > 0) { ?>
	<?php if ($career_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($career_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($career_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($career_view->sSrchWhere == "0=101") { ?>
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
<?php if ($career->nganhnghe_ten->Visible) { // nganhnghe_ten ?>
	<tr<?php echo $career->nganhnghe_ten->RowAttributes ?>>
		<td class="ewTableHeader">Nganhnghe Ten</td>
		<td<?php echo $career->nganhnghe_ten->CellAttributes() ?>>
<div<?php echo $career->nganhnghe_ten->ViewAttributes() ?>><?php echo $career->nganhnghe_ten->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($career->nganhnghe_pic->Visible) { // nganhnghe_pic ?>
	<tr<?php echo $career->nganhnghe_pic->RowAttributes ?>>
		<td class="ewTableHeader">Nganhnghe Pic</td>
		<td<?php echo $career->nganhnghe_pic->CellAttributes() ?>>
<?php if ($career->nganhnghe_pic->HrefValue <> "") { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<a href="<?php echo $career->nganhnghe_pic->HrefValue ?>" target="_blank"><img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($career->nganhnghe_belongto->Visible) { // nganhnghe_belongto ?>
	<tr<?php echo $career->nganhnghe_belongto->RowAttributes ?>>
		<td class="ewTableHeader">Nganhnghe Belongto</td>
		<td<?php echo $career->nganhnghe_belongto->CellAttributes() ?>>
<div<?php echo $career->nganhnghe_belongto->ViewAttributes() ?>><?php echo $career->nganhnghe_belongto->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($career->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($career_view->Pager)) $career_view->Pager = new cNumericPager($career_view->lStartRec, $career_view->lDisplayRecs, $career_view->lTotalRecs, $career_view->lRecRange) ?>
<?php if ($career_view->Pager->RecordCount > 0) { ?>
	<?php if ($career_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($career_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($career_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $career_view->PageUrl() ?>start=<?php echo $career_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($career_view->sSrchWhere == "0=101") { ?>
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
<?php if ($career->Export == "") { ?>
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
class ccareer_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'career';

	// Page Object Name
	var $PageObjName = 'career_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $career;
		if ($career->UseTokenInUrl) $PageUrl .= "t=" . $career->TableVar . "&"; // add page token
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
		global $objForm, $career;
		if ($career->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($career->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($career->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ccareer_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["career"] = new ccareer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'career', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $career;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("Nganhnghe");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("careerlist.php");
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
		global $career;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["nganhnghe_id"] <> "") {
				$career->nganhnghe_id->setQueryStringValue($_GET["nganhnghe_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$career->CurrentAction = "I"; // Display form
			switch ($career->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("careerlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($career->nganhnghe_id->CurrentValue) == strval($rs->fields('nganhnghe_id'))) {
								$career->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "careerlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "careerlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$career->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $career;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$career->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$career->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $career->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$career->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$career->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$career->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $career;

		// Call Recordset Selecting event
		$career->Recordset_Selecting($career->CurrentFilter);

		// Load list page SQL
		$sSql = $career->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$career->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $career;
		$sFilter = $career->KeyFilter();

		// Call Row Selecting event
		$career->Row_Selecting($sFilter);

		// Load sql based on filter
		$career->CurrentFilter = $sFilter;
		$sSql = $career->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$career->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $career;
		$career->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$career->nganhnghe_ten->setDbValue($rs->fields('nganhnghe_ten'));
		$career->nganhnghe_pic->Upload->DbValue = $rs->fields('nganhnghe_pic');
		$career->nganhnghe_belongto->setDbValue($rs->fields('nganhnghe_belongto'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $career;

		// Call Row_Rendering event
		$career->Row_Rendering();

		// Common render codes for all row types
		// nganhnghe_ten

		$career->nganhnghe_ten->CellCssStyle = "";
		$career->nganhnghe_ten->CellCssClass = "";

		// nganhnghe_pic
		$career->nganhnghe_pic->CellCssStyle = "";
		$career->nganhnghe_pic->CellCssClass = "";

		// nganhnghe_belongto
		$career->nganhnghe_belongto->CellCssStyle = "";
		$career->nganhnghe_belongto->CellCssClass = "";
		if ($career->RowType == EW_ROWTYPE_VIEW) { // View row

			// nganhnghe_ten
			$career->nganhnghe_ten->ViewValue = $career->nganhnghe_ten->CurrentValue;
			$career->nganhnghe_ten->CssStyle = "";
			$career->nganhnghe_ten->CssClass = "";
			$career->nganhnghe_ten->ViewCustomAttributes = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->ViewValue = "Nganhnghe Pic";
				$career->nganhnghe_pic->ImageWidth = 20;
				$career->nganhnghe_pic->ImageHeight = 0;
				$career->nganhnghe_pic->ImageAlt = "";
			} else {
				$career->nganhnghe_pic->ViewValue = "";
			}
			$career->nganhnghe_pic->CssStyle = "";
			$career->nganhnghe_pic->CssClass = "";
			$career->nganhnghe_pic->ViewCustomAttributes = "";

			// nganhnghe_belongto
			if (strval($career->nganhnghe_belongto->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($career->nganhnghe_belongto->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$career->nganhnghe_belongto->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$career->nganhnghe_belongto->ViewValue = $career->nganhnghe_belongto->CurrentValue;
				}
			} else {
				$career->nganhnghe_belongto->ViewValue = NULL;
			}
			$career->nganhnghe_belongto->CssStyle = "";
			$career->nganhnghe_belongto->CssClass = "";
			$career->nganhnghe_belongto->ViewCustomAttributes = "";

			// nganhnghe_ten
			$career->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->HrefValue = "career_nganhnghe_pic_bv.php?nganhnghe_id=" . $career->nganhnghe_id->CurrentValue;
				if ($career->Export <> "") $career->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($career->nganhnghe_pic->HrefValue);
			} else {
				$career->nganhnghe_pic->HrefValue = "";
			}

			// nganhnghe_belongto
			$career->nganhnghe_belongto->HrefValue = "";
		}

		// Call Row Rendered event
		$career->Row_Rendered();
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
