@extends ('base')

@section ('content')

    <div class="row">
        <form id="code-form" class="form-horizontal" method="POST" action="/">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="zip-one" class="col-xs-11 col-xs-offset-1 col-sm-3 col-sm-offset-0 control-label">First agent ZIP</label>
                <input type="text" class="col-xs-offset-1 col-sm-offset-0" name="zip-one" required>
            </div>
            <div class="form-group">
                <label for="zip-two" class="col-xs-12 col-xs-offset-1 col-sm-3 col-sm-offset-0 control-label">Second agent ZIP</label>
                <input type="text" class="col-xs-offset-1 col-sm-offset-0" name="zip-two" required>
            </div>
            <button type="submit" class="btn btn-info col-xs-offset-1 col-sm-offset-3">Execute</button>
        </form>
    </div>

@endsection