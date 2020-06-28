@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Branch</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('branch.update', ['id' => $branch->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="branchName">Branch Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="branchName" name="name" placeholder="Branch Name...." value="{{ $branch->name }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="branchAddress">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="branchAddress" name="address" placeholder="Address..." value="{{ $branch->address }}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="branchLatitude">Latitude</label>
                                <input type="text" class="form-control @error('lat') is-invalid @enderror" id="branchLatitude" name="lat" placeholder="Latitude..." value="{{ $branch->lat }}" required>
                                @error('lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="branchLongitude">Longitude</label>
                                <input type="text" class="form-control @error('lng') is-invalid @enderror" id="branchLongitude" name="lng" placeholder="Longitude..." value="{{ $branch->lng }}" required>
                                @error('lng')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="branchAbout">About</label>
                                <textarea class="textarea @error('about') is-invalid @enderror" name="about" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $branch->about }}</textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('branch') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(function () {
      // Summernote
      $('.textarea').summernote()
    })
</script>
@endsection
