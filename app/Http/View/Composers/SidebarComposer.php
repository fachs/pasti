<?php

namespace App\Http\View\Composers;

use App\Main\SidebarPanel;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!is_null(request()->route())) {
            $pageName = request()->route()->getName();
            $routePrefix = explode('/', $pageName)[0] ?? '';

            switch ($routePrefix) {
                case 'keuangan':
                    $view->with('sidebarMenu', SidebarPanel::keuangan());
                    break;
                case 'persuratan':
                    $view->with('sidebarMenu', SidebarPanel::persuratan());
                    break;
                case 'publikasi':
                    $view->with('sidebarMenu', SidebarPanel::publikasi());
                    break;
                case 'tentang':
                    $view->with('sidebarMenu', SidebarPanel::tentang());
                    break;    
                default:
                    $view->with('sidebarMenu', SidebarPanel::dashboards());
            }
            
            $view->with('allSidebarItems', SidebarPanel::all());
            $view->with('pageName', $pageName);
            $view->with('routePrefix', $routePrefix);
        }
    }
}
