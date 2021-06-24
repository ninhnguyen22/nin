<?php

namespace Nin\Libs\View;

/**
 * The Abstract Factory interface declares creation methods for each distinct
 * product type.
 */
interface ViewFactory
{
    public function getPageTemplate(): PageTemplate;

    public function getRenderer(): Renderer;
}
