<?php

/* Front/search.html.twig */
class __TwigTemplate_73aa27748d9107d3ff5f743e094e87e021ab8a3dc6b70840ffb33d1b73550b96 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "Front/search.html.twig", 1);
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/search.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Front/search.html.twig"));

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

        echo "<link rel=\"stylesheet\" href=\"/assets/css/search.css\">";
        
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

        echo " Recherche ";
        
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

<div class=\"container\">
    <div class=\"row searchbar\" style=\"padding-bottom: 30px\">
        <div class=\"col-md-12 text-center\">
            <form action=\"\" >
                <div class=\"input-group mb-3\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"Johnny\" aria-label=\"Recipient's username\" aria-describedby=\"basic-addon2\">
                    <div class=\"input-group-append\">
                        <button class=\"btnSearch btn btn-secondary\" type=\"button\"> <i class=\"fas fa-search\"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div class=\"container\">
    <div class=\"row \">
        <div class=\"col-md-5\" >
            <h2 class=\"title typo\"> Résultat de la recherche :</h2>
        </div>
    </div>
</div>

<section>
    <div class=\"container py-3 search-result\">
        <div class=\"card \">
            <div class=\"row \">
                <div class=\"col-md-4 picture\" >
                    <img src=\"https://i.imgur.com/7Z8rscT.jpg\" class=\"w-100\" id=\"img-formation\">
                </div>
                <div class=\"col-md-8 px-3\">
                    <div class=\"card-block px-3\">
                        <h4 class=\"card-title\">Votre premier Take Off </h4>
                        <p class=\"author\">Par Johnny Utah</p>
                        <p class=\"card-text\">Se mettre debout sur sa planche est difficile à accomplir pour les débutants, mais avec la bonne méthode et de l’entrainement on y arrive. C’est une moment magique mais il réserve bien des surprises! La qualité du take-off conditionne très souvent la qualité de la prestation sur la vague.</p>
                    </div>
                    <div class=\"interact\">
                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect seeForm\">Voir la formation</a>

                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect addFavorite \">Ajouter aux favoris</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>

<section>
<div class=\"container py-3 search-result color2\">
    <div class=\"card\">
        <div class=\"row \">
            <div class=\"col-md-4\" id=\"img-formation\" >
                <img src=\"https://i.imgur.com/PrKE64K.jpg?\" id=\"img-formation\" class=\"w-100\">
            </div>
            <div class=\"col-md-8 px-3\">
                <div class=\"card-block px-3\">
                    <h4 class=\"card-title\">How to calcul your import duty</h4>
                    <p class=\"author\">Par Johnny BeGood</p>
                    <p class=\"card-text\">Import duty is a tax collected on imports and some exports by a country's customs authorities. It is usually based on the imported good's value. Depending on the context, import duty may also be referred to as customs duty, tariff, import tax or import tariff. </p>
                </div>
                <div class=\"interact\">
                    <a href=\"#\" class=\"btn btn-outline-secondary waves-effect seeForm\">Voir la formation</a>
                    <a href=\"#\" class=\"btn btn-outline-secondary waves-effects addFavorite \">Ajouter aux favoris</a>
                </div>
            </div>

        </div>
    </div>
</div>
</section>

<section>
    <div class=\"container py-3 search-result color \">
        <div class=\"card\">
            <div class=\"row \">
                <div class=\"col-md-4\" id=\"img-formation\">
                    <img src=\"https://i.imgur.com/i6PNrrd.png\" id=\"img-formation\" class=\"w-100\">
                </div>
                <div class=\"col-md-8 px-3\">
                    <div class=\"card-block px-3\">
                        <h4 class=\"card-title\">Le responsive et Bootstrap</h4>
                        <p class=\"author\">Par John Doe</p>
                        <p class=\"card-text\">Ce cours va vous guider dans la découverte de cette puissante boîte à outils. Bootstrap, kit CSS créé par les développeurs de Twitter, est devenu en peu de temps le framework CSS de référence. Vous allez découvrir pas à pas comment construire rapidement et facilement des sites web esthétiques et responsives.</p>
                    </div>
                    <div class=\"interact\">
                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect seeForm\">Voir la formation</a>
                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect addFavorite\">Ajouter aux favoris</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
</section>
    <div class=\"container ti\">
    <nav aria-label=\"pagination\">
        <ul class=\"pagination\">
            <li class=\"page-item disabled\">
                <a class=\"page-link\" href=\"#\" tabindex=\"-1\">Previous</a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">1</a></li>
            <li class=\"page-item active\">
                <a class=\"page-link\" href=\"#\">2 <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">3</a></li>
            <li class=\"page-item\">
                <a class=\"page-link\" href=\"#\">Next</a>
            </li>
        </ul>
    </nav>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "Front/search.html.twig";
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
{% block stylesheet %}<link rel=\"stylesheet\" href=\"/assets/css/search.css\">{% endblock %}
{% block title %} Recherche {% endblock %}

