<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="artikel" class="single_page_area">
	<div class="title">
		<div class="header bg-gradient-main">
			<h2>Data Demografi Berdasar <?= $heading ?></h2>
		</div>
		<div class="content">
			<div class="box-body">
				<div class="table-responsive" style="color: white;">
					<?php if (count($main) > 0) : ?>
						<table class="table table-bordered  bg-gradient-main">
							<thead>
								<tr>
									<th>No</th>
									<th><?= ucwords($this->setting->sebutan_dusun) ?></th>
									<th>RW</th>
									<th>RT</th>
									<th>Nama Kepala/Ketua</th>
									<th class="center">KK</th>
									<th class="center">L+P</th>
									<th class="center">L</th>
									<th class="center">P</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($main as $indeks => $data): ?>
									<tr>
										<td align="center"><?= $indeks + 1 ?></td>
										<td><?= ($main[$indeks - 1]['dusun'] == $data['dusun']) ? '' : strtoupper($data['dusun']) ?></td>
										<td><?= ($main[$indeks - 1]['rw'] == $data['rw']) ? '' : $data['rw'] ?></td>
										<td><?= $data['rt'] ?></td>
										<td><?= $data['nama_kepala'] ?></td>
										<td align="right"><?= $data['jumlah_kk'] ?></td>
										<td align="right"><?= $data['jumlah_warga'] ?></td>
										<td align="right"><?= $data['jumlah_warga_l'] ?></td>
										<td align="right"><?= $data['jumlah_warga_p'] ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="5" align="left"><label>TOTAL</label></td>
									<td align="right"><?= $total['total_kk'] ?></td>
									<td align="right"><?= $total['total_warga'] ?></td>
									<td align="right"><?= $total['total_warga_l'] ?></td>
									<td align="right"><?= $total['total_warga_p'] ?></td>
								</tr>
							</tfoot>
						</table>
					<?php else : ?>
						Belum ada data...
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>

</div>