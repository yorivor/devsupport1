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

/*		Mobile		*/
Route::get('/m', 'MobileController@index');
/*		Mobile		*/

Route::get('/', 'IndexController@index');
Route::get('outage/{id}', 'IndexController@outage');
Route::get('downtime/{id}', 'IndexController@downtime');
Route::get('agent_page', 'IndexController@agent');
Route::get('downtime_list', 'IndexController@agent');
Route::get('articlelist', 'IndexController@articlelist');
Route::get('knowledgebase', 'IndexController@knowledgelist');
Route::get('knowsubcat/{id}', 'IndexController@knowledgesubcat');
Route::get('knowsublist/{id}/{subid}', 'IndexController@knowledgesublist');
Route::get('knowdesc/{id}/{subid}/{usid}', 'IndexController@knowdesc');
Route::get('whatshot', 'IndexController@whatshot');
Route::get('whatshotlist/{id}', 'IndexController@whatshotlist');
Route::get('whatshotdesc/{id}/{hotid}', 'IndexController@whatshotdesc');

// Tech Page
Route::get('baseknowledge', 'BaseKnowledgeController@listknowledge');
Route::get('subcatknowledge/{id}', 'BaseKnowledgeController@subcatknowledge');
Route::get('sublistknow/{id}/{subid}', 'BaseKnowledgeController@sublistknow');
Route::get('descknow/{id}/{subid}/{usid}', 'BaseKnowledgeController@descknow');

//LS Page
Route::get('lstoparticles', 'LessonController@lstoparticles');
Route::get('lssubcatknowledge/{id}', 'LessonController@lssubcatknowledge');
Route::get('lssublistknow/{id}/{subid}', 'LessonController@lssublistknow');
Route::get('lsdescknow/{id}/{subid}/{usid}', 'LessonController@lsdescknow');

//Live search
Route::get('search','BaseKnowledgeController@hanap');
Route::get('/reach','BaseKnowledgeController@search');

//Ticket
Route::get('ticketing','BaseKnowledgeController@ticketing');
Route::post('ticketing', ['as' => 'ticketing.post', 'uses' => 'BaseKnowledgeController@ticks']);
Route::get('outage_concern','BaseKnowledgeController@out_ticket');
Route::post('outage_concern', ['as' => 'outage_concern.post', 'uses' => 'BaseKnowledgeController@outage_concern']);

//LSTicket
Route::get('lsticketing','LessonController@lsticketing');
Route::post('lsticketing', ['as' => 'lsticketing.post', 'uses' => 'LessonController@lsticks']);

