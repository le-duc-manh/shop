<?php 
    $id_sp=$_GET['id_sp'];
    $sql="SELECT * FROM  sanpham WHERE id_sp=$id_sp";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);

 ?>
<div id="product">
    <div id="prd-thumb" class="col-md-6 col-sm-12 col-xs-12 text-center">
        <img width="160px" src="quantri/anh/<?php echo $row['anh_sp']; ?>">
    </div>
    <div id="prd-intro" class="col-md-6 col-sm-12 col-xs-12">
        <h3><?php echo $row['ten_sp']; ?></h3>
        <p id="prd-price"><span class="sl">Giá sản phẩm:</span> <span class="sr"><?php echo $row['gia_sp']; ?></span></p>
        <p><span class="sl">Bảo hành:</span><?php echo $row['bao_hanh']; ?></p>
        <p><span class="sl">Đi kèm:</span> <?php echo $row['phu_kien']; ?></p>
        <p><span class="sl">Tình trạng:</span>  <?php echo $row['tinh_trang']; ?></p>
        <p><span class="sl">Khuyến Mại:</span> <?php echo $row['khuyen_mai']; ?></p>
        <p><span class="sl">Còn hàng:</span>    <?php echo $row['trang_thai']; ?></p>
        <a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp']; ?>"><button type="button" class="btn btn-danger">đặt mua</button></a>
    </div>
    <div id="prd-details" class="col-md-12 col-sm-12 col-xs-12 text-justify">
        <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
        </p>
    </div>
</div> 
<?php 
if(isset($_POST['submit'])){
    $ten=$_POST['ten'];
    $dien_thoai=$_POST['dien_thoai'];
    $binh_luan=$_POST['binh_luan'];

    //xử lý thêm mới bl
    $ngay_gio=date("Y-m-d H:i:s");

    if(isset($ten) && isset($dien_thoai) && isset($binh_luan)){
        $sql="INSERT INTO  blsanpham(ten,dien_thoai,binh_luan,ngay_gio,id_sp) VALUES('$ten','$dien_thoai','$binh_luan','$ngay_gio','$id_sp') ";
        $query=mysqli_query($conn,$sql);
        header("location: index.php?page_layout=chitietsp&id_sp=".$id_sp);
    }

}


 ?>

<div id="comment" class="col-md-8 col-sm-9 col-xs-12">
    <h3>Bình luận sản phẩm</h3>
    <form method='post' action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp; ?> "> 
      <div class="form-group" >
        <label>Tên</label>
        <input type="text" required="" name="ten" class="form-control" placeholder="Vietpro Academy">
    </div>
    <div class="form-group">
        <label>Điện thoại</label>
        <input type="text" required="" name="dien_thoai" class="form-control" placeholder="012345678">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nội dung</label>
        <textarea class="form-control" required="" name="binh_luan" placeholder="Học viện Công nghệ Vietpro"></textarea>
    </div>
    <button type="submit" name='submit' class="btn btn-default">Bình luận</button>
</form>
</div>
<?php 
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}


$rowsPerPage=3;
$perRow=$page*$rowsPerPage-$rowsPerPage;

$sqlBl="SELECT * FROM blsanpham WHERE id_sp=$id_sp ORDER BY id_bl ASC LIMIT $perRow,$rowsPerPage ";
$queryBl=mysqli_query($conn,$sqlBl);

$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM blsanpham WHERE id_sp=$id_sp"));
$totalPage=ceil($totalRows/$rowsPerPage);
$listPage="";

for($i=1;$i<=$totalPage;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listPage.='<li><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
    }

}

$totalBl=mysqli_num_rows($queryBl);
if($totalBl){
 ?>


<div id="comments" class="col-md-12 col-sm-12 col-xs-12">
    <?php 
        while($row=mysqli_fetch_array($queryBl)){

     ?>
    <ul>
        <li class="comm-name"><?php echo $row['ten']; ?></li>
        <li class="comm-time"><?php echo $row['ngay_gio']; ?></li>
        <li class="comm-details">
            <p>
                <?php echo $row['binh_luan']; ?>
            </p>
        </li>
    </ul>
    <?php } ?>
</div>
<?php } ?>
<!-- Pagination -->
<div id="pagination" class="col-md-12 col-sm-12 col-xs-12">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php echo $listPage; ?>
    </ul>
</nav>
</div>            
<!-- End Pagination -->   
