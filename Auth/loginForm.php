<div class="bg_home">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold mb-4 text-white">
                Agenda <span class="fw-normal">App</span>
            </h1>
            <img src="./Assets/Images/logo.png" alt="" width="100" height="90">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="alert alert-danger" role="alert" id="error" style="margin-top: .5em; display: none;"></div>
                <div class="card shadow">
                    <div class="card-body p-4">
                        <form method="POST" id="loginform" class="form-signin">
                            <div class="mb-3 form-group"> 
                                <label for="email" class="form-label text-uppercase fw-bold text-secondary">
                                    Email
                                </label>
                                <input type="email" class="form-control py-2" name="email" placeholder="Ingresa tu Email" required autofocus>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="password" class="form-label text-uppercase fw-bold text-secondary">
                                    Contraseña
                                </label>
                                <input type="password" class="form-control py-2"name="password" placeholder="Ingresa tu Password" required autofocus>
                                
                            </div>

                            <button type="submit" class="btn btn-indigo w-100 py-2 mt-3">
                                Login
                            </button>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
