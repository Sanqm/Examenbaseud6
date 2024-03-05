<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="col-6">
                    <h6 class="m-0 install font-weight-bold text-primary">Usuarios del sistema</h6>
                </div>
                <div class="col-6">
                    <div class="m-0 font-weight-bold justify-content-end">
                        <a href="/usuarios-sistema" class="btn btn-primary ml-1 float-right"> Nuevo Usuario del Sistema <i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body" id="card_table">
                <div id="button_container" class="mb-3"></div>
                <!--<form action="./?sec=formulario" method="post">                   -->
                <table id="tabladatos" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Rol</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($usuarios)){
                                foreach ($usuarios as $usuario) {  ?>
                        <tr class="">
                            <td><?php echo $usuario['nombre_completo']?></td>
                            <td><?php echo $usuario['dni']?></td>
                            <td><?php echo $usuario['email']?></td>
                            <td><?php echo $usuario['nombre_rol']?></td>
                            <td>
                                <a href="/usuarios-sistema/edit/<?php echo $usuario['id_usuario']?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="/usuarios-sistema/baja/<?php echo $usuario['id_usuario']?>" class="btn btn-primary"> <i class="fas fa-toggle-on"></i></a>
                                <a href="/usuarios-sistema/delete/<?php echo $usuario['id_usuario']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                            <?php }} ?>
                    </tbody>
                    <tfoot>
                        Total de registros: 3                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>