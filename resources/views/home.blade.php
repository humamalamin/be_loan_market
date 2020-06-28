@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List Branch</h1>
        </div>
        <div class="col-sm-6">
          <a href="{{ route('branch.create') }}" class="btn btn-primary float-sm-right">New Branch</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table Branch</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Name</th>
                                <th>About</th>
                                <th>Address</th>
                                <th>LatLng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @forelse ($branches as $branch)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $branch->name }}</td>
                                        <td>{!! $branch->about !!}</td>
                                        <td>{{ $branch->address }}</td>
                                        <td><button data-latlng="{{ $branch->lat }},{{ $branch->lng }}" class="btn btn-link data-map"> Location</button></td>
                                        <td style="width: 100px">
                                            <a href="{{ route('branch.show', ['id' => $branch->id]) }}" class="btn btn-sm btn-info" title="Show"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('branch.edit', ['id' => $branch->id]) }}" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('branch.delete', ['id' => $branch->id]) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"><center>Data is empty.</center></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('table tbody tr td').on('click', '.data-map',function() {
           var latlng = $(this).data('latlng');
            url = 'https://maps.google.com/maps?q='+ latlng +'&z=17&output=embed';
            $('#modal-map').show();
            $('#maps').attr('src', url);
        });

        $('.close').on('click', function() {
            $('#modal-map').hide();
            $('#maps').attr('src', '');
        });

        $('#close').on('click', function() {
            $('#modal-map').hide();
            $('#maps').attr('src', '');
        });
    });
</script>
@endsection

@section('modal')
    @include('modal.map')
@endsection
