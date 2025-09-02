<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title>{{$data['page_title']}} | {{env("APP_NAME")}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Start Include Css -->
    @include('admin.headers.maincss')
    <!-- End Include Css -->
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Start Include Header -->
        @include('admin.headers.header')
        <!-- End Include Header -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">{{$data['page_title']}}</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item active">{{$data['page_title']}}
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form class="needs-validation form_data" action="{{$data['submit_url']}}" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                        @csrf
                        <input type="hidden" name="id" value="{{Crypt::encryptString(@$row->id)}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body frm">
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Select Client</label>
                                                <select class="form-select mb-3" name="client_id" required id="select-client">
                                                    <option value="" >Select</option>
                                                    @php($client = DB::table("users")->where(["id"=>@$row->client_id,])->first())
                                                    @if(!empty($client))
                                                        <option value="{{$client->id}}" selected >{{$client->name}}</option>
                                                    @endif                                                    
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Select Project Type</label>
                                                <select class="form-select mb-3" name="type" required id="select-project-type">
                                                    <option value="" >Select</option>
                                                    @php($projectType = DB::table("project_type")->where(["id"=>@$row->type,])->first())
                                                    @if(!empty($projectType))
                                                        <option value="{{$projectType->id}}" selected >{{$projectType->name}}</option>
                                                    @endif                                                    
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Select Project Item</label>
                                                <select class="form-select mb-3" name="item" required id="select-item">
                                                    <option value="" >Select</option>
                                                    @php($projectItem = DB::table("item")->where(["id"=>@$row->item,])->first())
                                                    @if(!empty($projectItem))
                                                        <option value="{{$projectItem->id}}" selected >{{$projectItem->name}}</option>
                                                    @endif                                                      
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Length</label>
                                                <input type="number" class="form-control" placeholder="Enter Length" name="length" value="{{@$row->length}}" id="length" required>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Height</label>
                                                <input type="number" class="form-control" placeholder="Enter Height" name="height" value="{{@$row->height}}" id="height" required>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Sqft</label>
                                                <input type="number" class="form-control" placeholder="Enter Sqft" name="sqft" value="{{@$row->sqft}}" id="sqft" required readonly>
                                            </div>

                                            
                                            

                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Action</label>
                                                <select class="form-select mb-3" name="status">
                                                    <option value="1" @if(!empty(@$row) && @$row->status==1)selected @endif >Active</option>
                                                    <option value="0" @if(!empty(@$row) && @$row->status==0)selected @endif >Inactive</option>
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
            @include('admin.headers.footer')
            <!-- End Include Footer -->
        </div>
    </div>
    <!-- END layout-wrapper -->
    <!-- Start Include Script -->
    @include('admin.headers.mainjs')
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
</html>