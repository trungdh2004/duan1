<?php 
  $revenuAll = getSumRevenueALL();
  $revenuDay = getSumRevenueDay();
  $countOrderDay = getCountOrderDay();
  $queryProOrder = getTop5OrderProRevenue();
  $queryUserOrder = getTop5OrderUserRevenue();

  var_dump($revenuDay['sum'] !=null? $revenuDay['sum'] : '0');
?>
<div class="box-revenue">
    <h2 class="title">
        Doanh thu
    </h2>
    <div class="box-revenue-body row">
        <div class="col-md-12">
          <div id="chart">

          </div>
        </div>
        <div class="col-4">
          <div class="box-revenue-body-grid-item">
            <div class="box-revenue-body-grid-item-icon">
              <i class="fa-solid fa-sack-dollar"></i>
            </div>
            <div class="box-revenue-body-grid-item-text">
              <p>Tổng số doanh thu</p>
              <span>+ <?=currency_format($revenuAll['sum']) ?></span>
            </div>
          </div>
          <div class="box-revenue-body-grid-item">
            <div class="box-revenue-body-grid-item-icon">
              <i class="fa-regular fa-calendar-check"></i>
            </div>
            <div class="box-revenue-body-grid-item-text">
                <p>Tổng số doanh thu hôm nay</p>
                <span>+ <?=$revenuDay['sum'] !=null? currency_format( $revenuDay['sum'] ) : '0'?></span>
            </div>
          </div>
          <div class="box-revenue-body-grid-item">
            <div class="box-revenue-body-grid-item-icon">
              <i class="fa-solid fa-cart-plus"></i>
            </div>
            <div class="box-revenue-body-grid-item-text">
              <p>Tổng số đơn hàng</p>
              <span><?=$countOrderDay['count']?></span>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="box-revenue-body-category-chart">
            <div id="revenue-category-chart">

            </div>
          </div>
        </div>

        <div class="col-7">
          <div class="mt-40">

            <div id="revenu-chart-product"></div>
          </div>
        </div>

        <div class="col-5">
          <div class="mt-40">
            <div id="revenu-chart-user"></div>
          </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  const boxContent = document.querySelector(".box-content");
  boxContent.classList.add("dark");
</script>

<script>

  async function getRendeceCategoryOrder() {
    const res = await fetch("/duan1_Nike/api/apiOrder.php?order=category");
    const data = await res.json();

    console.log(data.map(item => item.name));

    var options = {
        series: [{
        name: 'Số sản phẩm',
        type: 'column',
        data: data.map(item => item.count)
      }, {
        name: 'Doanh thu',
        type: 'line',
        data:data.map(item => item.money)
        
      }],
        chart: {
        height: 380,
        type: 'line',
        foreColor: "#ccc",
      },
      stroke: {
        width: [0, 4]
      },
      title: {
        text: 'Doanh thu từng loại sản phẩm'
      },
      dataLabels: {
        enabled: true,
        enabledOnSeries: [1]
      },
      labels:data.map(item => item.name),
      yaxis: [{
        title: {
          text: 'Sản phẩm',
        },
      
        }, 
        {
          opposite: true,
          title: {
            text: 'Doanh thu'
          }
        },
      
      ],
      tooltip: {
        shared: true,
        intersect: false,
        y: {
          formatter: function (y,x) {
            console.log(x.seriesIndex);
            if(typeof y !== "undefined" && x.seriesIndex == 1) {
              const VND = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND',
                          });
              return  VND.format(y);
            }
            if(typeof y !== "undefined" && x.seriesIndex == 0) {
              return  y.toFixed(0) + " đơn";
            }
            return y;
          }
        }
      }
      };
      

      var chart = new ApexCharts(document.querySelector("#revenue-category-chart"), options);
      chart.render();
  }
  getRendeceCategoryOrder()
