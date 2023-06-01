<?php
$CI = &get_instance();
$CI->load->model('RakModel', 'rak_model');

?>
<div class="card mt-2">
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-warning">
                <span><?= $this->session->flashdata('success') ?></span>
            </div>
        <?php endif ?>
        <div class="d-flex justify-content-between">
            <h4>surat Surat</h4>
            <div>
                <?php if ($this->session->userdata('role')->role_key == 1 || $this->session->userdata('role')->role_key == 3) : ?>
                    <a href="#" class="btn btn-dark fw-semibold" data-bs-toggle="modal" data-bs-target="#modal-add">
                        Tambah
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                    </a>
                <?php endif ?>
            </div>
        </div>
        <hr class="border" />
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama surat</th>
                        <th>Kategori</th>
                        <th>Rak</th>
                        <th>Tanggal Surat</th>
                        <th>File Surat</th>
                        <th>File Disposisi</th>
                        <th>Status</th>
                        <th>TTD</th>
                        <th>Deskriprsi</th>
                        <?php if ($this->session->userdata('role')->role_key == 1 || $this->session->userdata('role')->role_key == 3) : ?>
                            <th>Aksi</th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rak as $index => $valRak) : ?>
                        <tr class="bg-light">
                            <td colspan="11"><?= $valRak->nama_rak ?></td>
                        </tr>
                        <?php
                        $listSurat = $CI->rak_model->getSurat($valRak->id);
                        ?>
                        <?php foreach ($listSurat as $index => $val) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $val->nama_surat ?></td>
                                <td><?= $val->nama_kategori ?></td>
                                <td><?= $val->nama_rak ?></td>
                                <td><?= $val->tanggal_surat ?></td>
                                <td><a href="<?= './uploads/' . $val->file_surat ?>" target="_blank" class="text-dark"><i class="fa fa-download"></i></a></td>
                                <td><a href="<?= './uploads/' . $val->file_disposisi ?>" target="_blank" class="text-dark"><i class="fa fa-download"></i></a></td>
                                <td><?php
                                    if ($val->status == 0) {
                                        echo 'Pending';
                                    } elseif ($val->status == 1) {
                                        echo 'Sedang Diajukan';
                                    } elseif ($val->status == 2) {
                                        echo 'Disetujui';
                                    } else {
                                        echo 'Ditolak';
                                    }
                                    ?></td>
                                <td>
                                    <?php if ($val->ttd != null || $val->ttd != '') : ?>
                                        <img src="<?= $val->ttd ?>" width="150">
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?php if ($val->deskripsi != null || $val->deskripsi != '') : ?>
                                        <?= $val->deskripsi ?>
                                    <?php endif ?>
                                </td>
                                <?php if ($this->session->userdata('role')->role_key == 1 || $this->session->userdata('role')->role_key == 3) : ?>
                                    <td>
                                        <?php if ($val->status == 0 || $val->status == 1) : ?>
                                            <span class="p-1 rounded" style="cursor: pointer;" onclick="updateData('<?= $val->id ?>')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                    <path d="M13.5 6.5l4 4"></path>
                                                </svg>
                                            </span>
                                        <?php endif ?>
                                        <?php if ($val->status == 0) : ?>
                                            <span class="p-1 rounded" style="cursor:pointer;" onclick="ajukanData('<?= $val->id ?>')"><i class="fa fa-upload text-dark"></i></span>
                                        <?php endif ?>
                                        <?php if ($val->status == 0 || $val->status == 1) : ?>
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
                                        <?php endif ?>
                                    </td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
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
                                <?php foreach ($kategori as $kategoriSurat) : ?>
                                    <option value="<?= $kategoriSurat->id ?>"><?= $kategoriSurat->nama_kategori ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Rak surat">Rak surat</label>
                            <select name="rak_id" id="rak_id" class="form-control fw-semibold">
                                <?php foreach ($rak as $rakSurat) : ?>
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
                            <label for="Nama surat">File Disposisi</label>
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
                                <?php foreach ($kategori as $kategoriSurat) : ?>
                                    <option value="<?= $kategoriSurat->id ?>"><?= $kategoriSurat->nama_kategori ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="Rak surat">Rak surat</label>
                            <select name="rak_id" id="rak_id" class="form-control fw-semibold">
                                <?php foreach ($rak as $rakSurat) : ?>
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
                            <label for="Nama surat">File Disposisi</label>
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
<!-- Confirm ajukan -->
<div class="modal fade" id="modal-confirm-ajukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-2">
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-4">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah anda yakin?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div>Apakah yakin akan mengajukan data ini ?</div>
                <div class="d-flex justify-content-end gap-2 px-3 my-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="button-ok" class="btn btn-dark">Oke</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const config = {
        update_url: '<?= base_url('surat/get-by-id?id=') ?>',
        delete_url: '<?= base_url('surat/delete?id=') ?>',
        ajukan_url: '<?= base_url('surat/ajukan?id=') ?>',
    };
    const modal = {
        add: '#modal-add',
        update: '#modal-edit',
        confirm_delete: '#modal-confirm-delete',
        confirm_ajukan: '#modal-confirm-ajukan',
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

    const ajukanData = (id) => {
        openModal(modal.confirm_ajukan);
        $(modal.confirm_ajukan + ' #button-ok').attr('onclick', 'executeAjukan(' + id + ')');
    }

    const executeAjukan = async (id) => {
        await hitUrl({
            url: config.ajukan_url + id,
            callback: (res) => {
                location.reload();
            }
        });
    }
</script>