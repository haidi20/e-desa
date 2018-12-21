@extends('_layouts.default')

@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 ">
            {{-- @include('_layout.breadcrumb') --}}
        </div>
        <div class="col-md-6">
            @if(Auth::user()->role == 'pegawai')
            <a href="{{url('mutasi/create')}}" class="btn btn-primary float-md-right mt-0">
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
                    <h4 class="card-title">Daftar Mutasi</h4>
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
                        
                    </div>
                </div> --}}
                <!-- <div class="card-body"> -->
                <div class="card-block">
                    <div class="table-responsive bg-white">
                        <table class="table table-sm mb-0 table-bordered table-hover">
                            <thead class="bg-primary bg-lighten text-white">
                            <!-- <thead class="bg-lighten"> -->
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Penduduk</th>
                                    <th>Alamat Sebelum</th>
                                    <th>Alamat Tujuan</th>
                                    <th>status Mutasi</th>
                                    <th>Alasan</th>
                                    <th>Persetujuan</th>
                                    {{-- @if(Auth::user()->permission_actions) --}}
                                    <th width="180" class="text-xs-center">Actions</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mutasi as $index => $item)
                                    <tr class="{{$item->class_status_mutasi}}">
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->nama_penduduk}}</td>
                                        <td>{{$item->alamat_datang}}</td>
                                        <td>{{$item->alamat_pergi}}</td>
                                        <td>{{$item->status_mutasi}}</td>
                                        <td>{{$item->alasan}}</td>
                                        <td>{{$item->alasan_persetujuan}}</td>
                                        <td class="text-xs-center">
                                             @if(Auth::user()->role == 'pegawai')
                                                @if($item->status_mutasi == 'pindah')
                                                    <a href="{{route('kematian.edit',$item->id)}}" class="btn btn-sm btn-info {{tombol_berkas($item->persetujuan)}}">
                                                        <i class="icon-file2"></i> Unduh Surat
                                                    </a>
                                                @endif
                                            @else
                                                @if($item->status_mutasi == 'pindah')
                                                    <a href="{{route('persetujuan',[$item->id, 'Mutasi', 'setuju'])}}" class="btn btn-sm btn-info">
                                                        <i class="icon-eye6"></i> Setujui
                                                    </a>
                                                    <a href="{{route('persetujuan', [$item->id, 'Mutasi', 'tidak'])}}" class="btn btn-sm btn-danger">
                                                        Tidak Setujui
                                                    </a>
                                                @endif
                                            @endif
                                            @if(Auth::user()->role == 'pegawai')
                                            <a href="{{route('mutasi.edit',$item->id)}}" class="btn btn-sm btn-green">
                                                <i class="icon-pencil3"></i> Edit
                                            </a>
                                            <a href="{{ route('mutasi.destroy',$item->id)}}"
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
                    {!! $mutasi->links() !!}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
