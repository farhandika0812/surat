<!DOCTYPE html>
<html>
<head>
<title>Edit Surat Keluar</title>

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
    border-left:3px solid transparent;
}

.sidebar a:hover{
    background:#ffe5e5;
    color:#b71c1c;
}

/* ACTIVE */
.active{
    background:#ffe5e5;
    border-left:3px solid #e53935;
    color:#b71c1c !important;
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
        <h5>Edit Surat Keluar</h5>
        <hr>

        <form method="post" 
              action="<?= base_url('index.php/suratkeluar/update/'.$surat->id) ?>"
              enctype="multipart/form-data">

            <div class="mb-3">
                <label>No Surat</label>
                <input type="text" name="no_surat" value="<?= $surat->no_surat ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Asal Surat</label>
                <input type="text" name="asal_surat" value="<?= $surat->asal_surat ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Keluar</label>
                <input type="date" name="tgl_keluar" value="<?= $surat->tgl_keluar ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" value="<?= $surat->penerbit ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Perihal</label>
                <input type="text" name="perihal" value="<?= $surat->perihal ?>" class="form-control" required>
            </div>

            <!-- FILE BARU -->
            <div class="mb-3">
                <label>File Surat</label>
                <input type="file" name="file_surat" class="form-control">
            </div>

            <?php if($surat->file_surat): ?>
                <small>
                    File lama: 
                    <a href="<?= base_url('uploads/surat_keluar/'.$surat->file_surat) ?>" target="_blank">
                        Lihat File
                    </a>
                </small>
            <?php endif; ?>

            <br><br>

            <button class="btn btn-merah">Update</button>
            <a href="<?= base_url('index.php/suratkeluar') ?>" class="btn btn-secondary">Kembali</a>

        </form>
    </div>

</div>

</body>
</html>