<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class=" @if(request()->is('home*')  ) active @endif">
                    <a href="{{ route('home') }}"><i class='bx bx-home'></i><span>Home</span></a>
                </li>
                <li class=" @if(request()->is('stagiaires*')  ) active @endif">
                    <a href="{{  route('stagiaires.index') }}">
                        
                        <i class='bx bx-id-card'></i>
                        <span>les stagiaires</span></a>
                </li>
                <li class=" @if(request()->is('filieres*')  ) active @endif">
                    <a href="{{  route('filieres.index') }}">
                        <!-- <i class="ion-university"></i> -->
                        <i class='bx bx-spreadsheet'></i> 
                        <span>les filiere</span></a>
                </li>
            
    
                <li class=" @if(request()->is('matieres*') ) active @endif">
                    <a href="{{  route('matieres.index') }}">
                        <!-- <i class="fa fa-tag"></i>  -->
                        <i class='bx bxs-detail'></i>
                        <span>les matiéres</span></a>
                </li>
            
            
                <li class=" @if(request()->is('programmes*')  ) active @endif">
                    <a href="{{  route('programmes.index') }}">
                        <!-- <i class='bx bxs-credit-card'></i>  -->
                        <i class='bx bxs-dashboard'></i>
                        <span>les programmes</span></a>
                </li> 

                @php
                    use Illuminate\Support\Facades\Session;
                    use App\Models\Utilisateur;

                     $userId = Session::get('userId');
                    $userRole = Utilisateur::select("role")->where("id", $userId)->first()->role;
                @endphp
                @if ($userRole == "Directeur")
                    
                <li class=" @if(request()->is('utilisateurs*')  ) active @endif">
                    <a href="{{  route('utilisateurs.index') }}">
                        <i class='bx bx-group'></i>
                        <!-- <i class="fa fa-users"></i> -->
                        <span>les utilisateurs</span></a>
                </li>
                @endif
                
            </ul>
        </div>
    </div>
</div>
