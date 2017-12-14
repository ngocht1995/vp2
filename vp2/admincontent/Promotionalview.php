<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Promotionalinfo.php" ?>
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
$Promotional_view = new cPromotional_view();
$Page =& $Promotional_view;

// Page init processing
$Promotional_view->Page_Init();

// Page main processing
$Promotional_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($Promotional->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var Promotional_view = new ew_Page("Promotional_view");

// page properties
Promotional_view.PageID = "view"; // page ID
var EW_PAGE_ID = Promotional_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
Promotional_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Promotional_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Promotional_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Promotional_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="Promotionallist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nội dung tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($Promotional->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<?php if ($Promotional_view->ShowOptionLink()) { ?>
<a href="<?php echo $Promotional->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<?php if ($Promotional_view->ShowOptionLink()) { ?>
<a href="<?php echo $Promotional->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<?php if ($Promotional_view->ShowOptionLink()) { ?>
<a href="<?php echo $Promotional->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $Promotional_view->ShowMessage() ?>
<p>
<?php if ($Promotional->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Promotional_view->Pager)) $Promotional_view->Pager = new cNumericPager($Promotional_view->lStartRec, $Promotional_view->lDisplayRecs, $Promotional_view->lTotalRecs, $Promotional_view->lRecRange) ?>
<?php if ($Promotional_view->Pager->RecordCount > 0) { ?>
	<?php if ($Promotional_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Promotional_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Promotional_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Promotional_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có tin
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
<?php if ($Promotional->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<tr<?php echo $Promotional->tieude_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $Promotional->tieude_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->tieude_tintuc->ViewAttributes() ?>><?php echo $Promotional->tieude_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->tukhoa_tintuc->Visible) { // tukhoa_tintuc ?>
	<tr<?php echo $Promotional->tukhoa_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Từ khóa</td>
		<td<?php echo $Promotional->tukhoa_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->tukhoa_tintuc->ViewAttributes() ?>><?php echo $Promotional->tukhoa_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->tomtat_tintuc->Visible) { // tomtat_tintuc ?>
	<tr<?php echo $Promotional->tomtat_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn</td>
		<td<?php echo $Promotional->tomtat_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->tomtat_tintuc->ViewAttributes() ?>><?php echo $Promotional->tomtat_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->anh_tintuc->Visible) { // anh_tintuc ?>
	<tr<?php echo $Promotional->anh_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $Promotional->anh_tintuc->CellAttributes() ?>>
<?php if ($Promotional->anh_tintuc->HrefValue <> "") { ?>
<?php if (!is_null($Promotional->anh_tintuc->Upload->DbValue)) { ?>
<a href="<?php echo $Promotional->anh_tintuc->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $Promotional->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $Promotional->anh_tintuc->ViewAttributes() ?>></a>
<?php } elseif (!in_array($Promotional->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($Promotional->anh_tintuc->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $Promotional->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $Promotional->anh_tintuc->ViewAttributes() ?>>
<?php } elseif (!in_array($Promotional->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($Promotional->nguon_tintuc->Visible) { // nguon_tintuc ?>
	<tr<?php echo $Promotional->nguon_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn nhập</td>
		<td<?php echo $Promotional->nguon_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->nguon_tintuc->ViewAttributes() ?>><?php echo $Promotional->nguon_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->noidung_tintuc->Visible) { // noidung_tintuc ?>
	<tr<?php echo $Promotional->noidung_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $Promotional->noidung_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->noidung_tintuc->ViewAttributes() ?>><?php echo $Promotional->noidung_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->lienket_tintuc->Visible) { // lienket_tintuc ?>
	<tr<?php echo $Promotional->lienket_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Liên kết tin tức</td>
		<td<?php echo $Promotional->lienket_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->lienket_tintuc->ViewAttributes() ?>><?php echo $Promotional->lienket_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->hienthi_tungay->Visible) { // hienthi_tungay ?>
	<tr<?php echo $Promotional->hienthi_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị từ ngày</td>
		<td<?php echo $Promotional->hienthi_tungay->CellAttributes() ?>>
<div<?php echo $Promotional->hienthi_tungay->ViewAttributes() ?>><?php echo $Promotional->hienthi_tungay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->hienthi_denngay->Visible) { // hienthi_denngay ?>
	<tr<?php echo $Promotional->hienthi_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị đến ngày</td>
		<td<?php echo $Promotional->hienthi_denngay->CellAttributes() ?>>
<div<?php echo $Promotional->hienthi_denngay->ViewAttributes() ?>><?php echo $Promotional->hienthi_denngay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->thoigian_them->Visible) { // thoigian_them ?>
	<tr<?php echo $Promotional->thoigian_them->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $Promotional->thoigian_them->CellAttributes() ?>>
<div<?php echo $Promotional->thoigian_them->ViewAttributes() ?>><?php echo $Promotional->thoigian_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->thoigian_sua->Visible) { // thoigian_sua ?>
	<tr<?php echo $Promotional->thoigian_sua->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $Promotional->thoigian_sua->CellAttributes() ?>>
<div<?php echo $Promotional->thoigian_sua->ViewAttributes() ?>><?php echo $Promotional->thoigian_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<tr<?php echo $Promotional->soluot_truynhap->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $Promotional->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $Promotional->soluot_truynhap->ViewAttributes() ?>><?php echo $Promotional->soluot_truynhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $Promotional->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $Promotional->trang_thai->CellAttributes() ?>>
<div<?php echo $Promotional->trang_thai->ViewAttributes() ?>><?php echo $Promotional->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($Promotional->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $Promotional->xuatban->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $Promotional->xuatban->CellAttributes() ?>>
<div<?php echo $Promotional->xuatban->ViewAttributes() ?>><?php echo $Promotional->xuatban->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($Promotional->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Promotional_view->Pager)) $Promotional_view->Pager = new cNumericPager($Promotional_view->lStartRec, $Promotional_view->lDisplayRecs, $Promotional_view->lTotalRecs, $Promotional_view->lRecRange) ?>
<?php if ($Promotional_view->Pager->RecordCount > 0) { ?>
	<?php if ($Promotional_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Promotional_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Promotional_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Promotional_view->PageUrl() ?>start=<?php echo $Promotional_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Promotional_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không co tin
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
<?php if ($Promotional->Export == "") { ?>
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
class cPromotional_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'Promotional';

	// Page Object Name
	var $PageObjName = 'Promotional_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Promotional;
		if ($Promotional->UseTokenInUrl) $PageUrl .= "t=" . $Promotional->TableVar . "&"; // add page token
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
		global $objForm, $Promotional;
		if ($Promotional->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Promotional->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Promotional->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cPromotional_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["Promotional"] = new cPromotional();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Promotional', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Promotional;
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
			$this->Page_Terminate("Promotionallist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("Promotionallist.php");
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
		global $Promotional;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["tintuc_id"] <> "") {
				$Promotional->tintuc_id->setQueryStringValue($_GET["tintuc_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$Promotional->CurrentAction = "I"; // Display form
			switch ($Promotional->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("Promotionallist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($Promotional->tintuc_id->CurrentValue) == strval($rs->fields('tintuc_id'))) {
								$Promotional->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "Promotionallist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "Promotionallist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$Promotional->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $Promotional;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$Promotional->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$Promotional->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $Promotional->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$Promotional->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$Promotional->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$Promotional->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Promotional;

		// Call Recordset Selecting event
		$Promotional->Recordset_Selecting($Promotional->CurrentFilter);

		// Load list page SQL
		$sSql = $Promotional->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Promotional->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Promotional;
		$sFilter = $Promotional->KeyFilter();

		// Call Row Selecting event
		$Promotional->Row_Selecting($sFilter);

		// Load sql based on filter
		$Promotional->CurrentFilter = $sFilter;
		$sSql = $Promotional->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Promotional->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Promotional;
		$Promotional->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$Promotional->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$Promotional->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$Promotional->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$Promotional->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$Promotional->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$Promotional->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$Promotional->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$Promotional->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$Promotional->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$Promotional->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$Promotional->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$Promotional->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$Promotional->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$Promotional->trang_thai->setDbValue($rs->fields('trang_thai'));
		$Promotional->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$Promotional->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Promotional;

		// Call Row_Rendering event
		$Promotional->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$Promotional->tieude_tintuc->CellCssStyle = "";
		$Promotional->tieude_tintuc->CellCssClass = "";

		// tukhoa_tintuc
		$Promotional->tukhoa_tintuc->CellCssStyle = "";
		$Promotional->tukhoa_tintuc->CellCssClass = "";

		// tomtat_tintuc
		$Promotional->tomtat_tintuc->CellCssStyle = "";
		$Promotional->tomtat_tintuc->CellCssClass = "";

		// anh_tintuc
		$Promotional->anh_tintuc->CellCssStyle = "";
		$Promotional->anh_tintuc->CellCssClass = "";

		// nguon_tintuc
		$Promotional->nguon_tintuc->CellCssStyle = "";
		$Promotional->nguon_tintuc->CellCssClass = "";

		// noidung_tintuc
		$Promotional->noidung_tintuc->CellCssStyle = "";
		$Promotional->noidung_tintuc->CellCssClass = "";

		// lienket_tintuc
		$Promotional->lienket_tintuc->CellCssStyle = "";
		$Promotional->lienket_tintuc->CellCssClass = "";

		// hienthi_tungay
		$Promotional->hienthi_tungay->CellCssStyle = "";
		$Promotional->hienthi_tungay->CellCssClass = "";

		// hienthi_denngay
		$Promotional->hienthi_denngay->CellCssStyle = "";
		$Promotional->hienthi_denngay->CellCssClass = "";

		// thoigian_them
		$Promotional->thoigian_them->CellCssStyle = "";
		$Promotional->thoigian_them->CellCssClass = "";

		// thoigian_sua
		$Promotional->thoigian_sua->CellCssStyle = "";
		$Promotional->thoigian_sua->CellCssClass = "";

		// soluot_truynhap
		$Promotional->soluot_truynhap->CellCssStyle = "";
		$Promotional->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$Promotional->trang_thai->CellCssStyle = "";
		$Promotional->trang_thai->CellCssClass = "";

		// xuatban
		$Promotional->xuatban->CellCssStyle = "";
		$Promotional->xuatban->CellCssClass = "";
		if ($Promotional->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$Promotional->tieude_tintuc->ViewValue = $Promotional->tieude_tintuc->CurrentValue;
			$Promotional->tieude_tintuc->CssStyle = "";
			$Promotional->tieude_tintuc->CssClass = "";
			$Promotional->tieude_tintuc->ViewCustomAttributes = "";

			// tukhoa_tintuc
			$Promotional->tukhoa_tintuc->ViewValue = $Promotional->tukhoa_tintuc->CurrentValue;
			$Promotional->tukhoa_tintuc->CssStyle = "";
			$Promotional->tukhoa_tintuc->CssClass = "";
			$Promotional->tukhoa_tintuc->ViewCustomAttributes = "";

			// tomtat_tintuc
			$Promotional->tomtat_tintuc->ViewValue = $Promotional->tomtat_tintuc->CurrentValue;
			$Promotional->tomtat_tintuc->CssStyle = "";
			$Promotional->tomtat_tintuc->CssClass = "";
			$Promotional->tomtat_tintuc->ViewCustomAttributes = "";

			// anh_tintuc
			if (!is_null($Promotional->anh_tintuc->Upload->DbValue)) {
				$Promotional->anh_tintuc->ViewValue = $Promotional->anh_tintuc->Upload->DbValue;
				$Promotional->anh_tintuc->ImageWidth = 150;
				$Promotional->anh_tintuc->ImageHeight = 0;
				$Promotional->anh_tintuc->ImageAlt = "";
			} else {
				$Promotional->anh_tintuc->ViewValue = "";
			}
			$Promotional->anh_tintuc->CssStyle = "";
			$Promotional->anh_tintuc->CssClass = "";
			$Promotional->anh_tintuc->ViewCustomAttributes = "";

			// nguon_tintuc
			$Promotional->nguon_tintuc->ViewValue = $Promotional->nguon_tintuc->CurrentValue;
			$Promotional->nguon_tintuc->CssStyle = "";
			$Promotional->nguon_tintuc->CssClass = "";
			$Promotional->nguon_tintuc->ViewCustomAttributes = "";

			// noidung_tintuc
			$Promotional->noidung_tintuc->ViewValue = $Promotional->noidung_tintuc->CurrentValue;
			$Promotional->noidung_tintuc->CssStyle = "";
			$Promotional->noidung_tintuc->CssClass = "";
			$Promotional->noidung_tintuc->ViewCustomAttributes = "";

			// lienket_tintuc
			$Promotional->lienket_tintuc->ViewValue = $Promotional->lienket_tintuc->CurrentValue;
			$Promotional->lienket_tintuc->CssStyle = "";
			$Promotional->lienket_tintuc->CssClass = "";
			$Promotional->lienket_tintuc->ViewCustomAttributes = "";

			// hienthi_tungay
			$Promotional->hienthi_tungay->ViewValue = $Promotional->hienthi_tungay->CurrentValue;
			$Promotional->hienthi_tungay->ViewValue = ew_FormatDateTime($Promotional->hienthi_tungay->ViewValue, 7);
			$Promotional->hienthi_tungay->CssStyle = "";
			$Promotional->hienthi_tungay->CssClass = "";
			$Promotional->hienthi_tungay->ViewCustomAttributes = "";

			// hienthi_denngay
			$Promotional->hienthi_denngay->ViewValue = $Promotional->hienthi_denngay->CurrentValue;
			$Promotional->hienthi_denngay->ViewValue = ew_FormatDateTime($Promotional->hienthi_denngay->ViewValue, 7);
			$Promotional->hienthi_denngay->CssStyle = "";
			$Promotional->hienthi_denngay->CssClass = "";
			$Promotional->hienthi_denngay->ViewCustomAttributes = "";

			// thoigian_them
			$Promotional->thoigian_them->ViewValue = $Promotional->thoigian_them->CurrentValue;
			$Promotional->thoigian_them->ViewValue = ew_FormatDateTime($Promotional->thoigian_them->ViewValue, 7);
			$Promotional->thoigian_them->CssStyle = "";
			$Promotional->thoigian_them->CssClass = "";
			$Promotional->thoigian_them->ViewCustomAttributes = "";

			// thoigian_sua
			$Promotional->thoigian_sua->ViewValue = $Promotional->thoigian_sua->CurrentValue;
			$Promotional->thoigian_sua->ViewValue = ew_FormatDateTime($Promotional->thoigian_sua->ViewValue, 7);
			$Promotional->thoigian_sua->CssStyle = "";
			$Promotional->thoigian_sua->CssClass = "";
			$Promotional->thoigian_sua->ViewCustomAttributes = "";

			// soluot_truynhap
			$Promotional->soluot_truynhap->ViewValue = $Promotional->soluot_truynhap->CurrentValue;
			$Promotional->soluot_truynhap->CssStyle = "";
			$Promotional->soluot_truynhap->CssClass = "";
			$Promotional->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($Promotional->trang_thai->CurrentValue) <> "") {
				switch ($Promotional->trang_thai->CurrentValue) {
					case "1":
						$Promotional->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$Promotional->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$Promotional->trang_thai->ViewValue = $Promotional->trang_thai->CurrentValue;
				}
			} else {
				$Promotional->trang_thai->ViewValue = NULL;
			}
			$Promotional->trang_thai->CssStyle = "";
			$Promotional->trang_thai->CssClass = "";
			$Promotional->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($Promotional->xuatban->CurrentValue) <> "") {
				switch ($Promotional->xuatban->CurrentValue) {
					case "0":
						$Promotional->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$Promotional->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$Promotional->xuatban->ViewValue = $Promotional->xuatban->CurrentValue;
				}
			} else {
				$Promotional->xuatban->ViewValue = NULL;
			}
			$Promotional->xuatban->CssStyle = "";
			$Promotional->xuatban->CssClass = "";
			$Promotional->xuatban->ViewCustomAttributes = "";

			// tieude_tintuc
			$Promotional->tieude_tintuc->HrefValue = "";

			// tukhoa_tintuc
			$Promotional->tukhoa_tintuc->HrefValue = "";

			// tomtat_tintuc
			$Promotional->tomtat_tintuc->HrefValue = "";

			// anh_tintuc
			if (!is_null($Promotional->anh_tintuc->Upload->DbValue)) {
				$Promotional->anh_tintuc->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($Promotional->anh_tintuc->ViewValue)) ? $Promotional->anh_tintuc->ViewValue : $Promotional->anh_tintuc->CurrentValue);
				if ($Promotional->Export <> "") $Promotional->anh_tintuc->HrefValue = ew_ConvertFullUrl($Promotional->anh_tintuc->HrefValue);
			} else {
				$Promotional->anh_tintuc->HrefValue = "";
			}

			// nguon_tintuc
			$Promotional->nguon_tintuc->HrefValue = "";

			// noidung_tintuc
			$Promotional->noidung_tintuc->HrefValue = "";

			// lienket_tintuc
			$Promotional->lienket_tintuc->HrefValue = "";

			// hienthi_tungay
			$Promotional->hienthi_tungay->HrefValue = "";

			// hienthi_denngay
			$Promotional->hienthi_denngay->HrefValue = "";

			// thoigian_them
			$Promotional->thoigian_them->HrefValue = "";

			// thoigian_sua
			$Promotional->thoigian_sua->HrefValue = "";

			// soluot_truynhap
			$Promotional->soluot_truynhap->HrefValue = "";

			// trang_thai
			$Promotional->trang_thai->HrefValue = "";

			// xuatban
			$Promotional->xuatban->HrefValue = "";
		}

		// Call Row Rendered event
		$Promotional->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $Promotional;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($Promotional->nguoidung_id->CurrentValue);
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
