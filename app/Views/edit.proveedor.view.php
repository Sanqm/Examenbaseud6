<!-- Content Row -->

<div class="row">    
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $titulo; ?></h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="" method="post">         
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="cif">CIF</label>
                            <input class="form-control" id="cif" type="text" name="cif" placeholder="A1234567B"  value="<?php echo isset($proveedor['cif']) ? $proveedor['cif'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?> >
                            <p class="text-danger"><?php echo isset($errores['cif']) ? $errores['cif'] : ''; ?></p>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="codigo">Código</label>
                            <input class="form-control" id="codigo" type="text" name="codigo" placeholder="Código" value="<?php echo isset($proveedor['codigo']) ? $proveedor['codigo'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['codigo']) ? $errores['codigo'] : ''; ?></p>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre proveedor" value="<?php echo isset($proveedor['nombre']) ? $proveedor['nombre'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['nombre']) ? $errores['nombre'] : ''; ?></p>

                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="direccion">Dirección</label>
                            <input class="form-control" id="direccion" type="text" name="direccion" placeholder="Dirección proveedor" value="<?php echo isset($proveedor['direccion']) ? $proveedor['direccion'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['direccion']) ? $errores['direccion'] : ''; ?></p>

                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="pais">País</label>
                            <input class="form-control" id="pais" type="text" name="pais" placeholder="País" value="<?php echo isset($proveedor['pais']) ? $proveedor['pais'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?> <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['pais']) ? $errores['pais'] : ''; ?></p>

                        </div>

                        <div class="mb-3 col-sm-6">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="correo@proveedor.org" value="<?php echo isset($proveedor['email']) ? $proveedor['email'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['email']) ? $errores['email'] : ''; ?></p>

                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="username">Teléfono</label>
                            <input class="form-control" id="telefono" type="tel" name="telefono" placeholder="666555444" value="<?php echo isset($proveedor['telefono']) ? $proveedor['telefono'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['telefono']) ? $errores['telefono'] : ''; ?></p>

                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="website">Website</label>
                            <input class="form-control" id="website" type="url" name="website" placeholder="http://www.website.com" value="<?php echo isset($proveedor['website']) ? $proveedor['website'] : ''; ?>" <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['website']) ? $errores['website'] : ''; ?></p>

                        </div>
                        <div class="col-12 text-right">  
                           <?php
                            if(!isset($readonly)){ ?>
                            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                           <?php
                            }
                            ?>
                            <a href="/proveedores" class="btn btn-danger ml-3">Cancelar</a>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>