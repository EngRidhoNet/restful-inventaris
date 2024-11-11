# Nama Proyek: API Manajemen Inventaris Kantor

## Deskripsi

API Manajemen Inventaris Kantor adalah RESTful API yang dibangun menggunakan Laravel. API ini memungkinkan pengguna untuk mengelola data inventaris kantor seperti barang, kategori barang, peminjaman, dan data karyawan.

## Fitur Utama

- **Manajemen Barang**: CRUD data barang.
- **Manajemen Kategori**: CRUD data kategori barang.
- **Peminjaman Barang**: Kelola peminjaman barang oleh karyawan.
- **Manajemen Karyawan**: CRUD data karyawan.

## Teknologi yang Digunakan

- Laravel 11
- MySQL
- PHP 8.0+

## Instalasi

### Prasyarat

- PHP 8.0 atau lebih tinggi
- Composer
- MySQL atau database kompatibel lainnya

### Langkah Instalasi

1. **Clone Repository**
    ```bash
    git clone https://github.com/username/repository.git
    cd repository
    ```

2. **Install Dependencies**
    ```bash
    composer install
    ```

3. **Setup Environment File**
    ```bash
    cp .env.example .env
    ```
    Edit file `.env` untuk konfigurasi database dan pengaturan lainnya.

4. **Generate Key**
    ```bash
    php artisan key:generate
    ```

5. **Run Migration**
    ```bash
    php artisan migrate
    ```

6. **Start Server**
    ```bash
    php artisan serve
    ```

## Dokumentasi Endpoint

### Barang

#### GET /api/barang
- **Deskripsi**: Mendapatkan daftar semua barang.
- **Method**: GET
- **URL**: `http://localhost:8000/api/barang`
- **Contoh Respons**:
    ```json
    [
        {
            "id_barang": 1,
            "nama_barang": "Printer",
            "kategori_id": 1,
            "jumlah": 10,
            "kondisi": "Baru",
            "lokasi": "Gudang B"
        },
        ...
    ]
    ```

#### POST /api/barang
- **Deskripsi**: Menambah barang baru.
- **Method**: POST
- **URL**: `http://localhost:8000/api/barang`
- **Body Parameters**:
    - `nama_barang` (string) - Nama barang
    - `kategori_id` (integer) - ID kategori
    - `jumlah` (integer) - Jumlah barang
    - `kondisi` (string) - Kondisi barang
    - `lokasi` (string) - Lokasi barang
- **Contoh Body**:
    ```json
    {
        "nama_barang": "Printer",
        "kategori_id": 1,
        "jumlah": 10,
        "kondisi": "Baru",
        "lokasi": "Gudang B"
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_barang": 2,
        "nama_barang": "Printer",
        "kategori_id": 1,
        "jumlah": 10,
        "kondisi": "Baru",
        "lokasi": "Gudang B"
    }
    ```

#### GET /api/barang/{id}
- **Deskripsi**: Mendapatkan detail barang berdasarkan ID.
- **Method**: GET
- **URL**: `http://localhost:8000/api/barang/{id}`
- **Contoh Respons**:
    ```json
    {
        "id_barang": 1,
        "nama_barang": "Printer",
        "kategori_id": 1,
        "jumlah": 10,
        "kondisi": "Baru",
        "lokasi": "Gudang B"
    }
    ```

#### PUT /api/barang/{id}
- **Deskripsi**: Memperbarui detail barang.
- **Method**: PUT
- **URL**: `http://localhost:8000/api/barang/{id}`
- **Body Parameters**:
    - `nama_barang` (string) - Nama barang
    - `kategori_id` (integer) - ID kategori
    - `jumlah` (integer) - Jumlah barang
    - `kondisi` (string) - Kondisi barang
    - `lokasi` (string) - Lokasi barang
- **Contoh Body**:
    ```json
    {
        "nama_barang": "Printer",
        "kategori_id": 1,
        "jumlah": 15,
        "kondisi": "Bekas",
        "lokasi": "Gudang A"
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_barang": 1,
        "nama_barang": "Printer",
        "kategori_id": 1,
        "jumlah": 15,
        "kondisi": "Bekas",
        "lokasi": "Gudang A"
    }
    ```

#### DELETE /api/barang/{id}
- **Deskripsi**: Menghapus barang.
- **Method**: DELETE
- **URL**: `http://localhost:8000/api/barang/{id}`
- **Contoh Respons**:
    ```json
    {
        "message": "Barang berhasil dihapus"
    }
    ```

### Kategori

