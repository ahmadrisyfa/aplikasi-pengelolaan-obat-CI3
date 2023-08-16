
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jenis Obat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>assets/AdminLTE/#">Home</a></li>
              <li class="breadcrumb-item active">Jenis Obat</li>
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
                      <th>Nama Jenis Obat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach ($jenis_obat as $index => $jenis): ?>
                  <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $jenis->nama_jenis_obat ?></td>
                      
                      <td>
                        <button class="btn btn-primary edit-jenis" data-id="<?= $jenis->id_jenis_obat ?>" data-nama-jenis="<?= $jenis->nama_jenis_obat ?>">Edit</button>
                        <button class="btn btn-danger delete-jenis"  data-id="<?= $jenis->id_jenis_obat ?>">Delete</button>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-jenis-form">
                    <input type="hidden" id="edit_jenis_id" name="edit_jenis_id">
                    <label for="edit_nama_jenis_obat">Nama Jenis Obat:</label>
                    <input type="text" id="edit_nama_jenis_obat" name="edit_nama_jenis_obat" class="form-control" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="edit-jenis-btn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- create -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create Jenis Obat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="create-form">
                      <label for="nama_jenis_obat">Nama Jenis Obat:</label>
                      <input type="text" id="nama_jenis_obat" name="nama_jenis_obat" class="form-control" required><br>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="create-product-btn">Save Changes</button>
              </div>
          </div>
      </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#create-product-btn').click(function() {      
        $.ajax({
            url: '<?php echo base_url('Jenis_obat/create'); ?>',
            type: 'POST',
            data: $('#create-form').serialize(),
            success: function() {                
                $('#createModal').modal('hide');
                location.reload(); 
            }
        });
    });

    $('.edit-jenis').click(function() {
        var jenisId = $(this).data('id');
        var namaJenis = $(this).data('nama-jenis');
        
        $('#edit_jenis_id').val(jenisId);
        $('#edit_nama_jenis_obat').val(namaJenis);
        
        $('#editJenisModal').modal('show');
    });
    
    $('#edit-jenis-btn').click(function() {
        var jenisId = $('#edit_jenis_id').val();
        var newNamaJenis = $('#edit_nama_jenis_obat').val();
        
        $.ajax({
            url: '<?php echo base_url('Jenis_obat/update'); ?>',
            type: 'POST',
            data: {
                id: jenisId,
                nama_jenis_obat: newNamaJenis
            },
            success: function() {
                location.reload();
            }
        });
    });

  
    $('.delete-jenis').click(function() {
    var jenisId = $(this).data('id');
    
    var confirmDelete = confirm("Apakah Anda yakin ingin menghapus Data Jenis obat ini?");
    
    if (confirmDelete) {
        $.ajax({
            url: '<?php echo base_url("Jenis_obat/delete"); ?>',
            type: 'POST',
            data: { id: jenisId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    location.reload();
                } else {
                    alert('Gagal menghapus data Jenis obat.');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('Jenis Obat Ini Di Gunakan Di Daftar Obat');
            }
        });
    }
});

});
</script>
