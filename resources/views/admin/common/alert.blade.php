<div class="row">
    <div class="col-12">
        @if ($errors->all())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul class="list-unstyled" style="padding: 0px; margin: 0px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div>  
</div>
