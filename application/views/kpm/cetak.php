<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        hr {
            height: 10px;
        }
    </style>
</head>

<body>
    <div class="row justify-content-center">
        <h5 class="text-center">Laporan E-Warong <br>Program Bantuan Sosial Kpm Bermasalah </h5>
    </div>
    <hr>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-md-2">
                Kecamatan
            </div>
            <div class="col-md-9">
                : <?= $kec; ?>
            </div>
        </div>
        <?php if ($bulan !== 'kosong') : ?>
            <div class="row">
                <div class="col-md-2">
                    Bulan
                </div>
                <div class="col-md-9">
                    : <?= $bulan; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($tahun !== 'kosong') : ?>
            <div class="row">
                <div class="col-md-2">
                    Tahun
                </div>
                <div class="col-md-9">
                    : <?= $tahun; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>KTP</th>
                <th>Nama kpm</th>
                <th>Usia</th>
                <th>Keterangan</th>
                <th>Warong</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($value as $v) :
            ?>

                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $v->ktp; ?></td>
                    <td><?= $v->nama_kpm; ?></td>
                    <td><?= $v->usia; ?></td>
                    <td><?= $v->Keterangan; ?></td>
                    <td><?= $v->nama_warong; ?></td>
                </tr>
            <?php endforeach; ?>
            <!-- <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr> -->
        </tbody>
    </table>


</body>
<script type="text/javascript">
    window.print()
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>