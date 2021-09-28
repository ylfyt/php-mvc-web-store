<div class="container mt-3">
    
    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#formModal">Add Data</button>

            <h3>Daftar Mahasiswa</h3>

            <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs ) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs['name'] ?>
                        <div class="action d-flex">
                          
                          <form action="<?= BASEURL; ?>/mahasiswa/delete/" method="post">
                            <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                            <button type="submit" class="btn badge btn-danger ms-2" name="delete" onclick="return confirm('Yakin?');">delete</button>
                          </form>

                          <button type="button" class="badge btn btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#formModal">edit</button>

                          <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-primary ms-4 text-decoration-none">detail</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    
        <form action="<?= BASEURL; ?>/mahasiswa/insert" method="post">
            <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>

            <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" id="name" name="nim" placeholder="">
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="">
            </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="insert">Insert Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
