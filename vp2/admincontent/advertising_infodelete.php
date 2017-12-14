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
$advertising_info_delete = new cadvertising_info_delete();
$Page =& $advertising_info_delete;

// Page init processing
$advertising_info_delete->Page_Init();

// Page main processing
$advertising_info_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_info_delete = new ew_Page("advertising_info_delete");

// page properties
advertising_info_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = advertising_info_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_info_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_info_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_info_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_info_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $advertising_info_delete->LoadRecordset();
$advertising_info_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($advertising_info_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$advertising_info_delete->Page_Terminate("advertising_infolist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $advertising_info->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý tin quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $advertising_info_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="advertising_info">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($advertising_info_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $advertising_info->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo Lang_Text('Chuyên mục bài viết');?></td>
		<td valign="top"><?php echo Lang_Text('Tiêu đề');?></td>
		<td valign="top"><?php echo Lang_Text("Thời gian nhập");?></td>
		<td valign="top"><?php echo Lang_Text('Số lần xem');?></td>
		<td valign="top"><?php echo Lang_Text('Trạng thái');?></td>
	</tr>
	</thead>
	<tbody>
<?php
$advertising_info_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$advertising_info_delete->lRecCnt++;

	// Set row properties
	$advertising_info->CssClass = "";
	$advertising_info->CssStyle = "";
	$advertising_info->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$advertising_info_delete->LoadRowValues($rs);

	// Render row
	$advertising_info_delete->RenderRow();
?>
	<tr<?php echo $advertising_info->RowAttributes() ?>>
		<td<?php echo $advertising_info->chuyenmuc_id->CellAttributes() ?>>
<div<?php echo $advertising_info->chuyenmuc_id->ViewAttributes() ?>>
<?php 
	$arwrk = $advertising_info->chuyenmuc_id->ListViewValue();
	if (is_array($arwrk)) {
		echo Lang_Str($arwrk[0][0],$arwrk[0][1]);
	}
?>
</div></td>
		<td<?php echo $advertising_info->tieude_baiviet->CellAttributes() ?>>
<div<?php echo $advertising_info->tieude_baiviet->ViewAttributes() ?>><?php echo $advertising_info->tieude_baiviet->ListViewValue() ?></div></td>
		<td<?php echo $advertising_info->thoigian_them->CellAttributes() ?>>
<div<?php echo $advertising_info->thoigian_them->ViewAttributes() ?>><?php echo $advertising_info->thoigian_them->ListViewValue() ?></div></td>
		<td<?php echo $advertising_info->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $advertising_info->soluot_truynhap->ViewAttributes() ?>><?php echo $advertising_info->soluot_truynhap->ListViewValue() ?></div></td>
		<td<?php echo $advertising_info->trang_thai->CellAttributes() ?>>
<div<?php echo $advertising_info->trang_thai->ViewAttributes() ?>><?php echo $advertising_info->trang_thai->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value=" <?php echo Lang_Text('Xóa');?> ">
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
class cadvertising_info_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'advertising_info';

	// Page Object Name
	var $PageObjName = 'advertising_info_delete';

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
	function cadvertising_info_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_info"] = new cadvertising_info();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $advertising_info;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["baiviet_id"] <> "") {
			$advertising_info->baiviet_id->setQueryStringValue($_GET["baiviet_id"]);
			if (!is_numeric($advertising_info->baiviet_id->QueryStringValue))
				$this->Page_Terminate("advertising_infolist.php"); // Prevent SQL injection, exit
			$sKey .= $advertising_info->baiviet_id->QueryStringValue;
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
			$this->Page_Terminate("advertising_infolist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("advertising_infolist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`baiviet_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in advertising_info class, advertising_infoinfo.php

		$advertising_info->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$advertising_info->CurrentAction = $_POST["a_delete"];
		} else {
			$advertising_info->CurrentAction = "I"; // Display record
		}
		switch ($advertising_info->CurrentAction) {
			case "D": // Delete
				$advertising_info->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage(Lang_Text('Đã xóa bài viết')); // Set up success message
					$this->Page_Terminate($advertising_info->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $advertising_info;
		$DeleteRows = TRUE;
		$sWrkFilter = $advertising_info->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in advertising_info class, advertising_infoinfo.php

		$advertising_info->CurrentFilter = $sWrkFilter;
		$sSql = $advertising_info->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage(Lang_Text('Không có dữ liệu')); // No record found
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
				$DeleteRows = $advertising_info->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['baiviet_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($advertising_info->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($advertising_info->CancelMessage <> "") {
				$this->setMessage($advertising_info->CancelMessage);
				$advertising_info->CancelMessage = "";
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
				$advertising_info->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
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

		$advertising_info->chuyenmuc_id->CellCssStyle = "white-space: nowrap;";
		$advertising_info->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$advertising_info->tieude_baiviet->CellCssStyle = "white-space: nowrap;";
		$advertising_info->tieude_baiviet->CellCssClass = "";

		// thoigian_them
		$advertising_info->thoigian_them->CellCssStyle = "white-space: nowrap;";
		$advertising_info->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$advertising_info->soluot_truynhap->CellCssStyle = "white-space: nowrap;";
		$advertising_info->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$advertising_info->trang_thai->CellCssStyle = "white-space: nowrap;";
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

			// thoigian_them
			$advertising_info->thoigian_them->ViewValue = $advertising_info->thoigian_them->CurrentValue;
			$advertising_info->thoigian_them->ViewValue = ew_FormatDateTime($advertising_info->thoigian_them->ViewValue, 7);
			$advertising_info->thoigian_them->CssStyle = "";
			$advertising_info->thoigian_them->CssClass = "";
			$advertising_info->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$advertising_info->soluot_truynhap->ViewValue = $advertising_info->soluot_truynhap->CurrentValue;
			$advertising_info->soluot_truynhap->CssStyle = "";
			$advertising_info->soluot_truynhap->CssClass = "";
			$advertising_info->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising_info->trang_thai->CurrentValue) <> "") {
				switch ($advertising_info->trang_thai->CurrentValue) {
					case "0":
						$advertising_info->trang_thai->ViewValue = Lang_Text("Không xuất bản");
						break;
					case "1":
						$advertising_info->trang_thai->ViewValue = Lang_Text("Xuất bản");
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

			// thoigian_them
			$advertising_info->thoigian_them->HrefValue = "";

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
