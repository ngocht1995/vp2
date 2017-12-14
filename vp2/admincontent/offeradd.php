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
<?php include "securimage.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$offer_add = new coffer_add();
$Page =& $offer_add;

// Page init processing
$offer_add->Page_Init();

// Page main processing
$offer_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--
function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;


   for (i = 0; i < sText.length && IsNumber == true; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) == -1)
         {
         IsNumber = false;
         }
      }
   var Number_ = parseInt(sText);
   if (Number_<1000) {IsNumber = false;}
   return IsNumber;

   }
// Create page object
var offer_add = new ew_Page("offer_add");

// page properties
offer_add.PageID = "add"; // page ID
var EW_PAGE_ID = offer_add.PageID; // for backward compatibility

// extend page with ValidateForm function
offer_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tieude_chaohang"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập tiêu đề chào hàng");
		elm = fobj.elements["x" + infix + "_anh_chaohang"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "Sai định dạng file ảnh");
		elm = fobj.elements["x" + infix + "_kieu_chaohang"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa chọn kiểu chào hàng");
		elm = fobj.elements["x" + infix + "_nganhnghe_id"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa chọn ngành nghề");
		elm = fobj.elements["x" + infix + "_thoihan_tungay"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập thời gian bắt đầu");
		elm = fobj.elements["x" + infix + "_thoihan_tungay"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Thời gian sai định dạng");
		elm = fobj.elements["x" + infix + "_thoihan_denngay"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập thời gian kết thúc");
		elm = fobj.elements["x" + infix + "_thoihan_denngay"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Thời gian sai định dạng");
		elm = fobj.elements["x" + infix + "_noidung_chaohang"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập nội dung chào hàng");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
offer_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
offer_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
offer_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
offer_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {			
			var inst;			
			for (inst in FCKeditorAPI.__Instances)
				FCKeditorAPI.__Instances[inst].UpdateLinkedField();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {
		var inst = FCKeditorAPI.GetInstance(name);		
		if (inst)
			inst.SetHTML(inst.LinkedField.value)
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {
		var inst = FCKeditorAPI.GetInstance(name);	
		if (inst && inst.EditorWindow) {
			inst.EditorWindow.focus();
		}
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
								<a href="<?php echo $offer->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $offer_add->ShowMessage() ?>
<form name="fofferadd" id="fofferadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return offer_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="offer">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
	<tr<?php echo $offer->tieude_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề chào hàng<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $offer->tieude_chaohang->CellAttributes() ?>><span id="el_tieude_chaohang">
<input type="text" name="x_tieude_chaohang" id="x_tieude_chaohang" size="120" maxlength="255" value="<?php echo $offer->tieude_chaohang->EditValue ?>"<?php echo $offer->tieude_chaohang->EditAttributes() ?>>
</span><?php echo $offer->tieude_chaohang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->anh_chaohang->Visible) { // anh_chaohang ?>
	<tr<?php echo $offer->anh_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh chào hàng</td>
		<td<?php echo $offer->anh_chaohang->CellAttributes() ?>><span id="el_anh_chaohang">
<input type="file" name="x_anh_chaohang" id="x_anh_chaohang" size="30"<?php echo $offer->anh_chaohang->EditAttributes() ?>>
</div>
</span><?php echo $offer->anh_chaohang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
	<tr<?php echo $offer->kieu_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu chào hàng<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $offer->kieu_chaohang->CellAttributes() ?>><span id="el_kieu_chaohang">
<select id="x_kieu_chaohang" name="x_kieu_chaohang"<?php echo $offer->kieu_chaohang->EditAttributes() ?>>
<?php
if (is_array($offer->kieu_chaohang->EditValue)) {
	$arwrk = $offer->kieu_chaohang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->kieu_chaohang->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $offer->kieu_chaohang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<tr<?php echo $offer->nganhnghe_id->RowAttributes ?>>
		<td class="ewTableHeader">Ngành nghề<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $offer->nganhnghe_id->CellAttributes() ?>><span id="el_nganhnghe_id">
<select id="x_nganhnghe_id" name="x_nganhnghe_id"<?php echo $offer->nganhnghe_id->EditAttributes() ?>>
<?php
if (is_array($offer->nganhnghe_id->EditValue)) {
	$arwrk = $offer->nganhnghe_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->nganhnghe_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $offer->nganhnghe_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->thoihan_tungay->Visible) { // thoihan_tungay ?>
	<tr<?php echo $offer->thoihan_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian bắt đầu<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $offer->thoihan_tungay->CellAttributes() ?>><span id="el_thoihan_tungay">
<input type="text" name="x_thoihan_tungay" id="x_thoihan_tungay" value="<?php echo $offer->thoihan_tungay->EditValue ?>"<?php echo $offer->thoihan_tungay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoihan_tungay" name="cal_x_thoihan_tungay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoihan_tungay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoihan_tungay" // ID of the button
});
</script>
</span><?php echo $offer->thoihan_tungay->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->thoihan_denngay->Visible) { // thoihan_denngay ?>
	<tr<?php echo $offer->thoihan_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian kết thúc<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $offer->thoihan_denngay->CellAttributes() ?>><span id="el_thoihan_denngay">
<input type="text" name="x_thoihan_denngay" id="x_thoihan_denngay" value="<?php echo $offer->thoihan_denngay->EditValue ?>"<?php echo $offer->thoihan_denngay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoihan_denngay" name="cal_x_thoihan_denngay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoihan_denngay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoihan_denngay" // ID of the button
});
</script>
</span><?php echo $offer->thoihan_denngay->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->noidung_chaohang->Visible) { // noidung_chaohang ?>
	<tr<?php echo $offer->noidung_chaohang->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung chào hàng<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $offer->noidung_chaohang->CellAttributes() ?>><span id="el_noidung_chaohang">
<textarea name="x_noidung_chaohang" id="x_noidung_chaohang" cols="160" rows="12"<?php echo $offer->noidung_chaohang->EditAttributes() ?>><?php echo $offer->noidung_chaohang->EditValue ?></textarea>

</span><?php echo $offer->noidung_chaohang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($offer->xuat_su->Visible) { // xuat_su ?>
	<tr<?php echo $offer->xuat_su->RowAttributes ?>>
		<td class="ewTableHeader">Xuất sứ</td>
		<td<?php echo $offer->xuat_su->CellAttributes() ?>><span id="el_xuat_su">
<input type="text" name="x_xuat_su" id="x_xuat_su" size="30" maxlength="45" value="<?php echo $offer->xuat_su->EditValue ?>"<?php echo $offer->xuat_su->EditAttributes() ?>>
</span><?php echo $offer->xuat_su->CustomMsg ?></td>
	</tr>
<?php } ?>
        <tr>
        <td class="ewTableHeader">Mã xác nhận</td>
	<td>
		<img src="securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle">
		<a href="securimage_play.php" style="font-size: 13px"><img src="images/audio_icon.gif" id="audio" align="absmiddle" border="0"></a><br>
		<a href="#" onclick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">Tải lại ảnh</a><br>
		<input type="text" name="x_maxacnhan" id="x_maxacnhan" size="30" maxlength="4">
	</td>
        </tr>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    Thêm mới    " onclick="ew_SubmitForm(offer_add, this.form);">
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
class coffer_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'offer';

	// Page Object Name
	var $PageObjName = 'offer_add';

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
	function coffer_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["offer"] = new coffer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

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
		if (!$Security->CanAdd()) {
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
	var $x_ewPriv = 0;

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $offer;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["chaohang_id"] != "") {
		  $offer->chaohang_id->setQueryStringValue($_GET["chaohang_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $offer->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$offer->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $offer->CurrentAction = "C"; // Copy Record
		  } else {
		    $offer->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($offer->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage(""); // No record found
		      $this->Page_Terminate("offerlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$offer->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Đã thêm thông tin chào hàng"); // Set up success message
					$sReturnUrl = $offer->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "offerview.php")
						$sReturnUrl = $offer->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$offer->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $offer;

		// Get upload data
			if ($offer->anh_chaohang->Upload->UploadFile()) {

				// No action required
			} else {
				echo $offer->anh_chaohang->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $offer;
		$offer->anh_chaohang->CurrentValue = NULL; // Clear file related field
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $offer;
		$offer->tieude_chaohang->setFormValue($objForm->GetValue("x_tieude_chaohang"));
		$offer->kieu_chaohang->setFormValue($objForm->GetValue("x_kieu_chaohang"));
		$offer->nganhnghe_id->setFormValue($objForm->GetValue("x_nganhnghe_id"));
		$offer->thoihan_tungay->setFormValue($objForm->GetValue("x_thoihan_tungay"));
		$offer->thoihan_tungay->CurrentValue = ew_UnFormatDateTime($offer->thoihan_tungay->CurrentValue, 7);
		$offer->thoihan_denngay->setFormValue($objForm->GetValue("x_thoihan_denngay"));
		$offer->thoihan_denngay->CurrentValue = ew_UnFormatDateTime($offer->thoihan_denngay->CurrentValue, 7);
		$offer->noidung_chaohang->setFormValue($objForm->GetValue("x_noidung_chaohang"));
		$offer->tg_themchaohang->setFormValue($objForm->GetValue("x_tg_themchaohang"));
		$offer->tg_themchaohang->CurrentValue = ew_UnFormatDateTime($offer->tg_themchaohang->CurrentValue, 7);
		$offer->tg_suachaohang->setFormValue($objForm->GetValue("x_tg_suachaohang"));
		$offer->tg_suachaohang->CurrentValue = ew_UnFormatDateTime($offer->tg_suachaohang->CurrentValue, 7);
		$offer->xuat_su->setFormValue($objForm->GetValue("x_xuat_su"));
		$offer->chaohang_id->setFormValue($objForm->GetValue("x_chaohang_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $offer;
		$offer->chaohang_id->CurrentValue = $offer->chaohang_id->FormValue;
		$offer->tieude_chaohang->CurrentValue = $offer->tieude_chaohang->FormValue;
		$offer->kieu_chaohang->CurrentValue = $offer->kieu_chaohang->FormValue;
		$offer->nganhnghe_id->CurrentValue = $offer->nganhnghe_id->FormValue;
		$offer->thoihan_tungay->CurrentValue = $offer->thoihan_tungay->FormValue;
		$offer->thoihan_tungay->CurrentValue = ew_UnFormatDateTime($offer->thoihan_tungay->CurrentValue, 7);
		$offer->thoihan_denngay->CurrentValue = $offer->thoihan_denngay->FormValue;
		$offer->thoihan_denngay->CurrentValue = ew_UnFormatDateTime($offer->thoihan_denngay->CurrentValue, 7);
		$offer->noidung_chaohang->CurrentValue = $offer->noidung_chaohang->FormValue;
		$offer->tg_themchaohang->CurrentValue = $offer->tg_themchaohang->FormValue;
		$offer->tg_themchaohang->CurrentValue = ew_UnFormatDateTime($offer->tg_themchaohang->CurrentValue, 7);
		$offer->tg_suachaohang->CurrentValue = $offer->tg_suachaohang->FormValue;
		$offer->tg_suachaohang->CurrentValue = ew_UnFormatDateTime($offer->tg_suachaohang->CurrentValue, 7);
		$offer->xuat_su->CurrentValue = $offer->xuat_su->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $offer;
		$sFilter = $offer->KeyFilter();

		// Call Row Selecting event
		$offer->Row_Selecting($sFilter);

		// Load sql based on filter
		$offer->CurrentFilter = $sFilter;
		$sSql = $offer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$offer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $offer;
		$offer->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$offer->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$offer->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$offer->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$offer->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$offer->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$offer->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$offer->thoihan_tungay->setDbValue($rs->fields('thoihan_tungay'));
		$offer->thoihan_denngay->setDbValue($rs->fields('thoihan_denngay'));
		$offer->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$offer->tg_themchaohang->setDbValue($rs->fields('tg_themchaohang'));
		$offer->tg_suachaohang->setDbValue($rs->fields('tg_suachaohang'));
		$offer->trang_thai->setDbValue($rs->fields('trang_thai'));
		$offer->xuatban->setDbValue($rs->fields('xuatban'));
		$offer->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
		$offer->xuat_su->setDbValue($rs->fields('xuat_su'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $offer;

		// Call Row_Rendering event
		$offer->Row_Rendering();

		// Common render codes for all row types
		// tieude_chaohang

		$offer->tieude_chaohang->CellCssStyle = "";
		$offer->tieude_chaohang->CellCssClass = "";

		// anh_chaohang
		$offer->anh_chaohang->CellCssStyle = "";
		$offer->anh_chaohang->CellCssClass = "";

		// kieu_chaohang
		$offer->kieu_chaohang->CellCssStyle = "";
		$offer->kieu_chaohang->CellCssClass = "";

		// nganhnghe_id
		$offer->nganhnghe_id->CellCssStyle = "";
		$offer->nganhnghe_id->CellCssClass = "";

		// thoihan_tungay
		$offer->thoihan_tungay->CellCssStyle = "";
		$offer->thoihan_tungay->CellCssClass = "";

		// thoihan_denngay
		$offer->thoihan_denngay->CellCssStyle = "";
		$offer->thoihan_denngay->CellCssClass = "";

		// noidung_chaohang
		$offer->noidung_chaohang->CellCssStyle = "";
		$offer->noidung_chaohang->CellCssClass = "";

		// tg_themchaohang
		$offer->tg_themchaohang->CellCssStyle = "";
		$offer->tg_themchaohang->CellCssClass = "";

		// tg_suachaohang
		$offer->tg_suachaohang->CellCssStyle = "";
		$offer->tg_suachaohang->CellCssClass = "";

		// xuat_su
		$offer->xuat_su->CellCssStyle = "";
		$offer->xuat_su->CellCssClass = "";
		if ($offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_chaohang
			$offer->tieude_chaohang->ViewValue = $offer->tieude_chaohang->CurrentValue;
			$offer->tieude_chaohang->CssStyle = "";
			$offer->tieude_chaohang->CssClass = "";
			$offer->tieude_chaohang->ViewCustomAttributes = "";

			// anh_chaohang
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->ViewValue = $offer->anh_chaohang->Upload->DbValue;
				$offer->anh_chaohang->ImageWidth = 150;
				$offer->anh_chaohang->ImageHeight = 0;
				$offer->anh_chaohang->ImageAlt = "";
			} else {
				$offer->anh_chaohang->ViewValue = "";
			}
			$offer->anh_chaohang->CssStyle = "";
			$offer->anh_chaohang->CssClass = "";
			$offer->anh_chaohang->ViewCustomAttributes = "";

			// kieu_chaohang
			if (strval($offer->kieu_chaohang->CurrentValue) <> "") {
				switch ($offer->kieu_chaohang->CurrentValue) {
					case "1":
						$offer->kieu_chaohang->ViewValue = "Chào mua";
						break;
					case "2":
						$offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					default:
						$offer->kieu_chaohang->ViewValue = $offer->kieu_chaohang->CurrentValue;
				}
			} else {
				$offer->kieu_chaohang->ViewValue = NULL;
			}
			$offer->kieu_chaohang->CssStyle = "";
			$offer->kieu_chaohang->CssClass = "";
			$offer->kieu_chaohang->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($offer->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($offer->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$offer->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$offer->nganhnghe_id->ViewValue = $offer->nganhnghe_id->CurrentValue;
				}
			} else {
				$offer->nganhnghe_id->ViewValue = NULL;
			}
			$offer->nganhnghe_id->CssStyle = "";
			$offer->nganhnghe_id->CssClass = "";
			$offer->nganhnghe_id->ViewCustomAttributes = "";

			// thoihan_tungay
			$offer->thoihan_tungay->ViewValue = $offer->thoihan_tungay->CurrentValue;
			$offer->thoihan_tungay->ViewValue = ew_FormatDateTime($offer->thoihan_tungay->ViewValue, 7);
			$offer->thoihan_tungay->CssStyle = "";
			$offer->thoihan_tungay->CssClass = "";
			$offer->thoihan_tungay->ViewCustomAttributes = "";

			// thoihan_denngay
			$offer->thoihan_denngay->ViewValue = $offer->thoihan_denngay->CurrentValue;
			$offer->thoihan_denngay->ViewValue = ew_FormatDateTime($offer->thoihan_denngay->ViewValue, 7);
			$offer->thoihan_denngay->CssStyle = "";
			$offer->thoihan_denngay->CssClass = "";
			$offer->thoihan_denngay->ViewCustomAttributes = "";

			// noidung_chaohang
			$offer->noidung_chaohang->ViewValue = $offer->noidung_chaohang->CurrentValue;
			$offer->noidung_chaohang->CssStyle = "";
			$offer->noidung_chaohang->CssClass = "";
			$offer->noidung_chaohang->ViewCustomAttributes = "";

			// tg_themchaohang
			$offer->tg_themchaohang->ViewValue = $offer->tg_themchaohang->CurrentValue;
			$offer->tg_themchaohang->ViewValue = ew_FormatDateTime($offer->tg_themchaohang->ViewValue, 7);
			$offer->tg_themchaohang->CssStyle = "";
			$offer->tg_themchaohang->CssClass = "";
			$offer->tg_themchaohang->ViewCustomAttributes = "";

			// tg_suachaohang
			$offer->tg_suachaohang->ViewValue = $offer->tg_suachaohang->CurrentValue;
			$offer->tg_suachaohang->ViewValue = ew_FormatDateTime($offer->tg_suachaohang->ViewValue, 7);
			$offer->tg_suachaohang->CssStyle = "";
			$offer->tg_suachaohang->CssClass = "";
			$offer->tg_suachaohang->ViewCustomAttributes = "";

			// xuat_su
			$offer->xuat_su->ViewValue = $offer->xuat_su->CurrentValue;
			$offer->xuat_su->CssStyle = "";
			$offer->xuat_su->CssClass = "";
			$offer->xuat_su->ViewCustomAttributes = "";

			// tieude_chaohang
			$offer->tieude_chaohang->HrefValue = "";

			// anh_chaohang
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($offer->anh_chaohang->ViewValue)) ? $offer->anh_chaohang->ViewValue : $offer->anh_chaohang->CurrentValue);
				if ($offer->Export <> "") $offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($offer->anh_chaohang->HrefValue);
			} else {
				$offer->anh_chaohang->HrefValue = "";
			}

			// kieu_chaohang
			$offer->kieu_chaohang->HrefValue = "";

			// nganhnghe_id
			$offer->nganhnghe_id->HrefValue = "";

			// thoihan_tungay
			$offer->thoihan_tungay->HrefValue = "";

			// thoihan_denngay
			$offer->thoihan_denngay->HrefValue = "";

			// noidung_chaohang
			$offer->noidung_chaohang->HrefValue = "";

			// tg_themchaohang
			$offer->tg_themchaohang->HrefValue = "";

			// tg_suachaohang
			$offer->tg_suachaohang->HrefValue = "";

			// xuat_su
			$offer->xuat_su->HrefValue = "";
		} elseif ($offer->RowType == EW_ROWTYPE_ADD) { // Add row

			// tieude_chaohang
			$offer->tieude_chaohang->EditCustomAttributes = "";
			$offer->tieude_chaohang->EditValue = ew_HtmlEncode($offer->tieude_chaohang->CurrentValue);

			// anh_chaohang
			$offer->anh_chaohang->EditCustomAttributes = "";
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->EditValue = $offer->anh_chaohang->Upload->DbValue;
				$offer->anh_chaohang->ImageWidth = 150;
				$offer->anh_chaohang->ImageHeight = 0;
				$offer->anh_chaohang->ImageAlt = "";
			} else {
				$offer->anh_chaohang->EditValue = "";
			}

			// kieu_chaohang
			$offer->kieu_chaohang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chào mua");
			$arwrk[] = array("2", "Chào bán");
			array_unshift($arwrk, array("", "Chọn"));
			$offer->kieu_chaohang->EditValue = $arwrk;

			// nganhnghe_id
			$offer->nganhnghe_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
			if (trim(strval($offer->nganhnghe_id->CurrentValue)) == "") {
				$sWhereWrk = "nganhnghe_belongto=-1";
			} else {
				$sWhereWrk = "`nganhnghe_id` = " . ew_AdjustSql($offer->nganhnghe_id->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$sSqlWrk1 = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
			$sWhereWrk1 = "nganhnghe_belongto=0";
			if ($sWhereWrk1 <> "") $sSqlWrk1 .= " WHERE $sWhereWrk1";
			$rswrk1 = $conn->Execute($sSqlWrk1);
			while (!$rswrk1->EOF){
			array_push($arwrk, array($rswrk1->fields['nganhnghe_id'], "-".$rswrk1->fields['nganhnghe_ten']));
			$sSqlWrk2 = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
				$sWhereWrk2 = "nganhnghe_belongto=".$rswrk1->fields['nganhnghe_id'];
				if ($sWhereWrk2 <> "") $sSqlWrk2 .= " WHERE $sWhereWrk2";
			$rswrk2 = $conn->Execute($sSqlWrk2);
			while (!$rswrk2->EOF){
			array_push($arwrk, array($rswrk2->fields['nganhnghe_id'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+".$rswrk2->fields['nganhnghe_ten']));
				$rswrk2->MoveNext();
				}
				if ($rswrk2) $rswrk2->Close();
				$rswrk1->MoveNext();
						}

			array_unshift($arwrk, array("", "Chọn"));
			$offer->nganhnghe_id->EditValue = $arwrk;

			// thoihan_tungay
			$offer->thoihan_tungay->EditCustomAttributes = "";
			$offer->thoihan_tungay->EditValue = ew_HtmlEncode(ew_FormatDateTime($offer->thoihan_tungay->CurrentValue, 7));

			// thoihan_denngay
			$offer->thoihan_denngay->EditCustomAttributes = "";
			$offer->thoihan_denngay->EditValue = ew_HtmlEncode(ew_FormatDateTime($offer->thoihan_denngay->CurrentValue, 7));

			// noidung_chaohang
			$offer->noidung_chaohang->EditCustomAttributes = "";
			$offer->noidung_chaohang->EditValue = ew_HtmlEncode($offer->noidung_chaohang->CurrentValue);

			// tg_themchaohang
			// tg_suachaohang
			// xuat_su

			$offer->xuat_su->EditCustomAttributes = "";
			$offer->xuat_su->EditValue = ew_HtmlEncode($offer->xuat_su->CurrentValue);
		}

		// Call Row Rendered event
		$offer->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $conn,$gsFormError, $offer;

		// Initialize
		$gsFormError = "";
                //check nganh hang
                $sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_belongto` FROM `career`";
		$sWhereWrk = "`nganhnghe_id` = " . ew_AdjustSql($offer->nganhnghe_id->CurrentValue) . "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
                 if ($arwrk[0][1] == 0) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Loại sản phẩm phải thuộc danh mục ngành nghề cấp 2";
		}
		/*if (!ew_CheckFileType($offer->anh_chaohang->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($offer->anh_chaohang->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($offer->anh_chaohang->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Max. file size (%s bytes) exceeded.");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($offer->tieude_chaohang->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Tieu de";
		}
		if ($offer->kieu_chaohang->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - kieu chao hang";
		}
		if ($offer->nganhnghe_id->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Nganhnghe Id";
		}
		if ($offer->thoihan_tungay->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Thoi gian bat dau";
		}
		if (!ew_CheckEuroDate($offer->thoihan_tungay->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Thoi gian bat dau";
		}
		if ($offer->thoihan_denngay->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - thoi gian ket thuc";
		}
		if (!ew_CheckEuroDate($offer->thoihan_denngay->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - thoi gian ket thuc";
		}
		if ($offer->noidung_chaohang->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Noidung Chaohang";
		}*/
			$img = new Securimage();
  			$valid = $img->check($_POST['x_maxacnhan']);
  			if($valid == true) {

 			} else {
    			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Mã xác nhận không đúng";
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
		global $conn, $Security, $offer;
		$rsnew = array();

		// Field tieude_chaohang
		$offer->tieude_chaohang->SetDbValueDef($offer->tieude_chaohang->CurrentValue, NULL);
		$rsnew['tieude_chaohang'] =& $offer->tieude_chaohang->DbValue;

		// Field anh_chaohang
		$offer->anh_chaohang->Upload->SaveToSession(); // Save file value to Session
		if (is_null($offer->anh_chaohang->Upload->Value)) {
			$rsnew['anh_chaohang'] = NULL;
		} else {
			$rsnew['anh_chaohang'] = ew_UploadFileNameEx(ew_UploadPathEx(True, EW_UPLOAD_DEST_PATH), $offer->anh_chaohang->Upload->FileName);
		}

		// Field kieu_chaohang
		$offer->kieu_chaohang->SetDbValueDef($offer->kieu_chaohang->CurrentValue,0);
		$rsnew['kieu_chaohang'] =& $offer->kieu_chaohang->DbValue;

		// Field nganhnghe_id
		$offer->nganhnghe_id->SetDbValueDef($offer->nganhnghe_id->CurrentValue, 0);
		$rsnew['nganhnghe_id'] =& $offer->nganhnghe_id->DbValue;

		// Field thoihan_tungay
		$offer->thoihan_tungay->SetDbValueDef(ew_UnFormatDateTime($offer->thoihan_tungay->CurrentValue, 7), ew_CurrentDate());
		$rsnew['thoihan_tungay'] =& $offer->thoihan_tungay->DbValue;

		// Field thoihan_denngay
		$offer->thoihan_denngay->SetDbValueDef(ew_UnFormatDateTime($offer->thoihan_denngay->CurrentValue, 7), ew_CurrentDate());
		$rsnew['thoihan_denngay'] =& $offer->thoihan_denngay->DbValue;

		// Field noidung_chaohang
		$offer->noidung_chaohang->SetDbValueDef($offer->noidung_chaohang->CurrentValue, NULL);
		$rsnew['noidung_chaohang'] =& $offer->noidung_chaohang->DbValue;

		// Field tg_themchaohang
		$offer->tg_themchaohang->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['tg_themchaohang'] =& $offer->tg_themchaohang->DbValue;

		// Field tg_suachaohang
		$offer->tg_suachaohang->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['tg_suachaohang'] =& $offer->tg_suachaohang->DbValue;

		// Field xuat_su
		$offer->xuat_su->SetDbValueDef($offer->xuat_su->CurrentValue, "");
		$rsnew['xuat_su'] =& $offer->xuat_su->DbValue;

		// Field nguoidung_id
		if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['nguoidung_id'] = CurrentUserID();
		}

		// Call Row Inserting event
		$bInsertRow = $offer->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field anh_chaohang
			if (!is_null($offer->anh_chaohang->Upload->Value)) {
				if ($offer->anh_chaohang->Upload->FileName == $offer->anh_chaohang->Upload->DbValue) { // Overwrite if same file name
					$offer->anh_chaohang->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_chaohang'], TRUE);
					$offer->anh_chaohang->Upload->DbValue = ""; // No need to delete any more
				} else {
					$offer->anh_chaohang->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_chaohang'], FALSE);
				}
			}
			if ($offer->anh_chaohang->Upload->Action == "2" || $offer->anh_chaohang->Upload->Action == "3") { // Update/Remove
				if ($offer->anh_chaohang->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $offer->anh_chaohang->Upload->DbValue);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($offer->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($offer->CancelMessage <> "") {
				$this->setMessage($offer->CancelMessage);
				$offer->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$offer->chaohang_id->setDbValue($conn->Insert_ID());
			$rsnew['chaohang_id'] =& $offer->chaohang_id->DbValue;

			// Call Row Inserted event
			$offer->Row_Inserted($rsnew);
		}

		// Field anh_chaohang
		$offer->anh_chaohang->Upload->RemoveFromSession(); // Remove file value from Session
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
