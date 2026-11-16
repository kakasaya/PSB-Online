-- 1. Tabel Users (Akun login Guru & Siswa)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('guru', 'siswa') NOT NULL DEFAULT 'siswa',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabel Pendaftaran (Biodata + File Berkas dijadikan Kolom Sendiri)
CREATE TABLE pendaftaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    no_pendaftaran VARCHAR(20) UNIQUE NOT NULL,
    nisn VARCHAR(10),
    nik VARCHAR(16),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    jenis_kelamin ENUM('L', 'P'),
    alamat TEXT,
    nama_ayah VARCHAR(100),
    nama_ibu VARCHAR(100),
    no_hp_ortu VARCHAR(15),
    
    -- BERKAS DIPISAH MENJADI KOLOM SENDIRI
    file_kk VARCHAR(255) DEFAULT NULL,
    file_akta VARCHAR(255) DEFAULT NULL,
    file_ijazah VARCHAR(255) DEFAULT NULL,
    file_foto VARCHAR(255) DEFAULT NULL,

    -- STATUS & SELEKSI
    status_berkas ENUM('pending', 'revisi', 'diterima') DEFAULT 'pending',
    catatan_revisi TEXT,
    nilai_tes INT DEFAULT 0,
    status_kelulusan ENUM('pending', 'lulus', 'tidak_lulus') DEFAULT 'pending',
    
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
