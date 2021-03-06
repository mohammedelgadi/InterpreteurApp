<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get(
    '/',
    ['middleware'=>'auth',
        'uses'=>function () {
        return view('welcome');
    }]);




//Interpreteur Routes

Route::get(
    'interpreteur/add',
    ['middleware'=>'auth','uses' =>'InterpreteurController@show']
);
Route::post(
    'interpreteur/add',
    ['middleware'=>'auth','uses'=>'InterpreteurController@store']
);
Route::get(
    'interpreteur/list',
    ['middleware'=>'auth','uses'=>'InterpreteurController@showInterpreteurs']
);
Route::any(
    'interpreteur/query',
    ['middleware'=>'auth','uses'=>'InterpreteurController@queryInterpreteurs']
);
Route::any(
    'interpreteur/archive/query',
    ['middleware'=>'auth','uses'=>'InterpreteurController@queryArchiveInterpreteurs']
);
Route::any(
    'interpreteur/query1',
    ['middleware'=>'auth','uses'=>'InterpreteurController@query1Interpreteurs']
);
Route::any(
    'interpreteur/query2',
    ['middleware'=>'auth','uses'=>'InterpreteurController@query2Interpreteurs']
);
Route::get(
    'interpreteur/archive',
    ['middleware'=>'auth','uses'=>'InterpreteurController@archiveInterpreteurs']
);
Route::get(
    'interpreteur/infos',
    ['middleware'=>'auth','uses'=>'InterpreteurController@showInterpreteur']
);
Route::post(
    'interpreteur/update',
    ['middleware'=>'auth','uses'=>'InterpreteurController@updateInterpreteur']
);
Route::post(
    'interpreteur/delete',
    ['middleware'=>'auth','uses'=>'InterpreteurController@deleteInterpreteur']
);
Route::post(
    'interpreteur/restore',
    ['middleware'=>'auth','uses'=>'InterpreteurController@restoreInterpreteur']
);
Route::get(
    'interpreteur/profile',
    ['middleware'=>'auth','uses'=>'InterpreteurController@showProfileInterpreteur']
);
Route::get(
    'interpreteur/profile/archive',
    ['middleware'=>'auth','uses'=>'InterpreteurController@showArchiveProfileInterpreteur']
);

Route::get(
    'interpreteur/cv',
    ['middleware'=>'auth','uses'=>'InterpreteurController@getCv']
);
Route::get(
    'interpreteur/cv/anonyme',
    ['middleware'=>'auth','uses'=>'InterpreteurController@getCvAnonyme']
);





//Client Routes

Route::get(
    'client/add',
    ['middleware'=>'auth','uses'=>'ClientController@show']
);
Route::post(
    'client/add',
    ['middleware'=>'auth','uses'=>'ClientController@store']
);
Route::get(
    'client/list',
    ['middleware'=>'auth','uses'=>'ClientController@showClients']
);
Route::any(
    'client/query',
    ['middleware'=>'auth','uses'=>'ClientController@queryClients']
);
Route::any(
    'client/archive/query',
    ['middleware'=>'auth','uses'=>'ClientController@queryArchiveClients']
);
Route::get(
    'client/archive',
    ['middleware'=>'auth','uses'=>'ClientController@archiveClients']
);
Route::post(
    'client/update',
    ['middleware'=>'auth','uses'=>'ClientController@updateClient']
);
Route::post(
    'client/delete',
    ['middleware'=>'auth','uses'=>'ClientController@deleteClient']
);
Route::post(
    'client/restore',
    ['middleware'=>'auth','uses'=>'ClientController@restoreClient']
);
Route::get(
    'client/profile',
    ['middleware'=>'auth','uses'=>'ClientController@profileClient']
);
Route::get(
    'client/infos',
    ['middleware'=>'auth','uses'=>'ClientController@showClient']
);
Route::get(
    'client/profile/archive',
    ['middleware'=>'auth','uses'=>'ClientController@profileArchiveClient']
);
Route::get(
    'client/profile/statistiques',
    ['middleware'=>'auth','uses'=>'ClientController@profileStatsClient']
);




//Demande Routes

Route::get(
    'demande/add',
    ['middleware'=>'auth','uses'=>'DemandeController@show']
);
Route::post(
    'demande/add',
    ['middleware'=>'auth','uses'=>'DemandeController@store']
);
Route::post(
    'demande/list',
    ['middleware'=>'auth','uses'=>'DemandeController@showList']
);
Route::get(
    'demande/list',
    ['middleware'=>'auth','uses'=>'DemandeController@showList']
);
Route::any(
    'demande/archive/query',
    ['middleware'=>'auth','uses'=>'DemandeController@queryArchiveDemandes']
);
Route::get(
    '/calendar',
    ['middleware'=>'auth','uses'=>'DemandeController@showCalendar']
);
Route::get(
    '/demande/update',
    ['middleware'=>'auth','uses'=>'DemandeController@showUpdate']
);
Route::post(
    '/demande/update',
    ['middleware'=>'auth','uses'=>'DemandeController@storeUpdate']
);
Route::get(
    '/demande/duplicate',
    ['middleware'=>'auth','uses'=>'DemandeController@duplicateDemande','as'=>'/demande/list']
);
Route::get(
    '/demande/archive',
    ['middleware'=>'auth','uses'=>'DemandeController@archiveDemandes']
);
Route::get(
    '/demande/restore',
    ['middleware'=>'auth','uses'=>'DemandeController@restoreDemande']
);
Route::post(
    '/demande/delete',
    ['middleware'=>'auth','uses'=>'DemandeController@deleteDemande']
);
Route::get(
    '/demande/get/{id}',
    ['middleware'=>'auth','uses'=>'DemandeController@getDemande']
);
Route::get(
    '/demande/year',
    ['middleware'=>'auth','uses'=>'DemandeController@getDemandeByYear']
);
Route::get(
    '/demande/details',
    ['middleware'=>'auth','uses'=>'DemandeController@showDemandeDetails']
);


