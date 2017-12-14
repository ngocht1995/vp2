<?php

// PHPMaker 6 configuration for Table products
$products = NULL; // Initialize table object

// Define table class
class cproducts {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $sanpham_id;
	var $nguoidung_id;
	var $ten_sanpham;
	var $ma_sanpham;
	var $nganhnghe_id;
	var $chung_nhan;
	var $nhan_hieu;
	var $tomtat_sanpham;
	var $noidung_sanpham;
	var $loai_tien;
	var $donvi_tinh;
	var $gia_xuatcang;
	var $phuongthuc_ttoan;
	var $thoihan_giaohang;
	var $soluong_tonkho;
	var $tg_themsanpham;
	var $tg_suasanpham;
	var $so_lanxem;
	var $trang_thai;
	var $xuatban;
	var $sanpham_tieubieu;
	var $xuat_su;
	var $comment_status;
	var $don_gia;
	var $thanhtoan_status;	
	var $khuyenmai_status;
	var $km_date_begin;
	var $km_date_end;
	var $anh_to;
	var $anh_nho;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cproducts() {
		$this->TableVar = "products";
		$this->TableName = "products";
		$this->SelectLimit = TRUE;
		$this->sanpham_id = new cField('products', 'x_sanpham_id', 'sanpham_id', "`sanpham_id`", 19, -1, FALSE);
		$this->fields['sanpham_id'] =& $this->sanpham_id;
		$this->nguoidung_id = new cField('products', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->ten_sanpham = new cField('products', 'x_ten_sanpham', 'ten_sanpham', "`ten_sanpham`", 200, -1, FALSE);
		$this->fields['ten_sanpham'] =& $this->ten_sanpham;
		$this->ma_sanpham = new cField('products', 'x_ma_sanpham', 'ma_sanpham', "`ma_sanpham`", 200, -1, FALSE);
		$this->fields['ma_sanpham'] =& $this->ma_sanpham;
		$this->nganhnghe_id = new cField('products', 'x_nganhnghe_id', 'nganhnghe_id', "`nganhnghe_id`", 19, -1, FALSE);
		$this->fields['nganhnghe_id'] =& $this->nganhnghe_id;
		$this->chung_nhan = new cField('products', 'x_chung_nhan', 'chung_nhan', "`chung_nhan`", 200, -1, FALSE);
		$this->fields['chung_nhan'] =& $this->chung_nhan;
		$this->nhan_hieu = new cField('products', 'x_nhan_hieu', 'nhan_hieu', "`nhan_hieu`", 200, -1, FALSE);
		$this->fields['nhan_hieu'] =& $this->nhan_hieu;
		$this->tomtat_sanpham = new cField('products', 'x_tomtat_sanpham', 'tomtat_sanpham', "`tomtat_sanpham`", 201, -1, FALSE);
		$this->fields['tomtat_sanpham'] =& $this->tomtat_sanpham;
		$this->noidung_sanpham = new cField('products', 'x_noidung_sanpham', 'noidung_sanpham', "`noidung_sanpham`", 201, -1, FALSE);
		$this->fields['noidung_sanpham'] =& $this->noidung_sanpham;
		$this->loai_tien = new cField('products', 'x_loai_tien', 'loai_tien', "`loai_tien`", 19, -1, FALSE);
		$this->fields['loai_tien'] =& $this->loai_tien;
		$this->donvi_tinh = new cField('products', 'x_donvi_tinh', 'donvi_tinh', "`donvi_tinh`", 200, -1, FALSE);
		$this->fields['donvi_tinh'] =& $this->donvi_tinh;
		$this->gia_xuatcang = new cField('products', 'x_gia_xuatcang', 'gia_xuatcang', "`gia_xuatcang`", 19, -1, FALSE);
		$this->fields['gia_xuatcang'] =& $this->gia_xuatcang;
		$this->phuongthuc_ttoan = new cField('products', 'x_phuongthuc_ttoan', 'phuongthuc_ttoan', "`phuongthuc_ttoan`", 200, -1, FALSE);
		$this->fields['phuongthuc_ttoan'] =& $this->phuongthuc_ttoan;
		$this->thoihan_giaohang = new cField('products', 'x_thoihan_giaohang', 'thoihan_giaohang', "`thoihan_giaohang`", 200, -1, FALSE);
		$this->fields['thoihan_giaohang'] =& $this->thoihan_giaohang;
		$this->soluong_tonkho = new cField('products', 'x_soluong_tonkho', 'soluong_tonkho', "`soluong_tonkho`", 19, -1, FALSE);
		$this->fields['soluong_tonkho'] =& $this->soluong_tonkho;
		$this->tg_themsanpham = new cField('products', 'x_tg_themsanpham', 'tg_themsanpham', "`tg_themsanpham`", 135, 7, FALSE);
		$this->fields['tg_themsanpham'] =& $this->tg_themsanpham;
		$this->tg_suasanpham = new cField('products', 'x_tg_suasanpham', 'tg_suasanpham', "`tg_suasanpham`", 135, 7, FALSE);
		$this->fields['tg_suasanpham'] =& $this->tg_suasanpham;
		$this->so_lanxem = new cField('products', 'x_so_lanxem', 'so_lanxem', "`so_lanxem`", 19, -1, FALSE);
		$this->fields['so_lanxem'] =& $this->so_lanxem;
		$this->trang_thai = new cField('products', 'x_trang_thai', 'trang_thai', "`trang_thai`", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
		$this->xuatban = new cField('products', 'x_xuatban', 'xuatban', "`xuatban`", 19, -1, FALSE);
		$this->fields['xuatban'] =& $this->xuatban;
		$this->sanpham_tieubieu = new cField('products', 'x_sanpham_tieubieu', 'sanpham_tieubieu', "`sanpham_tieubieu`", 19, -1, FALSE);
		$this->fields['sanpham_tieubieu'] =& $this->sanpham_tieubieu;
		$this->xuat_su = new cField('products', 'x_xuat_su', 'xuat_su', "`xuat_su`", 200, -1, FALSE);
		$this->fields['xuat_su'] =& $this->xuat_su;
		$this->comment_status = new cField('products', 'x_comment_status', 'comment_status', "`comment_status`", 19, -1, FALSE);
		$this->fields['comment_status'] =& $this->comment_status;
		$this->don_gia = new cField('products', 'x_don_gia', 'don_gia', "`don_gia`", 21, -1, FALSE);
		$this->fields['don_gia'] =& $this->don_gia;
		$this->thanhtoan_status = new cField('products', 'x_thanhtoan_status', 'thanhtoan_status', "`thanhtoan_status`", 19, -1, FALSE);
		$this->fields['thanhtoan_status'] =& $this->thanhtoan_status;
		$this->soluong_tonkho = new cField('products', 'x_soluong_tonkho', 'soluong_tonkho', "`soluong_tonkho`", 19, -1, FALSE);
		$this->fields['soluong_tonkho'] =& $this->soluong_tonkho;
		$this->khuyenmai_status = new cField('products', 'x_khuyenmai_status', 'khuyenmai_status', "`khuyenmai_status`", 19, -1, FALSE);
		$this->fields['khuyenmai_status'] =& $this->khuyenmai_status;
		$this->km_date_begin = new cField('products', 'x_km_date_begin', 'km_date_begin', "`km_date_begin`", 135, 7, FALSE);
		$this->fields['km_date_begin'] =& $this->km_date_begin;
		$this->km_date_end = new cField('products', 'x_km_date_end', 'km_date_end', "`km_date_end`", 135, 7, FALSE);
		$this->fields['km_date_end'] =& $this->km_date_end;
		$this->anh_to = new cField('products', 'x_anh_to', 'anh_to', "`anh_to`", 200, -1, TRUE);
		$this->fields['anh_to'] =& $this->anh_to;
		$this->anh_nho = new cField('products', 'x_anh_nho', 'anh_nho', "`anh_nho`", 200, -1, TRUE);
		$this->fields['anh_nho'] =& $this->anh_nho;
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
		return "products_Highlight";
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
		return "SELECT * FROM `products`";
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
		return "INSERT INTO `products` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `products` SET ";
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
		$SQL = "DELETE FROM `products` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'sanpham_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['sanpham_id'], $this->sanpham_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`sanpham_id` = @sanpham_id@";
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
			return "productslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("productsview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "productsadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("productsedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("productsadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("productsdelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=products" : "";
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
		$this->sanpham_id->setDbValue($rs->fields('sanpham_id'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->ten_sanpham->setDbValue($rs->fields('ten_sanpham'));
		$this->ma_sanpham->setDbValue($rs->fields('ma_sanpham'));
		$this->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$this->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$this->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
		$this->tomtat_sanpham->setDbValue($rs->fields('tomtat_sanpham'));
		$this->noidung_sanpham->setDbValue($rs->fields('noidung_sanpham'));
		$this->loai_tien->setDbValue($rs->fields('loai_tien'));
		$this->donvi_tinh->setDbValue($rs->fields('donvi_tinh'));
		$this->gia_xuatcang->setDbValue($rs->fields('gia_xuatcang'));
		$this->phuongthuc_ttoan->setDbValue($rs->fields('phuongthuc_ttoan'));
		$this->thoihan_giaohang->setDbValue($rs->fields('thoihan_giaohang'));
		$this->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$this->tg_themsanpham->setDbValue($rs->fields('tg_themsanpham'));
		$this->tg_suasanpham->setDbValue($rs->fields('tg_suasanpham'));
		$this->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
		$this->xuatban->setDbValue($rs->fields('xuatban'));
		$this->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
		$this->xuat_su->setDbValue($rs->fields('xuat_su'));
		$this->comment_status->setDbValue($rs->fields('comment_status'));
		$this->don_gia->setDbValue($rs->fields('don_gia'));
		$this->thanhtoan_status->setDbValue($rs->fields('thanhtoan_status'));
		$this->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$this->khuyenmai_status->setDbValue($rs->fields('khuyenmai_status'));
		$this->km_date_begin->setDbValue($rs->fields('km_date_begin'));
		$this->km_date_end->setDbValue($rs->fields('km_date_end'));
		$this->anh_to->Upload->DbValue = $rs->fields('anh_to');
		$this->anh_nho->Upload->DbValue = $rs->fields('anh_nho');
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

		// tg_themsanpham
		$this->tg_themsanpham->ViewValue = $this->tg_themsanpham->CurrentValue;
		$this->tg_themsanpham->ViewValue = ew_FormatDateTime($this->tg_themsanpham->ViewValue, 7);
		$this->tg_themsanpham->CssStyle = "";
		$this->tg_themsanpham->CssClass = "";
		$this->tg_themsanpham->ViewCustomAttributes = "";

		// so_lanxem
		$this->so_lanxem->ViewValue = $this->so_lanxem->CurrentValue;
		$this->so_lanxem->CssStyle = "";
		$this->so_lanxem->CssClass = "";
		$this->so_lanxem->ViewCustomAttributes = "";

		// trang_thai
		if (strval($this->trang_thai->CurrentValue) <> "") {
			switch ($this->trang_thai->CurrentValue) {
				case "1":
					$this->trang_thai->ViewValue = "Chưa kích hoạt";
					break;
				case "2":
					$this->trang_thai->ViewValue = "Đã kích hoạt";
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
					$this->sanpham_tieubieu->ViewValue = "Không tiêu biểu";
					break;
				case "1":
					$this->sanpham_tieubieu->ViewValue = "Tiêu biểu";
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

		// don_gia
		$this->don_gia->ViewValue = $this->don_gia->CurrentValue;
		$this->don_gia->CssStyle = "";
		$this->don_gia->CssClass = "";
		$this->don_gia->ViewCustomAttributes = "";

		// soluong_tonkho
		$this->soluong_tonkho->ViewValue = $this->soluong_tonkho->CurrentValue;
		$this->soluong_tonkho->CssStyle = "";
		$this->soluong_tonkho->CssClass = "";
		$this->soluong_tonkho->ViewCustomAttributes = "";

		// khuyenmai_status
		if (strval($this->khuyenmai_status->CurrentValue) <> "") {
			switch ($this->khuyenmai_status->CurrentValue) {
				case "0":
					$this->khuyenmai_status->ViewValue = "Không khuyến mại";
					break;
				case "1":
					$this->khuyenmai_status->ViewValue = "Có khuyến mại";
					break;
				default:
					$this->khuyenmai_status->ViewValue = $this->khuyenmai_status->CurrentValue;
			}
		} else {
			$this->khuyenmai_status->ViewValue = NULL;
		}
		$this->khuyenmai_status->CssStyle = "";
		$this->khuyenmai_status->CssClass = "";
		$this->khuyenmai_status->ViewCustomAttributes = "";

		// anh_to
		if (!is_null($this->anh_to->Upload->DbValue)) {
			$this->anh_to->ViewValue = $this->anh_to->Upload->DbValue;
			$this->anh_to->ImageWidth = 300;
			$this->anh_to->ImageHeight = 0;
			$this->anh_to->ImageAlt = "";
		} else {
			$this->anh_to->ViewValue = "";
		}
		$this->anh_to->CssStyle = "";
		$this->anh_to->CssClass = "";
		$this->anh_to->ViewCustomAttributes = "";

		// ten_sanpham
		$this->ten_sanpham->HrefValue = "";

		// nganhnghe_id
		$this->nganhnghe_id->HrefValue = "";

		// tg_themsanpham
		$this->tg_themsanpham->HrefValue = "";

		// so_lanxem
		$this->so_lanxem->HrefValue = "";

		// trang_thai
		$this->trang_thai->HrefValue = "";

		// xuatban
		$this->xuatban->HrefValue = "";

		// sanpham_tieubieu
		$this->sanpham_tieubieu->HrefValue = "";

		// don_gia
		$this->don_gia->HrefValue = "";

		// soluong_tonkho
		$this->soluong_tonkho->HrefValue = "";

		// khuyenmai_status
		$this->khuyenmai_status->HrefValue = "";

		// anh_to
		$this->anh_to->HrefValue = "";

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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `products` WHERE " . $this->AddUserIDFilter("");

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
