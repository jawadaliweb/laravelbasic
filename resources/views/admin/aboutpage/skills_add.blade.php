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

        .form-range {
            flex-grow: 1;
            margin-right: 10px;
        }

        #percentageOutput {
            font-weight: bold;
        }
    </style>

    <div class="container-fluid" style=" margin-top: 10%;">
        <div class="row mt-5">
            <div class="col-md-4 " style="margin-right:auto; margin-left:auto;">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Add Skills</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('skills.adding') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title">Skill Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <div style="margin-top: 15px" class="form-group">
                                <label for="percentage">Skill Percentage</label>
                                <div class="input-group">
                                    <input type="range" class="form-range" id="percentage" name="percentage"
                                        min="0" max="100" required>
                                    <output for="percentage" id="percentageOutput" class="mt-2">0%</output>
                                </div>
                            </div>


                            <!-- Add more skill input fields as needed -->

                            <button style="margin-top: 15px" type="submit" class="btn btn-primary">Add Skills</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="margin-right:auto; margin-left:auto;">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Skills</h4>
                    </div>

                    <div class="card-body">
                        <div class="row pt-4 mt-4">
                            @foreach ($skillsData as $skill)
                                <div class=" col-md-6 mb-4">
                                    <div class="card" style="margin-top: -25px;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $skill->title }}</h5>
                                            <div style="height: 20px;" class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: {{ $skill->percentage }}%;"
                                                    aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <span class="percentage">{{ $skill->percentage }}%</span>
                                                </div>
                                            </div>
                                            <div class="mt-3 d-flex align-items-center">
                                                {{-- <!-- Edit Button with Icon and Tooltip -->
                                        <button style="margin-top: -15px" class="btn btn-sm btn-success ml-2" data-toggle="modal" data-target="#editSkill{{ $skill->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button> --}}

                                                <form method="POST" action="{{ route('skills.delete', $skill->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal" data-target="#confirmDelete{{ $skill->id }}">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>

                                                </form>
                                                <!-- Delete Button with Icon, Tooltip, and Confirmation -->

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                {{ $skillsData->onEachSide(4) }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <style>

span.relative.z-0.inline-flex.shadow-sm.rounded-md
{
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

        /* Custom style for the percentage output */
        #percentageOutput {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
    </style>

    <script>
        // JavaScript to update the output element with the selected percentage value
        const percentageInput = document.getElementById('percentage');
        const percentageOutput = document.getElementById('percentageOutput');

        percentageInput.addEventListener('input', () => {
            percentageOutput.textContent = percentageInput.value + '%';
        });
    </script>
@endsection('admin')
