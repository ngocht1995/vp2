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
$t_question_view = new ct_question_view();
$Page =& $t_question_view;

// Page init processing
$t_question_view->Page_Init();

// Page main processing
$t_question_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_question->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_view = new ew_Page("t_question_view");

// page properties
t_question_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_question_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_question_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_view.ValidateRequired = false; // no JavaScript validation
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
<?php } ?>
<p><span class="phpmaker">
        <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_questionlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin câu hỏi</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($t_question->Export == "") { ?>
<a href="<?php echo $t_question->AnswerUrl() ?>">Trả lời</a>&nbsp;
<a href="<?php echo $t_question->EditUrl() ?>">Sửa</a>&nbsp;
<a onclick="return ew_Confirm('Do you want to delete this record?');" href="<?php echo $t_question->DeleteUrl() ?>">Xóa</a>&nbsp;
<?php } ?>
</span></p>
<?php $t_question_view->ShowMessage() ?>
<p>
<?php if ($t_question->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_question_view->Pager)) $t_question_view->Pager = new cPrevNextPager($t_question_view->lStartRec, $t_question_view->lDisplayRecs, $t_question_view->lTotalRecs) ?>
<?php if ($t_question_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_question_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_question_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_question_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_question_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_question_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;thuộc <?php echo $t_question_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($t_question_view->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Xin nhập từ để tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không có bản nghi</span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_question->question_id->Visible) { // question_id ?>
	<tr<?php echo $t_question->question_id->RowAttributes ?>>
		<td class="ewTableHeader">ID</td>
		<td<?php echo $t_question->question_id->CellAttributes() ?>>
<div<?php echo $t_question->question_id->ViewAttributes() ?>><?php echo $t_question->question_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->cat_question_id->Visible) { // cat_question_id ?>
	<tr<?php echo $t_question->cat_question_id->RowAttributes ?>>
		<td class="ewTableHeader">Chuyên mục</td>
		<td<?php echo $t_question->cat_question_id->CellAttributes() ?>>
<div<?php echo $t_question->cat_question_id->ViewAttributes() ?>><?php echo $t_question->cat_question_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->IDcard->Visible) { // IDcard ?>
	<tr<?php echo $t_question->IDcard->RowAttributes ?>>
		<td class="ewTableHeader">Mã câu hỏi</td>
		<td<?php echo $t_question->IDcard->CellAttributes() ?>>
<div<?php echo $t_question->IDcard->ViewAttributes() ?>><?php echo $t_question->IDcard->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->datetime_h->Visible) { // datetime_h ?>
	<tr<?php echo $t_question->datetime_h->RowAttributes ?>>
		<td class="ewTableHeader">Ngày hỏi</td>
		<td<?php echo $t_question->datetime_h->CellAttributes() ?>>
<div<?php echo $t_question->datetime_h->ViewAttributes() ?>><?php echo $t_question->datetime_h->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->msv_id->Visible) { // msv_id ?>
	<tr<?php echo $t_question->msv_id->RowAttributes ?>>
		<td class="ewTableHeader">Mã SV</td>
		<td<?php echo $t_question->msv_id->CellAttributes() ?>>
<div<?php echo $t_question->msv_id->ViewAttributes() ?>><?php echo $t_question->msv_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->zemail->Visible) { // email ?>
	<tr<?php echo $t_question->zemail->RowAttributes ?>>
		<td class="ewTableHeader">Email</td>
		<td<?php echo $t_question->zemail->CellAttributes() ?>>
<div<?php echo $t_question->zemail->ViewAttributes() ?>><?php echo $t_question->zemail->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->user_name->Visible) { // user_name ?>
	<tr<?php echo $t_question->user_name->RowAttributes ?>>
		<td class="ewTableHeader">Họ tên</td>
		<td<?php echo $t_question->user_name->CellAttributes() ?>>
<div<?php echo $t_question->user_name->ViewAttributes() ?>><?php echo $t_question->user_name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->tel->Visible) { // tel ?>
	<tr<?php echo $t_question->tel->RowAttributes ?>>
		<td class="ewTableHeader">Điện thoại</td>
		<td<?php echo $t_question->tel->CellAttributes() ?>>
<div<?php echo $t_question->tel->ViewAttributes() ?>><?php echo $t_question->tel->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->content->Visible) { // content ?>
	<tr<?php echo $t_question->content->RowAttributes ?>>
		<td class="ewTableHeader">Câu hỏi:</td>
		<td<?php echo $t_question->content->CellAttributes() ?>>
<div<?php echo $t_question->content->ViewAttributes() ?>><?php echo $t_question->content->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->content1->Visible) { // content1 ?>
	<tr<?php echo $t_question->content1->RowAttributes ?>>
		<td class="ewTableHeader">Lý do không hài lòng 1:</td>
		<td<?php echo $t_question->content1->CellAttributes() ?>>
<div<?php echo $t_question->content1->ViewAttributes() ?>><?php echo $t_question->content1->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->content2->Visible) { // content2 ?>
	<tr<?php echo $t_question->content2->RowAttributes ?>>
		<td class="ewTableHeader">Lý do không hài lòng 2:</td>
		<td<?php echo $t_question->content2->CellAttributes() ?>>
<div<?php echo $t_question->content2->ViewAttributes() ?>><?php echo $t_question->content2->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->description->Visible) { // description ?>
	<tr<?php echo $t_question->description->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả</td>
		<td<?php echo $t_question->description->CellAttributes() ?>>
<div<?php echo $t_question->description->ViewAttributes() ?>><?php echo $t_question->description->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->status->Visible) { // status ?>
	<tr<?php echo $t_question->status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $t_question->status->CellAttributes() ?>>
<div<?php echo $t_question->status->ViewAttributes() ?>><?php echo $t_question->status->ViewValue ?></div></td>
	</tr>
<?php } ?>
        <?php if ($t_question->ID_Group->Visible) { // ID_Group ?>
	<tr<?php echo $t_question->ID_Group->RowAttributes ?>>
		<td class="ewTableHeader">Nhóm câu hỏi</td>
		<td<?php echo $t_question->ID_Group->CellAttributes() ?>>
<div<?php echo $t_question->ID_Group->ViewAttributes() ?>><?php echo $t_question->ID_Group->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->active->Visible) { // active ?>
	<tr<?php echo $t_question->active->RowAttributes ?>>
		<td class="ewTableHeader">Trả lời</td>
		<td<?php echo $t_question->active->CellAttributes() ?>>
<div<?php echo $t_question->active->ViewAttributes() ?>><?php echo $t_question->active->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_level->Visible) { // s_level ?>
	<tr<?php echo $t_question->s_level->RowAttributes ?>>
		<td class="ewTableHeader">Mức độ</td>
		<td<?php echo $t_question->s_level->CellAttributes() ?>>
<div<?php echo $t_question->s_level->ViewAttributes() ?>><?php echo $t_question->s_level->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_Multi->Visible) { // s_Multi ?>
	<tr<?php echo $t_question->s_Multi->RowAttributes ?>>
		<td class="ewTableHeader">Luồng câu hỏi</td>
		<td<?php echo $t_question->s_Multi->CellAttributes() ?>>
<div<?php echo $t_question->s_Multi->ViewAttributes() ?>><?php echo $t_question->s_Multi->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_ok->Visible) { // s_ok ?>
	<tr<?php echo $t_question->s_ok->RowAttributes ?>>
		<td class="ewTableHeader">Thái độ</td>
		<td<?php echo $t_question->s_ok->CellAttributes() ?>>
<div<?php echo $t_question->s_ok->ViewAttributes() ?>><?php echo $t_question->s_ok->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_number->Visible) { // s_number ?>
	<tr<?php echo $t_question->s_number->RowAttributes ?>>
		<td class="ewTableHeader">Số lần</td>
		<td<?php echo $t_question->s_number->CellAttributes() ?>>
<div<?php echo $t_question->s_number->ViewAttributes() ?>><?php echo $t_question->s_number->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_finish->Visible) { // s_finish ?>
	<tr<?php echo $t_question->s_finish->RowAttributes ?>>
		<td class="ewTableHeader">Kết thúc</td>
		<td<?php echo $t_question->s_finish->CellAttributes() ?>>
<div<?php echo $t_question->s_finish->ViewAttributes() ?>><?php echo $t_question->s_finish->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->status_faq->Visible) { // status_faq ?>
	<tr<?php echo $t_question->status_faq->RowAttributes ?>>
		<td class="ewTableHeader">Loại FAQ</td>
		<td<?php echo $t_question->status_faq->CellAttributes() ?>>
<div<?php echo $t_question->status_faq->ViewAttributes() ?>><?php echo $t_question->status_faq->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_public->Visible) { // s_public ?>
	<tr<?php echo $t_question->s_public->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $t_question->s_public->CellAttributes() ?>>
<div<?php echo $t_question->s_public->ViewAttributes() ?>><?php echo $t_question->s_public->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->datetime_hen->Visible) { // datetime_hen ?>
	<tr<?php echo $t_question->datetime_hen->RowAttributes ?>>
		<td class="ewTableHeader">Ngày hẹn</td>
		<td<?php echo $t_question->datetime_hen->CellAttributes() ?>>
<div<?php echo $t_question->datetime_hen->ViewAttributes() ?>><?php echo $t_question->datetime_hen->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->datetime_kq->Visible) { // datetime_kq ?>
	<tr<?php echo $t_question->datetime_kq->RowAttributes ?>>
		<td class="ewTableHeader">Ngày xong</td>
		<td<?php echo $t_question->datetime_kq->CellAttributes() ?>>
<div<?php echo $t_question->datetime_kq->ViewAttributes() ?>><?php echo $t_question->datetime_kq->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->reason->Visible) { // reason ?>
	<tr<?php echo $t_question->reason->RowAttributes ?>>
		<td class="ewTableHeader">Lý do kết thúc:</td>
		<td<?php echo $t_question->reason->CellAttributes() ?>>
<div<?php echo $t_question->reason->ViewAttributes() ?>><?php echo $t_question->reason->ViewValue ?></div></td>
	</tr>
<?php } ?>
        
        <?php if ($t_question->user_IDAndser->Visible) { // user_IDAndser ?>
	<tr<?php echo $t_question->user_IDAndser->RowAttributes ?>>
		<td class="ewTableHeader">Người cập nhật:</td>
		<td<?php echo $t_question->user_IDAndser->CellAttributes() ?>>
                    <div <?php echo $t_question->user_IDAndser->ViewAttributes() ?>><?php echo  $t_question->user_IDAndser->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_question->datetime_update->Visible) { // datetime_update ?>
	<tr<?php echo $t_question->datetime_update->RowAttributes ?>>
		<td class="ewTableHeader">Ngày cập nhật:</td>
		<td<?php echo $t_question->datetime_update->CellAttributes() ?>>
<div<?php echo $t_question->datetime_update->ViewAttributes() ?>><?php echo $t_question->datetime_update->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_question->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_question_view->Pager)) $t_question_view->Pager = new cPrevNextPager($t_question_view->lStartRec, $t_question_view->lDisplayRecs, $t_question_view->lTotalRecs) ?>
<?php if ($t_question_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"> Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_question_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_question_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_question_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_question_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_question_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_view->PageUrl() ?>start=<?php echo $t_question_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;thuộc <?php echo $t_question_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($t_question_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Xin đánh ký tự cần tìm</span>
	<?php } else { ?>
	<span class="phpmaker">Không có bản ghi</span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_question->Export == "") { ?>
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
class ct_question_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_question';

	// Page Object Name
	var $PageObjName = 't_question_view';

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
	function ct_question_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question"] = new ct_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

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
	var $lDisplayRecs; // Number of display records
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs;
	var $lRecRange;
	var $lRecCnt;

	//
	// Page main processing
	//
	function Page_Main() {
		global $t_question;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["question_id"] <> "") {
				$t_question->question_id->setQueryStringValue($_GET["question_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_question->CurrentAction = "I"; // Display form
			switch ($t_question->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_questionlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_question->question_id->CurrentValue) == strval($rs->fields('question_id'))) {
								$t_question->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("No records found"); // Set no record message
						$sReturnUrl = "t_questionlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "t_questionlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_question->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_question;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_question->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_question->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_question->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_question->setStartRecordNumber($this->lStartRec);
		}
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
		// question_id

		$t_question->question_id->CellCssStyle = "";
		$t_question->question_id->CellCssClass = "";

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

		// email
		$t_question->zemail->CellCssStyle = "";
		$t_question->zemail->CellCssClass = "";

		// user_name
		$t_question->user_name->CellCssStyle = "";
		$t_question->user_name->CellCssClass = "";

		// tel
		$t_question->tel->CellCssStyle = "";
		$t_question->tel->CellCssClass = "";

		// content
		$t_question->content->CellCssStyle = "";
		$t_question->content->CellCssClass = "";

		// content1
		$t_question->content1->CellCssStyle = "";
		$t_question->content1->CellCssClass = "";

		// content2
		$t_question->content2->CellCssStyle = "";
		$t_question->content2->CellCssClass = "";

		// description
		$t_question->description->CellCssStyle = "";
		$t_question->description->CellCssClass = "";

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

		// reason
		$t_question->reason->CellCssStyle = "";
		$t_question->reason->CellCssClass = "";
                
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

			// question_id
			$t_question->question_id->ViewValue = $t_question->question_id->CurrentValue;
			$t_question->question_id->CssStyle = "";
			$t_question->question_id->CssClass = "";
			$t_question->question_id->ViewCustomAttributes = "";

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
			$t_question->datetime_h->ViewValue = ew_FormatDateTime($t_question->datetime_h->ViewValue, 7);
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

			// content
			$t_question->content->ViewValue = $t_question->content->CurrentValue;
			$t_question->content->CssStyle = "";
			$t_question->content->CssClass = "";
			$t_question->content->ViewCustomAttributes = "";

			// content1
			$t_question->content1->ViewValue = $t_question->content1->CurrentValue;
			$t_question->content1->CssStyle = "";
			$t_question->content1->CssClass = "";
			$t_question->content1->ViewCustomAttributes = "";

			// content2
			$t_question->content2->ViewValue = $t_question->content2->CurrentValue;
			$t_question->content2->CssStyle = "";
			$t_question->content2->CssClass = "";
			$t_question->content2->ViewCustomAttributes = "";

			// description
			$t_question->description->ViewValue = $t_question->description->CurrentValue;
			$t_question->description->CssStyle = "";
			$t_question->description->CssClass = "";
			$t_question->description->ViewCustomAttributes = "";

			// status
			if (strval($t_question->status->CurrentValue) <> "") {
				switch ($t_question->status->CurrentValue) {
					case "0":
						$t_question->status->ViewValue = "Kiểm tra";
						break;
					case "1":
						$t_question->status->ViewValue = "xử lý";
						break;
                                        case "2":
                                                 $t_question->s_level->ViewValue = "Tiếp nhận";
                                                  break;
                                        case "3":
                                                  $t_question->s_level->ViewValue = "Đã Chuyển";
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
						$t_question->active->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->active->ViewValue = "Xong";
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
						$t_question->s_level->ViewValue = "Bình thường";
						break;
					case "1":
						$t_question->s_level->ViewValue = "Trung bình";
						break;
					case "2":
						$t_question->s_level->ViewValue = "Khẩn";
						break;
					case "3":
						$t_question->s_level->ViewValue = "Cực khẩn";
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
						$t_question->s_Multi->ViewValue = "Đơn xử lý";
						break;
					case "1":
						$t_question->s_Multi->ViewValue = "Đa xử lý";
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
						$t_question->s_ok->ViewValue = "Không";
						break;
					case "1":
						$t_question->s_ok->ViewValue = "Hài lòng";
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
						$t_question->s_finish->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->s_finish->ViewValue = "Kết thúc";
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
						$t_question->status_faq->ViewValue = "Không";
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
						$t_question->s_public->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->s_public->ViewValue = "Xuất bản";
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
			$t_question->datetime_hen->ViewValue = ew_FormatDateTime($t_question->datetime_hen->ViewValue, 11);
			$t_question->datetime_hen->CssStyle = "";
			$t_question->datetime_hen->CssClass = "";
			$t_question->datetime_hen->ViewCustomAttributes = "";

			// datetime_kq
			$t_question->datetime_kq->ViewValue = $t_question->datetime_kq->CurrentValue;
			$t_question->datetime_kq->ViewValue = ew_FormatDateTime($t_question->datetime_kq->ViewValue, 11);
			$t_question->datetime_kq->CssStyle = "";
			$t_question->datetime_kq->CssClass = "";
			$t_question->datetime_kq->ViewCustomAttributes = "";

			// reason
			$t_question->reason->ViewValue = $t_question->reason->CurrentValue;
			$t_question->reason->CssStyle = "";
			$t_question->reason->CssClass = "";
			$t_question->reason->ViewCustomAttributes = "";

                        
                
				// user_IDAndser
			$t_question->user_IDAndser->ViewValue = $t_question->user_IDAndser->CurrentValue;
			$t_question->user_IDAndser->CssStyle = "";
			$t_question->user_IDAndser->CssClass = "";
			$t_question->user_IDAndser->ViewCustomAttributes = "";

			// datetime_update
			$t_question->datetime_update->ViewValue = $t_question->datetime_update->CurrentValue;
			$t_question->datetime_update->ViewValue = ew_FormatDateTime($t_question->datetime_update->ViewValue, 11);
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

			// question_id
			$t_question->question_id->HrefValue = "";

			// cat_question_id
			$t_question->cat_question_id->HrefValue = "";

			// IDcard
			$t_question->IDcard->HrefValue = "";

			// datetime_h
			$t_question->datetime_h->HrefValue = "";

			// msv_id
			$t_question->msv_id->HrefValue = "";

			// email
			$t_question->zemail->HrefValue = "";

			// user_name
			$t_question->user_name->HrefValue = "";

			// tel
			$t_question->tel->HrefValue = "";

			// content
			$t_question->content->HrefValue = "";

			// content1
			$t_question->content1->HrefValue = "";

			// content2
			$t_question->content2->HrefValue = "";

			// description
			$t_question->description->HrefValue = "";

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

			// reason
			$t_question->reason->HrefValue = "";
                             
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
