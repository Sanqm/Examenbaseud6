<!-- Content Row -->

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo (isset($input)) ? "Categoría '$input[nombre_categoria]'" : 'Nueva categoría'; ?></h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="" method="post">         
                    <!--form method="get"-->
                    <div class="row">                        
                        <input id="id_categoria" type="hidden" name="id_categoria"value="<?php echo isset($input['id_categoria']) ? $input['id_categoria'] : ''; ?>"/>                            
                        <div class="mb-3 col-sm-6">
                            <label for="codigo">Nombre</label>
                            <input class="form-control" id="nombre_categoria" type="text" name="nombre_categoria" placeholder="Nombre categoría" value="<?php echo isset($input['nombre_categoria']) ? $input['nombre_categoria'] : ''; ?>" required <?php echo isset($readonly) ? 'readonly' : ''; ?>>
                            <p class="text-danger"><?php echo isset($errores['nombre_categoria']) ? $errores['nombre_categoria'] : ''; ?></p>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="nombre">Categoría Padre</label>
                            <select class="form-control" name="id_padre" <?php echo isset($readonly) ? 'disabled' : ''; ?>>
                                
                                <option value="" selected>-</option>                                
                                <?php
                                foreach ($categorias as $c) {
                                    ?>
                                    <option value="<?php echo $c['id_categoria'] ?>" <?php echo (isset($input['id_padre']) && $input['id_padre'] == $c['id_categoria']) ? 'selected' : ''; ?>><?php echo $c['fullName']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?php echo isset($errores['id_padre']) ? $errores['id_padre'] : ''; ?></p>

                        </div>

                        <div class="col-12 text-right">  
                            <?php if (!isset($readonly)){ ?>
                            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                            <?php
                            }
                            ?>
                            <a href="/categorias" class="btn btn-danger ml-3">Cancelar</a>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>