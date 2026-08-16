<div class="container py-3">
	<div class="row">
		<!-- <pre><?php print_r($artikel) ?></pre> -->
		<div class="col-md-6">
			<img src="<?php echo $this->config->item("url_artikel") . $artikel['foto_artikel']; ?>" class="w-100" alt="Foto Artikel">
		</div>
		<div class="col-md-6">
			<h3><?php echo $artikel["judul_artikel"]; ?></h3>
			<p><?php echo $artikel["isi_artikel"]; ?></p>
		</div>
	</div>
</div>
