<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    height:100vh;
    margin:0;
    font-family:'Segoe UI';
    background: linear-gradient(135deg,#f5f7fa,#e4e7ec);
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CARD LOGIN */
.login-card{
    width:380px;
    background:white;
    border-radius:20px;
    padding:40px 30px;
    box-shadow:0 15px 40px rgba(0,0,0,0.1);
    text-align:center;
}

/* LOGO */
.logo{
    width:70px;
    margin-bottom:15px;
}

/* TITLE */
.title{
    font-weight:bold;
    margin-bottom:5px;
}

.subtitle{
    color:#777;
    font-size:14px;
    margin-bottom:25px;
}

/* INPUT */
.form-control{
    border-radius:10px;
    padding:10px;
}

/* BUTTON */
.btn-login{
    background:#d32f2f;
    color:white;
    border-radius:10px;
    padding:10px;
    font-weight:bold;
}

.btn-login:hover{
    background:#b71c1c;
}
</style>

</head>
<body>

<div class="login-card">

    <!-- LOGO -->
    <img src="<?= base_url('assets/logo.png') ?>" class="logo">

    <!-- TITLE -->
    <h5 class="title">Sistem Surat</h5>
    <div class="subtitle">PT Wijayakusuma Inti Nusa</div>

    <!-- ERROR -->
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger text-start">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- FORM -->
    <form method="post" action="<?= base_url('index.php/auth/login') ?>">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <button class="btn btn-login w-100">Login</button>
    </form>

</div>

</body>
</html>