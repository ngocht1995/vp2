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
$intro_information_view = new cintro_information_view();
$Page =& $intro_information_view;

// Page init processing
$intro_information_view->Page_Init();

// Page main processing
$intro_information_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($intro_information->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var intro_information_view = new ew_Page("intro_information_view");

// page properties
intro_information_view.PageID = "view"; // page ID
var EW_PAGE_ID = intro_information_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
intro_information_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_information_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_information_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_information_view.ValidateRequired = false; // no JavaScript validation
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
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thông tin giới thiệu doanh nghiệp</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($intro_information->Export == "") { ?>

<?php if ($Security->CanEdit()) { ?>
<?php if ($intro_information_view->ShowOptionLink()) { ?>
<a href="<?php echo $intro_information->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $intro_information_view->ShowMessage() ?>
<p>
<?php if ($intro_information->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_information_view->Pager)) $intro_information_view->Pager = new cNumericPager($intro_information_view->lStartRec, $intro_information_view->lDisplayRecs, $intro_information_view->lTotalRecs, $intro_information_view->lRecRange) ?>
<?php if ($intro_information_view->Pager->RecordCount > 0) { ?>
	<?php if ($intro_information_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_information_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_information_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_information_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
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
<?php if ($intro_information->logo_congty->Visible) { // logo_congty ?>
	<tr<?php echo $intro_information->logo_congty->RowAttributes ?>>
		<td class="ewTableHeader">Logo công ty</td>
		<td<?php echo $intro_information->logo_congty->CellAttributes() ?>>
<?php if ($intro_information->logo_congty->HrefValue <> "") { ?>
<?php if (!is_null($intro_information->logo_congty->Upload->DbValue)) { ?>
<img src="intro_information_logo_congty_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->logo_congty->ViewAttributes() ?>>
<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($intro_information->logo_congty->Upload->DbValue)) { ?>
<img src="intro_information_logo_congty_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->logo_congty->ViewAttributes() ?>>
<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
        <?php if ($intro_information->anh_logo->Visible) { // anh_logo ?>
	<tr<?php echo $intro_information->anh_logo->RowAttributes ?>>
		<td class="ewTableHeader">Banner shop công ty</td>
		<td<?php echo $intro_information->anh_logo->CellAttributes() ?>>
<?php if ($intro_information->anh_logo->HrefValue <> "") { ?>
<?php if (!is_null($intro_information->anh_logo->Upload->DbValue)) { ?>
<img src="intro_information_anh_logo_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->anh_logo->ViewAttributes() ?>>
<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($intro_information->anh_logo->Upload->DbValue)) { ?>
<img src="intro_information_anh_logo_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->anh_logo->ViewAttributes() ?>>
<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($intro_information->gioi_thieu->Visible) { // gioi_thieu ?>
	<tr<?php echo $intro_information->gioi_thieu->RowAttributes ?>>
		<td class="ewTableHeader">Giới thiệu công ty</td>
		<td <?php echo $intro_information->gioi_thieu->CellAttributes() ?>>

                        <?php echo $intro_information->gioi_thieu->ViewValue ?>
		</td>
	</tr>


<?php } ?>

</table>
</div>
</td></tr></table>
<?php if ($intro_information->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_information_view->Pager)) $intro_information_view->Pager = new cNumericPager($intro_information_view->lStartRec, $intro_information_view->lDisplayRecs, $intro_information_view->lTotalRecs, $intro_information_view->lRecRange) ?>
<?php if ($intro_information_view->Pager->RecordCount > 0) { ?>
	<?php if ($intro_information_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->PrevButton->Start ?>"><b>Sau/b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_information_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_information_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_information_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_information_view->PageUrl() ?>start=<?php echo $intro_information_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_information_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
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
class cintro_information_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'intro_information';

	// Page Object Name
	var $PageObjName = 'intro_information_view';

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
	function cintro_information_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_information"] = new cintro_information();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_information', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("intro_informationlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("intro_informationlist.php");
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
		global $intro_information;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["nguoidung_id"] <> "") {
				$intro_information->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$intro_information->CurrentAction = "I"; // Display form
			switch ($intro_information->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("intro_informationlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($intro_information->nguoidung_id->CurrentValue) == strval($rs->fields('nguoidung_id'))) {
								$intro_information->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "intro_informationlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "intro_informationlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$intro_information->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
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
                $intro_information->anh_logo->Upload->DbValue = $rs->fields('anh_logo');
		$intro_information->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$intro_information->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_information;

		// Call Row_Rendering event
		$intro_information->Row_Rendering();

		// Common render codes for all row types
		// logo_congty

		$intro_information->logo_congty->CellCssStyle = "";
		$intro_information->logo_congty->CellCssClass = "";
                $intro_information->anh_logo->CellCssStyle = "";
		$intro_information->anh_logo->CellCssClass = "";
		// gioi_thieu
		$intro_information->gioi_thieu->CellCssStyle = "";
		$intro_information->gioi_thieu->CellCssClass = "";
		if ($intro_information->RowType == EW_ROWTYPE_VIEW) { // View row

			// logo_congty
			if (!is_null($intro_information->logo_congty->Upload->DbValue)) {
				$intro_information->logo_congty->ViewValue = "Logo công ty";
				$intro_information->logo_congty->ImageWidth = 150;
				$intro_information->logo_congty->ImageHeight = 0;
				$intro_information->logo_congty->ImageAlt = "";
			} else {
				$intro_information->logo_congty->ViewValue = "";
			}
			$intro_information->logo_congty->CssStyle = "";
			$intro_information->logo_congty->CssClass = "";
			$intro_information->logo_congty->ViewCustomAttributes = "";

                        // logo_congty
			if (!is_null($intro_information->anh_logo->Upload->DbValue)) {
				$intro_information->anh_logo->ViewValue = "Logo công ty";
				$intro_information->anh_logo->ImageWidth = 600;
				$intro_information->anh_logo->ImageHeight = 0;
				$intro_information->anh_logo->ImageAlt = "";
			} else {
				$intro_information->anh_logo->ViewValue = "";
			}
			$intro_information->anh_logo->CssStyle = "";
			$intro_information->anh_logo->CssClass = "";
			$intro_information->anh_logo->ViewCustomAttributes = "";
			// gioi_thieu
			$intro_information->gioi_thieu->ViewValue = $intro_information->gioi_thieu->CurrentValue;
			$intro_information->gioi_thieu->CssStyle = "";
			$intro_information->gioi_thieu->CssClass = "";
			$intro_information->gioi_thieu->ViewCustomAttributes = "";

			// anh_logo
			$intro_information->anh_logo->HrefValue = "";

                        // logo_congty
			$intro_information->logo_congty->HrefValue = "";
			// gioi_thieu
			$intro_information->gioi_thieu->HrefValue = "";
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
}
?>
