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

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// cập nhập màu----------------------
const colorArray = [
  {
    id: 1,
    name: "Trắng",
    ma: "#fff",
  },
  {
    id: 2,
    name: "Đen",
    ma: "#000",
  },
  {
    id: 3,
    name: "Đỏ",
    ma: "red",
  },
  {
    id: 4,
    name: "Đen",
    ma: "#000",
  },
  {
    id: 5,
    name: "Đen",
    ma: "#000",
  },
  {
    id: 6,
    name: "Đen",
    ma: "#000",
  },
];
const selectColor = [];
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

// cập nhập size----------------------------

const sizeArray = [
  {
    id: 1,
    name: "37",
    ma: "#fff",
  },
  {
    id: 2,
    name: "38",
    ma: "#000",
  },
  {
    id: 3,
    name: "39",
    ma: "red",
  },
];
const selectSize = [];
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

// thay đôi ảnh

const imgInput = document.querySelector("#validationCustom09");
const imgShow = document.querySelector("#imageProduct");
imgInput.addEventListener("change", (e) => {
  imgShow.src = URL.createObjectURL(e.target.files[0]);
});
