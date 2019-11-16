<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<h1>VIEW </h1>
	<?php echo anchor('crud/tambah','Tambah Data'); ?>
	<table style="margin:20px auto;">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td>
            <?php echo anchor('crud/export_doc/'.$u->no,'Export to Docx'); ?>
                              <?php echo anchor('crud/hapus/'.$u->no,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>