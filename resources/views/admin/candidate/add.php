<?php view('admin/layouts/header'); ?>


     


    <?php view('admin/layouts/sidebar'); ?>







<div id="wrapper">

    <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Form </h1>
                        <!-- <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1> -->

                    </div>
                </div>
                <!-- /. ROW  -->
                <?php view('admin/layouts/message', compact('errors')); ?>
                <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                       <!--  <div class="panel-heading">
                           Add Form
                        </div> -->
                        <div class="panel-body">
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Candidate ID</label>
                                            <input class="form-control" type="text" name="id">
                                        </div>
                                         <div class="form-group">
                                            <label>Candidate Name</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                         <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="age">
                                        </div>
                                         <div class="form-group">
                                            <label>Sex</label>
                                            <input class="form-control" type="text" name="sex">
                                        </div>
                                        <div class="form-group">
                                            <label>Party</label>
                                            <input class="form-control" type="text" name="party">
                                        </div>
                                         <div class="form-group">
                                            <label>Symbol</label>
                                            <input class="form-control" type="file" name="image">
                                        </div>
                                            <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info">Insert </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
             <!--/.ROW-->
             

            </div>
            <!-- /. PAGE INNER  -->
        </div>


        




</div>

   





<?php view('admin/layouts/footer'); ?>
