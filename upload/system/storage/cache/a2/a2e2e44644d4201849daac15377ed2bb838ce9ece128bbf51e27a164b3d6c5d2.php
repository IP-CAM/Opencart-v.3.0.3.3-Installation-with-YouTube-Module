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
  \t<!--
 \t<h2>";
            // line 5
            echo (isset($context["link"]) ? $context["link"] : null);
            echo "</h2>
  \t<h2>";
            // line 6
            echo (isset($context["beforename"]) ? $context["beforename"] : null);
            echo "</h2>
\t-->
\t<!-- this is without responsivety..
\t  <p><iframe height=\"100%\"   src=\"";
            // line 9
            echo (isset($context["link"]) ? $context["link"] : null);
            echo "\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>
\t  <p><iframe width=\"100%\"  src=\"";
            // line 10
            echo (isset($context["beforename"]) ? $context["beforename"] : null);
            echo "\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>
\t-->

\t<div class=\"row\">
\t<div class=\"col-xs-12 embed-responsive embed-responsive-16by9\"><iframe src=\"";
            // line 14
            echo (isset($context["link"]) ? $context["link"] : null);
            echo "\" frameborder=\"0\" allowfullscreen=\"\"></iframe></div></div>

<!-- \$beforename
\t<div class=\"row\">
\t<div class=\"col-xs-12 embed-responsive embed-responsive-16by9\"><iframe src=\"";
            // line 18
            echo (isset($context["beforename"]) ? $context["beforename"] : null);
            echo "\" frameborder=\"0\" allowfullscreen=\"\"></iframe></div></div>
-->

\t<!-- 
  \t\t<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/d89RHNQogO0\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
\t--> 


\t<!--  
 \t\t <h2>";
            // line 27
            echo (isset($context["afterlink"]) ? $context["afterlink"] : null);
            echo "</h2>
\t-->";
        }
        // line 32
        echo "  <!--  if you wanna see description -->";
        // line 33
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
        return array (  77 => 33,  75 => 32,  70 => 27,  58 => 18,  51 => 14,  44 => 10,  40 => 9,  34 => 6,  30 => 5,  25 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div>{% if link %}*/
/* */
/*   <h2>{{ heading_title }}</h2>*/
/*   	<!--*/
/*  	<h2>{{ link }}</h2>*/
/*   	<h2>{{ beforename }}</h2>*/
/* 	-->*/
/* 	<!-- this is without responsivety..*/
/* 	  <p><iframe height="100%"   src="{{ link }}" frameborder="0" allowfullscreen=""></iframe></p>*/
/* 	  <p><iframe width="100%"  src="{{ beforename }}" frameborder="0" allowfullscreen=""></iframe></p>*/
/* 	-->*/
/* */
/* 	<div class="row">*/
/* 	<div class="col-xs-12 embed-responsive embed-responsive-16by9"><iframe src="{{ link }}" frameborder="0" allowfullscreen=""></iframe></div></div>*/
/* */
/* <!-- $beforename*/
/* 	<div class="row">*/
/* 	<div class="col-xs-12 embed-responsive embed-responsive-16by9"><iframe src="{{ beforename }}" frameborder="0" allowfullscreen=""></iframe></div></div>*/
/* -->*/
/* */
/* 	<!-- */
/*   		<iframe width="560" height="315" src="https://www.youtube.com/embed/d89RHNQogO0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>*/
/* 	--> */
/* */
/* */
/* 	<!--  */
/*  		 <h2>{{ afterlink }}</h2>*/
/* 	-->*/
/*    */
/* */
/*   {% endif %}*/
/*   <!--  if you wanna see description -->*/
/*   {{ html }}*/
/* */
/*   </div>*/
/* */
