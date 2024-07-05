// const carts = [
//   {
//     name: "Kelas Bahasa Jepang Dasar",
//     price: 50000,
//   },
//   {
//     name: "Kelas Bahasa Jepang Menengah",
//     price: 100000,
//   },
//   {
//     name: "Kelas Bahasa Jepang Dasar",
//     price: 50000,
//   },
// ];

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
  const originalPrice = document.getElementById("original_price");
  const tax = document.getElementById("tax");
  discountDiv.style.display = "block";
  const numberFormat = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  });
  discount.textContent = numberFormat.format(price.discounts);
  originalPrice.textContent = numberFormat.format(price.total);
  tax.textContent = numberFormat.format(price.tax);
  total.textContent = numberFormat.format(
    price.total - price.discounts + price.tax
  );
  event.preventDefault();
}

const discountDiv = document.getElementById("discount-div");
discountDiv.style.display = "none";
const form = document.getElementById("form-voucher");
form.addEventListener("submit", handleDiscount);
