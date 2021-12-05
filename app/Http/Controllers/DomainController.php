<?php

namespace App\Http\Controllers;

use App\Models\DomainModel;
use App\Models\PriceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $dataDomain = DB::select("SELECT m_domain.*,
        m_price.name AS price_name 
        FROM m_domain 
        LEFT JOIN m_price ON m_price.id = m_domain.id_price where m_price.name LIKE '%" . $keyword . "%'");
        return view('domain.index', [
            'data' => $dataDomain,
            'keyword' => $keyword,
        ]);
    }
    public function delete($id)
    {
        $dataDomain = DomainModel::find($id);
        $dataDomain->delete();
        return redirect('/domain');
    }

    public function create()
    {
        $dataPrice = PriceModel::all();
        return view('domain.create', ['dataPrice' => $dataPrice]);
    }
    public function store(Request $r)
    {

        // return "coba";
        // return $r->all();

        //protected $fillable = ["name"];
        // StatusModel::create($r->all());

        $data = new DomainModel();
        $data->id_price = $r->id_price;
        $data->name = $r->name;
        $data->save();

        return redirect('/domain');
    }

    public function edit($id)
    {
        $dataPrice = PriceModel::all();
        $dataDomain = DomainModel::find($id);
        return view(
            'domain.edit',
            [
                'dataPrice' => $dataPrice,
                'dataDomain' => $dataDomain

            ]
        );
    }

    public function update(Request $r)
    {
        $data = DomainModel::find($r->id);
        $data->id_price = $r->id_price;
        $data->name = $r->name;
        $data->save();

        return redirect('/domain');
    }
}
