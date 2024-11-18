@extends('master')
@section('contentmaster')
@if($com == 'trang-chu')
<h1 class="hidden-seoh">{{ $setting['name' . $lang] }}</h1>
@endif
    @include('layout.header')
    @include('layout.menu')
    @includeWhen(!empty($slider), 'layout.slider')
    @includeWhen(\NINA\Core\Support\Str::isNotEmpty(BreadCrumbs::get()),'layout.breadcrumbs')
    <div class="{{($com != 'trang-chu') ? 'padding-top-bottom' : 'wrap-home' }}">
        @yield('content')
    </div>
    @include('layout.footer')
    @include('layout.extensions')
    @include('layout.strucdata')
@endsection