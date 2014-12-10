<?php

/* IbwJobeetBundle:Job:admin.html.twig */
class __TwigTemplate_e4f9593214c23d1101e51552a24129753594839af37116d7ae9ff112f5eafecc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"job_actions\">
    <h3>Admin</h3>
    <ul>
        ";
        // line 4
        if ((!$this->getAttribute((isset($context["job"]) ? $context["job"] : null), "isActivated", array()))) {
            // line 5
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ibw_job_edit", array("token" => $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "token", array()))), "html", null, true);
            echo "\">Edit</a></li>
            <li><a href=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ibw_job_edit", array("token" => $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "token", array()))), "html", null, true);
            echo "\">Publish</a></li>
        ";
        }
        // line 8
        echo "        <li>
            <form action=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ibw_job_delete", array("token" => $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "token", array()))), "html", null, true);
        echo "\" method=\"post\">
                ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : null), 'widget');
        echo "
                <button type=\"submit\" onclick=\"if(!confirm('Are you sure?')) { return false; }\">Delete</button>
            </form>
        </li>
        ";
        // line 14
        if ($this->getAttribute((isset($context["job"]) ? $context["job"] : null), "isActivated", array())) {
            // line 15
            echo "            <li ";
            if ($this->getAttribute((isset($context["job"]) ? $context["job"] : null), "expiresSoon", array())) {
                echo " class=\"expires_soon\" ";
            }
            echo ">
                ";
            // line 16
            if ($this->getAttribute((isset($context["job"]) ? $context["job"] : null), "isExpired", array())) {
                // line 17
                echo "                    Expired
                ";
            } else {
                // line 19
                echo "                    Expires in <strong>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "getDaysBeforeExpires", array()), "html", null, true);
                echo "</strong> days
                ";
            }
            // line 21
            echo " 
                ";
            // line 22
            if ($this->getAttribute((isset($context["job"]) ? $context["job"] : null), "expiresSoon", array())) {
                // line 23
                echo "                    - <a href=\"\">Extend</a> for another 30 days
                ";
            }
            // line 25
            echo "            </li>
        ";
        } else {
            // line 27
            echo "            <li>
                [Bookmark this <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("ibw_job_preview", array("token" => $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "token", array()), "company" => $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "companyslug", array()), "location" => $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "locationslug", array()), "position" => $this->getAttribute((isset($context["job"]) ? $context["job"] : null), "positionslug", array()))), "html", null, true);
            echo "\">URL</a> to manage this job in the future.]
            </li>
        ";
        }
        // line 31
        echo "    </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "IbwJobeetBundle:Job:admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 31,  87 => 28,  84 => 27,  80 => 25,  76 => 23,  74 => 22,  71 => 21,  65 => 19,  61 => 17,  59 => 16,  52 => 15,  50 => 14,  43 => 10,  39 => 9,  36 => 8,  31 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }
}
