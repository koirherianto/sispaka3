<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Kucings 
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('kucing.index')
                <a href="{{ route('kucings.create') }}" class="btn btn-primary float-right"> Tambah Data </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Penjelasa</th>
                <th>Is Boy</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($kucings as $kucing)
                <tr>
                    <td>{{ $kucing->nama }}</td>
                    <td>{{ $kucing->tanggal_lahir }}</td>
                    <td>{{ $kucing->penjelasa }}</td>
                    <td>{{ $kucing->is_boy }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['kucings.destroy', $kucing->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('kucing.index')
                            <a href="{{ route('kucings.show', [$kucing->id]) }}" class='btn btn-primary btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('kucing.edit')
                            <a href="{{ route('kucings.edit', [$kucing->id]) }}" class='btn btn-warning btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('kucing.destroy')
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endcan
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="text-muted dropdown-toggle font-size-18" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('kucings.edit', [$kucing->id]) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('kucings.show', [$kucing->id]) }}">Detail</a>
                                {!! Form::open(['route' => ['kucings.destroy', $kucing->id], 'method' => 'delete']) !!}
                                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $kucings])
        </div>
    </div>
</div>
