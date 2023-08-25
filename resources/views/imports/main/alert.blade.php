@if(session('alert.status'))
    <br><div class="row ">
        <div class="col-md-12 col-lg-12">
            <div class="alert alert-{{ session('alert.status') }} alert-dismissible fade show" role="alert">
                {{ session('alert.message')  }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
