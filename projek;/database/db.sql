


CREATE TABLE User (
  user_id       varchar(12) NOT NULL,
  user_username varchar(255) NOT NULL UNIQUE,
  user_email    varchar(200) NOT NULL UNIQUE,
  user_nama     varchar(255) NOT NULL,
  user_telepon  varchar(15) NOT NULL,
  user_password varchar(255) NOT NULL,
  user_saldo    int(15) NOT NULL,
  user_poin     int(10) DEFAULT 0 NOT NULL,
  user_status   int(1) NOT NULL,
  PRIMARY KEY (user_id)) CHARACTER SET UTF8;

CREATE TABLE Pegawai (
  pegawai_id       varchar(255) NOT NULL,
  pegawai_email    varchar(255) NOT NULL UNIQUE,
  pegawai_nama     varchar(255) NOT NULL,
  pegawai_telepon  varchar(15) NOT NULL,
  pegawai_password varchar(255) NOT NULL,
  pegawai_jasa     varchar(50) NOT NULL,
  pegawai_saldo    int(15) NOT NULL,
  pegawai_status   int(1) NOT NULL,
  PRIMARY KEY (pegawai_id)) CHARACTER SET UTF8;

CREATE TABLE Admin (
  admin_username varchar(200) NOT NULL,
  admin_nama     varchar(255) NOT NULL,
  admin_telepon  varchar(15) NOT NULL,
  admin_password varchar(255) NOT NULL,
  admin_status   int(1) NOT NULL,
  PRIMARY KEY (admin_username)) CHARACTER SET UTF8;

CREATE TABLE Chat (
  chat_id          varchar(255) NOT NULL,
  pegawai_id varchar(200) NOT NULL,
  user_id          varchar(12) NOT NULL,
  chat_isi         varchar(1000) NOT NULL,
  chat_tanggal     date NOT NULL,
  chat_sender      int(10) NOT NULL,
  PRIMARY KEY (chat_id)) CHARACTER SET UTF8;

CREATE TABLE Barang (
  barang_id     varchar(255) NOT NULL,
  barang_nama   varchar(255) NOT NULL,
  barang_harga  int(15) NOT NULL,
  barang_stok   int(10) NOT NULL,
  barang_status int(1) NOT NULL,
  PRIMARY KEY (barang_id)) CHARACTER SET UTF8;

CREATE TABLE Review (
  review_id        varchar(12) NOT NULL,
  user_id          varchar(12) NOT NULL,
  pegawai_id varchar(200) NOT NULL,
  review_isi       int(10) NOT NULL,
  review_rating    int(10),
  PRIMARY KEY (review_id)) CHARACTER SET UTF8;

CREATE TABLE Voucher (
  voucher_id          varchar(8) NOT NULL,
  voucher_nama        varchar(100) NOT NULL,
  voucher_harga       int(10) NOT NULL,
  voucher_potongan    int(12) NOT NULL,
  voucher_masaberlaku int(5) NOT NULL,
  voucher_status      int(1) NOT NULL,
  PRIMARY KEY (voucher_id)) CHARACTER SET UTF8;

CREATE TABLE Report (
  report_id      varchar(12) NOT NULL,
  user_username  varchar(12) NOT NULL,
  admin_username varchar(200) NOT NULL,
  report_isi     varchar(255) NOT NULL,
  PRIMARY KEY (report_id)) CHARACTER SET UTF8;

CREATE TABLE hTransSaldo (
  saldo_id      varchar(12) NOT NULL,
  user_id       varchar(12) NOT NULL,
  saldo_jenis   varchar(1) NOT NULL,
  saldo_jumlah  int(15) NOT NULL,
  saldo_tanggal date NOT NULL,
  saldo_status  int(1) NOT NULL,
  PRIMARY KEY (saldo_id)) CHARACTER SET UTF8;

CREATE TABLE hTransSewa (
  hSewa_id      varchar(12) NOT NULL,
  user_id       varchar(12) NOT NULL,
  hSewa_tanggal date NOT NULL,
  hSewa_total   int(15) NOT NULL,
  hSewa_status  int(1) NOT NULL,
  voucher_id    varchar(8) NOT NULL,
  PRIMARY KEY (hSewa_id)) CHARACTER SET UTF8;

CREATE TABLE dTransSewa (
  hSewa_id         varchar(12) NOT NULL,
  pegawai_id varchar(200) NOT NULL,
  dSewa_durasi     int(10) NOT NULL,
  dSewa_harga      int(15) NOT NULL) CHARACTER SET UTF8;

CREATE TABLE hTransBayar (
  hBayar_id        varchar(12) NOT NULL,
  hBayar_tanggal   date NOT NULL,
  hBayar_total     int(15) NOT NULL,
  hBayar_status    int(1) NOT NULL,
  pegawai_id varchar(200) NOT NULL,
  PRIMARY KEY (hBayar_id)) CHARACTER SET UTF8;

