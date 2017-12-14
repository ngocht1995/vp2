<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "offerinfo.php" ?>
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
$offer_view = new coffer_view();
$Page =& $offer_view;

// Page init processing
$offer_view->Page_Init();

// Page main processing
$offer_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($offer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var offer_view = new ew_Page("offer_view");

// page properties
offer_view.PageID = "view"; // page ID
var EW_PAGE_ID = offer_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
offer_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
offer_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
offer_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
offer_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="offerlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($offer->Export == "") { ?>
<?php if ($Security->CanAdd()) { ?>
<?php if ($offer_view->ShowOptionLink()) { ?>
<a href="<?php echo $offer->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<?php if ($offer_view->ShowOptionLink()) { ?>
<a href="<?php echo $offer->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<?php if ($offer_view->ShowOptionLink()) { ?>
<a href="<?php echo $offer->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $offer_view->ShowMessage() ?>
<p>
<?php if ($offer->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($offer_view->Pager)) $offer_view->Pager = new cNumericPager($offer_view->lStartRec, $offer_view->lDisplayRecs, $offer_view->lTotalRecs, $offer_view->lRecRange) ?>
<?php if ($offer_view->Pager->RecordCount > 0) { ?>
	<?php if ($offer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($offer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($offer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($offer_view->sSrchWhere == "0=101") { ?>
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
<?php if ($offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
	<tr<?php echo $offer->tieude_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $offer->tieude_chaohang->ViewAttributes() ?>><?php echo $offer->tieude_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->anh_chaohang->Visible) { // anh_chaohang ?>
	<tr<?php echo $offer->anh_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $offer->anh_chaohang->CellAttributes() ?>>
<?php if ($offer->anh_chaohang->HrefValue <> "") { ?>
<?php if (!is_null($offer->anh_chaohang->Upload->DbValue)) { ?>
<a href="<?php echo $offer->anh_chaohang->HrefValue ?>" target="_parent"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $offer->anh_chaohang->ViewAttributes() ?>></a>
<?php } elseif (!in_array($offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($offer->anh_chaohang->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $offer->anh_chaohang->ViewAttributes() ?>>
<?php } elseif (!in_array($offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
	<tr<?php echo $offer->kieu_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu chào hàng</td>
		<td<?php echo $offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $offer->kieu_chaohang->ViewAttributes() ?>><?php echo $offer->kieu_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->so_lanxem->Visible) { // so_lanxem ?>
	<tr<?php echo $offer->so_lanxem->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $offer->so_lanxem->CellAttributes() ?>>
<div<?php echo $offer->nganhnghe_id->ViewAttributes() ?>><?php echo $offer->so_lanxem->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<tr<?php echo $offer->nganhnghe_id->RowAttributes ?>>
		<td class="ewTableHeader">Ngành nghề</td>
		<td<?php echo $offer->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $offer->nganhnghe_id->ViewAttributes() ?>><?php echo $offer->nganhnghe_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->thoihan_tungay->Visible) { // thoihan_tungay ?>
	<tr<?php echo $offer->thoihan_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Thời hạn từ ngày</td>
		<td<?php echo $offer->thoihan_tungay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_tungay->ViewAttributes() ?>><?php echo $offer->thoihan_tungay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->thoihan_denngay->Visible) { // thoihan_denngay ?>
	<tr<?php echo $offer->thoihan_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Thời hạn đến ngày</td>
		<td<?php echo $offer->thoihan_denngay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_denngay->ViewAttributes() ?>><?php echo $offer->thoihan_denngay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->noidung_chaohang->Visible) { // noidung_chaohang ?>
	<tr<?php echo $offer->noidung_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung chào hàng</td>
		<td<?php echo $offer->noidung_chaohang->CellAttributes() ?>>
<div<?php echo $offer->noidung_chaohang->ViewAttributes() ?>><?php echo $offer->noidung_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->tg_themchaohang->Visible) { // tg_themchaohang ?>
	<tr<?php echo $offer->tg_themchaohang->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $offer->tg_themchaohang->CellAttributes() ?>>
<div<?php echo $offer->tg_themchaohang->ViewAttributes() ?>><?php echo $offer->tg_themchaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->tg_suachaohang->Visible) { // tg_suachaohang ?>
	<tr<?php echo $offer->tg_suachaohang->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $offer->tg_suachaohang->CellAttributes() ?>>
<div<?php echo $offer->tg_suachaohang->ViewAttributes() ?>><?php echo $offer->tg_suachaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $offer->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $offer->trang_thai->CellAttributes() ?>>
<div<?php echo $offer->trang_thai->ViewAttributes() ?>><?php echo $offer->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $offer->xuatban->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $offer->xuatban->CellAttributes() ?>>
<div<?php echo $offer->xuatban->ViewAttributes() ?>><?php echo $offer->xuatban->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
	<tr<?php echo $offer->chaohang_tieubieu->RowAttributes ?>>
		<td class="ewTableHeader">Chào hàng tiêu biểu</td>
		<td<?php echo $offer->chaohang_tieubieu->CellAttributes() ?>>
<div<?php echo $offer->chaohang_tieubieu->ViewAttributes() ?>><?php echo $offer->chaohang_tieubieu->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($offer->xuat_su->Visible) { // xuat_su ?>
	<tr<?php echo $offer->xuat_su->RowAttributes ?>>
		<td class="ewTableHeader">Xuất sứ</td>
		<td<?php echo $offer->xuat_su->CellAttributes() ?>>
<div<?php echo $offer->xuat_su->ViewAttributes() ?>><?php echo $offer->xuat_su->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($offer->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($offer_view->Pager)) $offer_view->Pager = new cNumericPager($offer_view->lStartRec, $offer_view->lDisplayRecs, $offer_view->lTotalRecs, $offer_view->lRecRange) ?>
<?php if ($offer_view->Pager->RecordCount > 0) { ?>
	<?php if ($offer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($offer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($offer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $offer_view->PageUrl() ?>start=<?php echo $offer_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($offer_view->sSrchWhere == "0=101") { ?>
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
<?php if ($offer->Export == "") { ?>
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
class coffer_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'offer';

	// Page Object Name
	var $PageObjName = 'offer_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $offer;
		if ($offer->UseTokenInUrl) $PageUrl .= "t=" . $offer->TableVar . "&"; // add page token
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
		global $objForm, $offer;
		if ($offer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($offer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($offer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function coffer_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["offer"] = new coffer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'offer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $offer;
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
			$this->Page_Terminate("offerlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("offerlist.php");
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
		global $offer;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["chaohang_id"] <> "") {
				$offer->chaohang_id->setQueryStringValue($_GET["chaohang_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$offer->CurrentAction = "I"; // Display form
			switch ($offer->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("offerlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($offer->chaohang_id->CurrentValue) == strval($rs->fields('chaohang_id'))) {
								$offer->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "offerlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "offerlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$offer->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $offer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$offer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$offer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $offer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$offer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$offer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $offer;

		// Call Recordset Selecting event
		$offer->Recordset_Selecting($offer->CurrentFilter);

		// Load list page SQL
		$sSql = $offer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$offer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $offer;
		$sFilter = $offer->KeyFilter();

		// Call Row Selecting event
		$offer->Row_Selecting($sFilter);

		// Load sql based on filter
		$offer->CurrentFilter = $sFilter;
		$sSql = $offer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$offer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $offer;
		$offer->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$offer->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$offer->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$offer->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$offer->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$offer->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$offer->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$offer->thoihan_tungay->setDbValue($rs->fields('thoihan_tungay'));
		$offer->thoihan_denngay->setDbValue($rs->fields('thoihan_denngay'));
		$offer->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$offer->tg_themchaohang->setDbValue($rs->fields('tg_themchaohang'));
		$offer->tg_suachaohang->setDbValue($rs->fields('tg_suachaohang'));
		$offer->trang_thai->setDbValue($rs->fields('trang_thai'));
		$offer->xuatban->setDbValue($rs->fields('xuatban'));
		$offer->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
		$offer->xuat_su->setDbValue($rs->fields('xuat_su'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $offer;

		// Call Row_Rendering event
		$offer->Row_Rendering();

		// Common render codes for all row types
		// tieude_chaohang

		$offer->tieude_chaohang->CellCssStyle = "";
		$offer->tieude_chaohang->CellCssClass = "";

		// anh_chaohang
		$offer->anh_chaohang->CellCssStyle = "";
		$offer->anh_chaohang->CellCssClass = "";

		// kieu_chaohang
		$offer->kieu_chaohang->CellCssStyle = "";
		$offer->kieu_chaohang->CellCssClass = "";

		// so_lanxem
		$offer->so_lanxem->CellCssStyle = "";
		$offer->so_lanxem->CellCssClass = "";

		// nganhnghe_id
		$offer->nganhnghe_id->CellCssStyle = "";
		$offer->nganhnghe_id->CellCssClass = "";

		// thoihan_tungay
		$offer->thoihan_tungay->CellCssStyle = "";
		$offer->thoihan_tungay->CellCssClass = "";

		// thoihan_denngay
		$offer->thoihan_denngay->CellCssStyle = "";
		$offer->thoihan_denngay->CellCssClass = "";

		// noidung_chaohang
		$offer->noidung_chaohang->CellCssStyle = "";
		$offer->noidung_chaohang->CellCssClass = "";

		// tg_themchaohang
		$offer->tg_themchaohang->CellCssStyle = "";
		$offer->tg_themchaohang->CellCssClass = "";

		// tg_suachaohang
		$offer->tg_suachaohang->CellCssStyle = "";
		$offer->tg_suachaohang->CellCssClass = "";

		// trang_thai
		$offer->trang_thai->CellCssStyle = "";
		$offer->trang_thai->CellCssClass = "";

		// xuatban
		$offer->xuatban->CellCssStyle = "";
		$offer->xuatban->CellCssClass = "";

		// chaohang_tieubieu
		$offer->chaohang_tieubieu->CellCssStyle = "";
		$offer->chaohang_tieubieu->CellCssClass = "";

		// xuat_su
		$offer->xuat_su->CellCssStyle = "";
		$offer->xuat_su->CellCssClass = "";
		if ($offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_chaohang
			$offer->tieude_chaohang->ViewValue = $offer->tieude_chaohang->CurrentValue;
			$offer->tieude_chaohang->CssStyle = "";
			$offer->tieude_chaohang->CssClass = "";
			$offer->tieude_chaohang->ViewCustomAttributes = "";

			// anh_chaohang
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->ViewValue = $offer->anh_chaohang->Upload->DbValue;
				$offer->anh_chaohang->ImageWidth = 150;
				$offer->anh_chaohang->ImageHeight = 0;
				$offer->anh_chaohang->ImageAlt = "";
			} else {
				$offer->anh_chaohang->ViewValue = "";
			}
			$offer->anh_chaohang->CssStyle = "";
			$offer->anh_chaohang->CssClass = "";
			$offer->anh_chaohang->ViewCustomAttributes = "";

			// kieu_chaohang
			if (strval($offer->kieu_chaohang->CurrentValue) <> "") {
				switch ($offer->kieu_chaohang->CurrentValue) {
					case "1":
						$offer->kieu_chaohang->ViewValue = "Chào mua";
						break;
					case "2":
						$offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					default:
						$offer->kieu_chaohang->ViewValue = $offer->kieu_chaohang->CurrentValue;
				}
			} else {
				$offer->kieu_chaohang->ViewValue = NULL;
			}
			$offer->kieu_chaohang->CssStyle = "";
			$offer->kieu_chaohang->CssClass = "";
			$offer->kieu_chaohang->ViewCustomAttributes = "";

			// so_lanxem
			$offer->so_lanxem->ViewValue = $offer->so_lanxem->CurrentValue;
			$offer->so_lanxem->CssStyle = "text-align:center;";
			$offer->so_lanxem->CssClass = "";
			$offer->so_lanxem->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($offer->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($offer->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$offer->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$offer->nganhnghe_id->ViewValue = $offer->nganhnghe_id->CurrentValue;
				}
			} else {
				$offer->nganhnghe_id->ViewValue = NULL;
			}
			$offer->nganhnghe_id->CssStyle = "";
			$offer->nganhnghe_id->CssClass = "";
			$offer->nganhnghe_id->ViewCustomAttributes = "";

			// thoihan_tungay
			$offer->thoihan_tungay->ViewValue = $offer->thoihan_tungay->CurrentValue;
			$offer->thoihan_tungay->ViewValue = ew_FormatDateTime($offer->thoihan_tungay->ViewValue, 7);
			$offer->thoihan_tungay->CssStyle = "";
			$offer->thoihan_tungay->CssClass = "";
			$offer->thoihan_tungay->ViewCustomAttributes = "";

			// thoihan_denngay
			$offer->thoihan_denngay->ViewValue = $offer->thoihan_denngay->CurrentValue;
			$offer->thoihan_denngay->ViewValue = ew_FormatDateTime($offer->thoihan_denngay->ViewValue, 7);
			$offer->thoihan_denngay->CssStyle = "";
			$offer->thoihan_denngay->CssClass = "";
			$offer->thoihan_denngay->ViewCustomAttributes = "";

			// noidung_chaohang
			$offer->noidung_chaohang->ViewValue = $offer->noidung_chaohang->CurrentValue;
			$offer->noidung_chaohang->CssStyle = "";
			$offer->noidung_chaohang->CssClass = "";
			$offer->noidung_chaohang->ViewCustomAttributes = "";

			// tg_themchaohang
			$offer->tg_themchaohang->ViewValue = $offer->tg_themchaohang->CurrentValue;
			$offer->tg_themchaohang->ViewValue = ew_FormatDateTime($offer->tg_themchaohang->ViewValue, 7);
			$offer->tg_themchaohang->CssStyle = "";
			$offer->tg_themchaohang->CssClass = "";
			$offer->tg_themchaohang->ViewCustomAttributes = "";

			// tg_suachaohang
			$offer->tg_suachaohang->ViewValue = $offer->tg_suachaohang->CurrentValue;
			$offer->tg_suachaohang->ViewValue = ew_FormatDateTime($offer->tg_suachaohang->ViewValue, 7);
			$offer->tg_suachaohang->CssStyle = "";
			$offer->tg_suachaohang->CssClass = "";
			$offer->tg_suachaohang->ViewCustomAttributes = "";

			// trang_thai
			if (strval($offer->trang_thai->CurrentValue) <> "") {
				switch ($offer->trang_thai->CurrentValue) {
					case "1":
						$offer->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$offer->trang_thai->ViewValue = "Đã  kích hoạt";
						break;
					default:
						$offer->trang_thai->ViewValue = $offer->trang_thai->CurrentValue;
				}
			} else {
				$offer->trang_thai->ViewValue = NULL;
			}
			$offer->trang_thai->CssStyle = "";
			$offer->trang_thai->CssClass = "";
			$offer->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($offer->xuatban->CurrentValue) <> "") {
				switch ($offer->xuatban->CurrentValue) {
					case "0":
						$offer->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$offer->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$offer->xuatban->ViewValue = $offer->xuatban->CurrentValue;
				}
			} else {
				$offer->xuatban->ViewValue = NULL;
			}
			$offer->xuatban->CssStyle = "";
			$offer->xuatban->CssClass = "";
			$offer->xuatban->ViewCustomAttributes = "";

			// chaohang_tieubieu
			if (strval($offer->chaohang_tieubieu->CurrentValue) <> "") {
				switch ($offer->chaohang_tieubieu->CurrentValue) {
					case "0":
						$offer->chaohang_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$offer->chaohang_tieubieu->ViewValue = "Tiêu biểu";
						break;
					default:
						$offer->chaohang_tieubieu->ViewValue = $offer->chaohang_tieubieu->CurrentValue;
				}
			} else {
				$offer->chaohang_tieubieu->ViewValue = NULL;
			}
			$offer->chaohang_tieubieu->CssStyle = "";
			$offer->chaohang_tieubieu->CssClass = "";
			$offer->chaohang_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			$offer->xuat_su->ViewValue = $offer->xuat_su->CurrentValue;
			$offer->xuat_su->CssStyle = "";
			$offer->xuat_su->CssClass = "";
			$offer->xuat_su->ViewCustomAttributes = "";

			// tieude_chaohang
			$offer->tieude_chaohang->HrefValue = "";

			// anh_chaohang
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($offer->anh_chaohang->ViewValue)) ? $offer->anh_chaohang->ViewValue : $offer->anh_chaohang->CurrentValue);
				if ($offer->Export <> "") $offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($offer->anh_chaohang->HrefValue);
			} else {
				$offer->anh_chaohang->HrefValue = "";
			}

			// kieu_chaohang
			$offer->kieu_chaohang->HrefValue = "";

			// so_lanxem
			$offer->so_lanxem->HrefValue = "";

			// nganhnghe_id
			$offer->nganhnghe_id->HrefValue = "";

			// thoihan_tungay
			$offer->thoihan_tungay->HrefValue = "";

			// thoihan_denngay
			$offer->thoihan_denngay->HrefValue = "";

			// noidung_chaohang
			$offer->noidung_chaohang->HrefValue = "";

			// tg_themchaohang
			$offer->tg_themchaohang->HrefValue = "";

			// tg_suachaohang
			$offer->tg_suachaohang->HrefValue = "";

			// trang_thai
			$offer->trang_thai->HrefValue = "";

			// xuatban
			$offer->xuatban->HrefValue = "";

			// chaohang_tieubieu
			$offer->chaohang_tieubieu->HrefValue = "";

			// xuat_su
			$offer->xuat_su->HrefValue = "";
		}

		// Call Row Rendered event
		$offer->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $offer;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($offer->nguoidung_id->CurrentValue);
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
