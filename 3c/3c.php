<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>



    <title>Arkademy</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container">
        <div class="col">
          <a class="navbar-brand" href="#">
            <img src="logo.png" width="70" height="30" alt="">
          </a>
        </div>
        <form class="col-10">
          <div class="row">
            <div class="col-10 mr-4">  
              <input type="search" class="form-control" name="search" placeholder="Search...">      
            </div>
            <div class="col">
              <a class="btn btn-warning" data-toggle="modal" data-target="#addModal">ADD</a>  
            </div>   
          </div>
        </form>
      </div>
    </nav>

    <div class="container mt-3">
      <div class="row justify-content-center">
        <table class="table border" style="text-align: center">
          <thead>
            <tr class="bg-warning">
              <th scope="col">No</th>
              <th scope="col">Cashier</th>
              <th scope="col">Product</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $connection = mysqli_connect('localhost', 'root', '', 'arkademy');
              $result = mysqli_query($connection, 'select P.id, Ch.name as cashier_name, P.name as product_name, Ca.name category_name, P.price from product P inner join category Ca on P.id_category=Ca.id inner join cashier Ch on P.id_cashier=Ch.id');
              $i = 1;
              while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <th scope="row"><?=$i?></th>
              <td><?=$row['cashier_name']?></td>
              <td><?=$row['product_name']?></td>
              <td><?=$row['category_name']?></td>
              <td>Rp. <?=number_format($row['price'])?></td>
              <td class="row">
                <a data-toggle="modal" data-target="#editModal<?=$row['id']?>" class="col"><span style="color: green" class="fa fa-edit fa-lg"></span></a> 
                <form method="post" action="proses/delete-data.php" class="col">
                  <input type="hidden" name="id" value="<?=$row['id']?>">
                  <button type="submit"  class="btn bg-transparent" data-toggle="modal" data-target="#deleteModal"><span style="color: red" class="fa fa-trash fa-lg "></span></a> </button>
                </form>
              </td>
            </tr>

              <div class="modal fade container" id="editModal<?=$row['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container row justify-content-center align-center">
                        <div class="col-10">
                          <form method="post" action="./proses/edit-data.php">
                            <input type="hidden" name="id" value="<?=$row['id']?>">
                            <div class="form-group">
                              <select class="form-control" name="cashier_id">
                                <?php
                                  $result2 = mysqli_query($connection, 'select * from cashier');
                                  while($cashier = mysqli_fetch_assoc($result2)) {
                                ?>
                                  <option value="<?=$cashier['id']?>" <?=($row['cashier_name'] == $cashier['name'] ? 'selected' : '')?> ><?=$cashier['name']?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <select class="form-control" name="category_id">
                                <?php
                                  $result3 = mysqli_query($connection, 'select * from category');
                                  while($category = mysqli_fetch_assoc($result3)) {
                                ?>
                                  <option value="<?=$category['id']?>" <?=($row['category_name'] == $category['name'] ? 'selected' : '') ?>><?=$category['name']?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <input class="form-control" type="text" value="<?=$row['product_name']?>" name="product_name">
                            </div>

                            <div class="form-group">
                              <input class="form-control" type="text" value="Rp. <?=$row['price']?>" name="price">
                            </div>

                            <div class="form-group">
                              <button type="submit" class="btn btn-warning float-right">EDIT</button>
                            </div>
                          </form>

                        </div>
                      </div>           
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade container" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="container row justify-content-center align-center">
                        <div class="col-10 mt-5 mb-5">
                          <h4 style="text-align: center">Data <?=$row['cashier_name']?> ID #<?=$row['id']?> </h4>
                          <p style="font-size: 150px; color: green; text-align: center" class="col-12"><i class="fa fa-check-circle fa-lg float-center"></i></p>
                          <h4 style="text-align: center">Berhasil Dihapus!</h4><br>
                        </div>
                      </div>           
                    </div>
                  </div>
                </div>
              </div>
            <?php
                $i++;
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>

    <!-- Modal -->
    <div class="modal fade container" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container row justify-content-center align-center">
              <div class="col-10">
                <form method="post" action="proses/add-data.php">
                  <div class="form-group">
                    <select class="form-control"  name="cashier_id">
                      <?php
                        $result2 = mysqli_query($connection, 'select * from cashier');
                        while($cashier = mysqli_fetch_assoc($result2)) {
                      ?>
                        <option value="<?=$cashier['id']?>"><?=$cashier['name']?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <select class="form-control" name="category_id">
                      <?php
                        $result3 = mysqli_query($connection, 'select * from category');
                        while($category = mysqli_fetch_assoc($result3)) {
                      ?>
                        <option value="<?=$category['id']?>"><?=$category['name']?></option>
                      <?php
                        }
                      ?>

                    </select>
                  </div>

                  <div class="form-group">
                    <input class="form-control" type="text" name="product_name" placeholder="Product Name">
                  </div>

                  <div class="form-group">
                    <input class="form-control" type="text" name="price" placeholder="Price">
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-warning float-right">ADD</button>
                  </div>
                </form>

              </div>
            </div>           
          </div>
        </div>
      </div>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>