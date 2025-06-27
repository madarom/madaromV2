<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');

Route::get('/about-madarom', function () {
    return view('qui_sommes_nous');
})->name('qui_sommes_nous');

Route::get('/our-activities-madarom', function () {
    return view('nos_activites');
})->name('nos_activites');

Route::get('/our-partners-madarom', '\App\Http\Controllers\HomeController@partenaires')->name('partenaires');

Route::get('/terms-and-conditions-madarom', function () {
    return view('conditions_generales_ventes', ['content' => staticPage('conditions-generales-de-ventes-madarom')]);
})->name('conditions_generales_ventes');

Route::get('/legal-notice-madarom', function () {
    return view('mentions_legales', ['content' => staticPage('mentions-legales-madarom')]);
})->name('mentions_legales');

Route::get('/personal-data-madarom', function () {
    return view('donnees_personnelles', ['content' => staticPage('donnees-personnelles-madarom')]);
})->name('donnees_personnelles');

Route::get('/contact-madarom', function () {
    return view('nous_joindre');
})->name('nous_joindre');
Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');

Route::get('/', '\App\Http\Controllers\HomeController@index');

Route::post('/save-contact', '\App\Http\Controllers\HomeController@saveContact')->name('save_contact');


Route::get('/change-language/{locale}', '\App\Http\Controllers\HomeController@setLanguage')->name('lang');



Route::get('/connexion', '\App\Http\Controllers\LoginController@login')->name('login');
Route::get('/registration', '\App\Http\Controllers\LoginController@register')->name('register');
Route::post('/valider-inscription', '\App\Http\Controllers\LoginController@processRegistration')->name('process_register');
Route::post('/valider-connexion', '\App\Http\Controllers\LoginController@processLogin')->name('process_login');
Route::get('/mot-de-passe-oublie', '\App\Http\Controllers\LoginController@passwordforgot')->name('passwordforgot');
Route::get('/reinit-password', '\App\Http\Controllers\LoginController@updateReinitPassword')->name('reinit-password-link');

Route::post('/reinit-password', '\App\Http\Controllers\LoginController@reinitPassword')->name('reinit-password');
Route::post('/create-password', '\App\Http\Controllers\LoginController@createPassword')->name('create-new-password');

Route::get('/deconnexion', '\App\Http\Controllers\UserController@logout')->name('logout');
Route::get('/client-space', '\App\Http\Controllers\UserController@espaceClient')->name('espace_client');
Route::get('/mon-compte', '\App\Http\Controllers\UserController@monCompte')->name('mon_compte');
Route::post('/modifier-compte', '\App\Http\Controllers\UserController@updateAccount')->name('update_account');
Route::post('/modifier-mot-de-passe', '\App\Http\Controllers\UserController@updateMdp')->name('update_mdp');



/***PRODUCT****/
Route::get('/product/essential-oils', '\App\Http\Controllers\ProductController@list')->name('product.huile_essentiel.list');
Route::get('/product/spices', '\App\Http\Controllers\ProductController@list')->name('product.epices.list');

Route::get('/product/essential-oils/{id}', '\App\Http\Controllers\ProductController@detail')->name('product.huile_essentiel.detail');
Route::get('/product/spices/{id}', '\App\Http\Controllers\ProductController@detail')->name('product.epice.detail');
Route::get('/product/search', '\App\Http\Controllers\ProductController@search')->name('product.search');
Route::post('/product/question', '\App\Http\Controllers\ProductController@question')->name('product.question');

