@extends('website.template.layout')
@section('content')
<livewire:website.product.wishlist  :wishlist_items="$wishlist_items"/>
@stop