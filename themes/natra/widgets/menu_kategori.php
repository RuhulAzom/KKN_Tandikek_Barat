<!-- widget Kategori-->


<div id="menu-sidebar" class="single_bottom_rightbar">
	<!-- <div class="bg"></div>
	<div class="overlay"></div> -->
	<h2>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="" style="width: 1.25rem;">
			<path d="M3 3v18h18"></path>
			<path d="M18 17V9"></path>
			<path d="M13 17V5"></path>
			<path d="M8 17v-3"></path>
		</svg>
		Kategori
	</h2>
	<ul id="ul-menu-category" class="sidebar-latest">
		<?php foreach ($menu_kiri as $data): ?>
			<li onclick="goToArtikel('<?= site_url('artikel/kategori/' . $data['slug']); ?>')">
				<a id="menu-href" href="<?= site_url("artikel/kategori/$data[slug]"); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4 group-hover:translate-x-1 transition-transform" style="width: 1rem; height:1rem;">
						<path d="m9 18 6-6-6-6"></path>
					</svg>
					<?= $data['kategori']; ?>
					<?php (count($data['submenu']) > 0) and print('<span class="caret"></span>'); ?>
				</a>
				<?php if (count($data['submenu']) > 0): ?>
					<ul class="nav submenu">
						<?php foreach ($data['submenu'] as $submenu): ?>
							<li><a href="<?= site_url("artikel/kategori/$submenu[slug]"); ?>"><?= $submenu['kategori'] ?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<script>
	function goToArtikel(url) {
		window.location.href = url;
	}
</script>