<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php foreach ($teks_berjalan as $teks): ?>
	<span class="teks" style=" padding-right: 50px;">
		<?= $teks['teks'] ?>
		<?php if ($teks['tautan']): ?>
			<a href="<?= $teks['tautan'] ?>" rel="noopener noreferrer" title="Baca Selengkapnya"><?= $teks['judul_tautan'] ?></a>
		<?php endif; ?>
	</span>
<?php endforeach; ?>