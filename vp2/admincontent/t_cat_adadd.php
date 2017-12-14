<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_cat_adinfo.php" ?>
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
$t_cat_ad_add = new ct_cat_ad_add();
$Page =& $t_cat_ad_add;

// Page init processing
$t_cat_ad_add->Page_Init();

// Page main processing
$t_cat_ad_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_cat_ad_add = new ew_Page("t_cat_ad_add");

// page properties
t_cat_ad_add.PageID = "add"; // page ID
var EW_PAGE_ID = t_cat_ad_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_cat_ad_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_name"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Xin nhập tên tiêu đê!");
		elm = fobj.elements["x" + infix + "_cat_order"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Phải nhập số tự nhiên!");
		elm = fobj.elements["x" + infix + "_cat_icon"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "Không đúng kiểu file!");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_cat_ad_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_cat_ad_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_cat_ad_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_cat_ad_add.ValidateRequired = false; // no JavaScript validation
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
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_cat_adlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm chuyên mục</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>
<?php $t_cat_ad_add->ShowMessage() ?>
<form name="ft_cat_adadd" id="ft_cat_adadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_cat_ad_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_cat_ad">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
               <tr>
            <td class="ewTableHeader"> Thuộc đề mục</td>
            <td><select id='x_parentid' name='x_parentid' title="" >
                    <option value="0" selected="selected">Đề mục ngoài cùng</option>
                <?php
                    function Menu($parentid = 0,$space = '', $trees = NULL){
        $conn = ew_Connect();
       $cter = 0;
    if(!$trees) $trees = array();
     $sSqlWrk = "SELECT * FROM t_cat_ad WHERE parentid = ".intval($parentid);
        // echo $sSqlWrk;
        $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        $rowswrk = count($arwrk);
    // echo $rowswrk;
   // $sql = mysql_query("SELECT * FROM t_cat_ad WHERE parentid = ".intval($parentid));
    for($i =0; $i < $rowswrk;$i++){
       //1echo $arwrk[$i]['name'];
    $trees[] = array('id'=>$arwrk[$i]['ad_catID'],'Name'=>$space." ".$arwrk[$i]['name']);
    $trees = Menu($arwrk[$i]['ad_catID'],$space.'--&nbsp;',$trees);
    
    }
    return $trees;
    }
    $Menu = Menu(0);
    $str = "";
    foreach($Menu as $k=>$rs) $str .='<option value='. $rs['id']. '>'. $rs['Name']. '</option>';
    echo $str  ;
                ?>
                    </select>
            </td>
        </tr>
        
<?php if ($t_cat_ad->name->Visible) { // name ?>
	<tr<?php echo $t_cat_ad->name->RowAttributes ?>>
		<td class="ewTableHeader">Tên đề mục</td>
		<td<?php echo $t_cat_ad->name->CellAttributes() ?>><span id="el_name">
<input type="text" name="x_name" id="x_name" size="30" maxlength="255" value="<?php echo $t_cat_ad->name->EditValue ?>"<?php echo $t_cat_ad->name->EditAttributes() ?>>
</span><?php echo $t_cat_ad->name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_cat_ad->cat_order->Visible) { // cat_order ?>
	<tr<?php echo $t_cat_ad->cat_order->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự</td>
		<td<?php echo $t_cat_ad->cat_order->CellAttributes() ?>><span id="el_cat_order">
<input type="text" name="x_cat_order" id="x_cat_order" size="15" value="<?php echo $t_cat_ad->cat_order->EditValue ?>"<?php echo $t_cat_ad->cat_order->EditAttributes() ?>>
</span><?php echo $t_cat_ad->cat_order->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_cat_ad->cat_descript->Visible) { // cat_descript ?>
	<tr<?php echo $t_cat_ad->cat_descript->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả</td>
		<td<?php echo $t_cat_ad->cat_descript->CellAttributes() ?>><span id="el_cat_descript">
<textarea name="x_cat_descript" id="x_cat_descript" cols="35" rows="4"<?php echo $t_cat_ad->cat_descript->EditAttributes() ?>><?php echo $t_cat_ad->cat_descript->EditValue ?></textarea>
</span><?php echo $t_cat_ad->cat_descript->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($t_cat_ad->status->Visible) { // status ?>
	<tr<?php echo $t_cat_ad->status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $t_cat_ad->status->CellAttributes() ?>><span id="el_status">
<div id="tp_x_status" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><input type="radio" name="x_status" id="x_status" value="{value}"<?php echo $t_cat_ad->status->EditAttributes() ?>></div>
<div id="dsl_x_status" repeatcolumn="5">
<?php
$arwrk = $t_cat_ad->status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_cat_ad->status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_status" id="x_status" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_cat_ad->status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_cat_ad->status->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_cat_ad->cat_icon->Visible) { // cat_icon ?>
	<tr<?php echo $t_cat_ad->cat_icon->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh đại diện</td>
		<td<?php echo $t_cat_ad->cat_icon->CellAttributes() ?>><span id="el_cat_icon">
<input type="file" name="x_cat_icon" id="x_cat_icon"<?php echo $t_cat_ad->cat_icon->EditAttributes() ?>>
</div>
</span><?php echo $t_cat_ad->cat_icon->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Thêm    ">
</form>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_parentid','x_parentid',false]]);

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
class ct_cat_ad_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 't_cat_ad';

	// Page Object Name
	var $PageObjName = 't_cat_ad_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_cat_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_cat_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_cat_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_cat_ad_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_ad"] = new ct_cat_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_cat_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_cat_ad;

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
		global $objForm, $gsFormError, $t_cat_ad;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["ad_catID"] != "") {
		  $t_cat_ad->ad_catID->setQueryStringValue($_GET["ad_catID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_cat_ad->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_cat_ad->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_cat_ad->CurrentAction = "C"; // Copy Record
		  } else {
		    $t_cat_ad->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_cat_ad->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("No records found"); // No record found
		      $this->Page_Terminate("t_cat_adlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_cat_ad->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Add succeeded"); // Set up success message
					$sReturnUrl = $t_cat_ad->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_cat_adview.php")
						$sReturnUrl = $t_cat_ad->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_cat_ad->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_cat_ad;

		// Get upload data
			if ($t_cat_ad->cat_icon->Upload->UploadFile()) {

				// No action required
			} else {
				echo $t_cat_ad->cat_icon->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_cat_ad;
		$t_cat_ad->parentid->CurrentValue = 0;
		$t_cat_ad->cat_icon->CurrentValue = NULL; // Clear file related field
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_cat_ad;
		$t_cat_ad->parentid->setFormValue($objForm->GetValue("x_parentid"));
		$t_cat_ad->name->setFormValue($objForm->GetValue("x_name"));
		$t_cat_ad->cat_order->setFormValue($objForm->GetValue("x_cat_order"));
		$t_cat_ad->status->setFormValue($objForm->GetValue("x_status"));
		$t_cat_ad->cat_descript->setFormValue($objForm->GetValue("x_cat_descript"));
		$t_cat_ad->ad_catID->setFormValue($objForm->GetValue("x_ad_catID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_cat_ad;
		$t_cat_ad->ad_catID->CurrentValue = $t_cat_ad->ad_catID->FormValue;
		$t_cat_ad->parentid->CurrentValue = $t_cat_ad->parentid->FormValue;
		$t_cat_ad->name->CurrentValue = $t_cat_ad->name->FormValue;
		$t_cat_ad->cat_order->CurrentValue = $t_cat_ad->cat_order->FormValue;
		$t_cat_ad->status->CurrentValue = $t_cat_ad->status->FormValue;
		$t_cat_ad->cat_descript->CurrentValue = $t_cat_ad->cat_descript->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_cat_ad;
		$sFilter = $t_cat_ad->KeyFilter();

		// Call Row Selecting event
		$t_cat_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_cat_ad->CurrentFilter = $sFilter;
		$sSql = $t_cat_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_cat_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_cat_ad;
		$t_cat_ad->ad_catID->setDbValue($rs->fields('ad_catID'));
		$t_cat_ad->parentid->setDbValue($rs->fields('parentid'));
		$t_cat_ad->name->setDbValue($rs->fields('name'));
		$t_cat_ad->cat_order->setDbValue($rs->fields('cat_order'));
		$t_cat_ad->status->setDbValue($rs->fields('status'));
		$t_cat_ad->cat_descript->setDbValue($rs->fields('cat_descript'));
		$t_cat_ad->cat_icon->Upload->DbValue = $rs->fields('cat_icon');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_cat_ad;

		// Call Row_Rendering event
		$t_cat_ad->Row_Rendering();

		// Common render codes for all row types
		// parentid

		$t_cat_ad->parentid->CellCssStyle = "";
		$t_cat_ad->parentid->CellCssClass = "";

		// name
		$t_cat_ad->name->CellCssStyle = "";
		$t_cat_ad->name->CellCssClass = "";

		// cat_order
		$t_cat_ad->cat_order->CellCssStyle = "";
		$t_cat_ad->cat_order->CellCssClass = "";

		// status
		$t_cat_ad->status->CellCssStyle = "";
		$t_cat_ad->status->CellCssClass = "";

		// cat_descript
		$t_cat_ad->cat_descript->CellCssStyle = "";
		$t_cat_ad->cat_descript->CellCssClass = "";

		// cat_icon
		$t_cat_ad->cat_icon->CellCssStyle = "";
		$t_cat_ad->cat_icon->CellCssClass = "";
		if ($t_cat_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_catID
			$t_cat_ad->ad_catID->ViewValue = $t_cat_ad->ad_catID->CurrentValue;
			$t_cat_ad->ad_catID->CssStyle = "";
			$t_cat_ad->ad_catID->CssClass = "";
			$t_cat_ad->ad_catID->ViewCustomAttributes = "";

			// parentid
			if (strval($t_cat_ad->parentid->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_cat_ad->parentid->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_cat_ad->parentid->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_cat_ad->parentid->ViewValue = $t_cat_ad->parentid->CurrentValue;
				}
			} else {
				$t_cat_ad->parentid->ViewValue = NULL;
			}
			$t_cat_ad->parentid->CssStyle = "";
			$t_cat_ad->parentid->CssClass = "";
			$t_cat_ad->parentid->ViewCustomAttributes = "";

			// name
			$t_cat_ad->name->ViewValue = $t_cat_ad->name->CurrentValue;
			$t_cat_ad->name->CssStyle = "";
			$t_cat_ad->name->CssClass = "";
			$t_cat_ad->name->ViewCustomAttributes = "";

			// cat_order
			$t_cat_ad->cat_order->ViewValue = $t_cat_ad->cat_order->CurrentValue;
			$t_cat_ad->cat_order->CssStyle = "";
			$t_cat_ad->cat_order->CssClass = "";
			$t_cat_ad->cat_order->ViewCustomAttributes = "";

			// status
			if (strval($t_cat_ad->status->CurrentValue) <> "") {
				switch ($t_cat_ad->status->CurrentValue) {
					case "0":
						$t_cat_ad->status->ViewValue = "Chưa";
						break;
					case "1":
						$t_cat_ad->status->ViewValue = "Kích hoạt";
						break;
					default:
						$t_cat_ad->status->ViewValue = $t_cat_ad->status->CurrentValue;
				}
			} else {
				$t_cat_ad->status->ViewValue = NULL;
			}
			$t_cat_ad->status->CssStyle = "";
			$t_cat_ad->status->CssClass = "";
			$t_cat_ad->status->ViewCustomAttributes = "";

			// cat_descript
			$t_cat_ad->cat_descript->ViewValue = $t_cat_ad->cat_descript->CurrentValue;
			$t_cat_ad->cat_descript->CssStyle = "";
			$t_cat_ad->cat_descript->CssClass = "";
			$t_cat_ad->cat_descript->ViewCustomAttributes = "";

			// cat_icon
			if (!is_null($t_cat_ad->cat_icon->Upload->DbValue)) {
				$t_cat_ad->cat_icon->ViewValue = $t_cat_ad->cat_icon->Upload->DbValue;
			} else {
				$t_cat_ad->cat_icon->ViewValue = "";
			}
			$t_cat_ad->cat_icon->CssStyle = "";
			$t_cat_ad->cat_icon->CssClass = "";
			$t_cat_ad->cat_icon->ViewCustomAttributes = "";

			// parentid
			$t_cat_ad->parentid->HrefValue = "";

			// name
			$t_cat_ad->name->HrefValue = "";

			// cat_order
			$t_cat_ad->cat_order->HrefValue = "";

			// status
			$t_cat_ad->status->HrefValue = "";

			// cat_descript
			$t_cat_ad->cat_descript->HrefValue = "";

			// cat_icon
			if (!is_null($t_cat_ad->cat_icon->Upload->DbValue)) {
				$t_cat_ad->cat_icon->HrefValue = ew_UploadPathEx(FALSE, "upload/iconcat_ad/") . ((!empty($t_cat_ad->cat_icon->ViewValue)) ? $t_cat_ad->cat_icon->ViewValue : $t_cat_ad->cat_icon->CurrentValue);
				if ($t_cat_ad->Export <> "") $t_cat_ad->cat_icon->HrefValue = ew_ConvertFullUrl($t_cat_ad->cat_icon->HrefValue);
			} else {
				$t_cat_ad->cat_icon->HrefValue = "";
			}
		} elseif ($t_cat_ad->RowType == EW_ROWTYPE_ADD) { // Add row

			// parentid
			$t_cat_ad->parentid->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `ad_catID`, `name`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_cat_ad`";
			if (trim(strval($t_cat_ad->parentid->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`ad_catID` = " . ew_AdjustSql($t_cat_ad->parentid->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Xin chọn"));
			$t_cat_ad->parentid->EditValue = $arwrk;

			// name
			$t_cat_ad->name->EditCustomAttributes = "";
			$t_cat_ad->name->EditValue = ew_HtmlEncode($t_cat_ad->name->CurrentValue);

			// cat_order
			$t_cat_ad->cat_order->EditCustomAttributes = "";
			$t_cat_ad->cat_order->EditValue = ew_HtmlEncode($t_cat_ad->cat_order->CurrentValue);

			// status
			$t_cat_ad->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa");
			$arwrk[] = array("1", "Kích hoạt");
			$t_cat_ad->status->EditValue = $arwrk;

			// cat_descript
			$t_cat_ad->cat_descript->EditCustomAttributes = "";
			$t_cat_ad->cat_descript->EditValue = ew_HtmlEncode($t_cat_ad->cat_descript->CurrentValue);

			// cat_icon
			$t_cat_ad->cat_icon->EditCustomAttributes = "";
			if (!is_null($t_cat_ad->cat_icon->Upload->DbValue)) {
				$t_cat_ad->cat_icon->EditValue = $t_cat_ad->cat_icon->Upload->DbValue;
			} else {
				$t_cat_ad->cat_icon->EditValue = "";
			}
		}

		// Call Row Rendered event
		$t_cat_ad->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_cat_ad;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($t_cat_ad->cat_icon->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($t_cat_ad->cat_icon->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($t_cat_ad->cat_icon->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Max. file size (%s bytes) exceeded.");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!ew_CheckInteger($t_cat_ad->cat_order->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Cat Order";
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
		global $conn, $Security, $t_cat_ad;
		$rsnew = array();

		// Field parentid
		$t_cat_ad->parentid->SetDbValueDef($t_cat_ad->parentid->CurrentValue, NULL);
		$rsnew['parentid'] =& $t_cat_ad->parentid->DbValue;

		// Field name
		$t_cat_ad->name->SetDbValueDef($t_cat_ad->name->CurrentValue, NULL);
		$rsnew['name'] =& $t_cat_ad->name->DbValue;

		// Field cat_order
		$t_cat_ad->cat_order->SetDbValueDef($t_cat_ad->cat_order->CurrentValue, NULL);
		$rsnew['cat_order'] =& $t_cat_ad->cat_order->DbValue;

		// Field status
		$t_cat_ad->status->SetDbValueDef($t_cat_ad->status->CurrentValue, NULL);
		$rsnew['status'] =& $t_cat_ad->status->DbValue;

		// Field cat_descript
		$t_cat_ad->cat_descript->SetDbValueDef($t_cat_ad->cat_descript->CurrentValue, NULL);
		$rsnew['cat_descript'] =& $t_cat_ad->cat_descript->DbValue;

		// Field cat_icon
		$t_cat_ad->cat_icon->Upload->SaveToSession(); // Save file value to Session
		if (is_null($t_cat_ad->cat_icon->Upload->Value)) {
			$rsnew['cat_icon'] = NULL;
		} else {
			$rsnew['cat_icon'] = ew_UploadFileNameEx(ew_UploadPathEx(True, "upload/iconcat_ad/"), $t_cat_ad->cat_icon->Upload->FileName);
		}

		// Call Row Inserting event
		$bInsertRow = $t_cat_ad->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field cat_icon
			if (!is_null($t_cat_ad->cat_icon->Upload->Value)) {
				if ($t_cat_ad->cat_icon->Upload->FileName == $t_cat_ad->cat_icon->Upload->DbValue) { // Overwrite if same file name
					$t_cat_ad->cat_icon->Upload->SaveToFile("upload/iconcat_ad/", $rsnew['cat_icon'], TRUE);
					$t_cat_ad->cat_icon->Upload->DbValue = ""; // No need to delete any more
				} else {
					$t_cat_ad->cat_icon->Upload->SaveToFile("upload/iconcat_ad/", $rsnew['cat_icon'], FALSE);
				}
			}
			if ($t_cat_ad->cat_icon->Upload->Action == "2" || $t_cat_ad->cat_icon->Upload->Action == "3") { // Update/Remove
				if ($t_cat_ad->cat_icon->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, "upload/iconcat_ad/") . $t_cat_ad->cat_icon->Upload->DbValue);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_cat_ad->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_cat_ad->CancelMessage <> "") {
				$this->setMessage($t_cat_ad->CancelMessage);
				$t_cat_ad->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_cat_ad->ad_catID->setDbValue($conn->Insert_ID());
			$rsnew['ad_catID'] =& $t_cat_ad->ad_catID->DbValue;

			// Call Row Inserted event
			$t_cat_ad->Row_Inserted($rsnew);
		}

		// Field cat_icon
		$t_cat_ad->cat_icon->Upload->RemoveFromSession(); // Remove file value from Session
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
