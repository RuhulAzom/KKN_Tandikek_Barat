<?php

/**
 * File ini:
 *
 * Controller untuk Halaman Web
 *
 * /donjo-app/controllers/First.php
 *
 */

/**
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2020 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package OpenSID
 * @author Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2020 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license http://www.gnu.org/licenses/gpl.html GPL V3
 * @link https://github.com/OpenSID/OpenSID
 */

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/google-api-php-client/vendor/autoload.php';

class First extends Web_Controller
{

	public function __construct()
	{
		parent::__construct();
		parent::clear_cluster_session();

		// Jika offline_mode dalam level yang menyembunyikan website,
		// tidak perlu menampilkan halaman website
		if ($this->setting->offline_mode == 2) {
			redirect('main');
		} elseif ($this->setting->offline_mode == 1) {
			// Hanya tampilkan website jika user mempunyai akses ke menu admin/web
			// Tampilkan 'maintenance mode' bagi pengunjung website
			$this->load->model('user_model');
			$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
			if (!$this->user_model->hak_akses($grup, 'web', 'b')) {
				redirect('main/maintenance_mode');
			}
		}

		// Load library statistik pengunjung
		$this->load->library('statistik_pengunjung');

		$this->load->model('config_model');
		$this->load->model('first_artikel_m');
		$this->load->model('teks_berjalan_model');
		$this->load->model('first_gallery_m');
		$this->load->model('first_menu_m');
		$this->load->model('web_menu_model');
		$this->load->model('first_penduduk_m');
		$this->load->model('penduduk_model');
		$this->load->model('suplemen_model');
		$this->load->model('surat_model');
		$this->load->model('keluarga_model');
		$this->load->model('web_widget_model');
		$this->load->model('web_gallery_model');
		$this->load->model('laporan_penduduk_model');
		$this->load->model('track_model');
		$this->load->model('keluar_model');
		$this->load->model('referensi_model');
		$this->load->model('keuangan_model');
		$this->load->model('keuangan_manual_model');
		$this->load->model('web_dokumen_model');
		$this->load->model('lapor_model');
		$this->load->model('program_bantuan_model');
		$this->load->model('keuangan_manual_model');
		$this->load->model('keuangan_grafik_model');
		$this->load->model('keuangan_grafik_manual_model');
		$this->load->model('plan_lokasi_model');
		$this->load->model('plan_area_model');
		$this->load->model('plan_garis_model');
		$this->load->model('theme_model');
		$this->load->model('anjungan_model');
		$this->load->model('pembangunan_model');
		$this->load->model('pembangunan_dokumentasi_model');
		$this->load->model('url_shortener_model');
		$this->load->model('stat_shortener_model');
		$this->load->model('analisis_import_model');
	}

	public function index($p = 1)
	{
		$data = $this->includes;

		$data['p'] = $p;
		$data['paging'] = $this->first_artikel_m->paging($p);
		$data['paging_page'] = 'index';
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);
		$data['artikel'] = $this->first_artikel_m->artikel_show($data['paging']->offset, $data['paging']->per_page);
		// $data['artikel'] = [];

		$data['headline'] = $this->first_artikel_m->get_headline();
		$data['cari'] = htmlentities($this->input->get('cari'));
		if ($this->setting->covid_rss) {
			$data['feed'] = array(
				'items' => $this->first_artikel_m->get_feed(),
				'title' => 'BERITA COVID19.GO.ID',
				'url' => 'https://www.covid19.go.id'
			);
		}

		if ($this->setting->apbdes_footer) {
			$data['transparansi'] = $this->setting->apbdes_manual_input
				? $this->keuangan_grafik_manual_model->grafik_keuangan_tema()
				: $this->keuangan_grafik_model->grafik_keuangan_tema();
		}

		$data['covid'] = $this->laporan_penduduk_model->list_data('covid');

		$cari = trim($this->input->get('cari'));
		if (! empty($cari)) {
			// Judul artikel bisa digunakan untuk serangan XSS
			$data["judul_kategori"] = htmlentities("Hasil pencarian : " . substr($cari, 0, 50));
		}

