<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-institution"></i> Administration <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('profile') }}">Utilisateur</a></li>

                </ul>
            </li>

            <li><a><i class="fa fa-binoculars"></i> Collectes Donnees <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('experience') }}">Experience</a></li>
                    <li><a href="{{ url('listCible') }}">Numeros Aleatoires</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-bar-chart-o"></i> Statistiques <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('graphs') }}">graphiques</a></li>
                    <li><a href="{{ route('texts') }}">textuelles</a></li>
                    </ul>
            </li>
            </ul>
           </div>

</div>