<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertising_infoinfo.php" ?>
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
$advertising_info_view = new cadvertising_info_view();
$Page =& $advertising_info_view;

// Page init processing
$advertising_info_view->Page_Init();

// Page main processing
$advertising_info_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($advertising_info->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_info_view = new ew_Page("advertising_info_view");

// page properties
advertising_info_view.PageID = "view"; // page ID
var EW_PAGE_ID = advertising_info_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_info_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_info_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_info_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_info_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="advertising_infolist.php"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý tin quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if ($advertising_info->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_info->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $advertising_info->EditUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_sua.gif\">"); ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $advertising_info->DeleteUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $advertising_info_view->ShowMessage() ?>
<p>
<?php if ($advertising_info->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_info_view->Pager)) $advertising_info_view->Pager = new cNumericPager($advertising_info_view->lStartRec, $advertising_info_view->lDisplayRecs, $advertising_info_view->lTotalRecs, $advertising_info_view->lRecRange) ?>
<?php if ($advertising_info_view->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_info_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->FirstButton->Start ?>"><b><?php echo Lang_Text('Đầu');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->PrevButton->Start ?>"><b><?php echo Lang_Text('Trước');?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_info_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->NextButton->Start ?>"><b><?php echo Lang_Text('Sau');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->LastButton->Start ?>"><b><?php echo Lang_Text('Cuối');?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_info_view->sSrchWhere == "0=101") { ?>
	<?php echo Lang_Text('Hãy điền từ khóa tìm kiếm')?>
	<?php } else { ?>
	<?php echo Lang_Text('Không có dữ liệu')?>
	<?php } ?>
	<?php } else { ?>
	<?php echo Lang_Text('Bạn không có quyền xem trang này')?>
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
<?php if ($advertising_info->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
	<tr<?php echo $advertising_info->chuyenmuc_id->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Chuyên mục bài viết');?></td>
		<td<?php echo $advertising_info->chuyenmuc_id->CellAttributes() ?>>
<div<?php echo $advertising_info->chuyenmuc_id->ViewAttributes() ?>>
<?php 
	$arwrk = $advertising_info->chuyenmuc_id->ListViewValue();
	if (is_array($arwrk)) {
		echo Lang_Str($arwrk[0][0],$arwrk[0][1]);
	}
?>
</div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->tieude_baiviet->Visible) { // tieude_baiviet ?>
	<tr<?php echo $advertising_info->tieude_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Tiêu đề');?></td>
		<td<?php echo $advertising_info->tieude_baiviet->CellAttributes() ?>>
<div<?php echo $advertising_info->tieude_baiviet->ViewAttributes() ?>><?php echo $advertising_info->tieude_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->tukhoa_baiviet->Visible) { // tukhoa_baiviet ?>
	<tr<?php echo $advertising_info->tukhoa_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Từ khoá');?></td>
		<td<?php echo $advertising_info->tukhoa_baiviet->CellAttributes() ?>>
<div<?php echo $advertising_info->tukhoa_baiviet->ViewAttributes() ?>><?php echo $advertising_info->tukhoa_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->tomtat_baiviet->Visible) { // tomtat_baiviet ?>
	<tr<?php echo $advertising_info->tomtat_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Tóm tắt');?></td>
		<td<?php echo $advertising_info->tomtat_baiviet->CellAttributes() ?>>
<div<?php echo $advertising_info->tomtat_baiviet->ViewAttributes() ?>><?php echo $advertising_info->tomtat_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->noidung_baiviet->Visible) { // noidung_baiviet ?>
	<tr<?php echo $advertising_info->noidung_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Nội dung');?></td>
		<td<?php echo $advertising_info->noidung_baiviet->CellAttributes() ?>>
<div<?php echo $advertising_info->noidung_baiviet->ViewAttributes() ?>><?php echo $advertising_info->noidung_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->nguon_baiviet->Visible) { // nguon_baiviet ?>
	<tr<?php echo $advertising_info->nguon_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text("Nguồn tin")?></td>
		<td<?php echo $advertising_info->nguon_baiviet->CellAttributes() ?>>
<div<?php echo $advertising_info->nguon_baiviet->ViewAttributes() ?>><?php echo $advertising_info->nguon_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->lienket_baiviet->Visible) { // lienket_baiviet ?>
	<tr<?php echo $advertising_info->lienket_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text("Liên kết")?></td>
		<td<?php echo $advertising_info->lienket_baiviet->CellAttributes() ?>>
<div<?php echo $advertising_info->lienket_baiviet->ViewAttributes() ?>><?php echo $advertising_info->lienket_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->thoigian_them->Visible) { // thoigian_them ?>
	<tr<?php echo $advertising_info->thoigian_them->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text("Thời gian nhập");?></td>
		<td<?php echo $advertising_info->thoigian_them->CellAttributes() ?>>
<div<?php echo $advertising_info->thoigian_them->ViewAttributes() ?>><?php echo $advertising_info->thoigian_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->thoihan_sua->Visible) { // thoihan_sua ?>
	<tr<?php echo $advertising_info->thoihan_sua->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Thời gian sửa');?></td>
		<td<?php echo $advertising_info->thoihan_sua->CellAttributes() ?>>
<div<?php echo $advertising_info->thoihan_sua->ViewAttributes() ?>><?php echo $advertising_info->thoihan_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>


<?php if ($advertising_info->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<tr<?php echo $advertising_info->soluot_truynhap->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Số lần xem');?></td>
		<td<?php echo $advertising_info->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $advertising_info->soluot_truynhap->ViewAttributes() ?>><?php echo $advertising_info->soluot_truynhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $advertising_info->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Trạng thái');?></td>
		<td<?php echo $advertising_info->trang_thai->CellAttributes() ?>>
<div<?php echo $advertising_info->trang_thai->ViewAttributes() ?>><?php echo Lang_Text($advertising_info->trang_thai->ViewValue) ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($advertising_info->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_info_view->Pager)) $advertising_info_view->Pager = new cNumericPager($advertising_info_view->lStartRec, $advertising_info_view->lDisplayRecs, $advertising_info_view->lTotalRecs, $advertising_info_view->lRecRange) ?>
<?php if ($advertising_info_view->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_info_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->FirstButton->Start ?>"><b><?php echo Lang_Text('Đầu');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->PrevButton->Start ?>"><b><?php echo Lang_Text('Trước');?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_info_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->NextButton->Start ?>"><b><?php echo Lang_Text('Sau');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_view->PageUrl() ?>start=<?php echo $advertising_info_view->Pager->LastButton->Start ?>"><b><?php echo Lang_Text('Cuối');?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_info_view->sSrchWhere == "0=101") { ?>
	<?php echo Lang_Text('Hãy điền từ khóa tìm kiếm')?>
	<?php } else { ?>
	Không có bài viết
	<?php } ?>
	<?php } else { ?>
	<?php echo Lang_Text('Bạn không có quyền xem trang này')?>
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($advertising_info->Export == "") { ?>
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
class cadvertising_info_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'advertising_info';

	// Page Object Name
	var $PageObjName = 'advertising_info_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising_info;
		if ($advertising_info->UseTokenInUrl) $PageUrl .= "t=" . $advertising_info->TableVar . "&"; // add page token
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
		global $objForm, $advertising_info;
		if ($advertising_info->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising_info->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising_info->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_info_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_info"] = new cadvertising_info();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising_info', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising_info;
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
			$this->Page_Terminate("advertising_infolist.php");
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
		global $advertising_info;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["baiviet_id"] <> "") {
				$advertising_info->baiviet_id->setQueryStringValue($_GET["baiviet_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$advertising_info->CurrentAction = "I"; // Display form
			switch ($advertising_info->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage(Lang_Text('Không có dữ liệu')); // Set no record message
						$this->Page_Terminate("advertising_infolist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($advertising_info->baiviet_id->CurrentValue) == strval($rs->fields('baiviet_id'))) {
								$advertising_info->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage(Lang_Text('Không có dữ liệu')); // Set no record message
						$sReturnUrl = "advertising_infolist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "advertising_infolist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$advertising_info->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $advertising_info;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$advertising_info->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$advertising_info->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $advertising_info->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$advertising_info->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$advertising_info->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$advertising_info->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising_info;

		// Call Recordset Selecting event
		$advertising_info->Recordset_Selecting($advertising_info->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising_info->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising_info->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising_info;
		$sFilter = $advertising_info->KeyFilter();

		// Call Row Selecting event
		$advertising_info->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising_info->CurrentFilter = $sFilter;
		$sSql = $advertising_info->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising_info->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising_info;
		$advertising_info->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$advertising_info->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$advertising_info->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$advertising_info->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$advertising_info->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$advertising_info->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$advertising_info->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$advertising_info->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$advertising_info->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising_info->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$advertising_info->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising_info->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$advertising_info->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$advertising_info->trang_thai->setDbValue($rs->fields('trang_thai'));
		$advertising_info->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising_info;

		// Call Row_Rendering event
		$advertising_info->Row_Rendering();

		// Common render codes for all row types
		// chuyenmuc_id

		$advertising_info->chuyenmuc_id->CellCssStyle = "";
		$advertising_info->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$advertising_info->tieude_baiviet->CellCssStyle = "";
		$advertising_info->tieude_baiviet->CellCssClass = "";

		// tukhoa_baiviet
		$advertising_info->tukhoa_baiviet->CellCssStyle = "";
		$advertising_info->tukhoa_baiviet->CellCssClass = "";

		// tomtat_baiviet
		$advertising_info->tomtat_baiviet->CellCssStyle = "";
		$advertising_info->tomtat_baiviet->CellCssClass = "";

		// noidung_baiviet
		$advertising_info->noidung_baiviet->CellCssStyle = "";
		$advertising_info->noidung_baiviet->CellCssClass = "";

		// nguon_baiviet
		$advertising_info->nguon_baiviet->CellCssStyle = "";
		$advertising_info->nguon_baiviet->CellCssClass = "";

		// lienket_baiviet
		$advertising_info->lienket_baiviet->CellCssStyle = "";
		$advertising_info->lienket_baiviet->CellCssClass = "";

		// thoigian_them
		$advertising_info->thoigian_them->CellCssStyle = "";
		$advertising_info->thoigian_them->CellCssClass = "";

		// thoihan_sua
		$advertising_info->thoihan_sua->CellCssStyle = "";
		$advertising_info->thoihan_sua->CellCssClass = "";

		// nguoi_them
		$advertising_info->nguoi_them->CellCssStyle = "";
		$advertising_info->nguoi_them->CellCssClass = "";

		// nguoi_sua
		$advertising_info->nguoi_sua->CellCssStyle = "";
		$advertising_info->nguoi_sua->CellCssClass = "";

		// soluot_truynhap
		$advertising_info->soluot_truynhap->CellCssStyle = "";
		$advertising_info->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$advertising_info->trang_thai->CellCssStyle = "";
		$advertising_info->trang_thai->CellCssClass = "";
		if ($advertising_info->RowType == EW_ROWTYPE_VIEW) { // View row

			// chuyenmuc_id
			if (strval($advertising_info->chuyenmuc_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_chuyenmuc`,`ten_chuyenmuc_en` FROM `advertising_subject` WHERE `chuyenmuc_id` = " . ew_AdjustSql($advertising_info->chuyenmuc_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
					$advertising_info->chuyenmuc_id->ViewValue = $arwrk;
					$rswrk->Close();
				} else {
					$advertising_info->chuyenmuc_id->ViewValue = $advertising_info->chuyenmuc_id->CurrentValue;
				}
			} else {
				$advertising_info->chuyenmuc_id->ViewValue = NULL;
			}
			$advertising_info->chuyenmuc_id->CssStyle = "";
			$advertising_info->chuyenmuc_id->CssClass = "";
			$advertising_info->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$advertising_info->tieude_baiviet->ViewValue = $advertising_info->tieude_baiviet->CurrentValue;
			$advertising_info->tieude_baiviet->CssStyle = "";
			$advertising_info->tieude_baiviet->CssClass = "";
			$advertising_info->tieude_baiviet->ViewCustomAttributes = "";

			// tukhoa_baiviet
			$advertising_info->tukhoa_baiviet->ViewValue = $advertising_info->tukhoa_baiviet->CurrentValue;
			$advertising_info->tukhoa_baiviet->CssStyle = "";
			$advertising_info->tukhoa_baiviet->CssClass = "";
			$advertising_info->tukhoa_baiviet->ViewCustomAttributes = "";

			// tomtat_baiviet
			$advertising_info->tomtat_baiviet->ViewValue = $advertising_info->tomtat_baiviet->CurrentValue;
			$advertising_info->tomtat_baiviet->CssStyle = "";
			$advertising_info->tomtat_baiviet->CssClass = "";
			$advertising_info->tomtat_baiviet->ViewCustomAttributes = "";

			// noidung_baiviet
			$advertising_info->noidung_baiviet->ViewValue = $advertising_info->noidung_baiviet->CurrentValue;
			$advertising_info->noidung_baiviet->CssStyle = "";
			$advertising_info->noidung_baiviet->CssClass = "";
			$advertising_info->noidung_baiviet->ViewCustomAttributes = "";

			// nguon_baiviet
			$advertising_info->nguon_baiviet->ViewValue = $advertising_info->nguon_baiviet->CurrentValue;
			$advertising_info->nguon_baiviet->CssStyle = "";
			$advertising_info->nguon_baiviet->CssClass = "";
			$advertising_info->nguon_baiviet->ViewCustomAttributes = "";

			// lienket_baiviet
			$advertising_info->lienket_baiviet->ViewValue = $advertising_info->lienket_baiviet->CurrentValue;
			$advertising_info->lienket_baiviet->CssStyle = "";
			$advertising_info->lienket_baiviet->CssClass = "";
			$advertising_info->lienket_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$advertising_info->thoigian_them->ViewValue = $advertising_info->thoigian_them->CurrentValue;
			$advertising_info->thoigian_them->ViewValue = ew_FormatDateTime($advertising_info->thoigian_them->ViewValue, 7);
			$advertising_info->thoigian_them->CssStyle = "";
			$advertising_info->thoigian_them->CssClass = "";
			$advertising_info->thoigian_them->ViewCustomAttributes = "";

			// thoihan_sua
			$advertising_info->thoihan_sua->ViewValue = $advertising_info->thoihan_sua->CurrentValue;
			$advertising_info->thoihan_sua->ViewValue = ew_FormatDateTime($advertising_info->thoihan_sua->ViewValue, 7);
			$advertising_info->thoihan_sua->CssStyle = "";
			$advertising_info->thoihan_sua->CssClass = "";
			$advertising_info->thoihan_sua->ViewCustomAttributes = "";

			// nguoi_them
			$advertising_info->nguoi_them->ViewValue = $advertising_info->nguoi_them->CurrentValue;
			$advertising_info->nguoi_them->CssStyle = "";
			$advertising_info->nguoi_them->CssClass = "";
			$advertising_info->nguoi_them->ViewCustomAttributes = "";

			// nguoi_sua
			$advertising_info->nguoi_sua->ViewValue = $advertising_info->nguoi_sua->CurrentValue;
			$advertising_info->nguoi_sua->CssStyle = "";
			$advertising_info->nguoi_sua->CssClass = "";
			$advertising_info->nguoi_sua->ViewCustomAttributes = "";

			// soluot_truynhap
			$advertising_info->soluot_truynhap->ViewValue = $advertising_info->soluot_truynhap->CurrentValue;
			$advertising_info->soluot_truynhap->CssStyle = "";
			$advertising_info->soluot_truynhap->CssClass = "";
			$advertising_info->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising_info->trang_thai->CurrentValue) <> "") {
				switch ($advertising_info->trang_thai->CurrentValue) {
					case "0":
						$advertising_info->trang_thai->ViewValue = "<font color=\"#FF0000\">Không xuất bản</font>";
						break;
					case "1":
						$advertising_info->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$advertising_info->trang_thai->ViewValue = $advertising_info->trang_thai->CurrentValue;
				}
			} else {
				$advertising_info->trang_thai->ViewValue = NULL;
			}
			$advertising_info->trang_thai->CssStyle = "";
			$advertising_info->trang_thai->CssClass = "";
			$advertising_info->trang_thai->ViewCustomAttributes = "";

			// chuyenmuc_id
			$advertising_info->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$advertising_info->tieude_baiviet->HrefValue = "";

			// tukhoa_baiviet
			$advertising_info->tukhoa_baiviet->HrefValue = "";

			// tomtat_baiviet
			$advertising_info->tomtat_baiviet->HrefValue = "";

			// noidung_baiviet
			$advertising_info->noidung_baiviet->HrefValue = "";

			// nguon_baiviet
			$advertising_info->nguon_baiviet->HrefValue = "";

			// lienket_baiviet
			$advertising_info->lienket_baiviet->HrefValue = "";

			// thoigian_them
			$advertising_info->thoigian_them->HrefValue = "";

			// thoihan_sua
			$advertising_info->thoihan_sua->HrefValue = "";

			// nguoi_them
			$advertising_info->nguoi_them->HrefValue = "";

			// nguoi_sua
			$advertising_info->nguoi_sua->HrefValue = "";

			// soluot_truynhap
			$advertising_info->soluot_truynhap->HrefValue = "";

			// trang_thai
			$advertising_info->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$advertising_info->Row_Rendered();
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
