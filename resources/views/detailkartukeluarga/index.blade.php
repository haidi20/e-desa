@extends('_layouts.default')

@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 ">
            {{-- @include('_layout.breadcrumb') --}}
        </div>
        <div class="col-md-6">
            <a href="{{route('detailkartukeluarga.create',['kk' => request('kk')])}}" class="btn btn-primary float-md-right mt-0">
                <i class="icon-plus3"></i> Tambah
            </a>
            <a href="{{url('kartukeluarga')}}" class="btn btn-warning float-md-right mt-0">
                Kembali
            </a>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">Daftar Detail Kartu Keluarga</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            {{-- <li><a data-action="collapse"><i class="icon-minus4"></i></a></li> --}}
                            {{-- <li><a data-action="expand"><i class="icon-expand2"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block pb-0">
                        <form method="get">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nama Kepala Keluarga : </label>
                                        {{-- <h4>{{$kartukeluarga->nama_penduduk}}</h4> --}}
                                        {{$carikartukeluarga->nama_penduduk}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nomor Kartu Keluarga : </label>
                                        {{-- <h4>{{$kartukeluarga->nama_penduduk}}</h4> --}}
                                        {{$carikartukeluarga->nomor}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="card-body"> --}}
                <div class="card-block">
                    <div class="table-responsive bg-white">
                        <table class="table table-sm mb-0 table-bordered table-hover">
                            <thead class="bg-primary bg-lighten text-white">
                            <!-- <thead class="bg-lighten"> -->
                                <tr>
                                    <th width="20">No.</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Status Hubungan Dalam Keluarga</th>
                                    {{-- @if(Auth::user()->permission_actions) --}}
                                    <th width="180" class="text-xs-center">Actions</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($detailkartukeluarga as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->nik_penduduk}}</td>
                                        <td>{{$item->nama_penduduk}}</td>
                                        <td>{{$item->role}}</td>
                                        <td class="text-xs-center">
                                            <a href="{{route('detailkartukeluarga.edit',[$item->id, 'kk' => request('kk')])}}" class="btn btn-sm btn-green">
                                                <i class="icon-pencil3"></i> Edit
                                            </a>
                                            <a href="{{ route('detailkartukeluarga.destroy',[$item->id, 'kk' => request('kk')])}}"
                                                data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                                                class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="icon-trash3"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                     <tr class="bg-info bg-lighten-4">
                                        <td colspan="5">
                                            <strong class="text-info"><center>Data Kosong</center></strong>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- </div> -->
            </div>

            <div class="card-block pr-0">
                <nav aria-label="Page navigation" class="text-xs-right">
                    {!! $detailkartukeluarga->links() !!}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
