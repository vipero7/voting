<?php view('admin/layouts/header') ?>

<?php  view('admin/layouts/sidebar')  ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Candidate List</h1>
                        <br>
                        <form method="get" action="">
                            <div style="text-align: right;">
                                <input type="text" name="searchkey">
                                <input type="submit" value="Search">
                            </div>

                        </form>
                        <br>

     <!-- <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1> -->



                        <?php
                         view('admin/layouts/message', compact('errors'));


                         $pg = $pagination['cp'];
                         $offset = $pagination['offset'];
                         $nop = $pagination['nop'];

                         
                         if($nop <= 5)
                         {
                            $min = 1;
                            $max = $nop;
                         } else {
                            if($pg == $nop | $pg == $nop-1)
                            {
                                $min = $pg - 2;
                                $max = $nop;
                            } else{
                        
                            $min = $pg - 2;
                            $max = $pg + 2;
                        }
                       }
                         ?>
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                         <tr>
                                         <td colspan="6">

                                             <?php
                                             $prev = $pg -1;
                                             $next = $pg + 1;
                                             ?>

                                             <a href="?pg=1"><</a> |

                                             <?php 
                                             if($pg == 1){ ?>
                                             <<
                                               <?php } else { ?>
                                                  <a href="?pg=<?php echo $prev ;?>"><<</a>

                                               <?php } ?>

                                            

                                            <?php for($i = $min; $i<= $max; $i++)
                                            { ?>

                                             <a href="?pg=<?php echo $i;?>"<?php if($pg==$i){ echo 'style="color: orange; front-weight: bold"';}?>> <?php echo $i ?>  </a> |

                                           <?php   }
                                            

                                               if($pg >= $nop) { ?>
                                               >>
                                               <?php } else { ?>

                                                <a href="?pg=<?php echo $next ?>">>></a>
                                                <?php } ?>
                                                |
                                                <a href="?pg=<?php echo $nop;?>">></a>
                                        </td>           
                                     </tr> 
                                        <tr>
                                            <th>SN</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Sex</th>
                                            <th>Party</th>
                                            <th>Symbol</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                    <?php
                                    $sn = $pagination['offset'] + 1; 
                                    foreach($candidates as $candidate){
                                            ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $candidate['id']; ?></td>
                                            <td><?php echo $candidate['name']; ?></td>
                                            <td><?php echo $candidate['age']; ?></td>
                                            <td><?php echo $candidate['sex']; ?></td>
                                            <td><?php echo $candidate['party']; ?></td>
                                            <td>
                                                <img src="<?php echo $candidate['image']; ?>" width="100px">
                                            </td>
                                            <td>
                                            	<a href="/admin/candidate/edit/<?php echo $candidate['id']; ?>" class="btn btn-primary">Edit</a>
                                            	<a href="/admin/candidate/delete/<?php echo $candidate['id']; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                       
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                         <td colspan="6">

                                             <?php
                                             $prev = $pg -1;
                                             $next = $pg + 1;
                                             ?>

                                             <a href="?pg=1"><</a> |

                                             <?php 
                                             if($pg == 1){ ?>
                                             <<
                                               <?php } else { ?>
                                                  <a href="?pg=<?php echo $prev ;?>"><<</a>

                                               <?php } ?>

                                            

                                            <?php for($i = $min; $i<= $max; $i++)
                                            { ?>

                                             <a href="?pg=<?php echo $i;?>"<?php if($pg==$i){ echo 'style="color: orange; front-weight: bold"';}?>> <?php echo $i ?>  </a> |

                                           <?php   }
                                            

                                               if($pg >= $nop) { ?>
                                               >>
                                               <?php } else { ?>

                                                <a href="?pg=<?php echo $next ?>">>></a>
                                                <?php } ?>
                                                |
                                                <a href="?pg=<?php echo $nop;?>">></a>
                                        </td>           
                                     </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>

     </div>
     <!-- /. PAGE INNER  -->
  </div>






<?php view('admin/layouts/footer'); ?>
