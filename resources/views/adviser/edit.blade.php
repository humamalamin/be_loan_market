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
                        <h3 class="card-title">Edit Adviser</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('adviser.update', ['id' => $adviser->id]) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="adviserName">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="adviserName" name="name" value="{{ $adviser->name }}" placeholder="Name...." required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="adviserBranch">Branch</label>
                                <select name="branch_id" class="form-control @error('branch_id') is-invalid @enderror" required>
                                    <option value="{{ $adviser->branch->id }}">{{ $adviser->branch->name }}</option>
                                    @forelse($branches as $branch)
                                        @if($branch->id != $adviser->branch->id)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endif
                                    @empty
                                        <option value="">-- Data is Empty --</option>
                                    @endforelse
                                </select>
                                @error('branch_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="adviserLatitude">E-mail</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="adviserLatitude" name="email" value="{{ $adviser->email }}" placeholder="Email..." required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="adviserLongitude">No. Hp</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="adviserLongitude" name="no_hp" value="{{ $adviser->no_hp }}" placeholder="No. Hp..." required>
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="exampleInputFile" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                </div>
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img src="{{ ENV('URL_IMAGE').$adviser->foto }}" alt="" class="img-fluid" style="width: 100px">
                            </div>
                            <div class="form-group">
                                <label for="adviserAbout">Description</label>
                                <textarea class="textarea @error('description') is-invalid @enderror" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $adviser->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('adviser') }}" class="btn btn-default">Cancel</a>
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
