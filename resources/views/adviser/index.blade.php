@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List Adviser</h1>
        </div>
        <div class="col-sm-6">
          <a href="{{ route('adviser.create') }}" class="btn btn-primary float-sm-right">New Adviser</a>
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
                        <h3 class="card-title">Table Adviser</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Name</th>
                                <th>Foto</th>
                                <th>Branch</th>
                                <th>E-mail</th>
                                <th>Description</th>
                                <th>No. Hp</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @forelse ($advisers as $adviser)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $adviser->name }}</td>
                                        <td><img src="{{ ENV('URL_IMAGE').$adviser->foto }}" alt=""class="img-responsive" style="width: 100px"></td>
                                        <td>{{  $adviser->branch->name  }}</td>
                                        <td>{{ $adviser->email }}</td>
                                        <td>{!! $adviser->description !!}</td>
                                        <td>{{ $adviser->no_hp }}</td>
                                        <td style="width: 100px">
                                            <a href="{{ route('adviser.show', ['id' => $adviser->id]) }}" class="btn btn-sm btn-info" title="Show"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('adviser.edit', ['id' => $adviser->id]) }}" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('adviser.delete', ['id' => $adviser->id]) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8"><center>Data is empty.</center></td>
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
