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
                                <form action="{{ route('access_level') }}" method="GET">
                                    <div class="row">
                                        <label for="branch_select" class="col-sm-2 col-form-label">Access Level for Role:</label>
                                        <div class="col-sm-8">
                                            <select id="default" class="form-select" name="role_id" required>
                                                <option class="form-select" value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option class="form-select" value="{{ $role->id }}" {{ $role_id == $role->id ? 'selected' : '' }}>{{ $role->role_name }}</option>
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
                    @if ($role_id != 0)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled checked>
                                        <label class="form-check-label" for="flexSwitchCheckDisabled"><b>Module Name</b> </label>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    <b>Create</b>
                                    {{-- <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input" type="checkbox" id="level_create" checked>
                                        <label class="form-check-label" for="level_create"><b>Create</b></label>
                                    </div> --}}
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    <b>Read</b>
                                    {{-- <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input" type="checkbox" id="level_read" checked>
                                        <label class="form-check-label" for="level_read"><b>Read</b></label>
                                    </div> --}}
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    <b>Update</b>
                                    {{-- <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input" type="checkbox" id="level_update" checked>
                                        <label class="form-check-label" for="level_update"><b>Update</b></label>
                                    </div> --}}
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                    <b>Delete</b>
                                    {{-- <div class="form-check form-switch form-switch-purple">
                                        <input class="form-check-input" type="checkbox" id="level_delete" checked>
                                        <label class="form-check-label" for="level_delete"><b>Delete</b></label>
                                    </div> --}}
                                </div>
                            </div>
                            <form action="{{ route('access_level_update') }}" method="post">
                            @csrf
                                @foreach ($modules as $module)
                                    @php
                                        $access_level = $access_levels->where('module_id', $module->id)->first();
                                    @endphp
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" id="access_{{ $module->id }}" {{ optional($access_level)->create == 1 && optional($access_level)->read == 1 && optional($access_level)->update == 1 && optional($access_level)->delete == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="access_{{ $module->id }}">{{ $module->module_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center" type="checkbox" name="access[{{ $module->id }}][create]" {{ optional($access_level)->create == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Create">
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center" type="checkbox" name="access[{{ $module->id }}][read]" {{ optional($access_level)->read == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Read">
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center" type="checkbox" name="access[{{ $module->id }}][update]" {{ optional($access_level)->update == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Update">
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <input class="form-check-input mt-0 text-center" type="checkbox" name="access[{{ $module->id }}][delete]" {{ optional($access_level)->delete == 1 ? 'checked' : '' }} title="{{ $module->module_name }} Delete">
                                        </div>
                                    </div>
                                @endforeach


                                <div class="row justify-content-center mt-3">
                                    <div class="col-lg-3">
                                        <input type="hidden" name="role_id" value="{{ $role_id }}">
                                        <input class="form-control btn btn-warning" type="Submit" value="Save Role Access Level">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script>

// $(document).ready(function() {
//     $("#role_id").change(function() {
//         var selected_role   = $(this).val();
//     });
// });
</script>

@endsection
