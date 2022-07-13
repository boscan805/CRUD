<?php

namespace App\Http\Controllers;
use App\Bicicletas;
use App\Imgbicicletas;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\User;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Http;


class BicicletasController extends Controller
{

    public function index()
    {
         $url = "https://fakestoreapi.com/products";
        $curl = curl_init($url);

         
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('User-Agent: php-curl'));
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($curl);
        
        $info = curl_getinfo($curl);
        $products = [];
        if ($info['http_code'] == 200) {
          //dd(json_decode($response));
            $products = json_decode($response);
           //print_r($info);
        } else {
        }
        curl_close($curl);

   

 $bicicletas = Bicicletas::select('id', 'nombre', 'precio', 'stock', 'imagenes', 'url')->with('imagenesbicicletas:nombre')->get();

        return view('admin.bicicletas.index', compact('products')); 
    }

    public function crear()
    {


        $bicicletas = Bicicletas::all();
        return view('admin.bicicletas.crear', compact('bicicletas'));
    }

    public function store(ItemCreateRequest $request)

    { 
        $curlUrl = "https://fakestoreapi.com/products'";

        $datos = array("title" => "test product",  "price" => 13.5, "description" => "lorem ipsum dolor", "image" => "https://i.pravatar.cc", "category" => "electroni");
        
        $data_string = json_encode($datos);
        
        $ch=curl_init($curlUrl);
        
        curl_setopt($ch, CURLOPT_POST, true);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
        
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        
                     
        $respuesta = curl_exec( $ch );
        
        
        curl_close($ch);
        
        //echo $respuesta;



        $bicicletas= new Bicicletas;
        $bicicletas->nombre = $request->nombre;
        $bicicletas->precio = $request->precio;
        $bicicletas->stock = $request->stock;
        $bicicletas->imagenes = date('dmyHi');
        $bicicletas->url = Str::slug($request->nombre, '-');  

        $bicicletas->save();

        $ci = $request->file('img');

        $this->validate($request, [

            'nombre' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);        

      
        foreach($request->file('img') as $image)
            {
                $imagen = $image->getClientOriginalName();
                $formato = $image->getClientOriginalExtension();
                $image->move(public_path().'/uploads/', $imagen);

                
                DB::table('img_bicicletas')->insert(
				    [
				    	'nombre' => $imagen, 
				    	'formato' => $formato,
				    	'bicicletas_id' => $bicicletas->id,
				    	'created_at' => date("Y-m-d H:i:s"),
				    	'updated_at' => date("Y-m-d H:i:s")
				    ]
				);

            }         

        
        return redirect('admin/bicicletas')->with('message','Guardado Satisfactoriamente !');
    }

   
    public function show($id)
    {
       
    }

   
    public function actualizar($id)
    {
        $bicicletas = Bicicletas::find($id);

        $imagenes = Bicicletas::find($id)->imagenesbicicletas;

        return view('admin/bicicletas.actualizar', compact('imagenes'), ['bicicletas' => $bicicletas]);
    }

  
    public function update(ItemUpdateRequest $request, $id)
    {        
        $bicicletas= Bicicletas::find($id);
        $bicicletas->nombre = $request->nombre;
        $bicicletas->precio = $request->precio;
        $bicicletas->stock = $request->stock;
        
        $bicicletas->save();

        $ci = $request->file('img');

        
        if(!empty($ci)){

            $this->validate($request, [

                'nombre' => 'required',
                'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);        

            foreach($request->file('img') as $image)
                {
                    $imagen = $image->getClientOriginalName();
                    $formato = $image->getClientOriginalExtension();
                    $image->move(public_path().'/uploads/', $imagen);

                    DB::table('img_bicicletas')->insert(
                        [
                            'nombre' => $imagen, 
                            'formato' => $formato,
                            'bicicletas_id' => $bicicletas->id,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ]
                    );

                } 

        }

        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/bicicletas');
    }

    public function eliminar($id)
    {
        $bicicletas = Bicicletas::find($id);

        
        $imagen = DB::table('img_bicicletas')->where('bicicletas_id', '=', $id)->get();        
        $imgfrm = $imagen->implode('nombre', ',');  
       dd($imgfrm);        

        $imagenes = explode(",", $imgfrm);
        
        foreach($imagenes as $image){
            
            $dirimgs = public_path().'/uploads/'.$image;
            
            if(File::exists($dirimgs)) {
                File::delete($dirimgs);                
            }

        }    

        
        Bicicletas::destroy($id); 

        $bicicletas->imagenesbicicletas()->delete();

        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/bicicletas');
    }

    public function eliminarimagen($id, $bid)
    {
        $bicicletas = Imgbicicletas::find($id);

        $bi = $bid;

        $imagen = Imgbicicletas::select('nombre')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ', ');
       dd($imgfrm);
        Storage::delete($imgfrm);

        Imgbicicletas::destroy($id);

        Session::flash('message', 'Imagen Eliminada Satisfactoriamente !');
        return Redirect::to('admin/bicicletas/actualizar/'.$bi.'');
    }

    public function detallesproducto($id)
    {
        $bicicletas = Bicicletas::where('id','=', $id)->firstOrFail();

        $imagenes = Bicicletas::find($id)->imagenesbicicletas;

        return view('admin/bicicletas.detallesproducto', compact('bicicletas', 'imagenes'));
    }
}
