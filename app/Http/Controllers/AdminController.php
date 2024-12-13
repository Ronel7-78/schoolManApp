<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\EditProfileAdminRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    // pour la page d'accueil
   public function index(){
    $admin = Auth::user();
    return view('Accueil' ,compact('admin'));

   }

//    pour l'inscription de l'admin(creation du fichier0) methode get
   public function registerAdmin(){

    return view('Admin.Register');

   }

   public function handleRegistration(User $admin,CreateAdminRequest $requestAdmin) {

    // Créer un nouvel utilisateur

    $admin->name = $requestAdmin->nom;
    $admin->prenom = $requestAdmin->prenom;
    $admin->email = $requestAdmin->email;
    $admin->telephone = $requestAdmin->telephone;
    $admin->password = Hash::make($requestAdmin->password);

    // Gestion de la photo
    if ($requestAdmin->hasFile('photo')) {
        $path = $requestAdmin->file('photo')->store('Photos', 'public'); // Stockage dans le dossier 'Photos'
        $admin->photo = $path;
    }

    // Sauvegarder l'utilisateur dans la base de données
    $admin->save();

    // Redirection avec message de succès
    return redirect()->route('home')->with('success', 'You can log in now !');
}

// Connexion avec la methode get
    public function login(){
        return view('Admin.login');
    }


    // connexion avec post
    public function handleLogin(Request $loginRequest){
       $credentials = $loginRequest->validate([
        'email' => ['required' , 'email'],
        'password' => ['required'],
       ]);

       if(Auth::attempt($credentials)){
        // creation de la session de l'administrateur
            $loginRequest->session()->regenerate();

            // retourne sur la page d'accueil de l'admin connecté avec bien évidement un message
            return redirect()->intended(route('AccueilAdminstrateur'))->with('success', 'Welcome, you are connected ');
       }else{
             // aucun élément trouvé
             return redirect()->back()->with('error', 'Email or password incorrect, please try again');
       }

    }

    // afficher les infos de l'admin
    public function showAdmin(User $admin){
        return view('Admin.showAdProfile', ['admin' => $admin]);
    }


    // page accueil admin connecté
    public function homeAdmin() {
        $admin = Auth::user();
        return view('Admin.HomeAdd', compact('admin'));
    }

    // fonctin de deconnexion de l'admin
    public function logoutAdmin(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/connexion');
    }

    // Editer le profile de l'admin avec le get
    public function editAdmin(User $admin){
        return view('Admin.EditProfile',['admin'=>$admin]);
    }

    // le put de la precedent
    public function updateAdmin(User $admin, EditProfileAdminRequest $adminRequest){
         // Mise à jour des informations de l'admin
         $admin->name = $adminRequest->nom;
         $admin->prenom = $adminRequest->prenom;
         $admin->email = $adminRequest->email;
         $admin->telephone = $adminRequest->telephone;

         if ($adminRequest->filled('password') ) {
             if (Hash::check($adminRequest->current_password, $admin->password)) {
                 $admin->password = Hash::make($adminRequest->password);
             } else {
                 return redirect()->back()->with(['current_password' => 'The confirmation of current password do not match !! ']);
             }
         }

         $admin->save();

         return redirect()->route('Admin.shwAc', ['admin' => $admin->id])->with('success', 'Profil updated successfully !');

    }

    public function homeStudent(){
        $admin= Auth::user();
        return view('Students.indexStudent',compact('admin'));
    }

}