/***PANIER****/
Route::get('/product/panier', '\App\Http\Controllers\ProductController@panier')->name('product.panier.detail');
Route::post('/product/panier/add', '\App\Http\Controllers\ProductController@addPanier')->name('product.panier.add');
Route::get('/product/panier/delete/{id}', '\App\Http\Controllers\ProductController@deleteFromPanier')->name('product.panier.delete');
Route::get('/product/panier/empty', '\App\Http\Controllers\ProductController@emptyPanier')->name('product.panier.empty');
Route::post('/show_panier', '\App\Http\Controllers\ProductController@showPanier')->name('show_panier');
Route::post('/product/panier/delete', '\App\Http\Controllers\ProductController@deleteFromSummPanier');
/**DEMANDE DE DEVIS**/
Route::get('/quote-request/new', '\App\Http\Controllers\DemandeDevisController@new')->name('demande-devis.new');
Route::post('/quote-request/save', '\App\Http\Controllers\DemandeDevisController@submit')->name('demande-devis.submit');
Route::post('/quote-request/update', '\App\Http\Controllers\DemandeDevisController@update')->name('demande-devis.update');
Route::get('/quote-request/delete/{id}', '\App\Http\Controllers\DemandeDevisController@delete')->name('demande-devis.delete');
Route::get('/quote-request/detail/{id}', '\App\Http\Controllers\DemandeDevisController@detail')->name('demande-devis.detail');
Route::get('/quote-request/product/delete/{id}', '\App\Http\Controllers\DemandeDevisController@deleteProduct')->name('demande-devis.product.delete');
Route::get('/quote-request/order/{ref}', '\App\Http\Controllers\DemandeDevisController@order')->name('demande-devis.order');
Route::post('/quote-request/complaint', '\App\Http\Controllers\DemandeDevisController@complaint')->name('demande-devis.complaint');



/**COMMANDE**/
Route::post('/order/process', '\App\Http\Controllers\CommandeController@processOrder')->name('order.process');
Route::get('/order/success', '\App\Http\Controllers\CommandeController@success')->name('order.success');
Route::get('/order/error/{ref}', '\App\Http\Controllers\CommandeController@error')->name('order.error');
Route::get('/order/detail/{id}', '\App\Http\Controllers\CommandeController@detail')->name('order.detail');
Route::get('/order/invoice/{id}', '\App\Http\Controllers\CommandeController@invoice')->name('order.invoice');
Route::post('/order/complaint', '\App\Http\Controllers\CommandeController@complaint')->name('order.complaint');

