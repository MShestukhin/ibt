    <?php
//'middleware' => ['auth:api']
Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('actions', 'ActionsController');
    Route::apiResource('actionParams', 'ActionParamController');
    Route::apiResource('actionBonuses', 'ActionBonusController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('companies', 'CompaniesController');
    Route::apiResource('employees', 'EmployeesController');
});
