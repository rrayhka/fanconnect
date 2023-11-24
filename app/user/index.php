<?php 
$title = "Home";
$page  = "home";
?>

<?php require_once("templates/main_start.php"); ?>
<?php
$dataGender = [
  "girl" => getIdolsDataByGender(0),
  "boy" => getIdolsDataByGender(1),
  "all" => getIdolsDataByGender(0) + getIdolsDataByGender(1),
];

$dataIdol = [
  'kr' => getIdolsDataByCountries('kr'),
  'jp' => getIdolsDataByCountries('jp'),
  'cn' => getIdolsDataByCountries('cn'),
  'au' => getIdolsDataByCountries('au'),
  'ot' => getIdolsDataByOtherCountries(),
];


$dataGroups = [
  "girl" => getGroupsDataByGender(0),
  "boy" => getGroupsDataByGender(1),
  "mix" => getGroupsDataByGender(2),
];


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<section class="card-base-info groups-gender-data">
    <div class="card-base-info-title">
        <div class="card-base-info-icon">
            <svg id="ebc174772a2b4ce7eb4575abf3c5430c" xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56">
                <path id="Path_1" data-name="Path 1" d="M0,0H56V56H0Z" fill="none"/>
                <path id="Path_2" data-name="Path 2" d="M25.333,2A23.333,23.333,0,1,0,48.667,25.333,23.342,23.342,0,0,0,25.333,2Zm0,35A2.34,2.34,0,0,1,23,34.667V25.333a2.333,2.333,0,1,1,4.667,0v9.333A2.34,2.34,0,0,1,25.333,37Zm2.333-18.667H23V13.667h4.667Z" transform="translate(2.667 2.667)" fill="#35247e"/>
            </svg>
        </div>
        <h1 class="font-kanit">Idol Gender Data</h1>
      </div>
      <div class="card-base-info-description groups-chart-gender">
        <div class="dd">
          <div class="chart-gender">
            <canvas id="girlChart"></canvas>
            <canvas id="boyChart"></canvas>
          </div>

        </div>
        <div class="data-gender-info">
          <h1 class="  font-kanit primary-font">Idol Summaries</h1>
          <div class="font-montserrat data-gender-info-summaries">
            <div class="circle-list"><div class="circle-list-bullet red-bg"></div> <span class="circle-list-text red-font"><?= $dataGender["girl"] ?></span></div>
            <div class="circle-list"><div class="circle-list-bullet cyan-bg"></div> <span class="circle-list-text cyan-font"><?= $dataGender["boy"] ?></span></div>
          </div>
        </div>
      </div>
</section>

