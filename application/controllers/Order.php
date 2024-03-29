<?php

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');
        }
        if (!$this->M_admin->check_permission('order')) redirect('Dashboard');
    }

    function index()
    {
        $x['title'] = "Daftar Order";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND ( s.transaksi_status IS NULL OR s.transaksi_status = '0' OR s.transaksi_status = '2') AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' AND " . $this->M_admin->tambahanQueryOrderYangFungsinyaBuatCekPermission() . " GROUP BY t.transaksi_id ORDER BY t.transaksi_id DESC")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function verifikasi()
    {
        if (!$this->M_admin->check_permission('orderverifikasi')) redirect('Dashboard');
        $x['title'] = "Verifikasi";
        $x['order'] = $this->db
            ->select('t.*, p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan')
            ->from('tbl_transaksi t')
            ->join('tbl_status_transaksi s', 't.transaksi_id = s.transaksi_order_id')
            ->join('tbl_pelanggan p', 't.transaksi_nohp = p.pelanggan_nohp')
            ->where('t.transaksi_terima', null)
            ->where('s.transaksi_status_id', '1')
            ->where("(s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL)")
            ->where('t.transaksi_deleted', '0')
            ->where('s.transaksi_deleted', '0')
            ->group_by('t.transaksi_id')
            ->order_by('t.transaksi_id', 'DESC')
            ->get()
            ->result_array();
        // $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '1' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' GROUP BY t.transaksi_id ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function kirim_design()
    {
        if (!$this->M_admin->check_permission('orderkirimdesign')) redirect('Dashboard');
        $x['title'] = "Kirim Design";
        $x['order'] = $this->db
            ->select('t.*, p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan')
            ->from('tbl_transaksi t')
            ->join('tbl_status_transaksi s', 't.transaksi_id = s.transaksi_order_id')
            ->join('tbl_pelanggan p', 't.transaksi_nohp = p.pelanggan_nohp')
            ->where('t.transaksi_terima', null)
            ->where('s.transaksi_status_id', '2')
            ->where("( s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL ) ")
            ->where('t.transaksi_deleted', '0')
            ->where('s.transaksi_deleted', '0')
            ->group_by('t.transaksi_id')
            ->order_by('t.transaksi_id', 'DESC')
            ->get()
            ->result_array();
        // $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '2' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' GROUP BY t.transaksi_id ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function pembayaran()
    {
        if (!$this->M_admin->check_permission('orderpembayaran')) redirect('Dashboard');
        $x['title'] = "Pembayaran";
        $x['order'] = $this->db
            ->select('t.*, p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan')
            ->from('tbl_transaksi t')
            ->join('tbl_status_transaksi s', 't.transaksi_id = s.transaksi_order_id')
            ->join('tbl_pelanggan p', 't.transaksi_nohp = p.pelanggan_nohp')
            ->where('t.transaksi_terima', null)
            ->where('s.transaksi_status_id', '3')
            ->where("(s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL)")
            ->where('t.transaksi_deleted', '0')
            ->where('s.transaksi_deleted', '0')
            ->group_by('t.transaksi_id')
            ->order_by('t.transaksi_id', 'DESC')
            ->get()
            ->result_array();
        // $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '3' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' GROUP BY t.transaksi_id ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function approval()
    {
        if (!$this->M_admin->check_permission('orderapproval')) redirect('Dashboard');
        $x['title'] = "Approval";
        $x['order'] = $this->db
            ->select('t.*, p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan')
            ->from('tbl_transaksi t')
            ->join('tbl_status_transaksi s', 't.transaksi_id = s.transaksi_order_id')
            ->join('tbl_pelanggan p', 't.transaksi_nohp = p.pelanggan_nohp')
            ->where('t.transaksi_terima', null)
            ->where('s.transaksi_status_id', '4')
            ->where("(s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL)")
            ->where('t.transaksi_deleted', '0')
            ->where('s.transaksi_deleted', '0')
            ->group_by('t.transaksi_id')
            ->order_by('t.transaksi_id', 'DESC')
            ->get()
            ->result_array();
        // $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '4' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' GROUP BY t.transaksi_id ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function proses_produksi()
    {
        if (!$this->M_admin->check_permission('orderproduksi')) redirect('Dashboard');
        $x['title'] = "Proses Produksi";
        $x['order'] = $this->db
            ->select('t.*, p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan')
            ->from('tbl_transaksi t')
            ->join('tbl_status_transaksi s', 't.transaksi_id = s.transaksi_order_id')
            ->join('tbl_pelanggan p', 't.transaksi_nohp = p.pelanggan_nohp')
            ->where('t.transaksi_terima', null)
            ->where('s.transaksi_status_id', '5')
            ->where("(s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL)")
            ->where('t.transaksi_deleted', '0')
            ->where('s.transaksi_deleted', '0')
            ->group_by('t.transaksi_id')
            ->order_by('t.transaksi_id', 'DESC')
            ->get()
            ->result_array();
        // $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '5' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' GROUP BY t.transaksi_id ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function kirim_ambil()
    {
        if (!$this->M_admin->check_permission('orderkirimambil')) redirect('Dashboard');
        $x['title'] = "Ambil / Kirim";
        $x['order'] = $this->db
            ->select('t.*, p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan')
            ->from('tbl_transaksi t')
            ->join('tbl_status_transaksi s', 't.transaksi_id = s.transaksi_order_id')
            ->join('tbl_pelanggan p', 't.transaksi_nohp = p.pelanggan_nohp')
            ->where('t.transaksi_terima', null)
            ->where('s.transaksi_status_id', '6')
            ->where("(s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL)")
            ->where('t.transaksi_deleted', '0')
            ->where('s.transaksi_deleted', '0')
            ->group_by('t.transaksi_id')
            ->order_by('t.transaksi_id', 'DESC')
            ->get()
            ->result_array();
        // $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '6' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' GROUP BY t.transaksi_id ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function history()
    {
        if (!$this->M_admin->check_permission('orderhistory')) redirect('Dashboard');
        $x['title'] = "Order History";
        $x['order'] = $this->db
            ->select('t.*, p.pelanggan_nama')
            ->from('tbl_transaksi t')
            ->join('tbl_pelanggan p', 't.transaksi_nohp=p.pelanggan_nohp')
            ->order_by('t.transaksi_id', 'DESC')
            ->get()
            ->result_array();
        // $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama FROM tbl_transaksi AS t JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order_history', $x);
        $this->load->view('admin/template/V_footer');
    }
    function get_data()
    {
        $id = $this->input->post('id');
        $status = $this->db->query("SELECT * FROM tbl_status WHERE status_id LIKE '_'")->result_array();
        $e = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.transaksi_nohp = tbl_pelanggan.pelanggan_nohp JOIN tbl_product ON tbl_transaksi.transaksi_product_id = tbl_product.product_id WHERE transaksi_id = '$id' ")->row_array();
?>
        <div class="modal-body">
            <div id="alert_update"></div>
            <div class="tab">
                <button class="tablinks" onclick="openTabs(event, 'Detail')">Detail</button>
                <button class="tablinks" onclick="openTabs(event, 'bukti')">Bukti Transaksi</button>
            </div>
            <div id="Detail" class="tabcontent">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-center">Pelanggan</h2>
                        <hr class="m-2">
                        <b>Nama</b>
                        <p><?= $e['pelanggan_nama']; ?></p>
                        <b>Email</b>
                        <p><?= $e['pelanggan_email']; ?></p>
                        <b>Tgl Lahir</b>
                        <p><?= $e['pelanggan_lahir']; ?></p>
                        <b>Alamat</b>
                        <p><?= $e['pelanggan_alamat']; ?></p>
                        <b>Whatsapp</b>
                        <p><?= $e['pelanggan_nohp']; ?></p>
                        <b>Kecamatan</b>
                        <p><?= $e['pelanggan_kecamatan']; ?></p>
                        <b>Kabupaten</b>
                        <p><?= $e['pelanggan_kabupaten']; ?></p>
                        <b>Kodepost</b>
                        <p><?= $e['pelanggan_kodepost']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-center">Produk</h2>
                        <hr class="m-2">
                        <b>Produk</b>
                        <p><?= $e['product_nama']; ?></p>
                        <b>Jumlah</b>
                        <p><?= $e['transaksi_jumlah']; ?></p>
                        <b>Harga</b>
                        <?php if (empty($e['transaksi_harga'])) : ?>
                            <p>Harga belum ditentukan</p>
                        <?php else : ?>
                            <p><?= 'Rp' . number_format($e['transaksi_harga'] ?? 0, 2, ',', '.'); ?></p>
                        <?php endif; ?>
                        <br>
                        <b>Keterangan</b>
                        <p><?= $e['transaksi_keterangan']; ?></p>
                    </div>
                </div>
            </div>
            <div id="bukti" class="tabcontent">
                <?php if ($e['transaksi_bukti'] == NULL) : ?>
                    Belum ada bukti transaksi
                <?php else : ?>
                    <img style="width:300px;" src="<?= base_url('bukti_transaksi/' . $e['transaksi_bukti']); ?>">
                <?php endif; ?>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
        </div>
    <?php
    }
    function get_data_design()
    {
        $id = $this->input->post('id');
        $id_transaksi = $this->input->post('id_transaksi');
        $g = $this->db->query("SELECT * FROM tbl_user_design WHERE design_id = '$id' ")->row_array();
    ?>
        <div id="alert"></div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <img style="width: 200px;border-radius:5px;" src="<?= base_url('design_user/') . $g['design_image']; ?>" alt="">
                </center>
                <br>
                <p><?= $g['design_width'] ?> X <?= $g['design_height'] ?></p>
                <br>
                <div>
                    <table style="width:100%;">
                        <tr>
                            <td>
                                <a style="width: 100%;" href="<?= base_url('Editor?design=') . $g['design_id'] . '&level=2&id=' . $id_transaksi; ?>" class="btn btn-primary">Edit Design</a>
                            </td>
                            </td>
                            <td>
                                <button style="width: 100%;" id="hapus_design" class="btn btn-danger">Hapus Design</button></center>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    function hapus_design()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_user_design WHERE design_id = '$id' ");
    }
    function update_harga()
    {
        $id = $this->input->post('transaksi_id');
        $harga = !empty($this->input->post('harga')) ? $this->input->post('harga') : null;
        $ongkir = $this->input->post('ongkir');

        $this->db
            ->set('transaksi_harga', $harga)
            ->set('transaksi_ongkir', $ongkir)
            ->where('transaksi_id', $id)
            ->update('tbl_transaksi');

        // $this->db->query("UPDATE tbl_transaksi SET transaksi_harga = '$h' WHERE transaksi_id = '$id' ");
        // $this->db->query("UPDATE tbl_transaksi SET transaksi_ongkir = '$ongkir' WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function hapus_order()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_deleted = '1' WHERE transaksi_id = '$id' ");
        $this->db->query("UPDATE tbl_status_transaksi SET transaksi_deleted = '1' WHERE transaksi_order_id = '$id' ");
    }
    function batal_trans()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_status = 'DIBATALKAN' WHERE transaksi_id = '$id' ");
    }
    function detail()
    {
        $x['title'] = "Detail";
        $id = $this->uri->segment(3);
        $o = $this->db->query("SELECT * FROM tbl_transaksi AS t JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_id = '$id' AND " . $this->M_admin->tambahanQueryOrderYangFungsinyaBuatCekPermission())->row_array();
        if (!$o) {
            redirect('Order');
        } else {
            $x['o'] = $o;
            $id_product = $o['transaksi_product_id'];
            $x['p'] = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id_product' ")->row_array();
            $x['bank'] = $this->db->query("SELECT * FROM tbl_bank")->result_array();
            $x['status'] = $this->db->query("SELECT * FROM tbl_status WHERE status_id LIKE '_'")->result_array();
            $this->load->view('admin/template/V_header', $x);
            $this->load->view('admin/V_detail', $x);
            $this->load->view('admin/template/V_footer');
        }
    }
    function upload_approval1()
    {
        $id = $this->input->post('id');
        $transaksi_id = $this->input->post('transaksi_id');
        $apv1 = $_FILES['approval1']['name'];
        $config['upload_path']          = './design_approval/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('approval1')) {
            $this->upload->data();
        }

        $a = $this->upload->data('file_name');

        $data = [
            'transaksi_approval_1' => $a
        ];

        $this->db->where('transaksi_id', $transaksi_id);
        $this->db->update('tbl_transaksi', $data);
        redirect('Order/detail/' . $transaksi_id);
    }
    function upload_approval2()
    {
        $id = $this->input->post('id');
        $transaksi_id = $this->input->post('transaksi_id');
        $apv1 = $_FILES['approval2']['name'];
        $config['upload_path']          = './design_approval/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('approval2')) {
            $this->upload->data();
        }

        $a = $this->upload->data('file_name');

        $data = [
            'transaksi_approval_2' => $a
        ];

        $this->db->where('transaksi_id', $transaksi_id);
        $this->db->update('tbl_transaksi', $data);
        redirect('Order/detail/' . $transaksi_id);
    }
    function upload_approval3()
    {
        $id = $this->input->post('id');
        $transaksi_id = $this->input->post('transaksi_id');
        $apv1 = $_FILES['approval3']['name'];
        $config['upload_path']          = './design_approval/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('approval3')) {
            $this->upload->data();
        }

        $a = $this->upload->data('file_name');

        $data = [
            'transaksi_approval_3' => $a
        ];

        $this->db->where('transaksi_id', $transaksi_id);
        $this->db->update('tbl_transaksi', $data);
        redirect('Order/detail/' . $transaksi_id);
    }
    function info_design()
    {
        $d = $this->input->post('d');
        $data = getimagesize($d);
        $width = $data[0];
        $height = $data[1];

        echo $height . ' X ' . $width;
    }
    function hapus_design_upload()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_design_kirim WHERE design_id = '$id' ");
    }
    function status()
    {
        $id             = $this->input->post('id');
        $status_id_full = $this->input->post('id_status'); // 1 - 6 dan 51 - 58
        $status_id      = 50 < $status_id_full && $status_id_full < 58 ? '5' : ($status_id_full == 58 ? '6' : $this->input->post('id_status') + 1); // 1 - 6 // full + 1
        $keputusan      = $this->input->post('keputusan');
        $keterangan     = $this->input->post('keterangan');
        $jumlah         = $this->input->post('jumlah') ?? 0;
        $user           = $_SESSION['admin_nama'];
        $tanggal_ini    = time();

        $pelanggan                      = $this->db->query("SELECT p.*, t.* FROM tbl_transaksi AS t JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE transaksi_id = '$id' ")->row_array();
        $tipe                           = $this->db->select('product_tipe')->where('product_id', $pelanggan['transaksi_product_id'])->get('tbl_product')->row_array()['product_tipe'];
        $transaksi_produksi_status_id   = $this->db->query("SELECT max(transaksi_produksi_status_id) as tpsi FROM tbl_status_transaksi WHERE transaksi_order_id = '$id' ")->row_array()['tpsi'];
        $jangka_waktu                   = $this->db->query("SELECT * FROM tbl_status WHERE status_id = '$status_id' ")->row_array()['status_jangka_waktu'];
        $tanggal_hangus                 = $tanggal_ini + (86400 * $jangka_waktu);

        if ($keputusan == '1') {
            // DITERIMA

            $this->db
                ->set('transaksi_status', $keputusan)
                ->set('transaksi_keterangan', $keterangan)
                ->set('transaksi_jumlah_produksi', $jumlah)
                ->group_start()
                ->where('transaksi_produksi_status_id', $status_id_full)
                ->or_where('transaksi_status_id', $status_id_full)
                ->group_end()
                ->where('transaksi_order_id', $id)
                ->update('tbl_status_transaksi');

            switch ($status_id_full) {
                case "1":
                    $this->db->insert('tbl_verifikasi', ['transaksi_id'  => $id, 'verif_pesanan' => $user]);
                    break;
                case "2":
                    $this->db->set('verif_desain', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case "3":
                    $this->db->set('verif_pembayaran', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case "4":
                    $this->db->set('verif_approval', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');

                    switch ($tipe) {
                        case '0':
                        case '2':
                        case '3':
                            $transaksi_produksi_status_id = '51';
                            break;
                        case '1':
                        case '4':
                            $transaksi_produksi_status_id = '53';
                            break;
                    }
                    break;
                case '51':
                    switch ($tipe) {
                        case '0':
                        case '2':
                            $transaksi_produksi_status_id = '53';
                            break;
                        case '3':
                            $transaksi_produksi_status_id = '52';
                            break;
                    }
                    $this->db->set('verif_produksi_gudang', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case '52':
                    $transaksi_produksi_status_id = '53';
                    $this->db->set('verif_produksi_identifikasi', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case '53':
                    switch ($tipe) {
                        case '0':
                            $transaksi_produksi_status_id = '54';
                            break;
                        case '1':
                        case '3':
                        case '4':
                            $transaksi_produksi_status_id = '57';
                            break;
                        case '2':
                            $transaksi_produksi_status_id = '56';
                            break;
                    }
                    $this->db->set('verif_produksi_cetak', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case '54':
                    $transaksi_produksi_status_id = '55';
                    $this->db->set('verif_produksi_press', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case '55':
                    $transaksi_produksi_status_id = '57';
                    $this->db->set('verif_produksi_plong', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case '56':
                    $transaksi_produksi_status_id = '57';
                    $this->db->set('verif_produksi_finishing', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case '57':
                    $transaksi_produksi_status_id = '58';
                    $this->db->set('verif_produksi_qualitycontrol', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    break;
                case '58':
                    $this->db->set('verif_produksi_siapkirim', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                    $this->db->set('transaksi_status', '1')->where(['transaksi_status_id' => '5', 'transaksi_order_id' => $id])->update('tbl_status_transaksi');
                    break;
                default:
                    break;
            }

            $data = array(
                'transaksi_status_id'           => $status_id,
                'transaksi_produksi_status_id'  => $transaksi_produksi_status_id,
                'transaksi_order_id'            => $id,
                'transaksi_tanggal'             => $tanggal_ini,
                'transaksi_tanggal_hangus'      => $tanggal_hangus
            );
            $this->db->insert('tbl_status_transaksi', $data);
        } else {
            // DITOLAK
            $this->db
                ->set('transaksi_status', $keputusan)
                ->set('transaksi_keterangan', $keterangan)
                ->set('transaksi_tanggal', $tanggal_ini)
                ->set('transaksi_tanggal_hangus', $tanggal_hangus)
                ->where('transaksi_status_id', $status_id_full)
                ->where('transaksi_order_id', $id)
                ->update('tbl_status_transaksi');
        }

        if ($status_id_full < 6) {
            $personalisasi = $this->input->post('personalisasi') ?? null;
            $finishing     = $this->input->post('finishing') ?? null;
            $packaging     = $this->input->post('packaging') ?? null;
            $coating       = $this->input->post('coating') ?? null;
            $function      = $this->input->post('function') ?? null;
            $material      = $this->input->post('material') ?? null;
            $finish        = $this->input->post('finish') ?? null;
            $jp            = $this->input->post('jp') ?? null;
            $yoyo          = $this->input->post('yoyo') ?? null;
            $warna         = $this->input->post('warna') ?? null;
            $casing        = $this->input->post('casing') ?? null;
            $ck            = $this->input->post('ck') ?? null;
            $lr            = $this->input->post('lr') ?? null;
            $pb            = $this->input->post('pb') ?? null;
            $bank          = $this->input->post('bank') ?? null;
            $printsisi     = $this->input->post('printsisi') ?? null;
            $varian        = $this->input->post('varian') ?? null;
            $status        = $this->input->post('status') ?? null;

            $this->db
                ->set([
                    'transaksi_personalisasi' => $personalisasi,
                    'transaksi_finishing'     => $finishing,
                    'transaksi_packaging'     => $packaging,
                    'transaksi_coating'       => $coating,
                    'transaksi_function'      => $function,
                    'transaksi_material'      => $material,
                    'transaksi_finish'        => $finish,
                    'transaksi_jp'            => $jp,
                    'transaksi_yoyo'          => $yoyo,
                    'transaksi_warna'         => $warna,
                    'transaksi_casing'        => $casing,
                    'transaksi_ck'            => $ck,
                    'transaksi_logo'          => $lr,
                    'transaksi_pb'            => $pb,
                    'transaksi_spk_bank'      => $bank,
                    'transaksi_spk_print'     => $printsisi,
                    'transaksi_spk_varian'    => $varian,
                    'transaksi_paket'         => $status,
                ])
                ->where('transaksi_id', $id)
                ->update('tbl_transaksi');
        }

        // kirim email
        $this->load->library('email');
        $this->load->helper('email');

        list($subject, $message) = get_email($id, $status_id_full, $user, $pelanggan["pelanggan_nama"], $pelanggan["transaksi_tanggal"]);
        $this->email->clear();
        $this->email->to($pelanggan['pelanggan_email']);
        $this->email->from('noreply@ucard.id');
        $this->email->subject($subject);
        $this->email->set_mailtype('html');
        $this->email->message($message);
        // $this->email->send();
    }
    function paket()
    {
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_paket = '$val' WHERE transaksi_id = '$id' ");
    }
    function terima()
    {
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        $user = $_SESSION['admin_nama'];

        $this->db->query("UPDATE tbl_transaksi SET transaksi_terima = '$val' WHERE transaksi_id = '$id' ");
        $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = '$val', transaksi_keterangan = 'Sudah Diterima' WHERE transaksi_status_id = '6' AND transaksi_order_id = '$id' ");
        $o = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_id = '$id' ")->row_array();
    ?>
        <div class="wrapper">
            <h2><?= $o['transaksi_paket'] == '1' ? 'Kirim Paket' : 'Ambil Sendiri'; ?></h2>
            <h2>Paket sudah diterima</h2>
        </div>
        <?php

        $this->db->set('verif_kirimambil', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
    }
    function check()
    {
        $jml_daftar = count(($this->db->query("SELECT t.transaksi_id FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE (s.transaksi_status IS NULL OR s.transaksi_status = '0' OR s.transaksi_status = '2')  AND t.transaksi_terima IS NULL AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' AND " . $this->M_admin->tambahanQueryOrderYangFungsinyaBuatCekPermission() . ' GROUP BY t.transaksi_id')->result_array()));
        $jml_verif = $this->db->query("SELECT count(t.transaksi_id) AS jml_verif FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '1' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0'")->row_array()['jml_verif'];
        $jml_design = $this->db->query("SELECT count(t.transaksi_id) AS jml_design FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '2' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0'")->row_array()['jml_design'];
        $jml_pemb = $this->db->query("SELECT count(t.transaksi_id) AS jml_pemb FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '3' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0'")->row_array()['jml_pemb'];
        $jml_approv = $this->db->query("SELECT count(t.transaksi_id) AS jml_approv FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '4' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0'")->row_array()['jml_approv'];
        $jml_cetak = count($this->db->query("SELECT t.transaksi_id FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '5' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0' GROUP BY t.transaksi_id")->result_array());
        $jml_kirim = $this->db->query("SELECT count(t.transaksi_id) AS jml_kirim FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '6' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL AND t.transaksi_deleted = '0' AND s.transaksi_deleted = '0'")->row_array()['jml_kirim'];

        print_r(json_encode([
            'o' => $jml_daftar,
            'v' => $jml_verif,
            'd' => $jml_design,
            'p' => $jml_pemb,
            'a' => $jml_approv,
            'c' => $jml_cetak,
            'k' => $jml_kirim,
        ]));
        die();
    }
    function check_status()
    {
        $id = $this->input->post('id');

        $st = $this->db->where('transaksi_order_id', $id)->order_by('transaksi_id', 'desc')->get('tbl_status_transaksi')->row_array();
        print_r(json_encode([
            'sid' => $st['transaksi_status_id'],
            'pid' => $st['transaksi_produksi_status_id'] ?? 0,
        ]));
        die();
    }
    function get_status()
    {
        $id = $this->input->post('id');
        $id_status = $this->input->post('id_status');

        if ($id_status > 50) {
            $o = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_id = '$id' ")->row_array();
            $tipe = $this->db->select('product_tipe')->where('product_id', $o['transaksi_product_id'])->get('tbl_product')->row_array()['product_tipe'];
            $status = $this->db->from('tbl_status');
            switch ($tipe) {
                case '0':
                    $status = $status
                        ->where_in('status_id', ['51', '53', '54', '55', '57', '58', '6'])
                        ->order_by('FIELD(status_id, 51, 53, 54, 55, 57, 58, 6)');
                    break;
                case '1':
                case '4':
                    $status = $status
                        ->where_in('status_id', ['53', '57', '58', '6'])
                        ->order_by('FIELD(status_id, 53, 57, 58, 6)');
                    break;
                case '2':
                    $status = $status
                        ->where_in('status_id', ['51', '53', '56', '57', '58', '6'])
                        ->order_by('FIELD(status_id, 51, 53, 56, 57, 58, 6)');
                    break;
                case '3':
                    $status = $status
                        ->where_in('status_id', ['51', '52', '53', '57', '58', '6'])
                        ->order_by('FIELD(status_id, 51, 52, 53, 57, 58, 6)');
                    break;
            }

            $status = $status->get()->result_array();
            $index = array_search($id_status, array_column($status, 'status_id'));
            $curr = $status[$index];
            $next = $status[$curr !== end($status) ? $index + 1 : count($status) - 1];
            $q_ket = $this->db->where('transaksi_produksi_status_id', $curr['status_id'])->where('transaksi_order_id', $id)->get('tbl_status_transaksi')->row_array();
            $jumlah = $q_ket['transaksi_jumlah_produksi'] ?? 0;
            $keterangan = $q_ket['transaksi_keterangan'] ?? null;
        ?>
            <div class="modal-body pt-0">
                <input type="hidden" value="<?= $id_status; ?>" id="id_status">
                <div class="form-group">
                    <input id="keputusan" type="hidden" value="1">
                    <p>Status saat ini: <b><?= $curr['status_status']; ?></b><br>Status selanjutnya: <b><?= $next['status_status']; ?></b><br></p>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Diproduksi</label>
                    <input class="form-control" type="number" name="jumlah" id="jumlah" value="<?= $jumlah; ?>" placeholder="Masukkan jumlah produksi" required min="1">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input class="form-control" type="text" name="keterangan" id="keterangan" value="<?= $keterangan; ?>" placeholder="Masukkan keterangan">
                </div>
                <p>Apakah Anda yakin ingin melanjutkan produksi ke tahap selanjutnya?</p>
                <button style="width:100%;" id="update-status" class="btn btn-primary">Ya</button>
            </div>
        <?php
        } else {
            $s = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_status_id = '$id_status' AND transaksi_order_id = '$id' ")->row_array();
            $o = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_id = '$id' ")->row_array();
            $p = $this->db->where('product_id', $o['transaksi_product_id'])->get('tbl_product')->row_array();
        ?>
            <div class="modal-body">
                <input type="hidden" value="<?= $id_status; ?>" id="id_status">
                <div class="form-group">
                    <b>Keputusan*</b>
                    <br>
                    <select id="keputusan" name="keputusan" class="form-control" required="">
                        <option value="" disabled selected>Pilih salah satu</option>
                        <?php if ($id_status != '5') : ?>
                            <option value="1" <?= $s['transaksi_status'] == '1' ? 'selected' : ''; ?>>Diterima</option>
                            <option value="0" <?= $s['transaksi_status'] == '0' ? 'selected' : ''; ?>>Ditolak</option>
                        <?php else : ?>
                            <option value="1">Sudah Jadi</option>
                        <?php endif; ?>
                    </select>
                </div>
                <?php if ($p['product_tipe'] == '0') : ?>
                    <!-- Kartu -->
                    <div class="grid-container">
                        <div class="grid-item">
                            <?php $personalisasi = explode(',', $o['transaksi_personalisasi'] ?? ''); ?>
                            <b>Personalisasi</b>
                            <br><br>
                            <div class="form-group">
                                <input type="checkbox" id="persona1" placeholder="personalisasi" name="personalisasi[]" value="1" <?= in_array('1', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona1">Blanko</label><br>
                                <input type="checkbox" id="persona2" placeholder="personalisasi" name="personalisasi[]" value="2" <?= in_array('2', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona2">Nomerator</label><br>
                                <input type="checkbox" id="persona3" placeholder="personalisasi" name="personalisasi[]" value="3" <?= in_array('3', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona3">Barcode</label><br>
                                <input type="checkbox" id="persona4" placeholder="personalisasi" name="personalisasi[]" value="4" <?= in_array('4', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona4">Data</label><br>
                                <input type="checkbox" id="persona5" placeholder="personalisasi" name="personalisasi[]" value="5" <?= in_array('5', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona5">Data + Foto</label>
                            </div>
                        </div>
                        <div class="grid-item">
                            <b>Coating</b>
                            <br><br>
                            <input type="radio" id="coating1" placeholder="coating" name="coating" value="1" <?= $o['transaksi_coating'] == '1' ? 'checked' : ''; ?> required>
                            <label for="coating1">Glossy</label><br>
                            <input type="radio" id="coating2" placeholder="coating" name="coating" value="2" <?= $o['transaksi_coating'] == '2' ? 'checked' : ''; ?> required>
                            <label for="coating2">Doff</label><br>
                            <input type="radio" id="coating3" placeholder="coating" name="coating" value="3" <?= $o['transaksi_coating'] == '3' ? 'checked' : ''; ?> required>
                            <label for="coating3">Glossy + Doff</label><br>
                            <input type="radio" id="coating4" placeholder="coating" name="coating" value="4" <?= $o['transaksi_coating'] == '4' ? 'checked' : ''; ?> required>
                            <label for="coating3">UV</label>
                        </div>
                        <div class="grid-item">
                            <?php $finishing = explode(',', $o['transaksi_finishing'] ?? ''); ?>
                            <b>Finishing</b>
                            <br><br>
                            <input type="checkbox" id="finish1" placeholder="finishing" name="finishing[]" value="1" <?= in_array('1', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish1">Tidak ada</label><br>
                            <input type="checkbox" id="finish2" placeholder="finishing" name="finishing[]" value="2" <?= in_array('2', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish2">Urutkan</label><br>
                            <input type="checkbox" id="finish3" placeholder="finishing" name="finishing[]" value="3" <?= in_array('3', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish3">Label Gosok</label><br>
                            <input type="checkbox" id="finish4" placeholder="finishing" name="finishing[]" value="4" <?= in_array('4', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish4">Plong Oval</label><br>
                            <input type="checkbox" id="finish5" placeholder="finishing" name="finishing[]" value="5" <?= in_array('5', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish5">Plong Bulat</label><br>
                            <input type="checkbox" id="finish6" placeholder="finishing" name="finishing[]" value="6" <?= in_array('6', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish6">Copy Data RFID</label><br>
                            <input type="checkbox" id="finish7" placeholder="finishing" name="finishing[]" value="7" <?= in_array('7', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish7">Emboss Silver</label><br>
                            <input type="checkbox" id="finish8" placeholder="finishing" name="finishing[]" value="8" <?= in_array('8', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish8">Emboss Gold</label><br>
                            <input type="checkbox" id="finish9" placeholder="finishing" name="finishing[]" value="9" <?= in_array('9', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish9">Panel</label><br>
                            <input type="checkbox" id="finish10" placeholder="finishing" name="finishing[]" value="10" <?= in_array('10', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish10">Hot Print</label><br>
                            <input type="checkbox" id="finish11" placeholder="finishing" name="finishing[]" value="11" <?= in_array('11', $finishing) ? 'checked' : ''; ?>>
                            <label for="finish11">Swipe</label><br>
                        </div>
                        <div class="grid-item">
                            <b>Function</b>
                            <br><br>
                            <input type="radio" id="function1" placeholder="function" name="function" value="1" <?= $o['transaksi_function'] == '1' ? 'checked' : ''; ?> required>
                            <label for="function1">Print Thermal</label><br>
                            <input type="radio" id="function2" placeholder="function" name="function" value="2" <?= $o['transaksi_function'] == '2' ? 'checked' : ''; ?> required>
                            <label for="function2">Scan Barcode</label><br>
                            <input type="radio" id="function3" placeholder="function" name="function" value="3" <?= $o['transaksi_function'] == '3' ? 'checked' : ''; ?> required>
                            <label for="function3">Swipe Magnetic</label><br>
                            <input type="radio" id="function4" placeholder="function" name="function" value="4" <?= $o['transaksi_function'] == '4' ? 'checked' : ''; ?> required>
                            <label for="function4">Tap RFID</label>
                        </div>
                        <div class="grid-item">
                            <?php $packaging = explode(',', $o['transaksi_packaging'] ?? ''); ?>
                            <b>Packaging</b>
                            <br><br>
                            <input type="checkbox" id="packaging1" placeholder="packaging" name="packaging[]" value="1" <?= in_array('1', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging1">Plastik 1 on 1</label><br>
                            <input type="checkbox" id="packaging2" placeholder="packaging" name="packaging[]" value="2" <?= in_array('2', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging2">Plastik Terpisah</label><br>
                            <input type="checkbox" id="packaging3" placeholder="packaging" name="packaging[]" value="3" <?= in_array('3', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging3">Box Kartu Nama</label><br>
                            <input type="checkbox" id="packaging4" placeholder="packaging" name="packaging[]" value="4" <?= in_array('4', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging4">Box Putih</label><br>
                            <input type="checkbox" id="packaging5" placeholder="packaging" name="packaging[]" value="5" <?= in_array('5', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging5">Small UCARD</label><br>
                            <input type="checkbox" id="packaging6" placeholder="packaging" name="packaging[]" value="6" <?= in_array('6', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging6">Small Maxi UCARD</label><br>
                            <input type="checkbox" id="packaging7" placeholder="packaging" name="packaging[]" value="7" <?= in_array('7', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging7">Large UCARD</label><br>
                            <input type="checkbox" id="packaging8" placeholder="packaging" name="packaging[]" value="8" <?= in_array('8', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging8">Large Maxi UCARD</label>
                        </div>
                        <div class="grid-item">
                            <b>Ambil/Kirim</b>
                            <br><br>
                            <input type="radio" id="kirim" placeholder="status" name="status" value="1" <?= $o['transaksi_paket'] == '1' ? 'checked' : ''; ?> required>
                            <label for="kirim">Kirim Produk</label><br>
                            <input type="radio" id="ambil" placeholder="status" name="status" value="2" <?= $o['transaksi_paket'] == '2' ? 'checked' : ''; ?> required>
                            <label for="ambil">Ambil Sendiri</label>
                        </div>
                    </div>
                <?php elseif ($p['product_tipe'] == '1') : ?>
                    <!-- Aksesoris -->
                    <div class="grid-container">
                        <input type="hidden" id="tipe" name="tipe" value="<?= $p['product_tipe']; ?>">
                        <div class="grid-item p-0 pb-3">
                            <b>Yoyo</b>
                            <br><br>
                            <input id="yoyo1" type="radio" placeholder="yoyo" name="yoyo" value="1" <?= $o['transaksi_yoyo'] == '1' ? 'checked' : ''; ?> required>
                            <label for="yoyo1">Yoyo Putar</label><br>
                            <input id="yoyo2" type="radio" placeholder="yoyo" name="yoyo" value="2" <?= $o['transaksi_yoyo'] == '2' ? 'checked' : ''; ?> required>
                            <label for="yoyo2">Yoyo Standar</label><br>
                            <input id="yoyo3" type="radio" placeholder="yoyo" name="yoyo" value="3" <?= $o['transaksi_yoyo'] == '3' ? 'checked' : ''; ?> required>
                            <label for="yoyo3">Yoyo Transparan</label>
                            <br><br><br>
                            <b>Casing</b>
                            <br><br>
                            <input id="casing1" type="radio" placeholder="casing" name="casing" value="1" <?= $o['transaksi_casing'] == '1' ? 'checked' : ''; ?> required>
                            <label for="casing1">Casing ID Card Acrylic</label><br>
                            <input id="casing2" type="radio" placeholder="casing" name="casing" value="2" <?= $o['transaksi_casing'] == '2' ? 'checked' : ''; ?> required>
                            <label for="casing2">Casing ID Card Solid</label><br>
                            <input id="casing3" type="radio" placeholder="casing" name="casing" value="3" <?= $o['transaksi_casing'] == '3' ? 'checked' : ''; ?> required>
                            <label for="casing3">Casing ID Card Karet</label><br>
                            <input id="casing4" type="radio" placeholder="casing" name="casing" value="4" <?= $o['transaksi_casing'] == '4' ? 'checked' : ''; ?> required>
                            <label for="casing4">Casing ID Card Kulit</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Warna</b>
                            <br><br>
                            <input id="warna1" type="radio" placeholder="warna" name="warna" value="1" <?= $o['transaksi_warna'] == '1' ? 'checked' : ''; ?> required>
                            <label for="warna1">Hitam</label><br>
                            <input id="warna2" type="radio" placeholder="warna" name="warna" value="2" <?= $o['transaksi_warna'] == '2' ? 'checked' : ''; ?> required>
                            <label for="warna2">Putih</label><br>
                            <input id="warna3" type="radio" placeholder="warna" name="warna" value="3" <?= $o['transaksi_warna'] == '3' ? 'checked' : ''; ?> required>
                            <label for="warna3">Hijau</label><br>
                            <input id="warna4" type="radio" placeholder="warna" name="warna" value="4" <?= $o['transaksi_warna'] == '4' ? 'checked' : ''; ?> required>
                            <label for="warna4">Biru</label><br>
                            <input id="warna5" type="radio" placeholder="warna" name="warna" value="5" <?= $o['transaksi_warna'] == '5' ? 'checked' : ''; ?> required>
                            <label for="warna5">Merah</label><br>
                            <input id="warna6" type="radio" placeholder="warna" name="warna" value="6" <?= $o['transaksi_warna'] == '6' ? 'checked' : ''; ?> required>
                            <label for="warna6">Kuning</label><br>
                            <input id="warna7" type="radio" placeholder="warna" name="warna" value="7" <?= $o['transaksi_warna'] == '7' ? 'checked' : ''; ?> required>
                            <label for="warna7">Orange</label><br>
                            <input id="warna8" type="radio" placeholder="warna" name="warna" value="8" <?= $o['transaksi_warna'] == '8' ? 'checked' : ''; ?> required>
                            <label for="warna8">Silver</label><br>
                            <input id="warna9" type="radio" placeholder="warna" name="warna" value="9" <?= $o['transaksi_warna'] == '9' ? 'checked' : ''; ?> required>
                            <label for="warna9">Coklat</label><br>
                            <input id="warna10" type="radio" placeholder="warna" name="warna" value="10" <?= $o['transaksi_warna'] == '10' ? 'checked' : ''; ?> required>
                            <label for="warna10">Hitam Transparan</label><br>
                            <input id="warna11" type="radio" placeholder="warna" name="warna" value="11" <?= $o['transaksi_warna'] == '11' ? 'checked' : ''; ?> required>
                            <label for="warna11">Putih Transparan</label><br>
                            <input id="warna12" type="radio" placeholder="warna" name="warna" value="12" <?= $o['transaksi_warna'] == '12' ? 'checked' : ''; ?> required>
                            <label for="warna12">Biru Transparan</label><br>
                            <input id="warna13" type="radio" placeholder="warna" name="warna" value="13" <?= $o['transaksi_warna'] == '13' ? 'checked' : ''; ?> required>
                            <label for="warna13">Custom (isi di keterangan)</label>
                        </div>
                        <div class="grid-item p-0 pb-3" id="varian_karet">
                            <b>Varian Casing Karet</b>
                            <br><br>
                            <input id="ck1" type="radio" placeholder="ck" name="ck" value="1" <?= $o['transaksi_ck'] == '1' ? 'checked' : ''; ?> required>
                            <label for="ck1">Casing karet 1 sisi</label><br>
                            <input id="ck2" type="radio" placeholder="ck" name="ck" value="2" <?= $o['transaksi_ck'] == '2' ? 'checked' : ''; ?> required>
                            <label for="ck2">Casing karet 2 sisi</label><br>
                            <input id="ck3" type="radio" placeholder="ck" name="ck" value="3" <?= $o['transaksi_ck'] == '3' ? 'checked' : ''; ?> required>
                            <label for="ck3">Casing karet double landscape</label><br>
                            <input id="ck4" type="radio" placeholder="ck" name="ck" value="4" <?= $o['transaksi_ck'] == '4' ? 'checked' : ''; ?> required>
                            <label for="ck4">Casing karet single landscape</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Logo Resin</b>
                            <br><br>
                            <input id="lr" type="checkbox" placeholder="lr" name="lr" value="1" <?= $o['transaksi_logo'] == '1' ? 'checked' : ''; ?>>
                            <label for="lr">Logo resin</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Penjepit Buaya</b>
                            <br><br>
                            <input id="pb1" type="radio" placeholder="pb" name="pb" value="1" <?= $o['transaksi_pb'] == '1' ? 'checked' : ''; ?> required>
                            <label for="pb1">Penjepit Buaya Besi</label><br>
                            <input id="pb2" type="radio" placeholder="pb" name="pb" value="2" <?= $o['transaksi_pb'] == '2' ? 'checked' : ''; ?> required>
                            <label for="pb2">Penjepit Buaya Plastik</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Ambil/Kirim</b>
                            <br><br>
                            <input id="kirim" type="radio" placeholder="status" name="status" value="1" <?= $o['transaksi_paket'] == '1' ? 'checked' : ''; ?> required>
                            <label for="kirim">Kirim Produk</label><br>
                            <input id="ambil" type="radio" placeholder="status" name="status" value="2" <?= $o['transaksi_paket'] == '2' ? 'checked' : ''; ?> required>
                            <label for="ambil">Ambil Sendiri</label>
                        </div>
                    </div>
                    <script>
                        if ($('#casing3').is(':checked')) $('#varian_karet').show();
                        else $('#varian_karet').hide();
                        $('input[name="casing"]').click(function() {
                            if ($('#casing3').is(':checked')) $('#varian_karet').show();
                            else $('#varian_karet').hide();
                        });
                    </script>
                <?php elseif ($p['product_tipe'] == '2') : ?>
                    <!-- Tali -->
                    <div class="grid-container">
                        <div class="grid-item p-0 pb-3">
                            <b>Material</b>
                            <br><br>
                            <input id="material1" type="radio" placeholder="material" name="material" value="1" <?= $o['transaksi_material'] == '1' ? 'checked' : ''; ?> required>
                            <label for="material1">Polyester 1,5CM</label><br>
                            <input id="material2" type="radio" placeholder="material" name="material" value="2" <?= $o['transaksi_material'] == '2' ? 'checked' : ''; ?> required>
                            <label for="material2">Polyester 2CM</label><br>
                            <input id="material3" type="radio" placeholder="material" name="material" value="3" <?= $o['transaksi_material'] == '3' ? 'checked' : ''; ?> required>
                            <label for="material3">Polyester 2,5CM</label><br>
                            <input id="material4" type="radio" placeholder="material" name="material" value="4" <?= $o['transaksi_material'] == '4' ? 'checked' : ''; ?> required>
                            <label for="material4">Tissue 1,5CM</label><br>
                            <input id="material5" type="radio" placeholder="material" name="material" value="5" <?= $o['transaksi_material'] == '5' ? 'checked' : ''; ?> required>
                            <label for="material5">Tissue 2CM</label><br>
                            <input id="material6" type="radio" placeholder="material" name="material" value="6" <?= $o['transaksi_material'] == '6' ? 'checked' : ''; ?> required>
                            <label for="material6">Tissue 2,5CM</label><br>
                            <input id="material7" type="radio" placeholder="material" name="material" value="7" <?= $o['transaksi_material'] == '7' ? 'checked' : ''; ?> required>
                            <label for="material7">Tali gelang 1,5cm printing</label><br>
                            <input id="material8" type="radio" placeholder="material" name="material" value="8" <?= $o['transaksi_material'] == '8' ? 'checked' : ''; ?> required>
                            <label for="material8">Tali gelang 2cm printing</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <?php $finish = explode(',', $o['transaksi_finish'] ?? ''); ?>
                            <b>Finishing</b>
                            <br><br>
                            <input id="finishing1" type="checkbox" placeholder="finish" name="finish[]" value="1" <?= in_array('1', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing1">Kait Oval</label><br>
                            <input id="finishing11" type="checkbox" placeholder="finish" name="finish[]" value="2" <?= in_array('2', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing11">Kait Tebal</label><br>
                            <input id="finishing2" type="checkbox" placeholder="finish" name="finish[]" value="3" <?= in_array('3', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing2">Kait HP</label><br>
                            <input id="finishing3" type="checkbox" placeholder="finish" name="finish[]" value="4" <?= in_array('4', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing3">Kait Standar</label><br>
                            <input id="finishing4" type="checkbox" placeholder="finish" name="finish[]" value="5" <?= in_array('5', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing4">Tambah Warna Sablon</label><br>
                            <input id="finishing5" type="checkbox" placeholder="finish" name="finish[]" value="6" <?= in_array('6', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing5">Double Stopper</label><br>
                            <input id="finishing6" type="checkbox" placeholder="finish" name="finish[]" value="7" <?= in_array('7', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing6">Stopper Tas</label><br>
                            <input id="finishing7" type="checkbox" placeholder="finish" name="finish[]" value="8" <?= in_array('8', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing7">Stopper Rotate</label><br>
                            <input id="finishing8" type="checkbox" placeholder="finish" name="finish[]" value="9" <?= in_array('9', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing8">Jahit</label><br>
                            <input id="finishing9" type="checkbox" placeholder="finish" name="finish[]" value="10" <?= in_array('10', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing9">Tali Karung</label><br>
                            <input id="finishing10" type="checkbox" placeholder="finish" name="finish[]" value="11" <?= in_array('11', $finish) ? 'checked' : ''; ?>>
                            <label for="finishing10">Ring Vape</label><br>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Jenis Produksi</b>
                            <br><br>
                            <input id="jp1" type="radio" placeholder="jp" name="jp" value="1" <?= $o['transaksi_jp'] == '1' ? 'checked' : ''; ?> required>
                            <label for="jp1">Sablon</label><br>
                            <input id="jp2" type="radio" placeholder="jp" name="jp" value="2" <?= $o['transaksi_jp'] == '2' ? 'checked' : ''; ?> required>
                            <label for="jp2">Printing</label><br>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Ambil/Kirim</b>
                            <br><br>
                            <input id="kirim" type="radio" placeholder="status" name="status" value="1" <?= $o['transaksi_paket'] == '1' ? 'checked' : ''; ?> required>
                            <label for="kirim">Kirim Produk</label><br>
                            <input id="ambil" type="radio" placeholder="status" name="status" value="2" <?= $o['transaksi_paket'] == '2' ? 'checked' : ''; ?> required>
                            <label for="ambil">Ambil Sendiri</label>
                        </div>
                    </div>
                <?php elseif ($p['product_tipe'] == '3') : ?>
                    <!-- E-Money -->
                    <div class="grid-container">
                        <div class="grid-item p-0 pb-3">
                            <b>Bank</b>
                            <br><br>
                            <input id="bank1" type="radio" placeholder="bank" name="bank" value="1" <?= $o['transaksi_spk_bank'] == '1' ? 'checked' : ''; ?> required>
                            <label for="bank1">Bank BCA (Flazz)</label><br>
                            <input id="bank2" type="radio" placeholder="bank" name="bank" value="2" <?= $o['transaksi_spk_bank'] == '2' ? 'checked' : ''; ?> required>
                            <label for="bank2">Bank Mandiri (E-Toll)</label><br>
                            <input id="bank3" type="radio" placeholder="bank" name="bank" value="3" <?= $o['transaksi_spk_bank'] == '3' ? 'checked' : ''; ?> required>
                            <label for="bank3">Bank BRI (Brizzi)</label><br>
                            <input id="bank4" type="radio" placeholder="bank" name="bank" value="4" <?= $o['transaksi_spk_bank'] == '4' ? 'checked' : ''; ?> required>
                            <label for="bank4">Bank BNI (Tapcash)</label><br>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Print</b>
                            <br><br>
                            <input id="printsisi1" type="radio" placeholder="print" name="printsisi" value="1" <?= $o['transaksi_spk_print'] == '1' ? 'checked' : ''; ?> required>
                            <label for="printsisi1">Satu sisi</label><br>
                            <input id="printsisi2" type="radio" placeholder="print" name="printsisi" value="2" <?= $o['transaksi_spk_print'] == '2' ? 'checked' : ''; ?> required>
                            <label for="printsisi2">Dua Sisi</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <?php $personalisasi = explode(',', $o['transaksi_personalisasi'] ?? ''); ?>
                            <b>Personalisasi</b>
                            <br><br>
                            <div class="form-group">
                                <input id="persona1" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="1" <?= in_array('1', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona1">Blanko</label><br>
                                <input id="persona2" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="2" <?= in_array('2', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona2">Nomerator</label><br>
                                <input id="persona3" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="3" <?= in_array('3', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona3">Barcode</label><br>
                                <input id="persona4" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="4" <?= in_array('4', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona4">Data</label><br>
                                <input id="persona5" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="5" <?= in_array('5', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona5">Data + Foto</label>
                            </div>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <?php $packaging = explode(',', $o['transaksi_packaging'] ?? ''); ?>
                            <b>Packaging</b>
                            <br><br>
                            <input id="packaging1" type="checkbox" placeholder="packaging" name="packaging[]" value="1" <?= in_array('1', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging1">Plastik 1 on 1</label><br>
                            <input id="packaging4" type="checkbox" placeholder="packaging" name="packaging[]" value="2" <?= in_array('2', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging4">Box Putih</label><br>
                            <input id="packaging5" type="checkbox" placeholder="packaging" name="packaging[]" value="3" <?= in_array('3', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging5">Small UCARD</label><br>
                            <input id="packaging6" type="checkbox" placeholder="packaging" name="packaging[]" value="4" <?= in_array('4', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging6">Small Maxi UCARD</label><br>
                            <input id="packaging7" type="checkbox" placeholder="packaging" name="packaging[]" value="5" <?= in_array('5', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging7">Large UCARD</label><br>
                            <input id="packaging8" type="checkbox" placeholder="packaging" name="packaging[]" value="6" <?= in_array('6', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging8">Large Maxi UCARD</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Coating</b>
                            <br><br>
                            <input id="coating1" type="radio" placeholder="coating" name="coating" value="1" <?= $o['transaksi_coating'] == '1' ? 'checked' : ''; ?> required>
                            <label for="coating1">UV</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <?php $finishing = explode(',', $o['transaksi_finishing'] ?? ''); ?>
                            <b>Finishing</b>
                            <br><br>
                            <input id="finishing1" type="checkbox" placeholder="finishing" name="finishing[]" value="1" <?= in_array('1', $finishing) ? 'checked' : ''; ?>>
                            <label for="finishing1">Tidak Ada</label><br>
                            <input id="finishing2" type="checkbox" placeholder="finishing" name="finishing[]" value="2" <?= in_array('2', $finishing) ? 'checked' : ''; ?>>
                            <label for="finishing2">Urutkan</label><br>
                            <input id="finishing3" type="checkbox" placeholder="finishing" name="finishing[]" value="3" <?= in_array('3', $finishing) ? 'checked' : ''; ?>>
                            <label for="finishing3">Pakai NO</label><br>
                            <input id="finishing4" type="checkbox" placeholder="finishing" name="finishing[]" value="4" <?= in_array('4', $finishing) ? 'checked' : ''; ?>>
                            <label for="finishing4">Tanpa NO</label><br>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Ambil/Kirim</b>
                            <br><br>
                            <input id="kirim" type="radio" placeholder="status" name="status" value="1" <?= $o['transaksi_paket'] == '1' ? 'checked' : ''; ?> required>
                            <label for="kirim">Kirim Produk</label><br>
                            <input id="ambil" type="radio" placeholder="status" name="status" value="2" <?= $o['transaksi_paket'] == '2' ? 'checked' : ''; ?> required>
                            <label for="ambil">Ambil Sendiri</label>
                        </div>
                    </div>
                <?php elseif ($p['product_tipe'] == '4') : ?>
                    <!-- Tali -->
                    <div class="grid-container">
                        <div class="grid-item p-0 pb-3">
                            <b>Varian</b>
                            <br><br>
                            <input id="varian1" type="radio" placeholder="varian" name="varian" value="1" <?= $o['transaksi_spk_varian'] == '1' ? 'checked' : ''; ?> required>
                            <label for="varian1">USB Flashdisk Card 8 GB</label><br>
                            <input id="varian2" type="radio" placeholder="varian" name="varian" value="2" <?= $o['transaksi_spk_varian'] == '2' ? 'checked' : ''; ?> required>
                            <label for="varian2">USB Flashdisk Card 16 GB</label><br>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Print</b>
                            <br><br>
                            <input id="printsisi1" type="radio" placeholder="print" name="printsisi" value="1" <?= $o['transaksi_spk_print'] == '1' ? 'checked' : ''; ?> required>
                            <label for="printsisi1">Satu sisi</label><br>
                            <input id="printsisi2" type="radio" placeholder="print" name="printsisi" value="2" <?= $o['transaksi_spk_print'] == '2' ? 'checked' : ''; ?> required>
                            <label for="printsisi2">Dua Sisi</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <?php $personalisasi = explode(',', $o['transaksi_personalisasi'] ?? ''); ?>
                            <b>Personalisasi</b>
                            <br><br>
                            <div class="form-group">
                                <input id="persona1" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="1" <?= in_array('1', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona1">Blanko</label><br>
                                <input id="persona2" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="2" <?= in_array('2', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona2">Nomerator</label><br>
                                <input id="persona3" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="3" <?= in_array('3', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona3">Barcode</label><br>
                                <input id="persona4" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="4" <?= in_array('4', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona4">Data</label><br>
                                <input id="persona5" type="checkbox" placeholder="personalisasi" name="personalisasi[]" value="5" <?= in_array('5', $personalisasi) ? 'checked' : ''; ?>>
                                <label for="persona5">Data + Foto</label>
                            </div>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <?php $packaging = explode(',', $o['transaksi_packaging'] ?? ''); ?>
                            <b>Packaging</b>
                            <br><br>
                            <input id="packaging1" type="checkbox" placeholder="packaging" name="packaging[]" value="1" <?= in_array('1', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging1">Plastik 1 on 1</label><br>
                            <input id="packaging4" type="checkbox" placeholder="packaging" name="packaging[]" value="2" <?= in_array('2', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging4">Box Putih</label><br>
                            <input id="packaging5" type="checkbox" placeholder="packaging" name="packaging[]" value="3" <?= in_array('3', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging5">Small UCARD</label><br>
                            <input id="packaging6" type="checkbox" placeholder="packaging" name="packaging[]" value="4" <?= in_array('4', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging6">Small Maxi UCARD</label><br>
                            <input id="packaging7" type="checkbox" placeholder="packaging" name="packaging[]" value="5" <?= in_array('5', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging7">Large UCARD</label><br>
                            <input id="packaging8" type="checkbox" placeholder="packaging" name="packaging[]" value="6" <?= in_array('6', $packaging) ? 'checked' : ''; ?>>
                            <label for="packaging8">Large Maxi UCARD</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Coating</b>
                            <br><br>
                            <input id="coating1" type="radio" placeholder="coating" name="coating" value="1" <?= $o['transaksi_coating'] == '1' ? 'checked' : ''; ?> required>
                            <label for="coating1">UV</label>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <?php $finishing = explode(',', $o['transaksi_finishing'] ?? ''); ?>
                            <b>Finishing</b>
                            <br><br>
                            <input id="finishing1" type="checkbox" placeholder="finishing" name="finishing[]" value="1" <?= in_array('1', $finishing) ? 'checked' : ''; ?>>
                            <label for="finishing1">Tidak Ada</label><br>
                            <input id="finishing2" type="checkbox" placeholder="finishing" name="finishing[]" value="2" <?= in_array('2', $finishing) ? 'checked' : ''; ?>>
                            <label for="finishing2">Urutkan</label><br>
                        </div>
                        <div class="grid-item p-0 pb-3">
                            <b>Ambil/Kirim</b>
                            <br><br>
                            <input id="kirim" type="radio" placeholder="status" name="status" value="1" <?= $o['transaksi_paket'] == '1' ? 'checked' : ''; ?> required>
                            <label for="kirim">Kirim Produk</label><br>
                            <input id="ambil" type="radio" placeholder="status" name="status" value="2" <?= $o['transaksi_paket'] == '2' ? 'checked' : ''; ?> required>
                            <label for="ambil">Ambil Sendiri</label>
                        </div>
                    </div>
                <?php endif; ?>
                <label for="keterangan"><b>Keterangan</b></label>
                <textarea id="keterangan" class="form-control" cols="30" rows="5"><?= $s['transaksi_keterangan']; ?></textarea>

            </div>
            <div class="modal-footer">
                <button style="width:100%;" id="update-status" class="btn btn-primary">Save</button>
            </div>
<?php
        }
    }
    function update_kodeproduk()
    {
        $id = $this->input->post('transaksi_id');
        $kode = $this->input->post('kode');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_kodeproduk = '$kode' WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function update_noso()
    {
        $id = $this->input->post('transaksi_id');
        $noso = $this->input->post('noso');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_noso = '$noso' WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function update_resi()
    {
        $id = $this->input->post('transaksi_id');
        $resi = $this->input->post('resi');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_resi = '$resi' WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function update_ekspedisi()
    {
        $id = $this->input->post('transaksi_id');
        $ekspedisi = $this->input->post('ekspedisi');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_ekspedisi = '$ekspedisi' WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function printSPKSales()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_print_spk_sales = 1 WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function printSPKApproval()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_print_spk_approval = 1 WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function printSPKProduksi()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_print_spk_produksi = 1 WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id));
    }
    function savespksales()
    {
        $id = $this->input->post('id');
        $assesoris = $this->input->post('assesoris');
        $keteranganspk = $this->input->post('keteranganspk');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_keterangan_accesoris = '$keteranganspk' WHERE transaksi_id = '$id';");
        $this->db->query("UPDATE tbl_transaksi SET transaksi_spkkartu_assesoris = '$assesoris' WHERE transaksi_id = '$id';");
        redirect(base_url('Order/detail/' . $id . '#spk_sales'));
    }
    function savespkapv()
    {
        $id = $this->input->post('id');
        $JLembarAwal = $this->input->post('JLembarAwal');
        $JLembarAkhir = $this->input->post('JLembarAkhir');
        $JOverlayAwal = $this->input->post('JOverlayAwal');
        $JOverlayAkhir = $this->input->post('JOverlayAkhir');
        $JChipAwal = $this->input->post('JChipAwal');
        $JChipAkhir = $this->input->post('JChipAkhir');
        $JMagneticAwal = $this->input->post('JMagneticAwal');
        $JMagneticAkhir = $this->input->post('JMagneticAkhir');
        $JKartuRusak = $this->input->post('JKartuRusak');
        $JLembarRusak = $this->input->post('JLembarRusak');
        $JTaliAwal = $this->input->post('JTaliAwal');
        $JTaliAkhir = $this->input->post('JTaliAkhir');
        $JTaliStopperAwal = $this->input->post('JTaliStopperAwal');
        $JTaliStopperAkhir = $this->input->post('JTaliStopperAkhir');
        $JKlemAwal = $this->input->post('JKlemAwal');
        $JKlemAkhir = $this->input->post('JKlemAkhir');
        $JKaitAwal = $this->input->post('JKaitAwal');
        $JKaitAkhir = $this->input->post('JKaitAkhir');
        $JStopperAwal = $this->input->post('JStopperAwal');
        $JStopperAkhir = $this->input->post('JStopperAkhir');
        $spkOperator = $this->input->post('spkOperator');
        $tanggalJamFix = $this->input->post('tanggalJamFix');
        $kodeFix = $this->input->post('kodeFix');
        $Speeling = $this->input->post('Speeling');
        $deadline = $this->input->post('deadline');
        $noPenyelesaian = $this->input->post('noPenyelesaian');

        $data = array(
            'transaksi_spkkartu_jumlahlembarawal'                      => $JLembarAwal,
            'transaksi_spkkartu_jumlahlembarakhir'                     => $JLembarAkhir,
            'transaksi_spkkartu_jumlahoverlayawal'                     => $JOverlayAwal,
            'transaksi_spkkartu_jumlahoverlayakhir'                    => $JOverlayAkhir,
            'transaksi_spk_jumlahtaliawal'                             => $JTaliAwal,
            'transaksi_spk_jumlahtaliakhir'                            => $JTaliAkhir,
            'transaksi_spk_jumlahtalistopperawal'                      => $JTaliStopperAwal,
            'transaksi_spk_jumlahtalistopperakhir'                     => $JTaliStopperAkhir,
            'transaksi_spk_jumlahklemawal'                             => $JKlemAwal,
            'transaksi_spk_jumlahklemakhir'                            => $JKlemAkhir,
            'transaksi_spk_jumlahkaitawal'                             => $JKaitAwal,
            'transaksi_spk_jumlahkaitakhir'                            => $JKaitAkhir,
            'transaksi_spk_jumlahstopperawal'                          => $JStopperAwal,
            'transaksi_spk_jumlahstopperakhir'                         => $JStopperAkhir,
            'transaksi_spk_operator'                                   => $spkOperator,
            'transaksi_spkkartu_jumlahchipawal'                        => $JChipAwal,
            'transaksi_spkkartu_jumlahchipakhir'                       => $JChipAkhir,
            'transaksi_spkkartu_jumlahlembarrusak'                     => $JLembarRusak,
            'transaksi_spkkartu_jumlahkarturusak'                      => $JKartuRusak,
            'transaksi_spkkartu_jumlahmagneticawal'                    => $JMagneticAwal,
            'transaksi_spkkartu_jumlahmagneticakhir'                   => $JMagneticAkhir,
            'transaksi_spk_tanggaljamfix'                              => $tanggalJamFix,
            'transaksi_spk_kodefix'                                    => $kodeFix,
            'transaksi_spk_speeling'                                   => $Speeling,
            'transaksi_spk_deadline'                                   => $deadline,
            'transaksi_no_penyelesaian'                                => $noPenyelesaian
        );
        $this->db->where('transaksi_id', $id);
        $this->db->update('tbl_transaksi', $data);
    }
    function savespkprdksi()
    {
        $id = $this->input->post('id');
        $JLembarAwal = $this->input->post('JLembarAwal');
        $JLembarAkhir = $this->input->post('JLembarAkhir');
        $JOverlayAwal = $this->input->post('JOverlayAwal');
        $JOverlayAkhir = $this->input->post('JOverlayAkhir');
        $JChipAwal = $this->input->post('JChipAwal');
        $JChipAkhir = $this->input->post('JChipAkhir');
        $JMagneticAwal = $this->input->post('JMagneticAwal');
        $JMagneticAkhir = $this->input->post('JMagneticAkhir');
        $JTaliAwal = $this->input->post('JTaliAwal');
        $JTaliAkhir = $this->input->post('JTaliAkhir');
        $JTaliStopperAwal = $this->input->post('JTaliStopperAwal');
        $JTaliStopperAkhir = $this->input->post('JTaliStopperAkhir');
        $JKlemAwal = $this->input->post('JKlemAwal');
        $JKlemAkhir = $this->input->post('JKlemAkhir');
        $JKaitAwal = $this->input->post('JKaitAwal');
        $JKaitAkhir = $this->input->post('JKaitAkhir');
        $JStopperAwal = $this->input->post('JStopperAwal');
        $JStopperAkhir = $this->input->post('JStopperAkhir');
        $spkOperator = $this->input->post('spkOperator');
        $spkMaterial = $this->input->post('spkMaterial');
        $tanggalJamFix = $this->input->post('tanggalJamFix');
        $kodeFix = $this->input->post('kodeFix');
        $Speeling = $this->input->post('Speeling');
        $deadline = $this->input->post('deadline');
        $noPenyelesaian = $this->input->post('noPenyelesaian');
        $JKartuRusak = $this->input->post('JKartuRusak');
        $JLembarRusak = $this->input->post('JLembarRusak');

        $data = array(
            'transaksi_spkkartu_jumlahlembarawal'                      => $JLembarAwal,
            'transaksi_spkkartu_jumlahlembarakhir'                     => $JLembarAkhir,
            'transaksi_spkkartu_jumlahoverlayawal'                     => $JOverlayAwal,
            'transaksi_spkkartu_jumlahoverlayakhir'                    => $JOverlayAkhir,
            'transaksi_spkkartu_jumlahmagneticawal'                    => $JMagneticAwal,
            'transaksi_spkkartu_jumlahmagneticakhir'                   => $JMagneticAkhir,
            'transaksi_spkkartu_jumlahchipawal'                        => $JChipAwal,
            'transaksi_spkkartu_jumlahchipakhir'                       => $JChipAkhir,
            'transaksi_spk_jumlahtaliawal'                             => $JTaliAwal,
            'transaksi_spk_jumlahtaliakhir'                            => $JTaliAkhir,
            'transaksi_spk_jumlahtalistopperawal'                      => $JTaliStopperAwal,
            'transaksi_spk_jumlahtalistopperakhir'                     => $JTaliStopperAkhir,
            'transaksi_spk_jumlahklemawal'                             => $JKlemAwal,
            'transaksi_spk_jumlahklemakhir'                            => $JKlemAkhir,
            'transaksi_spk_jumlahkaitawal'                             => $JKaitAwal,
            'transaksi_spk_jumlahkaitakhir'                            => $JKaitAkhir,
            'transaksi_spk_jumlahstopperawal'                          => $JStopperAwal,
            'transaksi_spk_jumlahstopperakhir'                         => $JStopperAkhir,
            'transaksi_spk_operator'                                   => $spkOperator,
            'transaksi_material'                                   => $spkMaterial,
            'transaksi_spk_tanggaljamfix'                              => $tanggalJamFix,
            'transaksi_spk_kodefix'                                    => $kodeFix,
            'transaksi_spk_speeling'                                   => $Speeling,
            'transaksi_spk_deadline'                                   => $deadline,
            'transaksi_no_penyelesaian'                                => $noPenyelesaian,
            'transaksi_spkkartu_jumlahlembarrusak'                     => $JLembarRusak,
            'transaksi_spkkartu_jumlahkarturusak'                      => $JKartuRusak
        );
        $this->db->where('transaksi_id', $id);
        $this->db->update('tbl_transaksi', $data);
    }
    function upload_foto_resi()
    {
        $id = $this->input->post('id');
        $transaksi_id = $this->input->post('transaksi_id');
        $foto_resi = $_FILES['foto_resi']['name'];
        $config['upload_path']          = './foto_resi/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_resi')) {
            $this->upload->data();
        }

        $a = $this->upload->data('file_name');

        $data = [
            'transaksi_foto_resi' => $a
        ];

        $this->db->where('transaksi_id', $transaksi_id);
        $this->db->update('tbl_transaksi', $data);
        redirect('Order/detail/' . $transaksi_id);
    }

    function edit_keterangan()
    {
        $transaksi_id                 = $this->input->post('id');
        $keterangan_gudang            = $this->input->post('keterangan_gudang');
        $keterangan_identifikasi      = $this->input->post('keterangan_identifikasi');
        $keterangan_cetak             = $this->input->post('keterangan_cetak');
        $keterangan_press             = $this->input->post('keterangan_press');
        $keterangan_plong             = $this->input->post('keterangan_plong');
        $keterangan_finishing         = $this->input->post('keterangan_finishing');
        $keterangan_qualitycontrol    = $this->input->post('keterangan_qualitycontrol');
        $keterangan_siapkirim         = $this->input->post('keterangan_siapkirim');

        $jumlah_gudang                = $this->input->post('jumlah_gudang');
        $jumlah_identifikasi          = $this->input->post('jumlah_identifikasi');
        $jumlah_cetak                 = $this->input->post('jumlah_cetak');
        $jumlah_press                 = $this->input->post('jumlah_press');
        $jumlah_plong                 = $this->input->post('jumlah_plong');
        $jumlah_finishing             = $this->input->post('jumlah_finishing');
        $jumlah_qualitycontrol        = $this->input->post('jumlah_qualitycontrol');
        $jumlah_siapkirim             = $this->input->post('jumlah_siapkirim');

        if ($keterangan_gudang)         $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_gudang)
            ->set('transaksi_keterangan', $keterangan_gudang)
            ->where('transaksi_produksi_status_id', '51')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');
        if ($keterangan_identifikasi)   $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_identifikasi)
            ->set('transaksi_keterangan', $keterangan_identifikasi)
            ->where('transaksi_produksi_status_id', '52')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');
        if ($keterangan_cetak)          $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_cetak)
            ->set('transaksi_keterangan', $keterangan_cetak)
            ->where('transaksi_produksi_status_id', '53')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');
        if ($keterangan_press)          $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_press)
            ->set('transaksi_keterangan', $keterangan_press)
            ->where('transaksi_produksi_status_id', '54')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');
        if ($keterangan_plong)          $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_plong)
            ->set('transaksi_keterangan', $keterangan_plong)
            ->where('transaksi_produksi_status_id', '55')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');
        if ($keterangan_finishing)      $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_finishing)
            ->set('transaksi_keterangan', $keterangan_finishing)
            ->where('transaksi_produksi_status_id', '56')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');
        if ($keterangan_qualitycontrol) $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_qualitycontrol)
            ->set('transaksi_keterangan', $keterangan_qualitycontrol)
            ->where('transaksi_produksi_status_id', '57')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');
        if ($keterangan_siapkirim)      $this->db
            ->set('transaksi_jumlah_produksi', $jumlah_siapkirim)
            ->set('transaksi_keterangan', $keterangan_siapkirim)
            ->where('transaksi_produksi_status_id', '58')
            ->where('transaksi_order_id', $transaksi_id)
            ->update('tbl_status_transaksi');

        redirect(base_url('Order/detail/' . $transaksi_id));
    }
}
