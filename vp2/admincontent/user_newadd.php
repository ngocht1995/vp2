<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "user_newinfo.php" ?>
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
$user_new_add = new cuser_new_add();
$Page =& $user_new_add;

// Page init processing
$user_new_add->Page_Init();

// Page main processing
$user_new_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var user_new_add = new ew_Page("user_new_add");

// page properties
user_new_add.PageID = "add"; // page ID
var EW_PAGE_ID = user_new_add.PageID; // for backward compatibility

// extend page with ValidateForm function
user_new_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tieude_tintuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tieude Tintuc");
		elm = fobj.elements["x" + infix + "_tomtat_tintuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tomtat Tintuc");
		elm = fobj.elements["x" + infix + "_anh_tintuc"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
		elm = fobj.elements["x" + infix + "_noidung_tintuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Noidung Tintuc");
		elm = fobj.elements["x" + infix + "_hienthi_tungay"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Hienthi Tungay");
		elm = fobj.elements["x" + infix + "_hienthi_tungay"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Hienthi Tungay");
		elm = fobj.elements["x" + infix + "_hienthi_denngay"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Hienthi Denngay");
		elm = fobj.elements["x" + infix + "_hienthi_denngay"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Hienthi Denngay");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
user_new_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_new_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_new_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_new_add.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $user_new->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm danh mục tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $user_new_add->ShowMessage() ?>
<form name="fuser_newadd" id="fuser_newadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data">
<p>
<input type="hidden" name="t" id="t" value="user_new">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($user_new->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<tr<?php echo $user_new->tieude_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user_new->tieude_tintuc->CellAttributes() ?>><span id="el_tieude_tintuc">
<input type="text" name="x_tieude_tintuc" id="x_tieude_tintuc" size="100" maxlength="255" value="<?php echo $user_new->tieude_tintuc->EditValue ?>"<?php echo $user_new->tieude_tintuc->EditAttributes() ?>>
</span><?php echo $user_new->tieude_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->tukhoa_tintuc->Visible) { // tukhoa_tintuc ?>
	<tr<?php echo $user_new->tukhoa_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Từ khóa</td>
		<td<?php echo $user_new->tukhoa_tintuc->CellAttributes() ?>><span id="el_tukhoa_tintuc">
<input type="text" name="x_tukhoa_tintuc" id="x_tukhoa_tintuc" size="100" maxlength="255" value="<?php echo $user_new->tukhoa_tintuc->EditValue ?>"<?php echo $user_new->tukhoa_tintuc->EditAttributes() ?>>
</span><?php echo $user_new->tukhoa_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->tomtat_tintuc->Visible) { // tomtat_tintuc ?>
	<tr<?php echo $user_new->tomtat_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user_new->tomtat_tintuc->CellAttributes() ?>><span id="el_tomtat_tintuc">
<textarea name="x_tomtat_tintuc" id="x_tomtat_tintuc" cols="45" rows="6"<?php echo $user_new->tomtat_tintuc->EditAttributes() ?>><?php echo $user_new->tomtat_tintuc->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_tomtat_tintuc", function() {
	var sBasePath = 'fckeditor/';
	var oFCKeditor = new FCKeditor('x_tomtat_tintuc', 45*_width_multiplier, 4*_height_multiplier);
	oFCKeditor.BasePath = sBasePath;
	oFCKeditor.ReplaceTextarea();
	this.active = true;
}));
-->
</script>
</span><?php echo $user_new->tomtat_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->anh_tintuc->Visible) { // anh_tintuc ?>
	<tr<?php echo $user_new->anh_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $user_new->anh_tintuc->CellAttributes() ?>><span id="el_anh_tintuc">
<input type="file" name="x_anh_tintuc" id="x_anh_tintuc" size="30"<?php echo $user_new->anh_tintuc->EditAttributes() ?>>
</div>
</span><?php echo $user_new->anh_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->nguon_tintuc->Visible) { // nguon_tintuc ?>
	<tr<?php echo $user_new->nguon_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn nhập</td>
		<td<?php echo $user_new->nguon_tintuc->CellAttributes() ?>><span id="el_nguon_tintuc">
<input type="text" name="x_nguon_tintuc" id="x_nguon_tintuc" size="100" maxlength="255" value="<?php echo $user_new->nguon_tintuc->EditValue ?>"<?php echo $user_new->nguon_tintuc->EditAttributes() ?>>
</span><?php echo $user_new->nguon_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->noidung_tintuc->Visible) { // noidung_tintuc ?>
	<tr<?php echo $user_new->noidung_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user_new->noidung_tintuc->CellAttributes() ?>><span id="el_noidung_tintuc">
<textarea name="x_noidung_tintuc" id="x_noidung_tintuc" cols="45" rows="10"<?php echo $user_new->noidung_tintuc->EditAttributes() ?>><?php echo $user_new->noidung_tintuc->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_noidung_tintuc", function() {
	var sBasePath = 'fckeditor/';
	var oFCKeditor = new FCKeditor('x_noidung_tintuc', 45*_width_multiplier, 10*_height_multiplier);
	oFCKeditor.BasePath = sBasePath;
	oFCKeditor.ReplaceTextarea();
	this.active = true;
}));
-->
</script>
</span><?php echo $user_new->noidung_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->lienket_tintuc->Visible) { // lienket_tintuc ?>
	<tr<?php echo $user_new->lienket_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Liên kết tin</td>
		<td<?php echo $user_new->lienket_tintuc->CellAttributes() ?>><span id="el_lienket_tintuc">
<input type="text" name="x_lienket_tintuc" id="x_lienket_tintuc" size="100" maxlength="255" value="<?php echo $user_new->lienket_tintuc->EditValue ?>"<?php echo $user_new->lienket_tintuc->EditAttributes() ?>>
</span><?php echo $user_new->lienket_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->hienthi_tungay->Visible) { // hienthi_tungay ?>
	<tr<?php echo $user_new->hienthi_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị từ ngày<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user_new->hienthi_tungay->CellAttributes() ?>><span id="el_hienthi_tungay">
<input type="text" name="x_hienthi_tungay" id="x_hienthi_tungay" value="<?php echo $user_new->hienthi_tungay->EditValue ?>"<?php echo $user_new->hienthi_tungay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_hienthi_tungay" name="cal_x_hienthi_tungay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_hienthi_tungay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_hienthi_tungay" // ID of the button
});
</script>
</span><?php echo $user_new->hienthi_tungay->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user_new->hienthi_denngay->Visible) { // hienthi_denngay ?>
	<tr<?php echo $user_new->hienthi_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị đến ngày<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user_new->hienthi_denngay->CellAttributes() ?>><span id="el_hienthi_denngay">
<input type="text" name="x_hienthi_denngay" id="x_hienthi_denngay" value="<?php echo $user_new->hienthi_denngay->EditValue ?>"<?php echo $user_new->hienthi_denngay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_hienthi_denngay" name="cal_x_hienthi_denngay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_hienthi_denngay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_hienthi_denngay" // ID of the button
});
</script>
</span><?php echo $user_new->hienthi_denngay->CustomMsg ?></td>
	</tr>
