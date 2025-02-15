 <!-- Masthead-->
 <section class="page-section" id="menu">

     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <h3 class="w-100">All Orders</h3>
             </div>
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-body">
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Name</th>
                                     <th>Address</th>
                                     <th>Email</th>
                                     <th>Mobile</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $user = $_SESSION['login_email'];
                                    $i = 1;
                                    include 'admin/db_connect.php';
                                    $qry = $conn->query("SELECT * FROM orders WHERE `email`= '$user'");
                                    while ($row = $qry->fetch_assoc()) :
                                    ?>
                                     <tr>
                                         <td><?= $i++ ?></td>
                                         <td><?= $row['name'] ?></td>
                                         <td><?= $row['address'] ?></td>
                                         <td><?= $row['email'] ?></td>
                                         <td><?= $row['mobile'] ?></td>
                                         <?php if ($row['status'] == 1) : ?>
                                             <td class="text-center"><span class="badge badge-success">Confirmed</span></td>
                                         <?php else : ?>
                                             <td class="text-center"><span class="badge badge-secondary">For Verification</span></td>
                                         <?php endif; ?>
                                     </tr>
                                     <?php
                                     $total=0;
                                        $qry2 = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =" . $row['id']);
                                        while ($row2 = $qry2->fetch_assoc()) :
                                            
                                            $total += $row2['qty'] * $row2['price'];
                                        ?>
                                         <tr>   
                                             <td colspan="2"></td>
                                             <td colspan="1">Item</td>
                                             <td><?= $row2['name'].'x'.$row2['qty'] ?></td>
                                             <td><?= number_format($row2['qty'] * $row2['price'], 2) ?></td>
                                             <td></td>
                                         </tr>
                                     <?php endwhile; ?>
                                 <?php endwhile; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <style>
     .card p {
         margin: unset
     }

     .card img {
         max-width: calc(100%);
         max-height: calc(59%);
     }

     div.sticky {
         position: -webkit-sticky;
         /* Safari */
         position: sticky;
         top: 4.7em;
         z-index: 10;
         background: white
     }

     .rem_cart {
         position: absolute;
         left: 0;
     }
 </style>