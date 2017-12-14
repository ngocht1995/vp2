<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_careerinfo.php" ?>
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
$Nganhnghe_edit = new cNganhnghe_edit();
$Page =& $Nganhnghe_edit;

// Page init processing
$Nganhnghe_edit->Page_Init();

// Page main processing
$Nganhnghe_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var Nganhnghe_edit = new ew_Page("Nganhnghe_edit");

// page properties
Nganhnghe_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = Nganhnghe_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
Nganhnghe_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_nganhnghe_ten"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Nganhnghe Ten");
		elm = fobj.elements["x" + infix + "_nganhnghe_pic"];
		aelm = fobj.elements["a" + infix + "_nganhnghe_pic"];
		var chk_nganhnghe_pic = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_nganhnghe_pic && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Nganhnghe Pic");
		elm = fobj.elements["x" + infix + "_nganhnghe_pic"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
Nganhnghe_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
Nganhnghe_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Nganhnghe_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $Nganhnghe->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa nhóm ngành nghề</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $Nganhnghe_edit->ShowMessage() ?>
<form name="fNganhngheedit" id="fNganhngheedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return Nganhnghe_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="Nganhnghe">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($Nganhnghe->nganhnghe_ten->Visible) { // nganhnghe_ten ?>
	<tr<?php echo $Nganhnghe->nganhnghe_ten->RowAttributes ?>>
		<td class="ewTableHeader">Tên nhóm ngành<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Nganhnghe->nganhnghe_ten->CellAttributes() ?>><span id="el_nganhnghe_ten">
<input type="text" name="x_nganhnghe_ten" id="x_nganhnghe_ten" size="80" value="<?php echo $Nganhnghe->nganhnghe_ten->EditValue ?>"<?php echo $Nganhnghe->nganhnghe_ten->EditAttributes() ?>>
</span><?php echo $Nganhnghe->nganhnghe_ten->CustomMsg ?></td>
	</tr>
<?php } ?>
                <?php if ($Nganhnghe->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $Nganhnghe->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự sắp xếp<span class="ewRequired"></span></td>
		<td<?php echo $Nganhnghe->thutu_sapxep->CellAttributes() ?>><span id="el_thutu_sapxep">
<input type="text" name="x_thutu_sapxep" id="x_thutu_sapxep" size="10" value="<?php echo $Nganhnghe->thutu_sapxep->EditValue ?>"<?php echo $Nganhnghe->thutu_sapxep->EditAttributes() ?>>
</span><?php echo $Nganhnghe->thutu_sapxep->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Nganhnghe->nganhnghe_pic->Visible) { // nganhnghe_pic ?>
	<tr<?php echo $Nganhnghe->nganhnghe_pic->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Nganhnghe->nganhnghe_pic->CellAttributes() ?>><span id="el_nganhnghe_pic">
<div id="old_x_nganhnghe_pic">
<?php if ($Nganhnghe->nganhnghe_pic->HrefValue <> "") { ?>
<?php if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) { ?>
<a href="<?php echo $Nganhnghe->nganhnghe_pic->HrefValue ?>" target="_blank"><img src="manager_career_pic_bv.php?nganhnghe_id=<?php echo $Nganhnghe->nganhnghe_id->CurrentValue ?>" border=0<?php echo $Nganhnghe->nganhnghe_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($Nganhnghe->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="manager_career_pic_bv.php?nganhnghe_id=<?php echo $Nganhnghe->nganhnghe_id->CurrentValue ?>" border=0<?php echo $Nganhnghe->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($Nganhnghe->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_nganhnghe_pic">
<?php if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) { ?>
<input type="radio" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="1" checked="checked">Bỏ qua&nbsp;
<input type="radio" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="2" disabled="disabled">Xóa&nbsp;
<input type="radio" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="3">
<?php } ?>
<input type="file" name="x_nganhnghe_pic" id="x_nganhnghe_pic" size="30" onchange="if (this.form.a_nganhnghe_pic[2]) this.form.a_nganhnghe_pic[2].checked=true;"<?php echo $Nganhnghe->nganhnghe_pic->EditAttributes() ?>>
</div>
</span><?php echo $Nganhnghe->nganhnghe_pic->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($Nganhnghe->show_status->Visible) { // show_status ?>
	<tr<?php echo $Nganhnghe->show_status->RowAttributes ?>>
		<td class="ewTableHeader">Vị trí hiển thị<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Nganhnghe->show_status->CellAttributes() ?>><span id="el_show_status">
<select id="x_show_status" name="x_show_status"<?php echo $Nganhnghe->show_status->EditAttributes() ?>>
<?php
if (is_array($Nganhnghe->show_status->EditValue)) {
	$arwrk = $Nganhnghe->show_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($Nganhnghe->show_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $Nganhnghe->show_status->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_nganhnghe_id" id="x_nganhnghe_id" value="<?php echo ew_HtmlEncode($Nganhnghe->nganhnghe_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="   Sửa   ">
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
class cNganhnghe_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'Nganhnghe';

	// Page Object Name
	var $PageObjName = 'Nganhnghe_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Nganhnghe;
		if ($Nganhnghe->UseTokenInUrl) $PageUrl .= "t=" . $Nganhnghe->TableVar . "&"; // add page token
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
		global $objForm, $Nganhnghe;
		if ($Nganhnghe->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Nganhnghe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Nganhnghe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cNganhnghe_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["Nganhnghe"] = new cNganhnghe();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Nganhnghe', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Nganhnghe;
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
			$this->Page_Terminate("manager_careerlist.php");
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

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $Nganhnghe;

		// Load key from QueryString
		if (@$_GET["nganhnghe_id"] <> "")
			$Nganhnghe->nganhnghe_id->setQueryStringValue($_GET["nganhnghe_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$Nganhnghe->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$Nganhnghe->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$Nganhnghe->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($Nganhnghe->nganhnghe_id->CurrentValue == "")
			$this->Page_Terminate("manager_careerlist.php"); // Invalid key, return to list
		switch ($Nganhnghe->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("manager_careerlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$Nganhnghe->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Đã sửa"); // Update success
					$sReturnUrl = $Nganhnghe->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "Nganhngheview.php")
						$sReturnUrl = $Nganhnghe->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$Nganhnghe->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $Nganhnghe;

		// Get upload data
			if ($Nganhnghe->nganhnghe_pic->Upload->UploadFile()) {

				// No action required
			} else {
				echo $Nganhnghe->nganhnghe_pic->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $Nganhnghe;
		$Nganhnghe->nganhnghe_ten->setFormValue($objForm->GetValue("x_nganhnghe_ten"));
		$Nganhnghe->nganhnghe_id->setFormValue($objForm->GetValue("x_nganhnghe_id"));
                $Nganhnghe->show_status->setFormValue($objForm->GetValue("x_show_status"));
                $Nganhnghe->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $Nganhnghe;
		$Nganhnghe->nganhnghe_id->CurrentValue = $Nganhnghe->nganhnghe_id->FormValue;
		$this->LoadRow();
		$Nganhnghe->nganhnghe_ten->CurrentValue = $Nganhnghe->nganhnghe_ten->FormValue;
                $Nganhnghe->thutu_sapxep->CurrentValue = $Nganhnghe->thutu_sapxep->FormValue;
                $Nganhnghe->show_status->CurrentValue = $Nganhnghe->show_status->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Nganhnghe;
		$sFilter = $Nganhnghe->KeyFilter();

		// Call Row Selecting event
		$Nganhnghe->Row_Selecting($sFilter);

		// Load sql based on filter
		$Nganhnghe->CurrentFilter = $sFilter;
		$sSql = $Nganhnghe->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Nganhnghe->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Nganhnghe;
		$Nganhnghe->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$Nganhnghe->nganhnghe_ten->setDbValue($rs->fields('nganhnghe_ten'));
		$Nganhnghe->nganhnghe_pic->Upload->DbValue = $rs->fields('nganhnghe_pic');
		$Nganhnghe->nganhnghe_belongto->setDbValue($rs->fields('nganhnghe_belongto'));
                $Nganhnghe->show_status->setDbValue($rs->fields('show_status'));
                $Nganhnghe->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Nganhnghe;

		// Call Row_Rendering event
		$Nganhnghe->Row_Rendering();

		// Common render codes for all row types
		// nganhnghe_ten

		$Nganhnghe->nganhnghe_ten->CellCssStyle = "";
		$Nganhnghe->nganhnghe_ten->CellCssClass = "";

		// nganhnghe_pic
		$Nganhnghe->nganhnghe_pic->CellCssStyle = "";
		$Nganhnghe->nganhnghe_pic->CellCssClass = "";
                // show_status
		$Nganhnghe->show_status->CellCssStyle = "";
		$Nganhnghe->show_status->CellCssClass = "";
                // thutu_sapxep

		$Nganhnghe->thutu_sapxep->CellCssStyle = "";
		$Nganhnghe->thutu_sapxep->CellCssClass = "";
		if ($Nganhnghe->RowType == EW_ROWTYPE_VIEW) { // View row

			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->ViewValue = $Nganhnghe->nganhnghe_ten->CurrentValue;
			$Nganhnghe->nganhnghe_ten->CssStyle = "";
			$Nganhnghe->nganhnghe_ten->CssClass = "";
			$Nganhnghe->nganhnghe_ten->ViewCustomAttributes = "";

			// nganhnghe_pic
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->ViewValue = "Nganhnghe Pic";
				$Nganhnghe->nganhnghe_pic->ImageAlt = "";
			} else {
				$Nganhnghe->nganhnghe_pic->ViewValue = "";
			}
			$Nganhnghe->nganhnghe_pic->CssStyle = "";
			$Nganhnghe->nganhnghe_pic->CssClass = "";
			$Nganhnghe->nganhnghe_pic->ViewCustomAttributes = "";
                        // thutu_sapxep
			$Nganhnghe->ten_chuyenmuc->HrefValue = "";

                        $Nganhnghe->thutu_sapxep->ViewValue = $Nganhnghe->thutu_sapxep->CurrentValue;
			$Nganhnghe->thutu_sapxep->CssStyle = "";
			$Nganhnghe->thutu_sapxep->CssClass = "";
			$Nganhnghe->thutu_sapxep->ViewCustomAttributes = "";
                        // show_status
                        $Nganhnghe->show_status->CellCssStyle = "";
                        $Nganhnghe->show_status->CellCssClass = "";
			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->HrefValue = "manager_career_pic_bv.php?nganhnghe_id=" . $Nganhnghe->nganhnghe_id->CurrentValue;
				if ($Nganhnghe->Export <> "") $Nganhnghe->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($Nganhnghe->nganhnghe_pic->HrefValue);
			} else {
				$Nganhnghe->nganhnghe_pic->HrefValue = "";
			}
                        $Nganhnghe->show_status->HrefValue = "";
		} elseif ($Nganhnghe->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->EditCustomAttributes = "";
			$Nganhnghe->nganhnghe_ten->EditValue = ew_HtmlEncode($Nganhnghe->nganhnghe_ten->CurrentValue);

			// nganhnghe_pic
			$Nganhnghe->nganhnghe_pic->EditCustomAttributes = "";
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->EditValue = "Nganhnghe Pic";
				$Nganhnghe->nganhnghe_pic->ImageAlt = "";
			} else {
				$Nganhnghe->nganhnghe_pic->EditValue = "";
			}

			// Edit refer script
			// nganhnghe_ten

			$Nganhnghe->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->HrefValue = "manager_career_pic_bv.php?nganhnghe_id=" . $Nganhnghe->nganhnghe_id->CurrentValue;
				if ($Nganhnghe->Export <> "") $Nganhnghe->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($Nganhnghe->nganhnghe_pic->HrefValue);
			} else {
				$Nganhnghe->nganhnghe_pic->HrefValue = "";
			}
                         // thutu_sapxep
			$Nganhnghe->thutu_sapxep->EditCustomAttributes = "";
			$Nganhnghe->thutu_sapxep->EditValue = ew_HtmlEncode($Nganhnghe->thutu_sapxep->CurrentValue);
                        // show_status
			$Nganhnghe->show_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không hiển thị trên trang chủ");
			$arwrk[] = array("1", "Hiển thị trên trang chủ");
			array_unshift($arwrk, array("", "Chọn"));
			$Nganhnghe->show_status->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$Nganhnghe->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $Nganhnghe;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($Nganhnghe->nganhnghe_pic->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($Nganhnghe->nganhnghe_pic->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($Nganhnghe->nganhnghe_pic->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($Nganhnghe->nganhnghe_ten->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nganhnghe Ten";
		}
		if ($Nganhnghe->nganhnghe_pic->Upload->Action == "3" && is_null($Nganhnghe->nganhnghe_pic->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nganhnghe Pic";
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
		global $conn, $Security, $Nganhnghe;
		$sFilter = $Nganhnghe->KeyFilter();
		$Nganhnghe->CurrentFilter = $sFilter;
		$sSql = $Nganhnghe->SQL();
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

			// Field nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->SetDbValueDef($Nganhnghe->nganhnghe_ten->CurrentValue, "");
			$rsnew['nganhnghe_ten'] =& $Nganhnghe->nganhnghe_ten->DbValue;

			// Field nganhnghe_pic
			$Nganhnghe->nganhnghe_pic->Upload->SaveToSession(); // Save file value to Session
			if ($Nganhnghe->nganhnghe_pic->Upload->Action == "2" || $Nganhnghe->nganhnghe_pic->Upload->Action == "3") { // Update/Remove
			if (is_null($Nganhnghe->nganhnghe_pic->Upload->Value)) {
				$rsnew['nganhnghe_pic'] = NULL;	
			} else {
				$rsnew['nganhnghe_pic'] = $Nganhnghe->nganhnghe_pic->Upload->Value;
			}
			}
                        // Field show_status
			$Nganhnghe->show_status->SetDbValueDef($Nganhnghe->show_status->CurrentValue, 0);
			$rsnew['show_status'] =& $Nganhnghe->show_status->DbValue;
                        // Field thutu_sapxep
			$Nganhnghe->thutu_sapxep->SetDbValueDef($Nganhnghe->thutu_sapxep->CurrentValue, 0);
			$rsnew['thutu_sapxep'] =& $Nganhnghe->thutu_sapxep->DbValue;

			// Call Row Updating event
			$bUpdateRow = $Nganhnghe->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field nganhnghe_pic
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($Nganhnghe->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($Nganhnghe->CancelMessage <> "") {
					$this->setMessage($Nganhnghe->CancelMessage);
					$Nganhnghe->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$Nganhnghe->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field nganhnghe_pic
		$Nganhnghe->nganhnghe_pic->Upload->RemoveFromSession(); // Remove file value from Session
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
