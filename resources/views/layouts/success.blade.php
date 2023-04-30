@if(Session::has('success'))
<div style="padding: 10px">
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="text-align: center;">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          {{Session::get('success')}}
        </div>
      </div>
</div>
@endif