</script>
<script>
  const dataRenderu = [];
  async function getAllOrderRendures() {
    await fetch("/duan1_Nike/api/apiOrder.php?count=order")
      .then(res => res.json())
      .then(res => {
        res.reverse().map(item => {
          dataRenderu.push(item);
        })
      })
      

      var options = {
        series: [{
        name: 'Doanh thu',
        type: 'area',
        data: dataRenderu.map(item => item.sum ? item.sum : 0)
      }, {
        name: 'Đơn hàng',
        type: 'line',
        data: dataRenderu.map(item => item.count ? item.count : 0)
      }],
        chart: {
        height: 450,
        type: 'area',
        foreColor: "#ccc",
      },
      title: {
          text: 'Doanh thu 10 ngày gần nhất'
        },
      stroke: {
        curve: 'smooth'
      },
      fill: {
        type:'solid',
        opacity: [0.35, 1],
      },
      labels: dataRenderu.map(item => item.date ? item.date : 0),
      markers: {
        size: 0
      },
      yaxis: [
        {
          title: {
            text: 'Đơn hàng doanh thu',
          },
        },
        {
          opposite: true,
          title: {
            text: 'Đơn hàng',
          },
        },
      ],
      tooltip: {
        shared: true,
        intersect: false,
        y: {
          formatter: function (y,x) {
            console.log(x.seriesIndex);
            if(typeof y !== "undefined" && x.seriesIndex == 0) {
              const VND = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND',
                          });
              return  VND.format(y);
            }
            if(typeof y !== "undefined" && x.seriesIndex == 1) {
              return  y.toFixed(0) + " đơn";
            }
            return y;
          }
        }
      }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
  }
  getAllOrderRendures()
    
</script>

<script>
  function renderChartProduct() {
    var options = {
        series: [{
        name: 'Số sản phẩm',
        type: 'column',
        data: [<?php
          foreach($queryProOrder as $value) {
            echo $value['count'].",";
          }
        ?>]
      }, {
        name: 'Doanh thu',
        type: 'column',
        data:[<?php
          foreach($queryProOrder as $value) {
            echo $value['sum'].",";
          }
        ?>]
        
      }],
        chart: {
        height: 380,
        type: 'line',
        foreColor: "#ccc",
      },
      stroke: {
        width: [0, 4]
      },
      title: {
        text: 'Doanh thu 5 sản phẩm cao nhất '
      },
      dataLabels: {
        enabled: true,
        enabledOnSeries: [1]
      },
      labels:[
        <?php
          foreach($queryProOrder as $value) {
            echo "'".$value['title']."',";
          }
        ?>
      ],
      yaxis: [{
        title: {
          text: 'Sản phẩm',
        },
      
        }, 
        {
          opposite: true,
          title: {
            text: 'Doanh thu'
          }
        },
      
      ],
      tooltip: {
        shared: true,
        intersect: false,
        y: {
          formatter: function (y,x) {
            console.log(x.seriesIndex);
            if(typeof y !== "undefined" && x.seriesIndex == 1) {
              const VND = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND',
                          });
              return  VND.format(y);
            }
            if(typeof y !== "undefined" && x.seriesIndex == 0) {
              return  y.toFixed(0) + " đơn";
            }
            return y;
          }
        }
      }
      };
      

      var chart = new ApexCharts(document.querySelector("#revenu-chart-product"), options);
      chart.render();
  }
  renderChartProduct()
</script>

<script>
  function renderChartUser() {
    
    var options = {
          series: [{
          data: [<?php 
              foreach($queryUserOrder as $value) {
                echo $value['sum'].",";
              }
            ?>]
        }],
          chart: {
          height: 350,
          type: 'bar',
          foreColor:"#ccc",
          events: {
            click: function(chart, w, e) {
              // console.log(chart, w, e)
            }
          }
        },
        title: {
          text: 'Top 5 người doanh thu cao nhất ',
          colors:"#fff"
        },
        plotOptions: {
          bar: {
            columnWidth: '45%',
            distributed: true,
          }
        },
        labels:[<?php 
              foreach($queryUserOrder as $value) {
                echo "'".$value['name']."',";
              }
            ?>],
        dataLabels: {
          enabled: false
        },
        legend: {
          show: false
        },
        xaxis: {
         
          labels: {
            style: {
              fontSize: '12px',
              colors:"#fff"
            }
          }
        },
        tooltip: {
          shared: true,
          intersect: false,
          y: {
            formatter: function (y,x) {
              console.log(x.seriesIndex);
              if(typeof y !== "undefined") {
                const VND = new Intl.NumberFormat('vi-VN', {
                              style: 'currency',
                              currency: 'VND',
                            });
                return  VND.format(y);
              }
              // if(typeof y !== "undefined" && x.seriesIndex == 0) {
              //   return  y.toFixed(0) + " đơn";
              // }
              return y;
            }
          }
        }
      };
      

      var chart = new ApexCharts(document.querySelector("#revenu-chart-user"), options);
      chart.render();
  }
  renderChartUser()
</script>