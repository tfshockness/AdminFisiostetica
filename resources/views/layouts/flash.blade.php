@if (session()->has('status'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h4><i class="icon fa fa-check"></i> Xubalaias!</h4>
                <p>{{ session('status') }}}</p>
</div>
@endif




                