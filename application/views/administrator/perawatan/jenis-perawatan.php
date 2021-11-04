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
</script>



<div class="page-header">
    <div class="page-header-title">
        <h4>List Jenis Perawatan</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Layanan Perawatan</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Jenis Perawatan</a>
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
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?php echo $row['id_jenis']; ?></td>
                            <td><a><?php echo $row['nama']; ?></a></td>
                            <td><?php echo $row['deskripsi']; ?></td>
                            <td><?php echo date("M d,Y", strtotime($row['update_at'])); ?></td>
                            <td>

                                <a class="label label-inverse-info"
                                    href='<?php echo base_url(); ?>administrator/perawatan/update-jenis-perawatan/<?php echo $row['id_jenis']; ?>'>Edit</a>
                                <a class="label label-inverse-danger delete"
                                    href='<?php echo base_url(); ?>administrator/perawatan/delete_jenis_perawatan/<?php echo $row['id_jenis']; ?>?table=<?php echo base64_encode('tbl_jenis_perawatan'); ?>'>Delete</a>

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