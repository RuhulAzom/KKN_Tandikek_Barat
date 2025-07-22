<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="content_bottom_left" style="margin-bottom:10px;">
    <div class="archive_style_1" style="margin-top:16px;">
        <!-- <div style="margin-top:10px;">
            <?php if (!empty($teks_berjalan)): ?>
                <marquee onmouseover="this.stop()" onmouseout="this.start()">
                    <?php $this->load->view($folder_themes . '/layouts/teks_berjalan.php') ?>
                </marquee>
            <?php endif; ?>
        </div> -->
        <?php $this->load->view($folder_themes . "/layouts/slider.php") ?>
        <?php if ($this->setting->covid_data) $this->load->view($folder_themes . "/partials/corona-widget.php") ?>
        <?php if ($this->setting->covid_desa) $this->load->view($folder_themes . "/partials/corona-local.php"); ?>
        <?php if ($headline): ?>
            <?php $abstrak_headline = potong_teks($headline['isi'], 550) ?>
            <div class="single_category wow fadeInDown">
                <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text">Berita Utama</span> </h2>
            </div>
            <div id="headline" class="single_category wow fadeInDown">
                <div class="archive_style_1">
                    <div class="business_category_left wow fadeInDown">
                        <ul class="fashion_catgnav">
                            <li>
                                <div class="catgimg2_container2">
                                    <h5 class="catg_titile">
                                        <a href="<?= site_url('artikel/' . buat_slug($headline)) ?>"> <?= $headline['judul'] ?></a>
                                    </h5>
                                    <a href="<?= site_url('artikel/' . buat_slug($headline)) ?>">
                                        <?php if ($headline["gambar"] != ""): ?>
                                            <?php if (is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $headline['gambar'])): ?>
                                                <img src="<?= AmbilFotoArtikel($headline['gambar'], 'sedang') ?>" width="300" class="img-fluid img-thumbnail hidden-sm hidden-xs" style="float:left; margin:0 8px 4px 0;" />
                                                <img src="<?= AmbilFotoArtikel($headline['gambar'], 'sedang') ?>" width="100%" class="img-fluid img-thumbnail hidden-lg hidden-md" style="float:left; margin:0 8px 4px 0;" />
                                            <?php else: ?>
                                                <img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" width="300px" class="img-fluid img-thumbnail hidden-sm hidden-xs" style="float:left; margin:0 8px 4px 0;" />
                                                <img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" width="100%" class="img-fluid img-thumbnail hidden-lg hidden-md" style="float:left; margin:0 8px 4px 0;" />
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                    <div style="text-align: justify;" class="hidden-sm hidden-xs">
                                        <?= $abstrak_headline ?> ...
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php $title = (!empty($judul_kategori)) ? $judul_kategori : "Berita & Artikel" ?>
    <?php if (is_array($title)): ?>
        <?php foreach ($title as $item): ?>
            <?php $title = $item ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- <div class="single_category wow fadeInDown" style="margin-bottom: 2rem;">
        <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text"><?= $title ?></span> </h2>
    </div> -->
    <h1 style="color: #1f2937; font-size: 1.5rem; font-weight: 800; display: flex; gap: .5rem; padding: 2rem 0; margin: 0;">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-6 h-6" style="color: #e64946;">
            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
            <path d="M10 9H8"></path>
            <path d="M16 13H8"></path>
            <path d="M16 17H8"></path>
        </svg>
        <?= $title ?>
    </h1>
    <?php if ($artikel): ?>
        <div class="single_category wow fadeInDown">
            <div class="archive_style_1">
                <?php foreach ($artikel as $data): ?>
                    <?php $abstrak = potong_teks($data['isi'], 250); ?>
                    <!-- <div class="post" style="display: none;">
                        <div class="badge">
                            <?= $data["kategori"] ?>
                        </div>
                        <?php if (is_file(LOKASI_FOTO_ARTIKEL . "kecil_" . $data['gambar'])): ?>
                            <div class="imgBorder">
                                <img src="<?= AmbilFotoArtikel($data['gambar'], 'sedang') ?>" alt="<?= $data["judul"] ?>">
                            </div>

                        <?php else: ?>
                            <div class="imgBorder">
                                <img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" alt="<?= $data["judul"] ?>">
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <div class="detail">
                                <i class="bx bxs-user-pin"></i>
                                <p>By
                                    <span class="strong"><?= $data['owner'] ?></span> |
                                    <span class="date"><?= tgl_indo($data['tgl_upload']); ?></span> |
                                    <span class="typeGym">
                                        <i class="fa fa-eye"></i>
                                        <?= hit($data['hit']) ?>
                                    </span> |
                                    <span class="typeGym">
                                        <i class="fa fa-comments"></i><?php $baca_komentar = $this->db->query("SELECT * FROM komentar WHERE id_artikel = '" . $data['id'] . "'");
                                                                        $komentarku = $baca_komentar->num_rows();
                                                                        echo number_format($komentarku, 0, ',', '.'); ?>
                                    </span>
                                </p>
                            </div>
                            <h3><?= $data["judul"] ?></h3>
                            <p><?= $abstrak ?> ...</p>
                            <a href="<?= site_url('artikel/' . buat_slug($data)) ?>" class="artikel-button">
                                Baca Selengkapnya <i class="bx bx-right-arrow-alt"></i>
                            </a>
                        </div>
                    </div> -->
                    <div class="artikel-card" onclick="goToArtikel('<?= site_url('artikel/' . buat_slug($data)) ?>')">
                        <!-- Gambar -->
                        <div class="imgBorder">
                            <span class="artikel-label"><?= $data['kategori'] ?></span>
                            <a href="<?= site_url('artikel/' . buat_slug($data)) ?>">
                                <?php if (is_file(LOKASI_FOTO_ARTIKEL . "kecil_" . $data['gambar'])): ?>
                                    <img src="<?= AmbilFotoArtikel($data['gambar'], 'sedang') ?>" alt="<?= $data["judul"] ?>">
                                <?php else: ?>
                                    <img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" alt="<?= $data["judul"] ?>">
                                <?php endif; ?>
                            </a>
                        </div>

                        <!-- Konten -->
                        <div class="artikel-content">

                            <div class="artikel-meta">
                                <span><i class="bx bx-calendar"></i><?= date('d F Y', strtotime($data['tgl_upload'])) ?></span>
                                <span><i class="bx bx-show"></i> <?= $data['hit'] ?></span>
                                <span><i class="bx bx-user"></i> <?= $data['owner'] ?></span>
                            </div>

                            <div class="artikel-title">
                                <?= $data["judul"] ?>
                            </div>

                            <div class="artikel-desc"><?= potong_teks($data["isi"], 180) ?>...</div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="business_category_left wow fadeInDown" id="artikel-blank">
            <div class="box box-warning box-solid">
                <div class="box-header">
                    <h3 class="box-title">Maaf, belum ada data</h3>
                </div>
                <div class="box-body">
                    <p>Belum ada artikel yang dituliskan dalam <?= $title ?></p>
                    <p>Silakan kunjungi situs web kami dalam waktu dekat.</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php if ($artikel and $paging->num_rows > $paging->per_page): ?>
    <div class="pagination-custom">
        <div>Halaman <?= $p ?> dari <?= $paging->end_link ?></div>
        <ul class="pagination">
            <?php if ($paging->start_link): ?>
                <li><a href="<?= site_url($paging_page . "/$paging->start_link" . $paging->suffix) ?>" title="Halaman Pertama"><i class="fa fa-fast-backward"></i>&nbsp;</a></li>
            <?php endif; ?>
            <?php foreach ($pages as $i): ?>
                <li <?= ($p == $i) ? 'class="active"' : "" ?>>
                    <a href="<?= site_url($paging_page . "/$i" . $paging->suffix) ?>" title="Halaman <?= $i ?>"><?= $i ?></a>
                </li>
            <?php endforeach; ?>
            <?php if ($i != $paging->end_link): ?>
                <li class='disabled'>
                    <a>...</a>
                </li>
            <?php endif; ?>
            <?php if ($paging->end_link): ?>
                <li><a href="<?= site_url($paging_page . "/$paging->end_link" . $paging->suffix) ?>" title="Halaman Terakhir"><i class="fa fa-fast-forward"></i>&nbsp;</a></li>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>

<script>
    const artikelData = <?= json_encode($artikel) ?>;
    const headlineData = <?= json_encode($headline) ?>;
    console.log({
        headlineData
    })
    console.log("Isi data artikel:", artikelData);

    function goToArtikel(url) {
        window.location.href = url;
    }
</script>