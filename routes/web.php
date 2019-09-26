<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',['as'=>'home','uses'=>'HomeController@getIndex']);
Route::post('/submitContact','HomeController@submitContact');
Route::post('submit-subscribe',['as'=>'submit-subscribe','uses'=>'HomeController@submitSubscribe']);
Route::get('blog',['as'=>'blog','uses'=>'HomeController@getBlog']);
Route::get('faq',['as'=>'faq','uses'=>'HomeController@getFAQ']);
Route::get('terms-condition',['as'=>'terms-condition','uses'=>'HomeController@getTermCondition']);
Route::get('warning',['as'=>'warning','uses'=>'HomeController@getWarning']);
Route::get('cookies',['as'=>'cookies','uses'=>'HomeController@getCookies']);
Route::get('privacy-policy',['as'=>'privacy-policy','uses'=>'HomeController@getPrivacyPolicy']);
Route::get('blog-details/{slug}',['as'=>'blog-details','uses'=>'HomeController@detailsBlog']);
Route::get('category-blog/{slug}',['as'=>'category-blog','uses'=>'HomeController@categoryBlog']);
Route::get('/menu/{id}/{name}','HomeController@getMenu');
Route::get('about-us',['as'=>'about-us','uses'=>'HomeController@getAbout']);
Route::get('contact-us',['as'=>'contact-us','uses'=>'HomeController@getContact']);
Route::get('/welcome','HomeController@welcome');
Route::get('/bienvenido','HomeController@bienvenido');

Route::get('cron-fire',['as'=>'cron-fire','uses'=>'HomeController@submitCronJob']);
Route::get('cron-expire-notification',['as'=>'cron-expire-notification','uses'=>'HomeController@submitExpireNotification']);

Auth::routes();

Route::get('user-dashboard',['as'=>'user-dashboard','uses'=>'UserController@getDashboard']);

Route::get('user-edit-profile',['as'=>'user-edit-profile','uses'=>'UserController@editProfile']);
Route::post('user-edit-profile',['as'=>'user-update-profile','uses'=>'UserController@updateProfile']);

Route::get('user-change-password',['as'=>'user-change-password','uses'=>'UserController@getChangePass']);
Route::post('user-change-password',['as'=>'user-change-password','uses'=>'UserController@postChangePass']);

Route::get('test', ['uses'=>'TestController@testFunction']);

Route::group(['prefix' => 'user'], function () {
    Route::post('discord-form',['as'=>'discord-form','uses'=>'UserController@submitDiscordForm']);
    
    Route::get('email-verify',['as'=>'email-verify','uses'=>'Auth\VerifyUserController@emailVerify']);
    Route::post('verification-submit',['as'=>'verification-submit','uses'=>'Auth\VerifyUserController@submitVerify']);

    Route::post('email-resubmit',['as'=>'email-resubmit','uses'=>'Auth\VerifyUserController@emailResubmit']);

    Route::get('phone-verify',['as'=>'phone-verify','uses'=>'Auth\VerifyUserController@phoneVerify']);
    Route::post('phone-verification-submit',['as'=>'phone-verification-submit','uses'=>'Auth\VerifyUserController@submitPhoneVerify']);

    Route::post('phone-resubmit',['as'=>'phone-resubmit','uses'=>'Auth\VerifyUserController@phoneResubmit']);

    Route::get('new-signal',['as'=>'user-new-signal','uses'=>'UserController@newSignal']);
    Route::get('all-signal',['as'=>'user-all-signal','uses'=>'UserController@AllSignal']);
    Route::get('signal-view/{id}',['as'=>'user-signal-view','uses'=>'UserController@signalView']);

    Route::get('payment-method',['as'=>'chose-payment-method','uses'=>'UserController@chosePayment']);
    Route::post('submit-payment-method',['as'=>'submit-payment-method','uses'=>'UserController@submitPaymentMethod']);

    Route::get('upgrade-plan',['as'=>'user-upgrade-plan','uses'=>'UserController@getUpgradePlan']);

    Route::post('upgrade-plan-submit',['as'=>'upgrade-plan-submit','uses'=>'UserController@updatePlanSubmit']);

    Route::get('plan-upgrade-payment',['as'=>"plan-upgrade-payment",'uses'=>'UserController@planUpgradePayment']);

    Route::get('active-discord',['as'=>'active-discord','uses'=>'UserController@activeDiscord']);
    Route::post('save-discord',['as'=>'save-discord','uses'=>'UserController@saveDiscord']);
    
    Route::get('active-telegram',['as'=>'user-active-telegram','uses'=>'UserController@activeTelegram']);
    Route::post('active-telegram',['as'=>'submit-active-telegram','uses'=>'UserController@submitActiveTelegram']);

    Route::get('materials',['as'=>'materials','uses'=>'UserController@getMaterials']);
    Route::get('mmaterials',['as'=>'mmaterials','uses'=>'UserController@getMmaterials']);

    Route::get('staff-request',['as'=>'user-staff-request','uses'=>'UserController@staffRequest']);
    Route::post('staff-request',['as'=>'submit-staff-request','uses'=>'UserController@submitStaffRequest']);

    Route::get('transaction-log',['as'=>'user-transaction-log','uses'=>'UserController@transactionLog']);

    Route::get('withdraw-now',['as'=>'user-withdraw-now','uses'=>'UserController@withdrawNow']);
    Route::get('withdraw-method/{id}',['as'=>'user-withdraw-method','uses'=>'UserController@withdrawMethod']);
    Route::get('check-withdraw/{av}/{amount}/{min}/{max}',['as'=>'check-withdraw','uses'=>'UserController@checkWithdraw']);
    Route::post('withdraw-confirm',['as'=>'user-withdraw-confirm','uses'=>'UserController@withdrawConfirm']);
    Route::get('withdraw-history',['as'=>'user-withdraw-history','uses'=>'UserController@withdrawHistory']);

    Route::get('submit-signal',['as'=>'user-submit-signal','uses'=>'UserController@submitUserSignal']);
    Route::post('submit-signal',['as'=>'user-submit-signal','uses'=>'UserController@PostSubmitUserSignal']);
    Route::get('submit-history',['as'=>'submit-history','uses'=>'UserController@submitHistory']);
    Route::get('submit-view/{id}',['as'=>'signal-submit-view','uses'=>'UserController@submitView']);

    Route::post('comment-submit',['as'=>'comment-submit','uses'=>'UserController@commentSubmit']);
    Route::post('rating-submit',['as'=>'rating-submit','uses'=>'UserController@ratingSubmit']);

    Route::get('active-telegram',['as'=>'active-telegram','uses'=>'UserController@activeTelegram']);
    
    Route::get('welcome',['as'=>'welcome','uses'=>'UserController@showWelcome']);

});

