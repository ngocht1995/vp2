<?php

// PHPMaker 6 configuration for Table advertising
$advertising = NULL; // Initialize table object

// Define table class
class cadvertising {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $lienket_id;
	var $tieu_de;
	var $anh_logo;
	var $kieu_anh;
	var $duongdan_lienket;
	var $ten_viettat;
	var $mo_ta;
	var $dorong_anh;
	var $chieucao_anh;
	var $thutu_sapxep;
	var $luachon_hienthi;
	var $vitri_quangcao;
	var $solan_truycap;
	var $thoigian_them;
	var $thoigian_sua;
	var $nguoi_them;
	var $nguoi_sua;
	var $trang_thai;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cadvertising() {
		$this->TableVar = "advertising";
		$this->TableName = "advertising";
		$this->SelectLimit = TRUE;
		$this->lienket_id = new cField('advertising', 'x_lienket_id', 'lienket_id', "`lienket_id`", 19, -1, FALSE);
		$this->fields['lienket_id'] =& $this->lienket_id;
		$this->tieu_de = new cField('advertising', 'x_tieu_de', 'tieu_de', "`tieu_de`", 200, -1, FALSE);
		$this->fields['tieu_de'] =& $this->tieu_de;
		$this->anh_logo = new cField('advertising', 'x_anh_logo', 'anh_logo', "`anh_logo`", 205, -1, TRUE);
		$this->fields['anh_logo'] =& $this->anh_logo;
		$this->kieu_anh = new cField('advertising', 'x_kieu_anh', 'kieu_anh', "`kieu_anh`", 200, -1, FALSE);
		$this->fields['kieu_anh'] =& $this->kieu_anh;
		$this->duongdan_lienket = new cField('advertising', 'x_duongdan_lienket', 'duongdan_lienket', "`duongdan_lienket`", 200, -1, FALSE);
		$this->fields['duongdan_lienket'] =& $this->duongdan_lienket;
		$this->ten_viettat = new cField('advertising', 'x_ten_viettat', 'ten_viettat', "`ten_viettat`", 200, -1, FALSE);
		$this->fields['ten_viettat'] =& $this->ten_viettat;
		$this->mo_ta = new cField('advertising', 'x_mo_ta', 'mo_ta', "`mo_ta`", 200, -1, FALSE);
		$this->fields['mo_ta'] =& $this->mo_ta;
		$this->dorong_anh = new cField('advertising', 'x_dorong_anh', 'dorong_anh', "`dorong_anh`", 19, -1, FALSE);
		$this->fields['dorong_anh'] =& $this->dorong_anh;
		$this->chieucao_anh = new cField('advertising', 'x_chieucao_anh', 'chieucao_anh', "`chieucao_anh`", 19, -1, FALSE);
		$this->fields['chieucao_anh'] =& $this->chieucao_anh;
		$this->thutu_sapxep = new cField('advertising', 'x_thutu_sapxep', 'thutu_sapxep', "`thutu_sapxep`", 5, -1, FALSE);
		$this->fields['thutu_sapxep'] =& $this->thutu_sapxep;
		$this->luachon_hienthi = new cField('advertising', 'x_luachon_hienthi', 'luachon_hienthi', "`luachon_hienthi`", 19, -1, FALSE);
		$this->fields['luachon_hienthi'] =& $this->luachon_hienthi;
		$this->vitri_quangcao = new cField('advertising', 'x_vitri_quangcao', 'vitri_quangcao', "`vitri_quangcao`", 19, -1, FALSE);
		$this->fields['vitri_quangcao'] =& $this->vitri_quangcao;
		$this->solan_truycap = new cField('advertising', 'x_solan_truycap', 'solan_truycap', "`solan_truycap`", 19, -1, FALSE);
		$this->fields['solan_truycap'] =& $this->solan_truycap;
		$this->thoigian_them = new cField('advertising', 'x_thoigian_them', 'thoigian_them', "`thoigian_them`", 135, 7, FALSE);
		$this->fields['thoigian_them'] =& $this->thoigian_them;
		$this->thoigian_sua = new cField('advertising', 'x_thoigian_sua', 'thoigian_sua', "`thoigian_sua`", 135, 7, FALSE);
		$this->fields['thoigian_sua'] =& $this->thoigian_sua;
		$this->nguoi_them = new cField('advertising', 'x_nguoi_them', 'nguoi_them', "`nguoi_them`", 19, -1, FALSE);
		$this->fields['nguoi_them'] =& $this->nguoi_them;
		$this->nguoi_sua = new cField('advertising', 'x_nguoi_sua', 'nguoi_sua', "`nguoi_sua`", 19, -1, FALSE);
		$this->fields['nguoi_sua'] =& $this->nguoi_sua;
		$this->trang_thai = new cField('advertising', 'x_trang_thai', 'trang_thai', "`trang_thai`", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
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
		return "advertising_Highlight";
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
		return "SELECT * FROM `advertising`";
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
		return "`thutu_sapxep` ASC";
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
		return "INSERT INTO `advertising` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `advertising` SET ";
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
		$SQL = "DELETE FROM `advertising` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'lienket_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['lienket_id'], $this->lienket_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`lienket_id` = @lienket_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->lienket_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@lienket_id@", ew_AdjustSql($this->lienket_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "advertisinglist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("advertisingview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "advertisingadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("advertisingedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("advertisingadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("advertisingdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->lienket_id->CurrentValue)) {
			$sUrl .= "lienket_id=" . urlencode($this->lienket_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=advertising" : "";
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
		$this->lienket_id->setDbValue($rs->fields('lienket_id'));
		$this->tieu_de->setDbValue($rs->fields('tieu_de'));
		$this->anh_logo->Upload->DbValue = $rs->fields('anh_logo');
		$this->kieu_anh->setDbValue($rs->fields('kieu_anh'));
		$this->duongdan_lienket->setDbValue($rs->fields('duongdan_lienket'));
		$this->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$this->mo_ta->setDbValue($rs->fields('mo_ta'));
		$this->dorong_anh->setDbValue($rs->fields('dorong_anh'));
		$this->chieucao_anh->setDbValue($rs->fields('chieucao_anh'));
		$this->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$this->luachon_hienthi->setDbValue($rs->fields('luachon_hienthi'));
		$this->vitri_quangcao->setDbValue($rs->fields('vitri_quangcao'));
		$this->solan_truycap->setDbValue($rs->fields('solan_truycap'));
		$this->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$this->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$this->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$this->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
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

		// anh_logo
		if (!is_null($this->anh_logo->Upload->DbValue)) {
			$this->anh_logo->ViewValue = "Anh Logo";
			$this->anh_logo->ImageWidth = 200;
			$this->anh_logo->ImageHeight = 0;
			$this->anh_logo->ImageAlt = "";
		} else {
			$this->anh_logo->ViewValue = "";
		}
		$this->anh_logo->CssStyle = "";
		$this->anh_logo->CssClass = "";
		$this->anh_logo->ViewCustomAttributes = "";

		// duongdan_lienket
		$this->duongdan_lienket->ViewValue = $this->duongdan_lienket->CurrentValue;
		$this->duongdan_lienket->CssStyle = "";
		$this->duongdan_lienket->CssClass = "";
		$this->duongdan_lienket->ViewCustomAttributes = "";

		// luachon_hienthi
		if (strval($this->luachon_hienthi->CurrentValue) <> "") {
			switch ($advertising->vitri_quangcao->CurrentValue) {
					case "1":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên trái trang tin ";
						break;
                                        case "2":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên phải trang tin ";
						break;
                                        case "3":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo trên trang sàn TMĐT ";
						break;
					 case "4":
						$advertising->vitri_quangcao->ViewValue = "Ảnh banner trang tin ";
						break;
					default:
						$advertising->vitri_quangcao->ViewValue = $advertising->vitri_quangcao->CurrentValue;
				}
		} else {
			$this->luachon_hienthi->ViewValue = NULL;
		}
		$this->luachon_hienthi->CssStyle = "";
		$this->luachon_hienthi->CssClass = "";
		$this->luachon_hienthi->ViewCustomAttributes = "";

		// vitri_quangcao
		if (strval($this->vitri_quangcao->CurrentValue) <> "") {
			switch ($this->vitri_quangcao->CurrentValue) {
				case "1":
					$this->vitri_quangcao->ViewValue = "Ben phai trang chu";
					break;
				case "2":
					$this->vitri_quangcao->ViewValue = "Ben trai trang chu";
					break;
				default:
					$this->vitri_quangcao->ViewValue = $this->vitri_quangcao->CurrentValue;
			}
		} else {
			$this->vitri_quangcao->ViewValue = NULL;
		}
		$this->vitri_quangcao->CssStyle = "";
		$this->vitri_quangcao->CssClass = "";
		$this->vitri_quangcao->ViewCustomAttributes = "";

		// trang_thai
		if (strval($this->trang_thai->CurrentValue) <> "") {
			switch ($this->trang_thai->CurrentValue) {
				case "0":
					$this->trang_thai->ViewValue = "Khong xuat ban";
					break;
				case "1":
					$this->trang_thai->ViewValue = "Xuat ban";
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

		// anh_logo
		if (!is_null($this->anh_logo->Upload->DbValue)) {
			$this->anh_logo->HrefValue = "advertising_anh_logo_bv.php?lienket_id=" . $this->lienket_id->CurrentValue;
			if ($this->Export <> "") $this->anh_logo->HrefValue = ew_ConvertFullUrl($this->anh_logo->HrefValue);
		} else {
			$this->anh_logo->HrefValue = "";
		}

		// duongdan_lienket
		$this->duongdan_lienket->HrefValue = "";

		// luachon_hienthi
		$this->luachon_hienthi->HrefValue = "";

		// vitri_quangcao
		$this->vitri_quangcao->HrefValue = "";

		// trang_thai
		$this->trang_thai->HrefValue = "";

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
