function incrementStock() {
    var stock = document.getElementById('stock').textContent;
    var newStock = parseInt(stock) + 1;
    document.getElementById('stock').textContent = newStock;
}