<section class="groups-data-2">
  <section class="card-base-info groups-countries-data">
      <div class="card-base-info-title">
          <div class="card-base-info-icon">
              <svg id="ebc174772a2b4ce7eb4575abf3c5430c" xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56">
                  <path id="Path_1" data-name="Path 1" d="M0,0H56V56H0Z" fill="none"/>
                  <path id="Path_2" data-name="Path 2" d="M25.333,2A23.333,23.333,0,1,0,48.667,25.333,23.342,23.342,0,0,0,25.333,2Zm0,35A2.34,2.34,0,0,1,23,34.667V25.333a2.333,2.333,0,1,1,4.667,0v9.333A2.34,2.34,0,0,1,25.333,37Zm2.333-18.667H23V13.667h4.667Z" transform="translate(2.667 2.667)" fill="#35247e"/>
              </svg>
          </div>
          <h1 class="font-kanit">Idols By Country</h1>
        </div>
        <div class="card-base-info-description groups-chart-countries">
          <div class="chart-countries">
            <canvas id="idolCountriesChart"></canvas>
          </div>
          <div class="data-countries-info">
            <h1 class="font-kanit primary-font">Idol Countries</h1>
            <div class="font-montserrat data-countries-info-summaries">
              <a href="list_idols.php?country=kr"><div class="circle-list"><div class="circle-list-bullet orange-bg"></div> <span class="circle-list-text orange-font">South Korea</span></div></a>
              <a href="list_idols.php?country=jp"><div class="circle-list"><div class="circle-list-bullet green-bg"></div> <span class="circle-list-text green-font">Japan</span></div></a>
              <a href="list_idols.php?country=cn"><div class="circle-list"><div class="circle-list-bullet red-bg"></div> <span class="circle-list-text red-font">China</span></div></a>
              <a href="list_idols.php?country=au"><div class="circle-list"><div class="circle-list-bullet cyan-bg"></div> <span class="circle-list-text cyan-font">Australia</span></div></a>
              <a href="list_idols.php?country=us"><div class="circle-list"><div class="circle-list-bullet purple-bg"></div> <span class="circle-list-text purple-font">Other Countries</span></div></a>
            </div>
          </div>
        </div>
  </section>
  
  <section class="card-base-info groups-gender-category-data">
      <div class="card-base-info-title">
          <div class="card-base-info-icon">
              <svg id="ebc174772a2b4ce7eb4575abf3c5430c" xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56">
                  <path id="Path_1" data-name="Path 1" d="M0,0H56V56H0Z" fill="none"/>
                  <path id="Path_2" data-name="Path 2" d="M25.333,2A23.333,23.333,0,1,0,48.667,25.333,23.342,23.342,0,0,0,25.333,2Zm0,35A2.34,2.34,0,0,1,23,34.667V25.333a2.333,2.333,0,1,1,4.667,0v9.333A2.34,2.34,0,0,1,25.333,37Zm2.333-18.667H23V13.667h4.667Z" transform="translate(2.667 2.667)" fill="#35247e"/>
              </svg>
          </div>
          <h1 class="font-kanit">Groups By Category</h1>
        </div>
        <div class="card-base-info-description groups-chart-gender-category">
          <div class="chart-gender-category">
            <canvas id="groupCategoriesChart"></canvas>
          </div>
          <div class="data-gender-category-info">
            <h1 class="font-kanit primary-font">Idol Group Gender</h1>
            <div class="font-montserrat data-gender-category-info-summaries">
              <div class="circle-list"><div class="circle-list-bullet red-bg"></div> <span class="circle-list-text red-font"><?= $dataGroups["girl"] ?></span></div>
              <div class="circle-list"><div class="circle-list-bullet cyan-bg"></div> <span class="circle-list-text cyan-font"><?= $dataGroups["boy"] ?></span></div>
              <div class="circle-list"><div class="circle-list-bullet orange-bg"></div> <span class="circle-list-text orange-font"><?= $dataGroups["mix"] ?></span></div>
            </div>
          </div>
        </div>
  </section>

</section>




    
<?php require_once("templates/main_end.php"); ?>

