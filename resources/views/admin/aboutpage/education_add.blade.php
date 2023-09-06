@extends('admin.admin_master')
@section('admin')
<style>
.form-group {
margin-top: 15px;
}

.input-group {
display: flex;
align-items: center;
}


label {
font-weight: bold;
margin-bottom: 10px;
}

input[type="date"] {
padding: 10px;
border: 1px solid #ccc;
border-radius: 5px;
width: 100%;
margin-bottom: 20px;
}

input[type="submit"] {
background-color: #007bff;
color: #fff;
border: none;
border-radius: 5px;
padding: 10px 20px;
cursor: pointer;
transition: background-color 0.3s ease-in-out;
}

input[type="submit"]:hover {
background-color: #0056b3;
}
</style>

<!-- Bootstrap Datepicker CSS and JS -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<div class="container-fluid" style=" margin-top: 10%;">
<div class="row mt-5">
<div class="col-md-4 " style="margin-right:auto; margin-left:auto;">
<div class="card">
<div class="card-header bg-primary text-white">
<h4>Add Education</h4>
</div>

<div class="card-body">
<form method="POST" action="{{ route('education.adding') }}">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title[]" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Details</label>
        <textarea name="description[]" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="From">From:</label>
        <input name="from_date[]" type="date" id="birthday" name="birthday">
    </div>

    <div class="form-group">
        <label for="To">To:</label>
        <input name="to_date[]" type="date" id="birthday" name="birthday">
    </div>

    <button style="margin-top: 15px" type="submit" class="btn btn-primary">Add Education</button>
</form>

</div>
</div>
</div>
<div class="col-md-7" style="margin-right:auto; margin-left:auto;">
<div class="card">
<div class="card-header bg-primary text-white">
<h4>Educations</h4>
</div>

<div class="card-body">
<div class="row pt-4 mt-4">
    @foreach ($EducationData as $education)
        <div class=" col-md-6 mb-4">
            <div class="card" style="margin-top: -25px;">
                <div class="card-body">
                    <h5 class="title">Title:<b> {{ $education->title }}</b></h5>
                    <p class="title">Details:<b> {{ $education->description }}</b></p>
                    <h6 class="date">Experiece Date:
                        <b>{{ date('Y', strtotime($education->from_date)) }} –
                            {{ date('Y', strtotime($education->to_date)) }} </b>
                    </h6>
                    @php
                        $from_date = date('Y', strtotime($education->from_date));
                        $to_date = date('Y', strtotime($education->to_date));
                        $result_date = $to_date - $from_date;
                    @endphp
                    <h6 class="date">Total Years: <b> {{ $result_date }} </b></h6>
                    <div class="mt-3 d-flex align-items-center">

                        <form method="POST"
                            action="{{ route('education.delete', $education->id) }}">
                            @csrf
                            @method('DELETE')
                            <button style="margin: 15px 10px 0px 0px; " type="submit" type="button" class="btn btn-sm btn-danger"
                                data-toggle="modal"
                                data-target="#confirmDelete{{ $education->id }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>


                        </form>

                        <button  onclick="document.getElementById('id01').style.display='block'"
                        type="submit" type="button" class="btn btn-sm btn-warning"
                            data-toggle="modal" data-target="#confirmDelete{{ $education->id }}">
                            <i class="fas fa-trash"></i> Update
                        </button>

                        
                        <div id="id01" class="w3-modal">
                            <div class="w3-modal-content w3-animate-top w3-card-4">
                                <header class="w3-container w3-teal">
                                    <span
                                        onclick="document.getElementById('id01').style.display='none'"
                                        class="w3-button w3-display-topright">&times;</span>
                                    <h2>Modal Header</h2>
                                </header>
                                <div class="w3-container">
                                    
                                    <form method="POST"
                                        action="{{ route('education.update', $education->id) }}">
                                        @csrf
                                        @method('PUT')
                                        @csrf

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input value="{{$education->title}}" type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Details</label>
                                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$education->description}}</textarea>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="From">From:</label>
                                            <input value="{{$education->from_date}}" name="from_date" type="date" id="from_date" >
                                            
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="To">To:</label>
                                            <input  value="{{$education->to_date}}" name="to_date" type="date" id="to_date" >
                                        </div>
                                    
                                        <button style="margin-top: 15px" type="submit" class="btn btn-primary">Add Education</button>

                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $EducationData->onEachSide(4) }}
    </div>
</div>
</div>

</div>
</div>

</div>
</div>

<style>
span.relative.z-0.inline-flex.shadow-sm.rounded-md {
display: none;
}

/* Custom styles for the card and form */
.card {
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.card-header {
text-align: center;
}

.form-control {
border-radius: 0;
}
</style>
@endsection('admin')
