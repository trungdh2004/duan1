<?php 
    $productOneUpdate = get_one_pdo("product",$_GET['id']);
?>

<div class="box-create-product">
  <h2 class="title">Sửa sản phẩm</h2>
  <form class="row g-3 needs-validation" id="form-create-product" novalidate>
    <!-- title -->
    <div class="col-md-6">
      <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
      <input
        type="text"
        class="form-control"
        id="validationCustom01"
        required
        name="title"
        value="<?=$productOneUpdate['title']?>"
      />
      <div class="invalid-feedback">Vui lòng nhập tên sản phẩm.</div>
    </div>

    <!-- price -->
    <div class="col-md-6">
      <label for="validationCustom02" class="form-label">Giá</label>
      <input
        type="text"
        class="form-control"
        id="validationCustom02"
        required
        name="price"
        value="<?=$productOneUpdate['price']?>"
      />
      <div class="invalid-feedback">Vui lòng nhập giá sản phẩm.</div>
    </div>

    <!-- quantily -->
    <div class="col-md-6">
      <label for="validationCustom04" class="form-label">Số lượng</label>
      <input
        type="text"
        class="form-control"
        id="validationCustom04"
        required
        name="quantily"
        value="<?=$productOneUpdate['quantily']?>"
      />
      <div class="invalid-feedback">Vui lòng nhập số lượng.</div>
    </div>

    <!-- hot -->
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">Hot</label>
      <select
        name="hot"
        id="validationCustom05"
        class="form-select"
        required
      >
        <option selected disabled value="">Mời chọn...</option>
        <option value="1" <?php 
            if($productOneUpdate['ishot'] == 1) {
                echo 'selected';
            }
        ?>>Có</option>
        <option value="0" 
            <?php 
                if($productOneUpdate['ishot'] == 0) {
                    echo 'selected';
                }
            ?>
        >Không</option>
      </select>
      <div class="invalid-feedback">Vui lòng chọn .</div>
    </div>

    <!-- category -->
    <div class="col-md-3">
      <label for="validationCustom06" class="form-label">Loại hàng</label>
      <select
        id="validationCustom06"
        class="form-select"
        required
        name="cate"
      >
        <option selected disabled value="">Mời chọn loại hàng...</option>
        <?php 
            $cateRequestAll = get_all_pdo("category");
            foreach($cateRequestAll as $cate) {
                ?>
                    <option 
                        value="<?=$cate['id']?>" 
                        <?php if($cate['id'] === $productOneUpdate['cateId']){
                            echo 'selected';
                        }?> 
                    >
                        <?=$cate['name']?>
                    </option>
                <?php
            }
        ?>
      </select>
      <div class="invalid-feedback">Vui lòng chọn loại hàng.</div>
    </div>


    <!-- màu -->
    <div class="col-md-6">
      <label for="validationCustom07" class="form-label">Mã màu</label>
      <select
        id="validationCustom07"
        class="form-select"
        required
      >
        <option selected disabled value="">Mời chọn màu...</option>
        <?php 
            $colorRequestAll = get_all_pdo("color");
            foreach($colorRequestAll as $color) {
                ?>
                    <option value="<?=$color['id']?>" 
                        <?php
                            if($color['id'] == json_decode($productOneUpdate['colorId'])[0]) {
                                echo "selected";
                            }
                        ?>
                    ><?=$color['name']?></option>
                <?php
            }
        ?>
        
      </select>

      <div class="box-form-color"></div>
      <div class="invalid-feedback">Vui lòng chọn màu.</div>
    </div>

    <!-- size -->
    <div class="col-md-6">
      <label for="validationCustom08" class="form-label">Kích thước</label>
      <select
        id="validationCustom08"
        class="form-select"
        required
        name="category"
      >
        <option selected disabled value="">Mời chọn loại hàng...</option>
        <?php 
            $sizeRequestAll = get_all_pdo("size");
            foreach($sizeRequestAll as $size) {
                ?>
                    <option value="<?=$size['id']?>"
                        <?php
                            if($size['id'] == json_decode($productOneUpdate['sizeId'])[0]) {
                                echo "selected";
                            }
                        ?>
                    ><?=$size['name']?></option>
                <?php
            }
        ?>
      </select>

      <div class="box-form-size"></div>
      <div class="invalid-feedback">Vui lòng chọn kích thước.</div>
    </div>

    <!-- image -->
    <div class="col-md-6">
      <label for="validationCustom09" class="form-label">Ảnh</label>
      <input
        type="file"
        name="image"
        id="validationCustom09"
        class=" d-none"
        
        value="123"
      />

      <div class="box-form-image">
        <div class="box-form-image-img">
          <img src="./images/<?=$productOneUpdate['image']?>" alt="" id="imageProduct" />
        </div>

        <label
          for="validationCustom09"
          style="cursor: pointer; padding: 10px 20px; border: 1px solid #000"
        >
          Chọn ảnh
        </label>
      </div>
      <div class="invalid-feedback">Vui lòng chọn ảnh.</div>
    </div>