Route::group(['prefix' => "admin", 'namespace' => 'Admin'],function()
{
    Route::middleware(['checkadminlogin'])->group(function () {
        Route::match(['get', 'post'], '/', '\App\Http\Controllers\Admin\AuthController@login')->name('admin.login');
    });

    Route::middleware(['adminauth'])->group(function () {
        Route::get('/dashboard', function() {
	    	return view('admin.dashboard');
		})->name('admin.dashboard');

		Route::get('/cms/text', '\App\Http\Controllers\Admin\CmsAdminController@contenuTextuelle')->name('admin.cms.text');
		Route::post('/save-text', '\App\Http\Controllers\Admin\CmsAdminController@SaveContenuTextuelle')->name('save_text');
		Route::get('/cms/statics-page', '\App\Http\Controllers\Admin\CmsAdminController@contenuPageStatic')->name('admin.cms.static-page');
		Route::post('/save-static', '\App\Http\Controllers\Admin\CmsAdminController@SaveContenuStaticPage')->name('save_static');

		Route::get('/cms/images', '\App\Http\Controllers\Admin\CmsAdminController@contenuImages')->name('admin.cms.images');
		Route::post('/save-images', '\App\Http\Controllers\Admin\CmsAdminController@SaveImages')->name('save_images');

		Route::get('/admin_logout', '\App\Http\Controllers\Admin\AuthController@logout')->name('admin.logout');

		Route::get('/compte/list', '\App\Http\Controllers\Admin\CompteAdminController@list')->name('admin.compte.list');
		Route::post('/compte/update', '\App\Http\Controllers\Admin\CompteAdminController@update')->name('admin.compte.update');
		Route::post('/compte/update-password', '\App\Http\Controllers\Admin\CompteAdminController@updatePassword')->name('admin.compte.update-password');


		Route::post('/compte/add', '\App\Http\Controllers\Admin\CompteAdminController@add')->name('admin.compte.add');

		Route::post('/compte/delete', '\App\Http\Controllers\Admin\CompteAdminController@delete')->name('admin.compte.delete');

		Route::get('/client/list', '\App\Http\Controllers\Admin\CompteClientsController@list')->name('admin.client.list');

		/**PRODUCT**/

		Route::get('/product/list/{type}', '\App\Http\Controllers\Admin\ProductController@list')->name('admin.product.list');

		Route::get('/product/new/{type}', '\App\Http\Controllers\Admin\ProductController@add')->name('admin.product.add');

		Route::get('/product/update/{id}', '\App\Http\Controllers\Admin\ProductController@update')->name('admin.product.update');

		Route::post('/product/save', '\App\Http\Controllers\Admin\ProductController@save')->name('admin.product.save');

		Route::post('/product/delete', '\App\Http\Controllers\Admin\ProductController@delete')->name('admin.product.delete');

		Route::get('/product/questions', '\App\Http\Controllers\Admin\ProductController@questions')->name('admin.product.questions');


		/**DEMANDE DE DEVIS**/

		Route::get('/quote-request/list', '\App\Http\Controllers\Admin\DemandeDevisController@list')->name('admin.devis.list');
		Route::get('/quote-request/detail/{id}', '\App\Http\Controllers\Admin\DemandeDevisController@detail')->name('admin.devis.detail');
		Route::post('/quote-request/reply', '\App\Http\Controllers\Admin\DemandeDevisController@reply')->name('admin.devis.reply');




		/**COMMANDE**/

		Route::get('/order/list', '\App\Http\Controllers\Admin\CommandeController@list')->name('admin.order.list');
		Route::get('/order/detail/{id}', '\App\Http\Controllers\Admin\CommandeController@detail')->name('admin.order.detail');
		Route::post('/order/statut/change', '\App\Http\Controllers\Admin\CommandeController@changeStatut')->name('admin.order.statut.change');

		/**MESSAGES**/
    	Route::get('/messages/list', '\App\Http\Controllers\Admin\MessagesController@list')->name('messages.list');

    	/**PLAINTES**/
    	Route::get('/plaintes/demande_devis/list', '\App\Http\Controllers\Admin\PlaintesController@demande_devis')->name('plainte.demande_devis.list');
    	Route::get('/plaintes/commande/list', '\App\Http\Controllers\Admin\PlaintesController@commande')->name('plainte.commande.list');


    	/**PARTENAIRES**/
    	Route::get('/partenaire/list', '\App\Http\Controllers\Admin\PartnersController@list')->name('admin.partenaire.list');
    	Route::get('/partenaire/new', '\App\Http\Controllers\Admin\PartnersController@new')->name('admin.partenaire.new');
    	Route::get('/partenaire/update/{id}', '\App\Http\Controllers\Admin\PartnersController@update')->name('admin.partenaire.update');
    	Route::post('/partenaire/save', '\App\Http\Controllers\Admin\PartnersController@save')->name('admin.partenaire.save');

    	/**SEO**/
    	Route::get('/seo', '\App\Http\Controllers\Admin\SEOController@index')->name('admin.seo');
    	Route::post('/seo/new', '\App\Http\Controllers\Admin\SEOController@new')->name('admin.seo.new');
    	Route::post('/seo/save', '\App\Http\Controllers\Admin\SEOController@save')->name('admin.seo.save');

    	/**PARAMETRES**/
    	Route::get('/config', '\App\Http\Controllers\Admin\ConfigController@index')->name('admin.config');
    	Route::post('/config/mail/delete', '\App\Http\Controllers\Admin\ConfigController@deleteMail')->name('admin.config.mail.delete');
    	Route::post('/config/mail/save', '\App\Http\Controllers\Admin\ConfigController@saveMail')->name('admin.config.mail.save');

    	Route::get('/config/maint/{value}', '\App\Http\Controllers\Admin\ConfigController@maintenance')->name('admin.config.maintenance');

    	Route::post('/config/unite/delete', '\App\Http\Controllers\Admin\ConfigController@deleteUnite')->name('admin.config.unite.delete');
    	Route::post('/config/unite/save', '\App\Http\Controllers\Admin\ConfigController@saveUnite')->name('admin.config.unite.save');
    	
    });


});