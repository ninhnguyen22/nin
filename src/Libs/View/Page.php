<?php

namespace Nin\Libs\View;

class Page
{
    public function render(ViewFactory $factory, $arguments): string
    {
        $renderer = $factory->getRenderer();
        $pageTemplate = $factory->getPageTemplate();
        $viewPath = $pageTemplate->getStringTemplate();
        return $renderer->render($viewPath, $arguments);
    }
}
