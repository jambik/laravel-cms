<?php

namespace App\Http\Controllers;

use App\Block;
use App\Category;
use App\Settings;

class FrontendController extends Controller
{
    protected $settings = null;

    public function __construct()
    {
        // Categories
        $categories = Category::withDepth()->defaultOrder()->get()->toTree();
        view()->share('categories', $categories);

        // Blocks
        $blocks = Block::all()->keyBy('alias');
        view()->share('blocks', $blocks);

        // Settings
        $settings = Settings::find(1);
        view()->share('settings', $settings);

        // Set settings to controller
        $this->settings = $settings;
    }
}
