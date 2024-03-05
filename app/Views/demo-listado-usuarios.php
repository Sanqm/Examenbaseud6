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
                        <a href="/usuarios-sistema/add/" class="btn btn-primary ml-1 float-right"> Nuevo Usuario del Sistema <i class="fas fa-plus-circle"></i></a>
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>administrador</td>
                            <td>12345678X</td>
                            <td>admin@test.org</td>
                            <td>Administrador</td>
                            <td>
                                <a href="/usuarios-sistema/edit/1" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="/usuarios-sistema/baja/1" class="btn btn-primary"> <i class="fas fa-toggle-on"></i></a>
                                <a href="/usuarios-sistema/delete/1" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>

                        </tr>
                        <tr class="table-danger">
                            <td>Limpiador Perez</td>
                            <td>23456789Y</td>
                            <td>limpiador@test.org</td>
                            <td>Limpiador</td>
                            <td>
                                <a href="/usuarios-sistema/edit/2" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="/usuarios-sistema/baja/2" class="btn btn-secondary"> <i class="fas fa-toggle-off"></i></a>
                                <a href="/usuarios-sistema/delete/2" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>

                        </tr>
                        <tr class="">
                            <td>Auditor Importante</td>
                            <td>34567890Z</td>
                            <td>auditor@test.org</td>
                            <td>Auditor</td>
                            <td>
                                <a href="/usuarios-sistema/edit/3" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="/usuarios-sistema/baja/3" class="btn btn-primary"> <i class="fas fa-toggle-on"></i></a>
                                <a href="/usuarios-sistema/delete/3" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>

                        </tr>
                    </tbody>
                    <tfoot>
                        Total de registros: 3                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>