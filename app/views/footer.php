 <!--footer-->
 <div class="footer">
        <div class="container">
            <ul class="footer-menu">
                <li class="footer-item">
                    <h1 class="footer-title">Sản Phẩm</h1>
                    <a href="#" class="footer-link">Tom</a>
                    <a href="#" class="footer-link">Ca</a>
                    <a href="#" class="footer-link">Cua</a>
                    <a href="#" class="footer-link">Oc Cac Loai</a>
                </li>

                <li class="footer-item">
                    <h1 class="footer-title">Giới Thiệu</h1>
                    <a href="#" class="footer-link">Về chúng tôi</a>
                    <a href="#" class="footer-link">Chính sách</a>
                    <a href="#" class="footer-link">Chung</a>
                    <a href="#" class="footer-link">Liên hệ</a>
                </li>
                <li class="footer-item">
                    <h1 class="footer-title">Chính Sách</h1>
                    <a href="#" class="footer-link">Giao Hàng</a>
                    <a href="#" class="footer-link">HD đặt hàng</a>
                    <a href="#" class="footer-link">Cam kết chất lượng</a>
                    <a href="#" class="footer-link">Đổi trả</a>
                </li>

                <li class="footer-item">
                    <h1 class="footer-title">Liên Hệ</h1>
                    <div class="footer-item-add">
                    <p><i class="fas fa-map-marker-alt"></i> 42 Đường 3/2, Ninh Kiều, Cần Thơ</p>
                    <p> <i class="fas fa-phone"></i> 09129321939</p>
                    <p>   <i class="far fa-envelope"></i> company@gmail.com</p>
                    </div>
                  
                    <div class="footer-social">
                        <a href="#" class="footer-link social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="footer-link social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="footer-link social-link"><i class="fab fa-twitter"></i></a>

                    </div>
                </li>
            </ul>
            <div class="footer-copyright"><span>&copy; 2021 Nghia Doan</span></div>
        </div>
    </div>
<script src="<?php echo BASE_URL  ?>/public/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL  ?>/public/js/main.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL  ?>/public/js/lightslider.js"></script>
<script>
var productImg = document.getElementById("productImg");
var smallImg = document.getElementsByClassName("smallImg");
smallImg[0].onclick = function(){
    productImg.src = smallImg[0].src;
}
smallImg[1].onclick = function(){
    productImg.src = smallImg[1].src;
}
smallImg[2].onclick = function(){
    productImg.src = smallImg[2].src;
}
smallImg[3].onclick = function(){
    productImg.src = smallImg[3].src;
}
</script>
</body>
</html>