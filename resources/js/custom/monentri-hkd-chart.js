(function ($) {
  const isDark = localStorage.theme === "dark" ? true : false;
  const isRtl = localStorage.dir === "rtl" ? true : false;

  function generateData(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      //var x =Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
      var y =
        Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

      series.push([baseval, y, z]);
      baseval += 86400000;
      i++;
    }
    return series;
  }

  const colors = {
    primary: "#4669FA",
    secondary: "#A0AEC0",
    danger: "#F1595C",
    black: "#111112",
    warning: "#FA916B",
    info: "#0CE7FA",
    light: "#425466",
    success: "#50C793",
    "gray-f7": "#F7F8FC",
    dark: "#1E293B",
    "dark-gray": "#0F172A",
    gray: "#68768A",
    gray2: "#EEF1F9",
    "dark-light": "#CBD5E1",
  };

  const hexToRGB = (hex, alpha) => {
    var r = parseInt(hex.slice(1, 3), 16),
      g = parseInt(hex.slice(3, 5), 16),
      b = parseInt(hex.slice(5, 7), 16);

    if (alpha) {
      return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
    } else {
      return "rgb(" + r + ", " + g + ", " + b + ")";
    }
  };

  // const areaChartHeight = document.getElementById("areaChart");
  // areaChartHeight.getAttribute("height") || 350

  const chartOptions = [
    {
      id: "monentri-hkd-barchart",
      options: {
        chart: {
          height: 400,
          width: "100%",
          type: "bar",
          toolbar: {
            show: false,
          },
        },
        series: [
          {
            name: "HKD-1",
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
          },
          {
            name: "HKD-2.1",
            data: [76, 85, 100, 98, 87, 100, 91, 100, 94],
          },
          {
            name: "HKD-2.2",
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
          },
        ],
        plotOptions: {
          bar: {
            horizontal: false,
            endingShape: "rounded",
            columnWidth: "45%",
          },
        },
        legend: {
          show: true,
          position: "top",
          horizontalAlign: "right",
          fontSize: "12px",
          fontFamily: "Inter",
          offsetY: -30,
          markers: {
            width: 8,
            height: 8,
            offsetY: -1,
            offsetX: -5,
            radius: 12,
          },
          labels: {
            colors: isDark ? "#CBD5E1" : "#475569",
          },
          itemMargin: {
            horizontal: 18,
            vertical: 0,
          },
        },
        title: {
          text: "Progres Entri Data Harga Konsumen Perdesaan",
          align: "left",

          offsetX: isRtl ? "0%" : 0,
          offsetY: 13,
          floating: false,
          style: {
            fontSize: "20px",
            fontWeight: "500",
            fontFamily: "Inter",
            color: isDark ? "#fff" : "#0f172a",
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          show: true,
          width: 2,
          colors: ["transparent"],
        },
        yaxis: {
          opposite: isRtl ? true : false,
          labels: {
            style: {
              colors: isDark ? "#CBD5E1" : "#475569",
              fontFamily: "Inter",
            },
          },
        },
        xaxis: {
          categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec"
          ],
          labels: {
            style: {
              colors: isDark ? "#CBD5E1" : "#475569",
              fontFamily: "Inter",
            },
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },

        fill: {
          opacity: 1,
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return  val + " Persen";
            },
          },
        },
        colors: ["#4669FA", "#0CE7FA", "#FA916B"],
        grid: {
          show: true,
          borderColor: isDark ? "#334155" : "#E2E8F0",
          strokeDashArray: 10,
          position: "back",
        },
        responsive: [
          {
            breakpoint: 600,
            options: {
              legend: {
                position: "bottom",
                offsetY: 8,
                horizontalAlign: "center",
              },
              plotOptions: {
                bar: {
                  columnWidth: "80%",
                },
              },
            },
          },
        ],
      },
    },
    {
      id: "radial-hkd-bar",
      options: {
        chart: {
          type: "radialBar",
          height: 360,
          toolbar: {
            show: false,
          },
        },
        series: [99, 98, 98],
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                fontSize: "22px",
                color: isDark ? "#CBD5E1" : "#475569",
              },
              value: {
                fontSize: "16px",
                color: isDark ? "#CBD5E1" : "#475569",
              },
              total: {
                show: true,
                label: "Total",
                color: isDark ? "#CBD5E1" : "#475569",
                formatter: function () {
                  return 98;
                },
              },
            },
            track: {
              background: "#E2E8F0",
              strokeWidth: "97%",
            },
          },
        },
        labels: ["HKD-1", "HKD-2.1", "HKD-2.2"],
        colors: ["#4669FA", "#0CE7FA", "#FA916B"],
      },
    },
    
  ];

  const chartJsOptions = [
    {
      id: "chart1",
      type: "bar",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ],
        datasets: [
          {
            label: " data one",
            data: [35, 59, 80, 81, 56, 55, 40],
            fill: false,
            backgroundColor: hexToRGB(colors.primary, 0.6),
            borderColor: colors.primary,

            borderWidth: 2,
            borderRadius: "15",
            borderSkipped: "bottom",
            barThickness: 25,
          },
          {
            label: " data two",
            data: [24, 42, 40, 19, 86, 27, 90],
            fill: false,
            backgroundColor: hexToRGB(colors.success, 0.8),
            borderColor: colors.success,
            borderWidth: 2,
            borderRadius: "15",
            borderSkipped: "bottom",
            barThickness: 25,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            labels: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },

        scales: {
          y: {
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },
            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
          x: {
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },

            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },

        maintainAspectRatio: false,
      },
    },
    {
      id: "chart2",
      type: "bar",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ],

        datasets: [
          {
            label: "Option A",
            data: [35, 59, 80, 81, 56, 55, 40],
            fill: false,
            backgroundColor: hexToRGB(colors.primary, 0.9),
            borderWidth: 2,
            borderColor: "transparent",
            barThickness: 20,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },

        scales: {
          y: {
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },
            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
          x: {
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },

            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },
        indexAxis: "y",
      },
    },
    {
      id: "chart3",
      type: "bar",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ],
        datasets: [
          {
            label: " data one",
            data: [35, 59, 80, 81, 56, 55, 40],
            fill: false,
            backgroundColor: hexToRGB(colors.primary, 1),
            borderColor: colors.primary,

            borderSkipped: "bottom",
            barThickness: 40,
          },
          {
            label: " data two",
            data: [24, 42, 40, 19, 86, 27, 90],
            fill: false,
            backgroundColor: hexToRGB(colors.success, 1),
            borderColor: colors.success,

            borderSkipped: "bottom",
            barThickness: 40,
          },
          {
            label: " data three",
            data: [24, 42, 40, 19, 86, 27, 90],
            fill: false,
            backgroundColor: hexToRGB(colors.danger, 1),
            borderColor: colors.success,

            borderSkipped: "bottom",
            barThickness: 40,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },
        scales: {
          x: {
            stacked: true,
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },

            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
          y: {
            stacked: true,
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },

            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },
      },
    },
    {
      id: "chart4",
      type: "line",
      data: {
        labels: [
          0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140,
        ],
        datasets: [
          {
            label: " data one",
            data: [
              80, 150, 180, 270, 210, 160, 160, 202, 265, 210, 270, 255, 290,
              360, 375,
            ],
            fill: false,
            backgroundColor: hexToRGB(colors.primary, 1),
            borderColor: colors.primary,
            borderSkipped: "bottom",
            barThickness: 40,
            pointRadius: 1,
            pointHoverRadius: 5,
            pointHoverBorderWidth: 5,
            pointBorderColor: "transparent",
            lineTension: 0.5,
            pointStyle: "circle",
            pointShadowOffsetX: 1,
            pointShadowOffsetY: 1,
            pointShadowBlur: 5,
          },
          {
            label: " data two",
            data: [
              80, 125, 105, 130, 215, 195, 140, 160, 230, 300, 220, 170, 210,
              200, 280,
            ],
            fill: false,
            backgroundColor: hexToRGB(colors.success, 1),
            borderColor: colors.success,
            borderSkipped: "bottom",
            barThickness: 40,
            pointRadius: 1,
            pointHoverRadius: 5,
            pointHoverBorderWidth: 5,
            pointBorderColor: "transparent",
            lineTension: 0.5,
            pointStyle: "circle",
            pointShadowOffsetX: 1,
            pointShadowOffsetY: 1,
            pointShadowBlur: 5,
          },
          {
            label: " data three",
            data: [
              80, 99, 82, 90, 115, 115, 74, 75, 130, 155, 125, 90, 140, 130,
              180,
            ],
            fill: false,
            backgroundColor: hexToRGB(colors.danger, 1),
            borderColor: colors.danger,
            borderSkipped: "bottom",
            barThickness: 40,
            pointRadius: 1,
            pointHoverRadius: 5,
            pointHoverBorderWidth: 5,
            pointBorderColor: "transparent",
            lineTension: 0.5,
            pointStyle: "circle",
            pointShadowOffsetX: 1,
            pointShadowOffsetY: 1,
            pointShadowBlur: 5,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },
        scales: {
          y: {
            stacked: true,
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },
            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
          x: {
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },

            ticks: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },
      },
    },
    {
      id: "chart5",
      type: "radar",
      data: {
        labels: [
          "Eating",
          "Drinking",
          "Sleeping",
          "Designing",
          "Coding",
          "Cycling",
          "Running",
        ],
        datasets: [
          {
            label: "My First Dataset",
            data: [65, 59, 90, 81, 56, 55, 40],
            fill: true,
            backgroundColor: colors.primary,
            borderColor: colors.primary,
          },
          {
            label: "My Second Dataset",
            data: [28, 48, 40, 19, 96, 27, 100],
            fill: true,
            backgroundColor: colors.success,
            borderColor: colors.success,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            labels: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
          },
        },

        scales: {
          r: {
            ticks: {
              display: false,
              maxTicksLimit: 1,
              color: isDark ? "#cbd5e1" : "#475569",
            },
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },
            pointLabels: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
            angleLines: {
              color: isDark ? "#334155" : "#e2e8f0",
            },
          },
        },
        maintainAspectRatio: false,
      },
    },
    {
      id: "chart6",
      type: "polarArea",
      data: {
        labels: ["primary", "success", "warning-500", "info", "danger"],
        datasets: [
          {
            label: "My First Dataset",
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
              colors.primary,
              colors.success,
              colors.warning,
              colors.info,
              colors.danger,
            ],
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            labels: {
              color: "#cbd5e1",
            },
          },
        },
        scales: {
          r: {
            ticks: {
              color: isDark ? "#475569" : "#475569",
            },
            grid: {
              color: isDark ? "#334155" : "#e2e8f0",
            },
            pointLabels: {
              color: isDark ? "#cbd5e1" : "#475569",
            },
            angleLines: {
              color: isDark ? "#334155" : "#e2e8f0",
            },
          },
        },
        maintainAspectRatio: false,
      },
    },
  ];

  // loop through chartOptions array to render charts
  chartOptions.forEach(function (chart) {
    const ctx = document.getElementById(chart.id);
    if (ctx) {
      const chartObj = new ApexCharts(ctx, chart.options);
      chartObj.render();
    }
  });
  // loop through chartJsOptions array to render charts

  chartJsOptions.forEach(function (chart) {
    const ctx = document.getElementById(chart.id);
    if (ctx) {
      const chartObj = new Chart(ctx, {
        type: chart.type,
        data: chart.data,
        options: chart.options,
      });
    }
  });
  var randomId =
    Math.random().toString(36).substring(2, 15) +
    Math.random().toString(36).substring(2, 15);

  const chartWrapper = document.querySelectorAll(".donut-chart");
  // loop through each chart wrapper element
  chartWrapper.forEach((item, index) => {
    // generate a random ID for the chart element

    // create a new chart element with the generated ID
    var element = document.createElement("div");
    element.setAttribute("id", "donut-chart" + randomId + index);

    // set the height and width of the chart element (optional)
    var height = item.getAttribute("height") || 200;
    var width = item.getAttribute("width") || 200;
    var colors = item.getAttribute("colors").split(",");
    var hasLabel = item.getAttribute("hideLabel");
    var size = item.getAttribute("size") || "40%";

    // element.style.height = height + "px";
    // element.style.width = width + "px";

    // add the chart element to the wrapper element
    item.appendChild(element);

    // create a new instance of ApexCharts with the chart options and element ID
    var chartOptions = {
      chart: {
        type: "donut",
        height,
        toolbar: {
          show: false,
        },
      },
      series: [70, 30],
      labels: ["Complete", "Left"],
      dataLabels: {
        enabled: false,
      },
      plotOptions: {
        pie: {
          donut: {
            size,
            labels: {
              show: hasLabel ? false : true,
              name: {
                show: false,
                fontSize: "14px",
                fontWeight: "bold",
                fontFamily: "Inter",
              },
              value: {
                show: true,
                fontSize: "16px",
                fontFamily: "Inter",
                color: isDark ? "#cbd5e1" : "#0f172a",
                formatter(val) {
                  return `${parseInt(val)}%`;
                },
              },
              total: {
                show: true,
                fontSize: "10px",
                label: "",
                formatter() {
                  return "70";
                },
              },
            },
          },
        },
      },
      colors: [...colors],
      legend: {
        show: false,
      },
    };
    // your chart options object
    var chart = new ApexCharts(
      document.querySelector("#donut-chart" + randomId + index),
      chartOptions
    );

    // render the chart
    chart.render();
  });
  const barChartWrapper = document.querySelectorAll(".bar-chart");
  barChartWrapper.forEach((item, index) => {
    var element = document.createElement("div");
    element.setAttribute("id", "barchart" + randomId + index);

    // set the height and width of the chart element (optional)
    var height = item.getAttribute("height") || 200;
    var width = item.getAttribute("width") || 200;
    var colors = item.getAttribute("colors").split(",");

    // add the chart element to the wrapper element
    item.appendChild(element);
    // create a new instance of ApexCharts with the chart options and element ID
    var chartOptions = {
      chart: {
        type: "bar",
        height: height,
        toolbar: {
          show: false,
        },
        offsetX: 0,
        offsetY: 0,
        zoom: {
          enabled: false,
        },
        sparkline: {
          enabled: true,
        },
      },
      series: [
        {
          name: "Revenue",
          data: [40, 70, 45, 100, 75, 40, 80, 90],
        },
      ],
      plotOptions: {
        bar: {
          columnWidth: "60px",
          barHeight: "100%",
        },
      },
      legend: {
        show: false,
      },

      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: "smooth",
        width: 2,
      },

      fill: {
        opacity: 1,
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return "$ " + val + "k";
          },
        },
      },
      yaxis: {
        show: false,
      },
      xaxis: {
        show: false,
        labels: {
          show: false,
        },
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      colors: [...colors],
      grid: {
        show: false,
      },
    };
    // your chart options object
    var chart = new ApexCharts(
      document.querySelector("#barchart" + randomId + index),
      chartOptions
    );

    // render the chart
    chart.render();
  });
  const lineChartWrapper = document.querySelectorAll(".line-chart");
  lineChartWrapper.forEach((item, index) => {
    var element = document.createElement("div");
    element.setAttribute("id", "linechart" + randomId + index);

    // set the height and width of the chart element (optional)
    var height = item.getAttribute("height") || 200;
    var width = item.getAttribute("width") || 200;
    var colors = item.getAttribute("colors").split(",");

    // add the chart element to the wrapper element
    item.appendChild(element);
    // create a new instance of ApexCharts with the chart options and element ID
    var chartOptions = {
      chart: {
        type: "line",
        height: height,
        toolbar: {
          show: false,
        },
        offsetX: 0,
        offsetY: 0,
        zoom: {
          enabled: false,
        },
        sparkline: {
          enabled: true,
        },
      },
      series: [
        {
          data: [15, 30, 15, 30, 20, 35],
        },
      ],
      stroke: {
        width: [2],
        curve: "straight",
        dashArray: [0, 8, 5],
      },
      dataLabels: {
        enabled: false,
      },

      markers: {
        size: 4,
        colors: colors,
        strokeColors: colors,
        strokeWidth: 2,
        shape: "circle",
        radius: 2,
        hover: {
          sizeOffset: 1,
        },
      },

      yaxis: {
        show: false,
      },
      xaxis: {
        show: false,
        labels: {
          show: false,
        },
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      grid: {
        show: true,
        borderColor: isDark ? "#334155" : "#e2e8f0",
        strokeDashArray: 5,
        position: "back",
        xaxis: {
          lines: {
            show: true,
          },
        },
        yaxis: {
          lines: {
            show: false,
          },
        },
      },
      colors: [...colors],
    };
    // your chart options object
    var chart = new ApexCharts(
      document.querySelector("#linechart" + randomId + index),
      chartOptions
    );

    // render the chart
    chart.render();
  });
})(jQuery);