<?php } ?>
<td class="ewTableHeader">Mã xác nhận</td>
	<td>
		<img src="securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle">
		<a href="securimage_play.php" style="font-size: 13px"><img src="images/audio_icon.gif" id="audio" align="absmiddle" border="0"></a><br>
		<a href="#" onclick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">Tải lại ảnh</a><br>
		<input type="text" name="x_maxacnhan" id="x_maxacnhan" size="30" maxlength="4">
	</td>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    Thêm mới    " onclick="ew_SubmitForm(user_new_add, this.form);">
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
class cuser_new_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'user_new';

	// Page Object Name
	var $PageObjName = 'user_new_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user_new;
		if ($user_new->UseTokenInUrl) $PageUrl .= "t=" . $user_new->TableVar . "&"; // add page token
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
		global $objForm, $user_new;
		if ($user_new->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user_new->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user_new->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_new_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["user_new"] = new cuser_new();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user_new', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user_new;
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
			$this->Page_Terminate("user_newlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("user_newlist.php");
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
		global $objForm, $gsFormError, $user_new;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["tintuc_id"] != "") {
		  $user_new->tintuc_id->setQueryStringValue($_GET["tintuc_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $user_new->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$user_new->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $user_new->CurrentAction = "C"; // Copy Record
		  } else {
		    $user_new->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($user_new->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("user_newlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$user_new->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Đã thêm tin"); // Set up success message
					$sReturnUrl = $user_new->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "user_newview.php")
						$sReturnUrl = $user_new->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$user_new->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $user_new;

		// Get upload data
			if ($user_new->anh_tintuc->Upload->UploadFile()) {

				// No action required
			} else {
				echo $user_new->anh_tintuc->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $user_new;
		$user_new->anh_tintuc->CurrentValue = NULL; // Clear file related field
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $user_new;
		$user_new->tieude_tintuc->setFormValue($objForm->GetValue("x_tieude_tintuc"));
		$user_new->tukhoa_tintuc->setFormValue($objForm->GetValue("x_tukhoa_tintuc"));
		$user_new->tomtat_tintuc->setFormValue($objForm->GetValue("x_tomtat_tintuc"));
		$user_new->nguon_tintuc->setFormValue($objForm->GetValue("x_nguon_tintuc"));
		$user_new->noidung_tintuc->setFormValue($objForm->GetValue("x_noidung_tintuc"));
		$user_new->lienket_tintuc->setFormValue($objForm->GetValue("x_lienket_tintuc"));
		$user_new->hienthi_tungay->setFormValue($objForm->GetValue("x_hienthi_tungay"));
		$user_new->hienthi_tungay->CurrentValue = ew_UnFormatDateTime($user_new->hienthi_tungay->CurrentValue, 7);
		$user_new->hienthi_denngay->setFormValue($objForm->GetValue("x_hienthi_denngay"));
		$user_new->hienthi_denngay->CurrentValue = ew_UnFormatDateTime($user_new->hienthi_denngay->CurrentValue, 7);
		$user_new->tintuc_id->setFormValue($objForm->GetValue("x_tintuc_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $user_new;
		$user_new->tintuc_id->CurrentValue = $user_new->tintuc_id->FormValue;
		$user_new->tieude_tintuc->CurrentValue = $user_new->tieude_tintuc->FormValue;
		$user_new->tukhoa_tintuc->CurrentValue = $user_new->tukhoa_tintuc->FormValue;
		$user_new->tomtat_tintuc->CurrentValue = $user_new->tomtat_tintuc->FormValue;
		$user_new->nguon_tintuc->CurrentValue = $user_new->nguon_tintuc->FormValue;
		$user_new->noidung_tintuc->CurrentValue = $user_new->noidung_tintuc->FormValue;
		$user_new->lienket_tintuc->CurrentValue = $user_new->lienket_tintuc->FormValue;
		$user_new->hienthi_tungay->CurrentValue = $user_new->hienthi_tungay->FormValue;
		$user_new->hienthi_tungay->CurrentValue = ew_UnFormatDateTime($user_new->hienthi_tungay->CurrentValue, 7);
		$user_new->hienthi_denngay->CurrentValue = $user_new->hienthi_denngay->FormValue;
		$user_new->hienthi_denngay->CurrentValue = ew_UnFormatDateTime($user_new->hienthi_denngay->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user_new;
		$sFilter = $user_new->KeyFilter();

		// Call Row Selecting event
		$user_new->Row_Selecting($sFilter);

		// Load sql based on filter
		$user_new->CurrentFilter = $sFilter;
		$sSql = $user_new->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user_new->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user_new;
		$user_new->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$user_new->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user_new->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$user_new->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$user_new->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$user_new->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$user_new->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$user_new->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$user_new->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$user_new->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$user_new->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$user_new->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$user_new->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$user_new->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$user_new->trang_thai->setDbValue($rs->fields('trang_thai'));
		$user_new->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$user_new->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user_new;

		// Call Row_Rendering event
		$user_new->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$user_new->tieude_tintuc->CellCssStyle = "";
		$user_new->tieude_tintuc->CellCssClass = "";

		// tukhoa_tintuc
		$user_new->tukhoa_tintuc->CellCssStyle = "";
		$user_new->tukhoa_tintuc->CellCssClass = "";

		// tomtat_tintuc
		$user_new->tomtat_tintuc->CellCssStyle = "";
		$user_new->tomtat_tintuc->CellCssClass = "";

		// anh_tintuc
		$user_new->anh_tintuc->CellCssStyle = "";
		$user_new->anh_tintuc->CellCssClass = "";

		// nguon_tintuc
		$user_new->nguon_tintuc->CellCssStyle = "";
		$user_new->nguon_tintuc->CellCssClass = "";

		// noidung_tintuc
		$user_new->noidung_tintuc->CellCssStyle = "";
		$user_new->noidung_tintuc->CellCssClass = "";

		// lienket_tintuc
		$user_new->lienket_tintuc->CellCssStyle = "";
		$user_new->lienket_tintuc->CellCssClass = "";

		// hienthi_tungay
		$user_new->hienthi_tungay->CellCssStyle = "";
		$user_new->hienthi_tungay->CellCssClass = "";

		// hienthi_denngay
		$user_new->hienthi_denngay->CellCssStyle = "";
		$user_new->hienthi_denngay->CellCssClass = "";
		if ($user_new->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$user_new->tieude_tintuc->ViewValue = $user_new->tieude_tintuc->CurrentValue;
			$user_new->tieude_tintuc->CssStyle = "";
			$user_new->tieude_tintuc->CssClass = "";
			$user_new->tieude_tintuc->ViewCustomAttributes = "";

			// tukhoa_tintuc
			$user_new->tukhoa_tintuc->ViewValue = $user_new->tukhoa_tintuc->CurrentValue;
			$user_new->tukhoa_tintuc->CssStyle = "";
			$user_new->tukhoa_tintuc->CssClass = "";
			$user_new->tukhoa_tintuc->ViewCustomAttributes = "";

			// tomtat_tintuc
			$user_new->tomtat_tintuc->ViewValue = $user_new->tomtat_tintuc->CurrentValue;
			$user_new->tomtat_tintuc->CssStyle = "";
			$user_new->tomtat_tintuc->CssClass = "";
			$user_new->tomtat_tintuc->ViewCustomAttributes = "";

			// anh_tintuc
			if (!is_null($user_new->anh_tintuc->Upload->DbValue)) {
				$user_new->anh_tintuc->ViewValue = $user_new->anh_tintuc->Upload->DbValue;
				$user_new->anh_tintuc->ImageWidth = 150;
				$user_new->anh_tintuc->ImageHeight = 0;
				$user_new->anh_tintuc->ImageAlt = "";
			} else {
				$user_new->anh_tintuc->ViewValue = "";
			}
			$user_new->anh_tintuc->CssStyle = "";
			$user_new->anh_tintuc->CssClass = "";
			$user_new->anh_tintuc->ViewCustomAttributes = "";

			// nguon_tintuc
			$user_new->nguon_tintuc->ViewValue = $user_new->nguon_tintuc->CurrentValue;
			$user_new->nguon_tintuc->CssStyle = "";
			$user_new->nguon_tintuc->CssClass = "";
			$user_new->nguon_tintuc->ViewCustomAttributes = "";

			// noidung_tintuc
			$user_new->noidung_tintuc->ViewValue = $user_new->noidung_tintuc->CurrentValue;
			$user_new->noidung_tintuc->CssStyle = "";
			$user_new->noidung_tintuc->CssClass = "";
			$user_new->noidung_tintuc->ViewCustomAttributes = "";

			// lienket_tintuc
			$user_new->lienket_tintuc->ViewValue = $user_new->lienket_tintuc->CurrentValue;
			$user_new->lienket_tintuc->CssStyle = "";
			$user_new->lienket_tintuc->CssClass = "";
			$user_new->lienket_tintuc->ViewCustomAttributes = "";

			// hienthi_tungay
			$user_new->hienthi_tungay->ViewValue = $user_new->hienthi_tungay->CurrentValue;
			$user_new->hienthi_tungay->ViewValue = ew_FormatDateTime($user_new->hienthi_tungay->ViewValue, 7);
			$user_new->hienthi_tungay->CssStyle = "";
			$user_new->hienthi_tungay->CssClass = "";
			$user_new->hienthi_tungay->ViewCustomAttributes = "";

			// hienthi_denngay
			$user_new->hienthi_denngay->ViewValue = $user_new->hienthi_denngay->CurrentValue;
			$user_new->hienthi_denngay->ViewValue = ew_FormatDateTime($user_new->hienthi_denngay->ViewValue, 7);
			$user_new->hienthi_denngay->CssStyle = "";
			$user_new->hienthi_denngay->CssClass = "";
			$user_new->hienthi_denngay->ViewCustomAttributes = "";

			// tieude_tintuc
			$user_new->tieude_tintuc->HrefValue = "";

			// tukhoa_tintuc
			$user_new->tukhoa_tintuc->HrefValue = "";

			// tomtat_tintuc
			$user_new->tomtat_tintuc->HrefValue = "";

			// anh_tintuc
			if (!is_null($user_new->anh_tintuc->Upload->DbValue)) {
				$user_new->anh_tintuc->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($user_new->anh_tintuc->ViewValue)) ? $user_new->anh_tintuc->ViewValue : $user_new->anh_tintuc->CurrentValue);
				if ($user_new->Export <> "") $user_new->anh_tintuc->HrefValue = ew_ConvertFullUrl($user_new->anh_tintuc->HrefValue);
			} else {
				$user_new->anh_tintuc->HrefValue = "";
			}

			// nguon_tintuc
			$user_new->nguon_tintuc->HrefValue = "";

			// noidung_tintuc
			$user_new->noidung_tintuc->HrefValue = "";

			// lienket_tintuc
			$user_new->lienket_tintuc->HrefValue = "";

			// hienthi_tungay
			$user_new->hienthi_tungay->HrefValue = "";

			// hienthi_denngay
			$user_new->hienthi_denngay->HrefValue = "";
		} elseif ($user_new->RowType == EW_ROWTYPE_ADD) { // Add row

			// tieude_tintuc
			$user_new->tieude_tintuc->EditCustomAttributes = "";
			$user_new->tieude_tintuc->EditValue = ew_HtmlEncode($user_new->tieude_tintuc->CurrentValue);

			// tukhoa_tintuc
			$user_new->tukhoa_tintuc->EditCustomAttributes = "";
			$user_new->tukhoa_tintuc->EditValue = ew_HtmlEncode($user_new->tukhoa_tintuc->CurrentValue);

			// tomtat_tintuc
			$user_new->tomtat_tintuc->EditCustomAttributes = "";
			$user_new->tomtat_tintuc->EditValue = ew_HtmlEncode($user_new->tomtat_tintuc->CurrentValue);

			// anh_tintuc
			$user_new->anh_tintuc->EditCustomAttributes = "";
			if (!is_null($user_new->anh_tintuc->Upload->DbValue)) {
				$user_new->anh_tintuc->EditValue = $user_new->anh_tintuc->Upload->DbValue;
				$user_new->anh_tintuc->ImageWidth = 150;
				$user_new->anh_tintuc->ImageHeight = 0;
				$user_new->anh_tintuc->ImageAlt = "";
			} else {
				$user_new->anh_tintuc->EditValue = "";
			}

			// nguon_tintuc
			$user_new->nguon_tintuc->EditCustomAttributes = "";
			$user_new->nguon_tintuc->EditValue = ew_HtmlEncode($user_new->nguon_tintuc->CurrentValue);

			// noidung_tintuc
			$user_new->noidung_tintuc->EditCustomAttributes = "";
			$user_new->noidung_tintuc->EditValue = ew_HtmlEncode($user_new->noidung_tintuc->CurrentValue);

			// lienket_tintuc
			$user_new->lienket_tintuc->EditCustomAttributes = "";
			$user_new->lienket_tintuc->EditValue = ew_HtmlEncode($user_new->lienket_tintuc->CurrentValue);

			// hienthi_tungay
			$user_new->hienthi_tungay->EditCustomAttributes = "";
			$user_new->hienthi_tungay->EditValue = ew_HtmlEncode(ew_FormatDateTime($user_new->hienthi_tungay->CurrentValue, 7));

			// hienthi_denngay
			$user_new->hienthi_denngay->EditCustomAttributes = "";
			$user_new->hienthi_denngay->EditValue = ew_HtmlEncode(ew_FormatDateTime($user_new->hienthi_denngay->CurrentValue, 7));
		}

		// Call Row Rendered event
		$user_new->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $user_new;

		// Initialize
		$gsFormError = "";
		/*if (!ew_CheckFileType($user_new->anh_tintuc->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($user_new->anh_tintuc->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($user_new->anh_tintuc->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($user_new->tieude_tintuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tieude Tintuc";
		}
		if ($user_new->tomtat_tintuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tomtat Tintuc";
		}
		if ($user_new->noidung_tintuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Noidung Tintuc";
		}
		if ($user_new->hienthi_tungay->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Hienthi Tungay";
		}
		if (!ew_CheckEuroDate($user_new->hienthi_tungay->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Tungay";
		}
		if ($user_new->hienthi_denngay->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Hienthi Denngay";
		}
		if (!ew_CheckEuroDate($user_new->hienthi_denngay->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Denngay";
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
		global $conn, $Security, $user_new;
		$rsnew = array();

		// Field tieude_tintuc
		$user_new->tieude_tintuc->SetDbValueDef($user_new->tieude_tintuc->CurrentValue, "");
		$rsnew['tieude_tintuc'] =& $user_new->tieude_tintuc->DbValue;

		// Field tukhoa_tintuc
		$user_new->tukhoa_tintuc->SetDbValueDef($user_new->tukhoa_tintuc->CurrentValue, NULL);
		$rsnew['tukhoa_tintuc'] =& $user_new->tukhoa_tintuc->DbValue;

		// Field tomtat_tintuc
		$user_new->tomtat_tintuc->SetDbValueDef($user_new->tomtat_tintuc->CurrentValue, "");
		$rsnew['tomtat_tintuc'] =& $user_new->tomtat_tintuc->DbValue;

		// Field anh_tintuc
		$user_new->anh_tintuc->Upload->SaveToSession(); // Save file value to Session
		if (is_null($user_new->anh_tintuc->Upload->Value)) {
			$rsnew['anh_tintuc'] = NULL;
		} else {
			$rsnew['anh_tintuc'] = ew_UploadFileNameEx(ew_UploadPathEx(True, EW_UPLOAD_DEST_PATH), $user_new->anh_tintuc->Upload->FileName);
		}

		// Field nguon_tintuc
		$user_new->nguon_tintuc->SetDbValueDef($user_new->nguon_tintuc->CurrentValue, NULL);
		$rsnew['nguon_tintuc'] =& $user_new->nguon_tintuc->DbValue;

		// Field noidung_tintuc
		$user_new->noidung_tintuc->SetDbValueDef($user_new->noidung_tintuc->CurrentValue, "");
		$rsnew['noidung_tintuc'] =& $user_new->noidung_tintuc->DbValue;

		// Field lienket_tintuc
		$user_new->lienket_tintuc->SetDbValueDef($user_new->lienket_tintuc->CurrentValue, NULL);
		$rsnew['lienket_tintuc'] =& $user_new->lienket_tintuc->DbValue;

		// Field hienthi_tungay
		$user_new->hienthi_tungay->SetDbValueDef(ew_UnFormatDateTime($user_new->hienthi_tungay->CurrentValue, 7), ew_CurrentDate());
		$rsnew['hienthi_tungay'] =& $user_new->hienthi_tungay->DbValue;

		// Field hienthi_denngay
		$user_new->hienthi_denngay->SetDbValueDef(ew_UnFormatDateTime($user_new->hienthi_denngay->CurrentValue, 7), ew_CurrentDate());
		$rsnew['hienthi_denngay'] =& $user_new->hienthi_denngay->DbValue;
		// Field thoi gian them
		$user_new->thoigian_them->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoigian_them'] =& $user_new->thoigian_them->DbValue;
		// 	Field thoi gian sua
		$user_new->thoigian_sua->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoigian_sua'] =& $user_new->thoigian_sua->DbValue;
		
		// Field nguoidung_id
		//if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['nguoidung_id'] = CurrentUserID();
		//}

		// Call Row Inserting event
		$bInsertRow = $user_new->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field anh_tintuc
			if (!is_null($user_new->anh_tintuc->Upload->Value)) {
				if ($user_new->anh_tintuc->Upload->FileName == $user_new->anh_tintuc->Upload->DbValue) { // Overwrite if same file name
					$user_new->anh_tintuc->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_tintuc'], TRUE);
					$user_new->anh_tintuc->Upload->DbValue = ""; // No need to delete any more
				} else {
					$user_new->anh_tintuc->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_tintuc'], FALSE);
				}
			}
			if ($user_new->anh_tintuc->Upload->Action == "2" || $user_new->anh_tintuc->Upload->Action == "3") { // Update/Remove
				if ($user_new->anh_tintuc->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $user_new->anh_tintuc->Upload->DbValue);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($user_new->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($user_new->CancelMessage <> "") {
				$this->setMessage($user_new->CancelMessage);
				$user_new->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$user_new->tintuc_id->setDbValue($conn->Insert_ID());
			$rsnew['tintuc_id'] =& $user_new->tintuc_id->DbValue;

			// Call Row Inserted event
			$user_new->Row_Inserted($rsnew);
		}

		// Field anh_tintuc
		$user_new->anh_tintuc->Upload->RemoveFromSession(); // Remove file value from Session
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
