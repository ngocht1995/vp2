<?php

// PHPMaker 6 configuration for Table t_question
$t_question = NULL; // Initialize table object

// Define table class
class ct_question {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $question_id;
	var $cat_question_id;
	var $IDcard;
	var $datetime_h;
	var $msv_id;
	var $zemail;
	var $user_name;
	var $tel;
	var $content;
	var $content1;
	var $content2;
	var $description;
	var $status;
	var $active;
	var $s_level;
	var $s_Multi;
	var $s_ok;
	var $s_number;
	var $s_finish;
	var $status_faq;
	var $s_public;
	var $datetime_hen;
	var $datetime_kq;
	var $reason;
        var $user_IDAndser;
	var $datetime_update;
        var $ID_Group;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function ct_question() {
		$this->TableVar = "t_question";
		$this->TableName = "t_question";
		$this->SelectLimit = TRUE;
		$this->question_id = new cField('t_question', 'x_question_id', 'question_id', "`question_id`", 20, -1, FALSE);
		$this->fields['question_id'] =& $this->question_id;
		$this->cat_question_id = new cField('t_question', 'x_cat_question_id', 'cat_question_id', "`cat_question_id`", 3, -1, FALSE);
		$this->fields['cat_question_id'] =& $this->cat_question_id;
		$this->IDcard = new cField('t_question', 'x_IDcard', 'IDcard', "`IDcard`", 200, -1, FALSE);
		$this->fields['IDcard'] =& $this->IDcard;
		$this->datetime_h = new cField('t_question', 'x_datetime_h', 'datetime_h', "`datetime_h`", 135, 11, FALSE);
		$this->fields['datetime_h'] =& $this->datetime_h;
		$this->msv_id = new cField('t_question', 'x_msv_id', 'msv_id', "`msv_id`", 200, -1, FALSE);
		$this->fields['msv_id'] =& $this->msv_id;
		$this->zemail = new cField('t_question', 'x_zemail', 'email', "`email`", 200, -1, FALSE);
		$this->fields['email'] =& $this->zemail;
		$this->user_name = new cField('t_question', 'x_user_name', 'user_name', "`user_name`", 200, -1, FALSE);
		$this->fields['user_name'] =& $this->user_name;
		$this->tel = new cField('t_question', 'x_tel', 'tel', "`tel`", 200, -1, FALSE);
		$this->fields['tel'] =& $this->tel;
		$this->content = new cField('t_question', 'x_content', 'content', "`content`", 201, -1, FALSE);
		$this->fields['content'] =& $this->content;
		$this->content1 = new cField('t_question', 'x_content1', 'content1', "`content1`", 201, -1, FALSE);
		$this->fields['content1'] =& $this->content1;
		$this->content2 = new cField('t_question', 'x_content2', 'content2', "`content2`", 201, -1, FALSE);
		$this->fields['content2'] =& $this->content2;
		$this->description = new cField('t_question', 'x_description', 'description', "`description`", 201, -1, FALSE);
		$this->fields['description'] =& $this->description;
		$this->status = new cField('t_question', 'x_status', 'status', "`status`", 2, -1, FALSE);
		$this->fields['status'] =& $this->status;
		$this->active = new cField('t_question', 'x_active', 'active', "`active`", 2, -1, FALSE);
		$this->fields['active'] =& $this->active;
		$this->s_level = new cField('t_question', 'x_s_level', 's_level', "`s_level`", 2, -1, FALSE);
		$this->fields['s_level'] =& $this->s_level;
		$this->s_Multi = new cField('t_question', 'x_s_Multi', 's_Multi', "`s_Multi`", 2, -1, FALSE);
		$this->fields['s_Multi'] =& $this->s_Multi;
		$this->s_ok = new cField('t_question', 'x_s_ok', 's_ok', "`s_ok`", 2, -1, FALSE);
		$this->fields['s_ok'] =& $this->s_ok;
		$this->s_number = new cField('t_question', 'x_s_number', 's_number', "`s_number`", 2, -1, FALSE);
		$this->fields['s_number'] =& $this->s_number;
		$this->s_finish = new cField('t_question', 'x_s_finish', 's_finish', "`s_finish`", 2, -1, FALSE);
		$this->fields['s_finish'] =& $this->s_finish;
		$this->status_faq = new cField('t_question', 'x_status_faq', 'status_faq', "`status_faq`", 2, -1, FALSE);
		$this->fields['status_faq'] =& $this->status_faq;
		$this->s_public = new cField('t_question', 'x_s_public', 's_public', "`s_public`", 2, -1, FALSE);
		$this->fields['s_public'] =& $this->s_public;
		$this->datetime_hen = new cField('t_question', 'x_datetime_hen', 'datetime_hen', "`datetime_hen`", 135,11, FALSE);
		$this->fields['datetime_hen'] =& $this->datetime_hen;
		$this->datetime_kq = new cField('t_question', 'x_datetime_kq', 'datetime_kq', "`datetime_kq`", 135, 11, FALSE);
		$this->fields['datetime_kq'] =& $this->datetime_kq;
		$this->reason = new cField('t_question', 'x_reason', 'reason', "`reason`", 201, -1, FALSE);
		$this->fields['reason'] =& $this->reason;
                $this->user_IDAndser = new cField('t_question', 'x_user_IDAndser', 'user_IDAndser', "`user_IDAndser`", 200, -1, FALSE);
		$this->fields['user_IDAndser'] =& $this->user_IDAndser;
		$this->datetime_update = new cField('t_question', 'x_datetime_update', 'datetime_update', "`datetime_update`", 135, 7, FALSE);
		$this->fields['datetime_update'] =& $this->datetime_update;
                $this->ID_Group = new cField('t_question', 'x_ID_Group', 'ID_Group', "`ID_Group`", 3, -1, FALSE);
		$this->fields['ID_Group'] =& $this->ID_Group;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC] = $v;
	}

	// Search Highlight Name
	function HighlightName() {
		return "t_question_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search Keyword
	function getBasicSearchKeyword() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH];
	}

	function setBasicSearchKeyword($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic Search Type
	function getBasicSearchType() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE];
	}

	function setBasicSearchType($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search where clause
	function getSearchWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE] = $v;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Session WHERE Clause
	function getSessionWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY];
	}

	function setSessionOrderBy($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY] = $v;
	}

	// Session Key
	function getKey($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlSelect() { // Select
		return "SELECT * FROM `t_question`";
	}

	function SqlWhere() { // Where
		return "";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "datetime_h DESC";
	}

	// SQL variables
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return table sql with list page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		if ($this->CurrentFilter <> "") {
			if ($sFilter <> "") $sFilter = "($sFilter) AND ";
			$sFilter .= "(" . $this->CurrentFilter . ")";
		}
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return record count
	function SelectRecordCount() {
		global $conn;
		$cnt = -1;
		$sFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		if ($this->SelectLimit) {
			$sSelect = $this->SelectSQL();
			if (strtoupper(substr($sSelect, 0, 13)) == "SELECT * FROM") {
				$sSelect = "SELECT COUNT(*) FROM" . substr($sSelect, 13);
				if ($rs = $conn->Execute($sSelect)) {
					if (!$rs->EOF)
						$cnt = $rs->fields[0];
					$rs->Close();
				}
			}
		}
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $sFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= (is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `t_question` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `t_question` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=" .
					(is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `t_question` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'question_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['question_id'], $this->question_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`question_id` = @question_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->question_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@question_id@", ew_AdjustSql($this->question_id->CurrentValue), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return url
	function getReturnUrl() {

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] <> "") {
			return $_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL];
		} else {
			return "t_questionlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("t_questionview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "t_questionadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("t_questionedit.php", $this->UrlParm());
	}
// Answer
	function AnswerUrl() {
		return $this->KeyUrl("t_answerlist.php", $this->UrlParm());
	}
	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("t_questionadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("t_questiondelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->question_id->CurrentValue)) {
			$sUrl .= "question_id=" . urlencode($this->question_id->CurrentValue);
		} else {
			return "javascript:alert('Invalid Record! Key is null');";
		}
		return $sUrl;
	}

	// Sort Url
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			($fld->FldType == 205)) { // Unsortable data type
			return "";
		} else {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		}
	}

	// URL parm
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_question" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Function LoadRs
	// - Load rows based on filter
	function LoadRs($sFilter) {
		global $conn;

		// Set up filter (Sql Where Clause) and get Return Sql
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		return $conn->Execute($sSql);
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->question_id->setDbValue($rs->fields('question_id'));
		$this->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$this->IDcard->setDbValue($rs->fields('IDcard'));
		$this->datetime_h->setDbValue($rs->fields('datetime_h'));
		$this->msv_id->setDbValue($rs->fields('msv_id'));
		$this->zemail->setDbValue($rs->fields('email'));
		$this->user_name->setDbValue($rs->fields('user_name'));
		$this->tel->setDbValue($rs->fields('tel'));
		$this->content->setDbValue($rs->fields('content'));
		$this->content1->setDbValue($rs->fields('content1'));
		$this->content2->setDbValue($rs->fields('content2'));
		$this->description->setDbValue($rs->fields('description'));
		$this->status->setDbValue($rs->fields('status'));
		$this->active->setDbValue($rs->fields('active'));
		$this->s_level->setDbValue($rs->fields('s_level'));
		$this->s_Multi->setDbValue($rs->fields('s_Multi'));
		$this->s_ok->setDbValue($rs->fields('s_ok'));
		$this->s_number->setDbValue($rs->fields('s_number'));
		$this->s_finish->setDbValue($rs->fields('s_finish'));
		$this->status_faq->setDbValue($rs->fields('status_faq'));
		$this->s_public->setDbValue($rs->fields('s_public'));
		$this->datetime_hen->setDbValue($rs->fields('datetime_hen'));
		$this->datetime_kq->setDbValue($rs->fields('datetime_kq'));
		$this->reason->setDbValue($rs->fields('reason'));
                $this->user_IDAndser->setDbValue($rs->fields('user_IDAndser'));
		$this->datetime_update->setDbValue($rs->fields('datetime_update'));
                $this->ID_Group->setDbValue($rs->fields('ID_Group'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// cat_question_id
		$this->cat_question_id->ViewValue = $this->cat_question_id->CurrentValue;
		$this->cat_question_id->CssStyle = "";
		$this->cat_question_id->CssClass = "";
		$this->cat_question_id->ViewCustomAttributes = "";

		// IDcard
		$this->IDcard->ViewValue = $this->IDcard->CurrentValue;
		$this->IDcard->CssStyle = "";
		$this->IDcard->CssClass = "";
		$this->IDcard->ViewCustomAttributes = "";

		// datetime_h
		$this->datetime_h->ViewValue = $this->datetime_h->CurrentValue;
		$this->datetime_h->ViewValue = ew_FormatDateTime($this->datetime_h->ViewValue, 11);
		$this->datetime_h->CssStyle = "";
		$this->datetime_h->CssClass = "";
		$this->datetime_h->ViewCustomAttributes = "";

		// msv_id
		$this->msv_id->ViewValue = $this->msv_id->CurrentValue;
		$this->msv_id->CssStyle = "";
		$this->msv_id->CssClass = "";
		$this->msv_id->ViewCustomAttributes = "";

		// status
		if (strval($this->status->CurrentValue) <> "") {
			switch ($this->status->CurrentValue) {
				case "0":
					$this->status->ViewValue = "Đang kiểm tra";
					break;
				case "1":
					$this->status->ViewValue = "Đã sử lý";
					break;
                                    case "2":
					$this->status->ViewValue = "Tiếp nhận";
                                         case "3":
					$this->status->ViewValue = "Đã chuyển";
					break;
				default:
					$this->status->ViewValue = $this->status->CurrentValue;
			}
		} else {
			$this->status->ViewValue = NULL;
		}
		$this->status->CssStyle = "";
		$this->status->CssClass = "";
		$this->status->ViewCustomAttributes = "";

		// active
		if (strval($this->active->CurrentValue) <> "") {
			switch ($this->active->CurrentValue) {
				case "0":
					$this->active->ViewValue = "Chua xong";
					break;
				case "1":
					$this->active->ViewValue = "Trả lời xong";
					break;
				default:
					$this->active->ViewValue = $this->active->CurrentValue;
			}
		} else {
			$this->active->ViewValue = NULL;
		}
		$this->active->CssStyle = "";
		$this->active->CssClass = "";
		$this->active->ViewCustomAttributes = "";

		// s_level
		if (strval($this->s_level->CurrentValue) <> "") {
			switch ($this->s_level->CurrentValue) {
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
					$this->s_level->ViewValue = $this->s_level->CurrentValue;
			}
		} else {
			$this->s_level->ViewValue = NULL;
		}
		$this->s_level->CssStyle = "";
		$this->s_level->CssClass = "";
		$this->s_level->ViewCustomAttributes = "";

		// s_Multi
		if (strval($this->s_Multi->CurrentValue) <> "") {
			switch ($this->s_Multi->CurrentValue) {
				case "0":
						$t_question->s_Multi->ViewValue = "Đơn xử lý";
						break;
					case "1":
						$t_question->s_Multi->ViewValue = "Đa xử lý";
						break;
				default:
					$this->s_Multi->ViewValue = $this->s_Multi->CurrentValue;
			}
		} else {
			$this->s_Multi->ViewValue = NULL;
		}
		$this->s_Multi->CssStyle = "";
		$this->s_Multi->CssClass = "";
		$this->s_Multi->ViewCustomAttributes = "";

		// s_ok
		if (strval($this->s_ok->CurrentValue) <> "") {
			switch ($this->s_ok->CurrentValue) {
				case "0":
						$t_question->s_ok->ViewValue = "Không";
						break;
					case "1":
						$t_question->s_ok->ViewValue = "Hài lòng";
						break;
				default:
					$this->s_ok->ViewValue = $this->s_ok->CurrentValue;
			}
		} else {
			$this->s_ok->ViewValue = NULL;
		}
		$this->s_ok->CssStyle = "";
		$this->s_ok->CssClass = "";
		$this->s_ok->ViewCustomAttributes = "";

		// s_number
		$this->s_number->ViewValue = $this->s_number->CurrentValue;
		$this->s_number->CssStyle = "";
		$this->s_number->CssClass = "";
		$this->s_number->ViewCustomAttributes = "";

		// s_finish
		if (strval($this->s_finish->CurrentValue) <> "") {
			switch ($this->s_finish->CurrentValue) {
				case "0":
						$t_question->s_finish->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->s_finish->ViewValue = "Kết thúc";
						break;
				default:
					$this->s_finish->ViewValue = $this->s_finish->CurrentValue;
			}
		} else {
			$this->s_finish->ViewValue = NULL;
		}
		$this->s_finish->CssStyle = "";
		$this->s_finish->CssClass = "";
		$this->s_finish->ViewCustomAttributes = "";

		// status_faq
		if (strval($this->status_faq->CurrentValue) <> "") {
			switch ($this->status_faq->CurrentValue) {
				case "0":
						$t_question->status_faq->ViewValue = "Không";
						break;
					case "1":
						$t_question->status_faq->ViewValue = "FAQ";
						break;
				default:
					$this->status_faq->ViewValue = $this->status_faq->CurrentValue;
			}
		} else {
			$this->status_faq->ViewValue = NULL;
		}
		$this->status_faq->CssStyle = "";
		$this->status_faq->CssClass = "";
		$this->status_faq->ViewCustomAttributes = "";

		// s_public
		if (strval($this->s_public->CurrentValue) <> "") {
			switch ($this->s_public->CurrentValue) {
				case "0":
						$t_question->s_public->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->s_public->ViewValue = "Xuất bản";
						break;
				default:
					$this->s_public->ViewValue = $this->s_public->CurrentValue;
			}
		} else {
			$this->s_public->ViewValue = NULL;
		}
		$this->s_public->CssStyle = "";
		$this->s_public->CssClass = "";
		$this->s_public->ViewCustomAttributes = "";

		// datetime_hen
		$this->datetime_hen->ViewValue = $this->datetime_hen->CurrentValue;
		$this->datetime_hen->ViewValue = ew_FormatDateTime($this->datetime_hen->ViewValue, 11);
		$this->datetime_hen->CssStyle = "";
		$this->datetime_hen->CssClass = "";
		$this->datetime_hen->ViewCustomAttributes = "";

		// datetime_kq
		$this->datetime_kq->ViewValue = $this->datetime_kq->CurrentValue;
		$this->datetime_kq->ViewValue = ew_FormatDateTime($this->datetime_kq->ViewValue, 11);
		$this->datetime_kq->CssStyle = "";
		$this->datetime_kq->CssClass = "";
		$this->datetime_kq->ViewCustomAttributes = "";

                // user_IDAndser
		$this->user_IDAndser->CssStyle = "";
		$this->user_IDAndser->CssClass = "";
		$this->user_IDAndser->ViewCustomAttributes = "";

		// datetime_update
		$this->datetime_update->ViewValue = $this->datetime_update->CurrentValue;
		$this->datetime_update->ViewValue = ew_FormatDateTime($this->datetime_update->ViewValue, 7);
		$this->datetime_update->CssStyle = "";
		$this->datetime_update->CssClass = "";
		$this->datetime_update->ViewCustomAttributes = "";
                
                // ID_Group
		if (strval($this->ID_Group->CurrentValue) <> "") {
			$sSqlWrk = "SELECT `NAME` FROM `t_question_group` WHERE `ID` = " . ew_AdjustSql($this->ID_Group->CurrentValue) . "";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
				$this->ID_Group->ViewValue = $rswrk->fields('NAME');
				$rswrk->Close();
			} else {
				$this->ID_Group->ViewValue = $this->ID_Group->CurrentValue;
			}
		} else {
			$this->ID_Group->ViewValue = NULL;
		}
		$this->ID_Group->CssStyle = "";
		$this->ID_Group->CssClass = "";
		$this->ID_Group->ViewCustomAttributes = "";
                
		// cat_question_id
		$this->cat_question_id->HrefValue = "";

		// IDcard
		$this->IDcard->HrefValue = "";

		// datetime_h
		$this->datetime_h->HrefValue = "";

		// msv_id
		$this->msv_id->HrefValue = "";

		// status
		$this->status->HrefValue = "";

		// active
		$this->active->HrefValue = "";

		// s_level
		$this->s_level->HrefValue = "";

		// s_Multi
		$this->s_Multi->HrefValue = "";

		// s_ok
		$this->s_ok->HrefValue = "";

		// s_number
		$this->s_number->HrefValue = "";

		// s_finish
		$this->s_finish->HrefValue = "";

		// status_faq
		$this->status_faq->HrefValue = "";

		// s_public
		$this->s_public->HrefValue = "";

		// datetime_hen
		$this->datetime_hen->HrefValue = "";

		// datetime_kq
		$this->datetime_kq->HrefValue = "";
                    
                // user_IDAndser
		$this->user_IDAndser->HrefValue = "";

		// datetime_update
		$this->datetime_update->HrefValue = "";
               
                // ID_Group
		$this->ID_Group->HrefValue = "";
                
		// Call Row Rendered event
		$this->Row_Rendered();
	}
	var $CurrentAction; // Current action
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message
	var $RowType; // Row Type
	var $CssClass; // Css class
	var $CssStyle; // Css style
	var $RowClientEvents; // Row client events

	// Row Attribute
	function RowAttributes() {
		$sAtt = "";
		if (trim($this->CssStyle) <> "") {
			$sAtt .= " style=\"" . trim($this->CssStyle) . "\"";
		}
		if (trim($this->CssClass) <> "") {
			$sAtt .= " class=\"" . trim($this->CssClass) . "\"";
		}
		if ($this->Export == "") {
			if (trim($this->RowClientEvents) <> "") {
				$sAtt .= " " . trim($this->RowClientEvents);
			}
		}
		return $sAtt;
	}

	// Field objects
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// Row Inserting event
	function Row_Inserting(&$rs) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted(&$rs) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating(&$rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated(&$rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
}
?>
