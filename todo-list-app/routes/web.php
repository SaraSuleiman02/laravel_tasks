    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\TaskController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\TagController;


    Route::get('/', function () {
        return view('welcome2');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::patch('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/test', function () {
        return view('dashboard.layouts.app');
    });

    Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('/dashboard/tasks', [TaskController::class, 'index'])->name('dashboard.task');
    Route::get('/dashboard/tags', [TagController::class, 'index'])->name('dashboard.tag');
    Route::resource('users', UserController::class);
    Route::resource('tags', TagController::class);


    require __DIR__ . '/auth.php';