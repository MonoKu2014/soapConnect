<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Bienvenido(a): <?= $this->session->nombre; ?>
            </h1>
        </div>
    </div>
    <!-- /.row -->



    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message');?>
            <h2>
                Usted tiene:
            </h2>
        </div>
    </div>


    <div class="row">

        <br><br>


        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Crear Clientes</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url();?>clientes/agregar">
                    <div class="panel-footer">
                        <span class="pull-left">Ir al módulo</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Facturas</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url();?>facturas">
                    <div class="panel-footer">
                        <span class="pull-left">Ir al módulo</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>


    </div>


</div>