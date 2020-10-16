<?php

/* extension/module/html2.twig */
class __TwigTemplate_991f20ebba3d12264dc5ea6a5d65c608e73584b6e0520ebe2d2ffb5cdf4994f0 extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">

  <div class=\"page-header\">
    <div class=\"container-fluid\">

<!-- <h1>dsfadsfa</h1> -->    

      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-module\" data-toggle=\"tooltip\" title=\"";
        // line 10
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 11
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 12
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>

      <ul class=\"breadcrumb\">";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 16
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">";
        // line 22
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 23
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i>";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>";
        }
        // line 27
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
     
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i>";
        // line 30
        echo (isset($context["text_edit"]) ? $context["text_edit"] : null);
        echo "</h3>

      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 34
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 36
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 38
        echo (isset($context["name"]) ? $context["name"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "\" id=\"input-name\" class=\"form-control\" />";
        // line 39
        if ((isset($context["error_name"]) ? $context["error_name"] : null)) {
            // line 40
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_name"]) ? $context["error_name"] : null);
            echo "</div>";
        }
        // line 42
        echo "            </div>
          </div>
          <div class=\"tab-pane\">
            <ul class=\"nav nav-tabs\" id=\"language\">";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 47
            echo "              <li><a href=\"#language";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\" data-toggle=\"tab\"><img src=\"language/";
            echo $this->getAttribute($context["language"], "code", array());
            echo "/";
            echo $this->getAttribute($context["language"], "code", array());
            echo ".png\" title=\"";
            echo $this->getAttribute($context["language"], "name", array());
            echo "\" />";
            echo $this->getAttribute($context["language"], "name", array());
            echo "</a></li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "            </ul>
<!-- Write your comments here -->
            <div class=\"tab-content\">";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 54
            echo "              <div class=\"tab-pane\" id=\"language";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\">
                <div class=\"form-group\">
 
                  <label class=\"col-sm-2 control-label\" for=\"input-title";
            // line 57
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\">";
            echo (isset($context["entry_title"]) ? $context["entry_title"] : null);
            echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"module_description[";
            // line 59
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "][title]\" placeholder=\"";
            echo (isset($context["entry_title"]) ? $context["entry_title"] : null);
            echo "\" id=\"input-heading";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\" value=\"";
            echo (($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "title", array())) : (""));
            echo "\" class=\"form-control\" />
                  </div>
                </div>

<!--  comments Youtube url:  -->

  
                  <label class=\"col-sm-2 control-label\" for=\"input-link";
            // line 66
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\">";
            echo (isset($context["entry_url"]) ? $context["entry_url"] : null);
            echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"module_description[";
            // line 68
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "][link]\" placeholder=\"";
            echo (isset($context["entry_url"]) ? $context["entry_url"] : null);
            echo "\" id=\"input-heading";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\" value=\"";
            echo (($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "link", array())) : (""));
            echo "\" class=\"form-control\" />
                  </div>
                
<!--  comments  -->

<!--  prelink to setting page  -->
      <label class=\"col-sm-2 control-label\" for=\"input-beforename";
            // line 74
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\">";
            echo (isset($context["entry_url2"]) ? $context["entry_url2"] : null);
            echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"module_description[";
            // line 76
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "][beforename]\" placeholder=\"";
            echo (isset($context["entry_url2"]) ? $context["entry_url2"] : null);
            echo "\" id=\"input-heading";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\" value=\"";
            echo (($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "beforename", array())) : (""));
            echo "\" class=\"form-control\" />
                  </div>
<!--  prelink to setting page ending -->




                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-description";
            // line 84
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\">";
            echo (isset($context["entry_description"]) ? $context["entry_description"] : null);
            echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"module_description[";
            // line 86
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "][description]\" placeholder=\"";
            echo (isset($context["entry_description"]) ? $context["entry_description"] : null);
            echo "\" id=\"input-description";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\" data-toggle=\"summernote\" class=\"form-control\">";
            echo (($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["module_description"]) ? $context["module_description"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "description", array())) : (""));
            echo "</textarea>
                  </div>
  
