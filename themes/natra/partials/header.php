<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row">
	<?php if (!empty($teks_berjalan)): ?>
		<div class="" style="color:#fff; padding-top: .3rem; border-bottom: 1px solid rgba(255, 255, 255, 0.1);position: relative; display:flex; align-items:center; padding:.5rem 0">
			<div class="" style="display: flex; align-items: center; gap: 1rem; bottom: 0; padding: 0 1rem; z-index: 2;">
				<span style="display: flex; align-items: center; gap: .2rem;border:1px solid rgba(255, 255, 255, 0.1);padding: .3rem 1rem;border-radius: 1.5rem;backdrop-filter: 24px;background-color: rgba(255, 255, 255, 0.1);color: rgba(255, 255, 255, 0.8);">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb923c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="" style="width: 1rem;">
						<rect width="20" height="16" x="2" y="4" rx="2"></rect>
						<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
					</svg>
					info@tandikek.go.id
				</span>
				<span style="display: flex; align-items: center; gap: .2rem;border:1px solid rgba(255, 255, 255, 0.1);padding: .3rem 1rem;border-radius: 1.5rem;backdrop-filter: 24px;background-color: rgba(255, 255, 255, 0.1);color: rgba(255, 255, 255, 0.8);">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#facc15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 1rem;">
						<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
					</svg>
					082283074208
				</span>
			</div>
			<marquee onmouseover="this.stop()" onmouseout="this.start()">
				<?php $this->load->view($folder_themes . '/layouts/teks_berjalan.php') ?>
			</marquee>
		</div>
	<?php endif; ?>
	<div class="col-lg-12 col-md-12" style="">
		<div class="header_top">
			<div class="header_top_left" style="margin-bottom:0px;">
				<ul class="top_nav">
					<li>
						<table>
							<tr>
								<td class="hidden-xs"><img class="tlClogo" src="<?= gambar_desa($desa['logo']); ?>" width="30" valign="top" alt="<?= $desa['nama_desa'] ?>" /></td>
								<td>
									<a href="<?= site_url(); ?>">
										<font size="4"><?= $this->setting->website_title . ' ' . ucwords($this->setting->sebutan_desa) . (($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?>
										</font><br />
										<font size="2">
											<?= ucwords($this->setting->sebutan_kecamatan_singkat . " " . $desa['nama_kecamatan']) ?>
											<?= ucwords($this->setting->sebutan_kabupaten_singkat . " " . $desa['nama_kabupaten']) ?>
											<?= ucwords("Prov. " . $desa['nama_propinsi']) ?>
										</font>
									</a>
								</td>
							</tr>
						</table>
					</li>
				</ul>
			</div>
			<div class="navbar-right" style="margin-right: 0px; margin-top: 15px; margin-bottom: 3px;">
				<form method=get action="<?= site_url(); ?>" class="form-inline">
					<table align="center">
						<tr>
							<td><input type="text" name="cari" maxlength="50" class="form-control" value="<?= $cari ?>" placeholder="Cari Artikel"></td>
							<td><button type="submit" class="btn btn-primary">Cari</button></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>