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
$offer_delete = new coffer_delete();
$Page =& $offer_delete;

// Page init processing
$offer_delete->Page_Init();

// Page main processing
$offer_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var offer_delete = new ew_Page("offer_delete");

// page properties
offer_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = offer_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
offer_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
offer_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
offer_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
offer_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $offer_delete->LoadRecordset();
$offer_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($offer_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$offer_delete->Page_Terminate("offerlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $offer->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $offer_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="offer">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($offer_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $offer->TableCustomInnerHtml ?>
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
$offer_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$offer_delete->lRecCnt++;

	// Set row properties
	$offer->CssClass = "";
	$offer->CssStyle = "";
	$offer->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$offer_delete->LoadRowValues($rs);

	// Render row
	$offer_delete->RenderRow();
?>
	<tr<?php echo $offer->RowAttributes() ?>>
		<td<?php echo $offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $offer->tieude_chaohang->ViewAttributes() ?>><?php echo $offer->tieude_chaohang->ListViewValue() ?></div></td>
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
		<td<?php echo $offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $offer->kieu_chaohang->ViewAttributes() ?>><?php echo $offer->kieu_chaohang->ListViewValue() ?></div></td>
		<td<?php echo $offer->so_lanxem->CellAttributes() ?>>
<div<?php echo $offer->so_lanxem->ViewAttributes() ?>><?php echo $offer->so_lanxem->ListViewValue() ?></div></td>
		<td<?php echo $offer->thoihan_tungay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_tungay->ViewAttributes() ?>><?php echo $offer->thoihan_tungay->ListViewValue() ?></div></td>
		<td<?php echo $offer->thoihan_denngay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_denngay->ViewAttributes() ?>><?php echo $offer->thoihan_denngay->ListViewValue() ?></div></td>
		<td<?php echo $offer->trang_thai->CellAttributes() ?>>
<div<?php echo $offer->trang_thai->ViewAttributes() ?>><?php echo $offer->trang_thai->ListViewValue() ?></div></td>
		<td<?php echo $offer->xuatban->CellAttributes() ?>>
<div<?php echo $offer->xuatban->ViewAttributes() ?>><?php echo $offer->xuatban->ListViewValue() ?></div></td>
		<td<?php echo $offer->chaohang_tieubieu->CellAttributes() ?>>
<div<?php echo $offer->chaohang_tieubieu->ViewAttributes() ?>><?php echo $offer->chaohang_tieubieu->ListViewValue() ?></div></td>
		<td<?php echo $offer->xuat_su->CellAttributes() ?>>
<div<?php echo $offer->xuat_su->ViewAttributes() ?>><?php echo $offer->xuat_su->ListViewValue() ?></div></td>
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
class coffer_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'offer';

	// Page Object Name
	var $PageObjName = 'offer_delete';

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
	function coffer_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["offer"] = new coffer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $offer;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["chaohang_id"] <> "") {
			$offer->chaohang_id->setQueryStringValue($_GET["chaohang_id"]);
			if (!is_numeric($offer->chaohang_id->QueryStringValue))
				$this->Page_Terminate("offerlist.php"); // Prevent SQL injection, exit
			$sKey .= $offer->chaohang_id->QueryStringValue;
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
			$this->Page_Terminate("offerlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("offerlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`chaohang_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in offer class, offerinfo.php

		$offer->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$offer->CurrentAction = $_POST["a_delete"];
		} else {
			$offer->CurrentAction = "I"; // Display record
		}
		switch ($offer->CurrentAction) {
			case "D": // Delete
				$offer->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa"); // Set up success message
					$this->Page_Terminate($offer->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $offer;
		$DeleteRows = TRUE;
		$sWrkFilter = $offer->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in offer class, offerinfo.php

		$offer->CurrentFilter = $sWrkFilter;
		$sSql = $offer->SQL();
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
				$DeleteRows = $offer->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($offer->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($offer->CancelMessage <> "") {
				$this->setMessage($offer->CancelMessage);
				$offer->CancelMessage = "";
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
				$offer->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
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

		$offer->tieude_chaohang->CellCssStyle = "width: 300px;";
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

		// thoihan_tungay
		$offer->thoihan_tungay->CellCssStyle = "";
		$offer->thoihan_tungay->CellCssClass = "";

		// thoihan_denngay
		$offer->thoihan_denngay->CellCssStyle = "";
		$offer->thoihan_denngay->CellCssClass = "";

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
						$offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					case "2":
						$offer->kieu_chaohang->ViewValue = "Chào mua";
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

			// trang_thai
			if (strval($offer->trang_thai->CurrentValue) <> "") {
				switch ($offer->trang_thai->CurrentValue) {
					case "1":
						$offer->trang_thai->ViewValue = "<font color=\"#FF0000\">Chưa kích hoạt</font>";
						break;
					case "2":
						$offer->trang_thai->ViewValue = "Đã kích hoạt";
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
						$offer->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
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
						$offer->chaohang_tieubieu->ViewValue = "<font color=\"#FF0000\">Tiêu biểu</font>";
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

			// thoihan_tungay
			$offer->thoihan_tungay->HrefValue = "";

			// thoihan_denngay
			$offer->thoihan_denngay->HrefValue = "";

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
