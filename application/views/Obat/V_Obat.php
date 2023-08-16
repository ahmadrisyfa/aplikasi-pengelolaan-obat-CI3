    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Obat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>assets/AdminLTE/#">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-12">
            <div class="card">        
              <div class="card-header">
                <h3 class="card-title"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tambah Data</button></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Obat</th>
                      <th>Jenis Obat</th>
                      <th>Satuan</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Total Harga Stok</th>
                      <th>Tgl expired</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach ($obat as $index => $value): ?>
                  <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $value->nama_obat?></td>
                      <td><?= $value->nama_jenis_obat ?></td>
                      <td><?= $value->satuan?></td>
                      <td>Rp <?= number_format($value->harga, 0, ',', '.') ?></td>
                      <td><?= $value->stok?></td>
                      <td>
                          Rp<?= number_format($value->harga * $value->stok, 0, ',', '.') ?>
                      </td>
                      <td><?= $value->tgl_expired?></td>

                      
                      <td>
                        <button class="btn btn-primary edit-obat" data-id="<?= $value->id ?>">Edit</button>
                        <button class="btn btn-danger delete-jenis" data-id="<?= $value->id ?>">Delete</button>
                      </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
          </div>
          </div>
</section>
<!-- update -->
<div class="modal fade" id="editJenisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-obat-form">
                <label for="nama_jenis_obat">Jenis Obat:</label>
                      <select name="id_jenis_obat" id="edit_id_jenis_obat" class="form-control">
                      <?php foreach ($jenis_obat as $index => $data): ?>
                        <option value="<?= $data->id_jenis_obat ?>"> <?= $data->nama_jenis_obat ?></option>
                      <?php endforeach; ?>
                      </select>
                      
                      <input type="hidden" name="edit_id_obat" id="edit_id_obat" class="form-control">

                        <label for="nama_obat">Nama Obat:</label>
                        <input type="text" name="nama_obat" id="edit_nama_obat" class="form-control">
                        <label for="satuan">Satuan:</label>
                        <input type="text" name="satuan" id="edit_satuan" class="form-control">
                        <label for="harga">Harga:</label>
                        <input type="number" name="harga" id="edit_harga" class="form-control">
                        <label for="stok">Stok:</label>
                        <input type="number" name="stok" id="edit_stok" class="form-control">
                        <label for="tgl_expired">Tgl Expired:</label>
                        <input type="date" name="tgl_expired" id="edit_tgl_expired" class="form-control"> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="updateBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- create -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create Obat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body ">
                  <form id="create-form">
                      <label for="nama_jenis_obat">Jenis Obat:</label>
                      <select name="id_jenis_obat" id="id_jenis_obat" class="form-control">
                      <?php foreach ($jenis_obat as $index => $data): ?>
                        <option value="<?= $data->id_jenis_obat ?>"> <?= $data->nama_jenis_obat ?></option>
                      <?php endforeach; ?>
                      </select>
                        <label for="nama_obat">Nama Obat:</label>
                        <input type="text" name="nama_obat" id="nama_obat" class="form-control">
                        <label for="satuan">Satuan:</label>
                        <input type="text" name="satuan" id="satuan" class="form-control">
                        <label for="harga">Harga:</label>
                        <input type="number" name="harga" id="harga" class="form-control">
                        <label for="stok">Stok:</label>
                        <input type="number" name="stok" id="stok" class="form-control">
                        <label for="tgl_expired">Tgl Expired:</label>
                        <input type="date" name="tgl_expired" id="tgl_expired" class="form-control">                
                  </form>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="create-obat-btn">Save Changes</button>
              </div>
          </div>
      </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#create-obat-btn').click(function() {      
        $.ajax({
            url: '<?php echo base_url('obat/create'); ?>',
            type: 'POST',
            data: $('#create-form').serialize(),
            success: function() {                
                $('#createModal').modal('hide');
                location.reload(); 
            }
        });
    });

    $('.edit-obat').click(function() {
        var ObatId = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url("obat/edit"); ?>',
            type: 'POST',
            data: {id: ObatId},
            dataType: 'json',
            success: function(data) {      
              
              $('#edit_id_obat').val(data.id);

                $('#edit_id_jenis_obat').val(data.id_jenis_obat);
                $('#edit_nama_obat').val(data.nama_obat);
                $('#edit_satuan').val(data.satuan);
                $('#edit_harga').val(data.harga);
                $('#edit_stok').val(data.stok);
                $('#edit_tgl_expired').val(data.tgl_expired);
              
                $('#editJenisModal').modal('show');
            }
        });
    });
      
    $('#updateBtn').click(function() {
        var updatedData = {
            id: $('#edit_id_obat').val(),
            id_jenis_obat: $('#edit_id_jenis_obat').val(),
            nama_obat: $('#edit_nama_obat').val(),
            satuan: $('#edit_satuan').val(),
            harga: $('#edit_harga').val(),
            stok: $('#edit_stok').val(),
            tgl_expired: $('#edit_tgl_expired').val()
        };

        $.ajax({
            url: '<?php echo base_url("obat/update"); ?>',
            type: 'POST',
            data: updatedData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    location.reload();
                } else {
                    alert('Gagal melakukan update data obat.');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('Terjadi kesalahan saat mengirim permintaan AJAX.');
            }
        });
    });
    
    $('.delete-jenis').click(function() {
        var ObatId = $(this).data('id');
        
        var confirmDelete = confirm("Apakah Anda yakin ingin menghapus Data obat ini?");
        
        if (confirmDelete) {
            $.ajax({
                url: '<?php echo base_url('obat/delete'); ?>', 
                type: 'POST',
                data: { id: ObatId },
                success: function() {
                  location.reload(); 
                }
            });
        }
    });

});
</script>
