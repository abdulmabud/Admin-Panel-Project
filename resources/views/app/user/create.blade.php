@extends('master')

@section('title')
Create User
@endsection

@section('content')
<div class="container p-4">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">User Info</h3>
        </div>
    </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('app.users.store') }}" method="POST">
            @csrf
     
                <div class="row" style="box-sizing:border-box">
                    <div class="col-md-8">
                        <div class="card">
        
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="name" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Enter role name">
                                    @error('name')
                                        <span class=" alert-danger">
                                            <strong>{{ $message }}</strong>
                                            
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Enter email">
                                    @error('email')
                                        <span class=" alert-danger">
                                            <strong>{{ $message }}</strong>
                                            
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                    @error('password')
                                        <span class=" alert-danger">
                                            <strong>{{ $message }}</strong>
                                            
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter password">
                                    @error('password')
                                        <span class=" alert-danger">
                                            <strong>{{ $message }}</strong>
                                            
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="address">Selct role for user</label>
                                    <select name="role_id" id="" class="form-control">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class=" alert-danger">
                                            <strong>{{ $message }}</strong>
                                            
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" value="1" name="status" id="status">
                                        <label class="custom-control-label" for="status">Status</label>
                                      </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
            <!-- /.card-body -->
    
           
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