<!-- Write your comments here <h1>h_______ende descript2?</h1> -->";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "            </div>
          </div>

<!-- Status form -->
<div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 97
        echo (isset($context["entry_status"]) ? $context["entry_status"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"status\" id=\"input-status\" class=\"form-control\">";
        // line 100
        if ((isset($context["status"]) ? $context["status"] : null)) {
            // line 101
            echo "                <option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                <option value=\"0\">";
            // line 102
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>";
        } else {
            // line 104
            echo "                <option value=\"1\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                <option value=\"0\" selected=\"selected\">";
            // line 105
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>";
        }
        // line 107
        echo "              </select>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <link href=\"view/javascript/codemirror/lib/codemirror.css\" rel=\"stylesheet\" />
  <link href=\"view/javascript/codemirror/theme/monokai.css\" rel=\"stylesheet\" />
  <script type=\"text/javascript\" src=\"view/javascript/codemirror/lib/codemirror.js\"></script> 
  <script type=\"text/javascript\" src=\"view/javascript/codemirror/lib/xml.js\"></script> 
  <script type=\"text/javascript\" src=\"view/javascript/codemirror/lib/formatting.js\"></script> 
    
  <script type=\"text/javascript\" src=\"view/javascript/summernote/summernote.js\"></script>
  <link href=\"view/javascript/summernote/summernote.css\" rel=\"stylesheet\" />
  <script type=\"text/javascript\" src=\"view/javascript/summernote/summernote-image-attributes.js\"></script>
  <script type=\"text/javascript\" src=\"view/javascript/summernote/opencart.js\"></script>
  <script type=\"text/javascript\"><!--
\$('#language a:first').tab('show');
//--></script></div>";
        // line 129
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "extension/module/html2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  295 => 129,  273 => 107,  269 => 105,  264 => 104,  260 => 102,  255 => 101,  253 => 100,  248 => 97,  241 => 92,  225 => 86,  218 => 84,  201 => 76,  194 => 74,  179 => 68,  172 => 66,  156 => 59,  149 => 57,  142 => 54,  138 => 53,  134 => 49,  118 => 47,  114 => 46,  109 => 42,  104 => 40,  102 => 39,  97 => 38,  92 => 36,  87 => 34,  80 => 30,  75 => 27,  68 => 23,  66 => 22,  61 => 18,  51 => 16,  47 => 15,  42 => 12,  36 => 11,  32 => 10,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/* */
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/* */
/* <!-- <h1>dsfadsfa</h1> -->    */
/* */
/*       <div class="pull-right">*/
/*         <button type="submit" form="form-module" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/*         <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a></div>*/
/*       <h1>{{ heading_title }}</h1>*/
/* */
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">*/
/*     {% if error_warning %}*/
/*     <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*       <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*     </div>*/
/*     {% endif %}*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*      */
/*         <h3 class="panel-title"><i class="fa fa-pencil"></i> {{ text_edit }}</h3>*/
/* */
/*       </div>*/
/*       <div class="panel-body">*/
/*         <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-module" class="form-horizontal">*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-name">{{ entry_name }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="name" value="{{ name }}" placeholder="{{ entry_name }}" id="input-name" class="form-control" />*/
/*               {% if error_name %}*/
/*               <div class="text-danger">{{ error_name }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           <div class="tab-pane">*/
/*             <ul class="nav nav-tabs" id="language">*/
/*               {% for language in languages %}*/
/*               <li><a href="#language{{ language.language_id }}" data-toggle="tab"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /> {{ language.name }}</a></li>*/
/*               {% endfor %}*/
/*             </ul>*/
/* <!-- Write your comments here -->*/
/*             <div class="tab-content">*/
/* */
/*               {% for language in languages %}*/
/*               <div class="tab-pane" id="language{{ language.language_id }}">*/
/*                 <div class="form-group">*/
/*  */
/*                   <label class="col-sm-2 control-label" for="input-title{{ language.language_id }}">{{ entry_title }}</label>*/
/*                   <div class="col-sm-10">*/
/*                     <input type="text" name="module_description[{{ language.language_id }}][title]" placeholder="{{ entry_title }}" id="input-heading{{ language.language_id }}" value="{{ module_description[language.language_id] ? module_description[language.language_id].title }}" class="form-control" />*/
/*                   </div>*/
/*                 </div>*/
/* */
/* <!--  comments Youtube url:  -->*/
/* */
/*   */
/*                   <label class="col-sm-2 control-label" for="input-link{{ language.language_id }}">{{ entry_url }}</label>*/
/*                   <div class="col-sm-10">*/
/*                     <input type="text" name="module_description[{{ language.language_id }}][link]" placeholder="{{ entry_url }}" id="input-heading{{ language.language_id }}" value="{{ module_description[language.language_id] ? module_description[language.language_id].link }}" class="form-control" />*/
/*                   </div>*/
/*                 */
/* <!--  comments  -->*/
/* */
/* <!--  prelink to setting page  -->*/
/*       <label class="col-sm-2 control-label" for="input-beforename{{ language.language_id }}">{{ entry_url2 }}</label>*/
/*                   <div class="col-sm-10">*/
/*                     <input type="text" name="module_description[{{ language.language_id }}][beforename]" placeholder="{{ entry_url2 }}" id="input-heading{{ language.language_id }}" value="{{ module_description[language.language_id] ? module_description[language.language_id].beforename }}" class="form-control" />*/
/*                   </div>*/
/* <!--  prelink to setting page ending -->*/
/* */
/* */
/* */
/* */
/*                 <div class="form-group">*/
/*                   <label class="col-sm-2 control-label" for="input-description{{ language.language_id }}">{{ entry_description }}</label>*/
/*                   <div class="col-sm-10">*/
/*                     <textarea name="module_description[{{ language.language_id }}][description]" placeholder="{{ entry_description }}" id="input-description{{ language.language_id }}" data-toggle="summernote" class="form-control">{{ module_description[language.language_id] ? module_description[language.language_id].description }}</textarea>*/
/*                   </div>*/
/*   */
/* <!-- Write your comments here <h1>h_______ende descript2?</h1> -->*/
/*                  */
/*               {% endfor %}*/
/*             </div>*/
/*           </div>*/
/* */
/* <!-- Status form -->*/
/* <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-status">{{ entry_status }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="status" id="input-status" class="form-control">*/
/*                 {% if status %}*/
/*                 <option value="1" selected="selected">{{ text_enabled }}</option>*/
/*                 <option value="0">{{ text_disabled }}</option>*/
/*                 {% else %}*/
/*                 <option value="1">{{ text_enabled }}</option>*/
/*                 <option value="0" selected="selected">{{ text_disabled }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/* */
/*         </form>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <link href="view/javascript/codemirror/lib/codemirror.css" rel="stylesheet" />*/
/*   <link href="view/javascript/codemirror/theme/monokai.css" rel="stylesheet" />*/
/*   <script type="text/javascript" src="view/javascript/codemirror/lib/codemirror.js"></script> */
/*   <script type="text/javascript" src="view/javascript/codemirror/lib/xml.js"></script> */
/*   <script type="text/javascript" src="view/javascript/codemirror/lib/formatting.js"></script> */
/*     */
/*   <script type="text/javascript" src="view/javascript/summernote/summernote.js"></script>*/
/*   <link href="view/javascript/summernote/summernote.css" rel="stylesheet" />*/
/*   <script type="text/javascript" src="view/javascript/summernote/summernote-image-attributes.js"></script>*/
/*   <script type="text/javascript" src="view/javascript/summernote/opencart.js"></script>*/
/*   <script type="text/javascript"><!--*/
/* $('#language a:first').tab('show');*/
/* //--></script></div>*/
/* */
/* {{ footer }}*/
/* */
/* */
