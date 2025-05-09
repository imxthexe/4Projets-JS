const dropList = document.querySelectorAll("form select"),
  fromCurrency = document.querySelector(".from select"),
  toCurrency = document.querySelector(".to select"),
  getButton = document.querySelector("form button");

const API_KEY = "8c03049382e1a5ad3e310301"; // Paste API key here

// Populate select dropdowns with currency options
dropList.forEach((select, index) => {
  for (let currency_code in country_list) {
    let selected = (index === 0 && currency_code === "USD") || (index === 1 && currency_code === "NPR") ? "selected" : "";
    let optionTag = `<option value="${currency_code}" ${selected}>${currency_code}</option>`;
    select.insertAdjacentHTML("beforeend", optionTag);
  }
  select.addEventListener("change", e => loadFlag(e.target));
});

// Update flag image based on selected currency
function loadFlag(element) {
  let imgTag = element.parentElement.querySelector("img");
  imgTag.src = `https://flagcdn.com/48x36/${country_list[element.value].toLowerCase()}.png`;
}

// Initialize exchange rate fetching on page load
window.addEventListener("load", getExchangeRate);

// Fetch exchange rate on button click
getButton.addEventListener("click", e => {
  e.preventDefault(); // Prevent form submission
  getExchangeRate();
});

// Swap selected currencies and update flags
const exchangeIcon = document.querySelector("form .icon");
exchangeIcon.addEventListener("click", () => {
  [fromCurrency.value, toCurrency.value] = [toCurrency.value, fromCurrency.value];
  loadFlag(fromCurrency);
  loadFlag(toCurrency);
  getExchangeRate();
});

// Fetch and display exchange rate
function getExchangeRate() {
  const amount = document.querySelector("form input");
  const exchangeRateTxt = document.querySelector("form .exchange-rate");
  let amountVal = amount.value || "1"; // Default to 1 if input is empty or 0
  amount.value = amountVal;
  exchangeRateTxt.innerText = "Getting exchange rate...";

  let url = `https://v6.exchangerate-api.com/v6/${API_KEY}/latest/${fromCurrency.value}`;
  fetch(url)
    .then(response => response.json())
    .then(result => {
      let exchangeRate = result.conversion_rates[toCurrency.value];
      let totalExRate = (amountVal * exchangeRate).toFixed(2);
      exchangeRateTxt.innerText = `${amountVal} ${fromCurrency.value} = ${totalExRate} ${toCurrency.value}`;
    })
    .catch(() => {
      exchangeRateTxt.innerText = "Something went wrong";
    });
}
