@extends('master')

@section('title')
Update Role
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Update Role</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="card card-primary m-4">
    <div class="card-header">
        <h3 class="card-title">Manage Role</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('app.roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="name" class="form-control" name="name" value="{{ $role->name }}" id="name" placeholder="Enter role name">
                @error('name')
                    <span class=" alert-danger">
                        <strong>{{ $message }}</strong>
                        
                    </span>
                @enderror
            </div>
            <h6 class="text-center">Manage permission for Role</h6>
            <div class="text-center">
                @error('permissions')
                    <span class=" alert-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="select-all">
                <label class="form-check-label" for="select-all">Select All</label>
            </div>
            <div class="row">
                @foreach ($modules->chunk(2) as $key=>$chunk)
                @foreach ($chunk as $key=>$module)
                <div class="col-md-6">
                    <h4>{{ $module->name }}</h4>
                    @foreach ($module->permissions as $key=>$permission)

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                        @foreach ($role->permissions as $rpermission)
                            {{ $rpermission->id == $permission->id ? 'checked':'' }}
                        @endforeach
                         id="{{ 'permission-'.$permission->id }}" name="permissions[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="{{ 'permission-'.$permission->id }}">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                </div>

                @endforeach
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-circle-up"></i> Update</button>
        </div>
    </form>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(()=>{

        $('#select-all').click(function(){
            if(this.checked){
               $(":checkbox").each(function(){
                    this.checked = true;
               })
            }else{
                $(":checkbox").each(function(){
                    this.checked = false;
               })
            }
        });
        });
    </script>
@endpush
