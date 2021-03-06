@extends('admin/dashboardAdmin')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Management Semester School</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{Route('DASHBOARD')}}">Home</a></li>
            <li class="breadcrumb-item active">Semester</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  @if(session()->has('message'))
        <div class="alert alert-success">
          {!! session()->get('message') !!}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
          {!! session()->get('error') !!}
        </div>
  @endif
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
       <a style="color: white" href="{{route('ADD_SEMESTER')}}" class="btn btn-primary"> Add New <i class="fas fa-plus"></i></a>
      <div class="row">
        <div class="col-12">
          <br>
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>   
                <tr>
                  <th hidden>id</th>
                  <th>Semester Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Edit Action</th>
                  <th>Delete Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($semester as $item)
                    <td hidden>{{$loop->iteration}}</td>
                    <td>{{$item->semester_name}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td><a style="color: white" href="" class="btn btn-warning">Edit <i class="fas fa-pencil-alt"></a></td>
                    <td>
                      <form action="{{url('semester/'.$item->semester_id)}}" method = "POST" onsubmit="return confirm('Are you sure delete semester?')">
                          @method('delete')
                          @csrf
                          <button style="color: white" class="btn btn-danger">Delete<i class="fas fa-trash-alt"></button></td>
                          <!-- <a style="color: white" class="btn btn-danger">Delete <i class="fas fa-trash-alt"></a></td> -->
                      </form>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection