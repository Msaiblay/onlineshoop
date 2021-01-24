
<?php
require 'backendheader.php';
?>


<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Category </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="<?php echo $GLOBALS['view_path']?>category_new" class="btn btn-outline-primary">
            <i class="icofont-plus"></i>
        </a>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">

                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>orderdate</th>
                            <th>voucherno</th>
                            <th>total</th>
                            <th>note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($adminorders as $aor){
                            $id = $aor['id'];
                            $orderdate  =$aor['orderdate'];
                            $voucherno  =$aor['voucherno'];
                            $total  =$aor['total'];
                            $note  =$aor['note'];

                            ?>
                            <tr>
                                <td><?php echo $i++;?> </td>
                                <td><?php echo $orderdate; ?></td>
                                <td><?php echo $voucherno; ?></td>
                                <td><?php echo $total; ?> Ks</td>
                                <td><?php echo $note; ?></td>

                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'backenfooter.php';
?>