<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use DB;

class VisitorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ["except" => ["index", "store"]]);
    }

    public function index()
    {
        return view('halo');
    }

    public function store(Request $request)
    {
        $visitor = Visitor::create([
            'name' => $request->nama,
            'nomor_induk' =>  $request->nim,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'waktu' => time()
        ]);

        if ($visitor) {
            return redirect()->route('visitor')->with(['success' => 'Terima kasih sudah mengisi daftar tamu!']);
        } else {
            return redirect()->route('visitor')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function show(Request $request)
    {
        // $visitor = Visitor::all();
        // return Datatables::of(Visitor::query())->make(true);

        // if ($request->ajax()) {
        //     $data = Visitor::select('*');
        // return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {

        //             $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

        //             return $btn;
        //         })
        //         ->addColumn('keterangan', function ($row) {
        //             if ($row->keterangan == null) {
        //                 $keterangan = '-';
        //             } else {
        //                 $keterangan = $row->keterangan;
        //             }
        //             return $keterangan;
        //         })
        //         ->addColumn('waktu', function ($row) {
        //             $date = date("d-m-Y H:i:s", strtotime($row->created_at));
        //             return $date;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $data = DB::table('visitors')
                    ->whereBetween('created_at', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                $data = DB::table('visitors')
                    ->get();
            }
            return Datatables::of($data)
                ->addColumn('keterangan', function ($row) {
                    if ($row->keterangan == null) {
                        $keterangan = '-';
                    } else {
                        $keterangan = $row->keterangan;
                    }
                    return $keterangan;
                })
                ->addColumn('waktu', function ($row) {
                    $date = date("d-m-Y H:i:s", strtotime($row->created_at));
                    return $date;
                })
                ->make(true);
        }

        return view('tamu.all');
    }
}