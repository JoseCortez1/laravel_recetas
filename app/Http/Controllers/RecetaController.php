<?php

namespace App\Http\Controllers;

use App\CategoriasRecetas;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{


    /**
     * El siguiente constructor llama al middleware para la autenticación de 
     * usuario añl ingresar a todas las rutas de nuestro objeto
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>'show']);
    }

    public function test(){
        return view('recetas.test');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recetas = Auth::user()->recetas;
        return view('recetas.index')->with(compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Obtencion de categorias sin modelo
         * $categorias = DB::table('categorias_recetas')->get()->pluck('categoria', 'id');
         */
        /**
         * Obtencion de datos con modelo
         */
        $categorias = CategoriasRecetas::all(['id', 'categoria']);

        return view('recetas.create')->with(compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        //
      


        /**Para verificar errores o revisar algun dato que venga con ciertos
         * requerimientos usamos el metodo validate
         * con alguna de las siguientes reglas de validacion 
         * https://laravel.com/docs/7.x/validation#available-validation-rules
         */

        $data = request()->validate([
            'titulo'=>'required|min:2',
            'categoria'=>'required',
            'preparacion'=>'required',
            'ingredientes'=>'required',
            'imagen'=>'required|image'
        ]);
       

        //Ruta de la imagen a almacenar
        $url_img = $request['imagen']->store('upload-recetas', 'public');


        /**
         * resize de imagen con 
         * composer require intervention/image
         */
        $img = Image::make(public_path("storage/{$url_img}"))->fit(1000,550);
        $img->save();
        
        

      /*   DB::table('recetas')->insert([
            'titulo'=> $data['titulo'],
            'categoria_id'=>$data['categoria'] ,
            'preparacion'=>$data['preparacion'],
            'ingredientes'=>$data['ingredientes'],
            'user_id'=>Auth::user()->id,
            'imagen'=>$url_img

        ]);
        */
        /**
         * Almacenar en BD con modelos
         */
        auth()->user()->recetas()->create([
            'titulo'=> $data['titulo'],
            'categoria_id'=>$data['categoria'] ,
            'preparacion'=>$data['preparacion'],
            'ingredientes'=>$data['ingredientes'],
            'imagen'=>$url_img
        ]);


        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
        return view('recetas.show',compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
        $categorias = CategoriasRecetas::all(['id', 'categoria']);
        return view('recetas.edit', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
        $data = request()->validate([
            'titulo'=>'required|min:2',
            'categoria'=>'required',
            'preparacion'=>'required',
            'ingredientes'=>'required'
        ]);
        $receta->titulo = $data['titulo'];
        $receta->categoria_id = $data['categoria'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];
        

        if(request('imagen')){
             //Ruta de la imagen a almacenar
            $url_img = $request['imagen']->store('upload-recetas', 'public');


            /**
             * resize de imagen con 
             * composer require intervention/image
             */
            $img = Image::make(public_path("storage/{$url_img}"))->fit(1000,550);
            $img->save();

            $receta->imagen = $url_img;
        }

        $receta->save();

        return redirect()->action('RecetaController@index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
