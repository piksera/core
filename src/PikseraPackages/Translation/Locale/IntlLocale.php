<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 2/12/2021
 * Time: 11:24 AM
 */

namespace PikseraPackages\Translation\Locale;

use PikseraPackages\Translation\LanguageHelper;
use PikseraPackages\Translation\Locale\Traits\DetailsByLocaleTrait;
use PikseraPackages\Translation\Locale\Traits\LanguagesByLocaleTrait;
use PikseraPackages\Translation\Locale\Traits\RegionByLocaleTrait;

class IntlLocale
{
    use DetailsByLocaleTrait, LanguagesByLocaleTrait, RegionByLocaleTrait;

    public static function getDisplayRegion($locale)
    {
        if (isset(self::$regionsByLocale[$locale])) {
            return self::$regionsByLocale[$locale];
        }

        return false;
    }

    public static function getDisplayLanguage($locale)
    {
       return LanguageHelper::getDisplayLanguage($locale);
    }

    public static function getDisplayName($locale)
    {
        if (isset(self::$detailsByLocale[$locale]['name'])) {
            return self::$detailsByLocale[$locale]['name'];
        }

        foreach (self::$detailsByLocale as $detailLocale) {
            if (isset($detailLocale['locale'])) {
                if ($detailLocale['locale'] == $locale) {

                    if (isset($detailLocale['name'])) {
                        return $detailLocale['name'];
                    }
                }
            }
        }

        return false;
    }

    public static function getDisplayFlag($locale)
    {
        if (isset(self::$detailsByLocale[$locale]['flag'])) {
            return self::$detailsByLocale[$locale]['flag'];
        }

        foreach (self::$detailsByLocale as $detailLocale) {
            if (isset($detailLocale['locale'])) {
                if ($detailLocale['locale'] == $locale) {
                    if (isset($detailLocale['flag'])) {
                        return $detailLocale['flag'];
                    }
                }
            }
        }


        $locale_explode = explode('_', $locale);
        if (isset($locale_explode[1])) {
            $flagLocale = strtolower($locale_explode[1]);
            return $flagLocale;
        }


        return false;
    }
}
