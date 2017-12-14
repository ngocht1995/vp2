<?php

// PHPMaker 6 configuration for Table unread
$unread = NULL; // Initialize table object

// Define table class
class cunread {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $thu_id;
	var $nguoidung_id;
	var $tieu_de;
	var $noidung_lienhe;
	var $nguoi_lienhe;
	var $gioi_tinh;
	var $quocgia_id;
	var $diachi_email;
	var $ma_quocgia_tel;
	var $ma_vung_tel;
	var $so_dienthoai;
	var $ma_quocgia_fax;
	var $ma_vung_fax;
	var $so_fax;
	var $dia_chi;
	var $ngay_gui;
	var $trang_thai;
	var $ngay_doc;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cunread() {
		$this->TableVar = "unread";
		$this->TableName = "unread";
		$this->thu_id = new cField('unread', 'x_thu_id', 'thu_id', "`thu_id`", 19, -1, FALSE);
		$this->fields['thu_id'] =& $this->thu_id;
		$this->nguoidung_id = new cField('unread', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->tieu_de = new cField('unread', 'x_tieu_de', 'tieu_de', "`tieu_de`", 201, -1, FALSE);
		$this->fields['tieu_de'] =& $this->tieu_de;
		$this->noidung_lienhe = new cField('unread', 'x_noidung_lienhe', 'noidung_lienhe', "`noidung_lienhe`", 201, -1, FALSE);
		$this->fields['noidung_lienhe'] =& $this->noidung_lienhe;
		$this->nguoi_lienhe = new cField('unread', 'x_nguoi_lienhe', 'nguoi_lienhe', "`nguoi_lienhe`", 201, -1, FALSE);
		$this->fields['nguoi_lienhe'] =& $this->nguoi_lienhe;
		$this->gioi_tinh = new cField('unread', 'x_gioi_tinh', 'gioi_tinh', "`gioi_tinh`", 19, -1, FALSE);
		$this->fields['gioi_tinh'] =& $this->gioi_tinh;
		$this->quocgia_id = new cField('unread', 'x_quocgia_id', 'quocgia_id', "`quocgia_id`", 19, -1, FALSE);
		$this->fields['quocgia_id'] =& $this->quocgia_id;
		$this->diachi_email = new cField('unread', 'x_diachi_email', 'diachi_email', "`diachi_email`", 201, -1, FALSE);
		$this->fields['diachi_email'] =& $this->diachi_email;
		$this->ma_quocgia_tel = new cField('unread', 'x_ma_quocgia_tel', 'ma_quocgia_tel', "`ma_quocgia_tel`", 200, -1, FALSE);
		$this->fields['ma_quocgia_tel'] =& $this->ma_quocgia_tel;
		$this->ma_vung_tel = new cField('unread', 'x_ma_vung_tel', 'ma_vung_tel', "`ma_vung_tel`", 200, -1, FALSE);
		$this->fields['ma_vung_tel'] =& $this->ma_vung_tel;
		$this->so_dienthoai = new cField('unread', 'x_so_dienthoai', 'so_dienthoai', "`so_dienthoai`", 200, -1, FALSE);
		$this->fields['so_dienthoai'] =& $this->so_dienthoai;
		$this->ma_quocgia_fax = new cField('unread', 'x_ma_quocgia_fax', 'ma_quocgia_fax', "`ma_quocgia_fax`", 200, -1, FALSE);
		$this->fields['ma_quocgia_fax'] =& $this->ma_quocgia_fax;
		$this->ma_vung_fax = new cField('unread', 'x_ma_vung_fax', 'ma_vung_fax', "`ma_vung_fax`", 200, -1, FALSE);
		$this->fields['ma_vung_fax'] =& $this->ma_vung_fax;
		$this->so_fax = new cField('unread', 'x_so_fax', 'so_fax', "`so_fax`", 200, -1, FALSE);
		$this->fields['so_fax'] =& $this->so_fax;
		$this->dia_chi = new cField('unread', 'x_dia_chi', 'dia_chi', "`dia_chi`", 201, -1, FALSE);
		$this->fields['dia_chi'] =& $this->dia_chi;
		$this->ngay_gui = new cField('unread', 'x_ngay_gui', 'ngay_gui', "`ngay_gui`", 135, 7, FALSE);
		$this->fields['ngay_gui'] =& $this->ngay_gui;
		$this->trang_thai = new cField('unread', 'x_trang_thai', 'trang_thai', "user_inbox.trang_thai", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
		$this->ngay_doc = new cField('unread', 'x_ngay_doc', 'ngay_doc', "`ngay_doc`", 135, 7, FALSE);
		$this->fields['ngay_doc'] =& $this->ngay_doc;
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
		return "unread_Highlight";
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
		return "SELECT user_inbox.* FROM user_inbox";
	}

	function SqlWhere() { // Where
		return "user_inbox.trang_thai = 1";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "user_inbox.ngay_gui desc";
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
		global $Security;

		// Add User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
		}
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
		global $Security;

		// Add User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
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
		return "INSERT INTO user_inbox ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE user_inbox SET ";
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
		$SQL = "DELETE FROM user_inbox WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'thu_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['thu_id'], $this->thu_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`thu_id` = @thu_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->thu_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@thu_id@", ew_AdjustSql($this->thu_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "unreadlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("unreadview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "unreadadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("unreadedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("unreadadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("unreaddelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->thu_id->CurrentValue)) {
			$sUrl .= "thu_id=" . urlencode($this->thu_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=unread" : "";
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
		$this->thu_id->setDbValue($rs->fields('thu_id'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->tieu_de->setDbValue($rs->fields('tieu_de'));
		$this->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$this->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$this->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$this->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$this->diachi_email->setDbValue($rs->fields('diachi_email'));
		$this->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$this->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$this->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$this->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$this->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$this->so_fax->setDbValue($rs->fields('so_fax'));
		$this->dia_chi->setDbValue($rs->fields('dia_chi'));
		$this->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
		$this->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// tieu_de
		$this->tieu_de->ViewValue = $this->tieu_de->CurrentValue;
		$this->tieu_de->CssStyle = "";
		$this->tieu_de->CssClass = "";
		$this->tieu_de->ViewCustomAttributes = "";

		// nguoi_lienhe
		$this->nguoi_lienhe->ViewValue = $this->nguoi_lienhe->CurrentValue;
		$this->nguoi_lienhe->CssStyle = "";
		$this->nguoi_lienhe->CssClass = "";
		$this->nguoi_lienhe->ViewCustomAttributes = "";

		// diachi_email
		$this->diachi_email->ViewValue = $this->diachi_email->CurrentValue;
		$this->diachi_email->CssStyle = "";
		$this->diachi_email->CssClass = "";
		$this->diachi_email->ViewCustomAttributes = "";

		// ngay_gui
		$this->ngay_gui->ViewValue = $this->ngay_gui->CurrentValue;
		$this->ngay_gui->ViewValue = ew_FormatDateTime($this->ngay_gui->ViewValue, 7);
		$this->ngay_gui->CssStyle = "";
		$this->ngay_gui->CssClass = "";
		$this->ngay_gui->ViewCustomAttributes = "";

		// trang_thai
		if (strval($this->trang_thai->CurrentValue) <> "") {
			switch ($this->trang_thai->CurrentValue) {
				case "1":
					$this->trang_thai->ViewValue = "Chưa xem";
					break;
				case "2":
					$this->trang_thai->ViewValue = "Đã xem";
					break;
				default:
					$this->trang_thai->ViewValue = $this->trang_thai->CurrentValue;
			}
		} else {
			$this->trang_thai->ViewValue = NULL;
		}
		$this->trang_thai->CssStyle = "";
		$this->trang_thai->CssClass = "";
		$this->trang_thai->ViewCustomAttributes = "";

		// tieu_de
		$this->tieu_de->HrefValue = "";

		// nguoi_lienhe
		$this->nguoi_lienhe->HrefValue = "";

		// diachi_email
		$this->diachi_email->HrefValue = "";

		// ngay_gui
		$this->ngay_gui->HrefValue = "";

		// trang_thai
		$this->trang_thai->HrefValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		$sFilterWrk = $Security->UserIDList();
		if (!$Security->IsAdmin() && $sFilterWrk <> "") {
			$sFilterWrk = '`nguoidung_id` IN (' . $sFilterWrk . ')';
			if ($sFilter <> "")
				$sFilterWrk = "($sFilter) AND ($sFilterWrk)";
		} else {
			$sFilterWrk = $sFilter;
		}
		return $sFilterWrk;
	}

	// Get User ID subquery
	function GetUserIDSubquery(&$fld, &$masterfld) {
		global $conn;
		$sWrk = "";
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM user_inbox WHERE " . $this->AddUserIDFilter("");

		// List all values
		if ($rs = $conn->Execute($sSql)) {
			while (!$rs->EOF) {
				if ($sWrk <> "") $sWrk .= ",";
				$sWrk .= ew_QuotedValue($rs->fields[0], $masterfld->FldDataType);
				$rs->MoveNext();
			}
			$rs->Close();
		}
		if ($sWrk <> "") {
			$sWrk = $fld->FldExpression . " IN (" . $sWrk . ")";
		}
		return $sWrk;
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
