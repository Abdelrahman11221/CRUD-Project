@include('adminassets.assets.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Blank Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Courses Update Page</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">Courses Update Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- {{dd($questions->question)}} --}}
                    <form action="{{route('update_course')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" value="{{$data->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="description" value="{{$data->description}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="price" value="{{$data->price}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">submit</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
            </div>
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <h2>{{$error}}</h2>
                @endforeach
            @endif
            
            <h3>{{session('done')}}</h3>
            <!-- /.card-body -->
    </section>
@include('adminassets.assets.footer')

