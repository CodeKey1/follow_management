@if(Session::has('error'))
<div style="padding: 10px">
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="text-align: center;">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          {{Session::get('error')}}
        </div>
      </div>
</div>
@endif
