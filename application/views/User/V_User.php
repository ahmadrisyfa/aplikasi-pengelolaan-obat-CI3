<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>assets/AdminLTE/#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <!-- <h3 class="card-title"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tambah Data</button></h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Status Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach ($user as $index => $value): ?>
                  <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $value->username ?></td>
                      <td><?= $value->fullname ?></td>
                        <td>
                        <?php if ($value->is_active == 'Aktif'): ?>
                            <span class="btn btn-success btn-sm"><?= $value->is_active ?></span>
                            <?php else: ?>
                            <span class="btn btn-danger btn-sm"><?= $value->is_active ?></span>
                        <?php endif; ?>

                        </td>                      
                      <td>
                        <button class="btn btn-primary edit-user" data-id="<?= $value->id ?>">Edit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form">
                    <input type="hidden" id="edit_id_user" name="edit_id_user">
                    <label for="edit_nama_jenis_obat">Username:</label>
                    <input type="text" disabled id="edit_username" name="edit_username" class="form-control" required>
                    <label for="edit_nama_jenis_obat">Fullname:</label>
                    <input type="text" disabled id="edit_fullname" name="edit_fullname" class="form-control" required>
                    <label for="edit_nama_jenis_obat">Status Active:</label>
                    <select name="is_active" id="edit_is_active" required class="form-control">
                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif">Non Aktif</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="updateBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
   

    $('.edit-user').click(function() {
        var id_user = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url("user/edit"); ?>',
            type: 'POST',
            data: {id: id_user},
            dataType: 'json',
            success: function(data) {      
              
              $('#edit_id_user').val(data.id);
              $('#edit_username').val(data.username);
              $('#edit_fullname').val(data.fullname);
              $('#edit_is_active').val(data.is_active);              
              $('#editJenisModal').modal('show');
            }
        });
    });
    
    $('#updateBtn').click(function() {
        var updatedData = {
            id: $('#edit_id_user').val(),           
            is_active: $('#edit_is_active').val(),            
        };

        $.ajax({
            url: '<?php echo base_url("user/update"); ?>',
            type: 'POST',
            data: updatedData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    location.reload();
                } else {
                    alert('Gagal melakukan update data User.');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('Terjadi kesalahan saat mengirim permintaan AJAX.');
            }
        });
    });

     

});
</script>
