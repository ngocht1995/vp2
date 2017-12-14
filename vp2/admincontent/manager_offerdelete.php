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
$manager_offer_delete = new cmanager_offer_delete();
$Page =& $manager_offer_delete;

// Page init processing
$manager_offer_delete->Page_Init();

// Page main processing
$manager_offer_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var manager_offer_delete = new ew_Page("manager_offer_delete");

// page properties
manager_offer_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = manager_offer_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
manager_offer_delete.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
manager_offer_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_offer_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_offer_delete.ValidateRequired = false; // no JavaScript validation
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
<?php

// Load records for display
$rs = $manager_offer_delete->LoadRecordset();
$manager_offer_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($manager_offer_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$manager_offer_delete->Page_Terminate("manager_offerlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $manager_offer->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $manager_offer_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="manager_offer">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($manager_offer_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $manager_offer->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tiêu đề chào hàng</td>
                <td valign="top">Ảnh</td>
		<td valign="top">Kiểu chào hàng</td>
		<td valign="top">Số lần xem</td>
		<td valign="top">Thời gian bắt đầu</td>
		<td valign="top">Thời gian kết thúc</td>
		<td valign="top">Trạng thái</td>
		<td valign="top">Xuất bản</td>
		<td valign="top">Chào hàng tiêu biểu</td>
		<td valign="top">Xuất sứ</td>
	</tr>
	</thead>
	<tbody>
<?php
$manager_offer_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$manager_offer_delete->lRecCnt++;

	// Set row properties
	$manager_offer->CssClass = "";
	$manager_offer->CssStyle = "";
	$manager_offer->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$manager_offer_delete->LoadRowValues($rs);

	// Render row
	$manager_offer_delete->RenderRow();
?>
	<tr<?php echo $manager_offer->RowAttributes() ?>>
		<td<?php echo $manager_offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->tieude_chaohang->ViewAttributes() ?>><?php echo $manager_offer->tieude_chaohang->ListViewValue() ?></div></td>
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
		<td<?php echo $manager_offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->kieu_chaohang->ViewAttributes() ?>><?php echo $manager_offer->kieu_chaohang->ListViewValue() ?></div></td>
		<td<?php echo $manager_offer->so_lanxem->CellAttributes() ?>>
<div<?php echo $manager_offer->so_lanxem->ViewAttributes() ?>><?php echo $manager_offer->so_lanxem->ListViewValue() ?></div></td>
		<td<?php echo $manager_offer->thoihan_tungay->CellAttributes() ?>>
<div<?php echo $manager_offer->thoihan_tungay->ViewAttributes() ?>><?php echo $manager_offer->thoihan_tungay->ListViewValue() ?></div></td>
		<td<?php echo $manager_offer->thoihan_denngay->CellAttributes() ?>>
<div<?php echo $manager_offer->thoihan_denngay->ViewAttributes() ?>><?php echo $manager_offer->thoihan_denngay->ListViewValue() ?></div></td>
		<td<?php echo $manager_offer->trang_thai->CellAttributes() ?>>
<div<?php echo $manager_offer->trang_thai->ViewAttributes() ?>><?php echo $manager_offer->trang_thai->ListViewValue() ?></div></td>
		<td<?php echo $manager_offer->xuatban->CellAttributes() ?>>
<div<?php echo $manager_offer->xuatban->ViewAttributes() ?>><?php echo $manager_offer->xuatban->ListViewValue() ?></div></td>
		<td<?php echo $manager_offer->chaohang_tieubieu->CellAttributes() ?>>
<div<?php echo $manager_offer->chaohang_tieubieu->ViewAttributes() ?>><?php echo $manager_offer->chaohang_tieubieu->ListViewValue() ?></div></td>
		<td<?php echo $manager_offer->xuat_su->CellAttributes() ?>>
<div<?php echo $manager_offer->xuat_su->ViewAttributes() ?>><?php echo $manager_offer->xuat_su->ListViewValue() ?></div></td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="  Xóa  ">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cmanager_offer_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'manager_offer';

	// Page Object Name
	var $PageObjName = 'manager_offer_delete';

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
	function cmanager_offer_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_offer"] = new cmanager_offer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $manager_offer;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["chaohang_id"] <> "") {
			$manager_offer->chaohang_id->setQueryStringValue($_GET["chaohang_id"]);
			if (!is_numeric($manager_offer->chaohang_id->QueryStringValue))
				$this->Page_Terminate("manager_offerlist.php"); // Prevent SQL injection, exit
			$sKey .= $manager_offer->chaohang_id->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("manager_offerlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("manager_offerlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`chaohang_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in manager_offer class, manager_offerinfo.php

		$manager_offer->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$manager_offer->CurrentAction = $_POST["a_delete"];
		} else {
			$manager_offer->CurrentAction = "I"; // Display record
		}
		switch ($manager_offer->CurrentAction) {
			case "D": // Delete
				$manager_offer->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa"); // Set up success message
					$this->Page_Terminate($manager_offer->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $manager_offer;
		$DeleteRows = TRUE;
		$sWrkFilter = $manager_offer->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in manager_offer class, manager_offerinfo.php

		$manager_offer->CurrentFilter = $sWrkFilter;
		$sSql = $manager_offer->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage(""); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs) $rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $manager_offer->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['chaohang_id'];
				@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $row['anh_chaohang']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($manager_offer->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($manager_offer->CancelMessage <> "") {
				$this->setMessage($manager_offer->CancelMessage);
				$manager_offer->CancelMessage = "";
			} else {
				$this->setMessage("");
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call recordset deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$manager_offer->Row_Deleted($row);
			}
		}
		return $DeleteRows;
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

		$manager_offer->tieude_chaohang->CellCssStyle = "width: 300px;";
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

		// thoihan_tungay
		$manager_offer->thoihan_tungay->CellCssStyle = "";
		$manager_offer->thoihan_tungay->CellCssClass = "";

		// thoihan_denngay
		$manager_offer->thoihan_denngay->CellCssStyle = "";
		$manager_offer->thoihan_denngay->CellCssClass = "";

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

			// trang_thai
			if (strval($manager_offer->trang_thai->CurrentValue) <> "") {
				switch ($manager_offer->trang_thai->CurrentValue) {
					case "1":
						$manager_offer->trang_thai->ViewValue = "<font color=\"#FF0000\">Chưa kích hoạt</font>";
						break;
					case "2":
						$manager_offer->trang_thai->ViewValue = "Đã kích hoạt";
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
						$manager_offer->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
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
						$manager_offer->chaohang_tieubieu->ViewValue = "<font color=\"#FF0000\">Tiêu biểu</font>";
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

			// thoihan_tungay
			$manager_offer->thoihan_tungay->HrefValue = "";

			// thoihan_denngay
			$manager_offer->thoihan_denngay->HrefValue = "";

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
