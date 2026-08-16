<section class="bg-light py-5">
  <div class="container">
    <h4 class="text-center">Cari Produk</h4>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form method="get" action="<?php echo base_url("produk/cari") ?>">
          <div class="input-group input-group-btn">
            <input type="text" name="keyword" class="form-control" value="<?php echo $keyword ?>">
              <button type="submit" class="btn btn-primary">Cari</button>
          </div>
        </form> 
      </div>
    </div>
  </div>
</section>

<div class="container">
	<h5>Hasil Pencarian</h5>

	<div class="row">
		<?php foreach ($produk as $key => $value): ?>
			<div class="col-md-4">
				<a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>" class="text-decoration-none">
					<div class="card border-0 shadow-sm">
						<img src="<?php echo $this->config->item("url_produk").$value['foto_produk'] ?>">
						<div class="card-body text-center">
							<h6><?php echo $value['nama_produk'] ?></h6>
							<p class="lead">Rp <?php echo number_format($value['harga_produk']) ?></p>
						</div>
					</div>
				</a>	
			</div>
		<?php endforeach ?>
	</div>
</div>