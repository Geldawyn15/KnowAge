<?php

/* Front/landingFormateur.html.twig */
class __TwigTemplate_7d2b4cb35f9ab49133fd7515982b03f00d51113c26b0cd1cb3a9db84d9fab4e1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout.html.twig", "Front/landingFormateur.html.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/landingFormateur.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/landingFormateur.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Landing Page Formation ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_stylesheet($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        echo "<link rel=\"stylesheet\" href=\"/assets/css/landingFormateur.css\">";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 9
        echo "    <div class=\"blocContent\">
        <div class=\"container-fluid color3\">
            <div class=\"row \">
                <div class=\"col-md-12 mt-4 mb-3 TagLineDavid\">
                    <div class=\"row\">
                        <div class=\"col-md-11\">
                            <h1 class=\"text-center FontTagLineDavid\">Votre savoir faire vaut de l'or</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"row \">
                <!--<img src=\"http://via.placeholder.com/800x400\" alt=\"Video\" class=\"img-responsive center-block mt-2\"> -->

                <div class=\"container center-block embed-responsive embed-responsive-16by9 mt-4 video1\">
                    <iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/Q71zL6S9YYc?ecver=2\" allowfullscreen>
                    </iframe>
                    <div class=\"bg-primary\">
                        <div class=\"text-center overlay\">
                            <div class=\"text\">
                                <h3>Voir la <span class=\"Videoo\">vidéo</span></h3>
                                <i class=\"fas fa-plus-circle plus\"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class=\"container fluid\">
            <div class=\"col-md-12 mb-4 mt-4 text-center\">
                <!--<button class=\"btn active mt-4 mb-4 button text-white bg-\" role=\"button\" aria-pressed=\"true\" type=\"submit\">Ajouter une formation</button>-->
                <a href=\"/creation\"  class=\"btn btn-primary mt-4 btn-lg buttonFormation\"> <i class=\"fas fa-user-plus\"></i> Ajouter une formation</a>
            </div>
        </div>
        <hr>


    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "Front/landingFormateur.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 9,  78 => 8,  60 => 4,  42 => 3,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% extends 'layout.html.twig' %}
{% block title %} Landing Page Formation {% endblock %}
{% block stylesheet %}<link rel=\"stylesheet\" href=\"/assets/css/landingFormateur.css\">{% endblock %}



{% block content %}
    <div class=\"blocContent\">
        <div class=\"container-fluid color3\">
            <div class=\"row \">
                <div class=\"col-md-12 mt-4 mb-3 TagLineDavid\">
                    <div class=\"row\">
                        <div class=\"col-md-11\">
                            <h1 class=\"text-center FontTagLineDavid\">Votre savoir faire vaut de l'or</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"row \">
                <!--<img src=\"http://via.placeholder.com/800x400\" alt=\"Video\" class=\"img-responsive center-block mt-2\"> -->

                <div class=\"container center-block embed-responsive embed-responsive-16by9 mt-4 video1\">
                    <iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/Q71zL6S9YYc?ecver=2\" allowfullscreen>
                    </iframe>
                    <div class=\"bg-primary\">
                        <div class=\"text-center overlay\">
                            <div class=\"text\">
                                <h3>Voir la <span class=\"Videoo\">vidéo</span></h3>
                                <i class=\"fas fa-plus-circle plus\"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class=\"container fluid\">
            <div class=\"col-md-12 mb-4 mt-4 text-center\">
                <!--<button class=\"btn active mt-4 mb-4 button text-white bg-\" role=\"button\" aria-pressed=\"true\" type=\"submit\">Ajouter une formation</button>-->
                <a href=\"/creation\"  class=\"btn btn-primary mt-4 btn-lg buttonFormation\"> <i class=\"fas fa-user-plus\"></i> Ajouter une formation</a>
            </div>
        </div>
        <hr>


    </div>
{% endblock %}

", "Front/landingFormateur.html.twig", "/home/wilder/Documents/No-Age2/No-Age/app/Resources/views/Front/landingFormateur.html.twig");
    }
}
