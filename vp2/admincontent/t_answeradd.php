<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_answerinfo.php" ?>
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
$t_answer_add = new ct_answer_add();
$Page =& $t_answer_add;
$mail=  "";
$IdCode = "";
// Page init processing
$t_answer_add->Page_Init();

// Page main processing
$t_answer_add->Page_Main();
?>
<?php include "header.php";

$_SESSION['user']= CurrentUserName();
?>
<script type="text/javascript">
<!--

// Create page object
var t_answer_add = new ew_Page("t_answer_add");

// page properties
t_answer_add.PageID = "add"; // page ID
var EW_PAGE_ID = t_answer_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_answer_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_question_id"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Question Id");
		elm = fobj.elements["x" + infix + "_question_id"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Question Id");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_answer_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_answer_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_answer_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_answer_add.ValidateRequired = false; // no JavaScript validation
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
								<a href="t_answerlist.php?question_id= <?php  echo $_SESSION["question_id"];?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm câu trả lời</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
                                                         <?php 
                                                                    $sSqlAnser = "Select * From `t_question` where question_id = ".$_SESSION["question_id"];
                                                                    //echo $sSqlAnser;
                                                                    $rsAns = $conn->Execute($sSqlAnser);
                                                                    //echo $rsAns ;
                                                                    $arAns = ($rsAns) ? $rsAns->GetRows() : array();
                                                                    if ($rsAns) $rsAns->Close();
                                                                    $rowAns = count($arAns);
                                                                    $_SESSION["mailq"]="";
                                                                    $_SESSION["IdCodeq"]="";
                                                                    $IdCode="";
                                                                    $_SESSION["s_number"]="";
                                                                    $_SESSION["s_public"]="";
                                                                    $_SESSION["id"]="";
                                                                    
                                                                    if($rowAns>0){
                                                                        $_SESSION["mailq"]  = $arAns[0]['email'];
                                                                        $_SESSION["IdCodeq"] = $arAns[0]['IDcard'];
                                                                         $IdCode = $arAns[0]['Idcard'];
                                                                        $_SESSION["s_number"] = $arAns[0]['s_number'];
                                                                        $_SESSION["s_public"] = $arAns[0]['s_public'];
                                                                        $_SESSION["id"] = $arAns[0]['s_public'];
                                                                        $_SESSION["ID_Group"] = $arAns[0]['ID_Group'];   
                                                                  ?>
                                               <tr >
                                                                <td height="20" colspan="2" align="left" valign="top"><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Câu hỏi</font></b></td>
                                                      
                                                </tr> 
                                                <tr>
                                                <td   valign="top"  colspan="2">
                                                                    <table cellspacing="0"    width="100%">
                                        <tr style="height:10px;">
                                            <td width="10%" >Họ Tên: </td>
                                            <td  align="left" ><?php echo $arAns[0]['user_name'];?></td>
                                                
                                        </tr>
                                        <tr style="height:10px;">
                                            <td  width="10%" >Mã Sinh Viên: </td>
                                            <td  align="left"><?php echo $arAns[0]['msv_id'];?></td>
                                                
                                        </tr>
                                         <tr style="height:10px;">

                                            <td width="10%" >Điện thoại </td>
                                            <td align="left"><?php echo $arAns[0]['tel'];?></td>
                                                
                                        </tr>
                                          <tr>
                                            <td width="10%">Email </td>
                                            <td  align="left"><?php echo $arAns[0]['email'];?></td>
                                                
                                        </tr>
                                        <tr>
                                            <td width="10%">Mã câu hỏi: </td>
                                            <td  align="left"><?php echo $_SESSION["IdCodeq"];?></td>
                                                
                                        </tr>
                                        <tr>
                                            </table>
                                                                    </td>
                                                                
                                                               
							</tr>
                                                        <tr>  <td  style="height:10px;"  valign="top"  colspan="2"></td></tr>
                                        <tr>
								<td   valign="top"  colspan="2">
                                                                    <table cellspacing="0" boder ="1"   width="100%">
                                                                              <tr >
                                                                            <td width="15%" class="ewGridContent"   valign="top">
                                                                            Câu hỏi:
                                                                            </td>
                                                                            <td class="ewGridContent" width="85%" align="left" valign="top"><?php echo $arAns[0]['content']?>
                                                                            </td>


                                                                            </tr> 
                                                                            <tr >
                                                                            <td width="15%" class="ewGridContent"  valign="top">
                                                                            Lý do không hài lòng 1:
                                                                            </td>
                                                                            <td class="ewGridContent" width="85%" align="left" valign="top"><?php echo $arAns[0]['content1']?>
                                                                            </td>


                                                                            </tr>   
                                                                            <tr >
                                                                            <td width="15%" class="ewGridContent"  valign="top">
                                                                            Lý do không hài lòng 2:
                                                                            </td>
                                                                            <td class="ewGridContent" width="85%" align="left" valign="top"><?php echo $arAns[0]['content2']?>
                                                                            </td>


                                                                            </tr>   
                                                                    </table>
                                                                    </td>
                                                                
                                                               
							</tr>
                                                      
                                                  <?php } ?>
							
</table>
<?php $t_answer_add->ShowMessage() ?>
<form name="ft_answeradd" id="ft_answeradd" action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_answer">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_answer->question_id->Visible) { // question_id ?>
	<tr<?php echo $t_answer->question_id->RowAttributes ?>>
		<td class="ewTableHeader">Mã câu hỏi<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_answer->question_id->CellAttributes() ?>><span id="el_question_id">
                        <input type="text" name="x_question_id" readonly="true" id="x_question_id" size="30" value="<?php echo trim($_SESSION["question_id"]); ?>"<?php echo $t_answer->question_id->EditAttributes() ?>>
</span><?php echo $t_answer->question_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_answer->answer->Visible) { // answer ?>
	<tr<?php echo $t_answer->answer->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $t_answer->answer->CellAttributes() ?>><span id="el_answer">
<textarea name="x_answer" id="x_answer" cols="35" rows="4"<?php echo $t_answer->answer->EditAttributes() ?>><?php echo $t_answer->answer->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_answer", function() {
	var oCKeditor = CKEDITOR.replace('x_answer', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: true, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_answer->answer->CustomMsg ?></td>
	</tr>
<?php } ?>

        <?php if ($t_answer->desciption->Visible) { // desciption ?>
	<tr<?php echo $t_answer->desciption->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả câu trả lời</td>
		<td<?php echo $t_answer->desciption->CellAttributes() ?>><span id="el_desciption">
<textarea name="x_desciption" id="x_desciption" cols="35" rows="4"<?php echo $t_answer->desciption->EditAttributes() ?>><?php echo $t_answer->desciption->EditValue ?></textarea>
</span><?php echo $t_answer->desciption->CustomMsg ?></td>
	</tr>
<?php } ?>
        
    <?php if ($t_answer->s_faq->Visible) { // s_faq ?>
	<tr<?php echo $t_answer->s_faq->RowAttributes ?>>
		<td class="ewTableHeader">FAQ</td>
		<td<?php echo $t_answer->s_faq->CellAttributes() ?>><span id="el_s_faq">
<select id="x_s_faq" name="x_s_faq"<?php echo $t_answer->s_faq->EditAttributes() ?>>
<?php
if (is_array($t_answer->s_faq->EditValue)) {
	$arwrk = $t_answer->s_faq->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_answer->s_faq->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_answer->s_faq->CustomMsg ?></td>
	</tr>
<?php } ?>
        
  <?php if ($t_answer->s_faq->Visible) { // nhom cau hoi?>
	<tr>
		<td class="ewTableHeader">Nhóm câu hỏi</td>
		<td<?php echo $t_answer->s_faq->CellAttributes() ?>><span id="el_s_faq">
<select id="x_s_group" name="x_s_group">
   <option value="">
Chọn
</option> 
<?php

$sSqlGroup = "Select * From t_question_Group";
//echo $sSqlAnser;
$rsGroup = $conn->Execute($sSqlGroup);
//echo $rsAns ;
$arGroup = ($rsGroup) ? $rsGroup->GetRows() : array();
if ($rsGroup) $rsGroup->Close();
$rowGroup = count($arGroup);
$emptywrk = TRUE;
if ($rowGroup>=0) {
	
	for ($rowcntwrk = 0; $rowcntwrk < $rowGroup; $rowcntwrk++) {
            $selwrk = (strval($_SESSION["ID_Group"]) == strval($arGroup[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
		
?>
<option value="<?php echo ew_HtmlEncode($arGroup[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arGroup[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $t_answer->s_faq->CustomMsg ?></td>
	</tr>
<?php } ?>       
        
        
<tr>
<td class="ewTableHeader">Xuất bản</td>
<td>
<select id="s_public" name="s_public">
    <option value="0" <?php if($_SESSION["s_public"]==0){echo  "selected=\"selected\""; }?>>
Không
</option>
<option value="1" <?php if($_SESSION["s_public"]==1){echo  "selected=\"selected\""; }?>>
Xuất bản
</option>
</select>
</tr>      
<?php if ($t_answer->datetime_Add->Visible) { // datetime_Add ?>
	<tr<?php echo $t_answer->datetime_Add->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tạo:</td>
		<td<?php echo $t_answer->datetime_Add->CellAttributes() ?>><span id="el_datetime_Add">
<input type="text" readonly     name="x_datetime_Add" id="x_datetime_Add" value="<?php echo date("d/m/Y H:i:s"); ?>"<?php echo $t_answer->datetime_Add->EditAttributes() ?>>
</span><?php echo $t_answer->datetime_Add->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_answer->datetime_Update->Visible) { // datetime_Update ?>
	<tr<?php echo $t_answer->datetime_Update->RowAttributes ?>>
		<td class="ewTableHeader">Ngày cập nhật:</td>
		<td<?php echo $t_answer->datetime_Update->CellAttributes() ?>><span id="el_datetime_Update">
                        <input type="text" readonly name="x_datetime_Update" id="x_datetime_Update" value="<?php echo date("d/m/Y H:i:s"); ?>"<?php echo $t_answer->datetime_Update->EditAttributes() ?>>
</span><?php echo $t_answer->datetime_Update->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_answer->User_Update->Visible) { // User_Update ?>
	<tr<?php echo $t_answer->User_Update->RowAttributes ?>>
		<td class="ewTableHeader">Người cập nhật:</td>
		<td<?php echo $t_answer->User_Update->CellAttributes() ?>><span id="el_User_Update">
                        <input type="text" readonly name="x_User_Update" id="x_User_Update" size="30" maxlength="255" value="<?php echo   $_SESSION['user']; ?>"<?php echo $t_answer->User_Update->EditAttributes() ?>>
</span><?php echo $t_answer->User_Update->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    Thêm    " onclick="ew_SubmitForm(t_answer_add, this.form);">
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
class ct_answer_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 't_answer';

	// Page Object Name
	var $PageObjName = 't_answer_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_answer;
		if ($t_answer->UseTokenInUrl) $PageUrl .= "t=" . $t_answer->TableVar . "&"; // add page token
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
		global $objForm, $t_answer;
		if ($t_answer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_answer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_answer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_answer_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_answer"] = new ct_answer();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_answer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_answer;

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
		global $objForm, $gsFormError, $t_answer;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["answer_id"] != "") {
		  $t_answer->answer_id->setQueryStringValue($_GET["answer_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_answer->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_answer->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_answer->CurrentAction = "C"; // Copy Record
		  } else {
		    $t_answer->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_answer->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có bản ghi"); // No record found
		      $this->Page_Terminate("t_answerlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_answer->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm thành công"); // Set up success message
					$sReturnUrl = "t_answerlist.php?question_id=". $_SESSION["question_id"];
					//if (ew_GetPageName($sReturnUrl) == "t_answerlist.php")
					//	$sReturnUrl = $t_answer->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
                                       
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_answer->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_answer;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_answer;
		$t_answer->s_faq->CurrentValue = 0;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_answer;
		$t_answer->question_id->setFormValue($objForm->GetValue("x_question_id"));
		$t_answer->answer->setFormValue($objForm->GetValue("x_answer"));
		$t_answer->s_faq->setFormValue($objForm->GetValue("x_s_faq"));
                $t_answer->desciption->setFormValue($objForm->GetValue("x_desciption"));
		$t_answer->answer_id->setFormValue($objForm->GetValue("x_answer_id"));
                $t_answer->datetime_Add->setFormValue($objForm->GetValue("x_datetime_Add"));
		$t_answer->datetime_Add->CurrentValue = ew_UnFormatDateTime($t_answer->datetime_Add->CurrentValue, 7);
		$t_answer->datetime_Update->setFormValue($objForm->GetValue("x_datetime_Update"));
		$t_answer->datetime_Update->CurrentValue = ew_UnFormatDateTime($t_answer->datetime_Update->CurrentValue, 7);
		$t_answer->User_Update->setFormValue($objForm->GetValue("x_User_Update"));
		$t_answer->answer_id->setFormValue($objForm->GetValue("x_answer_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_answer;
		$t_answer->answer_id->CurrentValue = $t_answer->answer_id->FormValue;
		$t_answer->question_id->CurrentValue = $t_answer->question_id->FormValue;
		$t_answer->answer->CurrentValue = $t_answer->answer->FormValue;
		$t_answer->s_faq->CurrentValue = $t_answer->s_faq->FormValue;
                $t_answer->desciption->CurrentValue = $t_answer->desciption->FormValue;
                $t_answer->datetime_Add->CurrentValue = $t_answer->datetime_Add->FormValue;
		$t_answer->datetime_Add->CurrentValue = ew_UnFormatDateTime($t_answer->datetime_Add->CurrentValue, 7);
		$t_answer->datetime_Update->CurrentValue = $t_answer->datetime_Update->FormValue;
		$t_answer->datetime_Update->CurrentValue = ew_UnFormatDateTime($t_answer->datetime_Update->CurrentValue, 7);
		$t_answer->User_Update->CurrentValue = $t_answer->User_Update->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_answer;
		$sFilter = $t_answer->KeyFilter();

		// Call Row Selecting event
		$t_answer->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_answer->CurrentFilter = $sFilter;
		$sSql = $t_answer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_answer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_answer;
		$t_answer->answer_id->setDbValue($rs->fields('answer_id'));
		$t_answer->question_id->setDbValue($rs->fields('question_id'));
		$t_answer->answer->setDbValue($rs->fields('answer'));
		$t_answer->s_faq->setDbValue($rs->fields('s_faq'));
                $t_answer->desciption->setDbValue($rs->fields('desciption'));
                $t_answer->datetime_Add->setDbValue($rs->fields('datetime_Add'));
		$t_answer->datetime_Update->setDbValue($rs->fields('datetime_Update'));
		$t_answer->User_Update->setDbValue($rs->fields('User_Update'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_answer;

		// Call Row_Rendering event
		$t_answer->Row_Rendering();

		// Common render codes for all row types
		// question_id

		$t_answer->question_id->CellCssStyle = "";
		$t_answer->question_id->CellCssClass = "";

		// answer
		$t_answer->answer->CellCssStyle = "";
		$t_answer->answer->CellCssClass = "";

		// s_faq
		$t_answer->s_faq->CellCssStyle = "";
		$t_answer->s_faq->CellCssClass = "";
                
                
                // desciption
		$t_answer->desciption->CellCssStyle = "";
		$t_answer->desciption->CellCssClass = "";
                // datetime_Add
		$t_answer->datetime_Add->CellCssStyle = "";
		$t_answer->datetime_Add->CellCssClass = "";

		// datetime_Update
		$t_answer->datetime_Update->CellCssStyle = "";
		$t_answer->datetime_Update->CellCssClass = "";

		// User_Update
		$t_answer->User_Update->CellCssStyle = "";
		$t_answer->User_Update->CellCssClass = "";
		if ($t_answer->RowType == EW_ROWTYPE_VIEW) { // View row

			// answer_id
			$t_answer->answer_id->ViewValue = $t_answer->answer_id->CurrentValue;
			$t_answer->answer_id->CssStyle = "";
			$t_answer->answer_id->CssClass = "";
			$t_answer->answer_id->ViewCustomAttributes = "";

			// question_id
			$t_answer->question_id->ViewValue = $t_answer->question_id->CurrentValue;
			$t_answer->question_id->ViewValue = strtolower($t_answer->question_id->ViewValue);
			$t_answer->question_id->CssStyle = "";
			$t_answer->question_id->CssClass = "";
			$t_answer->question_id->ViewCustomAttributes = "";

			// answer
			$t_answer->answer->ViewValue = $t_answer->answer->CurrentValue;
			$t_answer->answer->CssStyle = "";
			$t_answer->answer->CssClass = "";
			$t_answer->answer->ViewCustomAttributes = "";

			// s_faq
			if (strval($t_answer->s_faq->CurrentValue) <> "") {
				switch ($t_answer->s_faq->CurrentValue) {
					case "0":
						$t_answer->s_faq->ViewValue = "Không";
						break;
					case "1":
						$t_answer->s_faq->ViewValue = "FAQ";
						break;
					default:
						$t_answer->s_faq->ViewValue = $t_answer->s_faq->CurrentValue;
				}
			} else {
				$t_answer->s_faq->ViewValue = NULL;
			}
			$t_answer->s_faq->CssStyle = "";
			$t_answer->s_faq->CssClass = "";
			$t_answer->s_faq->ViewCustomAttributes = "";
                        
                        // desciption
			$t_answer->desciption->ViewValue = $t_answer->desciption->CurrentValue;
			$t_answer->desciption->CssStyle = "";
			$t_answer->desciption->CssClass = "";
			$t_answer->desciption->ViewCustomAttributes = "";
                        
                        // datetime_Add
			$t_answer->datetime_Add->ViewValue = $t_answer->datetime_Add->CurrentValue;
			$t_answer->datetime_Add->ViewValue = ew_FormatDateTime($t_answer->datetime_Add->ViewValue, 7);
			$t_answer->datetime_Add->CssStyle = "";
			$t_answer->datetime_Add->CssClass = "";
			$t_answer->datetime_Add->ViewCustomAttributes = "";

			// datetime_Update
			$t_answer->datetime_Update->ViewValue = $t_answer->datetime_Update->CurrentValue;
			$t_answer->datetime_Update->ViewValue = ew_FormatDateTime($t_answer->datetime_Update->ViewValue, 7);
			$t_answer->datetime_Update->CssStyle = "";
			$t_answer->datetime_Update->CssClass = "";
			$t_answer->datetime_Update->ViewCustomAttributes = "";

			// User_Update
			$t_answer->User_Update->ViewValue = $t_answer->User_Update->CurrentValue;
			$t_answer->User_Update->CssStyle = "";
			$t_answer->User_Update->CssClass = "";
			$t_answer->User_Update->ViewCustomAttributes = "";

			// question_id
			$t_answer->question_id->HrefValue = "";

			// answer
			$t_answer->answer->HrefValue = "";

			// s_faq
			$t_answer->s_faq->HrefValue = "";
                        // desciption
			$t_answer->desciption->HrefValue = "";
                        $t_answer->desciption->HrefValue = "";

			// datetime_Add
			$t_answer->datetime_Add->HrefValue = "";

			// datetime_Update
			$t_answer->datetime_Update->HrefValue = "";

			// User_Update
			$t_answer->User_Update->HrefValue = "";
		} elseif ($t_answer->RowType == EW_ROWTYPE_ADD) { // Add row

			// question_id
			$t_answer->question_id->EditCustomAttributes = "";
			$t_answer->question_id->EditValue = ew_HtmlEncode($t_answer->question_id->CurrentValue);

			// answer
			$t_answer->answer->EditCustomAttributes = "";
			$t_answer->answer->EditValue = ew_HtmlEncode("Chào em; <br/>".$t_answer->answer->CurrentValue)."<br/> <br/> Chúc em thành công ! <br/>
                            Văn phòng Hỗ trợ trực tuyến - 0936821821";

			// s_faq
			$t_answer->s_faq->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không");
			$arwrk[] = array("1", "FAQ");
			array_unshift($arwrk, array("", "Chọn"));
			$t_answer->s_faq->EditValue = $arwrk;
                        
                        // desciption
			$t_answer->desciption->EditCustomAttributes = "";
			$t_answer->desciption->EditValue = ew_HtmlEncode($t_answer->desciption->CurrentValue);
                        // datetime_Add
			$t_answer->datetime_Add->EditCustomAttributes = "";
			$t_answer->datetime_Add->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_answer->datetime_Add->CurrentValue, 7));

			// datetime_Update
			$t_answer->datetime_Update->EditCustomAttributes = "";
			$t_answer->datetime_Update->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_answer->datetime_Update->CurrentValue, 7));

			// User_Update
			$t_answer->User_Update->EditCustomAttributes = "";
			$t_answer->User_Update->EditValue = ew_HtmlEncode($t_answer->User_Update->CurrentValue);
		}

		// Call Row Rendered event
		$t_answer->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_answer;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_answer->question_id->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Question Id";
		}
		if (!ew_CheckInteger($t_answer->question_id->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Question Id";
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
		global $conn, $Security, $t_answer;
		$rsnew = array();

		// Field question_id
		$t_answer->question_id->SetDbValueDef($t_answer->question_id->CurrentValue, 0);
		$rsnew['question_id'] =& $t_answer->question_id->DbValue;

		// Field answer
		$t_answer->answer->SetDbValueDef($t_answer->answer->CurrentValue, NULL);
		$rsnew['answer'] =& $t_answer->answer->DbValue;

		// Field s_faq
		$t_answer->s_faq->SetDbValueDef($t_answer->s_faq->CurrentValue, NULL);
		$rsnew['s_faq'] =& $t_answer->s_faq->DbValue;
                
                // Field desciption
		$t_answer->desciption->SetDbValueDef($t_answer->desciption->CurrentValue, NULL);
		$rsnew['desciption'] =& $t_answer->desciption->DbValue;
                // Field datetime_Add
		$t_answer->datetime_Add->SetDbValueDef(ew_UnFormatDateTime($t_answer->datetime_Add->CurrentValue, 7), NULL);
		$rsnew['datetime_Add'] =& $t_answer->datetime_Add->DbValue;

		// Field datetime_Update
		$t_answer->datetime_Update->SetDbValueDef(ew_UnFormatDateTime($t_answer->datetime_Update->CurrentValue, 7), NULL);
		$rsnew['datetime_Update'] =& $t_answer->datetime_Update->DbValue;

		// Field User_Update
		$t_answer->User_Update->SetDbValueDef($t_answer->User_Update->CurrentValue, NULL);
		$rsnew['User_Update'] =& $t_answer->User_Update->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_answer->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_answer->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_answer->CancelMessage <> "") {
				$this->setMessage($t_answer->CancelMessage);
				$t_answer->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_answer->answer_id->setDbValue($conn->Insert_ID());
			$rsnew['answer_id'] =& $t_answer->answer_id->DbValue;

			// Call Row Inserted event
			$t_answer->Row_Inserted($rsnew);
		}
                
                $ID_Group= $_POST['x_s_group'];
                 $s_public = $_POST['s_public'];
                  $conn = ew_Connect();
                  if($_SESSION["s_number"]==3){
                    $sql= " UPDATE  t_question SET active = 1, status = 1,s_finish= 1, s_public = " .$s_public .",ID_Group = '" .$ID_Group ."' ,datetime_Update = '". date("Y-m-d H:i:s") . "' ,datetime_kq = '". date("Y-m-d H:i:s") . "', user_IDAndser =  '". $_SESSION['user']. "' " ." WHERE question_id = '".   $_SESSION["question_id"] ."'";
                    }else
                  {
                    $sql= " UPDATE  t_question SET active = 1, status = 1, s_public = " .$s_public .",ID_Group = '" .$ID_Group ."' ,datetime_Update = '". date("Y-m-d H:i:s") . "' ,datetime_kq = '". date("Y-m-d H:i:s") . "', user_IDAndser =  '". $_SESSION['user']. "' " . "   WHERE question_id = '".   $_SESSION["question_id"] ."'";  
                  }
                    if (!mysql_query($sql))
                    {
                    die('Error: ' . mysql_error());
                    }
                    if( $_SESSION["mailq"]<> "")
                    {
                            $from_name = "HPU Suportonline!";
                            $from_email = "hpu@hpu.edu.vn";
                            $headers .= 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

                            $headers .= "From: $from_name <$from_email>";
                           
                            $header .= "Cc:". $_SESSION["mailq"] ."\r\n";
                            $headers .= 'Bcc:'. $_SESSION["mailq"] . "\r\n";
                           
                            $body = "Câu hỏi của bạn có mã là:   " .  $_SESSION["IdCodeq"] . "</i></b> Đã được trả lời <br \>" ;
                            $body .= "<b>Bạn có thể vào phần trả lời tại trang <a  href='http://vp.hpu.edu.vn'>vp.hpu.edu.vn</a> nhập mã để xem câu trả lời! </b>";
                            $subject = "HPU Suportonline!";
                            $to = $_SESSION["mailq"];
                            /*
                            if (mail($to, $subject, $body, $headers)) {
                            // echo "success!";
                            } else {
                            // echo "fail…";
                            }
                             
                             */
                    }
                     
                    
		return $AddRow;
	}

	// Page Load event.
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
