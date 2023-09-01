@extends('admin.admin_master')
@section('admin')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Include jscolor library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>

    <div class="page-content">
        <div style="width:50%; " class=" pt-2 container-fluid d-flex align-items-center justify-content-center mt-4  ">
            <form method="POST" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                @csrf
                @if(optional($aboutdata)->id)
                <input type="hidden" name="id" value="{{ optional($aboutdata)->id }}">
            @endif

                <div class="row mb-4">
                    <div class="form-outline mb-4">
                        <label for="">Tittle</label>
                        <input value="{{ optional($aboutdata)->title }}" placeholder="Tittle" type="text" id="tittle"
                            name="tittle" class="form-control" />
                    </div>

                    <div class="form-outline mb-4">
                        <label for="">description</label>
                        <input value="{{ optional($aboutdata)->Short_title }}" placeholder="Short_title" type="text"
                            id="Short_title" name="description" class="form-control" />
                    </div>

                    <div class="form-outline mb-4">
                        <label for="">Video Url</label>
                        <input value="{{ optional($aboutdata)->Short_title }}" type="text" placeholder="Video url" id="video_url"
                            name="video_url" class="form-control" />

                    </div>

                    <div class="form-outline mb-4">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" id="description" name="description" class="form-control">{{ optional($aboutdata)->description }}</textarea>
                    </div>

                    <script>
                        // Replace 'video_url' with the actual textarea ID or class
                        CKEDITOR.replace('description');
                    </script>
                                        

                    <div class="form-outline mb-4">
                        <label for="">Video Url</label>
                        <input value="{{ optional($aboutdata)->resume_link }}" type="text" placeholder="Video url" id="video_url"
                            name="video_url" class="form-control" />
                    </div>






                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Slider Image</label>
                    <input id="image" type="file" class="form-control" name="home_image" />
                    <img id="showimage" class="mt-4"
                        src="{{ asset('upload/about_images/' . ( optional($aboutdata)->about_image ?  optional($aboutdata)->about_image : 'no_image.png')) }}"
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
    