<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "careerinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "manager_careerinfo.php" ?>
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
$career_delete = new ccareer_delete();
$Page =& $career_delete;

// Page init processing
$career_delete->Page_Init();

// Page main processing
$career_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var career_delete = new ew_Page("career_delete");

// page properties
career_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = career_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
career_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
career_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
career_delete.ValidateRequired = false; // no JavaScript validation
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
<?php

// Load records for display
$rs = $career_delete->LoadRecordset();
$career_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($career_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$career_delete->Page_Terminate("careerlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $career->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa ngành nghề</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $career_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="career">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($career_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $career->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tên ngành nghề</td>
		<td valign="top">Ảnh</td>
	</tr>
	</thead>
	<tbody>
<?php
$career_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$career_delete->lRecCnt++;

	// Set row properties
	$career->CssClass = "";
	$career->CssStyle = "";
	$career->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$career_delete->LoadRowValues($rs);

	// Render row
	$career_delete->RenderRow();
?>
	<tr<?php echo $career->RowAttributes() ?>>
		<td<?php echo $career->nganhnghe_ten->CellAttributes() ?>>
<div<?php echo $career->nganhnghe_ten->ViewAttributes() ?>><?php echo $career->nganhnghe_ten->ListViewValue() ?></div></td>
		<td<?php echo $career->nganhnghe_pic->CellAttributes() ?>>
<?php if ($career->nganhnghe_pic->HrefValue <> "") { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<a href="<?php echo $career->nganhnghe_pic->HrefValue ?>" target="_blank"><img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="  Xóa  ">
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
class ccareer_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'career';

	// Page Object Name
	var $PageObjName = 'career_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $career;
		if ($career->UseTokenInUrl) $PageUrl .= "t=" . $career->TableVar . "&"; // add page token
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
		global $objForm, $career;
		if ($career->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($career->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($career->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ccareer_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["career"] = new ccareer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['Nganhnghe'] = new cNganhnghe();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'career', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $career;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("Nganhnghe");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("careerlist.php");
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $career;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["nganhnghe_id"] <> "") {
			$career->nganhnghe_id->setQueryStringValue($_GET["nganhnghe_id"]);
			if (!is_numeric($career->nganhnghe_id->QueryStringValue))
				$this->Page_Terminate("careerlist.php"); // Prevent SQL injection, exit
			$sKey .= $career->nganhnghe_id->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("careerlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("careerlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`nganhnghe_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in career class, careerinfo.php

		$career->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$career->CurrentAction = $_POST["a_delete"];
		} else {
			$career->CurrentAction = "I"; // Display record
		}
		switch ($career->CurrentAction) {
			case "D": // Delete
				$career->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa"); // Set up success message
					$this->Page_Terminate($career->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
        //hung- kiem tra toan ven du lieu
         function Check_Reference($key) {
                global $conn;
                $Check_Reference=TRUE;
                    $sSql = "select * from career where nganhnghe_belongto=".$key['nganhnghe_id'];
                    $rswrk = $conn->Execute($sSql);
                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                    if ($rswrk) $rswrk->Close();
                    $rowswrk = count($arwrk);
                    if ($rowswrk>0){
                        $Check_Reference=FALSE;
                         $this->setMessage("Không thể xóa vì có ngành nghề cấp 2");
                        }
                    $sSql = "select * from offer where nganhnghe_id=".$key['nganhnghe_id'];
                    $rswrk = $conn->Execute($sSql);
                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                    if ($rswrk) $rswrk->Close();
                    $rowswrk = count($arwrk);
                    if ($rowswrk>0){
                        $Check_Reference=FALSE;
                        $this->setMessage("Không thể xóa vì có chào hàng liên quan");
                        }
                    $sSql = "select * from products where nganhnghe_id=".$key['nganhnghe_id'];
                    $rswrk = $conn->Execute($sSql);
                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                    if ($rswrk) $rswrk->Close();
                    $rowswrk = count($arwrk);
                    if ($rowswrk>0){
                        $Check_Reference=FALSE;
                        $this->setMessage("Không thể xóa vì có sản phẩm liên quan");
                        }



                        return $Check_Reference;
            }
	function DeleteRows() {
		global $conn, $Security, $career;
		$DeleteRows = TRUE;
		$sWrkFilter = $career->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in career class, careerinfo.php

		$career->CurrentFilter = $sWrkFilter;
		$sSql = $career->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("Không có dữ liệu"); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs) $rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $career->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['nganhnghe_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
                                if ($this->Check_Reference($row)){
				$DeleteRows = $conn->Execute($career->DeleteSQL($row));} // Delete}
                                else {
                                $DeleteRows = FALSE; }
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($career->CancelMessage <> "") {
				$this->setMessage($career->CancelMessage);
				$career->CancelMessage = "";
			} else {
				$this->setMessage("Xóa bị hủy bỏ");
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call recordset deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$career->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $career;

		// Call Recordset Selecting event
		$career->Recordset_Selecting($career->CurrentFilter);

		// Load list page SQL
		$sSql = $career->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$career->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $career;
		$sFilter = $career->KeyFilter();

		// Call Row Selecting event
		$career->Row_Selecting($sFilter);

		// Load sql based on filter
		$career->CurrentFilter = $sFilter;
		$sSql = $career->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$career->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $career;
		$career->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$career->nganhnghe_ten->setDbValue($rs->fields('nganhnghe_ten'));
		$career->nganhnghe_pic->Upload->DbValue = $rs->fields('nganhnghe_pic');
		$career->nganhnghe_belongto->setDbValue($rs->fields('nganhnghe_belongto'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $career;

		// Call Row_Rendering event
		$career->Row_Rendering();

		// Common render codes for all row types
		// nganhnghe_ten

		$career->nganhnghe_ten->CellCssStyle = "white-space: nowrap;";
		$career->nganhnghe_ten->CellCssClass = "";

		// nganhnghe_pic
		$career->nganhnghe_pic->CellCssStyle = "white-space: nowrap;";
		$career->nganhnghe_pic->CellCssClass = "";
		if ($career->RowType == EW_ROWTYPE_VIEW) { // View row

			// nganhnghe_ten
			$career->nganhnghe_ten->ViewValue = $career->nganhnghe_ten->CurrentValue;
			$career->nganhnghe_ten->CssStyle = "";
			$career->nganhnghe_ten->CssClass = "";
			$career->nganhnghe_ten->ViewCustomAttributes = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->ViewValue = "Nganhnghe Pic";
				$career->nganhnghe_pic->ImageWidth = 100;
				$career->nganhnghe_pic->ImageHeight = 0;
				$career->nganhnghe_pic->ImageAlt = "";
			} else {
				$career->nganhnghe_pic->ViewValue = "";
			}
			$career->nganhnghe_pic->CssStyle = "";
			$career->nganhnghe_pic->CssClass = "";
			$career->nganhnghe_pic->ViewCustomAttributes = "";

			// nganhnghe_ten
			$career->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->HrefValue = "career_nganhnghe_pic_bv.php?nganhnghe_id=" . $career->nganhnghe_id->CurrentValue;
				if ($career->Export <> "") $career->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($career->nganhnghe_pic->HrefValue);
			} else {
				$career->nganhnghe_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$career->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}
}
?>
