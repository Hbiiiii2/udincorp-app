<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('barang');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kode_barang', 'like', "%{$search}%")
                  ->orWhere('nama_barang', 'like', "%{$search}%");
            });
        }

        // Filter by condition
        if ($request->has('kondisi') && !empty($request->kondisi)) {
            $query->where('kondisi', $request->kondisi);
        }

        // Filter by unit
        if ($request->has('satuan') && !empty($request->satuan)) {
            $query->where('satuan', $request->satuan);
        }

        // Sorting functionality
        if ($request->has('sort') && !empty($request->sort)) {
            switch ($request->sort) {
                case 'nama_barang_asc':
                    $query->orderBy('nama_barang', 'asc');
                    break;
                case 'nama_barang_desc':
                    $query->orderBy('nama_barang', 'desc');
                    break;
                case 'jumlah_asc':
                    $query->orderBy('jumlah', 'asc');
                    break;
                case 'jumlah_desc':
                    $query->orderBy('jumlah', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'desc');
            }
        } else {
            $query->orderBy('id', 'desc');
        }

        $records = $query->get();
        return view('dashboard.CRUD.list', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new record
        return view('dashboard.CRUD.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'kondisi' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
        ]);

        // Insert the new record into the database
        DB::table('barang')->insert([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'kondisi' => $request->kondisi,
            'lokasi' => $request->lokasi,
        ]);

        // Redirect back to the list with a success message
        return redirect()->route('CRUD.create')->with('success', 'Record created successfully.');
    }

    public function edit($id)
    {
        // Fetch the record to be edited
        $record = DB::table('barang')->where('id', $id)->first();

        // Return the view for editing the record
        return view('dashboard.CRUD.edit', compact('record'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'kondisi' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
        ]);

        // Update the record in the database
        DB::table('barang')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'kondisi' => $request->kondisi,
            'lokasi' => $request->lokasi,
        ]);

        // Redirect back to the list with a success message
        return redirect()->route('CRUD.index')->with('success', 'Record updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the record from the database
        DB::table('barang')->where('id', $id)->delete();

        // Redirect back to the list with a success message
        return redirect()->route('CRUD.index')->with('success', 'Record deleted successfully.');
    }
    public function show($id)
    {
        // Fetch the record to be shown
        $record = DB::table('barang')->where('id', $id)->first();

        // Return the view for showing the record
        return view('dashboard.CRUD.edit', compact('record'));
    }
    public function search(Request $request)
    {
        // Validate the search query
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        // Fetch records matching the search query
        $records = DB::table('barang')
            ->where('kode_barang', 'like', '%' . $request->query . '%')
            ->orWhere('nama_barang', 'like', '%' . $request->query . '%')
            ->get();

        // Return the view with the filtered records
        return view('dashboard.CRUD.list', compact('records'));
    }
    public function filter(Request $request)
    {
        // Validate the filter criteria
        $request->validate([
            'kondisi' => 'required|string|max:50',
        ]);

        // Fetch records matching the filter criteria
        $records = DB::table('barang')
            ->where('kondisi', $request->kondisi)
            ->get();

        // Return the view with the filtered records
        return view('dashboard.CRUD.list', compact('records'));
    }
    // public function export()
    // {
    //     // Fetch all records from the database
    //     $records = DB::table('barang')->get();

    //     // Return the view for exporting records
    //     return view('dashboard.CRUD.export', compact('records'));
    // }
}
