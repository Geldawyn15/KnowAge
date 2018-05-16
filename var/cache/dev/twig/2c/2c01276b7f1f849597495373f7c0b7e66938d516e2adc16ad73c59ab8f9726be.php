<?php

/* Front/create.html.twig */
class __TwigTemplate_dcbcbc0e8f97675724c9ebd4625fedfab743e56d7a789de84ce0b1125f35f064 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout.html.twig", "Front/create.html.twig", 2);
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/create.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/create.html.twig"));

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

        echo " Créer une formation ";
        
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

        echo "<link rel=\"stylesheet\" href=\"/assets/css/create.css\">";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 10
        echo "            <div class=\"container-fluid \">
                <div class=\"row title mt-4 mb-4\">
                    <div class=\"col-md-12 mt-3\">
                        <div class=\"row\">
                            <div class=\"col-md-11 mb-3\">
                                <h1 class=\"text-center FontTagLineDavid\">Je crée ma formation</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"mb-3 containerDavid\">
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Titre</span>
                                </div>
                                <input type=\"text\" class=\"form-control ininputCreate\" aria-label=\"Default\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <div class=\"input-group\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\">Description</span>
                                </div>
                                <textarea class=\"form-control ininputCreate\" aria-label=\"With textarea\"></textarea>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Mots clés</span>
                                </div>
                                <input type=\"text\" class=\"form-control ininputCreate\" aria-label=\"Default\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect01\">Domaine</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect01\">
                                    <option selected>Choississez un domaine...</option>
                                    <option value=\"1\">Sport</option>
                                    <option value=\"2\">Cuisine</option>
                                    <option value=\"3\">Musique</option>
                                </select>
                            </div>
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect02\">Difficulté</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect02\">
                                    <option selected>Choisissez...</option>
                                    <option value=\"1\">Débutant</option>
                                    <option value=\"2\">Intermediairee</option>
                                    <option value=\"3\">Confirmé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-4 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect03\">Prix</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect03\">
                                    <option selected>Choisissez...</option>
                                    <option value=\"1\">60€</option>
                                    <option value=\"2\">30€</option>
                                    <option value=\"3\">12€</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-4 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect04\">Modèle</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect04\">
                                    <option selected>Choisissez...</option>
                                    <option value=\"1\">Petit</option>
                                    <option value=\"2\">Moyen</option>
                                    <option value=\"3\">Grand</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-4 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text inputCreate\">Upload</span>
                                </div>
                                <div class=\"custom-file\">
                                    <input type=\"file\" class=\"custom-file-input\" id=\"inputGroupFile01\">
                                    <label class=\"custom-file-label\" for=\"inputGroupFile01\">Choisissez un fichier</label>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>

                <div class=\"row \">
                    <div class=\"col-md-12 mb-4 mt-4 text-center\">
                        <button type=\"button\" class=\"btn btn-primary mt-4 btn-lg round buttonFormation\"><i class=\"far fa-arrow-alt-circle-right\"></i> Etape suivante </button>
                    </div>
                </div>
                <hr>

            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "Front/create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 10,  78 => 9,  60 => 4,  42 => 3,  11 => 2,);
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
            {% block title %} Créer une formation {% endblock %}
            {% block stylesheet %}<link rel=\"stylesheet\" href=\"/assets/css/create.css\">{% endblock %}




            {% block content %}
            <div class=\"container-fluid \">
                <div class=\"row title mt-4 mb-4\">
                    <div class=\"col-md-12 mt-3\">
                        <div class=\"row\">
                            <div class=\"col-md-11 mb-3\">
                                <h1 class=\"text-center FontTagLineDavid\">Je crée ma formation</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"mb-3 containerDavid\">
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Titre</span>
                                </div>
                                <input type=\"text\" class=\"form-control ininputCreate\" aria-label=\"Default\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <div class=\"input-group\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\">Description</span>
                                </div>
                                <textarea class=\"form-control ininputCreate\" aria-label=\"With textarea\"></textarea>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Mots clés</span>
                                </div>
                                <input type=\"text\" class=\"form-control ininputCreate\" aria-label=\"Default\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect01\">Domaine</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect01\">
                                    <option selected>Choississez un domaine...</option>
                                    <option value=\"1\">Sport</option>
                                    <option value=\"2\">Cuisine</option>
                                    <option value=\"3\">Musique</option>
                                </select>
                            </div>
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect02\">Difficulté</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect02\">
                                    <option selected>Choisissez...</option>
                                    <option value=\"1\">Débutant</option>
                                    <option value=\"2\">Intermediairee</option>
                                    <option value=\"3\">Confirmé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-4 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect03\">Prix</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect03\">
                                    <option selected>Choisissez...</option>
                                    <option value=\"1\">60€</option>
                                    <option value=\"2\">30€</option>
                                    <option value=\"3\">12€</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-4 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <label class=\"input-group-text\" for=\"inputGroupSelect04\">Modèle</label>
                                </div>
                                <select class=\"custom-select\" id=\"inputGroupSelect04\">
                                    <option selected>Choisissez...</option>
                                    <option value=\"1\">Petit</option>
                                    <option value=\"2\">Moyen</option>
                                    <option value=\"3\">Grand</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"col-md-4 mb-3\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text inputCreate\">Upload</span>
                                </div>
                                <div class=\"custom-file\">
                                    <input type=\"file\" class=\"custom-file-input\" id=\"inputGroupFile01\">
                                    <label class=\"custom-file-label\" for=\"inputGroupFile01\">Choisissez un fichier</label>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>

                <div class=\"row \">
                    <div class=\"col-md-12 mb-4 mt-4 text-center\">
                        <button type=\"button\" class=\"btn btn-primary mt-4 btn-lg round buttonFormation\"><i class=\"far fa-arrow-alt-circle-right\"></i> Etape suivante </button>
                    </div>
                </div>
                <hr>

            {% endblock %}", "Front/create.html.twig", "/home/wilder/Documents/No-Age2/No-Age/app/Resources/views/Front/create.html.twig");
    }
}
