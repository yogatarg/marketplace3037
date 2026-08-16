<div class="container py-3">
	<div class="row">
		<div class="col-md-6">
			<img src="<?php echo $this->config->item("url_produk").$produk["foto_produk"]?>" class="w-100">
		</div>
		<div class="col-md-6">
			<h3><?php echo $produk["nama_produk"] ?></h3>
			<span class="badge bg-dark"><?php echo $produk["nama_kategori"] ?></span>
			<p class="lead"><?php echo number_format($produk["harga_produk"]) ?></p>

			<?php if ($produk["id_member"]!==$this->session->userdata("id_member")): ?>
			<form class="my-2" method="post">
				<div class="input-group">
					<input type="number" name="jumlah" class="form-control" min="1" value="1">
					<button class="btn btn-primary">Beli</button>
				</div>
			</form>
			<?php endif ?>

			<h5 class="pt-3">Deskripsi Produk : </h5>

			<p><?php echo $produk["deskripsi_produk"]; ?></p>
		</div>
	</div>
</div>