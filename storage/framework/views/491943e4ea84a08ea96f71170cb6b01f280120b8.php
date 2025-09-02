<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title><?php echo e($data['page_title']); ?> | <?php echo e(env("APP_NAME")); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Start Include Css -->
    <?php echo $__env->make('admin.headers.maincss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Css -->
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Start Include Header -->
        <?php echo $__env->make('admin.headers.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Include Header -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0"><?php echo e($data['page_title']); ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                                        <li class="breadcrumb-item active"><?php echo e($data['page_title']); ?>

                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form class="needs-validation form_data" action="<?php echo e($data['submit_url']); ?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e(Crypt::encryptString(@$row->id)); ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body frm">
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Select Client</label>
                                                <select class="form-select mb-3" name="client_id" required id="select-client">
                                                    <option value="" >Select</option>
                                                    <?php ($client = DB::table("users")->where(["id"=>@$row->client_id,])->first()); ?>
                                                    <?php if(!empty($client)): ?>
                                                        <option value="<?php echo e($client->id); ?>" selected ><?php echo e($client->name); ?></option>
                                                    <?php endif; ?>                                                    
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Select Project Type</label>
                                                <select class="form-select mb-3" name="type" required id="select-project-type">
                                                    <option value="" >Select</option>
                                                    <?php ($projectType = DB::table("project_type")->where(["id"=>@$row->type,])->first()); ?>
                                                    <?php if(!empty($projectType)): ?>
                                                        <option value="<?php echo e($projectType->id); ?>" selected ><?php echo e($projectType->name); ?></option>
                                                    <?php endif; ?>                                                    
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Select Project Item</label>
                                                <select class="form-select mb-3" name="item" required id="select-item">
                                                    <option value="" >Select</option>
                                                    <?php ($projectItem = DB::table("item")->where(["id"=>@$row->item,])->first()); ?>
                                                    <?php if(!empty($projectItem)): ?>
                                                        <option value="<?php echo e($projectItem->id); ?>" selected ><?php echo e($projectItem->name); ?></option>
                                                    <?php endif; ?>                                                      
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Length</label>
                                                <input type="number" class="form-control" placeholder="Enter Length" name="length" value="<?php echo e(@$row->length); ?>" id="length" required>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Height</label>
                                                <input type="number" class="form-control" placeholder="Enter Height" name="height" value="<?php echo e(@$row->height); ?>" id="height" required>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Sqft</label>
                                                <input type="number" class="form-control" placeholder="Enter Sqft" name="sqft" value="<?php echo e(@$row->sqft); ?>" id="sqft" required readonly>
                                            </div>

                                            
                                            

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Action</label>
                                                <select class="form-select mb-3" name="status">
                                                    <option value="1" <?php if(!empty(@$row) && @$row->status==1): ?>selected <?php endif; ?> >Active</option>
                                                    <option value="0" <?php if(!empty(@$row) && @$row->status==0): ?>selected <?php endif; ?> >Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end card -->
                                        <div class="text-center mt-5 mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Page-content -->
            <!-- Start Include Footer -->
            <?php echo $__env->make('admin.headers.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Include Footer -->
        </div>
    </div>
    <!-- END layout-wrapper -->
    <!-- Start Include Script -->
    <?php echo $__env->make('admin.headers.mainjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Script -->



    <script>
        function getsqft() {
            let length = $("#length").val();
            let height = $("#height").val();

            $("#sqft").val(length*height);
        }

        $(document).on("keyup", "#length, #height",(function(e) {      
            getsqft();            
        }));

        getsqft();
    </script>

</body>
</html><?php /**PATH C:\xamp\htdocs\projects\ratsoftware\resources\views/admin/project/form.blade.php ENDPATH**/ ?>