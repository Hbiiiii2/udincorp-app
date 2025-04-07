@extends('dashboard.layouts.base')
@section('title', 'Edit Item')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Item</h1>
            <a href="{{ route('CRUD.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to List
            </a>
        </div>

        <!-- Form Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Item Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('CRUD.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="kode_barang" class="form-label">Item Code <span class="text-danger">*</span></label>
                                <input class="form-control" id="kode_barang" name="kode_barang" type="text" 
                                       value="{{ old('kode_barang', $record->kode_barang) }}" placeholder="MOL-1200" required>
                                <small class="form-text text-muted">Enter the item code (e.g., MOL-1200)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_barang" class="form-label">Item Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="nama_barang" name="nama_barang" type="text" 
                                       value="{{ old('nama_barang', $record->nama_barang) }}" placeholder="Mouse Logitech v120" required>
                                <small class="form-text text-muted">Enter the complete item name</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="jumlah" class="form-label">Quantity <span class="text-danger">*</span></label>
                                <input class="form-control" id="jumlah" name="jumlah" type="number" 
                                       value="{{ old('jumlah', $record->jumlah) }}" placeholder="5" min="1" required>
                                <small class="form-text text-muted">Enter the quantity of items</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="satuan" class="form-label">Unit <span class="text-danger">*</span></label>
                                <select class="form-control" id="satuan" name="satuan" required>
                                    <option value="">Select Unit</option>
                                    <option value="PCS" {{ old('satuan', $record->satuan) == 'PCS' ? 'selected' : '' }}>PCS (Pieces)</option>
                                    <option value="BOX" {{ old('satuan', $record->satuan) == 'BOX' ? 'selected' : '' }}>BOX (Box)</option>
                                    <option value="PAK" {{ old('satuan', $record->satuan) == 'PAK' ? 'selected' : '' }}>PAK (Pack)</option>
                                    <option value="DUS" {{ old('satuan', $record->satuan) == 'DUS' ? 'selected' : '' }}>DUS (Carton)</option>
                                    <option value="KG" {{ old('satuan', $record->satuan) == 'KG' ? 'selected' : '' }}>KG (Kilogram)</option>
                                    <option value="GR" {{ old('satuan', $record->satuan) == 'GR' ? 'selected' : '' }}>GR (Gram)</option>
                                    <option value="LTR" {{ old('satuan', $record->satuan) == 'LTR' ? 'selected' : '' }}>LTR (Liter)</option>
                                    <option value="ML" {{ old('satuan', $record->satuan) == 'ML' ? 'selected' : '' }}>ML (Milliliter)</option>
                                    <option value="M" {{ old('satuan', $record->satuan) == 'M' ? 'selected' : '' }}>M (Meter)</option>
                                    <option value="CM" {{ old('satuan', $record->satuan) == 'CM' ? 'selected' : '' }}>CM (Centimeter)</option>
                                    <option value="SET" {{ old('satuan', $record->satuan) == 'SET' ? 'selected' : '' }}>SET (Set)</option>
                                    <option value="UNIT" {{ old('satuan', $record->satuan) == 'UNIT' ? 'selected' : '' }}>UNIT (Unit)</option>
                                    <option value="ROLL" {{ old('satuan', $record->satuan) == 'ROLL' ? 'selected' : '' }}>ROLL (Roll)</option>
                                    <option value="BTL" {{ old('satuan', $record->satuan) == 'BTL' ? 'selected' : '' }}>BTL (Bottle)</option>
                                    <option value="SHT" {{ old('satuan', $record->satuan) == 'SHT' ? 'selected' : '' }}>SHT (Sheet)</option>
                                    <option value="RIM" {{ old('satuan', $record->satuan) == 'RIM' ? 'selected' : '' }}>RIM (Ream)</option>
                                </select>
                                <small class="form-text text-muted">Select the unit of measurement</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="kondisi" class="form-label">Condition <span class="text-danger">*</span></label>
                                <select class="form-control" id="kondisi" name="kondisi" required>
                                    <option value="">Select Condition</option>
                                    <option value="BARU" {{ old('kondisi', $record->kondisi) == 'BARU' ? 'selected' : '' }}>BARU (New)</option>
                                    <option value="BEKAS" {{ old('kondisi', $record->kondisi) == 'BEKAS' ? 'selected' : '' }}>BEKAS (Used)</option>
                                    <option value="RUSAK" {{ old('kondisi', $record->kondisi) == 'RUSAK' ? 'selected' : '' }}>RUSAK (Damaged)</option>
                                    <option value="PERBAIKAN" {{ old('kondisi', $record->kondisi) == 'PERBAIKAN' ? 'selected' : '' }}>PERBAIKAN (Under Repair)</option>
                                    <option value="SEWA" {{ old('kondisi', $record->kondisi) == 'SEWA' ? 'selected' : '' }}>SEWA (Rental)</option>
                                    <option value="SAMPLE" {{ old('kondisi', $record->kondisi) == 'SAMPLE' ? 'selected' : '' }}>SAMPLE (Sample)</option>
                                    <option value="DEMO" {{ old('kondisi', $record->kondisi) == 'DEMO' ? 'selected' : '' }}>DEMO (Demo)</option>
                                    <option value="REFURBISHED" {{ old('kondisi', $record->kondisi) == 'REFURBISHED' ? 'selected' : '' }}>REFURBISHED (Refurbished)</option>
                                    <option value="OVERHAUL" {{ old('kondisi', $record->kondisi) == 'OVERHAUL' ? 'selected' : '' }}>OVERHAUL (Overhauled)</option>
                                    <option value="LIMITED" {{ old('kondisi', $record->kondisi) == 'LIMITED' ? 'selected' : '' }}>LIMITED (Limited Stock)</option>
                                </select>
                                <small class="form-text text-muted">Select the item condition</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="lokasi" class="form-label">Location <span class="text-danger">*</span></label>
                                <input class="form-control" id="lokasi" name="lokasi" type="text" 
                                       value="{{ old('lokasi', $record->lokasi) }}" placeholder="Gudang Jakarta" required>
                                <small class="form-text text-muted">Enter the storage location</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Item
                            </button>
                            <a href="{{ route('CRUD.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </div>
                </form>
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
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('CRUD.index') }}";
                }
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
