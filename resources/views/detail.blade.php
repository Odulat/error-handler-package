@extends("error-handler::app")

@section('content')
    <style>
        .container-table100{
            background: #c4d3f6
        }
    </style>
    <div class="wrap-table">
        <div class="table" style="border-radius: 0">
            <div>
                <h3>{{ $exception->title }}</h3>
                <br/>
                <h6>Class : <span style="color: #666666"> {{ $exception->class }}</span> </h6>
                <br/>
                <h6>File : <span style="color: #666666"> {{ $exception->file }} </span> </h6>
                <br/>
                <h6>Line : <span style="color: #666666"> {{ $exception->line }} </span> </h6>
                <br/>
                <h6>Url : <span style="color: #666666"> {{ $exception->url }} </span> </h6>
                <br/>
                <h6>Method : <span style="color: #666666"> {{ $exception->method }} </span> </h6>
                <br/>
                <h6>Payload : <span style="color: #666666"> {{ $exception->payload }} </span> </h6>
                <br/>
                <h6>Time : <span style="color: #666666"> {{ $exception->created_at->format("D M Y h:i:s") }} </span> </h6>
                <br/>
            </div>
            <br/>
            <form method="post" action="{{ route('destroy',$exception->id) }}">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-dark btn-lg btn-block">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection