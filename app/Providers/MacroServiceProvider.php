<?php
    namespace App\Providers;
    
    use App\Services\Macros;
    use Collective\Html\HtmlServiceProvider;
    
class MacroServiceProvider extends HtmlServiceProvider
{
    public function register()
    {
        parent::register();

        $this->app->singleton('form', function ($app) {
            $form = new Macros($app['html'], $app['url'], $app['view'], $app['session.store']->getToken());
            return $form->setSessionStore($app['session.store']);
        });
    }
        
    public function boot()
    {
        \Form::component('bsText', 'components.form.text', ['name', 'value'=>null, 'attributes'=>[]]);
        \Form::component('wysiwyg', 'components.form.wysiwyg', ['name', 'value'=>null, 'attributes'=>[], 'help'=>null]);
        \Form::component('linksarray', 'components.form.linksarray', ['name', 'value'=>null, 'attributes'=>[]]);
        \Form::component('bsTextarea', 'components.form.textarea', ['name', 'value'=>null, 'attributes'=>[], 'help' => null]);
        \Form::component('bsFile', 'components.form.file', ['name', 'value'=>null, 'attributes'=>[], 'help'=>null]);
    }
}
