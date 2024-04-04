@include('adminassets.assets.header')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>FAQsForm Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">FAQs Form Data</li>
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
            <h2>{{session('done')}}</h2>
                <div class="card-header">
                    <h3 class="card-title">FAQs Form Data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answer)
                            <tr>
                                <td>{{$answer->id}}</td>
                                <td>{{$answer->question}}</td>
                                <td>{{$answer->answer}}</td>
                                <td>
                                    <a href="{{route('faq_update' , [$answer->id])}}" class="btn btn-primary">Update</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
        </div>
        <!-- /.card-body -->
@include('adminassets.assets.footer')