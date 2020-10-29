<?php

/* default/template/extension/module/html2.twig */
class __TwigTemplate_dfb5480979c08ccb22f8a1edd17aa9d235e69599f1bb8d81db49089e668f12b6 extends Twig_Template
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
        echo "<div>";
        if ((isset($context["link"]) ? $context["link"] : null)) {
            // line 2
            echo "
  <h2>";
            // line 3
            echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
            echo "</h2>
  \t

\t<!-- this is without responsivety..
\t\t<p><iframe height=\"100%\"   src=\"";
            // line 7
            echo (isset($context["link"]) ? $context["link"] : null);
            echo "\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>
\t-->


\t<div class=\"row\">
\t<div class=\"col-xs-12 embed-responsive embed-responsive-16by9\"><iframe src=\"";
            // line 12
            echo (isset($context["link"]) ? $context["link"] : null);
            echo "\" frameborder=\"0\" allowfullscreen=\"\"></iframe></div></div>";
        }
        // line 16
        echo "  \t\t\t<!--  if you wanna see description -->";
        // line 17
        echo (isset($context["html"]) ? $context["html"] : null);
        echo "

  </div>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/html2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 17,  44 => 16,  40 => 12,  32 => 7,  25 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div>{% if link %}*/
/* */
/*   <h2>{{ heading_title }}</h2>*/
/*   	*/
/* */
/* 	<!-- this is without responsivety..*/
/* 		<p><iframe height="100%"   src="{{ link }}" frameborder="0" allowfullscreen=""></iframe></p>*/
/* 	-->*/
/* */
/* */
/* 	<div class="row">*/
/* 	<div class="col-xs-12 embed-responsive embed-responsive-16by9"><iframe src="{{ link }}" frameborder="0" allowfullscreen=""></iframe></div></div>*/
/*    */
/* */
/*   {% endif %}*/
/*   			<!--  if you wanna see description -->*/
/*   {{ html }}*/
/* */
/*   </div>*/
/* */
