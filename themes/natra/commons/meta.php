<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php defined('THEME_VERSION') or define('THEME_VERSION', 'v4.5') ?>
<?php $desa_title =  ucwords($this->setting->sebutan_desa) . ' ' . $desa['nama_desa'] . ' ' . ucwords($this->setting->sebutan_kecamatan) . ' ' . $desa['nama_kecamatan'] . ' ' . ucwords($this->setting->sebutan_kabupaten) . ' ' . $desa['nama_kabupaten']; ?>

<meta http-equiv="encoding" content="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='viewport' content='width=device-width, initial-scale=1' />
<meta name='google' content='notranslate' />
<meta name='theme' content='Natra' />
<meta name='designer' content='Ariandi Ryan Kahfi, S.Pd.' />
<meta name='theme:designer' content='Ariandi Ryan Kahfi, S.Pd.' />
<meta name='theme:version' content='<?= THEME_VERSION ?>' />
<meta name="keywords" content="<?= $this->setting->website_title . ' ' .  $desa_title; ?>" />
<meta property="og:site_name" content="<?= $desa_title; ?>" />
<meta property="og:type" content="article" />
<meta property="fb:app_id" content="147912828718">
<title>
	<?php if ($single_artikel["judul"] == ""): ?>
		<?= $this->setting->website_title . ' ' .  $desa_title; ?>
	<?php else: ?>
		<?= $single_artikel["judul"] . ' - ' . ucwords($this->setting->sebutan_desa) . ' ' . $desa['nama_desa']; ?>
	<?php endif; ?>
</title>

<?php $favicon = LOKASI_LOGO_DESA . 'favicon.ico'; ?>
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<link rel="shortcut icon" href="<?= base_url(is_file($favicon) ? $favicon : 'favicon.ico') ?>" />
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/font-awesome.min.css"); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/animate.css"); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/slick.css"); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/theme.css"); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/style.css"); ?>">
<link rel='stylesheet' href="<?= base_url('assets/css/font-awesome.min.css'); ?>" />
<link rel="stylesheet" href="<?= base_url('assets/css/leaflet.css'); ?>" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/css/mapbox-gl.css'); ?>" />
<link rel="stylesheet" href="<?= base_url('assets/css/peta.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/dataTables.bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/custom/_core.css"); ?>">
<link
	href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=JetBrains+Mono:wght@400;700&display=swap"
	rel="stylesheet">

<?php if (isset($single_artikel)): ?>
	<meta property="og:title" content="<?= htmlspecialchars($single_artikel["judul"]); ?>" />
	<meta property="og:url" content="<?= site_url('artikel/' . buat_slug($single_artikel)) ?>" />
	<meta property="og:image" content="<?= base_url(''); ?><?= LOKASI_FOTO_ARTIKEL ?>sedang_<?= $single_artikel['gambar']; ?>" />
	<meta property="og:description" content="<?= potong_teks($single_artikel['isi'], 300) ?> ..." />
<?php else: ?>
	<meta property="og:title" content="<?= $desa_title; ?>" />
	<meta property="og:url" content="<?= site_url() ?>" />
	<meta property="og:description" content="<?= $this->setting->website_title . ' ' .  $desa_title; ?>" />
<?php endif; ?>
<script type="application/x-javascript">
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		if (window.scrollY == 0) window.scrollTo(0, 1);
	}
</script>
<script language='javascript' src="<?= base_url('assets/front/js/jquery.min.js'); ?>"></script>
<script language='javascript' src="<?= base_url('assets/front/js/jquery.cycle2.min.js'); ?>"></script>
<script language='javascript' src="<?= base_url('assets/front/js/jquery.cycle2.carousel.js'); ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/bootstrap.min.js"); ?>"></script>
<script src="<?= base_url('assets/js/leaflet.js'); ?>"></script>
<script src="<?= base_url('assets/front/js/layout.js'); ?>"></script>
<script src="<?= base_url('assets/front/js/jquery.colorbox.js'); ?>"></script>
<script src="<?= base_url('assets/js/leaflet-providers.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/highcharts.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/highcharts-3d.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/exporting.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/highcharts-more.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/sankey.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/organization.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/accessibility.js'); ?>"></script>
<script src="<?= base_url('assets/js/mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('assets/js/leaflet-mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('assets/js/peta.js'); ?>"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>
<?php $this->load->view('global/validasi_form', ['web_ui' => true]); ?>
<script type="text/javascript">
	var BASE_URL = "<?= base_url(); ?>";
</script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">
	window.setTimeout("renderDate()", 1);
	days = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
	months = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	function renderDate() {
		var mydate = new Date();
		var year = mydate.getYear();
		if (year < 2000) {
			if (document.all)
				year = "19" + year;
			else
				year += 1900;
		}
		var day = mydate.getDay();
		var month = mydate.getMonth();
		var daym = mydate.getDate();
		if (daym < 10)
			daym = "0" + daym;
		var hours = mydate.getHours();
		var minutes = mydate.getMinutes();
		var seconds = mydate.getSeconds();
		if (hours <= 9)
			hours = "0" + hours;
		if (minutes <= 9)
			minutes = "0" + minutes;
		if (seconds <= 9)
			seconds = "0" + seconds;
		document.getElementById("tanggal-jam").innerHTML = "<div id='tanggal'>" + days[day] + ", " + daym + " " + months[month] + " " + year + "</div><div id='jam'>" + hours + " : " + minutes + " : " + seconds + "</div>" + `
		<div id="wib" class="text-sm opacity-90 flex items-center justify-center gap-2">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-4 h-4" style="width: 16px">
				<circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>
			</svg>
			<span>Waktu Indonesia Barat (WIB)</span>
		</div>
		<div style="position: absolute; top: 1.5rem; left: 2rem; color:#cdcdcd40">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-8 h-8" style="width: 32px; height: 32px;">
				<circle cx="12" cy="12" r="10"></circle>
				<polyline points="12 6 12 12 16 14"></polyline>
			</svg>
		</div>
		<div style="position: absolute; top: 9rem; right: 3rem; color:#cdcdcd40">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-8 h-8" style="width: 24px; height: 24px;">
				<circle cx="12" cy="12" r="10"></circle>
				<polyline points="12 6 12 12 16 14"></polyline>
			</svg>
		</div>
		<div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background-image: linear-gradient(to right, #facc15, #fb923c, #ef4444);"></div>

		`;
		setTimeout("renderDate()", 1000)
	}
</script>
<style type="text/css">
	#tanggal-jam {
		position: relative;
		overflow: hidden;
		text-align: center;
		color: #ffffff;
		background: var(--main-gradient);
		padding: 1rem 0;
		transition: all 300ms;
		border-radius: var(--rounded-lg);
	}

	#tanggal-jam:hover {
		transform: translateY(-6px);
		transition: all 300ms;
	}

	#tanggal-jam #wib {
		opacity: 0.9;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: .5rem;
		font-size: 0.875rem;
		margin-top: .5rem;
	}

	#tanggal-jam #tanggal {
		font-weight: 600;
		font-size: 1.125rem;
		margin-bottom: .5rem;
	}

	#tanggal-jam #jam {
		background-color: #ffffff1a;
		width: fit-content;
		margin: 0 auto;
		border: 1px solid #ffffff33;
		padding: .5rem 1rem;
		border-radius: var(--rounded-lg);
		font-size: 2.25rem;
	}
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId=147912828718&autoLogAppEvents=1"></script>

<!--[if lt IE 9]>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/html5shiv.min.js"); ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/respond.min.js"); ?>"></script>
<![endif]-->
<?php $this->load->view('head_tags_front') ?>