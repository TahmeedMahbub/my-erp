@extends('imports.main.layout')

@section('title', 'History')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    {{ $histories->links() }}
                </div>
                <h4 class="page-title">Histories</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    @php
        $helpers = new App\Lib\Helpers;
    @endphp
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-centered">
                            <thead class="table-secondary">
                            <tr>
                                <th style="width: 3%;">Sl</th>
                                <th style="width: 7%;">Module</th>
                                <th style="width: 6%;">Operation</th>
                                <th style="width: 26%;">Previous</th>
                                <th style="width: 26%;">After</th>
                                <th style="width: 20%;">Occured By</th>
                                <th style="width: 12%;">IP Address</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    @php $changes = $helpers->historyChange($history->id); @endphp
                                    <tr>
                                        <td> {{ !empty($_GET["page"]) ? (($_GET["page"]-1) * 5 + $loop->iteration) : $loop->iteration }}</td>
                                        <td> {{ $history->module }} <br>(<small>ID: {{ $history->module_id }}</small>) </td>
                                        <td> {{ $history->operation }}</td>
                                        <td> @php echo !empty($changes["previous"]) ? $changes["previous"] : '<p class="text-muted">Nothing to Show</p>' @endphp </td>
                                        <td> @php echo !empty($changes["after"]) ? $changes["after"] : '<p class="text-muted">Nothing to Show</p>' @endphp </td>
                                        <td> {{ $history->user->name }}, <small>{{ $history->user->role->role_name }}</small>
                                            <br>(<small>{{ date("g:i A, d-M-Y", strtotime($history->created_at)) }}</small>)
                                        </td>
                                        <td>{{ $history->ip_address }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection
