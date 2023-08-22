@extends('admin.admin_master')
@section('admin')

    
    <div  class=" container  ">
        

          <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-md-9 col-lg-7 col-xl-5">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-4">
                  <div class="d-flex text-black">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('upload/admin_images/' . ($adminData->profile_image ? $adminData->profile_image : 'no_image.png')) }}"
                        alt="Generic placeholder image"
                        class="img-fluid"
                        style="width: 180px; border-radius: 10px;">
                   
                   
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1">Name: {{$adminData->name}}</h5>
                        <p class="mb-0 pb-1" style="color: #2b2a2a;">Username : {{$adminData->username}}</p>
                        <p class="mb-2 pb-1" style="color: #2b2a2a;">Email : {{$adminData->email}}</p>
                        
                        <div class="d-flex pt-1">
                            <button class="btn btn-outline-primary me-1 "><a href="{{route('edit.profile')}}"> Edit Profile</a></button>
                            <button class="btn btn-outline-primary me-1 "><a href="{{route('edit.password')}}"> Change Password</a></button>
                            
                        </div>
                    </div>
                </div>
            </div>
              </div>
            </div>
        </div>

        
        
        
    </div>
</div>
    @endsection('admin')