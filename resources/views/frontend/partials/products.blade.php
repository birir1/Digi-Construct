
<style>
    .products-container {
        margin-top: 20px;
        padding: 20px;
        padding-top: 20px; /* Added padding-top */
    }

    .section-header {
        margin-bottom: 20px;
    }

    .section-header h2 {
        font-size: 24px;
        color: #001F3F; /* Navy Blue */
    }

    .product-category {
        margin-bottom: 30px;
    }

    .product-category h3 {
        font-size: 20px;
        color: #001F3F;
        margin-bottom: 10px;
    }

    .products-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .product-card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        flex: 1 1 calc(33.333% - 20px); /* Three cards per row with some margin */
        text-align: center;
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .product-card h4 {
        margin: 10px 0;
    }

    .product-card p {
        font-size: 14px;
        color: #555555;
    }

    .product-card .price {
        font-size: 18px;
        color: #001F3F;
        font-weight: bold;
    }

    .add-to-cart-btn {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 10px;
        background-color: #001F3F;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
    }

    .add-to-cart-btn:hover {
        background-color: #003366;
    }
</style>

<div class="products-container container">
    <div class="section-header">
        <h2>Our Products</h2>
    </div>

    <section class="product-category">
        <h3>Category 1</h3>
        <div class="products-grid">
            <div class="product-card">
                <img src="path/to/product1.jpg" alt="Product 1">
                <h4>Product 1</h4>
                <p>Description of Product 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$100.00</p>
                <a href="{{ route('register') }}" class="add-to-cart-btn">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="path/to/product2.jpg" alt="Product 2">
                <h4>Product 2</h4>
                <p>Description of Product 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$150.00</p>
                <a href="{{ route('register') }}" class="add-to-cart-btn">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="path/to/product3.jpg" alt="Product 3">
                <h4>Product 3</h4>
                <p>Description of Product 3. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$200.00</p>
                <a href="{{ route('register') }}" class="add-to-cart-btn">Add to Cart</a>
            </div>
        </div>
    </section>

    <section class="product-category">
        <h3>Category 2</h3>
        <div class="products-grid">
            <div class="product-card">
                <img src="path/to/product4.jpg" alt="Product 4">
                <h4>Product 4</h4>
                <p>Description of Product 4. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$250.00</p>
                <a href="{{ route('register') }}" class="add-to-cart-btn">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="path/to/product5.jpg" alt="Product 5">
                <h4>Product 5</h4>
                <p>Description of Product 5. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$300.00</p>
                <a href="{{ route('register') }}" class="add-to-cart-btn">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="path/to/product6.jpg" alt="Product 6">
                <h4>Product 6</h4>
                <p>Description of Product 6. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$350.00</p>
                <a href="{{ route('register') }}" class="add-to-cart-btn">Add to Cart</a>
            </div>
        </div>
    </section>
</div>
