 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100">
         <div class="row h-100 align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4 page-title py-5">
                 <h3 class="text-white">Welcome to <?= $_SESSION['setting_name']; ?></h3>
                 <hr class="divider my-4" />
                 <!-- <a class="btn btn-primary btn-xl js-scroll-trigger" href="#menu">Order Now</a> -->

             </div>

         </div>
     </div>
 </header>
 <section class="page-section" id="menu">
     <div id="menu-field" class="card-deck">
         <?php
            include 'admin/db_connect.php';
            $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
            while ($row = $qry->fetch_assoc()) :
            ?>
             <div class="col-lg-3">
                 <div class="card menu-item ">
                     <div style="background:url('assets/img/<?= $row['img_path'] ?>');background-repeat:no-repeat;background-size:cover;height:250px">
                     </div>
                     <div class="card-body">
                         <h5 class="card-title"><?= $row['name'] ?></h5>
                         <p class="card-text truncate"><?= $row['description'] ?></p>
                         <div class="text-center">
                             <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?= $row['id'] ?>> View </button>

                         </div>
                     </div>

                 </div>
             </div>
         <?php endwhile; ?>
     </div>
 </section>
 <script>
     $('.view_prod').click(function() {
         uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
     })
 </script>