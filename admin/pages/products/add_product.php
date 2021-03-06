<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Electro Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
 
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center" style="background-color: black; ">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html"> <img src="./../../../electro-master/img/logo.png" alt=""> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
  
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">Louis Barnett</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

         
          <li class="nav-item">
            <a class="nav-link" href="./../category/category.php">
              <i class=" menu-icon"><img src="https://img.icons8.com/ios/16/000000/categorize.png"/></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../products/product.php">
              <i class=" menu-icon"><img src="https://img.icons8.com/external-prettycons-lineal-prettycons/16/000000/external-products-user-interface-vol-3-prettycons-lineal-prettycons.png"/></i>

              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../users/user.php">
              <i class="menu-icon"><img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/16/000000/external-users-cyber-security-kiranshastry-lineal-kiranshastry-1.png"/></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../billing/billing.php">
              <i class="menu-icon"><img src="https://img.icons8.com/ios/16/000000/cash-receipt.png"/></i>
              <span class="menu-title">Biilling</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
    <div class="main-panel">
      <?php
       include('../../../electro-master/conndb.php');
        $sql = "SELECT * FROM category";
        $cate= mysqli_query($conn,$sql);
        if(isset($_POST['name'])){
          $name=$_POST['name'];
          $price=$_POST['price'];         
          $category=$_POST['category'];          
          $description=$_POST['description'];
          if(isset($_FILES['img'])){
            $file=$_FILES['img'];
            $file_name=$file['name'];
            move_uploaded_file($file['tmp_name'],'./../../../electro-master/img/'.$file_name);
          }    
          $num= mysqli_query($conn,"select count(book_id)as so from book where cat_id=$category");
					while($row=mysqli_fetch_assoc($num)){
            $n=$row['so'];
          };	
          $id= $category.$n;              
          $insert="INSERT INTO book(book_id,book_name,description,price,img,pub_id,cat_id) 
                    VALUES('$id','$name','$description','$price','$file_name','gd','$category')";

          $query=mysqli_query($conn,$insert);
         
         header('location: product.php');
         
        }
       
       
      ?>
        <!-- =========================== -->
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add a new product</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample" action="product.php" method="POST" role="form" enctype="multipart/form-data" id="add_product">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name="name"><div class="message"></div>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail3">Price</label>
                      <input type="text" class="form-control" id="price" placeholder="Price" name="price"><div class="message"></div>
                    </div>
                                       
                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="exampleSelectGender"name="category">
                         <?php foreach($cate as $key =>$value){?>
                          <option value="<?php echo $value['cat_id'] ?>"><?php echo $value['cat_name'] ?></option>
                          <?php }?>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="img" class="form-control file-upload-info" placeholder="Upload Image">
                      <!-- <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div> -->
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="description" rows="4" name="description"></textarea><div class="message"></div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                   
                  </form>
                </div>
              </div>
            </div>
        <!-- ================-->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ?? 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <!-- <script src="vendors/base/vendor.bundle.base.js"></script> -->
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <!-- <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script> -->
  <!-- End custom js for this page-->
  <script >
    const handleUI = (inputElement, errorSelector, errorMessage) => {
    const parentElement = inputElement.parentElement
    const formMessageElement = parentElement.querySelector(errorSelector)

    if (errorMessage) {
        formMessageElement.innerText = errorMessage
        parentElement.classList.add("invalid")
    } else {
        formMessageElement.innerText = ""
        parentElement.classList.remove("invalid")
    }
}
    const Validator = ({ form, errorSelector, rules }) => {
    let firstSubmit = false

    const selectorRules = {}

    const formElement = document.querySelector(form)

    if (formElement) {
        formElement.addEventListener("submit", (event) => {
            firstSubmit = true
            rules.forEach(({ selector }) => {
                const inputElement = formElement.querySelector(selector)
                let errorMessage
                const inputElementRules = selectorRules[selector]

                for (let i = 0; i < inputElementRules.length; i++) {
                    errorMessage = inputElementRules[i](inputElement.value)

                    if (errorMessage) {
                        event.stopImmediatePropagation()
                        event.preventDefault()
                        handleUI(inputElement, errorSelector, errorMessage)
                        break
                    }
                }
            })
        })

        rules.forEach(({ selector, validate }) => {
            const inputElement = formElement.querySelector(selector)

            if (Array.isArray(selectorRules[selector])) {
                selectorRules[selector].push(validate)
            } else {
                selectorRules[selector] = [validate]
            }

            if (inputElement) {
                inputElement.onblur = () => {
                    if (firstSubmit) {
                        let errorMessage
                        const inputElementRules = selectorRules[selector]
                        for (let i = 0; i < inputElementRules.length; i++) {
                            errorMessage = inputElementRules[i](
                                inputElement.value
                            )
                            if (errorMessage) break
                        }

                        handleUI(inputElement, errorSelector, errorMessage)
                    }
                }
                inputElement.oninput = () => {
                    handleUI(inputElement, errorSelector)
                }
            }
        })
    }
}

// return undefined if pass rule
Validator.isRequired = (selector, message) => {
    return {
        selector,
        validate(value) {
            return value.trim()
                ? undefined
                : message || "Vui l??ng nh???p tr?????ng n??y"
        },
    }
}
  </script>
<script>
  Validator({
  form:'#add_product',
  errorSelector:".message",
  rules:[
    Validator.isRequired('#name'),

    Validator.isRequired('#price'),
    Validator.isRequired('#unit'),
    Validator.isRequired('#amount'),
    Validator.isRequired('#description')
  ]
})

</script>
<style>
  .message {
    position: absolute;
    padding-left: 3px;
    color: red;
    font-size: 13px;
  }
  .form-control.invalid input{
    border: 1px solid red !important;
    background-color: rgba(255, 0, 0, 0.02) !important;
  }
</style>
</body>

</html>