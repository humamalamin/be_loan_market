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
                        <h3 class="card-title">Show Branch</h3>
                    </div>
                </div>
                <div class="card-body">
                    <h2>{{ $branch->name }}</h2>
                    <h5>{{ $branch->address }}</h5>
                    <p>{!! $branch->about !!}</p>
                    <iframe src="https://maps.google.com/maps?q={{ $branch->lat }},{{ $branch->lng }}&z=17&output=embed"class="embed-responsive-item" style="border:0;" allowfullscreen></iframe>
                    <p>
                        <a href="{{ route('branch') }}" class="btn btn-default">Back</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
