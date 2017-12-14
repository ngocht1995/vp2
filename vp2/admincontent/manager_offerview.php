<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_offerinfo.php" ?>
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
$manager_offer_view = new cmanager_offer_view();
$Page =& $manager_offer_view;

// Page init processing
$manager_offer_view->Page_Init();

// Page main processing
$manager_offer_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_offer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_offer_view = new ew_Page("manager_offer_view");

// page properties
manager_offer_view.PageID = "view"; // page ID
var EW_PAGE_ID = manager_offer_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
manager_offer_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
manager_offer_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_offer_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_offer_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="manager_offerlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($manager_offer->Export == "") { ?>


<?php if ($Security->CanDelete()) { ?>
<?php if ($manager_offer_view->ShowOptionLink()) { ?>
<a href="<?php echo $manager_offer->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
<?php $manager_offer_view->ShowMessage() ?>
<p>
<?php if ($manager_offer->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_offer_view->Pager)) $manager_offer_view->Pager = new cNumericPager($manager_offer_view->lStartRec, $manager_offer_view->lDisplayRecs, $manager_offer_view->lTotalRecs, $manager_offer_view->lRecRange) ?>
<?php if ($manager_offer_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_offer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_offer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_offer_view->sSrchWhere == "0=101") { ?>
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
<?php if ($manager_offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
	<tr<?php echo $manager_offer->tieude_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $manager_offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->tieude_chaohang->ViewAttributes() ?>><?php echo $manager_offer->tieude_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->anh_chaohang->Visible) { // anh_chaohang ?>
	<tr<?php echo $manager_offer->anh_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $manager_offer->anh_chaohang->CellAttributes() ?>>
<?php if ($manager_offer->anh_chaohang->HrefValue <> "") { ?>
<?php if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) { ?>
<a href="<?php echo $manager_offer->anh_chaohang->HrefValue ?>" target="_parent"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $manager_offer->anh_chaohang->ViewAttributes() ?>></a>
<?php } elseif (!in_array($manager_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $manager_offer->anh_chaohang->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($manager_offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
	<tr<?php echo $manager_offer->kieu_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu chào hàng</td>
		<td<?php echo $manager_offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->kieu_chaohang->ViewAttributes() ?>><?php echo $manager_offer->kieu_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->so_lanxem->Visible) { // so_lanxem ?>
	<tr<?php echo $manager_offer->so_lanxem->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $manager_offer->so_lanxem->CellAttributes() ?>>
<div<?php echo $manager_offer->nganhnghe_id->ViewAttributes() ?>><?php echo $manager_offer->so_lanxem->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<tr<?php echo $manager_offer->nganhnghe_id->RowAttributes ?>>
		<td class="ewTableHeader">Ngành nghề</td>
		<td<?php echo $manager_offer->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $manager_offer->nganhnghe_id->ViewAttributes() ?>><?php echo $manager_offer->nganhnghe_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->thoihan_tungay->Visible) { // thoihan_tungay ?>
	<tr<?php echo $manager_offer->thoihan_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Thời hạn từ ngày</td>
		<td<?php echo $manager_offer->thoihan_tungay->CellAttributes() ?>>
<div<?php echo $manager_offer->thoihan_tungay->ViewAttributes() ?>><?php echo $manager_offer->thoihan_tungay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->thoihan_denngay->Visible) { // thoihan_denngay ?>
	<tr<?php echo $manager_offer->thoihan_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Thời hạn đến ngày</td>
		<td<?php echo $manager_offer->thoihan_denngay->CellAttributes() ?>>
<div<?php echo $manager_offer->thoihan_denngay->ViewAttributes() ?>><?php echo $manager_offer->thoihan_denngay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->noidung_chaohang->Visible) { // noidung_chaohang ?>
	<tr<?php echo $manager_offer->noidung_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung chào hàng</td>
		<td<?php echo $manager_offer->noidung_chaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->noidung_chaohang->ViewAttributes() ?>><?php echo $manager_offer->noidung_chaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->tg_themchaohang->Visible) { // tg_themchaohang ?>
	<tr<?php echo $manager_offer->tg_themchaohang->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $manager_offer->tg_themchaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->tg_themchaohang->ViewAttributes() ?>><?php echo $manager_offer->tg_themchaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->tg_suachaohang->Visible) { // tg_suachaohang ?>
	<tr<?php echo $manager_offer->tg_suachaohang->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $manager_offer->tg_suachaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->tg_suachaohang->ViewAttributes() ?>><?php echo $manager_offer->tg_suachaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $manager_offer->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $manager_offer->trang_thai->CellAttributes() ?>>
<div<?php echo $manager_offer->trang_thai->ViewAttributes() ?>><?php echo $manager_offer->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $manager_offer->xuatban->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $manager_offer->xuatban->CellAttributes() ?>>
<div<?php echo $manager_offer->xuatban->ViewAttributes() ?>><?php echo $manager_offer->xuatban->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
	<tr<?php echo $manager_offer->chaohang_tieubieu->RowAttributes ?>>
		<td class="ewTableHeader">Chào hàng tiêu biểu</td>
		<td<?php echo $manager_offer->chaohang_tieubieu->CellAttributes() ?>>
<div<?php echo $manager_offer->chaohang_tieubieu->ViewAttributes() ?>><?php echo $manager_offer->chaohang_tieubieu->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->xuat_su->Visible) { // xuat_su ?>
	<tr<?php echo $manager_offer->xuat_su->RowAttributes ?>>
		<td class="ewTableHeader">Xuất sứ</td>
		<td<?php echo $manager_offer->xuat_su->CellAttributes() ?>>
<div<?php echo $manager_offer->xuat_su->ViewAttributes() ?>><?php echo $manager_offer->xuat_su->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($manager_offer->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_offer_view->Pager)) $manager_offer_view->Pager = new cNumericPager($manager_offer_view->lStartRec, $manager_offer_view->lDisplayRecs, $manager_offer_view->lTotalRecs, $manager_offer_view->lRecRange) ?>
<?php if ($manager_offer_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_offer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_offer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_view->PageUrl() ?>start=<?php echo $manager_offer_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_offer_view->sSrchWhere == "0=101") { ?>
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
<?php if ($manager_offer->Export == "") { ?>
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
class cmanager_offer_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'manager_offer';

	// Page Object Name
	var $PageObjName = 'manager_offer_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_offer;
		if ($manager_offer->UseTokenInUrl) $PageUrl .= "t=" . $manager_offer->TableVar . "&"; // add page token
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
		global $objForm, $manager_offer;
		if ($manager_offer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_offer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_offer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_offer_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_offer"] = new cmanager_offer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_offer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_offer;
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
			$this->Page_Terminate("manager_offerlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("manager_offerlist.php");
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
		global $manager_offer;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["chaohang_id"] <> "") {
				$manager_offer->chaohang_id->setQueryStringValue($_GET["chaohang_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$manager_offer->CurrentAction = "I"; // Display form
			switch ($manager_offer->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("manager_offerlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($manager_offer->chaohang_id->CurrentValue) == strval($rs->fields('chaohang_id'))) {
								$manager_offer->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "manager_offerlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "manager_offerlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$manager_offer->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_offer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_offer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_offer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_offer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_offer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_offer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_offer;

		// Call Recordset Selecting event
		$manager_offer->Recordset_Selecting($manager_offer->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_offer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_offer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_offer;
		$sFilter = $manager_offer->KeyFilter();

		// Call Row Selecting event
		$manager_offer->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_offer->CurrentFilter = $sFilter;
		$sSql = $manager_offer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_offer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_offer;
		$manager_offer->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$manager_offer->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$manager_offer->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$manager_offer->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$manager_offer->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$manager_offer->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$manager_offer->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$manager_offer->thoihan_tungay->setDbValue($rs->fields('thoihan_tungay'));
		$manager_offer->thoihan_denngay->setDbValue($rs->fields('thoihan_denngay'));
		$manager_offer->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$manager_offer->tg_themchaohang->setDbValue($rs->fields('tg_themchaohang'));
		$manager_offer->tg_suachaohang->setDbValue($rs->fields('tg_suachaohang'));
		$manager_offer->trang_thai->setDbValue($rs->fields('trang_thai'));
		$manager_offer->xuatban->setDbValue($rs->fields('xuatban'));
		$manager_offer->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
		$manager_offer->xuat_su->setDbValue($rs->fields('xuat_su'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_offer;

		// Call Row_Rendering event
		$manager_offer->Row_Rendering();

		// Common render codes for all row types
		// tieude_chaohang

		$manager_offer->tieude_chaohang->CellCssStyle = "";
		$manager_offer->tieude_chaohang->CellCssClass = "";

		// anh_chaohang
		$manager_offer->anh_chaohang->CellCssStyle = "";
		$manager_offer->anh_chaohang->CellCssClass = "";

		// kieu_chaohang
		$manager_offer->kieu_chaohang->CellCssStyle = "";
		$manager_offer->kieu_chaohang->CellCssClass = "";

		// so_lanxem
		$manager_offer->so_lanxem->CellCssStyle = "";
		$manager_offer->so_lanxem->CellCssClass = "";

		// nganhnghe_id
		$manager_offer->nganhnghe_id->CellCssStyle = "";
		$manager_offer->nganhnghe_id->CellCssClass = "";

		// thoihan_tungay
		$manager_offer->thoihan_tungay->CellCssStyle = "";
		$manager_offer->thoihan_tungay->CellCssClass = "";

		// thoihan_denngay
		$manager_offer->thoihan_denngay->CellCssStyle = "";
		$manager_offer->thoihan_denngay->CellCssClass = "";

		// noidung_chaohang
		$manager_offer->noidung_chaohang->CellCssStyle = "";
		$manager_offer->noidung_chaohang->CellCssClass = "";

		// tg_themchaohang
		$manager_offer->tg_themchaohang->CellCssStyle = "";
		$manager_offer->tg_themchaohang->CellCssClass = "";

		// tg_suachaohang
		$manager_offer->tg_suachaohang->CellCssStyle = "";
		$manager_offer->tg_suachaohang->CellCssClass = "";

		// trang_thai
		$manager_offer->trang_thai->CellCssStyle = "";
		$manager_offer->trang_thai->CellCssClass = "";

		// xuatban
		$manager_offer->xuatban->CellCssStyle = "";
		$manager_offer->xuatban->CellCssClass = "";

		// chaohang_tieubieu
		$manager_offer->chaohang_tieubieu->CellCssStyle = "";
		$manager_offer->chaohang_tieubieu->CellCssClass = "";

		// xuat_su
		$manager_offer->xuat_su->CellCssStyle = "";
		$manager_offer->xuat_su->CellCssClass = "";
		if ($manager_offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_chaohang
			$manager_offer->tieude_chaohang->ViewValue = $manager_offer->tieude_chaohang->CurrentValue;
			$manager_offer->tieude_chaohang->CssStyle = "";
			$manager_offer->tieude_chaohang->CssClass = "";
			$manager_offer->tieude_chaohang->ViewCustomAttributes = "";

			// anh_chaohang
			if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) {
				$manager_offer->anh_chaohang->ViewValue = $manager_offer->anh_chaohang->Upload->DbValue;
				$manager_offer->anh_chaohang->ImageWidth = 150;
				$manager_offer->anh_chaohang->ImageHeight = 0;
				$manager_offer->anh_chaohang->ImageAlt = "";
			} else {
				$manager_offer->anh_chaohang->ViewValue = "";
			}
			$manager_offer->anh_chaohang->CssStyle = "";
			$manager_offer->anh_chaohang->CssClass = "";
			$manager_offer->anh_chaohang->ViewCustomAttributes = "";

			// kieu_chaohang
			if (strval($manager_offer->kieu_chaohang->CurrentValue) <> "") {
				switch ($manager_offer->kieu_chaohang->CurrentValue) {
					case "1":
						$manager_offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					case "2":
						$manager_offer->kieu_chaohang->ViewValue = "Chào mua";
						break;
					default:
						$manager_offer->kieu_chaohang->ViewValue = $manager_offer->kieu_chaohang->CurrentValue;
				}
			} else {
				$manager_offer->kieu_chaohang->ViewValue = NULL;
			}
			$manager_offer->kieu_chaohang->CssStyle = "";
			$manager_offer->kieu_chaohang->CssClass = "";
			$manager_offer->kieu_chaohang->ViewCustomAttributes = "";

			// so_lanxem
			$manager_offer->so_lanxem->ViewValue = $manager_offer->so_lanxem->CurrentValue;
			$manager_offer->so_lanxem->CssStyle = "text-align:center;";
			$manager_offer->so_lanxem->CssClass = "";
			$manager_offer->so_lanxem->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($manager_offer->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($manager_offer->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_offer->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$manager_offer->nganhnghe_id->ViewValue = $manager_offer->nganhnghe_id->CurrentValue;
				}
			} else {
				$manager_offer->nganhnghe_id->ViewValue = NULL;
			}
			$manager_offer->nganhnghe_id->CssStyle = "";
			$manager_offer->nganhnghe_id->CssClass = "";
			$manager_offer->nganhnghe_id->ViewCustomAttributes = "";

			// thoihan_tungay
			$manager_offer->thoihan_tungay->ViewValue = $manager_offer->thoihan_tungay->CurrentValue;
			$manager_offer->thoihan_tungay->ViewValue = ew_FormatDateTime($manager_offer->thoihan_tungay->ViewValue, 7);
			$manager_offer->thoihan_tungay->CssStyle = "";
			$manager_offer->thoihan_tungay->CssClass = "";
			$manager_offer->thoihan_tungay->ViewCustomAttributes = "";

			// thoihan_denngay
			$manager_offer->thoihan_denngay->ViewValue = $manager_offer->thoihan_denngay->CurrentValue;
			$manager_offer->thoihan_denngay->ViewValue = ew_FormatDateTime($manager_offer->thoihan_denngay->ViewValue, 7);
			$manager_offer->thoihan_denngay->CssStyle = "";
			$manager_offer->thoihan_denngay->CssClass = "";
			$manager_offer->thoihan_denngay->ViewCustomAttributes = "";

			// noidung_chaohang
			$manager_offer->noidung_chaohang->ViewValue = $manager_offer->noidung_chaohang->CurrentValue;
			$manager_offer->noidung_chaohang->CssStyle = "";
			$manager_offer->noidung_chaohang->CssClass = "";
			$manager_offer->noidung_chaohang->ViewCustomAttributes = "";

			// tg_themchaohang
			$manager_offer->tg_themchaohang->ViewValue = $manager_offer->tg_themchaohang->CurrentValue;
			$manager_offer->tg_themchaohang->ViewValue = ew_FormatDateTime($manager_offer->tg_themchaohang->ViewValue, 7);
			$manager_offer->tg_themchaohang->CssStyle = "";
			$manager_offer->tg_themchaohang->CssClass = "";
			$manager_offer->tg_themchaohang->ViewCustomAttributes = "";

			// tg_suachaohang
			$manager_offer->tg_suachaohang->ViewValue = $manager_offer->tg_suachaohang->CurrentValue;
			$manager_offer->tg_suachaohang->ViewValue = ew_FormatDateTime($manager_offer->tg_suachaohang->ViewValue, 7);
			$manager_offer->tg_suachaohang->CssStyle = "";
			$manager_offer->tg_suachaohang->CssClass = "";
			$manager_offer->tg_suachaohang->ViewCustomAttributes = "";

			// trang_thai
			if (strval($manager_offer->trang_thai->CurrentValue) <> "") {
				switch ($manager_offer->trang_thai->CurrentValue) {
					case "1":
						$manager_offer->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$manager_offer->trang_thai->ViewValue = "Đã  kích hoạt";
						break;
					default:
						$manager_offer->trang_thai->ViewValue = $manager_offer->trang_thai->CurrentValue;
				}
			} else {
				$manager_offer->trang_thai->ViewValue = NULL;
			}
			$manager_offer->trang_thai->CssStyle = "";
			$manager_offer->trang_thai->CssClass = "";
			$manager_offer->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($manager_offer->xuatban->CurrentValue) <> "") {
				switch ($manager_offer->xuatban->CurrentValue) {
					case "0":
						$manager_offer->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$manager_offer->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$manager_offer->xuatban->ViewValue = $manager_offer->xuatban->CurrentValue;
				}
			} else {
				$manager_offer->xuatban->ViewValue = NULL;
			}
			$manager_offer->xuatban->CssStyle = "";
			$manager_offer->xuatban->CssClass = "";
			$manager_offer->xuatban->ViewCustomAttributes = "";

			// chaohang_tieubieu
			if (strval($manager_offer->chaohang_tieubieu->CurrentValue) <> "") {
				switch ($manager_offer->chaohang_tieubieu->CurrentValue) {
					case "0":
						$manager_offer->chaohang_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$manager_offer->chaohang_tieubieu->ViewValue = "Tiêu biểu";
						break;
					default:
						$manager_offer->chaohang_tieubieu->ViewValue = $manager_offer->chaohang_tieubieu->CurrentValue;
				}
			} else {
				$manager_offer->chaohang_tieubieu->ViewValue = NULL;
			}
			$manager_offer->chaohang_tieubieu->CssStyle = "";
			$manager_offer->chaohang_tieubieu->CssClass = "";
			$manager_offer->chaohang_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			$manager_offer->xuat_su->ViewValue = $manager_offer->xuat_su->CurrentValue;
			$manager_offer->xuat_su->CssStyle = "";
			$manager_offer->xuat_su->CssClass = "";
			$manager_offer->xuat_su->ViewCustomAttributes = "";

			// tieude_chaohang
			$manager_offer->tieude_chaohang->HrefValue = "";

			// anh_chaohang
			if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) {
				$manager_offer->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($manager_offer->anh_chaohang->ViewValue)) ? $manager_offer->anh_chaohang->ViewValue : $manager_offer->anh_chaohang->CurrentValue);
				if ($manager_offer->Export <> "") $manager_offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($manager_offer->anh_chaohang->HrefValue);
			} else {
				$manager_offer->anh_chaohang->HrefValue = "";
			}

			// kieu_chaohang
			$manager_offer->kieu_chaohang->HrefValue = "";

			// so_lanxem
			$manager_offer->so_lanxem->HrefValue = "";

			// nganhnghe_id
			$manager_offer->nganhnghe_id->HrefValue = "";

			// thoihan_tungay
			$manager_offer->thoihan_tungay->HrefValue = "";

			// thoihan_denngay
			$manager_offer->thoihan_denngay->HrefValue = "";

			// noidung_chaohang
			$manager_offer->noidung_chaohang->HrefValue = "";

			// tg_themchaohang
			$manager_offer->tg_themchaohang->HrefValue = "";

			// tg_suachaohang
			$manager_offer->tg_suachaohang->HrefValue = "";

			// trang_thai
			$manager_offer->trang_thai->HrefValue = "";

			// xuatban
			$manager_offer->xuatban->HrefValue = "";

			// chaohang_tieubieu
			$manager_offer->chaohang_tieubieu->HrefValue = "";

			// xuat_su
			$manager_offer->xuat_su->HrefValue = "";
		}

		// Call Row Rendered event
		$manager_offer->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $manager_offer;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($manager_offer->nguoidung_id->CurrentValue);
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
