const carts = [
  {
    name: "Kelas Bahasa Jepang Dasar",
    price: 50000,
  },
  {
    name: "Kelas Bahasa Jepang Menengah",
    price: 100000,
  },
  {
    name: "Kelas Bahasa Jepang Dasar",
    price: 50000,
  },
];

const registeredVouchers = new Map([
  ["FTGO", 10],
  ["ULTRA", 10],
  ["LINGO", 15],
]);

function getDiscountedPrice(carts, voucher) {
  let total = 0;
  for (i in carts) {
    total += carts[i].price;
  }
  let discountedPrice = total;
  if (voucher != "") {
    let vouchers = voucher.split(", ");
    for (i in vouchers) {
      let discount = registeredVouchers.get(vouchers[i]);
      if (discount != undefined) {
        discountedPrice *= (100 - discount) / 100;
      }
    }
  }
  let tax = total / 10;
  return { total: total, tax: tax, discounts: total - discountedPrice };
}

function handleDiscount(event) {
  const voucher = document.getElementById("voucher").value;
  let price = getDiscountedPrice(carts, voucher);
  const total = document.getElementById("total");
  const discount = document.getElementById("discount");
  discountDiv.style.display = "block";
  discount.textContent = `Rp ${Intl.NumberFormat().format(price.discounts)}`;
  total.textContent = `Rp ${Intl.NumberFormat().format(
    price.total - price.discounts + price.tax
  )}`;
  event.preventDefault();
}

const discountDiv = document.getElementById("discount-div");
discountDiv.style.display = "none";
const form = document.getElementById("form-voucher");
form.addEventListener("submit", handleDiscount);