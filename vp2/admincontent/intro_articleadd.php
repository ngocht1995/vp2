<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_articleinfo.php" ?>
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
$intro_article_add = new cintro_article_add();
$Page =& $intro_article_add;

// Page init processing
$intro_article_add->Page_Init();

// Page main processing
$intro_article_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var intro_article_add = new ew_Page("intro_article_add");

// page properties
intro_article_add.PageID = "add"; // page ID
var EW_PAGE_ID = intro_article_add.PageID; // for backward compatibility

// extend page with ValidateForm function
intro_article_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_chuyenmuc_id"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Chuyên mục");
		elm = fobj.elements["x" + infix + "_tieude_baiviet"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tiêu đề");
		elm = fobj.elements["x" + infix + "_tomtat_baiviet"];
                elm1 = fobj.elements["x" + infix + "_noidung_baiviet"];
		if (elm && !ew_HasValue(elm)&&elm1 && !ew_HasValue(elm1))
			return ew_OnError(this, elm, "Chưa nhập - Trích dẫn hoặc nội dung tin");
                    elm = fobj.elements["x" + infix + "_anh_daidien"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
                    
                elm = fobj.elements["x" + infix + "_begin_date"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập thời gian bắt đầu thông báo");
		elm = fobj.elements["x" + infix + "_begin_date"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Định dạng ngày tháng dd/mm/yyyy");
		elm = fobj.elements["x" + infix + "_end_date"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập thời gian kết thúc thông báo");
		elm = fobj.elements["x" + infix + "_end_date"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Định dạng ngày tháng dd/mm/yyyy");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
intro_article_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_article_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_article_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_article_add.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $intro_article->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm bài viết</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $intro_article_add->ShowMessage() ?>
<form name="fintro_articleadd" id="fintro_articleadd" action="<?php echo ew_CurrentPage() ?>" method="post"  enctype="multipart/form-data" onsubmit="return intro_article_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="intro_article">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($intro_article->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
	<tr<?php echo $intro_article->chuyenmuc_id->RowAttributes ?>>
		<td class="ewTableHeader">Chuyên mục bài viết<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $intro_article->chuyenmuc_id->CellAttributes() ?>><span id="el_chuyenmuc_id">
<select id="x_chuyenmuc_id" name="x_chuyenmuc_id"<?php echo $intro_article->chuyenmuc_id->EditAttributes() ?>>
<?php
if (is_array($intro_article->chuyenmuc_id->EditValue)) {
	$arwrk = $intro_article->chuyenmuc_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($intro_article->chuyenmuc_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $intro_article->chuyenmuc_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->begin_date->Visible) { // begin_date ?>
	<tr<?php echo $intro_article->begin_date->RowAttributes ?>>
		<td class="ewTableHeader">Begin Date<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $intro_article->begin_date->CellAttributes() ?>><span id="el_begin_date">
<input type="text" name="x_begin_date" id="x_begin_date" value="<?php echo $intro_article->begin_date->EditValue ?>"<?php echo $intro_article->begin_date->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_begin_date" name="cal_x_begin_date" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_begin_date", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_begin_date" // ID of the button
});
</script>
</span><?php echo $intro_article->begin_date->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->end_date->Visible) { // end_date ?>
	<tr<?php echo $intro_article->end_date->RowAttributes ?>>
		<td class="ewTableHeader">End Date<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $intro_article->end_date->CellAttributes() ?>><span id="el_end_date">
<input type="text" name="x_end_date" id="x_end_date" value="<?php echo $intro_article->end_date->EditValue ?>"<?php echo $intro_article->end_date->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_end_date" name="cal_x_end_date" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_end_date", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_end_date" // ID of the button
});
</script>
</span><?php echo $intro_article->end_date->CustomMsg ?></td>
	</tr>
<?php } ?> 
<?php if ($intro_article->tieude_baiviet->Visible) { // tieude_baiviet ?>
	<tr<?php echo $intro_article->tieude_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $intro_article->tieude_baiviet->CellAttributes() ?>><span id="el_tieude_baiviet">
<input type="text" name="x_tieude_baiviet" id="x_tieude_baiviet" size="100" maxlength="255" value="<?php echo $intro_article->tieude_baiviet->EditValue ?>"<?php echo $intro_article->tieude_baiviet->EditAttributes() ?>>
</span><?php echo $intro_article->tieude_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->tukhoa_baiviet->Visible) { // tukhoa_baiviet ?>
	<tr<?php echo $intro_article->tukhoa_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Từ khóa</td>
		<td<?php echo $intro_article->tukhoa_baiviet->CellAttributes() ?>><span id="el_tukhoa_baiviet">
<input type="text" name="x_tukhoa_baiviet" id="x_tukhoa_baiviet" size="100" maxlength="255" value="<?php echo $intro_article->tukhoa_baiviet->EditValue ?>"<?php echo $intro_article->tukhoa_baiviet->EditAttributes() ?>>
</span><?php echo $intro_article->tukhoa_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($intro_article->anh_daidien->Visible) { // anh_daidien ?>
	<tr<?php echo $intro_article->anh_daidien->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Ảnh');?></td>
		<td<?php echo $intro_article->anh_daidien->CellAttributes() ?>><span id="el_anh_daidien">
<input type="file" name="x_anh_daidien" id="x_anh_daidien" size="30"<?php echo $intro_article->anh_daidien->EditAttributes() ?>>
</div>
</span><?php echo $intro_article->anh_daidien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->tomtat_baiviet->Visible) { // tomtat_baiviet ?>
	<tr<?php echo $intro_article->tomtat_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn<span class="ewRequired">&nbsp;</span></td>
		<td<?php echo $intro_article->tomtat_baiviet->CellAttributes() ?>><span id="el_tomtat_baiviet">
<textarea name="x_tomtat_baiviet" id="x_tomtat_baiviet" cols="50" rows="7"<?php echo $intro_article->tomtat_baiviet->EditAttributes() ?>><?php echo $intro_article->tomtat_baiviet->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_tomtat_baiviet", function() {
	var oCKeditor = CKEDITOR.replace('x_tomtat_baiviet', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $intro_article->tomtat_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->noidung_baiviet->Visible) { // noidung_baiviet ?>
	<tr<?php echo $intro_article->noidung_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung<span class="ewRequired">&nbsp;</span></td>
		<td<?php echo $intro_article->noidung_baiviet->CellAttributes() ?>><span id="el_noidung_baiviet">
<textarea name="x_noidung_baiviet" id="x_noidung_baiviet" cols="50" rows="7"<?php echo $intro_article->noidung_baiviet->EditAttributes() ?>><?php echo $intro_article->noidung_baiviet->EditValue ?></textarea>

<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_noidung_baiviet", function() {
	var oCKeditor = CKEDITOR.replace('x_noidung_baiviet', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>

</span><?php echo $intro_article->noidung_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->nguon_baiviet->Visible) { // nguon_baiviet ?>
	<tr<?php echo $intro_article->nguon_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn tin<span class="ewRequired"></span></td>
		<td<?php echo $intro_article->nguon_baiviet->CellAttributes() ?>><span id="el_nguon_baiviet">
<input type="text" name="x_nguon_baiviet" id="x_nguon_baiviet" size="30" maxlength="255" value="<?php echo $intro_article->nguon_baiviet->EditValue ?>"<?php echo $intro_article->nguon_baiviet->EditAttributes() ?>>
</span><?php echo $intro_article->nguon_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->lienket_baiviet->Visible) { // lienket_baiviet ?>
	<tr<?php echo $intro_article->lienket_baiviet->RowAttributes ?>>
		<td class="ewTableHeader">Liên kết<span class="ewRequired"></span></td>
		<td<?php echo $intro_article->lienket_baiviet->CellAttributes() ?>><span id="el_lienket_baiviet">
<input type="text" name="x_lienket_baiviet" id="x_lienket_baiviet" size="30" maxlength="255" value="<?php echo $intro_article->lienket_baiviet->EditValue ?>"<?php echo $intro_article->lienket_baiviet->EditAttributes() ?>>
</span><?php echo $intro_article->lienket_baiviet->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($intro_article->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $intro_article->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự<span class="ewRequired"></span></td>
		<td<?php echo $intro_article->thutu_sapxep->CellAttributes() ?>><span id="el_thutu_sapxep">
<select id="x_thutu_sapxep" name="x_thutu_sapxep"<?php echo ew_TruncateMemo($intro_article->thutu_sapxep->EditAttributes(),130) ?>>
<?php
if (is_array($intro_article->thutu_sapxep->EditValue)) {
	$arwrk = $intro_article->thutu_sapxep->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($intro_article->thutu_sapxep->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $intro_article->thutu_sapxep->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    Thêm   " onclick="ew_SubmitForm(intro_article_add, this.form);">
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
class cintro_article_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'intro_article';

	// Page Object Name
	var $PageObjName = 'intro_article_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_article;
		if ($intro_article->UseTokenInUrl) $PageUrl .= "t=" . $intro_article->TableVar . "&"; // add page token
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
		global $objForm, $intro_article;
		if ($intro_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_article_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_article"] = new cintro_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_article;
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
			$this->Page_Terminate("intro_articlelist.php");
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
		global $objForm, $gsFormError, $intro_article;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["baiviet_id"] != "") {
		  $intro_article->baiviet_id->setQueryStringValue($_GET["baiviet_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $intro_article->CurrentAction = $_POST["a_add"]; // Get form action
                   $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$intro_article->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $intro_article->CurrentAction = "C"; // Copy Record
		  } else {
		    $intro_article->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($intro_article->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("intro_articlelist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$intro_article->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Đã thêm bài viết"); // Set up success message
					$sReturnUrl = $intro_article->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "intro_articleview.php")
						$sReturnUrl = $intro_article->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$intro_article->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $intro_article;

		// Get upload data
			if ($intro_article->anh_daidien->Upload->UploadFile()) {

				// No action required
			} else {
				echo $intro_article->anh_daidien->Upload->Message;
				$this->Page_Terminate();
				exit();
	               }
	}

	// Load default values
	function LoadDefaultValues() {
		global $intro_article;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $intro_article;
		$intro_article->chuyenmuc_id->setFormValue($objForm->GetValue("x_chuyenmuc_id"));
                $intro_article->begin_date->setFormValue($objForm->GetValue("x_begin_date"));
		$intro_article->begin_date->CurrentValue = ew_UnFormatDateTime($intro_article->begin_date->CurrentValue, 7);
		$intro_article->end_date->setFormValue($objForm->GetValue("x_end_date"));
		$intro_article->end_date->CurrentValue = ew_UnFormatDateTime($intro_article->end_date->CurrentValue, 7);
		$intro_article->tieude_baiviet->setFormValue($objForm->GetValue("x_tieude_baiviet"));
		$intro_article->tukhoa_baiviet->setFormValue($objForm->GetValue("x_tukhoa_baiviet"));
		$intro_article->tomtat_baiviet->setFormValue($objForm->GetValue("x_tomtat_baiviet"));
		$intro_article->noidung_baiviet->setFormValue($objForm->GetValue("x_noidung_baiviet"));
		$intro_article->nguon_baiviet->setFormValue($objForm->GetValue("x_nguon_baiviet"));
		$intro_article->lienket_baiviet->setFormValue($objForm->GetValue("x_lienket_baiviet"));
		$intro_article->thoigian_them->setFormValue($objForm->GetValue("x_thoigian_them"));
		$intro_article->thoigian_them->CurrentValue = ew_UnFormatDateTime($intro_article->thoigian_them->CurrentValue, 7);
		$intro_article->thoihan_sua->setFormValue($objForm->GetValue("x_thoihan_sua"));
		$intro_article->thoihan_sua->CurrentValue = ew_UnFormatDateTime($intro_article->thoihan_sua->CurrentValue, 7);
		$intro_article->nguoi_them->setFormValue($objForm->GetValue("x_nguoi_them"));
		$intro_article->nguoi_sua->setFormValue($objForm->GetValue("x_nguoi_sua"));
		$intro_article->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
		$intro_article->baiviet_id->setFormValue($objForm->GetValue("x_baiviet_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $intro_article;
		$intro_article->baiviet_id->CurrentValue = $intro_article->baiviet_id->FormValue;
		$intro_article->chuyenmuc_id->CurrentValue = $intro_article->chuyenmuc_id->FormValue;
                $intro_article->begin_date->CurrentValue = $intro_article->begin_date->FormValue;
		$intro_article->begin_date->CurrentValue = ew_UnFormatDateTime($intro_article->begin_date->CurrentValue, 7);
		$intro_article->end_date->CurrentValue = $intro_article->end_date->FormValue;
		$intro_article->end_date->CurrentValue = ew_UnFormatDateTime($intro_article->end_date->CurrentValue, 7);
		$intro_article->tieude_baiviet->CurrentValue = $intro_article->tieude_baiviet->FormValue;
		$intro_article->tukhoa_baiviet->CurrentValue = $intro_article->tukhoa_baiviet->FormValue;
		$intro_article->tomtat_baiviet->CurrentValue = $intro_article->tomtat_baiviet->FormValue;
		$intro_article->noidung_baiviet->CurrentValue = $intro_article->noidung_baiviet->FormValue;
		$intro_article->nguon_baiviet->CurrentValue = $intro_article->nguon_baiviet->FormValue;
		$intro_article->lienket_baiviet->CurrentValue = $intro_article->lienket_baiviet->FormValue;
		$intro_article->thoigian_them->CurrentValue = $intro_article->thoigian_them->FormValue;
		$intro_article->thoigian_them->CurrentValue = ew_UnFormatDateTime($intro_article->thoigian_them->CurrentValue, 7);
		$intro_article->thoihan_sua->CurrentValue = $intro_article->thoihan_sua->FormValue;
		$intro_article->thoihan_sua->CurrentValue = ew_UnFormatDateTime($intro_article->thoihan_sua->CurrentValue, 7);
		$intro_article->nguoi_them->CurrentValue = $intro_article->nguoi_them->FormValue;
		$intro_article->nguoi_sua->CurrentValue = $intro_article->nguoi_sua->FormValue;
		$intro_article->thutu_sapxep->CurrentValue = $intro_article->thutu_sapxep->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_article;
		$sFilter = $intro_article->KeyFilter();

		// Call Row Selecting event
		$intro_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_article->CurrentFilter = $sFilter;
		$sSql = $intro_article->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_article;
		$intro_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$intro_article->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
                $intro_article->begin_date->setDbValue($rs->fields('begin_date'));
		$intro_article->end_date->setDbValue($rs->fields('end_date'));
		$intro_article->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$intro_article->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$intro_article->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$intro_article->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$intro_article->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$intro_article->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$intro_article->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_article->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$intro_article->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_article->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$intro_article->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$intro_article->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_article->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$intro_article->anh_daidien->Upload->DbValue = $rs->fields('anh_daidien');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_article;

		// Call Row_Rendering event
		$intro_article->Row_Rendering();

		// Common render codes for all row types
		// chuyenmuc_id

		$intro_article->chuyenmuc_id->CellCssStyle = "";
		$intro_article->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$intro_article->tieude_baiviet->CellCssStyle = "";
		$intro_article->tieude_baiviet->CellCssClass = "";
                
                // begin_date
		$intro_article->begin_date->CellCssStyle = "";
		$intro_article->begin_date->CellCssClass = "";

		// end_date
		$intro_article->end_date->CellCssStyle = "";
		$intro_article->end_date->CellCssClass = "";

		// anh_daidien
		$intro_article->anh_daidien->CellCssStyle = "";
		$intro_article->anh_daidien->CellCssClass = "";
		// tukhoa_baiviet
		$intro_article->tukhoa_baiviet->CellCssStyle = "";
		$intro_article->tukhoa_baiviet->CellCssClass = "";

		// tomtat_baiviet
		$intro_article->tomtat_baiviet->CellCssStyle = "";
		$intro_article->tomtat_baiviet->CellCssClass = "";

		// noidung_baiviet
		$intro_article->noidung_baiviet->CellCssStyle = "";
		$intro_article->noidung_baiviet->CellCssClass = "";

		// nguon_baiviet
		$intro_article->nguon_baiviet->CellCssStyle = "";
		$intro_article->nguon_baiviet->CellCssClass = "";

		// lienket_baiviet
		$intro_article->lienket_baiviet->CellCssStyle = "";
		$intro_article->lienket_baiviet->CellCssClass = "";

		// thoigian_them
		$intro_article->thoigian_them->CellCssStyle = "";
		$intro_article->thoigian_them->CellCssClass = "";

		// thoihan_sua
		$intro_article->thoihan_sua->CellCssStyle = "";
		$intro_article->thoihan_sua->CellCssClass = "";

		// nguoi_them
		$intro_article->nguoi_them->CellCssStyle = "";
		$intro_article->nguoi_them->CellCssClass = "";

		// nguoi_sua
		$intro_article->nguoi_sua->CellCssStyle = "";
		$intro_article->nguoi_sua->CellCssClass = "";
		// thutu_sapxep
		$intro_article->thutu_sapxep->CellCssStyle = "";
		$intro_article->thutu_sapxep->CellCssClass = "";
		if ($intro_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// chuyenmuc_id
			if (strval($intro_article->chuyenmuc_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_chuyenmuc` FROM `intro_subject` WHERE `chuyenmuc_id` = " . ew_AdjustSql($intro_article->chuyenmuc_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$intro_article->chuyenmuc_id->ViewValue = $rswrk->fields('ten_chuyenmuc');
					$rswrk->Close();
				} else {
					$intro_article->chuyenmuc_id->ViewValue = $intro_article->chuyenmuc_id->CurrentValue;
				}
			} else {
				$intro_article->chuyenmuc_id->ViewValue = NULL;
			}
			$intro_article->chuyenmuc_id->CssStyle = "";
			$intro_article->chuyenmuc_id->CssClass = "";
			$intro_article->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->ViewValue = $intro_article->tieude_baiviet->CurrentValue;
			$intro_article->tieude_baiviet->CssStyle = "";
			$intro_article->tieude_baiviet->CssClass = "";
			$intro_article->tieude_baiviet->ViewCustomAttributes = "";

			// anh_daidien
			if (!is_null($intro_article->anh_daidien->Upload->DbValue)) {
				$intro_article->anh_daidien->ViewValue = "Anh Daidien";
				$intro_article->anh_daidien->ImageAlt = "";
			} else {
				$intro_article->anh_daidien->ViewValue = "";
			}
			$intro_article->anh_daidien->CssStyle = "";
			$intro_article->anh_daidien->CssClass = "";
			$intro_article->anh_daidien->ViewCustomAttributes = "";
                        
                        // begin_date
			$intro_article->begin_date->ViewValue = $intro_article->begin_date->CurrentValue;
			$intro_article->begin_date->ViewValue = ew_FormatDateTime($intro_article->begin_date->ViewValue, 7);
			$intro_article->begin_date->CssStyle = "";
			$intro_article->begin_date->CssClass = "";
			$intro_article->begin_date->ViewCustomAttributes = "";

			// end_date
			$intro_article->end_date->ViewValue = $intro_article->end_date->CurrentValue;
			$intro_article->end_date->ViewValue = ew_FormatDateTime($intro_article->end_date->ViewValue, 7);
			$intro_article->end_date->CssStyle = "";
			$intro_article->end_date->CssClass = "";
			$intro_article->end_date->ViewCustomAttributes = "";
                        
			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->ViewValue = $intro_article->tukhoa_baiviet->CurrentValue;
			$intro_article->tukhoa_baiviet->CssStyle = "";
			$intro_article->tukhoa_baiviet->CssClass = "";
			$intro_article->tukhoa_baiviet->ViewCustomAttributes = "";

			// tomtat_baiviet
			$intro_article->tomtat_baiviet->ViewValue = $intro_article->tomtat_baiviet->CurrentValue;
			$intro_article->tomtat_baiviet->CssStyle = "";
			$intro_article->tomtat_baiviet->CssClass = "";
			$intro_article->tomtat_baiviet->ViewCustomAttributes = "";

			// noidung_baiviet
			$intro_article->noidung_baiviet->ViewValue = $intro_article->noidung_baiviet->CurrentValue;
			$intro_article->noidung_baiviet->CssStyle = "";
			$intro_article->noidung_baiviet->CssClass = "";
			$intro_article->noidung_baiviet->ViewCustomAttributes = "";

			// nguon_baiviet
			$intro_article->nguon_baiviet->ViewValue = $intro_article->nguon_baiviet->CurrentValue;
			$intro_article->nguon_baiviet->CssStyle = "";
			$intro_article->nguon_baiviet->CssClass = "";
			$intro_article->nguon_baiviet->ViewCustomAttributes = "";

			// lienket_baiviet
			$intro_article->lienket_baiviet->ViewValue = $intro_article->lienket_baiviet->CurrentValue;
			$intro_article->lienket_baiviet->CssStyle = "";
			$intro_article->lienket_baiviet->CssClass = "";
			$intro_article->lienket_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$intro_article->thoigian_them->ViewValue = $intro_article->thoigian_them->CurrentValue;
			$intro_article->thoigian_them->ViewValue = ew_FormatDateTime($intro_article->thoigian_them->ViewValue, 7);
			$intro_article->thoigian_them->CssStyle = "";
			$intro_article->thoigian_them->CssClass = "";
			$intro_article->thoigian_them->ViewCustomAttributes = "";

			// thoihan_sua
			$intro_article->thoihan_sua->ViewValue = $intro_article->thoihan_sua->CurrentValue;
			$intro_article->thoihan_sua->ViewValue = ew_FormatDateTime($intro_article->thoihan_sua->ViewValue, 7);
			$intro_article->thoihan_sua->CssStyle = "";
			$intro_article->thoihan_sua->CssClass = "";
			$intro_article->thoihan_sua->ViewCustomAttributes = "";

			// nguoi_them
			$intro_article->nguoi_them->ViewValue = $intro_article->nguoi_them->CurrentValue;
			$intro_article->nguoi_them->CssStyle = "";
			$intro_article->nguoi_them->CssClass = "";
			$intro_article->nguoi_them->ViewCustomAttributes = "";

			// nguoi_sua
			$intro_article->nguoi_sua->ViewValue = $intro_article->nguoi_sua->CurrentValue;
			$intro_article->nguoi_sua->CssStyle = "";
			$intro_article->nguoi_sua->CssClass = "";
			$intro_article->nguoi_sua->ViewCustomAttributes = "";
			// thutu_sapxep
			if (strval($intro_article->thutu_sapxep->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `tieude_baiviet` FROM `intro_article` WHERE `thutu_sapxep` = " . ew_AdjustSql($intro_article->thutu_sapxep->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$intro_article->thutu_sapxep->ViewValue = $rswrk->fields('tieude_baiviet');
					$rswrk->Close();
				} else {
					$intro_article->thutu_sapxep->ViewValue = $intro_article->thutu_sapxep->CurrentValue;
				}
			} else {
				$intro_article->thutu_sapxep->ViewValue = NULL;
			}
			$intro_article->thutu_sapxep->CssStyle = "";
			$intro_article->thutu_sapxep->CssClass = "";
			$intro_article->thutu_sapxep->ViewCustomAttributes = "";

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->HrefValue = "";

			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->HrefValue = "";

			// tomtat_baiviet
			$intro_article->tomtat_baiviet->HrefValue = "";
                        
                        // begin_date
			$intro_article->begin_date->HrefValue = "";

			// end_date
			$intro_article->end_date->HrefValue = "";

			// noidung_baiviet
			$intro_article->noidung_baiviet->HrefValue = "";

			// nguon_baiviet
			$intro_article->nguon_baiviet->HrefValue = "";

			// lienket_baiviet
			$intro_article->lienket_baiviet->HrefValue = "";

			// thoigian_them
			$intro_article->thoigian_them->HrefValue = "";

			// thoihan_sua
			$intro_article->thoihan_sua->HrefValue = "";

			// nguoi_them
			$intro_article->nguoi_them->HrefValue = "";

			// nguoi_sua
			$intro_article->nguoi_sua->HrefValue = "";
			
			// thutu_sapxep
			$intro_article->thutu_sapxep->HrefValue = "";
                        // anh_daidien
			if (!is_null($intro_article->anh_daidien->Upload->DbValue)) {
				$intro_article->anh_daidien->HrefValue = "intro_article_anh_daidien_bv.php?baiviet_id=" . $intro_article->baiviet_id->CurrentValue;
				if ($intro_article->Export <> "") $intro_article->anh_daidien->HrefValue = ew_ConvertFullUrl($intro_article->anh_daidien->HrefValue);
			} else {
				$intro_article->anh_daidien->HrefValue = "";
			}
		} elseif ($intro_article->RowType == EW_ROWTYPE_ADD) { // Add row

		
			// chuyenmuc_id
			$intro_article->chuyenmuc_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `intro_subject`";
			$sWhereWrk = "chuyenmuc_belongto=-1";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
				$sSqlWrk1 = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `intro_subject`";
				$sWhereWrk1 = "chuyenmuc_belongto=0 and show_news <>5 and show_news <>6";
				if ($sWhereWrk1 <> "") $sSqlWrk1 .= " WHERE $sWhereWrk1";
				$rswrk1 = $conn->Execute($sSqlWrk1);
			while (!$rswrk1->EOF){
			array_push($arwrk, array($rswrk1->fields['chuyenmuc_id'], "-".$rswrk1->fields['ten_chuyenmuc']));			
				$sSqlWrk2 = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `intro_subject`";
				$sWhereWrk2 = "chuyenmuc_belongto=".$rswrk1->fields['chuyenmuc_id'];
				if ($sWhereWrk2 <> "") $sSqlWrk2 .= " WHERE $sWhereWrk2";
				$rswrk2 = $conn->Execute($sSqlWrk2);
				while (!$rswrk2->EOF){
					array_push($arwrk, array($rswrk2->fields['chuyenmuc_id'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+".$rswrk2->fields['ten_chuyenmuc']));
					$rswrk2->MoveNext();						
				}
				if ($rswrk2) $rswrk2->Close();
				$rswrk1->MoveNext();
						}
			array_unshift($arwrk, array("", "Chọn"));
			$intro_article->chuyenmuc_id->EditValue = $arwrk;
				
			
			// tieude_baiviet
			$intro_article->tieude_baiviet->EditCustomAttributes = "";
			$intro_article->tieude_baiviet->EditValue = ew_HtmlEncode($intro_article->tieude_baiviet->CurrentValue);
                        
                        // begin_date
			$intro_article->begin_date->EditCustomAttributes = "";
			$intro_article->begin_date->EditValue = ew_HtmlEncode(ew_FormatDateTime($intro_article->begin_date->CurrentValue, 7));

			// end_date
			$intro_article->end_date->EditCustomAttributes = "";
			$intro_article->end_date->EditValue = ew_HtmlEncode(ew_FormatDateTime($intro_article->end_date->CurrentValue, 7));

			// tukhoa_baiviet
			$intro_article->tukhoa_baiviet->EditCustomAttributes = "";
			$intro_article->tukhoa_baiviet->EditValue = ew_HtmlEncode($intro_article->tukhoa_baiviet->CurrentValue);

			// tomtat_baiviet
			$intro_article->tomtat_baiviet->EditCustomAttributes = "";
			$intro_article->tomtat_baiviet->EditValue = ew_HtmlEncode($intro_article->tomtat_baiviet->CurrentValue);

			// noidung_baiviet
			$intro_article->noidung_baiviet->EditCustomAttributes = "";
			$intro_article->noidung_baiviet->EditValue = ew_HtmlEncode($intro_article->noidung_baiviet->CurrentValue);

			// nguon_baiviet
			$intro_article->nguon_baiviet->EditCustomAttributes = "";
			$intro_article->nguon_baiviet->EditValue = ew_HtmlEncode($intro_article->nguon_baiviet->CurrentValue);

			// lienket_baiviet
			$intro_article->lienket_baiviet->EditCustomAttributes = "";
			$intro_article->lienket_baiviet->EditValue = ew_HtmlEncode($intro_article->lienket_baiviet->CurrentValue);

			// thoigian_them
			// thoihan_sua
			// nguoi_them
			// nguoi_sua
			// thutu_sapxep

			$intro_article->thutu_sapxep->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `thutu_sapxep`, `tieude_baiviet`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `intro_article`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$sSqlWrk .=" order by `thutu_sapxep`";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array(0, "--Chọn thứ tự sắp xếp--"));
			$intro_article->thutu_sapxep->EditValue = $arwrk;
                        // anh_daidien
			$intro_article->anh_daidien->EditCustomAttributes = "";
			if (!is_null($intro_article->anh_daidien->Upload->DbValue)) {
				$intro_article->anh_daidien->EditValue = "Anh Daidien";
				$intro_article->anh_daidien->ImageAlt = "";
			} else {
				$intro_article->anh_daidien->EditValue = "";
			}

		}

		// Call Row Rendered event
		$intro_article->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $conn,$gsFormError, $intro_article;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($intro_article->anh_daidien->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($intro_article->anh_daidien->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($intro_article->anh_daidien->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

//                $sSqlWrk = "SELECT `chuyenmuc_id`, `chuyenmuc_belongto` FROM `intro_subject`";
//		$sWhereWrk = "`chuyenmuc_id` = " . ew_AdjustSql($intro_article->chuyenmuc_id->CurrentValue) . "";
//			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
//			$rswrk = $conn->Execute($sSqlWrk);
//			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
//			if ($rswrk) $rswrk->Close();
//                 if ($arwrk[0][1] == 0) {
//			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
//			$gsFormError .= "Tin phải thuộc chuyên mục cấp 2";
//		}
		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($intro_article->chuyenmuc_id->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Chuyên mục";
		}
		if ($intro_article->tieude_baiviet->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tiêu đề";
		}
		if ($intro_article->tomtat_baiviet->FormValue == "" && $intro_article->noidung_baiviet->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tóm tắt tin hoặc chi tiết tin";
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
		global $conn, $Security, $intro_article;
		$rsnew = array();

		// Field chuyenmuc_id
		$intro_article->chuyenmuc_id->SetDbValueDef($intro_article->chuyenmuc_id->CurrentValue, 0);
		$rsnew['chuyenmuc_id'] =& $intro_article->chuyenmuc_id->DbValue;
                
                // Field begin_date
		$intro_article->begin_date->SetDbValueDef(ew_UnFormatDateTime($intro_article->begin_date->CurrentValue, 7), NULL);
		$rsnew['begin_date'] =& $intro_article->begin_date->DbValue;

		// Field end_date
		$intro_article->end_date->SetDbValueDef(ew_UnFormatDateTime($intro_article->end_date->CurrentValue, 7), NULL);
		$rsnew['end_date'] =& $intro_article->end_date->DbValue;
                

		// Field tieude_baiviet
		$intro_article->tieude_baiviet->SetDbValueDef($intro_article->tieude_baiviet->CurrentValue, "");
		$rsnew['tieude_baiviet'] =& $intro_article->tieude_baiviet->DbValue;

		// Field tukhoa_baiviet
		$intro_article->tukhoa_baiviet->SetDbValueDef($intro_article->tukhoa_baiviet->CurrentValue, NULL);
		$rsnew['tukhoa_baiviet'] =& $intro_article->tukhoa_baiviet->DbValue;

		// Field tomtat_baiviet
		$intro_article->tomtat_baiviet->SetDbValueDef($intro_article->tomtat_baiviet->CurrentValue, "");
		$rsnew['tomtat_baiviet'] =& $intro_article->tomtat_baiviet->DbValue;

                // Field anh_daidien
		$intro_article->anh_daidien->Upload->SaveToSession(); // Save file value to Session
		if (is_null($intro_article->anh_daidien->Upload->Value)) {
			$rsnew['anh_daidien'] = NULL;
		} else {
			$rsnew['anh_daidien'] = $intro_article->anh_daidien->Upload->Value;
		}
		// Field noidung_baiviet
		$intro_article->noidung_baiviet->SetDbValueDef($intro_article->noidung_baiviet->CurrentValue, "");
		$rsnew['noidung_baiviet'] =& $intro_article->noidung_baiviet->DbValue;

		// Field nguon_baiviet
		$intro_article->nguon_baiviet->SetDbValueDef($intro_article->nguon_baiviet->CurrentValue, "");
		$rsnew['nguon_baiviet'] =& $intro_article->nguon_baiviet->DbValue;

		// Field lienket_baiviet
		$intro_article->lienket_baiviet->SetDbValueDef($intro_article->lienket_baiviet->CurrentValue, "");
		$rsnew['lienket_baiviet'] =& $intro_article->lienket_baiviet->DbValue;

		// Field thoigian_them
		$intro_article->thoigian_them->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoigian_them'] =& $intro_article->thoigian_them->DbValue;

		// Field thoihan_sua
		$intro_article->thoihan_sua->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoihan_sua'] =& $intro_article->thoihan_sua->DbValue;

		// Field nguoi_them
		$intro_article->nguoi_them->SetDbValueDef(CurrentUserID(), 0);
		$rsnew['nguoi_them'] =& $intro_article->nguoi_them->DbValue;

		// Field nguoi_sua
		$intro_article->nguoi_sua->SetDbValueDef(CurrentUserID(), 0);
		$rsnew['nguoi_sua'] =& $intro_article->nguoi_sua->DbValue;
		// Field thutu_sapxep
			$intro_article->thutu_sapxep->SetDbValueDef($intro_article->thutu_sapxep->CurrentValue, 0);
			$rsnew['thutu_sapxep'] =& $intro_article->thutu_sapxep->DbValue;
			$st=$rsnew['thutu_sapxep'];
			if ($st==0) //tim ban ghi cuoi cung
			{
			$sSqlWrk = "SELECT `thutu_sapxep` FROM `intro_article`";
			$sWhereWrk = "";
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
			elseif ($st<>0)  //tim ban ghi dung sau
			{
			$sSqlWrk = "SELECT `thutu_sapxep` FROM `intro_article`";
			$sWhereWrk = "`thutu_sapxep` >".$st;
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
		$bInsertRow = $intro_article->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($intro_article->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($intro_article->CancelMessage <> "") {
				$this->setMessage($intro_article->CancelMessage);
				$intro_article->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$intro_article->baiviet_id->setDbValue($conn->Insert_ID());
			$rsnew['baiviet_id'] =& $intro_article->baiviet_id->DbValue;

			// Call Row Inserted event
			$intro_article->Row_Inserted($rsnew);
		}

		// Field anh_daidien
		$intro_article->anh_daidien->Upload->RemoveFromSession(); // Remove file value from Session
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
