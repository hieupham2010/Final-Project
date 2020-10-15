create database ex2_midterm

--4a
create table NSX
(
	TenNSX nvarchar(50) primary key,
	DiaChi nvarchar(100),
	QuocTich nvarchar(10),
)

create table BaiHat
(
	MaBaiHat int primary key,
	TenBaiHat nvarchar(50),
	TenCaSi nvarchar(50),
	TenNhacSi nvarchar(50)
)

create table CD_Nhac
(
	ID_DiaNhac int primary key,
	TenDiaNhac nvarchar(50),
	albun nvarchar(50),
	DonGia int,
	TenNSX nvarchar(50),
	foreign key (TenNSX) references NSX(TenNSX)
)
create table QuanLyNhac
(
	ID_DiaNhac int not null,
	MaBaiHat int not null,
	primary key (ID_DiaNhac,MaBaiHat),
	foreign key (ID_DiaNhac) references CD_Nhac(ID_DiaNhac),
	foreign key(MaBaiHat) references BaiHat(MaBaiHat)
)


Create table TheLoai
(
	MaPhim int primary key,
	TenTheLoai nvarchar(20)
)
Create table Phim
(
	ID_Phim int primary key,
	TenPhim nvarchar(50),
	TenNSX nvarchar(50),
	TenNVC nvarchar(50),
	[Year] int,
	foreign key (ID_Phim) references TheLoai(MaPhim)
)

create table CD_Phim
(
	ID_DiaPhim int primary key,
	MaPhim int,
	TenDiaPhim nvarchar(50),
	Album nvarchar(50),
	DonGia int,
	TenNSX nvarchar(50),
	foreign key (TenNSX) references NSX(TenNSX),
	foreign key(MaPhim) references Phim(ID_Phim)
)

create table KhachHang
(	TenKhachHang nvarchar(20) primary key,
	CMND int,
	Diachi nvarchar(100),
	GioiTinh nvarchar(10),
	
)
create table HoaDon
(
	MaHoaDon int primary key,
	NgayLap date,
	TenKhachHang nvarchar(20),
	CD_Nhac  nvarchar(50),
	CD_Phim nvarchar(50),
	DonGia int
	foreign key(TenKhachHang) references KhachHang(TenKhachHang)
)
drop table HoaDon
select * from NSX
insert into NSX values (N'Nhà Xuất Bản Hà Nội',N'Số 61 Lý Thái Tổ, Phường Tràng Tiền, Quận Hoàn Kiếm, Hà Nội' ,N'Việt Nam')
insert into NSX values (N'Nhà Xuất Bản TPHCM',N'7 Nguyễn Thị Minh Khai, P. Bến Nghé, Q. 1, Tp. Hồ Chí Minh (TPHCM)' ,N'Việt Nam')

select * from BaiHat
insert into BaiHat values (3214,N'La La La', N'Đặng Thọ Duy', N'Đặng Huy')
insert into BaiHat values (3215,N'Le Le Le', N'Đặng Thọ Duy', N'Đặng Huy')
insert into BaiHat values (3216,N'Âm Thầm Bên Em', N'Sơn Tùng MTP', N'Sơn Tùng MTP')
insert into BaiHat values (3217,N'Sao Anh Chưa Về Nhà', N'Amee & RichkyStar', N'Nhu Dang')
insert into BaiHat values (3218,N'Tình Sầu Thiên Thu Muôn Lối', N'Doãn Hiếu', N'Doãn Hiếu')
insert into BaiHat values (3219,N'Yêu Anh', N'Uyên Pím ft Boo', N'Cover')
insert into BaiHat values (3220,N'2 5', N'Táo x Masew Mix', N'Táo')
insert into BaiHat values (3221,N'Couting', N'Heakim', N'HeaKim')
insert into BaiHat values (3222,N'Aqua', N'Heakim', N'Heakim')
insert into BaiHat values (3223,N'DaiLy', N'Rival & Cadmium', N'Rival & Cadmium')


select * from CD_Nhac

insert into CD_Nhac values (5120,N'UnknowMix',N'NhacCuaDuy',2000,N'Nhà Xuất Bản Hà Nội')
insert into CD_Nhac values (5121,N'NhacBuon',N'NhacCuaDuy',5000,N'Nhà Xuất Bản Hà Nội')
insert into CD_Nhac values (5122,N'NhacVui',N'NhacCuaDuy',5000,N'Nhà Xuất Bản TPHCM')
insert into CD_Nhac values (5123,N'EDM',N'NhacCuaDuy',10000,N'Nhà Xuất Bản Hà Nội')
insert into CD_Nhac values (5124,N'Anime',N'NhacCuaDuy',200000,N'Nhà Xuất Bản TPHCM')
--unknow_Mix
select * from QuanLyNhac
insert into QuanLyNhac  values (5120,3214)
insert into QuanLyNhac  values (5120,3215)
insert into QuanLyNhac  values (5120,3216)
insert into QuanLyNhac  values (5120,3217)
insert into QuanLyNhac  values (5120,3218)
insert into QuanLyNhac  values (5120,3219)
--nhacbuon
insert into QuanLyNhac  values (5121,3220)
insert into QuanLyNhac  values (5121,3218)

