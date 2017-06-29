<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Hash;
use App\Models\Settings;
use App\Models\LoaiSp;
use App\Models\Cate;
use App\Models\CustomLink;
use Jenssegers\Agent\Agent;
class ViewComposerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//Call function composerSidebar
		$this->composerMenu();	
		
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Composer the sidebar
	 */
	private function composerMenu()
	{		
		view()->composer( '*' , function( $view ){				
			$agent = new Agent();
			if(!$agent->isMobile() && !$agent->isTablet()){
				$is_web = true;
			}else{
				$is_web = false;
			}
	        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
	        $loaiSpList = LoaiSp::where('status', 1)->orderBy('display_order', 'asc')->get();
	        foreach($loaiSpList as $loaiSp){
	        	$cateList[$loaiSp->id] = Cate::where(['status' => 1, 'loai_id' => $loaiSp->id])->orderBy('display_order', 'asc')->get();
	        }        
	        

			$view->with(['settingArr' => $settingArr, 'loaiSpList' => $loaiSpList, 'cateList' => $cateList, 'is_web' => $is_web]);
			
		});
	}
	
}
