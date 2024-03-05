<!-- Content Row -->

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Alta usuario</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/usuarios-sistema/add" method="post">         
                    <!--form method="get"-->
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="nombre_completo">Nombre completo</label>
                            <input class="form-control" id="nombre_completo" type="text" name="nombre_completo" placeholder="Nombre completo" value="">
                            <p class="text-danger">Campo obligatorio</p>
                        </div>
                        <div class="mb-3 col-sm-3">
                            <label for="pass">Contraseña</label>
                            <input class="form-control" id="pass" type="password" name="pass" placeholder="Contraseña" value="">
                            <p class="text-danger">Las contraseñas no coinciden</p>
                        </div>
                        <div class="mb-3 col-sm-3">
                            <label for="pass2">Repetir Contraseña</label>
                            <input class="form-control" id="pass2" type="password" name="pass2" placeholder="Repetir contraseña" value="">
                            <p class="text-danger">Error pass2</p>
                        </div>
                         <div class="mb-3 col-sm-3">
                            <label for="dni">DNI</label>
                            <input class="form-control" id="dni" type="dni" name="dni" placeholder="00000000X" value="12345678X">
                            <p class="text-danger">DNI en uso</p>
                        </div>
                        <div class="mb-3 col-sm-3">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="miemail@dominio.org" value="">
                            <p class="text-danger">Campo obligatorio</p>
                        </div>
                        <div class="mb-3 col-sm-3">
                            <label for="id_rol">Rol del usuario</label>
                            <select class="form-control select2-container--default" name="id_rol">
                                                                        <option value="1" >1: administrador</option>
                                                                                <option value="5" >5: auditor</option>
                                                                                <option value="3" >3: categorias</option>
                                                                                <option value="2" >2: productos</option>
                                                                                <option value="4" >4: proveedor</option>
                                                                    </select>
                            <p class="text-danger">Seleccione un rol válido</p>
                        </div>
                        <div class="mb-3 col-sm-3">
                            <label for="idioma">Idioma</label>
                            <select class="form-control" name="idioma">                                
                                <option value="es" selected>Español</option>
                                <option value="gl ">Galego</option>                                
                                <option value="en" >Inglés</option>                                
                                
                            </select>
                            <p class="text-danger"></p>
                        </div>
                        <div class="col-12 text-right">                            
                            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                            <a href="/usuarios_sistema" class="btn btn-danger ml-3">Cancelar</a>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>                        