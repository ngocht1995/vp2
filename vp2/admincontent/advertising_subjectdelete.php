<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertising_subjectinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "subject_adinfo.php" ?>
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
$advertising_subject_delete = new cadvertising_subject_delete();
$Page =& $advertising_subject_delete;

// Page init processing
$advertising_subject_delete->Page_Init();

// Page main processing
$advertising_subject_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_subject_delete = new ew_Page("advertising_subject_delete");

// page properties
advertising_subject_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = advertising_subject_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_subject_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_subject_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_subject_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_subject_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $advertising_subject_delete->LoadRecordset();
$advertising_subject_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($advertising_subject_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$advertising_subject_delete->Page_Terminate("advertising_subjectlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $advertising_subject->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý chuyên mục quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $advertising_subject_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="advertising_subject">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($advertising_subject_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $advertising_subject->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tên Menu con</td>
		<td valign="top"><?php echo Lang_Text('Trạng thái');?></td>
	</tr>
	</thead>
	<tbody>
<?php
$advertising_subject_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$advertising_subject_delete->lRecCnt++;

	// Set row properties
	$advertising_subject->CssClass = "";
	$advertising_subject->CssStyle = "";
	$advertising_subject->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$advertising_subject_delete->LoadRowValues($rs);

	// Render row
	$advertising_subject_delete->RenderRow();
?>
	<tr<?php echo $advertising_subject->RowAttributes() ?>>
		<td<?php echo $advertising_subject->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $advertising_subject->ten_chuyenmuc->ViewAttributes() ?>><?php echo $advertising_subject->ten_chuyenmuc->ListViewValue() ?></div></td>
		<td<?php echo $advertising_subject->trang_thai->CellAttributes() ?>>
<div<?php echo $advertising_subject->trang_thai->ViewAttributes() ?>><?php echo $advertising_subject->trang_thai->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="<?php echo Lang_Text('Xóa');?>">
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
class cadvertising_subject_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'advertising_subject';

	// Page Object Name
	var $PageObjName = 'advertising_subject_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising_subject;
		if ($advertising_subject->UseTokenInUrl) $PageUrl .= "t=" . $advertising_subject->TableVar . "&"; // add page token
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
		global $objForm, $advertising_subject;
		if ($advertising_subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising_subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising_subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_subject_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_subject"] = new cadvertising_subject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['subject_ad'] = new csubject_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising_subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising_subject;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("subject_ad");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("advertising_subjectlist.php");
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
		global $advertising_subject;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["chuyenmuc_id"] <> "") {
			$advertising_subject->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);
			if (!is_numeric($advertising_subject->chuyenmuc_id->QueryStringValue))
				$this->Page_Terminate("advertising_subjectlist.php"); // Prevent SQL injection, exit
			$sKey .= $advertising_subject->chuyenmuc_id->QueryStringValue;
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
			$this->Page_Terminate("advertising_subjectlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("advertising_subjectlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`chuyenmuc_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in advertising_subject class, advertising_subjectinfo.php

		$advertising_subject->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$advertising_subject->CurrentAction = $_POST["a_delete"];
		} else {
			$advertising_subject->CurrentAction = "I"; // Display record
		}
		switch ($advertising_subject->CurrentAction) {
			case "D": // Delete
				$advertising_subject->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage(Lang_Text('Xóa thành công')); // Set up success message
					$this->Page_Terminate($advertising_subject->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
//	 function Check_Reference($key) {
//                global $conn;
//                $Check_Reference=TRUE;
//                    $sSql = "select * from advertising_info where chuyenmuc_id=".$key['chuyenmuc_id'];
//                    $rswrk = $conn->Execute($sSql);
//                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
//                    if ($rswrk) $rswrk->Close();
//                    $rowswrk = count($arwrk);
//                    if ($rowswrk>0){
//                        $Check_Reference=FALSE;
//                         $this->setMessage("Không thể xóa vì có bài viết liên quan");
//                        }
//                    $sSql = "select * from advertising_subject where chuyenmuc_belongto=".$key['chuyenmuc_id'];
//                    $rswrk = $conn->Execute($sSql);
//                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
//                    if ($rswrk) $rswrk->Close();
//                    $rowswrk = count($arwrk);
//                    if ($rowswrk>0){
//                        $Check_Reference=FALSE;
//                        $this->setMessage("Không thể xóa vì có chuyên mục cấp 2");
//                        }
//                        return $Check_Reference;
//            }
	function DeleteRows() {
		global $conn, $Security, $advertising_subject;
		$DeleteRows = TRUE;
		$sWrkFilter = $advertising_subject->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in advertising_subject class, advertising_subjectinfo.php

		$advertising_subject->CurrentFilter = $sWrkFilter;
		$sSql = $advertising_subject->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage(Lang_Text('Không có dữ liệu')); // No record found
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
				$DeleteRows = $advertising_subject->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['chuyenmuc_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				if (Check_Reference($row['chuyenmuc_id'],'advertising_info,advertising_subject','chuyenmuc_id,chuyenmuc_belongto')){
				$DeleteRows = $conn->Execute($advertising_subject->DeleteSQL($row));} // Delete}
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
			if ($advertising_subject->CancelMessage <> "") {
				$this->setMessage($advertising_subject->CancelMessage);
				$advertising_subject->CancelMessage = "";
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
				$advertising_subject->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising_subject;

		// Call Recordset Selecting event
		$advertising_subject->Recordset_Selecting($advertising_subject->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising_subject->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising_subject->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising_subject;
		$sFilter = $advertising_subject->KeyFilter();

		// Call Row Selecting event
		$advertising_subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising_subject->CurrentFilter = $sFilter;
		$sSql = $advertising_subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising_subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising_subject;
		$advertising_subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$advertising_subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$advertising_subject->ten_chuyenmuc_en->setDbValue($rs->fields('ten_chuyenmuc_en'));
		$advertising_subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$advertising_subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$advertising_subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$advertising_subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising_subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$advertising_subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising_subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising_subject;

		// Call Row_Rendering event
		$advertising_subject->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$advertising_subject->ten_chuyenmuc->CellCssStyle = "white-space: nowrap;";
		$advertising_subject->ten_chuyenmuc->CellCssClass = "";
		
		// ten_chuyenmuc_en

		$advertising_subject->ten_chuyenmuc_en->CellCssStyle = "white-space: nowrap;";
		$advertising_subject->ten_chuyenmuc_en->CellCssClass = "";

		// trang_thai
		$advertising_subject->trang_thai->CellCssStyle = "white-space: nowrap;";
		$advertising_subject->trang_thai->CellCssClass = "";
		if ($advertising_subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$advertising_subject->ten_chuyenmuc->ViewValue = $advertising_subject->ten_chuyenmuc->CurrentValue;
			$advertising_subject->ten_chuyenmuc->CssStyle = "";
			$advertising_subject->ten_chuyenmuc->CssClass = "";
			$advertising_subject->ten_chuyenmuc->ViewCustomAttributes = "";
			
			// ten_chuyenmuc_en
			$advertising_subject->ten_chuyenmuc_en->ViewValue = $advertising_subject->ten_chuyenmuc_en->CurrentValue;
			$advertising_subject->ten_chuyenmuc_en->CssStyle = "";
			$advertising_subject->ten_chuyenmuc_en->CssClass = "";
			$advertising_subject->ten_chuyenmuc_en->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising_subject->trang_thai->CurrentValue) <> "") {
				switch ($advertising_subject->trang_thai->CurrentValue) {
					case "0":
						$advertising_subject->trang_thai->ViewValue = Lang_Text("Không xuất bản");
						break;
					case "1":
						$advertising_subject->trang_thai->ViewValue = Lang_Text("Xuất bản");
						break;
					default:
						$advertising_subject->trang_thai->ViewValue = $advertising_subject->trang_thai->CurrentValue;
				}
			} else {
				$advertising_subject->trang_thai->ViewValue = NULL;
			}
			$advertising_subject->trang_thai->CssStyle = "";
			$advertising_subject->trang_thai->CssClass = "";
			$advertising_subject->trang_thai->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$advertising_subject->ten_chuyenmuc->HrefValue = "";
			
			// ten_chuyenmuc_en
			$advertising_subject->ten_chuyenmuc_en->HrefValue = "";

			// trang_thai
			$advertising_subject->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$advertising_subject->Row_Rendered();
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
