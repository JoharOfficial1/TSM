@extends('layouts/contentLayoutMaster')

@section('title', 'Create Task')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form id="create-task-form" action="{{route('tasks.store')}}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="project_id">Projects <span class="text-danger">*</span></label>
                        <select class="form-control" id="project_id" name="project_id">
                            <option value="">Select Project</option>

                            @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" autofocus required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="priority">Priority <span class="text-danger">*</span></label>
                        <input type="number" id="priority" name="priority" class="form-control" placeholder="Priority" autofocus required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Description" rows="2" autofocus required>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary waves-light waves-effect waves-float">
                        Create
                    </button>

                    <a href="{{route('tasks.index')}}" class="btn btn-outline-warning waves-light waves-effect waves-float">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{asset(mix('js/scripts/validations/tasks/create.js'))}}"></script>
@endsection
