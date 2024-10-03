<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartamentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return Inertia::render('Profile/Edit', [
            'user' => auth()->user()
        ]);
    })->name('profile.edit');
});
Route::get('/dashboardclient', function () {
    return view('dashboardclient'); // Cambia esto por la vista correspondiente
})->name('dashboardclient');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar el rol del usuario
        if ($user->hasRole('Administrador')) {
            return view('dashboard'); // Redirigir a la vista del Administrador
        } elseif ($user->hasRole('Cliente')) {
            return view('dashboardclient'); // Redirigir a la vista del Cliente
        }

        // Redirigir a una vista por defecto si no tiene un rol específico
        return redirect('/');
    })->name('dashboard');
});



// PARA LOS CLIENTES
Route::get('/Pantalones', function () {
    return view('pantalones');
});

Route::get('/Tenis', function () {
    return view('tenis');
}); 

Route::get('/Playeras', function () {
    return view('welcome');
});


// Para el Administrador
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas para los departaments
Route::get('/departaments', [DepartamentsController::class, 'index'])->name('departament.index');
Route::get('/departaments/create', [DepartamentsController::class, 'create'])->name('departament.create');
Route::post('/departaments', [DepartamentsController::class, 'store'])->name('departament.store');
Route::get('/departaments/{departaments}/edit', [DepartamentsController::class, 'edit'])->name('departament.edit');
Route::put('/departaments/{departaments}', [DepartamentsController::class, 'update'])->name('departament.update');
Route::delete('/departaments/{departaments}', [DepartamentsController::class, 'destroy'])->name('departament.destroy');
Route::put('/departaments/{departaments}/toggleStatus', [DepartamentsController::class, 'toggleStatus'])->name('departament.toggleStatus');


//Rutas para los trabajadores
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuarios}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{usuarios}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuarios}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuarios}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

//Rutas para los clientes
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{usuarios}', [ClientController::class, 'show'])->name('client.show');
Route::get('/client/{usuarios}/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::put('/client/{usuarios}', [ClientController::class, 'update'])->name('client.update');
Route::delete('/client/{usuarios}', [ClientController::class, 'destroy'])->name('client.destroy');

// Obtener trabajadores con rol 'Trabajador'
Route::get('/horarios', function () {
    $horarios = DB::table('horarios')->get();
    $trabajadores = User::role('Trabajador')->get();
    return view('gestion.horario', ['horarios' => $horarios, 'trabajadores' => $trabajadores]);
});

// Ruta para mostrar el formulario de edición
Route::get('/horarios', function () {
    $horarios = DB::table('horarios')->get();
    $trabajadores = User::role('Trabajador')->get();
    return view('gestion.horario', ['horarios' => $horarios, 'trabajadores' => $trabajadores]);
})->name('horarios');

// Ruta para procesar la edición
Route::put('/horarios/editar/{id}', function ($id, Request $request) {
    $data = $request->all();
    DB::table('horarios')
        ->where('id', $id)
        ->update([
            'trabajador_id' => $data['trabajador_id'],
            'dia' => $data['dia'],
            'hora_inicio' => $data['hora_inicio'],
            'hora_fin' => $data['hora_fin'],
            'updated_at' => now(),
        ]);
    return redirect('/horarios');
});

// Ruta para eliminar un horario
Route::delete('/horarios/eliminar/{id}', function ($id) {
    DB::table('horarios')->where('id', $id)->delete();
    return redirect('/horarios');
});

// Ruta para agregar un nuevo horario
Route::post('/horarios/agregar', function (Request $request) {
    $data = $request->all();
    DB::table('horarios')->insert([
        'trabajador_id' => $data['trabajador_id'],
        'dia' => $data['dia'],
        'hora_inicio' => $data['hora_inicio'],
        'hora_fin' => $data['hora_fin'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect('/horarios');
});

Route::get('/perfil', function () {
    return view('perfil'); // Asegúrate de que esta vista exista
})->middleware(['auth'])->name('perfil'); 


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');