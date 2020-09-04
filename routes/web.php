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

Route::get('change/lang/{locale}', 'HomeController@changeLang')->where('locale', '(az)|(en)|(ru)')->name('change_lang');

Route::group(['middleware' => ['lang']], function () {
    Route::post('/register/visitor','HomeController@visitor')->name('front.visitor.register');
    Route::get('/', 'HomeController@index')->name('front.home');
    Route::get('/faq', 'HomeController@faq')->name('front.faq');
    Route::get('/about', 'HomeController@about')->name('front.about');
    Route::get('/projects', 'HomeController@projects')->name('front.projects');
    Route::get('/project/{slug}', 'HomeController@getProject')->name('front.project');
    Route::get('/prepared-projects/{slug}', 'HomeController@getPreparedProject')->name('front.prepared.projects');
    Route::get('/portfolios', 'HomeController@portfolio')->name('front.portfolios');
    Route::get('/portfolio/{slug}', 'HomeController@getPortfolio')->name('front.portfolio');
    Route::get('/designs', 'HomeController@design')->name('front.designs');
    Route::get('/design/{slug}', 'HomeController@getDesign')->name('front.design');
    Route::get('/contacts', 'HomeController@contacts')->name('front.contacts');
    Route::get('/career', 'HomeController@career')->name('front.careers');
    Route::get('/vacancy/{slug}', 'HomeController@getVacancy')->name('front.vacancy');
    Route::post('/send/cv', 'HomeController@sendCV')->name('front.send.cv');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login.post');

    Route::group(['middleware' => 'auth:web'], function () {

        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

        Route::get('/site-title', 'Admin\HomeController@index')->name('admin.home');
        Route::post('/setting/save', 'Admin\HomeController@saveSite')->name('admin.save.setting');

        Route::post('/about/save', 'Admin\HomeController@saveAbout')->name('admin.save.about');

        Route::get('/articles', 'Admin\ArticleController@index')->name('admin.articles');
        Route::get('/article/{id}', 'Admin\ArticleController@writeArticle')->name('admin.write.article');
        Route::post('/article', 'Admin\ArticleController@saveOrEdit')->name('admin.save.article');
        Route::get('/article-delete/{id}', 'Admin\ArticleController@delete')->name('admin.delete.article');

        Route::get('/questions', 'Admin\QuestionController@index')->name('admin.questions');
        Route::get('/question/{id}', 'Admin\QuestionController@writeQuestion')->name('admin.write.question');
        Route::post('/question', 'Admin\QuestionController@saveOrEdit')->name('admin.save.question');
        Route::get('/question-delete/{id}', 'Admin\QuestionController@delete')->name('admin.delete.question');

        Route::get('/partners', 'Admin\PartnerController@index')->name('admin.partners');
        Route::get('/partner/{id}', 'Admin\PartnerController@getPartner')->name('admin.write.partner');
        Route::post('/partner', 'Admin\PartnerController@saveOrEdit')->name('admin.save.partner');
        Route::get('/partner-delete/{id}', 'Admin\PartnerController@delete')->name('admin.delete.partner');


        Route::get('/videos', 'Admin\HomeController@video')->name('admin.videos');
        Route::get('/video/{id}', 'Admin\HomeController@addVideo')->name('admin.add.video');
        Route::post('/video', 'Admin\HomeController@saveOrEditVideo')->name('admin.save.video');
        Route::get('/video-delete/{id}', 'Admin\HomeController@deleteVideo')->name('admin.delete.video');

        Route::get('/setting', 'Admin\SettingController@setting')->name('admin.setting');
        Route::get('/slider', 'Admin\HomeController@slider')->name('admin.slider');
        Route::get('/information', 'Admin\HomeController@information')->name('admin.information');
        Route::get('/video_gallery', 'Admin\HomeController@videoGallery')->name('admin.video_gallery');
        Route::get('/contact', 'Admin\HomeController@contact')->name('admin.contact');
        Route::get('/footer', 'Admin\HomeController@footer')->name('admin.footer');
        Route::get('/contact', 'Admin\HomeController@contact')->name('admin.contact');
        Route::get('/reservation', 'Admin\HomeController@reservation')->name('admin.reservation');
        Route::get('/services', 'Admin\HomeController@services')->name('admin.services');
        Route::get('/baby', 'Admin\HomeController@baby')->name('admin.baby');
        Route::get('/about', 'Admin\HomeController@about')->name('admin.about');
        Route::get('/about1', 'Admin\HomeController@about1')->name('admin.about1');
        Route::get('/reply', 'Admin\HomeController@reply')->name('admin.reply');

//        projects
        Route::get('/projects', 'Admin\ProjectController@index')->name('admin.projects');
        Route::get('/project/{id}', 'Admin\ProjectController@addOrEditProject')->name('admin.project');
        Route::post('/project/save', 'Admin\ProjectController@saveProject')->name('admin.save.project');
        Route::get('/project/delete/{id}', 'Admin\ProjectController@deleteProject')->name('admin.project.delete');
        Route::post('/project/order','Admin\ProjectController@changeOrder');
        Route::post('/project_image/order','Admin\ProjectController@changeOrderImage');
        Route::get('/project/image/delete/{id}', 'Admin\ProjectController@deleteProjectImage')->name('admin.project.image.delete');

//        prepared projects
        Route::get('/prepared-projects', 'Admin\ProjectController@indexPrepared')->name('admin.prepared.projects');
        Route::get('/prepared-project/{id}', 'Admin\ProjectController@addOrEditProjectPrepared')->name('admin.prepared.project');
        Route::post('/prepared-project/save', 'Admin\ProjectController@saveProjectPrepared')->name('admin.save.prepared.project');
        Route::get('/prepared-project/delete/{id}', 'Admin\ProjectController@deleteProjectPrepared')->name('admin.project.prepared.delete');
        Route::post('/prepared-project/order','Admin\ProjectController@changeOrderPrepare');
        //        portfolio
        Route::get('/portfolio', 'Admin\PortfolioController@index')->name('admin.portfolios');
        Route::get('/portfolio/{id}', 'Admin\PortfolioController@addOrEditProject')->name('admin.portfolio');
        Route::post('/portfolio/save', 'Admin\PortfolioController@saveProject')->name('admin.save.portfolio');
        Route::get('/portfolio/delete/{id}', 'Admin\PortfolioController@deleteProject')->name('admin.portfolio.delete');

        //        projects
        Route::get('/design', 'Admin\DesignController@index')->name('admin.designs');
        Route::get('/design/{id}', 'Admin\DesignController@addOrEditProject')->name('admin.design');
        Route::post('/design/save', 'Admin\DesignController@saveProject')->name('admin.save.design');
        Route::get('/design/delete/{id}', 'Admin\DesignController@deleteProject')->name('admin.design.delete');
        Route::post('/design/order','Admin\DesignController@changeOrder');
        Route::post('/design_image/order','Admin\DesignController@changeOrderImage');
        Route::get('/design/image/delete/{id}', 'Admin\DesignController@deleteDesignImage')->name('admin.design.image.delete');

//        vacancies
        Route::get('/vacancies', 'Admin\VacancyController@index')->name('admin.vacancies');
        Route::get('/vacancy/{id}', 'Admin\VacancyController@addOrEdit')->name('admin.vacancy');
        Route::post('/vacancy/save', 'Admin\VacancyController@save')->name('admin.save.vacancy');
        Route::get('/vacancy/delete/{id}', 'Admin\VacancyController@delete')->name('admin.vacancy.delete');

        Route::get('/', 'Admin\StatisticController@index')->name('admin.statistics');

        Route::get('/dev/order123',function(){
            $projects = App\Project::with('projectImages')->where('type',0)->orderBy('order')->get();
            $i = 1;
            foreach ($projects as $project){
                $project->order = $i;
                $i++;
                $k = 1;
                foreach($project->projectImages as $image){
                    $image->order = $k;
                    $image->save();
                    $k++;
                }
                $project->save();
            }
            $projects = App\Project::with('projectImages')->where('type',1)->orderBy('order')->get();
            $i = 1;
            foreach ($projects as $project){
                $project->order = $i;
                $i++;
                $k = 1;
                foreach($project->projectImages as $image){
                    $image->order = $k;
                    $image->save();
                    $k++;
                }
                $project->save();
            }
            $designs = App\Design::with('images')->get();
            $i = 1;
            foreach ($designs as $design){
                $design->order = $i;
                $i++;
                $k = 1;
                foreach($design->images as $image){
                    $image->order = $k;
                    $image->save();
                    $k++;
                }
                $design->save();
            }
            return 'success';
        });
    });
});
