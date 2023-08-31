@if (session()->get('errormessage'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> {{session()->get('errormessage')}}.
    </div>
    @endif
    @if (session()->get('successmessage'))
    <div class="alert alert-success alert-dismissible">
        <strong>Sucess!</strong> {{session()->get('successmessage')}}.
    </div>
    @endif