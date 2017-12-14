<?php

// PHPMaker 6 configuration for Table manager_product
$manager_product = NULL; // Initialize table object

// Define table class
class cmanager_product {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $ten_sanpham;
        var $nguoidung_id;
	var $ten_congty;
	var $ma_sanpham;
	var $nganhnghe_id;
	var $xuatban;
	var $chung_nhan;
	var $nhan_hieu;
	var $xuat_su;
	var $tomtat_sanpham;
	var $noidung_sanpham;
	var $loai_tien;
	var $donvi_tinh;
	var $gia_xuatcang;
	var $phuongthuc_ttoan;
	var $thoihan_giaohang;
	var $soluong_tonkho;
	var $khanang_cungcap;
	var $tg_themsanpham;
	var $tg_suasanpham;
	var $so_lanxem;
	var $trang_thai;
	var $hoten_nguoilienhe;
	var $sanpham_id;
	var $sanpham_tieubieu;	
        var $thanhtoan_status;
	var $don_gia;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cmanager_product() {
		$this->TableVar = "manager_product";
		$this->TableName = "manager_product";
		$this->ten_sanpham = new cField('manager_product', 'x_ten_sanpham', 'ten_sanpham', "products.ten_sanpham", 201, -1, FALSE);
		$this->fields['ten_sanpham'] =& $this->ten_sanpham;
                $this->nguoidung_id = new cField('manager_product', 'x_nguoidung_id', 'nguoidung_id', "products.nguoidung_id", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->ten_congty = new cField('manager_product', 'x_ten_congty', 'ten_congty', "user.ten_congty", 201, -1, FALSE);
		$this->fields['ten_congty'] =& $this->ten_congty;
		$this->ma_sanpham = new cField('manager_product', 'x_ma_sanpham', 'ma_sanpham', "products.ma_sanpham", 200, -1, FALSE);
		$this->fields['ma_sanpham'] =& $this->ma_sanpham;
		$this->nganhnghe_id = new cField('manager_product', 'x_nganhnghe_id', 'nganhnghe_id', "products.nganhnghe_id", 19, -1, FALSE);
		$this->fields['nganhnghe_id'] =& $this->nganhnghe_id;
		$this->xuatban = new cField('manager_product', 'x_xuatban', 'xuatban', "products.xuatban", 19, -1, FALSE);
		$this->fields['xuatban'] =& $this->xuatban;
		$this->chung_nhan = new cField('manager_product', 'x_chung_nhan', 'chung_nhan', "products.chung_nhan", 201, -1, FALSE);
		$this->fields['chung_nhan'] =& $this->chung_nhan;
		$this->nhan_hieu = new cField('manager_product', 'x_nhan_hieu', 'nhan_hieu', "products.nhan_hieu", 201, -1, FALSE);
		$this->fields['nhan_hieu'] =& $this->nhan_hieu;
		$this->xuat_su = new cField('manager_product', 'x_xuat_su', 'xuat_su', "products.xuat_su", 201, -1, FALSE);
		$this->fields['xuat_su'] =& $this->xuat_su;
		$this->tomtat_sanpham = new cField('manager_product', 'x_tomtat_sanpham', 'tomtat_sanpham', "products.tomtat_sanpham", 201, -1, FALSE);
		$this->fields['tomtat_sanpham'] =& $this->tomtat_sanpham;
		$this->noidung_sanpham = new cField('manager_product', 'x_noidung_sanpham', 'noidung_sanpham', "products.noidung_sanpham", 201, -1, FALSE);
		$this->fields['noidung_sanpham'] =& $this->noidung_sanpham;
		$this->loai_tien = new cField('manager_product', 'x_loai_tien', 'loai_tien', "products.loai_tien", 19, -1, FALSE);
		$this->fields['loai_tien'] =& $this->loai_tien;
		$this->donvi_tinh = new cField('manager_product', 'x_donvi_tinh', 'donvi_tinh', "products.donvi_tinh", 200, -1, FALSE);
		$this->fields['donvi_tinh'] =& $this->donvi_tinh;
		$this->gia_xuatcang = new cField('manager_product', 'x_gia_xuatcang', 'gia_xuatcang', "products.gia_xuatcang", 19, -1, FALSE);
		$this->fields['gia_xuatcang'] =& $this->gia_xuatcang;
		$this->phuongthuc_ttoan = new cField('manager_product', 'x_phuongthuc_ttoan', 'phuongthuc_ttoan', "products.phuongthuc_ttoan", 200, -1, FALSE);
		$this->fields['phuongthuc_ttoan'] =& $this->phuongthuc_ttoan;
		$this->thoihan_giaohang = new cField('manager_product', 'x_thoihan_giaohang', 'thoihan_giaohang', "products.thoihan_giaohang", 201, -1, FALSE);
		$this->fields['thoihan_giaohang'] =& $this->thoihan_giaohang;
		$this->soluong_tonkho = new cField('manager_product', 'x_soluong_tonkho', 'soluong_tonkho', "products.soluong_tonkho", 201, -1, FALSE);
		$this->fields['soluong_tonkho'] =& $this->soluong_tonkho;
		$this->khanang_cungcap = new cField('manager_product', 'x_khanang_cungcap', 'khanang_cungcap', "products.khanang_cungcap", 201, -1, FALSE);
		$this->fields['khanang_cungcap'] =& $this->khanang_cungcap;
		$this->tg_themsanpham = new cField('manager_product', 'x_tg_themsanpham', 'tg_themsanpham', "products.tg_themsanpham", 135, 7, FALSE);
		$this->fields['tg_themsanpham'] =& $this->tg_themsanpham;
		$this->tg_suasanpham = new cField('manager_product', 'x_tg_suasanpham', 'tg_suasanpham', "products.tg_suasanpham", 135, 7, FALSE);
		$this->fields['tg_suasanpham'] =& $this->tg_suasanpham;
		$this->so_lanxem = new cField('manager_product', 'x_so_lanxem', 'so_lanxem', "products.so_lanxem", 19, -1, FALSE);
		$this->fields['so_lanxem'] =& $this->so_lanxem;
		$this->trang_thai = new cField('manager_product', 'x_trang_thai', 'trang_thai', "products.trang_thai", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
		$this->hoten_nguoilienhe = new cField('manager_product', 'x_hoten_nguoilienhe', 'hoten_nguoilienhe', "user.hoten_nguoilienhe", 200, -1, FALSE);
		$this->fields['hoten_nguoilienhe'] =& $this->hoten_nguoilienhe;
		$this->sanpham_id = new cField('manager_product', 'x_sanpham_id', 'sanpham_id', "products.sanpham_id", 19, -1, FALSE);
		$this->fields['sanpham_id'] =& $this->sanpham_id;
		$this->sanpham_tieubieu = new cField('manager_product', 'x_sanpham_tieubieu', 'sanpham_tieubieu', "products.sanpham_tieubieu", 19, -1, FALSE);
		$this->fields['sanpham_tieubieu'] =& $this->sanpham_tieubieu;
		$this->thanhtoan_status = new cField('manager_product', 'x_thanhtoan_status', 'thanhtoan_status', "`thanhtoan_status`", 19, -1, FALSE);
		$this->fields['thanhtoan_status'] =& $this->thanhtoan_status;
		$this->don_gia = new cField('manager_product', 'x_don_gia', 'don_gia', "`don_gia`", 4, -1, FALSE);
		$this->fields['don_gia'] =& $this->don_gia;
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
		return "manager_product_Highlight";
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
		return "SELECT products.*, user.hoten_nguoilienhe, user.ten_congty FROM  career Inner Join products On career.nganhnghe_id = products.nganhnghe_id Inner Join user On user.nguoidung_id = products.nguoidung_id";
	}

	function SqlWhere() { // Where
		return "products.trang_thai = 2";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "products.tg_suasanpham desc";
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
		return "INSERT INTO products Inner Join user On products.nguoidung_id = user.nguoidung_id ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE products Inner Join user On products.nguoidung_id = user.nguoidung_id SET ";
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
		$SQL = "DELETE FROM products Inner Join user On products.nguoidung_id = user.nguoidung_id WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'sanpham_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['sanpham_id'], $this->sanpham_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "products.sanpham_id = @sanpham_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->sanpham_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@sanpham_id@", ew_AdjustSql($this->sanpham_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "manager_productlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("manager_productview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "manager_productadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("manager_productedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("manager_productadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("manager_productdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->sanpham_id->CurrentValue)) {
			$sUrl .= "sanpham_id=" . urlencode($this->sanpham_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=manager_product" : "";
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
		$this->ten_sanpham->setDbValue($rs->fields('ten_sanpham'));
                $this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->ten_congty->setDbValue($rs->fields('ten_congty'));
		$this->ma_sanpham->setDbValue($rs->fields('ma_sanpham'));
		$this->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$this->xuatban->setDbValue($rs->fields('xuatban'));
		$this->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$this->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
		$this->xuat_su->setDbValue($rs->fields('xuat_su'));
		$this->tomtat_sanpham->setDbValue($rs->fields('tomtat_sanpham'));
		$this->noidung_sanpham->setDbValue($rs->fields('noidung_sanpham'));
		$this->loai_tien->setDbValue($rs->fields('loai_tien'));
		$this->donvi_tinh->setDbValue($rs->fields('donvi_tinh'));
		$this->gia_xuatcang->setDbValue($rs->fields('gia_xuatcang'));
		$this->phuongthuc_ttoan->setDbValue($rs->fields('phuongthuc_ttoan'));
		$this->thoihan_giaohang->setDbValue($rs->fields('thoihan_giaohang'));
		$this->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$this->khanang_cungcap->setDbValue($rs->fields('khanang_cungcap'));
		$this->tg_themsanpham->setDbValue($rs->fields('tg_themsanpham'));
		$this->tg_suasanpham->setDbValue($rs->fields('tg_suasanpham'));
		$this->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
		$this->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$this->sanpham_id->setDbValue($rs->fields('sanpham_id'));
		$this->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
		$this->thanhtoan_status->setDbValue($rs->fields('thanhtoan_status'));
		$this->don_gia->setDbValue($rs->fields('don_gia'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// ten_sanpham
		$this->ten_sanpham->ViewValue = $this->ten_sanpham->CurrentValue;
		$this->ten_sanpham->CssStyle = "";
		$this->ten_sanpham->CssClass = "";
		$this->ten_sanpham->ViewCustomAttributes = "";

		// ten_congty
		$this->ten_congty->ViewValue = $this->ten_congty->CurrentValue;
		$this->ten_congty->CssStyle = "";
		$this->ten_congty->CssClass = "";
		$this->ten_congty->ViewCustomAttributes = "";

		// nganhnghe_id
		if (strval($this->nganhnghe_id->CurrentValue) <> "") {
			$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($this->nganhnghe_id->CurrentValue) . "";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
				$this->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
				$rswrk->Close();
			} else {
				$this->nganhnghe_id->ViewValue = $this->nganhnghe_id->CurrentValue;
			}
		} else {
			$this->nganhnghe_id->ViewValue = NULL;
		}
		$this->nganhnghe_id->CssStyle = "";
		$this->nganhnghe_id->CssClass = "";
		$this->nganhnghe_id->ViewCustomAttributes = "";

                // xuat_su
		if (strval($this->xuat_su->CurrentValue) <> "") {
			$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($this->xuat_su->CurrentValue) . "'";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
				$this->xuat_su->ViewValue = $rswrk->fields('ten_quocgia');
				$rswrk->Close();
			} else {
				$this->xuat_su->ViewValue = $this->xuat_su->CurrentValue;
			}
		} else {
			$this->xuat_su->ViewValue = NULL;
		}
		$this->xuat_su->CssStyle = "";
		$this->xuat_su->CssClass = "";
		$this->xuat_su->ViewCustomAttributes = "";

		// xuatban
		if (strval($this->xuatban->CurrentValue) <> "") {
			switch ($this->xuatban->CurrentValue) {
				case "0":
					$this->xuatban->ViewValue = "Đang chờ";
					break;
				case "1":
					$this->xuatban->ViewValue = "Xuất bản";
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

		// sanpham_tieubieu
		if (strval($this->sanpham_tieubieu->CurrentValue) <> "") {
			switch ($this->sanpham_tieubieu->CurrentValue) {
				case "0":
					$this->sanpham_tieubieu->ViewValue = "Khong tieu bieu";
					break;
				case "1":
					$this->sanpham_tieubieu->ViewValue = "Tieu bieu";
					break;
				default:
					$this->sanpham_tieubieu->ViewValue = $this->sanpham_tieubieu->CurrentValue;
			}
		} else {
			$this->sanpham_tieubieu->ViewValue = NULL;
		}
		$this->sanpham_tieubieu->CssStyle = "";
		$this->sanpham_tieubieu->CssClass = "";
		$this->sanpham_tieubieu->ViewCustomAttributes = "";

		

		// ten_sanpham
		$this->ten_sanpham->HrefValue = "";

		// ten_congty
		$this->ten_congty->HrefValue = "";

		// nganhnghe_id
		$this->nganhnghe_id->HrefValue = "";

		// xuatban
		$this->xuatban->HrefValue = "";

		// sanpham_tieubieu
		$this->sanpham_tieubieu->HrefValue = "";

                // xuat_su
		$this->xuat_su->HrefValue = "";

		

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
