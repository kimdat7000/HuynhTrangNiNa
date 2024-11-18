@extends('layout')
@section('content')
    <section>
        @if ($news->isNotEmpty())
            <div class="max-width">
                <div class="title-detail"><h1>{{$titleMain}}</h1></div>
                <div class="row">
                    @foreach ($news as $k => $v)
                        <div class="col-4 mb-3">
                            @component('component.itemNews', ['news' => $v])
                                <div class="desc-news line-clamp-3 mt-1">{{ $v->descvi }}</div>
                            @endcomponent
                        </div>
                    @endforeach
                </div>
                {!! $news->links() !!}
            </div>
        @endif
    </section>
@endsection