<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "ew_emailinfo.php" ?>
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
$ew_email_list = new cew_email_list();
$Page =& $ew_email_list;

// Page init processing
$ew_email_list->Page_Init();

// Page main processing
$ew_email_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($ew_email->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var ew_email_list = new ew_Page("ew_email_list");

// page properties
ew_email_list.PageID = "list"; // page ID
var EW_PAGE_ID = ew_email_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ew_email_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ew_email_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
ew_email_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ew_email_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<?php if ($ew_email->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($ew_email->Export == "" && $ew_email->SelectLimit);
	if (!$bSelectLimit)
		$rs = $ew_email_list->LoadRecordset();
	$ew_email_list->lTotalRecs = ($bSelectLimit) ? $ew_email->SelectRecordCount() : $rs->RecordCount();
	$ew_email_list->lStartRec = 1;
	if ($ew_email_list->lDisplayRecs <= 0) // Display all records
		$ew_email_list->lDisplayRecs = $ew_email_list->lTotalRecs;
	if (!($ew_email->ExportAll && $ew_email->Export <> ""))
		$ew_email_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $ew_email_list->LoadRecordset($ew_email_list->lStartRec-1, $ew_email_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Email hệ thống</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $ew_email_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($ew_email->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($ew_email->CurrentAction <> "gridadd" && $ew_email->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($ew_email_list->Pager)) $ew_email_list->Pager = new cNumericPager($ew_email_list->lStartRec, $ew_email_list->lDisplayRecs, $ew_email_list->lTotalRecs, $ew_email_list->lRecRange) ?>
<?php if ($ew_email_list->Pager->RecordCount > 0) { ?>
	<?php if ($ew_email_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($ew_email_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $ew_email_list->Pager->FromIndex ?> từ <?php echo $ew_email_list->Pager->ToIndex ?> đến <?php echo $ew_email_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($ew_email_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($ew_email_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="ew_email">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($ew_email_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($ew_email_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($ew_email_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($ew_email->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="few_emaillist" id="few_emaillist" class="ewForm" action="" method="post">
<?php if ($ew_email_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$ew_email_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$ew_email_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$ew_email_list->lOptionCnt++; // edit
}
	$ew_email_list->lOptionCnt += count($ew_email_list->ListOptions->Items); // Custom list options
?>
<?php echo $ew_email->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($ew_email->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php

// Custom list options
foreach ($ew_email_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($ew_email->SMTP_SERVER->Visible) { // SMTP_SERVER ?>
	<?php if ($ew_email->SortUrl($ew_email->SMTP_SERVER) == "") { ?>
		<td>SMTP SERVER</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $ew_email->SortUrl($ew_email->SMTP_SERVER) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>SMTP SERVER</td><td style="width: 10px;"><?php if ($ew_email->SMTP_SERVER->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ew_email->SMTP_SERVER->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($ew_email->SERVER_PORT->Visible) { // SERVER_PORT ?>
	<?php if ($ew_email->SortUrl($ew_email->SERVER_PORT) == "") { ?>
		<td>SERVER PORT</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $ew_email->SortUrl($ew_email->SERVER_PORT) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>SERVER PORT</td><td style="width: 10px;"><?php if ($ew_email->SERVER_PORT->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ew_email->SERVER_PORT->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($ew_email->SERVER_USERNAME->Visible) { // SERVER_USERNAME ?>
	<?php if ($ew_email->SortUrl($ew_email->SERVER_USERNAME) == "") { ?>
		<td>SERVER USERNAME</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $ew_email->SortUrl($ew_email->SERVER_USERNAME) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>SERVER USERNAME</td><td style="width: 10px;"><?php if ($ew_email->SERVER_USERNAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ew_email->SERVER_USERNAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($ew_email->SERVER_PASSWORD->Visible) { // SERVER_PASSWORD ?>
	<?php if ($ew_email->SortUrl($ew_email->SERVER_PASSWORD) == "") { ?>
		<td>SERVER PASSWORD</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $ew_email->SortUrl($ew_email->SERVER_PASSWORD) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>SERVER PASSWORD</td><td style="width: 10px;"><?php if ($ew_email->SERVER_PASSWORD->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ew_email->SERVER_PASSWORD->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($ew_email->SENDER_EMAIL->Visible) { // SENDER_EMAIL ?>
	<?php if ($ew_email->SortUrl($ew_email->SENDER_EMAIL) == "") { ?>
		<td>SENDER EMAIL</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $ew_email->SortUrl($ew_email->SENDER_EMAIL) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>SENDER EMAIL</td><td style="width: 10px;"><?php if ($ew_email->SENDER_EMAIL->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ew_email->SENDER_EMAIL->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($ew_email->RECIPIENT_EMAIL->Visible) { // RECIPIENT_EMAIL ?>
	<?php if ($ew_email->SortUrl($ew_email->RECIPIENT_EMAIL) == "") { ?>
		<td>RECIPIENT EMAIL</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $ew_email->SortUrl($ew_email->RECIPIENT_EMAIL) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>RECIPIENT EMAIL</td><td style="width: 10px;"><?php if ($ew_email->RECIPIENT_EMAIL->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ew_email->RECIPIENT_EMAIL->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($ew_email->ExportAll && $ew_email->Export <> "") {
	$ew_email_list->lStopRec = $ew_email_list->lTotalRecs;
} else {
	$ew_email_list->lStopRec = $ew_email_list->lStartRec + $ew_email_list->lDisplayRecs - 1; // Set the last record to display
}
$ew_email_list->lRecCount = $ew_email_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$ew_email->SelectLimit && $ew_email_list->lStartRec > 1)
		$rs->Move($ew_email_list->lStartRec - 1);
}
$ew_email_list->lRowCnt = 0;
while (($ew_email->CurrentAction == "gridadd" || !$rs->EOF) &&
	$ew_email_list->lRecCount < $ew_email_list->lStopRec) {
	$ew_email_list->lRecCount++;
	if (intval($ew_email_list->lRecCount) >= intval($ew_email_list->lStartRec)) {
		$ew_email_list->lRowCnt++;

	// Init row class and style
	$ew_email->CssClass = "";
	$ew_email->CssStyle = "";
	$ew_email->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($ew_email->CurrentAction == "gridadd") {
		$ew_email_list->LoadDefaultValues(); // Load default values
	} else {
		$ew_email_list->LoadRowValues($rs); // Load row values
	}
	$ew_email->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$ew_email_list->RenderRow();
?>
	<tr<?php echo $ew_email->RowAttributes() ?>>
<?php if ($ew_email->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $ew_email->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $ew_email->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($ew_email_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($ew_email->SMTP_SERVER->Visible) { // SMTP_SERVER ?>
		<td<?php echo $ew_email->SMTP_SERVER->CellAttributes() ?>>
<div<?php echo $ew_email->SMTP_SERVER->ViewAttributes() ?>><?php echo $ew_email->SMTP_SERVER->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ew_email->SERVER_PORT->Visible) { // SERVER_PORT ?>
		<td<?php echo $ew_email->SERVER_PORT->CellAttributes() ?>>
<div<?php echo $ew_email->SERVER_PORT->ViewAttributes() ?>><?php echo $ew_email->SERVER_PORT->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ew_email->SERVER_USERNAME->Visible) { // SERVER_USERNAME ?>
		<td<?php echo $ew_email->SERVER_USERNAME->CellAttributes() ?>>
<div<?php echo $ew_email->SERVER_USERNAME->ViewAttributes() ?>><?php echo $ew_email->SERVER_USERNAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ew_email->SERVER_PASSWORD->Visible) { // SERVER_PASSWORD ?>
		<td<?php echo $ew_email->SERVER_PASSWORD->CellAttributes() ?>>
<div<?php echo $ew_email->SERVER_PASSWORD->ViewAttributes() ?>><?php echo $ew_email->SERVER_PASSWORD->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ew_email->SENDER_EMAIL->Visible) { // SENDER_EMAIL ?>
		<td<?php echo $ew_email->SENDER_EMAIL->CellAttributes() ?>>
<div<?php echo $ew_email->SENDER_EMAIL->ViewAttributes() ?>><?php echo $ew_email->SENDER_EMAIL->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ew_email->RECIPIENT_EMAIL->Visible) { // RECIPIENT_EMAIL ?>
		<td<?php echo $ew_email->RECIPIENT_EMAIL->CellAttributes() ?>>
<div<?php echo $ew_email->RECIPIENT_EMAIL->ViewAttributes() ?>><?php echo $ew_email->RECIPIENT_EMAIL->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($ew_email->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
</div>
<?php if ($ew_email_list->lTotalRecs > 0) { ?>
<?php if ($ew_email->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($ew_email->CurrentAction <> "gridadd" && $ew_email->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($ew_email_list->Pager)) $ew_email_list->Pager = new cNumericPager($ew_email_list->lStartRec, $ew_email_list->lDisplayRecs, $ew_email_list->lTotalRecs, $ew_email_list->lRecRange) ?>
<?php if ($ew_email_list->Pager->RecordCount > 0) { ?>
	<?php if ($ew_email_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($ew_email_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $ew_email_list->PageUrl() ?>start=<?php echo $ew_email_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $ew_email_list->Pager->FromIndex ?> từ <?php echo $ew_email_list->Pager->ToIndex ?> đến <?php echo $ew_email_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($ew_email_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($ew_email_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="ew_email">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($ew_email_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($ew_email_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($ew_email_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($ew_email->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($ew_email_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($ew_email->Export == "" && $ew_email->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(ew_email_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($ew_email->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cew_email_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'ew_email';

	// Page Object Name
	var $PageObjName = 'ew_email_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $ew_email;
		if ($ew_email->UseTokenInUrl) $PageUrl .= "t=" . $ew_email->TableVar . "&"; // add page token
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
		global $objForm, $ew_email;
		if ($ew_email->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($ew_email->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ew_email->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cew_email_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["ew_email"] = new cew_email();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'ew_email', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $ew_email;
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
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$ew_email->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $ew_email->Export; // Get export parameter, used in header
	$gsExportFile = $ew_email->TableVar; // Get export file, used in header

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
	var $lDisplayRecs; // Number of display records
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs;
	var $lRecRange;
	var $sSrchWhere;
	var $lRecCnt;
	var $lEditRowCnt;
	var $lRowCnt;
	var $lRowIndex;
	var $lOptionCnt;
	var $lRecPerRow;
	var $lColCnt;
	var $sDeleteConfirmMsg; // Delete confirm message
	var $sDbMasterFilter;
	var $sDbDetailFilter;
	var $bMasterRecordExists;	
	var $ListOptions;
	var $sMultiSelectKey;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsSearchError, $Security, $ew_email;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($ew_email->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $ew_email->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if (!$Security->CanList()) {
			$sFilter = "(0=1)"; // Filter all records
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$ew_email->setSessionWhere($sFilter);
		$ew_email->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $ew_email;
		$sWrk = @$_GET[EW_TABLE_REC_PER_PAGE];
		if ($sWrk <> "") {
			if (is_numeric($sWrk)) {
				$this->lDisplayRecs = intval($sWrk);
			} else {
				if (strtolower($sWrk) == "all") { // Display all records
					$this->lDisplayRecs = -1;
				} else {
					$this->lDisplayRecs = 20; // Non-numeric, load default
				}
			}
			$ew_email->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$ew_email->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $ew_email;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$ew_email->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$ew_email->CurrentOrderType = @$_GET["ordertype"];
			$ew_email->UpdateSort($ew_email->SMTP_SERVER); // Field 
			$ew_email->UpdateSort($ew_email->SERVER_PORT); // Field 
			$ew_email->UpdateSort($ew_email->SERVER_USERNAME); // Field 
			$ew_email->UpdateSort($ew_email->SERVER_PASSWORD); // Field 
			$ew_email->UpdateSort($ew_email->SENDER_EMAIL); // Field 
			$ew_email->UpdateSort($ew_email->RECIPIENT_EMAIL); // Field 
			$ew_email->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $ew_email;
		$sOrderBy = $ew_email->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($ew_email->SqlOrderBy() <> "") {
				$sOrderBy = $ew_email->SqlOrderBy();
				$ew_email->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $ew_email;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$ew_email->setSessionOrderBy($sOrderBy);
				$ew_email->SMTP_SERVER->setSort("");
				$ew_email->SERVER_PORT->setSort("");
				$ew_email->SERVER_USERNAME->setSort("");
				$ew_email->SERVER_PASSWORD->setSort("");
				$ew_email->SENDER_EMAIL->setSort("");
				$ew_email->RECIPIENT_EMAIL->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$ew_email->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $ew_email;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$ew_email->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$ew_email->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $ew_email->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$ew_email->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$ew_email->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$ew_email->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ew_email;

		// Call Recordset Selecting event
		$ew_email->Recordset_Selecting($ew_email->CurrentFilter);

		// Load list page SQL
		$sSql = $ew_email->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$ew_email->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ew_email;
		$sFilter = $ew_email->KeyFilter();

		// Call Row Selecting event
		$ew_email->Row_Selecting($sFilter);

		// Load sql based on filter
		$ew_email->CurrentFilter = $sFilter;
		$sSql = $ew_email->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$ew_email->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $ew_email;
		$ew_email->id->setDbValue($rs->fields('id'));
		$ew_email->SMTP_SERVER->setDbValue($rs->fields('SMTP_SERVER'));
		$ew_email->SERVER_PORT->setDbValue($rs->fields('SERVER_PORT'));
		$ew_email->SERVER_USERNAME->setDbValue($rs->fields('SERVER_USERNAME'));
		$ew_email->SERVER_PASSWORD->setDbValue($rs->fields('SERVER_PASSWORD'));
		$ew_email->SENDER_EMAIL->setDbValue($rs->fields('SENDER_EMAIL'));
		$ew_email->RECIPIENT_EMAIL->setDbValue($rs->fields('RECIPIENT_EMAIL'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $ew_email;

		// Call Row_Rendering event
		$ew_email->Row_Rendering();

		// Common render codes for all row types
		// SMTP_SERVER

		$ew_email->SMTP_SERVER->CellCssStyle = "";
		$ew_email->SMTP_SERVER->CellCssClass = "";

		// SERVER_PORT
		$ew_email->SERVER_PORT->CellCssStyle = "";
		$ew_email->SERVER_PORT->CellCssClass = "";

		// SERVER_USERNAME
		$ew_email->SERVER_USERNAME->CellCssStyle = "";
		$ew_email->SERVER_USERNAME->CellCssClass = "";

		// SERVER_PASSWORD
		$ew_email->SERVER_PASSWORD->CellCssStyle = "";
		$ew_email->SERVER_PASSWORD->CellCssClass = "";

		// SENDER_EMAIL
		$ew_email->SENDER_EMAIL->CellCssStyle = "";
		$ew_email->SENDER_EMAIL->CellCssClass = "";

		// RECIPIENT_EMAIL
		$ew_email->RECIPIENT_EMAIL->CellCssStyle = "";
		$ew_email->RECIPIENT_EMAIL->CellCssClass = "";
		if ($ew_email->RowType == EW_ROWTYPE_VIEW) { // View row

			// SMTP_SERVER
			$ew_email->SMTP_SERVER->ViewValue = $ew_email->SMTP_SERVER->CurrentValue;
			$ew_email->SMTP_SERVER->CssStyle = "";
			$ew_email->SMTP_SERVER->CssClass = "";
			$ew_email->SMTP_SERVER->ViewCustomAttributes = "";

			// SERVER_PORT
			$ew_email->SERVER_PORT->ViewValue = $ew_email->SERVER_PORT->CurrentValue;
			$ew_email->SERVER_PORT->CssStyle = "";
			$ew_email->SERVER_PORT->CssClass = "";
			$ew_email->SERVER_PORT->ViewCustomAttributes = "";

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->ViewValue = $ew_email->SERVER_USERNAME->CurrentValue;
			$ew_email->SERVER_USERNAME->CssStyle = "";
			$ew_email->SERVER_USERNAME->CssClass = "";
			$ew_email->SERVER_USERNAME->ViewCustomAttributes = "";

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->ViewValue = $ew_email->SERVER_PASSWORD->CurrentValue;
			$ew_email->SERVER_PASSWORD->CssStyle = "";
			$ew_email->SERVER_PASSWORD->CssClass = "";
			$ew_email->SERVER_PASSWORD->ViewCustomAttributes = "";

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->ViewValue = $ew_email->SENDER_EMAIL->CurrentValue;
			$ew_email->SENDER_EMAIL->CssStyle = "";
			$ew_email->SENDER_EMAIL->CssClass = "";
			$ew_email->SENDER_EMAIL->ViewCustomAttributes = "";

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->ViewValue = $ew_email->RECIPIENT_EMAIL->CurrentValue;
			$ew_email->RECIPIENT_EMAIL->CssStyle = "";
			$ew_email->RECIPIENT_EMAIL->CssClass = "";
			$ew_email->RECIPIENT_EMAIL->ViewCustomAttributes = "";

			// SMTP_SERVER
			$ew_email->SMTP_SERVER->HrefValue = "";

			// SERVER_PORT
			$ew_email->SERVER_PORT->HrefValue = "";

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->HrefValue = "";

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->HrefValue = "";

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->HrefValue = "";

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->HrefValue = "";
		}

		// Call Row Rendered event
		$ew_email->Row_Rendered();
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
