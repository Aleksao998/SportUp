<?php



namespace frontend\assets;



use yii\web\AssetBundle;



/**

 * Main frontend application asset bundle.

 */

class AppAsset extends AssetBundle

{

    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [

        'css/site1.css',

        'css/margin_padding.css',

        'css/bootstrap-grid.css',

        'css/index_page.css',

        'css/footer.css',

        'css/contact.css',

        'css/baza_trener.css',

        'css/animate.css',

        'css/backend.css',

        'css/croppie.css',

        'css/login.css'



    ];

    public $js = [
      'js/jquery.js',

      'js/jquery2.js',

      'js/script.js',

      'js/paggination.js',

      'js/bootstrap.min.js',

      'js/croppie.js',

      'js/owl.carousel.min.js'



    ];

    public $depends = [

        'yii\web\YiiAsset',

        'yii\bootstrap\BootstrapAsset',

    ];

}
