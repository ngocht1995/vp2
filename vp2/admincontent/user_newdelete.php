<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "user_newinfo.php" ?>
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
$user_new_delete = new cuser_new_delete();
$Page =& $user_new_delete;

// Page init processing
$user_new_delete->Page_Init();

// Page main processing
$user_new_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var user_new_delete = new ew_Page("user_new_delete");

// page properties
user_new_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = user_new_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
user_new_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_new_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_new_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_new_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $user_new_delete->LoadRecordset();
$user_new_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($user_new_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$user_new_delete->Page_Terminate("user_newlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $user_new->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa mục tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $user_new_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="user_new">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($user_new_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $user_new->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tiêu đề</td>
		<td valign="top">Thời gian nhập</td>
		<td valign="top">Số lượt xem</td>
		<td valign="top">Trạng thái</td>
		<td valign="top">Xuất bản</td>
	</tr>
	</thead>
	<tbody>
<?php
$user_new_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$user_new_delete->lRecCnt++;

	// Set row properties
	$user_new->CssClass = "";
	$user_new->CssStyle = "";
	$user_new->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$user_new_delete->LoadRowValues($rs);

	// Render row
	$user_new_delete->RenderRow();
?>
	<tr<?php echo $user_new->RowAttributes() ?>>
		<td<?php echo $user_new->tieude_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->tieude_tintuc->ViewAttributes() ?>><?php echo $user_new->tieude_tintuc->ListViewValue() ?></div></td>
		<td<?php echo $user_new->thoigian_them->CellAttributes() ?>>
<div<?php echo $user_new->thoigian_them->ViewAttributes() ?>><?php echo $user_new->thoigian_them->ListViewValue() ?></div></td>
		<td<?php echo $user_new->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $user_new->soluot_truynhap->ViewAttributes() ?>><?php echo $user_new->soluot_truynhap->ListViewValue() ?></div></td>
		<td<?php echo $user_new->trang_thai->CellAttributes() ?>>
<div<?php echo $user_new->trang_thai->ViewAttributes() ?>><?php echo $user_new->trang_thai->ListViewValue() ?></div></td>
		<td<?php echo $user_new->xuatban->CellAttributes() ?>>
<div<?php echo $user_new->xuatban->ViewAttributes() ?>><?php echo $user_new->xuatban->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value=" Xóa tin ">
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
class cuser_new_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'user_new';

	// Page Object Name
	var $PageObjName = 'user_new_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user_new;
		if ($user_new->UseTokenInUrl) $PageUrl .= "t=" . $user_new->TableVar . "&"; // add page token
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
		global $objForm, $user_new;
		if ($user_new->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user_new->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user_new->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_new_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["user_new"] = new cuser_new();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user_new', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user_new;
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
			$this->Page_Terminate("user_newlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("user_newlist.php");
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
		global $user_new;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["tintuc_id"] <> "") {
			$user_new->tintuc_id->setQueryStringValue($_GET["tintuc_id"]);
			if (!is_numeric($user_new->tintuc_id->QueryStringValue))
				$this->Page_Terminate("user_newlist.php"); // Prevent SQL injection, exit
			$sKey .= $user_new->tintuc_id->QueryStringValue;
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
			$this->Page_Terminate("user_newlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("user_newlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`tintuc_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in user_new class, user_newinfo.php

		$user_new->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$user_new->CurrentAction = $_POST["a_delete"];
		} else {
			$user_new->CurrentAction = "I"; // Display record
		}
		switch ($user_new->CurrentAction) {
			case "D": // Delete
				$user_new->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xoa tin"); // Set up success message
					$this->Page_Terminate($user_new->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $user_new;
		$DeleteRows = TRUE;
		$sWrkFilter = $user_new->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in user_new class, user_newinfo.php

		$user_new->CurrentFilter = $sWrkFilter;
		$sSql = $user_new->SQL();
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
				$DeleteRows = $user_new->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['tintuc_id'];
				@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $row['anh_tintuc']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($user_new->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($user_new->CancelMessage <> "") {
				$this->setMessage($user_new->CancelMessage);
				$user_new->CancelMessage = "";
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
				$user_new->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user_new;

		// Call Recordset Selecting event
		$user_new->Recordset_Selecting($user_new->CurrentFilter);

		// Load list page SQL
		$sSql = $user_new->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user_new->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user_new;
		$sFilter = $user_new->KeyFilter();

		// Call Row Selecting event
		$user_new->Row_Selecting($sFilter);

		// Load sql based on filter
		$user_new->CurrentFilter = $sFilter;
		$sSql = $user_new->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user_new->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user_new;
		$user_new->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$user_new->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user_new->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$user_new->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$user_new->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$user_new->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$user_new->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$user_new->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$user_new->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$user_new->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$user_new->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$user_new->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$user_new->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$user_new->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$user_new->trang_thai->setDbValue($rs->fields('trang_thai'));
		$user_new->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$user_new->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user_new;

		// Call Row_Rendering event
		$user_new->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$user_new->tieude_tintuc->CellCssStyle = "width: 340px; white-space: nowrap;";
		$user_new->tieude_tintuc->CellCssClass = "";

		// thoigian_them
		$user_new->thoigian_them->CellCssStyle = "width: 120px; white-space: nowrap;";
		$user_new->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$user_new->soluot_truynhap->CellCssStyle = "width: 120px; white-space: nowrap;";
		$user_new->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$user_new->trang_thai->CellCssStyle = "width: 120px; white-space: nowrap;";
		$user_new->trang_thai->CellCssClass = "";

		// xuatban
		$user_new->xuatban->CellCssStyle = "white-space: nowrap;";
		$user_new->xuatban->CellCssClass = "";
		if ($user_new->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$user_new->tieude_tintuc->ViewValue = $user_new->tieude_tintuc->CurrentValue;
			$user_new->tieude_tintuc->CssStyle = "";
			$user_new->tieude_tintuc->CssClass = "";
			$user_new->tieude_tintuc->ViewCustomAttributes = "";

			// thoigian_them
			$user_new->thoigian_them->ViewValue = $user_new->thoigian_them->CurrentValue;
			$user_new->thoigian_them->ViewValue = ew_FormatDateTime($user_new->thoigian_them->ViewValue, 7);
			$user_new->thoigian_them->CssStyle = "";
			$user_new->thoigian_them->CssClass = "";
			$user_new->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$user_new->soluot_truynhap->ViewValue = $user_new->soluot_truynhap->CurrentValue;
			$user_new->soluot_truynhap->CssStyle = "";
			$user_new->soluot_truynhap->CssClass = "";
			$user_new->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($user_new->trang_thai->CurrentValue) <> "") {
				switch ($user_new->trang_thai->CurrentValue) {
					case "1":
						$user_new->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$user_new->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$user_new->trang_thai->ViewValue = $user_new->trang_thai->CurrentValue;
				}
			} else {
				$user_new->trang_thai->ViewValue = NULL;
			}
			$user_new->trang_thai->CssStyle = "";
			$user_new->trang_thai->CssClass = "";
			$user_new->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($user_new->xuatban->CurrentValue) <> "") {
				switch ($user_new->xuatban->CurrentValue) {
					case "0":
						$user_new->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$user_new->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$user_new->xuatban->ViewValue = $user_new->xuatban->CurrentValue;
				}
			} else {
				$user_new->xuatban->ViewValue = NULL;
			}
			$user_new->xuatban->CssStyle = "";
			$user_new->xuatban->CssClass = "";
			$user_new->xuatban->ViewCustomAttributes = "";

			// tieude_tintuc
			$user_new->tieude_tintuc->HrefValue = "";

			// thoigian_them
			$user_new->thoigian_them->HrefValue = "";

			// soluot_truynhap
			$user_new->soluot_truynhap->HrefValue = "";

			// trang_thai
			$user_new->trang_thai->HrefValue = "";

			// xuatban
			$user_new->xuatban->HrefValue = "";
		}

		// Call Row Rendered event
		$user_new->Row_Rendered();
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
