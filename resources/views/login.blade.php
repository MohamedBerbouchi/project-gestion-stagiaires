<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Kanakku - Bootstrap Admin HTML Template</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper login-body p-1 ">
        <div class="login-wrapper pt-0 mt-0 ">
            <div class="container p-0">

                    <!-- ---------------------------------- -->

                    <div class="loginbox mb-0 mt-5 p-2 ">
                        <div class="login-right  p-2 m-0 ">
                            <div class="login-right-wrap " >
                                <h1>Connexion</h1>
                                <p class="account-subtitle mb-3" >Accéder à notre tableau de bord</p>
                                <form action="{{ route('loginUtilisateur') }}" method="POST" >
                                    @csrf
                                    <div class="form-group mb-3" >
                                        <label class="form-control-label">Login :</label>
                                        <input type="text" class="form-control" name="login" value="{{old('login')}}">
                                       
                                         
                                            @error('login')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                         
                                        
                                    </div>

                                    <div class="form-group mb-3" >
                                        <label class="form-control-label">Mot de pass </label>
                                        <div class="pass-group">
                                            <input type="password" class="form-control pass-input" name="pwd">
                                            <span class="fas fa-eye toggle-password"></span>
                                            @error('pwd')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3" >
                                        <div class="row">
                                            <div class="col-6 text-end w-100 text-center">
                                                <a class="forgot-link" href="Mot_de_passe_oublie">Mot de passe oublié ?</a>
                                            </div>
                                        </div>
                                    </div>
                                        <button  class="btn btn-lg btn-block btn-primary w-100 mb-1" type="submit">Se connecter</button>
                                        <div class="text-center dont-have mt-3" >
                                            Vous n'avez pas encore de compte? <a href="Inscrire">Créer mon compte</a>
                                        </div>
                                </form>
                                    
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>