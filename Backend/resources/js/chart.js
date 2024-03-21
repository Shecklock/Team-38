import Chart from 'chart.js/auto';

(async function() {
  // Dummy product data
  const productsData = [
    { productName: 'Product A', productStock: 50 },
    { productName: 'Product B', productStock: 30 },
    { productName: 'Product C', productStock: 20 },
    { productName: 'Product D', productStock: 40 },
    { productName: 'Product E', productStock: 60 },
  ];

  // Extract product names and stock quantities
  const productNames = productsData.map(product => product.productName);
  const productStocks = productsData.map(product => product.productStock);

  new Chart(
    document.getElementById('stockChart'),
    {
      type: 'bar',
      data: {
        labels: productNames,
        datasets: [
          {
            label: 'Stock Availability',
            data: productStocks,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Specify background color
            borderColor: 'rgba(54, 162, 235, 1)', // Specify border color
            borderWidth: 1
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true // Ensure y-axis starts from zero
          }
        }
      }
    }
  );
})();
