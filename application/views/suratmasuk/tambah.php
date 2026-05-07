<!DOCTYPE html>
<html>
<head>
<title>Tambah Surat Masuk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background:#f4f6fa;
}

/* TOPBAR */
.topbar{
    height:55px;
    background: linear-gradient(135deg,#b71c1c,#e53935);
    color:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 20px;
}

/* SIDEBAR */
.sidebar{
    width:220px;
    background:#ffffff;
    height:100vh;
    position:fixed;
    top:55px;
    left:0;
    border-right:1px solid #f0caca;
    padding-top:15px;
}

.sidebar h6{
    padding:10px 20px;
    font-size:12px;
    color:#b71c1c;
    font-weight:bold;
}

.sidebar a{
    display:block;
    padding:10px 20px;
    color:#333;
    text-decoration:none;
}

.sidebar a:hover{
    background:#ffe5e5;
    color:#b71c1c;
}

/* CONTENT */
.content{
    margin-left:220px;
    padding:25px;
}

/* CARD */
.card-box{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

/* BUTTON */
.btn-merah{
    background:#d32f2f;
    color:white;
}
.btn-merah:hover{
    background:#b71c1c;
}
</style>

</head>
<body>

<div class="topbar">
    <div><b>Sistem Surat</b></div>
    <div><?= $this->session->userdata('nama'); ?></div>
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <h6>MAIN MENU</h6>
    <a href="<?= base_url('index.php/dashboard') ?>">🏠 Beranda</a>

    <h6>MENU SURAT</h6>
    <a class="active" href="#">📄 Surat Masuk</a>
    <a href="<?= base_url('index.php/suratkeluar') ?>">📤 Surat Keluar</a>

    <h6>LAPORAN</h6>
    <a href="<?= base_url('index.php/laporan/suratmasuk') ?>">📊 Laporan Masuk</a>
    <a href="<?= base_url('index.php/laporan/suratkeluar') ?>">📈 Laporan Keluar</a>

    <?php if($this->session->userdata('level') == 1): ?>
    <h6>USER</h6>
    <a href="<?= base_url('index.php/user') ?>">👤 Manajemen User</a>
    <?php endif; ?>

</div>

<div class="content">

    <div class="card-box">
        <h5>Tambah Surat Masuk</h5>
        <hr>

        <form method="post" action="<?= base_url('index.php/suratmasuk/simpan') ?>" enctype="multipart/form-data">

    <div class="mb-3">
        <label>No Surat</label>
        <input type="text" name="no_surat" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Asal Surat</label>
        <input type="text" name="asal_surat" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tgl_masuk" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Penerima</label>
        <input type="text" name="penerima" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Perihal</label>
        <input type="text" name="perihal" class="form-control" required>
    </div>

    <!-- 🔥 TAMBAHAN FILE SURAT -->
    <div class="mb-3">
        <label>File Surat (PDF/DOC/DOCX/JPG/PNG)</label>
        <input type="file" name="file_surat" class="form-control">
        <small class="text-muted">Upload dokumen surat jika ada</small>
    </div>

    <button class="btn btn-merah">Simpan</button>
    <a href="<?= base_url('index.php/suratmasuk') ?>" class="btn btn-secondary">Kembali</a>

</form>

    </div>

</div>

</body>
</html>