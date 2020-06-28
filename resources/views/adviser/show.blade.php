@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
            <div class="col-md-12"><!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Show Adviser</h3>
                    </div>
                </div>
                <div class="card-body">
                    <h2>Name: {{ $adviser->name }}</h2>
                    <h5>Branch: {{ $adviser->branch->name }}</h5>
                    <p>No. Hp: {{ $adviser->no_hp }}</p>
                    <p>E-mail: {{ $adviser->email }}</p>
                    <p>
                        <img src="{{ ENV('URL_IMAGE').$adviser->foto }}" alt="" style="width: 300px">
                    </p>
                    <p>{!! $adviser->description !!}</p>
                    <p>
                        <a href="{{ route('adviser') }}" class="btn btn-default">Back</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
