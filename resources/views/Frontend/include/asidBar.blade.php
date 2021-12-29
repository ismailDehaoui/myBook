<div class="row">
    <div class="col-lg-6 py-4">
        <div class="sidebar">
            <div class="logo_content">
                <div class="logo">
                    <i class='bx bxs-category'></i>
                    <div class="logo">
                        Categoreis
                    </div>
                </div>
                <ul class="nav_list">
                    @foreach ($categoreis as $categorei)
                        <li>
                            <a href="{{url('/livre/categorie/'.$categorei->nom)}}">   
                                <span class="links_name">{{$categorei->nom}}</span>
                            </a>
                            <span class="tooltip">{{$categorei->nom}}</span>
                        </li>    
                    @endforeach  
                </ul>
                <div class="logo">
                    <img src="https://img.icons8.com/color/48/000000/language.png"/>
                    <div class="logo">
                        Langue
                    </div>    
                </div>
                <ul class="nav_list">
                    <li>
                        <a href="">       
                            <span class="links_name">Arabe</span>
                        </a>
                        <span class="tooltip">Arabe</span>
                    </li>
                    <li>
                        <a href="">       
                            <span class="links_name">Français</span>
                        </a>
                        <span class="tooltip">Français</span>
                    </li>
                    <li>
                        <a href="">       
                            <span class="links_name">Anglais</span>
                        </a>
                        <span class="tooltip">Anglais</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>