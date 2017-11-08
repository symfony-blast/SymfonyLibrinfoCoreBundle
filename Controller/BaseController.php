<?php

/*
 * This file is part of the Sil Project.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Blast\Bundle\CoreBundle\Controller;

use Sonata\AdminBundle\Controller\CoreController as BaseCoreController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BaseController.
 *
 * Extends this controller if you want to render a custom view withing sonata'as admin layout.
 * Your view has to extends the sonata's admin layout (or overrided layouts)
 */
class BaseController extends BaseCoreController
{
    /**
     * render.
     *
     *  ** Overrided to add default sonata's twig parameters
     *
     * @param string        $view
     * @param array         $parameters
     * @param Response|null $response
     *
     * @return Response
     */
    public function render($view, array $parameters = array(), Response $response = null)
    {
        $blocks = array(
            'top'    => array(),
            'left'   => array(),
            'center' => array(),
            'right'  => array(),
            'bottom' => array(),
        );

        foreach ($this->container->getParameter('sonata.admin.configuration.dashboard_blocks') as $block) {
            $blocks[$block['position']][] = $block;
        }

        $completeParameters = [
            'base_template' => $this->getBaseTemplate(),
            'admin_pool'    => $this->container->get('sonata.admin.pool'),
            'blocks'        => $blocks,
        ];

        return parent::render($view, array_merge($parameters, $completeParameters), $response); // TODO: Change the autogenerated stub
    }
}
