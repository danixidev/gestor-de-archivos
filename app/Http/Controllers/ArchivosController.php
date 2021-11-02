<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ArchivosController extends Controller
{
    
    public function subirArchivo(Request $req) {
    
        $nombre = "";
    
        if ($req->isMethod('post') && $req->has('nombre')) {
            $nombre = $req->input('nombre');

            if(!empty($nombre)) {
        
                $nombre = str_replace(" ", "_", $nombre);

                $extension = $req->file('archivo')->getClientOriginalExtension();
        
                $req->file('archivo')->storeAs(
                    'public/archivos',
                    $nombre.'.'.$extension
                );
            }
        }
    
    
        return view('inicio');
    }

    public function verListado() {

        $listado = [];
        $archivo = [];

        foreach (Storage::files('public/archivos') as $key => $value) {
            $nombre = explode('public/archivos/', $value)[1];

            array_push($listado, $nombre);
            array_push($archivo, 'storage/archivos/'.$nombre);
        }

        return view('listado', ['listado' => $listado, 'archivo' => $archivo]);
    }


    public function descargar($id) {

        return Storage::download('public/archivos/'.$id);
    
    }
}
