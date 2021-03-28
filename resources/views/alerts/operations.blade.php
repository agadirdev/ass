
        @if($b)
        <div class="col-md-12">
            <center>
                <div class="alert alert-success">
                    <strong><i class="fa fa-check " aria-hidden="true"></i> {{$msg}} </strong> 
                </div>
            </center>
        </div>
        @else
        <div class="col-md-12">
            <center>
                <div class="alert alert-danger">
                    <strong><i class="fa fa-times-circle " aria-hidden="true"></i> {{$msg}} </strong>
                </div>
            </center>
        </div>
        @endif

<br>