<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersRegisteredinfo.php" ?>
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
$UsersRegistered_update = new cUsersRegistered_update();
$Page =& $UsersRegistered_update;

// Page init processing
$UsersRegistered_update->Page_Init();

// Page main processing
$UsersRegistered_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var UsersRegistered_update = new ew_Page("UsersRegistered_update");

// page properties
UsersRegistered_update.PageID = "update"; // page ID
var EW_PAGE_ID = UsersRegistered_update.PageID; // for backward compatibility

// extend page with ValidateForm function
UsersRegistered_update.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_xacthuc_boisan"];
		uelm = fobj.elements["u" + infix + "_xacthuc_boisan"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Xacthuc Boisan");
		}
		elm = fobj.elements["x" + infix + "_thanhvien_tieubieu"];
		uelm = fobj.elements["u" + infix + "_thanhvien_tieubieu"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Thanhvien Tieubieu");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
UsersRegistered_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersRegistered_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersRegistered_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersRegistered_update.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<a href="<?php echo $UsersRegistered->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Kích hoạt thành viên</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table><br>

<?php $UsersRegistered_update->ShowMessage() ?>
<form name="fUsersRegisteredupdate" id="fUsersRegisteredupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return UsersRegistered_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="UsersRegistered">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $UsersRegistered_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($UsersRegistered_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td>Chọn<input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td>Đối tượng</td>
		<td>Giá trị</td>
	</tr>
<?php if ($UsersRegistered->xacthuc_boisan->Visible) { // xacthuc_boisan ?>
	<tr<?php echo $UsersRegistered->xacthuc_boisan->RowAttributes ?>>
		<td<?php echo $UsersRegistered->xacthuc_boisan->CellAttributes() ?>>
<input type="checkbox" name="u_xacthuc_boisan" id="u_xacthuc_boisan" value="1"<?php echo ($UsersRegistered->xacthuc_boisan->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $UsersRegistered->xacthuc_boisan->CellAttributes() ?>>Xác thực bởi sàn</td>
		<td<?php echo $UsersRegistered->xacthuc_boisan->CellAttributes() ?>><span id="el_xacthuc_boisan">
<select id="x_xacthuc_boisan" name="x_xacthuc_boisan"<?php echo $UsersRegistered->xacthuc_boisan->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->xacthuc_boisan->EditValue)) {
	$arwrk = $UsersRegistered->xacthuc_boisan->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->xacthuc_boisan->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $UsersRegistered->xacthuc_boisan->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UsersRegistered->UserLevelID->RowAttributes ?>>
		<td<?php echo $UsersRegistered->UserLevelID->CellAttributes() ?>>
<input type="checkbox" name="u_UserLevelID" id="u_UserLevelID" value="1"<?php echo ($UsersRegistered->UserLevelID->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $UsersRegistered->UserLevelID->CellAttributes() ?>>Cấp bậc</td>
		<td<?php echo $UsersRegistered->UserLevelID->CellAttributes() ?>><span id="el_UserLevelID">
<select id="x_UserLevelID" name="x_UserLevelID"<?php echo $UsersRegistered->UserLevelID->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->UserLevelID->EditValue)) {
	$arwrk = $UsersRegistered->UserLevelID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->UserLevelID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php
$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld FROM `userlevels`";
$sWhereWrk = "`UserLevelID` IN (6,3,4,5)";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_UserLevelID" id="s_x_UserLevelID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_UserLevelID" id="lft_x_UserLevelID" value="">
</span><?php echo $UsersRegistered->UserLevelID->CustomMsg ?></td>
	</tr>
<?php } ?>
        
<?php if ($UsersRegistered->thanhvien_tieubieu->Visible) { // thanhvien_tieubieu ?>
	<tr<?php echo $UsersRegistered->thanhvien_tieubieu->RowAttributes ?>>
		<td<?php echo $UsersRegistered->thanhvien_tieubieu->CellAttributes() ?>>
<input type="checkbox" name="u_thanhvien_tieubieu" id="u_thanhvien_tieubieu" value="1"<?php echo ($UsersRegistered->thanhvien_tieubieu->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $UsersRegistered->thanhvien_tieubieu->CellAttributes() ?>>Thành viên tiêu biểu</td>
		<td<?php echo $UsersRegistered->thanhvien_tieubieu->CellAttributes() ?>><span id="el_thanhvien_tieubieu">
<select id="x_thanhvien_tieubieu" name="x_thanhvien_tieubieu"<?php echo $UsersRegistered->thanhvien_tieubieu->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->thanhvien_tieubieu->EditValue)) {
	$arwrk = $UsersRegistered->thanhvien_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->thanhvien_tieubieu->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $UsersRegistered->thanhvien_tieubieu->CustomMsg ?></td>
	</tr>
<?php } ?>
        
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  Kích hoạt  ">
</form>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_UserLevelID','x_UserLevelID',false]
]);

