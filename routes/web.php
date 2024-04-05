<?php
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;


Route::get("/",[CrudController::class, "index"])->name("crud.index");

//ruta para añadir un nuevo producto
Route::post("/registar-producto",[CrudController::class, "create"])->name("crud.create");

//ruta para modificar un producto
Route::post("/modificar-producto",[CrudController::class, "update"])->name("crud.update");

//ruta para borrar un  producto
Route::get("/eliminar-producto{id}",[CrudController::class, "delete"])->name("crud.delete");