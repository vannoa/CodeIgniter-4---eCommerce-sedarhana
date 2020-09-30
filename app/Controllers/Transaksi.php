<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\transaksiModel;
use App\Models\barangModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Transaksi extends Controller
{
    protected $helpers = [];

    public function __construct()
    {

        // Mendeklarasikan class ProductModel menggunakan $this->product
        helper(['form']);
        $this->transaksi = new TransaksiModel();
        $this->barang = new BarangModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }

    public function index()
    {
        if(session()->get('pelanggan_nama')==''){
            session()->setFlashdata('gagal', 'Anda belum login!!!');
            return redirect()->to(base_url('login'));
        }

        $data['transaksi'] = $this->transaksi->gettransaksi();
        echo view('transaksi/index', $data);
    }

    public function gettransaksii()
    {
        $data = $this->Dashboard_model->getLatestTransaksi()->result();
        echo json_encode($data);
        
    }

    public function create()
    {
        $data['transaksi'] = $this->transaksi->gettransaksi();
        
        $data['pelanggan_nama'] = $this->transaksi->getpelanggan();

        $data['barang_nama'] = $this->transaksi->getbarang();
        
        $data['transaksi_id'] = $this->transaksi->generatetransaksi();

        return view('transaksi/create', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('transaksi_id');
        $pid = $this->request->getPost('transaksi_pid');
        $bid = $this->request->getPost('transaksi_bid');
        $harga = $this->request->getPost('transaksi_harga');
        $qnty = $this->request->getPost('transaksi_qnty');
        $total = $this->request->getPost('transaksi_total');
        $date = $this->request->getPost('transaksi_date');
        $metodep = $this->request->getPost('transaksi_metodepembayaran');
        $pembayaran = $this->request->getPost('transaksi_pembayaran');
        $kembalian = $this->request->getPost('transaksi_kembalian');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'transaksi_id' => $id,
            'transaksi_pid' => $pid,
            'transaksi_bid' => $bid,
            'transaksi_harga' => $harga,
            'transaksi_qnty' => $qnty,
            'transaksi_total' => $total,
            'transaksi_date' => $date,
            'transaksi_metodepembayaran' => $metodep,
            'transaksi_pembayaran' => $pembayaran,
            'transaksi_kembalian' => $kembalian
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_product dan membawa parameter data 
        */
        $simpan = $this->transaksi->insert_transaksi($data);

        $simpan = $this->barang->subtract_qnty($bid, $qnty);

        // require_once('autoload.php');
        // $options = array(
        //     'cluster' => 'ap1',
        //     'useTLS' => true
        // );
        // $pusher = new PusherPusher(
        //     '7a1358505603f1ad5c67', //ganti dengan App_key pusher Anda
        //     '5d0c530510a38c60b3d7', //ganti dengan App_secret pusher Anda
        //     '1064661', //ganti dengan App_key pusher Anda
        //     $options
        // );
 
        // $data['message'] = 'success';
        // $pusher->trigger('my-channel', 'my-event', $data);

        // Jika simpan berhasil, maka ...
        
        echo json_encode(array("status" => TRUE));
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created transaksi successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('transaksi'));
        }
    }

    public function edit($id)
    {
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['transaksi'] = $this->transaksi->gettransaksi($id);

        $data['pelanggan_nama'] = $this->transaksi->getpelanggan();

        $data['barang_nama'] = $this->transaksi->getbarang();

        // Mengirim data ke dalam view
        return view('transaksi/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('transaksi_id');
        $pid = $this->request->getPost('transaksi_pid');
        $bid = $this->request->getPost('transaksi_bid');
        $harga = $this->request->getPost('transaksi_harga');
        $qnty = $this->request->getPost('transaksi_qnty');
        $total = $this->request->getPost('transaksi_total');
        $date = $this->request->getPost('transaksi_date');
        $metodep = $this->request->getPost('transaksi_metodepembayaran');
        $pembayaran = $this->request->getPost('transaksi_pembayaran');
        $kembalian = $this->request->getPost('transaksi_kembalian');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'transaksi_id' => $id,
            'transaksi_pid' => $pid,
            'transaksi_bid' => $bid,
            'transaksi_harga' => $harga,
            'transaksi_qnty' => $qnty,
            'transaksi_total' => $total,
            'transaksi_date' => $date,
            'transaksi_metodepembayaran' => $metodep,
            'transaksi_pembayaran' => $pembayaran,
            'transaksi_kembalian' => $kembalian
        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->transaksi->update_transaksi($data, $id);

        // equire_once(APPPATH.'vendor/autoload.php');
        // $options = array(
        //     'cluster' => 'ap1',
        //     'useTLS' => true
        // );
        // $pusher = new PusherPusher(
        //     '7a1358505603f1ad5c67', //ganti dengan App_key pusher Anda
        //     '5d0c530510a38c60b3d7', //ganti dengan App_secret pusher Anda
        //     '1064661', //ganti dengan App_key pusher Anda
        //     $options
        // );
 
        // $data['message'] = 'success';
        // $pusher->trigger('my-channel', 'my-event', $data);

        // Jika berhasil melakukan ubah
        
        echo json_encode($data);
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated transaksi successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('transaksi'));
        }
    }

    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus = $this->transaksi->delete_transaksi($id);

        
        echo json_encode(array("status" => TRUE));
        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted transaksi successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('transaksi'));
        }
    }

    public function import()
    {
        echo view('transaksi/import');
    }

    public function proses_import()
    {
        $validation =  \Config\Services::validation();

        $file = $this->request->getFile('trx_file');

        $data = array(
            'trx_file'           => $file,
        );

        if ($validation->run($data, 'transaksi') == FALSE) {

            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('transaksi/import'));
        } else {

            // ambil extension dari file excel
            $extension = $file->getClientExtension();

            // format excel 2007 ke bawah
            if ('xls' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                // format excel 2010 ke atas
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();

            foreach ($data as $idx => $row) {

                // lewati baris ke 0 pada file excel
                // dalam kasus ini, array ke 0 adalahpara title
                if ($idx == 0) {
                    continue;
                }

                // get product_id from excel
                $transaksi_id     = $row[0];
                // get trx_date from excel
                $transaksi_pid       = $row[1];
                // tampilkan harga product berdasarkan product_id menggunakan function getTrxPrice()
                $transaksi_bid      = ($row[2]);
                $transaksi_harga      = ($row[3]);
                $transaksi_qnty      = ($row[4]);
                $transaksi_total      = ($row[5]);
                $transaksi_date      = ($row[6]);
                $transaksi_metodepembayaran      = ($row[7]);
                $transaksi_pembayaran      = ($row[8]);
                $transaksi_kembalian      = ($row[9]);

                $data = [
                    "transaksi_id"    => $transaksi_id,
                    "transaksi_pid "      => $transaksi_pid,
                    "transaksi_bid"     => $transaksi_bid,
                    "transaksi_harga"     => $transaksi_harga,
                    "transaksi_qnty"     => $transaksi_qnty,
                    "transaksi_total"     => $transaksi_total,
                    "transaksi_date"     => $transaksi_date,
                    "transaksi_metodepembayaran"     => $transaksi_metodepembayaran,
                    "transaksi_pembayaran"     => $transaksi_pembayaran,
                    "transaksi_kembalian"     => $transaksi_kembalian
                ];

                $simpan = $this->transaksi->insertTransaksi($data);
            }

            if ($simpan) {
                session()->setFlashdata('success', 'Imported Transaction successfully');
                return redirect()->to(base_url('transaksi'));
            }
        }
    }

    public function export()
    {
        // ambil data transaction dari database
        $transaksi = $this->transaksi->getTransaksi();
        // panggil class Sreadsheet baru
        $spreadsheet = new Spreadsheet();
        // Buat custom header pada file excel
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'transaksi_id')
            ->setCellValue('B1', 'transaksi_pid')
            ->setCellValue('C1', 'transaksi_bid')
            ->setCellValue('D1', 'transaksi_harga')
            ->setCellValue('E1', 'transaksi_qnty')
            ->setCellValue('F1', 'transaksi_total')
            ->setCellValue('G1', 'transaksi_date')
            ->setCellValue('H1', 'transaksi_metodepembayaran')
            ->setCellValue('I1', 'transaksi_pembayaran')
            ->setCellValue('J1', 'transaksi_kembalian');
        // define kolom dan nomor
        $kolom = 2;
        $nomor = 1;
        // tambahkan data transaction ke dalam file excel
        foreach ($transaksi as $data) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $data['transaksi_id'])
                ->setCellValue('B' . $kolom, $data['transaksi_pid'])
                ->setCellValue('C' . $kolom, $data['transaksi_bid'])
                ->setCellValue('D' . $kolom, $data['transaksi_harga'])
                ->setCellValue('E' . $kolom, $data['transaksi_qnty'])
                ->setCellValue('F' . $kolom, $data['transaksi_total'])
                ->setCellValue('G' . $kolom, $data['transaksi_date'])
                ->setCellValue('H' . $kolom, $data['transaksi_metodepembayaran'])
                ->setCellValue('I' . $kolom, $data['transaksi_pembayaran'])
                ->setCellValue('J' . $kolom, $data['transaksi_kembalian']);


            $kolom++;
            $nomor++;
        }
        // download spreadsheet dalam bentuk excel .xlsx
        $Writer = new Xls($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_Transaction.xls"');
        header('Cache-Control: max-age=0');



        $Writer->save('php://output');

        dd('php://output');
    }


    // public function pdf()
    // {
    //     $this->load->libraries('dompdf_gen');

    //     $data['transaksi'] = $this->transaksi->gettransaksi('transaksi');

    //     $this->load->view('laporan_pdf', $data);

    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("laporan_transaksi.pdf", array('Attachment' => 0));
    // }


    // public function pdf() {
    //     $orders = $this->order_model->get_all();
    //     $tanggal = date('d-m-Y');

    //     $pdf = new \TCPDF();
    //     $pdf->AddPage();
    //     $pdf->SetFont('', 'B', 20);
    //     $pdf->Cell(115, 0, "Laporan Order - ".$tanggal, 0, 1, 'L');
    //     $pdf->SetAutoPageBreak(true, 0);

    //     // Add Header
    //     $pdf->Ln(10);
    //     $pdf->SetFont('', 'B', 12);
    //     $pdf->Cell(10, 8, "No", 1, 0, 'C');
    //     $pdf->Cell(55, 8, "transaksi_id", 1, 0, 'C');
    //     $pdf->Cell(55, 8, "transaksi_date", 1, 0, 'C');
    //     $pdf->Cell(35, 8, "transaksi_qnty", 1, 0, 'C');
    //     $pdf->Cell(35, 8, "transaksi_total", 1, 0, 'C');
    //     $pdf->Cell(50, 8, "transaksi_pembayaran", 1, 1, 'C');
    //     $pdf->SetFont('', '', 12);
    //     foreach($orders->result_array() as $k => $order) {
    //         $this->addRow($pdf, $k+1, $order);
    //     }
    //     $tanggal = date('d-m-Y');
    //     $pdf->Output('Laporan Order - '.$tanggal.'.pdf'); 
    // }

    // private function addRow($pdf, $no, $order) {
    //     $pdf->Cell(10, 8, $no, 1, 0, 'C');
    //     $pdf->Cell(55, 8, $order['product'], 1, 0, '');
    //     $pdf->Cell(35, 8, date('d-m-Y', strtotime($order['tanggal'])), 1, 0, 'C');
    //     $pdf->Cell(35, 8, $order['jumlah'], 1, 0, 'C');
    //     $pdf->Cell(50, 8, "Rp. ".number_format($order['total'], 2, ',' , '.'), 1, 1, 'L');
    // }
}



    // public function getTrxPrice($product_id)
    // {
    //     $price = $this->product_model->getPrice($product_id);
    //     $data = $price['product_price'];
    //     return $data;
    // }



