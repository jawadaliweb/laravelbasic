    @extends('admin.admin_master')
    @section('admin')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Include jscolor library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>

        <div class="page-content">
            <div style="width:50%; " class=" pt-2 container-fluid d-flex align-items-center justify-content-center mt-4  ">
                <form method="POST" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    @csrf

                    @if(optional($homedata)->id)
                    <input type="hidden" name="id" value="{{ optional($homedata)->id }}">
                    @endif

                    <div class="row mb-4">
                        <div class="form-outline mb-4">
                            <label for="">Tittle</label>
                            <input value="{{  optional($homedata)->title }}" placeholder="Title" type="text" id="title"
                                name="title" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label for="">description</label>
                            <input value="{{  optional($homedata)->description }}" placeholder="Description" type="text"
                                id="description" name="description" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label for="">Video Url</label>
                            <input value="{{  optional($homedata)->video_url }}" type="text" placeholder="Video url" id="video_url"
                                name="video_url" class="form-control" />

                        </div>

                        <div class="form-outline mb-4">
                            <label for="back_color">Background Color</label>
                            <input value="{{  optional($homedata)->back_color }}" type="text" id="back_color" name="back_color"
                                class="form-control jscolor" />
                        </div>


    @php
        foreach ($errors->all() as $error) {
            toastr()->error($error);
        }
    @endphp




                    </div>


                    <div class="form-outline mb-4">
                        <label class="form-label" for="customFile">Slider Image</label>
                        <input id="image" type="file" class="form-control" name="home_image" />
                        <img id="showimage" class="mt-4"
                            src="{{ asset('upload/slider_images/' . ( optional($homedata)->home_image ?  optional($homedata)->home_image : 'no_image.png')) }}"
                            alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Update Slider</button>
                </form>

            </div>

        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showimage').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });

            $(document).ready(function() {
                // Initialize the color picker on elements with class "jscolor"
                jscolor.installByClassName("jscolor");

                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showimage').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection('admin')
