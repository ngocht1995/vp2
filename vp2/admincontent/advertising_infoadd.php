<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertising_infoinfo.php" ?>
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
$advertising_info_add = new cadvertising_info_add();
$Page =& $advertising_info_add;

// Page init processing
$advertising_info_add->Page_Init();

// Page main processing
$advertising_info_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_info_add = new ew_Page("advertising_info_add");

// page properties
advertising_info_add.PageID = "add"; // page ID
var EW_PAGE_ID = advertising_info_add.PageID; // for backward compatibility

// extend page with ValidateForm function
advertising_info_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
                elm = fobj.elements["x" + infix + "_anh_daidien"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
		elm = fobj.elements["x" + infix + "_chuyenmuc_id"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Chuyên mục bài viết');?>");
		elm = fobj.elements["x" + infix + "_tieude_baiviet"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Tiêu đề');?>");
		elm = fobj.elements["x" + infix + "_tomtat_baiviet"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Tóm tắt');?>");
		elm = fobj.elements["x" + infix + "_noidung_baiviet"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Nội dung');?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
advertising_info_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_info_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_info_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_info_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
			var inst;
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.focus();
		}
	}


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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $advertising_info->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý tin quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $advertising_info_add->ShowMessage() ?>
<form name="fadvertising_infoadd" id="fadvertising_infoadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return advertising_info_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="advertising_info">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($advertising_info->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
	<tr<?php echo $advertising_info->chuyenmuc_id->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Chuyên mục bài viết');?><span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising_info->chuyenmuc_id->CellAttributes() ?>><span id="el_chuyenmuc_id">
<select id="x_chuyenmuc_id" name="x_chuyenmuc_id"<?php echo $advertising_info->chuyenmuc_id->EditAttributes() ?>>
<?php
if (is_array($advertising_info->chuyenmuc_id->EditValue)) {
	$arwrk = $advertising_info->chuyenmuc_id->EditValue;
	array_unshift($arwrk, array("", Lang_Text("Chọn"),Lang_Text("Chọn")));
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising_info->chuyenmuc_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo Lang_Str($arwrk[$rowcntwrk][1],$arwrk[$rowcntwrk][2]) ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $advertising_info->chuyenmuc_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->tieude_baiviet->Visible) { // tieude_baiviet ?>
	<tr<?php echo $advertising_info->tieude_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Tiêu đề');?><span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising_info->tieude_baiviet->CellAttributes() ?>><span id="el_tieude_baiviet">
<input type="text" name="x_tieude_baiviet" id="x_tieude_baiviet" size="100" maxlength="255" value="<?php echo $advertising_info->tieude_baiviet->EditValue ?>"<?php echo $advertising_info->tieude_baiviet->EditAttributes() ?>>
</span><?php echo $advertising_info->tieude_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($advertising_info->anh_daidien->Visible) { // anh_daidien ?>
	<tr<?php echo $advertising_info->anh_daidien->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Ảnh');?></td>
		<td<?php echo $advertising_info->anh_daidien->CellAttributes() ?>><span id="el_anh_daidien">
<input type="file" name="x_anh_daidien" id="x_anh_daidien" size="30"<?php echo $advertising_info->anh_daidien->EditAttributes() ?>>
</div>
</span><?php echo $advertising_info->anh_daidien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->tukhoa_baiviet->Visible) { // tukhoa_baiviet ?>
	<tr<?php echo $advertising_info->tukhoa_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Từ khoá');?></td>
		<td<?php echo $advertising_info->tukhoa_baiviet->CellAttributes() ?>><span id="el_tukhoa_baiviet">
<input type="text" name="x_tukhoa_baiviet" id="x_tukhoa_baiviet" size="100" maxlength="255" value="<?php echo $advertising_info->tukhoa_baiviet->EditValue ?>"<?php echo $advertising_info->tukhoa_baiviet->EditAttributes() ?>>
</span><?php echo $advertising_info->tukhoa_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->tomtat_baiviet->Visible) { // tomtat_baiviet ?>
	<tr<?php echo $advertising_info->tomtat_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Tóm tắt');?><span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising_info->tomtat_baiviet->CellAttributes() ?>><span id="el_tomtat_baiviet">
<textarea name="x_tomtat_baiviet" id="x_tomtat_baiviet" cols="50" rows="7"<?php echo $advertising_info->tomtat_baiviet->EditAttributes() ?>><?php echo $advertising_info->tomtat_baiviet->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_tomtat_baiviet", function() {
	var oCKeditor = CKEDITOR.replace('x_tomtat_baiviet', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>

</span><?php echo $advertising_info->tomtat_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->noidung_baiviet->Visible) { // noidung_baiviet ?>
	<tr<?php echo $advertising_info->noidung_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Nội dung');?><span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising_info->noidung_baiviet->CellAttributes() ?>><span id="el_noidung_baiviet">
<textarea name="x_noidung_baiviet" id="x_noidung_baiviet" cols="50" rows="7"<?php echo $advertising_info->noidung_baiviet->EditAttributes() ?>><?php echo $advertising_info->noidung_baiviet->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_noidung_baiviet", function() {
	var oCKeditor = CKEDITOR.replace('x_noidung_baiviet', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>

</span><?php echo $advertising_info->noidung_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->nguon_baiviet->Visible) { // nguon_baiviet ?>
	<tr<?php echo $advertising_info->nguon_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text("Nguồn tin")?><span class="ewRequired"></span></td>
		<td<?php echo $advertising_info->nguon_baiviet->CellAttributes() ?>><span id="el_nguon_baiviet">
<input type="text" name="x_nguon_baiviet" id="x_nguon_baiviet" size="30" maxlength="255" value="<?php echo $advertising_info->nguon_baiviet->EditValue ?>"<?php echo $advertising_info->nguon_baiviet->EditAttributes() ?>>
</span><?php echo $advertising_info->nguon_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->lienket_baiviet->Visible) { // lienket_baiviet ?>
	<tr<?php echo $advertising_info->lienket_baiviet->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text("Liên kết")?><span class="ewRequired"></span></td>
		<td<?php echo $advertising_info->lienket_baiviet->CellAttributes() ?>><span id="el_lienket_baiviet">
<input type="text" name="x_lienket_baiviet" id="x_lienket_baiviet" size="30" maxlength="255" value="<?php echo $advertising_info->lienket_baiviet->EditValue ?>"<?php echo $advertising_info->lienket_baiviet->EditAttributes() ?>>
</span><?php echo $advertising_info->lienket_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising_info->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $advertising_info->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Thứ tự sắp xếp');?><span class="ewRequired"></span></td>
		<td<?php echo $advertising_info->thutu_sapxep->CellAttributes() ?>><span id="el_thutu_sapxep">
<select id="x_thutu_sapxep" name="x_thutu_sapxep"<?php echo ew_TruncateMemo($advertising_info->thutu_sapxep->EditAttributes(),130) ?>>
<?php
if (is_array($advertising_info->thutu_sapxep->EditValue)) {
	$arwrk = $advertising_info->thutu_sapxep->EditValue;
	array_unshift($arwrk, array(-1, Lang_Text("Thứ tự sắp xếp")));
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising_info->thutu_sapxep->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo ew_TruncateMemo($arwrk[$rowcntwrk][1],130) ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $advertising_info->thutu_sapxep->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    <?php echo Lang_Text('Thêm');?>   " onclick="ew_SubmitForm(advertising_info_add, this.form);">
</form>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

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
class cadvertising_info_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'advertising_info';

	// Page Object Name
	var $PageObjName = 'advertising_info_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising_info;
		if ($advertising_info->UseTokenInUrl) $PageUrl .= "t=" . $advertising_info->TableVar . "&"; // add page token
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
		global $objForm, $advertising_info;
		if ($advertising_info->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising_info->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising_info->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_info_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_info"] = new cadvertising_info();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising_info', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising_info;
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
			$this->Page_Terminate("advertising_infolist.php");
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
		global $objForm, $gsFormError, $advertising_info;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["baiviet_id"] != "") {
		  $advertising_info->baiviet_id->setQueryStringValue($_GET["baiviet_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $advertising_info->CurrentAction = $_POST["a_add"]; // Get form action
                   $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$advertising_info->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $advertising_info->CurrentAction = "C"; // Copy Record
		  } else {
		    $advertising_info->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($advertising_info->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage(Lang_Text('Không có dữ liệu')); // No record found
		      $this->Page_Terminate("advertising_infolist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$advertising_info->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage(Lang_Text("Đã thêm bài viết")); // Set up success message
					$sReturnUrl = $advertising_info->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "advertising_infoview.php")
						$sReturnUrl = $advertising_info->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$advertising_info->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $advertising_info;

		// Get upload data
                if ($advertising_info->anh_daidien->Upload->UploadFile()) {

				// No action required
			} else {
				echo $advertising_info->anh_daidien->Upload->Message;
				$this->Page_Terminate();
				exit();
	}
	}

	// Load default values
	function LoadDefaultValues() {
		global $advertising_info;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $advertising_info;
		$advertising_info->chuyenmuc_id->setFormValue($objForm->GetValue("x_chuyenmuc_id"));
		$advertising_info->tieude_baiviet->setFormValue($objForm->GetValue("x_tieude_baiviet"));
		$advertising_info->tukhoa_baiviet->setFormValue($objForm->GetValue("x_tukhoa_baiviet"));
		$advertising_info->tomtat_baiviet->setFormValue($objForm->GetValue("x_tomtat_baiviet"));
		$advertising_info->noidung_baiviet->setFormValue($objForm->GetValue("x_noidung_baiviet"));
		$advertising_info->nguon_baiviet->setFormValue($objForm->GetValue("x_nguon_baiviet"));
		$advertising_info->lienket_baiviet->setFormValue($objForm->GetValue("x_lienket_baiviet"));
		$advertising_info->thoigian_them->setFormValue($objForm->GetValue("x_thoigian_them"));
		$advertising_info->thoigian_them->CurrentValue = ew_UnFormatDateTime($advertising_info->thoigian_them->CurrentValue, 7);
		$advertising_info->thoihan_sua->setFormValue($objForm->GetValue("x_thoihan_sua"));
		$advertising_info->thoihan_sua->CurrentValue = ew_UnFormatDateTime($advertising_info->thoihan_sua->CurrentValue, 7);
		$advertising_info->nguoi_them->setFormValue($objForm->GetValue("x_nguoi_them"));
		$advertising_info->nguoi_sua->setFormValue($objForm->GetValue("x_nguoi_sua"));
		$advertising_info->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
		$advertising_info->baiviet_id->setFormValue($objForm->GetValue("x_baiviet_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $advertising_info;
		$advertising_info->baiviet_id->CurrentValue = $advertising_info->baiviet_id->FormValue;
		$advertising_info->chuyenmuc_id->CurrentValue = $advertising_info->chuyenmuc_id->FormValue;
		$advertising_info->tieude_baiviet->CurrentValue = $advertising_info->tieude_baiviet->FormValue;
		$advertising_info->tukhoa_baiviet->CurrentValue = $advertising_info->tukhoa_baiviet->FormValue;
		$advertising_info->tomtat_baiviet->CurrentValue = $advertising_info->tomtat_baiviet->FormValue;
		$advertising_info->noidung_baiviet->CurrentValue = $advertising_info->noidung_baiviet->FormValue;
		$advertising_info->nguon_baiviet->CurrentValue = $advertising_info->nguon_baiviet->FormValue;
		$advertising_info->lienket_baiviet->CurrentValue = $advertising_info->lienket_baiviet->FormValue;
		$advertising_info->thoigian_them->CurrentValue = $advertising_info->thoigian_them->FormValue;
		$advertising_info->thoigian_them->CurrentValue = ew_UnFormatDateTime($advertising_info->thoigian_them->CurrentValue, 7);
		$advertising_info->thoihan_sua->CurrentValue = $advertising_info->thoihan_sua->FormValue;
		$advertising_info->thoihan_sua->CurrentValue = ew_UnFormatDateTime($advertising_info->thoihan_sua->CurrentValue, 7);
		$advertising_info->nguoi_them->CurrentValue = $advertising_info->nguoi_them->FormValue;
		$advertising_info->nguoi_sua->CurrentValue = $advertising_info->nguoi_sua->FormValue;
		$advertising_info->thutu_sapxep->CurrentValue = $advertising_info->thutu_sapxep->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising_info;
		$sFilter = $advertising_info->KeyFilter();

		// Call Row Selecting event
		$advertising_info->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising_info->CurrentFilter = $sFilter;
		$sSql = $advertising_info->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising_info->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising_info;
		$advertising_info->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$advertising_info->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$advertising_info->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$advertising_info->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$advertising_info->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$advertising_info->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$advertising_info->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$advertising_info->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$advertising_info->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising_info->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$advertising_info->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising_info->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$advertising_info->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$advertising_info->trang_thai->setDbValue($rs->fields('trang_thai'));
		$advertising_info->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$advertising_info->anh_daidien->Upload->DbValue = $rs->fields('anh_daidien');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising_info;

		// Call Row_Rendering event
		$advertising_info->Row_Rendering();

		// Common render codes for all row types
                // anh_daidien

		$advertising_info->anh_daidien->CellCssStyle = "";
		$advertising_info->anh_daidien->CellCssClass = "";
		// chuyenmuc_id

		$advertising_info->chuyenmuc_id->CellCssStyle = "";
		$advertising_info->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$advertising_info->tieude_baiviet->CellCssStyle = "";
		$advertising_info->tieude_baiviet->CellCssClass = "";

		// tukhoa_baiviet
		$advertising_info->tukhoa_baiviet->CellCssStyle = "";
		$advertising_info->tukhoa_baiviet->CellCssClass = "";

		// tomtat_baiviet
		$advertising_info->tomtat_baiviet->CellCssStyle = "";
		$advertising_info->tomtat_baiviet->CellCssClass = "";

		// noidung_baiviet
		$advertising_info->noidung_baiviet->CellCssStyle = "";
		$advertising_info->noidung_baiviet->CellCssClass = "";

		// nguon_baiviet
		$advertising_info->nguon_baiviet->CellCssStyle = "";
		$advertising_info->nguon_baiviet->CellCssClass = "";

		// lienket_baiviet
		$advertising_info->lienket_baiviet->CellCssStyle = "";
		$advertising_info->lienket_baiviet->CellCssClass = "";

		// thoigian_them
		$advertising_info->thoigian_them->CellCssStyle = "";
		$advertising_info->thoigian_them->CellCssClass = "";

		// thoihan_sua
		$advertising_info->thoihan_sua->CellCssStyle = "";
		$advertising_info->thoihan_sua->CellCssClass = "";

		// nguoi_them
		$advertising_info->nguoi_them->CellCssStyle = "";
		$advertising_info->nguoi_them->CellCssClass = "";

		// nguoi_sua
		$advertising_info->nguoi_sua->CellCssStyle = "";
		$advertising_info->nguoi_sua->CellCssClass = "";
		// thutu_sapxep
		$advertising_info->thutu_sapxep->CellCssStyle = "";
		$advertising_info->thutu_sapxep->CellCssClass = "";
		if ($advertising_info->RowType == EW_ROWTYPE_VIEW) { // View row

                    // anh_daidien
			if (!is_null($advertising_info->anh_daidien->Upload->DbValue)) {
				$advertising_info->anh_daidien->ViewValue = "Anh Daidien";
				$advertising_info->anh_daidien->ImageAlt = "";
			} else {
				$advertising_info->anh_daidien->ViewValue = "";
			}
			$advertising_info->anh_daidien->CssStyle = "";
			$advertising_info->anh_daidien->CssClass = "";
			$advertising_info->anh_daidien->ViewCustomAttributes = "";
			// chuyenmuc_id
			if (strval($advertising_info->chuyenmuc_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_chuyenmuc` FROM `advertising_subject` WHERE `chuyenmuc_id` = " . ew_AdjustSql($advertising_info->chuyenmuc_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$advertising_info->chuyenmuc_id->ViewValue = $rswrk->fields('ten_chuyenmuc');
					$rswrk->Close();
				} else {
					$advertising_info->chuyenmuc_id->ViewValue = $advertising_info->chuyenmuc_id->CurrentValue;
				}
			} else {
				$advertising_info->chuyenmuc_id->ViewValue = NULL;
			}
			$advertising_info->chuyenmuc_id->CssStyle = "";
			$advertising_info->chuyenmuc_id->CssClass = "";
			$advertising_info->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$advertising_info->tieude_baiviet->ViewValue = $advertising_info->tieude_baiviet->CurrentValue;
			$advertising_info->tieude_baiviet->CssStyle = "";
			$advertising_info->tieude_baiviet->CssClass = "";
			$advertising_info->tieude_baiviet->ViewCustomAttributes = "";

			// tukhoa_baiviet
			$advertising_info->tukhoa_baiviet->ViewValue = $advertising_info->tukhoa_baiviet->CurrentValue;
			$advertising_info->tukhoa_baiviet->CssStyle = "";
			$advertising_info->tukhoa_baiviet->CssClass = "";
			$advertising_info->tukhoa_baiviet->ViewCustomAttributes = "";

			// tomtat_baiviet
			$advertising_info->tomtat_baiviet->ViewValue = $advertising_info->tomtat_baiviet->CurrentValue;
			$advertising_info->tomtat_baiviet->CssStyle = "";
			$advertising_info->tomtat_baiviet->CssClass = "";
			$advertising_info->tomtat_baiviet->ViewCustomAttributes = "";

			// noidung_baiviet
			$advertising_info->noidung_baiviet->ViewValue = $advertising_info->noidung_baiviet->CurrentValue;
			$advertising_info->noidung_baiviet->CssStyle = "";
			$advertising_info->noidung_baiviet->CssClass = "";
			$advertising_info->noidung_baiviet->ViewCustomAttributes = "";

			// nguon_baiviet
			$advertising_info->nguon_baiviet->ViewValue = $advertising_info->nguon_baiviet->CurrentValue;
			$advertising_info->nguon_baiviet->CssStyle = "";
			$advertising_info->nguon_baiviet->CssClass = "";
			$advertising_info->nguon_baiviet->ViewCustomAttributes = "";

			// lienket_baiviet
			$advertising_info->lienket_baiviet->ViewValue = $advertising_info->lienket_baiviet->CurrentValue;
			$advertising_info->lienket_baiviet->CssStyle = "";
			$advertising_info->lienket_baiviet->CssClass = "";
			$advertising_info->lienket_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$advertising_info->thoigian_them->ViewValue = $advertising_info->thoigian_them->CurrentValue;
			$advertising_info->thoigian_them->ViewValue = ew_FormatDateTime($advertising_info->thoigian_them->ViewValue, 7);
			$advertising_info->thoigian_them->CssStyle = "";
			$advertising_info->thoigian_them->CssClass = "";
			$advertising_info->thoigian_them->ViewCustomAttributes = "";

			// thoihan_sua
			$advertising_info->thoihan_sua->ViewValue = $advertising_info->thoihan_sua->CurrentValue;
			$advertising_info->thoihan_sua->ViewValue = ew_FormatDateTime($advertising_info->thoihan_sua->ViewValue, 7);
			$advertising_info->thoihan_sua->CssStyle = "";
			$advertising_info->thoihan_sua->CssClass = "";
			$advertising_info->thoihan_sua->ViewCustomAttributes = "";

			// nguoi_them
			$advertising_info->nguoi_them->ViewValue = $advertising_info->nguoi_them->CurrentValue;
			$advertising_info->nguoi_them->CssStyle = "";
			$advertising_info->nguoi_them->CssClass = "";
			$advertising_info->nguoi_them->ViewCustomAttributes = "";

			// nguoi_sua
			$advertising_info->nguoi_sua->ViewValue = $advertising_info->nguoi_sua->CurrentValue;
			$advertising_info->nguoi_sua->CssStyle = "";
			$advertising_info->nguoi_sua->CssClass = "";
			$advertising_info->nguoi_sua->ViewCustomAttributes = "";
			// thutu_sapxep
			if (strval($advertising_info->thutu_sapxep->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `tieude_baiviet` FROM `advertising_info` WHERE `thutu_sapxep` = " . ew_AdjustSql($advertising_info->thutu_sapxep->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$advertising_info->thutu_sapxep->ViewValue = $rswrk->fields('tieude_baiviet');
					$rswrk->Close();
				} else {
					$advertising_info->thutu_sapxep->ViewValue = $advertising_info->thutu_sapxep->CurrentValue;
				}
			} else {
				$advertising_info->thutu_sapxep->ViewValue = NULL;
			}
			$advertising_info->thutu_sapxep->CssStyle = "";
			$advertising_info->thutu_sapxep->CssClass = "";
			$advertising_info->thutu_sapxep->ViewCustomAttributes = "";

			// chuyenmuc_id
			$advertising_info->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$advertising_info->tieude_baiviet->HrefValue = "";

			// tukhoa_baiviet
			$advertising_info->tukhoa_baiviet->HrefValue = "";

			// tomtat_baiviet
			$advertising_info->tomtat_baiviet->HrefValue = "";

			// noidung_baiviet
			$advertising_info->noidung_baiviet->HrefValue = "";

			// nguon_baiviet
			$advertising_info->nguon_baiviet->HrefValue = "";

			// lienket_baiviet
			$advertising_info->lienket_baiviet->HrefValue = "";

			// thoigian_them
			$advertising_info->thoigian_them->HrefValue = "";

			// thoihan_sua
			$advertising_info->thoihan_sua->HrefValue = "";

			// nguoi_them
			$advertising_info->nguoi_them->HrefValue = "";

			// nguoi_sua
			$advertising_info->nguoi_sua->HrefValue = "";
			
			// thutu_sapxep
			$advertising_info->thutu_sapxep->HrefValue = "";
                        // anh_daidien
			if (!is_null($advertising_info->anh_daidien->Upload->DbValue)) {
				$advertising_info->anh_daidien->HrefValue = "advertising_info_anh_daidien_bv.php?baiviet_id=" . $advertising_info->baiviet_id->CurrentValue;
				if ($advertising_info->Export <> "") $advertising_info->anh_daidien->HrefValue = ew_ConvertFullUrl($advertising_info->anh_daidien->HrefValue);
			} else {
				$advertising_info->anh_daidien->HrefValue = "";
			}
		} elseif ($advertising_info->RowType == EW_ROWTYPE_ADD) { // Add row

                    // anh_daidien
			$advertising_info->anh_daidien->EditCustomAttributes = "";
			if (!is_null($advertising_info->anh_daidien->Upload->DbValue)) {
				$advertising_info->anh_daidien->EditValue = "Anh Daidien";
				$advertising_info->anh_daidien->ImageAlt = "";
			} else {
				$advertising_info->anh_daidien->EditValue = "";
			}
		
			// chuyenmuc_id
			$advertising_info->chuyenmuc_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`,`ten_chuyenmuc_en`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `advertising_subject`";
			$sWhereWrk = "chuyenmuc_belongto=-1";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
				$sSqlWrk1 = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`,`ten_chuyenmuc_en`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `advertising_subject`";
				$sWhereWrk1 = "chuyenmuc_belongto=0";
				if ($sWhereWrk1 <> "") $sSqlWrk1 .= " WHERE $sWhereWrk1";
				$rswrk1 = $conn->Execute($sSqlWrk1);
			while (!$rswrk1->EOF){
			array_push($arwrk, array($rswrk1->fields['chuyenmuc_id'], "-".$rswrk1->fields['ten_chuyenmuc'],"-".$rswrk1->fields['ten_chuyenmuc_en']));			
				$sSqlWrk2 = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`,`ten_chuyenmuc_en`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `advertising_subject`";
				$sWhereWrk2 = "chuyenmuc_belongto=".$rswrk1->fields['chuyenmuc_id'];
				if ($sWhereWrk2 <> "") $sSqlWrk2 .= " WHERE $sWhereWrk2";
				$rswrk2 = $conn->Execute($sSqlWrk2);
				while (!$rswrk2->EOF){
					array_push($arwrk, array($rswrk2->fields['chuyenmuc_id'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+".$rswrk2->fields['ten_chuyenmuc'],"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+".$rswrk2->fields['ten_chuyenmuc_en']));
					$rswrk2->MoveNext();						
				}
				if ($rswrk2) $rswrk2->Close();
				$rswrk1->MoveNext();
						}
			$advertising_info->chuyenmuc_id->EditValue = $arwrk;
				
			

			// tieude_baiviet
			$advertising_info->tieude_baiviet->EditCustomAttributes = "";
			$advertising_info->tieude_baiviet->EditValue = ew_HtmlEncode($advertising_info->tieude_baiviet->CurrentValue);

			// tukhoa_baiviet
			$advertising_info->tukhoa_baiviet->EditCustomAttributes = "";
			$advertising_info->tukhoa_baiviet->EditValue = ew_HtmlEncode($advertising_info->tukhoa_baiviet->CurrentValue);

			// tomtat_baiviet
			$advertising_info->tomtat_baiviet->EditCustomAttributes = "";
			$advertising_info->tomtat_baiviet->EditValue = ew_HtmlEncode($advertising_info->tomtat_baiviet->CurrentValue);

			// noidung_baiviet
			$advertising_info->noidung_baiviet->EditCustomAttributes = "";
			$advertising_info->noidung_baiviet->EditValue = ew_HtmlEncode($advertising_info->noidung_baiviet->CurrentValue);

			// nguon_baiviet
			$advertising_info->nguon_baiviet->EditCustomAttributes = "";
			$advertising_info->nguon_baiviet->EditValue = ew_HtmlEncode($advertising_info->nguon_baiviet->CurrentValue);

			// lienket_baiviet
			$advertising_info->lienket_baiviet->EditCustomAttributes = "";
			$advertising_info->lienket_baiviet->EditValue = ew_HtmlEncode($advertising_info->lienket_baiviet->CurrentValue);

			// thoigian_them
			// thoihan_sua
			// nguoi_them
			// nguoi_sua
			// thutu_sapxep

			if (($_SESSION[EW_SESSION_LANG]=="vn") ||($_SESSION[EW_SESSION_LANG]=="")){$ngonngu="vn";}
			else {$ngonngu="en";}
			
			$advertising_info->thutu_sapxep->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `thutu_sapxep`, `tieude_baiviet`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `advertising_info`";
			$sWhereWrk = "`lang_option`='".$ngonngu."'";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$sSqlWrk .=" order by `thutu_sapxep`";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$advertising_info->thutu_sapxep->EditValue = $arwrk;

		}

		// Call Row Rendered event
		$advertising_info->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $conn,$gsFormError, $advertising_info;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($advertising_info->anh_daidien->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($advertising_info->anh_daidien->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($advertising_info->anh_daidien->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}
                $sSqlWrk = "SELECT `chuyenmuc_id`, `chuyenmuc_belongto` FROM `advertising_subject`";
		$sWhereWrk = "`chuyenmuc_id` = " . ew_AdjustSql($advertising_info->chuyenmuc_id->CurrentValue) . "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
                 if ($arwrk[0][1] == 0) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Tin phải thuộc chuyên mục cấp 2";
		}
		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($advertising_info->chuyenmuc_id->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= Lang_Text('Hãy nhập trường bắt buộc');
		}
		if ($advertising_info->tieude_baiviet->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - Tiêu đề";
		}
		if ($advertising_info->tomtat_baiviet->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Tóm tắt');?>";
		}
		if ($advertising_info->noidung_baiviet->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Nội dung');?>";
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

	// Add record
	function AddRow() {
		global $conn, $Security, $advertising_info;
		$rsnew = array();

                // Field anh_daidien
		$advertising_info->anh_daidien->Upload->SaveToSession(); // Save file value to Session
		if (is_null($advertising_info->anh_daidien->Upload->Value)) {
			$rsnew['anh_daidien'] = NULL;
		} else {
			$rsnew['anh_daidien'] = $advertising_info->anh_daidien->Upload->Value;
		}
		// Field chuyenmuc_id
		$advertising_info->chuyenmuc_id->SetDbValueDef($advertising_info->chuyenmuc_id->CurrentValue, 0);
		$rsnew['chuyenmuc_id'] =& $advertising_info->chuyenmuc_id->DbValue;

		// Field tieude_baiviet
		$advertising_info->tieude_baiviet->SetDbValueDef($advertising_info->tieude_baiviet->CurrentValue, "");
		$rsnew['tieude_baiviet'] =& $advertising_info->tieude_baiviet->DbValue;

		// Field tukhoa_baiviet
		$advertising_info->tukhoa_baiviet->SetDbValueDef($advertising_info->tukhoa_baiviet->CurrentValue, NULL);
		$rsnew['tukhoa_baiviet'] =& $advertising_info->tukhoa_baiviet->DbValue;

		// Field tomtat_baiviet
		$advertising_info->tomtat_baiviet->SetDbValueDef($advertising_info->tomtat_baiviet->CurrentValue, "");
		$rsnew['tomtat_baiviet'] =& $advertising_info->tomtat_baiviet->DbValue;

		// Field noidung_baiviet
		$advertising_info->noidung_baiviet->SetDbValueDef($advertising_info->noidung_baiviet->CurrentValue, "");
		$rsnew['noidung_baiviet'] =& $advertising_info->noidung_baiviet->DbValue;

		// Field nguon_baiviet
		$advertising_info->nguon_baiviet->SetDbValueDef($advertising_info->nguon_baiviet->CurrentValue, "");
		$rsnew['nguon_baiviet'] =& $advertising_info->nguon_baiviet->DbValue;

		// Field lienket_baiviet
		$advertising_info->lienket_baiviet->SetDbValueDef($advertising_info->lienket_baiviet->CurrentValue, "");
		$rsnew['lienket_baiviet'] =& $advertising_info->lienket_baiviet->DbValue;

		// Field thoigian_them
		$advertising_info->thoigian_them->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoigian_them'] =& $advertising_info->thoigian_them->DbValue;

		// Field thoihan_sua
		$advertising_info->thoihan_sua->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoihan_sua'] =& $advertising_info->thoihan_sua->DbValue;

		// Field nguoi_them
		$advertising_info->nguoi_them->SetDbValueDef(CurrentUserID(), 0);
		$rsnew['nguoi_them'] =& $advertising_info->nguoi_them->DbValue;
		//ngon ngu
		if (($_SESSION[EW_SESSION_LANG]=="vn") ||($_SESSION[EW_SESSION_LANG]=="")){$ngonngu="vn";}
		else {$ngonngu="en";}
			$rsnew['lang_option']= $ngonngu;

		// Field nguoi_sua
		$advertising_info->nguoi_sua->SetDbValueDef(CurrentUserID(), 0);
		$rsnew['nguoi_sua'] =& $advertising_info->nguoi_sua->DbValue;
		// Field thutu_sapxep
			$advertising_info->thutu_sapxep->SetDbValueDef($advertising_info->thutu_sapxep->CurrentValue, 0);
			$rsnew['thutu_sapxep'] =& $advertising_info->thutu_sapxep->DbValue;
			$st=$rsnew['thutu_sapxep'];
			echo $st;
			if ($st==-1) //tim ban ghi cuoi cung
			{
			$sSqlWrk = "SELECT `thutu_sapxep` FROM `advertising_info`";
			$sWhereWrk = "`lang_option`='".$ngonngu."'";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$sSqlWrk .=" order by `thutu_sapxep` desc limit 1";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
			if ($rowswrk>0) //co ban ghi cuoi cung
				{$st=$arwrk[0][0]+500;}
				else //khong co ban ghi cuoi cung
				{$st=500;}				
			}
			else  //tim ban ghi dung sau
			{
			$sSqlWrk = "SELECT `thutu_sapxep` FROM `advertising_info`";
			$sWhereWrk = "`lang_option`='".$ngonngu."' and `thutu_sapxep` >".$st;
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$sSqlWrk .=" order by `thutu_sapxep` limit 1";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
			if ($rowswrk>0) //co ban ghi dung sau
				{$st=($st+$arwrk[0][0])/2;}
				else {$st=$st+500;}
			}
						
			$rsnew['thutu_sapxep']=$st;
		
			
		// Call Row Inserting event
		$bInsertRow = $advertising_info->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($advertising_info->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($advertising_info->CancelMessage <> "") {
				$this->setMessage($advertising_info->CancelMessage);
				$advertising_info->CancelMessage = "";
			} else {
				$this->setMessage(Lang_Text("Thêm mới bị huỷ bỏ"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$advertising_info->baiviet_id->setDbValue($conn->Insert_ID());
			$rsnew['baiviet_id'] =& $advertising_info->baiviet_id->DbValue;

			// Call Row Inserted event
			$advertising_info->Row_Inserted($rsnew);
		}

		// Field anh_daidien
		$advertising_info->anh_daidien->Upload->RemoveFromSession(); // Remove file value from Session
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
