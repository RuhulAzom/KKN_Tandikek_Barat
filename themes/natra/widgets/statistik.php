<!-- widget Statistik Penduduk -->

<style>
	#menu-sidebar {
		background-color: #fff;
		box-shadow: var(--shadow-lg);
		/* border-radius: var(--rounded-xl); */
		overflow: hidden;
	}

	#menu-sidebar h2 {
		background: var(--main-gradient);
		padding: 1rem;
		margin: 0;
		color: #fff;
		border: none;
		display: flex;
		align-items: center;
		gap: .5rem;
		font-weight: 600;
	}

	#menu-sidebar h2 a:hover {
		color: #d1d1d1;
	}
</style>

<style type="text/css">
	.highcharts-xaxis-labels tspan {
		font-size: 8px;
	}
</style>
<div id="menu-sidebar" class="single_bottom_rightbar">
	<h2>
		<a href="<?= site_url("first/statistik/4") ?>">
			<i class="fa fa-bar-chart"></i>
			Statistik Penduduk
		</a>
	</h2>
	<script type="text/javascript">
		$(function() {
			var chart_widget;
			$(document).ready(function() {
				// Build the chart
				chart_widget = new Highcharts.Chart({
					chart: {
						renderTo: 'container_widget',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Jumlah Penduduk'
					},
					yAxis: {
						title: {
							text: 'Jumlah'
						}
					},
					xAxis: {
						categories: [
							<?php foreach ($stat_widget as $data): ?>
								<?php if ($data['jumlah'] != "-" and $data['nama'] != "JUMLAH"): ?>['<?= $data['jumlah'] ?> <br> <?= $data['nama'] ?>'],
								<?php endif; ?>
							<?php endforeach; ?>
						]
					},
					legend: {
						enabled: false
					},
					plotOptions: {
						series: {
							colorByPoint: true
						},
						column: {
							pointPadding: 0,
							borderWidth: 0
						}
					},
					series: [{
						type: 'column',
						name: 'Populasi',
						data: [
							<?php foreach ($stat_widget as $data): ?>
								<?php if ($data['jumlah'] != "-" and $data['nama'] != "JUMLAH"): ?>['<?= $data['nama'] ?>', <?= $data['jumlah'] ?>],
								<?php endif; ?>
							<?php endforeach; ?>
						]
					}]
				});
			});

		});
	</script>
	<div id="container_widget" style="width: 100%; height: 300px; margin: 0 auto"></div>
</div>