@extends("error-handler::app")

@section('content')
    <div class="lapse-body">
        <br/>
        <div>
            <h3 style="text-align: center; margin-bottom: 20px"> LARAVEL EXCEPTIONS</h3>
            <h4 style="text-align: center; margin-bottom: 50px">Laravel error handler package</h4>
        </div>
        <br/>
        <br/>
        @if($exceptions->count())
            <div class="wrap-table100">
                <div class="table">
                    <div class="row header">
                        <div class="cell">
                            TITLE
                        </div>
                        <div class="cell">
                            FILE
                        </div>
                        <div class="cell">
                            LINE
                        </div>
                        <div class="cell">
                            USER
                        </div>
                        <div class="cell">
                            DATE
                        </div>
                    </div>

                    @foreach($exceptions as $exception)
                        <a class="row data" href="{{ route('detail',$exception->id) }}">
                            <div class="cell" data-title="TITLE">
                                {{ $exception->title }}
                            </div>
                            <div class="cell" data-title="FILE">
                                {{ $exception->file }}
                            </div>
                            <div class="cell" data-title="LINE">
                                {{ $exception->line }}
                            </div>
                            <div class="cell" data-title="User">
                                {{ data_get($exception, 'user_id', 'unknown') }}
                            </div>
                            <div class="cell" data-title="User">
                                {{ $exception->created_at->format("D M Y h:i:s") }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endIf

        @if($exceptions->count())
            <div class="container">
                <form method="post" action="{{ route('clear') }}" style="display:flex; justify-content: center; margin-top: 50px">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <br/>
                    <button type="submit" class="btn btn-dark btn-lg">
                        Delete All Lapse Records
                    </button>
                </form>
            </div>
        @endIf
    </div>
@endsection

@push('js')
    <script>
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy'
        });
    </script>
@endpush