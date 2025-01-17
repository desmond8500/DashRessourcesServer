<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class RessourceController extends Controller
{

    /**
    * @OA\Get(
    *      path="/api/v1/ressources",
    *      tags={"Ressources"},
    *      summary="Ressouces list",
    *      description="Description",
    *      @OA\Response(
    *          response=200,
    *          description="Récupérer la liste des ressources",
    *       ),
    *     )
    */
    public function index()
    {
        return Ressource::all();
    }

    /**
     * @OA\Post(
     *      path="/api/v1/ressources",
     *      tags={"Ressources"},
     *      summary="Ajouter une ressource",
     *
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                  @OA\Property(property="name", type="string"),
     *                  @OA\Property(property="description", type="string"),
     *                  @OA\Property(property="logo", type="string"),
     *                  @OA\Property(property="lien", type="string"),
     *                  required={"name", "lien"}
     *             ),
     *         )
     *      ),
     *      @OA\Response(response=200, description="Utilisateurs récupérés avec succès"),
     *      @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(Request $request)
    {

        $validated = ResponseController::validation($request,
            [
                'name' => 'required',
                'lien' => 'required',
            ],
        );
        if ($validated) {
            return $validated;
        }

        Ressource::create($request->all());

        return response()->json(['message' => 'Ressource created'], 201);

    }

    /**
     * @OA\Get(
     *      path="/api/v1/ressources/{id}",
     *      tags={"Ressources",},
     *      summary="Rescupérer une ressource",
     *      @OA\Parameter(
     *          description="Parameter with example",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="integer"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Utilisateurs récupérés avec succès",
     *       ),
     *     )
     */
    public function show($id)
    {
        $ressource = Ressource::find($id);
        if ($ressource) {
            return $ressource;
        } else {
            return ResponseController::response(false, 'Ressource not found');
        }
    }

    /**
     * @OA\Put(
     *      path="/api/v1/ressources/{id}",
     *      tags={"Ressources"},
     *      summary="Editer une ressource",
     *      description="Description",
     *      @OA\Parameter(
     *          description="Parameter with example",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="integer"),
     *      ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                  @OA\Property(property="name", type="string"),
     *                  @OA\Property(property="description", type="string"),
     *                  @OA\Property(property="logo", type="string"),
     *                  @OA\Property(property="lien", type="string"),
     *                  required={"name", "lien"}
     *             )
     *         )
     *      ),
     *      @OA\Response(response=200, description="Utilisateurs récupérés avec succès"),
     *      @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function update($id,Request $request)
    {
        $ressource = Ressource::find($id);
        // return $id;
        return $request->all();
        if ($ressource) {
            $ressource->update($request->all());
            return ResponseController::response(true, 'Ressource updated');
        } else {
            return ResponseController::response(false, 'Ressource not found');
        }
    }

    /**
    * @OA\Delete(
    *      path="/api/v1/ressources/{id}",
    *      tags={"Ressources"},
    *      summary="Summary",
    *      description="Description",
    *      @OA\Parameter(
    *          description="Parameter with example",
    *          in="path",
    *          name="id",
    *          required=true,
    *          @OA\Schema(type="integer"),
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Response Message",
    *       ),
    *     )
    */
    public function destroy($id)
    {
        $ressource = Ressource::find($id);
        if ($ressource) {
            $ressource->delete();
            return ResponseController::response(true, 'Ressource deleted');
        } else {
            return ResponseController::response(false, 'Ressource not found');
        }
    }
}
