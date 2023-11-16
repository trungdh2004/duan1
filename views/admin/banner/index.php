<?php 
  $getBanner = get_all_pdo("banner")[0];
?>
<div class="box-banner">
  <h2 class="title">Quản lí banner</h2>
  <div class="box-banner-body row">
    <div class="col-md-12">
      <div class="box-banner-body-slider">
        <h4>Slider show</h4>
        <div id="carouselExampleIndicators" class="carousel slide w-100">
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="3"
              aria-label="Slide 4"
            ></button>
          </div>
          <div class="carousel-inner w-100">
            <div class="carousel-item active">
              <img src="" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="" class="d-block w-100" alt="..." />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <button class="btn btn-outline-success" id="btn-post-banner">Cập nhập</button>
      </div>
    </div>
    <div class="col-md-3">
        <label for="banner-file-1" class="w-100">
            <div class="box-banner-body-image-1">
                <p>Ảnh 1</p>
                <input type="file" id="banner-file-1" class="d-none input-file-image" />
                <img
                    src="./images/<?=$getBanner['image1']?>"
                    alt=""
                    class="show-file-image-input"
                />
            </div>
        </label>
    </div>
    <div class="col-md-3" >
      <label for="banner-file-2" class="w-100">
        <div class="box-banner-body-image-1">
          <p>Ảnh 2</p>

          <input type="file" id="banner-file-2" class="d-none input-file-image" />
            <img
              src="./images/<?=$getBanner['image2']?>"
              alt=""
              class="show-file-image-input"
            />
        </div>
      </label>
    </div>
    <div class="col-md-3" class="w-100">
      <label for="banner-file-3" class="w-100">
        <div class="box-banner-body-image-1">
          <p>Ảnh 3</p>

          <input type="file" id="banner-file-3" class="d-none input-file-image" />
            <img
              src="./images/<?=$getBanner['image3']?>"
              alt=""
              class="show-file-image-input"
            />
        </div>
      </label>
    </div>
    <div class="col-md-3" class="w-100">
      <label for="banner-file-4" class="w-100">
        <div class="box-banner-body-image-1">
          <p>Ảnh 4</p>
          
          <input type="file" id="banner-file-4" class="d-none input-file-image" />
            <img
              src="./images/<?=$getBanner['image4']?>"
              alt=""
              class="show-file-image-input"
            />
        </div>
      </label>
    </div>
  </div>
</div>

<script>
  
  const dataImg = [
    <?php 
      
      echo "
            {
              id: '1',
              url: '".$getBanner['image1']."',
            },
            {
              id: '2',
              url: '".$getBanner['image2']."',
            },
            {
              id: '3',
              url: '".$getBanner['image3']."',
            },
            {
              id: '4',
              url: '".$getBanner['image4']."',
            },
          ";
    ?>
  ];

  console.log(dataImg);

  const carouselItem = document.querySelectorAll(".carousel-item img");
  const inputFile = document.querySelectorAll(".input-file-image");
  const showFileImage = document.querySelectorAll(".show-file-image-input");
  const btnPost = document.querySelector('#btn-post-banner');
  function showSlider() {
    carouselItem.forEach((item, index) => {
      item.src = `./images/${dataImg[index].url}`;
    });
  }
  showSlider();
  inputFile.forEach((item, index) => {
    item.addEventListener("change", (e) => {
      showFileImage[index].src = URL.createObjectURL(e.target.files[0]);
      carouselItem[index].src = URL.createObjectURL(e.target.files[0]);
    });
  });




  btnPost.addEventListener("click", (e) => { 
    const form = new FormData();
    form.append("post","post");
    inputFile.forEach((item, index) => { 
      let blog = new  Blob(['']);
      let file = item.files[0] ? item.files[0] : blog;
;
      form.append(`image${index+1}`, file);
    })

    fetch("/duan1_Nike/controllers/bannerController.php",{
      method:"post",
      body: form
    })
    .then(res => res.json())
    .then(res => {
      if(res == 1) {
        window.location.reload();
      }
      else {
        alert("Lỗi không đẩy được ảnh vui lòng load lại trang web");
      }
    })
  })


  
</script>
