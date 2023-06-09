<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
<ul class="nav nav-pills">
        <li class="nav-item">
            <a href="liste/" class="nav-link <?php if($menu['page'] == "liste") echo "active";?>">Liste</a>
        </li>
        <li class="nav-item">
            <a href="commande/" class="nav-link <?php if($menu['page'] == "commande") echo "active";?>">Commande</a>
        </li>
        <li class="nav-item">
            <a href="paiement/" class="nav-link <?php if($menu['page'] == "paiement") echo "active";?>">Paiement</a>
        </li>
        <li class="nac-item">
            <a href="test/" class="nav-link <?php if($menu['page'] == "test") echo "active";?>">Test</a>
        </li>
    </ul>

    <div class="d-flex justify-content-center align-items-end mb-3 mb-md-0 me-md-auto">
        <a href="" class="text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            &copy <span class="fs-4">KinderDelice</span>
        </a>
    </div>
</header>
<main>
