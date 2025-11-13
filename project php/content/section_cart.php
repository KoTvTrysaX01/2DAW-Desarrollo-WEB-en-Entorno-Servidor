<style>
    :root {
        --header-bg-color-1: rgb(255, 255, 255);
        --header-bg-color-2: rgb(255, 181, 209);
    }

    .cont-1 {
        display: grid;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .container {
        background: white;
        padding: 20px;
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 2em 0em;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background: #ff5722;
        color: white;
    }

    .btn {
        background: #ff5722;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover,
    .btn-back:hover {
        background: #e64a19;
    }

    .total {
        font-size: 18px;
        margin-top: 15px;
    }

    .btn-back {
        background: #ff5722;
        color: white;
        border: none;
        padding: 1em 3em;
        font-size: 1.2em;
        border-radius: 15px;
        cursor: pointer;
    }
</style>

<div class="cont-1">
    <div class="container">
        <h2>Your Food Cart</h2>
        <table>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>Margherita Pizza</td>
                <td>1</td>
                <td>₹299</td>
            </tr>
            <tr>
                <td>Veg Biryani</td>
                <td>2</td>
                <td>₹450</td>
            </tr>
            <tr>
                <td>Cold Coffee</td>
                <td>1</td>
                <td>₹150</td>
            </tr>
        </table>

        <div class="total">
            <strong>Total: ₹899</strong>
        </div>

        <button class="btn">Proceed to Checkout</button>
    </div>
    <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
</div>