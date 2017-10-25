<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Captcha,Validator;
class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//验证码
		Validator::extend('captcha', function($attribute, $value, $parameters) {
            if(Captcha::check($value)){
				return true;
			}else{
				return false;
			}
        });
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