//     public function print()
//     {
//         $id = $this->request->getPost('transaksi_id');
//         $pid = $this->request->getPost('transaksi_pid');
//         $bid = $this->request->getPost('transaksi_bid');
//         $harga = $this->request->getPost('transaksi_harga');
//         $qnty = $this->request->getPost('transaksi_qnty');
//         $total = $this->request->getPost('transaksi_total');
//         $date = $this->request->getPost('transaksi_date');
//         $metodep = $this->request->getPost('transaksi_metodepembayaran');
//         $pembayaran = $this->request->getPost('transaksi_pembayaran');
//         $kembalian = $this->request->getPost('transaksi_kembalian');

//         $data = [
//             'transaksi_id' => $id,
//             'transaksi_pid' => $pid,
//             'transaksi_bid' => $bid,
//             'transaksi_harga' => $harga,
//             'transaksi_qnty' => $qnty,
//             'transaksi_total' => $total,
//             'transaksi_date' => $date,
//             'transaksi_metodepembayaran' => $metodep,
//             'transaksi_pembayaran' => $pembayaran,
//             'transaksi_kembalian' => $kembalian
//         ];



//         $data['Transaksi'] = $this->transaksi->gettransaksi("transaksi")->result();
//         $this->load->view('transaksi/print', $data);
//     }
