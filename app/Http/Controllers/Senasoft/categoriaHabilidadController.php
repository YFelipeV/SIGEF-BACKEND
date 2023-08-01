<?php

namespace App\Http\Controllers\Senasoft;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProgramaFormacionCategoriaHabilidadController;
use App\Models\Aliado;
use App\Models\AliadoCategoriaHabilidad;
use App\Models\AliadopCategoriaHabilidad;
use App\Models\CategoriaHabilidad;
use App\Models\CategoriaHabilidadController as ModelsCategoriaHabilidadController;
use App\Models\Programa_formacion;
use App\Models\Programa_formacion_categoria_habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDO;

class categoriaHabilidadController extends Controller
{
    public function index()
    {

        $aliados = CategoriaHabilidad::all();

        return $this->estructuraApi->toResponse($aliados);
    }

    public function show($id)
    {

        $categoria = CategoriaHabilidad::find($id);

        if (!$categoria) {
            $this->estructuraApi->setResponse('ERROR', 'ERR001', 'error');
            return $this->estructuraApi->toResponse(null);
        }

        // Tu código para obtener los datos con la relación
        $programas = Programa_formacion_categoria_habilidad::with('ProgramaFormacion')->where('categoriahabilidades_id', '=', $categoria->id)->get();
        $aliado = AliadoCategoriaHabilidad::with('Aliado')->where('categoria_habilidad_id', '=', $categoria->id)->get();



        return $this->estructuraApi->toResponse([

            'categoria' => $categoria,
            'programas' => $programas,
            'aliados' => $aliado,

        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre'                    => 'required|string|unique:categoria_habilidad|max:150',
            'logotipo'                  => 'nullable',
            'descripcion'               => 'nullable|string',
            'documentos_lineamientos'   => 'required',
        ]);

        if ($validator->fails()) {

            $this->estructuraApi->setResponse('Error', 'ERR-001', $validator->errors());
            return $this->estructuraApi->toResponse(null);
        }
        $nombreLogotipo = null;

        if ($request->hasFile("logotipo")) {
            $logotipo = $request->file("logotipo");
            $nombreLogotipo = $logotipo->getClientOriginalName();
            $logotipo->move("images/categoria/logotipos/", $nombreLogotipo);
        }
        $documentoCategoria = null;
        if ($request->hasFile("documentos_lineamientos")) {
            $Categoriadocumentos = $request->file('documentos_lineamientos');
            if ($Categoriadocumentos) {
                $documentoCategoria = $Categoriadocumentos->hashName();
                $Categoriadocumentos->storeAs('senasoft/documento', $documentoCategoria, 'local');
            }
        }

        $categoriaHabilida = new CategoriaHabilidad();
        $categoriaHabilida->nombre = $request->nombre;
        $categoriaHabilida->logotipo = $nombreLogotipo;
        $categoriaHabilida->descripcion = $request->descripcion;
        $categoriaHabilida->documentos_lineamientos = $documentoCategoria;
        $categoriaHabilida->save();

        if ($request->aliado_id != 'null') {
            $programasFormacion = explode(",", $request->aliado_id);


            foreach ($programasFormacion as $aliado) {
                $aliadoCategoria = new AliadoCategoriaHabilidad();
                $aliadoCategoria->categoria_habilidad_id = $categoriaHabilida->id;
                $aliadoCategoria->aliado_id = $aliado;
                $aliadoCategoria->save();
            }
        }
        if ($request->programaformaciones_id != 'null') {
            $programasFormacion = explode(",", $request->programaformaciones_id);


            foreach ($programasFormacion as $aliado) {
                $programa = new  Programa_formacion_categoria_habilidad();
                $programa->categoriahabilidades_id = $categoriaHabilida->id;
                $programa->programaformaciones_id = $aliado;
                $programa->save();
            }
        }
        $this->estructuraApi->setResponse('success', 'SUC-001', 'categoria registrada');
        return $this->estructuraApi->toResponse(null);
    }
}
