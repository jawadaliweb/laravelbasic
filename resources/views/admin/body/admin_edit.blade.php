
@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div style="width:50%; "  class=" pt-2 container-fluid d-flex align-items-center justify-content-center mt-4  ">
        <form method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data">
            <!-- 2 column grid layout with text inputs for the first and last names -->
              @csrf
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

                  
            </div>

            
            <div class="form-outline mb-4">
                <label class="form-label" for="customFile">Select Image</label>
                <input id="image" type="file" class="form-control" name="profile_image" />
                <img id="showimage" class="mt-4" src="{{ asset('upload/admin_images/' . ($editdata->profile_image ? $editdata->profile_image : 'no_image.png')) }}"

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