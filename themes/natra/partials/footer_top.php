<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if (!is_null($transparansi)) $this->load->view($folder_themes . '/partials/apbdesa-tema.php', $transparansi); ?>
<div class="col-md-12 footer_statistik" align="center">
  <h2 class="footer-title">Statistik Desa</h2>
  <!-- <hr> -->
  <div class="row">
    <div class="col-md-6">
      <a href="<?= site_url(); ?>first/wilayah"><img alt="Statistik Wilayah" width="30%" src="<?= base_url("$this->theme_folder/$this->theme/images/statistik_wil.png") ?>" /></a>
      <a href="<?= site_url(); ?>first/statistik/0"><img alt="Statistik Pendidikan" width="30%" src="<?= base_url("$this->theme_folder/$this->theme/images/statistik_pend.png") ?>" /></a>
      <a href="<?= site_url(); ?>first/statistik/1"><img alt="Statistik Pekerjaan" width="30%" src="<?= base_url("$this->theme_folder/$this->theme/images/statistik_pekerjaan.png") ?>" /></a>
      <!-- <hr> -->
    </div>
    <div class="col-md-6">
      <a href="<?= site_url(); ?>first/statistik/3"><img alt="Statistik Agama" width="30%" src="<?= base_url("$this->theme_folder/$this->theme/images/statistik_agama.png") ?>" /></a>
      <a href="<?= site_url(); ?>first/statistik/4"><img alt="Statistik Jenis Kelamin" width="30%" src="<?= base_url("$this->theme_folder/$this->theme/images/statistik_kelamin.png") ?>" /></a>
      <a href="<?= site_url(); ?>first/statistik/13"><img alt="Statistik Umur" width="30%" src="<?= base_url("$this->theme_folder/$this->theme/images/statistik_umur.png") ?>" /></a>
      <!-- <hr> -->
    </div>
  </div>
</div>
<div class="footer_top">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_footer_top wow fadeInRight">
          <h2 class="nama-desa">
            <span class="icon-secondary">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe w-8 h-8 text-white">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                <path d="M2 12h20"></path>
              </svg>
            </span>
            <?= ucwords($this->setting->sebutan_desa . " ") ?> <?= ucwords($desa['nama_desa']) ?>
          </h2>
          <div class="card-secondary">
            <p>
              <?= $desa['alamat_kantor'] ?><br><?= ucwords($this->setting->sebutan_kecamatan . " " . $desa['nama_kecamatan']) ?> <?= ucwords($this->setting->sebutan_kabupaten . " " . $desa['nama_kabupaten']) ?> Provinsi <?= $desa['nama_propinsi'] ?> Kode Pos <?= $desa['kode_pos'] ?>
            </p>
            </p>
          </div>
          <p>
            <?php if (!empty($desa['email_desa'])): ?>
              Email: <?= $desa['email_desa'] ?>
            <?php endif; ?>
            <br />
            <?php if (!empty($desa['telepon'])): ?>
              Telp:
              <?= $desa['telepon'] ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_footer_top wow fadeInDown">
          <h2 class="nama-desa">
            <div class="icon-secondary">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart3 w-4 h-4">
                <path d="M3 3v18h18"></path>
                <path d="M18 17V9"></path>
                <path d="M13 17V5"></path>
                <path d="M8 17v-3"></path>
              </svg>
            </div>
            Kategori
          </h2>
          <ul class="labels_nav kategory">
            <?php foreach ($menu_kiri as $data): ?>
              <li>
                <a class="card-secondary" href="<?= site_url("artikel/kategori/$data[slug]"); ?>" style="width: 100%;">
                  <?= $data['kategori']; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_footer_top wow fadeInRight">
          <?php foreach ($sosmed as $data): ?>
            <?php if (!empty($data["link"])): ?>
              <a href="<?= $data['link'] ?>" rel="noopener noreferrer" target="_blank">
                <span style="color:#fff"><i class="fa fa-<?= strtolower($data['nama']) ?>-square fa-3x"></i></span>
                <?php if (strtolower($data["nama"]) == 'whatsapp' or strtolower($data["nama"]) == 'instagram' or strtolower($data["nama"]) == 'telegram'): ?>
                  <span style="color:#fff"><i class="fa fa-<?= strtolower($data['nama']) ?> fa-3x"></i></span>
                <?php endif; ?>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card-secondary kata-kata">
        © 2024 Desa Tandikek Barat. Semua hak dilindungi. | Dikembangkan dengan ❤️ untuk masyarakat
      </div>
    </div>
  </div>
</div>