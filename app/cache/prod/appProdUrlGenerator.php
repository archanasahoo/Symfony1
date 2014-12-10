<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'IbwJobeetBundle_category' => array (  0 =>   array (    0 => 'slug',    1 => 'page',  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\CategoryController::showAction',    'page' => 1,  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'page',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'slug',    ),    2 =>     array (      0 => 'text',      1 => '/category',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/ibw_job/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job_show' => array (  0 =>   array (    0 => 'company',    1 => 'location',    2 => 'id',    3 => 'position',  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'position',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'location',    ),    3 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'company',    ),    4 =>     array (      0 => 'text',      1 => '/ibw_job',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/ibw_job/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/ibw_job/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job_edit' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/ibw_job',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job_update' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/ibw_job',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job_delete' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/ibw_job',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_job_preview' => array (  0 =>   array (    0 => 'company',    1 => 'location',    2 => 'token',    3 => 'position',  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::previewAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'position',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'location',    ),    3 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'company',    ),    4 =>     array (      0 => 'text',      1 => '/ibw_job',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ibw_jobeet_homepage' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Ibw\\JobeetBundle\\Controller\\JobController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/hello',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
