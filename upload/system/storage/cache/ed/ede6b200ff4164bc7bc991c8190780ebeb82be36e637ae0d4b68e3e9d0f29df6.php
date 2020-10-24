<?php

/* default/template/product/category.twig */
class __TwigTemplate_9d52ff1289ca47e681dca555c6bea4fc2dcdf2457598f50df0e451195e7235c0 extends Twig_Template
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
        echo "
<div id=\"product-category\" class=\"container\">
<h1> Ahoj*****************************</h1>
  <ul class=\"breadcrumb\">";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 6
            echo "    <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "  </ul>
<h1> Ahoj*****************************</h1>
  <div class=\"row\">";
        // line 10
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        // line 11
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 12
            $context["class"] = "col-sm-6";
        } elseif ((        // line 13
(isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 14
            $context["class"] = "col-sm-9";
        } else {
            // line 16
            $context["class"] = "col-sm-12";
        }
        // line 18
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      <h2>";
        // line 19
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h2>";
        // line 20
        if (((isset($context["thumb"]) ? $context["thumb"] : null) || (isset($context["description"]) ? $context["description"] : null))) {
            // line 21
            echo "      <div class=\"row\">";
            if ((isset($context["thumb"]) ? $context["thumb"] : null)) {
                // line 22
                echo "        <div class=\"col-sm-2\"><img src=\"";
                echo (isset($context["thumb"]) ? $context["thumb"] : null);
                echo "\" alt=\"";
                echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
                echo "\" title=\"";
                echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
                echo "\" class=\"img-thumbnail\" /></div>";
            }
            // line 24
            if ((isset($context["description"]) ? $context["description"] : null)) {
                // line 25
                echo "        <div class=\"col-sm-10\">";
                echo (isset($context["description"]) ? $context["description"] : null);
                echo "</div>";
            }
            // line 26
            echo "</div>
      <hr>";
        }
        // line 29
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 30
            echo "      <h3>";
            echo (isset($context["text_refine"]) ? $context["text_refine"] : null);
            echo "</h3>";
            // line 31
            if ((twig_length_filter($this->env, (isset($context["categories"]) ? $context["categories"] : null)) <= 5)) {
                // line 32
                echo "      <div class=\"row\">
        <div class=\"col-sm-3\">
          <ul>";
                // line 35
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 36
                    echo "            <li><a href=\"";
                    echo $this->getAttribute($context["category"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo "</a></li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "          </ul>
        </div>
      </div>";
            } else {
                // line 42
                echo "      <div class=\"row\">";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_array_batch((isset($context["categories"]) ? $context["categories"] : null), twig_round((twig_length_filter($this->env, (isset($context["categories"]) ? $context["categories"] : null)) / 4), 1, "ceil")));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 43
                    echo "        <div class=\"col-sm-3\">
          <ul>";
                    // line 45
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["category"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                        // line 46
                        echo "            <li><a href=\"";
                        echo $this->getAttribute($context["child"], "href", array());
                        echo "\">";
                        echo $this->getAttribute($context["child"], "name", array());
                        echo "</a></li>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 48
                    echo "          </ul>
        </div>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 50
                echo "</div>
      <br />";
            }
        }
        // line 54
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 55
            echo "      <div class=\"row\">
        <div class=\"col-md-2 col-sm-6 hidden-xs\">
          <div class=\"btn-group btn-group-sm\">
            <button type=\"button\" id=\"list-view\" class=\"btn btn-default\" data-toggle=\"tooltip\" title=\"";
            // line 58
            echo (isset($context["button_list"]) ? $context["button_list"] : null);
            echo "\"><i class=\"fa fa-th-list\"></i></button>
            <button type=\"button\" id=\"grid-view\" class=\"btn btn-default\" data-toggle=\"tooltip\" title=\"";
            // line 59
            echo (isset($context["button_grid"]) ? $context["button_grid"] : null);
            echo "\"><i class=\"fa fa-th\"></i></button>
          </div>
        </div>
        <div class=\"col-md-3 col-sm-6\">
          <div class=\"form-group\"><a href=\"";
            // line 63
            echo (isset($context["compare"]) ? $context["compare"] : null);
            echo "\" id=\"compare-total\" class=\"btn btn-link\">";
            echo (isset($context["text_compare"]) ? $context["text_compare"] : null);
            echo "</a></div>
        </div>
        <div class=\"col-md-4 col-xs-6\">
          <div class=\"form-group input-group input-group-sm\">
            <label class=\"input-group-addon\" for=\"input-sort\">";
            // line 67
            echo (isset($context["text_sort"]) ? $context["text_sort"] : null);
            echo "</label>
            <select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 73
                if (($this->getAttribute($context["sorts"], "value", array()) == sprintf("%s-%s", (isset($context["sort"]) ? $context["sort"] : null), (isset($context["order"]) ? $context["order"] : null)))) {
                    // line 74
                    echo "              
              
              
              <option value=\"";
                    // line 77
                    echo $this->getAttribute($context["sorts"], "href", array());
                    echo "\" selected=\"selected\">";
                    echo $this->getAttribute($context["sorts"], "text", array());
                    echo "</option>";
                } else {
                    // line 82
                    echo "              
              
              
              <option value=\"";
                    // line 85
                    echo $this->getAttribute($context["sorts"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["sorts"], "text", array());
                    echo "</option>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "            
            
            
            </select>
          </div>
        </div>
        <div class=\"col-md-3 col-xs-6\">
          <div class=\"form-group input-group input-group-sm\">
            <label class=\"input-group-addon\" for=\"input-limit\">";
            // line 99
            echo (isset($context["text_limit"]) ? $context["text_limit"] : null);
            echo "</label>
            <select id=\"input-limit\" class=\"form-control\" onchange=\"location = this.value;\">";
            // line 104
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 105
                if (($this->getAttribute($context["limits"], "value", array()) == (isset($context["limit"]) ? $context["limit"] : null))) {
                    // line 106
                    echo "              
              
              
              <option value=\"";
                    // line 109
                    echo $this->getAttribute($context["limits"], "href", array());
                    echo "\" selected=\"selected\">";
                    echo $this->getAttribute($context["limits"], "text", array());
                    echo "</option>";
                } else {
                    // line 114
                    echo "              
              
              
              <option value=\"";
                    // line 117
                    echo $this->getAttribute($context["limits"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["limits"], "text", array());
                    echo "</option>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limits'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            echo "            
            
            
            </select>
          </div>
        </div>
      </div>

<!-- products -->
<!-- products -->
       <div class=\"row\">";
            // line 133
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 134
                echo "        <div class=\"product-layout product-list col-xs-12\">
          <div class=\"product-thumb\">
            <div class=\"image\"><a href=\"";
                // line 136
                echo $this->getAttribute($context["product"], "href", array());
                echo "\"><img src=\"";
                echo $this->getAttribute($context["product"], "thumb", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["product"], "name", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["product"], "name", array());
                echo "\" class=\"img-responsive\" /></a></div>
            <div>
              <div class=\"caption\">
                <h4><a href=\"";
                // line 139
                echo $this->getAttribute($context["product"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["product"], "name", array());
                echo "</a></h4>
                <p>";
                // line 140
                echo $this->getAttribute($context["product"], "description", array());
                echo "</p>";
                // line 141
                if ($this->getAttribute($context["product"], "price", array())) {
                    // line 142
                    echo "                <p class=\"price\">";
                    if ( !$this->getAttribute($context["product"], "special", array())) {
                        // line 143
                        echo $this->getAttribute($context["product"], "price", array());
                    } else {
                        // line 144
                        echo " <span class=\"price-new\">";
                        echo $this->getAttribute($context["product"], "special", array());
                        echo "</span> <span class=\"price-old\">";
                        echo $this->getAttribute($context["product"], "price", array());
                        echo "</span>";
                    }
                    // line 145
                    if ($this->getAttribute($context["product"], "tax", array())) {
                        echo " <span class=\"price-tax\">";
                        echo (isset($context["text_tax"]) ? $context["text_tax"] : null);
                        echo $this->getAttribute($context["product"], "tax", array());
                        echo "</span>";
                    }
                    echo " </p>";
                }
                // line 147
                if ($this->getAttribute($context["product"], "rating", array())) {
                    // line 148
                    echo "                <div class=\"rating\">";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 149
                        if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                            echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                        } else {
                            echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 150
                    echo " </div>";
                }
                // line 151
                echo " </div>
              <div class=\"button-group\">
                <button type=\"button\" onclick=\"cart.add('";
                // line 153
                echo $this->getAttribute($context["product"], "product_id", array());
                echo "', '";
                echo $this->getAttribute($context["product"], "minimum", array());
                echo "');\"><i class=\"fa fa-shopping-cart\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
                echo "</span></button>
                <button type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 154
                echo (isset($context["button_wishlist"]) ? $context["button_wishlist"] : null);
                echo "\" onclick=\"wishlist.add('";
                echo $this->getAttribute($context["product"], "product_id", array());
                echo "');\"><i class=\"fa fa-heart\"></i></button>
                <button type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 155
                echo (isset($context["button_compare"]) ? $context["button_compare"] : null);
                echo "\" onclick=\"compare.add('";
                echo $this->getAttribute($context["product"], "product_id", array());
                echo "');\"><i class=\"fa fa-exchange\"></i></button>
              </div>
            </div>
          </div>
        </div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            echo " </div>
      <div class=\"row\">
        <div class=\"col-sm-6 text-left\">";
            // line 162
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "</div>
        <div class=\"col-sm-6 text-right\">";
            // line 163
            echo (isset($context["results"]) ? $context["results"] : null);
            echo "</div>
      </div>";
        }
        // line 166
        if (( !(isset($context["categories"]) ? $context["categories"] : null) &&  !(isset($context["products"]) ? $context["products"] : null))) {
            // line 167
            echo "      <p>";
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 169
            echo (isset($context["continue"]) ? $context["continue"] : null);
            echo "\" class=\"btn btn-primary\">";
            echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
            echo "</a></div>
      </div>";
        }
        // line 172
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>";
        // line 173
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>";
        // line 175
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " 
";
    }

    public function getTemplateName()
    {
        return "default/template/product/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  417 => 175,  413 => 173,  410 => 172,  403 => 169,  397 => 167,  395 => 166,  390 => 163,  386 => 162,  382 => 160,  369 => 155,  363 => 154,  355 => 153,  351 => 151,  348 => 150,  338 => 149,  333 => 148,  331 => 147,  322 => 145,  315 => 144,  312 => 143,  309 => 142,  307 => 141,  304 => 140,  298 => 139,  286 => 136,  282 => 134,  278 => 133,  266 => 123,  256 => 117,  251 => 114,  245 => 109,  240 => 106,  238 => 105,  234 => 104,  230 => 99,  220 => 91,  210 => 85,  205 => 82,  199 => 77,  194 => 74,  192 => 73,  188 => 72,  184 => 67,  175 => 63,  168 => 59,  164 => 58,  159 => 55,  157 => 54,  152 => 50,  145 => 48,  135 => 46,  131 => 45,  128 => 43,  123 => 42,  118 => 38,  108 => 36,  104 => 35,  100 => 32,  98 => 31,  94 => 30,  92 => 29,  88 => 26,  83 => 25,  81 => 24,  72 => 22,  69 => 21,  67 => 20,  64 => 19,  57 => 18,  54 => 16,  51 => 14,  49 => 13,  47 => 12,  45 => 11,  43 => 10,  39 => 8,  29 => 6,  25 => 5,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="product-category" class="container">*/
/* <h1> Ahoj*****************************</h1>*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/* <h1> Ahoj*****************************</h1>*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">{{ content_top }}*/
/*       <h2>{{ heading_title }}</h2>*/
/*       {% if thumb or description %}*/
/*       <div class="row"> {% if thumb %}*/
/*         <div class="col-sm-2"><img src="{{ thumb }}" alt="{{ heading_title }}" title="{{ heading_title }}" class="img-thumbnail" /></div>*/
/*         {% endif %}*/
/*         {% if description %}*/
/*         <div class="col-sm-10">{{ description }}</div>*/
/*         {% endif %}</div>*/
/*       <hr>*/
/*       {% endif %}*/
/*       {% if categories %}*/
/*       <h3>{{ text_refine }}</h3>*/
/*       {% if categories|length <= 5 %}*/
/*       <div class="row">*/
/*         <div class="col-sm-3">*/
/*           <ul>*/
/*             {% for category in categories %}*/
/*             <li><a href="{{ category.href }}">{{ category.name }}</a></li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*         </div>*/
/*       </div>*/
/*       {% else %}*/
/*       <div class="row">{% for category in categories|batch((categories|length / 4)|round(1, 'ceil')) %}*/
/*         <div class="col-sm-3">*/
/*           <ul>*/
/*             {% for child in category %}*/
/*             <li><a href="{{ child.href }}">{{ child.name }}</a></li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*         </div>*/
/*         {% endfor %}</div>*/
/*       <br />*/
/*       {% endif %}*/
/*       {% endif %}*/
/*       {% if products %}*/
/*       <div class="row">*/
/*         <div class="col-md-2 col-sm-6 hidden-xs">*/
/*           <div class="btn-group btn-group-sm">*/
/*             <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="{{ button_list }}"><i class="fa fa-th-list"></i></button>*/
/*             <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="{{ button_grid }}"><i class="fa fa-th"></i></button>*/
/*           </div>*/
/*         </div>*/
/*         <div class="col-md-3 col-sm-6">*/
/*           <div class="form-group"><a href="{{ compare }}" id="compare-total" class="btn btn-link">{{ text_compare }}</a></div>*/
/*         </div>*/
/*         <div class="col-md-4 col-xs-6">*/
/*           <div class="form-group input-group input-group-sm">*/
/*             <label class="input-group-addon" for="input-sort">{{ text_sort }}</label>*/
/*             <select id="input-sort" class="form-control" onchange="location = this.value;">*/
/*               */
/*               */
/*               */
/*               {% for sorts in sorts %}*/
/*               {% if sorts.value == '%s-%s'|format(sort, order) %}*/
/*               */
/*               */
/*               */
/*               <option value="{{ sorts.href }}" selected="selected">{{ sorts.text }}</option>*/
/*               */
/*               */
/*               */
/*               {% else %}*/
/*               */
/*               */
/*               */
/*               <option value="{{ sorts.href }}">{{ sorts.text }}</option>*/
/*               */
/*               */
/*               */
/*               {% endif %}*/
/*               {% endfor %}*/
/*             */
/*             */
/*             */
/*             </select>*/
/*           </div>*/
/*         </div>*/
/*         <div class="col-md-3 col-xs-6">*/
/*           <div class="form-group input-group input-group-sm">*/
/*             <label class="input-group-addon" for="input-limit">{{ text_limit }}</label>*/
/*             <select id="input-limit" class="form-control" onchange="location = this.value;">*/
/*               */
/*               */
/*               */
/*               {% for limits in limits %}*/
/*               {% if limits.value == limit %}*/
/*               */
/*               */
/*               */
/*               <option value="{{ limits.href }}" selected="selected">{{ limits.text }}</option>*/
/*               */
/*               */
/*               */
/*               {% else %}*/
/*               */
/*               */
/*               */
/*               <option value="{{ limits.href }}">{{ limits.text }}</option>*/
/*               */
/*               */
/*               */
/*               {% endif %}*/
/*               {% endfor %}*/
/*             */
/*             */
/*             */
/*             </select>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/* */
/* <!-- products -->*/
/* <!-- products -->*/
/*        <div class="row"> {% for product in products %}*/
/*         <div class="product-layout product-list col-xs-12">*/
/*           <div class="product-thumb">*/
/*             <div class="image"><a href="{{ product.href }}"><img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-responsive" /></a></div>*/
/*             <div>*/
/*               <div class="caption">*/
/*                 <h4><a href="{{ product.href }}">{{ product.name }}</a></h4>*/
/*                 <p>{{ product.description }}</p>*/
/*                 {% if product.price %}*/
/*                 <p class="price"> {% if not product.special %}*/
/*                   {{ product.price }}*/
/*                   {% else %} <span class="price-new">{{ product.special }}</span> <span class="price-old">{{ product.price }}</span> {% endif %}*/
/*                   {% if product.tax %} <span class="price-tax">{{ text_tax }} {{ product.tax }}</span> {% endif %} </p>*/
/*                 {% endif %}*/
/*                 {% if product.rating %}*/
/*                 <div class="rating"> {% for i in 1..5 %}*/
/*                   {% if product.rating < i %} <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> {% else %} <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>{% endif %}*/
/*                   {% endfor %} </div>*/
/*                 {% endif %} </div>*/
/*               <div class="button-group">*/
/*                 <button type="button" onclick="cart.add('{{ product.product_id }}', '{{ product.minimum }}');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">{{ button_cart }}</span></button>*/
/*                 <button type="button" data-toggle="tooltip" title="{{ button_wishlist }}" onclick="wishlist.add('{{ product.product_id }}');"><i class="fa fa-heart"></i></button>*/
/*                 <button type="button" data-toggle="tooltip" title="{{ button_compare }}" onclick="compare.add('{{ product.product_id }}');"><i class="fa fa-exchange"></i></button>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*         {% endfor %} </div>*/
/*       <div class="row">*/
/*         <div class="col-sm-6 text-left">{{ pagination }}</div>*/
/*         <div class="col-sm-6 text-right">{{ results }}</div>*/
/*       </div>*/
/*       {% endif %}*/
/*       {% if not categories and not products %}*/
/*       <p>{{ text_empty }}</p>*/
/*       <div class="buttons">*/
/*         <div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>*/
/*       </div>*/
/*       {% endif %}*/
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }} */
/* */
