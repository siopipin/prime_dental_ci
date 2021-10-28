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
           <h4>Users</h4>
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
               <li class="breadcrumb-item"><a href="#!">Add Users</a>
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
                       <h5>Add User</h5>
                       <div class="card-header-right">
                           <i class="icofont icofont-rounded-down"></i>
                           <i class="icofont icofont-refresh"></i>
                           <i class="icofont icofont-close-circled"></i>
                       </div>
                   </div>
                   <div class="card-block">
                       <div class="col-sm-8">
                           <div class="validation_errors_alert">

                           </div>
                       </div>
                       <div class="col-sm-8">
                           <?php echo form_open_multipart('administrator/users/add-user'); ?>

                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Nama</label>
                               <div class="col-sm-10">
                                   <input type="text" name="name" class="form-control" placeholder="Full Name">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Username</label>
                               <div class="col-sm-10">
                                   <input type="text" name="username" class="form-control" placeholder="User Name">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Email</label>
                               <div class="col-sm-10">
                                   <input type="text" name="email" class="form-control" placeholder="Email">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">No. HP</label>
                               <div class="col-sm-10">
                                   <input type="text" name="contact" class="form-control" placeholder="Mobile No.">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Alamat</label>
                               <div class="col-sm-10">
                                   <input type="text" name="address" class="form-control" placeholder="Address">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label" for="golongandarah">Golongan Darah</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="golongan_darah" id="golongan_darah" required>
                                       <option value="O">Golongan O</option>
                                       <option value="A">Golongan A</option>
                                       <option value="B">Golongan B</option>
                                       <option value="AB">Golongan AB</option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group row" style="float:center;">
                               <label class="col-sm-2 col-form-label">Jenis Kelamin</label>&nbsp;&nbsp;&nbsp;&nbsp;

                               <label>
                                   <input value="Female" name="gender" checked="" type="radio"><i class="helper"></i>
                                   Female
                               </label>
                               &nbsp;&nbsp;&nbsp;&nbsp;
                               <label>
                                   <input value="Male" name="gender" type="radio"><i class="helper"></i> Male
                               </label>
                           </div>

                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Foto</label>
                               <div class="col-sm-6">
                                   <input type="file" name="userfile" id="avatar"
                                       accept="image/png, image/jpeg, image/jpg, image/gif" class="form-control">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                               <div class="col-sm-6">
                                   <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                       placeholder="" value="<?= set_value('tanggal_lahir') ?>">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Role</label>
                               <div class="col-sm-6">
                                   <select class="form-control" name="role" id="role" required>
                                       <option value="4">User</option>
                                       <option value="1">Admin</option>
                                       <option value="3">Dokter / Perawat</option>
                                       <option value="2">Owner</option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                               <div class="col-sm-3">
                                   <input type="checkbox" value="1" name="status" class="js-single" checked />
                               </div>
                           </div>

                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label"></label>
                               <div class="col-sm-10">
                                   <button type="submit" name="submit" class="btn btn-primary">Add</button>
                               </div>
                           </div>
                           <textarea id="description" style="visibility: hidden;"></textarea>

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