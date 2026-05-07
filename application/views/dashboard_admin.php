<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

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

/* TITLE */
.sidebar h6{
    padding:10px 20px;
    font-size:12px;
    color:#b71c1c;
    font-weight:bold;
}

/* MENU */
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

/* CONTENT */
.content{
    margin-left:220px;
    padding:25px;
}

/* BOX */
.box{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    margin-bottom:20px;
}

/* CARD DASHBOARD */
.card-dashboard{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    text-align:center;
}

.card-dashboard h3{
    margin:0;
    font-size:28px;
    font-weight:bold;
}

.card-dashboard small{
    color:#777;
}
</style>

</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
    <div><b>Sistem Surat PT Wijayakusuma Inti Nusa</b></div>
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
    <a href="<?= base_url('index.php/laporan/suratmasuk') ?>">📊 Laporan Surat Masuk</a>
    <a href="<?= base_url('index.php/laporan/suratkeluar') ?>">📈 Laporan Surat Keluar</a>

    <?php if($this->session->userdata('level') == 1): ?>
    <h6>USER</h6>
    <a href="<?= base_url('index.php/user') ?>">👤 Manajemen User</a>
    <?php endif; ?>
</div>

<!-- CONTENT -->
<div class="content">

    <div class="box">
        <h5>Dashboard</h5>
        <p class="text-muted">Selamat datang di sistem pengelolaan surat</p>

        <hr>

        <p>
            Sistem pengelolaan surat untuk mempermudah administrasi surat masuk dan surat keluar.
        </p>
    </div>

    <!-- CARD STAT -->
    <div class="row">

        <div class="col-md-6">
            <div class="card-dashboard">
                <h3>
                    <?= $this->db->count_all('tb_suratmasuk'); ?>
                </h3>
                <small>Surat Masuk</small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-dashboard">
                <h3>
                    <?= $this->db->count_all('tb_suratkeluar'); ?>
                </h3>
                <small>Surat Keluar</small>
            </div>
        </div>

    </div>

</div>

</body>
</html>