--NhacVui
insert into QuanLyNhac  values (5122,3217)
insert into QuanLyNhac  values (5122,3219)
insert into QuanLyNhac  values (5122,3221)
insert into QuanLyNhac  values (5122,3222)
insert into QuanLyNhac  values (5122,3223)

--EDM
insert into QuanLyNhac  values (5123,3221)
insert into QuanLyNhac  values (5123,3222)
insert into QuanLyNhac  values (5123,3223)

--Anime
insert into QuanLyNhac  values (5124,3221)
insert into QuanLyNhac  values (5124,3222)


select * from TheLoai
insert into TheLoai values(1001,N'Hành Động')
insert into TheLoai values(1002,N'Trinh Thám')
insert into TheLoai values(1003,N'Tâm Lý')
insert into TheLoai values(1004,N'Lãng Mạng')
insert into TheLoai values(1005,N'Siêu Nhiên')

select * from Phim 

insert into Phim values (1001,N'The Karate Kid',N'Harald Zwart',N'Jaden Smith',2010)
insert into Phim values (1002,N'Trấn hồn',N'Châu Viễn Đan,',N'Bạch Vũ - Chu Nhất Long',2018)
insert into Phim values (1003,N'Freind(2001 Film)',N'Kwak Kyung-taek',N'Yu Oh-seong',2001)
insert into Phim values (1004,N'Thiên Thần Biết Yêu',N'Sung Joon-hae &
Lee Eun-mi',N'Kim Sae-ron',2015)
insert into Phim values (1005,N'Supernatural',N' Eric Kripke',N'Jared Padalecki',2005)
--update column album datatype
alter table CD_PHim
ALTER COLUMN Album nvarchar(50)
--

select * from CD_Phim

insert into CD_Phim values (4001,1001,N'Phim Hành Động',N'PhimHay2019',10000,N'Nhà Xuất Bản Hà Nội')
insert into CD_Phim values (4002,1002,N'Tuyển Tập Trinh Thám',N'PhimDacBiet',15000,N'Nhà Xuất Bản TPHCM')
insert into CD_Phim values (4003,1003,N'Phim Tâm Lý Hành Động',N'PhimBatHu',15000,N'Nhà Xuất Bản TPHCM')
insert into CD_Phim values (4004,1004,N'Lãng Mạng Hay',N'Tình Cảm',20000,N'Nhà Xuất Bản Hà Nội')
insert into CD_Phim values (4005,1005,N'Phim Khoa Học Viễn Tưởng',N'Khoa Học Viễn Tưởng',20000,N'Nhà Xuất Bản Hà Nội')


select * from KhachHang
insert into KhachHang values (N'Đặng Thọ Duy',27241232,'TPHCM',N'Nam')
insert into KhachHang values (N'Phạm Minh Hiếu',27223232,'TPHCM',N'Nam')
insert into KhachHang values (N'Võ Thành Phương',27241531,'TPHCM',N'Nam')
insert into KhachHang values (N'Hà Quán Quân',27241798,'TPHCM',N'Nam')

select * from HoaDon
insert into HoaDon values (90001,'3/22/2020',N'Đặng Thọ Duy','Không',N'PHim Hành Động',10000)
insert into HoaDon values (90002,'5/12/2019',N'Phạm Minh Hiếu','Anime','Không',200000)
insert into HoaDon values (90003,'3/22/2020',N'Võ Thành Phương','Không',N'Lãng Mạng Hay',20000)
insert into HoaDon values (90004,'3/22/2020',N'Hà Quán Quân','Không',N'Phim Tâm Lý Hành Động',15000)

select * from BaiHat
--4d

--lay ten bai hat biet ten ca si
Select TenBaiHat from BaiHat
where TenCaSi = N'Uyên Pím ft Boo'


-- tim kiem dia nhac ma khach hang bao loi
select Distinct CD_Nhac.TenDiaNhac from CD_Nhac
where CD_Nhac.ID_DiaNhac = 5120


--kiem tra khach hang co hoa don > 10000 de khuyen mai
select KhachHang.TenKhachHang from KhachHang,[dbo].[HoaDon]
where HoaDon.DonGia >10000 and HoaDon.TenKhachHang = KhachHang.TenKhachHang


--Khuyen mai dac biet khach hang co don gia >50000
SELECT Hoadon.TenKhachHang
FROM HoaDon
GROUP BY Hoadon.TenKhachHang
HAVING MIN (HoaDon.Dongia) >= 50000 

--tim ten nhung dia phim co chua ma phim 1001
SELECT CD_Phim.TenDiaPhim
FROM CD_Phim
WHERE CD_Phim.MaPhim IN 
     (SELECT Phim.ID_Phim
     FROM Phim
     WHERE Phim.ID_Phim = 1001)

--4e
CREATE PROCEDURE HienThiPhim
AS
SELECT * FROM Phim
GO

Exec HienThiPhim

create function GiaHoaDon(@DonGia int)
returns int
as 
begin
	declare @GiaTien int
	select @GiaTien = DonGia from HoaDon
	return @GiaTien
end


CREATE TRIGGER addPhim ON Phim
FOR Insert
AS 
  insert into Phim select * from inserted
