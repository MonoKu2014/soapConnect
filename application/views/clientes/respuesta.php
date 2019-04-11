<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Administración</li>
  <li><a href="<?= base_url();?>clientes/agregar">Agregar Clientes</a></li>
  <li class="active">Respuesta</li>
</ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Respuesta
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">


                <div class="col-lg12">
                    <div class="alert alert-info">
                    <?php if($response): ?>
                        <?php if($response->EKunnr != ''): ?>
                            Se ha creado un nuevo cliente con ID: <?= $response->EKunnr;?>
                        <?php else: ?>
                            Hubo un error en la creación, intente una vez más por favor.
                        <?php endif; ?>
                    <?php else: ?>
                        Hubo un error en la creación, intente una vez más por favor.
                    <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <a href="<?= base_url(); ?>clientes/agregar" class="btn btn-success">Agregar un nuevo cliente</a>
                    </div>
                </div>


            </div>
        </div>



    	</div>
    </div>

</div>