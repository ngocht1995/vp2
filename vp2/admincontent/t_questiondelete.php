<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_questioninfo.php" ?>
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
$t_question_delete = new ct_question_delete();
$Page =& $t_question_delete;

// Page init processing
$t_question_delete->Page_Init();

// Page main processing
$t_question_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_delete = new ew_Page("t_question_delete");

// page properties
t_question_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_question_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_question_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_question_delete->LoadRecordset();
$t_question_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_question_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_question_delete->Page_Terminate("t_questionlist.php"); // Return to list
}

                        
?>
<p><span class="phpmaker">Delete From TABLE: T Question<br><br>
<a href="<?php echo $t_question->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_question_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_question">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_question_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_question->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Nh�m c�u h?i</td>
		<td valign="top">M� c�u h?i</td>
		<td valign="top">Datetime H</td>
		<td valign="top">Msv Id</td>
		<td valign="top">Status</td>
		<td valign="top">Active</td>
		<td valign="top">S Level</td>
		<td valign="top">S Multi</td>
		<td valign="top">S Ok</td>
		<td valign="top">S Number</td>
		<td valign="top">S Finish</td>
		<td valign="top">Status Faq</td>
		<td valign="top">S Public</td>
		<td valign="top">Datetime Hen</td>
		<td valign="top">Datetime Kq</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_question_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_question_delete->lRecCnt++;

	// Set row properties
	$t_question->CssClass = "";
	$t_question->CssStyle = "";
	$t_question->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_question_delete->LoadRowValues($rs);

	// Render row
	$t_question_delete->RenderRow();
?>
	<tr<?php echo $t_question->RowAttributes() ?>>
		<td<?php echo $t_question->cat_question_id->CellAttributes() ?>>
<div<?php echo $t_question->cat_question_id->ViewAttributes() ?>><?php echo $t_question->cat_question_id->ListViewValue() ?></div></td>
		<td<?php echo $t_question->IDcard->CellAttributes() ?>>
<div<?php echo $t_question->IDcard->ViewAttributes() ?>><?php echo $t_question->IDcard->ListViewValue() ?></div></td>
		<td<?php echo $t_question->datetime_h->CellAttributes() ?>>
<div<?php echo $t_question->datetime_h->ViewAttributes() ?>><?php echo $t_question->datetime_h->ListViewValue() ?></div></td>
		<td<?php echo $t_question->msv_id->CellAttributes() ?>>
<div<?php echo $t_question->msv_id->ViewAttributes() ?>><?php echo $t_question->msv_id->ListViewValue() ?></div></td>
		<td<?php echo $t_question->status->CellAttributes() ?>>
<div<?php echo $t_question->status->ViewAttributes() ?>><?php echo $t_question->status->ListViewValue() ?></div></td>
		<td<?php echo $t_question->active->CellAttributes() ?>>
<div<?php echo $t_question->active->ViewAttributes() ?>><?php echo $t_question->active->ListViewValue() ?></div></td>
		<td<?php echo $t_question->s_level->CellAttributes() ?>>
<div<?php echo $t_question->s_level->ViewAttributes() ?>><?php echo $t_question->s_level->ListViewValue() ?></div></td>
		<td<?php echo $t_question->s_Multi->CellAttributes() ?>>
<div<?php echo $t_question->s_Multi->ViewAttributes() ?>><?php echo $t_question->s_Multi->ListViewValue() ?></div></td>
		<td<?php echo $t_question->s_ok->CellAttributes() ?>>
<div<?php echo $t_question->s_ok->ViewAttributes() ?>><?php echo $t_question->s_ok->ListViewValue() ?></div></td>
		<td<?php echo $t_question->s_number->CellAttributes() ?>>
<div<?php echo $t_question->s_number->ViewAttributes() ?>><?php echo $t_question->s_number->ListViewValue() ?></div></td>
		<td<?php echo $t_question->s_finish->CellAttributes() ?>>
<div<?php echo $t_question->s_finish->ViewAttributes() ?>><?php echo $t_question->s_finish->ListViewValue() ?></div></td>
		<td<?php echo $t_question->status_faq->CellAttributes() ?>>
<div<?php echo $t_question->status_faq->ViewAttributes() ?>><?php echo $t_question->status_faq->ListViewValue() ?></div></td>
		<td<?php echo $t_question->s_public->CellAttributes() ?>>
<div<?php echo $t_question->s_public->ViewAttributes() ?>><?php echo $t_question->s_public->ListViewValue() ?></div></td>
		<td<?php echo $t_question->datetime_hen->CellAttributes() ?>>
