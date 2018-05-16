<?php

/* Front/contact.html.twig */
class __TwigTemplate_903f4aac09c2a6ed490b438e3a416cfcf33a69df0cd12b0bad73f7efbe6f8613 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "Front/contact.html.twig", 1);
        $this->blocks = array(
            'stylesheet' => array($this, 'block_stylesheet'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/contact.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/contact.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheet($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        echo "<link rel=\"stylesheet\" href=\"/assets/css/contact.css\">";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Contact ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "


<div class=\"container\" id=\"ContactUs\">
    <div class=\"row\">
        <div class=\"col-md-12\">
            <h1 class=\"contactTitle typo\">Contactez-nous :</h1>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-md-12\">
            <div class=\"containerSmall1\">
                <form>
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"input-icon-wrap\">
                                    <span class=\"input-icon\"><span class=\"fa fa-user\"></span></span>
                                    <input type=\"text\" id=\"form_name\" name=\"lastname\" class=\"form-control\" placeholder=\"Prenom\" required=\"required\">
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"input-icon-wrap\">
                                    <span class=\"input-icon\"><span class=\"fa fa-user\"></span></span>
                                    <input type=\"text\" id=\"form_lastname\" name=\"firstname\" class=\"form-control\" placeholder=\"Nom\" required=\"required\">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">

                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"input-icon-wrap\">
                                    <span class=\"input-icon\"><span class=\"fas fa-envelope\"></span></span>
                                    <input id=\"form_email\" type=\"email\" name=\"email\" class=\"form-control\" placeholder=\"Votre Email\" required=\"required\">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4>Votre Message:</h4>
                    <div>
                        <div class=\"row\">

                            <div class=\"col-md-12\">
                                <div class=\"form-group\">
                                    <textarea id=\"form_message\" name=\"message\" class=\"form-control\" placeholder=\"Rédigez votre message ici\" rows=\"6\" required=\"required\"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-md-9 offset-3\">
                        <input id=\"btn\" type=\"submit\" class=\"bottomBtn btn btn-primary btn-lg round\" value=\"Envoyer message\">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "Front/contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 6,  78 => 5,  60 => 3,  42 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'layout.html.twig' %}
{% block stylesheet %}<link rel=\"stylesheet\" href=\"/assets/css/contact.css\">{% endblock %}
{% block title %} Contact {% endblock %}

{% block content %}



<div class=\"container\" id=\"ContactUs\">
    <div class=\"row\">
        <div class=\"col-md-12\">
            <h1 class=\"contactTitle typo\">Contactez-nous :</h1>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-md-12\">
            <div class=\"containerSmall1\">
                <form>
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"input-icon-wrap\">
                                    <span class=\"input-icon\"><span class=\"fa fa-user\"></span></span>
                                    <input type=\"text\" id=\"form_name\" name=\"lastname\" class=\"form-control\" placeholder=\"Prenom\" required=\"required\">
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"input-icon-wrap\">
                                    <span class=\"input-icon\"><span class=\"fa fa-user\"></span></span>
                                    <input type=\"text\" id=\"form_lastname\" name=\"firstname\" class=\"form-control\" placeholder=\"Nom\" required=\"required\">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">

                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"input-icon-wrap\">
                                    <span class=\"input-icon\"><span class=\"fas fa-envelope\"></span></span>
                                    <input id=\"form_email\" type=\"email\" name=\"email\" class=\"form-control\" placeholder=\"Votre Email\" required=\"required\">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4>Votre Message:</h4>
                    <div>
                        <div class=\"row\">

                            <div class=\"col-md-12\">
                                <div class=\"form-group\">
                                    <textarea id=\"form_message\" name=\"message\" class=\"form-control\" placeholder=\"Rédigez votre message ici\" rows=\"6\" required=\"required\"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"col-md-9 offset-3\">
                        <input id=\"btn\" type=\"submit\" class=\"bottomBtn btn btn-primary btn-lg round\" value=\"Envoyer message\">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{% endblock %}
", "Front/contact.html.twig", "/home/wilder/Documents/No-Age2/No-Age/app/Resources/views/Front/contact.html.twig");
    }
}
