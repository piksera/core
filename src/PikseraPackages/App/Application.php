<?php

namespace PikseraPackages\App;

use PikseraPackages\App\Managers\CacheManager;
use PikseraPackages\App\Managers\ConfigurationManager;
use PikseraPackages\App\Managers\Helpers\Lang;
use PikseraPackages\App\Managers\LogManager;
use PikseraPackages\App\Managers\NotificationsManager;
use PikseraPackages\App\Managers\PermalinkManager;
use PikseraPackages\App\Managers\Ui;

use PikseraPackages\Cart\Repositories\CartRepository;
use PikseraPackages\Category\Repositories\CategoryRepository;
use PikseraPackages\Content\Repositories\ContentRepository;
use PikseraPackages\CustomField\Repositories\CustomFieldRepository;
use PikseraPackages\Helper\HTMLClean;
use PikseraPackages\Helper\XSSSecurity;
use PikseraPackages\Media\Repositories\MediaRepository;
use PikseraPackages\Menu\Repositories\MenuRepository;
use PikseraPackages\Piksera\Piksera;
use PikseraPackages\Module\Repositories\ModuleRepository;
use PikseraPackages\Multilanguage\Repositories\MultilanguageRepository;
use PikseraPackages\Multilanguage\TranslateManager;
use PikseraPackages\Offer\Repositories\OfferRepository;
use PikseraPackages\Option\Repositories\OptionRepository;
use PikseraPackages\Order\Repositories\OrderRepository;
use PikseraPackages\Payment\PaymentManager;
use PikseraPackages\Repository\RepositoryManager;
use PikseraPackages\Shipping\ShippingManager;
use PikseraPackages\Translation\Translator;
use PikseraPackages\User\UserManager;
use PikseraPackages\Utils\Captcha\CaptchaManager;
use PikseraPackages\Cart\CartManager;
use PikseraPackages\Category\CategoryManager;
use PikseraPackages\Checkout\CheckoutManager;
use PikseraPackages\Content\AttributesManager;
use PikseraPackages\Content\ContentManager;
use PikseraPackages\Content\DataFieldsManager;
use PikseraPackages\Database\DatabaseManager;
use PikseraPackages\Event\Event;
use PikseraPackages\CustomField\FieldsManager;
use PikseraPackages\Form\FormsManager;
use PikseraPackages\Helper\Format;
use PikseraPackages\Helper\UrlManager;
use PikseraPackages\Media\MediaManager;
use PikseraPackages\Menu\MenuManager;
use PikseraPackages\Module\ModuleManager;
use PikseraPackages\Option\OptionManager;
use PikseraPackages\Order\OrderManager;
use PikseraPackages\Shop\ShopManager;
use PikseraPackages\Tag\TagsManager;
use PikseraPackages\Tax\TaxManager;
use PikseraPackages\Template\LayoutsManager;
use PikseraPackages\Template\Template;
use PikseraPackages\Template\TemplateManager;
use PikseraPackages\Utils\Http\Http;

/**
 * Application class.
 *
 * Class that loads other classes
 *
 * @category Application
 * @desc
 *
 * @property UrlManager                    $url_manager
 * @property HTMLClean                            $html_clean
 * @property XSSSecurity                            $xss_security
 * @property Format                            $format
 * @property ContentManager                $content_manager
 * @property RepositoryManager                $repository_manager
 * @property ContentRepository                $content_repository
 * @property CategoryManager               $category_manager
 * @property CategoryRepository              $category_repository
 * @property MenuManager                   $menu_manager
 * @property MenuRepository              $menu_repository
 * @property MediaManager                  $media_manager
 * @property MediaRepository                  $media_repository
 * @property ShopManager                   $shop_manager
 * @property CartManager              $cart_manager
 * @property CartRepository         $cart_repository
 * @property OrderManager             $order_manager
 * @property OrderRepository    $order_repository
 * @property CustomFieldRepository $custom_field_repository
 * @property OfferRepository             $offer_repository
 * @property TaxManager               $tax_manager
 * @property CheckoutManager          $checkout_manager
 * @property ShippingManager          $shipping_manager
 * @property PaymentManager          $payment_manager
 * @property OptionManager                 $option_manager
 * @property OptionRepository                 $option_repository
 * @property CacheManager                  $cache_manager
 * @property UserManager                   $user_manager
 * @property DatabaseManager              $database_manager
 * @property NotificationsManager          $notifications_manager
 * @property LayoutsManager                $layouts_manager
 * @property LogManager                    $log_manager
 * @property FieldsManager                 $fields_manager
 * @property Template                      $template
 * @property Event                         $event_manager
 * @property ConfigurationManager          $config_manager
 * @property TemplateManager               $template_manager
 * @property CaptchaManager               $captcha_manager
 * @property Ui                            $ui
 * @property Http                              $http
 * @property FormsManager                  $forms_manager
 * @property DataFieldsManager     $data_fields_manager
 * @property TagsManager           $tags_manager
 * @property AttributesManager     $attributes_manager
 * @property Lang                  $lang_helper
 * @property PermalinkManager              $permalink_manager
 * @property ModuleManager              $module_manager
 * @property ModuleRepository              $module_repository
 * @property Translator                    $translator
 * @property MultilanguageRepository       $multilanguage_repository
 * @property TranslateManager       $translate_manager
 * @property Piksera       $piksera




*/
class Application
{
    public static $instance;

    public function __construct($params = null)
    {
        $instance = app();
        self::$instance = $instance;

        return self::$instance;
    }

    public static function getInstance($params = null)
    {
        if (self::$instance == null) {
            self::$instance = app();
        }

        return self::$instance;
    }

    public function make($property)
    {
        return app()->make($property);
    }

    public function __get($property)
    {
        return $this->make($property);
    }
}
