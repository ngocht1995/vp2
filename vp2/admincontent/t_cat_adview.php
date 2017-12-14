<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_cat_adinfo.php" ?>
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
$t_cat_ad_view = new ct_cat_ad_view();
$Page =& $t_cat_ad_view;

// Page init processing
$t_cat_ad_view->Page_Init();

// Page main processing
$t_cat_ad_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_cat_ad->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_cat_ad_view = new ew_Page("t_cat_ad_view");

// page properties
t_cat_ad_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_cat_ad_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_cat_ad_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_cat_ad_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_cat_ad_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_cat_ad_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">
        <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_cat_adlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin chuyên mục</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>
    
<br><br>
<?php if ($t_cat_ad->Export == "") { ?>
<a href="<?php echo $t_cat_ad->AddUrl() ?>">Thêm</a>&nbsp;
<a href="<?php echo $t_cat_ad->EditUrl() ?>">Sửa</a>&nbsp;
<a href="<?php echo $t_cat_ad->CopyUrl() ?>">Sao chép</a>&nbsp;
<a href="<?php echo $t_cat_ad->DeleteUrl() ?>">Xóa</a>&nbsp;
<?php } ?>
</span></p>
<?php $t_cat_ad_view->ShowMessage() ?>
<p>
<?php if ($t_cat_ad->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_ad_view->Pager)) $t_cat_ad_view->Pager = new cNumericPager($t_cat_ad_view->lStartRec, $t_cat_ad_view->lDisplayRecs, $t_cat_ad_view->lTotalRecs, $t_cat_ad_view->lRecRange) ?>
<?php if ($t_cat_ad_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_ad_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_ad_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_cat_ad_view->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm!
	<?php } else { ?>
	Không tìm thấy bản ghi nào
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
<?php if ($t_cat_ad->ad_catID->Visible) { // ad_catID ?>
	<tr<?php echo $t_cat_ad->ad_catID->RowAttributes ?>>
		<td class="ewTableHeader">Ad Cat ID</td>
		<td<?php echo $t_cat_ad->ad_catID->CellAttributes() ?>>
<div<?php echo $t_cat_ad->ad_catID->ViewAttributes() ?>><?php echo $t_cat_ad->ad_catID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_cat_ad->parentid->Visible) { // parentid ?>
	<tr<?php echo $t_cat_ad->parentid->RowAttributes ?>>
		<td class="ewTableHeader">Thuộc chuyên mục</td>
		<td<?php echo $t_cat_ad->parentid->CellAttributes() ?>>
<div<?php echo $t_cat_ad->parentid->ViewAttributes() ?>><?php echo $t_cat_ad->parentid->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_cat_ad->name->Visible) { // name ?>
	<tr<?php echo $t_cat_ad->name->RowAttributes ?>>
		<td class="ewTableHeader">Tên</td>
		<td<?php echo $t_cat_ad->name->CellAttributes() ?>>
<div<?php echo $t_cat_ad->name->ViewAttributes() ?>><?php echo $t_cat_ad->name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_cat_ad->cat_order->Visible) { // cat_order ?>
	<tr<?php echo $t_cat_ad->cat_order->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự</td>
		<td<?php echo $t_cat_ad->cat_order->CellAttributes() ?>>
<div<?php echo $t_cat_ad->cat_order->ViewAttributes() ?>><?php echo $t_cat_ad->cat_order->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($t_cat_ad->cat_descript->Visible) { // cat_descript ?>
	<tr<?php echo $t_cat_ad->cat_descript->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả</td>
		<td<?php echo $t_cat_ad->cat_descript->CellAttributes() ?>>
<div<?php echo $t_cat_ad->cat_descript->ViewAttributes() ?>><?php echo $t_cat_ad->cat_descript->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_cat_ad->status->Visible) { // status ?>
<tr<?php echo $t_cat_ad->status->RowAttributes ?>>
        <td class="ewTableHeader">Trạng thái</td>
        <td<?php echo $t_cat_ad->status->CellAttributes() ?>>
<div<?php echo $t_cat_ad->status->ViewAttributes() ?>><?php echo $t_cat_ad->status->ViewValue ?></div></td>
</tr>
<?php } ?>
<?php if ($t_cat_ad->cat_icon->Visible) { // cat_icon ?>
	<tr<?php echo $t_cat_ad->cat_icon->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh đại diện</td>
		<td<?php echo $t_cat_ad->cat_icon->CellAttributes() ?>>
<?php if ($t_cat_ad->cat_icon->HrefValue <> "") { ?>
<?php if (!is_null($t_cat_ad->cat_icon->Upload->DbValue)) { ?>
<a href="<?php echo $t_cat_ad->cat_icon->HrefValue ?>"><?php echo $t_cat_ad->cat_icon->ViewValue ?></a>
<?php } elseif (!in_array($t_cat_ad->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($t_cat_ad->cat_icon->Upload->DbValue)) { ?>
<?php echo $t_cat_ad->cat_icon->ViewValue ?>
<?php } elseif (!in_array($t_cat_ad->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_cat_ad->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_ad_view->Pager)) $t_cat_ad_view->Pager = new cNumericPager($t_cat_ad_view->lStartRec, $t_cat_ad_view->lDisplayRecs, $t_cat_ad_view->lTotalRecs, $t_cat_ad_view->lRecRange) ?>
<?php if ($t_cat_ad_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_ad_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_ad_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_view->PageUrl() ?>start=<?php echo $t_cat_ad_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_cat_ad_view->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không tìm thấy bản ghi!
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_cat_ad->Export == "") { ?>
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
class ct_cat_ad_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_cat_ad';

	// Page Object Name
	var $PageObjName = 't_cat_ad_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_cat_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_cat_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_cat_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_cat_ad_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_ad"] = new ct_cat_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_cat_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_cat_ad;
	$t_cat_ad->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_cat_ad->Export; // Get export parameter, used in header
	$gsExportFile = $t_cat_ad->TableVar; // Get export file, used in header
	if (@$_GET["ad_catID"] <> "") {
		if ($gsExportFile <> "") $gsExportFile .= "_";
		$gsExportFile .= ew_StripSlashes($_GET["ad_catID"]);
	}
	if ($t_cat_ad->Export == "print" || $t_cat_ad->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_cat_ad->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_cat_ad->Export == "word") {
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
		global $t_cat_ad;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["ad_catID"] <> "") {
				$t_cat_ad->ad_catID->setQueryStringValue($_GET["ad_catID"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_cat_ad->CurrentAction = "I"; // Display form
			switch ($t_cat_ad->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_cat_adlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_cat_ad->ad_catID->CurrentValue) == strval($rs->fields('ad_catID'))) {
								$t_cat_ad->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_cat_adlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if ($t_cat_ad->Export == "html" || $t_cat_ad->Export == "csv" ||
				$t_cat_ad->Export == "word" || $t_cat_ad->Export == "excel" ||
				$t_cat_ad->Export == "xml") {
				$this->ExportData();
				$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_cat_adlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_cat_ad->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_cat_ad;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_cat_ad->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_cat_ad->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_cat_ad->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_cat_ad;

		// Call Recordset Selecting event
		$t_cat_ad->Recordset_Selecting($t_cat_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $t_cat_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_cat_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_cat_ad;
		$sFilter = $t_cat_ad->KeyFilter();

		// Call Row Selecting event
		$t_cat_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_cat_ad->CurrentFilter = $sFilter;
		$sSql = $t_cat_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_cat_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_cat_ad;
		$t_cat_ad->ad_catID->setDbValue($rs->fields('ad_catID'));
		$t_cat_ad->parentid->setDbValue($rs->fields('parentid'));
		$t_cat_ad->name->setDbValue($rs->fields('name'));
		$t_cat_ad->cat_order->setDbValue($rs->fields('cat_order'));
		$t_cat_ad->status->setDbValue($rs->fields('status'));
		$t_cat_ad->cat_descript->setDbValue($rs->fields('cat_descript'));
		$t_cat_ad->cat_icon->Upload->DbValue = $rs->fields('cat_icon');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_cat_ad;

		// Call Row_Rendering event
		$t_cat_ad->Row_Rendering();

		// Common render codes for all row types
		// ad_catID

		$t_cat_ad->ad_catID->CellCssStyle = "";
		$t_cat_ad->ad_catID->CellCssClass = "";

		// parentid
		$t_cat_ad->parentid->CellCssStyle = "";
		$t_cat_ad->parentid->CellCssClass = "";

		// name
		$t_cat_ad->name->CellCssStyle = "";
		$t_cat_ad->name->CellCssClass = "";

		// cat_order
		$t_cat_ad->cat_order->CellCssStyle = "";
		$t_cat_ad->cat_order->CellCssClass = "";

		// status
		$t_cat_ad->status->CellCssStyle = "";
		$t_cat_ad->status->CellCssClass = "";

		// cat_descript
		$t_cat_ad->cat_descript->CellCssStyle = "";
		$t_cat_ad->cat_descript->CellCssClass = "";

		// cat_icon
		$t_cat_ad->cat_icon->CellCssStyle = "";
		$t_cat_ad->cat_icon->CellCssClass = "";
		if ($t_cat_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_catID
			$t_cat_ad->ad_catID->ViewValue = $t_cat_ad->ad_catID->CurrentValue;
			$t_cat_ad->ad_catID->CssStyle = "";
			$t_cat_ad->ad_catID->CssClass = "";
			$t_cat_ad->ad_catID->ViewCustomAttributes = "";

			// parentid
			if (strval($t_cat_ad->parentid->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_cat_ad->parentid->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_cat_ad->parentid->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_cat_ad->parentid->ViewValue = $t_cat_ad->parentid->CurrentValue;
				}
			} else {
				$t_cat_ad->parentid->ViewValue = NULL;
			}
			$t_cat_ad->parentid->CssStyle = "";
			$t_cat_ad->parentid->CssClass = "";
			$t_cat_ad->parentid->ViewCustomAttributes = "";

			// name
			$t_cat_ad->name->ViewValue = $t_cat_ad->name->CurrentValue;
			$t_cat_ad->name->CssStyle = "";
			$t_cat_ad->name->CssClass = "";
			$t_cat_ad->name->ViewCustomAttributes = "";

			// cat_order
			$t_cat_ad->cat_order->ViewValue = $t_cat_ad->cat_order->CurrentValue;
			$t_cat_ad->cat_order->CssStyle = "";
			$t_cat_ad->cat_order->CssClass = "";
			$t_cat_ad->cat_order->ViewCustomAttributes = "";

			// status
			if (strval($t_cat_ad->status->CurrentValue) <> "") {
				switch ($t_cat_ad->status->CurrentValue) {
					case "0":
						$t_cat_ad->status->ViewValue = "Chua";
						break;
					case "1":
						$t_cat_ad->status->ViewValue = "K�ch ho?t";
						break;
					default:
						$t_cat_ad->status->ViewValue = $t_cat_ad->status->CurrentValue;
				}
			} else {
				$t_cat_ad->status->ViewValue = NULL;
			}
			$t_cat_ad->status->CssStyle = "";
			$t_cat_ad->status->CssClass = "";
			$t_cat_ad->status->ViewCustomAttributes = "";

			// cat_descript
			$t_cat_ad->cat_descript->ViewValue = $t_cat_ad->cat_descript->CurrentValue;
			$t_cat_ad->cat_descript->CssStyle = "";
			$t_cat_ad->cat_descript->CssClass = "";
			$t_cat_ad->cat_descript->ViewCustomAttributes = "";

			// cat_icon
			if (!is_null($t_cat_ad->cat_icon->Upload->DbValue)) {
				$t_cat_ad->cat_icon->ViewValue = $t_cat_ad->cat_icon->Upload->DbValue;
			} else {
				$t_cat_ad->cat_icon->ViewValue = "";
			}
			$t_cat_ad->cat_icon->CssStyle = "";
			$t_cat_ad->cat_icon->CssClass = "";
			$t_cat_ad->cat_icon->ViewCustomAttributes = "";

			// ad_catID
			$t_cat_ad->ad_catID->HrefValue = "";

			// parentid
			$t_cat_ad->parentid->HrefValue = "";

			// name
			$t_cat_ad->name->HrefValue = "";

			// cat_order
			$t_cat_ad->cat_order->HrefValue = "";

			// status
			$t_cat_ad->status->HrefValue = "";

			// cat_descript
			$t_cat_ad->cat_descript->HrefValue = "";

			// cat_icon
			if (!is_null($t_cat_ad->cat_icon->Upload->DbValue)) {
				$t_cat_ad->cat_icon->HrefValue = ew_UploadPathEx(FALSE, "upload/iconcat_ad/") . ((!empty($t_cat_ad->cat_icon->ViewValue)) ? $t_cat_ad->cat_icon->ViewValue : $t_cat_ad->cat_icon->CurrentValue);
				if ($t_cat_ad->Export <> "") $t_cat_ad->cat_icon->HrefValue = ew_ConvertFullUrl($t_cat_ad->cat_icon->HrefValue);
			} else {
				$t_cat_ad->cat_icon->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$t_cat_ad->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_cat_ad;
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
		if ($t_cat_ad->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_cat_ad->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_cat_ad->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'ad_catID', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'parentid', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'name', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'cat_order', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'status', $t_cat_ad->Export);
				echo ew_ExportLine($sExportStr, $t_cat_ad->Export);
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
				$t_cat_ad->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_cat_ad->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('ad_catID', $t_cat_ad->ad_catID->CurrentValue);
					$XmlDoc->AddField('parentid', $t_cat_ad->parentid->CurrentValue);
					$XmlDoc->AddField('name', $t_cat_ad->name->CurrentValue);
					$XmlDoc->AddField('cat_order', $t_cat_ad->cat_order->CurrentValue);
					$XmlDoc->AddField('status', $t_cat_ad->status->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_cat_ad->Export <> "csv") { // Vertical format
						echo ew_ExportField('ad_catID', $t_cat_ad->ad_catID->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('parentid', $t_cat_ad->parentid->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('name', $t_cat_ad->name->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('cat_order', $t_cat_ad->cat_order->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('status', $t_cat_ad->status->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_cat_ad->ad_catID->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->parentid->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->name->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->cat_order->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->status->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportLine($sExportStr, $t_cat_ad->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_cat_ad->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_cat_ad->Export);
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
