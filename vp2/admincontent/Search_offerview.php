<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Search_offerinfo.php" ?>
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
$Search_offer_view = new cSearch_offer_view();
$Page =& $Search_offer_view;

// Page init processing
$Search_offer_view->Page_Init();

// Page main processing
$Search_offer_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($Search_offer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var Search_offer_view = new ew_Page("Search_offer_view");

// page properties
Search_offer_view.PageID = "view"; // page ID
var EW_PAGE_ID = Search_offer_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
Search_offer_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Search_offer_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Search_offer_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Search_offer_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="Search_offerlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin kinh doanh</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($Search_offer->Export == "") { ?>

<?php } ?>
</span></p>
<?php $Search_offer_view->ShowMessage() ?>
<p>
<?php if ($Search_offer->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Search_offer_view->Pager)) $Search_offer_view->Pager = new cNumericPager($Search_offer_view->lStartRec, $Search_offer_view->lDisplayRecs, $Search_offer_view->lTotalRecs, $Search_offer_view->lRecRange) ?>
<?php if ($Search_offer_view->Pager->RecordCount > 0) { ?>
	<?php if ($Search_offer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Search_offer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Search_offer_view->sSrchWhere == "0=101") { ?>
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
<?php if ($Search_offer->anh_chaohang->Visible) { // anh_chaohang ?>
	<tr<?php echo $Search_offer->anh_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $Search_offer->anh_chaohang->CellAttributes() ?>>
<?php if ($Search_offer->anh_chaohang->HrefValue <> "") { ?>
<?php if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) { ?>
<a href="<?php echo $Search_offer->anh_chaohang->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $Search_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $Search_offer->anh_chaohang->ViewAttributes() ?>></a>
<?php } elseif (!in_array($Search_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $Search_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $Search_offer->anh_chaohang->ViewAttributes() ?>>
<?php } elseif (!in_array($Search_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($Search_offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
	<tr<?php echo $Search_offer->tieude_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $Search_offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $Search_offer->tieude_chaohang->ViewAttributes() ?>><?php echo $Search_offer->tieude_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Search_offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<tr<?php echo $Search_offer->nganhnghe_id->RowAttributes ?>>
		<td class="ewTableHeader">Ngành hàng</td>
		<td<?php echo $Search_offer->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $Search_offer->nganhnghe_id->ViewAttributes() ?>><?php echo $Search_offer->nganhnghe_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Search_offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
	<tr<?php echo $Search_offer->kieu_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu chào hàng</td>
		<td<?php echo $Search_offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $Search_offer->kieu_chaohang->ViewAttributes() ?>><?php echo $Search_offer->kieu_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Search_offer->so_lanxem->Visible) { // so_lanxem ?>
	<tr<?php echo $Search_offer->so_lanxem->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $Search_offer->so_lanxem->CellAttributes() ?>>
<div<?php echo $Search_offer->so_lanxem->ViewAttributes() ?>><?php echo $Search_offer->so_lanxem->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Search_offer->noidung_chaohang->Visible) { // noidung_chaohang ?>
	<tr<?php echo $Search_offer->noidung_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $Search_offer->noidung_chaohang->CellAttributes() ?>>
<div<?php echo $Search_offer->noidung_chaohang->ViewAttributes() ?>><?php echo $Search_offer->noidung_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Search_offer->ten_congty->Visible) { // ten_congty ?>
	<tr<?php echo $Search_offer->ten_congty->RowAttributes ?>>
		<td class="ewTableHeader">Tên công ty</td>
		<td<?php echo $Search_offer->ten_congty->CellAttributes() ?>>
<div<?php echo $Search_offer->ten_congty->ViewAttributes() ?>><?php echo $Search_offer->ten_congty->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($Search_offer->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Search_offer_view->Pager)) $Search_offer_view->Pager = new cNumericPager($Search_offer_view->lStartRec, $Search_offer_view->lDisplayRecs, $Search_offer_view->lTotalRecs, $Search_offer_view->lRecRange) ?>
<?php if ($Search_offer_view->Pager->RecordCount > 0) { ?>
	<?php if ($Search_offer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Search_offer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_view->PageUrl() ?>start=<?php echo $Search_offer_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Search_offer_view->sSrchWhere == "0=101") { ?>
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
<?php if ($Search_offer->Export == "") { ?>
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
class cSearch_offer_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'Search_offer';

	// Page Object Name
	var $PageObjName = 'Search_offer_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Search_offer;
		if ($Search_offer->UseTokenInUrl) $PageUrl .= "t=" . $Search_offer->TableVar . "&"; // add page token
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
		global $objForm, $Search_offer;
		if ($Search_offer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Search_offer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Search_offer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cSearch_offer_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["Search_offer"] = new cSearch_offer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Search_offer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Search_offer;
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
			$this->Page_Terminate("Search_offerlist.php");
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
		global $Search_offer;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["chaohang_id"] <> "") {
				$Search_offer->chaohang_id->setQueryStringValue($_GET["chaohang_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$Search_offer->CurrentAction = "I"; // Display form
			switch ($Search_offer->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("Search_offerlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($Search_offer->chaohang_id->CurrentValue) == strval($rs->fields('chaohang_id'))) {
								$Search_offer->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "Search_offerlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "Search_offerlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$Search_offer->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $Search_offer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$Search_offer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$Search_offer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $Search_offer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$Search_offer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$Search_offer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$Search_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Search_offer;

		// Call Recordset Selecting event
		$Search_offer->Recordset_Selecting($Search_offer->CurrentFilter);

		// Load list page SQL
		$sSql = $Search_offer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Search_offer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Search_offer;
		$sFilter = $Search_offer->KeyFilter();

		// Call Row Selecting event
		$Search_offer->Row_Selecting($sFilter);

		// Load sql based on filter
		$Search_offer->CurrentFilter = $sFilter;
		$sSql = $Search_offer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Search_offer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Search_offer;
		$Search_offer->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$Search_offer->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$Search_offer->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$Search_offer->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$Search_offer->so_lanxem->setDbValue($rs->fields('so_lanxem'));		
		$Search_offer->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$Search_offer->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$Search_offer->ten_congty->setDbValue($rs->fields('ten_congty'));		
		$Search_offer->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Search_offer;

		// Call Row_Rendering event
		$Search_offer->Row_Rendering();

		// Common render codes for all row types
		// anh_chaohang

		$Search_offer->anh_chaohang->CellCssStyle = "";
		$Search_offer->anh_chaohang->CellCssClass = "";

		// tieude_chaohang
		$Search_offer->tieude_chaohang->CellCssStyle = "";
		$Search_offer->tieude_chaohang->CellCssClass = "";

		// nganhnghe_id
		$Search_offer->nganhnghe_id->CellCssStyle = "";
		$Search_offer->nganhnghe_id->CellCssClass = "";

		// kieu_chaohang
		$Search_offer->kieu_chaohang->CellCssStyle = "";
		$Search_offer->kieu_chaohang->CellCssClass = "";

		// so_lanxem
		$Search_offer->so_lanxem->CellCssStyle = "";
		$Search_offer->so_lanxem->CellCssClass = "";

		// noidung_chaohang
		$Search_offer->noidung_chaohang->CellCssStyle = "";
		$Search_offer->noidung_chaohang->CellCssClass = "";

		// ten_congty
		$Search_offer->ten_congty->CellCssStyle = "";
		$Search_offer->ten_congty->CellCssClass = "";

		
		if ($Search_offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// anh_chaohang
			if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) {
				$Search_offer->anh_chaohang->ViewValue = $Search_offer->anh_chaohang->Upload->DbValue;
				$Search_offer->anh_chaohang->ImageWidth = 0;
				$Search_offer->anh_chaohang->ImageHeight = 100;
				$Search_offer->anh_chaohang->ImageAlt = "";
			} else {
				$Search_offer->anh_chaohang->ViewValue = "";
			}
			$Search_offer->anh_chaohang->CssStyle = "";
			$Search_offer->anh_chaohang->CssClass = "";
			$Search_offer->anh_chaohang->ViewCustomAttributes = "";

			// tieude_chaohang
			$Search_offer->tieude_chaohang->ViewValue = $Search_offer->tieude_chaohang->CurrentValue;
			$Search_offer->tieude_chaohang->CssStyle = "";
			$Search_offer->tieude_chaohang->CssClass = "";
			$Search_offer->tieude_chaohang->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($Search_offer->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($Search_offer->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$Search_offer->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$Search_offer->nganhnghe_id->ViewValue = $Search_offer->nganhnghe_id->CurrentValue;
				}
			} else {
				$Search_offer->nganhnghe_id->ViewValue = NULL;
			}
			$Search_offer->nganhnghe_id->CssStyle = "";
			$Search_offer->nganhnghe_id->CssClass = "";
			$Search_offer->nganhnghe_id->ViewCustomAttributes = "";

			// kieu_chaohang
			if (strval($Search_offer->kieu_chaohang->CurrentValue) <> "") {
				switch ($Search_offer->kieu_chaohang->CurrentValue) {
					case "1":
						$Search_offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					case "2":
						$Search_offer->kieu_chaohang->ViewValue = "Chào mua";
						break;
					default:
						$Search_offer->kieu_chaohang->ViewValue = $Search_offer->kieu_chaohang->CurrentValue;
				}
			} else {
				$Search_offer->kieu_chaohang->ViewValue = NULL;
			}
			$Search_offer->kieu_chaohang->CssStyle = "";
			$Search_offer->kieu_chaohang->CssClass = "";
			$Search_offer->kieu_chaohang->ViewCustomAttributes = "";

			// so_lanxem
			$Search_offer->so_lanxem->ViewValue = $Search_offer->so_lanxem->CurrentValue;
			$Search_offer->so_lanxem->CssStyle = "";
			$Search_offer->so_lanxem->CssClass = "";
			$Search_offer->so_lanxem->ViewCustomAttributes = "";

			

			// noidung_chaohang
			$Search_offer->noidung_chaohang->ViewValue = $Search_offer->noidung_chaohang->CurrentValue;
			$Search_offer->noidung_chaohang->CssStyle = "";
			$Search_offer->noidung_chaohang->CssClass = "";
			$Search_offer->noidung_chaohang->ViewCustomAttributes = "";

			// ten_congty
			$Search_offer->ten_congty->ViewValue = $Search_offer->ten_congty->CurrentValue;
			$Search_offer->ten_congty->CssStyle = "";
			$Search_offer->ten_congty->CssClass = "";
			$Search_offer->ten_congty->ViewCustomAttributes = "";

			

			// anh_chaohang
			if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) {
				$Search_offer->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($Search_offer->anh_chaohang->ViewValue)) ? $Search_offer->anh_chaohang->ViewValue : $Search_offer->anh_chaohang->CurrentValue);
				if ($Search_offer->Export <> "") $Search_offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($Search_offer->anh_chaohang->HrefValue);
			} else {
				$Search_offer->anh_chaohang->HrefValue = "";
			}

			// tieude_chaohang
			$Search_offer->tieude_chaohang->HrefValue = "";

			// nganhnghe_id
			$Search_offer->nganhnghe_id->HrefValue = "";

			// kieu_chaohang
			$Search_offer->kieu_chaohang->HrefValue = "";

			// so_lanxem
			$Search_offer->so_lanxem->HrefValue = "";

			

			// noidung_chaohang
			$Search_offer->noidung_chaohang->HrefValue = "";

			// ten_congty
			$Search_offer->ten_congty->HrefValue = "";

			
		}

		// Call Row Rendered event
		$Search_offer->Row_Rendered();
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
