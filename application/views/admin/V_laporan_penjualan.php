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
                                <h3 class="mb-0" id="judul">Laporan Penjualan</h3>
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
                                <th>Nama Pelanggan</th>
                                <th>Atas Nama</th>
                                <th>Nama Produk</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1;
                            foreach ($data as $d) :
                            ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td><?= $d['pelanggan_nama'] ?></td>
                                    <td><?= $d['transaksi_atas_nama'] ?? "-" ?></td>
                                    <td><?= $d['product_nama'] ?></td>
                                    <td><?= $d['transaksi_tanggal'] ?></td>
                                    <td><?= $d['transaksi_jumlah'] ?></td>
                                    <td style="text-align: right;">Rp<?= number_format($d['transaksi_harga'] ?? 0, 2, ',', '.'); ?></td>
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