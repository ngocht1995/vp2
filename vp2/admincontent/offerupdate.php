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
$offer_update = new coffer_update();
$Page =& $offer_update;

// Page init processing
$offer_update->Page_Init();

// Page main processing
$offer_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var offer_update = new ew_Page("offer_update");

// page properties
offer_update.PageID = "update"; // page ID
var EW_PAGE_ID = offer_update.PageID; // for backward compatibility

// extend page with ValidateForm function
offer_update.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_chaohang_tieubieu"];
		uelm = fobj.elements["u" + infix + "_chaohang_tieubieu"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Nhập trường bắt buộc - Chaohang Tieubieu");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
offer_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
offer_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
offer_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
offer_update.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $offer->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a>
<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Kích hoạt thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $offer_update->ShowMessage() ?>
<form name="fofferupdate" id="fofferupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return offer_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="offer">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $offer_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($offer_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Lựa chọn</td>
		<td>Giá trị</td>
	</tr>
<?php if ($offer->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $offer->trang_thai->RowAttributes ?>>
		<td<?php echo $offer->trang_thai->CellAttributes() ?>>
<input type="checkbox" name="u_trang_thai" id="u_trang_thai" value="1"<?php echo ($offer->trang_thai->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $offer->trang_thai->CellAttributes() ?>>Trạng thái</td>
		<td<?php echo $offer->trang_thai->CellAttributes() ?>><span id="el_trang_thai">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $offer->trang_thai->EditAttributes() ?>>
<?php
if (is_array($offer->trang_thai->EditValue)) {
	$arwrk = $offer->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->trang_thai->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $offer->trang_thai->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
	<tr<?php echo $offer->chaohang_tieubieu->RowAttributes ?>>
		<td<?php echo $offer->chaohang_tieubieu->CellAttributes() ?>>
<input type="checkbox" name="u_chaohang_tieubieu" id="u_chaohang_tieubieu" value="1"<?php echo ($offer->chaohang_tieubieu->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $offer->chaohang_tieubieu->CellAttributes() ?>>Chào hàng tiêu biểu</td>
		<td<?php echo $offer->chaohang_tieubieu->CellAttributes() ?>><span id="el_chaohang_tieubieu">
<select id="x_chaohang_tieubieu" name="x_chaohang_tieubieu"<?php echo $offer->chaohang_tieubieu->EditAttributes() ?>>
<?php
if (is_array($offer->chaohang_tieubieu->EditValue)) {
	$arwrk = $offer->chaohang_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->chaohang_tieubieu->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $offer->chaohang_tieubieu->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  Cập nhật  ">
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
class coffer_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'offer';

	// Page Object Name
	var $PageObjName = 'offer_update';

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
	function coffer_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["offer"] = new coffer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

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
		if (!$Security->CanEdit()) {
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
	var $nKeySelected;
	var $arRecKeys;
	var $sDisabled;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $offer;

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
				$offer->CurrentAction = $_POST["a_update"];

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
					$offer->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("offerlist.php"); // No records selected, return to list
		switch ($offer->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage(""); // Set update success message
					$this->Page_Terminate($offer->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$offer->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $offer;
		$offer->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$offer->trang_thai->setDbValue($rs->fields('trang_thai'));
				$offer->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
			} else {
				if (!ew_CompareValue($offer->trang_thai->DbValue, $rs->fields('trang_thai')))
					$offer->trang_thai->CurrentValue = NULL;
				if (!ew_CompareValue($offer->chaohang_tieubieu->DbValue, $rs->fields('chaohang_tieubieu')))
					$offer->chaohang_tieubieu->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $offer;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $offer->KeyFilter();
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
		global $offer;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$offer->chaohang_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $offer;
		$conn->BeginTrans();

		// Get old recordset
		$offer->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $offer->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$offer->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $offer;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $offer;
		$offer->trang_thai->setFormValue($objForm->GetValue("x_trang_thai"));
		$offer->trang_thai->MultiUpdate = $objForm->GetValue("u_trang_thai");
		$offer->chaohang_tieubieu->setFormValue($objForm->GetValue("x_chaohang_tieubieu"));
		$offer->chaohang_tieubieu->MultiUpdate = $objForm->GetValue("u_chaohang_tieubieu");
		$offer->chaohang_id->setFormValue($objForm->GetValue("x_chaohang_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $offer;
		$offer->chaohang_id->CurrentValue = $offer->chaohang_id->FormValue;
		$offer->trang_thai->CurrentValue = $offer->trang_thai->FormValue;
		$offer->chaohang_tieubieu->CurrentValue = $offer->chaohang_tieubieu->FormValue;
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

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $offer;

		// Call Row_Rendering event
		$offer->Row_Rendering();

		// Common render codes for all row types
		// trang_thai

		$offer->trang_thai->CellCssStyle = "";
		$offer->trang_thai->CellCssClass = "";

		// chaohang_tieubieu
		$offer->chaohang_tieubieu->CellCssStyle = "";
		$offer->chaohang_tieubieu->CellCssClass = "";
		if ($offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// trang_thai
			if (strval($offer->trang_thai->CurrentValue) <> "") {
				switch ($offer->trang_thai->CurrentValue) {
					case "1":
						$offer->trang_thai->ViewValue = "Chưa kích hoạt";
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

			// chaohang_tieubieu
			if (strval($offer->chaohang_tieubieu->CurrentValue) <> "") {
				switch ($offer->chaohang_tieubieu->CurrentValue) {
					case "0":
						$offer->chaohang_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$offer->chaohang_tieubieu->ViewValue = "Tiêu biểu";
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

			// trang_thai
			$offer->trang_thai->HrefValue = "";

			// chaohang_tieubieu
			$offer->chaohang_tieubieu->HrefValue = "";
		} elseif ($offer->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// trang_thai
			$offer->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Không kích hoạt");
			$arwrk[] = array("2", "Kích hoạt");
			$offer->trang_thai->EditValue = $arwrk;

			// chaohang_tieubieu
			$offer->chaohang_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			$offer->chaohang_tieubieu->EditValue = $arwrk;

			// Edit refer script
			// trang_thai

			$offer->trang_thai->HrefValue = "";

			// chaohang_tieubieu
			$offer->chaohang_tieubieu->HrefValue = "";
		}

		// Call Row Rendered event
		$offer->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $offer;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($offer->trang_thai->MultiUpdate == "1") $lUpdateCnt++;
		if ($offer->chaohang_tieubieu->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "Không có bản ghi được chọn";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($offer->chaohang_tieubieu->MultiUpdate <> "" && $offer->chaohang_tieubieu->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Chaohang Tieubieu";
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
		global $conn, $Security, $offer;
		$sFilter = $offer->KeyFilter();
		$offer->CurrentFilter = $sFilter;
		$sSql = $offer->SQL();
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
			if ($offer->trang_thai->MultiUpdate == "1") {
			$offer->trang_thai->SetDbValueDef($offer->trang_thai->CurrentValue, 0);
			$rsnew['trang_thai'] =& $offer->trang_thai->DbValue;
			}

			// Field chaohang_tieubieu
			if ($offer->chaohang_tieubieu->MultiUpdate == "1") {
			$offer->chaohang_tieubieu->SetDbValueDef($offer->chaohang_tieubieu->CurrentValue, 0);
			$rsnew['chaohang_tieubieu'] =& $offer->chaohang_tieubieu->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $offer->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($offer->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($offer->CancelMessage <> "") {
					$this->setMessage($offer->CancelMessage);
					$offer->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$offer->Row_Updated($rsold, $rsnew);
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
