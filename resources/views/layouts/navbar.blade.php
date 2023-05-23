<div class="header header-one">
    <div class="header-left header-left-one">
        <a href="/home" class="logo">
            <img src="{{asset('assets/img/Logo_ofppt.png')}}" alt="Logo">
        </a>
        <!-- <a href="index.html" class="white-logo" style="border:2px solid yellow">>
            <img src="assets\img\logo-white.png" alt="Logo">
        </a> -->
        <a href="\home" class="logo logo-small" >
            <img src="{{asset('assets/img/Logo_ofppt.png')}}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div> -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <ul class="nav nav-tabs user-menu">
        <!-- <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                <img src="assets/img/flags/us.png" alt="" height="20"> <span>English</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="assets/img/flags/us.png" alt="" height="16"> English
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="assets/img/flags/fr.png" alt="" height="16"> French
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="assets/img/flags/de.png" alt="" height="16"> German
                </a>
            </div>
        </li> -->

        <!-- <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i> <span class="badge rounded-pill">5</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
            
                        
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media d-flex">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title rounded-circle bg-info-light"><i
                                                class="far fa-comment"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">You have received a new
                                                message</span></p>
                                        <p class="noti-time"><span class="notification-time">2 days ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activities.html">View all Notifications</a>
                </div>
            </div>
        </li> -->


        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="assets/img/coding.png" alt="">
                    <span class="status online"></span>
                </span>
                @php
                use Illuminate\Support\Facades\Session;
                use App\Models\Utilisateur;

                 $userId = Session::get('userId');
                $userRole = Utilisateur::select("role")->where("id", $userId)->first()->role;
                 @endphp
                @if ($userRole == "Directeur")
                
                     <span>Directeur</span>
                
                @else
                     <span>Secretaire</span>

                @endif
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile"><i data-feather="user" class="me-1"></i>
                    Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="log-out" class="me-1"></i>
                    Logout</a>
            </div>
        </li>
    </ul>
</div>