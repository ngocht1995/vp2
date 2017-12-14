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
$Nganhnghe_add = new cNganhnghe_add();
$Page =& $Nganhnghe_add;

// Page init processing
$Nganhnghe_add->Page_Init();

// Page main processing
$Nganhnghe_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var Nganhnghe_add = new ew_Page("Nganhnghe_add");

// page properties
Nganhnghe_add.PageID = "add"; // page ID
var EW_PAGE_ID = Nganhnghe_add.PageID; // for backward compatibility

// extend page with ValidateForm function
Nganhnghe_add.ValidateForm = function(fobj) {
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
Nganhnghe_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
Nganhnghe_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Nganhnghe_add.ValidateRequired = false; // no JavaScript validation
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
								&nbsp;&nbsp;&nbsp;Thêm nhóm ngành nghề</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $Nganhnghe_add->ShowMessage() ?>
<form name="fNganhngheadd" id="fNganhngheadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return Nganhnghe_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="Nganhnghe">
<input type="hidden" name="a_add" id="a_add" value="A">
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
<input type="file" name="x_nganhnghe_pic" id="x_nganhnghe_pic" size="30"<?php echo $Nganhnghe->nganhnghe_pic->EditAttributes() ?>>
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
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Thêm    ">
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
class cNganhnghe_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'Nganhnghe';

	// Page Object Name
	var $PageObjName = 'Nganhnghe_add';

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
	function cNganhnghe_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["Nganhnghe"] = new cNganhnghe();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

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
		if (!$Security->CanAdd()) {
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
	var $x_ewPriv = 0;

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $Nganhnghe;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["nganhnghe_id"] != "") {
		  $Nganhnghe->nganhnghe_id->setQueryStringValue($_GET["nganhnghe_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $Nganhnghe->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$Nganhnghe->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $Nganhnghe->CurrentAction = "C"; // Copy Record
		  } else {
		    $Nganhnghe->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($Nganhnghe->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("manager_careerlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$Nganhnghe->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Đã thêm"); // Set up success message
					$sReturnUrl = $Nganhnghe->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "Nganhngheview.php")
						$sReturnUrl = $Nganhnghe->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$Nganhnghe->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
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

	// Load default values
	function LoadDefaultValues() {
		global $Nganhnghe;
                $Nganhnghe->show_status->CurrentValue = 0;
                $Nganhnghe->thutu_sapxep->CurrentValue = 0;
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
		$Nganhnghe->nganhnghe_ten->CurrentValue = $Nganhnghe->nganhnghe_ten->FormValue;
                $Nganhnghe->show_status->CurrentValue = $Nganhnghe->show_status->FormValue;
                $Nganhnghe->ten_chuyenmuc->CurrentValue = $Nganhnghe->ten_chuyenmuc->FormValue;
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
                        // show_status
			if (strval($Nganhnghe->show_status->CurrentValue) <> "") {
				switch ($Nganhnghe->show_status->CurrentValue) {
					case "0":
						$Nganhnghe->show_status->ViewValue = "Không hiển thị trên trang chủ";
						break;
					case "1":
						$Nganhnghe->show_status->ViewValue = "Hiển thị trên trang chủ";
						break;
					default:
						$Nganhnghe->show_status->ViewValue = $Nganhnghe->show_status->CurrentValue;
				}
			} else {
				$Nganhnghe->show_status->ViewValue = NULL;
			}
			$Nganhnghe->show_status->CssStyle = "";
			$Nganhnghe->show_status->CssClass = "";
			$Nganhnghe->show_status->ViewCustomAttributes = "";
                         $Nganhnghe->thutu_sapxep->ViewValue = $Nganhnghe->thutu_sapxep->CurrentValue;
			$Nganhnghe->thutu_sapxep->CssStyle = "";
			$Nganhnghe->thutu_sapxep->CssClass = "";
			$Nganhnghe->thutu_sapxep->ViewCustomAttributes = "";

			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->HrefValue = "";
                         // thutu_sapxep
			$Nganhnghe->ten_chuyenmuc->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->HrefValue = "manager_career_pic_bv.php?nganhnghe_id=" . $Nganhnghe->nganhnghe_id->CurrentValue;
				if ($Nganhnghe->Export <> "") $Nganhnghe->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($Nganhnghe->nganhnghe_pic->HrefValue);
			} else {
				$Nganhnghe->nganhnghe_pic->HrefValue = "";
			}
                        // show_status
			$Nganhnghe->show_status->HrefValue = "";
		} elseif ($Nganhnghe->RowType == EW_ROWTYPE_ADD) { // Add row

			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->EditCustomAttributes = "";
			$Nganhnghe->nganhnghe_ten->EditValue = ew_HtmlEncode($Nganhnghe->nganhnghe_ten->CurrentValue);
                        // thutu_sapxep
			$Nganhnghe->thutu_sapxep->EditCustomAttributes = "";
			$Nganhnghe->thutu_sapxep->EditValue = ew_HtmlEncode($Nganhnghe->thutu_sapxep->CurrentValue);

			// nganhnghe_pic
			$Nganhnghe->nganhnghe_pic->EditCustomAttributes = "";
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->EditValue = "Nganhnghe Pic";
				$Nganhnghe->nganhnghe_pic->ImageAlt = "";
			} else {
				$Nganhnghe->nganhnghe_pic->EditValue = "";
			}
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
		if (is_null($Nganhnghe->nganhnghe_pic->Upload->Value)) {
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

	// Add record
	function AddRow() {
		global $conn, $Security, $Nganhnghe;
		$rsnew = array();

		// Field nganhnghe_ten
		$Nganhnghe->nganhnghe_ten->SetDbValueDef($Nganhnghe->nganhnghe_ten->CurrentValue, "");
		$rsnew['nganhnghe_ten'] =& $Nganhnghe->nganhnghe_ten->DbValue;
                $Nganhnghe->thutu_sapxep->SetDbValueDef($Nganhnghe->thutu_sapxep->CurrentValue, 0);
		$rsnew['thutu_sapxep'] =& $Nganhnghe->thutu_sapxep->DbValue;

		// Field nganhnghe_pic
		$Nganhnghe->nganhnghe_pic->Upload->SaveToSession(); // Save file value to Session
		if (is_null($Nganhnghe->nganhnghe_pic->Upload->Value)) {
			$rsnew['nganhnghe_pic'] = NULL;	
		} else {
			$rsnew['nganhnghe_pic'] = $Nganhnghe->nganhnghe_pic->Upload->Value;
		}
                // Field show_status
		$Nganhnghe->show_status->SetDbValueDef($Nganhnghe->show_status->CurrentValue, 0);
		$rsnew['show_status'] =& $Nganhnghe->show_status->DbValue;

		// Call Row Inserting event
		$bInsertRow = $Nganhnghe->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field nganhnghe_pic
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($Nganhnghe->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($Nganhnghe->CancelMessage <> "") {
				$this->setMessage($Nganhnghe->CancelMessage);
				$Nganhnghe->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$Nganhnghe->nganhnghe_id->setDbValue($conn->Insert_ID());
			$rsnew['nganhnghe_id'] =& $Nganhnghe->nganhnghe_id->DbValue;

			// Call Row Inserted event
			$Nganhnghe->Row_Inserted($rsnew);
		}

		// Field nganhnghe_pic
		$Nganhnghe->nganhnghe_pic->Upload->RemoveFromSession(); // Remove file value from Session
		return $AddRow;
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
