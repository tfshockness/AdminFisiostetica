@if (session()->has('message'))
<div class="alert alert-danger alert-dismissible col-md-8" style="margin-left:15px">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h4><i class="icon fa fa-times-circle-o"></i>Erro</h4>
                <p>{{ session('message') }}</p>
</div>
@endif




                