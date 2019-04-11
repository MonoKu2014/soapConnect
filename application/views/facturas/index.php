<div class="container-fluid">

<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Administración</li>
  <li class="active">Facturas</li>
</ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Facturas
            </h2>
            <?= $this->session->flashdata('message');?>
        </div>


        <div class="col-lg-12">
            <form method="post">

                <div class="col-md-3">
                    <div class="form-group">
                        <span>Fecha Desde</span>
                        <input type="date" class="form-control" name="fecha_desde" value="<?= $request['fecha_desde']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <span>Fecha Hasta</span>
                        <input type="date" class="form-control" name="fecha_hasta" value="<?= $request['fecha_hasta']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <span>Deudor</span>
                        <select name="deudor" class="form-control">
                            <option <?php if($request['deudor'] == ''){ echo 'selected'; }?> value="">Escoja deudor</option>
                            <option <?php if($request['deudor'] == '10002011'){ echo 'selected'; }?> value="10002011">10002011</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <span>Sociedad</span>
                        <select name="sociedad" class="form-control">
                            <option <?php if($request['sociedad'] == ''){ echo 'selected'; }?> value="">Escoja sociedad</option>
                            <option <?php if($request['sociedad'] == 'CL01'){ echo 'selected'; }?> value="CL01">CL01</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="submit" value="Buscar Facturas" class="btn btn-primary">
                    </div>
                </div>

            </form>

            <div class="col-lg-12">
            <br>
            <hr>
            <br>
            </div>

        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12 table-responsive">
    		<table class="table table-bordered table-striped table-hover table-condensed">
    			<thead>
    				<th>Sociedad</th>
    				<th>Deudor</th>
    				<th>Documento</th>
    				<th>Referencia</th>
    				<th>Asignación</th>
                    <th>Texto</th>
                    <th>Monto</th>
                    <th>Moneda</th>
    			</thead>
    			<tbody>

                    <?php if(isset($tabla->EFacturas->item)): ?>

                        <?php foreach($tabla->EFacturas->item as $factura): ?>

                            <tr>
                                <td><?= $factura->Bukrs; ?></td>
                                <td><?= $factura->Kunnr; ?></td>
                                <td><?= $factura->Belnr; ?></td>
                                <td><?= $factura->Xblnr; ?></td>
                                <td><?= $factura->Zuonr; ?></td>
                                <td><?= $factura->Sgtxt; ?></td>
                                <td><?= format($factura->Dmbtr); ?></td>
                                <td><?= $factura->Waers; ?></td>
                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

    			</tbody>
    		</table>
    	</div>
    </div>

</div>