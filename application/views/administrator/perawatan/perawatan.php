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
        <h4>List Users</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Users</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">List Users</a>
            </li>
        </ul>
    </div>
</div>

<!-- Page-header end -->
<!-- Page-body start -->
<div class="page-body">
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