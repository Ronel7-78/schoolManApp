<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Classes;
use App\Models\Student;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
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


        $codeCl = $requet->input('codeCl');
        $studentCount = Student::where('codeCl', $codeCl)->count();
        $numero = str_pad($studentCount + 1, 3, '0', STR_PAD_LEFT);
        $annee = Carbon::now()->format('y');

        // Compter le nombre d'élèves dans la classe

        $matricule = $numero . $codeCl . $annee;

             // Récupérer la classe pour obtenir le montant dû
             $classe = Classes::where('codeCl', $codeCl)->first();
             $montantDue = $classe->montantDue;

            $student->matricule = $matricule;
            $student->nomEl = $requet->nomEl;
            $student->prenomEl = $requet->prenomEl;
            $student->dateNais = $requet->dateNais;
            $student->lieuNais = $requet->lieuNais;
            $student->gender = $requet->gender;
            $student->codeCl = $requet->codeCl;
            $student->contactP = $requet->contactP;
            $student->newOld = $requet->newOld;

            // Assurez-vous que les valeurs sont correctement récupérées
            $student->montantDue = $montantDue;
            $student->montantVerse = $requet->montantVerse;
            $student->resteV = $montantDue - $student->montantVerse;

            $student->datePay = Carbon::now();
            // Gestion de la photo
            //if ($requet->hasFile('photoE')) {
             //   $path = $requet->file('photoE')->store('Photos', 'public'); // Stockage dans le dossier 'Photos'
                //$student->photoE = $path;


            //}

            $student->save();
        return redirect(route('Student.show',['id'=>$student->id]))->with('success','Student create successfully');
    }

    //afficher les eleves par classe
    public function showStudentsByClass($codeCl){

        $admin =Auth::user();


        $classe = Classes::where('codeCl',$codeCl)->first();

        if(!$classe){
            return redirect()->back()->with('Error', 'Class not fund');
        }

        $students = Student::where('codeCl', $codeCl)->paginate(15);
        return view('Students.listCl', compact('admin','classe', 'students'));
    }

    //afficher de manière individuelle chaque eleve
    public function showStudent($id){

        $admin = Auth::user();
        $classe = Classes::all();
        $students = Student::find($id);
        if (!$students) {
            return redirect()->back()->with('error', 'Student not found.');
         }

        return view('Students.showMore', compact('admin','classe','students'));
    }

    public function printStudent($id) {
        $admin = Auth::user();
        $classe = Classes::all();

        $students = Student::find($id);
        if (!$students) {
            return redirect()->back()->with('error', 'Student not found.');
         } // Générer le PDF en utilisant une vue Blade

         $pdf = PDF::loadView('Students.printStudent', compact('admin','classe','students'));
         // Télécharger le fichier PDF 

         return $pdf->download( $students->nomEl . '.pdf');
        }
}