CREATE TABLE dTransBayar (
  hSewa_id     varchar(12) NOT NULL,
  hBayar_id    varchar(12) NOT NULL,
  dBayar_harga int(15) NOT NULL) CHARACTER SET UTF8;

CREATE TABLE hTransBarang (
  hBarang_id       varchar(255) NOT NULL,
  user_id          varchar(12) NOT NULL,
  pegawai_id varchar(200) NOT NULL,
  hBarang_tanggal  date NOT NULL,
  hBarang_total    int(10) NOT NULL,
  hBarang_status   int(1) NOT NULL,
  PRIMARY KEY (hBarang_id)) CHARACTER SET UTF8;

CREATE TABLE dTransBarang (
  hBarang_id    varchar(255) NOT NULL,
  barang_id     varchar(255) NOT NULL,
  barang_jumlah int(10) NOT NULL) CHARACTER SET UTF8;

CREATE TABLE hTransVoucher (
  hVoucher_id       varchar(10) NOT NULL,
  user_id           varchar(12) NOT NULL,
  hVoucher_tanggal  int(10) NOT NULL,
  hVoucher_total    int(10) NOT NULL,
  Useruser_username varchar(12) NOT NULL,
  PRIMARY KEY (hVoucher_id)) CHARACTER SET UTF8;

CREATE TABLE dTransVoucher (
  hVoucher_id    varchar(10) NOT NULL,
  voucher_id     varchar(8) NOT NULL,
  voucher_jumlah int(10) NOT NULL) CHARACTER SET UTF8;

CREATE TABLE Entity () CHARACTER SET UTF8;

ALTER TABLE Review ADD CONSTRAINT FKReview30117 FOREIGN KEY (pegawai_id) REFERENCES Pegawai (pegawai_id);
ALTER TABLE Report ADD CONSTRAINT FKReport665916 FOREIGN KEY (user_username) REFERENCES User (user_id);
ALTER TABLE Report ADD CONSTRAINT FKReport815594 FOREIGN KEY (admin_username) REFERENCES Admin (admin_username);
ALTER TABLE dTransSewa ADD CONSTRAINT FKdTransSewa32006 FOREIGN KEY (pegawai_id) REFERENCES Pegawai (pegawai_id);
ALTER TABLE dTransSewa ADD CONSTRAINT FKdTransSewa43042 FOREIGN KEY (hSewa_id) REFERENCES hTransSewa (hSewa_id);
ALTER TABLE hTransBarang ADD CONSTRAINT FKhTransBara883072 FOREIGN KEY (pegawai_id) REFERENCES Pegawai (pegawai_id);
ALTER TABLE dTransBarang ADD CONSTRAINT FKdTransBara641930 FOREIGN KEY (hBarang_id) REFERENCES hTransBarang (hBarang_id);
ALTER TABLE dTransBarang ADD CONSTRAINT FKdTransBara305428 FOREIGN KEY (barang_id) REFERENCES Barang (barang_id);
ALTER TABLE hTransSewa ADD CONSTRAINT FKhTransSewa855047 FOREIGN KEY (voucher_id) REFERENCES Voucher (voucher_id);
ALTER TABLE hTransVoucher ADD CONSTRAINT FKhTransVouc363100 FOREIGN KEY (user_id) REFERENCES User (user_id);
ALTER TABLE hTransSewa ADD CONSTRAINT FKhTransSewa96456 FOREIGN KEY (user_id) REFERENCES User (user_id);
ALTER TABLE hTransBarang ADD CONSTRAINT FKhTransBara190583 FOREIGN KEY (user_id) REFERENCES User (user_id);
ALTER TABLE Review ADD CONSTRAINT FKReview103773 FOREIGN KEY (user_id) REFERENCES User (user_id);
ALTER TABLE dTransVoucher ADD CONSTRAINT FKdTransVouc412725 FOREIGN KEY (hVoucher_id) REFERENCES hTransVoucher (hVoucher_id);
ALTER TABLE dTransVoucher ADD CONSTRAINT FKdTransVouc217710 FOREIGN KEY (voucher_id) REFERENCES Voucher (voucher_id);
ALTER TABLE Chat ADD CONSTRAINT FKChat552599 FOREIGN KEY (pegawai_id) REFERENCES Pegawai (pegawai_id);
ALTER TABLE Chat ADD CONSTRAINT FKChat521056 FOREIGN KEY (user_id) REFERENCES User (user_id);
ALTER TABLE hTransSaldo ADD CONSTRAINT FKhTransSald427190 FOREIGN KEY (user_id) REFERENCES User (user_id);
ALTER TABLE hTransBayar ADD CONSTRAINT FKhTransBaya158214 FOREIGN KEY (pegawai_id) REFERENCES Pegawai (pegawai_id);
ALTER TABLE dTransBayar ADD CONSTRAINT FKdTransBaya693854 FOREIGN KEY (hSewa_id) REFERENCES hTransSewa (hSewa_id);
ALTER TABLE dTransBayar ADD CONSTRAINT FKdTransBaya572505 FOREIGN KEY (hBayar_id) REFERENCES hTransBayar (hBayar_id);
