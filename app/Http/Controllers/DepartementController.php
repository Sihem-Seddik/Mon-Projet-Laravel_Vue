<?php
namespace App\Http\Controllers;
use App\Models\Departement;
use Illuminate\Http\Request;
class DepartementController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$departements = Departement::with('societes')->get()->toArray();
return array_reverse($departements);
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$departement = new Departement([
'nomdepartement' => $request->input('nomdepartement'),
'imagedep' => $request->input('imagedep'),
'societeID' => $request->input('societeID'),
]);
$departement->save();
return response()->json('Departement créée !');
}
/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$departement = Departement::find($id);
return response()->json($departement);
}
/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$departement = Departement::find($id);
$departement->update($request->all());
return response()->json('Departement MAJ !');
}
/**
* Remove the specified resource from storage.
*
* @param \App\Models\Departement $departement
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$departement = Departement::find($id);
$departement->delete();
return response()->json('departement supprimée !');
}
/**
* Show specified resource.
*
* @param \App\Models\Departement $idsoci
* @return \Illuminate\Http\Response
*/
public function showDepartementBySoci($idsoci)
{
 $Departement= Departement::where('societeID', $idsoci)->with('societes')->get()->toArray();
return response()->json($Departement);
}
}