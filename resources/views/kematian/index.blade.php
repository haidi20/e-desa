@extends('_layouts.default')

@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 ">
            {{-- @include('_layout.breadcrumb') --}}
        </div>
        <div class="col-md-6">
            @if(Auth::user()->role == 'pegawai')
            <a href="{{url('kematian/create')}}" class="btn btn-primary float-md-right mt-0">
                <i class="icon-plus3"></i> Tambah
            </a>
            @endif
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">Daftar Kematian</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            {{-- <li><a data-action="collapse"><i class="icon-minus4"></i></a></li> --}}
                            {{-- <li><a data-action="expand"><i class="icon-expand2"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="card-body collapse in">
                    <div class="card-block pb-0">
                        <form method="get">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group mb-0">
                                        
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Total records : </label>
                                        <div class="form-control" readonly><strong>{{ number_format_short($total_record) }}</strong></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Search by : </label>
                                        <select name="by" id="by" class="form-control">
                                            <option value="name" {{ (request('by') == 'name') ? 'selected' : '' }}>Nama</option>
                                            <option value="code" {{ (request('by') == 'code') ? 'selected' : '' }}>Nomor Barang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Search box : </label>
                                        <div class="input-group">
                                            <input type="text" name="q" id="search" class="form-control" value="{{ request('q') }}" placeholder="Type here...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="icon-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <!-- <div class="card-body"> -->
                <div class="card-block">
                    <div class="table-responsive bg-white">
                        <table class="table table-sm table-bordered table-hover font-small-4">
                            <thead class="bg-primary bg-lighten text-white">
                            <!-- <thead class="bg-lighten"> -->
                                <tr>
                                    <th width="5">No.</th>
                                    <th width="10">Nama Penduduk</th>
                                    <th width="10">Nama Dusun Penduduk</th>
                                    <th width="10">Tempat Kematian</th>
                                    <th width="10">Tanggal Kematian</th>
                                    <th width="10">Alasan</th>
                                    <th width="10">Persetujuan</th>
                                    {{-- @if(Auth::user()->role == 'pegawai') --}}
                                    <th width="250" class="text-xs-center">Actions</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kematian as $index => $item)
                                    <tr>
                                        <td class="valign-middle">{{$index + 1}}</td>
                                        <td class="valign-middle">{{$item->nama_penduduk}}</td>
                                        <td class="valign-middle">{{$item->alamat_penduduk}}</td>
                                        <td class="valign-middle">{{$item->tempat}}</td>
                                        <td class="valign-middle">{{$item->tanggal}}</td>
                                        <td class="valign-middle">{{$item->alasan}}</td>
                                        <td class="valign-middle">{{$item->alasan_persetujuan}}</td>
                                        <td class="text-xs-center">
                                            @if(Auth::user()->role == 'pegawai')
                                                <a href="{{route('kematian.file', $item->id)}}" class="btn btn-sm btn-info {{tombol_berkas($item->persetujuan)}}">
                                                    <i class="icon-file2"></i> Unduh Surat
                                                </a>
                                            @else
                                                <a href="{{route('kematian.persetujuan',$item->id)}}" class="btn btn-sm btn-info">
                                                    <i class="icon-eye6"></i> Setujui
                                                </a>
                                                <a href="{{route('kematian.persetujuan', $item->id)}}" class="btn btn-sm btn-danger">
                                                    Tidak Setujui
                                                </a>
                                            @endif
                                            @if(Auth::user()->role == 'pegawai')
                                            <a href="{{route('kematian.edit',$item->id)}}" class="btn btn-sm btn-green">
                                                <i class="icon-pencil3"></i> Edit
                                            </a>
                                            <a href="{{ route('kematian.destroy',$item->id)}}"
                                                data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                                                class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="icon-trash3"></i>
                                                Delete
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-info bg-lighten-4">
                                        <td colspan="8">
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
                    {!! $kematian->links() !!}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
