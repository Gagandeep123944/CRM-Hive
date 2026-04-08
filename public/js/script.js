document.addEventListener("DOMContentLoaded", function () {

    // ACTIVE INDICATOR MOVE
const icons = document.querySelectorAll(".nav-icon");
const indicator = document.getElementById("indicator");

const currentPath = window.location.pathname;

icons.forEach((icon, index) => {
    const link = icon.closest("a");

    if (link && link.getAttribute("href") === currentPath) {
        icons.forEach(i => i.classList.remove("active"));
        icon.classList.add("active");

        indicator.style.left = (index * 52 + 6) + "px";
    }
});

// USER DROPDOWN
const avatar = document.getElementById("avatarBtn");
const menu = document.querySelector(".dropdown-menu");

avatar?.addEventListener("click", () => {
    menu.style.display = menu.style.display === "flex" ? "none" : "flex";
});

    const isCartPage = window.location.pathname === "/cart";

    /** Add to Cart */
    document.querySelectorAll(".add-to-cart").forEach(btn => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();

            let id = this.dataset.id;
            let name = this.dataset.name;
            let price = this.dataset.price;

            fetch(`/cart/add/${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    name: name,
                    price: price
                })
            })
                .then(res => res.json())
                .then(data => {
                    showMiniCart(data.message);
                    loadMiniCart();
                })
                .catch(err => {
                    console.error(err);
                    showMiniCart("Error adding to cart");
                });
        });
    });

    updateTotal();

    // Increase / Decrease
    document.querySelectorAll(".qty-btn").forEach(btn => {
        btn.addEventListener("click", function () {

            let parent = this.closest(".cart-item");
            let id = parent.dataset.id;
            let change = this.classList.contains("increase") ? 1 : -1;

            fetch(`/cart/update/${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ change: change })
            })
                .then(res => res.json())
                .then(() => {
                    let qtyEl = parent.querySelector(".qty");
                    let currentQty = parseInt(qtyEl.innerText);

                    if (change === -1 && currentQty === 1) return;

                    qtyEl.innerText = currentQty + change;
                    updateTotal();

                    loadMiniCart();
                });
        });
    });

    // Remove Item
    document.querySelectorAll(".remove-btn").forEach(btn => {
        btn.addEventListener("click", function () {

            let parent = this.closest(".cart-item");
            let id = parent.dataset.id;

            fetch(`/cart/remove/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(res => res.json())
                .then(() => {
                    parent.remove();
                    updateTotal();
                    showMiniCart("Item removed from cart");
                    loadMiniCart();
                })
                .catch(() => {
                    showMiniCart("Error removing item");
                });
        });
    });

    loadMiniCart();

    let cartBtn = document.querySelector(".cart-icon");

    if (cartBtn) {
        cartBtn.addEventListener("click", (e) => {

            if (isCartPage) {
                return;
            }

            e.preventDefault();

            let cart = document.getElementById("mini-cart");

            if (cart) {
                cart.classList.add("show");
                loadMiniCart();
            }
        });
    }

    let closeBtn = document.getElementById("close-cart");

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            let cart = document.getElementById("mini-cart");
            if (cart) cart.classList.remove("show");
        });
    }
});

function showMiniCart(message) {

    if (window.location.pathname === "/cart") return;

    const cart = document.getElementById("mini-cart");

    if (!cart) return;

    cart.classList.add("show");

    setTimeout(() => {
        cart.classList.remove("show");
    }, 3000);
}

// Total Calculation
function updateTotal() {
    let total = 0;

    document.querySelectorAll(".cart-item").forEach(item => {
        let price = parseInt(item.querySelector(".price").innerText);
        let qty = parseInt(item.querySelector(".qty").innerText);

        total += price * qty;
    });

    document.getElementById("cart-total").innerText = total;
}

/* Load Cart Data */
function loadMiniCart() {
    fetch('/cart/data')
        .then(res => res.json())
        .then(data => {

            let container = document.getElementById("mini-cart-items");
            if (!container) return;
            container.innerHTML = "";

            Object.values(data.cart).forEach(item => {
                container.innerHTML += `
                    <div class="mini-item">
                        <h4>${item.name}</h4>
                        <p>₹${item.price} × ${item.quantity}</p>
                    </div>
                `;
            });

            let totalEl = document.getElementById("mini-cart-total");
            let countEl = document.getElementById("cart-count");

            if (totalEl) totalEl.innerText = data.total;
            if (countEl) countEl.innerText = data.count;
        });
}
