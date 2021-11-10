@extends('master')

@section('title')
    Users
@endsection

@section('content')
<div class="container">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h1 class="m-0 text-right">
                      <a href="{{ route('app.users.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create</a>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- Role table  --}}
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-striped">
            <thead  class="text-left">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Joining date</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-left">
                @foreach ($users as $key=>$user)  
                <tr>
                  <td>{{ $key+1 }}.</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td class="badge {{ $user->status == 1?'badge-primary':'badge-danger' }} p-2 mt-2">{{ $user->status == 1? 'Active':'Inactive' }}</td>
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>{{ $user->role->name }}</td>
                  <td>
                      <a href="{{ route('app.users.edit', $user->id) }}" class="btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                      <a href="#" class="btn-sm btn-danger"
                      onclick="event.preventDefault(); deleteData({{ $user->id }});"
                      ><i class="fas fa-trash"></i> Delete</a>
                      <form action="{{ route('app.users.destroy', $user->id) }}" method="POST" id="{{ 'delete-form-'.$user->id }}">
                        @csrf
                        @method('DELETE')
                      </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      {{-- End role table  --}}
</div>
@endsection