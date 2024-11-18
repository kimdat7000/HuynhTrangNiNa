@if (!empty($productAjax))
    <div class="p-relative">
        <div class="row row-20">
            @foreach ($productAjax as $v)
            <div class="col-3">
                @component('component.itemProduct', ['product' => $v])
                @endcomponent
            </div>
            @endforeach
        </div>
        {!! $productAjax->appends(request()->query())->links('pagination.pagin-ajax') !!}
    </div>
@endif