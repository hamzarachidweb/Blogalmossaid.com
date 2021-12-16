<?php include('head.php'); ?>


<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12 my-4">
      <div class="table-responsive">
          <table class="table table-bordered datatable " id="dataTable" width="100%" cellspacing="0">
                  <thead class="table-dark text-center">
                      <tr>
                        <th>اسم الخبر </th>
                        <th>قسم الخبر </th>
                        <th>تاريخ</th>
                        <th>تعديل </th>

                      </tr>
                  </thead>
                        <tbody>
                          <?php  
                            $allnew = $connect-> prepare("SELECT * FROM category CROSS JOIN news WHERE category.id = news.category_id");
                            $allnew->execute();
                            ?>
                            <?php while ($news = $allnew->fetch()): ?>
                               <tr>
                                 <td class="text-center"><?= $news['name'] ?></td>
                                 <td class="text-center"><?= $news['name_category'] ?></td>
                                 <td class="text-center"><?= $news['date'] ?></td>
                                 <td>
                                    <a href="delete.php?news_id=<?php echo $news['id'];?>" class="text-danger"><i class="fa fa-fw fa-trash"></i> مسح </a>
                                    <a href="editnews.php?news_id=<?php echo $news['id'];?>" class="text-Success"><i class="fa fa-fw fa-trash"></i> تعديل </a>
                                  </td>
                               </tr>
                            <?php endwhile; ?>
                      </tbody>
        </table> 
     </div>
    </div>
  </div>
</div>



<?php include('footer.php'); ?>