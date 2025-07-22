<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style type="text/css">
	#slider {
		transition: all 300ms;
	}

	#slider:hover {
		transform: translateY(-6px);
		transition: all 300ms;
	}

	.card {
		border-radius: 1rem;
		box-shadow: 0 0 #0000, 0 0 #0000, 0 10px 15px -3px rgb(0 0 0 / 0.1),
			0 4px 6px -4px rgb(0 0 0 / 0.1);
		overflow: hidden;

	}

	.slick_slider img {
		width: 100%;
	}

	.slick_slider {
		margin-bottom: 0;
	}

	.slick_slider,
	.cycle-slideshow {
		max-height: 300px;
		/* border: 5px solid #e5e5e500; */
		display: block;
		position: relative;
		/*margin: 0px auto;*/
		overflow: hidden;
	}

	.textgambar {
		position: absolute;
		left: 20px;
		top: 280px;
		color: black;
		font-weight: bold;
		font-family: Oswald;

		background-color: #ffffff;
		border: 1px solid black;
		border-radius: 3px;
		padding: 5px;
		opacity: 0.6;
		filter: alpha(opacity=60);
		/* For IE8 and earlier */
	}

	.single_iteam {
		position: relative;
	}

	.single_iteam .content {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: #ffffff;
	}

	#slider .header_slider {
		/* background-color: #e53935; */
		color: #fff;
		padding: 1.5rem;
	}

	#slider .header_slider p {
		margin-bottom: 0;
	}

	#slider .header_slider h2 {
		font-size: 1.5rem;
		line-height: 2rem;
		font-weight: 700;
		display: flex;
		align-items: center;
		gap: .5rem;
		margin: 0;
	}

	#slider .slick_slider .content {
		position: absolute;
		padding-top: 2rem;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		padding: 2rem 15px 15px 15px;
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}

	#slider .slick_slider .content .imgBorder {
		/* border: 1px #000 solid; */
		padding: 0 2rem;
	}

	#slider .slick_slider .content .imgBorder img {
		border-radius: 1rem;
		box-shadow: 0 0 #0000, 0 0 #0000, 0 10px 15px -3px rgb(0 0 0 / 0.1),
			0 4px 6px -4px rgb(0 0 0 / 0.1);
	}

	#slider .slick_slider .content .detail {
		display: flex;
		flex-direction: column;
		/* justify-content: space-between; */
		background-color: rgba(255, 255, 255, 0.9);
		box-sizing: border-box;
	}

	#slider .slick_slider .content .meta {
		font-size: 12px;
		color: #888;
		margin-bottom: 10px;
		display: flex;
		gap: 10px;
		flex-wrap: wrap;
	}

	#slider .slick_slider .content .meta span {
		background: #ffeaea;
		color: #c0392b;
		padding: 4px 8px;
		border-radius: 3px;
		font-weight: bold;
	}

	#slider .slick_slider .content h3 {
		font-size: 18px;
		font-weight: bold;
		color: #333;
		margin: 0 0 10px 0;
		line-height: 1.3;
		max-height: 3em;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	#slider .slick_slider .content .artikel-desc {
		font-size: 14px;
		color: #555;
		line-height: 1.4em;
		max-height: 4.2em;
		overflow: hidden;
		text-overflow: ellipsis;
		margin: 0;
		padding-right: 1.5rem;
	}

	#slider .slick_slider .content .footer {
		display: flex;
		flex-direction: column;
		gap: 1rem;
		align-items: start;
		margin-top: 15px;
		font-size: 13px;
		color: #777;
	}

	#slider .slick_slider .content .footer .info span {
		margin-right: 15px;
	}

	#slider .slick_slider .content .footer a {
		text-decoration: none;
		/* background-color: #e53935; */
		color: white;
		padding: 10px 16px;
		border-radius: .5rem;
		transition: background-color 0.2s ease;
		font-size: 13px;
	}

	#slider .slick_slider .content .footer a:hover {
		/* background-color: #c0392b; */
		opacity: .9;
	}
</style>
<div id="slider" class="card">
	<div class="header_slider bg-gradient-main ">
		<h2 class="text-2xl font-bold flex items-center gap-3">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-6 h-6">
				<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
				<path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
				<path d="M10 9H8"></path>
				<path d="M16 13H8"></path>
				<path d="M16 17H8"></path>
			</svg>
			ARTIKEL TERBARU
		</h2>
		<p class="text-red-100 mt-2">Informasi terkini dari Desa Tandikek Barat</p>
	</div>
	<div class="slick_slider">
		<?php $active = true; ?>
		<?php foreach ($slider_gambar as $gambar) : ?>
			<?php $file_gambar = "desa/upload/artikel/" . 'sedang_' . $gambar['gambar']; ?>
			<?php if (is_file($file_gambar)) : ?>
				<div class="single_iteam <?php echo ($active == true) ? "active" : "" ?>" data-artikel="<?php echo $gambar['id'] ?>"
					<?php if ($slider_gambar['sumber'] != 3): ?>
					onclick="location.href='<?= 'artikel/' . buat_slug($gambar); ?>'"
					<?php endif; ?>>
					<div class="content">
						<div class="imgBorder">
							<img src="<?php echo base_url() . "desa/upload/artikel/"  . 'sedang_' . $gambar['gambar'] ?>" alt="">
						</div>
						<div class="detail">
							<div>
								<div class="meta">
									<span><?= $gambar['kategori'] ?></span>
									<span><?= date('d F Y', strtotime($gambar['tgl_upload'])) ?></span>
								</div>
								<h3><?= $gambar['judul'] ?></h3>
								<div class="artikel-desc"><?= potong_teks($gambar["isi"], 180) ?>...</div>
							</div>
							<div class="footer">
								<div class="info">
									<span><i class="fa fa-eye"></i> <?= $gambar['hit'] ?> views</span>
									<span><i class="fa fa-user"></i> <?= $gambar['owner'] ?></span>
									<?php if ($gambar['boleh_komentar'] == '1'): ?>
										<span><i class="fa fa-comments"></i> <?php $baca_komentar = $this->db->query("SELECT * FROM komentar WHERE id_artikel = '" . $data['id'] . "'");
																				$komentarku = $baca_komentar->num_rows();
																				echo number_format($komentarku, 0, ',', '.'); ?> Komentar</span>
									<?php endif; ?>
								</div>
								<a class="bg-gradient-main " href="<?= site_url('artikel/' . buat_slug($gambar)) ?>">Baca Selengkapnya <i class="bx bx-right-arrow-alt"></i></a>
							</div>
						</div>
					</div>
					<img class="tlClogo" src="<?php echo base_url() . "desa/upload/artikel/"  . 'sedang_' . $gambar['gambar'] ?>">
					<div style="display: none;" class="<?php if ($gambar['judul']): ?>textgambar <?php endif; ?>hidden-xs">
						<?= $gambar['judul'] ?>
					</div>
				</div>
				<?php $active = false; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
<script>
	$('.tlClogo').bind('contextmenu', function(e) {
		return false;
	});
	const check = <?= json_encode($slider_gambar) ?>;
	console.log({
		check
	})
</script>