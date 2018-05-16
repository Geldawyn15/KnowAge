<?php

/* Front/index.html.twig */
class __TwigTemplate_e055cf5df14a9fc44e1761d8ebcd840093b78a7283f9b5e0f934ad99cd1b254b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "Front/index.html.twig", 1);
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Accueil ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 3
    public function block_stylesheet($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        // line 4
        echo "    <link rel=\"stylesheet\" href=\"/assets/css/index.css\">
";
        
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
        echo "
    <button class=\"btn  scroll-top\" data-scroll=\"up\" type=\"button\">
        <i class=\"fa fa-chevron-up\"></i>
    </button>

    <div class=\"color3\">
        <div class=\"container-fluid\">
            <div class=\"row justify-content-center tagline\" style=\"margin-top: 0;\">
                <div class=\"col-10\" >
                    <h1 class=\"text-center tagline\" >Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
                </div>
            </div>
            <div class=\"row justify-content-center\">
                <div class=\"col-8\">
                    <div class=\"center-block  embed-responsive embed-responsive-16by9 mt-4\">
                        <iframe width=\"1525\" height=\"617\" src=\"https://www.youtube.com/embed/Q71zL6S9YYc\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class=\"row btnBottom\" style=\"padding-top: 50px; padding-bottom: 100px; margin-bottom: 0\">
                <div class=\"col-md-6 col-xl-6 d-flex justify-content-end\" style=\"padding-right: 80px \">
                    <a href=\"/formateur\" role=\"button\" aria-disabled=\"true\"> <button class=\"bottomBtn btn btn-primary btn-lg round\">Je Veux Former</button></a>
                </div>
                <div class=\"col-xs-12 col-md-6 d-flex justify-content-start apprendre\">
                    <a class=\" js-scrollTo\" href=\"#Search\"> <button type=\"button\" class=\"bottomBtn btn btn-primary btn-lg round\">Je Veux Apprendre </button></a>
                </div>
            </div>
        </div>
    </div>
    <div class=\"container color2\" id=\"Search\">
        <div class=\"row justify-content-center \">
            <div class=\"col-md-5\" >
                <h2 class=\"text-center typo\"> Trouver une formation </h2>
            </div>
        </div>


        <div class=\"row justify-content-center Search\">
            <div class=\"offset-md-1 col-12 text-center\">
                <h3 class=\"keyword text-left\"> Par mots-clés </h3>
                <form action=\"\" >
                    <div class=\"input-group mb-3\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"Search...\" aria-label=\"Recipient's username\" aria-describedby=\"basic-addon2\">
                        <div class=\"input-group-append\">
                            <a href=\"/search\"> <button class=\"btnSearch btn btn-secondary\" type=\"button\"><i class=\"fas fa-search\"></i></button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class=\"container-fluid toto\">
            <div class=\"main\">
                <h3 class=\"text-left category\"> Par catégorie </h3>
            </div>
            <div class=\"row\">
                <div class=\"column nature\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/xo6cjHe.jpg\" alt=\"Mountains\" style=\"width:100%\">
                        <p class=\"todisplay\"> Famille </p>
                    </div>
                </div>
                <div class=\"column nature\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/h9xwpKw.png\" alt=\"Lights\" style=\"width:100%\">
                        <p class=\"todisplay\"> Maison </p>
                    </div>
                </div>
                <div class=\"column nature\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/GKacePt.png\" alt=\"Nature\" style=\"width:100%\">
                        <p class=\"todisplay\"> Vacances </p>
                    </div>
                </div>

                <div class=\"column cars\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/1ko3YmL.png\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Robotique </p>
                    </div>
                </div>
                <div class=\"column cars\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/1tAXicv.jpg\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Marketing </p>
                    </div>
                </div>
                <div class=\"column cars\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/WAsBTwe.png\" alt=\"Car\" style=\"width:100%\" >
                        <p class=\"todisplay\"> Commerce international </p>
                    </div>
                </div>

                <div class=\"column people\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/e6aQJQB.jpg\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Biologie </p>
                    </div>
                </div>
                <div class=\"column people\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/7frPtS2.jpg\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Culture </p>
                    </div>
                </div>
                <div class=\"column people\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/QKS81Pm.png\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Import/Export </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class=\"container-fluid color3 \" style=\"padding-top: 30px\">
        <div class=\"container main2\">
            <div class=\"row justify-content-center\">
                <div class=\"col-8\">
                    <h3 class=\"text-center typo\">Le concept</h3>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-6 left \">
                    <img class=\"img-fluid\" src=\"https://i.imgur.com/qmNiS5M.jpg\" width=\"450\" height=\"160\">
                </div>
                <div class=\"col-6\">
                    <p style=\"text-align: left\">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-6 left\">
                    <p style=\"text-align: right\">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class=\"col-6\">
                    <img class=\"img-fluid\" src=\"https://i.imgur.com/7hwALR7.jpg\" width=\"450\" height=\"160\">
                </div>
            </div>
            <div class=\"row mb-0\">
                <div class=\"col-6 left\">
                    <img class=\"img-fluid\" src=\"https://i.imgur.com/VADzyH7.jpg\" width=\"450\" height=\"160\">
                </div>
                <div class=\"col-6 \" >
                    <p style=\"text-align: left  \">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
        return "Front/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 10,  80 => 9,  69 => 4,  60 => 3,  42 => 2,  11 => 1,);
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
{% block title %} Accueil {% endblock %}
{% block stylesheet %}
    <link rel=\"stylesheet\" href=\"/assets/css/index.css\">
{% endblock %}



{% block content %}

    <button class=\"btn  scroll-top\" data-scroll=\"up\" type=\"button\">
        <i class=\"fa fa-chevron-up\"></i>
    </button>

    <div class=\"color3\">
        <div class=\"container-fluid\">
            <div class=\"row justify-content-center tagline\" style=\"margin-top: 0;\">
                <div class=\"col-10\" >
                    <h1 class=\"text-center tagline\" >Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
                </div>
            </div>
            <div class=\"row justify-content-center\">
                <div class=\"col-8\">
                    <div class=\"center-block  embed-responsive embed-responsive-16by9 mt-4\">
                        <iframe width=\"1525\" height=\"617\" src=\"https://www.youtube.com/embed/Q71zL6S9YYc\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class=\"row btnBottom\" style=\"padding-top: 50px; padding-bottom: 100px; margin-bottom: 0\">
                <div class=\"col-md-6 col-xl-6 d-flex justify-content-end\" style=\"padding-right: 80px \">
                    <a href=\"/formateur\" role=\"button\" aria-disabled=\"true\"> <button class=\"bottomBtn btn btn-primary btn-lg round\">Je Veux Former</button></a>
                </div>
                <div class=\"col-xs-12 col-md-6 d-flex justify-content-start apprendre\">
                    <a class=\" js-scrollTo\" href=\"#Search\"> <button type=\"button\" class=\"bottomBtn btn btn-primary btn-lg round\">Je Veux Apprendre </button></a>
                </div>
            </div>
        </div>
    </div>
    <div class=\"container color2\" id=\"Search\">
        <div class=\"row justify-content-center \">
            <div class=\"col-md-5\" >
                <h2 class=\"text-center typo\"> Trouver une formation </h2>
            </div>
        </div>


        <div class=\"row justify-content-center Search\">
            <div class=\"offset-md-1 col-12 text-center\">
                <h3 class=\"keyword text-left\"> Par mots-clés </h3>
                <form action=\"\" >
                    <div class=\"input-group mb-3\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"Search...\" aria-label=\"Recipient's username\" aria-describedby=\"basic-addon2\">
                        <div class=\"input-group-append\">
                            <a href=\"/search\"> <button class=\"btnSearch btn btn-secondary\" type=\"button\"><i class=\"fas fa-search\"></i></button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class=\"container-fluid toto\">
            <div class=\"main\">
                <h3 class=\"text-left category\"> Par catégorie </h3>
            </div>
            <div class=\"row\">
                <div class=\"column nature\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/xo6cjHe.jpg\" alt=\"Mountains\" style=\"width:100%\">
                        <p class=\"todisplay\"> Famille </p>
                    </div>
                </div>
                <div class=\"column nature\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/h9xwpKw.png\" alt=\"Lights\" style=\"width:100%\">
                        <p class=\"todisplay\"> Maison </p>
                    </div>
                </div>
                <div class=\"column nature\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/GKacePt.png\" alt=\"Nature\" style=\"width:100%\">
                        <p class=\"todisplay\"> Vacances </p>
                    </div>
                </div>

                <div class=\"column cars\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/1ko3YmL.png\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Robotique </p>
                    </div>
                </div>
                <div class=\"column cars\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/1tAXicv.jpg\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Marketing </p>
                    </div>
                </div>
                <div class=\"column cars\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/WAsBTwe.png\" alt=\"Car\" style=\"width:100%\" >
                        <p class=\"todisplay\"> Commerce international </p>
                    </div>
                </div>

                <div class=\"column people\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/e6aQJQB.jpg\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Biologie </p>
                    </div>
                </div>
                <div class=\"column people\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/7frPtS2.jpg\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Culture </p>
                    </div>
                </div>
                <div class=\"column people\">
                    <div class=\"content\">
                        <img class=\"img-fluid tofade\" src=\"https://i.imgur.com/QKS81Pm.png\" alt=\"Car\" style=\"width:100%\">
                        <p class=\"todisplay\"> Import/Export </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class=\"container-fluid color3 \" style=\"padding-top: 30px\">
        <div class=\"container main2\">
            <div class=\"row justify-content-center\">
                <div class=\"col-8\">
                    <h3 class=\"text-center typo\">Le concept</h3>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-6 left \">
                    <img class=\"img-fluid\" src=\"https://i.imgur.com/qmNiS5M.jpg\" width=\"450\" height=\"160\">
                </div>
                <div class=\"col-6\">
                    <p style=\"text-align: left\">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-6 left\">
                    <p style=\"text-align: right\">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class=\"col-6\">
                    <img class=\"img-fluid\" src=\"https://i.imgur.com/7hwALR7.jpg\" width=\"450\" height=\"160\">
                </div>
            </div>
            <div class=\"row mb-0\">
                <div class=\"col-6 left\">
                    <img class=\"img-fluid\" src=\"https://i.imgur.com/VADzyH7.jpg\" width=\"450\" height=\"160\">
                </div>
                <div class=\"col-6 \" >
                    <p style=\"text-align: left  \">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>



{% endblock %}

", "Front/index.html.twig", "/home/wilder/Documents/No-Age2/No-Age/app/Resources/views/Front/index.html.twig");
    }
}
