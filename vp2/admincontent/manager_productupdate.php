<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_productinfo.php" ?>
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
$manager_product_update = new cmanager_product_update();
$Page =& $manager_product_update;

// Page init processing
$manager_product_update->Page_Init();

// Page main processing
$manager_product_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var manager_product_update = new ew_Page("manager_product_update");

// page properties
manager_product_update.PageID = "update"; // page ID
var EW_PAGE_ID = manager_product_update.PageID; // for backward compatibility

// extend page with ValidateForm function
manager_product_update.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	if (!ew_UpdateSelected(fobj)) {
		alert('Chưa chọn đối tượng');
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
		elm = fobj.elements["x" + infix + "_sanpham_tieubieu"];
		uelm = fobj.elements["u" + infix + "_sanpham_tieubieu"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Chưa chọn - Sanpham Tieubieu");
		}
		

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
manager_product_update.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_product_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_product_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_product_update.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $manager_product->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xuất bản thông tin sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $manager_product_update->ShowMessage() ?>
<form name="fmanager_productupdate" id="fmanager_productupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return manager_product_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="manager_product">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $manager_product_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($manager_product_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td>Chọn tất<input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Đối tượng</td>
		<td>Giá trị</td>
	</tr>
<?php if ($manager_product->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $manager_product->xuatban->RowAttributes ?>>
		<td<?php echo $manager_product->xuatban->CellAttributes() ?>>
<input type="checkbox" name="u_xuatban" id="u_xuatban" value="1"<?php echo ($manager_product->xuatban->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $manager_product->xuatban->CellAttributes() ?>>Xuất bản</td>
		<td<?php echo $manager_product->xuatban->CellAttributes() ?>><span id="el_xuatban">
<select id="x_xuatban" name="x_xuatban"<?php echo $manager_product->xuatban->EditAttributes() ?>>
<?php
if (is_array($manager_product->xuatban->EditValue)) {
	$arwrk = $manager_product->xuatban->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_product->xuatban->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $manager_product->xuatban->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($manager_product->sanpham_tieubieu->Visible) { // sanpham_tieubieu ?>
	<tr<?php echo $manager_product->sanpham_tieubieu->RowAttributes ?>>
		<td<?php echo $manager_product->sanpham_tieubieu->CellAttributes() ?>>
<input type="checkbox" name="u_sanpham_tieubieu" id="u_sanpham_tieubieu" value="1"<?php echo ($manager_product->sanpham_tieubieu->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $manager_product->sanpham_tieubieu->CellAttributes() ?>>Sản phẩm tiêu biểu</td>
		<td<?php echo $manager_product->sanpham_tieubieu->CellAttributes() ?>><span id="el_sanpham_tieubieu">
<select id="x_sanpham_tieubieu" name="x_sanpham_tieubieu"<?php echo $manager_product->sanpham_tieubieu->EditAttributes() ?>>
<?php
if (is_array($manager_product->sanpham_tieubieu->EditValue)) {
	$arwrk = $manager_product->sanpham_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_product->sanpham_tieubieu->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $manager_product->sanpham_tieubieu->CustomMsg ?></td>
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
class cmanager_product_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'manager_product';

	// Page Object Name
	var $PageObjName = 'manager_product_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_product;
		if ($manager_product->UseTokenInUrl) $PageUrl .= "t=" . $manager_product->TableVar . "&"; // add page token
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
		global $objForm, $manager_product;
		if ($manager_product->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_product->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_product->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_product_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_product"] = new cmanager_product();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_product', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_product;
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
			$this->Page_Terminate("manager_productlist.php");
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
		global $objForm, $gsFormError, $manager_product;

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
				$manager_product->CurrentAction = $_POST["a_update"];

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
					$manager_product->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("manager_productlist.php"); // No records selected, return to list
		switch ($manager_product->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Đã xuất bản"); // Set update success message
					$this->Page_Terminate($manager_product->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$manager_product->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $manager_product;
		$manager_product->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$manager_product->xuatban->setDbValue($rs->fields('xuatban'));
				$manager_product->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
				
			} else {
				if (!ew_CompareValue($manager_product->xuatban->DbValue, $rs->fields('xuatban')))
					$manager_product->xuatban->CurrentValue = NULL;
				if (!ew_CompareValue($manager_product->sanpham_tieubieu->DbValue, $rs->fields('sanpham_tieubieu')))
					$manager_product->sanpham_tieubieu->CurrentValue = NULL;
				
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $manager_product;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $manager_product->KeyFilter();
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
		global $manager_product;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$manager_product->sanpham_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $manager_product;
		$conn->BeginTrans();

		// Get old recordset
		$manager_product->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $manager_product->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$manager_product->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $manager_product;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $manager_product;
		$manager_product->xuatban->setFormValue($objForm->GetValue("x_xuatban"));
		$manager_product->xuatban->MultiUpdate = $objForm->GetValue("u_xuatban");
		$manager_product->sanpham_tieubieu->setFormValue($objForm->GetValue("x_sanpham_tieubieu"));
		$manager_product->sanpham_tieubieu->MultiUpdate = $objForm->GetValue("u_sanpham_tieubieu");
		
		$manager_product->sanpham_id->setFormValue($objForm->GetValue("x_sanpham_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $manager_product;
		$manager_product->sanpham_id->CurrentValue = $manager_product->sanpham_id->FormValue;
		$manager_product->xuatban->CurrentValue = $manager_product->xuatban->FormValue;
		$manager_product->sanpham_tieubieu->CurrentValue = $manager_product->sanpham_tieubieu->FormValue;
		
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_product;

		// Call Recordset Selecting event
		$manager_product->Recordset_Selecting($manager_product->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_product->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_product->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_product;

		// Call Row_Rendering event
		$manager_product->Row_Rendering();

		// Common render codes for all row types
		// xuatban

		$manager_product->xuatban->CellCssStyle = "";
		$manager_product->xuatban->CellCssClass = "";

		// sanpham_tieubieu
		$manager_product->sanpham_tieubieu->CellCssStyle = "";
		$manager_product->sanpham_tieubieu->CellCssClass = "";

		
		if ($manager_product->RowType == EW_ROWTYPE_VIEW) { // View row

			// xuatban
			if (strval($manager_product->xuatban->CurrentValue) <> "") {
				switch ($manager_product->xuatban->CurrentValue) {
					case "0":
						$manager_product->xuatban->ViewValue = "Không xuất bản";
						break;
					case "1":
						$manager_product->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$manager_product->xuatban->ViewValue = $manager_product->xuatban->CurrentValue;
				}
			} else {
				$manager_product->xuatban->ViewValue = NULL;
			}
			$manager_product->xuatban->CssStyle = "";
			$manager_product->xuatban->CssClass = "";
			$manager_product->xuatban->ViewCustomAttributes = "";

			// sanpham_tieubieu
			if (strval($manager_product->sanpham_tieubieu->CurrentValue) <> "") {
				switch ($manager_product->sanpham_tieubieu->CurrentValue) {
					case "0":
						$manager_product->sanpham_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$manager_product->sanpham_tieubieu->ViewValue = "Tiêu biểu";
						break;
					default:
						$manager_product->sanpham_tieubieu->ViewValue = $manager_product->sanpham_tieubieu->CurrentValue;
				}
			} else {
				$manager_product->sanpham_tieubieu->ViewValue = NULL;
			}
			$manager_product->sanpham_tieubieu->CssStyle = "";
			$manager_product->sanpham_tieubieu->CssClass = "";
			$manager_product->sanpham_tieubieu->ViewCustomAttributes = "";

			

			// xuatban
			$manager_product->xuatban->HrefValue = "";

			// sanpham_tieubieu
			$manager_product->sanpham_tieubieu->HrefValue = "";

			
		} elseif ($manager_product->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// xuatban
			$manager_product->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_product->xuatban->EditValue = $arwrk;

			// sanpham_tieubieu
			$manager_product->sanpham_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_product->sanpham_tieubieu->EditValue = $arwrk;

			

			// Edit refer script
			// xuatban

			$manager_product->xuatban->HrefValue = "";

			// sanpham_tieubieu
			$manager_product->sanpham_tieubieu->HrefValue = "";

			
		}

		// Call Row Rendered event
		$manager_product->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $manager_product;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($manager_product->xuatban->MultiUpdate == "1") $lUpdateCnt++;
		if ($manager_product->sanpham_tieubieu->MultiUpdate == "1") $lUpdateCnt++;
		
		if ($lUpdateCnt == 0) {
			$gsFormError = "Chưa chọn đối tượng";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($manager_product->xuatban->MultiUpdate <> "" && $manager_product->xuatban->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa chọn - Xuatban";
		}
		if ($manager_product->sanpham_tieubieu->MultiUpdate <> "" && $manager_product->sanpham_tieubieu->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa chọn - Sanpham Tieubieu";
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
		global $conn, $Security, $manager_product;
		$sFilter = $manager_product->KeyFilter();
		$manager_product->CurrentFilter = $sFilter;
		$sSql = $manager_product->SQL();
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
			if ($manager_product->xuatban->MultiUpdate == "1") {
			$manager_product->xuatban->SetDbValueDef($manager_product->xuatban->CurrentValue, 0);
			$rsnew['xuatban'] =& $manager_product->xuatban->DbValue;
			}

			// Field sanpham_tieubieu
			if ($manager_product->sanpham_tieubieu->MultiUpdate == "1") {
			$manager_product->sanpham_tieubieu->SetDbValueDef($manager_product->sanpham_tieubieu->CurrentValue, 0);
			$rsnew['sanpham_tieubieu'] =& $manager_product->sanpham_tieubieu->DbValue;
			}

			

			// Call Row Updating event
			$bUpdateRow = $manager_product->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($manager_product->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($manager_product->CancelMessage <> "") {
					$this->setMessage($manager_product->CancelMessage);
					$manager_product->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$manager_product->Row_Updated($rsold, $rsnew);
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
