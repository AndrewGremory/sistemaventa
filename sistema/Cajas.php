<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Reporte Caja</h1>
	</div>
    <h4 class="text-center">Cierre de Caja</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> VENDEDOR</label>
                        <p style="font-size: 16px; text-transform: uppercase; color: red;"><?php echo $_SESSION['nombre']; ?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label>Acciones</label>
                    <div id="acciones_venta" class="form-group">
                        <a href="#" class="btn btn-danger" id="btn_anular_venta">Anular</a>
                        <a href="#" class="btn btn-primary" id="btn_facturar_venta"><i class="fas fa-save"></i> Generar Reporte</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <!-- <th width="100px">Código</th> -->
                            <th>Jornada</th>
                            <th>Apertura</th>
                            <th width="100px">Cierre</th>
                            <th class="textright">Tickets</th>
                            <th class="textright">Venta Total</th>
                            <th>Acciones</th>
                        </tr>
                        <tbody>
                        <?php
                                require "../conexion.php";
                                $query = mysqli_query($conexion, "SELECT * FROM reporte ORDER BY id DESC");
                                mysqli_close($conexion);
                                $cli = mysqli_num_rows($query);

                                if ($cli > 0) {
                                    while ($dato = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><input type="text"><?php echo $dato['jornada']; ?> </td>
                                </tr>

                                
                        </tbody>
                        <tr>
                            <td><input type="hidden" name="txt_cod_producto" id="txt_cod_producto">
                                <input type="text" name="txt_cod_pro" id="txt_cod_pro">
                            </td>
                            <td id="txt_descripcion">-</td>
                            <td id="txt_existencia">-</td>
                            <td><input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disabled></td>
                            <td id="txt_precio" class="textright">0.00</td>
                            <td id="txt_precio_total" class="txtright">0.00</td>
                            <td><a href="#" id="add_product_venta" class="btn btn-dark" style="display: none;">Agregar</a></td>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th colspan="2">Descripción</th>
                            <th>Cantidad</th>
                            <th class="textright">Precio</th>
                            <th class="textright">Precio Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="detalle_venta">
                        <!-- Contenido ajax -->

                    </tbody>

                    <tfoot id="detalle_totales">
                        <!-- Contenido ajax -->
                    </tfoot>
                </table>

            </div>
            <br><br> <hr>

            <!-- CONSULTA -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Jornada</th>
                                    <th>Apertura</th>
                                    <th>Cierre</th>
                                    <th>Tickets</th>
                                    <th>Total Ventas</th>
                                    <!-- <th>Accion</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require "../conexion.php";
                                $query = mysqli_query($conexion, "SELECT * FROM reporte ORDER BY id DESC");
                                mysqli_close($conexion);
                                $cli = mysqli_num_rows($query);

                                if ($cli > 0) {
                                    while ($dato = mysqli_fetch_array($query)) {
                                ?>
                                        <tr>
                                            <td><?php echo $dato['id']; ?></td>
                                            <td><?php echo $dato['jornada']; ?></td>
                                            <td><?php echo $dato['apertura']; ?></td>
                                            <td><?php echo $dato['cierre']; ?></td>
                                            <td><?php echo $dato['tickets']; ?></td>
                                            <td><?php echo $dato['total_ventas']; ?></td>
                                            <!-- <td>
                                                <button type="button" class="btn btn-primary view_factura" cl="<?php echo $dato['codcliente'];  ?>" f="<?php echo $dato['nofactura']; ?>">Ver</button>
                                            </td> -->
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



</div>
<!-- /.container-fluid -->
                            }
<?php include_once "includes/footer.php"; ?>