@extends('layouts/contentLayoutMaster')

@section('title', 'Tasks')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-right">
                    <a class="btn btn-primary waves-light waves-effect waves-float" href="{{route('tasks.create')}}">
                        <i data-feather="plus"></i>
                        Create task
                    </a>
                </div>

                <hr class="m-0">

                <div class="card-body">
                    <table class="dt-simple-header table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Priority</th>
                                <th>Project</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($tasks as $task)
                            <tbody>
                                <td>{{$task->name}}</td>
                                <td>{{$task->priority}}</td>
                                <td>{{$task->project->name}}</td>
                                <td>
                                    <a href="{{route('tasks.edit', [$task->id])}}">
                                        <i  data-feather="edit-2"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$task->id}}">
                                        <i  data-feather="trash-2"></i>
                                    </a>
                                </td>
                            </tbody>


                            <!-- Delete Modal -->
                            <div class="modal fade modal-danger text-left" id="delete{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$task->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete{{$task->id}}">Delete Task</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{route('tasks.destroy', [$task->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">

                                            <div class="modal-body">
                                                Are you sure you want to delete this task?
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger waves-light waves-effect waves-float">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>

    <script>
        $('.dt-simple-header').dataTable();
    </script>
@endsection
