
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link @if(request()->is('dashboard')) active @endif" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon">
                        {{-- <i class="fas fa-tachometer-alt"></i> --}}
                    </div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Principales</div>
                <a class="nav-link @if(request()->is('agents*')) active @endif" href="{{ route('agents.index') }}">
                    <div class="sb-nav-link-icon">
                        {{-- <i class="fas fa-users"></i> --}}
                    </div>
                    Intervenants
                </a>
                <a class="nav-link @if(request()->is('structures*')) active @endif" href="{{ route('structures.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Structures
                </a>
                <a class="nav-link" href="{{ route('employees.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Employés
                </a>
                <a class="nav-link @if(request()->is('materiels*')) active @endif" href="{{ route('materiels.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Matériels
                </a>
                <a class="nav-link @if(request()->is('fournisseurs*')) active @endif" href="{{ route('fournisseurs.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Fournisseurs
                </a>
                <div class="sb-sidenav-menu-heading">Procédures</div>
                <a class="nav-link @if(request()->is('affectations*')) active @endif" href="{{ route('affectations.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Afféctations
                </a>
                <a class="nav-link @if(request()->is('reparations*')) active @endif" href="{{ route('decharges_fournisseur.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Réparations
                </a>
                <a class="nav-link @if(request()->is('reformations*')) active @endif" href="{{ route('decharges_structure.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Réformations
                </a>
                <div class="sb-sidenav-menu-heading">bons</div>
                <a class="nav-link @if(request()->is('bons_entre*')) active @endif" href="{{ route('bons_entre.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Bons entré
                </a>
                <a class="nav-link @if(request()->is('bons_sortie*')) active @endif" href="{{ route('bons_sortie.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Bons sortie
                </a>
                <a class="nav-link @if(request()->is('bons_transfere*')) active @endif" href="{{ route('bons_transfere.index') }}">
                    <div class="sb-nav-link-icon"></div>
                    Bons transfére
                </a>

                {{-- <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> --}}
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Super admin
        </div> --}}
    </nav>
</div>
