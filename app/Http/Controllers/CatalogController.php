<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{

	public function getIndex(){
		$movies = Movie::all();
		return view('catalog.index', array('peliculas'=>$movies));
	}
	public function getShow($id){
		$movie = Movie::findOrFail($id);
		return view('catalog.show', array('pelicula'=>$movie));
	}
	public function getCreate(){
		return view('catalog.create');
	}
	public function getEdit($id){
		$movie = Movie::findOrFail($id);
		return view('catalog.edit', array('pelicula'=>$movie));
	}
	public function postCreate(Request $request){
		$p = new Movie;
		$p->title = $request->title;
    	$p->year = $request->year;
    	$p->director = $request->director;
    	$p->poster = $request->poster;
    	$p->rented = false;
    	$p->synopsis = $request->synopsis;
    	$p->save();
    	return redirect('catalog');
	}
	public function putEdit(Request $request, $id){
		$p = Movie::findOrFail($id);
		$p->title = $request->title;
    	$p->year = $request->year;
    	$p->director = $request->director;
    	$p->poster = $request->poster;
    	$p->synopsis = $request->synopsis;
    	$p->save();
    	return redirect('catalog/show/'.$id);
	}
}
