@extends('website.template.layout')
@section('content')
<livewire:website.product.product-list :products="$products" :categories="$categories" :brands="$brands" :categorySlug="$categorySlug"/>
@stop