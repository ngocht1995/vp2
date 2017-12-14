<?php

// PHPMaker 6 configuration for Table manager_news
$manager_news = NULL; // Initialize table object

// Define table class
class cmanager_news {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $tintuc_id;
	var $anh_tintuc;
	var $ten_congty;
	var $hoten_nguoilienhe;
	var $trang_thai;
	var $nguoidung_id;
	var $tieude_tintuc;
	var $tukhoa_tintuc;
	var $tomtat_tintuc;
	var $nguon_tintuc;
	var $noidung_tintuc;
	var $lienket_tintuc;
	var $hienthi_tungay;
	var $hienthi_denngay;
	var $thoigian_them;
	var $thoigian_sua;
	var $soluot_truynhap;
	var $xuatban;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cmanager_news() {
		$this->TableVar = "manager_news";
		$this->TableName = "manager_news";
		$this->tintuc_id = new cField('manager_news', 'x_tintuc_id', 'tintuc_id', "user_new.tintuc_id", 19, -1, FALSE);
		$this->fields['tintuc_id'] =& $this->tintuc_id;
		$this->anh_tintuc = new cField('manager_news', 'x_anh_tintuc', 'anh_tintuc', "user_new.anh_tintuc", 201, -1, TRUE);
		$this->fields['anh_tintuc'] =& $this->anh_tintuc;
		$this->ten_congty = new cField('manager_news', 'x_ten_congty', 'ten_congty', "user.ten_congty", 201, -1, FALSE);
		$this->fields['ten_congty'] =& $this->ten_congty;
		$this->hoten_nguoilienhe = new cField('manager_news', 'x_hoten_nguoilienhe', 'hoten_nguoilienhe', "user.hoten_nguoilienhe", 200, -1, FALSE);
		$this->fields['hoten_nguoilienhe'] =& $this->hoten_nguoilienhe;
		$this->trang_thai = new cField('manager_news', 'x_trang_thai', 'trang_thai', "user_new.trang_thai", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
		$this->nguoidung_id = new cField('manager_news', 'x_nguoidung_id', 'nguoidung_id', "user_new.nguoidung_id", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->tieude_tintuc = new cField('manager_news', 'x_tieude_tintuc', 'tieude_tintuc', "user_new.tieude_tintuc", 201, -1, FALSE);
		$this->fields['tieude_tintuc'] =& $this->tieude_tintuc;
		$this->tukhoa_tintuc = new cField('manager_news', 'x_tukhoa_tintuc', 'tukhoa_tintuc', "user_new.tukhoa_tintuc", 201, -1, FALSE);
		$this->fields['tukhoa_tintuc'] =& $this->tukhoa_tintuc;
		$this->tomtat_tintuc = new cField('manager_news', 'x_tomtat_tintuc', 'tomtat_tintuc', "user_new.tomtat_tintuc", 201, -1, FALSE);
		$this->fields['tomtat_tintuc'] =& $this->tomtat_tintuc;
		$this->nguon_tintuc = new cField('manager_news', 'x_nguon_tintuc', 'nguon_tintuc', "user_new.nguon_tintuc", 201, -1, FALSE);
		$this->fields['nguon_tintuc'] =& $this->nguon_tintuc;
		$this->noidung_tintuc = new cField('manager_news', 'x_noidung_tintuc', 'noidung_tintuc', "user_new.noidung_tintuc", 201, -1, FALSE);
		$this->fields['noidung_tintuc'] =& $this->noidung_tintuc;
		$this->lienket_tintuc = new cField('manager_news', 'x_lienket_tintuc', 'lienket_tintuc', "user_new.lienket_tintuc", 201, -1, FALSE);
		$this->fields['lienket_tintuc'] =& $this->lienket_tintuc;
		$this->hienthi_tungay = new cField('manager_news', 'x_hienthi_tungay', 'hienthi_tungay', "user_new.hienthi_tungay", 135, 7, FALSE);
		$this->fields['hienthi_tungay'] =& $this->hienthi_tungay;
		$this->hienthi_denngay = new cField('manager_news', 'x_hienthi_denngay', 'hienthi_denngay', "user_new.hienthi_denngay", 135, 7, FALSE);
		$this->fields['hienthi_denngay'] =& $this->hienthi_denngay;
		$this->thoigian_them = new cField('manager_news', 'x_thoigian_them', 'thoigian_them', "user_new.thoigian_them", 135, 7, FALSE);
		$this->fields['thoigian_them'] =& $this->thoigian_them;
		$this->thoigian_sua = new cField('manager_news', 'x_thoigian_sua', 'thoigian_sua', "user_new.thoigian_sua", 135, 7, FALSE);
		$this->fields['thoigian_sua'] =& $this->thoigian_sua;
		$this->soluot_truynhap = new cField('manager_news', 'x_soluot_truynhap', 'soluot_truynhap', "user_new.soluot_truynhap", 19, -1, FALSE);
		$this->fields['soluot_truynhap'] =& $this->soluot_truynhap;
		$this->xuatban = new cField('manager_news', 'x_xuatban', 'xuatban', "user_new.xuatban", 19, -1, FALSE);
		$this->fields['xuatban'] =& $this->xuatban;
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
		return "manager_news_Highlight";
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
		return "SELECT user_new.tintuc_id, user.ten_congty, user.hoten_nguoilienhe, user_new.trang_thai, user_new.nguoidung_id, user_new.tieude_tintuc, user_new.tukhoa_tintuc, user_new.tomtat_tintuc, user_new.anh_tintuc, user_new.nguon_tintuc, user_new.noidung_tintuc, user_new.lienket_tintuc, user_new.hienthi_tungay, user_new.hienthi_denngay, user_new.thoigian_them, user_new.thoigian_sua, user_new.soluot_truynhap, user_new.xuatban FROM user_new Inner Join user On user_new.nguoidung_id = user.nguoidung_id";
	}

	function SqlWhere() { // Where
		return "user_new.trang_thai=2";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
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
		return "INSERT INTO user_new Inner Join user On user_new.nguoidung_id = user.nguoidung_id ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE user_new Inner Join user On user_new.nguoidung_id = user.nguoidung_id SET ";
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
		$SQL = "DELETE FROM user_new Inner Join user On user_new.nguoidung_id = user.nguoidung_id WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'tintuc_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['tintuc_id'], $this->tintuc_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "user_new.tintuc_id = @tintuc_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->tintuc_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@tintuc_id@", ew_AdjustSql($this->tintuc_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "manager_newslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("manager_newsview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "manager_newsadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("manager_newsedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("manager_newsadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("manager_newsdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->tintuc_id->CurrentValue)) {
			$sUrl .= "tintuc_id=" . urlencode($this->tintuc_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=manager_news" : "";
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
		$this->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$this->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$this->ten_congty->setDbValue($rs->fields('ten_congty'));
		$this->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$this->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$this->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$this->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$this->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$this->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$this->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$this->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$this->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$this->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$this->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$this->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// anh_tintuc
		if (!is_null($this->anh_tintuc->Upload->DbValue)) {
			$this->anh_tintuc->ViewValue = $this->anh_tintuc->Upload->DbValue;
			$this->anh_tintuc->ImageWidth = 150;
			$this->anh_tintuc->ImageHeight = 0;
			$this->anh_tintuc->ImageAlt = "";
		} else {
			$this->anh_tintuc->ViewValue = "";
		}
		$this->anh_tintuc->CssStyle = "";
		$this->anh_tintuc->CssClass = "";
		$this->anh_tintuc->ViewCustomAttributes = "";

		// ten_congty
		$this->ten_congty->ViewValue = $this->ten_congty->CurrentValue;
		$this->ten_congty->CssStyle = "";
		$this->ten_congty->CssClass = "";
		$this->ten_congty->ViewCustomAttributes = "";

		// tieude_tintuc
		$this->tieude_tintuc->ViewValue = $this->tieude_tintuc->CurrentValue;
		$this->tieude_tintuc->CssStyle = "";
		$this->tieude_tintuc->CssClass = "";
		$this->tieude_tintuc->ViewCustomAttributes = "";

		// hienthi_tungay
		$this->hienthi_tungay->ViewValue = $this->hienthi_tungay->CurrentValue;
		$this->hienthi_tungay->ViewValue = ew_FormatDateTime($this->hienthi_tungay->ViewValue, 7);
		$this->hienthi_tungay->CssStyle = "";
		$this->hienthi_tungay->CssClass = "";
		$this->hienthi_tungay->ViewCustomAttributes = "";

		// hienthi_denngay
		$this->hienthi_denngay->ViewValue = $this->hienthi_denngay->CurrentValue;
		$this->hienthi_denngay->ViewValue = ew_FormatDateTime($this->hienthi_denngay->ViewValue, 7);
		$this->hienthi_denngay->CssStyle = "";
		$this->hienthi_denngay->CssClass = "";
		$this->hienthi_denngay->ViewCustomAttributes = "";

		// xuatban
		if (strval($this->xuatban->CurrentValue) <> "") {
			switch ($this->xuatban->CurrentValue) {
				case "0":
					$this->xuatban->ViewValue = "Dang cho";
					break;
				case "1":
					$this->xuatban->ViewValue = "Xuat ban";
					break;
				default:
					$this->xuatban->ViewValue = $this->xuatban->CurrentValue;
			}
		} else {
			$this->xuatban->ViewValue = NULL;
		}
		$this->xuatban->CssStyle = "";
		$this->xuatban->CssClass = "";
		$this->xuatban->ViewCustomAttributes = "";

		// anh_tintuc
		if (!is_null($this->anh_tintuc->Upload->DbValue)) {
			$this->anh_tintuc->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($this->anh_tintuc->ViewValue)) ? $this->anh_tintuc->ViewValue : $this->anh_tintuc->CurrentValue);
			if ($this->Export <> "") $manager_news->anh_tintuc->HrefValue = ew_ConvertFullUrl($this->anh_tintuc->HrefValue);
		} else {
			$this->anh_tintuc->HrefValue = "";
		}

		// ten_congty
		$this->ten_congty->HrefValue = "";

		// tieude_tintuc
		$this->tieude_tintuc->HrefValue = "";

		// hienthi_tungay
		$this->hienthi_tungay->HrefValue = "";

		// hienthi_denngay
		$this->hienthi_denngay->HrefValue = "";

		// xuatban
		$this->xuatban->HrefValue = "";

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
