<?php

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');
        }
    }

    function tes()
    {
        $this->load->library('email');

        $this->email->from('amarizky02@gmail.com', 'noreply');
        $this->email->to('yogacheater@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
    }

    function index()
    {
        $x['title'] = "Order";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE transaksi_terima IS NULL ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function verifikasi()
    {
        $x['title'] = "VERIFIKASI";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '1' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function kirim_design()
    {
        $x['title'] = "KIRIM DESIGN";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '2' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function pembayaran()
    {
        $x['title'] = "PEMBAYARAN";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '3' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function cetak_produk()
    {
        $x['title'] = "CETAK PRODUK";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '4' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function kirim_ambil()
    {
        $x['title'] = "AMBIL / KIRIM";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama, s.transaksi_status_id, s.transaksi_order_id, s.transaksi_status, s.transaksi_keterangan FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '5' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order', $x);
        $this->load->view('admin/template/V_footer');
    }
    function history()
    {
        $x['title'] = "ORDER HISTORY";
        $x['order'] = $this->db->query("SELECT t.*,p.pelanggan_nama FROM tbl_transaksi AS t JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE t.transaksi_terima = '1' OR t.transaksi_terima = '0' ")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_order_history', $x);
        $this->load->view('admin/template/V_footer');
    }
    function check_status()
    {
        echo $this->db->query("SELECT transaksi_status FROM tbl_status_transaksi WHERE transaksi_status = '2' ")->num_rows();
    }
    function new_status()
    {
        $status = $this->db->query("SELECT * FROM tbl_status_transaksi AS st JOIN tbl_status AS s ON st.transaksi_status_id = s.status_id JOIN tbl_transaksi AS t ON t.transaksi_id = st.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE transaksi_status = '2' ")->result_array();
        $html = '';
        foreach ($status as $s) {
            $html .= '<a href="' . base_url('Order/detail/' . $s['transaksi_id']) . '" class="list-group-item list-group-item-action">
         <div class="row align-items-center">
           <div class="col-auto">
             <!-- Avatar -->
             <i class="' . $s['status_icon'] . '"></i>
           </div>
           <div class="col ml--2">
             <div class="d-flex justify-content-between align-items-center">
               <div>
                 <h4 class="mb-0 text-sm">' . $s['pelanggan_nama'] . '</h4>
               </div>
               <div class="text-right text-muted">
                 <small>' . $s['status_status'] . '</small>
               </div>
             </div>
             <p class="text-sm mb-0">Menunggu Konfirmasi</p>
           </div>
         </div>
       </a>';
        }
        echo $html;
    }
    function get_data()
    {
        $id = $this->input->post('id');
        $status = $this->db->query("SELECT * FROM tbl_status")->result_array();
        $e = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.transaksi_nohp = tbl_pelanggan.pelanggan_nohp JOIN tbl_product ON tbl_transaksi.transaksi_product_id = tbl_product.product_id WHERE transaksi_id = '$id' ")->row_array();
        $html = '<div class="modal-body">
				<div id="alert_update"></div>
                <div class="tab">
                  <button class="tablinks" onclick="openTabs(event, \'Detail\')">Detail</button>
                  <button class="tablinks" onclick="openTabs(event, \'bukti\')">Bukti Transaksi</button>
                </div>

<div id="Detail" class="tabcontent">
  <div class="row">
                    <div class="col-md-6">
                    <h2 class="text-center">Pelanggan</h2>
                    <hr class="m-2">
                    <b>Nama</b>
                    <p>' . $e['pelanggan_nama'] . '</p>
                    <b>Email</b>
                    <p>' . $e['pelanggan_email'] . '</p>
                    <b>Tgl Lahir</b>
                    <p>' . $e['pelanggan_lahir'] . '</p>
                    <b>Alamat</b>
                    <p>' . $e['pelanggan_alamat'] . '</p>
                    <b>Whatsapp</b>
                    <p>' . $e['pelanggan_nohp'] . '</p>
                    <b>Kecamatan</b>
                    <p>' . $e['pelanggan_kecamatan'] . '</p>
                    <b>Kabupaten</b>
                    <p>' . $e['pelanggan_kabupaten'] . '</p>
                    <b>Kodepost</b>
                    <p>' . $e['pelanggan_kodepost'] . '</p>
                    </div>
                    <div class="col-md-6">
                    <h2 class="text-center">Product</h2>
                    <hr class="m-2">
                        <b>Product</b>
                        <p>' . $e['product_nama'] . '</p>
                        <b>Jumlah</b>
                        <p>' . $e['transaksi_jumlah'] . '</p>
                        <b>Harga</b>';
        if (empty($e['transaksi_harga'])) {
            $html .= '<p>Harga Belum Di Tentukan</p>';
        } else {
            $html .= '<p>Rp. ' . number_format($e['transaksi_harga']) . '</p>';
        }
        $html .= '<br>
                    <b>Keterangan</b>
                    <p>' . $e['transaksi_keterangan'] . '</p>
                    </div>
                </div>
</div>

<div id="bukti" class="tabcontent">';
        if ($e['transaksi_bukti'] == NULL) {
            $html .= 'Belum ada bukti transaksi';
        } else {
            $html .= '<img style="width:300px;" src="' . base_url('bukti_transaksi/' . $e['transaksi_bukti']) . '" >';
        }
        $html .= '</div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>';
        echo $html;
    }
    function get_data_design()
    {
        $id = $this->input->post('id');
        $id_transaksi = $this->input->post('id_transaksi');
        $g = $this->db->query("SELECT * FROM tbl_user_design WHERE design_id = '$id' ")->row_array();
        $html = '<div id="alert"></div><div class="row">
        <div class="col-md-12">
        <center><img style="width: 200px;border-radius:5px;" src="' . base_url('design_user/') . $g['design_image'] . '" alt=""><br>
        <p>' . $g['design_width'] . ' X ' . $g['design_height'] . '</p>
        <br>
        <div>
        <table style="width:100%;">
        <tr>
        <td><a style="width: 100%;" href="' . base_url('Editor?design=') . $g['design_id'] . '&level=2&id=' . $id_transaksi . '" class="btn btn-primary">Edit Design</a></center></td>
        <td><button style="width: 100%;" id="hapus_design" class="btn btn-danger">Hapus Design</button></center></td>
        </tr>
        </table>
        </div>
        </div>
    </div>';
        echo $html;
    }
    function hapus_design()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_user_design WHERE design_id = '$id' ");
    }
    function update_order()
    {
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');
        if (empty($harga)) {
            $h = NULL;
        } else {
            $h = $harga;
        }
        $this->db->query("UPDATE tbl_transaksi SET transaksi_harga = '$h' WHERE transaksi_id = '$id' ");
    }
    function hapus_order()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_transaksi WHERE transaksi_id = '$id' ");
        $this->db->query("DELETE FROM tbl_status_transaksi WHERE transaksi_order_id = '$id' ");
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
        $o = $this->db->query("SELECT * FROM tbl_transaksi AS t JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE transaksi_id = '$id' ")->row_array();
        if (!$o) {
            redirect('Order');
        } else {
            $x['o'] = $o;
            $id_product = $o['transaksi_product_id'];
            $x['p'] = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id_product' ")->row_array();
            $x['bank'] = $this->db->query("SELECT * FROM tbl_bank")->result_array();
            $x['status'] = $this->db->query("SELECT * FROM tbl_status")->result_array();
            $this->load->view('admin/template/V_header', $x);
            $this->load->view('admin/V_detail', $x);
            $this->load->view('admin/template/V_footer');
        }
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
        $id_status = $this->input->post('id_status');
        $status_urut = $this->input->post('id_status') + 1;
        $id = $this->input->post('id');
        $keputusan = $this->input->post('keputusan');
        $keterangan = $this->input->post('keterangan');
        $user = $this->input->post('user');
        $tanggal_ini = time();
        if ($keputusan == '1') {
            if ($id_status == '4') {
                $k = 'PRODUCT SELESAI DICETAK';
                $s = $this->db->query("SELECT * FROM tbl_status WHERE status_id = '$status_urut' ")->row_array();
                $tanggal_hangus = $tanggal_ini + (86400 * $s['status_jangka_waktu']);
                $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = '$keputusan', transaksi_keterangan = '$keterangan' WHERE transaksi_status_id = '$id_status' AND transaksi_order_id = '$id' ");

                $this->db->set('verif_cetak', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
            } else {
                $k = 'DITERIMA';
                $s = $this->db->query("SELECT * FROM tbl_status WHERE status_id = '$status_urut' ")->row_array();
                $tanggal_hangus = $tanggal_ini + (86400 * $s['status_jangka_waktu']);
                $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = '$keputusan', transaksi_keterangan = '$keterangan' WHERE transaksi_status_id = '$id_status' AND transaksi_order_id = '$id' ");

                switch ($id_status) {
                    case "1":
                        $dataVerif = array(
                            'transaksi_id'  => $id,
                            'verif_pesanan' => $user
                        );
                        $this->db->insert('tbl_verifikasi', $dataVerif);
                        break;
                    case "2":
                        $this->db->set('verif_desain', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                        break;
                    case "3":
                        $this->db->set('verif_pembayaran', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
                        break;
                    default:
                        break;
                }
            }
        } else {
            $k = 'DITOLAK';
            $s = $this->db->query("SELECT * FROM tbl_status WHERE status_id = '$id_status' ")->row_array();
            $tanggal_hangus = $tanggal_ini + (86400 * $s['status_jangka_waktu']);
            $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = '$keputusan', transaksi_keterangan = '$keterangan', transaksi_tanggal = '$tanggal_ini', transaksi_tanggal_hangus = '$tanggal_hangus' WHERE transaksi_status_id = '$id_status' AND transaksi_order_id = '$id' ");
        }
        // $e = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.transaksi_nohp = tbl_pelanggan.pelanggan_nohp JOIN tbl_product ON tbl_transaksi.transaksi_product_id = tbl_product.product_id WHERE transaksi_id = '$id' ")->row_array();
        if ($status_urut <= 5 && $keputusan == 1) {
            $this->db->query("INSERT INTO tbl_status_transaksi VALUES (NULL,'$status_urut','$id',NULL,NULL,$tanggal_ini,$tanggal_hangus) ");
        }
        // $mail = '<html lang="en">
        // <head>
        // </head>
        // <body>
        //     <center>
        //     <img src="https://amarizky.site/assets/img/logo-kartuidcard-blue.png" alt="">
        //     <hr>
        //     <br>

        //     <h1 style="font-weight:bold;">'.$k.'</h1>
        //     <br>
        //     <table>
        //     <tr>
        //     <td>Product<td>
        //     <td> : <td>
        //     <td>'.$e['product_nama'].'<td>
        //     </tr>
        //     <tr>
        //     <td>Jumlah<td>
        //     <td> : <td>
        //     <td>'.$e['transaksi_jumlah'].'<td>
        //     </tr>
        //     <tr>
        //     <td>Harga<td>
        //     <td> : <td>
        //     <td>Rp. '.number_format($e['transaksi_harga']).'<td>
        //     </tr>
        //     </table
        //     <br>
        //     <a href="'.base_url('Order_pelanggan/detail/'.$id.'/'.$e['pelanggan_password']).'" style="background-color: blue;
        //     border: none;
        //     color: white;
        //     border-radius:10px;
        //     padding: 15px 32px;
        //     text-align: center;
        //     text-decoration: none;
        //     display: inline-block;
        //     font-size: 16px;
        //     margin: 4px 2px;
        //     cursor: pointer;">Lihat Detail</a>
        //     </center>
        // </body>
        // </html>';

        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://mail.appgarden.xyz',
        //     'smtp_user' => 'hello@appgarden.xyz',
        //     'smtp_pass' => 'Sari1920',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'crlf' => "\r\n",
        //     'newline' => "\r\n",
        //     'wordwrap' => TRUE
        // ];

        // $this->load->library('email', $config);

        // $this->email->from('hello@appgarden.xyz', 'UCARD INDONESIA');
        // $this->email->to('mhsanugrah@gmail.com');
        // $this->email->subject('Transaksi|Ucard');
        // $this->email->message('halo');

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
        $user = $this->input->post('user');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_terima = '$val' WHERE transaksi_id = '$id' ");
        $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = '$val', transaksi_keterangan = 'Sudah Diterima' WHERE transaksi_status_id = '5' AND transaksi_order_id = '$id' ");
        $o = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_id = '$id' ")->row_array();
        $html = '<div class="wrapper">';
        if ($o['transaksi_paket'] == "1") {
            $html .= '<h2>Kirim Paket</h2>';
        } else {
            $html .= '<h2>Ambil Sendiri</h2>';
        }
        $html .= '<h2>Paket Sudah diterima</h2>';
        $html .= '</div>';
        echo $html;

        $this->db->set('verif_kirimambil', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
    }
    function check()
    {
        $check = $this->db->query("SELECT transaksi_id FROM tbl_transaksi WHERE transaksi_new = '1' ")->row_array();
        $id = $check['transaksi_id'];
        if ($check) {
            echo 'baru';
            $this->db->query("UPDATE tbl_transaksi SET transaksi_new = '0' WHERE transaksi_id = '$id' ");
        }
    }
    function check_tot()
    {
        echo $this->db->query("SELECT transaksi_id FROM tbl_transaksi WHERE transaksi_terima IS NULL ")->num_rows();
    }
    function check_v()
    {
        echo $this->db->query("SELECT t.transaksi_id AS kd FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '1' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->num_rows();
    }
    function get_status()
    {
        $id = $this->input->post('id');
        $id_status = $this->input->post('id_status');
        $s = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_status_id = '$id_status' AND transaksi_order_id = '$id' ")->row_array();
        $html = '<div class="modal-body">
        <input type="hidden" value="' . $id_status . '" id="id_status">
        <div class="form-group">
        <label>Keputusan *</label><br>
        <select id="keputusan" name="keputusan" class="form-control" required="">
        <option value="">--Pilih--</option>';

        if ($id_status != '4') {

            if ($s['transaksi_status'] == '1') {
                $html .= '<option selected value="1">Diterima</option>';
            } else {
                $html .= '<option value="1">Diterima</option>';
            }
            if ($s['transaksi_status'] == '0') {
                $html .= '<option selected value="0">Ditolak</option>';
            } else {
                $html .= '<option value="0">Ditolak</option>';
            }
        } else {
            $html .= '<option value="1">Sudah Jadi</option>';
        }
        $html .= '</select>
        </div>
        <div class="form-group">
        <label>Keterangan</label>
        <textarea id="keterangan" class="form-control" cols="30" rows="5">' . $s['transaksi_keterangan'] . '</textarea>
        </div>
      
      </div>
      <div class="modal-footer">
      <button style="width:100%;" id="update-status" class="btn btn-primary">Save</button>
      </div>';
        echo $html;
    }
    function hangus()
    {
        $hangus = $this->db->query("SELECT * FROM tbl_status_transaksi AS st JOIN tbl_status AS s ON st.transaksi_status_id = s.status_id WHERE transaksi_status IS NULL OR transaksi_status = '0' ")->result_array();
        foreach ($hangus as $h) {
            if ((time() > $h['transaksi_tanggal_hangus']) && $h['status_jangka_waktu'] !== NULL) {
                $id_s = $h['transaksi_id'];
                $id = $h['transaksi_order_id'];
                $this->db->query("UPDATE tbl_transaksi SET transaksi_terima = 0 WHERE transaksi_id = '$id' ");
                $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = 4 WHERE transaksi_id = '$id_s' ");
                // $e = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.transaksi_nohp = tbl_pelanggan.pelanggan_nohp WHERE transaksi_id = '$id' ")->row_array();
                //     $mail = '<html lang="en">
                // <head>
                // </head>
                // <body>
                //     <center>
                //     <img src="https://amarizky.site/assets/img/logo-kartuidcard-blue.png" alt="">
                //     <hr>
                //     <br>

                //     <h1 style="font-weight:bold;">BEMBELIAN GAGAL</h1>
                //     <br>
                //     <table>
                //     <tr>
                //     <td>Product<td>
                //     <td> : <td>
                //     <td>'.$e['product_nama'].'<td>
                //     </tr>
                //     <tr>
                //     <td>Jumlah<td>
                //     <td> : <td>
                //     <td>'.$e['transaksi_jumlah'].'<td>
                //     </tr>
                //     <tr>
                //     <td>Harga<td>
                //     <td> : <td>
                //     <td>Rp. '.number_format($e['transaksi_harga']).'<td>
                //     </tr>
                //     </table
                //     <br>
                //     <a href="'.base_url('Order_pelanggan/detail/'.$id.'/'.$e['pelanggan_password']).'" style="background-color: blue;
                //     border: none;
                //     color: white;
                //     border-radius:10px;
                //     padding: 15px 32px;
                //     text-align: center;
                //     text-decoration: none;
                //     display: inline-block;
                //     font-size: 16px;
                //     margin: 4px 2px;
                //     cursor: pointer;">Lihat Detail</a>
                //     </center>
                // </body>
                // </html>';

                // $config = [
                //     'protocol' => 'smtp',
                //     'smtp_host' => 'ssl://mail.appgarden.xyz',
                //     'smtp_user' => 'hello@appgarden.xyz',
                //     'smtp_pass' => 'Sari1920',
                //     'smtp_port' => 465,
                //     'mailtype' => 'html',
                //     'charset' => 'utf-8',
                //     'crlf' => "\r\n",
                //     'newline' => "\r\n",
                //     'wordwrap' => TRUE
                // ];

                // $this->load->library('email', $config);

                // $this->email->from('hello@appgarden.xyz', 'UCARD INDONESIA');
                // $this->email->to('mhsanugrah@gmail.com');
                // $this->email->subject('Transaksi|Ucard');
                // $this->email->message('halo');

                // $this->email->send();
                echo 'h';
            }
        }
    }

    function updateResi()
    {
        $id = $this->input->post('id');
        $resi = $this->input->post('resi');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_resi = '$resi' WHERE transaksi_id = '$id';");
    }
}