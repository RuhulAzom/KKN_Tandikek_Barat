<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if ($single_artikel["id"]) : ?>

	<script>
		console.log("123123")
		const awdwad = <?= json_encode($single_artikel) ?>;

		const komen = <?= json_encode($komentar) ?>;
		console.log({
			awdwad,
			komen
		})
	</script>
	<div id="artikel" class="single_page_area" id="<?= 'artikel-' . $single_artikel['judul'] ?>">
		<div class="title">
			<div class="header bg-gradient-main">
				<h2>
					<span class="icon-secondary" style="flex-shrink: 0;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-6 h-6">
							<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
							<path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
							<path d="M10 9H8"></path>
							<path d="M16 13H8"></path>
							<path d="M16 17H8"></path>
						</svg>
					</span>
					<?= $single_artikel["judul"] ?>
				</h2>
				<div class="meta">
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb923c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M8 2v4"></path>
							<path d="M16 2v4"></path>
							<rect width="18" height="18" x="3" y="4" rx="2"></rect>
							<path d="M3 10h18"></path>
						</svg>
						<p>
							<?= tgl_indo2($single_artikel['tgl_upload']); ?>
						</p>
					</span>
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#facc15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
							<circle cx="12" cy="7" r="4"></circle>
						</svg>
						<p>
							<?= $single_artikel['owner'] ?>
						</p>
					</span>
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
							<circle cx="12" cy="12" r="3"></circle>
						</svg>
						<p>
							<?= hit($single_artikel['hit']) ?> views
						</p>
					</span>
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
						</svg>
						<p>
							<?php $baca_komentar = $this->db->query("SELECT * FROM komentar WHERE id_artikel = '" . $single_artikel['id'] . "'");
							$komentarku = $baca_komentar->num_rows();
							echo number_format($komentarku, 0, ',', '.'); ?> komentar
						</p>
					</span>
				</div>
			</div>
			<div class="content">
				<div class="imgBorder">
					<img src="<?= AmbilFotoArtikel($single_artikel['gambar'], 'sedang') ?>" alt="">
				</div>
			</div>
		</div>
		<div class="main-content">
			<?= $single_artikel["isi"] ?>
		</div>
		<div class="share">
			<p>Bagikan artikel ini :</p>
			<div class="btn-group" role="group" aria-label="Bagikan ke teman anda" style="clear:both;">
				<a name="fb_share" href="http://www.facebook.com/sharer.php?u=<?= "https://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] ?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Facebook'>
					<button type="button" class="btn btn-primary btn-sm">
						<i class="fa fa-facebook-square fa-2x"></i>
					</button>
				</a>
				<a href="http://twitter.com/share?source=sharethiscom&text=<?= htmlspecialchars($single_artikel["judul"]); ?>%0A&url=<?= "https://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] . '&via=ariandii' ?>" class="twitter-share-button" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Twitter'>
					<button type="button" class="btn btn-info btn-sm">
						<i class="fa fa-twitter fa-2x"></i>
					</button>
				</a>
				<a href="mailto:?subject=<?= htmlspecialchars($single_artikel["judul"]); ?>&body=<?= potong_teks($single_artikel["isi"], 1000); ?> ... Selengkapnya di <?= "https://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] ?>" title='Email'>
					<button type="button" class="btn btn-danger btn-sm">
						<i class="fa fa-envelope fa-2x"></i>
					</button>
				</a>
				<a href="https://telegram.me/share/url?url=<?= "https://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] ?>&text=<?= htmlspecialchars($single_artikel["judul"]); ?>%0A" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Telegram'>
					<button type="button" class="btn btn-dark btn-sm">
						<i class="fa fa-telegram fa-2x"></i>
					</button>
				</a>
				<a href="#" onclick="printDiv('artikel')" title='Cetak Artikel'>
					<button type="button" class="btn btn-warning btn-sm">
						<i class="fa fa-print fa-2x"></i>
					</button>
				</a>
				<a href="https://api.whatsapp.com/send?text=<?= htmlspecialchars($single_artikel["judul"]); ?>%0A<?= "https://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] ?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Whatsapp'>
					<button type="button" class="btn btn-success btn-sm">
						<i class="fa fa-whatsapp fa-2x"></i>
					</button>
				</a>
			</div>
		</div>
		<div class="form-group group-komentar" id="kolom-komentar">
			<?php if ($single_artikel['boleh_komentar'] == 1): ?>
				<div class="header bg-gradient-main">
					<h2>
						<span class="icon-secondary" style="flex-shrink: 0;">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-5 h-5">
								<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
							</svg>
						</span>
						Kirim Komentar
					</h2>
				</div>
				<div class="content">
					<div class="box box-default">
						<!-- <div class="box-header">
							<h2 class="box-title">Kirim Komentar</h2>
						</div>
						<hr /> -->
						<?php
						$notif = $this->session->flashdata('notif');
						$label = ($notif['status'] == -1) ? 'label-danger' : 'label-info';
						?>
						<?php if ($notif): ?>
							<div class="box-header <?= $label; ?>"><?= $notif['pesan']; ?></div>
						<?php endif; ?>
						<div class="contact_bottom">
							<form class="contact_form form-komentar" id="validasi" name="form" action="<?= site_url("add_comment/$single_artikel[id]"); ?>" method="POST" onSubmit="return validasi(this);">
								<table width="100%">
									<tr class="komentar nama">
										<td width="20%">Nama</td>
										<td>
											<input class="form-group required" type="text" name="owner" maxlength="100" placeholder="ketik di sini" value="<?= $notif['data']['owner']; ?>">
										</td>
									</tr>
									<tr class="komentar alamat">
										<td>No. Hp</td>
										<td>
											<input class="form-group number required" type="text" name="no_hp" maxlength="15" placeholder="ketik di sini" value="<?= $notif['data']['no_hp']; ?>">
										</td>
									</tr>
									<tr class="komentar alamat">
										<td>E-mail</td>
										<td>
											<input class="form-group email" type="text" name="email" maxlength="100" placeholder="email@gmail.com" value="<?= $notif['data']['email']; ?>">
										</td>
									</tr>
									<tr class="komentar pesan">
										<td valign="top">Isi Pesan</td>
										<td>
											<textarea class="required" name="komentar"><?= $notif['data']['komentar']; ?></textarea>
										</td>
									</tr>
									<tr class="captcha">
										<td>&nbsp;</td>
										<td>
											<img id="captcha" src="<?= base_url('securimage/securimage_show.php'); ?>" alt="CAPTCHA Image" />
											<a href="#" onclick="document.getElementById('captcha').src = '<?= base_url() . "securimage/securimage_show.php?" ?>' + Math.random(); return false" style="color: #000000;">[ Ganti gambar ]</a>
										</td>
									</tr>
									<tr class="captcha_code">
										<td>&nbsp;</td>
										<td>
											<input type="text" name="captcha_code" class="required" maxlength="6" value="<?= $notif['data']['captcha_code']; ?>" /> Isikan kode di gambar
										</td>
									</tr>
									<tr class="submit">
										<td>&nbsp;</td>
										<td>
											<button class="button-submit" type="submit">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send w-4 h-4">
													<path d="m22 2-7 20-4-9-9-4Z"></path>
													<path d="M22 2 11 13"></path>
												</svg>
												<span>Kirim Komentar</span>
											</button>
										</td>
									</tr>
									<tr class="submit">
										<td><br><br></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			<?php else: ?>
				<span class='info'></span>
			<?php endif; ?>
		</div>
		<div class="contact_bottom">
			<?php if (!empty($komentar)): ?>
				<div class="contact_bottom">
					<div class="box-body">
						<?php foreach ($komentar as $data): ?>
							<table class="table table-bordered table-striped dataTable table-hover">
								<thead class="bg-gray disabled color-palette">
									<tr>
										<th><i class="fa fa-comment"></i> <?= $data['owner'] ?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<font color='green'><small><?= tgl_indo2($data['tgl_upload']) ?></small></font><br /><?= $data['komentar'] ?>
										</td>
									</tr>
								</tbody>
							</table>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php else: ?>
	<div class="artikel" id="artikel-blank">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="error_page_content">
				<h1>404</h1>
				<h2>Maaf</h2>
				<h3>Halaman ini belum tersedia atau sedang dalam perbaikan</h3>
				<p class="wow fadeInLeftBig">Silahkan kembali lagi ke halaman <a href="<?= site_url(); ?>first">Beranda</a></p>
			</div>
		</div>
	</div>
<?php endif; ?>