Route::post('paypal-submit',['as'=>'paypal-submit','uses'=>'PaymentIPNController@paypalSubmit']);
Route::get('paypal-ipn',['as'=>'paypal-ipn','uses'=>'PaymentIPNController@paypalIpn']);

Route::post('perfect-ipn',['as'=>'perfect-ipn','uses'=>'PaymentIPNController@perfectIPN']);
Route::post('stripe-submit',['as'=>'stripe-submit','uses'=>'PaymentIPNController@submitStripe']);
Route::get('btc_ipn',['as'=>'btc_ipn','uses'=>'PaymentIPNController@btcIPN']);
Route::post('skrill-ipn',['as'=>'skrill-ipn','uses'=>'PaymentIPNController@skrillIPN']);
Route::post('coinpayment-ipn',['as'=>'coinpayment-ipn','uses'=>'PaymentIPNController@coinPaymentIPN']);


Route::get('subscriber/login', 'Subscriber\LoginController@showLoginForm')->name('subscriber.login');
Route::post('subscriber/login', 'Subscriber\LoginController@login')->name('subscriber.login.post');
Route::get('subscriber-logout', 'Subscriber\LoginController@logout')->name('subscriber.logout');

Route::group(['prefix' => 'subscriber', 'middleware' => 'subscriber'], function () {
    Route::get('/',['as'=>'subscriber-dashboard-home','uses'=>'SubscriberDashboardController@getDashboard']);
    Route::get('dashboard',['as'=>'subscriber-dashboard','uses'=>'SubscriberDashboardController@getDashboard']);
    
    // Profile Management
    Route::get('edit-profile', ['as' => 'subscriber-edit-profile', 'uses' => 'SubscriberBasicSettingController@editProfile']);
    Route::post('edit-profile', ['as' => 'subscriber-update-profile', 'uses' => 'SubscriberBasicSettingController@updateProfile']);

    Route::get('change-password', ['as' => 'subscriber-change-password', 'uses' => 'SubscriberBasicSettingController@getChangePass']);
    Route::post('change-password', ['as' => 'subscriber-change-password', 'uses' => 'SubscriberBasicSettingController@postChangePass']);
    
    Route::get('user-edit/{id}',['as'=>'subscriber-user-edit','uses'=>'SubscriberDashboardController@editUser']);
    Route::get('manage-user',['as'=>'subscriber-manage-user','uses'=>'SubscriberDashboardController@manageUser']);
    Route::get('expired-memberships',['as'=>'subscriber-expired-memberships','uses'=>'SubscriberDashboardController@manageExpiredMemberships']);
    Route::get('manage-user-paid',['as'=>'subscriber-manage-user-paid','uses'=>'SubscriberDashboardController@manageUserPaid']);
    Route::get('manage-user-not-paid',['as'=>'subscriber-manage-user-not-paid','uses'=>'SubscriberDashboardController@manageUsernotPaid']);
    Route::get('manage-user-email/{email}',['as'=>'subscriber-manage-user-email','uses'=>'SubscriberDashboardController@manageUserByEmail']);
});




Route::get('subadmin/login', 'SubAdmin\LoginController@showLoginForm')->name('subadmin.login');
Route::post('subadmin/login', 'SubAdmin\LoginController@login')->name('subadmin.login.post');
// Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
// Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
// Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
// Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('subadmin-logout', 'SubAdmin\LoginController@logout')->name('subadmin.logout');

