@extends('layout')
@section('content')
    <section>
        @if ($photo->isNotEmpty())
            <div class="max-width">
                <div class="title-detail">
                    <h1>{{ $titleMain }}</h1>
                </div>
                <div class="row">
                    @foreach ($photo as $k => $v)
                        <div class="col-4 mb-3">
                            <div class="hinh_bangmau">
                                <a class="d-block" data-fancybox="gallery" data-src="{{ assets_photo('photo', '', $v->photo, '') }}"
                                    data-caption="">
                                    <img class=" w-100" onerror="this.src='thumbs/457x630x1/assets/images/noimage.png';"
                                        src="{{ assets_photo('photo', '457x630x1', $v->photo, 'thumbs') }}"
                                        alt="{{ $v['name' . $lang] }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
@endsection
