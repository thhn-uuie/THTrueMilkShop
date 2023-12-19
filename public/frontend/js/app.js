async function fetchJsonData(url) {
    try {
        const response = await fetch(url);

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        return await response.json();
    } catch (error) {
        console.error('Error fetching JSON data:', error);
    }
}

// Specify the path to your products.json file
// const jsonFilePath = 'public/frontend/json/products.json';
// let jsonData;

// fetchJsonData(jsonFilePath)
//     .then((data) => {
//         jsonData = data;

//         function createProductElement(product) {
//             const cardDiv = document.createElement('div');
//             cardDiv.className = 'c-listitem3__card1';
        
//             const imgDiv = document.createElement('div');
//             imgDiv.className = 'c-listitem3__img1';
        
//             const img = document.createElement('img');
//             img.src = product.image;
//             img.alt = product['image-alt'];
        
//             imgDiv.appendChild(img);
        
//             const contentArticle = document.createElement('article');
//             contentArticle.className = 'c-listitem3__content1';
        
//             const titleH4 = document.createElement('h4');
//             titleH4.className = 'title1';
//             titleH4.textContent = product.name;
        
//             const infoDiv = document.createElement('div');
//             infoDiv.className = 'info1';
        
//             const priceSpan = document.createElement('span');
//             priceSpan.className = 'info1__price1';
//             priceSpan.textContent = product.price + ' ₫';
        
//             const addItemDiv = document.createElement('div');
//             addItemDiv.className = 'c-add-item';
//             addItemDiv.setAttribute('onclick', `addToCart(${product.id})`);
        
//             const addText = document.createTextNode('Thêm ');
        
//             const cartIcon = document.createElement('i');
//             cartIcon.className = 'fa fa-solid fa-cart-shopping fa-lg';
        
//             addItemDiv.appendChild(addText);
//             addItemDiv.appendChild(cartIcon);
        
//             infoDiv.appendChild(priceSpan);
//             infoDiv.appendChild(addItemDiv);
        
//             contentArticle.appendChild(titleH4);
//             contentArticle.appendChild(infoDiv);
        
//             cardDiv.appendChild(imgDiv);
//             cardDiv.appendChild(contentArticle);
        
//             return cardDiv;
//         }
        

//         function addProductsToHTML(products, containerId) {
//             const container = document.getElementById(containerId);

//             if (container) {
//                 products.forEach((product, index) => {
//                     // Create a new c-listitem3-root1 for every 4 items
//                     if (index % 3 === 0) {
//                         const currentRoot = document.createElement('div');
//                         currentRoot.className = 'c-listitem3-root1';
//                         container.appendChild(currentRoot);
        
//                         const listItemDiv = document.createElement('div');
//                         listItemDiv.className = 'c-listitem3';
//                         currentRoot.appendChild(listItemDiv);
        
//                         const productElement = createProductElement(product);
//                         listItemDiv.appendChild(productElement);
//                     } else {
//                         const listItemDiv = container.lastElementChild.querySelector('.c-listitem3');
//                         const productElement = createProductElement(product);
//                         listItemDiv.appendChild(productElement);
//                     }
//                 });
//             }
//         }

//         addProductsToHTML(data.filter(product => product.category === 'suachua'), 'suachua');
//         addProductsToHTML(data.filter(product => product.category === 'suatuoitiettrung'), 'suatuoitiettrung');
//     });

let shoppingCart = [];

function saveCartToStorage() {
    localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart));
}

function loadCartFromStorage() {
    const storedCart = localStorage.getItem('shoppingCart');
    if (storedCart) {
        shoppingCart = JSON.parse(storedCart);
        updateCartIcon();
        updateCartDropdown();
    }
}

window.addEventListener('load', loadCartFromStorage);

function updateCart(product) {
    const existingProductIndex = shoppingCart.findIndex(item => item.id === product.id);

    if (existingProductIndex !== -1) {
        shoppingCart[existingProductIndex].quantity++;
    } else {
        shoppingCart.push({ ...product, quantity: 1 });
    }

    updateCartIcon();

    updateCartDropdown();

    saveCartToStorage();
}

function updateCartIcon() {
    const cartIcon = document.querySelector('.icon-cart span');
    if (cartIcon) {
        const totalQuantity = shoppingCart.reduce((total, item) => total + item.quantity, 0);
        cartIcon.textContent = totalQuantity;
    }
}

function updateCartDropdown() {
    const productInfo = document.querySelector('.product-info');
    const totalPriceSpan = document.getElementById('totalPrice');

    productInfo.innerHTML = '';

    if (shoppingCart.length === 0) {
        const emptyMessage = document.createElement('div');
        emptyMessage.textContent = '';
        productInfo.appendChild(emptyMessage);
    } else {
        shoppingCart.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');

            const img = document.createElement('img');
            img.src = item.image;
            img.alt = item['image-alt'];
            cartItem.appendChild(img);

            const closeIconContainer = document.createElement('div');
            closeIconContainer.classList.add('close-icon');
            closeIconContainer.onclick = () => removeItemFromCart(item.id);

            const closeIcon = document.createElement('i');
            closeIcon.classList.add('fas', 'fa-times-circle');

            closeIconContainer.appendChild(closeIcon);
            cartItem.appendChild(closeIconContainer);

            const info = document.createElement('div');
            info.classList.add('info');

            const productName = document.createElement('div');
            productName.classList.add('product-name');
            productName.textContent = item.name;
            info.appendChild(productName);

            const productPrice = document.createElement('div');
            productPrice.classList.add('product-price');
            productPrice.textContent = `${item.price} ₫`;
            info.appendChild(productPrice);

            const productQuantity = document.createElement('div');
            productQuantity.classList.add('product-quantity');
            productQuantity.textContent = `Số lượng: ${item.quantity}`;
            info.appendChild(productQuantity);

            cartItem.appendChild(info);
            productInfo.appendChild(cartItem);
        });
    }

    totalPriceSpan.textContent = `${calculateTotalPrice()} ₫`;
}

function removeItemFromCart(itemId) {
    const itemIndex = shoppingCart.findIndex(item => item.id === itemId);
    if (itemIndex !== -1) {
        shoppingCart.splice(itemIndex, 1);
        updateCartDropdown();
    }

    const cartIcon = document.querySelector('.icon-cart span');
    if (cartIcon) {
        const totalQuantity = shoppingCart.reduce((total, item) => total + item.quantity, 0);
        cartIcon.textContent = totalQuantity;

        updateCartDropdown();
    }

    saveCartToStorage();
}

function calculateTotalPrice() {
    return shoppingCart.reduce((total, item) => total + item.quantity * item.price, 0);
}

function addToCart(productId) {
    const product = jsonData.find(item => item.id === productId);
    if (product) {
        // Update the cart and refresh the cart icon and dropdown
        updateCart(product);
    }
}

function toggleCartDropdown() {
    const cartDropdown = document.querySelector('.cart-dropdown');
    if (cartDropdown) {
        cartDropdown.classList.toggle('show');
        console.log('show')
    }
}

document.onclick = function (event) {
    const target = event.target;
    const cartDropdown = document.querySelector('.cart-dropdown');

    const isIconCartClick = target.classList.contains('icon-cart') || target.classList.contains('close-icon') || target.closest('.close-icon') || target.closest('.icon-cart');

    if (cartDropdown && !cartDropdown.contains(target) && !isIconCartClick) {
        cartDropdown.classList.remove('show');
    }
};