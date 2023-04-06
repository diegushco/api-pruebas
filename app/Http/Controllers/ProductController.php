<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
      
        return [
            "status" => true,
            "data" => $products
        ];
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
  
    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'code'=> 'required',
            'name'=> 'required',
            'description'=> 'required',
        ]);
        
        if($validation->fails()){
            return json_decode($validation->errors());
        }else{
            $product = Product::create($request->all());
            return [
                "status" => true,
                "data" => $product
            ];
        }
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return [
            "status" => true,
            "data" => $product
        ];
    }
  
    
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            'code'=> 'required',
            'name'=> 'required',
            'description'=> 'required',
        ]);
        
        if($validation->fails()){
            return json_decode($validation->errors());
        }else{
            $product = Product::find($id);
            if($product){
                $product->update($request->all());
                $product->save();
                return [
                    "status" => true,
                    "data" => $product
                ];
            }else{                
                return [
                    "status" => false,
                    "msg" => "no found" 
                ];
            }
            
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $removed = Product::destroy($id);
            return [
                "status" => true,
                "data" => $removed,
                "msg" => "Product removed successfully"
            ];
        }else{
            return [
                "status" => false,
                "msg" => "no found" 
            ];
        }
        
    }




    public function dataPruebaCheckbox()
    {
        $json = '
        [
            {
            "userId":    "001",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Rodrigo",
            "type":     3,
            "subtype":  "Sub2",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
            
            },
            {
            "userId":    "002",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Alberto",
            "type":     2,
            "subtype":  "Sub2",
            "state":    "State 2",
            "date": "11/02/2011",
            "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "003",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Luis",
            "type":     6,
            "subtype":  "Sub9",
            "state":    "State 1",
            "date": "22/12/1974",
            "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "004",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Carlos",
            "type":     16,
            "subtype":  "Sub7",
            "state":    "State 7",
            "date": "11/12/1974",
            "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "005",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Alfredo",
            "type":     18,
            "subtype":  "Sub5",
            "state":    "State 2",
            "date": "11/12/1974",
            "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "006",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Raul",
            "type":     14,
            "subtype":  "Sub5",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "007",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Rodrigo",
            "type":     3,
            "subtype":  "Sub2",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "008",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Alberto",
            "type":     2,
            "subtype":  "Sub2",
            "state":    "State 2",
            "date": "11/12/1974",
            "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "009",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Luis",
            "type":     6,
            "subtype":  "Sub9",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "010",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Carlos",
            "type":     16,
            "subtype":  "Sub7",
            "state":    "State 7",
            "date": "11/12/1974",
            "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "011",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Alfredo",
            "type":     18,
            "subtype":  "Sub5",
            "state":    "State 2",
            "date": "11/12/1974",
            "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "012",
            "nameRadio": "radio",
            "select":    false,
            "name":     "Raul",
            "type":     14,
            "subtype":  "Sub5",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
            },
            
            {
            "userId":    "013",
            "select":    false,
            "name":     "Rodrigo",
            "type":     "Type 3",
            "subtype":  "Subtype 2",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "014",
            "select":    false,
            "name":     "Alberto",
            "type":     "Type 2",
            "subtype":  "Subtype 2",
            "state":    "State 2",
            "date": "11/12/1974",
            "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "015",
            "select":    false,
            "name":     "Luis",
            "type":     "Type 6",
            "subtype":  "Subtype 9",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "016",
            "select":    false,
            "name":     "Carlos",
            "type":     "Type 16",
            "subtype":  "Subtype 7",
            "state":    "State 7",
            "date": "11/12/1974",
            "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "017",
            "select":    false,
            "name":     "Alfredo",
            "type":     "Type 18",
            "subtype":  "Subtype 5",
            "state":    "State 2",
            "date": "11/12/1974",
            "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "018",
            "select":    false,
            "name":     "Raul",
            "type":     "Type 14",
            "subtype":  "Subtype 5",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "019",
            "select":    false,
            "name":     "Rodrigo",
            "type":     "Type 3",
            "subtype":  "Subtype 2",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "020",
            "select":    false,
            "name":     "Alberto",
            "type":     "Type 2",
            "subtype":  "Subtype 2",
            "state":    "State 2",
            "date": "11/12/1974",
            "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "021",
            "select":    false,
            "name":     "Luis",
            "type":     "Type 6",
            "subtype":  "Subtype 9",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "022",
            "select":    false,
            "name":     "Carlos",
            "type":     "Type 16",
            "subtype":  "Subtype 7",
            "state":    "State 7",
            "date": "11/12/1974",
            "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "023",
            "select":    false,
            "name":     "Alfredo",
            "type":     "Type 18",
            "subtype":  "Subtype 5",
            "state":    "State 2",
            "date": "11/12/1974",
            "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
            },
            {
            "userId":    "024",
            "select":    false,
            "name":     "Raul",
            "type":     "Type 14",
            "subtype":  "Subtype 5",
            "state":    "State 1",
            "date": "11/12/1974",
            "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
            }
            ]
        ';
      
        $data = json_decode($json, true);

        return $data;
    }



    public function dataPaginacion()
    {
        $json = '
        {"datos":[
            {
        "userId":    "101",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "102",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "103",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "104",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "105",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "106",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "107",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "108",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "109",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "110",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "111",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "112",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "113",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "114",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "115",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "116",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "117",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "118",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "119",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "120",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "121",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "122",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "123",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "124",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "125",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "126",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "127",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "128",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "129",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "130",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "1",
                "tamanoPagina": "30",
                "totalRegistros": "",
                "hayMas": true
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }

    public function dataPaginacion2()
    {
        $json = '
        {"datos":[
            {
        "userId":    "201",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "202",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "203",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "204",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "205",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "206",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "207",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "208",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "209",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "210",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "211",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "212",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "213",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "214",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "215",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "216",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "217",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "218",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "219",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "220",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "221",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "222",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "223",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "224",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "225",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "226",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "227",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "228",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "229",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "230",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "2",
                "tamanoPagina": "30",
                "totalRegistros": "",
                "hayMas": true
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }
    
    public function dataPaginacion3()
    {
        $json = '
        {"datos":[
            {
        "userId":    "301",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "302",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "303",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "304",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "305",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "306",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "307",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "308",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "309",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "310",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "311",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "312",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "313",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "314",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "315",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "316",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "317",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "318",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "319",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "320",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "321",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "322",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "323",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "324",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "325",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "326",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "327",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "328",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "329",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "330",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "3",
                "tamanoPagina": "30",
                "totalRegistros": "",
                "hayMas": true
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }

    public function dataPaginacion4()
    {
        $json = '
        {"datos":[
            {
        "userId":    "401",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "402",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "403",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "404",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "405",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "406",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "407",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "408",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "409",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "410",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "411",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "412",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "413",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "414",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "415",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "416",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "417",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "418",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "419",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "420",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "421",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "422",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "423",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "424",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "425",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "426",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "427",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "428",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "429",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "430",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "4",
                "tamanoPagina": "30",
                "totalRegistros": "",
                "hayMas": true
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }

    public function dataPaginacion5()
    {
        $json = '
        {"datos":[
            {
        "userId":    "501",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "502",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "503",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "504",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "505",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "506",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "507",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "508",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "509",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "510",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "511",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "512",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "513",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "514",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "515",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "516",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "517",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "518",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "519",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "520",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "521",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "522",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "523",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "524",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "525",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "526",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "527",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "528",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "529",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "530",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "5",
                "tamanoPagina": "30",
                "totalRegistros": "",
                "hayMas": false
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }

    public function dataPaginacionCompleta1()
    {
        $json = '
        {"datos":[
            {
        "userId":    "101",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "102",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "103",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "104",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "105",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "106",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "107",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "108",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "109",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "110",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "111",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "112",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "113",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "114",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "115",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "116",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "117",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "118",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "119",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "120",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "121",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "122",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "123",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "124",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "125",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "126",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "127",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "128",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "129",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "130",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "1",
                "tamanoPagina": "30",
                "totalRegistros": "116",
                "hayMas": true
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }
    public function dataPaginacionCompleta2()
    {
        $json = '
        {"datos":[
            {
        "userId":    "201",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "202",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "203",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "204",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "205",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "206",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "207",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "208",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "209",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "210",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "211",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "212",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "213",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "214",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "215",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "216",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "217",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "218",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "219",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "220",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "221",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "222",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "223",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "224",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "225",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "226",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "227",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "228",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "229",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "230",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "2",
                "tamanoPagina": "30",
                "totalRegistros": "116",
                "hayMas": true
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }
    public function dataPaginacionCompleta3()
    {
        $json = '
        {"datos":[
            {
        "userId":    "301",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "302",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "303",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "304",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "305",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "306",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "307",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "308",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "309",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "310",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "311",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "312",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "313",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "314",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "315",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "316",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "317",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "318",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "319",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "320",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "321",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "322",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "323",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "324",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "325",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "326",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "327",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "328",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "329",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "330",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "3",
                "tamanoPagina": "30",
                "totalRegistros": "116",
                "hayMas": true
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }
    public function dataPaginacionCompleta4()
    {
        $json = '
        {"datos":[
            {
        "userId":    "401",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "402",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "403",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "404",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "405",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "406",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "407",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "408",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "409",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "410",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "411",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "412",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        
        {
        "userId":    "413",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "414",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "415",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "416",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "417",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "418",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "419",
        "select":    false,
        "name":     "Rodrigo",
        "type":     "Type 3",
        "subtype":  "Subtype 2",
        "state":    "State 1",
        "address": "Calle Vergara, 5, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "420",
        "select":    false,
        "name":     "Alberto",
        "type":     "Type 2",
        "subtype":  "Subtype 2",
        "state":    "State 2",
        "address": "Calle Bravo Murillo, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "421",
        "select":    false,
        "name":     "Luis",
        "type":     "Type 6",
        "subtype":  "Subtype 9",
        "state":    "State 1",
        "address": "Calle Perez, 3, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "422",
        "select":    false,
        "name":     "Carlos",
        "type":     "Type 16",
        "subtype":  "Subtype 7",
        "state":    "State 7",
        "address": "Calle Primavera, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "423",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "424",
        "select":    false,
        "name":     "Raul",
        "type":     "Type 14",
        "subtype":  "Subtype 5",
        "state":    "State 1",
        "address": "Calle Gran Vía, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "425",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        },
        {
        "userId":    "426",
        "select":    false,
        "name":     "Alfredo",
        "type":     "Type 18",
        "subtype":  "Subtype 5",
        "state":    "State 2",
        "address": "Calle Primavera de Praga, 4, Madrid, Madrid, 28020, España"
        }
            ],
            "metadatos": {
                "numeroPagina": "4",
                "tamanoPagina": "30",
                "totalRegistros": "116",
                "hayMas": false
            }
        
        }
        ';
      
        $data = json_decode($json, true);

        return $data;
    }
   
}