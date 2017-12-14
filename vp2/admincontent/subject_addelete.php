<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "subject_adinfo.php" ?>
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
$subject_ad_delete = new csubject_ad_delete();
$Page =& $subject_ad_delete;

// Page init processing
$subject_ad_delete->Page_Init();

// Page main processing
$subject_ad_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var subject_ad_delete = new ew_Page("subject_ad_delete");

// page properties
subject_ad_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = subject_ad_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
subject_ad_delete.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
subject_ad_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
subject_ad_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
subject_ad_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $subject_ad_delete->LoadRecordset();
$subject_ad_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($subject_ad_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$subject_ad_delete->Page_Terminate("subject_adlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $subject_ad->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý chuyên mục quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $subject_ad_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="subject_ad">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($subject_ad_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $subject_ad->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo Lang_Text('Tên chuyên mục');?></td>
		<td valign="top"><?php echo Lang_Text('Trạng thái');?></td>
	</tr>
	</thead>
	<tbody>
<?php
$subject_ad_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$subject_ad_delete->lRecCnt++;

	// Set row properties
	$subject_ad->CssClass = "";
	$subject_ad->CssStyle = "";
	$subject_ad->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$subject_ad_delete->LoadRowValues($rs);

	// Render row
	$subject_ad_delete->RenderRow();
?>
	<tr<?php echo $subject_ad->RowAttributes() ?>>
		<td<?php echo $subject_ad->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $subject_ad->ten_chuyenmuc->ViewAttributes() ?>><?php echo $subject_ad->ten_chuyenmuc->ListViewValue() ?></div></td>
		<td<?php echo $subject_ad->trang_thai->CellAttributes() ?>>
<div<?php echo $subject_ad->trang_thai->ViewAttributes() ?>><?php echo $subject_ad->trang_thai->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value=" <?php echo Lang_Text('Xóa');?> ">
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
class csubject_ad_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'subject_ad';

	// Page Object Name
	var $PageObjName = 'subject_ad_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $subject_ad;
		if ($subject_ad->UseTokenInUrl) $PageUrl .= "t=" . $subject_ad->TableVar . "&"; // add page token
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
		global $objForm, $subject_ad;
		if ($subject_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($subject_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($subject_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function csubject_ad_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["subject_ad"] = new csubject_ad();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'subject_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $subject_ad;
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
			$this->Page_Terminate("subject_adlist.php");
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
		global $subject_ad;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["chuyenmuc_id"] <> "") {
			$subject_ad->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);
			if (!is_numeric($subject_ad->chuyenmuc_id->QueryStringValue))
				$this->Page_Terminate("subject_adlist.php"); // Prevent SQL injection, exit
			$sKey .= $subject_ad->chuyenmuc_id->QueryStringValue;
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
			$this->Page_Terminate("subject_adlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("subject_adlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`chuyenmuc_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in subject_ad class, subject_adinfo.php

		$subject_ad->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$subject_ad->CurrentAction = $_POST["a_delete"];
		} else {
			$subject_ad->CurrentAction = "I"; // Display record
		}
		switch ($subject_ad->CurrentAction) {
			case "D": // Delete
				$subject_ad->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage(Lang_Text('Xóa thành công')); // Set up success message
					$this->Page_Terminate($subject_ad->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	////hung- kiem tra toan ven du lieu
//         function Check_Reference($key) {
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
		global $conn, $Security, $subject_ad;
		$DeleteRows = TRUE;
		$sWrkFilter = $subject_ad->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in subject_ad class, subject_adinfo.php

		$subject_ad->CurrentFilter = $sWrkFilter;
		$sSql = $subject_ad->SQL();
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
				$DeleteRows = $subject_ad->Row_Deleting($row);
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
				if (Check_Reference($row['chuyenmuc_id'],"advertising_info,advertising_subject","chuyenmuc_id,chuyenmuc_belongto")){
				$DeleteRows = $conn->Execute($subject_ad->DeleteSQL($row));                                
                                } // Delete}
                                else {
                                $this->setMessage("Không thể xóa vì có bản ghi liên quan");
                                $DeleteRows = FALSE; }
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($subject_ad->CancelMessage <> "") {
				$this->setMessage($subject_ad->CancelMessage);
				$subject_ad->CancelMessage = "";
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
				$subject_ad->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $subject_ad;

		// Call Recordset Selecting event
		$subject_ad->Recordset_Selecting($subject_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $subject_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$subject_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $subject_ad;
		$sFilter = $subject_ad->KeyFilter();

		// Call Row Selecting event
		$subject_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$subject_ad->CurrentFilter = $sFilter;
		$sSql = $subject_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$subject_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $subject_ad;
		$subject_ad->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$subject_ad->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$subject_ad->ten_chuyenmuc_en->setDbValue($rs->fields('ten_chuyenmuc_en'));
		$subject_ad->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$subject_ad->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$subject_ad->trang_thai->setDbValue($rs->fields('trang_thai'));
		$subject_ad->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$subject_ad->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$subject_ad->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$subject_ad->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $subject_ad;

		// Call Row_Rendering event
		$subject_ad->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$subject_ad->ten_chuyenmuc->CellCssStyle = "white-space: nowrap;";
		$subject_ad->ten_chuyenmuc->CellCssClass = "";
		
		// ten_chuyenmuc_en

		$subject_ad->ten_chuyenmuc_en->CellCssStyle = "white-space: nowrap;";
		$subject_ad->ten_chuyenmuc_en->CellCssClass = "";

		// trang_thai
		$subject_ad->trang_thai->CellCssStyle = "white-space: nowrap;";
		$subject_ad->trang_thai->CellCssClass = "";
		if ($subject_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$subject_ad->ten_chuyenmuc->ViewValue = $subject_ad->ten_chuyenmuc->CurrentValue;
			$subject_ad->ten_chuyenmuc->CssStyle = "";
			$subject_ad->ten_chuyenmuc->CssClass = "";
			$subject_ad->ten_chuyenmuc->ViewCustomAttributes = "";
			
			// ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->ViewValue = $subject_ad->ten_chuyenmuc_en->CurrentValue;
			$subject_ad->ten_chuyenmuc_en->CssStyle = "";
			$subject_ad->ten_chuyenmuc_en->CssClass = "";
			$subject_ad->ten_chuyenmuc_en->ViewCustomAttributes = "";

			// trang_thai
			if (strval($subject_ad->trang_thai->CurrentValue) <> "") {
				switch ($subject_ad->trang_thai->CurrentValue) {
					case "0":
						$subject_ad->trang_thai->ViewValue = Lang_Text("Không xuất bản");
						break;
					case "1":
						$subject_ad->trang_thai->ViewValue = Lang_Text("Xuất bản");
						break;
					default:
						$subject_ad->trang_thai->ViewValue = $subject_ad->trang_thai->CurrentValue;
				}
			} else {
				$subject_ad->trang_thai->ViewValue = NULL;
			}
			$subject_ad->trang_thai->CssStyle = "";
			$subject_ad->trang_thai->CssClass = "";
			$subject_ad->trang_thai->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$subject_ad->ten_chuyenmuc->HrefValue = "";
			
			// ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->HrefValue = "";
			

			// trang_thai
			$subject_ad->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$subject_ad->Row_Rendered();
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
