<?php

namespace App\Http\Controllers;

use App\Imports\TorcedoresImport;
use App\Models\Torcedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Excel;
use SimpleXMLElement;

class  TorcedorController extends Controller
{
    public function index(){
        $torcedores = Torcedor::get();
        return view('torcedores.list', ['torcedores' => $torcedores]);
    }

    public function new(){
        return view('torcedores.form');
    }

    public function add(Request $request){
        $torcedor = new Torcedor();
        $torcedor = $torcedor->create($request->all());

        return Redirect::to('/torcedores');
    }

    public function edit($id){
        $torcedor = Torcedor::findOrFail($id);
        return view('torcedores.form', ['torcedor' => $torcedor]);
    }

    public function update($id, Request $request){
        $torcedor = Torcedor::findOrFail($id);
        $torcedor->update($request->all());
        return Redirect::to('/torcedores');
    }

    public function delete($id){
        $torcedor = Torcedor::findOrFail($id);
        $torcedor->delete();
        return Redirect::to('/torcedores');
    }

    public function formImportPlanilha(){
        return view('torcedores.form_planilha');
    }

    public function storeImportPlanilha(){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load(request()->file('planilha'));
        $break = 0;
        $cell = 2;
        while ($break === 0) {

            if (is_null($spreadsheet->getSheet(0)->getCellByColumnAndRow(1, $cell)->getValue())){
                $break = 1;
                break;
            }

            $arTorcedor = array(
                "nome"      => $spreadsheet->getSheet(0)->getCellByColumnAndRow(1, $cell)->getValue(),
                "documento" => str_pad($spreadsheet->getSheet(0)->getCellByColumnAndRow(2, $cell) , 14 , '0' , STR_PAD_LEFT),
                "email"     => $spreadsheet->getSheet(0)->getCellByColumnAndRow(9, $cell)->getValue(),
                "telefone"  => $spreadsheet->getSheet(0)->getCellByColumnAndRow(8, $cell)->getValue(),
                "endereco"  => $spreadsheet->getSheet(0)->getCellByColumnAndRow(4, $cell)->getValue(),
                "bairro"    => $spreadsheet->getSheet(0)->getCellByColumnAndRow(5, $cell)->getValue(),
                "cidade"    => $spreadsheet->getSheet(0)->getCellByColumnAndRow(6, $cell)->getValue(),
                "uf"        => $spreadsheet->getSheet(0)->getCellByColumnAndRow(7, $cell)->getValue(),
                "cep"       => $spreadsheet->getSheet(0)->getCellByColumnAndRow(3, $cell)->getValue(),
                "ativo"     => strtoupper($spreadsheet->getSheet(0)->getCellByColumnAndRow(10, $cell)->getValue() === 'SIM' ) ? true : false,
            );

            $srTorcedor = Torcedor::select('id','documento')->where('documento', $arTorcedor['documento'])->get();

            if (isset($srTorcedor[0]->id)) {
                $torcedor = Torcedor::findOrFail($srTorcedor[0]->id);
                $torcedor->update($arTorcedor);

            } else {
                $torcedor = new Torcedor();
                $torcedor->create($arTorcedor);
            }

            $cell++;

        };
        return Redirect::back();
    }

    public function formImportXml(){
        return view('torcedores.form_xml');
    }

    public function storeImportXml(){
        $data = new SimpleXMLElement(request()->file('xml'), null, true);

        foreach ($data as $node){
            $arTorcedor = array(
                "nome"      => $node['nome'],
                "documento" => str_replace(['-','.'], '', str_pad($node['documento'] , 14 , '0' , STR_PAD_LEFT)),
                "email"     => $node['email'],
                "telefone"  => $node['telefone'],
                "endereco"  => $node['endereco'],
                "bairro"    => $node['bairro'],
                "cidade"    => $node['cidade'],
                "uf"        => $node['uf'],
                "cep"       => str_replace(['-','.'], '',$node['cep']),
                "ativo"     => strtoupper($node['ativo'] == '' ) ? false : true,
            );

            $srTorcedor = Torcedor::select('id','documento')->where('documento', $arTorcedor['documento'])->get();

            if (isset($srTorcedor[0]->id)) {
                $torcedor = Torcedor::findOrFail($srTorcedor[0]->id);
                $torcedor->update($arTorcedor);

            } else {
                $torcedor = new Torcedor();
                $torcedor->create($arTorcedor);
            }

        }
        return Redirect::back();
    }

}
