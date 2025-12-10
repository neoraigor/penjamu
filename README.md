# Penjamu - Sistem Informasi Penjaminan Mutu

Sistem Informasi Penjaminan Mutu untuk mendukung pelaksanaan Audit Mutu Internal (AMI) yang terintegrasi dengan Sistem Informasi Akademik (SIAKAD).

## Fitur

### SIAKAD (Sistem Informasi Akademik)
- **Program Studi**: Kelola data program studi dengan informasi kode, nama, dan jenjang
- **Dosen**: Data dosen terkait dengan program studi
- **Mata Kuliah**: Informasi mata kuliah per program studi

### AMI (Audit Mutu Internal)
- **Jadwal Audit**: Penjadwalan audit mutu internal untuk setiap program studi
- **Temuan Audit**: Dokumentasi temuan dari hasil audit dengan tingkat severity
- **Dokumen Audit**: Penyimpanan dokumen-dokumen terkait audit
- **Dashboard**: Ringkasan statistik dan audit terbaru

## Teknologi

- Laravel 12
- PHP 8.3
- SQLite Database
- Blade Templates
- CSS (embedded)

## Instalasi

1. Clone repository:
```bash
git clone https://github.com/neoraigor/penjamu.git
cd penjamu
```

2. Install dependencies:
```bash
composer install
```

3. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Jalankan migrasi dan seeder:
```bash
php artisan migrate
php artisan db:seed
```

5. Jalankan aplikasi:
```bash
php artisan serve
```

6. Buka browser dan akses: `http://localhost:8000`

## Struktur Database

### SIAKAD Tables
- `programs`: Data program studi
- `lecturers`: Data dosen
- `courses`: Data mata kuliah

### AMI Tables
- `audit_schedules`: Jadwal pelaksanaan audit
- `audit_findings`: Temuan dari hasil audit
- `audit_documents`: Dokumen pendukung audit

## User Default

Setelah menjalankan seeder, terdapat 2 user auditor:
- Email: ahmad@example.com
- Email: siti@example.com

Password default: `password`

## Cara Penggunaan

1. **Lihat Dashboard**: Akses halaman utama untuk melihat ringkasan data
2. **Kelola Program Studi**: Tambah, edit, atau hapus data program studi dari menu SIAKAD
3. **Kelola Jadwal Audit**: Buat jadwal audit baru dan tentukan auditor serta program studi yang diaudit
4. **Lihat Detail Audit**: Klik detail pada jadwal audit untuk melihat temuan dan dokumen

## Pengembangan

Aplikasi ini dibuat dengan prinsip:
- **Sederhana**: Interface yang mudah dipahami
- **Clean Code**: Struktur kode yang rapi dan terorganisir
- **Terintegrasi**: SIAKAD dan AMI dalam satu sistem
- **Minimal**: Fitur yang fokus pada kebutuhan dasar AMI

## Lisensi

MIT License