<!-- desc -->
    <div class="col-md-6">
      <label for="validationCustom010" class="form-label">Mô tả</label>
      <textarea
        name="description"
        id="validationCustom010"
        class="form-control"
        required
        value=""
      ><?=$productOneUpdate['description']?></textarea>

      <div class="invalid-feedback">Vui lòng nhập mô tả.</div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit" id="btn-submit">Submit form</button>
    </div>
  </form>


</div>
<!-- js xử lí size và color -->
<script >
       

        // cập nhập màu----------------------
        const colorArray = [
            <?php 
                foreach($colorRequestAll as $color) {
                    echo "{
                        id: ".$color['id'].",
                        name: '".$color['name']."',
                        ma: '".$color['colorCode']."',
                    },";
                }
            ?>
        ];
        

        const selectColor = [
            <?php 
                foreach($colorRequestAll as $color) {
                    if(in_array($color['id'], json_decode($productOneUpdate['colorId']))) {
                        echo "{
                            id: ".$color['id'].",
                            name: '".$color['name']."',
                            ma: '".$color['colorCode']."',
                        },";
                    }
                }
            ?>
        ];

        const colorInput = document.querySelector("#validationCustom07");
        const boxColor = document.querySelector(".box-form-color");
        colorInput.addEventListener("change", (e) => {
        colorArray.map((color) => {
            if (color.id == e.target.value) {
            const check = selectColor.some((item) => item.id == e.target.value);
            if (!check) {
                selectColor.push(color);
                showColor();
            }
            }
        });
        });
        function showColor() {
        const color = selectColor
            .map((item) => {
            return `<p style="--i:${item.ma}" onClick="deleteColor(${item.id})"></p>`;
            })
            .join("");
        boxColor.innerHTML = color;
        }
        function deleteColor(e) {
        const index = selectColor.filter((color, index) => {
            if (color.id == e) {
            selectColor.splice(index, 1);
            }
        });
        if (selectColor.length == 0) {
            colorInput.value = "";
        }
        showColor();
        }
        showColor();

        // cập nhập size----------------------------

        const sizeArray = [
            <?php 
                foreach($sizeRequestAll as $size) {
                    echo "{
                        id: ".$size['id'].",
                        name: '".$size['name']."',
                    },";
                }
            ?>
        ];
        const selectSize = [
            <?php 
                foreach($sizeRequestAll as $size) {
                    if(in_array($size['id'], json_decode($productOneUpdate['sizeId']))) {
                        echo "{
                            id: ".$size['id'].",
                        name: '".$size['name']."',
                        },";
                    }
                }
            ?>
        ];
        const sizeInput = document.querySelector("#validationCustom08");
        const boxSize = document.querySelector(".box-form-size");
        sizeInput.addEventListener("change", (e) => {
        sizeArray.map((size) => {
            if (size.id == e.target.value) {
            const check = selectSize.some((size) => size.id == e.target.value);
            if (!check) {
                selectSize.push(size);
                showSize();
            }
            }
        });
        });
        function showSize() {
        const size = selectSize
            .map((item) => {
            return `<p  onClick="deleteSize(${item.id})">${item.name}</p>`;
            })
            .join("");
        boxSize.innerHTML = size;
        }
        function deleteSize(e) {
        const index = selectSize.filter((size, index) => {
            if (size.id == e) {
            selectSize.splice(index, 1);
            }
        });

        if (selectSize.length == 0) {
            sizeInput.value = "";
        }
        showSize();
        }
        showSize();

        // thay đôi ảnh

        const imgInput = document.querySelector("#validationCustom09");
        const imgShow = document.querySelector("#imageProduct");
        imgInput.addEventListener("change", (e) => {
        imgShow.src = URL.createObjectURL(e.target.files[0]);
        });
        
</script>

<!-- js xử lí đẩy dữ liệu -->
<script>
    (() => {
            "use strict";

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll(".needs-validation");
            // Loop over them and prevent submission
            Array.from(forms).forEach((form) => {
                form.addEventListener(
                "submit",
                (event) => {
                    if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    else {
                        event.preventDefault();
                        const data = new FormData(form);
                        const colorId = selectColor.map(item => item.id);
                        const sizeId = selectSize.map(item => item.id);

                        data.append('colorId',JSON.stringify(colorId));
                        data.append('sizeId',JSON.stringify(sizeId));
                        data.append('id',<?php echo $_GET['id']?>);
                        data.append('imageOld','<?php echo $productOneUpdate['image']?>');


                        fetch("/duan1_Nike/controllers/fetchProduct/updateProController.php",{
                            method:"post",
                            body:data
                        })
                        .then(res => {
                          return res.json()
                        })
                        .then(res => {
                          if(res == 1) {
                            window.location = "/duan1_Nike/index.php?layout=dashboard&act=product";
                          }else {
                            alert("Lỗi vui lòng bạn nhập lại");
                          }
                        })
                    }
                    form.classList.add("was-validated");
                },
                false
                );
            });
        })();
    const form = document.querySelector("#form-create-product");

    

   
</script>