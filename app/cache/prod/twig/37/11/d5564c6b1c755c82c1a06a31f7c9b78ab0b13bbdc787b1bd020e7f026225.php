<?php

/* IbwJobeetBundle::layout.html.twig */
class __TwigTemplate_3711d5564c6b1c755c82c1a06a31f7c9b78ab0b13bbdc787b1bd020e7f026225 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>
            ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 8
        echo "        </title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 15
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ibwjobeet/images/favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div id=\"container\">
            <div id=\"header\">
                <div class=\"content\">
                    <h1><a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("ibw_job");
        echo "\">
                        <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ibwjobeet/images/logo.jpg"), "html", null, true);
        echo "\" alt=\"Jobeet Job Board\" />
                    </a></h1>
 
                    <div id=\"sub_header\">
                        <div class=\"post\">
                            <h2>Ask for people</h2>
                            <div>
                                #<a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("ibw_job");
        echo "\">Post a Job</a>
\t\t\t\t\t\t\t\t<a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("ibw_job_new");
        echo "\">Post a Job</a>
                            </div>
                        </div>
 
                        <div class=\"search\">
                            <h2>Ask for a job</h2>
                            <form action=\"\" method=\"get\">
                                <input type=\"text\" name=\"keywords\" id=\"search_keywords\" />
                                <input type=\"submit\" value=\"search\" />
                                <div class=\"help\">
                                    Enter some keywords (city, country, position, ...)
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
 
           <div id=\"content\">
               ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 50
            echo "                   <div class=\"flash_notice\">
                       ";
            // line 51
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                   </div>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo " 
               ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 56
            echo "                   <div class=\"flash_error\">
                       ";
            // line 57
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                   </div>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo " 
               <div class=\"content\">
                   ";
        // line 62
        $this->displayBlock('content', $context, $blocks);
        // line 64
        echo "               </div>
           </div>
 
           <div id=\"footer\">
               <div class=\"content\">
                   <span class=\"symfony\">
                       <img src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ibwjobeet/images/jobeet-mini.png"), "html", null, true);
        echo "\" />
                           powered by <a href=\"http://www.symfony.com/\">
                           <img src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ibwjobeet/images/symfony.gif"), "html", null, true);
        echo "\" alt=\"symfony framework\" />
                       </a>
                   </span>
                   <ul>
                       <li><a href=\"\">About Jobeet</a></li>
                       <li class=\"feed\"><a href=\"\">Full feed</a></li>
                       <li><a href=\"\">Jobeet API</a></li>
                       <li class=\"last\"><a href=\"\">Affiliates</a></li>
                   </ul>
               </div>
           </div>
       </div>
   </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "                Jobeet - Your best job board
            ";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ibwjobeet/css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        ";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "        ";
    }

    // line 62
    public function block_content($context, array $blocks = array())
    {
        // line 63
        echo "                   ";
    }

    public function getTemplateName()
    {
        return "IbwJobeetBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 63,  187 => 62,  183 => 14,  180 => 13,  173 => 11,  170 => 10,  165 => 6,  162 => 5,  144 => 72,  139 => 70,  131 => 64,  129 => 62,  125 => 60,  116 => 57,  113 => 56,  109 => 55,  106 => 54,  97 => 51,  94 => 50,  90 => 49,  68 => 30,  64 => 29,  54 => 22,  50 => 21,  40 => 15,  37 => 13,  35 => 10,  31 => 8,  29 => 5,  23 => 1,);
    }
}