<script>

  function chartGender(chrt, dataGender, dataAll, color, label, icon)
  {

    const image = new Image();
    
    new Chart(chrt, {
      type: 'doughnut',
      plugins: [{
      id: 'customCanvasBackgroundImage',
      beforeDraw: (chart) => {
        if (image.complete) {
            image.src = 'data:image/svg+xml,' + encodeURIComponent(icon);
            const ctx = chart.ctx;
            imageSizeX = 17;
            imageSizeY = 40;
            const {top, left, width, height} = chart.chartArea;
            const x = left + width / 2 - imageSizeX / 2;
            const y = top + height / 2 - imageSizeY / 2;

            // ctx.restore();
            var fontSize = (height / 200).toFixed(2);
            ctx.font = fontSize + "em sans-serif";
            ctx.textBaseline = "middle";

            var text = (dataGender/dataAll*100).toFixed(0)+"%",
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 4 + y;

            ctx.fillText(text, textX, textY);
            
            ctx.drawImage(image, x , y, imageSizeX, imageSizeY);
            ctx.restore();
        } else {
          image.onload = () => chart.draw();
        }
      }
      }],
      data: {
        labels: [label],
        datasets: [{
          data: [dataGender,dataAll-dataGender],
          backgroundColor: [color,'#35247E'],
          hoverBackgroundColor: [color,'#35247E'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        // maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        responsive: true,
        legend: {
          display: false
        },
        cutoutPercentage: 10,
      },
    });
  }

  
chartGender('girlChart', <?= $dataGender['girl'] ?>, <?= $dataGender["all"] ?>, '#F65364', "Girl Idols",
`<svg xmlns="http://www.w3.org/2000/svg" width="62.872" height="146.805" viewBox="0 0 62.872 146.805">
  <path id="Path_17" data-name="Path 17" d="M169.991,70.111l-9.627,34.151c-2.063,7.465,6.778,10.38,8.939,3.373l8.611-31.5h2.423l-14.8,55.336h13.818v41.584a5.254,5.254,0,1,0,10.478,0V131.472h3.274v41.584c0,7.531,10.15,7.531,10.15,0V131.472h14.211L202.341,76.136h2.75l8.612,31.5c2.128,7.171,10.9,4.093,8.939-3.34l-9.627-34.184c-1.31-3.864-5.959-10.674-13.752-11H183.776c-8.055.327-12.672,7.073-13.785,11Zm33.464-26A11.986,11.986,0,1,0,191.47,56.326,12.1,12.1,0,0,0,203.454,44.113Z" transform="translate(-160.054 -31.9)" fill="#f65364"/>
</svg>
`
);
chartGender('boyChart', <?= $dataGender['boy'] ?>, <?= $dataGender["all"] ?>, '#81E1F0', "Boy Idols",
`<svg xmlns="http://www.w3.org/2000/svg" width="55.009" height="146.699" viewBox="0 0 55.009 146.699">
  <path id="Path_16" data-name="Path 16" d="M199.5,56.426a12.213,12.213,0,1,0-12.213-12.213A12.172,12.172,0,0,0,199.5,56.426Zm12.246,2.75H187.258C178.025,59.177,172,67.3,172,75.025v37.2a5.085,5.085,0,1,0,10.15,0V77.841h1.965v93.515c0,9.954,13.752,9.627,14.08,0v-53.9h2.619v53.928c.557,10.216,14.08,9.234,14.08-.033V77.841h1.637v34.38c0,7.2,10.478,7.2,10.478,0v-37.2C227.009,67.33,220.951,59.177,211.75,59.177Z" transform="translate(-172 -32)" fill="#81e1f0"/>
</svg>
`);
// chartGender(ctb, '#81E1F0');






new Chart('idolCountriesChart', {
      type: 'pie',
      data: {
        labels: ["South Korea", "Japan", "China", "Australia", "Other Countries"],
        datasets: [{
          data: [<?= $dataIdol["kr"] ?>,<?= $dataIdol["jp"] ?>,<?= $dataIdol["cn"] ?>,<?= $dataIdol["au"] ?>,<?= $dataIdol["ot"] ?>],
          backgroundColor: ['#FFA100','#91FF00','#F65364','#81E1F0','#D053F6','#35247E'],
          hoverBackgroundColor: ['#35247E'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        plugins: {
            legend: {
                display: false,
                labels: {
                    color: '#35247E'
                }
            }
        }
    }
    });


new Chart('groupCategoriesChart', {
      type: 'bar',
      data: {
        labels: ["Girls Groups", "Boys Groups", "Mix Groups"],
        datasets: [{
          data: [<?= $dataGroups["girl"] ?>,<?= $dataGroups["boy"] ?>,<?= $dataGroups["mix"] ?>],
          backgroundColor: ['#F65364','#81E1F0','#FFA100'],
          hoverBackgroundColor: ['#35247E'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
          borderRadius:{
            topRight :100,
            topLeft :100,
            bottomRight :100,
            bottomLeft :100,
          },
          barThickness:40,
          borderSkipped:false 
        }],
      },
      options: {
        plugins: {
            legend: {
                display: false,
                labels: {
                    color: '#35247E'
                }
            }
        }
    }
    });






</script>

