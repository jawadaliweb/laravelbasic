@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div style="width:50%; "  class=" pt-2 container-fluid d-flex align-items-center justify-content-center mt-4  ">
        <form >
            <!-- 2 column grid layout with text inputs for the first and last names -->
            
            <div class="row mb-4">
                <div class="form-outline mb-4">
                    <label for="">Name</label>
                  <input value="{{$editdata->name}}"  placeholder="Name" type="text" id="name" name="name" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                    <label for="">Username</label>
                    <input value="{{$editdata->username}}"  placeholder="User Name" type="text" id="username" name="username" class="form-control" />
                  </div>

                <div class="form-outline mb-4">
                    <label for="">Email</label>
                    <input value="{{$editdata->email}}" type="email" placeholder="Email" id="email" name="email" class="form-control" />
                  </div>


                <div class="form-outline mb-4">
                    <label for="">Password</label>
                  <input  placeholder="New password" type="password" id="password" name="password" class="form-control" />
                </div>

                <div class="form-outline ">
                    <label for="">Confirm Password</label>
                    <input placeholder="Confirm Passowrd" type="password" id="form6Example2" class="form-control" />
                  </div>
            </div>

            
            <div class="form-outline mb-4">
                <label class="form-label" for="customFile">Select Image</label>
                <input id="image" type="file" class="form-control" id="customFile" />
                <img id="showimage" class="mt-4" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                alt="Generic placeholder image" class="img-fluid"
                style="width: 180px; border-radius: 10px;">
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Confrim</button>
          </form>
        
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection('admin')