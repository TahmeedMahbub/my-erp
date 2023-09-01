@extends('imports.main.layout')

@section('title', 'User Create')

{{-- @section('head') @endsection --}}

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('roles')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All User Roles</a>
                </div>
                <h4 class="page-title">Access Level by Roles</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('access_level_user') }}" method="GET">
                                    <div class="row">
                                        <label for="branch_select" class="col-sm-2 col-form-label">Access Level for User:</label>
                                        <div class="col-sm-8">
                                            <select id="default" class="form-select" name="user_id" required>
                                                <option class="form-select" value="">Search User By Name, Username, Role or Phone Number</option>
                                                @foreach ($users as $user)
                                                    <option class="form-select" value="{{ $user->id }}" {{ !empty($user_id) && $user_id == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->username }}), {{ $user->role->role_name }} ({{ $user->branch->name }} Branch), 0{{ $user->phone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control btn btn-primary" type="Submit" value="Get Access Levels">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if (!empty($user_id) && $user_id != 0)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-check form-switch form-switch-dark">
                                        <input class="form-check-input" type="checkbox" id="all_access_level">
                                        <label class="form-check-label" for="all_access_level"><b>Module Name</b> </label>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    {{-- <b>Create</b> --}}
                                    <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input level_class" type="checkbox" id="level_create">
                                        <label class="form-check-label" for="level_create"><b>Create</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    {{-- <b>Read</b> --}}
                                    <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input level_class" type="checkbox" id="level_read">
                                        <label class="form-check-label" for="level_read"><b>Read</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    {{-- <b>Update</b> --}}
                                    <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input level_class" type="checkbox" id="level_update">
                                        <label class="form-check-label" for="level_update"><b>Update</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    {{-- <b>Delete</b> --}}
                                    <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input level_class" type="checkbox" id="level_delete">
                                        <label class="form-check-label" for="level_delete"><b>Delete</b></label>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('access_level_user_update') }}" method="post">
                            @csrf
                                @foreach ($modules as $module)
                                    @php
                                        $access_level = $access_levels->where('module_id', $module->id)->first();
                                    @endphp
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input access_class" type="checkbox" id="access_id_{{ $module->id }}" {{ optional($access_level)->create == 1 && optional($access_level)->read == 1 && optional($access_level)->update == 1 && optional($access_level)->delete == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="access_{{ $module->id }}">{{ $module->module_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center access_class_{{ $module->id }} single_checkbox_class level_class_create" type="checkbox" data-module="{{ $module->id }}" data-level="create" name="access[{{ $module->id }}][create]" {{ optional($access_level)->create == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Create">
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center access_class_{{ $module->id }} single_checkbox_class level_class_read" type="checkbox" data-module="{{ $module->id }}" data-level="read" name="access[{{ $module->id }}][read]" {{ optional($access_level)->read == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Read">
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center access_class_{{ $module->id }} single_checkbox_class level_class_update" type="checkbox" data-module="{{ $module->id }}" data-level="update" name="access[{{ $module->id }}][update]" {{ optional($access_level)->update == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Update">
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center access_class_{{ $module->id }} single_checkbox_class level_class_delete" type="checkbox" data-module="{{ $module->id }}" data-level="delete" name="access[{{ $module->id }}][delete]" {{ optional($access_level)->delete == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Delete">
                                        </div>
                                    </div>
                                @endforeach


                                <div class="row justify-content-center mt-3">
                                    <div class="col-lg-3">
                                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                                        <input class="form-control btn btn-warning" type="Submit" value="Save Role Access Level">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <p style="margin:5000px"></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script>
    $(document).ready(function() {
        $(".access_class").change(function() {
            var checkboxId = $(this).attr("id");
            var moduleId = checkboxId.replace("access_id_", "");

            var isChecked = $(this).is(":checked");
            $(".access_class_"+moduleId).prop("checked", isChecked);
        });

        $(".level_class").change(function() {
            var checkboxId = $(this).attr("id");
            var moduleId = checkboxId.replace("level_", "");

            var isChecked = $(this).is(":checked");
            $(".level_class_"+moduleId).prop("checked", isChecked);
        });

        $("#all_access_level").change(function() {
            var checkboxId = $(this).attr("id");
            var moduleId = checkboxId.replace("level_", "");

            var isChecked = $(this).is(":checked");
            $(".level_class").prop("checked", isChecked);
            $(".access_class").prop("checked", isChecked);
            $(".single_checkbox_class").prop("checked", isChecked);
        });
    });
</script>

@endsection
