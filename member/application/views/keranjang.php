
<div class="container">

	<?php if (empty($keranjang)): ?>
		<div class="text-bg-secondary p-3 my-3 lead">
			Yaaaahhhh, keranjang belanja masih kosong. 
		</div>
			<a href="<?php echo base_url('produk') ?>" class="btn btn-primary">ayo belanja</a>
	<?php endif ?>

	<?php foreach ($keranjang as $key => $per_penjual): ?>
		

		<div class="mb-5 mt-3">
			<h3><?php echo $per_penjual["nama_member"] ?></h3>
			<table class="table table-sm table-bordered">
				<?php foreach ($per_penjual['produk'] as $k => $per_produk): ?>
					<tr>
						<td>
							<img src="<?php echo $this->config->item("url_produk").$per_produk["foto_produk"]?>" width="70"> <br>	
							<?php echo $per_produk['nama_produk'] ?>
						</td>
						<td><?php echo number_format($per_produk['harga_produk']) ?></td>
						<td><?php echo $per_produk['jumlah'] ?></td>
						<td>
							<a href="<?php echo base_url("keranjang/hapus/".$per_produk["id_keranjang"]) ?>" class="btn btn-danger btn-sm">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</table>

			<div class="row">
				<div class="col-md-6 text-start">
					<a href="<?php echo base_url("produk") ?>" class="btn btn-secondary">Belanja Lagi</a>	
				</div>
				<div class="col-md-6 text-end">
					<a href="<?php echo base_url("keranjang/checkout/".$per_penjual["id_member"]) ?>" class="btn btn-primary">Checkout</a>
				</div>
			</div>

			
		</div>
	<?php endforeach ?>
</div> 