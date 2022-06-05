<?php
namespace App\Http\Controllers;
use App\Models\Societe;
use Illuminate\Http\Request;
class SocieteController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$societes = Societe::all()->toArray();
return array_reverse($societes);
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$societe = new Societe([
'nomsociete' => $request->input('nomsociete'),
'imagesociete' => $request->input('imagesociete')
]);
$societe->save();
return response()->json('Societé créée !');
}
/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$societe = Societe::find($id);
return response()->json($societe);
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
$societe = Societe::find($id);
$societe->update($request->all());
return response()->json('Societé MAJ !');
}
/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$societe = Societe::find($id);
$societe->delete();
return response()->json('Societé supprimée !');
}
}