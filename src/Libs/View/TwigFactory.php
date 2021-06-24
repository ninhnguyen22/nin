<?php

namespace Nin\Libs\View;

class TwigFactory implements ViewFactory
{
    public function getRenderer(): Renderer
    {
        return new TwigRenderer();
    }

    public function getPageTemplate(): PageTemplate
    {
        return new TwigPageTemplate();
    }
}
