<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Traits\ManageConsignments;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    // Trait para gestionar remesas con llamadas al WS de TCC
    use ManageConsignments;

    public function index() {
        $despachos = Courier::all();
        return view('back.operations.courier.index', compact('despachos'));
    }

    public function create()
    {
        return view('back.operations.courier.create');
    }

    public function store(Request $request)
    {
        // Validación
        $this->validate($request, [
            'remesa' => 'required',
            'unidad_negocio' => 'required',
        ],[
            'remesa.required' => 'La remesa es requerida',
            'unidad_negocio.required' => 'La unidad de negocio es requerida',
        ]);

        $courier = new Courier();
        $courier->remesa = $request['remesa'];
        $courier->unidad_negocio = $request['unidad_negocio'];

        $courier->save();

        return redirect()->route('operations.courier.index')->with('success', 'Registro creado exitosamente.');
    }

    public function show($id) {
        $courier = Courier::where('id', $id)->first();
        $remesa = $courier->remesa;
        $unidad_negocio = '';

        if($courier->unidad_negocio == 'Mensajería') {
            $unidad_negocio = '2';
        } elseif ($courier->unidad_negocio == 'Paquetería') {
            $unidad_negocio = '1';
        }

        $consultaRemesa = json_decode(ManageConsignments::consultarRemesa($remesa, $unidad_negocio), JSON_UNESCAPED_UNICODE);

        $remesa = $consultaRemesa["remesasrespuesta"]["RemesaEstados"]["numeroremesa"];

        if(isset($consultaRemesa["remesasrespuesta"]["RemesaEstados"]["listaestados"])) {
            $estados = $consultaRemesa["remesasrespuesta"]["RemesaEstados"]["listaestados"]["Estado"];
        } else {
            $estados = null;
        }
        
        if(isset($consultaRemesa["remesasrespuesta"]["RemesaEstados"]["listanovedades"])) {
            $novedades = $consultaRemesa["remesasrespuesta"]["RemesaEstados"]["listanovedades"]["Novedad"];
        } else {
            $novedades = null;
        }

        return view('back.operations.courier.show', compact('consultaRemesa', 'remesa', 'estados', 'novedades'));
    }
}