#### GET /api/kategori
- **Deskripsi**: Mendapatkan daftar semua kategori.
- **Method**: GET
- **URL**: `http://localhost:8000/api/kategori`
- **Contoh Respons**:
    ```json
    [
        {
            "id_kategori": 1,
            "nama_kategori": "Elektronik",
            "deskripsi": "Barang elektronik seperti laptop, komputer, dll."
        },
        ...
    ]
    ```

#### POST /api/kategori
- **Deskripsi**: Menambah kategori baru.
- **Method**: POST
- **URL**: `http://localhost:8000/api/kategori`
- **Body Parameters**:
    - `nama_kategori` (string) - Nama kategori
    - `deskripsi` (string) - Deskripsi kategori
- **Contoh Body**:
    ```json
    {
        "nama_kategori": "Perangkat Keras",
        "deskripsi": "Semua jenis perangkat keras komputer."
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_kategori": 2,
        "nama_kategori": "Perangkat Keras",
        "deskripsi": "Semua jenis perangkat keras komputer."
    }
    ```

#### GET /api/kategori/{id}
- **Deskripsi**: Mendapatkan detail kategori berdasarkan ID.
- **Method**: GET
- **URL**: `http://localhost:8000/api/kategori/{id}`
- **Contoh Respons**:
    ```json
    {
        "id_kategori": 1,
        "nama_kategori": "Elektronik",
        "deskripsi": "Barang elektronik seperti laptop, komputer, dll."
    }
    ```

#### PUT /api/kategori/{id}
- **Deskripsi**: Memperbarui detail kategori.
- **Method**: PUT
- **URL**: `http://localhost:8000/api/kategori/{id}`
- **Body Parameters**:
    - `nama_kategori` (string) - Nama kategori
    - `deskripsi` (string) - Deskripsi kategori
- **Contoh Body**:
    ```json
    {
        "nama_kategori": "Elektronik",
        "deskripsi": "Barang elektronik termasuk aksesoris."
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_kategori": 1,
        "nama_kategori": "Elektronik",
        "deskripsi": "Barang elektronik termasuk aksesoris."
    }
    ```

#### DELETE /api/kategori/{id}
- **Deskripsi**: Menghapus kategori.
- **Method**: DELETE
- **URL**: `http://localhost:8000/api/kategori/{id}`
- **Contoh Respons**:
    ```json
    {
        "message": "Kategori berhasil dihapus"
    }
    ```

### Peminjaman

#### GET /api/peminjaman
- **Deskripsi**: Mendapatkan daftar semua peminjaman.
- **Method**: GET
- **URL**: `http://localhost:8000/api/peminjaman`
- **Contoh Respons**:
    ```json
    [
        {
            "id_peminjaman": 1,
            "barang_id": 1,
            "karyawan_id": 2,
            "tanggal_pinjam": "2023-01-01",
            "tanggal_kembali": "2023-01-10",
            "status": "Dipinjam"
        },
        ...
    ]
    ```

#### POST /api/peminjaman
- **Deskripsi**: Menambah peminjaman baru.
- **Method**: POST
- **URL**: `http://localhost:8000/api/peminjaman`
- **Body Parameters**:
    - `barang_id` (integer) - ID barang yang dipinjam
    - `karyawan_id` (integer) - ID karyawan yang meminjam
    - `tanggal_pinjam` (date) - Tanggal peminjaman
    - `tanggal_kembali` (date) - Tanggal pengembalian (opsional)
    - `status` (string) - Status peminjaman (contoh: "Dipinjam" atau "Dikembalikan")
- **Contoh Body**:
    ```json
    {
        "barang_id": 1,
        "karyawan_id": 2,
        "tanggal_pinjam": "2023-01-01",
        "tanggal_kembali": "2023-01-10",
        "status": "Dipinjam"
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_peminjaman": 1,
        "barang_id": 1,
        "karyawan_id": 2,
        "tanggal_pinjam": "2023-01-01",
        "tanggal_kembali": "2023-01-10",
        "status": "Dipinjam"
    }
    ```

#### GET /api/peminjaman/{id}
- **Deskripsi**: Mendapatkan detail peminjaman berdasarkan ID.
- **Method**: GET
- **URL**: `http://localhost:8000/api/peminjaman/{id}`
- **Contoh Respons**:
    ```json
    {
        "id_peminjaman": 1,
        "barang_id": 1,
        "karyawan_id": 2,
        "tanggal_pinjam": "2023-01-01",
        "tanggal_kembali": "2023-01-10",
        "status": "Dipinjam"
    }
    ```