{% block content %}


<div class=\"container\">
    <div class=\"row searchbar\" style=\"padding-bottom: 30px\">
        <div class=\"col-md-12 text-center\">
            <form action=\"\" >
                <div class=\"input-group mb-3\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"Johnny\" aria-label=\"Recipient's username\" aria-describedby=\"basic-addon2\">
                    <div class=\"input-group-append\">
                        <button class=\"btnSearch btn btn-secondary\" type=\"button\"> <i class=\"fas fa-search\"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div class=\"container\">
    <div class=\"row \">
        <div class=\"col-md-5\" >
            <h2 class=\"title typo\"> Résultat de la recherche :</h2>
        </div>
    </div>
</div>

<section>
    <div class=\"container py-3 search-result\">
        <div class=\"card \">
            <div class=\"row \">
                <div class=\"col-md-4 picture\" >
                    <img src=\"https://i.imgur.com/7Z8rscT.jpg\" class=\"w-100\" id=\"img-formation\">
                </div>
                <div class=\"col-md-8 px-3\">
                    <div class=\"card-block px-3\">
                        <h4 class=\"card-title\">Votre premier Take Off </h4>
                        <p class=\"author\">Par Johnny Utah</p>
                        <p class=\"card-text\">Se mettre debout sur sa planche est difficile à accomplir pour les débutants, mais avec la bonne méthode et de l’entrainement on y arrive. C’est une moment magique mais il réserve bien des surprises! La qualité du take-off conditionne très souvent la qualité de la prestation sur la vague.</p>
                    </div>
                    <div class=\"interact\">
                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect seeForm\">Voir la formation</a>

                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect addFavorite \">Ajouter aux favoris</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>

<section>
<div class=\"container py-3 search-result color2\">
    <div class=\"card\">
        <div class=\"row \">
            <div class=\"col-md-4\" id=\"img-formation\" >
                <img src=\"https://i.imgur.com/PrKE64K.jpg?\" id=\"img-formation\" class=\"w-100\">
            </div>
            <div class=\"col-md-8 px-3\">
                <div class=\"card-block px-3\">
                    <h4 class=\"card-title\">How to calcul your import duty</h4>
                    <p class=\"author\">Par Johnny BeGood</p>
                    <p class=\"card-text\">Import duty is a tax collected on imports and some exports by a country's customs authorities. It is usually based on the imported good's value. Depending on the context, import duty may also be referred to as customs duty, tariff, import tax or import tariff. </p>
                </div>
                <div class=\"interact\">
                    <a href=\"#\" class=\"btn btn-outline-secondary waves-effect seeForm\">Voir la formation</a>
                    <a href=\"#\" class=\"btn btn-outline-secondary waves-effects addFavorite \">Ajouter aux favoris</a>
                </div>
            </div>

        </div>
    </div>
</div>
</section>

<section>
    <div class=\"container py-3 search-result color \">
        <div class=\"card\">
            <div class=\"row \">
                <div class=\"col-md-4\" id=\"img-formation\">
                    <img src=\"https://i.imgur.com/i6PNrrd.png\" id=\"img-formation\" class=\"w-100\">
                </div>
                <div class=\"col-md-8 px-3\">
                    <div class=\"card-block px-3\">
                        <h4 class=\"card-title\">Le responsive et Bootstrap</h4>
                        <p class=\"author\">Par John Doe</p>
                        <p class=\"card-text\">Ce cours va vous guider dans la découverte de cette puissante boîte à outils. Bootstrap, kit CSS créé par les développeurs de Twitter, est devenu en peu de temps le framework CSS de référence. Vous allez découvrir pas à pas comment construire rapidement et facilement des sites web esthétiques et responsives.</p>
                    </div>
                    <div class=\"interact\">
                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect seeForm\">Voir la formation</a>
                        <a href=\"#\" class=\"btn btn-outline-secondary waves-effect addFavorite\">Ajouter aux favoris</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
</section>
    <div class=\"container ti\">
    <nav aria-label=\"pagination\">
        <ul class=\"pagination\">
            <li class=\"page-item disabled\">
                <a class=\"page-link\" href=\"#\" tabindex=\"-1\">Previous</a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">1</a></li>
            <li class=\"page-item active\">
                <a class=\"page-link\" href=\"#\">2 <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">3</a></li>
            <li class=\"page-item\">
                <a class=\"page-link\" href=\"#\">Next</a>
            </li>
        </ul>
    </nav>
    </div>

{% endblock %}", "Front/search.html.twig", "/home/wilder/Documents/No-Age2/No-Age/app/Resources/views/Front/search.html.twig");
    }
}
