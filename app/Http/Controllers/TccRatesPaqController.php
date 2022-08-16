<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use App\Models\Municipios;
use App\Models\TccRatesPaq;
use Illuminate\Http\Request;

class TccRatesPaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates_paq = TccRatesPaq::all();
        return view('back.tcc_rates_paq.index', compact('rates_paq'));
    }

    public function getTowns(Request $request, $id) {
        if($request->ajax()) {
            $towns = Municipios::municipios($id);
            return response()->json($towns);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamentos::all();
        $municipios = Municipios::all();
        return view('back.tcc_rates_paq.create', compact('departamentos', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $this->validate($request, [
            'departamento_origen' => 'required',
            'municipio_origen' => 'required',
            'departamento_destino' => 'required',
            'municipio_destino' => 'required',
            'centro_operaciones' => 'required',
            'precio' => 'required',
        ],[
            'departamento_origen.required' => 'El departamento origen es requerido',
            'municipio_origen.required' => 'El municipio origen es requerido',
            'departamento_destino.required' => 'El departamento destino es requerido',
            'municipio_destino.required' => 'El municipio destino es requerido',
            'centro_operaciones.required' => 'El centro de operaciones es requerido',
            'precio.required' => 'El precio es requerido',
        ]);

        $departamento_origen = Departamentos::where('id_departamento', $request->get('departamento_origen'))->first();
        $municipio_origen = Municipios::where('id_municipio', $request->get('municipio_origen'))->first();
        $departamento_destino = Departamentos::where('id_departamento', $request->get('departamento_destino'))->first();
        $municipio_destino = Municipios::where('id_municipio', $request->get('municipio_destino'))->first();
        $municipio_co = Municipios::where('id_municipio', $request->get('centro_operaciones'))->first();

        $rate = new TccRatesPaq();
        $rate->departamento_origen = $departamento_origen->departamento;
        $rate->municipio_origen = $municipio_origen->municipio;
        $rate->departamento_destino = $departamento_destino->departamento;
        $rate->municipio_destino = $municipio_destino->municipio;
        $rate->centro_operaciones = $municipio_co->municipio;
        $rate->valor = $request->get('precio');

        if($request->input('aliados') !== null){
            $rate->aliados = 1;
        }else{
            $rate->aliados = 0;
        }

        if($request->input('recogida') !== null){
            $rate->recogida = 1;
        }else{
            $rate->recogida = 0;
        }

        if($request->input('boomerang') !== null){
            $rate->boomerang = 1;
        }else{
            $rate->boomerang = 0;
        }

        $rate->save();

        return redirect()->route('tcc-rates-paq.index')->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TccRatesPaq  $tccRatesPaq
     * @return \Illuminate\Http\Response
     */
    public function show(TccRatesPaq $tccRatesPaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TccRatesPaq  $tccRatesPaq
     * @return \Illuminate\Http\Response
     */
    public function edit(TccRatesPaq $rate)
    {
        // $rate = TccRatesPaq::where('id', $id)->first();
        $departamentos = Departamentos::all();
        $municipios = Municipios::all();
        return view('back.tcc_rates_paq.edit', compact('departamentos', 'municipios', 'rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TccRatesPaq  $tccRatesPaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TccRatesPaq $rate)
    {
        // Validación
        $this->validate($request, [
            'departamento_origen' => 'required',
            'municipio_origen' => 'required',
            'departamento_destino' => 'required',
            'municipio_destino' => 'required',
            'centro_operaciones' => 'required',
            'precio' => 'required',
        ],[
            'departamento_origen.required' => 'El departamento origen es requerido',
            'municipio_origen.required' => 'El municipio origen es requerido',
            'departamento_destino.required' => 'El departamento destino es requerido',
            'municipio_destino.required' => 'El municipio destino es requerido',
            'centro_operaciones.required' => 'El centro de operaciones es requerido',
            'precio.required' => 'El precio es requerido',
        ]);

        $departamento_origen = Departamentos::where('id_departamento', $request->get('departamento_origen'))->first();
        $municipio_origen = Municipios::where('id_municipio', $request->get('municipio_origen'))->first();
        $departamento_destino = Departamentos::where('id_departamento', $request->get('departamento_destino'))->first();
        $municipio_destino = Municipios::where('id_municipio', $request->get('municipio_destino'))->first();
        $municipio_co = Municipios::where('id_municipio', $request->get('centro_operaciones'))->first();

        $datos = array(
            'departamento_origen' => $departamento_origen->departamento,
            'municipio_origen' => $municipio_origen->municipio,
            'departamento_destino' => $departamento_destino->departamento,
            'municipio_destino' => $municipio_destino->municipio,
            'centro_operaciones' => $municipio_co->municipio,
            'valor' => $request->get('precio'),
        );

        if($request->input('aliados') !== null){
            $datos['aliados'] = 1;
        }else{
            $datos['aliados'] = 0;
        }

        if($request->input('recogida') !== null){
            $datos['recogida'] = 1;
        }else{
            $datos['recogida'] = 0;
        }

        if($request->input('boomerang') !== null){
            $datos['boomerang'] = 1;
        }else{
            $datos['boomerang'] = 0;
        }

        TccRatesPaq::whereId($rate->id)->update($datos);

        return redirect()->route('tcc-rates-paq.index')->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TccRatesPaq  $tccRatesPaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(TccRatesPaq $rate)
    {
        $rate->delete();
        return redirect()->route('tcc-rates-paq.index')->with('success', 'Registro eliminado correctamente.');
    }
}
