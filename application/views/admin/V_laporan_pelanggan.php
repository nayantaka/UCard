<!-- Header -->

<!-- Page content -->
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header bstatus-0">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: left;">
                                <h3 class="mb-0" id="judul">Laporan Pelanggan</h3>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Tanggal Lahir</th>
                                <th>Kecamatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1;
                            foreach ($data as $d) :
                            ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td><?= $d['pelanggan_nama'] ?></td>
                                    <td><?= $d['pelanggan_email'] ?></td>
                                    <td><?= $d['pelanggan_nohp'] ?></td>
                                    <td><?= $d['pelanggan_lahir'] ?></td>
                                    <td><?= $d['pelanggan_kecamatan'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>