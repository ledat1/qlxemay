<?php
use App\User;
use App\Models\Loaisp;
use App\Models\Hoadon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/', 'HomeController@Logout')->name('logout');
Route::get('/home', function() {
    $sohoadon = Hoadon::where('Trangthai',0)->get();
    return view(
        'home',
        [

            'sohoadon' => $sohoadon

        ]
);
})->name('home')->middleware('auth');
Route::get('/thongke', 'Admin\ThongkeController@thongKe')->name('thongke')->middleware('auth');
Route::post('/thongke', 'Admin\ThongkeController@luuThongKe')->name('luuthongke')->middleware('auth');
Route::post('/thongke2', 'Admin\ThongkeController@thongKe2')->name('luuthongke2')->middleware('auth');
Route::get('/sanphambanchay', 'Admin\ThongkeController@sanPhamBanChay')->name('thongke')->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/laymatkhau', 'Admin\AdminController@layMatKhau');
    Route::get('/nhanvien/hoadon', 'Admin\AdminController@hoaDonNhanVien');
    Route::get('/nhanvien/hoadon/timkiem', 'Admin\AdminController@TimKiemHoaDonNhanVien')->name('timkiemHDNV');
    Route::get('xoa/{id}', 'Admin\AdminController@xoaHoaDon');
    Route::get('/sanphamncc/danhsach', 'Admin\AdminController@sanPhamNCC');
    Route::post('/doimatkhau', 'Admin\AdminController@doiMatKhau')->name('doimatkhau');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('/theloai/them', 'Admin\AdminTheLoai@them');
        Route::post('/theloai/them', 'Admin\AdminTheLoai@luu')->name('luuTheLoai');
        Route::get('/theloai/danhsach', 'Admin\AdminTheLoai@danhsach');
        Route::get('theloai/sua/{id}', 'Admin\AdminTheLoai@sua');
        Route::post('theloai/sua/{id}', 'Admin\AdminTheLoai@luuSua');
        Route::get('theloai/xoa/{id}', 'Admin\AdminTheLoai@xoa');
        Route::get('/theloai/timkiem', 'Admin\AdminTheLoai@timkiem')->name('timkiemTheLoai');
    });

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/nhacungcap/them', 'Admin\AdminNCC@them');
    Route::post('/nhacungcap/them', 'Admin\AdminNCC@luu')->name('luuNCC');
    Route::get('/nhacungcap/danhsach', 'Admin\AdminNCC@danhsach');
    Route::get('nhacungcap/sua/{id}', 'Admin\AdminNCC@sua');
    Route::post('nhacungcap/sua/{id}', 'Admin\AdminNCC@luuSua');
    Route::get('/nhacungcap/xoa/{id}', 'Admin\AdminNCC@xoa');
    Route::get('/nhacungcap/timkiem', 'Admin\AdminNCC@timkiem')->name('timKiemNCC');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/sanpham/them', 'Admin\AdminSanpham@them');
    Route::post('/sanpham/them', 'Admin\AdminSanpham@luu')->name('luuSanpham');
    Route::get('/sanpham/danhsach', 'Admin\AdminSanpham@danhsach');
    Route::get('sanpham/sua/{id}', 'Admin\AdminSanpham@sua');
    Route::post('sanpham/sua/{id}', 'Admin\AdminSanpham@luuSua');
    Route::get('sanpham/xoa/{id}', 'Admin\AdminSanpham@xoa');
    Route::get('/sanpham/timkiem', 'Admin\AdminSanpham@timkiem')->name('timkiemSanPham');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/baohanh/them', 'Admin\AdminBaoHanh@them');
    Route::post('/baohanh/them', 'Admin\AdminBaoHanh@luu')->name('luuBaohanh');
    Route::get('/baohanh/danhsach', 'Admin\AdminBaoHanh@danhsach')->name('dsachBaohanh');;
    Route::get('baohanh/sua/{id}', 'Admin\AdminBaoHanh@sua');
    Route::post('baohanh/sua/{id}', 'Admin\AdminBaoHanh@luuSua');
    Route::get('/baohanh/xoa/{id}', 'Admin\AdminBaoHanh@xoa');
    Route::get('/baohanh/timkiem', 'Admin\AdminBaoHanh@timkiem')->name('timKiemBaohanh');
    Route::get('/baohanh/timkiem2', 'Admin\AdminBaoHanh@timkiem2')->name('timKiemBaohanh2');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/nhapkho/them', 'Admin\AdminNhapKho@them');
    Route::post('/nhapkho/them', 'Admin\AdminNhapKho@luu')->name('luuNhapKho');
    Route::get('/nhapkho/danhsach', 'Admin\AdminNhapKho@danhsach')->name('dsachNhapKho');;
    Route::get('nhapkho/sua/{id}', 'Admin\AdminNhapKho@sua');
    Route::post('nhapkho/sua/{id}', 'Admin\AdminNhapKho@luuSua');
    Route::get('/nhapkho/xoa/{id}', 'Admin\AdminNhapKho@xoa');
    Route::get('/nhapkho/timkiem', 'Admin\AdminNhapKho@timkiem')->name('timKiemNhapKho');
    Route::get('/nhapkho/timkiem2', 'Admin\AdminNhapKho@timkiem2')->name('timKiemNhapKho2');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/xuatkho/them', 'Admin\AdminXuatKho@them');
    Route::post('/xuatkho/them', 'Admin\AdminXuatKho@luu')->name('luuNhapkho');
    Route::post('xuatkho/sua/{id}', 'Admin\AdminXuatKho@sua');
    Route::post('xuatkho/sua/{id}', 'Admin\AdminXuatKho@luuSua');
    Route::get('/xuatkho/xoa/{id}', 'Admin\AdminXuatKho@xoa');
    Route::get('/xuatkho/danhsach', 'Admin\AdminXuatKho@danhsach');
    Route::get('/xuatkho/timkiem', 'Admin\AdminXuatKho@timkiem')->name('timXuatkho');
    Route::get('/xuatkho/timkiem2', 'Admin\AdminXuatKho@timkiem2')->name('timXuatkho2');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/nhanvien/them', 'Admin\AdminNhanVien@them');
    Route::post('/nhanvien/them', 'Admin\AdminNhanVien@luu')->name('luuNhanVien');
    Route::get('nhanvien/sua/{id}', 'Admin\AdminNhanVien@sua');
    Route::post('nhanvien/sua/{id}', 'Admin\AdminNhanVien@luuSua');
    Route::get('/nhanvien/xoa/{id}', 'Admin\AdminNhanVien@xoa');
    Route::get('/nhanvien/danhsach', 'Admin\AdminNhanVien@danhsach');
    Route::get('/nhanvien/timkiem', 'Admin\AdminNhanVien@timkiem')->name('timNhanVien');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('hoadon/xem/{id}', 'Admin\AdminHoaDon@xemHoaDon');
    Route::get('/hoadon/xoa/{id}', 'Admin\AdminHoaDon@xoa');
    Route::get('/hoadon/trangthai/{id}', 'Admin\AdminHoaDon@trangthai');
    Route::get('/hoadon/danhsach', 'Admin\AdminHoaDon@danhsach');
    Route::get('/hoadon/timkiem', 'Admin\AdminHoaDon@timkiem')->name('timHoaDon');
    Route::get('/hoadon/timkiem2', 'Admin\AdminHoaDon@timkiem2')->name('timHoaDon2');
    Route::get('/khachhang/danhsach', 'Admin\AdminHoaDon@danhSachKhachHang');
    Route::get('/khachhang/danhsach2', 'Admin\AdminHoaDon@danhSachKhachHang2');
    Route::get('/khachhang/timkiem', 'Admin\AdminHoaDon@timKiemKhachHang')->name('timKiemKhachHang');
});
Route::get('/trangchu', 'Page\pagesController@trangchu')->name('trangchu');
Route::get('/timkiemsp', 'Page\pagesController@timKiemSp')->name('timKiemSp');
Route::get('/the-loai/{id}/{Tenloaisanpham}.html', 'Page\pagesController@laySanPham')->name('sanPham');
Route::get('/san-pham/{id}/{Tensanpham}.html', 'Page\pagesController@chiTietSanPham');
Route::post('/add-cart', 'Page\cartController@addCart')->name('add_cart');
Route::get('/show-cart', 'Page\cartController@showCart')->name('show_cart');
Route::get('/delete-cart/{rowId}', 'Page\cartController@deleteCart');

Route::post('/add-cart-ajax','Page\cartController@add_cart_ajax');
Route::post('/update-cart-ajax','Page\cartController@update_cart_ajax')->name('sua_giohang');
Route::get('/gio-hang','Page\cartController@gio_hang')->name('giohang'); 
Route::get('/delete-sp/{session_id}', 'Page\cartController@deleteSp');
Route::get('/dat-hang.html', 'Page\cartController@datHang')->name('datHang');
Route::post('/dat-hang.html', 'Page\cartController@luuDatHang')->name('luuDatHang');
Route::get('/export_excel', 'Admin\ExportExcelController@excel')->name('export_excel');



