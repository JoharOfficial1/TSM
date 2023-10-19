@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Project')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form id="create-project-form" action="{{route('projects.update', [$project->id])}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{$project->name}}" autofocus required>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary waves-light waves-effect waves-float">
                        Update
                    </button>

                    <a href="{{route('projects.index')}}" class="btn btn-outline-warning waves-light waves-effect waves-float">
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
    <script src="{{asset(mix('js/scripts/validations/projects/create.js'))}}"></script>
@endsection
