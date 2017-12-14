<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
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
$user_delete = new cuser_delete();
$Page =& $user_delete;

// Page init processing
$user_delete->Page_Init();

// Page main processing
$user_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var user_delete = new ew_Page("user_delete");

// page properties
user_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = user_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
user_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $user_delete->LoadRecordset();
$user_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($user_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$user_delete->Page_Terminate("userlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Tmdt User<br><br>
<a href="<?php echo $user->getReturnUrl() ?>">Go Back</a></span></p>
<?php $user_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="user">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($user_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $user->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
	</tr>
	</thead>
	<tbody>
<?php
$user_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$user_delete->lRecCnt++;

	// Set row properties
	$user->CssClass = "";
	$user->CssStyle = "";
	$user->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$user_delete->LoadRowValues($rs);

	// Render row
	$user_delete->RenderRow();
?>
	<tr<?php echo $user->RowAttributes() ?>>
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
class cuser_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'user';

	// Page Object Name
	var $PageObjName = 'user_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user;
		if ($user->UseTokenInUrl) $PageUrl .= "t=" . $user->TableVar . "&"; // add page token
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
		global $objForm, $user;
		if ($user->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user;
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
			$this->Page_Terminate("userlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("userlist.php");
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
		global $user;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["nguoidung_id"] <> "") {
			$user->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			if (!is_numeric($user->nguoidung_id->QueryStringValue))
				$this->Page_Terminate("userlist.php"); // Prevent SQL injection, exit
			$sKey .= $user->nguoidung_id->QueryStringValue;
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
			$this->Page_Terminate("userlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("userlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`nguoidung_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in user class, userinfo.php

		$user->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$user->CurrentAction = $_POST["a_delete"];
		} else {
			$user->CurrentAction = "D"; // Delete record directly
		}
		switch ($user->CurrentAction) {
			case "D": // Delete
				$user->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($user->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $user;
		$DeleteRows = TRUE;
		$sWrkFilter = $user->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in user class, userinfo.php

		$user->CurrentFilter = $sWrkFilter;
		$sSql = $user->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("Không có dữ liệu"); // No record found
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
				$DeleteRows = $user->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($user->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($user->CancelMessage <> "") {
				$this->setMessage($user->CancelMessage);
				$user->CancelMessage = "";
			} else {
				$this->setMessage("Xóa bị hủy bỏ");
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
				$user->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user;

		// Call Recordset Selecting event
		$user->Recordset_Selecting($user->CurrentFilter);

		// Load list page SQL
		$sSql = $user->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user;
		$sFilter = $user->KeyFilter();

		// Call Row Selecting event
		$user->Row_Selecting($sFilter);

		// Load sql based on filter
		$user->CurrentFilter = $sFilter;
		$sSql = $user->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user;
		$user->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$user->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$user->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$user->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$user->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$user->ten_nguoilienhe->setDbValue($rs->fields('ten_nguoilienhe'));
		$user->mat_khau->setDbValue($rs->fields('mat_khau'));
		$user->ten_congty->setDbValue($rs->fields('ten_congty'));
		$user->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$user->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$user->website->setDbValue($rs->fields('website'));
		$user->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$user->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$user->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$user->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$user->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$user->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$user->cung_cap->setDbValue($rs->fields('cung_cap'));
		$user->chung_chi->setDbValue($rs->fields('chung_chi'));
		$user->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$user->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$user->ma_quocgia_dthoai->setDbValue($rs->fields('ma_quocgia_dthoai'));
		$user->ma_vung_dthoai->setDbValue($rs->fields('ma_vung_dthoai'));
		$user->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$user->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$user->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$user->so_fax->setDbValue($rs->fields('so_fax'));
		$user->dia_chi->setDbValue($rs->fields('dia_chi'));
		$user->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$user->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$user->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$user->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$user->nick_skype->setDbValue($rs->fields('nick_skype'));
		$user->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$user->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$user->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$user->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$user->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user;

		// Call Row_Rendering event
		$user->Row_Rendering();

		// Common render codes for all row types
		if ($user->RowType == EW_ROWTYPE_VIEW) { // View row

			// quocgia_id
			if (strval($user->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($user->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$user->quocgia_id->ViewValue = $user->quocgia_id->CurrentValue;
				}
			} else {
				$user->quocgia_id->ViewValue = NULL;
			}
			$user->quocgia_id->CssStyle = "";
			$user->quocgia_id->CssClass = "";
			$user->quocgia_id->ViewCustomAttributes = "";
		}

		// Call Row Rendered event
		$user->Row_Rendered();
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