#### PUT /api/peminjaman/{id}
- **Deskripsi**: Memperbarui detail peminjaman.
- **Method**: PUT
- **URL**: `http://localhost:8000/api/peminjaman/{id}`
- **Body Parameters**:
    - `barang_id` (integer) - ID barang yang dipinjam
    - `karyawan_id` (integer) - ID karyawan yang meminjam
    - `tanggal_pinjam` (date) - Tanggal peminjaman
    - `tanggal_kembali` (date) - Tanggal pengembalian (opsional)
    - `status` (string) - Status peminjaman (contoh: "Dipinjam" atau "Dikembalikan")
- **Contoh Body**:
    ```json
    {
        "barang_id": 1,
        "karyawan_id": 2,
        "tanggal_pinjam": "2023-01-01",
        "tanggal_kembali": "2023-01-15",
        "status": "Dikembalikan"
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_peminjaman": 1,
        "barang_id": 1,
        "karyawan_id": 2,
        "tanggal_pinjam": "2023-01-01",
        "tanggal_kembali": "2023-01-15",
        "status": "Dikembalikan"
    }
    ```

#### DELETE /api/peminjaman/{id}
- **Deskripsi**: Menghapus data peminjaman.
- **Method**: DELETE
- **URL**: `http://localhost:8000/api/peminjaman/{id}`
- **Contoh Respons**:
    ```json
    {
        "message": "Peminjaman berhasil dihapus"
    }
    ```

### Karyawan

#### GET /api/karyawan
- **Deskripsi**: Mendapatkan daftar semua karyawan.
- **Method**: GET
- **URL**: `http://localhost:8000/api/karyawan`
- **Contoh Respons**:
    ```json
    [
        {
            "id_karyawan": 1,
            "nama": "Budi",
            "jabatan": "Staff IT",
            "departemen": "Teknologi Informasi",
            "kontak": "08123456789"
        },
        ...
    ]
    ```

#### POST /api/karyawan
- **Deskripsi**: Menambah data karyawan baru.
- **Method**: POST
- **URL**: `http://localhost:8000/api/karyawan`
- **Body Parameters**:
    - `nama` (string) - Nama karyawan
    - `jabatan` (string) - Jabatan karyawan
    - `departemen` (string) - Departemen karyawan
    - `kontak` (string) - Kontak karyawan
- **Contoh Body**:
    ```json
    {
        "nama": "Budi",
        "jabatan": "Staff IT",
        "departemen": "Teknologi Informasi",
        "kontak": "08123456789"
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_karyawan": 1,
        "nama": "Budi",
        "jabatan": "Staff IT",
        "departemen": "Teknologi Informasi",
        "kontak": "08123456789"
    }
    ```

#### GET /api/karyawan/{id}
- **Deskripsi**: Mendapatkan detail karyawan berdasarkan ID.
- **Method**: GET
- **URL**: `http://localhost:8000/api/karyawan/{id}`
- **Contoh Respons**:
    ```json
    {
        "id_karyawan": 1,
        "nama": "Budi",
        "jabatan": "Staff IT",
        "departemen": "Teknologi Informasi",
        "kontak": "08123456789"
    }
    ```

#### PUT /api/karyawan/{id}
- **Deskripsi**: Memperbarui detail karyawan.
- **Method**: PUT
- **URL**: `http://localhost:8000/api/karyawan/{id}`
- **Body Parameters**:
    - `nama` (string) - Nama karyawan
    - `jabatan` (string) - Jabatan karyawan
    - `departemen` (string) - Departemen karyawan
    - `kontak` (string) - Kontak karyawan
- **Contoh Body**:
    ```json
    {
        "nama": "Budi Santoso",
        "jabatan": "Manajer IT",
        "departemen": "Teknologi Informasi",
        "kontak": "08123456789"
    }
    ```
- **Contoh Respons**:
    ```json
    {
        "id_karyawan": 1,
        "nama": "Budi Santoso",
        "jabatan": "Manajer IT",
        "departemen": "Teknologi Informasi",
        "kontak": "08123456789"
    }
    ```

#### DELETE /api/karyawan/{id}
- **Deskripsi**: Menghapus data karyawan.
- **Method**: DELETE
- **URL**: `http://localhost:8000/api/karyawan/{id}`
- **Contoh Respons**:
    ```json
    {
        "message": "Karyawan berhasil dihapus"
    }
    ```

## Kontribusi

Kami menyambut baik kontribusi dari komunitas. Jika Anda ingin berkontribusi, silakan fork repository, buat perubahan Anda, dan kirimkan Pull Request.
