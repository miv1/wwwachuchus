@extends('layouts.app')

@section('title', 'Afiliados')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        {{ Breadcrumbs::render('affiliate') }}
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center m-t-lg">
                <affiliate-index></affiliate-index>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    (function() {
        //added responsive table affiliate
        document.getElementsByName('SimpleTable')[0].className+='table-responsive';
    })();
</script>
@endsection