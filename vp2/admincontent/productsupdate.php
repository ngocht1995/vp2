<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "productsinfo.php" ?>
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
$products_update = new cproducts_update();
$Page =& $products_update;

// Page init processing
$products_update->Page_Init();

// Page main processing
$products_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var products_update = new ew_Page("products_update");

// page properties
products_update.PageID = "update"; // page ID
var EW_PAGE_ID = products_update.PageID; // for backward compatibility

// extend page with ValidateForm function
products_update.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	if (!ew_UpdateSelected(fobj)) {
		alert('No field selected for update');
		return false;
	}
	var uelm;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_sanpham_tieubieu"];
		uelm = fobj.elements["u" + infix + "_sanpham_tieubieu"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Nhập trường bắt buộc - Sanpham Tieubieu");
		}
		elm = fobj.elements["x" + infix + "_comment_status"];
		uelm = fobj.elements["u" + infix + "_comment_status"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Nhập trường bắt buộc - Comment Status");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
products_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
products_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
products_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
products_update.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $products->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Kích hoạt sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $products_update->ShowMessage() ?>
<form name="fproductsupdate" id="fproductsupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return products_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="products">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $products_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($products_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Trạng thái</td>
		<td>Chọn</td>
	</tr>
<?php if ($products->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $products->trang_thai->RowAttributes ?>>
		<td<?php echo $products->trang_thai->CellAttributes() ?>>
<input type="checkbox" name="u_trang_thai" id="u_trang_thai" value="1"<?php echo ($products->trang_thai->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $products->trang_thai->CellAttributes() ?>>Trạng thái</td>
		<td<?php echo $products->trang_thai->CellAttributes() ?>><span id="el_trang_thai">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $products->trang_thai->EditAttributes() ?>>
<?php
if (is_array($products->trang_thai->EditValue)) {
	$arwrk = $products->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->trang_thai->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $products->trang_thai->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->sanpham_tieubieu->Visible) { // sanpham_tieubieu ?>
	<tr<?php echo $products->sanpham_tieubieu->RowAttributes ?>>
		<td<?php echo $products->sanpham_tieubieu->CellAttributes() ?>>
<input type="checkbox" name="u_sanpham_tieubieu" id="u_sanpham_tieubieu" value="1"<?php echo ($products->sanpham_tieubieu->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $products->sanpham_tieubieu->CellAttributes() ?>>Sản phẩm tiêu biểu</td>
		<td<?php echo $products->sanpham_tieubieu->CellAttributes() ?>><span id="el_sanpham_tieubieu">
<select id="x_sanpham_tieubieu" name="x_sanpham_tieubieu"<?php echo $products->sanpham_tieubieu->EditAttributes() ?>>
<?php
if (is_array($products->sanpham_tieubieu->EditValue)) {
	$arwrk = $products->sanpham_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->sanpham_tieubieu->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $products->sanpham_tieubieu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->comment_status->Visible) { // comment_status ?>
	<tr<?php echo $products->comment_status->RowAttributes ?>>
		<td<?php echo $products->comment_status->CellAttributes() ?>>
<input type="checkbox" name="u_comment_status" id="u_comment_status" value="1"<?php echo ($products->comment_status->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $products->comment_status->CellAttributes() ?>>Trạng thái bình luận</td>
		<td<?php echo $products->comment_status->CellAttributes() ?>><span id="el_comment_status">
<select id="x_comment_status" name="x_comment_status"<?php echo $products->comment_status->EditAttributes() ?>>
<?php
if (is_array($products->comment_status->EditValue)) {
	$arwrk = $products->comment_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->comment_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $products->comment_status->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  Kích hoạt  ">
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
class cproducts_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'products';

	// Page Object Name
	var $PageObjName = 'products_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $products;
		if ($products->UseTokenInUrl) $PageUrl .= "t=" . $products->TableVar . "&"; // add page token
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
		global $objForm, $products;
		if ($products->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($products->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($products->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cproducts_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["products"] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'products', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $products;
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
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("productslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("productslist.php");
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
	var $nKeySelected;
	var $arRecKeys;
	var $sDisabled;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $products;

		// Try to load keys from list form
		$this->nKeySelected = 0;
		if (ew_IsHttpPost()) {
			if (isset($_POST["key_m"])) { // Key count > 0
				$this->nKeySelected = count($_POST["key_m"]); // Get number of keys
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
				$this->LoadMultiUpdateValues(); // Load initial values to form
			}
		}

		// Try to load key from update form
		if ($this->nKeySelected == 0) {
			$this->arRecKeys = array();

			// Create form object
			$objForm = new cFormObj();
			if (@$_POST["a_update"] <> "") {

				// Get action
				$products->CurrentAction = $_POST["a_update"];

				// Get record keys
				$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				while ($sKey <> "") {
					$this->arRecKeys[$this->nKeySelected] = ew_StripSlashes($sKey);
					$this->nKeySelected++;
					$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				}
				$this->LoadFormValues(); // Get form values

				// Validate Form
				if (!$this->ValidateForm()) {
					$products->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("productslist.php"); // No records selected, return to list
		switch ($products->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Đã thay đổi trạng thái sản phẩm"); // Set update success message
					$this->Page_Terminate($products->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$products->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $products;
		$products->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$products->trang_thai->setDbValue($rs->fields('trang_thai'));
				$products->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
				$products->comment_status->setDbValue($rs->fields('comment_status'));
			} else {
				if (!ew_CompareValue($products->trang_thai->DbValue, $rs->fields('trang_thai')))
					$products->trang_thai->CurrentValue = NULL;
				if (!ew_CompareValue($products->sanpham_tieubieu->DbValue, $rs->fields('sanpham_tieubieu')))
					$products->sanpham_tieubieu->CurrentValue = NULL;
				if (!ew_CompareValue($products->comment_status->DbValue, $rs->fields('comment_status')))
					$products->comment_status->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $products;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $products->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}
		}
		return $sWrkFilter;
	}

	// Set up key value
	function SetupKeyValues($key) {
		global $products;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$products->sanpham_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $products;
		$conn->BeginTrans();

		// Get old recordset
		$products->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $products->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$products->SendEmail = FALSE; // Do not send email on update success
				$UpdateRows = $this->EditRow(); // Update this row
			} else {
				$UpdateRows = FALSE;
			}
			if (!$UpdateRows)
				return; // Update failed
			if ($sKey <> "") $sKey .= ", ";
			$sKey .= $sThisKey;
		}

		// Check if all rows updated
		if ($UpdateRows) {
			$conn->CommitTrans(); // Commit transaction

			// Get new recordset
			$rsnew = $conn->Execute($sSql);
		} else {
			$conn->RollbackTrans(); // Rollback transaction
		}
		return $UpdateRows;
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $products;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $products;
		$products->trang_thai->setFormValue($objForm->GetValue("x_trang_thai"));
		$products->trang_thai->MultiUpdate = $objForm->GetValue("u_trang_thai");
		$products->sanpham_tieubieu->setFormValue($objForm->GetValue("x_sanpham_tieubieu"));
		$products->sanpham_tieubieu->MultiUpdate = $objForm->GetValue("u_sanpham_tieubieu");
		$products->comment_status->setFormValue($objForm->GetValue("x_comment_status"));
		$products->comment_status->MultiUpdate = $objForm->GetValue("u_comment_status");
		$products->sanpham_id->setFormValue($objForm->GetValue("x_sanpham_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $products;
		$products->sanpham_id->CurrentValue = $products->sanpham_id->FormValue;
		$products->trang_thai->CurrentValue = $products->trang_thai->FormValue;
		$products->sanpham_tieubieu->CurrentValue = $products->sanpham_tieubieu->FormValue;
		$products->comment_status->CurrentValue = $products->comment_status->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $products;

		// Call Recordset Selecting event
		$products->Recordset_Selecting($products->CurrentFilter);

		// Load list page SQL
		$sSql = $products->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$products->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $products;

		// Call Row_Rendering event
		$products->Row_Rendering();

		// Common render codes for all row types
		// trang_thai

		$products->trang_thai->CellCssStyle = "";
		$products->trang_thai->CellCssClass = "";

		// sanpham_tieubieu
		$products->sanpham_tieubieu->CellCssStyle = "";
		$products->sanpham_tieubieu->CellCssClass = "";

		// comment_status
		$products->comment_status->CellCssStyle = "";
		$products->comment_status->CellCssClass = "";
		if ($products->RowType == EW_ROWTYPE_VIEW) { // View row

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// trang_thai
			if (strval($products->trang_thai->CurrentValue) <> "") {
				switch ($products->trang_thai->CurrentValue) {
					case "1":
						$products->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$products->trang_thai->ViewValue = "Ðã kích hoạt";
						break;
					default:
						$products->trang_thai->ViewValue = $products->trang_thai->CurrentValue;
				}
			} else {
				$products->trang_thai->ViewValue = NULL;
			}
			$products->trang_thai->CssStyle = "";
			$products->trang_thai->CssClass = "";
			$products->trang_thai->ViewCustomAttributes = "";

			// sanpham_tieubieu
			if (strval($products->sanpham_tieubieu->CurrentValue) <> "") {
				switch ($products->sanpham_tieubieu->CurrentValue) {
					case "0":
						$products->sanpham_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$products->sanpham_tieubieu->ViewValue = "Tiêu biểu";
						break;
					default:
						$products->sanpham_tieubieu->ViewValue = $products->sanpham_tieubieu->CurrentValue;
				}
			} else {
				$products->sanpham_tieubieu->ViewValue = NULL;
			}
			$products->sanpham_tieubieu->CssStyle = "";
			$products->sanpham_tieubieu->CssClass = "";
			$products->sanpham_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			if (strval($products->xuat_su->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($products->xuat_su->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->xuat_su->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$products->xuat_su->ViewValue = $products->xuat_su->CurrentValue;
				}
			} else {
				$products->xuat_su->ViewValue = NULL;
			}
			$products->xuat_su->CssStyle = "";
			$products->xuat_su->CssClass = "";
			$products->xuat_su->ViewCustomAttributes = "";

			// comment_status
			if (strval($products->comment_status->CurrentValue) <> "") {
				switch ($products->comment_status->CurrentValue) {
					case "0":
						$products->comment_status->ViewValue = "Không bình luận";
						break;
					case "1":
						$products->comment_status->ViewValue = "Cho bình luận";
						break;
					default:
						$products->comment_status->ViewValue = $products->comment_status->CurrentValue;
				}
			} else {
				$products->comment_status->ViewValue = NULL;
			}
			$products->comment_status->CssStyle = "";
			$products->comment_status->CssClass = "";
			$products->comment_status->ViewCustomAttributes = "";

			// don_gia
			$products->don_gia->ViewValue = $products->don_gia->CurrentValue;
			$products->don_gia->CssStyle = "";
			$products->don_gia->CssClass = "";
			$products->don_gia->ViewCustomAttributes = "";

			// thanhtoan_status
			if (strval($products->thanhtoan_status->CurrentValue) <> "") {
				switch ($products->thanhtoan_status->CurrentValue) {
					case "0":
						$products->thanhtoan_status->ViewValue = "Khong thanh toan truc tuyen";
						break;
					case "1":
						$products->thanhtoan_status->ViewValue = "Thanh toan truc tuyen";
						break;
					default:
						$products->thanhtoan_status->ViewValue = $products->thanhtoan_status->CurrentValue;
				}
			} else {
				$products->thanhtoan_status->ViewValue = NULL;
			}
			$products->thanhtoan_status->CssStyle = "";
			$products->thanhtoan_status->CssClass = "";
			$products->thanhtoan_status->ViewCustomAttributes = "";

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// khuyenmai_status
			if (strval($products->khuyenmai_status->CurrentValue) <> "") {
				switch ($products->khuyenmai_status->CurrentValue) {
					case "0":
						$products->khuyenmai_status->ViewValue = "Khong khuyen mai";
						break;
					case "1":
						$products->khuyenmai_status->ViewValue = "Co khuyen mai";
						break;
					default:
						$products->khuyenmai_status->ViewValue = $products->khuyenmai_status->CurrentValue;
				}
			} else {
				$products->khuyenmai_status->ViewValue = NULL;
			}
			$products->khuyenmai_status->CssStyle = "";
			$products->khuyenmai_status->CssClass = "";
			$products->khuyenmai_status->ViewCustomAttributes = "";

			// km_date_begin
			$products->km_date_begin->ViewValue = $products->km_date_begin->CurrentValue;
			$products->km_date_begin->ViewValue = ew_FormatDateTime($products->km_date_begin->ViewValue, 7);
			$products->km_date_begin->CssStyle = "";
			$products->km_date_begin->CssClass = "";
			$products->km_date_begin->ViewCustomAttributes = "";

			// km_date_end
			$products->km_date_end->ViewValue = $products->km_date_end->CurrentValue;
			$products->km_date_end->ViewValue = ew_FormatDateTime($products->km_date_end->ViewValue, 7);
			$products->km_date_end->CssStyle = "";
			$products->km_date_end->CssClass = "";
			$products->km_date_end->ViewCustomAttributes = "";

			// anh_to
			if (!is_null($products->anh_to->Upload->DbValue)) {
				$products->anh_to->ViewValue = $products->anh_to->Upload->DbValue;
				$products->anh_to->ImageWidth = 300;
				$products->anh_to->ImageHeight = 0;
				$products->anh_to->ImageAlt = "";
			} else {
				$products->anh_to->ViewValue = "";
			}
			$products->anh_to->CssStyle = "";
			$products->anh_to->CssClass = "";
			$products->anh_to->ViewCustomAttributes = "";

			// anh_nho
			if (!is_null($products->anh_nho->Upload->DbValue)) {
				$products->anh_nho->ViewValue = $products->anh_nho->Upload->DbValue;
				$products->anh_nho->ImageWidth = 100;
				$products->anh_nho->ImageHeight = 0;
				$products->anh_nho->ImageAlt = "";
			} else {
				$products->anh_nho->ViewValue = "";
			}
			$products->anh_nho->CssStyle = "";
			$products->anh_nho->CssClass = "";
			$products->anh_nho->ViewCustomAttributes = "";

			// trang_thai
			$products->trang_thai->HrefValue = "";

			// sanpham_tieubieu
			$products->sanpham_tieubieu->HrefValue = "";

			// comment_status
			$products->comment_status->HrefValue = "";
		} elseif ($products->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// trang_thai
			$products->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Không kích hoạt");
			$arwrk[] = array("2", "Kích hoạt");
			$products->trang_thai->EditValue = $arwrk;

			// sanpham_tieubieu
			$products->sanpham_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$products->sanpham_tieubieu->EditValue = $arwrk;

			// comment_status
			$products->comment_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không bình luận");
			$arwrk[] = array("1", "Cho bình luận");
			array_unshift($arwrk, array("", "Chọn"));
			$products->comment_status->EditValue = $arwrk;

			// Edit refer script
			// trang_thai

			$products->trang_thai->HrefValue = "";

			// sanpham_tieubieu
			$products->sanpham_tieubieu->HrefValue = "";

			// comment_status
			$products->comment_status->HrefValue = "";
		}

		// Call Row Rendered event
		$products->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $products;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($products->trang_thai->MultiUpdate == "1") $lUpdateCnt++;
		if ($products->sanpham_tieubieu->MultiUpdate == "1") $lUpdateCnt++;
		if ($products->comment_status->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "No field selected for update";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($products->sanpham_tieubieu->MultiUpdate <> "" && $products->sanpham_tieubieu->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Sanpham Tieubieu";
		}
		if ($products->comment_status->MultiUpdate <> "" && $products->comment_status->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Comment Status";
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $products;
		$sFilter = $products->KeyFilter();
		$products->CurrentFilter = $sFilter;
		$sSql = $products->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// Field trang_thai
			if ($products->trang_thai->MultiUpdate == "1") {
			$products->trang_thai->SetDbValueDef($products->trang_thai->CurrentValue, NULL);
			$rsnew['trang_thai'] =& $products->trang_thai->DbValue;
			}

			// Field sanpham_tieubieu
			if ($products->sanpham_tieubieu->MultiUpdate == "1") {
			$products->sanpham_tieubieu->SetDbValueDef($products->sanpham_tieubieu->CurrentValue, NULL);
			$rsnew['sanpham_tieubieu'] =& $products->sanpham_tieubieu->DbValue;
			}

			// Field comment_status
			if ($products->comment_status->MultiUpdate == "1") {
			$products->comment_status->SetDbValueDef($products->comment_status->CurrentValue, NULL);
			$rsnew['comment_status'] =& $products->comment_status->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $products->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($products->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($products->CancelMessage <> "") {
					$this->setMessage($products->CancelMessage);
					$products->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$products->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
