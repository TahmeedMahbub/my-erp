@if(session('alert.status'))
    <br><div class="row ">
        <div class="col-md-12 col-lg-12">
            <div class="alert alert-{{ session('alert.status') }} alert-dismissible fade show" role="alert" style="padding: 10px; margin-bottom: 0px;">
                {{ session('alert.message')  }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding-top: 6px;"></button>
            </div>
        </div>
    </div>
@endif
