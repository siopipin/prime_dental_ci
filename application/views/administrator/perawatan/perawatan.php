<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">

<script type="text/javascript">
$(document).ready(function() {
    $(".delete").click(function(e) {
        alert('as');
        $this = $(this);
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function(r) {
            if (r.success) {
                $this.closest("tr").remove();
            }
        })
    });
});
$(document).ready(function() {
    $(".enable").click(function(e) {
        alert('as');
        $this = $(this);
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function(r) {
            if (r.success) {
                $this.closest("tr").remove();
            }
        })
    });
});
$(document).ready(function() {
    $(".disable").click(function(e) {
        alert('as');
        $this = $(this);
        e.preventDefault();
        var url = $(this).attr("href");
        $.get(url, function(r) {
            if (r.success) {
                $this.closest("tr").remove();
            }
        })
    });
});
</script>



<div class="page-header">
    <div class="page-header-title">
        <h4>List Layanan Perawatan</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Perawatan</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">List Perawatan</a>
            </li>
        </ul>
    </div>
</div>





<!-- Page-header end -->
<!-- Page-body start -->
<div class="page-body">
    <div>
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#formModalPerawatan">
            <i class="fas fa-plus"></i> Tambah Perawatan
        </button>
    </div>
    <!-- DOM/Jquery table start -->

    <div class="card">
        <div class="card-block">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Deskripsi</th>
                            <th>Biaya</th>
                            <th>Satuan</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($queryPerawatan as $row) : ?>
                        <tr>
                            <td><?php echo $row['nama']; ?></td>
                            <td><a><?php echo $row['jenis']; ?></a></td>
                            <td><?php echo $row['deskripsi']; ?></td>
                            <td><?php echo $row['biaya']; ?></td>
                            <td><?php echo $row['satuan']; ?></td>

                            <td><?php echo date("M d,Y", strtotime($row['update_at'])); ?></td>
                            <td>
                                <?php if ($row['status'] == 1) { ?>
                                <a class="label label-inverse-primary enable"
                                    href='<?php echo base_url(); ?>administrator/perawatan/enable/<?php echo $row['id_perawatan']; ?>?table=<?php echo base64_encode('tbl_perawatan'); ?>'>Enabled</a>
                                <?php } else { ?>
                                <a class="label label-inverse-warning desable"
                                    href='<?php echo base_url(); ?>administrator/perawatan/disable/<?php echo $row['id_perawatan']; ?>?table=<?php echo base64_encode('tbl_perawatan'); ?>'>Disabled</a>
                                <?php } ?>
                                <a class="label label-inverse-info"
                                    href='<?php echo base_url(); ?>administrator/perawatan/update-perawatan/<?php echo $row['id_perawatan']; ?>'>Edit</a>
                                <a class="label label-inverse-danger delete"
                                    href='<?php echo base_url(); ?>administrator/perawatan/delete/<?php echo $row['id_perawatan']; ?>?table=<?php echo base64_encode('tbl_perawatan'); ?>'>Delete</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>

                        <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); 
                                    ?>
                                </div>  -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DOM/Jquery table end -->
</div>

<!-- Modal -->
<div class="modal fade" id="formModalPerawatan" tabindex="-1" aria-labelledby="formModalLabelDokter" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelDokter">Tambah Data Perawatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('administrator/perawatan/add-perawatan'); ?>
                <div class="form-group">
                    <label for="nama">Nama Perawatan</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                    <small class="muted text-danger"><?= form_error('nama'); ?></small>
                </div>

                <!-- select option -->
                <div class="form-group">
                    <label for="jenisperawatan">Jenis</label>
                    <select class="form-control" name="jenisperawatan" id="jenisperawatan" required>

                        <option value="">Pilih jenis Perawatan</option>
                        <?php foreach ($jenisperawatan as $jenis) : ?>
                        <option value="<?php echo $jenis['id_jenis']; ?>">
                            <?php echo $jenis['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                    <small class="muted text-danger"><?= form_error('deskripsi'); ?></small>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="number" name="biaya" id="biaya" class="form-control">
                    <small class="muted text-danger"><?= form_error('biaya'); ?></small>
                </div>

                <!-- select option -->
                <div class="form-group">
                    <label for="satuan">Satuan</label>

                    <select class="form-control" name="satuan" id="satuan" required>
                        <option value="">Pilih Satuan</option>
                        <option value="pcs">pcs</option>
                        <option value="paket">paket</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>