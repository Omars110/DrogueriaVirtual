document.addEventListener('DOMContentLoaded', () => {
  const valorCarrito = () => {
    const valorTotal = document.getElementById('totalFactura');
    if (valorTotal) {
      const total = parseFloat(valorTotal.getAttribute('data-total'));
      return total;
    } else {
      throw new Error('Elemento con id "totalFactura" no encontrado.');
    }
  }

  const total = valorCarrito();

  window.paypal
    .Buttons({
      async createOrder() {
        try {
          const response = await fetch("http://localhost:8888/api/orders", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            // use the "body" param to optionally pass additional order information
            // like product ids and quantities
            body: JSON.stringify({
              cart: [
                {
                  id: 1,
                  quantity: total,
                },
              ],
            }),
          });

          const orderData = await response.json();

          if (orderData.id) {
            return orderData.id;
          } else {
            const errorDetail = orderData?.details?.[0];
            const errorMessage = errorDetail
              ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
              : JSON.stringify(orderData);

            throw new Error(errorMessage);
          }
        } catch (error) {
          console.error(error);
          resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
        }
      },
      async onApprove(data, actions) {
        try {
          const response = await fetch(`http://localhost:8888/api/orders/${data.orderID}/capture`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
          });

          const orderData = await response.json();
          // Three cases to handle:
          //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
          //   (2) Other non-recoverable errors -> Show a failure message
          //   (3) Successful transaction -> Show confirmation or thank you message
          //console.log("datos de orden" + orderData);
          const errorDetail = orderData?.details?.[0];

          if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
            // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
            // recoverable state, per https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
            return actions.restart();
          } else if (errorDetail) {
            // (2) Other non-recoverable errors -> Show a failure message
            throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
          } else if (!orderData.purchase_units) {
            throw new Error(JSON.stringify(orderData));
          } else {
            // (3) Successful transaction -> Show confirmation or thank you message
            // Or go to another URL:  actions.redirect('thank_you.html');
            const transaction =
              orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
              orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
            resultMessage(
              `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
            );
            // console.log(
            //   "Capture result",
            //   orderData,
            //   JSON.stringify(orderData, null, 2),
            // );
            //document.getElementById('ordenDatosFactura').setAttribute('data-datosPaypal', JSON.stringify(orderData));
            const event = new CustomEvent('datosPaypalRecibidos', { detail: orderData });
            document.dispatchEvent(event);
          }
        } catch (error) {
          console.error(error);
          resultMessage(
            `Sorry, your transaction could not be processed...<br><br>${error}`,
          );
        }
      },
    })
    .render("#paypal-button-container");

  /*function getCSRFToken() {
    return new Promise(function (resolve, reject) {
      $.ajax({
        type: 'GET',
        url: '/csrf-token',
        success: function (response) {
          resolve(response.csrf_token);
        },
        error: function (error) {
          reject(error);
        }
      });
    });
  }*/

  // Example function to show a result to the user. Your site's UI library can be used instead.
  function resultMessage(message) {
    const container = document.querySelector("#result-message");
    container.innerHTML = message;
  }
})


