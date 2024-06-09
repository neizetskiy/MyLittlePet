<div class="addphoto">
    <input onchange="previewFImage(event)" type="file" value="<?if(isset($_POST['fimg'])){echo $_POST['fimg'];}?>" name="fimg" id="" class="inputphoto">
    <label for="inputphoto">Добавить фото 1</label>
</div>
<div class="addphoto">
    <input onchange="previewSImage(event)" type="file" value="<?if(isset($_POST['simg'])){echo $_POST['simg'];}?>" name="simg" id="" class="inputphoto">
    <label for="inputphoto">Добавить фото 2</label>
</div>
<div class="imagelist">
    <img id="firstimg" src="" alt="IMG1">
    <img id="secondimg" src="" alt="IMG2">
</div>




<div class="productpage-imgs">
    <img src="/public/assets/imgs/productpage/Back.png" alt="" class="productslides" id="backslide">
    <img src="/public/assets/imgs/productpage/next.png" alt=""  class="productslides" id="nextslide">

    <div class="productpage-slider">
        <div class="productpage-slider-imgs">
            <div class="ppimg">
                <img src="<?=$item['fimg'];?>" alt="">
            </div>
            <div class="ppimg">
                <img src="<?=$item['simg'];?>" alt="">
            </div>
        </div>

    </div>
    <div class="productpage-subimgs">
        <img id="miniimg1" src="<?=$item['fimg'];?>" alt="">
        <img id="miniimg2" src="<?=$item['simg'];?>" alt="">
    </div>
</div>