//Langues Routes

Route::get(
    'langue/add',
    ['middleware'=>'auth','uses'=>'LangueController@show']
);

Route::post(
    'langue/add',
    ['middleware'=>'auth','uses'=>'LangueController@store']
);

Route::get(
    'langue/{id}',
    ['middleware'=>'auth','uses'=>'LangueController@getLangue']
);

Route::get(
    'etat/add',
    ['middleware'=>'auth','uses'=>'EtatController@show']
);

Route::post(
    'etat/add',
    ['middleware'=>'auth','uses'=>'EtatController@store']
);

Route::get(
    'traductions',
    ['middleware'=>'auth','uses'=>'TraductionController@getTraductions']
);
Route::post(
    'traduction/delete',
    ['middleware'=>'auth','uses'=>'TraductionController@deleteTraduction']
);

//Adresse Routes
Route::get(
    'adresse/{id}',
    ['middleware'=>'auth','uses'=>'AdresseController@get']
);
Route::get(
    'adresse/update/{id}',
    ['middleware'=>'auth','uses'=>'AdresseController@showUpdate']
);
Route::post(
    'adresse/update',
    ['middleware'=>'auth','uses'=>'AdresseController@storeUpdate']
);


//Devis Routes
Route::get(
    'devis/add',
    ['middleware'=>'auth','uses'=>'DevisController@show']
);
Route::post(
    'devis/add',
    ['middleware'=>'auth','uses'=>'DevisController@store']
);
Route::get(
    'devis/list',
    ['middleware'=>'auth','uses'=>'DevisController@showDevis']
);
Route::post(
    'devis/list',
    ['middleware'=>'auth','uses'=>'DevisController@showDevis']
);
Route::get(
    'devis/resend',
    ['middleware'=>'auth','uses'=>'DevisController@resendDevis']
);
Route::get(
    'devis/view',
    ['middleware'=>'auth','uses'=>'DevisController@viewDevis']
);
Route::get(
    'devis/restore',
    ['middleware'=>'auth','uses'=>'DevisController@restoreDevis']
);
Route::get(
    'devis/archive',
    ['middleware'=>'auth','uses'=>'DevisController@archiveDevis']
);
Route::any(
    'devis/archive/query',
    ['middleware'=>'auth','uses'=>'DevisController@queryArchiveDevis']
);
Route::get(
    'devis/delete',
    ['middleware'=>'auth','uses'=>'DevisController@deleteDevis']
);
Route::post(
    'devis/delete',
    ['middleware'=>'auth','uses'=>'DevisController@deleteDevis']
);
Route::get(
    'devis/validate',
    ['middleware'=>'auth','uses'=>'DevisController@validateDevis']
);
Route::get(
    'devis/update',
    ['middleware'=>'auth','uses'=>'DevisController@devisUpdateShow']
);
Route::post(
    'devis/update',
    ['middleware'=>'auth','uses'=>'DevisController@devisUpdateStore']
);
Route::get(
    'devis/download',
    ['middleware'=>'auth','uses'=>'DevisController@downloadDevis']
);

//Service Routes
Route::get(
    'service/delete',
    ['middleware'=>'auth','uses'=>'ServiceController@deleteService']
);


//Facture Routes
Route::get(
    'facture/list',
    ['middleware'=>'auth','uses'=>'FactureController@showFactures']
);
Route::post(
    'facture/list',
    ['middleware'=>'auth','uses'=>'FactureController@showFactures']
);
Route::get(
    'facture/validate',
    ['middleware'=>'auth','uses'=>'FactureController@paiementFacture']
);
Route::post(
    'facture/validate',
    ['middleware'=>'auth','uses'=>'FactureController@paiementFacture']
);
Route::get(
    'facture/resend',
    ['middleware'=>'auth','uses'=>'FactureController@resendFacture']
);
Route::post(
    'facture/resend',
    ['middleware'=>'auth','uses'=>'FactureController@resendFacture']
);
Route::get(
    'facture/archive',
    ['middleware'=>'auth','uses'=>'FactureController@archiveFactures']
);
Route::any(
    'facture/archive/query',
    ['middleware'=>'auth','uses'=>'FactureController@queryArchiveFactures']
);
Route::get(
    'facture/view',
    ['middleware'=>'auth','uses'=>'FactureController@viewFacture']
);
Route::get(
    'facture/download',
    ['middleware'=>'auth','uses'=>'FactureController@downloadFacture']
);
Route::get(
    'facture/year',
    ['middleware'=>'auth','uses'=>'FactureController@getFacturesByYear']
);
Route::get(
    'facture/year/cumul',
    ['middleware'=>'auth','uses'=>'FactureController@getCumuleFacturesByYear']
);


Route::get(
    'remainders',
    ['middleware'=>'auth','uses'=>'GeneralController@showRemainders']
);

Route::get(
    'traces',
    ['middleware'=>'auth','uses'=>'GeneralController@showTraces']
);


//Images Routes
Route::get('images/{img}',function ($img){
    return \App\Tools\ImageTools::getImage($img);
});


//Auth Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::auth();



Route::get('/home', 'HomeController@index');
Route::any('/home/data', 'HomeController@q');
