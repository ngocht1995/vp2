<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersRegisteredinfo.php" ?>
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
$UsersRegistered_delete = new cUsersRegistered_delete();
$Page =& $UsersRegistered_delete;

// Page init processing
$UsersRegistered_delete->Page_Init();

// Page main processing
$UsersRegistered_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var UsersRegistered_delete = new ew_Page("UsersRegistered_delete");

// page properties
UsersRegistered_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = UsersRegistered_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
UsersRegistered_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersRegistered_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersRegistered_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersRegistered_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $UsersRegistered_delete->LoadRecordset();
$UsersRegistered_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($UsersRegistered_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$UsersRegistered_delete->Page_Terminate("UsersRegisteredlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From CUSTOM VIEW: Users Registered<br><br>
<a href="<?php echo $UsersRegistered->getReturnUrl() ?>">Go Back</a></span></p>
<?php $UsersRegistered_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="UsersRegistered">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($UsersRegistered_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $UsersRegistered->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Loại người dùng</td>
		<td valign="top">Tên đăng nhập</td>
		<td valign="top">Tên công ty</td>
		<td valign="top">Ngày tham gia</td>
		<td valign="top">Truy cập gần nhất</td>
		<td valign="top">Kiểu giao diện</td>
		<td valign="top">Cấp bậc</td>
	</tr>
	</thead>
	<tbody>
<?php
$UsersRegistered_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$UsersRegistered_delete->lRecCnt++;

	// Set row properties
	$UsersRegistered->CssClass = "";
	$UsersRegistered->CssStyle = "";
	$UsersRegistered->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$UsersRegistered_delete->LoadRowValues($rs);

	// Render row
	$UsersRegistered_delete->RenderRow();
?>
	<tr<?php echo $UsersRegistered->RowAttributes() ?>>
		<td<?php echo $UsersRegistered->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UsersRegistered->nguoidung_option->ViewAttributes() ?>><?php echo $UsersRegistered->nguoidung_option->ListViewValue() ?></div></td>
		<td<?php echo $UsersRegistered->tendangnhap->CellAttributes() ?>>
<div<?php echo $UsersRegistered->tendangnhap->ViewAttributes() ?>><?php echo $UsersRegistered->tendangnhap->ListViewValue() ?></div></td>
		<td<?php echo $UsersRegistered->ten_congty->CellAttributes() ?>>
<div<?php echo $UsersRegistered->ten_congty->ViewAttributes() ?>><?php echo $UsersRegistered->ten_congty->ListViewValue() ?></div></td>
		<td<?php echo $UsersRegistered->ngay_thamgia->CellAttributes() ?>>
<div<?php echo $UsersRegistered->ngay_thamgia->ViewAttributes() ?>><?php echo $UsersRegistered->ngay_thamgia->ListViewValue() ?></div></td>
		<td<?php echo $UsersRegistered->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UsersRegistered->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersRegistered->truycap_gannhat->ListViewValue() ?></div></td>
		<td<?php echo $UsersRegistered->kieu_giaodien->CellAttributes() ?>>
<div<?php echo $UsersRegistered->kieu_giaodien->ViewAttributes() ?>><?php echo $UsersRegistered->kieu_giaodien->ListViewValue() ?></div></td>
		<td<?php echo $UsersRegistered->UserLevelID->CellAttributes() ?>>
<div<?php echo $UsersRegistered->UserLevelID->ViewAttributes() ?>><?php echo $UsersRegistered->UserLevelID->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="Confirm Delete">
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
class cUsersRegistered_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'UsersRegistered';

	// Page Object Name
	var $PageObjName = 'UsersRegistered_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) $PageUrl .= "t=" . $UsersRegistered->TableVar . "&"; // add page token
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
		global $objForm, $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersRegistered->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersRegistered->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersRegistered_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersRegistered"] = new cUsersRegistered();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersRegistered', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersRegistered;
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
			$this->Page_Terminate("UsersRegisteredlist.php");
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $UsersRegistered;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["nguoidung_id"] <> "") {
			$UsersRegistered->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			if (!is_numeric($UsersRegistered->nguoidung_id->QueryStringValue))
				$this->Page_Terminate("UsersRegisteredlist.php"); // Prevent SQL injection, exit
			$sKey .= $UsersRegistered->nguoidung_id->QueryStringValue;
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
			$this->Page_Terminate("UsersRegisteredlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("UsersRegisteredlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`nguoidung_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in UsersRegistered class, UsersRegisteredinfo.php

		$UsersRegistered->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$UsersRegistered->CurrentAction = $_POST["a_delete"];
		} else {
			$UsersRegistered->CurrentAction = "D"; // Delete record directly
		}
		switch ($UsersRegistered->CurrentAction) {
			case "D": // Delete
				$UsersRegistered->SendEmail = TRUE; // Send email on delete success
                                if ($this->CheckOffer()) { // Kiểm tra liên quan chào hàng
					$this->setMessage("Không thể xóa người dùng còn thông tin chào hàng"); // Set up success message
                                        $this->Page_Terminate($UsersRegistered->getReturnUrl()); // Return to caller
				}elseif ($this->CheckProduct()) { // Kiểm tra liên quan sản phẩm
                                        $this->setMessage("Không thể xóa người dùng còn thông tin sản phẩm"); // Set up success message
					$this->Page_Terminate($UsersRegistered->getReturnUrl()); // Return to caller
                                }else{
                                if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($UsersRegistered->getReturnUrl()); // Return to caller
				}
                                }
		}
	}
        // Kiểm tra người dùng có chứa thông tin sản phẩm và chào hàng
        function CheckOffer() {
		global $conn, $Security, $UsersRegistered;
                $sSql ="Select offer.chaohang_id from offer where ".$UsersRegistered->CurrentFilter;
		$conn->raiseErrorFn = 'ew_ErrorFn';
                $rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			//$this->setMessage(Lang_Text("Không có dữ liệu")); // No record found
			$rs->Close();
			return FALSE;
		}
                return TRUE;
        }
        function CheckProduct() {
		global $conn, $Security, $UsersRegistered;
                $sSql = "Select products.sanpham_id from products where ".$UsersRegistered->CurrentFilter;
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			//$this->setMessage(Lang_Text("Không có dữ liệu")); // No record found
			$rs->Close();
			return FALSE;
		}
                 return TRUE;
        }

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $UsersRegistered;
		$DeleteRows = TRUE;
		$sWrkFilter = $UsersRegistered->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in UsersRegistered class, UsersRegisteredinfo.php

		$UsersRegistered->CurrentFilter = $sWrkFilter;
		$sSql = $UsersRegistered->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("Không tìm thấy dữ liệu"); // No record found
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
				$DeleteRows = $UsersRegistered->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['nguoidung_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($UsersRegistered->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($UsersRegistered->CancelMessage <> "") {
				$this->setMessage($UsersRegistered->CancelMessage);
				$UsersRegistered->CancelMessage = "";
			} else {
				$this->setMessage("Hủy bỏ xóa dữ liệu");
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
				$UsersRegistered->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UsersRegistered;

		// Call Recordset Selecting event
		$UsersRegistered->Recordset_Selecting($UsersRegistered->CurrentFilter);

		// Load list page SQL
		$sSql = $UsersRegistered->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UsersRegistered->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UsersRegistered;
		$sFilter = $UsersRegistered->KeyFilter();

		// Call Row Selecting event
		$UsersRegistered->Row_Selecting($sFilter);

		// Load sql based on filter
		$UsersRegistered->CurrentFilter = $sFilter;
		$sSql = $UsersRegistered->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UsersRegistered->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UsersRegistered;
		$UsersRegistered->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UsersRegistered->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UsersRegistered->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UsersRegistered->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UsersRegistered->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UsersRegistered->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UsersRegistered->ten_nguoilienhe->setDbValue($rs->fields('ten_nguoilienhe'));
		$UsersRegistered->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UsersRegistered->ten_congty->setDbValue($rs->fields('ten_congty'));
		$UsersRegistered->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$UsersRegistered->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$UsersRegistered->website->setDbValue($rs->fields('website'));
		$UsersRegistered->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$UsersRegistered->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$UsersRegistered->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$UsersRegistered->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$UsersRegistered->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$UsersRegistered->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$UsersRegistered->cung_cap->setDbValue($rs->fields('cung_cap'));
		$UsersRegistered->chung_chi->setDbValue($rs->fields('chung_chi'));
		$UsersRegistered->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$UsersRegistered->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$UsersRegistered->ma_quocgia_dthoai->setDbValue($rs->fields('ma_quocgia_dthoai'));
		$UsersRegistered->ma_vung_dthoai->setDbValue($rs->fields('ma_vung_dthoai'));
		$UsersRegistered->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$UsersRegistered->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$UsersRegistered->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$UsersRegistered->so_fax->setDbValue($rs->fields('so_fax'));
		$UsersRegistered->dia_chi->setDbValue($rs->fields('dia_chi'));
		$UsersRegistered->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$UsersRegistered->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$UsersRegistered->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$UsersRegistered->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UsersRegistered->nick_skype->setDbValue($rs->fields('nick_skype'));
		$UsersRegistered->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UsersRegistered->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$UsersRegistered->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UsersRegistered->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$UsersRegistered->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersRegistered;

		// Call Row_Rendering event
		$UsersRegistered->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UsersRegistered->nguoidung_option->CellCssStyle = "";
		$UsersRegistered->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UsersRegistered->tendangnhap->CellCssStyle = "";
		$UsersRegistered->tendangnhap->CellCssClass = "";

		// ten_congty
		$UsersRegistered->ten_congty->CellCssStyle = "";
		$UsersRegistered->ten_congty->CellCssClass = "";

		// ngay_thamgia
		$UsersRegistered->ngay_thamgia->CellCssStyle = "";
		$UsersRegistered->ngay_thamgia->CellCssClass = "";

		// truycap_gannhat
		$UsersRegistered->truycap_gannhat->CellCssStyle = "";
		$UsersRegistered->truycap_gannhat->CellCssClass = "";

		// kieu_giaodien
		$UsersRegistered->kieu_giaodien->CellCssStyle = "";
		$UsersRegistered->kieu_giaodien->CellCssClass = "";

		// UserLevelID
		$UsersRegistered->UserLevelID->CellCssStyle = "";
		$UsersRegistered->UserLevelID->CellCssClass = "";
		if ($UsersRegistered->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UsersRegistered->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersRegistered->nguoidung_option->CurrentValue) {
					case "0":
						$UsersRegistered->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersRegistered->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UsersRegistered->nguoidung_option->ViewValue = $UsersRegistered->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersRegistered->nguoidung_option->ViewValue = NULL;
			}
			$UsersRegistered->nguoidung_option->CssStyle = "";
			$UsersRegistered->nguoidung_option->CssClass = "";
			$UsersRegistered->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->ViewValue = $UsersRegistered->tendangnhap->CurrentValue;
			$UsersRegistered->tendangnhap->CssStyle = "";
			$UsersRegistered->tendangnhap->CssClass = "";
			$UsersRegistered->tendangnhap->ViewCustomAttributes = "";

			// ten_congty
			$UsersRegistered->ten_congty->ViewValue = $UsersRegistered->ten_congty->CurrentValue;
			$UsersRegistered->ten_congty->CssStyle = "";
			$UsersRegistered->ten_congty->CssClass = "";
			$UsersRegistered->ten_congty->ViewCustomAttributes = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->ViewValue = $UsersRegistered->ngay_thamgia->CurrentValue;
			$UsersRegistered->ngay_thamgia->ViewValue = ew_FormatDateTime($UsersRegistered->ngay_thamgia->ViewValue, 7);
			$UsersRegistered->ngay_thamgia->CssStyle = "";
			$UsersRegistered->ngay_thamgia->CssClass = "";
			$UsersRegistered->ngay_thamgia->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->ViewValue = $UsersRegistered->truycap_gannhat->CurrentValue;
			$UsersRegistered->truycap_gannhat->ViewValue = ew_FormatDateTime($UsersRegistered->truycap_gannhat->ViewValue, 11);
			$UsersRegistered->truycap_gannhat->CssStyle = "";
			$UsersRegistered->truycap_gannhat->CssClass = "";
			$UsersRegistered->truycap_gannhat->ViewCustomAttributes = "";

			// kieu_giaodien
			if (strval($UsersRegistered->kieu_giaodien->CurrentValue) <> "") {
				switch ($UsersRegistered->kieu_giaodien->CurrentValue) {
					case "1":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 1";
						break;
					case "2":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 2";
						break;
					case "3":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 3";
						break;
					default:
						$UsersRegistered->kieu_giaodien->ViewValue = $UsersRegistered->kieu_giaodien->CurrentValue;
				}
			} else {
				$UsersRegistered->kieu_giaodien->ViewValue = NULL;
			}
			$UsersRegistered->kieu_giaodien->CssStyle = "";
			$UsersRegistered->kieu_giaodien->CssClass = "";
			$UsersRegistered->kieu_giaodien->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UsersRegistered->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersRegistered->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersRegistered->UserLevelID->ViewValue = $UsersRegistered->UserLevelID->CurrentValue;
				}
			} else {
				$UsersRegistered->UserLevelID->ViewValue = NULL;
			}
			$UsersRegistered->UserLevelID->CssStyle = "";
			$UsersRegistered->UserLevelID->CssClass = "";
			$UsersRegistered->UserLevelID->ViewCustomAttributes = "";

			// nguoidung_option
			$UsersRegistered->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->HrefValue = "";

			// ten_congty
			$UsersRegistered->ten_congty->HrefValue = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->HrefValue = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->HrefValue = "";

			// kieu_giaodien
			$UsersRegistered->kieu_giaodien->HrefValue = "";

			// UserLevelID
			$UsersRegistered->UserLevelID->HrefValue = "";
		}

		// Call Row Rendered event
		$UsersRegistered->Row_Rendered();
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
