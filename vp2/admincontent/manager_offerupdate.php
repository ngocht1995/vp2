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
$manager_offer_update = new cmanager_offer_update();
$Page =& $manager_offer_update;

// Page init processing
$manager_offer_update->Page_Init();

// Page main processing
$manager_offer_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var manager_offer_update = new ew_Page("manager_offer_update");

// page properties
manager_offer_update.PageID = "update"; // page ID
var EW_PAGE_ID = manager_offer_update.PageID; // for backward compatibility

// extend page with ValidateForm function
manager_offer_update.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	if (!ew_UpdateSelected(fobj)) {
		alert('Không có bản ghi được chọn');
		return false;
	}
	var uelm;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_xuatban"];
		uelm = fobj.elements["u" + infix + "_xuatban"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Chưa chọn - Xuatban");
		}
		elm = fobj.elements["x" + infix + "_chaohang_tieubieu"];
		uelm = fobj.elements["u" + infix + "_chaohang_tieubieu"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Chưa chọn - Chaohang Tieubieu");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
manager_offer_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_offer_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_offer_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_offer_update.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $manager_offer->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xuất bản thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $manager_offer_update->ShowMessage() ?>
<form name="fmanager_offerupdate" id="fmanager_offerupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return manager_offer_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="manager_offer">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $manager_offer_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($manager_offer_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td>Chọn tất<input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Dối tượng</td>
		<td>Giá trị</td>
	</tr>
<?php if ($manager_offer->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $manager_offer->xuatban->RowAttributes ?>>
		<td<?php echo $manager_offer->xuatban->CellAttributes() ?>>
<input type="checkbox" name="u_xuatban" id="u_xuatban" value="1"<?php echo ($manager_offer->xuatban->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $manager_offer->xuatban->CellAttributes() ?>>Xuất bản</td>
		<td<?php echo $manager_offer->xuatban->CellAttributes() ?>><span id="el_xuatban">
<select id="x_xuatban" name="x_xuatban"<?php echo $manager_offer->xuatban->EditAttributes() ?>>
<?php
if (is_array($manager_offer->xuatban->EditValue)) {
	$arwrk = $manager_offer->xuatban->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_offer->xuatban->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $manager_offer->xuatban->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($manager_offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
	<tr<?php echo $manager_offer->chaohang_tieubieu->RowAttributes ?>>
		<td<?php echo $manager_offer->chaohang_tieubieu->CellAttributes() ?>>
<input type="checkbox" name="u_chaohang_tieubieu" id="u_chaohang_tieubieu" value="1"<?php echo ($manager_offer->chaohang_tieubieu->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $manager_offer->chaohang_tieubieu->CellAttributes() ?>>Chào hàng tiêu biểu</td>
		<td<?php echo $manager_offer->chaohang_tieubieu->CellAttributes() ?>><span id="el_chaohang_tieubieu">
<select id="x_chaohang_tieubieu" name="x_chaohang_tieubieu"<?php echo $manager_offer->chaohang_tieubieu->EditAttributes() ?>>
<?php
if (is_array($manager_offer->chaohang_tieubieu->EditValue)) {
	$arwrk = $manager_offer->chaohang_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_offer->chaohang_tieubieu->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $manager_offer->chaohang_tieubieu->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  Xuất bản  ">
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
class cmanager_offer_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'manager_offer';

	// Page Object Name
	var $PageObjName = 'manager_offer_update';

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
	function cmanager_offer_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_offer"] = new cmanager_offer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

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
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("manager_offerlist.php");
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
	var $nKeySelected;
	var $arRecKeys;
	var $sDisabled;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $manager_offer;

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
				$manager_offer->CurrentAction = $_POST["a_update"];

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
					$manager_offer->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("manager_offerlist.php"); // No records selected, return to list
		switch ($manager_offer->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Đã xuất bản"); // Set update success message
					$this->Page_Terminate($manager_offer->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$manager_offer->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $manager_offer;
		$manager_offer->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$manager_offer->xuatban->setDbValue($rs->fields('xuatban'));
				$manager_offer->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
			} else {
				if (!ew_CompareValue($manager_offer->xuatban->DbValue, $rs->fields('xuatban')))
					$manager_offer->xuatban->CurrentValue = NULL;
				if (!ew_CompareValue($manager_offer->chaohang_tieubieu->DbValue, $rs->fields('chaohang_tieubieu')))
					$manager_offer->chaohang_tieubieu->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $manager_offer;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $manager_offer->KeyFilter();
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
		global $manager_offer;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$manager_offer->chaohang_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $manager_offer;
		$conn->BeginTrans();

		// Get old recordset
		$manager_offer->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $manager_offer->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$manager_offer->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $manager_offer;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $manager_offer;
		$manager_offer->xuatban->setFormValue($objForm->GetValue("x_xuatban"));
		$manager_offer->xuatban->MultiUpdate = $objForm->GetValue("u_xuatban");
		$manager_offer->chaohang_tieubieu->setFormValue($objForm->GetValue("x_chaohang_tieubieu"));
		$manager_offer->chaohang_tieubieu->MultiUpdate = $objForm->GetValue("u_chaohang_tieubieu");
		$manager_offer->chaohang_id->setFormValue($objForm->GetValue("x_chaohang_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $manager_offer;
		$manager_offer->chaohang_id->CurrentValue = $manager_offer->chaohang_id->FormValue;
		$manager_offer->xuatban->CurrentValue = $manager_offer->xuatban->FormValue;
		$manager_offer->chaohang_tieubieu->CurrentValue = $manager_offer->chaohang_tieubieu->FormValue;
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

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_offer;

		// Call Row_Rendering event
		$manager_offer->Row_Rendering();

		// Common render codes for all row types
		// xuatban

		$manager_offer->xuatban->CellCssStyle = "";
		$manager_offer->xuatban->CellCssClass = "";

		// chaohang_tieubieu
		$manager_offer->chaohang_tieubieu->CellCssStyle = "";
		$manager_offer->chaohang_tieubieu->CellCssClass = "";
		if ($manager_offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// chaohang_id
			$manager_offer->chaohang_id->ViewValue = $manager_offer->chaohang_id->CurrentValue;
			$manager_offer->chaohang_id->CssStyle = "";
			$manager_offer->chaohang_id->CssClass = "";
			$manager_offer->chaohang_id->ViewCustomAttributes = "";

			// nguoidung_id
			if (strval($manager_offer->nguoidung_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_congty` FROM `user` WHERE `nguoidung_id` = " . ew_AdjustSql($manager_offer->nguoidung_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_offer->nguoidung_id->ViewValue = $rswrk->fields('ten_congty');
					$rswrk->Close();
				} else {
					$manager_offer->nguoidung_id->ViewValue = $manager_offer->nguoidung_id->CurrentValue;
				}
			} else {
				$manager_offer->nguoidung_id->ViewValue = NULL;
			}
			$manager_offer->nguoidung_id->CssStyle = "";
			$manager_offer->nguoidung_id->CssClass = "";
			$manager_offer->nguoidung_id->ViewCustomAttributes = "";

			// anh_chaohang
			if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) {
				$manager_offer->anh_chaohang->ViewValue = $manager_offer->anh_chaohang->Upload->DbValue;
				$manager_offer->anh_chaohang->ImageWidth = 200;
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
						$manager_offer->kieu_chaohang->ViewValue = "Chao ban";
						break;
					case "2":
						$manager_offer->kieu_chaohang->ViewValue = "Chao mua";
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

			// tieude_chaohang
			$manager_offer->tieude_chaohang->ViewValue = $manager_offer->tieude_chaohang->CurrentValue;
			$manager_offer->tieude_chaohang->CssStyle = "";
			$manager_offer->tieude_chaohang->CssClass = "";
			$manager_offer->tieude_chaohang->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($manager_offer->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($manager_offer->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_offer->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$manager_offer->nganhnghe_id->ViewValue = $manager_offer->nganhnghe_id->CurrentValue;
				}
			} else {
				$manager_offer->nganhnghe_id->ViewValue = NULL;
			}
			$manager_offer->nganhnghe_id->CssStyle = "";
			$manager_offer->nganhnghe_id->CssClass = "";
			$manager_offer->nganhnghe_id->ViewCustomAttributes = "";

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

			// tg_themchaohang
			$manager_offer->tg_themchaohang->ViewValue = $manager_offer->tg_themchaohang->CurrentValue;
			$manager_offer->tg_themchaohang->ViewValue = ew_FormatDateTime($manager_offer->tg_themchaohang->ViewValue, 7);
			$manager_offer->tg_themchaohang->CssStyle = "";
			$manager_offer->tg_themchaohang->CssClass = "";
			$manager_offer->tg_themchaohang->ViewCustomAttributes = "";

			// tg_suachaohang
			$manager_offer->tg_suachaohang->ViewValue = $manager_offer->tg_suachaohang->CurrentValue;
			$manager_offer->tg_suachaohang->ViewValue = ew_FormatDateTime($manager_offer->tg_suachaohang->ViewValue, 7);
			$manager_offer->tg_suachaohang->CssStyle = "";
			$manager_offer->tg_suachaohang->CssClass = "";
			$manager_offer->tg_suachaohang->ViewCustomAttributes = "";

			// so_lanxem
			$manager_offer->so_lanxem->ViewValue = $manager_offer->so_lanxem->CurrentValue;
			$manager_offer->so_lanxem->CssStyle = "";
			$manager_offer->so_lanxem->CssClass = "";
			$manager_offer->so_lanxem->ViewCustomAttributes = "";

			// xuatban
			if (strval($manager_offer->xuatban->CurrentValue) <> "") {
				switch ($manager_offer->xuatban->CurrentValue) {
					case "0":
						$manager_offer->xuatban->ViewValue = "Đang chờ";
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
						$manager_offer->chaohang_tieubieu->ViewValue = "Tiêu biểu";
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

			// xuatban
			$manager_offer->xuatban->HrefValue = "";

			// chaohang_tieubieu
			$manager_offer->chaohang_tieubieu->HrefValue = "";
		} elseif ($manager_offer->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// xuatban
			$manager_offer->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_offer->xuatban->EditValue = $arwrk;

			// chaohang_tieubieu
			$manager_offer->chaohang_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_offer->chaohang_tieubieu->EditValue = $arwrk;

			// Edit refer script
			// xuatban

			$manager_offer->xuatban->HrefValue = "";

			// chaohang_tieubieu
			$manager_offer->chaohang_tieubieu->HrefValue = "";
		}

		// Call Row Rendered event
		$manager_offer->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $manager_offer;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($manager_offer->xuatban->MultiUpdate == "1") $lUpdateCnt++;
		if ($manager_offer->chaohang_tieubieu->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "Không có bản ghi được chọn";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($manager_offer->xuatban->MultiUpdate <> "" && $manager_offer->xuatban->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa chọn - Xuatban";
		}
		if ($manager_offer->chaohang_tieubieu->MultiUpdate <> "" && $manager_offer->chaohang_tieubieu->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa chọn - Chaohang Tieubieu";
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
		global $conn, $Security, $manager_offer;
		$sFilter = $manager_offer->KeyFilter();
		$manager_offer->CurrentFilter = $sFilter;
		$sSql = $manager_offer->SQL();
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

			// Field xuatban
			if ($manager_offer->xuatban->MultiUpdate == "1") {
			$manager_offer->xuatban->SetDbValueDef($manager_offer->xuatban->CurrentValue, NULL);
			$rsnew['xuatban'] =& $manager_offer->xuatban->DbValue;
			}

			// Field chaohang_tieubieu
			if ($manager_offer->chaohang_tieubieu->MultiUpdate == "1") {
			$manager_offer->chaohang_tieubieu->SetDbValueDef($manager_offer->chaohang_tieubieu->CurrentValue, 0);
			$rsnew['chaohang_tieubieu'] =& $manager_offer->chaohang_tieubieu->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $manager_offer->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($manager_offer->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($manager_offer->CancelMessage <> "") {
					$this->setMessage($manager_offer->CancelMessage);
					$manager_offer->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$manager_offer->Row_Updated($rsold, $rsnew);
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
