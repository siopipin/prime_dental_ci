   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css">
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
   <!-- Date-range picker css  -->
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.css" />
   <!-- Date-Dropper css -->
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.css" />
   <link rel="stylesheet" type="text/css"
       href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css" />


   <div class="page-header">
       <div class="page-header-title">
           <h4>Jenis Perawatan</h4>
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
               <li class="breadcrumb-item"><a href="#!">Update Jenis Perawatan</a>
               </li>
           </ul>
       </div>
   </div>
   <!-- Page header end -->
   <!-- Page body start -->
   <div class="page-body">
       <div class="row">
           <div class="col-sm-12">
               <!-- Basic Form Inputs card start -->
               <div class="card">
                   <div class="card-header">
                       <h5>Update Jenis Perawatan Perawatan -- <small
                               style="text-decoration: underline;"><?php echo $row['nama']; ?></small></h5>
                       <div class="card-header-right">
                           <i class="icofont icofont-rounded-down"></i>
                           <i class="icofont icofont-refresh"></i>
                           <i class="icofont icofont-close-circled"></i>
                       </div>
                   </div>
                   <div class="card-block">
                       <div class="col-sm-8">
                           <?php echo form_open_multipart('administrator/perawatan/do-update-jenis-perawatan'); ?>
                           <input type="hidden" name="id" class="form-control" value="<?php echo $row['id_jenis']; ?>">
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Jenis Perawatan</label>
                               <div class="col-sm-10">
                                   <input type="text" name="jenis_perawatan" class="form-control"
                                       value="<?php echo $row['nama']; ?>" placeholder="Jenis Perawatan">
                               </div>
                           </div>


                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Deskripsi</label>
                               <div class="col-sm-10">
                                   <input type="text" name="deskripsi" class="form-control"
                                       value="<?php echo $row['deskripsi']; ?>" placeholder="Deskripsi">
                               </div>
                           </div>


                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label"></label>
                               <div class="col-sm-10">
                                   <button type="submit" name="submit" class="btn btn-primary">Update</button>
                               </div>
                           </div>
                           <textarea id="jenisperawatan" style="visibility: hidden;"></textarea>
                           </form>
                       </div>

                   </div>
               </div>
           </div>
           <!-- Basic Form Inputs card end -->


           <script type="text/javascript"
               src="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.js"></script>
           <!-- Custom js -->
           <script type="text/javascript"
               src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/swithces.js"></script>
           <script type="text/javascript"
               src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/moment-with-locales.min.js">
           </script>
           <script type="text/javascript"
               src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
           </script>
           <script type="text/javascript"
               src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/bootstrap-datetimepicker.min.js">
           </script>
           <!-- Date-range picker js -->
           <script type="text/javascript"
               src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.js">
           </script>
           <!-- Date-dropper js -->
           <script type="text/javascript"
               src="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.js"></script>


           <!-- ck editor -->
           <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>
           <!-- echart js -->

           <script src="<?php echo base_url(); ?>admintemplate/assets/pages/user-profile.js"></script>