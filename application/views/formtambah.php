<?php
	defined('BASEPATH') OR exit('Akses langsung tidak diperbolehkan');
	//echo validation_errors();
?>

<section class="container-fluid">
	<div class="row">
		<div class="form-input clearfix">
			<div class="col-md-12">
				
				<?php
					if(isset($_SESSION['input_sukses']))
					{
				?>
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  	<strong>Sukses!</strong> <?php echo $_SESSION['input_sukses']; ?>
						</div>
				<?php
					}
				?>

				<div class="panel panel-primary">
					<div class="panel-heading">Tambah Data Buku</div>
					<div class="panel-body">
						<!-- <form action="<?php //echo base_url('home/tambahmobil'); ?>" method="post" class="form-horizontal"> -->
						
						<?php echo form_open('home/tambahbuku', ['class' => 'form-horizontal', 'method' => 'post']); ?>
							<div class="form-group <?php echo (form_error('idbuku') != '') ? 'has-error has-feedback' : '' ?>">
								<label for="idbuku" class="control-label col-sm-2"> ID Buku </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="idbuku" value="<?php echo set_value('idbuku'); ?>">
									<?php echo (form_error('idbuku') != '') ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
									<?php echo form_error(''); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="judul" class="control-label col-sm-2">Judul </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="judul" value="<?php echo set_value('judul'); ?>">
									<?php echo form_error('judul'); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="penerbit" class="control-label col-sm-2">Penerbit </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="penerbit" value="<?php echo set_value('penerbit'); ?>">
									<?php echo form_error('penerbit'); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pengarang" class="control-label col-sm-2">Pengarang </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="pengarang" value="<?php echo set_value('pengarang'); ?>">
									<?php echo form_error('pengarang'); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="bahasa" class="control-label col-sm-2">Bahasa </label>
								<div class="col-sm-10">
							<input class="form-check-input" type="radio" name="bahasa" id="Indoenesia" value="Indonesia" >
							<label class="form-check-label" for="Indonesia">Indonesia</label  &nbsp > 
							<input class="form-check-input" type="radio" name="bahasa" id="Inggris" value="Inggris">
							<label class="form-check-label" for="Inggris">Inggris</label>	
								</div>
							</div>

							<div class="form-group">
								<label for="tahunterbit" class="control-label col-sm-2">Tahun Terbit </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="tahunterbit" value="<?php echo set_value('tahunterbit'); ?>">
									<?php echo form_error('tahunterbit'); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="kategoribuku" class="control-label col-sm-2">Kategori Buku </label>
								<div class="col-sm-10">
								<?php 
                                foreach ($query as $row) {
                                    $options[$row['kdkategori']] = $row['namakategori'];
                                }
                                echo form_dropdown('kategoribuku', $options, '', 'class="form-control " id="buku"');
                            ?>
									<?php echo form_error('kategoribuku'); ?>
								</div>
							</div>
                            

							<div class="form-group">
								<label for="deskripsi" class="control-label col-sm-2">Deskripsi </label>
								<div class="col-sm-10">
									<input type="textarea" class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi'); ?>">
									<?php echo form_error('deskripsi'); ?>
								</div>
							</div>

							<div class="form-group">
								<div class="btn-form col-sm-12">
									<a href="<?php echo base_url('home/lihatdata'); ?>"><button type="button" class='btn btn-default'>Batal</button></a>
									<button type="submit" class='btn btn-primary'>Simpan</button>
								</div>
							</div>
						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>