
      <div class="box-create-adress">
        <h5>Địa chỉ mới</h5>
        <div class="box-create-adress-form">
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label"
                >Tên người nhận</label
              >
              <input
                type="text"
                class="form-control"
                id="validationCustom01"
                value=""
                name="name"
                required
              />
              <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom02" class="form-label"
                >Số diện thoại</label
              >
              <input
                type="number"
                class="form-control"
                id="validationCustom02"
                value=""
                name="phone"
                minlength="10"
                required
                style="appearance: none;"
              />
              <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom03" class="form-label"
                >Thành phố</label
              >
              <select
                class="form-select"
                id="validationCustom03"
                required
              ></select>
              <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom04" class="form-label">Huyện</label>
              <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Huyện</option>
                <option>...</option>
              </select>
              <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom05" class="form-label">Xã</label>
              <select class="form-select" id="validationCustom05" required>
                <option selected disabled value="">Xã</option>
                <option>...</option>
              </select>
              <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="mb-3">
              <label for="validationTextarea" class="form-label"
                >Địa chỉ cụ thể</label
              >
              <textarea
                class="form-control"
                id="validationTextarea"
                placeholder="Mời nhập"
                required
                name="details"
              ></textarea>
              <div class="invalid-feedback">
                Please enter a message in the textarea.
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Thêm mới</button>
            </div>
          </form>
        </div>
      </div>

      
    
<script>
  const cityEl = document.querySelector("#validationCustom03");
  const districtsEl = document.querySelector("#validationCustom04");
  const wardsEl = document.querySelector("#validationCustom05");

  const adress = [];
  // hàm lấy tất cả thành phố
  function getCity() {
    fetch("https://provinces.open-api.vn/api/p")
      .then((res) => res.json())
      .then((res) => {
        const dataCity = res
          .map((item, index) => {
            return `<option value="${item.code}" ${
              index == 0 ? "selected" : ""
            }>${item.name}</option>`;
          })
          .join("");

        cityEl.innerHTML = dataCity;
        getDistricts(1);
      });
  }
  getCity();

  //   Hàm xử lí huyện
  function getDistricts(id) {
    fetch(`https://provinces.open-api.vn/api/p/${id}?depth=2`)
      .then((res) => res.json())
      .then((res) => {
        adress[0] = res.name;
        const dataDistricts = res.districts.map((item, index) => {
          return `<option value="${item.code}">${item.name}</option>`;
        });
        dataDistricts.unshift(
          "<option selected disabled value=''>Huyện</option>"
        );
        districtsEl.innerHTML = dataDistricts.join("");
      });
  }

  cityEl.addEventListener("change", (e) => {
    getDistricts(e.target.value);
    wardsEl.innerHTML = "";
  });

  //   hàm xử lí xã
  function getWards(id) {
    fetch(`https://provinces.open-api.vn/api/d/${id}?depth=2`)
      .then((res) => res.json())
      .then((res) => {
        adress[1] = res.name;
        const dataDistricts = res.wards.map((item, index) => {
          return `<option value="${item.code}" >${item.name}</option>`;
        });
        dataDistricts.unshift("<option selected disabled>Xã</option>");
        wardsEl.innerHTML = dataDistricts.join("");
      });
  }

  districtsEl.addEventListener("change", (e) => {
    getWards(e.target.value);
  });

  function getNameWards(id) {
    fetch(`https://provinces.open-api.vn/api/w/${id}`)
      .then((res) => res.json())
      .then((res) => {
        adress[2] = res.name;
      });
  }
  wardsEl.addEventListener("change", (e) => {
    getNameWards(e.target.value);
  });
</script>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
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
          } else {
            event.preventDefault();
            console.log(event);
            const data = new FormData(forms[0]);
            data.append("adress",adress.reverse().join(','));
            data.append("userId",<?=$sessionUserId?>);
            fetch("/duan1_Nike/controllers/createAdressController.php",{
              method:"post",
              body:data
            })
              .then(res => res.json())
              .then(res => {
                if(res == 1) {
                  window.location = "/duan1_Nike/index.php?act=adress";
                }
              })
          }

          form.classList.add("was-validated");
        },
        false
      );
    });
  })();
</script>
