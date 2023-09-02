@extends('admin.admin_master')
@section('admin')
<div class="container"  style="margin-top: 10%;">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Add Skill</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group">
                            <label for="title">Skill Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="percentage">Skill Percentage</label>
                            <input type="range" class="form-range" id="percentage" name="percentage" min="0" max="100" required>
                            <output for="percentage" id="percentageOutput" class="mt-2">0%</output>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Skill</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
