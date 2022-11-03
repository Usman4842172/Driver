@if (session('success'))
    <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong> {{ session('success') }} </strong>
    </div>
@endif
