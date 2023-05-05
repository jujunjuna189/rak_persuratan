<div class="card mt-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4>surat Surat</h4>
            <div>
                <a href="#" class="btn btn-dark fw-semibold" data-bs-toggle="modal" data-bs-target="#modal-add">
                    Tambah
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                </a>
            </div>
        </div>
        <hr class="border" />
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama surat</th>
                        <th>Kategori</th>
                        <th>Rak</th>
                        <th>Tanggal Surat</th>
                        <th>File Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($surat as $index => $val) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $val->nama_surat ?></td>
                            <td><?= $val->nama_kategori ?></td>
                            <td><?= $val->nama_rak ?></td>
                            <td><?= $val->tanggal_surat ?></td>
                            <td><a href="<?= './uploads/'.$val->file_surat ?>" target="_blank" class="btn btn-primary">Lihat File</a></td>
                            <td>
                                <span class="p-1 rounded" style="cursor: pointer;" onclick="updateData('<?= $val->id ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                </span>
                                <span class="ms-2" style="cursor: pointer;" onclick="deleteData('<?= $val->id ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Add -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-2">
            <div class="modal-body">
                <form action="<?= base_url('surat/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between mb-4">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah surat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Kategori surat">Kategori surat</label>
                            <select name="kategori_id" id="kategori_id" class="form-control fw-semibold">
                                <?php foreach($kategori as $kategoriSurat) : ?>
                                    <option value="<?= $kategoriSurat->id ?>"><?= $kategoriSurat->nama_kategori ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                        <label for="Rak surat">Rak surat</label>
                            <select name="rak_id" id="rak_id" class="form-control fw-semibold">
                            <?php foreach($rak as $rakSurat) : ?>
                                    <option value="<?= $rakSurat->id ?>"><?= $rakSurat->nama_rak ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Nama surat">Nama surat</label>
                            <input type="text" name="nama_surat" id="nama_surat" class="form-control fw-semibold" placeholder="...">
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Nama surat">File surat</label>
                            <input type="file" name="file_surat" id="file_surat" class="form-control fw-semibold" placeholder="...">
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Nama surat">Tanggal surat</label>
                            <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control fw-semibold" placeholder="...">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 px-3 my-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-dark">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Update -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-2">
            <div class="modal-body">
                <form action="<?= base_url('surat/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between mb-4">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit surat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <input type="hidden" name="id" id="id">
                            <label for="Kategori surat">Kategori surat</label>
                            <select name="kategori_id" id="kategori_id" class="form-control fw-semibold">
                                <?php foreach($kategori as $kategoriSurat) : ?>
                                    <option value="<?= $kategoriSurat->id ?>"><?= $kategoriSurat->nama_kategori ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                        <label for="Rak surat">Rak surat</label>
                            <select name="rak_id" id="rak_id" class="form-control fw-semibold">
                            <?php foreach($rak as $rakSurat) : ?>
                                    <option value="<?= $rakSurat->id ?>"><?= $rakSurat->nama_rak ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Nama surat">Nama surat</label>
                            <input type="text" name="nama_surat" id="nama_surat" class="form-control fw-semibold" placeholder="...">
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Nama surat">File surat</label>
                            <input type="file" name="file_surat" id="file_surat" class="form-control fw-semibold" placeholder="...">
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Nama surat">Tanggal surat</label>
                            <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control fw-semibold" placeholder="...">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 px-3 my-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-dark">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const config = {
        update_url: '<?= base_url('surat/get-by-id?id=') ?>',
        delete_url: '<?= base_url('surat/delete?id=') ?>',
    };
    const modal = {
        add: '#modal-add',
        update: '#modal-edit',
        confirm_delete: '#modal-confirm-delete',
    };
    const field = {
        id: '#id',
        nama_surat: '#nama_surat',
        kategori_id: '#kategori_id',
        rak_id: '#rak_id',
        tanggal_surat: '#tanggal_surat',
    };

    const hitUrl = ({
        url,
        callback
    }) => {
        let route = url;
        $.ajax({
            url: route,
            type: 'get',
            dataType: 'json',
            success: (response) => {
                callback(response);
            },
            error: (err) => {
                console.log(err);
            }
        });
    }

    const openModal = (idElement) => {
        $(idElement).modal('show');
    }

    const updateData = async (id) => {
        await hitUrl({
            url: config.update_url + id,
            callback: (res) => {
                setFieldForm(res);
            }
        });
        openModal(modal.update);
    }

    const setFieldForm = (data) => {
        $(modal.update + ' ' + field.id).val(data.id);
        $(modal.update + ' ' + field.nama_surat).val(data.nama_surat);
        $(modal.update + ' ' + field.kategori_id).val(data.kategori_id);
        $(modal.update + ' ' + field.rak_id).val(data.rak_id);
        $(modal.update + ' ' + field.tanggal_surat).val(data.tanggal_surat);
    }

    const deleteData = (id) => {
        openModal(modal.confirm_delete);
        $(modal.confirm_delete + ' #button-ok').attr('onclick', 'executeDelete(' + id + ')');
    }

    const executeDelete = async (id) => {
        await hitUrl({
            url: config.delete_url + id,
            callback: (res) => {
                location.reload();
            }
        });
    }
</script>