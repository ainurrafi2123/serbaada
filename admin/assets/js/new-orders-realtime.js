$(document).ready(function() {
  function updateNewOrders() {
      $.ajax({
          url: 'get_new_orders_count.php',
          type: 'GET',
          dataType: 'json',
          success: function(data) {
              $('#order-count').text(data.count);
              if (data.count > 0) {
                  // Optional: Tambahkan suara atau animasi notifikasi di sini
                  $('#new-orders-count').addClass('highlight');
              } else {
                  $('#new-orders-count').removeClass('highlight');
              }
          },
          complete: function() {
              // Polling setiap 30 detik
              setTimeout(updateNewOrders, 30000);
          }
      });
  }

  // Mulai polling
  updateNewOrders();
});