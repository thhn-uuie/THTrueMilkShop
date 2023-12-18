// Function to fetch and parse JSON data from a file
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
const jsonFilePath = 'public/frontend/json/products.json';
let jsonData;

// Fetch and parse JSON data
fetchJsonData(jsonFilePath)
    .then((data) => {
        jsonData = data;

        function createProductElement(product) {
            const cardDiv = document.createElement('div');
            cardDiv.className = 'c-listitem3__card1 item1-js';
            cardDiv.setAttribute('data-product-id', product.id);

            const imgDiv = document.createElement('div');
            imgDiv.className = 'c-listitem3__img1';

            const img = document.createElement('img');
            img.src = product.image;
            img.alt = product['image-alt'];

            imgDiv.appendChild(img);

            const contentArticle = document.createElement('article');
            contentArticle.className = 'c-listitem3__content1';

            const titleH4 = document.createElement('h4');
            titleH4.className = 'title1';
            titleH4.textContent = product.name;

            const infoDiv = document.createElement('div');
            infoDiv.className = 'info1';

            const priceSpan = document.createElement('span');
            priceSpan.className = 'info1__price1';
            priceSpan.textContent = product.price + ' ₫';

            // Create a new div for the "add" text and cart icon
            const addItemDiv = document.createElement('div');
            addItemDiv.className = 'c-add-item addCart';

            const addText = document.createTextNode('Thêm ');

            const cartIcon = document.createElement('i');
            cartIcon.className = 'fa fa-solid fa-cart-shopping fa-lg';

            // Append the "Add" text and cart icon to the new div
            addItemDiv.appendChild(addText);
            addItemDiv.appendChild(cartIcon);

            // Append the price and the new div to the infoDiv
            infoDiv.appendChild(priceSpan);
            infoDiv.appendChild(addItemDiv);

            // Append the title and infoDiv to the contentArticle
            contentArticle.appendChild(titleH4);
            contentArticle.appendChild(infoDiv);

            // Append the imgDiv and contentArticle to the cardDiv
            cardDiv.appendChild(imgDiv);
            cardDiv.appendChild(contentArticle);

            return cardDiv;
        }


        // Function to add products to the HTML
        function addProductsToHTML(products, containerId) {
            const container = document.getElementById(containerId);

            if (container) {
                products.forEach((product, index) => {
                    // Create a new c-listitem3-root1 for every 4 items
                    if (index % 3 === 0) {
                        const currentRoot = document.createElement('div');
                        currentRoot.className = 'c-listitem3-root1';
                        container.appendChild(currentRoot);

                        const listItemDiv = document.createElement('div');
                        listItemDiv.className = 'c-listitem3';
                        currentRoot.appendChild(listItemDiv);

                        const productElement = createProductElement(product);
                        listItemDiv.appendChild(productElement);
                    } else {
                        const listItemDiv = container.lastElementChild.querySelector('.c-listitem3');
                        const productElement = createProductElement(product);
                        listItemDiv.appendChild(productElement);
                    }
                });
            }
        }

        addProductsToHTML(data.filter(product => product.category === 'suachua'), 'suachua');
        addProductsToHTML(data.filter(product => product.category === 'suatuoitiettrung'), 'suatuoitiettrung');
    });

// Keep track of the shopping cart
const shoppingCart = [];

// Function to update the shopping cart
function updateCart(product) {
    const existingProductIndex = shoppingCart.findIndex(item => item.id === product.id);

    if (existingProductIndex !== -1) {
        // Product already exists in the cart, update quantity
        shoppingCart[existingProductIndex].quantity++;
    } else {
        // Product is not in the cart, add it with quantity 1
        shoppingCart.push({ ...product, quantity: 1 });
    }

    // Update the cart icon with the total quantity
    updateCartIcon();
}

// Function to update the cart icon with the total quantity
function updateCartIcon() {
    const cartIcon = document.querySelector('.icon-cart span');
    if (cartIcon) {
        const totalQuantity = shoppingCart.reduce((total, item) => total + item.quantity, 0);
        cartIcon.textContent = totalQuantity;
    }
}

// Event listener for cart icons
document.addEventListener('click', function (event) {
    const target = event.target;

    if (target.classList.contains('addCart')) {
        // Find the corresponding product in the JSON data
        const productId = parseInt(target.closest('.c-listitem3__card1').getAttribute('data-product-id'));
        const product = jsonData.find(item => item.id === productId);

        if (product) {
            // Update the cart and refresh the cart icon
            updateCart(product);
            updateCartIcon();
        }
    }
});
