@extends('_layouts.default')

@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 ">
            {{-- @include('_layout.breadcrumb') --}}
        </div>
        <div class="col-md-6">
            <a href="{{url('penduduk/create')}}" class="btn btn-primary float-md-right mt-0">
                <i class="icon-plus3"></i> Tambah
            </a>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">Daftar Penduduk</h4>
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
                        <table class="table table-sm mb-0 table-bordered table-hover">
                            <thead class="bg-primary bg-lighten text-white">
                            <!-- <thead class="bg-lighten"> -->
                                <tr>
                                    <th width="20">No.</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama Dusun</th>
                                    <th>RT / RW</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Agama</th>
                                    <th>Status</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Pekerjaan</th>
                                    <th>Kewarganegaraan</th>
                                    {{-- @if(Auth::user()->permission_actions) --}}
                                    <th width="" class="text-xs-center">Actions</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($penduduk as $index => $item)
                                    <tr class="{{$item->class_status_keadaan}}">
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->tempat_lahir}}</td>
                                        <td>{{$item->tanggal_lahir}}</td>
                                        <td>{{$item->jenis_kelamin}}</td>
                                        <td>{{$item->nama_dusun}}</td>
                                        <td>{{$item->rt}}/{{$item->rw}}</td>
                                        <td>{{$item->kelurahan}}</td>
                                        <td>{{$item->kecamatan}}</td>
                                        <td>{{$item->agama}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->status_kepalakeluarga}}</td>
                                        <td>{{$item->pekerjaan}}</td>
                                        <td>{{$item->kewarganegaraan}}</td>
                                        <td class="text-xs-center">
                                            <a href="{{route('penduduk.edit',$item->id)}}" class="btn btn-sm btn-green">
                                                <i class="icon-pencil3"></i> edit
                                            </a>
                                            <a href="{{ route('penduduk.destroy',$item->id)}}"
                                                data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                                                class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="icon-trash3"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-info bg-lighten-4">
                                        <td colspan="15">
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
                    {!! $penduduk->links() !!}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