<div<?php echo $t_question->datetime_hen->ViewAttributes() ?>><?php echo $t_question->datetime_hen->ListViewValue() ?></div></td>
		<td<?php echo $t_question->datetime_kq->CellAttributes() ?>>
<div<?php echo $t_question->datetime_kq->ViewAttributes() ?>><?php echo $t_question->datetime_kq->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="Confirm Delete">
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
class ct_question_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_question';

	// Page Object Name
	var $PageObjName = 't_question_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question;
		if ($t_question->UseTokenInUrl) $PageUrl .= "t=" . $t_question->TableVar . "&"; // add page token
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
		global $objForm, $t_question;
		if ($t_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question"] = new ct_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question;

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
		global $t_question;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["question_id"] <> "") {
			$t_question->question_id->setQueryStringValue($_GET["question_id"]);
                        
			if (!is_numeric($t_question->question_id->QueryStringValue))
				$this->Page_Terminate("t_questionlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_question->question_id->QueryStringValue;
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
			$this->Page_Terminate("t_questionlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_questionlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`question_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_question class, t_questioninfo.php

		$t_question->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_question->CurrentAction = $_POST["a_delete"];
		} else {
			$t_question->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_question->CurrentAction) {
			case "D": // Delete
				$t_question->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_question->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_question;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_question->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_question class, t_questioninfo.php

		$t_question->CurrentFilter = $sWrkFilter;
		$sSql = $t_question->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("No records found"); // No record found
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
				$DeleteRows = $t_question->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['question_id'];
                                /// luu key vao session
                                $_SESSION['idQ'] = $row['question_id']; 
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_question->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_question->CancelMessage <> "") {
				$this->setMessage($t_question->CancelMessage);
				$t_question->CancelMessage = "";
			} else {
				$this->setMessage("Delete cancelled");
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
				$t_question->Row_Deleted($row);
			}	
		}
               
                  $sql= "DELETE FROM  t_answer  WHERE question_id = '".$_SESSION['idQ']."'";
                                        if (!mysql_query($sql))
                                        {
                                        die('Error: ' . mysql_error());
                                        }
                
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_question;

		// Call Recordset Selecting event
		$t_question->Recordset_Selecting($t_question->CurrentFilter);

		// Load list page SQL
		$sSql = $t_question->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_question->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question;
		$sFilter = $t_question->KeyFilter();

		// Call Row Selecting event
		$t_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question->CurrentFilter = $sFilter;
		$sSql = $t_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question;
		$t_question->question_id->setDbValue($rs->fields('question_id'));
		$t_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_question->IDcard->setDbValue($rs->fields('IDcard'));
		$t_question->datetime_h->setDbValue($rs->fields('datetime_h'));
		$t_question->msv_id->setDbValue($rs->fields('msv_id'));
		$t_question->zemail->setDbValue($rs->fields('email'));
		$t_question->user_name->setDbValue($rs->fields('user_name'));
		$t_question->tel->setDbValue($rs->fields('tel'));
		$t_question->content->setDbValue($rs->fields('content'));
		$t_question->content1->setDbValue($rs->fields('content1'));
		$t_question->content2->setDbValue($rs->fields('content2'));
		$t_question->description->setDbValue($rs->fields('description'));
		$t_question->status->setDbValue($rs->fields('status'));
		$t_question->active->setDbValue($rs->fields('active'));
		$t_question->s_level->setDbValue($rs->fields('s_level'));
		$t_question->s_Multi->setDbValue($rs->fields('s_Multi'));
		$t_question->s_ok->setDbValue($rs->fields('s_ok'));
		$t_question->s_number->setDbValue($rs->fields('s_number'));
		$t_question->s_finish->setDbValue($rs->fields('s_finish'));
		$t_question->status_faq->setDbValue($rs->fields('status_faq'));
		$t_question->s_public->setDbValue($rs->fields('s_public'));
		$t_question->datetime_hen->setDbValue($rs->fields('datetime_hen'));
		$t_question->datetime_kq->setDbValue($rs->fields('datetime_kq'));
		$t_question->reason->setDbValue($rs->fields('reason'));
                $t_question->user_IDAndser->setDbValue($rs->fields('user_IDAndser'));
		$t_question->datetime_update->setDbValue($rs->fields('datetime_update'));
		$t_question->ID_Group->setDbValue($rs->fields('ID_Group'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question;

		// Call Row_Rendering event
		$t_question->Row_Rendering();

		// Common render codes for all row types
		// cat_question_id

		$t_question->cat_question_id->CellCssStyle = "";
		$t_question->cat_question_id->CellCssClass = "";

		// IDcard
		$t_question->IDcard->CellCssStyle = "";
		$t_question->IDcard->CellCssClass = "";

		// datetime_h
		$t_question->datetime_h->CellCssStyle = "";
		$t_question->datetime_h->CellCssClass = "";

		// msv_id
		$t_question->msv_id->CellCssStyle = "";
		$t_question->msv_id->CellCssClass = "";

		// status
		$t_question->status->CellCssStyle = "";
		$t_question->status->CellCssClass = "";

		// active
		$t_question->active->CellCssStyle = "";
		$t_question->active->CellCssClass = "";

		// s_level
		$t_question->s_level->CellCssStyle = "";
		$t_question->s_level->CellCssClass = "";

		// s_Multi
		$t_question->s_Multi->CellCssStyle = "";
		$t_question->s_Multi->CellCssClass = "";

		// s_ok
		$t_question->s_ok->CellCssStyle = "";
		$t_question->s_ok->CellCssClass = "";

		// s_number
		$t_question->s_number->CellCssStyle = "";
		$t_question->s_number->CellCssClass = "";

		// s_finish
		$t_question->s_finish->CellCssStyle = "";
		$t_question->s_finish->CellCssClass = "";

		// status_faq
		$t_question->status_faq->CellCssStyle = "";
		$t_question->status_faq->CellCssClass = "";

		// s_public
		$t_question->s_public->CellCssStyle = "";
		$t_question->s_public->CellCssClass = "";

		// datetime_hen
		$t_question->datetime_hen->CellCssStyle = "";
		$t_question->datetime_hen->CellCssClass = "";

		// datetime_kq
		$t_question->datetime_kq->CellCssStyle = "";
		$t_question->datetime_kq->CellCssClass = "";
                
// user_IDAndser
                
		$t_question->user_IDAndser->CellCssStyle = "";
		$t_question->user_IDAndser->CellCssClass = "";

		// datetime_update
		$t_question->datetime_update->CellCssStyle = "";
		$t_question->datetime_update->CellCssClass = "";

		// ID_Group
		$t_question->ID_Group->CellCssStyle = "";
		$t_question->ID_Group->CellCssClass = "";
                
		if ($t_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// cat_question_id
			$t_question->cat_question_id->ViewValue = $t_question->cat_question_id->CurrentValue;
			$t_question->cat_question_id->CssStyle = "";
			$t_question->cat_question_id->CssClass = "";
			$t_question->cat_question_id->ViewCustomAttributes = "";

			// IDcard
			$t_question->IDcard->ViewValue = $t_question->IDcard->CurrentValue;
			$t_question->IDcard->CssStyle = "";
			$t_question->IDcard->CssClass = "";
			$t_question->IDcard->ViewCustomAttributes = "";

			// datetime_h
			$t_question->datetime_h->ViewValue = $t_question->datetime_h->CurrentValue;
			$t_question->datetime_h->ViewValue = ew_FormatDateTime($t_question->datetime_h->ViewValue, 6);
			$t_question->datetime_h->CssStyle = "";
			$t_question->datetime_h->CssClass = "";
			$t_question->datetime_h->ViewCustomAttributes = "";

			// msv_id
			$t_question->msv_id->ViewValue = $t_question->msv_id->CurrentValue;
			$t_question->msv_id->CssStyle = "";
			$t_question->msv_id->CssClass = "";
			$t_question->msv_id->ViewCustomAttributes = "";

			// email
			$t_question->zemail->ViewValue = $t_question->zemail->CurrentValue;
			$t_question->zemail->CssStyle = "";
			$t_question->zemail->CssClass = "";
			$t_question->zemail->ViewCustomAttributes = "";

			// user_name
			$t_question->user_name->ViewValue = $t_question->user_name->CurrentValue;
			$t_question->user_name->CssStyle = "";
			$t_question->user_name->CssClass = "";
			$t_question->user_name->ViewCustomAttributes = "";

			// tel
			$t_question->tel->ViewValue = $t_question->tel->CurrentValue;
			$t_question->tel->CssStyle = "";
			$t_question->tel->CssClass = "";
			$t_question->tel->ViewCustomAttributes = "";

			// status
			if (strval($t_question->status->CurrentValue) <> "") {
				switch ($t_question->status->CurrentValue) {
					case "0":
						$t_question->status->ViewValue = "�ang Ki?m tra";
						break;
					case "1":
						$t_question->status->ViewValue = "�ang S? l�";
						break;
					default:
						$t_question->status->ViewValue = $t_question->status->CurrentValue;
				}
			} else {
				$t_question->status->ViewValue = NULL;
			}
			$t_question->status->CssStyle = "";
			$t_question->status->CssClass = "";
			$t_question->status->ViewCustomAttributes = "";

			// active
			if (strval($t_question->active->CurrentValue) <> "") {
				switch ($t_question->active->CurrentValue) {
					case "0":
						$t_question->active->ViewValue = "Chua xong";
						break;
					case "1":
						$t_question->active->ViewValue = "Tr? loi xong";
						break;
					default:
						$t_question->active->ViewValue = $t_question->active->CurrentValue;
				}
			} else {
				$t_question->active->ViewValue = NULL;
			}
			$t_question->active->CssStyle = "";
			$t_question->active->CssClass = "";
			$t_question->active->ViewCustomAttributes = "";

			// s_level
			if (strval($t_question->s_level->CurrentValue) <> "") {
				switch ($t_question->s_level->CurrentValue) {
					case "0":
						$t_question->s_level->ViewValue = "B�nh thu?ng";
						break;
					case "1":
						$t_question->s_level->ViewValue = "Trung b�nh";
						break;
					case "2":
						$t_question->s_level->ViewValue = "Kh?n";
						break;
					case "3":
						$t_question->s_level->ViewValue = "C?c kh?n";
						break;
					default:
						$t_question->s_level->ViewValue = $t_question->s_level->CurrentValue;
				}
			} else {
				$t_question->s_level->ViewValue = NULL;
			}
			$t_question->s_level->CssStyle = "";
			$t_question->s_level->CssClass = "";
			$t_question->s_level->ViewCustomAttributes = "";

			// s_Multi
			if (strval($t_question->s_Multi->CurrentValue) <> "") {
				switch ($t_question->s_Multi->CurrentValue) {
					case "0":
						$t_question->s_Multi->ViewValue = "�on s? l�";
						break;
					case "1":
						$t_question->s_Multi->ViewValue = "�a s? l�";
						break;
					default:
						$t_question->s_Multi->ViewValue = $t_question->s_Multi->CurrentValue;
				}
			} else {
				$t_question->s_Multi->ViewValue = NULL;
			}
			$t_question->s_Multi->CssStyle = "";
			$t_question->s_Multi->CssClass = "";
			$t_question->s_Multi->ViewCustomAttributes = "";

			// s_ok
			if (strval($t_question->s_ok->CurrentValue) <> "") {
				switch ($t_question->s_ok->CurrentValue) {
					case "0":
						$t_question->s_ok->ViewValue = "Kh�ng th?a m�n";
						break;
					case "1":
						$t_question->s_ok->ViewValue = "Th?a m�n";
						break;
					default:
						$t_question->s_ok->ViewValue = $t_question->s_ok->CurrentValue;
				}
			} else {
				$t_question->s_ok->ViewValue = NULL;
			}
			$t_question->s_ok->CssStyle = "";
			$t_question->s_ok->CssClass = "";
			$t_question->s_ok->ViewCustomAttributes = "";

			// s_number
			$t_question->s_number->ViewValue = $t_question->s_number->CurrentValue;
			$t_question->s_number->CssStyle = "";
			$t_question->s_number->CssClass = "";
			$t_question->s_number->ViewCustomAttributes = "";

			// s_finish
			if (strval($t_question->s_finish->CurrentValue) <> "") {
				switch ($t_question->s_finish->CurrentValue) {
					case "0":
						$t_question->s_finish->ViewValue = "Chua k?t th�c";
						break;
					case "1":
						$t_question->s_finish->ViewValue = "K?t th�c";
						break;
					default:
						$t_question->s_finish->ViewValue = $t_question->s_finish->CurrentValue;
				}
			} else {
				$t_question->s_finish->ViewValue = NULL;
			}
			$t_question->s_finish->CssStyle = "";
			$t_question->s_finish->CssClass = "";
			$t_question->s_finish->ViewCustomAttributes = "";

			// status_faq
			if (strval($t_question->status_faq->CurrentValue) <> "") {
				switch ($t_question->status_faq->CurrentValue) {
					case "0":
						$t_question->status_faq->ViewValue = "Kh�ngi FAQ";
						break;
					case "1":
						$t_question->status_faq->ViewValue = " FAQ";
						break;
					default:
						$t_question->status_faq->ViewValue = $t_question->status_faq->CurrentValue;
				}
			} else {
				$t_question->status_faq->ViewValue = NULL;
			}
			$t_question->status_faq->CssStyle = "";
			$t_question->status_faq->CssClass = "";
			$t_question->status_faq->ViewCustomAttributes = "";

			// s_public
			if (strval($t_question->s_public->CurrentValue) <> "") {
				switch ($t_question->s_public->CurrentValue) {
					case "0":
						$t_question->s_public->ViewValue = "Kh�ng xu?t b?n";
						break;
					case "1":
						$t_question->s_public->ViewValue = "Xu?t b?n";
						break;
					default:
						$t_question->s_public->ViewValue = $t_question->s_public->CurrentValue;
				}
			} else {
				$t_question->s_public->ViewValue = NULL;
			}
			$t_question->s_public->CssStyle = "";
			$t_question->s_public->CssClass = "";
			$t_question->s_public->ViewCustomAttributes = "";

			// datetime_hen
			$t_question->datetime_hen->ViewValue = $t_question->datetime_hen->CurrentValue;
			$t_question->datetime_hen->ViewValue = ew_FormatDateTime($t_question->datetime_hen->ViewValue, 6);
			$t_question->datetime_hen->CssStyle = "";
			$t_question->datetime_hen->CssClass = "";
			$t_question->datetime_hen->ViewCustomAttributes = "";

			// datetime_kq
			$t_question->datetime_kq->ViewValue = $t_question->datetime_kq->CurrentValue;
			$t_question->datetime_kq->ViewValue = ew_FormatDateTime($t_question->datetime_kq->ViewValue, 6);
			$t_question->datetime_kq->CssStyle = "";
			$t_question->datetime_kq->CssClass = "";
			$t_question->datetime_kq->ViewCustomAttributes = "";

                        // user_IDAndser
			$t_question->user_IDAndser->ViewValue = $t_question->user_IDAndser->CurrentValue;
			$t_question->user_IDAndser->CssStyle = "";
			$t_question->user_IDAndser->CssClass = "";
			$t_question->user_IDAndser->ViewCustomAttributes = "";

			// datetime_update
			$t_question->datetime_update->ViewValue = $t_question->datetime_update->CurrentValue;
			$t_question->datetime_update->ViewValue = ew_FormatDateTime($t_question->datetime_update->ViewValue, 7);
			$t_question->datetime_update->CssStyle = "";
			$t_question->datetime_update->CssClass = "";
			$t_question->datetime_update->ViewCustomAttributes = "";

			// ID_Group
			if (strval($t_question->ID_Group->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `NAME` FROM `t_question_group` WHERE `ID` = " . ew_AdjustSql($t_question->ID_Group->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_question->ID_Group->ViewValue = $rswrk->fields('NAME');
					$rswrk->Close();
				} else {
					$t_question->ID_Group->ViewValue = $t_question->ID_Group->CurrentValue;
				}
			} else {
				$t_question->ID_Group->ViewValue = NULL;
			}
			$t_question->ID_Group->CssStyle = "";
			$t_question->ID_Group->CssClass = "";
			$t_question->ID_Group->ViewCustomAttributes = "";
			// cat_question_id
			$t_question->cat_question_id->HrefValue = "";

			// IDcard
			$t_question->IDcard->HrefValue = "";

			// datetime_h
			$t_question->datetime_h->HrefValue = "";

			// msv_id
			$t_question->msv_id->HrefValue = "";

			// status
			$t_question->status->HrefValue = "";

			// active
			$t_question->active->HrefValue = "";

			// s_level
			$t_question->s_level->HrefValue = "";

			// s_Multi
			$t_question->s_Multi->HrefValue = "";

			// s_ok
			$t_question->s_ok->HrefValue = "";

			// s_number
			$t_question->s_number->HrefValue = "";

			// s_finish
			$t_question->s_finish->HrefValue = "";

			// status_faq
			$t_question->status_faq->HrefValue = "";

			// s_public
			$t_question->s_public->HrefValue = "";

			// datetime_hen
			$t_question->datetime_hen->HrefValue = "";

			// datetime_kq
			$t_question->datetime_kq->HrefValue = "";
                        
                        
			// user_IDAndser
			$t_question->user_IDAndser->HrefValue = "";

			// datetime_update
			$t_question->datetime_update->HrefValue = "";

			// ID_Group
			$t_question->ID_Group->HrefValue = "";
		}

		// Call Row Rendered event
		$t_question->Row_Rendered();
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
