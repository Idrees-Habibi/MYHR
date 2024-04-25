<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\Paths.
 *
 * */
interface Paths
{
    public const ASSET_DIR_PATH = '/assets';

    public const ASSET_CSS = self::ASSET_DIR_PATH.'/css';

    public const ASSET_JS = self::ASSET_DIR_PATH.'/js';

    public const ASSET_IMAGES = self::ASSET_DIR_PATH.'/images';

    public const ASSET_LOGO = self::ASSET_IMAGES.'/logo.png';

    public const ASSET_DARK_LOGO = self::ASSET_IMAGES.'/logo.png';

    public const ASSET_SM_LOGO = self::ASSET_IMAGES.'/logo-sm.png';

    public const ASSET_DARK_SM_LOGO = self::ASSET_IMAGES.'/logo-dark-sm.png';

    public const ASSET_SVG = self::ASSET_IMAGES.'/svg';

    public const ASSET_USER_IMAGES = self::ASSET_IMAGES.'/users';

    public const ASSET_VENDOR = self::ASSET_DIR_PATH.'/vendor';

    public const PLACEHOLDERS = '/placeholders';

    public const STORAGE = '/storage';

    public const SOUNDS = '/sounds';

    public const ASSET_FAVICON = self::ASSET_IMAGES.'/favicon-1.png';

    public const PROFILE_IMAGE = 'profile-image';
}
