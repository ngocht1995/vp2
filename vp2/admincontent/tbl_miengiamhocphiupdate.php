<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_miengiamhocphiinfo.php" ?>
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
$tbl_miengiamhocphi_update = new ctbl_miengiamhocphi_update();
$Page =& $tbl_miengiamhocphi_update;

// Page init processing
$tbl_miengiamhocphi_update->Page_Init();

// Page main processing
$tbl_miengiamhocphi_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_miengiamhocphi_update = new ew_Page("tbl_miengiamhocphi_update");

// page properties
tbl_miengiamhocphi_update.PageID = "update"; // page ID
var EW_PAGE_ID = tbl_miengiamhocphi_update.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_miengiamhocphi_update.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_datetime"];
		uelm = fobj.elements["u" + infix + "_datetime"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Please enter required field - Datetime");
		}
		elm = fobj.elements["x" + infix + "_datetime"];
		uelm = fobj.elements["u" + infix + "_datetime"];
		if (uelm && uelm.checked) {
			if (elm && !ew_CheckEuroDate(elm.value))
				return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Datetime");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
tbl_miengiamhocphi_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_miengiamhocphi_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_miengiamhocphi_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_miengiamhocphi_update.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker">Update TABLE: Tbl Miengiamhocphi<br><br>
<a href="<?php echo $tbl_miengiamhocphi->getReturnUrl() ?>">Back to List</a></span></p>
<?php $tbl_miengiamhocphi_update->ShowMessage() ?>
<form name="ftbl_miengiamhocphiupdate" id="ftbl_miengiamhocphiupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return tbl_miengiamhocphi_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="tbl_miengiamhocphi">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $tbl_miengiamhocphi_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($tbl_miengiamhocphi_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td>Update<input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Field Name</td>
		<td>New Value</td>
	</tr>
<?php if ($tbl_miengiamhocphi->hoten_sinhvien->Visible) { // hoten_sinhvien ?>
	<tr<?php echo $tbl_miengiamhocphi->hoten_sinhvien->RowAttributes ?>>
		<td<?php echo $tbl_miengiamhocphi->hoten_sinhvien->CellAttributes() ?>>
<input type="checkbox" name="u_hoten_sinhvien" id="u_hoten_sinhvien" value="1"<?php echo ($tbl_miengiamhocphi->hoten_sinhvien->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $tbl_miengiamhocphi->hoten_sinhvien->CellAttributes() ?>>Hoten Sinhvien</td>
		<td<?php echo $tbl_miengiamhocphi->hoten_sinhvien->CellAttributes() ?>><span id="el_hoten_sinhvien">
<input type="text" name="x_hoten_sinhvien" id="x_hoten_sinhvien" size="30" maxlength="50" value="<?php echo $tbl_miengiamhocphi->hoten_sinhvien->EditValue ?>"<?php echo $tbl_miengiamhocphi->hoten_sinhvien->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->hoten_sinhvien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->datetime->Visible) { // datetime ?>
	<tr<?php echo $tbl_miengiamhocphi->datetime->RowAttributes ?>>
		<td<?php echo $tbl_miengiamhocphi->datetime->CellAttributes() ?>>
<input type="checkbox" name="u_datetime" id="u_datetime" value="1"<?php echo ($tbl_miengiamhocphi->datetime->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $tbl_miengiamhocphi->datetime->CellAttributes() ?>>Datetime</td>
		<td<?php echo $tbl_miengiamhocphi->datetime->CellAttributes() ?>><span id="el_datetime">
<input type="text" name="x_datetime" id="x_datetime" value="<?php echo $tbl_miengiamhocphi->datetime->EditValue ?>"<?php echo $tbl_miengiamhocphi->datetime->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_datetime" name="cal_x_datetime" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_datetime", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_datetime" // ID of the button
});
</script>
</span><?php echo $tbl_miengiamhocphi->datetime->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->status->Visible) { // status ?>
	<tr<?php echo $tbl_miengiamhocphi->status->RowAttributes ?>>
		<td<?php echo $tbl_miengiamhocphi->status->CellAttributes() ?>>
<input type="checkbox" name="u_status" id="u_status" value="1"<?php echo ($tbl_miengiamhocphi->status->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $tbl_miengiamhocphi->status->CellAttributes() ?>>Status</td>
		<td<?php echo $tbl_miengiamhocphi->status->CellAttributes() ?>><span id="el_status">
<select id="x_status" name="x_status"<?php echo $tbl_miengiamhocphi->status->EditAttributes() ?>>
<?php
if (is_array($tbl_miengiamhocphi->status->EditValue)) {
	$arwrk = $tbl_miengiamhocphi->status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_miengiamhocphi->status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_miengiamhocphi->status->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  Update  ">
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
class ctbl_miengiamhocphi_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'tbl_miengiamhocphi';

	// Page Object Name
	var $PageObjName = 'tbl_miengiamhocphi_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) $PageUrl .= "t=" . $tbl_miengiamhocphi->TableVar . "&"; // add page token
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
		global $objForm, $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_miengiamhocphi->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_miengiamhocphi->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_miengiamhocphi_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_miengiamhocphi"] = new ctbl_miengiamhocphi();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_miengiamhocphi', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_miengiamhocphi;
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
			$this->Page_Terminate("tbl_miengiamhocphilist.php");
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
		global $objForm, $gsFormError, $tbl_miengiamhocphi;

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
				$tbl_miengiamhocphi->CurrentAction = $_POST["a_update"];

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
					$tbl_miengiamhocphi->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("tbl_miengiamhocphilist.php"); // No records selected, return to list
		switch ($tbl_miengiamhocphi->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Update succeeded"); // Set update success message
					$this->Page_Terminate($tbl_miengiamhocphi->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$tbl_miengiamhocphi->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$tbl_miengiamhocphi->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
				$tbl_miengiamhocphi->datetime->setDbValue($rs->fields('datetime'));
				$tbl_miengiamhocphi->status->setDbValue($rs->fields('status'));
			} else {
				if (!ew_CompareValue($tbl_miengiamhocphi->hoten_sinhvien->DbValue, $rs->fields('hoten_sinhvien')))
					$tbl_miengiamhocphi->hoten_sinhvien->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_miengiamhocphi->datetime->DbValue, $rs->fields('datetime')))
					$tbl_miengiamhocphi->datetime->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_miengiamhocphi->status->DbValue, $rs->fields('status')))
					$tbl_miengiamhocphi->status->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $tbl_miengiamhocphi;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $tbl_miengiamhocphi->KeyFilter();
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
		global $tbl_miengiamhocphi;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$tbl_miengiamhocphi->don_tchthp_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $tbl_miengiamhocphi;
		$conn->BeginTrans();

		// Get old recordset
		$tbl_miengiamhocphi->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $tbl_miengiamhocphi->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$tbl_miengiamhocphi->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $tbl_miengiamhocphi;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->hoten_sinhvien->setFormValue($objForm->GetValue("x_hoten_sinhvien"));
		$tbl_miengiamhocphi->hoten_sinhvien->MultiUpdate = $objForm->GetValue("u_hoten_sinhvien");
		$tbl_miengiamhocphi->datetime->setFormValue($objForm->GetValue("x_datetime"));
		$tbl_miengiamhocphi->datetime->CurrentValue = ew_UnFormatDateTime($tbl_miengiamhocphi->datetime->CurrentValue, 7);
		$tbl_miengiamhocphi->datetime->MultiUpdate = $objForm->GetValue("u_datetime");
		$tbl_miengiamhocphi->status->setFormValue($objForm->GetValue("x_status"));
		$tbl_miengiamhocphi->status->MultiUpdate = $objForm->GetValue("u_status");
		$tbl_miengiamhocphi->don_tchthp_id->setFormValue($objForm->GetValue("x_don_tchthp_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->don_tchthp_id->CurrentValue = $tbl_miengiamhocphi->don_tchthp_id->FormValue;
		$tbl_miengiamhocphi->hoten_sinhvien->CurrentValue = $tbl_miengiamhocphi->hoten_sinhvien->FormValue;
		$tbl_miengiamhocphi->datetime->CurrentValue = $tbl_miengiamhocphi->datetime->FormValue;
		$tbl_miengiamhocphi->datetime->CurrentValue = ew_UnFormatDateTime($tbl_miengiamhocphi->datetime->CurrentValue, 7);
		$tbl_miengiamhocphi->status->CurrentValue = $tbl_miengiamhocphi->status->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_miengiamhocphi;

		// Call Recordset Selecting event
		$tbl_miengiamhocphi->Recordset_Selecting($tbl_miengiamhocphi->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_miengiamhocphi->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_miengiamhocphi->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_miengiamhocphi;

		// Call Row_Rendering event
		$tbl_miengiamhocphi->Row_Rendering();

		// Common render codes for all row types
		// hoten_sinhvien

		$tbl_miengiamhocphi->hoten_sinhvien->CellCssStyle = "";
		$tbl_miengiamhocphi->hoten_sinhvien->CellCssClass = "";

		// datetime
		$tbl_miengiamhocphi->datetime->CellCssStyle = "";
		$tbl_miengiamhocphi->datetime->CellCssClass = "";

		// status
		$tbl_miengiamhocphi->status->CellCssStyle = "";
		$tbl_miengiamhocphi->status->CellCssClass = "";
		if ($tbl_miengiamhocphi->RowType == EW_ROWTYPE_VIEW) { // View row

			// don_tchthp_id
			$tbl_miengiamhocphi->don_tchthp_id->ViewValue = $tbl_miengiamhocphi->don_tchthp_id->CurrentValue;
			$tbl_miengiamhocphi->don_tchthp_id->CssStyle = "";
			$tbl_miengiamhocphi->don_tchthp_id->CssClass = "";
			$tbl_miengiamhocphi->don_tchthp_id->ViewCustomAttributes = "";

			// loaidon_id
			if (strval($tbl_miengiamhocphi->loaidon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->loaidon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "khong xu ly";
						break;
					case "1":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "Xu ly";
						break;
					default:
						$tbl_miengiamhocphi->loaidon_id->ViewValue = $tbl_miengiamhocphi->loaidon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->loaidon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->loaidon_id->CssStyle = "";
			$tbl_miengiamhocphi->loaidon_id->CssClass = "";
			$tbl_miengiamhocphi->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			if (strval($tbl_miengiamhocphi->nhomdon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->nhomdon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp1";
						break;
					case "1":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp2";
						break;
					case "2":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp3";
						break;
					default:
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = $tbl_miengiamhocphi->nhomdon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->nhomdon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->nhomdon_id->CssStyle = "";
			$tbl_miengiamhocphi->nhomdon_id->CssClass = "";
			$tbl_miengiamhocphi->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_miengiamhocphi->msv->ViewValue = $tbl_miengiamhocphi->msv->CurrentValue;
			$tbl_miengiamhocphi->msv->CssStyle = "";
			$tbl_miengiamhocphi->msv->CssClass = "";
			$tbl_miengiamhocphi->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->ViewValue = $tbl_miengiamhocphi->hoten_sinhvien->CurrentValue;
			$tbl_miengiamhocphi->hoten_sinhvien->CssStyle = "";
			$tbl_miengiamhocphi->hoten_sinhvien->CssClass = "";
			$tbl_miengiamhocphi->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->ViewValue = $tbl_miengiamhocphi->ngay_thang_nam->CurrentValue;
			$tbl_miengiamhocphi->ngay_thang_nam->CssStyle = "";
			$tbl_miengiamhocphi->ngay_thang_nam->CssClass = "";
			$tbl_miengiamhocphi->ngay_thang_nam->ViewCustomAttributes = "";

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->ViewValue = $tbl_miengiamhocphi->hoten_chame->CurrentValue;
			$tbl_miengiamhocphi->hoten_chame->CssStyle = "";
			$tbl_miengiamhocphi->hoten_chame->CssClass = "";
			$tbl_miengiamhocphi->hoten_chame->ViewCustomAttributes = "";

			// hokhau
			$tbl_miengiamhocphi->hokhau->ViewValue = $tbl_miengiamhocphi->hokhau->CurrentValue;
			$tbl_miengiamhocphi->hokhau->CssStyle = "";
			$tbl_miengiamhocphi->hokhau->CssClass = "";
			$tbl_miengiamhocphi->hokhau->ViewCustomAttributes = "";

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->ViewValue = $tbl_miengiamhocphi->nganhhoc->CurrentValue;
			$tbl_miengiamhocphi->nganhhoc->CssStyle = "";
			$tbl_miengiamhocphi->nganhhoc->CssClass = "";
			$tbl_miengiamhocphi->nganhhoc->ViewCustomAttributes = "";

			// doituong
			$tbl_miengiamhocphi->doituong->ViewValue = $tbl_miengiamhocphi->doituong->CurrentValue;
			$tbl_miengiamhocphi->doituong->CssStyle = "";
			$tbl_miengiamhocphi->doituong->CssClass = "";
			$tbl_miengiamhocphi->doituong->ViewCustomAttributes = "";

			// datetime
			$tbl_miengiamhocphi->datetime->ViewValue = $tbl_miengiamhocphi->datetime->CurrentValue;
			$tbl_miengiamhocphi->datetime->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime->ViewValue, 7);
			$tbl_miengiamhocphi->datetime->CssStyle = "";
			$tbl_miengiamhocphi->datetime->CssClass = "";
			$tbl_miengiamhocphi->datetime->ViewCustomAttributes = "";

			// status
			if (strval($tbl_miengiamhocphi->status->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->status->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->status->ViewValue = "Khong xet duyet";
						break;
					case "1":
						$tbl_miengiamhocphi->status->ViewValue = "Cho xet duyet";
						break;
					case "2":
						$tbl_miengiamhocphi->status->ViewValue = "dang xu ly";
						break;
					case "3 ":
						$tbl_miengiamhocphi->status->ViewValue = "Ket thuc";
						break;
					default:
						$tbl_miengiamhocphi->status->ViewValue = $tbl_miengiamhocphi->status->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->status->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->status->CssStyle = "";
			$tbl_miengiamhocphi->status->CssClass = "";
			$tbl_miengiamhocphi->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_miengiamhocphi->active->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->active->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->active->ViewValue = "Chua xac nhan";
						break;
					case "1":
						$tbl_miengiamhocphi->active->ViewValue = "Xac nhan";
						break;
					case "":
						$tbl_miengiamhocphi->active->ViewValue = "";
						break;
					default:
						$tbl_miengiamhocphi->active->ViewValue = $tbl_miengiamhocphi->active->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->active->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->active->CssStyle = "";
			$tbl_miengiamhocphi->active->CssClass = "";
			$tbl_miengiamhocphi->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_miengiamhocphi->nguoidung_id->ViewValue = $tbl_miengiamhocphi->nguoidung_id->CurrentValue;
			$tbl_miengiamhocphi->nguoidung_id->CssStyle = "";
			$tbl_miengiamhocphi->nguoidung_id->CssClass = "";
			$tbl_miengiamhocphi->nguoidung_id->ViewCustomAttributes = "";

			// datetime_add
			$tbl_miengiamhocphi->datetime_add->ViewValue = $tbl_miengiamhocphi->datetime_add->CurrentValue;
			$tbl_miengiamhocphi->datetime_add->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime_add->ViewValue, 7);
			$tbl_miengiamhocphi->datetime_add->CssStyle = "";
			$tbl_miengiamhocphi->datetime_add->CssClass = "";
			$tbl_miengiamhocphi->datetime_add->ViewCustomAttributes = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = $tbl_miengiamhocphi->dateedit_edit->CurrentValue;
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->dateedit_edit->ViewValue, 7);
			$tbl_miengiamhocphi->dateedit_edit->CssStyle = "";
			$tbl_miengiamhocphi->dateedit_edit->CssClass = "";
			$tbl_miengiamhocphi->dateedit_edit->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->HrefValue = "";

			// datetime
			$tbl_miengiamhocphi->datetime->HrefValue = "";

			// status
			$tbl_miengiamhocphi->status->HrefValue = "";
		} elseif ($tbl_miengiamhocphi->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->EditCustomAttributes = "";
			$tbl_miengiamhocphi->hoten_sinhvien->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->hoten_sinhvien->CurrentValue);

			// datetime
			$tbl_miengiamhocphi->datetime->EditCustomAttributes = "";
			$tbl_miengiamhocphi->datetime->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_miengiamhocphi->datetime->CurrentValue, 7));

			// status
			$tbl_miengiamhocphi->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xet duyet");
			$arwrk[] = array("1", "Cho xet duyet");
			$arwrk[] = array("2", "dang xu ly");
			$arwrk[] = array("3 ", "Ket thuc");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_miengiamhocphi->status->EditValue = $arwrk;

			// Edit refer script
			// hoten_sinhvien

			$tbl_miengiamhocphi->hoten_sinhvien->HrefValue = "";

			// datetime
			$tbl_miengiamhocphi->datetime->HrefValue = "";

			// status
			$tbl_miengiamhocphi->status->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_miengiamhocphi->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $tbl_miengiamhocphi;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($tbl_miengiamhocphi->hoten_sinhvien->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_miengiamhocphi->datetime->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_miengiamhocphi->status->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "No field selected for update";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($tbl_miengiamhocphi->datetime->MultiUpdate <> "" && $tbl_miengiamhocphi->datetime->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Datetime";
		}
		if ($tbl_miengiamhocphi->datetime->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($tbl_miengiamhocphi->datetime->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Datetime";
			}
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
		global $conn, $Security, $tbl_miengiamhocphi;
		$sFilter = $tbl_miengiamhocphi->KeyFilter();
		$tbl_miengiamhocphi->CurrentFilter = $sFilter;
		$sSql = $tbl_miengiamhocphi->SQL();
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

			// Field hoten_sinhvien
			if ($tbl_miengiamhocphi->hoten_sinhvien->MultiUpdate == "1") {
			$tbl_miengiamhocphi->hoten_sinhvien->SetDbValueDef($tbl_miengiamhocphi->hoten_sinhvien->CurrentValue, NULL);
			$rsnew['hoten_sinhvien'] =& $tbl_miengiamhocphi->hoten_sinhvien->DbValue;
			}

			// Field datetime
			if ($tbl_miengiamhocphi->datetime->MultiUpdate == "1") {
			$tbl_miengiamhocphi->datetime->SetDbValueDef(ew_UnFormatDateTime($tbl_miengiamhocphi->datetime->CurrentValue, 7), NULL);
			$rsnew['datetime'] =& $tbl_miengiamhocphi->datetime->DbValue;
			}

			// Field status
			if ($tbl_miengiamhocphi->status->MultiUpdate == "1") {
			$tbl_miengiamhocphi->status->SetDbValueDef($tbl_miengiamhocphi->status->CurrentValue, NULL);
			$rsnew['status'] =& $tbl_miengiamhocphi->status->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $tbl_miengiamhocphi->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($tbl_miengiamhocphi->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_miengiamhocphi->CancelMessage <> "") {
					$this->setMessage($tbl_miengiamhocphi->CancelMessage);
					$tbl_miengiamhocphi->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_miengiamhocphi->Row_Updated($rsold, $rsnew);
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
