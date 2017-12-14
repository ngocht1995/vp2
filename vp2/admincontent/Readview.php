<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Readinfo.php" ?>
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
$Read_view = new cRead_view();
$Page =& $Read_view;

// Page init processing
$Read_view->Page_Init();

// Page main processing
$Read_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($Read->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var Read_view = new ew_Page("Read_view");

// page properties
Read_view.PageID = "view"; // page ID
var EW_PAGE_ID = Read_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
Read_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Read_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Read_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Read_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="Readlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nội dung thư liên hệ</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table><br>
<?php if ($Read->Export == "") { ?>

<?php if ($Security->CanDelete()) { ?>
<?php if ($Read_view->ShowOptionLink()) { ?>
<a href="<?php echo $Read->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $Read_view->ShowMessage() ?>
<p>
<?php if ($Read->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Read_view->Pager)) $Read_view->Pager = new cNumericPager($Read_view->lStartRec, $Read_view->lDisplayRecs, $Read_view->lTotalRecs, $Read_view->lRecRange) ?>
<?php if ($Read_view->Pager->RecordCount > 0) { ?>
	<?php if ($Read_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Read_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Read_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Read_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có thư
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
<?php if ($Read->tieu_de->Visible) { // tieu_de ?>
	<tr<?php echo $Read->tieu_de->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $Read->tieu_de->CellAttributes() ?>>
<div<?php echo $Read->tieu_de->ViewAttributes() ?>><?php echo $Read->tieu_de->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->noidung_lienhe->Visible) { // noidung_lienhe ?>
	<tr<?php echo $Read->noidung_lienhe->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $Read->noidung_lienhe->CellAttributes() ?>>
<div<?php echo $Read->noidung_lienhe->ViewAttributes() ?>><?php echo $Read->noidung_lienhe->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->nguoi_lienhe->Visible) { // nguoi_lienhe ?>
	<tr<?php echo $Read->nguoi_lienhe->RowAttributes ?>>
		<td class="ewTableHeader">Người liên hệ</td>
		<td<?php echo $Read->nguoi_lienhe->CellAttributes() ?>>
<div<?php echo $Read->nguoi_lienhe->ViewAttributes() ?>><?php echo $Read->nguoi_lienhe->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $Read->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $Read->gioi_tinh->CellAttributes() ?>>
<div<?php echo $Read->gioi_tinh->ViewAttributes() ?>><?php echo $Read->gioi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $Read->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $Read->quocgia_id->CellAttributes() ?>>
<div<?php echo $Read->quocgia_id->ViewAttributes() ?>><?php echo $Read->quocgia_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->diachi_email->Visible) { // diachi_email ?>
	<tr<?php echo $Read->diachi_email->RowAttributes ?>>
		<td class="ewTableHeader">Email</td>
		<td<?php echo $Read->diachi_email->CellAttributes() ?>>
<div<?php echo $Read->diachi_email->ViewAttributes() ?>><?php echo $Read->diachi_email->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->ma_quocgia_tel->Visible) { // ma_quocgia_tel ?>
	<tr<?php echo $Read->ma_quocgia_tel->RowAttributes ?>>
		<td class="ewTableHeader">Mã ĐT quốc gia</td>
		<td<?php echo $Read->ma_quocgia_tel->CellAttributes() ?>>
<div<?php echo $Read->ma_quocgia_tel->ViewAttributes() ?>><?php echo $Read->ma_quocgia_tel->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->ma_vung_tel->Visible) { // ma_vung_tel ?>
	<tr<?php echo $Read->ma_vung_tel->RowAttributes ?>>
		<td class="ewTableHeader">Mã ĐT vùng</td>
		<td<?php echo $Read->ma_vung_tel->CellAttributes() ?>>
<div<?php echo $Read->ma_vung_tel->ViewAttributes() ?>><?php echo $Read->ma_vung_tel->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->so_dienthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $Read->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại</td>
		<td<?php echo $Read->so_dienthoai->CellAttributes() ?>>
<div<?php echo $Read->so_dienthoai->ViewAttributes() ?>><?php echo $Read->so_dienthoai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->ma_quocgia_fax->Visible) { // ma_quocgia_fax ?>
	<tr<?php echo $Read->ma_quocgia_fax->RowAttributes ?>>
		<td class="ewTableHeader">Mã Fax quốc gia</td>
		<td<?php echo $Read->ma_quocgia_fax->CellAttributes() ?>>
<div<?php echo $Read->ma_quocgia_fax->ViewAttributes() ?>><?php echo $Read->ma_quocgia_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->ma_vung_fax->Visible) { // ma_vung_fax ?>
	<tr<?php echo $Read->ma_vung_fax->RowAttributes ?>>
		<td class="ewTableHeader">Mã Fax vùng</td>
		<td<?php echo $Read->ma_vung_fax->CellAttributes() ?>>
<div<?php echo $Read->ma_vung_fax->ViewAttributes() ?>><?php echo $Read->ma_vung_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->so_fax->Visible) { // so_fax ?>
	<tr<?php echo $Read->so_fax->RowAttributes ?>>
		<td class="ewTableHeader">Số Fax</td>
		<td<?php echo $Read->so_fax->CellAttributes() ?>>
<div<?php echo $Read->so_fax->ViewAttributes() ?>><?php echo $Read->so_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->dia_chi->Visible) { // dia_chi ?>
	<tr<?php echo $Read->dia_chi->RowAttributes ?>>
		<td class="ewTableHeader">Địa chỉ</td>
		<td<?php echo $Read->dia_chi->CellAttributes() ?>>
<div<?php echo $Read->dia_chi->ViewAttributes() ?>><?php echo $Read->dia_chi->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->ngay_gui->Visible) { // ngay_gui ?>
	<tr<?php echo $Read->ngay_gui->RowAttributes ?>>
		<td class="ewTableHeader">Ngày gửi</td>
		<td<?php echo $Read->ngay_gui->CellAttributes() ?>>
<div<?php echo $Read->ngay_gui->ViewAttributes() ?>><?php echo $Read->ngay_gui->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Read->ngay_doc->Visible) { // ngay_doc ?>
	<tr<?php echo $Read->ngay_doc->RowAttributes ?>>
		<td class="ewTableHeader">Ngày đọc</td>
		<td<?php echo $Read->ngay_doc->CellAttributes() ?>>
<div<?php echo $Read->ngay_doc->ViewAttributes() ?>><?php echo $Read->ngay_doc->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($Read->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Read_view->Pager)) $Read_view->Pager = new cNumericPager($Read_view->lStartRec, $Read_view->lDisplayRecs, $Read_view->lTotalRecs, $Read_view->lRecRange) ?>
<?php if ($Read_view->Pager->RecordCount > 0) { ?>
	<?php if ($Read_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Read_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Read_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Read_view->PageUrl() ?>start=<?php echo $Read_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Read_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có thư
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
<?php if ($Read->Export == "") { ?>
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
class cRead_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'Read';

	// Page Object Name
	var $PageObjName = 'Read_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Read;
		if ($Read->UseTokenInUrl) $PageUrl .= "t=" . $Read->TableVar . "&"; // add page token
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
		global $objForm, $Read;
		if ($Read->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Read->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Read->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cRead_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["Read"] = new cRead();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Read', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Read;
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
			$this->Page_Terminate("Readlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("Readlist.php");
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
		global $Read;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["thu_id"] <> "") {
				$Read->thu_id->setQueryStringValue($_GET["thu_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$Read->CurrentAction = "I"; // Display form
			switch ($Read->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("Readlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($Read->thu_id->CurrentValue) == strval($rs->fields('thu_id'))) {
								$Read->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "Readlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "Readlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$Read->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $Read;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$Read->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$Read->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $Read->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$Read->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$Read->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$Read->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Read;

		// Call Recordset Selecting event
		$Read->Recordset_Selecting($Read->CurrentFilter);

		// Load list page SQL
		$sSql = $Read->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Read->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Read;
		$sFilter = $Read->KeyFilter();

		// Call Row Selecting event
		$Read->Row_Selecting($sFilter);

		// Load sql based on filter
		$Read->CurrentFilter = $sFilter;
		$sSql = $Read->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Read->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Read;
		$Read->thu_id->setDbValue($rs->fields('thu_id'));
		$Read->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$Read->tieu_de->setDbValue($rs->fields('tieu_de'));
		$Read->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$Read->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$Read->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$Read->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$Read->diachi_email->setDbValue($rs->fields('diachi_email'));
		$Read->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$Read->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$Read->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$Read->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$Read->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$Read->so_fax->setDbValue($rs->fields('so_fax'));
		$Read->dia_chi->setDbValue($rs->fields('dia_chi'));
		$Read->trang_thai->setDbValue($rs->fields('trang_thai'));
		$Read->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$Read->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Read;

		// Call Row_Rendering event
		$Read->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$Read->tieu_de->CellCssStyle = "";
		$Read->tieu_de->CellCssClass = "";

		// noidung_lienhe
		$Read->noidung_lienhe->CellCssStyle = "";
		$Read->noidung_lienhe->CellCssClass = "";

		// nguoi_lienhe
		$Read->nguoi_lienhe->CellCssStyle = "";
		$Read->nguoi_lienhe->CellCssClass = "";

		// gioi_tinh
		$Read->gioi_tinh->CellCssStyle = "";
		$Read->gioi_tinh->CellCssClass = "";

		// quocgia_id
		$Read->quocgia_id->CellCssStyle = "";
		$Read->quocgia_id->CellCssClass = "";

		// diachi_email
		$Read->diachi_email->CellCssStyle = "";
		$Read->diachi_email->CellCssClass = "";

		// ma_quocgia_tel
		$Read->ma_quocgia_tel->CellCssStyle = "";
		$Read->ma_quocgia_tel->CellCssClass = "";

		// ma_vung_tel
		$Read->ma_vung_tel->CellCssStyle = "";
		$Read->ma_vung_tel->CellCssClass = "";

		// so_dienthoai
		$Read->so_dienthoai->CellCssStyle = "";
		$Read->so_dienthoai->CellCssClass = "";

		// ma_quocgia_fax
		$Read->ma_quocgia_fax->CellCssStyle = "";
		$Read->ma_quocgia_fax->CellCssClass = "";

		// ma_vung_fax
		$Read->ma_vung_fax->CellCssStyle = "";
		$Read->ma_vung_fax->CellCssClass = "";

		// so_fax
		$Read->so_fax->CellCssStyle = "";
		$Read->so_fax->CellCssClass = "";

		// dia_chi
		$Read->dia_chi->CellCssStyle = "";
		$Read->dia_chi->CellCssClass = "";

		// ngay_gui
		$Read->ngay_gui->CellCssStyle = "";
		$Read->ngay_gui->CellCssClass = "";

		// ngay_doc
		$Read->ngay_doc->CellCssStyle = "";
		$Read->ngay_doc->CellCssClass = "";
		if ($Read->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$Read->tieu_de->ViewValue = $Read->tieu_de->CurrentValue;
			$Read->tieu_de->CssStyle = "";
			$Read->tieu_de->CssClass = "";
			$Read->tieu_de->ViewCustomAttributes = "";

			// noidung_lienhe
			$Read->noidung_lienhe->ViewValue = $Read->noidung_lienhe->CurrentValue;
			$Read->noidung_lienhe->CssStyle = "";
			$Read->noidung_lienhe->CssClass = "";
			$Read->noidung_lienhe->ViewCustomAttributes = "";

			// nguoi_lienhe
			$Read->nguoi_lienhe->ViewValue = $Read->nguoi_lienhe->CurrentValue;
			$Read->nguoi_lienhe->CssStyle = "";
			$Read->nguoi_lienhe->CssClass = "";
			$Read->nguoi_lienhe->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($Read->gioi_tinh->CurrentValue) <> "") {
				switch ($Read->gioi_tinh->CurrentValue) {
					case "0":
						$Read->gioi_tinh->ViewValue = "Nữ";
						break;
					case "1":
						$Read->gioi_tinh->ViewValue = "Nam";
						break;
					default:
						$Read->gioi_tinh->ViewValue = $Read->gioi_tinh->CurrentValue;
				}
			} else {
				$Read->gioi_tinh->ViewValue = NULL;
			}
			$Read->gioi_tinh->CssStyle = "";
			$Read->gioi_tinh->CssClass = "";
			$Read->gioi_tinh->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($Read->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($Read->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$Read->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$Read->quocgia_id->ViewValue = $Read->quocgia_id->CurrentValue;
				}
			} else {
				$Read->quocgia_id->ViewValue = NULL;
			}
			$Read->quocgia_id->CssStyle = "";
			$Read->quocgia_id->CssClass = "";
			$Read->quocgia_id->ViewCustomAttributes = "";

			// diachi_email
			$Read->diachi_email->ViewValue = $Read->diachi_email->CurrentValue;
			$Read->diachi_email->CssStyle = "";
			$Read->diachi_email->CssClass = "";
			$Read->diachi_email->ViewCustomAttributes = "";

			// ma_quocgia_tel
			$Read->ma_quocgia_tel->ViewValue = $Read->ma_quocgia_tel->CurrentValue;
			$Read->ma_quocgia_tel->CssStyle = "";
			$Read->ma_quocgia_tel->CssClass = "";
			$Read->ma_quocgia_tel->ViewCustomAttributes = "";

			// ma_vung_tel
			$Read->ma_vung_tel->ViewValue = $Read->ma_vung_tel->CurrentValue;
			$Read->ma_vung_tel->CssStyle = "";
			$Read->ma_vung_tel->CssClass = "";
			$Read->ma_vung_tel->ViewCustomAttributes = "";

			// so_dienthoai
			$Read->so_dienthoai->ViewValue = $Read->so_dienthoai->CurrentValue;
			$Read->so_dienthoai->CssStyle = "";
			$Read->so_dienthoai->CssClass = "";
			$Read->so_dienthoai->ViewCustomAttributes = "";

			// ma_quocgia_fax
			$Read->ma_quocgia_fax->ViewValue = $Read->ma_quocgia_fax->CurrentValue;
			$Read->ma_quocgia_fax->CssStyle = "";
			$Read->ma_quocgia_fax->CssClass = "";
			$Read->ma_quocgia_fax->ViewCustomAttributes = "";

			// ma_vung_fax
			$Read->ma_vung_fax->ViewValue = $Read->ma_vung_fax->CurrentValue;
			$Read->ma_vung_fax->CssStyle = "";
			$Read->ma_vung_fax->CssClass = "";
			$Read->ma_vung_fax->ViewCustomAttributes = "";

			// so_fax
			$Read->so_fax->ViewValue = $Read->so_fax->CurrentValue;
			$Read->so_fax->CssStyle = "";
			$Read->so_fax->CssClass = "";
			$Read->so_fax->ViewCustomAttributes = "";

			// dia_chi
			$Read->dia_chi->ViewValue = $Read->dia_chi->CurrentValue;
			$Read->dia_chi->CssStyle = "";
			$Read->dia_chi->CssClass = "";
			$Read->dia_chi->ViewCustomAttributes = "";

			// ngay_gui
			$Read->ngay_gui->ViewValue = $Read->ngay_gui->CurrentValue;
			$Read->ngay_gui->ViewValue = ew_FormatDateTime($Read->ngay_gui->ViewValue, 7);
			$Read->ngay_gui->CssStyle = "";
			$Read->ngay_gui->CssClass = "";
			$Read->ngay_gui->ViewCustomAttributes = "";

			// ngay_doc
			$Read->ngay_doc->ViewValue = $Read->ngay_doc->CurrentValue;
			$Read->ngay_doc->ViewValue = ew_FormatDateTime($Read->ngay_doc->ViewValue, 7);
			$Read->ngay_doc->CssStyle = "";
			$Read->ngay_doc->CssClass = "";
			$Read->ngay_doc->ViewCustomAttributes = "";

			// tieu_de
			$Read->tieu_de->HrefValue = "";

			// noidung_lienhe
			$Read->noidung_lienhe->HrefValue = "";

			// nguoi_lienhe
			$Read->nguoi_lienhe->HrefValue = "";

			// gioi_tinh
			$Read->gioi_tinh->HrefValue = "";

			// quocgia_id
			$Read->quocgia_id->HrefValue = "";

			// diachi_email
			$Read->diachi_email->HrefValue = "";

			// ma_quocgia_tel
			$Read->ma_quocgia_tel->HrefValue = "";

			// ma_vung_tel
			$Read->ma_vung_tel->HrefValue = "";

			// so_dienthoai
			$Read->so_dienthoai->HrefValue = "";

			// ma_quocgia_fax
			$Read->ma_quocgia_fax->HrefValue = "";

			// ma_vung_fax
			$Read->ma_vung_fax->HrefValue = "";

			// so_fax
			$Read->so_fax->HrefValue = "";

			// dia_chi
			$Read->dia_chi->HrefValue = "";

			// ngay_gui
			$Read->ngay_gui->HrefValue = "";

			// ngay_doc
			$Read->ngay_doc->HrefValue = "";
		}

		// Call Row Rendered event
		$Read->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $Read;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($Read->nguoidung_id->CurrentValue);
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
