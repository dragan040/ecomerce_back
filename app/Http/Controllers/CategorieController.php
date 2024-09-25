<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategorieController extends Controller{
    public function index()
    {
        try{
            $categories=Categorie::all();
            return response()->json($categories);
        }catch (\Exception $e){
            return response()->json('probleme dans la liste des categories');
        }
        
    }
public function store(Request $request)
{
$categorie = new Categorie([
'nomcategorie' => $request->input('nomcategorie'),
'imagecategorie' => $request->input('imagecategorie')
]);
$categorie->save();
return response()->json('Catégorie créée !');
}
public function show($id)
{
   try {
    $categorie = Categorie::findOrFail($id);
    return response()->json($categorie);
   } catch (\Exception $e) {
    return response()->json("probleme de recuperation des donnees ");

   }

}
public function update(Request $request, $id)
{
$categorie = Categorie::find($id);
$categorie->update($request->all());
return response()->json('Catégorie MAJ !');
}

public function destroy($id)
{
$categorie = Categorie::find($id);
$categorie->delete();
return response()->json('Catégorie supprimée !');
}
}