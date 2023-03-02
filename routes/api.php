<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OdooAeiController;
use App\Http\Controllers\LogisticsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, "login"])->name('api.login');
Route::post('loginldap', [AuthController::class, "loginLdap"]);

Route::get('tree_structures', [StructureController::class, "getTreeStructures"])->name('get.treestructures');
Route::put('structure', [StructureController::class, "updateStructure"])->name('update.structure');
Route::post('structure/delete', [StructureController::class, "deleteStructure"])->name('delete.structure');

Route::middleware('auth:sanctum')->group(function () {
    // Poles & Projects
    Route::get('poles', [AdminController::class, "getPoles"])->name('api.admin.get.poles');
    Route::get('projects', [AdminController::class, "getProjects"])->name('api.admin.get.projects');
    // Admin Systems
    Route::get('admin/systems', [AdminController::class, "getSystems"])->name('api.admin.get.system');
    Route::post('admin/system', [AdminController::class, "storeSystem"])->name('api.admin.store.system');
    Route::delete('admin/system/{id}', [AdminController::class, "destroySystem"])->name('api.admin.destroy.system');
    // Admin Roles
    Route::get('admin/roles', [AdminController::class, "getRoles"])->name('api.admin.get.roles');
    Route::post('admin/role', [AdminController::class, "storeRole"])->name('api.admin.store.role');
    Route::delete('admin/role/{id}', [AdminController::class, "destroyRole"])->name('api.admin.destroy.role');
    Route::get('admin/role/permissions/{id}', [AdminController::class, "getRolePermissions"])->name('api.admin.get.role_permissions');
    // Admin Permissions
    Route::get('admin/permissions', [AdminController::class, "getPermissions"])->name('api.admin.get.permissions');
    Route::post('admin/permission', [AdminController::class, "storePermission"])->name('api.admin.store.permission');
    Route::delete('admin/permission/{id}', [AdminController::class, "destroyPermission"])->name('api.admin.destroy.permission');
    Route::get('admin/permission/roles/{id}', [AdminController::class, "getPermissionRoles"])->name('api.admin.get.permission_roles');
    // Logistics Warehouses
    Route::get('logistics/warehouses', [AdminController::class, "getWarehouses"])->name('api.admin.get.warehouses');
    Route::post('logistics/warehouse', [AdminController::class, "storeWarehouse"])->name('api.admin.store.warehouse');
    Route::delete('logistics/warehouse/{id}', [AdminController::class, "destroyWarehouse"])->name('api.admin.destroy.warehouse');
    // Logistics
    Route::get('logistics/entries/{pole}/{project}/{reload?}', [LogisticsController::class, "getEntries"])->name('logistics.api.get.entries');
    Route::post('logistics/entry/data', [OdooAeiController::class, "getEntryData"])->name('app.api.odoo.get.entry');
    Route::post('logistics/entry', [LogisticsController::class, "storeEntry"])->name('logistics.api.store.entry');
    Route::post('logistics/entry/upload', [LogisticsController::class, 'attachEntryScanning'])->name('logistics.api.upload.entry');
    Route::post('logistics/entry/confirm', [LogisticsController::class, 'confirmEntry'])->name('logistics.api.cofirm.entry');
    Route::post('logistics/entry/cancel', [LogisticsController::class, 'cancelEntry'])->name('logistics.api.cancel.entry');
});

// PDF routes
Route::get('logistics/pdf/entry/{id}', [LogisticsController::class, "getEntryPDF"])->name('logistics.api.pdf.entry');