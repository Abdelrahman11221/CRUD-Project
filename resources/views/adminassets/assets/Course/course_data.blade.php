@include('adminassets.assets.header')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Course Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Course Data</li>
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
        <div class="card">
            {{-- <h2>{{session('done')}}</h2> --}}
                <div class="card-header">
                    <h3 class="card-title">Course Data</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div>
                        <a href="{{route('course_form')}}"  class="btn btn-primary">Add</a>
                    </div>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Delete</th>
                        <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $course)
                            
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->description}}</td>
                            <td><img src="{{asset($course->img) }}" width="50" height="50"></td>
                            <td>{{$course->price}}</td>
                            <td>
                                    <form action="{{route('delete_course')}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{$course->id}}">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                            </td>
                            <td>
                                <a href="{{route('course_update_form' , [$course->id])}}" class="btn btn-primary">Update</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <h3>{{$error}}</h3>
                        @endforeach
                    @endif
                    {{-- <h3>{{session('updated')}}</h3> --}}
                    <h3>{{session('deleted')}}</h3>
                <!-- /.card-body -->
                </div>
        </div>
        <!-- /.card-body -->
@include('adminassets.assets.footer')