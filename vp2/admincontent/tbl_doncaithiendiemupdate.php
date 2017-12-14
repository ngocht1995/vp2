<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_doncaithiendieminfo.php" ?>
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
$tbl_doncaithiendiem_update = new ctbl_doncaithiendiem_update();
$Page =& $tbl_doncaithiendiem_update;

// Page init processing
$tbl_doncaithiendiem_update->Page_Init();

// Page main processing
$tbl_doncaithiendiem_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_doncaithiendiem_update = new ew_Page("tbl_doncaithiendiem_update");

// page properties
tbl_doncaithiendiem_update.PageID = "update"; // page ID
var EW_PAGE_ID = tbl_doncaithiendiem_update.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_doncaithiendiem_update.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_phieucaithiendiem_id"];
		uelm = fobj.elements["u" + infix + "_phieucaithiendiem_id"];
		if (uelm && uelm.checked) {
			if (elm && !ew_CheckInteger(elm.value))
				return ew_OnError(this, elm, "Incorrect integer - Phieucaithiendiem Id");
		}
		elm = fobj.elements["x" + infix + "_loaidon_id"];
		uelm = fobj.elements["u" + infix + "_loaidon_id"];
		if (uelm && uelm.checked) {
			if (elm && !ew_CheckInteger(elm.value))
				return ew_OnError(this, elm, "Incorrect integer - Loaidon Id");
		}
		elm = fobj.elements["x" + infix + "_status_email"];
		uelm = fobj.elements["u" + infix + "_status_email"];
		if (uelm && uelm.checked) {
			if (elm && !ew_CheckInteger(elm.value))
				return ew_OnError(this, elm, "Incorrect integer - Status Email");
		}
		elm = fobj.elements["x" + infix + "_status"];
		uelm = fobj.elements["u" + infix + "_status"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Please enter required field - Status");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
tbl_doncaithiendiem_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_doncaithiendiem_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_doncaithiendiem_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_doncaithiendiem_update.ValidateRequired = false; // no JavaScript validation
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
<p>
    <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thiết lập trạng thái - Đơn xin cải thiện điểm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
    </table>    
<a href="<?php echo $tbl_doncaithiendiem->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a></span></p>
<?php $tbl_doncaithiendiem_update->ShowMessage() ?>
<form name="ftbl_doncaithiendiemupdate" id="ftbl_doncaithiendiemupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return tbl_doncaithiendiem_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="tbl_doncaithiendiem">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $tbl_doncaithiendiem_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($tbl_doncaithiendiem_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td>Thiết lập giá trị<input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Tên trường</td>
		<td>Giá trị</td>
	</tr>
<?php if ($tbl_doncaithiendiem->email->Visible) { // email ?>
	<tr<?php echo $tbl_doncaithiendiem->email->RowAttributes ?>>
		<td<?php echo $tbl_doncaithiendiem->email->CellAttributes() ?>>
<input type="checkbox" name="u_email" id="u_email" value="1"<?php echo ($tbl_doncaithiendiem->email->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $tbl_doncaithiendiem->email->CellAttributes() ?>>Email xác thực</td>
		<td<?php echo $tbl_doncaithiendiem->email->CellAttributes() ?>><span id="el_email">
<input readonly="true" style="background: #bababa" type="text" name="x_email" id="x_email" size="100" maxlength="200" value="<?php echo $tbl_doncaithiendiem->email->EditValue ?>"<?php echo $tbl_doncaithiendiem->email->EditAttributes() ?>>
</span><?php echo $tbl_doncaithiendiem->email->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->note->Visible) { // note ?>
	<tr<?php echo $tbl_doncaithiendiem->note->RowAttributes ?>>
		<td<?php echo $tbl_doncaithiendiem->note->CellAttributes() ?>>
<input type="checkbox" name="u_note" id="u_note" value="1"<?php echo ($tbl_doncaithiendiem->note->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $tbl_doncaithiendiem->note->CellAttributes() ?>>Nội dung</td>
		<td<?php echo $tbl_doncaithiendiem->note->CellAttributes() ?>><span id="el_note">
<textarea name="x_note" id="x_note" cols="120" rows="4"<?php echo $tbl_doncaithiendiem->note->EditAttributes() ?>><?php echo $tbl_doncaithiendiem->note->EditValue ?></textarea>
</span><?php echo $tbl_doncaithiendiem->note->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->status_email->Visible) { // status_email ?>
	<tr<?php echo $tbl_doncaithiendiem->status_email->RowAttributes ?>>
		<td<?php echo $tbl_doncaithiendiem->status_email->CellAttributes() ?>>
<input type="checkbox" name="u_status_email" id="u_status_email" value="1"<?php echo ($tbl_doncaithiendiem->status_email->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $tbl_doncaithiendiem->status_email->CellAttributes() ?>>Trạng thái Email</td>
		<td<?php echo $tbl_doncaithiendiem->status_email->CellAttributes() ?>><span id="el_status_email">
<select id="x_status_email" name="x_status_email"<?php echo $tbl_doncaithiendiem->status_email->EditAttributes() ?>>
<?php
if (is_array($tbl_doncaithiendiem->status_email->EditValue)) {
	$arwrk = $tbl_doncaithiendiem->status_email->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_doncaithiendiem->status_email->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_doncaithiendiem->status_email->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->status->Visible) { // status ?>
	<tr<?php echo $tbl_doncaithiendiem->status->RowAttributes ?>>
		<td<?php echo $tbl_doncaithiendiem->status->CellAttributes() ?>>
<input type="checkbox" name="u_status" id="u_status" value="1"<?php echo ($tbl_doncaithiendiem->status->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $tbl_doncaithiendiem->status->CellAttributes() ?>>Trạng thái đơn</td>
		<td<?php echo $tbl_doncaithiendiem->status->CellAttributes() ?>><span id="el_status">
<select id="x_status" name="x_status"<?php echo $tbl_doncaithiendiem->status->EditAttributes() ?>>
<?php
if (is_array($tbl_doncaithiendiem->status->EditValue)) {
	$arwrk = $tbl_doncaithiendiem->status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_doncaithiendiem->status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_doncaithiendiem->status->CustomMsg ?></td>
	</tr>
<?php } ?>
   <?php  if (IsAdmin()) {?>     
                <?php if ($tbl_doncaithiendiem->active->Visible) { // active ?>
                        <tr<?php echo $tbl_doncaithiendiem->active->RowAttributes ?>>
                                <td<?php echo $tbl_doncaithiendiem->active->CellAttributes() ?>>
                <input type="checkbox" name="u_active" id="u_active" value="1"<?php echo ($tbl_doncaithiendiem->active->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
                </td>
                                <td<?php echo $tbl_doncaithiendiem->active->CellAttributes() ?>>Active</td>
                                <td<?php echo $tbl_doncaithiendiem->active->CellAttributes() ?>><span id="el_active">
                <select id="x_active" name="x_active"<?php echo $tbl_doncaithiendiem->active->EditAttributes() ?>>
                <?php
                if (is_array($tbl_doncaithiendiem->active->EditValue)) {
                        $arwrk = $tbl_doncaithiendiem->active->EditValue;
                        $rowswrk = count($arwrk);
                        $emptywrk = TRUE;
                        for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                                $selwrk = (strval($tbl_doncaithiendiem->active->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
                </span><?php echo $tbl_doncaithiendiem->active->CustomMsg ?></td>
                        </tr>
                <?php } ?>
     <?php } ?>   

</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  Thiết lập  ">
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
class ctbl_doncaithiendiem_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'tbl_doncaithiendiem';

	// Page Object Name
	var $PageObjName = 'tbl_doncaithiendiem_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) $PageUrl .= "t=" . $tbl_doncaithiendiem->TableVar . "&"; // add page token
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
		global $objForm, $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_doncaithiendiem->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_doncaithiendiem->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_doncaithiendiem_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_doncaithiendiem"] = new ctbl_doncaithiendiem();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_doncaithiendiem', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_doncaithiendiem;
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
			$this->Page_Terminate("tbl_doncaithiendiemlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "You do not have the right permission to view the page";
			$this->Page_Terminate("tbl_doncaithiendiemlist.php");
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
		global $objForm, $gsFormError, $tbl_doncaithiendiem;

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
				$tbl_doncaithiendiem->CurrentAction = $_POST["a_update"];

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
					$tbl_doncaithiendiem->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("tbl_doncaithiendiemlist.php"); // No records selected, return to list
		switch ($tbl_doncaithiendiem->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Update succeeded"); // Set update success message
					$this->Page_Terminate($tbl_doncaithiendiem->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$tbl_doncaithiendiem->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$tbl_doncaithiendiem->phieucaithiendiem_id->setDbValue($rs->fields('phieucaithiendiem_id'));
				$tbl_doncaithiendiem->loaidon_id->setDbValue($rs->fields('loaidon_id'));
				$tbl_doncaithiendiem->msv->setDbValue($rs->fields('msv'));
				$tbl_doncaithiendiem->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
				$tbl_doncaithiendiem->ngay_tao_don->setDbValue($rs->fields('ngay_tao_don'));
				$tbl_doncaithiendiem->email->setDbValue($rs->fields('email'));
				$tbl_doncaithiendiem->note->setDbValue($rs->fields('note'));
				$tbl_doncaithiendiem->status_email->setDbValue($rs->fields('status_email'));
				$tbl_doncaithiendiem->status->setDbValue($rs->fields('status'));
				$tbl_doncaithiendiem->active->setDbValue($rs->fields('active'));
				$tbl_doncaithiendiem->date_time_edit->setDbValue($rs->fields('date_time_edit'));
			} else {
				if (!ew_CompareValue($tbl_doncaithiendiem->phieucaithiendiem_id->DbValue, $rs->fields('phieucaithiendiem_id')))
					$tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->loaidon_id->DbValue, $rs->fields('loaidon_id')))
					$tbl_doncaithiendiem->loaidon_id->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->msv->DbValue, $rs->fields('msv')))
					$tbl_doncaithiendiem->msv->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->hoten_sinhvien->DbValue, $rs->fields('hoten_sinhvien')))
					$tbl_doncaithiendiem->hoten_sinhvien->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->ngay_tao_don->DbValue, $rs->fields('ngay_tao_don')))
					$tbl_doncaithiendiem->ngay_tao_don->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->email->DbValue, $rs->fields('email')))
					$tbl_doncaithiendiem->email->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->note->DbValue, $rs->fields('note')))
					$tbl_doncaithiendiem->note->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->status_email->DbValue, $rs->fields('status_email')))
					$tbl_doncaithiendiem->status_email->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->status->DbValue, $rs->fields('status')))
					$tbl_doncaithiendiem->status->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->active->DbValue, $rs->fields('active')))
					$tbl_doncaithiendiem->active->CurrentValue = NULL;
				if (!ew_CompareValue($tbl_doncaithiendiem->date_time_edit->DbValue, $rs->fields('date_time_edit')))
					$tbl_doncaithiendiem->date_time_edit->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $tbl_doncaithiendiem;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $tbl_doncaithiendiem->KeyFilter();
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
		global $tbl_doncaithiendiem;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $tbl_doncaithiendiem;
		$conn->BeginTrans();

		// Get old recordset
		$tbl_doncaithiendiem->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $tbl_doncaithiendiem->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$tbl_doncaithiendiem->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $tbl_doncaithiendiem;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->phieucaithiendiem_id->setFormValue($objForm->GetValue("x_phieucaithiendiem_id"));
		$tbl_doncaithiendiem->phieucaithiendiem_id->MultiUpdate = $objForm->GetValue("u_phieucaithiendiem_id");
		$tbl_doncaithiendiem->loaidon_id->setFormValue($objForm->GetValue("x_loaidon_id"));
		$tbl_doncaithiendiem->loaidon_id->MultiUpdate = $objForm->GetValue("u_loaidon_id");
		$tbl_doncaithiendiem->msv->setFormValue($objForm->GetValue("x_msv"));
		$tbl_doncaithiendiem->msv->MultiUpdate = $objForm->GetValue("u_msv");
		$tbl_doncaithiendiem->hoten_sinhvien->setFormValue($objForm->GetValue("x_hoten_sinhvien"));
		$tbl_doncaithiendiem->hoten_sinhvien->MultiUpdate = $objForm->GetValue("u_hoten_sinhvien");
		$tbl_doncaithiendiem->ngay_tao_don->setFormValue($objForm->GetValue("x_ngay_tao_don"));
		$tbl_doncaithiendiem->ngay_tao_don->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_tao_don->CurrentValue, 7);
		$tbl_doncaithiendiem->ngay_tao_don->MultiUpdate = $objForm->GetValue("u_ngay_tao_don");
		$tbl_doncaithiendiem->email->setFormValue($objForm->GetValue("x_email"));
		$tbl_doncaithiendiem->email->MultiUpdate = $objForm->GetValue("u_email");
		$tbl_doncaithiendiem->note->setFormValue($objForm->GetValue("x_note"));
		$tbl_doncaithiendiem->note->MultiUpdate = $objForm->GetValue("u_note");
		$tbl_doncaithiendiem->status_email->setFormValue($objForm->GetValue("x_status_email"));
		$tbl_doncaithiendiem->status_email->MultiUpdate = $objForm->GetValue("u_status_email");
		$tbl_doncaithiendiem->status->setFormValue($objForm->GetValue("x_status"));
		$tbl_doncaithiendiem->status->MultiUpdate = $objForm->GetValue("u_status");
		$tbl_doncaithiendiem->active->setFormValue($objForm->GetValue("x_active"));
		$tbl_doncaithiendiem->active->MultiUpdate = $objForm->GetValue("u_active");
		$tbl_doncaithiendiem->date_time_edit->setFormValue($objForm->GetValue("x_date_time_edit"));
		$tbl_doncaithiendiem->date_time_edit->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->date_time_edit->CurrentValue, 7);
		$tbl_doncaithiendiem->date_time_edit->MultiUpdate = $objForm->GetValue("u_date_time_edit");
	}

	// Restore form values
	function RestoreFormValues() {
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue = $tbl_doncaithiendiem->phieucaithiendiem_id->FormValue;
		$tbl_doncaithiendiem->loaidon_id->CurrentValue = $tbl_doncaithiendiem->loaidon_id->FormValue;
		$tbl_doncaithiendiem->msv->CurrentValue = $tbl_doncaithiendiem->msv->FormValue;
		$tbl_doncaithiendiem->hoten_sinhvien->CurrentValue = $tbl_doncaithiendiem->hoten_sinhvien->FormValue;
		$tbl_doncaithiendiem->ngay_tao_don->CurrentValue = $tbl_doncaithiendiem->ngay_tao_don->FormValue;
		$tbl_doncaithiendiem->ngay_tao_don->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_tao_don->CurrentValue, 7);
		$tbl_doncaithiendiem->email->CurrentValue = $tbl_doncaithiendiem->email->FormValue;
		$tbl_doncaithiendiem->note->CurrentValue = $tbl_doncaithiendiem->note->FormValue;
		$tbl_doncaithiendiem->status_email->CurrentValue = $tbl_doncaithiendiem->status_email->FormValue;
		$tbl_doncaithiendiem->status->CurrentValue = $tbl_doncaithiendiem->status->FormValue;
		$tbl_doncaithiendiem->active->CurrentValue = $tbl_doncaithiendiem->active->FormValue;
		$tbl_doncaithiendiem->date_time_edit->CurrentValue = $tbl_doncaithiendiem->date_time_edit->FormValue;
		$tbl_doncaithiendiem->date_time_edit->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->date_time_edit->CurrentValue, 7);
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_doncaithiendiem;

		// Call Recordset Selecting event
		$tbl_doncaithiendiem->Recordset_Selecting($tbl_doncaithiendiem->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_doncaithiendiem->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_doncaithiendiem->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_doncaithiendiem;

		// Call Row_Rendering event
		$tbl_doncaithiendiem->Row_Rendering();

		// Common render codes for all row types
		// phieucaithiendiem_id

		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssStyle = "";
		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssClass = "";

		// loaidon_id
		$tbl_doncaithiendiem->loaidon_id->CellCssStyle = "";
		$tbl_doncaithiendiem->loaidon_id->CellCssClass = "";

		// msv
		$tbl_doncaithiendiem->msv->CellCssStyle = "";
		$tbl_doncaithiendiem->msv->CellCssClass = "";

		// hoten_sinhvien
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssStyle = "";
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssClass = "";

		// ngay_tao_don
		$tbl_doncaithiendiem->ngay_tao_don->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_tao_don->CellCssClass = "";

		// email
		$tbl_doncaithiendiem->email->CellCssStyle = "";
		$tbl_doncaithiendiem->email->CellCssClass = "";

		// note
		$tbl_doncaithiendiem->note->CellCssStyle = "";
		$tbl_doncaithiendiem->note->CellCssClass = "";

		// status_email
		$tbl_doncaithiendiem->status_email->CellCssStyle = "";
		$tbl_doncaithiendiem->status_email->CellCssClass = "";

		// status
		$tbl_doncaithiendiem->status->CellCssStyle = "";
		$tbl_doncaithiendiem->status->CellCssClass = "";

		// active
		$tbl_doncaithiendiem->active->CellCssStyle = "";
		$tbl_doncaithiendiem->active->CellCssClass = "";

		// date_time_edit
		$tbl_doncaithiendiem->date_time_edit->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_edit->CellCssClass = "";
		if ($tbl_doncaithiendiem->RowType == EW_ROWTYPE_VIEW) { // View row

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewValue = $tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue;
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssStyle = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssClass = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewCustomAttributes = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->ViewValue = $tbl_doncaithiendiem->loaidon_id->CurrentValue;
			$tbl_doncaithiendiem->loaidon_id->CssStyle = "";
			$tbl_doncaithiendiem->loaidon_id->CssClass = "";
			$tbl_doncaithiendiem->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->ViewValue = $tbl_doncaithiendiem->nhomdon_id->CurrentValue;
			$tbl_doncaithiendiem->nhomdon_id->CssStyle = "";
			$tbl_doncaithiendiem->nhomdon_id->CssClass = "";
			$tbl_doncaithiendiem->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_doncaithiendiem->msv->ViewValue = $tbl_doncaithiendiem->msv->CurrentValue;
			$tbl_doncaithiendiem->msv->CssStyle = "";
			$tbl_doncaithiendiem->msv->CssClass = "";
			$tbl_doncaithiendiem->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->ViewValue = $tbl_doncaithiendiem->hoten_sinhvien->CurrentValue;
			$tbl_doncaithiendiem->hoten_sinhvien->ViewValue = strtoupper($tbl_doncaithiendiem->hoten_sinhvien->ViewValue);
			$tbl_doncaithiendiem->hoten_sinhvien->CssStyle = "";
			$tbl_doncaithiendiem->hoten_sinhvien->CssClass = "";
			$tbl_doncaithiendiem->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = $tbl_doncaithiendiem->ngay_sinh->CurrentValue;
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_sinh->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_sinh->CssStyle = "";
			$tbl_doncaithiendiem->ngay_sinh->CssClass = "";
			$tbl_doncaithiendiem->ngay_sinh->ViewCustomAttributes = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->ViewValue = $tbl_doncaithiendiem->lop_sinhhoat->CurrentValue;
			$tbl_doncaithiendiem->lop_sinhhoat->CssStyle = "";
			$tbl_doncaithiendiem->lop_sinhhoat->CssClass = "";
			$tbl_doncaithiendiem->lop_sinhhoat->ViewCustomAttributes = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->ViewValue = $tbl_doncaithiendiem->so_dienthoai->CurrentValue;
			$tbl_doncaithiendiem->so_dienthoai->CssStyle = "";
			$tbl_doncaithiendiem->so_dienthoai->CssClass = "";
			$tbl_doncaithiendiem->so_dienthoai->ViewCustomAttributes = "";

			// ma_mon
			$tbl_doncaithiendiem->ma_mon->ViewValue = $tbl_doncaithiendiem->ma_mon->CurrentValue;
			$tbl_doncaithiendiem->ma_mon->CssStyle = "";
			$tbl_doncaithiendiem->ma_mon->CssClass = "";
			$tbl_doncaithiendiem->ma_mon->ViewCustomAttributes = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->ViewValue = $tbl_doncaithiendiem->lop_tinchi->CurrentValue;
			$tbl_doncaithiendiem->lop_tinchi->CssStyle = "";
			$tbl_doncaithiendiem->lop_tinchi->CssClass = "";
			$tbl_doncaithiendiem->lop_tinchi->ViewCustomAttributes = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->ViewValue = $tbl_doncaithiendiem->hoc_ky->CurrentValue;
			$tbl_doncaithiendiem->hoc_ky->CssStyle = "";
			$tbl_doncaithiendiem->hoc_ky->CssClass = "";
			$tbl_doncaithiendiem->hoc_ky->ViewCustomAttributes = "";

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->ViewValue = $tbl_doncaithiendiem->nam_hoc1->CurrentValue;
			$tbl_doncaithiendiem->nam_hoc1->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc1->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc1->ViewCustomAttributes = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->ViewValue = $tbl_doncaithiendiem->nam_hoc2->CurrentValue;
			$tbl_doncaithiendiem->nam_hoc2->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc2->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc2->ViewCustomAttributes = "";

			// diem
			$tbl_doncaithiendiem->diem->ViewValue = $tbl_doncaithiendiem->diem->CurrentValue;
			$tbl_doncaithiendiem->diem->CssStyle = "";
			$tbl_doncaithiendiem->diem->CssClass = "";
			$tbl_doncaithiendiem->diem->ViewCustomAttributes = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->ViewValue = $tbl_doncaithiendiem->monthi_lan2->CurrentValue;
			$tbl_doncaithiendiem->monthi_lan2->CssStyle = "";
			$tbl_doncaithiendiem->monthi_lan2->CssClass = "";
			$tbl_doncaithiendiem->monthi_lan2->ViewCustomAttributes = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->ViewValue = $tbl_doncaithiendiem->thoigian_h->CurrentValue;
			$tbl_doncaithiendiem->thoigian_h->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_h->CssClass = "";
			$tbl_doncaithiendiem->thoigian_h->ViewCustomAttributes = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->ViewValue = $tbl_doncaithiendiem->thoigian_phut->CurrentValue;
			$tbl_doncaithiendiem->thoigian_phut->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_phut->CssClass = "";
			$tbl_doncaithiendiem->thoigian_phut->ViewCustomAttributes = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->ViewValue = $tbl_doncaithiendiem->ngay_thi->CurrentValue;
			$tbl_doncaithiendiem->ngay_thi->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_thi->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_thi->CssStyle = "";
			$tbl_doncaithiendiem->ngay_thi->CssClass = "";
			$tbl_doncaithiendiem->ngay_thi->ViewCustomAttributes = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = $tbl_doncaithiendiem->ngay_tao_don->CurrentValue;
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_tao_don->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_tao_don->CssStyle = "";
			$tbl_doncaithiendiem->ngay_tao_don->CssClass = "";
			$tbl_doncaithiendiem->ngay_tao_don->ViewCustomAttributes = "";

			// email
			$tbl_doncaithiendiem->email->ViewValue = $tbl_doncaithiendiem->email->CurrentValue;
			$tbl_doncaithiendiem->email->CssStyle = "";
			$tbl_doncaithiendiem->email->CssClass = "";
			$tbl_doncaithiendiem->email->ViewCustomAttributes = "";

			// note
			$tbl_doncaithiendiem->note->ViewValue = $tbl_doncaithiendiem->note->CurrentValue;
			$tbl_doncaithiendiem->note->CssStyle = "";
			$tbl_doncaithiendiem->note->CssClass = "";
			$tbl_doncaithiendiem->note->ViewCustomAttributes = "";

			// status_email
			if (strval($tbl_doncaithiendiem->status_email->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->status_email->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->status_email->ViewValue = "Khong gui mail";
						break;
					case "1":
						$tbl_doncaithiendiem->status_email->ViewValue = "Gui mail";
						break;
					case "2":
						$tbl_doncaithiendiem->status_email->ViewValue = "Thanh cong";
						break;
					case "3":
						$tbl_doncaithiendiem->status_email->ViewValue = "Khong thanh cong";
						break;
					default:
			$tbl_doncaithiendiem->status_email->ViewValue = $tbl_doncaithiendiem->status_email->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->status_email->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->status_email->CssStyle = "";
			$tbl_doncaithiendiem->status_email->CssClass = "";
			$tbl_doncaithiendiem->status_email->ViewCustomAttributes = "";

			// status
			if (strval($tbl_doncaithiendiem->status->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->status->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->status->ViewValue = "khong xet duyet";
						break;
					case "1":
						$tbl_doncaithiendiem->status->ViewValue = "cho xet duyet";
						break;
					case "2":
						$tbl_doncaithiendiem->status->ViewValue = "dang xu ly";
						break;
					case "3":
						$tbl_doncaithiendiem->status->ViewValue = "ket thuc";
						break;
					default:
						$tbl_doncaithiendiem->status->ViewValue = $tbl_doncaithiendiem->status->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->status->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->status->CssStyle = "";
			$tbl_doncaithiendiem->status->CssClass = "";
			$tbl_doncaithiendiem->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_doncaithiendiem->active->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->active->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->active->ViewValue = "khong kich hoat";
						break;
					case "1":
						$tbl_doncaithiendiem->active->ViewValue = "kich hoat";
						break;
					default:
						$tbl_doncaithiendiem->active->ViewValue = $tbl_doncaithiendiem->active->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->active->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->active->CssStyle = "";
			$tbl_doncaithiendiem->active->CssClass = "";
			$tbl_doncaithiendiem->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->ViewValue = $tbl_doncaithiendiem->nguoidung_id->CurrentValue;
			$tbl_doncaithiendiem->nguoidung_id->CssStyle = "";
			$tbl_doncaithiendiem->nguoidung_id->CssClass = "";
			$tbl_doncaithiendiem->nguoidung_id->ViewCustomAttributes = "";

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->ViewValue = $tbl_doncaithiendiem->date_time_add->CurrentValue;
			$tbl_doncaithiendiem->date_time_add->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_add->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_add->CssStyle = "";
			$tbl_doncaithiendiem->date_time_add->CssClass = "";
			$tbl_doncaithiendiem->date_time_add->ViewCustomAttributes = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->ViewValue = $tbl_doncaithiendiem->date_time_edit->CurrentValue;
			$tbl_doncaithiendiem->date_time_edit->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_edit->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_edit->CssStyle = "";
			$tbl_doncaithiendiem->date_time_edit->CssClass = "";
			$tbl_doncaithiendiem->date_time_edit->ViewCustomAttributes = "";

			// file_name
			$tbl_doncaithiendiem->file_name->ViewValue = $tbl_doncaithiendiem->file_name->CurrentValue;
			$tbl_doncaithiendiem->file_name->CssStyle = "";
			$tbl_doncaithiendiem->file_name->CssClass = "";
			$tbl_doncaithiendiem->file_name->ViewCustomAttributes = "";

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->HrefValue = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->HrefValue = "";

			// msv
			$tbl_doncaithiendiem->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->HrefValue = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->HrefValue = "";

			// email
			$tbl_doncaithiendiem->email->HrefValue = "";

			// note
			$tbl_doncaithiendiem->note->HrefValue = "";

			// status_email
			$tbl_doncaithiendiem->status_email->HrefValue = "";

			// status
			$tbl_doncaithiendiem->status->HrefValue = "";

			// active
			$tbl_doncaithiendiem->active->HrefValue = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->HrefValue = "";
		} elseif ($tbl_doncaithiendiem->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->EditCustomAttributes = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->EditValue = $tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue;
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssStyle = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssClass = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewCustomAttributes = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->EditCustomAttributes = "";
			$tbl_doncaithiendiem->loaidon_id->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->loaidon_id->CurrentValue);

			// msv
			$tbl_doncaithiendiem->msv->EditCustomAttributes = "";
			$tbl_doncaithiendiem->msv->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->msv->CurrentValue);

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->EditCustomAttributes = "";
			$tbl_doncaithiendiem->hoten_sinhvien->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->hoten_sinhvien->CurrentValue);

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_tao_don->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_doncaithiendiem->ngay_tao_don->CurrentValue, 7));

			// email
			$tbl_doncaithiendiem->email->EditCustomAttributes = "";
			$tbl_doncaithiendiem->email->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->email->CurrentValue);

			// note
			$tbl_doncaithiendiem->note->EditCustomAttributes = "";
			$tbl_doncaithiendiem->note->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->note->CurrentValue);

			// status_email
			$tbl_doncaithiendiem->status_email->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không gửi mail");
			$arwrk[] = array("1", "Gửi mail");
			$arwrk[] = array("2", "Thành công");
			$arwrk[] = array("3", "Không thánh công");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$tbl_doncaithiendiem->status_email->EditValue = $arwrk;

			// status
			$tbl_doncaithiendiem->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xét duyệt");
			$arwrk[] = array("1", "Chờ xét duyệt");
			$arwrk[] = array("2", "Đang xử lý");
			$arwrk[] = array("3", "Kết thúc");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_doncaithiendiem->status->EditValue = $arwrk;

			// active
			$tbl_doncaithiendiem->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			array_unshift($arwrk, array("", "lựa chọn"));
			$tbl_doncaithiendiem->active->EditValue = $arwrk;

			// date_time_edit
			// Edit refer script
			// phieucaithiendiem_id

			$tbl_doncaithiendiem->phieucaithiendiem_id->HrefValue = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->HrefValue = "";

			// msv
			$tbl_doncaithiendiem->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->HrefValue = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->HrefValue = "";

			// email
			$tbl_doncaithiendiem->email->HrefValue = "";

			// note
			$tbl_doncaithiendiem->note->HrefValue = "";

			// status_email
			$tbl_doncaithiendiem->status_email->HrefValue = "";

			// status
			$tbl_doncaithiendiem->status->HrefValue = "";

			// active
			$tbl_doncaithiendiem->active->HrefValue = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_doncaithiendiem->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $tbl_doncaithiendiem;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($tbl_doncaithiendiem->phieucaithiendiem_id->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->loaidon_id->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->msv->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->hoten_sinhvien->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->ngay_tao_don->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->email->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->note->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->status_email->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->status->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->active->MultiUpdate == "1") $lUpdateCnt++;
		if ($tbl_doncaithiendiem->date_time_edit->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "No field selected for update";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($tbl_doncaithiendiem->phieucaithiendiem_id->MultiUpdate <> "") {
			if (!ew_CheckInteger($tbl_doncaithiendiem->phieucaithiendiem_id->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= "Incorrect integer - Phieucaithiendiem Id";
			}
		}
		if ($tbl_doncaithiendiem->loaidon_id->MultiUpdate <> "") {
			if (!ew_CheckInteger($tbl_doncaithiendiem->loaidon_id->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= "Incorrect integer - Loaidon Id";
			}
		}
		

		if ($tbl_doncaithiendiem->status->MultiUpdate <> "" && $tbl_doncaithiendiem->status->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Status";
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
		global $conn, $Security, $tbl_doncaithiendiem;
		$sFilter = $tbl_doncaithiendiem->KeyFilter();
		$tbl_doncaithiendiem->CurrentFilter = $sFilter;
		$sSql = $tbl_doncaithiendiem->SQL();
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

			// Field phieucaithiendiem_id
			if ($tbl_doncaithiendiem->phieucaithiendiem_id->MultiUpdate == "1") {
}

			// Field loaidon_id
			if ($tbl_doncaithiendiem->loaidon_id->MultiUpdate == "1") {
			$tbl_doncaithiendiem->loaidon_id->SetDbValueDef($tbl_doncaithiendiem->loaidon_id->CurrentValue, NULL);
			$rsnew['loaidon_id'] =& $tbl_doncaithiendiem->loaidon_id->DbValue;
			}

			// Field msv
			if ($tbl_doncaithiendiem->msv->MultiUpdate == "1") {
			$tbl_doncaithiendiem->msv->SetDbValueDef($tbl_doncaithiendiem->msv->CurrentValue, NULL);
			$rsnew['msv'] =& $tbl_doncaithiendiem->msv->DbValue;
			}

			// Field hoten_sinhvien
			if ($tbl_doncaithiendiem->hoten_sinhvien->MultiUpdate == "1") {
			$tbl_doncaithiendiem->hoten_sinhvien->SetDbValueDef($tbl_doncaithiendiem->hoten_sinhvien->CurrentValue, NULL);
			$rsnew['hoten_sinhvien'] =& $tbl_doncaithiendiem->hoten_sinhvien->DbValue;
			}

			// Field ngay_tao_don
			if ($tbl_doncaithiendiem->ngay_tao_don->MultiUpdate == "1") {
			$tbl_doncaithiendiem->ngay_tao_don->SetDbValueDef(ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_tao_don->CurrentValue, 7), NULL);
			$rsnew['ngay_tao_don'] =& $tbl_doncaithiendiem->ngay_tao_don->DbValue;
			}

			// Field email
			if ($tbl_doncaithiendiem->email->MultiUpdate == "1") {
			$tbl_doncaithiendiem->email->SetDbValueDef($tbl_doncaithiendiem->email->CurrentValue, NULL);
			$rsnew['email'] =& $tbl_doncaithiendiem->email->DbValue;
			}

			// Field note
			if ($tbl_doncaithiendiem->note->MultiUpdate == "1") {
			$tbl_doncaithiendiem->note->SetDbValueDef($tbl_doncaithiendiem->note->CurrentValue, NULL);
			$rsnew['note'] =& $tbl_doncaithiendiem->note->DbValue;
			}

			// Field status_email
			if ($tbl_doncaithiendiem->status_email->MultiUpdate == "1") {
			$tbl_doncaithiendiem->status_email->SetDbValueDef($tbl_doncaithiendiem->status_email->CurrentValue, NULL);
			$rsnew['status_email'] =& $tbl_doncaithiendiem->status_email->DbValue;
                        if ($tbl_doncaithiendiem->status_email->CurrentValue == '1')
                          {
	                                $tensv =  $rs->fields('hoten_sinhvien');
                                        $ma_sv =  $rs->fields('msv');
                                        $ngaytaodon = $rs->fields('ngay_tao_don');
                                        $subject = $tensv." MSV:".$ma_sv." Ngày tạo đơn:".$ngaytaodon;
                                        $noidung =$tbl_doncaithiendiem->note->CurrentValue;
                                        $sEmail = $tbl_doncaithiendiem->email->CurrentValue;
                                        $bEmailSent = FALSE;
                                         $bValidEmail = FALSE;
                                         if ($sEmail <> '' && $sEmail <> null) $bValidEmail = TRUE;
                                        
						if ($bValidEmail) {
						$Email = new cEmail();
						$Email->Load("txt/doncaithiendiem.txt");
						$Email->ReplaceSender(EW_SENDER_EMAIL); // Replace Sender
						$Email->ReplaceRecipient($sEmail); // Replace Recipient
                                                $Email->ReplaceSubject(strval($subject));
						$Email->ReplaceContent('<!--$Noidung-->', $noidung);
						$Args = array();
						$Args["rs"] =& $rsnew;
						if ($this->Email_Sending($Email, $Args))
						   {  
							$bEmailSent = $Email->Send();
						   }
						}
						if ($bEmailSent) {
							$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Thông báo từ văn phòng hỗ trợ sinh viên đã được gửi đến Email của bạn</font></div>"); // Set success message
							//$this->Page_Terminate("login.php"); // Return to login page
						} elseif ($bValidEmail) {
							$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Lỗi khi gửi email</font></div>"); // Set up error message
						}	
										
												  

					     }
					
				}
			

			// Field status
			if ($tbl_doncaithiendiem->status->MultiUpdate == "1") {
			$tbl_doncaithiendiem->status->SetDbValueDef($tbl_doncaithiendiem->status->CurrentValue, NULL);
			$rsnew['status'] =& $tbl_doncaithiendiem->status->DbValue;
			}

			// Field active
			if ($tbl_doncaithiendiem->active->MultiUpdate == "1") {
			$tbl_doncaithiendiem->active->SetDbValueDef($tbl_doncaithiendiem->active->CurrentValue, NULL);
			$rsnew['active'] =& $tbl_doncaithiendiem->active->DbValue;
			}

			// Field date_time_edit
			if ($tbl_doncaithiendiem->date_time_edit->MultiUpdate == "1") {
			$tbl_doncaithiendiem->date_time_edit->SetDbValueDef(ew_CurrentTime(), NULL);
			$rsnew['date_time_edit'] =& $tbl_doncaithiendiem->date_time_edit->DbValue;
			}
			

			// Call Row Updating event
			$bUpdateRow = $tbl_doncaithiendiem->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($tbl_doncaithiendiem->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_doncaithiendiem->CancelMessage <> "") {
					$this->setMessage($tbl_doncaithiendiem->CancelMessage);
					$tbl_doncaithiendiem->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_doncaithiendiem->Row_Updated($rsold, $rsnew);
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
        	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
