<table>
    <thead>
        <tr>
            <td>Product ID</td>
            <td>Product</td>
            <td>Amount</td>
            <td>Price</td>
            <td>Total</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        {{foreach orders}}
            <tr>
                <td>{{idlibro}}</td>
                <td>{{nomlibro}}</td>
                <td>1</td>
                <td>{{preciolibro}}</td>
                <td>{{preciolibro}}</td>
                <td>
                <form action="index.php?page=clients_cart" method="POST">
                    <input type="hidden" name="idlibro" id="idlibro" value="{{idlibro}}"/>
                    <input type="hidden" name="usercod" id="usercod" value="{{usercod}}"/>
                    <input type="hidden" name="mode" id="mode" value="DEL"/>
                    <button type="submit"><i class="fas fa-minus"></i></button>
                </form>
                </td>
            </tr>
        {{endfor orders}} 
    </tbody>
</table>
<form method="POST" action="index.php?page=checkout_checkout&user={{user}}">
    <button type="submit" id="btnCheckout" name="btnCheckout">Checkout</button>
</form>