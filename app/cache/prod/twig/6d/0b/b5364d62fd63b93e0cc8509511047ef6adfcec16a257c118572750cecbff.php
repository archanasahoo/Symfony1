<?php

/* IbwJobeetBundle:Job:show.html.twig */
class __TwigTemplate_6d0bb5364d62fd63b93e0cc8509511047ef6adfcec16a257c118572750cecbff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IbwJobeetBundle::layout.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IbwJobeetBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ibwjobeet/css/job.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "token"), "method")) {
            // line 10
            echo "        ";
            $this->env->loadTemplate("IbwJobeetBundle:Job:admin.html.twig")->display(array_merge($context, array("job" => (isset($context["entity"]) ? $context["entity"] : null))));
            // line 11
            echo "   ";
        }
        // line 12
        echo "    <div id=\"job\">
        <h1>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "company", array()), "html", null, true);
        echo "</h1>
        <h2>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location", array()), "html", null, true);
        echo "</h2>
        <h3>
            ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "position", array()), "html", null, true);
        echo "
            <small> - ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "type", array()), "html", null, true);
        echo "</small>
        </h3>
 
        ";
        // line 20
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "logo", array())) {
            // line 21
            echo "            <div class=\"logo\">
                <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "url", array()), "html", null, true);
            echo "\">
                    <img src=\"/uploads/jobs/";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "logo", array()), "html", null, true);
            echo "\"
                        alt=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "company", array()), "html", null, true);
            echo " logo\" />
                </a>
            </div>
        ";
        }
        // line 28
        echo " 
        <div class=\"description\">
            ";
        // line 30
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "description", array()), "html", null, true));
        echo "
        </div>
 
        <h4>How to apply?</h4>
 
        <p class=\"how_to_apply\">";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "howtoapply", array()), "html", null, true);
        echo "</p>
 
        <div class=\"meta\">
            <small>posted on ";
        // line 38
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "createdat", array()), "m/d/Y"), "html", null, true);
        echo "</small>
        </div>
 
        <div style=\"padding: 20px 0\">
            <a href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ibw_job_edit", array("token" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "token", array()))), "html", null, true);
        echo "\">
                Edit
            </a>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IbwJobeetBundle:Job:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 42,  115 => 38,  109 => 35,  101 => 30,  97 => 28,  90 => 24,  86 => 23,  82 => 22,  79 => 21,  77 => 20,  71 => 17,  67 => 16,  62 => 14,  58 => 13,  55 => 12,  52 => 11,  49 => 10,  46 => 9,  43 => 8,  37 => 5,  32 => 4,  29 => 3,);
    }
}
