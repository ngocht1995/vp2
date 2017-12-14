<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_articleinfo.php" ?>
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
$intro_article_view = new cintro_article_view();
$Page =& $intro_article_view;

// Page init processing
$intro_article_view->Page_Init();

// Page main processing
$intro_article_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($intro_article->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var intro_article_view = new ew_Page("intro_article_view");

// page properties
intro_article_view.PageID = "view"; // page ID
var EW_PAGE_ID = intro_article_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
intro_article_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_article_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_article_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_article_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="intro_articlelist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nội dung bài viết</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if ($intro_article->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $intro_article->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $intro_article->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $intro_article->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $intro_article_view->ShowMessage() ?>
<p>
<?php if ($intro_article->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_article_view->Pager)) $intro_article_view->Pager = new cNumericPager($intro_article_view->lStartRec, $intro_article_view->lDisplayRecs, $intro_article_view->lTotalRecs, $intro_article_view->lRecRange) ?>
<?php if ($intro_article_view->Pager->RecordCount > 0) { ?>
	<?php if ($intro_article_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_article_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_article_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_article_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có bài viết
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
<?php if ($intro_article->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
	<tr<?php echo $intro_article->chuyenmuc_id->RowAttributes ?>>
		<td class="ewTableHeader">Chuyên mục bài viết</td>
		<td<?php echo $intro_article->chuyenmuc_id->CellAttributes() ?>>
<div<?php echo $intro_article->chuyenmuc_id->ViewAttributes() ?>><?php echo $intro_article->chuyenmuc_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->tieude_baiviet->Visible) { // tieude_baiviet ?>
	<tr<?php echo $intro_article->tieude_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $intro_article->tieude_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->tieude_baiviet->ViewAttributes() ?>><?php echo $intro_article->tieude_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->tukhoa_baiviet->Visible) { // tukhoa_baiviet ?>
	<tr<?php echo $intro_article->tukhoa_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Từ khóa</td>
		<td<?php echo $intro_article->tukhoa_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->tukhoa_baiviet->ViewAttributes() ?>><?php echo $intro_article->tukhoa_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->tomtat_baiviet->Visible) { // tomtat_baiviet ?>
	<tr<?php echo $intro_article->tomtat_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn</td>
		<td<?php echo $intro_article->tomtat_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->tomtat_baiviet->ViewAttributes() ?>><?php echo $intro_article->tomtat_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->noidung_baiviet->Visible) { // noidung_baiviet ?>
	<tr<?php echo $intro_article->noidung_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $intro_article->noidung_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->noidung_baiviet->ViewAttributes() ?>><?php echo $intro_article->noidung_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->nguon_baiviet->Visible) { // nguon_baiviet ?>
	<tr<?php echo $intro_article->nguon_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn tin</td>
		<td<?php echo $intro_article->nguon_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->nguon_baiviet->ViewAttributes() ?>><?php echo $intro_article->nguon_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->lienket_baiviet->Visible) { // lienket_baiviet ?>
	<tr<?php echo $intro_article->lienket_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Liên kết</td>
		<td<?php echo $intro_article->lienket_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->lienket_baiviet->ViewAttributes() ?>><?php echo $intro_article->lienket_baiviet->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->thoigian_them->Visible) { // thoigian_them ?>
	<tr<?php echo $intro_article->thoigian_them->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $intro_article->thoigian_them->CellAttributes() ?>>
<div<?php echo $intro_article->thoigian_them->ViewAttributes() ?>><?php echo $intro_article->thoigian_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->thoihan_sua->Visible) { // thoihan_sua ?>
	<tr<?php echo $intro_article->thoihan_sua->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $intro_article->thoihan_sua->CellAttributes() ?>>
<div<?php echo $intro_article->thoihan_sua->ViewAttributes() ?>><?php echo $intro_article->thoihan_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>


<?php if ($intro_article->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<tr<?php echo $intro_article->soluot_truynhap->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $intro_article->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $intro_article->soluot_truynhap->ViewAttributes() ?>><?php echo $intro_article->soluot_truynhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($intro_article->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $intro_article->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $intro_article->trang_thai->CellAttributes() ?>>
<div<?php echo $intro_article->trang_thai->ViewAttributes() ?>><?php echo $intro_article->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($intro_article->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_article_view->Pager)) $intro_article_view->Pager = new cNumericPager($intro_article_view->lStartRec, $intro_article_view->lDisplayRecs, $intro_article_view->lTotalRecs, $intro_article_view->lRecRange) ?>
<?php if ($intro_article_view->Pager->RecordCount > 0) { ?>
	<?php if ($intro_article_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_article_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_article_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_article_view->PageUrl() ?>start=<?php echo $intro_article_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_article_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có bài viết
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
<?php if ($intro_article->Export == "") { ?>
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
class cintro_article_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'intro_article';

	// Page Object Name
	var $PageObjName = 'intro_article_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_article;
		if ($intro_article->UseTokenInUrl) $PageUrl .= "t=" . $intro_article->TableVar . "&"; // add page token
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
		global $objForm, $intro_article;
		if ($intro_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_article_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_article"] = new cintro_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_article;
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
			$this->Page_Terminate("intro_articlelist.php");
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
		global $intro_article;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["baiviet_id"] <> "") {
				$intro_article->baiviet_id->setQueryStringValue($_GET["baiviet_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$intro_article->CurrentAction = "I"; // Display form
			switch ($intro_article->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("intro_articlelist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($intro_article->baiviet_id->CurrentValue) == strval($rs->fields('baiviet_id'))) {
								$intro_article->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "intro_articlelist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "intro_articlelist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$intro_article->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $intro_article;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$intro_article->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$intro_article->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $intro_article->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$intro_article->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$intro_article->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$intro_article->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $intro_article;

		// Call Recordset Selecting event
		$intro_article->Recordset_Selecting($intro_article->CurrentFilter);

		// Load list page SQL
		$sSql = $intro_article->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$intro_article->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_article;
		$sFilter = $intro_article->KeyFilter();

		// Call Row Selecting event
		$intro_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_article->CurrentFilter = $sFilter;
		$sSql = $intro_article->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_article;
		$intro_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$intro_article->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$intro_article->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$intro_article->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$intro_article->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$intro_article->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$intro_article->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$intro_article->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$intro_article->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_article->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$intro_article->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_article->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$intro_article->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$intro_article->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_article->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_article;

		// Call Row_Rendering event
		$intro_article->Row_Rendering();

		// Common render codes for all row types
		// chuyenmuc_id

		$intro_article->chuyenmuc_id->CellCssStyle = "";
		$intro_article->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$intro_article->tieude_baiviet->CellCssStyle = "";
		$intro_article->tieude_baiviet->CellCssClass = "";

		// tukhoa_baiviet
		$intro_article->tukhoa_baiviet->CellCssStyle = "";
		$intro_article->tukhoa_baiviet->CellCssClass = "";

		// tomtat_baiviet
		$intro_article->tomtat_baiviet->CellCssStyle = "";
		$intro_article->tomtat_baiviet->CellCssClass = "";

		// noidung_baiviet
		$intro_article->noidung_baiviet->CellCssStyle = "";
		$intro_article->noidung_baiviet->CellCssClass = "";

		// nguon_baiviet
		$intro_article->nguon_baiviet->CellCssStyle = "";
		$intro_article->nguon_baiviet->CellCssClass = "";

		// lienket_baiviet
		$intro_article->lienket_baiviet->CellCssStyle = "";
		$intro_article->lienket_baiviet->CellCssClass = "";

		// thoigian_them
		$intro_article->thoigian_them->CellCssStyle = "";
		$intro_article->thoigian_them->CellCssClass = "";

		// thoihan_sua
		$intro_article->thoihan_sua->CellCssStyle = "";
		$intro_article->thoihan_sua->CellCssClass = "";

		// nguoi_them
		$intro_article->nguoi_them->CellCssStyle = "";
		$intro_article->nguoi_them->CellCssClass = "";

		// nguoi_sua
		$intro_article->nguoi_sua->CellCssStyle = "";
		$intro_article->nguoi_sua->CellCssClass = "";

		// soluot_truynhap
		$intro_article->soluot_truynhap->CellCssStyle = "";
		$intro_article->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$intro_article->trang_thai->CellCssStyle = "";
		$intro_article->trang_thai->CellCssClass = "";
		if ($intro_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// chuyenmuc_id
			if (strval($intro_article->chuyenmuc_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_chuyenmuc` FROM `intro_subject` WHERE `chuyenmuc_id` = " . ew_AdjustSql($intro_article->chuyenmuc_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$intro_article->chuyenmuc_id->ViewValue = $rswrk->fields('ten_chuyenmuc');
					$rswrk->Close();
				} else {
					$intro_article->chuyenmuc_id->ViewValue = $intro_article->chuyenmuc_id->CurrentValue;
				}
			} else {
				$intro_article->chuyenmuc_id->ViewValue = NULL;
			}
			$intro_article->chuyenmuc_id->CssStyle = "";
			$intro_article->chuyenmuc_id->CssClass = "";
			$intro_article->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->ViewValue = $intro_article->tieude_baiviet->CurrentValue;
			$intro_article->tieude_baiviet->CssStyle = "";
			$intro_article->tieude_baiviet->CssClass = "";
			$intro_article->tieude_baiviet->ViewCustomAttributes = "";

			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->ViewValue = $intro_article->tukhoa_baiviet->CurrentValue;
			$intro_article->tukhoa_baiviet->CssStyle = "";
			$intro_article->tukhoa_baiviet->CssClass = "";
			$intro_article->tukhoa_baiviet->ViewCustomAttributes = "";

			// tomtat_baiviet
			$intro_article->tomtat_baiviet->ViewValue = $intro_article->tomtat_baiviet->CurrentValue;
			$intro_article->tomtat_baiviet->CssStyle = "";
			$intro_article->tomtat_baiviet->CssClass = "";
			$intro_article->tomtat_baiviet->ViewCustomAttributes = "";

			// noidung_baiviet
			$intro_article->noidung_baiviet->ViewValue = $intro_article->noidung_baiviet->CurrentValue;
			$intro_article->noidung_baiviet->CssStyle = "";
			$intro_article->noidung_baiviet->CssClass = "";
			$intro_article->noidung_baiviet->ViewCustomAttributes = "";

			// nguon_baiviet
			$intro_article->nguon_baiviet->ViewValue = $intro_article->nguon_baiviet->CurrentValue;
			$intro_article->nguon_baiviet->CssStyle = "";
			$intro_article->nguon_baiviet->CssClass = "";
			$intro_article->nguon_baiviet->ViewCustomAttributes = "";

			// lienket_baiviet
			$intro_article->lienket_baiviet->ViewValue = $intro_article->lienket_baiviet->CurrentValue;
			$intro_article->lienket_baiviet->CssStyle = "";
			$intro_article->lienket_baiviet->CssClass = "";
			$intro_article->lienket_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$intro_article->thoigian_them->ViewValue = $intro_article->thoigian_them->CurrentValue;
			$intro_article->thoigian_them->ViewValue = ew_FormatDateTime($intro_article->thoigian_them->ViewValue, 7);
			$intro_article->thoigian_them->CssStyle = "";
			$intro_article->thoigian_them->CssClass = "";
			$intro_article->thoigian_them->ViewCustomAttributes = "";

			// thoihan_sua
			$intro_article->thoihan_sua->ViewValue = $intro_article->thoihan_sua->CurrentValue;
			$intro_article->thoihan_sua->ViewValue = ew_FormatDateTime($intro_article->thoihan_sua->ViewValue, 7);
			$intro_article->thoihan_sua->CssStyle = "";
			$intro_article->thoihan_sua->CssClass = "";
			$intro_article->thoihan_sua->ViewCustomAttributes = "";

			// nguoi_them
			$intro_article->nguoi_them->ViewValue = $intro_article->nguoi_them->CurrentValue;
			$intro_article->nguoi_them->CssStyle = "";
			$intro_article->nguoi_them->CssClass = "";
			$intro_article->nguoi_them->ViewCustomAttributes = "";

			// nguoi_sua
			$intro_article->nguoi_sua->ViewValue = $intro_article->nguoi_sua->CurrentValue;
			$intro_article->nguoi_sua->CssStyle = "";
			$intro_article->nguoi_sua->CssClass = "";
			$intro_article->nguoi_sua->ViewCustomAttributes = "";

			// soluot_truynhap
			$intro_article->soluot_truynhap->ViewValue = $intro_article->soluot_truynhap->CurrentValue;
			$intro_article->soluot_truynhap->CssStyle = "";
			$intro_article->soluot_truynhap->CssClass = "";
			$intro_article->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($intro_article->trang_thai->CurrentValue) <> "") {
				switch ($intro_article->trang_thai->CurrentValue) {
					case "0":
						$intro_article->trang_thai->ViewValue = "Không xuất bản";
						break;
					case "1":
						$intro_article->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$intro_article->trang_thai->ViewValue = $intro_article->trang_thai->CurrentValue;
				}
			} else {
				$intro_article->trang_thai->ViewValue = NULL;
			}
			$intro_article->trang_thai->CssStyle = "";
			$intro_article->trang_thai->CssClass = "";
			$intro_article->trang_thai->ViewCustomAttributes = "";

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->HrefValue = "";

			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->HrefValue = "";

			// tomtat_baiviet
			$intro_article->tomtat_baiviet->HrefValue = "";

			// noidung_baiviet
			$intro_article->noidung_baiviet->HrefValue = "";

			// nguon_baiviet
			$intro_article->nguon_baiviet->HrefValue = "";

			// lienket_baiviet
			$intro_article->lienket_baiviet->HrefValue = "";

			// thoigian_them
			$intro_article->thoigian_them->HrefValue = "";

			// thoihan_sua
			$intro_article->thoihan_sua->HrefValue = "";

			// nguoi_them
			$intro_article->nguoi_them->HrefValue = "";

			// nguoi_sua
			$intro_article->nguoi_sua->HrefValue = "";

			// soluot_truynhap
			$intro_article->soluot_truynhap->HrefValue = "";

			// trang_thai
			$intro_article->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$intro_article->Row_Rendered();
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
