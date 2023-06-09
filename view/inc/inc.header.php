<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">KinderDelice</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="/" class="nav-link <?php if($menu['page'] == "accueil") echo "active";?>">Accueil</a>
        </li>
        <li class="nav-item">
            <a href="produit/" class="nav-link <?php if($menu['page'] == "produit") echo "active";?>">Produit</a>
        </li>
        <li class="nav-item">
            <a href="post/" class="nav-link <?php if($menu['page'] == "post") echo "active";?>">Blog</a>
        </li>
        <li class="nac-item">
            <a href="panier/" class="nav-link <?php if($menu['page'] == "panier") echo "active";?>">Panier</a>
        </li>
    </ul>


</header>
<main>