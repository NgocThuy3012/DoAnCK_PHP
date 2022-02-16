<!doctype html>
<html class="no-js" lang="en">

<?php include('head.php'); ?>

<body >
<?php include('header.php'); ?>
<?php
    if(isset($_SESSION['user'])){//ktra dang nhap
        if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
        //xoa sp
        if(isset($_GET['delid'])&&($_GET['delid']>=0)){
            array_splice($_SESSION['giohang'], $_GET['delid'],1);
        }
        //lay du lieu tu form
        if(isset($_POST['addcart'])&&($_POST['addcart'])){
            $hinh = $_POST['hinh'];
            $tensp = $_POST['tensp'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $id_sp = $_POST['id'];
        
            //ktra sp co trong gio hang chua?
            $flag = 0; //ktra cos trung k
            for($i = 0; $i < sizeof($_SESSION['giohang']); $i++){
                if($_SESSION['giohang'][$i][1]== $tensp){
                    $flag = 1;
                    $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
                    $_SESSION['giohang'][$i][3] = $soluongnew;
                    break;
                }
            }
            if($flag == 0){
                //them moi sp vao gio hang
                $sp = [$hinh, $tensp, $gia, $soluong, $id_sp];
                $_SESSION['giohang'][] = $sp;
            }
        
            // var_dump($_SESSION['giohang']);
        }
    }
    
    
?>
  <div id="breadcrumb" class="section" style="  margin-bottom: 100px;">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">SHOPPING CART</h3>
						<!-- <ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Blank</li>
						</ul> -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
	</div>
    <div class="container" style="  margin-bottom: 100px;">
        <form action="./checkout.php" method="post">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%"> </th>
                </tr>
            </thead>
            
                <?php 
                    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
                        $tong = 0; ?>
                        <tbody>
                            <!--mo ta san pham--> <?php
                        for($i = 0; $i < sizeof($_SESSION['giohang']); $i++){
                            $thanhtien = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                            $tong += $thanhtien;
                            echo '<tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="./img/'.$_SESSION['giohang'][$i][0].'" alt="Sản phẩm " class="img-responsive" width="100">
                                    </div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin">'.$_SESSION['giohang'][$i][1].'</h4>
                                        
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">'.$_SESSION['giohang'][$i][2].'</td>
                            <td data-th="Quantity">'.$_SESSION['giohang'][$i][3].'</td>
                            <td data-th="Subtotal" class="text-center">'.$thanhtien.'</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm"><a href="./product.php?id='.$_SESSION['giohang'][$i][4].'"><i class="fa fa-edit"></i></a></button>
                                <button class="btn btn-danger btn-sm"><a href="./cart.php?delid='.$i.'"><i class="fa fa-trash-o"></i></a></button>
                            </td>
                        </tr>';
                        }?>
                            <!--mo ta san pham-->
                        </tbody>
                        <tfoot>                
                            <tr>
                                <td><a href="./home.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                                </td>
                                <td colspan="2" class="hidden-xs"> </td>
                                <td class="hidden-xs text-center"><strong>Tổng tiền: <?php echo $tong; ?></strong>
                                </td>
                                <td><a href="./checkout.php" class="btn btn-success btn-block" >Thanh toán <i class="fa fa-angle-right"></i></a>
                                </td>
                            </tr>
                        </tfoot>
                   <?php }
                ?>              
        </table>
        </form>
        
    </div>
    <style type="text/css">
        /* .table&amp,
        amp;
        gt;
        tbody&amp;
        amp;
        gt;
        tr&amp;
        amp;
        gt;
        td,
        .table&amp;
        amp;
        gt;
        tfoot&amp;
        amp;
        gt;
        tr&amp;
        amp;
        gt;
        td {
            vertical-align: middle;
        } */
        
        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }
            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }
            .actions .btn-info {
                float: left;
            }
            .actions .btn-danger {
                float: right;
            }
            table#cart thead {
                display: none;
            }
            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }
            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }
            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }
            table#cart tfoot td {
                display: block;
            }
            table#cart tfoot td .btn {
                display: block;
            }
        }
    </style>
    <script src="js/jquery-1.11.1.min.js"></script>
    
<?php include('footer.php'); ?>    
</body>
</html>