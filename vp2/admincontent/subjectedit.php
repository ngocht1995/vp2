<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "subjectinfo.php" ?>
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
$subject_edit = new csubject_edit();
$Page =& $subject_edit;

// Page init processing
$subject_edit->Page_Init();

// Page main processing
$subject_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var subject_edit = new ew_Page("subject_edit");

// page properties
subject_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = subject_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
subject_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_ten_chuyenmuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tên chuyên mục");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
subject_edit.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
subject_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
subject_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
subject_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $subject->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa Menu</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $subject_edit->ShowMessage() ?>
<form name="fsubjectedit" id="fsubjectedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return subject_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="subject">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<tr<?php echo $subject->ten_chuyenmuc->RowAttributes ?>>
		<td class="ewTableHeader">Tên chuyên mục<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $subject->ten_chuyenmuc->CellAttributes() ?>><span id="el_ten_chuyenmuc">
<input type="text" name="x_ten_chuyenmuc" id="x_ten_chuyenmuc" size="100" value="<?php echo $subject->ten_chuyenmuc->EditValue ?>"<?php echo $subject->ten_chuyenmuc->EditAttributes() ?>>
</span><?php echo $subject->ten_chuyenmuc->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($subject->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $subject->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự sắp xếp<span class="ewRequired"></span></td>
		<td<?php echo $subject->thutu_sapxep->CellAttributes() ?>><span id="el_thutu_sapxep">
<input type="text" name="x_thutu_sapxep" id="x_thutu_sapxep" size="10" value="<?php echo $subject->thutu_sapxep->EditValue ?>"<?php echo $subject->thutu_sapxep->EditAttributes() ?>>
</span><?php echo $subject->thutu_sapxep->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($subject->show_news->Visible) { // show_news ?>
	<tr<?php echo $subject->show_news->RowAttributes ?>>
		<td class="ewTableHeader">Vi trí hiển thị<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $subject->show_news->CellAttributes() ?>><span id="el_show_news">
<select id="x_show_news" name="x_show_news"<?php echo $subject->show_news->EditAttributes() ?>>
<?php
if (is_array($subject->show_news->EditValue)) {
	$arwrk = $subject->show_news->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($subject->show_news->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $subject->show_news->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_chuyenmuc_id" id="x_chuyenmuc_id" value="<?php echo ew_HtmlEncode($subject->chuyenmuc_id->CurrentValue) ?>">
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
class csubject_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'subject';

	// Page Object Name
	var $PageObjName = 'subject_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $subject;
		if ($subject->UseTokenInUrl) $PageUrl .= "t=" . $subject->TableVar . "&"; // add page token
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
		global $objForm, $subject;
		if ($subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function csubject_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["subject"] = new csubject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $subject;
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
			$this->Page_Terminate("subjectlist.php");
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
		global $objForm, $gsFormError, $subject;

		// Load key from QueryString
		if (@$_GET["chuyenmuc_id"] <> "")
			$subject->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$subject->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$subject->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$subject->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($subject->chuyenmuc_id->CurrentValue == "")
			$this->Page_Terminate("subjectlist.php"); // Invalid key, return to list
		switch ($subject->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("subjectlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$subject->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Đã sửa"); // Update success
					$sReturnUrl = $subject->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "subjectview.php")
						$sReturnUrl = $subject->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$subject->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $subject;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $subject;
		$subject->ten_chuyenmuc->setFormValue($objForm->GetValue("x_ten_chuyenmuc"));
                $subject->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
		$subject->chuyenmuc_id->setFormValue($objForm->GetValue("x_chuyenmuc_id"));
                $subject->show_home->setFormValue($objForm->GetValue("x_show_home"));
		$subject->show_news->setFormValue($objForm->GetValue("x_show_news"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $subject;
		$subject->chuyenmuc_id->CurrentValue = $subject->chuyenmuc_id->FormValue;
		$this->LoadRow();
		$subject->ten_chuyenmuc->CurrentValue = $subject->ten_chuyenmuc->FormValue;
                $subject->thutu_sapxep->CurrentValue = $subject->thutu_sapxep->FormValue;
                $subject->show_home->CurrentValue = $subject->show_home->FormValue;
		$subject->show_news->CurrentValue = $subject->show_news->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $subject;
		$sFilter = $subject->KeyFilter();

		// Call Row Selecting event
		$subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$subject->CurrentFilter = $sFilter;
		$sSql = $subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $subject;
		$subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
                 $subject->show_home->setDbValue($rs->fields('show_home'));
		$subject->show_news->setDbValue($rs->fields('show_news'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $subject;

		// Call Row_Rendering event
		$subject->Row_Rendering();

		// Common render codes for all row types
                // // show_home
		$subject->show_home->CellCssStyle = "";
		$subject->show_home->CellCssClass = "";

		// show_news
		$subject->show_news->CellCssStyle = "";
		$subject->show_news->CellCssClass = "";
		// ten_chuyenmuc

		$subject->ten_chuyenmuc->CellCssStyle = "";
		$subject->ten_chuyenmuc->CellCssClass = "";
                // thutu_sapxep

		$subject->thutu_sapxep->CellCssStyle = "";
		$subject->thutu_sapxep->CellCssClass = "";
		if ($subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$subject->ten_chuyenmuc->ViewValue = $subject->ten_chuyenmuc->CurrentValue;
			$subject->ten_chuyenmuc->CssStyle = "";
			$subject->ten_chuyenmuc->CssClass = "";
			$subject->ten_chuyenmuc->ViewCustomAttributes = "";

			// thutu_sapxep
			$subject->ten_chuyenmuc->HrefValue = "";

                        $subject->thutu_sapxep->ViewValue = $subject->thutu_sapxep->CurrentValue;
			$subject->thutu_sapxep->CssStyle = "";
			$subject->thutu_sapxep->CssClass = "";
			$subject->thutu_sapxep->ViewCustomAttributes = "";
                        // show_home
			if (strval($subject->show_home->CurrentValue) <> "") {
				switch ($subject->show_home->CurrentValue) {
					case "0":
						$subject->show_home->ViewValue = "Không hiển thị trên trang chủ";
						break;
					case "1":
						$subject->show_home->ViewValue = "Hiển thị trên trang chủ";
						break;
					default:
						$subject->show_home->ViewValue = $subject->show_home->CurrentValue;
				}
			} else {
				$subject->show_home->ViewValue = NULL;
			}
			$subject->show_home->CssStyle = "";
			$subject->show_home->CssClass = "";
			$subject->show_home->ViewCustomAttributes = "";

			// show_news
			if (strval($subject->show_news->CurrentValue) <> "") {
				switch ($subject->show_news->CurrentValue) {
					case "0":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu trang tin";
						break;
					case "1":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối hiển thị trang tin";
						break;
                                        case "2":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện mặc định trên trang chủ tin";
						break;
                                        case "3":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối hiển thị trên STMĐT";
						break;
                                        case "4":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối hiển thị trên STMĐT và trên trang tin";
						break;
                                         case "5":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu hiển thị trang tin_liên hệ";
						break;
                                         case "6":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu hiển thị trang tin_phản hồi";
						break;
                                         case "7":
						$subject->show_news->ViewValue = "Nhóm mục thể hiện khối menu hiển thị trang tin_liên kết";
						break;
					default:
						$subject->show_news->ViewValue = $subject->show_home->CurrentValue;
					
				}
			} else {
				$subject->show_news->ViewValue = NULL;
			}
			$subject->show_news->CssStyle = "";
			$subject->show_news->CssClass = "";
			$subject->show_news->ViewCustomAttributes = "";

			// thutu_sapxep
			$subject->thutu_sapxep->HrefValue = "";
                        // show_home
			$subject->show_home->HrefValue = "";

			// show_news
			$subject->show_news->HrefValue = "";
		} elseif ($subject->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// ten_chuyenmuc
			$subject->ten_chuyenmuc->EditCustomAttributes = "";
			$subject->ten_chuyenmuc->EditValue = ew_HtmlEncode($subject->ten_chuyenmuc->CurrentValue);

			// Edit refer script
			// ten_chuyenmuc

			$subject->ten_chuyenmuc->HrefValue = "";

                        // thutu_sapxep
			$subject->thutu_sapxep->EditCustomAttributes = "";
			$subject->thutu_sapxep->EditValue = ew_HtmlEncode($subject->thutu_sapxep->CurrentValue);
                        // show_home
			$subject->show_home->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không hiển thị trên trang chủ");
			$arwrk[] = array("1", "Hiển thị trên trang chủ");
			array_unshift($arwrk, array("", " Chọn"));
			$subject->show_home->EditValue = $arwrk;

			// show_news
			$subject->show_news->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Nhóm mục thể hiện khối menu trang tin");
                        $arwrk[] = array("5", "Nhóm mục thể hiện khối menu trang tin_liên hệ");
                        $arwrk[] = array("6", "Nhóm mục thể hiện khối menu trang tin_phản hồi");
                        $arwrk[] = array("7", "Nhóm mục thể hiện khối menu trang tin_liên kết");
			$arwrk[] = array("1", "Nhóm mục thể hiện khối hiển thị trang tin");
                        $arwrk[] = array("2", "Nhóm mục thể hiện khối hiển thị mặc định trang tin");
                        $arwrk[] = array("3", "Nhóm mục thể hiện khối hiển thị STMĐT");
                        $arwrk[] = array("4", "Nhóm mục thể hiện khối hiển thị STMĐT và trang chủ tin");
                        array_unshift($arwrk, array("", "Chọn"));
			$subject->show_news->EditValue = $arwrk;

			// Edit refer script
			// thutu_sapxep

			$subject->thutu_sapxep->HrefValue = "";
                         // show_home
			$subject->show_home->HrefValue = "";

			// show_news
			$subject->show_news->HrefValue = "";
		}

		// Call Row Rendered event
		$subject->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $subject;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($subject->ten_chuyenmuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tên chuyên mục";
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
		global $conn, $Security, $subject;
		$sFilter = $subject->KeyFilter();
		$subject->CurrentFilter = $sFilter;
		$sSql = $subject->SQL();
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

			// Field ten_chuyenmuc
			$subject->ten_chuyenmuc->SetDbValueDef($subject->ten_chuyenmuc->CurrentValue, "");
			$rsnew['ten_chuyenmuc'] =& $subject->ten_chuyenmuc->DbValue;
                        // Field thutu_sapxep
			$subject->thutu_sapxep->SetDbValueDef($subject->thutu_sapxep->CurrentValue, 0);
			$rsnew['thutu_sapxep'] =& $subject->thutu_sapxep->DbValue;
                        // Field show_home
			$subject->show_home->SetDbValueDef($subject->show_home->CurrentValue, 0);
			$rsnew['show_home'] =& $subject->show_home->DbValue;

			// Field show_news
			$subject->show_news->SetDbValueDef($subject->show_news->CurrentValue, 0);
			$rsnew['show_news'] =& $subject->show_news->DbValue;

			// Call Row Updating event
			$bUpdateRow = $subject->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($subject->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($subject->CancelMessage <> "") {
					$this->setMessage($subject->CancelMessage);
					$subject->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$subject->Row_Updated($rsold, $rsnew);
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
