<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "unreadinfo.php" ?>
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
$unread_delete = new cunread_delete();
$Page =& $unread_delete;

// Page init processing
$unread_delete->Page_Init();

// Page main processing
$unread_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var unread_delete = new ew_Page("unread_delete");

// page properties
unread_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = unread_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
unread_delete.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
unread_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
unread_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
unread_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $unread_delete->LoadRecordset();
$unread_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($unread_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$unread_delete->Page_Terminate("unreadlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $unread->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa thư liên hệ</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table><br>

<?php $unread_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="unread">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($unread_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $unread->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tiêu đề</td>
		<td valign="top">Người liên hệ</td>
		<td valign="top">Email</td>
		<td valign="top">Ngày gửi</td>
		<td valign="top">Trạng thái</td>
	</tr>
	</thead>
	<tbody>
<?php
$unread_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$unread_delete->lRecCnt++;

	// Set row properties
	$unread->CssClass = "";
	$unread->CssStyle = "";
	$unread->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$unread_delete->LoadRowValues($rs);

	// Render row
	$unread_delete->RenderRow();
?>
	<tr<?php echo $unread->RowAttributes() ?>>
		<td<?php echo $unread->tieu_de->CellAttributes() ?>>
<div<?php echo $unread->tieu_de->ViewAttributes() ?>><?php echo $unread->tieu_de->ListViewValue() ?></div></td>
		<td<?php echo $unread->nguoi_lienhe->CellAttributes() ?>>
<div<?php echo $unread->nguoi_lienhe->ViewAttributes() ?>><?php echo $unread->nguoi_lienhe->ListViewValue() ?></div></td>
		<td<?php echo $unread->diachi_email->CellAttributes() ?>>
<div<?php echo $unread->diachi_email->ViewAttributes() ?>><?php echo $unread->diachi_email->ListViewValue() ?></div></td>
		<td<?php echo $unread->ngay_gui->CellAttributes() ?>>
<div<?php echo $unread->ngay_gui->ViewAttributes() ?>><?php echo $unread->ngay_gui->ListViewValue() ?></div></td>
		<td<?php echo $unread->trang_thai->CellAttributes() ?>>
<div<?php echo $unread->trang_thai->ViewAttributes() ?>><?php echo $unread->trang_thai->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="   Xóa   ">
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
class cunread_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'unread';

	// Page Object Name
	var $PageObjName = 'unread_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $unread;
		if ($unread->UseTokenInUrl) $PageUrl .= "t=" . $unread->TableVar . "&"; // add page token
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
		global $objForm, $unread;
		if ($unread->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($unread->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($unread->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cunread_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["unread"] = new cunread();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'unread', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $unread;
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
			$this->Page_Terminate("unreadlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("unreadlist.php");
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
		global $unread;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["thu_id"] <> "") {
			$unread->thu_id->setQueryStringValue($_GET["thu_id"]);
			if (!is_numeric($unread->thu_id->QueryStringValue))
				$this->Page_Terminate("unreadlist.php"); // Prevent SQL injection, exit
			$sKey .= $unread->thu_id->QueryStringValue;
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
			$this->Page_Terminate("unreadlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("unreadlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`thu_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in unread class, unreadinfo.php

		$unread->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$unread->CurrentAction = $_POST["a_delete"];
		} else {
			$unread->CurrentAction = "I"; // Display record
		}
		switch ($unread->CurrentAction) {
			case "D": // Delete
				$unread->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa thư"); // Set up success message
					$this->Page_Terminate($unread->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $unread;
		$DeleteRows = TRUE;
		$sWrkFilter = $unread->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in unread class, unreadinfo.php

		$unread->CurrentFilter = $sWrkFilter;
		$sSql = $unread->SQL();
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
				$DeleteRows = $unread->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['thu_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($unread->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($unread->CancelMessage <> "") {
				$this->setMessage($unread->CancelMessage);
				$unread->CancelMessage = "";
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
				$unread->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $unread;

		// Call Recordset Selecting event
		$unread->Recordset_Selecting($unread->CurrentFilter);

		// Load list page SQL
		$sSql = $unread->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$unread->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $unread;
		$sFilter = $unread->KeyFilter();

		// Call Row Selecting event
		$unread->Row_Selecting($sFilter);

		// Load sql based on filter
		$unread->CurrentFilter = $sFilter;
		$sSql = $unread->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$unread->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $unread;
		$unread->thu_id->setDbValue($rs->fields('thu_id'));
		$unread->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$unread->tieu_de->setDbValue($rs->fields('tieu_de'));
		$unread->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$unread->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$unread->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$unread->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$unread->diachi_email->setDbValue($rs->fields('diachi_email'));
		$unread->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$unread->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$unread->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$unread->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$unread->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$unread->so_fax->setDbValue($rs->fields('so_fax'));
		$unread->dia_chi->setDbValue($rs->fields('dia_chi'));
		$unread->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$unread->trang_thai->setDbValue($rs->fields('trang_thai'));
		$unread->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $unread;

		// Call Row_Rendering event
		$unread->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$unread->tieu_de->CellCssStyle = "width: 250px; white-space: nowrap;";
		$unread->tieu_de->CellCssClass = "";

		// nguoi_lienhe
		$unread->nguoi_lienhe->CellCssStyle = "width: 150px; white-space: nowrap;";
		$unread->nguoi_lienhe->CellCssClass = "";

		// diachi_email
		$unread->diachi_email->CellCssStyle = "width: 150px; white-space: nowrap;";
		$unread->diachi_email->CellCssClass = "";

		// ngay_gui
		$unread->ngay_gui->CellCssStyle = "width: 120px; white-space: nowrap;";
		$unread->ngay_gui->CellCssClass = "";

		// trang_thai
		$unread->trang_thai->CellCssStyle = "white-space: nowrap;";
		$unread->trang_thai->CellCssClass = "";
		if ($unread->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$unread->tieu_de->ViewValue = $unread->tieu_de->CurrentValue;
			$unread->tieu_de->CssStyle = "";
			$unread->tieu_de->CssClass = "";
			$unread->tieu_de->ViewCustomAttributes = "";

			// nguoi_lienhe
			$unread->nguoi_lienhe->ViewValue = $unread->nguoi_lienhe->CurrentValue;
			$unread->nguoi_lienhe->CssStyle = "";
			$unread->nguoi_lienhe->CssClass = "";
			$unread->nguoi_lienhe->ViewCustomAttributes = "";

			// diachi_email
			$unread->diachi_email->ViewValue = $unread->diachi_email->CurrentValue;
			$unread->diachi_email->CssStyle = "";
			$unread->diachi_email->CssClass = "";
			$unread->diachi_email->ViewCustomAttributes = "";

			// ngay_gui
			$unread->ngay_gui->ViewValue = $unread->ngay_gui->CurrentValue;
			$unread->ngay_gui->ViewValue = ew_FormatDateTime($unread->ngay_gui->ViewValue, 7);
			$unread->ngay_gui->CssStyle = "";
			$unread->ngay_gui->CssClass = "";
			$unread->ngay_gui->ViewCustomAttributes = "";

			// trang_thai
			if (strval($unread->trang_thai->CurrentValue) <> "") {
				switch ($unread->trang_thai->CurrentValue) {
					case "1":
						$unread->trang_thai->ViewValue = "Chưa đọc";
						break;
					case "2":
						$unread->trang_thai->ViewValue = "Đã đọc";
						break;
					default:
						$unread->trang_thai->ViewValue = $unread->trang_thai->CurrentValue;
				}
			} else {
				$unread->trang_thai->ViewValue = NULL;
			}
			$unread->trang_thai->CssStyle = "";
			$unread->trang_thai->CssClass = "";
			$unread->trang_thai->ViewCustomAttributes = "";

			// tieu_de
			$unread->tieu_de->HrefValue = "";

			// nguoi_lienhe
			$unread->nguoi_lienhe->HrefValue = "";

			// diachi_email
			$unread->diachi_email->HrefValue = "";

			// ngay_gui
			$unread->ngay_gui->HrefValue = "";

			// trang_thai
			$unread->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$unread->Row_Rendered();
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
