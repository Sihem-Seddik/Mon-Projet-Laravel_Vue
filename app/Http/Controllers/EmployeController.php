<?php
namespace App\Http\Controllers;
use App\Models\Employe;
use Illuminate\Http\Request;
class EmployeController extends Controller
{
public function index()
{
$employes = Employe::with('societes','departements')->get()->toArray();
return array_reverse($employes);
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$employe = new Employe([
    'nom'=>$request->input('nom'),
    'prenom'=> $request->input('prenom'),
    'poste'=> $request->input('poste'),
    'age'=> $request->input('age'),
    'salaire'=> $request->input('salaire'),
    'image'=> $request->input('image'),
    'societeID'=> $request->input('societeID'),
    'departementID' => $request->input('departementID'),
]);
$employe->save();
return response()->json('Employe créé !');
}
/**
* Display the specified resource.
*
* @param \App\Models\Employe $employe
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$employe= Employe::find($id);
return response()->json($employe);
}
/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param \App\Models\Employe $employe
* @return \Illuminate\Http\Response
*/
public function update($id, Request $request)
{
$employe = Employe::find($id);
$employe->update($request->all());
return response()->json('Employe MAJ !');
}
/**
* Remove the specified resource from storage.
*
* @param \App\Models\Employe$employe
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$employe=Employe::find($id);
$employe->delete();
return response()->json('Employe supprimé !');
}
}