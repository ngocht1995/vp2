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
$Nganhnghe_delete = new cNganhnghe_delete();
$Page =& $Nganhnghe_delete;

// Page init processing
$Nganhnghe_delete->Page_Init();

// Page main processing
$Nganhnghe_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var Nganhnghe_delete = new ew_Page("Nganhnghe_delete");

// page properties
Nganhnghe_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = Nganhnghe_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
Nganhnghe_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
Nganhnghe_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Nganhnghe_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $Nganhnghe_delete->LoadRecordset();
$Nganhnghe_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($Nganhnghe_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$Nganhnghe_delete->Page_Terminate("manager_careerlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $Nganhnghe->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa nhóm ngành nghề</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $Nganhnghe_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="Nganhnghe">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($Nganhnghe_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $Nganhnghe->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tên nhóm ngành</td>
		<td valign="top">Ảnh</td>
	</tr>
	</thead>
	<tbody>
<?php
$Nganhnghe_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$Nganhnghe_delete->lRecCnt++;

	// Set row properties
	$Nganhnghe->CssClass = "";
	$Nganhnghe->CssStyle = "";
	$Nganhnghe->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$Nganhnghe_delete->LoadRowValues($rs);

	// Render row
	$Nganhnghe_delete->RenderRow();
?>
	<tr<?php echo $Nganhnghe->RowAttributes() ?>>
		<td<?php echo $Nganhnghe->nganhnghe_ten->CellAttributes() ?>>
<div<?php echo $Nganhnghe->nganhnghe_ten->ViewAttributes() ?>><?php echo $Nganhnghe->nganhnghe_ten->ListViewValue() ?></div></td>
		<td<?php echo $Nganhnghe->nganhnghe_pic->CellAttributes() ?>>
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
<input type="submit" name="Action" id="Action" value="   Xóa   ">
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
class cNganhnghe_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'Nganhnghe';

	// Page Object Name
	var $PageObjName = 'Nganhnghe_delete';

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
	function cNganhnghe_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["Nganhnghe"] = new cNganhnghe();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $Nganhnghe;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["nganhnghe_id"] <> "") {
			$Nganhnghe->nganhnghe_id->setQueryStringValue($_GET["nganhnghe_id"]);
			if (!is_numeric($Nganhnghe->nganhnghe_id->QueryStringValue))
				$this->Page_Terminate("manager_careerlist.php"); // Prevent SQL injection, exit
			$sKey .= $Nganhnghe->nganhnghe_id->QueryStringValue;
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
			$this->Page_Terminate("manager_careerlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("manager_careerlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`nganhnghe_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in Nganhnghe class, manager_careerinfo.php

		$Nganhnghe->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$Nganhnghe->CurrentAction = $_POST["a_delete"];
		} else {
			$Nganhnghe->CurrentAction = "I"; // Display record
		}
		switch ($Nganhnghe->CurrentAction) {
			case "D": // Delete
				$Nganhnghe->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa"); // Set up success message
					$this->Page_Terminate($Nganhnghe->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
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
		global $conn, $Security, $Nganhnghe;
		$DeleteRows = TRUE;
		$sWrkFilter = $Nganhnghe->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in Nganhnghe class, manager_careerinfo.php

		$Nganhnghe->CurrentFilter = $sWrkFilter;
		$sSql = $Nganhnghe->SQL();
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
				$DeleteRows = $Nganhnghe->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($Nganhnghe->DeleteSQL($row));} // Delete}
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
			if ($Nganhnghe->CancelMessage <> "") {
				$this->setMessage($Nganhnghe->CancelMessage);
				$Nganhnghe->CancelMessage = "";
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
				$Nganhnghe->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Nganhnghe;

		// Call Recordset Selecting event
		$Nganhnghe->Recordset_Selecting($Nganhnghe->CurrentFilter);

		// Load list page SQL
		$sSql = $Nganhnghe->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Nganhnghe->Recordset_Selected($rs);
		return $rs;
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
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Nganhnghe;

		// Call Row_Rendering event
		$Nganhnghe->Row_Rendering();

		// Common render codes for all row types
		// nganhnghe_ten

		$Nganhnghe->nganhnghe_ten->CellCssStyle = "white-space: nowrap;";
		$Nganhnghe->nganhnghe_ten->CellCssClass = "";

		// nganhnghe_pic
		$Nganhnghe->nganhnghe_pic->CellCssStyle = "white-space: nowrap;";
		$Nganhnghe->nganhnghe_pic->CellCssClass = "";
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

			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->HrefValue = "manager_career_pic_bv.php?nganhnghe_id=" . $Nganhnghe->nganhnghe_id->CurrentValue;
				if ($Nganhnghe->Export <> "") $Nganhnghe->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($Nganhnghe->nganhnghe_pic->HrefValue);
			} else {
				$Nganhnghe->nganhnghe_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$Nganhnghe->Row_Rendered();
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
