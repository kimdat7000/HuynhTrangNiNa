@extends('layout')
@section('content')
    <section>
        <div class="max-width">
            <div class="title-detail">
                <h1>{{ $titleMain }}</h1>
            </div>
            @if (!empty($product))
                <div class="grid-product">
                    @foreach ($product as $v)
                        @component('component.itemProduct', ['product' => $v])
                        @endcomponent
                    @endforeach
                </div>
            @endif
            {!! $product->appends(request()->query())->links() !!}
        </div>
    </section>
@endsection
