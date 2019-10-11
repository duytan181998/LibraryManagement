@if(Session::has('flash_status'))
    <div class="alert alert-{!! Session::get('flash_status'); !!} alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{!! Session::get('flash_title'); !!} !</strong> {!! Session::get('flash_mess'); !!}
    </div>
@endif
