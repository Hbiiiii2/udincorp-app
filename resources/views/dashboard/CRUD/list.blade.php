@extends('dashboard.layouts.base')
@section('title', 'List Items')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Items</h1>
            <a href="{{ route('CRUD.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add New Item
            </a>
        </div>

        <!-- Search and Filter Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Search & Filter</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('CRUD.index') }}" method="GET" class="row g-3">
                    <div class="col-md-4">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" class="form-control" id="search" name="search" 
                               placeholder="Search by name or code..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="kondisi" class="form-label">Condition</label>
                        <select class="form-control" id="kondisi" name="kondisi">
                            <option value="">All Conditions</option>
                            <option value="BARU" {{ request('kondisi') == 'BARU' ? 'selected' : '' }}>BARU (New)</option>
                            <option value="BEKAS" {{ request('kondisi') == 'BEKAS' ? 'selected' : '' }}>BEKAS (Used)</option>
                            <option value="RUSAK" {{ request('kondisi') == 'RUSAK' ? 'selected' : '' }}>RUSAK (Damaged)</option>
                            <option value="PERBAIKAN" {{ request('kondisi') == 'PERBAIKAN' ? 'selected' : '' }}>PERBAIKAN (Under Repair)</option>
                            <option value="SEWA" {{ request('kondisi') == 'SEWA' ? 'selected' : '' }}>SEWA (Rental)</option>
                            <option value="SAMPLE" {{ request('kondisi') == 'SAMPLE' ? 'selected' : '' }}>SAMPLE (Sample)</option>
                            <option value="DEMO" {{ request('kondisi') == 'DEMO' ? 'selected' : '' }}>DEMO (Demo)</option>
                            <option value="REFURBISHED" {{ request('kondisi') == 'REFURBISHED' ? 'selected' : '' }}>REFURBISHED (Refurbished)</option>
                            <option value="OVERHAUL" {{ request('kondisi') == 'OVERHAUL' ? 'selected' : '' }}>OVERHAUL (Overhauled)</option>
                            <option value="LIMITED" {{ request('kondisi') == 'LIMITED' ? 'selected' : '' }}>LIMITED (Limited Stock)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="satuan" class="form-label">Unit</label>
                        <select class="form-control" id="satuan" name="satuan">
                            <option value="">All Units</option>
                            <option value="PCS" {{ request('satuan') == 'PCS' ? 'selected' : '' }}>PCS (Pieces)</option>
                            <option value="BOX" {{ request('satuan') == 'BOX' ? 'selected' : '' }}>BOX (Box)</option>
                            <option value="PAK" {{ request('satuan') == 'PAK' ? 'selected' : '' }}>PAK (Pack)</option>
                            <option value="DUS" {{ request('satuan') == 'DUS' ? 'selected' : '' }}>DUS (Carton)</option>
                            <option value="KG" {{ request('satuan') == 'KG' ? 'selected' : '' }}>KG (Kilogram)</option>
                            <option value="GR" {{ request('satuan') == 'GR' ? 'selected' : '' }}>GR (Gram)</option>
                            <option value="LTR" {{ request('satuan') == 'LTR' ? 'selected' : '' }}>LTR (Liter)</option>
                            <option value="ML" {{ request('satuan') == 'ML' ? 'selected' : '' }}>ML (Milliliter)</option>
                            <option value="M" {{ request('satuan') == 'M' ? 'selected' : '' }}>M (Meter)</option>
                            <option value="CM" {{ request('satuan') == 'CM' ? 'selected' : '' }}>CM (Centimeter)</option>
                            <option value="SET" {{ request('satuan') == 'SET' ? 'selected' : '' }}>SET (Set)</option>
                            <option value="UNIT" {{ request('satuan') == 'UNIT' ? 'selected' : '' }}>UNIT (Unit)</option>
                            <option value="ROLL" {{ request('satuan') == 'ROLL' ? 'selected' : '' }}>ROLL (Roll)</option>
                            <option value="BTL" {{ request('satuan') == 'BTL' ? 'selected' : '' }}>BTL (Bottle)</option>
                            <option value="SHT" {{ request('satuan') == 'SHT' ? 'selected' : '' }}>SHT (Sheet)</option>
                            <option value="RIM" {{ request('satuan') == 'RIM' ? 'selected' : '' }}>RIM (Ream)</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="sort" class="form-label">Sort By</label>
                        <select class="form-control" id="sort" name="sort">
                            <option value="">Default</option>
                            <option value="nama_barang_asc" {{ request('sort') == 'nama_barang_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                            <option value="nama_barang_desc" {{ request('sort') == 'nama_barang_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                            <option value="jumlah_asc" {{ request('sort') == 'jumlah_asc' ? 'selected' : '' }}>Quantity (Low-High)</option>
                            <option value="jumlah_desc" {{ request('sort') == 'jumlah_desc' ? 'selected' : '' }}>Quantity (High-Low)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-2">
                            <i class="fas fa-search"></i> Search
                        </button>
                        <a href="{{ route('CRUD.index') }}" class="btn btn-secondary mt-2">
                            <i class="fas fa-sync"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Items List</h6>
                <div>
                    <span class="badge badge-info">Total Items: {{ $records->count() }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Unit</th>
                                <th>Condition</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($records as $index => $record)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $record->kode_barang }}</td>
                                    <td>{{ $record->nama_barang }}</td>
                                    <td class="text-center">{{ $record->jumlah }}</td>
                                    <td class="text-center">{{ $record->satuan }}</td>
                                    <td>
                                        <span class="badge badge-{{ $record->kondisi == 'BARU' ? 'success' : ($record->kondisi == 'BEKAS' ? 'warning' : 'danger') }}">
                                            {{ $record->kondisi }}
                                        </span>
                                    </td>
                                    <td>{{ $record->lokasi }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('CRUD.edit', $record->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('CRUD.delete', $record->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No items found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    @endpush
@endsection