Route::group(['prefix' => 'subadmin', 'middleware' => 'subadmin'], function () {
    Route::get('/',['as'=>'sub-dashboard-home','uses'=>'SubDashboardController@getDashboard']);
    Route::get('dashboard',['as'=>'sub-dashboard','uses'=>'SubDashboardController@getDashboard']);
    
    Route::get('edit-profile', ['as' => 'sub-edit-profile', 'uses' => 'SubBasicSettingController@editProfile']);
    Route::post('edit-profile', ['as' => 'sub-update-profile', 'uses' => 'SubBasicSettingController@updateProfile']);

    Route::get('change-password', ['as' => 'subadmin-change-password', 'uses' => 'SubBasicSettingController@getChangePass']);
    Route::post('change-password', ['as' => 'subadmin-change-password', 'uses' => 'SubBasicSettingController@postChangePass']);
    
    Route::get('signal-create',['as'=>'sub-signal-create','uses'=>'SubSignalController@create']);
    Route::post('signal-create',['as'=>'sub-signal-create','uses'=>'SubSignalController@store']);
    Route::get('signal-all',['as'=>'sub-signal-all','uses'=>'SubSignalController@index']);
    Route::get('signal-view/{id}',['as'=>'sub-signal-view','uses'=>'SubSignalController@show']);
    Route::get('signal-edit/{id}',['as'=>'sub-signal-edit','uses'=>'SubSignalController@edit']);
    Route::post('signal-update',['as'=>'sub-signal-update','uses'=>'SubSignalController@update']);
    Route::delete('signal-delete',['as'=>'sub-signal-delete','uses'=>'SubSignalController@destroy']);
    
    Route::get('manage-materials',['as'=>'sub-manage-materials','uses'=>'SubDashboardController@manageMaterials']);
    Route::get('add-material',['as'=>'sub-add-material','uses'=>'SubDashboardController@addMaterialView']);
    Route::post('add-material',['as'=>'sub-add-material','uses'=>'SubDashboardController@addMaterial']);
    Route::get('edit-material/{id}',['as'=>'sub-edit-material','uses'=>'SubDashboardController@editMaterialView']);
    Route::get('add-mmaterial',['as'=>'sub-add-mmaterial','uses'=>'SubDashboardController@addMmaterialView']);
    Route::post('add-mmaterial',['as'=>'sub-add-mmaterial','uses'=>'SubDashboardController@addMmaterial']);
    Route::get('edit-mmaterial/{id}',['as'=>'sub-edit-mmaterial','uses'=>'SubDashboardController@editMmaterialView']);
    Route::delete('material-delete',['as'=>'sub-material-delete','uses'=>'SubDashboardController@materialDelete']);
    Route::delete('mmaterial-delete',['as'=>'sub-mmaterial-delete','uses'=>'SubDashboardController@mmaterialDelete']);
    Route::post('material-update',['as'=>'sub-material-update','uses'=>'SubDashboardController@updateMaterial']);
    Route::post('mmaterial-update',['as'=>'sub-mmaterial-update','uses'=>'SubDashboardController@updateMmaterial']);
    
    Route::get('user-create',['as'=>'sub-user-create','uses'=>'SubDashboardController@createUser']);
    Route::post('user-create',['as'=>'sub-user-create','uses'=>'SubDashboardController@submitUser']);
    Route::get('user-edit/{id}',['as'=>'sub-user-edit','uses'=>'SubDashboardController@editUser']);
    Route::post('user-update',['as'=>'sub-user-update','uses'=>'SubDashboardController@updateUser']);
    Route::delete('user-delete',['as'=>'sub-user-delete','uses'=>'SubDashboardController@deleteUser']);
    
    Route::get('manage-user',['as'=>'sub-manage-user','uses'=>'SubDashboardController@manageUser']);
    Route::get('expired-memberships',['as'=>'sub-expired-memberships','uses'=>'SubDashboardController@manageExpiredMemberships']);
    Route::get('manage-user-paid',['as'=>'sub-manage-user-paid','uses'=>'SubDashboardController@manageUserPaid']);
    Route::get('manage-user-not-paid',['as'=>'sub-manage-user-not-paid','uses'=>'SubDashboardController@manageUsernotPaid']);
    Route::get('manage-user-email/{email}',['as'=>'sub-manage-user-email','uses'=>'SubDashboardController@manageUserByEmail']);
    
    Route::get('generate-report',['as'=>'sub-generate-report','uses'=>'SubDashboardController@generateReportView']);
    Route::get('create-report',['as'=>'sub-create-report','uses'=>'SubDashboardController@createReport']);

    Route::post('user-block' ,['as'=>'sub-user-block','uses'=>'SubDashboardController@blockUser']);
    Route::post('email-block',['as'=>'sub-email-block','uses'=>'SubDashboardController@blockEmail']);
    Route::post('phone-block',['as'=>'sub-phone-block','uses'=>'SubDashboardController@blockPhone']);
    
    Route::get('post-create',['as'=>'sub-post-create','uses'=>'SubPostController@create']);
    Route::get('post-all',['as'=>'sub-post-all','uses'=>'SubPostController@index']);
    Route::get('post-edit/{id}',['as'=>'sub-post-edit','uses'=>'SubPostController@edit']);
    Route::delete('post-delete',['as'=>'sub-post-delete','uses'=>'SubPostController@destroy']);
    Route::post('post-publish',['as'=>'sub-post-publish','uses'=>'SubPostController@publish']);
    
    Route::get('manage-welcome',['as'=>'sub-manage-welcome','uses'=>'SubWebSettingController@manageWelcome']);
    Route::post('manage-welcome',['as'=>'sub-manage-welcome','uses'=>'SubWebSettingController@updateWelcome']);
    
    Route::get('manage-welcome-message',['as'=>'sub-manage-welcome-message','uses'=>'SubWebSettingController@manageWelcomeMessage']);
    Route::post('manage-welcome-message',['as'=>'sub-manage-welcome-message','uses'=>'SubWebSettingController@updateWelcomeMessage']);
    
    // Telegram Management
    Route::get('telegram-commands',['as'=>'subadmin-telegram-commands','uses'=>'SubTelegramController@getTelegramCommands']);
    Route::get('telegram-command-create',['as'=>'subadmin-telegram-command-create','uses'=>'SubTelegramController@createView']);
    Route::post('telegram-command-create',['as'=>'subadmin-telegram-command-create-post','uses'=>'SubTelegramController@createCommand']);
    Route::get('telegram-command-edit/{id}',['as'=>'subadmin-telegram-command-edit','uses'=>'SubTelegramController@editView']);
    Route::post('telegram-command-edit',['as'=>'subadmin-telegram-command-edit-post','uses'=>'SubTelegramController@updateCommand']);
    Route::delete('telegram-command-delete',['as'=>'subadmin-telegram-command-delete','uses'=>'SubTelegramController@deleteCommand']);
    
    Route::get('telegram-spams',['as'=>'subadmin-telegram-spams','uses'=>'SubTelegramController@getTelegramSpams']);
    Route::get('telegram-spam-edit/{id}',['as'=>'subadmin-telegram-spam-edit','uses'=>'SubTelegramController@editSpamView']);
    Route::post('telegram-spam-edit',['as'=>'subadmin-telegram-spam-edit-post','uses'=>'SubTelegramController@updateSpam']);
    Route::get('telegram-spam-create',['as'=>'subadmin-telegram-spam-create','uses'=>'SubTelegramController@createSpamView']);
    Route::post('telegram-spam-create',['as'=>'subadmin-telegram-spam-create-post','uses'=>'SubTelegramController@createSpam']);
    Route::delete('telegram-spam-delete',['as'=>'subadmin-telegram-spam-delete','uses'=>'SubTelegramController@deleteSpam']);
});

Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login')->name('admin.login.post');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/',['as'=>'admin-dashboard-home','uses'=>'DashboardController@getDashboard']);
    Route::get('dashboard',['as'=>'admin-dashboard','uses'=>'DashboardController@getDashboard']);
    
    Route::get('edit-profile', ['as' => 'edit-profile', 'uses' => 'BasicSettingController@editProfile']);
    Route::post('edit-profile', ['as' => 'update-profile', 'uses' => 'BasicSettingController@updateProfile']);

    Route::get('change-password', ['as' => 'admin-change-password', 'uses' => 'BasicSettingController@getChangePass']);
    Route::post('change-password', ['as' => 'admin-change-password', 'uses' => 'BasicSettingController@postChangePass']);

    Route::get('basic-setting', ['as' => 'basic-setting', 'uses' => 'BasicSettingController@getBasicSetting']);
    Route::put('basic-general/{id}', ['as' => 'basic-update', 'uses' => 'BasicSettingController@putBasicSetting']);

    Route::get('database-backup',['as'=>'database-backup','uses'=>'BasicSettingController@getDatabaseBackup']);
    Route::get('backup-submit',['as'=>'backup-submit','uses'=>'BasicSettingController@submitDatabaseBackup']);
    Route::get('database-backup-download/{id}',['as'=>'database-backup-download','uses'=>'BasicSettingController@downloadDatabaseBackup']);

    Route::get('google-recaptcha',['as'=>'google-recaptcha','uses'=>'BasicSettingController@googleRecaptcha']);
    Route::put('recaptcha-update/{id}',['as'=>'recaptcha-update','uses'=>'BasicSettingController@updateRecaptcha']);

    Route::get('manage-logo', ['as' => 'manage-logo', 'uses' => 'WebSettingController@manageLogo']);
    Route::post('manage-logo', ['as' => 'manage-logo', 'uses' => 'WebSettingController@updateLogo']);

    Route::get('email-template',['as'=>'email-template','uses'=>'BasicSettingController@manageEmailTemplate']);
    Route::post('email-template',['as'=>'email-template','uses'=>'BasicSettingController@updateEmailTemplate']);

    Route::get('email-setting', ['as' => 'email-setting', 'uses' => 'BasicSettingController@getEmailSetting']);
    Route::put('email-update/{id}', ['as' => 'email-update', 'uses' => 'BasicSettingController@putEmailSetting']);

    Route::get('telegram-config',['as'=>'telegram-config','uses'=>'BasicSettingController@telegramConfig']);
    Route::post('telegram-config',['as'=>'update-template-config','uses'=>'BasicSettingController@updateTelegramConfig']);

    Route::get('telegram-sms',['as'=>'telegram-sms','uses'=>'BasicSettingController@smsTelegram']);
    Route::post('telegram-sms',['as'=>'telegram-sms','uses'=>'BasicSettingController@submitSmsTelegram']);

    Route::get('currency-widget',['as'=>'currency-widget','uses'=>'DashboardController@getCurrencyWidget']);
    Route::post('currency-widget',['as'=>'currency-widget','uses'=>'DashboardController@submitCurrencyWidget']);

    Route::get('manage-materials',['as'=>'manage-materials','uses'=>'DashboardController@manageMaterials']);
    Route::get('add-material',['as'=>'add-material','uses'=>'DashboardController@addMaterialView']);
    Route::post('add-material',['as'=>'add-material','uses'=>'DashboardController@addMaterial']);
    Route::delete('material-delete',['as'=>'material-delete','uses'=>'DashboardController@materialDelete']);
    Route::get('edit-material/{id}',['as'=>'edit-material','uses'=>'DashboardController@editMaterialView']);
    Route::post('material-update',['as'=>'material-update','uses'=>'DashboardController@updateMaterial']);
    
    // Route::get('manage-materials',['as'=>'manage-materials','uses'=>'DashboardController@manageMaterials']);
    Route::get('add-mmaterial',['as'=>'add-mmaterial','uses'=>'DashboardController@addMmaterialView']);
    Route::post('add-mmaterial',['as'=>'add-mmaterial','uses'=>'DashboardController@addMmaterial']);
    Route::delete('mmaterial-delete',['as'=>'mmaterial-delete','uses'=>'DashboardController@mmaterialDelete']);
    Route::get('edit-mmaterial/{id}',['as'=>'edit-mmaterial','uses'=>'DashboardController@editMmaterialView']);
    Route::post('mmaterial-update',['as'=>'mmaterial-update','uses'=>'DashboardController@updateMmaterial']);
    
    Route::get('cron-job',['as'=>'cron-job','uses'=>'BasicSettingController@setCronJob']);

    Route::get('sms-setting',['as'=>'sms-setting','uses'=>'BasicSettingController@smsSetting']);
    Route::post('sms-setting',['as'=>'sms-setting','uses'=>'BasicSettingController@updateSmsSetting']);

    Route::get('google-analytic',['as'=>'google-analytic','uses'=>'BasicSettingController@getGoogleAnalytic']);
    Route::post('google-analytic',['as'=>'google-analytic','uses'=>'BasicSettingController@updateGoogleAnalytic']);

    Route::get('live-chat',['as'=>'live-chat','uses'=>'BasicSettingController@getLiveChat']);
    Route::post('live-chat',['as'=>'live-chat','uses'=>'BasicSettingController@updateLiveChat']);

    Route::get('manage-terms',['as'=>'manage-terms','uses'=>'WebSettingController@manageTermsCondition']);
    Route::post('manage-terms',['as'=>'manage-terms','uses'=>'WebSettingController@updateTermsCondition']);
    
    Route::get('manage-warning',['as'=>'manage-warning','uses'=>'WebSettingController@manageWarning']);
    Route::post('manage-warning',['as'=>'manage-warning','uses'=>'WebSettingController@updateWarning']);
    
    Route::get('manage-cookies',['as'=>'manage-cookies','uses'=>'WebSettingController@manageCookies']);
    Route::post('manage-cookies',['as'=>'manage-cookies','uses'=>'WebSettingController@updateCookies']);
    
    Route::get('manage-faq',['as'=>'manage-faq','uses'=>'WebSettingController@manageFaq']);
    Route::get('faq/{id}',['as'=>'manage-faq-update-show','uses'=>'WebSettingController@updateFaqShow']);
    Route::post('faq/{id}',['as'=>'manage-faq-update','uses'=>'WebSettingController@updateFaq']);
    Route::get('manage-faq-create-show',['as'=>'manage-faq-create-show','uses'=>'WebSettingController@createFaqShow']);
    Route::post('manage-faq-create',['as'=>'manage-faq-create','uses'=>'WebSettingController@createFaq']);
    Route::delete('manage-faq-delete',['as'=>'manage-faq-delete','uses'=>'WebSettingController@deleteFaq']);
    
    Route::get('manage-privacy',['as'=>'manage-privacy','uses'=>'WebSettingController@managePrivacyPolicy']);
    Route::post('manage-privacy',['as'=>'manage-privacy','uses'=>'WebSettingController@updatePrivacyPolicy']);

    Route::get('user-create',['as'=>'user-create','uses'=>'DashboardController@createUser']);
    Route::post('user-create',['as'=>'user-create','uses'=>'DashboardController@submitUser']);
    Route::get('user-edit/{id}',['as'=>'user-edit','uses'=>'DashboardController@editUser']);
    Route::post('user-update',['as'=>'user-update','uses'=>'DashboardController@updateUser']);
    Route::delete('user-delete',['as'=>'user-delete','uses'=>'DashboardController@deleteUser']);

    Route::get('manage-user',['as'=>'manage-user','uses'=>'DashboardController@manageUser']);
    Route::get('expired-memberships',['as'=>'expired-memberships','uses'=>'DashboardController@manageExpiredMemberships']);
    Route::get('manage-user-paid',['as'=>'manage-user-paid','uses'=>'DashboardController@manageUserPaid']);
    Route::get('manage-user-not-paid',['as'=>'manage-user-not-paid','uses'=>'DashboardController@manageUsernotPaid']);
    Route::get('manage-user-email/{email}',['as'=>'manage-user-email','uses'=>'DashboardController@manageUserByEmail']);

    Route::get('generate-report',['as'=>'generate-report','uses'=>'DashboardController@generateReportView']);
    Route::get('create-report',['as'=>'create-report','uses'=>'DashboardController@createReport']);

    Route::post('user-block' ,['as'=>'user-block','uses'=>'DashboardController@blockUser']);
    Route::post('email-block',['as'=>'email-block','uses'=>'DashboardController@blockEmail']);
    Route::post('phone-block',['as'=>'phone-block','uses'=>'DashboardController@blockPhone']);

    Route::get('/manage-footer', ['as' => 'manage-footer', 'uses' => 'WebSettingController@manageFooter']);
    Route::put('/manage-footer/{id}', ['as' => 'manage-footer-update', 'uses' => 'WebSettingController@updateFooter']);

    Route::get('manage-social',['as'=>'manage-social','uses'=>'WebSettingController@manageSocial']);
    Route::post('manage-social',['as'=>'manage-social','uses'=>'WebSettingController@storeSocial']);
    Route::get('manage-social/{product_id?}',['as'=>'social-edit','uses'=>'WebSettingController@editSocial']);
    Route::put('manage-social/{product_id?}',['as'=>'social-edit','uses'=>'WebSettingController@updateSocial']);
    Route::delete('manage-social/{product_id?}',['as'=>'social-delete','uses'=>'WebSettingController@deleteSocial']);

    Route::get('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@createMenu']);
    Route::post('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@storeMenu']);
    Route::get('menu-control',['as'=>'menu-control','uses'=>'WebSettingController@manageMenu']);
    Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenu']);
    Route::post('menu-update/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenu']);
    Route::delete('menu-delete',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenu']);

    Route::get('manage-about',['as'=>'manage-about','uses'=>'WebSettingController@manageAbout']);
    Route::post('manage-about',['as'=>'manage-about','uses'=>'WebSettingController@updateAbout']);

    Route::get('manage-slider', ['as' => 'manage-slider', 'uses' => 'WebSettingController@manageSlider']);
    Route::post('manage-slider', ['as' => 'manage-slider', 'uses' => 'WebSettingController@storeSlider']);
    Route::post('slider-section-video', ['as' => 'slider-section-video', 'uses' => 'WebSettingController@storeSliderVideo']);
    Route::delete('slider-delete', ['as' => 'slider-delete', 'uses' => 'WebSettingController@deleteSlider']);

    Route::get('testimonial-create',['as'=>'testimonial-create','uses'=>'WebSettingController@createTestimonial']);
    Route::post('testimonial-create',['as'=>'testimonial-create','uses'=>'WebSettingController@submitTestimonial']);
    Route::get('testimonial-all',['as'=>'testimonial-all','uses'=>'WebSettingController@allTestimonial']);
    Route::get('testimonial-edit/{id}',['as'=>'testimonial-edit','uses'=>'WebSettingController@editTestimonial']);
    Route::put('testimonial-edit/{id}',['as'=>'testimonial-update','uses'=>'WebSettingController@updateTestimonial']);
    Route::delete('testimonial-delete',['as'=>'testimonial-delete','uses'=>'WebSettingController@deleteTestimonial']);

    Route::get('member-create',['as'=>'member-create','uses'=>'WebSettingController@createMember']);
    Route::post('member-create',['as'=>'member-create','uses'=>'WebSettingController@submitMember']);
    Route::get('member-all',['as'=>'member-all','uses'=>'WebSettingController@allMember']);
    Route::get('member-edit/{id}',['as'=>'member-edit','uses'=>'WebSettingController@editMember']);
    Route::put('member-edit/{id}',['as'=>'member-update','uses'=>'WebSettingController@updateMember']);
    Route::delete('member-delete',['as'=>'member-delete','uses'=>'WebSettingController@deleteMember']);

    Route::get('manage-subscriber',['as'=>'manage-subscriber','uses'=>'DashboardController@manageSubscriber']);

    Route::get('manage-breadcrumb',['as'=>'manage-breadcrumb','uses'=>'WebSettingController@mangeBreadcrumb']);
    Route::post('manage-breadcrumb',['as'=>'manage-breadcrumb','uses'=>'WebSettingController@updateBreadcrumb']);

    Route::get('speciality-create',['as'=>'speciality-create','uses'=>'WebSettingController@createSpeciality']);
    Route::post('speciality-create',['as'=>'speciality-create','uses'=>'WebSettingController@storeSpeciality']);
    Route::get('speciality-control',['as'=>'speciality-control','uses'=>'WebSettingController@manageSpeciality']);
    Route::get('speciality-edit/{id}',['as'=>'speciality-edit','uses'=>'WebSettingController@editSpeciality']);
    Route::post('speciality-update/{id}',['as'=>'speciality-update','uses'=>'WebSettingController@updateSpeciality']);
    Route::post('speciality-title-update',['as'=>'speciality-title-update','uses'=>'WebSettingController@updateSpecialityTitle']);
    Route::delete('speciality-delete',['as'=>'speciality-delete','uses'=>'WebSettingController@deleteSpeciality']);

    Route::get('manage-category',['as'=>'manage-category','uses'=>'CategoryController@manageCategory']);
    Route::post('manage-category',['as'=>'manage-category','uses'=>'CategoryController@storeCategory']);
    Route::get('manage-category/{product_id?}',['as'=>'category-edit','uses'=>'CategoryController@editCategory']);
    Route::put('manage-category/{product_id?}',['as'=>'category-edit','uses'=>'CategoryController@updateCategory']);
    Route::delete('/manage-category/{product_id?}','CategoryController@deleteItem');

    Route::get('post-create',['as'=>'post-create','uses'=>'PostController@create']);
    Route::post('post-create',['as'=>'post-create','uses'=>'PostController@store']);
    Route::get('post-all',['as'=>'post-all','uses'=>'PostController@index']);
    Route::get('post-edit/{id}',['as'=>'post-edit','uses'=>'PostController@edit']);
    Route::post('post-update',['as'=>'post-update','uses'=>'PostController@update']);
    Route::delete('post-delete',['as'=>'post-delete','uses'=>'PostController@destroy']);
    Route::post('post-publish',['as'=>'post-publish','uses'=>'PostController@publish']);

    Route::get('plan-create',['as'=>'plan-create','uses'=>'PlanController@create']);
    Route::post('plan-create',['as'=>'plan-create','uses'=>'PlanController@store']);
    Route::get('plan-all',['as'=>'plan-all','uses'=>'PlanController@index']);
    Route::get('plan-edit/{id}',['as'=>'plan-edit','uses'=>'PlanController@edit']);
    Route::post('plan-update',['as'=>'plan-update','uses'=>'PlanController@update']);
    Route::delete('plan-delete',['as'=>'plan-delete','uses'=>'PlanController@destroy']);

    Route::get('payment-method',['as'=>'payment-method','uses'=>'PaymentController@paymentMethod']);
    Route::post('payment-method',['as'=>'payment-method-update','uses'=>'PaymentController@updatePaymentMethod']);

    Route::get('manage-shortAbout',['as'=>'manage-shortAbout','uses'=>'WebSettingController@shortAbout']);
    Route::post('manage-shortAbout',['as'=>'manage-shortAbout','uses'=>'WebSettingController@updateShortAbout']);

    Route::get('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@createPartner']);
    Route::post('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@submitPartner']);
    Route::get('partner-all',['as'=>'partner-all','uses'=>'WebSettingController@allPartner']);
    Route::get('partner-edit/{id}',['as'=>'partner-edit','uses'=>'WebSettingController@editPartner']);
    Route::put('partner-edit/{id}',['as'=>'partner-update','uses'=>'WebSettingController@updatePartner']);
    Route::delete('partner-delete',['as'=>'partner-delete','uses'=>'WebSettingController@deletePartner']);

    Route::get('advertisement-create',['as'=>'advertisement-create','uses'=>'AdvertisementController@createAdvertisement']);
    Route::post('advertisement-create',['as'=>'advertisement-create','uses'=>'AdvertisementController@storeAdvertisement']);
    Route::get('advertisement-all',['as'=>'advertisement-all','uses'=>'AdvertisementController@allAdvertisement']);
    Route::get('advertisement-edit/{id}',['as'=>'advertisement-edit','uses'=>'AdvertisementController@editAdvertisement']);
    Route::put('advertisement-edit/{id}',['as'=>'advertisement-update','uses'=>'AdvertisementController@updateAdvertisement']);

    Route::get('signal-create',['as'=>'signal-create','uses'=>'SignalController@create']);
    Route::post('signal-create',['as'=>'signal-create','uses'=>'SignalController@store']);
    Route::get('signal-all',['as'=>'signal-all','uses'=>'SignalController@index']);
    Route::get('signal-view/{id}',['as'=>'signal-view','uses'=>'SignalController@show']);
    Route::get('signal-edit/{id}',['as'=>'signal-edit','uses'=>'SignalController@edit']);
    Route::post('signal-update',['as'=>'signal-update','uses'=>'SignalController@update']);
    Route::delete('signal-delete',['as'=>'signal-delete','uses'=>'SignalController@destroy']);

    Route::post('comment-submit',['as'=>'admin-comment-submit','uses'=>'DashboardController@commentSubmit']);
    Route::post('rating-submit',['as'=>'admin-rating-submit','uses'=>'DashboardController@ratingSubmit']);

    Route::get('speciality-section',['as'=>'speciality-section','uses'=>'SectionController@getSpecialitySection']);
    Route::post('speciality-section',['as'=>'speciality-section','uses'=>'SectionController@submitSpecialitySection']);

    Route::get('currency-section',['as'=>'currency-section','uses'=>'SectionController@getCurrencySection']);
    Route::post('currency-section',['as'=>'currency-section','uses'=>'SectionController@submitCurrencySection']);

    Route::get('trading-section',['as'=>'trading-section','uses'=>'SectionController@getTradingSection']);
    Route::post('trading-section',['as'=>'trading-section','uses'=>'SectionController@submitTradingSection']);

    Route::get('advertise-section',['as'=>'advertise-section','uses'=>'SectionController@getAdvertiseSection']);
    Route::post('advertise-section',['as'=>'advertise-section','uses'=>'SectionController@submitAdvertiseSection']);

    Route::get('plan-section',['as'=>'plan-section','uses'=>'SectionController@getPlanSection']);
    Route::post('plan-section',['as'=>'plan-section','uses'=>'SectionController@submitPlanSection']);

    Route::get('about-section',['as'=>'about-section','uses'=>'SectionController@getAboutSection']);
    Route::post('about-section',['as'=>'about-section','uses'=>'SectionController@submitAboutSection']);
    Route::post('about-section2',['as'=>'about-section2','uses'=>'SectionController@submitAboutSection2']);
    Route::post('about-section3',['as'=>'about-section3','uses'=>'SectionController@submitAboutSection3']);
    Route::post('about-section4',['as'=>'about-section4','uses'=>'SectionController@submitAboutSection4']);

    Route::get('coupon-section',['as'=>'coupon-section','uses'=>'SectionController@getCouponSection']);
    Route::post('coupon-section',['as'=>'coupon-section','uses'=>'SectionController@submitCouponSection']);

    Route::get('counter-section',['as'=>'counter-section','uses'=>'SectionController@getCounterSection']);
    Route::post('counter-section',['as'=>'counter-section','uses'=>'SectionController@submitCounterSection']);

    Route::get('testimonial-section',['as'=>'testimonial-section','uses'=>'SectionController@getTestimonialSection']);
    Route::post('testimonial-section',['as'=>'testimonial-section','uses'=>'SectionController@submitTestimonialSection']);

    Route::get('subscriber-section',['as'=>'subscriber-section','uses'=>'SectionController@getSubscriberSection']);
    Route::post('subscriber-section',['as'=>'subscriber-section','uses'=>'SectionController@submitSubscriberSection']);

    Route::get('blog-section',['as'=>'blog-section','uses'=>'SectionController@getBlogSection']);
    Route::post('blog-section',['as'=>'blog-section','uses'=>'SectionController@submitBlogSection']);

    Route::get('team-section',['as'=>'team-section','uses'=>'SectionController@getTeamSection']);
    Route::post('team-section',['as'=>'team-section','uses'=>'SectionController@submitTeamSection']);

    Route::get('manage-welcome',['as'=>'manage-welcome','uses'=>'WebSettingController@manageWelcome']);
    Route::post('manage-welcome',['as'=>'manage-welcome','uses'=>'WebSettingController@updateWelcome']);
    
    Route::get('manage-welcome-message',['as'=>'manage-welcome-message','uses'=>'WebSettingController@manageWelcomeMessage']);
    Route::post('manage-welcome-message',['as'=>'manage-welcome-message','uses'=>'WebSettingController@updateWelcomeMessage']);
    
    // Telegram Management
    Route::get('telegram-commands',['as'=>'admin-telegram-commands','uses'=>'AdminTelegramController@getTelegramCommands']);
    Route::get('telegram-command-create',['as'=>'admin-telegram-command-create','uses'=>'AdminTelegramController@createView']);
    Route::post('telegram-command-create',['as'=>'admin-telegram-command-create-post','uses'=>'AdminTelegramController@createCommand']);
    Route::get('telegram-command-edit/{id}',['as'=>'admin-telegram-command-edit','uses'=>'AdminTelegramController@editView']);
    Route::post('telegram-command-edit',['as'=>'admin-telegram-command-edit-post','uses'=>'AdminTelegramController@updateCommand']);
    Route::delete('telegram-command-delete',['as'=>'admin-telegram-command-delete','uses'=>'AdminTelegramController@deleteCommand']);
    
    Route::get('telegram-spams',['as'=>'admin-telegram-spams','uses'=>'AdminTelegramController@getTelegramSpams']);
    Route::get('telegram-spam-edit/{id}',['as'=>'admin-telegram-spam-edit','uses'=>'AdminTelegramController@editSpamView']);
    Route::post('telegram-spam-edit',['as'=>'admin-telegram-spam-edit-post','uses'=>'AdminTelegramController@updateSpam']);
    Route::get('telegram-spam-create',['as'=>'admin-telegram-spam-create','uses'=>'AdminTelegramController@createSpamView']);
    Route::post('telegram-spam-create',['as'=>'admin-telegram-spam-create-post','uses'=>'AdminTelegramController@createSpam']);
    Route::delete('telegram-spam-delete',['as'=>'admin-telegram-spam-delete','uses'=>'AdminTelegramController@deleteSpam']);
    
    Route::get('reg-codes',['as'=>'reg-codes','uses'=>'CodeController@getCodes']);
    // Route::get('telegram-spam-edit/{id}',['as'=>'admin-telegram-spam-edit','uses'=>'AdminTelegramController@editSpamView']);
    // Route::post('telegram-spam-edit',['as'=>'admin-telegram-spam-edit-post','uses'=>'AdminTelegramController@updateSpam']);
    Route::get('code-create',['as'=>'code-create','uses'=>'CodeController@createCodeView']);
    Route::post('code-create',['as'=>'code-create-post','uses'=>'CodeController@createCode']);
    Route::delete('code-delete',['as'=>'code-delete','uses'=>'CodeController@deleteCode']);
});