//-->
</script>
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
class cUsersRegistered_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'UsersRegistered';

	// Page Object Name
	var $PageObjName = 'UsersRegistered_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) $PageUrl .= "t=" . $UsersRegistered->TableVar . "&"; // add page token
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
		global $objForm, $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersRegistered->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersRegistered->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersRegistered_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersRegistered"] = new cUsersRegistered();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersRegistered', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersRegistered;
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
			$this->Page_Terminate("UsersRegisteredlist.php");
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
		global $objForm, $gsFormError, $UsersRegistered;

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
				$UsersRegistered->CurrentAction = $_POST["a_update"];

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
					$UsersRegistered->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("UsersRegisteredlist.php"); // No records selected, return to list
		switch ($UsersRegistered->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Đã kích hoạt"); // Set update success message
					$this->Page_Terminate($UsersRegistered->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$UsersRegistered->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $UsersRegistered;
		$UsersRegistered->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$UsersRegistered->xacthuc_boisan->setDbValue($rs->fields('xacthuc_boisan'));
				$UsersRegistered->thanhvien_tieubieu->setDbValue($rs->fields('thanhvien_tieubieu'));
                                $UsersRegistered->UserLevelID->setDbValue($rs->fields('UserLevelID'));
			} else {
				if (!ew_CompareValue($UsersRegistered->xacthuc_boisan->DbValue, $rs->fields('xacthuc_boisan')))
					$UsersRegistered->xacthuc_boisan->CurrentValue = NULL;
				if (!ew_CompareValue($UsersRegistered->thanhvien_tieubieu->DbValue, $rs->fields('thanhvien_tieubieu')))
					$UsersRegistered->thanhvien_tieubieu->CurrentValue = NULL;
                                if (!ew_CompareValue($UsersRegistered->UserLevelID->DbValue, $rs->fields('UserLevelID')))
					$UsersRegistered->UserLevelID->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $UsersRegistered;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $UsersRegistered->KeyFilter();
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
		global $UsersRegistered;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$UsersRegistered->nguoidung_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $UsersRegistered;
		$conn->BeginTrans();

		// Get old recordset
		$UsersRegistered->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $UsersRegistered->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$UsersRegistered->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $UsersRegistered;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $UsersRegistered;
		$UsersRegistered->xacthuc_boisan->setFormValue($objForm->GetValue("x_xacthuc_boisan"));
		$UsersRegistered->xacthuc_boisan->MultiUpdate = $objForm->GetValue("u_xacthuc_boisan");
		$UsersRegistered->thanhvien_tieubieu->setFormValue($objForm->GetValue("x_thanhvien_tieubieu"));
		$UsersRegistered->thanhvien_tieubieu->MultiUpdate = $objForm->GetValue("u_thanhvien_tieubieu");
                $UsersRegistered->UserLevelID->setFormValue($objForm->GetValue("x_UserLevelID"));
		$UsersRegistered->UserLevelID->MultiUpdate = $objForm->GetValue("u_UserLevelID");
		$UsersRegistered->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $UsersRegistered;
		$UsersRegistered->nguoidung_id->CurrentValue = $UsersRegistered->nguoidung_id->FormValue;
		$UsersRegistered->xacthuc_boisan->CurrentValue = $UsersRegistered->xacthuc_boisan->FormValue;
		$UsersRegistered->thanhvien_tieubieu->CurrentValue = $UsersRegistered->thanhvien_tieubieu->FormValue;
                $UsersRegistered->UserLevelID->CurrentValue = $UsersRegistered->UserLevelID->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UsersRegistered;

		// Call Recordset Selecting event
		$UsersRegistered->Recordset_Selecting($UsersRegistered->CurrentFilter);

		// Load list page SQL
		$sSql = $UsersRegistered->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UsersRegistered->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersRegistered;

		// Call Row_Rendering event
		$UsersRegistered->Row_Rendering();

		// Common render codes for all row types
		// xacthuc_boisan

		$UsersRegistered->xacthuc_boisan->CellCssStyle = "";
		$UsersRegistered->xacthuc_boisan->CellCssClass = "";

		// thanhvien_tieubieu
		$UsersRegistered->thanhvien_tieubieu->CellCssStyle = "";
		$UsersRegistered->thanhvien_tieubieu->CellCssClass = "";

                // UserLevelID
		$UsersRegistered->UserLevelID->CellCssStyle = "";
		$UsersRegistered->UserLevelID->CellCssClass = "";
		if ($UsersRegistered->RowType == EW_ROWTYPE_VIEW) { // View row

			// xacthuc_boisan
			if (strval($UsersRegistered->xacthuc_boisan->CurrentValue) <> "") {
				switch ($UsersRegistered->xacthuc_boisan->CurrentValue) {
					case "0":
						$UsersRegistered->xacthuc_boisan->ViewValue = "Không xác thực bởi sàn";
						break;
					case "1":
						$UsersRegistered->xacthuc_boisan->ViewValue = "Xác thực bởi sàn";
						break;
					default:
						$UsersRegistered->xacthuc_boisan->ViewValue = $UsersRegistered->xacthuc_boisan->CurrentValue;
				}
			} else {
				$UsersRegistered->xacthuc_boisan->ViewValue = NULL;
			}
			$UsersRegistered->xacthuc_boisan->CssStyle = "";
			$UsersRegistered->xacthuc_boisan->CssClass = "";
			$UsersRegistered->xacthuc_boisan->ViewCustomAttributes = "";

			// thanhvien_tieubieu
			if (strval($UsersRegistered->thanhvien_tieubieu->CurrentValue) <> "") {
				switch ($UsersRegistered->thanhvien_tieubieu->CurrentValue) {
					case "0":
						$UsersRegistered->thanhvien_tieubieu->ViewValue = "Không là thành viên tiêu biểu";
						break;
					case "1":
						$UsersRegistered->thanhvien_tieubieu->ViewValue = "Là thành viên tiêu biểu";
						break;
					default:
						$UsersRegistered->thanhvien_tieubieu->ViewValue = $UsersRegistered->thanhvien_tieubieu->CurrentValue;
				}
			} else {
				$UsersRegistered->thanhvien_tieubieu->ViewValue = NULL;
			}
			$UsersRegistered->thanhvien_tieubieu->CssStyle = "";
			$UsersRegistered->thanhvien_tieubieu->CssClass = "";
			$UsersRegistered->thanhvien_tieubieu->ViewCustomAttributes = "";

                       	// UserLevelID
			if (strval($UsersRegistered->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersRegistered->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersRegistered->UserLevelID->ViewValue = $UsersRegistered->UserLevelID->CurrentValue;
				}
			} else {
				$UsersRegistered->UserLevelID->ViewValue = NULL;
			}
			$UsersRegistered->UserLevelID->CssStyle = "";
			$UsersRegistered->UserLevelID->CssClass = "";
			$UsersRegistered->UserLevelID->ViewCustomAttributes = "";

			// xacthuc_boisan
			$UsersRegistered->xacthuc_boisan->HrefValue = "";

			// thanhvien_tieubieu
			$UsersRegistered->thanhvien_tieubieu->HrefValue = "";

                        // UserLevelID
			$UsersRegistered->UserLevelID->HrefValue = "";
		} elseif ($UsersRegistered->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// xacthuc_boisan
			$UsersRegistered->xacthuc_boisan->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xác thực bởi sàn");
			$arwrk[] = array("1", "Xác thực bởi sàn");
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->xacthuc_boisan->EditValue = $arwrk;

			// thanhvien_tieubieu
			$UsersRegistered->thanhvien_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không là thành viên tiêu biểu");
			$arwrk[] = array("1", "Là thành viên tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->thanhvien_tieubieu->EditValue = $arwrk;

                        // UserLevelID
			$UsersRegistered->UserLevelID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			if (trim(strval($UsersRegistered->UserLevelID->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "(`UserLevelID` <> -1)";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->UserLevelID->EditValue = $arwrk;

			// Edit refer script
			// xacthuc_boisan

			$UsersRegistered->xacthuc_boisan->HrefValue = "";

			// thanhvien_tieubieu
			$UsersRegistered->thanhvien_tieubieu->HrefValue = "";

                        // UserLevelID
			$UsersRegistered->UserLevelID->HrefValue = "";
		}

		// Call Row Rendered event
		$UsersRegistered->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $UsersRegistered;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($UsersRegistered->xacthuc_boisan->MultiUpdate == "1") $lUpdateCnt++;
		if ($UsersRegistered->thanhvien_tieubieu->MultiUpdate == "1") $lUpdateCnt++;
                if ($UsersRegistered->UserLevelID->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "Không có bản ghi được chọn";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($UsersRegistered->xacthuc_boisan->MultiUpdate <> "" && $UsersRegistered->xacthuc_boisan->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Xacthuc Boisan";
		}
		if ($UsersRegistered->thanhvien_tieubieu->MultiUpdate <> "" && $UsersRegistered->thanhvien_tieubieu->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Thanhvien Tieubieu";
		}*/

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
		global $conn, $Security, $UsersRegistered;
		$sFilter = $UsersRegistered->KeyFilter();
			if ($UsersRegistered->tendangnhap->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(tendangnhap = '" . ew_AdjustSql($UsersRegistered->tendangnhap->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$UsersRegistered->CurrentFilter = $sFilterChk;
			$sSqlChk = $UsersRegistered->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "tendangnhap", "Duplicate value '%v' for unique index '%f'");
				$sIdxErrMsg = str_replace("%v", $UsersRegistered->tendangnhap->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);				
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$UsersRegistered->CurrentFilter = $sFilter;
		$sSql = $UsersRegistered->SQL();
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

			// Field xacthuc_boisan
			if ($UsersRegistered->xacthuc_boisan->MultiUpdate == "1") {
			$UsersRegistered->xacthuc_boisan->SetDbValueDef($UsersRegistered->xacthuc_boisan->CurrentValue, 0);
			$rsnew['xacthuc_boisan'] =& $UsersRegistered->xacthuc_boisan->DbValue;
			}

			// Field thanhvien_tieubieu
			if ($UsersRegistered->thanhvien_tieubieu->MultiUpdate == "1") {
			$UsersRegistered->thanhvien_tieubieu->SetDbValueDef($UsersRegistered->thanhvien_tieubieu->CurrentValue, 0);
			$rsnew['thanhvien_tieubieu'] =& $UsersRegistered->thanhvien_tieubieu->DbValue;
			}
                        // Field UserLevelID
                        if ($UsersRegistered->UserLevelID->MultiUpdate == "1") {
			$UsersRegistered->UserLevelID->SetDbValueDef($UsersRegistered->UserLevelID->CurrentValue, 4);
			$rsnew['UserLevelID'] =& $UsersRegistered->UserLevelID->DbValue;
                        }

			// Call Row Updating event
			$bUpdateRow = $UsersRegistered->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($UsersRegistered->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($UsersRegistered->CancelMessage <> "") {
					$this->setMessage($UsersRegistered->CancelMessage);
					$UsersRegistered->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$UsersRegistered->Row_Updated($rsold, $rsnew);
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
