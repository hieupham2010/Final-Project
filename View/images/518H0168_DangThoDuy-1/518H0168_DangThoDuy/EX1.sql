CREATE DATABASE QLCHVL


--1
CREATE TABLE LVT
(
	MaLoai int primary key,
	TenLoai nvarchar(50),
)

CREATE TABLE VT
(
	MaHang int ,
	TenHang nvarchar(50),
	DVT nvarchar(10),
	SoLuong int,
	DonGia int,
	MaLoai int,
	constraint PK primary key(MaHang,MaLoai),
	constraint FK_VT foreign key (MaLoai) references LVT(MaLoai),
	check(SoLuong >0),
	check(DVT = N'Thùng' or DVT = N'Bịch' or DVT = N'Khối' or DVT = N'Cái')
)
create table khachhang
(
	MaSoKhachHang int primary key,
	tenKhachHang nvarchar(20),
	dienThoai int

)

create table HoaDon
(
	SoHD int primary key,
	ngayLap date,
	MaSoKhachHang int,
)
create table CTHD
(
	SoHD int not null,
	MaHang int not null,
	SoLuong int ,
	DonGia int,
	MaLoai int not null,
	check(SoLuong > 0)
)
--2

alter table CTHD
add constraint PK_11 primary key(MaHang,MaLoai,SoHD)
alter table CTHD
add	constraint fk_2 foreign key (MaHang,MaLoai) references VT(MaHang,MaLoai)
alter table CTHD
add constraint FK_SoHD foreign key (SoHD) references HoaDon(SoHD)
alter table CTHD
add constraint FK_DonGia foreign key (DonGia) references HoaDon(SoHD)



---3
--a
insert into LVT values(1,N'Cát')
insert into LVT values(2,N'Đá')
insert into LVT values(3,N'Xi Măng')
insert into LVT values(4,N'Gạch')
insert into LVT values(5,N'Thép')
insert into LVT values(6,N'Bê Tông')
insert into LVT values(7,N'Bê Tông')

select * from VT
insert into VT values (001,N'Cát Xây Dựng', N'Khối', 100,300000,1)
insert into VT values (002,N'Đá Mi Sàng', N'Khối', 20,100000,2)
insert into VT values (003,N'Xi Măng Hà Tiên', N'Bịch', 500,530000,3)
insert into VT values (004,N'Gạch', N'Cái', 50000,2000,4)
insert into VT values (005,N'Thép', N'Cái', 3000,350000,5)
insert into VT values (006,N'Bê Tông', N'Thùng', 50,1000000,6)
insert into VT values (007,N'bê tông', N'Thùng', 50,1000000,7)

select * from khachhang
insert into khachhang values (001,N'Đặng Thọ Duy', 0373850884)
insert into khachhang values (002,N'Nguyễn Văn A', 0373812344)
insert into khachhang values (003,N'Lê Thị B', 0432150568)
insert into khachhang values (004,N'Đào Thị C', 0373456712)
insert into khachhang values (005,N'Huỳnh Văn Á', 0371234523)

select * from HoaDon
insert into HoaDon values (001,'12/3/2019', 1)
insert into HoaDon values (006,'12/5/2019', 1)
insert into HoaDon values (002,'8/5/2019', 2)
insert into HoaDon values (003,'7/3/2019', 3)
insert into HoaDon values (004,'1/1/2020', 1)
insert into HoaDon values (005,'2/14/2020', 2)

select * from CTHD
insert into CTHD values (001,1,2,600000,1)
insert into CTHD values (002,1,3,900000,1)
insert into CTHD values (003,2,4,400000,2)
insert into CTHD values (004,3,20,10600000,3)
insert into CTHD values (005,4,2000,4000000,4)
insert into CTHD values (006,4,3000,6000000,4)
insert into CTHD values (007,1,15,9000000,1)
insert into CTHD values (008,5,9,3150000,5)
insert into CTHD values (009,3,5,2650000,3)
insert into CTHD values (010,2,7,700000,2)
--4a

select TenHang,Soluong from VT where SoLuong >10 and DVT = N'Thùng'
Group By TenHang,SoLuong
--4b

select KhachHang.tenKhachHang
from khachhang,HoaDon
where HoaDon.MaSoKhachHang = khachhang.MaSoKhachHang
group by khachhang.tenKhachHang
having count(HoaDon.MaSoKhachHang) > 1

--4c

select KhachHang.tenKhachHang,Max(khachhang.MaSoKhachHang) As "Tong So Lan Mua Hang"
from khachhang
where MasokhachHang in
(
	select Count(HoaDon.MaSoKhachHang) As "So Lan Mua Hang"
	from HoaDon,khachhang
	where HoaDon.MaSoKhachHang = khachhang.MaSoKhachHang
	group by HoaDon.MaSoKhachHang
)
group by khachhang.tenKhachHang,khachhang.MaSoKhachHang

--4d
select CTHD.SoHD,dongia As "Tong Gia Tri Lon Nhat "
from CTHD
where
 DonGia in
(
	Select max(dongia) from CTHD
)
group by SoHD, DonGia

--5a:

CREATE FUNCTION cau5a()
RETURNS TABLE RETURN
	SELECT MaHang,UPPER(LEFT(VT.TenHang,1))+LOWER(SUBSTRING(VT.TenHang,2,LEN(VT.TenHang)))
	As TEnHang,DVT,SoLuong,DonGia,MaLoai
	FROM [VT]
--check before
select  * from vt
--after
select * from A()

--b. Hiển thị những khách hàng đã giao dịch trên 10 lần.
create function cau5b()
returns table return
	select khachhang.MaSoKhachHang,Khachhang.tenKhachHang,khachhang.dienThoai
	from hoadon,  khachhang
	group by khachhang.tenKhachHang,Khachhang.dienThoai,hoadon.masokhachhang
	having count(hoadon.masokhachhang)>10
select * from b()



--ex6a:
create proc cau6a(
	@mahang int,
	@tenhang nvarchar(20),
	@donvitinh nvarchar(10),
	@soluong int,
	@dongia int,
	@maloai int
)
	as
	begin
	if not exists (select @mahang from vt where @mahang = mahang)
		if(@soluong > 0 and @dongia > 0)
			insert into vt
			values(@mahang,@tenhang,@donvitinh,@soluong,@dongia,@maloai)
	else print 'ERROR'
	end
--b
create proc cau6b(
	@sohoadon int,
	@ngaylap date,
	@masokhachhang int
)
	as
	begin
	if not exists (select @sohoadon , @masokhachhang from hoadon where @sohoadon = SoHD and @masokhachhang = masokhachhang)
		insert into hoadon
		values (@sohoadon , @ngaylap , @masokhachhang)
	else print 'ERROR'
	END
--ex7:
--a
create trigger cau7a
on khachhang
for insert
as
begin
	if (exists (select dienthoai from khachhang))
	begin
		print 'Số điện thoại này đã tồn tại!'
		rollback tran
	end
end
--b
create trigger cau7b
on khachhang
for insert
as
declare @masokhachhang int
begin
	if exists (select * from masokhachhang where masokhachhang = @masokhachhang)
		begin
		raiserror(N'Mã đã tồn tại!',16,1)
		rollback tran
		return
		end
end