Route::get('auth', 'LoginController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User Controller
Route::get('user_management', 'UserController@index');
Route::get('userlist', 'UserController@show');
Route::get('register', ['as' => 'register', 'uses' => 'UserController@createform']);
Route::post('register', ['as' => 'register.post', 'uses' => 'UserController@create']);
Route::get('delete_user/{id}', 'UserController@destroy');
Route::get('edit_user/{id}', 'UserController@edit');
Route::post('edituser/{id}', ['as' => 'edit_user.post', 'uses' => 'UserController@update']);
Route::get('change_pass/{id}', 'UserController@changeform');
Route::post('change_pass/{id}', ['as' => 'change_pass.post', 'uses' => 'UserController@updatepass']);

//Article Controller
Route::get('article_management', 'ArticleController@index');
Route::get('advirosry_add', ['as' => 'advirosry_add', 'uses' => 'ArticleController@show']);
Route::post('advirosry_add', ['as' => 'advirosry_add.post', 'uses' => 'ArticleController@creation']);
Route::get('advirosry_edit/{id}', ['as' => 'advirosry_edit', 'uses' => 'ArticleController@editadvisory']);
Route::post('advirosry_edit/{id}', ['as' => 'advirosry_edit.post', 'uses' => 'ArticleController@updateadvisory']);
Route::get('advirosry_delete/{id}', 'ArticleController@destroyadvisory');
Route::get('article_add', ['as' => 'article_add', 'uses' => 'ArticleController@create']);
Route::post('article_add', ['as' => 'article_add.post', 'uses' => 'ArticleController@store']);
Route::get('article_edit/{id}', ['as' => 'article_edit', 'uses' => 'ArticleController@edit']);
Route::post('article_edit/{id}', ['as' => 'article_edit.post', 'uses' => 'ArticleController@update']);
Route::get('article_delete/{id}', 'ArticleController@destroy');
Route::get('article_active/{id}', 'ArticleController@active');
Route::get('article_resolve/{id}', 'ArticleController@resolve');

//Tech Outage
Route::get('techs', 'ArticleController@techoutage');
Route::post('techs', ['as' => 'techs.post', 'uses' => 'ArticleController@techcreate']);
Route::get('techs_edit/{id}', ['as' => 'techs_edit', 'uses' => 'ArticleController@edittechs']);
Route::post('techs_edit/{id}', ['as' => 'techs_edit.post', 'uses' => 'ArticleController@updatetechs']);

//About Controller
Route::get('about_management', 'AboutController@index');
Route::get('whoweare', ['as' => 'whoweare', 'uses' => 'AboutController@thewho']);
Route::post('whoweare', ['as' => 'whoweare.post', 'uses' => 'AboutController@createwho']);
Route::get('whatwevalue', ['as' => 'whatwevalue', 'uses' => 'AboutController@thevalue']);
Route::post('whatwevalue', ['as' => 'whatwevalue.post', 'uses' => 'AboutController@createvalue']);
Route::get('ourbrand', ['as' => 'ourbrand', 'uses' => 'AboutController@thebrand']);
Route::post('ourbrand', ['as' => 'ourbrand.post', 'uses' => 'AboutController@createbrand']);
Route::get('ourmission', ['as' => 'ourmission', 'uses' => 'AboutController@themission']);
Route::post('ourmission', ['as' => 'ourmission.post', 'uses' => 'AboutController@createmission']);
Route::get('ourvision', ['as' => 'ourvision', 'uses' => 'AboutController@thevision']);
Route::post('ourvision', ['as' => 'ourvision.post', 'uses' => 'AboutController@createvision']);

//Knowledge Base Controller
Route::get('knowledge_management', 'KnowledgebaseController@index');
Route::get('add_category', ['as' => 'add_category', 'uses' => 'KnowledgebaseController@category_create']);
Route::post('add_category', ['as' => 'add_category.post', 'uses' => 'KnowledgebaseController@category_store']);
Route::get('editd_category/{id}', ['as' => 'editd_category', 'uses' => 'KnowledgebaseController@edit']);
Route::post('editd_category/{id}', ['as' => 'editd_category.post', 'uses' => 'KnowledgebaseController@update']);
Route::get('delete_category/{id}', 'KnowledgebaseController@destroy');

//top KB
Route::get('top_knowbase', 'KnowledgebaseController@top_knowbase');
Route::post('knowbase_top', ['as' => 'knowbase_top.post', 'uses' => 'KnowledgebaseController@createtop']);
Route::get('what_time', 'KnowledgebaseController@what_time');
Route::post('time_what', ['as' => 'time_what.post', 'uses' => 'KnowledgebaseController@createwait']);

//top ls kb
Route::get('ls_top_knowbase', 'KnowledgebaseController@ls_top_knowbase');
Route::post('knowbase_top_ls', ['as' => 'knowbase_top_ls.post', 'uses' => 'KnowledgebaseController@createtopls']);

//Category Setup
Route::get('category_setup/{id}', 'KnowledgebaseController@setup');

//Category - Article
Route::get('cat_article/{id}', ['as' => 'cat_article', 'uses' => 'KnowledgebaseController@cat_article']);
Route::post('cat_article/{id}', ['as' => 'cat_article.post', 'uses' => 'KnowledgebaseController@store_cat_article']);

// Sub category
Route::get('sub_category/{id}', ['as' => 'sub_category', 'uses' => 'KnowledgebaseController@subcat']);
Route::post('sub_category/{id}', ['as' => 'sub_category.post', 'uses' => 'KnowledgebaseController@store_subcat']);
Route::get('edit_sub_category/{id}/{idsub}', ['as' => 'edit_sub_category', 'uses' => 'KnowledgebaseController@editsubcat']);
Route::post('edit_sub_category/{id}/{idsub}', ['as' => 'edit_sub_category.post', 'uses' => 'KnowledgebaseController@update_subcat']);
Route::get('delete_sub_category/{id}/{idsub}', 'KnowledgebaseController@destroysub');

// Knowledge Base - Article
Route::get('add_knowledge_article/{id}/{idsub}', ['as' => 'add_knowledge_article', 'uses' => 'KnowledgebaseController@knowledge_article']);
Route::post('add_knowledge_article/{id}/{idsub}', ['as' => 'add_knowledge_article.post', 'uses' => 'KnowledgebaseController@store_knowledge_article']);
Route::get('edit_knowledge_article/{id}/{idsub}/{kaid}', ['as' => 'edit_knowledge_article', 'uses' => 'KnowledgebaseController@knowledge_articleedit']);
Route::post('edit_knowledge_article/{id}/{idsub}/{kaid}', ['as' => 'edit_knowledge_article.post', 'uses' => 'KnowledgebaseController@update_knowledge_article']);
Route::get('delete_knowledge/{id}/{idsub}/{kaid}', 'KnowledgebaseController@destroyka');

//Slide
Route::get('slide_management', 'SlideController@index');
Route::get('add_slide', ['as' => 'add_slide', 'uses' => 'SlideController@create']);
Route::post('add_slide', ['as' => 'add_slide.post', 'uses' => 'SlideController@store']);
Route::get('edit_slide/{id}', ['as' => 'edit_slide', 'uses' => 'SlideController@edit']);
Route::post('edit_slide/{id}', ['as' => 'edit_slide.post', 'uses' => 'SlideController@update']);
Route::get('delete_slide/{id}', 'SlideController@destroy');

//Whats Hot
Route::get('whatshot_management', 'WhatshotController@index');
Route::get('add_hotcat', ['as' => 'add_hotcat', 'uses' => 'WhatshotController@create']);
Route::post('add_hotcats', ['as' => 'add_hotcats.post', 'uses' => 'WhatshotController@store']);
Route::get('edit_hotcat/{id}', ['as' => 'edit_hotcat', 'uses' => 'WhatshotController@show']);
Route::post('edit_hotcats/{id}', ['as' => 'edit_hotcats.post', 'uses' => 'WhatshotController@edit']);
Route::get('delete_hotcats/{id}', 'WhatshotController@destroycat');
Route::get('add_hotarticle', ['as' => 'add_hotarticle', 'uses' => 'WhatshotController@hotcreate']);
Route::post('add_hotarticles', ['as' => 'add_hotarticles.post', 'uses' => 'WhatshotController@hotadd']);
Route::get('list_whatshot', 'WhatshotController@hotlist');
Route::get('edit_hotarticles/{id}', ['as' => 'edit_hotarticles', 'uses' => 'WhatshotController@edit_hotart']);
Route::post('edit_hotarticles/{id}', ['as' => 'edit_hotart.post', 'uses' => 'WhatshotController@hotedit']);
Route::get('delete_hotart/{id}', 'WhatshotController@destroyart');