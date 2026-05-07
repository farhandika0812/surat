<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
body{
    font-family: Arial, sans-serif;
    font-size:12px;
}

h3{
    text-align:center;
    margin-bottom:10px;
}

table{
    width:100%;
    border-collapse: collapse;
}

th, td{
    border:1px solid #000;
    padding:6px;
    font-size:12px;
}

th{
    background:#eee;
}
</style>
</head>
<body>

<h3>LAPORAN SURAT KELUAR</h3>

<table>
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
            <td><?= date('d-m-Y', strtotime($s->tgl_keluar)) ?></td>
            <td><?= $s->penerbit ?></td>
            <td><?= $s->perihal ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>

<p style="text-align:right;">
    Tanggal Cetak: <?= date('d-m-Y') ?>
</p>

</body>
</html>