### Feature

```php
use VigihDev\SymfonyBridge\Config\Service\ServiceLocator;
use Vigihdev\WpKernel\WpKernel;
use Vigihdev\WpAssets\Contracts\Manager\{
    CssManagerInterface,
    JsManagerInterface,
    AppAssetManagerInterface,
    JsLocalizerManagerInterface,
    JqueryManagerInterface,
    JsModuleManagerInterface,
};
use Vigihdev\WpAssets\Support\AssetHelper;

WpKernel::boot(
    basePath: __DIR__,
    configDir: 'config',
    enableAutoInjection: true,
);


/** @var JsManagerInterface $js  */
$js = ServiceLocator::get(JsManagerInterface::class);
$js->publish();

/** @var CssManagerInterface $css  */
$css = ServiceLocator::get(CssManagerInterface::class);
$css->publish();

/** @var AppAssetManagerInterface $appAsset  */
$appAsset = ServiceLocator::get(AppAssetManagerInterface::class);
$appAsset->publish();

/** @var JsLocalizerManagerInterface $jsLocalizer  */
$jsLocalizer = ServiceLocator::get(JsLocalizerManagerInterface::class);
$jsLocalizer->publish();

/** @var JqueryManagerInterface $jquery  */
$jquery = ServiceLocator::get(JqueryManagerInterface::class);
$jquery->publish();

/** @var JsModuleManagerInterface $jsModule  */
$jsModule = ServiceLocator::get(JsModuleManagerInterface::class);
$jsModule->publish();

```
