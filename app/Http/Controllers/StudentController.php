<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Classes;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; // Importer le bon Facade
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function homeStudent() {
        // Récupérer l'admin connecté
        $admin = Auth::user(); // Assurez-vous que l'utilisateur est authentifié

        // Passer l'admin à la vue
        return view('Students.indexStudent', compact('admin'));
    }

    public function formAddS(){

        $admin =Auth::user();
        $classes =Classes::all();

        return view('Students.formAdds', compact('admin','classes'));

    }

    //fonction to add new student
    public function addStudent(Student $student,CreateStudentRequest $requet){

        $numero= str_pad(rand(1, 999) ,3 ,'O',STR_PAD_LEFT);
        $codeCl = $requet->input('codeCl');
        $annee = Carbon::now()->format('y');
        $matricule = $numero . $codeCl . $annee;

            $student->matricule = $matricule;
            $student->nomEl = $requet->nomEl;
            $student->prenomEl = $requet->prenomEl;
            $student->dateNais = $requet->dateNais;
            $student->lieuNais = $requet->lieuNais;
            $student->codeCl = $requet->codeCl;
            $student->contactP = $requet->contactP;
            $student->newOld = $requet->newOld;
            $student->montantVerse = $requet->montantVerse;
            $student->resteV = $requet->resteV;
            $student->datePay = $requet->datePay;

            // Gestion de la photo
            if ($requet->hasFile('photoEl')) {
                $path = $requet->file('photoEl')->store('Photos', 'public'); // Stockage dans le dossier 'Photos'
                $student->photoEl = $path;
            }

            $student->save();
        return redirect(route('Student.home'))->with('success','Student create successfully');
    }
}
