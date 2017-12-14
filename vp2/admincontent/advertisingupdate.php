<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_update = new cadvertising_update();
$Page =& $advertising_update;

// Page init processing
$advertising_update->Page_Init();

// Page main processing
$advertising_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_update = new ew_Page("advertising_update");

// page properties
advertising_update.PageID = "update"; // page ID
var EW_PAGE_ID = advertising_update.PageID; // for backward compatibility

// extend page with ValidateForm function
advertising_update.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	if (!ew_UpdateSelected(fobj)) {
		alert('Chưa chọn đối tượng cần xuất bản');
		return false;
	}
	var uelm;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_luachon_hienthi"];
		uelm = fobj.elements["u" + infix + "_luachon_hienthi"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Chưa chọn - Luachon Hienthi");
		}
		elm = fobj.elements["x" + infix + "_vitri_quangcao"];
		uelm = fobj.elements["u" + infix + "_vitri_quangcao"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Chưa chọn - Vitri Quangcao");
		}
		elm = fobj.elements["x" + infix + "_trang_thai"];
		uelm = fobj.elements["u" + infix + "_trang_thai"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Chưa chọn - Trang Thai");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
advertising_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_update.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $advertising->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xuất bản Banner quảng cáo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $advertising_update->ShowMessage() ?>
<form name="fadvertisingupdate" id="fadvertisingupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return advertising_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="advertising">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $advertising_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($advertising_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td>Chọn tất cả<input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Đối tượng</td>
		<td>Giá trị</td>
	</tr>


<?php if ($advertising->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $advertising->trang_thai->RowAttributes ?>>
		<td<?php echo $advertising->trang_thai->CellAttributes() ?>>
<input type="checkbox" name="u_trang_thai" id="u_trang_thai" value="1"<?php echo ($advertising->trang_thai->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $advertising->trang_thai->CellAttributes() ?>>Xuất bản</td>
		<td<?php echo $advertising->trang_thai->CellAttributes() ?>><span id="el_trang_thai">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $advertising->trang_thai->EditAttributes() ?>>
<?php
if (is_array($advertising->trang_thai->EditValue)) {
	$arwrk = $advertising->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->trang_thai->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $advertising->trang_thai->CustomMsg ?></td>
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
class cadvertising_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'advertising';

	// Page Object Name
	var $PageObjName = 'advertising_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising"] = new cadvertising();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising;
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
			$this->Page_Terminate("advertisinglist.php");
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
		global $objForm, $gsFormError, $advertising;

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
				$advertising->CurrentAction = $_POST["a_update"];

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
					$advertising->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("advertisinglist.php"); // No records selected, return to list
		switch ($advertising->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Đã xuất bản"); // Set update success message
					$this->Page_Terminate($advertising->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$advertising->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $advertising;
		$advertising->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$advertising->luachon_hienthi->setDbValue($rs->fields('luachon_hienthi'));
				$advertising->vitri_quangcao->setDbValue($rs->fields('vitri_quangcao'));
				$advertising->trang_thai->setDbValue($rs->fields('trang_thai'));
			} else {
				if (!ew_CompareValue($advertising->luachon_hienthi->DbValue, $rs->fields('luachon_hienthi')))
					$advertising->luachon_hienthi->CurrentValue = NULL;
				if (!ew_CompareValue($advertising->vitri_quangcao->DbValue, $rs->fields('vitri_quangcao')))
					$advertising->vitri_quangcao->CurrentValue = NULL;
				if (!ew_CompareValue($advertising->trang_thai->DbValue, $rs->fields('trang_thai')))
					$advertising->trang_thai->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $advertising;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $advertising->KeyFilter();
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
		global $advertising;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$advertising->lienket_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $advertising;
		$conn->BeginTrans();

		// Get old recordset
		$advertising->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $advertising->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$advertising->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $advertising;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $advertising;
		$advertising->luachon_hienthi->setFormValue($objForm->GetValue("x_luachon_hienthi"));
		$advertising->luachon_hienthi->MultiUpdate = $objForm->GetValue("u_luachon_hienthi");
		$advertising->vitri_quangcao->setFormValue($objForm->GetValue("x_vitri_quangcao"));
		$advertising->vitri_quangcao->MultiUpdate = $objForm->GetValue("u_vitri_quangcao");
		$advertising->trang_thai->setFormValue($objForm->GetValue("x_trang_thai"));
		$advertising->trang_thai->MultiUpdate = $objForm->GetValue("u_trang_thai");
		$advertising->lienket_id->setFormValue($objForm->GetValue("x_lienket_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $advertising;
		$advertising->lienket_id->CurrentValue = $advertising->lienket_id->FormValue;
		$advertising->luachon_hienthi->CurrentValue = $advertising->luachon_hienthi->FormValue;
		$advertising->vitri_quangcao->CurrentValue = $advertising->vitri_quangcao->FormValue;
		$advertising->trang_thai->CurrentValue = $advertising->trang_thai->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising;

		// Call Recordset Selecting event
		$advertising->Recordset_Selecting($advertising->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising;

		// Call Row_Rendering event
		$advertising->Row_Rendering();

		// Common render codes for all row types
		// luachon_hienthi

		$advertising->luachon_hienthi->CellCssStyle = "";
		$advertising->luachon_hienthi->CellCssClass = "";

		// vitri_quangcao
		$advertising->vitri_quangcao->CellCssStyle = "";
		$advertising->vitri_quangcao->CellCssClass = "";

		// trang_thai
		$advertising->trang_thai->CellCssStyle = "";
		$advertising->trang_thai->CellCssClass = "";
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// luachon_hienthi
			if (strval($advertising->luachon_hienthi->CurrentValue) <> "") {
				switch ($advertising->luachon_hienthi->CurrentValue) {
					case "1":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn";
						break;
					case "2":
						$advertising->luachon_hienthi->ViewValue = "Quảng cáo";
						break;
					case "3":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn và quảng cáo";
						break;
					default:
						$advertising->luachon_hienthi->ViewValue = $advertising->luachon_hienthi->CurrentValue;
				}
			} else {
				$advertising->luachon_hienthi->ViewValue = NULL;
			}
			$advertising->luachon_hienthi->CssStyle = "";
			$advertising->luachon_hienthi->CssClass = "";
			$advertising->luachon_hienthi->ViewCustomAttributes = "";

			// vitri_quangcao
			if (strval($advertising->vitri_quangcao->CurrentValue) <> "") {
				switch ($advertising->vitri_quangcao->CurrentValue) {
					case "1":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên trái trang tin ";
						break;
                                        case "2":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên phải trang tin ";
						break;
                                        case "3":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên trái trang sàn TMĐT ";
						break;
					case "4":
						$advertising->vitri_quangcao->ViewValue = "Ảnh banner trang tin ";
						break;
                                        case "5":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo vị trí giữa sàn TMĐT";
						break;
					default:
						$advertising->vitri_quangcao->ViewValue = $advertising->vitri_quangcao->CurrentValue;
				}
			} else {
				$advertising->vitri_quangcao->ViewValue = NULL;
			}
			$advertising->vitri_quangcao->CssStyle = "";
			$advertising->vitri_quangcao->CssClass = "";
			$advertising->vitri_quangcao->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising->trang_thai->CurrentValue) <> "") {
				switch ($advertising->trang_thai->CurrentValue) {
					case "0":
						$advertising->trang_thai->ViewValue = "Không xuất bản";
						break;
					case "1":
						$advertising->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$advertising->trang_thai->ViewValue = $advertising->trang_thai->CurrentValue;
				}
			} else {
				$advertising->trang_thai->ViewValue = NULL;
			}
			$advertising->trang_thai->CssStyle = "";
			$advertising->trang_thai->CssClass = "";
			$advertising->trang_thai->ViewCustomAttributes = "";

			// luachon_hienthi
			$advertising->luachon_hienthi->HrefValue = "";

			// vitri_quangcao
			$advertising->vitri_quangcao->HrefValue = "";

			// trang_thai
			$advertising->trang_thai->HrefValue = "";
		} elseif ($advertising->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// luachon_hienthi
			$advertising->luachon_hienthi->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Liên kết sàn");
			$arwrk[] = array("2", "Quảng cáo");
			$arwrk[] = array("3", "Liên kết sàn và quảng cáo");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->luachon_hienthi->EditValue = $arwrk;

			// vitri_quangcao
			$advertising->vitri_quangcao->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Quảng cáo bên trái trang tin");
                        $arwrk[] = array("2", "Quảng cáo bên phải trang tin");
                        $arwrk[] = array("3", "Quảng cáo bên trái sàn TMĐT");
                        $arwrk[] = array("5", "Quảng cáo vị trí giữa sàn TMĐT");
                        $arwrk[] = array("4", "Ảnh Banner trang tin");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->vitri_quangcao->EditValue = $arwrk;

			// trang_thai
			$advertising->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->trang_thai->EditValue = $arwrk;

			// Edit refer script
			// luachon_hienthi

			$advertising->luachon_hienthi->HrefValue = "";

			// vitri_quangcao
			$advertising->vitri_quangcao->HrefValue = "";

			// trang_thai
			$advertising->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$advertising->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $advertising;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($advertising->luachon_hienthi->MultiUpdate == "1") $lUpdateCnt++;
		if ($advertising->vitri_quangcao->MultiUpdate == "1") $lUpdateCnt++;
		if ($advertising->trang_thai->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "Chưa chọn đối tượng cần xuất bản";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($advertising->luachon_hienthi->MultiUpdate <> "" && $advertising->luachon_hienthi->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa chọn - Luachon Hienthi";
		}
		if ($advertising->vitri_quangcao->MultiUpdate <> "" && $advertising->vitri_quangcao->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa chọn - Vitri Quangcao";
		}
		if ($advertising->trang_thai->MultiUpdate <> "" && $advertising->trang_thai->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa chọn - Trang Thai";
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
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
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

			// Field luachon_hienthi
			if ($advertising->luachon_hienthi->MultiUpdate == "1") {
			$advertising->luachon_hienthi->SetDbValueDef($advertising->luachon_hienthi->CurrentValue, 0);
			$rsnew['luachon_hienthi'] =& $advertising->luachon_hienthi->DbValue;
			}

			// Field vitri_quangcao
			if ($advertising->vitri_quangcao->MultiUpdate == "1") {
			$advertising->vitri_quangcao->SetDbValueDef($advertising->vitri_quangcao->CurrentValue, 0);
			$rsnew['vitri_quangcao'] =& $advertising->vitri_quangcao->DbValue;
			}

			// Field trang_thai
			if ($advertising->trang_thai->MultiUpdate == "1") {
			$advertising->trang_thai->SetDbValueDef($advertising->trang_thai->CurrentValue, 0);
			$rsnew['trang_thai'] =& $advertising->trang_thai->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $advertising->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($advertising->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($advertising->CancelMessage <> "") {
					$this->setMessage($advertising->CancelMessage);
					$advertising->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$advertising->Row_Updated($rsold, $rsnew);
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