		$this->_get_common_data($data);
		$this->track_model->track_desa('first');
		$this->load->view($this->template, $data);
	}

	/*
	| Artikel bisa ditampilkan menggunakan parameter pertama sebagai id, dan semua parameter lainnya dikosongkan. url artikel/:id
	| Kalau menggunakan slug, dipanggil menggunakan url artikel/:thn/:bln/:hri/:slug
	*/
	public function artikel($url)
	{
		if (is_numeric($url)) {
			$data_artikel = $this->first_artikel_m->get_artikel_by_id($url);
			if ($data_artikel) {
				$data_artikel['slug'] = $this->security->xss_clean($data_artikel['slug']);
				redirect('artikel/' . buat_slug($data_artikel));
			}
		}
		$this->load->model('shortcode_model');
		$data = $this->includes;
		$this->first_artikel_m->hit($url); // catat artikel diakses
		$data['single_artikel'] = $this->first_artikel_m->get_artikel($url);
		$id = $data['single_artikel']['id'];

		// replace isi artikel dengan shortcodify
		$data['single_artikel']['isi'] = $this->shortcode_model->shortcode($data['single_artikel']['isi']);
		$data['title'] = ucwords($data['single_artikel']['judul']);
		$data['detail_agenda'] = $this->first_artikel_m->get_agenda($id); //Agenda
		$data['komentar'] = $this->first_artikel_m->list_komentar($id);
		// $data['komentar'] = ["awdwad"];
		$this->_get_common_data($data);
		$this->set_template('layouts/artikel.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function arsip($p = 1)
	{
		$data = $this->includes;
		$data['p'] = $p;
		$data['paging'] = $this->first_artikel_m->paging_arsip($p);
		$data['farsip'] = $this->first_artikel_m->full_arsip($data['paging']->offset, $data['paging']->per_page);

		$this->_get_common_data($data);

		$this->set_template('layouts/arsip.tpl.php');
		$this->load->view($this->template, $data);
	}

	// Halaman arsip album galeri
	public function gallery($p = 1)
	{
		$data = $this->includes;
		$data['p'] = $p;
		$data['paging'] = $this->first_gallery_m->paging($p);
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);
		$data['gallery'] = $this->first_gallery_m->gallery_show($data['paging']->offset, $data['paging']->per_page);

		$this->_get_common_data($data);

		$this->set_template('layouts/gallery.tpl.php');
		$this->load->view($this->template, $data);
	}

	// halaman rincian tiap album galeri
	public function sub_gallery($gal = 0, $p = 1)
	{
		$data = $this->includes;
		$data['p'] = $p;
		$data['gal'] = $gal;
		$data['paging'] = $this->first_gallery_m->paging2($gal, $p);
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);

		$data['gallery'] = $this->first_gallery_m->sub_gallery_show($gal, $data['paging']->offset, $data['paging']->per_page);
		$data['parrent'] = $this->first_gallery_m->get_parrent($gal);
		$data['mode'] = 1;

		$this->_get_common_data($data);

		$this->set_template('layouts/sub_gallery.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function statistik($stat = 0, $tipe = 0)
	{
		if (!$this->web_menu_model->menu_aktif('statistik/' . $stat)) show_404();

		$data = $this->includes;

		$data['heading'] = $this->laporan_penduduk_model->judul_statistik($stat);
		$data['title'] = 'Statistik ' . $data['heading'];
		$data['stat'] = $this->laporan_penduduk_model->list_data($stat);
		$data['tipe'] = $tipe;
		$data['st'] = $stat;

		$this->_get_common_data($data);

		$this->set_template('layouts/stat.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function kelompok($id)
	{
		if (! $this->web_menu_model->menu_aktif('data-kelompok/' . $id)) show_404();

		$data = $this->includes;

		$data['detail'] = $this->kelompok_model->get_kelompok($id);
		$data['title'] = 'Data Kelompok ' . $data['detail']['nama'];
		$data['pengurus'] = $this->kelompok_model->list_pengurus($id);
		$data['anggota'] = $this->kelompok_model->list_anggota($id, $sub = 'anggota');

		// Jika kelompok tdk tersedia / sudah terhapus pd modul kelompok
		if ($data['detail'] == NULL) show_404();

		$this->_get_common_data($data);
		$this->set_template('layouts/kelompok.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function suplemen($id = 0)
	{
		if (! $this->web_menu_model->menu_aktif('data-suplemen/' . $id)) show_404();

		$this->session->per_page = null;
		$data = $this->includes;

		$data['main'] = $this->suplemen_model->get_rincian(1, $id);
		$data['title'] = 'Data Suplemen ' . $data['main']['suplemen']['nama'];
		$data['sasaran'] = unserialize(SASARAN);

		$this->_get_common_data($data);
		$this->set_template('layouts/suplemen.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function ajax_peserta_program_bantuan()
	{
		$peserta = $this->program_bantuan_model->get_peserta_bantuan();
		$data = array();
		$no = $_POST['start'];

		foreach ($peserta as $baris) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $baris['program'];
			$row[] = $baris['peserta'];
			$row[] = $baris['alamat'];
			$data[] = $row;
		}

		$output = array(
			"recordsTotal" => $this->program_bantuan_model->count_peserta_bantuan_all(),
			"recordsFiltered" => $this->program_bantuan_model->count_peserta_bantuan_filtered(),
			'data' => $data
		);
		echo json_encode($output);
	}

	public function data_analisis($stat = "", $sb = 0, $per = 0)
	{
		if (!$this->web_menu_model->menu_aktif('data_analisis')) show_404();

		$data = $this->includes;

		if ($stat == "") {
			$data['list_indikator'] = $this->first_penduduk_m->list_indikator();
			$data['list_jawab'] = null;
			$data['indikator'] = null;
		} else {
			$data['list_indikator'] = "";
			$data['list_jawab'] = $this->first_penduduk_m->list_jawab($stat, $sb, $per);
			$data['indikator'] = $this->first_penduduk_m->get_indikator($stat);
		}

		$this->_get_common_data($data);

		$this->set_template('layouts/analisis.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function dpt()
	{
		if (!$this->web_menu_model->menu_aktif('dpt')) show_404();

		$this->load->model('dpt_model');
		$data = $this->includes;
		$data['title'] = 'Daftar Calon Pemilih Berdasarkan Wilayah';
		$data['main'] = $this->dpt_model->statistik_wilayah();
		$data['total'] = $this->dpt_model->statistik_total();
		$data['tanggal_pemilihan'] = $this->dpt_model->tanggal_pemilihan();
		$this->_get_common_data($data);
		$data['tipe'] = 4;
		$this->set_template('layouts/stat.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function wilayah()
	{
		if (!$this->web_menu_model->menu_aktif('wilayah')) show_404();

		$this->load->model('wilayah_model');
		$data = $this->includes;

		$data['main'] = $this->wilayah_model->list_semua_wilayah();
		$data['heading'] = "Populasi Per Wilayah";
		$data['tipe'] = 3;
		$data['total'] = $this->wilayah_model->total();
		$data['st'] = 1;
		$this->_get_common_data($data);

		$this->set_template('layouts/stat.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function peraturan_desa()
	{
		if (!$this->web_menu_model->menu_aktif('peraturan_desa')) show_404();

		$this->load->model('web_dokumen_model');
		$data = $this->includes;

		$data['cek'] = $cek;
		$data['kategori'] = $this->referensi_model->list_data('ref_dokumen', 1);
		$data['tahun'] = $this->web_dokumen_model->tahun_dokumen();
		$data['heading'] = "Produk Hukum";
		$data['title'] = $data['heading'];
		$data['halaman_statis'] = 'web/halaman_statis/peraturan_desa';
		$this->_get_common_data($data);

		$this->set_template('layouts/halaman_statis.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function ajax_table_peraturan()
	{
		$kategori_dokumen = '';
		$tahun_dokumen = '';
		$tentang_dokumen = '';
		$data = $this->web_dokumen_model->all_peraturan($kategori_dokumen, $tahun_dokumen, $tentang_dokumen);
		echo json_encode($data);
	}

	// function filter peraturan
	public function filter_peraturan()
	{
		$kategori_dokumen = $this->input->post('kategori');
		$tahun_dokumen = $this->input->post('tahun');
		$tentang_dokumen = $this->input->post('tentang');

		$data = $this->web_dokumen_model->all_peraturan($kategori_dokumen, $tahun_dokumen, $tentang_dokumen);
		echo json_encode($data);
	}

	public function informasi_publik()
	{
		if (!$this->web_menu_model->menu_aktif('informasi_publik')) show_404();

		$this->load->model('web_dokumen_model');
		$data = $this->includes;

		$data['kategori'] = $this->referensi_model->list_data('ref_dokumen', 1);
		$data['tahun'] = $this->web_dokumen_model->tahun_dokumen();
		$data['heading'] = "Informasi Publik";
		$data['title'] = $data['heading'];
		$data['halaman_statis'] = 'web/halaman_statis/informasi_publik';
		$this->_get_common_data($data);

		$this->set_template('layouts/halaman_statis.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function ajax_informasi_publik()
	{
		$informasi_publik = $this->web_dokumen_model->get_informasi_publik();
		$data = array();
		$no = $_POST['start'];

		foreach ($informasi_publik as $baris) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = "<a href='" . site_url('dokumen_web/unduh_berkas/') . $baris['id'] . "' target='_blank'>" . $baris['nama'] . "</a>";
			$row[] = $baris['tahun'];
			// Ambil judul kategori
			$row[] = $this->referensi_model->list_ref_flip(KATEGORI_PUBLIK)[$baris['kategori_info_publik']];
			$row[] = $baris['tgl_upload'];
			$data[] = $row;
		}

		$output = array(
			"recordsTotal" => $this->web_dokumen_model->count_informasi_publik_all(),
			"recordsFiltered" => $this->web_dokumen_model->count_informasi_publik_filtered(),
			'data' => $data
		);
		echo json_encode($output);
	}

	public function kategori($id, $p = 1)
	{
		$data = $this->includes;

		$data['p'] = $p;
		$data["judul_kategori"] = $this->first_artikel_m->get_kategori($id);
		$data['title'] = 'Artikel ' . $data['judul_kategori']['kategori'];
		$data['paging'] = $this->first_artikel_m->paging_kat($p, $id);
		$data['paging_page'] = 'kategori/' . $id;
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);
		$data['artikel'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, $id);

		$this->_get_common_data($data);
		$this->load->view($this->template, $data);
	}

	public function add_comment($id = 0)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('komentar', 'Komentar', 'required');
		$this->form_validation->set_rules('owner', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'numeric|required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');

		if ($this->form_validation->run() == TRUE) {
			// Periksa isian captcha
			include FCPATH . 'securimage/securimage.php';
			$securimage = new Securimage();

			$post = $this->input->post();
			if ($securimage->check($_POST['captcha_code']) == false) {
				$respon = [
					'status' => -1, // Notif gagal
					'pesan' => 'Kode anda salah. Silakan ulangi lagi.',
					'data' => $post
				];
			} else {
				$data = [
					'komentar' => htmlentities($post['komentar']),
					'owner' => htmlentities($post['owner']),
					'no_hp' => bilangan($post['no_hp']),
					'email' => email($post['email']),
					'status' => 2,
					'id_artikel' => $id
				];

				$res = $this->first_artikel_m->insert_comment($data);

				if ($res) {
					$respon = [
						'status' => 1, // Notif berhasil
						'pesan' => 'Komentar anda telah berhasil dikirim dan perlu dimoderasi untuk ditampilkan.'
					];
				} else {
					$respon = [
						'status' => -1, // Notif gagal
						'pesan' => 'Komentar anda gagal dikirim. Silakan ulangi lagi.',
						'data' => $post
					];
				}
			}
		} else {
			$respon = [
				'status' => -1, // Notif gagal
				'pesan' => validation_errors(),
				'data' => $post
			];
		}

		$this->session->set_flashdata('notif', $respon);

		redirect($_SERVER['HTTP_REFERER'] . "#kolom-komentar");
	}

	private function _get_common_data(&$data)
	{
		// Counter statistik pengunjung
		$this->statistik_pengunjung->counter_visitor();

		// Data statistik pengunjung
		$data['statistik_pengunjung'] = $this->statistik_pengunjung->get_statistik();

		$data['latar_website'] = $this->theme_model->latar_website();
		$data['desa'] = $this->config_model->get_data();
		$data['menu_atas'] = $this->first_menu_m->list_menu_atas();
		$data['menu_atas'] = $this->first_menu_m->list_menu_atas();
		$data['menu_kiri'] = $this->first_menu_m->list_menu_kiri();
		$data['teks_berjalan'] = $this->teks_berjalan_model->list_data(TRUE);
		$data['slide_artikel'] = $this->first_artikel_m->slide_show();
		$data['slider_gambar'] = $this->first_artikel_m->slider_gambar();
		$data['w_cos'] = $this->web_widget_model->get_widget_aktif();
		$data['cek_anjungan'] = $this->anjungan_model->cek_anjungan();

		$this->web_widget_model->get_widget_data($data);
		$data['data_config'] = $this->config_model->get_data();
		if ($this->setting->apbdes_footer and $this->setting->apbdes_footer_all) {
			$data['transparansi'] = $this->setting->apbdes_manual_input
				? $this->keuangan_grafik_manual_model->grafik_keuangan_tema()
				: $this->keuangan_grafik_model->grafik_keuangan_tema();
		}
		// Pembersihan tidak dilakukan global, karena artikel yang dibuat oleh
		// petugas terpecaya diperbolehkan menampilkan <iframe> dsbnya..
		$list_kolom = array(
			'arsip',
			'w_cos'
		);
		foreach ($list_kolom as $kolom) {
			$data[$kolom] = $this->security->xss_clean($data[$kolom]);
		}
	}

	public function peta()
	{
		if (!$this->web_menu_model->menu_aktif('peta')) show_404();

		$this->load->model('wilayah_model');
		$this->load->model('data_persil_model');
		$data = $this->includes;

		$data['list_dusun'] = $this->wilayah_model->list_dusun();
		$data['wilayah'] = $this->wilayah_model->list_wil();
		$data['desa'] = $this->config_model->get_data();
		$data['title'] = 'Peta ' . ucwords($this->setting->sebutan_desa . ' ' . $data['desa']['nama_desa']);
		$data['dusun_gis'] = $data['list_dusun'];
		$data['rw_gis'] = $this->wilayah_model->list_rw();
		$data['rt_gis'] = $this->wilayah_model->list_rt();
		$data['list_ref'] = $this->referensi_model->list_ref(STAT_PENDUDUK);
		$data['covid'] = $this->laporan_penduduk_model->list_data('covid');
		$data['lokasi'] = $this->plan_lokasi_model->list_lokasi();
		$data['garis'] = $this->plan_garis_model->list_garis();
		$data['area'] = $this->plan_area_model->list_area();
		$data['lokasi_pembangunan'] = $this->pembangunan_model->list_lokasi_pembangunan();
		$data['persil'] = $this->data_persil_model->list_data();

		$data['halaman_peta'] = 'web/halaman_statis/peta';
		$this->_get_common_data($data);

		$this->set_template('layouts/peta_statis.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function load_apbdes()
	{
		$data['transparansi'] = $this->keuangan_grafik_model->grafik_keuangan_tema();

		$this->_get_common_data($data);
		$this->load->view('gis/apbdes_web', $data);
	}

	public function load_aparatur_desa()
	{
		$this->_get_common_data($data);
		$this->load->view('gis/aparatur_desa_web', $data);
	}

	public function load_aparatur_wilayah($id = '', $kd_jabatan = 0)
	{
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);

		switch ($kd_jabatan) {
			case '1':
				$data['jabatan'] = "Kepala Dusun";
				break;
			case '2':
				$data['jabatan'] = "Ketua RW";
				break;
			case '3':
				$data['jabatan'] = "Ketua RT";
				break;
			default:
				$data['jabatan'] = "Kepala Dusun";
				break;
		}

		$this->load->view('gis/aparatur_wilayah', $data);
	}

	public function ambil_data_covid()
	{
		if ($content = getUrlContent($this->input->post('endpoint'))) {
			echo $content;
		}
	}

	public function status_idm(int $tahun)
	{
		if (! $this->web_menu_model->menu_aktif('status-idm/' . $tahun)) show_404();

		$data = $this->includes;
		$this->load->library('data_publik');
		$this->_get_common_data($data);
		$kode_desa = $data['desa']['kode_desa'];
		if ($this->data_publik->has_internet_connection()) {
			$this->data_publik->set_api_url("https://idm.kemendesa.go.id/open/api/desa/rumusan/$kode_desa/$tahun", 'idm_' . $tahun . '_' . $kode_desa)
				->set_interval(7)
				->set_cache_folder(FCPATH . 'cache');

			$idm = $this->data_publik->get_url_content();
			if ($idm->body->error) {
				$idm->body->mapData->error_msg = $idm->body->message . " : " . $idm->header->url . "<br><br>" . "Periksa Kode Desa di Identitas Desa. Masukkan kode lengkap, contoh '3507012006'<br>";
			}
			$data['idm'] = $idm->body->mapData;
		}

		$data['halaman_statis'] = 'home/idm';

		$this->set_template('layouts/halaman_statis_lebar.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function info_pembangunan($id = 0)
	{
		$pembangunan = $this->pembangunan_model->find($id);
		$dokumentasi = $this->pembangunan_dokumentasi_model->find_dokumentasi($pembangunan->id);

		$data['pembangunan']    = $pembangunan;
		$data['dokumentasi']    = $dokumentasi;
		$data['config'] = $this->config_model->get_data();

		$this->load->view('pembangunan/informasi', $data);
	}

	public function redirect($alias)
	{
		$url_data = $this->url_shortener_model->get_url($alias);
		if (! $url_data) {
			header("HTTP/1.0 404 Not Found");
			$this->load->view('not_found');
		} else {
			$this->stat_shortener_model->add_log($url_data->id);
			header('Location: ' . $url_data->url, true, 302);
			exit();
		}
	}

	public function status_sdgs()
	{
		if (!$this->web_menu_model->menu_aktif('status-sdgs')) show_404();

		$this->load->model('data_eksternal_model');
		$data = $this->includes;
		$this->_get_common_data($data);
		$kode_desa = $data['desa']['kode_desa'];
		$data['evaluasi'] = $this->data_eksternal_model->sdgs_kemendes($kode_desa);
		$data['halaman_statis'] = '../../' . $this->theme_folder . '/' . $this->theme . '/partials/kemendes_sdgs.php';
		$this->set_template('layouts/halaman_statis_lebar.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function get_form_info()
	{
		$redirect_link = $this->input->get('redirectLink');

		if ($this->session->inside_retry == false) {
			// Untuk kondisi SEBELUM autentikasi dan SETELAH RETRY hit API
			if ($this->input->get('outsideRetry') == 'true') {
				$this->session->inside_retry = true;
			}
			$this->session->google_form_id = $this->input->get('formId');
			$result = $this->analisis_import_model->import_gform($redirect_link);

			echo json_encode($result);
		} else {
			// Untuk kondisi SESAAT setelah Autentikasi
			$redirect_link = $this->session->inside_redirect_link;

			$this->session->unset_userdata(['inside_retry', 'inside_redirect_link']);

			header('Location: ' . $redirect_link . '?outsideRetry=true&code=' . $this->input->get('code') . '&formId=' . $this->session->google_form_id);
		}
	}

	public function lapak($p = 1)
	{
		if ($this->setting->tampilkan_lapak_web == 0) show_404();

		$this->load->model('lapak_model');

		$data = $this->includes;
		$this->_get_common_data($data);

		$data['paging'] = $this->lapak_model->paging_produk($p);
		$data['paging_page'] = 'produk';
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);
		$data['produk'] = $this->lapak_model->get_produk('', 1)->limit($data['paging']->per_page, $data['paging']->offset)->get()->result();
		$data['halaman_statis'] = 'web/halaman_statis/lapak';

		$this->set_template('layouts/halaman_statis_lebar.tpl.php');
		$this->load->view($this->template, $data);
	}
}
