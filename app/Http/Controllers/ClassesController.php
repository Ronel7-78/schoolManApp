<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.ust be at least 8 characters long
     */
    public function index()
    {
        $classes= Classes::paginate(4);
        $admin = Auth::user();
       return view('Classes.homeClasse',compact('admin'),[
        'classes'=> $classes
       ]);
    }


    public function form (){
        $admin = Auth::user();
        return view('Classes.AddClasse',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Classes $classes,StoreClassesRequest $classRequest)
    {
        Classes::create([
            'codeCl' => $classRequest->get('codeCl'),
            'nomCl' => $classRequest->get('nomCl'),
        ]);

        return redirect(route('Classes.home'))->with('success', 'Classe create successfuly');
    }



    /**
     * Display the specified resource.
     */
    public function editA(Classes $classe) {

        $admin = Auth::user();
        return view('Classes.editClasse',compact('admin'),[
            'classe'=> $classe
           ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Classes $classes)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassesRequest $classRequest, Classes $classes)
    {
        $classes->codeCl = $classRequest->codeCl;
        $classes->nomCl = $classRequest->nomCl;

        $classes->save();

        return redirect(route('Classes.home'))->with('success','Class Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classe)
    {
        $classe->delete();

        return redirect(route('Classes.home'))->with('success','Puff !! Class delete successfuly');
    }
}
