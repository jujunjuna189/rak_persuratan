<?php
$CI =& get_instance();
$CI->load->model('RakModel','rak_model');

?>
<div class="card mt-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4>Laporan</h4>
            <form action="" method="get">
            <div class="d-flex justify-content-start gap-2">
                <select name="filter_rak_id" id="" class="form-control">
                    <option value="">Semua Rak</option>
                    <?php foreach($rak as $rakItem): ?>
                        <option value="<?= $rakItem->id ?>" <?php if(isset($_GET['filter_rak_id'])){ 
                            if($_GET['filter_rak_id'] == $rakItem->id){
                                echo 'selected';
                            }
                         } ?> ><?= $rakItem->nama_rak ?></option>
                    <?php endforeach ?>
                </select>
                <select name="filter_kategori_id" id="" class="form-control">
                    <option value="">Semua Kategori</option>
                    <?php foreach($kategori as $kategoriItem): ?>
                        <option value="<?= $kategoriItem->id ?>" <?php if(isset($_GET['filter_kategori_id'])){ 
                            if($_GET['filter_kategori_id'] == $kategoriItem->id){
                                echo 'selected';
                            }
                         } ?> ><?= $kategoriItem->nama_kategori ?></option>
                    <?php endforeach ?>
                </select>
                <input type="date" name="date_awal" id="" class="form-control" placeholder="Tanggal Awal" value="<?php if(isset($_GET['date_awal'])){
                    echo $_GET['date_awal'];
                } ?>" >
                <input type="date" name="date_akhir" id="" class="form-control" placeholder="Tanggal Akhir" value="<?php if(isset($_GET['date_akhir'])){
                    echo $_GET['date_akhir'];
                } ?>">
                <input type="submit" class="btn btn-dark fw-semibold" name="filter" value="Filter">
                <input type="submit" class="btn btn-danger fw-semibold" name="download" value="Download PDF" formtarget="_blank"> 
            </div>
            </form>
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
                            <td><a href="<?= './uploads/'.$val->file_surat ?>" target="_blank" class="text-dark"><i class="fa fa-download"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
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