<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAK-PERSURATAN</title>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <script src="<?= base_url('assets/js/jquery/jquery-3.6.3.min.js') ?>"></script>
    
</head>

<body class="bg-primary-light" onload="window.print()">
<div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama surat</th>
                        <th>Kategori</th>
                        <th>Rak</th>
                        <th>Tanggal Surat</th>
                        
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($surat as $index => $val) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $val->nama_surat ?></td>
                            <td><?= $val->nama_kategori ?></td>
                            <td><?= $val->nama_rak ?></td>
                            <td><?= $val->tanggal_surat ?></td>
                           
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
</body>

</html>
