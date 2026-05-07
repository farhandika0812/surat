<!DOCTYPE html>
<html>
<head>
<title>Laporan Surat Keluar</title>

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
    border-left:3px solid #e53935;
}

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
    padding:20px;
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

/* TABLE */
.table thead{
    background:#b71c1c;
    color:white;
}

.table tbody tr:hover{
    background:#fff0f0;
}
</style>

</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
    <div><b>Sistem Surat</b></div>
    <div>
        <?= $this->session->userdata('nama'); ?> |
        <a href="<?= base_url('index.php/auth/logout') ?>" style="color:white;">Logout</a>
    </div>
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <h6>MAIN MENU</h6>
    <a href="<?= base_url('index.php/dashboard') ?>">🏠 Beranda</a>

    <h6>MENU SURAT</h6>
    <a href="<?= base_url('index.php/suratmasuk') ?>">📄 Surat Masuk</a>
    <a href="<?= base_url('index.php/suratkeluar') ?>">📤 Surat Keluar</a>

    <h6>LAPORAN</h6>
    <a href="<?= base_url('index.php/laporan/suratmasuk') ?>">📊 Laporan Masuk</a>
    <a class="active" href="#">📈 Laporan Keluar</a>

    <?php if($this->session->userdata('level') == 1): ?>
    <h6>USER</h6>
    <a href="<?= base_url('index.php/user') ?>">👤 Manajemen User</a>
    <?php endif; ?>
</div>

<!-- CONTENT -->
<div class="content">

    <div class="card-box">

        <div class="d-flex justify-content-between mb-3">
            <h5>Laporan Surat Keluar</h5>

            <a href="<?= base_url('index.php/laporan/cetak_suratkeluar') ?>" target="_blank" class="btn btn-merah btn-sm">
                🖨 Cetak PDF
            </a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Asal</th>
                    <th>Tanggal</th>
                    <th>Penerbit</th>
                    <th>Perihal</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; foreach($surat as $s): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $s->no_surat ?></td>
                    <td><?= $s->asal_surat ?></td>
                    <td><?= $s->tgl_keluar ?></td>
                    <td><?= $s->penerbit ?></td>
                    <td><?= $s->perihal ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</div>

</body>
</html>