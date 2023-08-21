@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div style="width:50%; "  class=" pt-2 container-fluid d-flex align-items-center justify-content-center mt-4  ">
        <form method="POST" action="{{route('update.password')}}" >
    <!-- 2 column grid layout with text inputs for the first and last names -->
        @csrf
        <div class="row mb-4">
            <div class="form-outline mb-3">
                <label for="">Current Passowrd</label>
                <input   placeholder="Current Password" type="password" id="oldpassword" name="oldpassword" class="form-control" />
            </div>
            <div class="form-outline mb-3">
                <label for="">Current Passowrd</label>
                <input   placeholder="New Password" type="password" id="newpassword" name="newpassword" class="form-control" />
            </div>
            <div class="form-outline mb-3">
                <label for="">Current Passowrd</label>
                <input   placeholder="Confirm Password" type="password" id="confirm password" name="confirmpassword" class="form-control" />
            </div>
            
        </div>
        
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                $errorWithCustomNames = str_replace(['oldpassword', 'newpassword', 'confirmpassword'], ['Current Password', 'New Password', 'Confirm Password'], $error);
                toastr()->error($errorWithCustomNames);
            @endphp
        @endforeach
    @endif
    

        
<!-- Submit button -->
<button value="changepassword" type="submit" class="btn btn-primary btn-block mb-4">Change Password</button>
</form>
        
    </div>

</div>

@endsection('admin')