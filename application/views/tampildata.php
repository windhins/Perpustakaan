<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="jumbotron text-center">
	<h2>Data Buku</h2>
	<hr width="20%">
</div>

<section class="container">
	<div class="row">
		<div class="col-md-12">

			<?php
				if(isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
					$notif = '';

					isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
					isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
			?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Sukses!</strong> <?php echo $notif; ?>
			</div>
			<?php
				endif;
			?>

			<div class="panel panel-primary">
				<div class="panel-heading">Data Buku</div>
				<div class="panel-body">
					<div class="col-md-12" style="padding-bottom: 15px;">
						<a href="<?php echo base_url('home/formtambah'); ?>">
							<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>
								Tambah Data</button>
						</a>
					</div>

					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>ID Buku</th>
										<th>Judul</th>
										<th>Penerbit</th>
										<th>Pengarang</th>
										<th>Bahasa</th>
										<th>Tahun Terbit</th>
										<th>Kategori Buku</th>
										<th>Deskripsi</th>
										<th>Opsi</th>
									</tr>
								</thead>

								<tbody>
									<?php
										$no = 1;
										foreach($database as $db) : ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $db->idbuku; ?></td>
										<td><?php echo $db->judul; ?></td>
										<td><?php echo $db->penerbit; ?></td>
										<td><?php echo $db->pengarang; ?></td>
										<td><?php echo $db->bahasa; ?></td>
										<td><?php echo $db->tahunterbit; ?></td>
										<td><?php echo $db->kategoribuku; ?></td>
										<td><?php echo $db->deskripsi; ?></td>
										<td>
											<a href="<?php echo base_url('home/formedit/'.$db->idbuku); ?>"><button
													type="button" class="btn btn-default btn-xs"><span
														class="glyphicon glyphicon-pencil"
														aria-hidden="true"></span> Perbarui</button></a>
											<a href="<?php echo base_url('home/hapusdata/'.$db->idbuku); ?>"
												onclick="return confirm('Anda yakin hapus ?')"><button type="button"
													class="btn btn-danger btn-xs"><span
														class="glyphicon glyphicon-remove"></span> Hapus</button></a>
										</td>
									</tr>
									<?php
										$no++;
										endforeach;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

