@extends('master')

@section('title')
    Roles
@endsection

@section('content')
<div class="container">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h1 class="m-0 text-right">
                      <a href="{{ route('app.roles.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create</a>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- Role table  --}}
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Roles</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-striped">
            <thead  class="text-center">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Permission</th>
                <th>Update at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($roles as $key=>$role)  
                <tr>
                  <td>{{ $key+1 }}.</td>
                  <td>{{ $role->name }}</td>
                  <td class="badge {{ $role->permissions->count()>0 ? 'badge-primary':'badge-danger' }}">{{ $role->permissions->count()>0 ? $role->permissions->count():'No Permission Found' }}</td>
                  <td>{{ $role->updated_at->diffForHumans() }}</td>
                  <td>
                      <a href="{{ route('app.roles.edit', $role->id) }}" class="btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                      <a href="#" class="btn-sm btn-danger"
                      onclick="event.preventDefault(); deleteData({{ $role->id }});"
                      ><i class="fas fa-trash"></i> Delete</a>
                      <form action="{{ route('app.roles.destroy', $role->id) }}" method="POST" id="{{ 'delete-form-'.$role->id }}">
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